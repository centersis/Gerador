<?php

namespace Gerador\Src\Cnab240\Layout;

class Unicred
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
            9 => [1, 'num'],
            10 => [14, 'num'],
            11 => [30, 'texto'],
            12 => [30, 'texto'],
            13 => [10, 'texto'],
            14 => [1, 'num'],
            15 => [8, 'data-dmY'],
            16 => [6, 'texto'],
            17 => [6, 'num'],
            18 => [3, 'num'],
            19 => [5, 'num'],
            20 => [3, 'num'],
            21 => [17, 'num'],
            22 => [20, 'texto'],
            23 => [29, 'texto'],
        ];
    }

    public function headerArquivoDefault()
    {
        return [
            1 => 136,
            2 => 0,
            3 => 0,
            4 => "",
            5 => 2,
            7 => "",
            12 => "UNICRED DO BRASIL",
            13 => "",
            14 => 1,
            15 => date('d-m-Y'),
            16 => date('h:i:s'),
            18 => "085",
            19 => 0,
            20 => 0,
            21 => "",
            22 => "",
            23 => ""
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
            14 => [14, 'num'],
            15 => [30, 'texto'],
            16 => [80, 'texto'],
            17 => [8, 'num'],
            18 => [8, 'data-dmY'],
            19 => [8, 'data-dmY'],
            20 => [2, 'num'],
            21 => [31, 'texto']
        ];
    }

    public function headerLoteDefault($headerArquivo)
    {
        return [
            1 => $headerArquivo[1],
            2 => 1,
            3 => 1,
            4 => "R",
            5 => 1,
            6 => "",
            7 => "044",
            8 => "",
            9 => $headerArquivo[5],
            10 => $headerArquivo[6],
            11 => "",
            12 => $headerArquivo[8],
            13 => $headerArquivo[9],
            14 => $headerArquivo[10],
            15 => $headerArquivo[11],
            16 => "",
            17 => 0,
            18 => date('dmY'),
            19 => 0,
            20 => 0,
            21 => ""
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
            11 => [1, 'num'],
            12 => [1, 'num'],
            13 => [8, 'texto'],
            14 => [1, 'num'],
            15 => [2, 'num'],
            16 => [4, 'texto'],
            17 => [15, 'texto'],
            18 => [8, 'data-dmY'],
            19 => [15, 'valor'],
            20 => [5, 'num'],
            21 => [1, 'texto'],
            22 => [1, 'texto'],
            23 => [1, 'texto'],
            24 => [1, 'texto'],
            25 => [8, 'data-dmY'],
            26 => [1, 'num'],
            27 => [8, 'texto'],
            28 => [15, 'valor'],
            29 => [1, 'num'],
            30 => [8, 'data-dmY'],
            31 => [15, 'valor'],
            32 => [15, 'texto'],
            33 => [15, 'valor'],
            34 => [25, 'texto'],
            35 => [1, 'num'],
            36 => [2, 'num'],
            37 => [4, 'texto'],
            38 => [2, 'num'],
            39 => [10, 'num'],
            40 => [1, 'texto']
        ];
    }

    public function segmentoPDefault()
    {
        return [
            1 => 136,
            2 => 1,
            3 => 3,           
            5 => "P",
            6 => "",
            7 => 1,
            12 => 0,
            14 => "",
            15 => 21,
            16 => "",
            20 => "",
            21 => "",
            22 => "N",
            23 => "",
            24 => "N",
            26 => 5,
            27 => "",
            28 => 0,
            29 => 0,
            30 => 0,
            31 => 0,
            32 => "",
            33 => 0,
            34 => "",
            35 => 0,
            36 => 0,
            37 => "",
            38 => 9,
            39 => 0,
            40 => ''
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
            20 => [23, 'texto'],
            21 => [8, 'texto']
        ];
    }

    public function segmentoQDefault()
    {
        return [
            1 => 136,
            2 => 1,
            3 => 3,
            5 => "Q",
            6 => "",
            7 => 1,
            17 => 0,
            18 => 0,
            19 => "",
            20 => "",
            21 => ""
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
            8 => [48, 'texto'],
            9 => [1, 'texto'],
            10 => [8, 'texto'],
            11 => [2, 'valor'],
            12 => [10, 'texto'],
            13 => [40, 'texto'],
            14 => [40, 'texto'],
            15 => [20, 'texto'],
            16 => [32, 'texto'],
            17 => [9, 'texto'],
        ];
    }

    public function segmentoRDefault()
    {
        return [
            1 => 136,
            2 => 1,
            3 => 3,            
            5 => "R",
            6 => "",
            7 => 1,
            8 => "",
            9 => 3,
            10 => "",
            11 => 0,
            12 => "",
            13 => "",
            14 => "",
            15 => "",
            16 => "",
            17 => "",
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

    public function segmentoRDinamico()
    {
        return [];
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
            1 => 136,
            2 => 1,
            3 => 5,
            4 => "",
            8 => 0,
            9 => 0,
            10 => 0,
            11 => 0,
            12 => 0,
            13 => 0,
            14 => "",
            15 => "",
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
            1 => 136,
            2 => 9999,
            3 => 9,
            4 => "",
            5 => 1,
            7 => 0,
            8 => "",
        ];
    }

    public function trailerArquivoValidacao()
    {
        return [];
    }
    
    public function segmentosObrigatorios()
    {
        return [];
    }

}
