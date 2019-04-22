<?php

//Apenas um teste
function my_autoloader($class) {
    include __DIR__ . '/../../' . str_replace('\\', '/', $class) . '.php';
}

spl_autoload_register('my_autoloader');

use Src\Cnab400\Cnab400;

$instanciaCnab400Bra = new Cnab400();

$header = [
    6=>0,
    7 => "RAZAO SOCIAL",
    13 => "00001",
];
$instanciaCnab400Bra->setHeaderArquivo($header);

$tipoUm = [
    7 => "a",
    8 => "88701949",
    9 => 237,
    10 => 0,
    11 => 0,
    12 => 0,
    13 => "1",
    14 => 0,
    15 => 1,
    16 => "N",
    19 => 0,
    20 => "",
    21 => 0,
    22 => "Documento",
    23 => '2019-02-05',
    24 => 0,
    27 => 31,
    29=>0,
    30 => 00,
    31 => 00,
    32 => 0,
    33 => '2019-02-05',
    34 => 0,
    35 => 546,
    36 => 15,
    37 => 1,
    38 => "04848725160",
    39 => "Jorge Aragao",
    40 => "Rua das Cerejeiras",
    41 => "",
    42 => 78200,
    43 => 000,
    44 => "",
    45 => 0,
];
$instanciaCnab400Bra->setTipoUm($tipoUm);

$tipoDois = [
    6 => '2019-02-05',
    7 => 63,
    8 => '2019-02-05',
    9 => 36,
    10 => "",
    11 => 242,
    12 => 102,
    13 => 23694,
    14 => "",
    15 => 77777777,
    16 => "2",
];
$instanciaCnab400Bra->setTipoDois($tipoDois);

$tipoTres = [
    2 => "",
    3 => "",
    4 => 1,
    5 => 2,
    8 => 22369,
    9 => "3369841610",
    10 => 9,
    11 => "8",
    12 => 99990,
    13 => "2",
    15 => "",
    16 => 591,
    18 => 879,
    19 => "8",
    20 => 69,
    21 => "3",
    22 => 987,
    23 => "Renato Silva",
    25 => "",
    26 => 27,
    28 => 56871,
    29 => "1",
    30 => 0446715173,
    31 => "1",
    32 => 11,
    33 => "Joao",
    35 => " ",
    36 => 21,
];
$instanciaCnab400Bra->setTipoTres($tipoTres);

$tipoSeis = [
    2 => 322,
    3 => 10982,
    4 => 8104049,
    5 => 942984,
    6 => "1",
];
$instanciaCnab400Bra->setTipoSeis($tipoSeis);

$tipoSete = [
    2 => "Endereco Sacador/Avalista",
    3 => 78200,
    4 => 000,
    5 => "Cáceres",
    6 => "MT",
    7 => "Filler",
    8 => 054,
    9 => 6549,
    10 => 24403,
    11 => "C",
    12 => 559842,
    13 => "N",
];
$instanciaCnab400Bra->setTipoSete($tipoSete);

$trailer = [
    3=>0,
];

$instanciaCnab400Bra->setTrailerArquivo($trailer);


try {

    //$instanciaAgz->gerar('Agz02', 'Storage', 'arquivoAgz02.txt', ['case' => 'upper']);
    //$instanciaCnab240->gerar("Sicoob081", 'Storage', "arquivoSicoob081.txt", ['case' => 'upper']);
    //$instanciaCnab400Itau->gerar("Itau", '../../Storage', "arquivoItau.txt", ['case' => 'upper']);
    $instanciaCnab400Bra->gerar("Bradesco11", '../../Storage', "arquivoBradesco.txt");

    echo "Arquivo Gerado " . microtime();
} catch (\Exception $ex) {
    echo "Erro: " . $ex->getMessage();
    echo "<br>";
    echo $ex->getTraceAsString();
}

