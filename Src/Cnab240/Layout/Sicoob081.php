<?php

namespace Src\Cnab240\Layout;

class Sicoob081 {

    public function headerArquivo() {
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
            10 => [12, 'num'],
            11 => [1, 'texto'],
            12 => [1, 'texto'],
            13 => [30, 'texto'],
            14 => [30, 'texto'],
            15 => [10, 'texto'],
            16 => [1, 'num'],
            17 => [8, 'data-Ymd'],
            18 => [6, 'num'],
            19 => [6, 'num'],
            20 => [3, 'num'],
            21 => [5, 'num'],
            22 => [20, 'texto'],
            23 => [20, 'texto'],
            24 => [29, 'texto'],
        ];
    }

    public function headerArquivoDefault() {
        return [
            1 => 756,
            2 => 0,
            3 => 0,
            4 => "",
            5 => 2,
            7 => "",
            9 => " ",
            12 => "0",
            15 => "",
            16 => 1,
            17 => date('Y-m-d'),
            18 => date('h:i:s'),
            20 => 81,
            21 => 0,
            22 => "",
            23 => "",
            24 => "",
        ];
    }

    public function headerArquivoValidacao() {
        return [
            5 => "validaOpcao1e2",
            6 => "validaCpfeCnpj",
            18 => "validaHora",
        ];
    }

    public function headerLote() {
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

    public function headerLoteDefault($headerArquivo) {
        return [
            1 => $headerArquivo[1],
            2 => 1,
            3 => 1,
            4 => "R",
            5 => 1,
            6 => "",
            7 => "040",
            8 => "",
            9 => $headerArquivo[5],
            10 => $headerArquivo[6],
            11 => $headerArquivo[8],
            12 => $headerArquivo[9],
            13 => $headerArquivo[10],
            14 => $headerArquivo[11],
            16 => "",
            18 => "",
            19 => "",
            21 => date('dmY'),
            22 => 0,
            23 => "",
        ];
    }

    public function headerLoteDinamico() {
        return [];
    }

    public function segmentoP() {
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
            21 => [15, 'valor'],
            22 => [5, 'num'],
            23 => [1, 'texto'],
            24 => [2, 'num'],
            25 => [1, 'texto'],
            26 => [8, 'num'],
            27 => [1, 'num'],
            28 => [8, 'num'],
            29 => [15, 'valor'],
            30 => [1, 'num'],
            31 => [8, 'num'],
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
            42 => [1, 'texto'],
        ];
    }

    public function segmentoPDefault() {
        return [
            1 => 756,
            2 => 1,
            3 => 3,
            5 => "P",
            6 => "",
            7 => 1,
            12 => "",
            15 => 0,
            16 => "",
            17 => 2,
            18 => 2,
            22 => 0,
            23 => "",
            24 => 02,
            25 => 'A',
            26 => date('Y-m-d'),
            27 => 0,
            28 => 0,
            29 => 0,
            30 => 0,
            31 => 0,
            32 => 0,
            33 => 0,
            34 => 0,
            36 => 3,
            37 => 0,
            38 => 0,
            39 => "",
            40 => '09',
            41 => 0,
            42 => "",
        ];
    }

    public function segmentoPValidacao() {
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

    public function segmentoPDinamico() {
        return [];
    }

    public function segmentoQ() {
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

    public function segmentoQDefault() {
        return [
            1 => 756,
            2 => 1,
            3 => 3,
            5 => "Q",
            6 => "",
            7 => 1,
            17 => 2,
            20 => 0,
            21 => "",
            22 => "",
        ];
    }

    public function segmentoQValidacao() {
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

    public function segmentoR() {
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
            10 => [15, 'valor'],
            11 => [1, 'num'],
            12 => [8, 'num'],
            13 => [15, 'valor'],
            14 => [1, 'texto'],
            15 => [8, 'num'],
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

    public function segmentoRDefault() {
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

    public function segmentoRValidacao() {
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

    public function segmentoRDinamico() {
        return [];
    }

    public function trailerLote() {
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
            12 => [6, 'texto'],
            13 => [17, 'valor'],
            14 => [8, 'texto'],
            15 => [117, 'texto'],
        ];
    }

    public function trailerLoteDefault() {
        return [
            1 => 756,
            2 => 1,
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

    public function trailerLoteValidacao() {
        return [];
    }

    public function trailerArquivo() {
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

    public function trailerArquivoDefault() {
        return [
            1 => 756,
            2 => 9999,
            3 => 9,
            4 => "",
            5 => 1,
            7 => 0,
            8 => "",
        ];
    }

    public function trailerArquivoValidacao() {
        return [];
    }

}
