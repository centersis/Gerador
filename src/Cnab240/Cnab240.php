<?php

namespace Cnab240;

use Arquivo\ArquivoPadrao;
use Cnab240\ValidacaoCnab240;

class Cnab240
{

    private $headerArquivo;
    private $headerLote;
    private $segmentoJ;
    private $segmentoJ52;
    private $segmentoO;
    private $segmentoP;
    private $segmentoQ;
    private $segmentoR;
    private $traillerLote;
    private $traillerArquivo;
    private $linhas;

    function __construct()
    {
        $this->headerArquivo = [];
        $this->headerLote = [];
        $this->segmentoJ = [];
        $this->segmentoJ52 = [];
        $this->segmentoO = [];
        $this->segmentoP = [];
        $this->segmentoQ = [];
        $this->segmentoR = [];
        $this->traillerLote = [];
        $this->traillerArquivo = [];
        $this->linhas = [];
    }

    function setHeaderArquivo($headerArquivo)
    {
        $this->headerArquivo = $headerArquivo;
    }

    function setHeaderLote($headerLote, $lote)
    {
        $this->headerLote[$lote] = $headerLote;
    }

    function setSegmentoJ($segmentoJ, $lote)
    {
        $this->segmentoJ[$lote][] = $segmentoJ;
    }

    function setSegmentoJ52($segmentoJ52, $lote)
    {
        $this->segmentoJ52[$lote][] = $segmentoJ52;
    }

    function setSegmentoO($segmentoO, $lote)
    {
        $this->segmentoO[$lote][] = $segmentoO;
    }

    function setSegmentoP($segmentoP, $lote)
    {
        $this->segmentoP[$lote][] = $segmentoP;
    }

    function setSegmentoQ($segmentoQ, $lote)
    {
        $this->segmentoQ[$lote][] = $segmentoQ;
    }

    function setSegmentoR($segmentoR, $lote)
    {
        $this->segmentoR[$lote][] = $segmentoR;
    }

    function setTraillerLote($traillerLote, $lote)
    {
        $this->traillerLote[$lote] = $traillerLote;
    }

    function setTraillerArquivo($traillerArquivo)
    {
        $this->traillerArquivo = $traillerArquivo;
    }

    public function getLinhas()
    {
        return $this->linhas;
    }

    public function getLinhasAgrupadas()
    {
        $agrupado = [];

        foreach ($this->linhas as $dados) {
            $agrupado[] = implode('', $dados);
        }

        return $agrupado;
    }

