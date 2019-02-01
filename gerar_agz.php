<?php

//Apenas um teste
function my_autoloader($class)
{
    include __DIR__ . '/src/' . str_replace('\\', '/', $class) . '.php';
}

spl_autoload_register('my_autoloader');

use Agz\Agz;

$instanciaAgz = new Agz();
$segmentoA = [
    2 => 2,
    3 => "3650",
    4 => "Energisa",
    5 => 89,
    6 => "MAREFARMA (3650-3650",
    7 => date('Y-m-d'),
    8 => 120,
];
$instanciaAgz->setSegmentoA($segmentoA);
$segmentoG1 = [
    2 => "0000000893650",
    3 => "20190110",
    4 => "20190114",
    5 => "83620000000171100500001296099201812800093019",
    6 => '0,23',
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
$segmentoG3 = [
    2 => "0000000893650",
    3 => "20190110",
    4 => "20190114",
    5 => "83660000000161000500001159725201706800050019",
    6 => "16.10",
    7 => 0000,
    8 => 3,
    9 => "3650",
    10 => 1,
    11 => "",
    12 => 1,
    13 => "",];
$instanciaAgz->setSegmentoG($segmentoG3);
$segmentoG4 = [
    2 => "0000000893650",
    3 => "20190110",
    4 => "20190114",
    5 => "83600000000515300500001159725201812400050019",
    6 => 51.53,
    7 => 0000,
    8 => 4,
    9 => "3650",
    10 => 1,
    11 => "",
    12 => 1,
    13 => "",];
$instanciaAgz->setSegmentoG($segmentoG4);
$segmentoG5 = [
    2 => "0000000893650",
    3 => "20190110",
    4 => "20190114",
    5 => "83630000001244400500000210209201812800050019",
    6 => 124.44,
    7 => 0000,
    8 => 5,
    9 => "3650",
    10 => 1,
    11 => "",
    12 => 1,
    13 => "",];
$instanciaAgz->setSegmentoG($segmentoG5);
$segmentoZ = [
];
$instanciaAgz->setSegmentoZ($segmentoZ);

try {

    $instanciaAgz->gerar('Agz02', 'Storage', 'arquivoAgz02.txt', ['case' => 'upper']);

    echo "Arquivo Gerado " . microtime();
} catch (\Exception $ex) {
    echo "Erro: " . $ex->getMessage();
    echo "<br>";
    echo $ex->getTraceAsString();
}

