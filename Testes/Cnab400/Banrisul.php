<?php

//Apenas um teste
function my_autoloader($class)
{
    include __DIR__ . '/../../../' . str_replace('\\', '/', $class) . '.php';
}

spl_autoload_register('my_autoloader');

use Gerador\Src\Cnab400\Cnab400;

$instanciaCnab400Banrisul = new Cnab400();

$header = [
    3 => '0100008673084',
    5 => 'GRANDE ORIENTE DO RIO GRANDE D0',
    16 => "1",
];
$instanciaCnab400Banrisul->setHeaderArquivo($header);

$tipoUm = [
    3 => '0100008673084',
    6 => '3000291705',
    7 => 'DÉBITOS REF CAP FEVEREIRO/ 2020',
    11 => '2018ACR4  ',
    12 => '2020-03-26',
    13 => '1305.00',
    30 => '01',
    31 => '00059231440004',
    32 => 'L M AMOR E CARIDADE IV',
    34 => 'AV AURELIANO DE FIGUEIREDO PINTO, 945',
    38 => '90050191',
    39 => 'PORTO ALEGRE',
    40 => 'RS',
    46 => '2'
];
$instanciaCnab400Banrisul->setTipoUm($tipoUm);

$tipoDois = [
    3 => '93016004000149',
    4 => '0100008673084',
    7 => '3000291705',
    12 => 'DÉBITOS REF CAPITAÇÃO FEVEREIRO/ 2020',
    18 => '3'
];
$instanciaCnab400Banrisul->setTipoDois($tipoDois);

$trailer = [
    3 => '187146.26',
    5 => 4
];

$instanciaCnab400Banrisul->setTrailerArquivo($trailer);


try {

    $instanciaCnab400Banrisul->gerar("Banrisul", '../../Storage', "arquivoBanrisul.txt", ['case' => 'upper']);

    echo "Arquivo Gerado " . microtime();
} catch (\Exception $ex) {
    echo "Erro: " . $ex->getMessage();
    echo "<br>";
    echo $ex->getTraceAsString();
}

