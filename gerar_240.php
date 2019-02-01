<?php

//Apenas um teste
function my_autoloader($class)
{
    include __DIR__ . '/src/' . str_replace('\\', '/', $class) . '.php';
}

spl_autoload_register('my_autoloader');

use Cnab240\Cnab240;

$instanciaCnab240 = new Cnab240();
$headerArquivo = [1 => 756,
    5 => 2,
    6 => '37.455.649/0001-07',
    8 => 4425,
    9 => "",
    10 => 2758,
    11 => "8",
    12 => "",
    13 => "Centersis Tecnologia da Informação LTDA - ME",
    14 => "Sicoob",
    18 => '23:59:59',
];
$instanciaCnab240->setHeaderArquivo($headerArquivo);
$headerLote = [
    12 => 4425, //Prefixo da cooperativa - Agencia
    13 => 3, //Dígito verificador da agencia
    14 => 2758, //Número da Conta Corrente
    15 => 8, //Dígito da conta corrente
    17 => 'Centersis', //Nome da Empresa
    20 => 1, //Número da remessa
];
$instanciaCnab240->setHeaderLote($headerLote);

$segmentoP1 = [
    4 => 00001,
    7 => 1,
    8 => 1,
    9 => 9,
    10 => 10,
    11 => 11,
    13 => "000002132001014",
    14 => 1,
    17 => 2,
    18 => 2,
    19 => "1190",
    20 => 22012019,
    21 => 153.25,
    24 => 02,
    25 => "A",
    27 => 2,
    28 => 22012019,
    29 => 100,
    30 => 0,
    35 => "BOLETO TESTE PARCELA UNICA",
    36 => 1,
    40 => 9,
];
$instanciaCnab240->setSegmentoP($segmentoP1);

$segmentoQ1 = [
    4 => 00002,
    7 => 01,
    8 => 2,
    9 => 4405007000144,
    10 => "Grande Loja Maçonica do Amazonas - GLOMA",
    11 => "Av. Prof Nilton Lins",
    12 => "Parque das Laranjeiras - Flores",
    13 => 69058,
    14 => "030",
    15 => "Manaus",
    16 => "AM",
    18 => '0',
    19 => "CENTERSIS TECNOLOGIA DA INFORMACAO LTDA",
    20 => 000,
    21 => "",
];
$instanciaCnab240->setSegmentoQ($segmentoQ1);

$segmentoR1 = [
    3 => 3,
    4 => 00003,
    7 => 01,
    8 => 0,
    9 => 0,
    10 => 0,
    11 => 0,
    12 => 00000000,
    13 => 0,
    14 => "2",
    15 => 22012019,
    16 => 200,
    18 => "APOS VENCIMENTO COBRAR MULTA DE 2% + JUROS",
    19 => "",
];
//$instanciaCnab240->setSegmentoR($segmentoR1);

$traillerLote = [
    5 => 5,
];
$instanciaCnab240->setTraillerLote($traillerLote);

$traillerArquivo = [
];
$instanciaCnab240->setTraillerArquivo($traillerArquivo);

try {

    //$instanciaAgz->gerar('Agz02', 'Storage', 'arquivoAgz02.txt', ['case' => 'upper']);
    $instanciaCnab240->gerar("Sicoob081", 'Storage', "arquivoSicoob081.txt", ['case' => 'upper']);
    //$instanciaCnab400Itau->gerar("Itau", 'Storage', "arquivoItau.txt", ['case' => 'upper']);
    //$instanciaCnab400Bra->gerar("Bradesco11", 'Storage', "arquivoBradesco.txt");

    echo "Arquivo Gerado " . microtime();
} catch (\Exception $ex) {
    echo "Erro: " . $ex->getMessage();
    echo "<br>";
    echo $ex->getTraceAsString();
}

