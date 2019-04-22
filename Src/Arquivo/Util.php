<?php

namespace Src\Arquivo;

class Util
{

    public function somenteNumeros($valor)
    {
        return preg_replace("/[^0-9]/", "", $valor);
    }

    public function trataValor($valor)
    {
        $ponto = strpos($valor, '.');
        $virgula = strpos($valor, ',');


        if ($ponto or $virgula) {
            $valor = $this->floatCliente($valor);
        }

        return $this->somenteNumeros($valor);
    }

    public function toFloat($valor)
    {
        $valorLimpo = $this->somenteNumeros($valor);

        $inicio = substr($valorLimpo, 0, -2);
        $fim = substr($valorLimpo, -2);

        return (float) ($inicio . '.' . $fim);
    }

    public function floatCliente($numero, $decimal = 2)
    {
        $float = $this->floatBanco($numero);
        return number_format($float, $decimal, ',', '.');
    }

    public function floatBanco($numero)
    {
        if (!empty($numero)) {
            //Verifica de o número ja esta formatado
            if (is_numeric($numero)) {
                return (float) $numero;
            }

            $valorA = str_replace('.', '', $numero);
            $valorB = str_replace(',', '.', $valorA);
            return (float) $valorB;
        }

        return 0;
    }

    public function preparaTexto($texto, $case)
    {
        if (is_array($texto)) {
            throw new \Exception("Texto não deve ser um array!");
        }

        $retorno = $this->removeAcentos(trim(html_entity_decode($texto)));

        if ($case == 'upper') {
            return strtoupper($retorno);
        }

        if ($case == 'lower') {
            return strtolower($retorno);
        }

        return $retorno;
    }

    private function removeAcentos($string)
    {
        return preg_replace(
            [
            '/\xc3[\x80-\x85]/',
            '/\xc3\x87/',
            '/\xc3[\x88-\x8b]/',
            '/\xc3[\x8c-\x8f]/',
            '/\xc3([\x92-\x96]|\x98)/',
            '/\xc3[\x99-\x9c]/',
            '/\xc3[\xa0-\xa5]/',
            '/\xc3\xa7/',
            '/\xc3[\xa8-\xab]/',
            '/\xc3[\xac-\xaf]/',
            '/\xc3([\xb2-\xb6]|\xb8)/',
            '/\xc3[\xb9-\xbc]/',
            ], str_split('ACEIOUaceiou', 1), $this->isUtf8($string) ? $string : utf8_encode($string)
        );
    }

    private function isUtf8($string)
    {
        return preg_match('%^(?:
                 [\x09\x0A\x0D\x20-\x7E]
                | [\xC2-\xDF][\x80-\xBF]
                | \xE0[\xA0-\xBF][\x80-\xBF]
                | [\xE1-\xEC\xEE\xEF][\x80-\xBF]{2}
                | \xED[\x80-\x9F][\x80-\xBF]
                | \xF0[\x90-\xBF][\x80-\xBF]{2}
                | [\xF1-\xF3][\x80-\xBF]{3}
                | \xF4[\x80-\x8F][\x80-\xBF]{2}
                )*$%xs', $string
        );
    }

    public function adicionarZerosEsq($str, $tamanho)
    {
        return str_pad($str, $tamanho, '0', STR_PAD_LEFT);
    }

    public function adicionarEspacosDir($str, $tamanho)
    {
        $len = strlen($str);
        if ($len <= $tamanho) {
            return str_pad($str, $tamanho, ' ', STR_PAD_RIGHT);
        } elseif ($len > $tamanho) {
            return substr($str, 0, $tamanho);
        }
    }
}
