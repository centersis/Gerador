<?php

namespace Cnab240\Layout;

class SicoobEmpresarial
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
            11 => [1, 'num'],
            12 => [1, 'texto'],
            13 => [30, 'texto'],
            14 => [30, 'texto'],
            15 => [10, 'texto'],
            16 => [1, 'num'],
            17 => [8, 'data-dmY'],
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
            1 => 756,
            2 => 0,
            3 => 0,
            4 => "",
            12 => 0,
            15 => "",
            16 => 1,
            17 => date('Y-m-d'),
            18 => date('h:i:s'),
            20 => "087",
            21 => 0,
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
            18 => "validaHora",
        ];
    }

    public function headerArquivoDinamico()
    {
        return [
        ];
    }

    ##--------------------------------------------------------------------------

    public function headerLoteTitulo()
    {
        return [
            1 => [3, 'num'],
            2 => [4, 'num'],
            3 => [1, 'num'],
            4 => [1, 'texto'],
            5 => [2, 'num'],
            6 => [2, 'num'],
            7 => [3, 'num'],
            8 => [1, 'texto'],
            9 => [1, 'num'],
            10 => [14, 'num'],
            11 => [20, 'texto'],
            12 => [5, 'num'],
            13 => [1, 'texto'],
            14 => [12, 'num'],
            15 => [1, 'num'],
            16 => [1, 'texto'],
            17 => [30, 'texto'],
            18 => [40, 'texto'],
            19 => [30, 'texto'],
            20 => [5, 'num'],
            21 => [15, 'texto'],
            22 => [20, 'texto'],
            23 => [5, 'num'],
            24 => [3, 'texto'],
            25 => [2, 'texto'],
            26 => [8, 'texto'],
            27 => [10, 'texto'],
        ];
    }

    public function headerLoteTituloDefault()
    {
        return [
            1 => 756,
            2 => 1,
            3 => 1,
            4 => "C",
            5 => 1,
            6 => "",
            7 => "040",
            8 => "",
            16 => 0,
            18 => "",
            26 => "",
            27 => ""
        ];
    }

    public function headerLoteTituloValidacao()
    {
        return [
        ];
    }

    public function headerLoteTituloDinamico()
    {
        return [
        ];
    }

    ##--------------------------------------------------------------------------

    public function headerLoteConvenio()
    {
        return [
            1 => [3, 'num'],
            2 => [4, 'num'],
            3 => [1, 'num'],
            4 => [1, 'texto'],
            5 => [2, 'num'],
            6 => [2, 'num'],
            7 => [3, 'num'],
            8 => [1, 'texto'],
            9 => [1, 'num'],
            10 => [14, 'num'],
            11 => [20, 'texto'],
            12 => [5, 'num'],
            13 => [1, 'texto'],
            14 => [12, 'num'],
            15 => [1, 'num'],
            16 => [1, 'texto'],
            17 => [30, 'texto'],
            18 => [40, 'texto'],
            19 => [30, 'texto'],
            20 => [5, 'num'],
            21 => [15, 'texto'],
            22 => [20, 'texto'],
            23 => [5, 'num'],
            24 => [3, 'texto'],
            25 => [2, 'texto'],
            26 => [2, 'texto'],
            27 => [6, 'texto'],
            28 => [10, 'texto'],
        ];
    }

    public function headerLoteConvenioDefault()
    {
        return [
            1 => 756,
            2 => 1,
            3 => 1,
            4 => "C",
            5 => 1,
            6 => "",
            7 => "040",
            8 => "",
            16 => 0,
            18 => "",
            26 => 1,
            27 => "",
            27 => ""
        ];
    }

    public function headerLoteConvenioValidacao()
    {
        return [
        ];
    }

    public function headerLoteConvenioDinamico()
    {
        return [
        ];
    }

    ##--------------------------------------------------------------------------

    public function segmentoJ()
    {
        return [
            1 => [3, 'num'],
            2 => [4, 'num'],
            3 => [1, 'num'],
            4 => [5, 'num'],
            5 => [1, 'texto'],
            6 => [1, 'num'],
            7 => [2, 'num'],
            8 => [44, 'num'],
            9 => [30, 'texto'],
            10 => [8, 'data-dmY'],
            11 => [15, 'valor'],
            12 => [15, 'valor'],
            13 => [15, 'valor'],
            14 => [8, 'data-dmY'],
            15 => [15, 'valor'],
            16 => [15, 'num'],
            17 => [20, 'texto'],
            18 => [20, 'texto'],
            19 => [2, 'num'],
            20 => [6, 'texto'],
            21 => [10, 'texto'],
        ];
    }

    public function segmentoJDefault()
    {
        return [
            1 => 756,
            2 => 1,
            3 => 3,
            5 => "J",
            6 => 0,
            7 => 0,
            9 => '',
            16 => 0,
            18 => '',
            19 => 9,
            20 => "",
            21 => "",
        ];
    }

    public function segmentoJValidacao()
    {
        return [
        ];
    }

    public function segmentoJDinamico()
    {
        return [
        ];
    }

    ##--------------------------------------------------------------------------

    public function segmentoJ52()
    {
        return [
            1 => [3, 'num'],
            2 => [4, 'num'],
            3 => [1, 'num'],
            4 => [5, 'num'],
            5 => [1, 'texto'],
            6 => [1, 'texto'],
            7 => [2, 'num'],
            8 => [2, 'num'],
            9 => [1, 'num'],
            10 => [15, 'num'],
            11 => [40, 'texto'],
            12 => [1, 'num'],
            13 => [15, 'num'],
            14 => [40, 'texto'],
            15 => [1, 'num'],
            16 => [15, 'num'],
            17 => [40, 'texto'],
            18 => [53, 'texto'],
        ];
    }

    public function segmentoJ52Default()
    {
        return [
            1 => 756,
            2 => 1,
            3 => 3,
            5 => "J",
            6 => "",
            7 => 0,
            8 => 52,
            9 => 0,
            10 => 0,
            11 => "",
            12 => 0,
            13 => 0,
            14 => "",
            15 => 0,
            16 => 0,
            17 => "",
            18 => "",
        ];
    }

    public function segmentoJ52Validacao()
    {
        return [
        ];
    }

    public function segmentoJ52Dinamico()
    {
        return [
        ];
    }

    ##--------------------------------------------------------------------------

    public function segmentoO()
    {
        return [
            1 => [3, 'num'],
            2 => [4, 'num'],
            3 => [1, 'num'],
            4 => [5, 'num'],
            5 => [1, 'texto'],
            6 => [1, 'num'],
            7 => [2, 'num'],
            8 => [44, 'texto'],
            9 => [30, 'texto'],
            10 => [8, 'data-dmY'],
            11 => [8, 'data-dmY'],
            12 => [15, 'valor'],
            13 => [20, 'texto'],
            14 => [20, 'texto'],
            15 => [68, 'texto'],
            16 => [10, 'texto'],
        ];
    }

    public function segmentoODefault()
    {
        return [
            1 => 756,
            2 => 1,
            3 => 3,
            5 => "O",
            6 => 0,
            7 => 0,
            13 => '',
            14 => '',
            15 => "",
            16 => "",
        ];
    }

    public function segmentoOValidacao()
    {
        return [
        ];
    }

    public function segmentoODinamico()
    {
        return [
        ];
    }

    ##--------------------------------------------------------------------------

    public function segmentoN()
    {
        return [
            1 => [3, 'num'],
            2 => [4, 'num'],
            3 => [1, 'num'],
            4 => [5, 'num'],
            5 => [1, 'texto'],
            6 => [1, 'num'],
            7 => [2, 'num'],
            8 => [20, 'texto'],
            9 => [20, 'texto'],
            10 => [30, 'texto'],
            11 => [8, 'data-dmY'],
            12 => [13, 'num'],
            13 => [120, 'texto'],
            14 => [10, 'texto'],
        ];
    }

    public function segmentoNDefault()
    {
        return [
            1 => 756,
            3 => 3,
            5 => "O",
            13 => "",
            14 => "",
        ];
    }

    public function segmentoNValidacao()
    {
        return [
        ];
    }

    public function segmentoNDinamico()
    {
        return [
        ];
    }

    ##--------------------------------------------------------------------------

    public function traillerLoteTitulo()
    {
        return [
            1 => [3, 'num'],
            2 => [4, 'num'],
            3 => [1, 'num'],
            4 => [9, 'texto'],
            5 => [6, 'num'],
            6 => [18, 'valor'],
            7 => [18, 'num'],
            8 => [6, 'num'],
            9 => [165, 'texto'],
            10 => [10, 'texto'],
        ];
    }

    public function traillerLoteTituloDefault()
    {
        return [
            1 => 756,
            2 => 1,
            3 => 5,
            4 => "",
            7 => 0,
            8 => 0,
            9 => "",
            10 => "",
        ];
    }

    public function traillerLoteTituloValidacao()
    {
        return [];
    }

    public function traillerLoteTituloDinamico()
    {
        return [
        ];
    }

    ##--------------------------------------------------------------------------

    public function traillerLoteConvenio()
    {
        return [
            1 => [3, 'num'],
            2 => [4, 'num'],
            3 => [1, 'num'],
            4 => [9, 'texto'],
            5 => [6, 'num'],
            6 => [18, 'valor'],
            7 => [189, 'texto'],
            8 => [10, 'texto'],
        ];
    }

    public function traillerLoteConvenioDefault()
    {
        return [
            1 => 756,
            2 => 1,
            3 => 5,
            4 => "",
            7 => '',
            8 => ''
        ];
    }

    public function traillerLoteConvenioValidacao()
    {
        return [];
    }

    public function traillerLoteConvenioDinamico()
    {
        return [
        ];
    }

    ##--------------------------------------------------------------------------

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

    public function traillerArquivoDefault()
    {
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

    public function traillerArquivoValidacao()
    {
        return [];
    }

    public function traillerArquivoDinamico()
    {
        return [
        ];
    }

    ##--------------------------------------------------------------------------

    public function segmentosObrigatorios()
    {
        return [
        ];
    }

}
