<?php

namespace Agz;

use \Arquivo\ArquivoValidacao;

class ValidacaoAgz extends ArquivoValidacao
{

    public function validaFormaPagamento($opcao, $posicao, $linha, $identifica)
    {
        $opcoes = [1, 2, 3];
        if (array_search(trim($opcao), $opcoes) === false) {
            throw new \Exception($identifica . " - Posição " . $posicao . " inválida, informado: " . $opcao);
        }
    }

    public function validaFormaArrecadacao($opcao, $posicao, $linha, $identifica)
    {
        $opcoes = [1, 2, 3];
        if (array_search($opcao, $opcoes) === false) {
            throw new \Exception($identifica . " - Posição " . $posicao . " inválida");
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
            if (($contagem == 150) === false) {
                throw new \Exception("O segmento " . $segmento[0] . " não possui 150 caracteres");
            }
        }
    }

    public function validaData($data, $posicao, $linha, $identifica)
    {
        $pontos = ["\\", "/", "-", "."];
        $dataFormatada = str_replace($pontos, "", $data);

        if (strlen($dataFormatada) != 8) {
            throw new \Exception("Posição " . $posicao . " inválida");
        } else {
            $ano = substr($dataFormatada, 0, 4);
            $mes = substr($dataFormatada, 4, 2);
            $dia = substr($dataFormatada, 6, 2);
            if (strlen($ano) < 4) {
                throw new \Exception("Posição " . $posicao . " inválida");
            } else {
                if (checkdate($mes, $dia, $ano) === false) {
                    throw new \Exception("Posição " . $posicao . " inválida");
                }
            }
        }
    }

}
