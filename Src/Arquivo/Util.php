<?php

namespace Gerador\Src\Arquivo;

class Util
{

    public function somenteNumeros($valor)
    {
        return preg_replace("/[^0-9]/", "", $valor);
    }

    public function trataValor($valor)
    {
        $valorCliente = $this->floatCliente($valor);

        return $this->somenteNumeros($valorCliente);
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

        $retorno = $this->removeAcentos(rtrim(html_entity_decode($texto)));

        if ($case == 'upper') {
            return strtr(mb_strtoupper($retorno), "àáâãäåæçèéêëìíîïðñòóôõö÷øùüúþÿ", "ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖ×ØÙÜÚÞß");
        }

        if ($case == 'lower') {
            return strtr(mb_strtolower($retorno), "ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖ×ØÙÜÚÞß", "àáâãäåæçèéêëìíîïðñòóôõö÷øùüúþÿ");
        }

        return $retorno;
    }

    private function removeAcentos($string)
    {
        $normalizeChars = array(
            'Á' => 'A', 'À' => 'A', 'Â' => 'A', 'Ã' => 'A', 'Å' => 'A', 'Ä' => 'A', 'Æ' => 'AE', 'Ç' => 'C',
            'É' => 'E', 'È' => 'E', 'Ê' => 'E', 'Ë' => 'E', 'Í' => 'I', 'Ì' => 'I', 'Î' => 'I', 'Ï' => 'I', 'Ð' => 'Eth',
            'Ñ' => 'N', 'Ó' => 'O', 'Ò' => 'O', 'Ô' => 'O', 'Õ' => 'O', 'Ö' => 'O', 'Ø' => 'O',
            'Ú' => 'U', 'Ù' => 'U', 'Û' => 'U', 'Ü' => 'U', 'Ý' => 'Y', 'Ŕ' => 'R',

            'á' => 'a', 'à' => 'a', 'â' => 'a', 'ã' => 'a', 'å' => 'a', 'ä' => 'a', 'æ' => 'ae', 'ç' => 'c',
            'é' => 'e', 'è' => 'e', 'ê' => 'e', 'ë' => 'e', 'í' => 'i', 'ì' => 'i', 'î' => 'i', 'ï' => 'i', 'ð' => 'eth',
            'ñ' => 'n', 'ó' => 'o', 'ò' => 'o', 'ô' => 'o', 'õ' => 'o', 'ö' => 'o', 'ø' => 'o',
            'ú' => 'u', 'ù' => 'u', 'û' => 'u', 'ü' => 'u', 'ý' => 'y', 'ŕ' => 'r', 'ÿ' => 'y',

            'ß' => 'sz', 'þ' => 'thorn', 'º' => '', 'ª' => '', '°' => '',
        );
        return preg_replace('/[^0-9a-zA-Z !*\-$\(\)\[\]\{\},.;:\/\\#%&@+=]/', '', strtr($string, $normalizeChars));
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
