<?php

namespace Cnab400\Layout;

class Itau
{

    public function headerArquivo()
    {
        return [
            1 => [1, 'num'],
            2 => [1, 'num'],
            3 => [7, 'texto'],
            4 => [2, 'num'],
            5 => [15, 'texto'],
            6 => [4, 'num'],
            7 => [2, 'num'],
            8 => [5, 'num'],
            9 => [1, 'num'],
            10 => [8, 'texto'],
            11 => [30, 'texto'],
            12 => [3, 'num'],
            13 => [15, 'texto'],
            14 => [6, 'num'],
            15 => [294, 'texto'],
            16 => [6, 'num'],
        ];
    }

    public function headerArquivoDefault()
    {
        return [
            1 => 0,
            2 => 1,
            4 => 01,
            6 => 0,
            7 => 00,
            8 => 0,
            9 => 0,
            10 => "",
            11 => "",
            14 => date('dmy'),
            15 => "",
        ];
    }

    public function headerArquivoValidacao()
    {
        return [
            14 => "validaData"
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
            4 => [4, 'num'],
            5 => [2, 'num'],
            6 => [5, 'num'],
            7 => [1, 'num'],
            8 => [4, 'texto'],
            9 => [4, 'num'],
            10 => [25, 'texto'],
            11 => [8, 'num'],
            12 => [13, 'num'],
            13 => [3, 'num'],
            14 => [21, 'texto'],
            15 => [1, 'texto'],
            16 => [2, 'num'],
            17 => [10, 'texto'],
            18 => [6, 'num'],
            19 => [13, 'num'],
            20 => [3, 'num'],
            21 => [5, 'num'],
            22 => [2, 'texto'],
            23 => [1, 'texto'],
            24 => [6, 'num'],
            25 => [2, 'texto'],
            26 => [2, 'texto'],
            27 => [13, 'num'],
            28 => [6, 'num'],
            29 => [13, 'num'],
            30 => [13, 'num'],
            31 => [13, 'num'],
            32 => [2, 'num'],
            33 => [14, 'num'],
            34 => [30, 'texto'],
            35 => [10, 'texto'],
            36 => [40, 'texto'],
            37 => [12, 'texto'],
            38 => [8, 'num'],
            39 => [15, 'texto'],
            40 => [2, 'texto'],
            41 => [30, 'texto'],
            42 => [4, 'texto'],
            43 => [6, 'num'],
            44 => [2, 'num'],
            45 => [1, 'texto'],
            46 => [6, 'num'],
        ];
    }

    public function tipoUmDefault()
    {
        return [
            1 => 1,
            6 => 0,
            7 => 0,
            8 => "",
            10 => "",
            11 => 0,
            12 => 0,
            14 => "",
            20 => 341,
            21 => 0,
            24 => date('dmy'),
            27 => 0,
            29 => 0,
            30 => 0,
            31 => 0,
            35 => "",
            42 => "",
            43 => date('dmy'),
            45 => ""
        ];
    }

    public function tipoUmValidacao()
    {
        return [
            2 => "validaTipoInscricao",
            3 => "validaCpfeCnpj",
            9 => "validaCodInstrucao",
            15 => "validaCodCarteira",
            16 => "validaIdenOcorrencia",
            18 => "validaData",
            19 => "validaZerado",
            22 => "validaEspTitulo",
            23 => "validaIdTitulo",
            24 => "validaData",
            25 => "validaInstCobranca",
            26 => "validaInstCobranca",
            32 => "validaOpcao1e2",
            33 => "validaCpfeCnpj",
            38 => "validaCepInteiro",
            40 => "validaUf",
        ];
    }

    public function tipoUmDinamico()
    {
        return [];
    }

