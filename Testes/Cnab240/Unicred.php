<?php

//Apenas um teste
function my_autoloader($class) {
    include __DIR__ . '/../../../' . str_replace('\\', '/', $class) . '.php';
}

spl_autoload_register('my_autoloader');


$instanciaCnab240 = new Gerador\Src\Cnab240\Cnab240();
$headerArquivo = [
    6 => 79885950000109,   
    8 => 1104,
    9 => 5,
    10 => "185958",
    11 => "ASSOCIACAO LOJA SIMBOLICA LEALDADE",
    13 => "Centersis Tecnologia da Informação LTDA - ME",
    14 => "Sicoob",
    19 => 49,
];
$instanciaCnab240->setHeaderArquivo($headerArquivo);

$headerLoteTitulo = [
    2 => 1,
    9=>0,
    10 => 37455649000107,
    11=>0,
    12 => 4425, //Prefixo da cooperativa - Agencia
    13 => 3, //Dígito verificador da agencia
    14 => 2758, //Número da Conta Corrente
    15 => 8, //Dígito da conta corrente
    17 => 'Centersis', //Nome da Empresa
    19=>0,
    20 => 1, //Número da remessa
    21=>0,
    22=>0,
    23=>0,
    24=>0,
    25=>0,
];

$instanciaCnab240->setHeaderLoteTitulo($headerLoteTitulo, 1);

$segmentoJ = [
    2 => 1,
    4 => 00001,
    7 => 1,
    8 => 1,
    9 => 9,
    10 => 20150506,
    11 => 11,
    12=>0,
    13 => "000002132001014",
    14 => 20150506,
    15=>0,
    17 => 2,
    18 => 2,
    19 => 0,
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
$instanciaCnab240->setSegmentoJ($segmentoJ, 1);

$segmentoJ52 = [
    2 => 1,
    4 => 00002,
    7 => 01,
    8 => 2,
    9 => 0,
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
$instanciaCnab240->setSegmentoJ52($segmentoJ52, 1);


$trailerLoteTitulo = [
    2 => 1,
    6=>0,
    5 => 5,
];
$instanciaCnab240->setTrailerLoteTitulo($trailerLoteTitulo,1);

$trailerArquivo = [
    6=>0,
];
$instanciaCnab240->setTrailerArquivo($trailerArquivo);


try {


    $instanciaCnab240->gerar('SicoobEmpresarial', '../../Storage', 'sicoobCnab240.txt', [
        'case' => 'upper',
        'obrigatorio' => ['headerArquivo', 'headerLoteTitulo', 'segmentoJ', 'segmentoJ52', 'trailerLoteTitulo', 'trailerArquivo']
    ]);

    echo "Arquivo Gerado " . microtime();
} catch (\Exception $ex) {
    echo "Erro: " . $ex->getMessage();
    echo "<br>";
    echo $ex->getTraceAsString();
}

