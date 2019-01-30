<?php
//Apenas um teste
function my_autoloader($class)
{
    include __DIR__ . '/src/' . str_replace('\\', '/', $class) . '.php';
}

spl_autoload_register('my_autoloader');

use Agz\Agz;
use Cnab240\Cnab240;
use Cnab400\Cnab400;

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

$instanciaCnab240 = new Cnab240();
$headerArquivo = [1 => 756,
    5 => 2,
    6 => 37455649000107,
    8 => 4425,
    9 => "",
    10 => 2758,
    11 => "8",
    12 => "",
    13 => "Centersis Tecnologia da Informação LTDA - ME",
    14 => "Sicoob",
    19 => 49,
];
$instanciaCnab240->setHeaderArquivo($headerArquivo);
$headerLote = [
    20 => 49,
];
$instanciaCnab240->setHeaderLote($headerLote);

$segmentoP1 = [
    4 => 00001,
    7 => 1,
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
$instanciaCnab240->setSegmentoR($segmentoR1);

$traillerLote = [
    5 => 5,
];
$instanciaCnab240->setTraillerLote($traillerLote);

$traillerArquivo = [
];
$instanciaCnab240->setTraillerArquivo($traillerArquivo);

$instanciaCnab400Itau = new Cnab400();

$headerArquivoCnab400 = [
    3 => "remessa",
    5 => "cobranca",
    12 => 341,
    13 => "banco itau sa",
    16 => 1,
];
$instanciaCnab400Itau->setHeaderArquivo($headerArquivoCnab400);

$tipoUm = [
    2 => 01,
    3 => "04848725160",
    4 => 00001,
    5 => 00,
    9 => 00,
    13 => 115,
    15 => "1",
    16 => 01,
    17 => "6672546193",
    18 => 210219,
    19 => 20000.00,
    22 => "01",
    23 => "A",
    25 => "11",
    26 => "02",
    28 => 220119,
    32 => 2,
    33 => 37455649000107,
    34 => "Guilherme Cavalari Ladeia",
    35 => "",
    36 => "Comandante balduino - 390",
    37 => "Centro",
    38 => 78285000,
    39 => "Cáceres",
    40 => "MT",
    41 => "José dos Campos",
    42 => "",
    44 => 30,
    46 => 2,
];
$instanciaCnab400Itau->setTipoUm($tipoUm);

$tipoQuatro = [
    2 => 01,
    3 => "04848725160",
    4 => 3456,
    6 => 32435,
    7 => 8,
    8 => 115,
    9 => 456,
    10 => 3,
    11 => 32,
    12 => 3240,
    13 => 1153485,
    14 => 2,
    15 => 150.50,
    16 => 4576,
    17 => 2534456,
    18 => 2,
    19 => 150.50,
    20 => 4576,
    21 => 2534456,
    22 => 2,
    23 => 150.50,
    24 => 4576,
    25 => 2534456,
    26 => 2,
    27 => 150.50,
    28 => 4576,
    29 => 2534456,
    30 => 2,
    31 => 150.50,
    32 => 4576,
    33 => 2534456,
    34 => 2,
    35 => 150.50,
    36 => 4576,
    37 => 2534456,
    38 => 2,
    39 => 150.50,
    40 => 4576,
    41 => 2534456,
    42 => 2,
    43 => 150.50,
    44 => 4576,
    45 => 2534456,
    46 => 2,
    47 => 150.50,
    48 => 4576,
    49 => 2534456,
    50 => 2,
    51 => 150.50,
    52 => 4576,
    53 => 2534456,
    54 => 2,
    55 => 150.50,
    56 => 4576,
    57 => 2534456,
    58 => 2,
    59 => 150.50,
    60 => 4576,
    61 => 2534456,
    62 => 2,
    63 => 150.50,
    64 => 4576,
    65 => 2534456,
    66 => 2,
    67 => 4576.85,
    68 => 3,
    69 => 3
];
$instanciaCnab400Itau->setTipoQuatro($tipoQuatro);

$tipoCinco = [
    2 => "gui.ladeia.gl@gmail.com",
    3 => 1,
    4 => "04848725160",
    5 => "Rua Amazonas - 123",
    6 => "Centro",
    7 => 78285000,
    8 => "caceres",
    9 => "mt",
    11 => 4
];
$instanciaCnab400Itau->setTipoCinco($tipoCinco);

$traillerArquivo = [
    3 => 4
];
$instanciaCnab400Itau->setTraillerArquivo($traillerArquivo);

$instanciaCnab400Bra = new Cnab400();

$header = [
    7 => "RAZAO SOCIAL",
    13 => "00001",
];
$instanciaCnab400Bra->setHeaderArquivo($header);

$tipoUm = [
    7 => "",
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
    23 => 150119,
    24 => 0,
    27 => 31,
    30 => 00,
    31 => 00,
    32 => 0,
    33 => 110219,
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
];
$instanciaCnab400Bra->setTipoUm($tipoUm);

$tipoDois = [
    6 => 150119,
    7 => 63,
    8 => 250119,
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

$trailler = [
];

$instanciaCnab400Bra->setTraillerArquivo($trailler);


try {

    $instanciaAgz->gerar('Agz02', 'Storage', 'arquivoAgz02.txt', ['case' => 'upper']);
    $instanciaCnab240->gerar("Sicoob081", 'Storage', "arquivoSicoob081.txt", ['case' => 'upper']);
    $instanciaCnab400Itau->gerar("Itau", 'Storage', "arquivoItau.txt", ['case' => 'upper']);
    $instanciaCnab400Bra->gerar("Bradesco11",'Storage', "arquivoBradesco.txt");

    echo "Arquivo Gerado " . microtime();
} catch (\Exception $ex) {
    echo "Erro: " . $ex->getMessage();
    echo "<br>";
    echo $ex->getTraceAsString();
}

