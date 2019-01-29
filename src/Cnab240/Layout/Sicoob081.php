<?php

namespace Cnab240\Layout;

class Sicoob081
{

    public function headerArquivo()
    {
        return [
            1 => [3, 'num'],
            2 => [4, 'num'],
            3 => [1, 'num'],
            4 => [9, 'texto'],
            5 => [1, 'num'],
            6 => [14, 'num'],
            7 => [20, 'texto'],
            8 => [5, 'num'],
            9 => [1, 'num'],
            10 => [12, 'num'],
            11 => [1, 'texto'],
            12 => [1, 'texto'],
            13 => [30, 'texto'],
            14 => [30, 'texto'],
            15 => [10, 'texto'],
            16 => [1, 'num'],
            17 => [8, 'num'],
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
            2 => 0000,
            3 => 0,
            4 => "",
            7 => "",
            9 => " ",
            12 => "",
            15 => "",
            16 => 1,
            17 => date('dmY'),
            18 => date('his'),
            20 => 81,
            21 => 00000,
            22 => "",
            23 => "",
            24 => "",
        ];
    }

    public function headerArquivoValidacao()
    {
        return [
            5 => "validaOpcao1e2",
            6 => "validaCpfeCnpj",
            17 => "validaData",
        ];
    }

    public function headerArquivoDinamico()
    {
        return [];
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
            21 => [8, 'num'],
            22 => [8, 'num'],
            23 => [33, 'texto'],
        ];
    }

    public function headerLoteDefault($array)
    {
        return [
            1 => $array[0],
            2 => 0001,
            3 => 1,
            4 => "R",
            5 => 01,
            6 => "",
            7 => "040",
            8 => "",
            9 => $array[4],
            10 => $array[5],
            11 => "",
            12 => $array[7],
            13 => $array[8],
            14 => $array[9],
            15 => $array[10],
            16 => "",
            17 => $array[12],
            18 => "",
            19 => "",
            20 => 0,
            21 => date('dmY'),
            22 => 00000000,
            23 => "",
        ];
    }

    public function headerLoteValidacao()
    {
        return [
            9 => "validaOpcao1e2",
            10 => "validaCpfeCnpj",
            21 => "validaData",
        ];
    }

    public function headerLoteDinamico()
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
            20 => [8, 'num'],
            21 => [15, 'num'],
            22 => [5, 'num'],
            23 => [1, 'texto'],
            24 => [2, 'num'],
            25 => [1, 'texto'],
            26 => [8, 'num'],
            27 => [1, 'num'],
            28 => [8, 'num'],
            29 => [15, 'num'],
            30 => [1, 'num'],
            31 => [8, 'num'],
            32 => [15, 'num'],
            33 => [15, 'num'],
            34 => [15, 'num'],
            35 => [25, 'texto'],
            36 => [1, 'num'],
            37 => [2, 'num'],
            38 => [1, 'num'],
            39 => [3, 'texto'],
            40 => [2, 'num'],
            41 => [10, 'num'],
            42 => [1, 'texto'],
        ];
    }

    public function segmentoPDefault($array)
    {
        return [
            1 => $array[0],
            2 => 0001,
            3 => 3,
            5 => "P",
            6 => "",
            8 => $array[7],
            9 => $array[8],
            10 => $array[9],
            11 => $array[10],
            12 => "",
            15 => 0,
            16 => "",
            22 => 00000,
            23 => "",
            26 => date('dmY'),
            31 => 0,
            32 => 0,
            33 => 0,
            34 => 0,
            37 => 0,
            38 => 0,
            39 => "",
            41 => 0000000000,
            42 => "",
        ];
    }

    public function segmentoPValidacao()
    {
        return [
            7 => "validaMovimentoRemessa",
            17 => "validaOpcao1e2",
            18 => "validaOpcao1e2",
            24 => "validaEspecieTitulo",
            25 => "validaIdTitulo",
            26 => "validaData",
            28 => "validaData",
            28 => "validaJuroseDescData",
            29 => "validaJurosDescValor",
            27 => "validaCodigo",
            //31 => "validaData",
            //31 => "validaJuroseDescData",
            32 => "validaJurosDescValor",
            36 => "validaCodigoProtesto",
            36 => "validaCodigoProteMovi",
            40 => "codigoMoeda",
        ];
    }

    public function segmentoPDinamico()
    {
        return [];
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

    public function segmentoQDefault($array)
    {
        return [
            1 => $array[0],
            2 => 0001,
            3 => 3,
            5 => "Q",
            6 => "",
            17 => $array[4],
            18 => $array[5],
            21 => "",
            22 => "",
        ];
    }

    public function segmentoQValidacao()
    {
        return [
            7 => "validaMovimentoRemessa",
            8 => "validaOpcao1e2",
            9 => "validaCpfeCnpj",
            13 => "validaCep",
            14 => "validaSufixoCep",
            16 => "validaUf",
            17 => "validaOpcao1e2",
            18 => "validaCpfeCnpj",
        ];
    }

    public function segmentoQDinamico()
    {
        return [];
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
            9 => [8, 'num'],
            10 => [15, 'num'],
            11 => [1, 'num'],
            12 => [8, 'num'],
            13 => [15, 'num'],
            14 => [1, 'texto'],
            15 => [8, 'num'],
            16 => [15, 'num'],
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

    public function segmentoRDefault($array)
    {
        return [
            1 => $array[0],
            2 => 0001,
            3 => 3,
            5 => "R",
            6 => "",
            9 => 0,
            10 => 0,
            12 => 0,
            13 => 0,
            17 => "",
            19 => "",
            20 => "",
            21 => 00000000,
            22 => 000,
            23 => 00000,
            24 => "",
            25 => 00000000000000,
            26 => "",
            27 => "",
            28 => 0,
            29 => "",
        ];
    }

    public function segmentoRValidacao()
    {
        return [
            7 => "validaMovimentoRemessa",
            8 => "validaCodigo",
            //9 => "validaData",
            //9 => "validaJuroseDescData",
            10 => "validaJurosDescValor",
            11 => "validaCodigo",
            12 => "validaData",
            12 => "validaJuroseDescData",
            13 => "validaJurosDescValor",
            14 => "validaCodigo",
            //15 => "validaData",
            //15 => "validaJuroseDescData",
            16 => "validaJurosDescValor",
        ];
    }

    public function segmentoRDinamico()
    {
        return [];
    }

    public function traillerLote()
    {
        return [
            1 => [3, 'num'],
            2 => [4, 'num'],
            3 => [1, 'num'],
            4 => [9, 'texto'],
            5 => [6, 'num'],
            6 => [6, 'num'],
            7 => [17, 'num'],
            8 => [6, 'num'],
            9 => [17, 'num'],
            10 => [6, 'num'],
            11 => [17, 'num'],
            12 => [6, 'texto'],
            13 => [17, 'num'],
            14 => [8, 'texto'],
            15 => [117, 'texto'],
        ];
    }

    public function traillerLoteDefault($array)
    {
        return [
            1 => $array[0],
            2 => 0001,
            3 => 5,
            4 => "",
            8 => 0,
            9 => 0,
            10 => 0,
            11 => 0,
            12 => "0",
            13 => 0,
            14 => "",
            15 => "",
        ];
    }

    public function traillerLoteValidacao()
    {
        return [];
    }

    public function traillerLoteDinamico($quanTitulos, $somaValor)
    {
        return [
            6 => $quanTitulos,
            7 => $somaValor,
        ];
    }

    public function traillerArquivo()
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

    public function traillerArquivoDefault($array)
    {
        return [
            1 => $array[0],
            2 => 9999,
            3 => 9,
            4 => "",
            5 => 1,
            7 => 0,
            8 => "",
        ];
    }

    public function traillerArquivoValidacao()
    {
        return [];
    }

    public function traillerArquivoDinamico($contaLinhas)
    {
        return [
            6 => $contaLinhas,
        ];
    }

    public function segmentosObrigatorios()
    {
        return [
            0, 1, "P", "Q", 5, 9,
        ];
    }

}
