<?php

namespace Gerador\Src\Cnab400\Layout;

class Banrisul
{

    public function headerArquivo()
    {
        return [
            1 => [9, 'texto'],
            2 => [17, 'texto'],
            3 => [13, 'num'],
            4 => [7, 'texto'],
            5 => [30, 'texto'],
            6 => [11, 'texto'],
            7 => [7, 'texto'],
            8 => [6, 'data-dmy'],
            9 => [9, 'texto'],
            10 => [4, 'texto'],
            11 => [1, 'texto'],
            12 => [1, 'texto'],
            13 => [1, 'texto'],
            14 => [10, 'texto'],
            15 => [268, 'texto'],
            16 => [6, 'num'],
        ];
    }

    public function headerArquivoDefault()
    {
        return [
            1 => '01REMESSA',
            2 => '',
            4 => '',
            6 => '041BANRISUL',
            7 => '',
            8 => date("Y-m-d"),
            9 => '',
            10 => '',
            11 => '',
            12 => '',
            13 => '',
            14 => '',
            15 => '',
        ];
    }

    public function headerArquivoValidacao()
    {
        return [
        ];
    }

    public function tipoUm()
    {
        return [
            1 => [1, 'num'],
            2 => [16, 'texto'],
            3 => [13, 'num'],
            4 => [7, 'texto'],
            5 => [25, 'texto'],
            6 => [10, 'num'],
            7 => [32, 'texto'],
            8 => [3, 'texto'],
            9 => [1, 'texto'],
            10 => [2, 'num'],
            11 => [10, 'texto'],
            12 => [6, 'data-dmy'],
            13 => [13, 'valor'],
            14 => [3, 'num'],
            15 => [5, 'texto'],
            16 => [2, 'num'],
            17 => [1, 'texto'],
            18 => [6, 'data-dmy'],
            19 => [2, 'texto'],
            20 => [2, 'texto'],
            21 => [1, 'texto'],
            22 => [12, 'texto'],
            23 => [6, 'texto'],
            24 => [13, 'texto'],
            25 => [13, 'texto'],                        
            29 => [13, 'texto'],
            30 => [2, 'num'],
            31 => [14, 'num'],
            32 => [35, 'texto'],
            33 => [5, 'texto'],
            34 => [40, 'texto'],
            35 => [7, 'texto'],
            36 => [3, 'texto'],
            37 => [2, 'texto'],
            38 => [8, 'num'],
            39 => [15, 'texto'],
            40 => [2, 'texto'],
            41 => [4, 'texto'],
            42 => [1, 'texto'],
            43 => [13, 'texto'],
            44 => [2, 'texto'],
            45 => [23, 'texto'],
            46 => [6, 'num'],
        ];
    }

    public function tipoUmDefault()
    {
        return [
            1 => 1,
            2 => '',
            4 => '',
            5 => '',
            8 => '',
            9 => '1',
            10 => '01',
            14 => '041',
            15 => '',
            16 => '08',
            17 => 'A',
            18 => date('Y-m-d'),
            19 => '',
            20 => '',
            21 => '',
            22 => '',
            23 => '',
            24 => '',
            25 => '',            
            29 => '',
            33 => '',
            35 => '',
            36 => '',
            37 => '',
            41 => '',
            42 => '',
            43 => '',
            44 => '',
            45 => '',
        ];
    }

    public function tipoUmValidacao()
    {
        return [
        ];
    }

    public function tipoDois()
    {
        return [
            1 => [1, 'num'],
            2 => [2, 'num'],
            3 => [14, 'num'],
            4 => [13, 'num'],
            5 => [7, 'texto'],
            6 => [25, 'texto'],
            7 => [10, 'num'],
            8 => [35, 'texto'],
            9 => [1, 'num'],
            10 => [2, 'num'],
            11 => [1, 'texto'],
            12 => [90, 'texto'],
            13 => [1, 'texto'],
            14 => [90, 'texto'],
            15 => [1, 'texto'],
            16 => [90, 'texto'],
            17 => [11, 'texto'],
            18 => [6, 'num'],
        ];
    }

    public function tipoDoisDefault()
    {
        return [
            1 => 1,
            2 => '02',
            5 => '',
            6 => '',
            8 => '',
            9 => '1',
            10 => '94',
            11 => '',
            13 => '',
            14 => '',
            15 => '',
            16 => '',
            17 => '',
        ];
    }

    public function tipoDoisValidacao()
    {
        return [
        ];
    }

    public function trailerArquivo()
    {
        return [
            1 => [1, 'num'],
            2 => [26, 'texto'],
            3 => [13, 'valor'],
            4 => [354, 'texto'],
            5 => [6, 'num'],
        ];
    }

    public function trailerArquivoDefault()
    {
        return [
            1 => 9,
            2 => '',
            4 => '',
        ];
    }

    public function trailerArquivoValidacao()
    {
        return [];
    }

}
