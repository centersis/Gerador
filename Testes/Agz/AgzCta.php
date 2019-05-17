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
    3 => "086/2001",
    4 => "SANESUL-CTAFACIL",
    5 => 808,
    6 => "CONTAFACIL",
    8 => 005515,
    9 => 03
];
$instanciaAgz->setSegmentoA($segmentoA);
$segmentoG1 = [
    2 => "004851144596",
    3 => "20190517",
    4 => "20190521",
    5 => "82650000001185601102020050713099163335738208",
    6 => 118.56,
    7 => 00000.88,
    8 => 00000001,
    9 => "00120117",
    10 => 1,
    11 => "                       ",
    12 => 1,
    13 => "",
];
$instanciaAgz->setSegmentoG($segmentoG1);

$segmentoZ = [
    2 => 220,
    3 => 1912253
];

$instanciaAgz->setSegmentoZ($segmentoZ);

try {

    $instanciaAgz->gerar('AgzCta', '../../Storage', 'arquivoAgzCta01.txt', [
        'case' => 'upper',
        'obrigatorio' => ['segmentoA', 'segmentoG', 'segmentoZ']
    ]);

    echo "Arquivo Gerado " . microtime();
} catch (\Exception $ex) {
    echo "Erro: " . $ex->getMessage() . "\n";
    //echo "<br>";
    //echo $ex->getTraceAsString();
}

