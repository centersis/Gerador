<?php

namespace Src\Agz;

use Src\Arquivo\ArquivoValidacao;

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
            var_dump($linha);
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
}
