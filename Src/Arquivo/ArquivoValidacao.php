<?php

namespace Src\Arquivo;

class ArquivoValidacao {

    public function validaCpf($cpf, $posicao, $linha, $identifica) {

        $invalidos = [];

        for ($c = 0; $c < 10; $c++) {
            $invalidos[] = \str_repeat($c, 11);
        }

        $cpfLimpo = \str_replace(['.', '-'], '', $cpf);

        if (\strlen($cpfLimpo) <> 11 or \in_array($cpfLimpo, $invalidos) or ! \is_numeric($cpfLimpo)) {

            throw new \Exception($identifica . " - Posição " . $posicao . " inválida");
        }

        $dvInformado = \substr($cpfLimpo, 9, 2);

        $digito = [];
        for ($i = 0; $i <= 8; $i++) {
            $digito[$i] = \substr($cpfLimpo, $i, 1);
        }

        $posicao1 = 10;
        $soma1 = 0;

        for ($i = 0; $i <= 8; $i++) {
            $soma1 += ($digito[$i] * $posicao1);
            $posicao1 = $posicao1 - 1;
        }

        $digito[9] = $soma1 % 11;

        if ($digito[9] < 2) {
            $digito[9] = 0;
        } else {
            $digito[9] = 11 - $digito[9];
        }

        $posicao2 = 11;
        $soma2 = 0;

        for ($i = 0; $i <= 9; $i++) {
            $soma2 += ($digito[$i] * $posicao2);
            $posicao2 = $posicao2 - 1;
        }

        $digito[10] = $soma2 % 11;

        if ($digito[10] < 2) {
            $digito[10] = 0;
        } else {
            $digito[10] = 11 - $digito[10];
        }

        $dv = $digito[9] * 10 + $digito[10];

        if ($dv != $dvInformado) {
            throw new \Exception($identifica . " - Posição " . $posicao . " inválida");
        }

        return true;
    }

    public function validaCnpj($cnpj, $posicao, $linha, $identifica) {
        $j = 0;
        $num = [];
        for ($i = 0; $i < (\strlen($cnpj)); $i++) {
            if (\is_numeric($cnpj[$i])) {
                $num[$j] = $cnpj[$i];
                $j++;
            }
        }

        if (\count($num) != 14) {
            throw new \Exception($identifica . " - Posição " . $posicao . " inválida");
        }

        if (\array_sum($num) == 0) {
            throw new \Exception($identifica . " - Posição " . $posicao . " inválida");
        } else {
            $j = 5;
            for ($i = 0; $i < 4; $i++) {
                $multiplica[$i] = $num[$i] * $j;
                $j--;
            }
            $soma = \array_sum($multiplica);
            $j = 9;
            for ($i = 4; $i < 12; $i++) {
                $multiplica[$i] = $num[$i] * $j;
                $j--;
            }
            $soma = \array_sum($multiplica);
            $resto = $soma % 11;
            if ($resto < 2) {
                $dg = 0;
            } else {
                $dg = 11 - $resto;
            }

            if ($dg != $num[12]) {
                throw new \Exception($identifica . " - Posição " . $posicao . " inválida");
            }
        }

        $j = 6;
        for ($i = 0; $i < 5; $i++) {
            $multiplica[$i] = $num[$i] * $j;
            $j--;
        }
        $soma = array_sum($multiplica);
        $j = 9;
        for ($i = 5; $i < 13; $i++) {
            $multiplica[$i] = $num[$i] * $j;
            $j--;
        }
        $soma = array_sum($multiplica);
        $resto = $soma % 11;
        if ($resto < 2) {
            $dg = 0;
        } else {
            $dg = 11 - $resto;
        }

        if ($dg != $num[13]) {
            throw new \Exception($identifica . " - Posição " . $posicao . " inválida");
        }

        return true;
    }

    public function validaIdTitulo($opcao, $posicao, $linha, $identifica) {
        $opcoes = ["A", "N"];
        if (array_search($opcao, $opcoes) === false) {
            throw new \Exception($identifica . " - Posição " . $posicao . " inválida");
        }
    }

    public function validaTamanho($string, $tamanho, $posicao, $identifica) {
        $stringLimpa = trim($string);
        if (strlen($stringLimpa) != $tamanho) {
            throw new \Exception($identifica . " - Posição " . $posicao . " inválida");
        }
    }

