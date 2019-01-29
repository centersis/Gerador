<?php

namespace Cnab240;

use \Arquivo\ArquivoValidacao;

class ValidacaoCnab240 extends ArquivoValidacao
{

    public function validaMovimentoRemessa($opcao, $posicao, $linha, $identifica)
    {
        $opcoes = ["01", "02", "06", "09", "10", "11", "31"];
        if (array_search($opcao, $opcoes) === false) {
            throw new \Exception($identifica . " - Posição " . $posicao . " inválida");
        }
    }

    public function validaEspecieTitulo($opcao, $posicao, $linha, $identifica)
    {
        $opcoes = [1, 2, 3, 4, 5,
            6, 7, 8, 9, 10,
            11, 12, 13, 14, 15,
            16, 17, 18, 19, 20,
            21, 22, 23, 24, 25, 99];
        if (array_search($opcao, $opcoes) === false) {
            throw new \Exception($identifica . " - Posição " . $posicao . " inválida");
        }
    }

    public function validaCodigoProtesto($opcao, $posicao, $linha, $identifica)
    {
        $opcoes = [1, 2, 3, 9];
        if (array_search($opcao, $opcoes) === false) {
            throw new \Exception($identifica . " - Posição " . $posicao . " inválida");
        }
    }

    public function codigoMoeda($opcao, $posicao, $linha, $identifica)
    {
        $opcoes = [2, 9];
        if (array_search($opcao, $opcoes) === false) {
            throw new \Exception($identifica . " - Posição " . $posicao . " inválida");
        }
    }

    public function validaJuroseDescData($data, $posicao, $linha, $identifica)
    {
        if ($linha[$posicao - 2] == 0) {
            if (($data == 0) === false) {
                throw new \Exception($identifica . " - Posição " . $posicao . " inválida");
            }
        } else {
            if ($data == 0) {
                throw new \Exception($identifica . " - Posição " . $posicao . " inválida");
            }
        }
    }

    public function validaJurosDescValor($valor, $posicao, $linha, $identifica)
    {
        if ($linha[$posicao - 2] == 0) {
            if (($valor == 0) === false) {
                throw new \Exception($identifica . " - Posição " . $posicao . " inválida");
            }
        } else {
            if (($valor == 0)) {
                throw new \Exception($identifica . " - Posição " . $posicao . " inválida");
            }
        }
    }

    public function validaCodigoProteMovi($codProt, $posicao, $linha, $identifica)
    {
        if ($codProt == 9) {
            if (($linha[6] == 31) === false) {
                throw new \Exception($identifica . " - Posição " . $posicao . " inválida");
            }
        }
    }

    public function validaTamanhoArray($array)
    {
        foreach ($array as $keySegmento => $segmento) {
            $contagem = 0;
            foreach ($segmento as $key => $valor) {
                $quant = 0;
                $quant = strlen($valor);
                $contagem = $contagem + $quant;
            }
            if (($contagem == 240) === false) {
                throw new \Exception("O segmento $keySegmento não possui 240 caracteres");
            }
        }
    }

    public function validaData($data, $posicao, $linha, $identifica)
    {
        $pontos = ["\\", "/", "-", "."];
        $dataFormatada = str_replace($pontos, "", $data);

        if (strlen($dataFormatada) != 8) {
            throw new \Exception($identifica . " - Posição " . $posicao . " inválida");
        } else {
            $dia = substr($dataFormatada, 0, 2);
            $mes = substr($dataFormatada, 2, 2);
            $ano = substr($dataFormatada, 4, 4);
            if (strlen($ano) < 4) {
                throw new \Exception($identifica . " - Posição " . $posicao . " inválida");
            } else {
                if (checkdate($mes, $dia, $ano) === false) {
                    throw new \Exception($identifica . " - Posição " . $posicao . " inválida");
                }
            }
        }
    }

}
