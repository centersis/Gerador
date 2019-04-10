<?php

namespace Cnab400\Layout;

class Safra
{

    public function headerArquivo()
    {
        return [
            1 => [1, 'num'],
            2 => [1, 'num'],
            3 => [7, 'texto'],
            4 => [2, 'num'],
            5 => [8, 'texto'],
            6 => [7, 'texto'],
            7 => [14, 'num'],
            8 => [6, 'texto'],
            9 => [30, 'texto'],
            10 => [3, 'num'],
            11 => [11, 'texto'],
            12 => [4, 'texto'],
            13 => [6, 'data-dmy'],
            14 => [291, 'texto'],
            15 => [3, 'num'],
            16 => [6, 'num'],
        ];
    }

    public function headerArquivoDefault()
    {
        return [
            1 => 0,
            2 => 1,
            3 => "REMESSA",
            4 => 01,
            5 => "COBRANCA",
            6 => '',
            8 => "",
            10 => '422',
            11 => 'SAFRA',
            12 => "",
            13 => date('Y-m-d'),
            14 => "",
        ];
    }

    public function headerArquivoValidacao()
    {
        return [
            13 => "validaData",
        ];
    }

    public function headerArquivoDinamico()
    {
        return [];
    }

    public function tipoUm()
    {
        return [
            1 => [1, 'num'],
            2 => [2, 'num'],
            3 => [14, 'num'],
            4 => [14, 'num'],
            5 => [6, 'texto'],
            6 => [25, 'texto'],
            7 => [9, 'num'],
            8 => [30, 'texto'],
            9 => [1, 'num'],
            10 => [2, 'num'],
            11 => [1, 'texto'],
            12 => [2, 'num'],
            13 => [1, 'num'],
            14 => [2, 'num'],
            15 => [10, 'texto'],
            16 => [6, 'data-dmy'],
            17 => [13, 'valor'],
            18 => [3, 'num'],
            19 => [5, 'num'],
            20 => [2, 'num'],
            21 => [1, 'texto'],
            22 => [6, 'data-dmy'],
            23 => [2, 'num'],
            24 => [2, 'num'],
            25 => [13, 'valor'],
            26 => [6, 'data-dmy'],
            27 => [13, 'valor'],
            28 => [13, 'valor'],
            29 => [13, 'valor'],
            30 => [2, 'num'],
            31 => [14, 'num'],
            32 => [40, 'texto'],
            33 => [40, 'texto'],
            34 => [10, 'texto'],
            35 => [2, 'texto'],
            36 => [8, 'num'],
            37 => [15, 'texto'],
            38 => [2, 'texto'],
            39 => [30, 'texto'],
            40 => [7, 'texto'],
            41 => [3, 'num'],
            42 => [3, 'num'],
            43 => [6, 'num'],
        ];
    }

    public function tipoUmDefault()
    {
        return [
            1 => 1,
            2 => '02',
            5 => '',
            6 => '',
            8 => '',
            9 => '0',
            10 => '00',
            11 => '',
            12 => 0,
            13 => '1',
            14 => '01',
            15 => '',
            18 => 422,
            20 => '01',
            21 => 'N',
            23 => '07',
            24 => '0',
            25 => '0',
            26 => '0',
            27 => '0',
            28 => '0',
            29 => '0',
            35 => '',
            39 => '',
            40 => '',
            41 => '422',
        ];
    }

    public function tipoUmValidacao()
    {
        return [
        ];
    }

    public function tipoUmDinamico()
    {
        return [];
    }

    public function traillerArquivo()
    {
        return [
            1 => [1, 'num'],
            2 => [367, 'texto'],
            3 => [8, 'num'],
            4 => [15, 'valor'],
            5 => [3, 'num'],
            6 => [6, 'num'],
        ];
    }

    public function traillerArquivoDefault()
    {
        return [
            1 => 9,
            2 => '',
        ];
    }

    public function traillerArquivoValidacao()
    {
        return [];
    }

    public function traillerArquivoDinamico()
    {
        return [];
    }

    public function segmentosObrigatorios()
    {
        return [
            0, 1, 9,
        ];
    }

}
