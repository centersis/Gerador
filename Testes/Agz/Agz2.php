<?php

//Apenas um teste
function my_autoloader($class) {
    include __DIR__ . '/../../../' . str_replace('\\', '/', $class) . '.php';
}

spl_autoload_register('my_autoloader');

use Gerador\Src\Agz\Agz;

$instanciaAgz = new Agz();
$segmentoA = [
    2 => 2,
    3 => "3650",
    4 => "Energisa",
    5 => 89,
    6 => "MAREFARMA (3650-3650",
    8 => 120,
];
$instanciaAgz->setSegmentoA($segmentoA);
$segmentoG1 = [
    2 => "0000000893650",
    3 => "20190110",
    4 => "20190114",
    5 => "83620000000171100500001296099201812800093019",
    6 => 17.11,
    7 => 0000,
    8 => 1,
    9 => "3650",
    10 => 1,
    11 => "",
    12 => 1,
    13 => "",
];
$instanciaAgz->setSegmentoG($segmentoG1);
$segmentoG2 = [
    2 => "0000000893650",
    3 => "20190110",
    4 => "20190114",
    5 => "83610000000903600500001158725201811600050019",
    6 => 90.36,
    7 => 0000,
    8 => 2,
    9 => "3650",
    10 => 1,
    11 => "",
    12 => 1,
    13 => "",];
$instanciaAgz->setSegmentoG($segmentoG2);

$segmentoZ = [
    2 => 4,
    3 => 400
];

$instanciaAgz->setSegmentoZ($segmentoZ);

try {

    $instanciaAgz->gerar('Agz02', '../../Storage', 'arquivoAgz02.txt', [
        'case' => 'upper',
        'obrigatorio' => ['segmentoA', 'segmentoG', 'segmentoZ']
    ]);

    echo "Arquivo Gerado " . microtime();
} catch (\Exception $ex) {
    echo "Erro: " . $ex->getMessage();
    //echo "<br>";
    //echo $ex->getTraceAsString();
}