    public function processar($layout, $config = [])
    {
        $caminho = 'Cnab240\\Layout\\' . $layout;

        $iLayout = new $caminho;
        $arquivoPadrao = new ArquivoPadrao();
        $validacaoCnab = new ValidacaoCnab240();

        $this->linhas = [];
        $contalinhas = 4;
        $somaValor = 0;
        $quantTitulos = 0;
        $headerArquivo = [];

        $sequencial = 1;

        $segmentosObrigatorios = $iLayout->segmentosObrigatorios();
        $modeloHeaderArqDefault = $iLayout->headerArquivoDefault();
        $modeloHeaderArqValidacao = $iLayout->headerArquivoValidacao();
        $modeloHeaderArqDinamico = $iLayout->headerArquivoDinamico($sequencial);
        $modeloHeaderArquivo = $iLayout->headerArquivo();
        $validacaoCnab->validaSegmentosObrigatorios($this->headerArquivo, 0, $segmentosObrigatorios);

        $this->headerArquivo = $validacaoCnab->setDefault($modeloHeaderArquivo, $this->headerArquivo, $modeloHeaderArqDefault, $modeloHeaderArqDinamico, 'headerArquivo');

        foreach ($modeloHeaderArquivo as $key => $especificacoes) {

            $valor = $arquivoPadrao->tratarDados($especificacoes, $this->headerArquivo[$key], $key, $config, 'headerArquivo');

            if (isset($modeloHeaderArqValidacao[$key])) {
                $validacaoCnab->{$modeloHeaderArqValidacao[$key]}($valor, $key, $this->headerArquivo, 'headerArquivo');
            }

            $headerArquivo[] = $valor;
        }

        $this->linhas[] = $headerArquivo;

        $sequencial++;

        $modeloHeaderLoteDefault = $iLayout->headerloteDefault($headerArquivo);
        $modeloHeaderLoteValidacao = $iLayout->headerLoteValidacao();
        $modeloHeaderLoteDinamico = $iLayout->headerLoteDinamico($sequencial);
        $modeloHeaderLote = $iLayout->headerLote();

        foreach (array_keys($this->headerLote) as $loteNumero) {

            $headerLote = [];
            $validacaoCnab->validaSegmentosObrigatorios($this->headerLote[$loteNumero], 1, $segmentosObrigatorios);

            $this->headerLote[$loteNumero] = $validacaoCnab->setDefault($modeloHeaderLote, $this->headerLote[$loteNumero], $modeloHeaderLoteDefault, $modeloHeaderLoteDinamico, 'headerLote');

            foreach ($modeloHeaderLote as $key => $especificacoes) {

                $valor = $arquivoPadrao->tratarDados($especificacoes, $this->headerLote[$loteNumero][$key], $key, $config, 'headerLote');

                if (isset($modeloHeaderLoteValidacao[$key])) {
                    $validacaoCnab->{$modeloHeaderLoteValidacao[$key]}($valor, $key, $headerLote, 'headerLote');
                }

                $headerLote[] = $valor;
            }

            $this->linhas[] = $headerLote;

            ##Empresarial
            if (isset($this->segmentoJ[$loteNumero])) {

                $modeloSegmentoJ = $iLayout->segmentoJ();
                $modeloSegmentoJDefault = $iLayout->segmentoJDefault($headerArquivo);
                $modeloSegmentoJValidacao = $iLayout->segmentoJValidacao();
                $modeloSegmentoJDinamico = $iLayout->segmentoJDinamico();

                $validacaoCnab->validaSegmentosObrigatorios($this->segmentoJ[$loteNumero], "J", $segmentosObrigatorios);
                $this->segmentoJ[$loteNumero] = $validacaoCnab->setDefault($modeloSegmentoJ, $this->segmentoJ[$loteNumero], $modeloSegmentoJDefault, $modeloSegmentoJDinamico, 'segmentoJ');


                $modeloSegmentoJ52 = $iLayout->segmentoJ52();
                $modeloSegmentoJ52Default = $iLayout->segmentoJ52Default($headerArquivo);
                $modeloSegmentoJ52Validacao = $iLayout->segmentoJ52Validacao();
                $modeloSegmentoJ52Dinamico = $iLayout->segmentoJ52Dinamico();

                $validacaoCnab->validaSegmentosObrigatorios($this->segmentoJ52[$loteNumero], "J52", $segmentosObrigatorios);
                $this->segmentoJ52[$loteNumero] = $validacaoCnab->setDefault($modeloSegmentoJ52, $this->segmentoJ52[$loteNumero], $modeloSegmentoJ52Default, $modeloSegmentoJ52Dinamico, 'segmentoJ52');


                if (isset($this->segmentoO[$loteNumero])) {
                    $modeloSegmentoO = $iLayout->segmentoO();
                    $modeloSegmentoODefault = $iLayout->segmentoODefault($headerArquivo);
                    $modeloSegmentoOValidacao = $iLayout->segmentoOValidacao();
                    $modeloSegmentoODinamico = $iLayout->segmentoODinamico();

                    $validacaoCnab->validaSegmentosObrigatorios($this->segmentoO[$loteNumero], "O", $segmentosObrigatorios);
                    $this->segmentoO[$loteNumero] = $validacaoCnab->setDefault($modeloSegmentoO, $this->segmentoO[$loteNumero], $modeloSegmentoODefault, $modeloSegmentoODinamico, 'segmentoO');
                }

                foreach ($this->segmentoJ[$loteNumero] as $keySegmentoJ => $dadosSegmentoJ) {

                    $segmentoJ = [];

                    foreach ($modeloSegmentoJ as $keyModeloJ => $especificacoesModeloJ) {

                        $valorJ = $arquivoPadrao->tratarDados($especificacoesModeloJ, $dadosSegmentoJ[$keyModeloJ], $keyModeloJ, $config, 'segmentoJ');

                        if (isset($modeloSegmentoJValidacao[$keyModeloJ])) {
                            $validacaoCnab->{$modeloSegmentoJValidacao[$keyModeloJ]}($valorJ, $keyModeloJ, $dadosSegmentoJ, 'segmentoJ');
                        }

                        $segmentoJ[] = $valorJ;
                    }

                    $contalinhas++;
                    $quantTitulos++;
                    $segmentoJ52 = [];

                    foreach ($modeloSegmentoJ52 as $keyModeloJ52 => $especificacoesModeloJ52) {

                        $valorJ52 = $arquivoPadrao->tratarDados($especificacoesModeloJ52, $this->segmentoJ52[$loteNumero][$keySegmentoJ][$keyModeloJ52], $keyModeloJ52, $config, 'segmentoJ52');

                        if (isset($modeloSegmentoJ52Validacao[$keyModeloJ52])) {
                            $validacaoCnab->{$modeloSegmentoJ52Validacao[$keyModeloJ52]}($valorJ52, $keyModeloJ52, $this->segmentoJ52[$loteNumero][$keySegmentoJ], 'segmentoJ52');
                        }

                        $segmentoJ52[] = $valorJ52;
                    }

                    $contalinhas++;

                    if (isset($this->segmentoO[$loteNumero])) {

                        $segmentoO = [];

                        foreach ($modeloSegmentoO as $keyModeloO => $especificacoesModeloO) {

                            $valorO = $arquivoPadrao->tratarDados($especificacoesModeloO, $this->segmentoO[$loteNumero][$keySegmentoJ][$keyModeloO], $keyModeloO, $config, 'segmentoO');

                            if (isset($modeloSegmentoOValidacao[$keyModeloO])) {
                                $validacaoCnab->{$modeloSegmentoOValidacao[$keyModeloO]}($valorO, $keyModeloO, $this->segmentoO[$loteNumero][$keySegmentoJ], 'segmentoO');
                            }

                            $segmentoO[] = $valorO;
                        }

                        $contalinhas++;
                    }

                    $this->linhas[] = $segmentoJ;
                    $this->linhas[] = $segmentoJ52;

                    if ($this->segmentoO[$loteNumero]) {
                        $this->linhas[] = $segmentoO;
                    }
                }
            }

            #Remessa
            if (isset($this->segmentoP[$loteNumero])) {
                $modeloSegmentoP = $iLayout->segmentoP();
                $modeloSegmentoPDefault = $iLayout->segmentoPDefault($headerArquivo);
                $modeloSegmentoPValidacao = $iLayout->segmentoPValidacao();
                $modeloSegmentoPDinamico = $iLayout->segmentoPDinamico();

                $validacaoCnab->validaSegmentosObrigatorios($this->segmentoP[$loteNumero], "P", $segmentosObrigatorios);
                $this->segmentoP[$loteNumero] = $validacaoCnab->setDefault($modeloSegmentoP, $this->segmentoP[$loteNumero], $modeloSegmentoPDefault, $modeloSegmentoPDinamico, 'segmentoP');

                $modeloSegmentoQ = $iLayout->segmentoQ();
                $modeloSegmentoQDefault = $iLayout->segmentoQDefault($headerArquivo);
                $modeloSegmentoQValidacao = $iLayout->segmentoQValidacao();
                $modeloSegmentoQDinamico = $iLayout->segmentoQDinamico();


                $validacaoCnab->validaSegmentosObrigatorios($this->segmentoQ[$loteNumero], "Q", $segmentosObrigatorios);
                $this->segmentoQ[$loteNumero] = $validacaoCnab->setDefault($modeloSegmentoQ, $this->segmentoQ[$loteNumero], $modeloSegmentoQDefault, $modeloSegmentoQDinamico, 'segmentoQ');

                if (isset($this->segmentoR[$loteNumero])) {
                    $modeloSegmentoR = $iLayout->segmentoR();
                    $modeloSegmentoRDefault = $iLayout->segmentoRDefault($headerArquivo);
                    $modeloSegmentoRValidacao = $iLayout->segmentoRValidacao();
                    $modeloSegmentoRDinamico = $iLayout->segmentoRDinamico();

                    $validacaoCnab->validaSegmentosObrigatorios($this->segmentoR[$loteNumero], "R", $segmentosObrigatorios);
                    $this->segmentoR[$loteNumero] = $validacaoCnab->setDefault($modeloSegmentoR, $this->segmentoR[$loteNumero], $modeloSegmentoRDefault, $modeloSegmentoRDinamico, 'segmentoR');
                }

                foreach ($this->segmentoP[$loteNumero] as $keySegmentoP => $dadosSegmentoP) {

                    $segmentoP = [];
                    $somaValor += $dadosSegmentoP[21];

                    foreach ($modeloSegmentoP as $keyModeloP => $especificacoesModeloP) {

                        $valorP = $arquivoPadrao->tratarDados($especificacoesModeloP, $dadosSegmentoP[$keyModeloP], $keyModeloP, $config, 'segmentoP');

                        if (isset($modeloSegmentoPValidacao[$keyModeloP])) {
                            $validacaoCnab->{$modeloSegmentoPValidacao[$keyModeloP]}($valorP, $keyModeloP, $dadosSegmentoP, 'segmentoP');
                        }

                        $segmentoP[] = $valorP;
                    }

                    $contalinhas++;
                    $quantTitulos++;
                    $segmentoQ = [];

                    foreach ($modeloSegmentoQ as $keyModeloQ => $especificacoesModeloQ) {

                        $valorQ = $arquivoPadrao->tratarDados($especificacoesModeloQ, $this->segmentoQ[$loteNumero][$keySegmentoP][$keyModeloQ], $keyModeloQ, $config, 'segmentoQ');

                        if (isset($modeloSegmentoQValidacao[$keyModeloQ])) {
                            $validacaoCnab->{$modeloSegmentoQValidacao[$keyModeloQ]}($valorQ, $keyModeloQ, $this->segmentoQ[$loteNumero][$keySegmentoP], 'segmentoQ');
                        }

                        $segmentoQ[] = $valorQ;
                    }

                    $contalinhas++;
                    if (isset($this->segmentoR[$loteNumero])) {

                        $segmentoR = [];

                        foreach ($modeloSegmentoR as $keyModeloR => $especificacoesModeloR) {

                            $valorR = $arquivoPadrao->tratarDados($especificacoesModeloR, $this->segmentoR[$loteNumero][$keySegmentoP][$keyModeloR], $keyModeloR, $config, 'segmentoR');

                            if (isset($modeloSegmentoRValidacao[$keyModeloR])) {
                                $validacaoCnab->{$modeloSegmentoRValidacao[$keyModeloR]}($valorR, $keyModeloR, $this->segmentoR[$loteNumero][$keySegmentoP], 'segmentoR');
                            }

                            $segmentoR[] = $valorR;
                        }

                        $contalinhas++;
                    }

                    $this->linhas[] = $segmentoP;
                    $this->linhas[] = $segmentoQ;

                    if (isset($this->segmentoR[$loteNumero])) {
                        $this->linhas[] = $segmentoR;
                    }
                }
            }

            $modeloTraillerLote = $iLayout->traillerLote();
            $modeloTraillerLoteDefault = $iLayout->traillerLoteDefault($headerArquivo);
            $modeloTraillerLoteValidacao = $iLayout->traillerLoteValidacao();
            $modeloTraillerLoteDinamico = $iLayout->traillerLoteDinamico($quantTitulos, $somaValor);
            $traillerLote = [];

            $this->traillerLote[$loteNumero] = $validacaoCnab->setDefault($modeloTraillerLote, $this->traillerLote[$loteNumero], $modeloTraillerLoteDefault, $modeloTraillerLoteDinamico, 'traillerLote');

            foreach ($modeloTraillerLote as $key => $especificacoes) {

                $valor = $arquivoPadrao->tratarDados($especificacoes, $this->traillerLote[$loteNumero][$key], $key, $config, 'traillerLote');

                if (isset($modeloTraillerLoteValidacao[$key])) {
                    $validacaoCnab->{$modeloTraillerLoteValidacao[$key]}($valor, $key, $this->traillerLote[$loteNumero], 'traillerLote');
                }

                $traillerLote[] = $valor;
            }

            $validacaoCnab->validaSegmentosObrigatorios($this->traillerLote[$loteNumero], 5, $segmentosObrigatorios);
            $this->linhas[] = $traillerLote;
        }//Fim forech trailler lote


        $modeloTraillerArquivo = $iLayout->traillerArquivo();
        $modeloTraillerArquivoDefault = $iLayout->traillerArquivoDefault($headerArquivo);
        $modeloTraillerArquivoValidacao = $iLayout->traillerArquivoValidacao();
        $modeloTraillerArquivoDinamico = $iLayout->traillerArquivoDinamico($contalinhas);
        $traillerArquivo = [];

        $this->traillerArquivo = $validacaoCnab->setDefault($modeloTraillerArquivo, $this->traillerArquivo, $modeloTraillerArquivoDefault, $modeloTraillerArquivoDinamico, 'traillerArquivo');

        foreach ($modeloTraillerArquivo as $key => $especificacoes) {


            $valor = $arquivoPadrao->tratarDados($especificacoes, $this->traillerArquivo[$key], $key, $config, 'traillerArquivo');

            if (isset($modeloTraillerArquivoValidacao[$key])) {
                $validacaoCnab->{$modeloTraillerArquivoValidacao[$key]}($valor, $key, $this->traillerArquivo, 'traillerArquivo');
            }

            $traillerArquivo[] = $valor;
        }

        $this->linhas[] = $traillerArquivo;
        $validacaoCnab->validaTamanhoArray($this->linhas);

        return $this->linhas;
    }

    public function gerar($layout, $caminhoArquivo, $nomeArquivo, $config = [])
    {
        $arquivoPadrao = new ArquivoPadrao();

        $linhas = $this->processar($layout, $config);

        return $arquivoPadrao->gravar($linhas, $caminhoArquivo, $nomeArquivo);
    }

}
