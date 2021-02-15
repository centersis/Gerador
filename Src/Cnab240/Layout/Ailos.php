<?php

namespace Gerador\Src\Cnab240\Layout;

class Ailos
{

    public function headerArquivo()
    {
        return [
            1 => [3, 'num'],
            2 => [4, 'num'],
            3 => [1, 'num'],
            4 => [9, 'texto'],
            5 => [1, 'num'],
            6 => [14, 'doc'],
            7 => [20, 'texto'],
            8 => [5, 'num'],
            9 => [1, 'texto'],
            10 => [12, 'num'],
            11 => [1, 'texto'],
            12 => [1, 'texto'],
            13 => [30, 'texto'],
            14 => [30, 'texto'],
            15 => [10, 'texto'],
            16 => [1, 'num'],
            17 => [8, 'data-d-m-Y'],
            18 => [6, 'num'],
            19 => [6, 'num'],
            20 => [3, 'num'],
            21 => [5, 'num'],
            22 => [20, 'texto'],
            23 => [20, 'texto'],
            24 => [29, 'texto'],
        ];
    }

    public function headerArquivoDefault()
    {
        return [
            1 => 85,
            2 => 0,
            3 => 0,
            4 => '',
            5 => 2,
            14 => "AILOS",
            15 => '',
            16 => 1,
            17 => date('dmY'),
            18 => date('His'),
            20 => 87,
            21 => 1600,
            22 => '',
            23 => '',
            24 => ''
        ];
    }

    public function headerArquivoValidacao()
    {
        return [
            5 => "validaOpcao1e2",
            6 => "validaCpfeCnpj",
            16 => "validaHora",
        ];
    }

    public function headerLote()
    {
        return [
            1 => [3, 'num'],
            2 => [4, 'num'],
            3 => [1, 'num'],
            4 => [1, 'texto'],
            5 => [2, 'num'],
            6 => [2, 'texto'],
            7 => [3, 'num'],
            8 => [1, 'texto'],
            9 => [1, 'num'],
            10 => [15, 'num'],
            11 => [20, 'texto'],
            12 => [5, 'num'],
            13 => [1, 'texto'],
            14 => [12, 'num'],
            15 => [1, 'texto'],
            16 => [1, 'texto'],
            17 => [30, 'texto'],
            18 => [40, 'texto'],
            19 => [40, 'texto'],
            20 => [8, 'num'],
            21 => [8, 'data-dmY'],
            22 => [8, 'data-dmY'],
            23 => [33, 'texto']
        ];
    }

    public function headerLoteDefault()
    {
        return [
            1 => 85,
            2 => 1,
            3 => 1,
            4 => "R",
            5 => 1,
            6 => '',
            7 => 45,
            8 => '',
            9 => 2,
            18 => '',
            19 => '',
            21 => date('Y-m-d'),
            22 => 0,
            23 => ''
        ];
    }

    public function headerLoteValidacao()
    {
        return [];
    }

    public function segmentoP()
    {
        return [
            1 => [3, 'num'],
            2 => [4, 'num'],
            3 => [1, 'num'],
            4 => [5, 'num'],
            5 => [1, 'texto'],
            6 => [1, 'texto'],
            7 => [2, 'num'],
            8 => [5, 'num'],
            9 => [1, 'texto'],
            10 => [12, 'num'],
            11 => [1, 'texto'],
            12 => [1, 'texto'],
            13 => [20, 'texto'],
            14 => [1, 'num'],
            15 => [1, 'num'],
            16 => [1, 'texto'],
            17 => [1, 'num'],
            18 => [1, 'texto'],
            19 => [15, 'texto'],
            20 => [8, 'data-dmY'],
            21 => [15, 'valor'],
            22 => [5, 'num'],
            23 => [1, 'texto'],
            24 => [2, 'num'],
            25 => [1, 'texto'],
            26 => [8, 'data-dmY'],
            27 => [1, 'num'],
            28 => [8, 'data-dmY'],
            29 => [15, 'vlor'],
            30 => [1, 'num'],
            31 => [8, 'data-dmY'],
            32 => [15, 'valor'],
            33 => [15, 'valor'],
            34 => [15, 'valor'],
            35 => [25, 'texto'],
            36 => [1, 'num'],
            37 => [2, 'num'],
            38 => [1, 'num'],
            39 => [3, 'texto'],
            40 => [2, 'num'],
            41 => [10, 'num'],
            42 => [1, 'texto']
        ];
    }

    public function segmentoPDefault()
    {
        return [
            1 => 85,
            2 => 1,
            3 => 3,
            5 => "P",
            6 => '',
            7 => 1,
            15 => 1,
            16 => 1,
            17 => 2,
            18 => 2,
            24 => 2,
            25 => 'A',
            27 => 3,
            28 => 0,
            29 => 0,
            30 => 0,
            31 => 0,
            32 => 0,
            33 => 0,
            34 => 0,
            36 => 3,
            37 => 0,
            38 => 2,
            39 => '',
            40 => 9,
            41 => 0,
            42 => ''
        ];
    }

    public function segmentoPValidacao()
    {
        return [
            /* 7 => "validaMovimentoRemessa",
              17 => "validaOpcao1e2",
              18 => "validaOpcao1e2",
              24 => "validaEspecieTitulo",
              25 => "validaIdTitulo",
              28 => "validaJuroseDescData",
              29 => "validaJurosDescValor",
              27 => "validaCodigo",
              //31 => "validaJuroseDescData",
              32 => "validaJurosDescValor",
              36 => "validaCodigoProtesto",
              36 => "validaCodigoProteMovi",
              40 => "codigoMoeda", */
        ];
    }

