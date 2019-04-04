<?php

namespace Cnab400\Layout;

class Sicredi
{

    public function headerArquivo()
    {
        return [
            1 => [1, 'num'],
            2 => [1, 'num'],
            3 => [7, 'texto'],
            4 => [2, 'num'],
            5 => [15, 'texto'],
            6 => [5, 'num'],
            7 => [14, 'num'],
            8 => [31, 'texto'],
            9 => [3, 'num'],
            10 => [15, 'texto'],
            11 => [8, 'data'],
            12 => [8, 'texto'],
            13 => [7, 'num'],
            14 => [273, 'texto'],
            15 => [4, 'texto'],
            16 => [6, 'numero'],
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
            8 => "",
            9 => "748",
            10 => 'SICREDI',
            11 => date("Ymd"),
            12 => "",
            14 => "",
            15 => '2.00'
        ];
    }

    public function headerArquivoValidacao()
    {
        return [
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
            2 => [1, 'texto'],
            3 => [1, 'texto'],
            4 => [1, 'texto'],
            5 => [12, 'texto'],
            6 => [1, 'texto'],
            7 => [1, 'texto'],
            8 => [1, 'texto'],
            9 => [28, 'texto'],
            10 => [9, 'num'],
            11 => [6, 'texto'],
            12 => [8, 'data'],
            13 => [1, 'texto'],
            14 => [1, 'texto'],
            15 => [1, 'texto'],
            16 => [1, 'texto'],
            17 => [2, 'num'],
            18 => [2, 'num'],
            19 => [4, 'texto'],
            20 => [10, 'valor'],
            21 => [4, 'valor'],
            22 => [12, 'texto'],
            23 => [2, 'num'],
            24 => [10, 'num'],
            25 => [6, 'data'],
            26 => [13, 'valor'],
            27 => [9, 'texto'],
            28 => [1, 'texto'],
            29 => [1, 'texto'],
            30 => [6, 'data'],
            31 => [2, 'num'],
            32 => [2, 'num'],
            33 => [13, 'valor'],
            34 => [6, 'data'],
            35 => [13, 'valor'],
            36 => [13, 'num'],
            37 => [13, 'valor'],
            38 => [1, 'num'],
            39 => [1, 'num'],
            40 => [14, 'num'],
            41 => [40, 'texto'],
            42 => [40, 'texto'],
            43 => [5, 'num'],
            44 => [6, 'num'],
            45 => [1, 'texto'],
            46 => [8, 'texto'],
            47 => [5, 'num'],
            48 => [14, 'num'],
            49 => [41, 'texto'],
            50 => [6, 'num'],
        ];
    }

    public function tipoUmDefault()
    {
        return [
            1 => 1,
            2 => 'A',
            3 => 'A',
            4 => 'A',
            5 => '',
            6 => 'A',
            7 => 'B',
            8 => 'B',
            9 => 'B',
            11 => '',
            12 => 0,
            13 => '',
            14 => 'N',
            15 => '',
            16 => "B",
            17 => 0,
            18 => 0,
            19 => '',
            20 => 0,
            21 => 0,
            22 => '',
            23 => '01',
            27 => '',
            28 => "A",
            29 => "S",
            30 => date('dmy'),
            31 => 0,
            32 => 0,
            33 => 0,
            34 => 0,
            35 => 0,
            36 => 0,
            37 => 0,
            39 => 0,
            43 => 0,
            44 => 0,
            45 => '',
            47 => 0,
            48 => '',
            49 => '',
        ];
    }

    public function tipoUmValidacao()
    {
        return [
            /* 10 => "validaCodigoMulta",
              15 => "validaOpcao1e2",
              23 => "validaData",
              27 => "validaEspecieTitulo",
              29 => "validaData",
              33 => "validaData",
              37 => "validaOpcao1e2",
              38 => "validaCpfeCnpj",
              42 => "validaCep",
              43 => "validaSufixoCep" */
        ];
    }

    public function tipoUmDinamico()
    {
        return [];
    }

    public function tipoDois()
    {
        return [
            1 => [1, 'num'],
            2 => [11, 'texto'],
            3 => [9, 'num'],
            4 => [80, 'texto'],
            5 => [80, 'texto'],
            6 => [80, 'texto'],
            7 => [80, 'texto'],
            8 => [10, 'num'],
            9 => [43, 'texto'],
            10 => [6, 'num'],
        ];
    }

    public function tipoDoisDefault()
    {
        return [
            1 => 2,
            2 => "",
            4 => "",
            5 => "",
            6 => "",
            7 => "",
            9 => "",
        ];
    }

    public function tipoDoisValidacao()
    {
        return [
            /* 6 => "validaData",
              8 => "validaData" */
        ];
    }

    public function tipoDoisDinamico()
    {
        return [];
    }

    public function tipoSeis()
    {
        return [
            1 => [1, 'num'],
            2 => [15, 'num'],
            3 => [10, 'num'],
            4 => [5, 'num'],
            5 => [14, 'num'],
            6 => [41, 'texto'],
            7 => [45, 'texto'],
            8 => [20, 'texto'],
            9 => [8, 'texto'],
            10 => [2, 'texto'],
            11 => [233, 'texto'],
            12 => [6, 'num'],
        ];
    }

    public function tipoSeisDefault()
    {
        return [
            1 => 6,
            4 => 0,
            11 => "",
        ];
    }

    public function tipoSeisValidacao()
    {
        return [];
    }

    public function tipoSeisDinamico()
    {
        return [];
    }

    public function traillerArquivo()
    {
        return [
            1 => [1, 'num'],
            2 => [1, 'num'],
            3 => [3, 'num'],
            4 => [5, 'num'],
            5 => [384, 'texto'],
            6 => [6, 'num'],
        ];
    }

    public function traillerArquivoDefault()
    {
        return [
            1 => 9,
            2 => 1,
            3 => 748,
            5 => '',
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
