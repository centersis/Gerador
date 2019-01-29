<?php

namespace Arquivo;

class Util
{

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

    public function formataNumDecimais($str)
    {
        
        if (is_array($str)) {
            throw new \Exception("Texto não deve ser um array!");
        }
        
        $carac = array(
            '.' => '',
            ',' => '',
        );        
        
        return strtr($str, $carac);
    }

}
