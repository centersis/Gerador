<?php

namespace Src\Agz\Layout;

class AgzAegea
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
            7 => [8, 'data-Ymd'],
            8 => [6, 'num'],
            9 => [2, 'num'],
            10 => [69, 'texto'],
        ];
    }

    public function segmentoADefault()
    {
        return [
            1 => 'A',
            7 => date('Y-m-d'),
            10 => "",
        ];
    }

    public function segmentoAValidacao()
    {
        return [
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
            3 => [8, 'data-Ymd'],
            4 => [8, 'data-Ymd'],
            5 => [44, 'texto'],
            6 => [12, 'valor'],
            7 => [7, 'valor'],
            8 => [8, 'num'],
            9 => [8, 'texto'],
            10 => [1, 'num'],
            11 => [33, 'texto']
        ];
    }

    public function segmentoGDefault()
    {
        return [
            1 => "G",
        ];
    }

    public function segmentoGValidacao()
    {
        return [
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
            3 => [17, 'valor'],
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