    public function segmentoQ()
    {
        return [
            1 => [3, 'num'],
            2 => [4, 'num'],
            3 => [1, 'num'],
            4 => [5, 'num'],
            5 => [1, 'texto'],
            6 => [1, 'texto'],
            7 => [2, 'num'],
            8 => [1, 'num'],
            9 => [15, 'num'],
            10 => [40, 'texto'],
            11 => [40, 'texto'],
            12 => [15, 'texto'],
            13 => [5, 'num'],
            14 => [3, 'num'],
            15 => [15, 'texto'],
            16 => [2, 'texto'],
            17 => [1, 'num'],
            18 => [15, 'num'],
            19 => [40, 'texto'],
            20 => [3, 'num'],
            21 => [20, 'texto'],
            22 => [8, 'texto'],
        ];
    }

    public function segmentoQDefault()
    {
        return [
            1 => 85,
            2 => 1,
            3 => 3,
            5 => "Q",
            6 => '',
            7 => 1,
            20 => 0,
            21 => '',
            22 => ''
        ];
    }

    public function segmentoQValidacao()
    {
        return [
            /* 7 => "validaMovimentoRemessa",
              8 => "validaOpcao1e2",
              9 => "validaCpfeCnpj",
              13 => "validaCep",
              14 => "validaSufixoCep",
              16 => "validaUf",
              17 => "validaOpcao1e2",
              18 => "validaCpfeCnpj", */
        ];
    }

    public function segmentoR()
    {
        return [
            1 => [3, 'num'],
            2 => [4, 'num'],
            3 => [1, 'num'],
            4 => [5, 'num'],
            5 => [1, 'texto'],
            6 => [1, 'texto'],
            7 => [2, 'num'],
            8 => [1, 'num'],
            9 => [8, 'data-dmY'],
            10 => [8, 'valor'],
            11 => [1, 'num'],
            12 => [8, 'data-dmY'],
            13 => [15, 'valor'],
            14 => [1, 'texto'],
            15 => [8, 'data-dmY'],
            16 => [15, 'valor'],
            17 => [10, 'texto'],
            18 => [40, 'texto'],
            19 => [40, 'texto'],
            20 => [20, 'texto'],
            21 => [8, 'num'],
            22 => [3, 'num'],
            23 => [5, 'num'],
            24 => [1, 'texto'],
            25 => [12, 'num'],
            26 => [1, 'texto'],
            27 => [1, 'texto'],
            28 => [1, 'num'],
            29 => [9, 'texto'],
        ];
    }

    public function segmentoRDefault()
    {
        return [
            1 => 85,
            2 => 1,
            3 => 3,
            5 => "R",
            6 => '',
            7 => 1,
            8 => 0,
            9 => 0,
            10 => 0,
            11 => 0,
            12 => 0,
            13 => 0,
            14 => 0,
            15 => 0,
            16 => 0,
            17 => '',
            18 => '',
            19 => '',
            20 => '',
            21 => 0,
            22 => 0,
            23 => 0,
            24 => '',
            25 => 0,
            26 => 0,
            27 => 0,
            28 => 2,
            29 => ''
        ];
    }

    public function segmentoRValidacao()
    {
        return [
            /* 7 => "validaMovimentoRemessa",
              8 => "validaCodigo",
              //9 => "validaJuroseDescData",
              10 => "validaJurosDescValor",
              11 => "validaCodigo",
              12 => "validaJuroseDescData",
              13 => "validaJurosDescValor",
              14 => "validaCodigo",
              //15 => "validaJuroseDescData",
              16 => "validaJurosDescValor", */
        ];
    }

    public function trailerLote()
    {
        return [
            1 => [3, 'num'],
            2 => [4, 'num'],
            3 => [1, 'num'],
            4 => [9, 'texto'],
            5 => [6, 'num'],
            6 => [6, 'num'],
            7 => [17, 'valor'],
            8 => [6, 'num'],
            9 => [17, 'valor'],
            10 => [6, 'num'],
            11 => [17, 'valor'],
            12 => [6, 'num'],
            13 => [17, 'valor'],
            14 => [8, 'num'],
            15 => [117, 'texto'],
        ];
    }

    public function trailerLoteDefault()
    {
        return [
            1 => 85,
            2 => 1,
            3 => 5,
            4 => '',
            8 => 0,
            9 => 0,
            10 => 0,
            11 => 0,
            12 => 0,
            13 => 0,
            14 => '',
            15 => '',
        ];
    }

    public function trailerLoteValidacao()
    {
        return [];
    }

    public function trailerArquivo()
    {
        return [
            1 => [3, 'num'],
            2 => [4, 'num'],
            3 => [1, 'num'],
            4 => [9, 'texto'],
            5 => [6, 'num'],
            6 => [6, 'num'],
            7 => [6, 'num'],
            8 => [205, 'texto'],
        ];
    }

    public function trailerArquivoDefault()
    {
        return [
            1 => 85,
            2 => 9999,
            3 => 9,
            4 => '',
            5 => 1,
            7 => 0,
            8 => '',
        ];
    }

    public function trailerArquivoValidacao()
    {
        return [];
    }

}