    public function validaCep($cep, $posicao, $linha, $identifica) {
        $this->validaTamanho($cep, 5, $posicao, $identifica);
        if (preg_match('/[0-9]{5,5}?$/', $cep) === FALSE) {
            throw new \Exception($identifica . " - Posição " . $posicao . " inválida");
        }
    }

    public function validaSufixoCep($sufixo, $posicao, $linha, $identifica) {
        $this->validaTamanho($sufixo, 3, $posicao, $identifica);
        if (preg_match('/[0-9]{3}?$/', $sufixo) === FALSE) {
            throw new \Exception($identifica . " - Posição " . $posicao . " inválida");
        }
    }

    public function validaUf($opcao, $posicao, $linha, $identifica) {
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

    public function validaOpcao1e2($opcao, $posicao, $linha, $identifica) {
        $opcoes = [1, 2];

        if (array_search($opcao, $opcoes) === false) {
            throw new \Exception($identifica . " - Posição " . $posicao . " inválida");
        }
    }

    public function validaCodigo($opcao, $posicao, $linha, $identifica) {
        $opcoes = [0, 1, 2];
        if (array_search($opcao, $opcoes) === false) {
            throw new \Exception($identifica . " - Posição " . $posicao . " inválida");
        }
    }

    public function validaTamanhoNum($valor, $tamanho, $posicao, $identifica) {
        if (strlen($valor) > $tamanho) {
            throw new \Exception($identifica . " - Posição " . $posicao . " inválida");
        }
    }

    public function setDefault($modelo, $setados, $default, $identifica) {
        if (isset($setados[0]) and is_array($setados[0])) {

            foreach ($setados as $chavePosicao => $dadosPosicao) {

                foreach ($modelo as $chave => $valores) {

                    if (isset($dadosPosicao[$chave])) {

                        if ($dadosPosicao[$chave] === "" or $dadosPosicao[$chave] === null) {

                            if (isset($default[$chave])) {
                                $setados[$chavePosicao][$chave] = $default[$chave];
                            } else {
                                throw new \Exception($identifica . " - Linha " . ($chavePosicao + 1) . " -> Posição " . $chave . " deve ser preechida!");
                            }
                        }
                    } else {

                        if (isset($default[$chave])) {
                            $setados[$chavePosicao][$chave] = $default[$chave];
                        } else {

                            throw new \Exception($identifica . " - Linha " . ($chavePosicao + 1) . " -> Posição " . $chave . " deve ser preechida!");
                        }
                    }
                }
            }
        } else {

            foreach ($modelo as $chave => $valores) {

                if (isset($setados[$chave])) {

                    if ($setados[$chave] === "" or $setados[$chave] === null) {

                        if (isset($default[$chave])) {
                            $setados[$chave] = $default[$chave];
                        } else {
                            throw new \Exception($identifica . " - Posição " . $chave . " deve ser preechida!");
                        }
                    }
                } else {

                    if (isset($default[$chave])) {
                        $setados[$chave] = $default[$chave];
                    } else {
                        throw new \Exception($identifica . " - Posição " . $chave . " deve ser preechida!");
                    }
                }
            }
        }

        return $setados;
    }

    public function validaData($data, $posicao, $linha, $identifica) {
        $y = substr($data, 0, 4);
        $m = substr($data, 4, 2);
        $d = substr($data, 6, 2);

        if (strlen($y) != 4) {
            throw new \Exception($identifica . " - Posição " . $posicao . " não possui uma data válida!");
        }

        if (!checkdate((int) $m, (int) $d, (int) $y)) {
            throw new \Exception($identifica . " - Posição " . $posicao . " não possui uma data válida!");
        }
    }

    public function validaHora($hora, $posicao, $linha, $identifica) {
        $h = substr($hora, 0, 2);
        $m = substr($hora, 2, 2);
        $s = substr($hora, 4, 2);

        if ($h > 23) {
            throw new \Exception($identifica . " - Posição " . $posicao . " não possui uma data válida!");
        }

        if ($m > 59 or $s > 59) {
            throw new \Exception($identifica . " - Posição " . $posicao . " não possui uma data válida!");
        }
    }

}