    public function tipoQuatro()
    {
        return [
            1 => [1, 'num'],
            2 => [2, 'num'],
            3 => [14, 'num'],
            4 => [4, 'num'],
            5 => [2, 'num'],
            6 => [5, 'num'],
            7 => [1, 'num'],
            8 => [3, 'num'],
            9 => [8, 'num'],
            10 => [1, 'num'],
            11 => [2, 'num'],
            12 => [4, 'num'],
            13 => [7, 'num'],
            14 => [1, 'num'],
            15 => [13, 'num'],
            16 => [4, 'num'],
            17 => [7, 'num'],
            18 => [1, 'num'],
            19 => [13, 'num'],
            20 => [4, 'num'],
            21 => [7, 'num'],
            22 => [1, 'num'],
            23 => [13, 'num'],
            24 => [4, 'num'],
            25 => [7, 'num'],
            26 => [1, 'num'],
            27 => [13, 'num'],
            28 => [4, 'num'],
            29 => [7, 'num'],
            30 => [1, 'num'],
            31 => [13, 'num'],
            32 => [4, 'num'],
            33 => [7, 'num'],
            34 => [1, 'num'],
            35 => [13, 'num'],
            36 => [4, 'num'],
            37 => [7, 'num'],
            38 => [1, 'num'],
            39 => [13, 'num'],
            40 => [4, 'num'],
            41 => [7, 'num'],
            42 => [1, 'num'],
            43 => [13, 'num'],
            44 => [4, 'num'],
            45 => [7, 'num'],
            46 => [1, 'num'],
            47 => [13, 'num'],
            48 => [4, 'num'],
            49 => [7, 'num'],
            50 => [1, 'num'],
            51 => [13, 'num'],
            52 => [4, 'num'],
            53 => [7, 'num'],
            54 => [1, 'num'],
            55 => [13, 'num'],
            56 => [4, 'num'],
            57 => [7, 'num'],
            58 => [1, 'num'],
            59 => [13, 'num'],
            60 => [4, 'num'],
            61 => [7, 'num'],
            62 => [1, 'num'],
            63 => [13, 'num'],
            64 => [4, 'num'],
            65 => [7, 'num'],
            66 => [1, 'num'],
            67 => [13, 'num'],
            68 => [1, 'num'],
            69 => [6, 'num'],
        ];
    }

    public function tipoQuatroDefault()
    {
        return [
            1 => 4,
            5 => 00,
            8 => 0,
            9 => 0,
            15 => 0,
            16 => 0,
            17 => 0,
            18 => 0,
            19 => 0,
            20 => 0,
            21 => 0,
            22 => 0,
            23 => 0,
            24 => 0,
            25 => 0,
            26 => 0,
            27 => 0,
            28 => 0,
            29 => 0,
            30 => 0,
            31 => 0,
            32 => 0,
            33 => 0,
            34 => 0,
            35 => 0,
            36 => 0,
            37 => 0,
            38 => 0,
            39 => 0,
            40 => 0,
            41 => 0,
            42 => 0,
            43 => 0,
            44 => 0,
            45 => 0,
            46 => 0,
            47 => 0,
            48 => 0,
            49 => 0,
            50 => 0,
            51 => 0,
            52 => 0,
            53 => 0,
            54 => 0,
            55 => 0,
            56 => 0,
            57 => 0,
            58 => 0,
            59 => 0,
            60 => 0,
            61 => 0,
            62 => 0,
            63 => 0,
            64 => 0,
            65 => 0,
            66 => 0,
        ];
    }

    public function tipoQuatroValidacao()
    {
        return [
            2 => "validaTipoInscricao",
            3 => "validaCpfeCnpj",
            8 => "validaNumCarteira",
            68 => "validaTipoValor",
        ];
    }

    public function tipoQuatroDinamico()
    {
        return [];
    }

    public function tipoCinco()
    {
        return [
            1 => [1, 'num'],
            2 => [120, 'texto'],
            3 => [2, 'num'],
            4 => [14, 'num'],
            5 => [40, 'texto'],
            6 => [12, 'texto'],
            7 => [8, 'num'],
            8 => [15, 'texto'],
            9 => [2, 'texto'],
            10 => [180, 'texto'],
            11 => [6, 'num'],
        ];
    }

    public function tipoCincoDefault()
    {
        return [
            1 => 5,
            10 => "",
        ];
    }

    public function tipoCincoValidacao()
    {
        return [
            3 => "validaCodigo",
            4 => "validaCpfeCnpj",
            7 => "validaCepInteiro",
            9 => "validaUf",
        ];
    }

    public function tipoCincoDinamico()
    {
        return [];
    }

    public function traillerArquivo()
    {
        return [
            1 => [1, 'num'],
            2 => [393, 'texto'],
            3 => [6, 'num'],
        ];
    }

    public function traillerArquivoDefault()
    {
        return [
            1 => 9,
            2 => "",
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

    public function tiposObrigatorios()
    {
        return[
            "tipoUm",
        ];
    }

    public function segmentosObrigatorios()
    {
        return [
            0, 1, 9,
        ];
    }

}
