<?php

namespace Agz\Layout;

class Agz02
{

    public function segmentoA()
    {
        return [
            1 => [1, 'texto'],
            2 => [1, 'num'],
            3 => [20, 'texto'],
            4 => [20, 'texto'],
            5 => [3, 'num'],
            6 => [20, 'texto'],
            7 => [8, 'num'],
            8 => [6, 'num'],
            9 => [2, 'num'],
            10 => [69, 'texto'],
        ];
    }

    public function segmentoADefault()
    {
        return [
            1 => 'A',
            7 => date('Ymd'),
            9 => 04,
            10 => "",
        ];
    }

    public function segmentoAValidacao()
    {
        return [
            7 => "validaData",
        ];
    }

    public function segmentoADinamico()
    {
        return[];
    }

    public function segmentoG()
    {
        return [
            1 => [1, 'texto'],
            2 => [20, 'texto'],
            3 => [8, 'texto'],
            4 => [8, 'texto'],
            5 => [44, 'texto'],
            6 => [12, 'num'],
            7 => [7, 'num'],
            8 => [8, 'num'],
            9 => [8, 'texto'],
            10 => [1, 'num'],
            11 => [23, 'texto'],
            12 => [1, 'num'],
            13 => [9, 'texto'],
        ];
    }

    public function segmentoGDefault()
    {
        return [
            1 => "G",
            11 => "",
            13 => "",
        ];
    }
    
    public function segmentoGValidacao()
    {
        return [
            5 => "validaCodigoBarra",
            10 => "validaFormaArrecadacao",
            12 => "validaFormaPagamento"
        ];
    }

    public function segmentoGDinamico()
    {
        return [];
    }

    public function segmentoZ()
    {
        return [
            1 => [1, 'texto'],
            2 => [6, 'num'],
            3 => [17, 'num'],
            4 => [126, 'texto'],
        ];
    }

    public function segmentoZDefault()
    {
        return [
            1 => "Z",
            4 => "",
        ];
    }

    public function segmentoZValidacao()
    {
        return [];
    }

    public function segmentoZDinamico($contaLinhas, $somaValor)
    {
        return[
            2 => $contaLinhas,
            3 => $somaValor,
        ];
    }

    public function segmentosObrigatorios()
    {
        return ["A", "G", "Z"];
    }

}
