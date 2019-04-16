<?php

namespace Cnab240\Layout;

class SicoobEmpresarial {

    public function headerArquivo() {
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

    public function headerArquivoDefault() {
        return [
            1 => 756,
            2 => 0,
            3 => 0,
            4 => "",
            15 => "",
            16 => 1,
            17 => date('Y-m-d'),
            18 => date('h:i:s'),
            20 => "087",
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

    public function headerArquivoDinamico() {
        return [
        ];
    }

    public function headerLoteCobranca() {
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

    public function headerLoteCobrancaDefault($headerArquivo) {
        return [
            1 => 746,
            3 => 1,
            4 => "C",
            5 => 1,
            6 => "",
            7 => "040",
            8 => "",
            18 => "",
            26 => "",
            27 => ""
        ];
    }

    public function segmentoJ() {
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
            10 => [8, 'num'],
            11 => [13, 'num'],
            12 => [13, 'num'],
            13 => [13, 'num'],
            14 => [8, 'num'],
            15 => [13, 'num'],
            16 => [10, 'num'],
            17 => [20, 'texto'],
            18 => [20, 'texto'],
            19 => [2, 'num'],
            20 => [6, 'texto'],
            21 => [10, 'texto'],
        ];
    }

    public function segmentoJDefault() {
        return [
            1 => 756,
            3 => 3,
            5 => "J",
            20 => "",
            21 => "",
        ];
    }

    public function segmentoJ52() {
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
            17 => [10, 'texto'],
            18 => [53, 'texto'],            
        ];
    }

    public function segmentoJ32Default() {
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
    
    public function trailerLoteCobranca() {
        return [
            1 => [3, 'num'],
            2 => [4, 'num'],
            3 => [1, 'num'],
            4 => [9, 'texto'],
            5 => [6, 'num'],
            6 => [16, 'num'],
            7 => [13, 'num'],
            8 => [6, 'num'],
            9 => [165, 'texto'],
            10 => [10, 'texto'],
        ];
    }
    
    public function trailerLoteCobrancaDefault() {
        return [            
            3 => 5,
            4 => "",
            9 => "",
            10 => "",
        ];
    }
    
    public function headerLoteConvenio() {
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
            26 => [2, 'num'],
            27 => [6, 'texto'],
            28 => [10, 'texto']
        ];
    }

    public function headerLoteConvenioDefault($headerArquivo) {
        return [
            1 => 746,
            3 => 1,
            4 => "C",
            7 => "012",
            8 => "",
            18 => "",
            27 => "",
            28 => ""
        ];
    }

    public function segmentoO() {
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
            12 => [13, 'num'],
            13 => [20, 'texto'],
            14 => [20, 'texto'],
            15 => [68, 'texto'],
            16 => [10, 'texto'],            
        ];
    }

    public function segmentoODefault() {
        return [
            1 => 746,
            3 => 3,
            5 => "O",
            15 => "",
            16 => "",
        ];
    }
    
    public function segmentoN() {
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

    public function segmentoNDefault() {
        return [
            1 => 746,
            3 => 3,
            5 => "O",
            13 => "",
            14 => "",
        ];
    }

    public function trailerLoteConvenio() {
        return [
            1 => [3, 'num'],
            2 => [4, 'num'],
            3 => [1, 'num'],
            4 => [9, 'texto'],
            5 => [6, 'num'],
            6 => [16, 'num'],
            7 => [189, 'texto'],
            8 => [10, 'texto'],
        ];
    }
    
    public function trailerLoteConvenioDefault() {
        return [            
            3 => 5,
            4 => "",
            7 => "",
            8 => "",
        ];
    }

    public function traillerArquivo() {
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

    public function traillerArquivoDefault() {
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

    public function segmentosObrigatorios() {
        return [
            0, 1, "P", "Q", 5, 9,
        ];
    }

}
