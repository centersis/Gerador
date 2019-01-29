<?php

namespace Arquivo;

class ArquivoValidacao
{

    public function validaCpf($cpf, $posicao, $linha, $identifica)
    {
        if (strlen($cpf) == 14 || 15) {
            $cpf = substr($cpf, 3, 11);
        }

        $cpf = preg_replace('/[^0-9]/is', '', $cpf);
        if (strlen($cpf) != 11) {
            throw new \Exception($identifica . " - Posição " . $posicao . " inválida");
        }
        if (preg_match('/(\d)\1{10}/', $cpf)) {
            throw new \Exception($identifica . " - Posição " . $posicao . " inválida");
        }
        for ($t = 9; $t < 11; $t++) {
            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $cpf{$c} * (($t + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 10;
            if ($cpf{$c} != $d) {
                throw new \Exception($identifica . " - Posição " . $posicao . " inválida");
            }
        }
    }

    public function validaCnpj($cnpj, $posicao, $linha, $identifica)
    {
        $cnpj = preg_replace('/[^0-9]/', '', (string) $cnpj);
        if (strlen($cnpj) == 15) {
            $cnpj = substr($cnpj, 1, 14);
        }
        if (strlen($cnpj) != 14) {
            throw new \Exception($identifica . " - Posição " . $posicao . " inválida");
        }
        for ($i = 0, $j = 5, $soma = 0; $i < 12; $i++) {
            $soma += $cnpj{$i} * $j;
            $j = ($j == 2) ? 9 : $j - 1;
        }
        $resto = $soma % 11;
        if ($cnpj{12} != ($resto < 2 ? 0 : 11 - $resto)) {
            throw new \Exception($identifica . " - Posição " . $posicao . " inválida");
        }
        for ($i = 0, $j = 6, $soma = 0; $i < 13; $i++) {
            $soma += $cnpj{$i} * $j;
            $j = ($j == 2) ? 9 : $j - 1;
        }
        $resto = $soma % 11;
    }

    public function validaCodigoBarra($codigoBarra, $posicao, $linha, $identifica)
    {
        if (strlen($codigoBarra) != 44) {
            throw new \Exception($identifica . " - Posição " . $posicao . " inválida");
        }
    }

    public function validaIdTitulo($opcao, $posicao, $linha, $identifica)
    {
        $opcoes = ["A", "N"];
        if (array_search($opcao, $opcoes) === false) {
            throw new \Exception($identifica . " - Posição " . $posicao . " inválida");
        }
    }

    public function validaTamanho($string, $tamanho, $posicao, $identifica)
    {
        $string = trim($string);
        if (strlen($string) != $tamanho) {
            throw new \Exception($identifica . " - Posição " . $posicao . " inválida");
        }
    }

    public function validaCep($cep, $posicao, $linha, $identifica)
    {
        $this->validaTamanho($cep, 5, $posicao, $identifica);
        if (preg_match('/[0-9]{5,5}?$/', $cep) === FALSE) {
            throw new \Exception($identifica . " - Posição " . $posicao . " inválida");
        }
    }

    public function validaSufixoCep($sufixo, $posicao, $linha, $identifica)
    {
        $this->validaTamanho($sufixo, 3, $posicao, $identifica);
        if (preg_match('/[0-9]{3}?$/', $sufixo) === FALSE) {
            throw new \Exception($identifica . " - Posição " . $posicao . " inválida");
        }
    }

    public function validaUf($opcao, $posicao, $linha, $identifica)
    {
        $opcoes = ["AC", "AL", "AM", "AP",
            "BA", "CE", "DF", "ES",
            "GO", "MA", "MG", "MS",
            "MT", "PA", "PB", "PE",
            "PI", "PR", "RJ", "RN",
            "RO", "RR", "RS", "SC",
            "SE", "SP", "TO"];
        if (array_search(strtoupper($opcao), $opcoes) === false) {
            throw new \Exception($identifica . " - Posição " . $posicao . " inválida");
        }
    }

    public function validaOpcao1e2($opcao, $posicao, $linha, $identifica)
    {
        $opcoes = [1, 2];

        if (array_search($opcao, $opcoes) === false) {
            throw new \Exception($identifica . " - Posição " . $posicao . " inválida");
        }
    }

    public function validaCodigo($opcao, $posicao, $linha, $identifica)
    {
        $opcoes = [0, 1, 2];
        if (array_search($opcao, $opcoes) === false) {
            throw new \Exception($identifica . " - Posição " . $posicao . " inválida");
        }
    }

    public function validaCpfeCnpj($valor, $posicao, $linha, $identifica)
    {
        $valorLimpo = str_replace(['.', '/', '-'], '', $valor);

        if (strlen($valorLimpo) >= 14) {
            $this->validaCnpj($valor, $posicao, $linha, $identifica);
            return true;
        }

        if (strlen($valorLimpo) == 11) {
            $this->validaCpf($valor, $posicao, $linha, $identifica);
            return true;
        }

        throw new \Exception($identifica . " - Posição " . $posicao . " inválida");
    }

    public function validaSegmentosObrigatorios($segmento, $tipo, $segObrig)
    {
        foreach ($segObrig as $tipoObrig) {
            if ($tipoObrig == $tipo) {
                if (empty($segmento)) {
                    throw new \Exception("O Segmento " . $tipo . " não foi preenchido e é obrigatório");
                }
            }
        }
    }

    public function validaTamanhoNum($valor, $tamanho, $posicao, $identifica)
    {
        if (strlen($valor) > $tamanho) {
            throw new \Exception($identifica . " - Posição " . $posicao . " inválida");
        }
    }

    public function setDefault($modelo, $setados, $default, $dinamico, $identifica)
    {
        if (isset($setados[0]) and is_array($setados[0])) {

            foreach ($setados as $chavePosicao => $dadosPosicao) {

                foreach (array_keys($modelo) as $chave) {

                    if (isset($dadosPosicao[$chave])) {

                        if ($dadosPosicao[$chave] === "" or $dadosPosicao[$chave] === null) {

                            if (isset($default[$chave])) {
                                $setados[$chavePosicao][$chave] = $default[$chave];
                            } else {

                                if (!isset($dinamico[$chave])) {
                                    throw new \Exception($identifica . " - Linha " . ($chavePosicao + 1) . " -> Posição " . $chave . " deve ser preechida!");
                                } else {
                                    $setados[$chave] = $dinamico[$chave];
                                }
                            }
                        }
                    } else {

                        if (isset($default[$chave])) {
                            $setados[$chavePosicao][$chave] = $default[$chave];
                        } else {

                            if (!isset($dinamico[$chave])) {
                                throw new \Exception($identifica . " - Linha " . ($chavePosicao + 1) . " -> Posição " . $chave . " deve ser preechida!");
                            } else {
                                $setados[$chave] = $dinamico[$chave];
                            }
                        }
                    }
                }
            }
        } else {

            foreach (array_keys($modelo) as $chave) {

                if (isset($setados[$chave])) {

                    if ($setados[$chave] === "" or $setados[$chave] === null) {

                        if (isset($default[$chave])) {
                            $setados[$chave] = $default[$chave];
                        } else {

                            if (!isset($dinamico[$chave])) {
                                throw new \Exception($identifica . " - Posição " . $chave . " deve ser preechida!");
                            } else {
                                $setados[$chave] = $dinamico[$chave];
                            }
                        }
                    }
                } else {

                    if (isset($default[$chave])) {
                        $setados[$chave] = $default[$chave];
                    } else {

                        if (!isset($dinamico[$chave])) {
                            throw new \Exception($identifica . " - Posição " . $chave . " deve ser preechida!");
                        } else {
                            $setados[$chave] = $dinamico[$chave];
                        }
                    }
                }
            }
        }

        return $setados;
    }

}
