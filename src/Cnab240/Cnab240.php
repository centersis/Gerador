<?php

namespace Cnab240;

use Arquivo\ArquivoPadrao;
use Cnab240\ValidacaoCnab240;

class Cnab240
{

    private $headerArquivo;
    private $headerLote;
    private $segmentoP;
    private $segmentoQ;
    private $segmentoR;
    private $traillerLote;
    private $traillerArquivo;

    function __construct()
    {
        $this->headerArquivo = [];
        $this->headerLote = [];
        $this->segmentoP = [];
        $this->segmentoQ = [];
        $this->segmentoR = [];
        $this->traillerLote = [];
        $this->traillerArquivo = [];
    }

    function setHeaderArquivo($headerArquivo)
    {
        $this->headerArquivo = $headerArquivo;
    }

    function setHeaderLote($headerLote)
    {
        $this->headerLote = $headerLote;
    }

    function setSegmentoP($segmentoP)
    {
        $this->segmentoP[] = $segmentoP;
    }

    function setSegmentoQ($segmentoQ)
    {
        $this->segmentoQ[] = $segmentoQ;
    }

    function setSegmentoR($segmentoR)
    {
        $this->segmentoR[] = $segmentoR;
    }

    function setTraillerLote($traillerLote)
    {
        $this->traillerLote = $traillerLote;
    }

    function setTraillerArquivo($traillerArquivo)
    {
        $this->traillerArquivo = $traillerArquivo;
    }

    public function gerar($layout, $caminhoArquivo, $nomeArquivo, $config = [])
    {

        $caminho = 'Cnab240\\Layout\\' . $layout;

        $instancia = new $caminho;
        $instanciaPadrao = new ArquivoPadrao();
        $validacaoCnab = new ValidacaoCnab240();

        $resultado = [];
        $contalinhas = 4;
        $somaValor = 0;
        $quantTitulos = 0;
        $headerArquivo = [];

        $segmentosObrigatorios = $instancia->segmentosObrigatorios();
        $modeloHeaderArqDefault = $instancia->headerArquivoDefault();
        $modeloHeaderArqValidacao = $instancia->headerArquivoValidacao();
        $modeloHeaderArqDinamico = $instancia->headerArquivoDinamico();
        $modeloHeaderArquivo = $instancia->headerArquivo();
        $validacaoCnab->validaSegmentosObrigatorios($this->headerArquivo, 0, $segmentosObrigatorios);

        $this->headerArquivo = $validacaoCnab->setDefault($modeloHeaderArquivo, $this->headerArquivo, $modeloHeaderArqDefault, $modeloHeaderArqDinamico, 'headerArquivo');

        foreach ($modeloHeaderArquivo as $key => $especificacoes) {

            $valor = $instanciaPadrao->tratarDados($especificacoes, $this->headerArquivo[$key], $key, $config, 'headerArquivo');

            if (isset($modeloHeaderArqValidacao[$key])) {
                $validacaoCnab->{$modeloHeaderArqValidacao[$key]}($valor, $key, $this->headerArquivo, 'headerArquivo');
            }

            $headerArquivo[] = $valor;
        }

        $resultado[] = $headerArquivo;

        $modeloHeaderLoteDefault = $instancia->headerloteDefault($headerArquivo);
        $modeloHeaderLoteValidacao = $instancia->headerLoteValidacao();
        $modeloHeaderLoteDinamico = $instancia->headerLoteDinamico();
        $modeloHeaderLote = $instancia->headerLote();

        $headerLote = [];
        $validacaoCnab->validaSegmentosObrigatorios($this->headerLote, 1, $segmentosObrigatorios);

        $this->headerLote = $validacaoCnab->setDefault($modeloHeaderLote, $this->headerLote, $modeloHeaderLoteDefault, $modeloHeaderLoteDinamico, 'headerLote');

        foreach ($modeloHeaderLote as $key => $especificacoes) {

            $valor = $instanciaPadrao->tratarDados($especificacoes, $this->headerLote[$key], $key, $config, 'headerLote');

            if (isset($modeloHeaderLoteValidacao[$key])) {
                $validacaoCnab->{$modeloHeaderLoteValidacao[$key]}($valor, $key, $headerLote, 'headerLote');
            }

            $headerLote[] = $valor;
        }

        $resultado[] = $headerLote;

        $modeloSegmentoP = $instancia->segmentoP();
        $modeloSegmentoPDefault = $instancia->segmentoPDefault($headerArquivo);
        $modeloSegmentoPValidacao = $instancia->segmentoPValidacao();
        $modeloSegmentoPDinamico = $instancia->segmentoPDinamico();

        $validacaoCnab->validaSegmentosObrigatorios($this->segmentoP, "P", $segmentosObrigatorios);
        $this->segmentoP = $validacaoCnab->setDefault($modeloSegmentoP, $this->segmentoP, $modeloSegmentoPDefault, $modeloSegmentoPDinamico, 'segmentoP');

        $modeloSegmentoQ = $instancia->segmentoQ();
        $modeloSegmentoQDefault = $instancia->segmentoQDefault($headerArquivo);
        $modeloSegmentoQValidacao = $instancia->segmentoQValidacao();
        $modeloSegmentoQDinamico = $instancia->segmentoQDinamico();

        $validacaoCnab->validaSegmentosObrigatorios($this->segmentoQ, "Q", $segmentosObrigatorios);
        $this->segmentoQ = $validacaoCnab->setDefault($modeloSegmentoQ, $this->segmentoQ, $modeloSegmentoQDefault, $modeloSegmentoQDinamico, 'segmentoQ');

        if ($this->segmentoR) {
            $modeloSegmentoR = $instancia->segmentoR();
            $modeloSegmentoRDefault = $instancia->segmentoRDefault($headerArquivo);
            $modeloSegmentoRValidacao = $instancia->segmentoRValidacao();
            $modeloSegmentoRDinamico = $instancia->segmentoRDinamico();

            $validacaoCnab->validaSegmentosObrigatorios($this->segmentoR, "R", $segmentosObrigatorios);
            $this->segmentoR = $validacaoCnab->setDefault($modeloSegmentoR, $this->segmentoR, $modeloSegmentoRDefault, $modeloSegmentoRDinamico, 'segmentoR');
        }

        foreach ($this->segmentoP as $keySegmentoP => $dadosSegmentoP) {

            $segmentoP = [];
            $somaValor += $dadosSegmentoP[21];

            foreach ($modeloSegmentoP as $keyModeloP => $especificacoesModeloP) {

                $valorP = $instanciaPadrao->tratarDados($especificacoesModeloP, $dadosSegmentoP[$keyModeloP], $keyModeloP, $config, 'segmentoP');

                if (isset($modeloSegmentoPValidacao[$keyModeloP])) {
                    $validacaoCnab->{$modeloSegmentoPValidacao[$keyModeloP]}($valorP, $keyModeloP, $dadosSegmentoP, 'segmentoPY');
                }

                $segmentoP[] = $valorP;
            }

            $contalinhas++;
            $quantTitulos++;
            $segmentoQ = [];

            foreach ($modeloSegmentoQ as $keyModeloQ => $especificacoesModeloQ) {

                $valorQ = $instanciaPadrao->tratarDados($especificacoesModeloQ, $this->segmentoQ[$keySegmentoP][$keyModeloQ], $keyModeloQ, $config, 'segmentoQ');

                if (isset($modeloSegmentoQValidacao[$keyModeloQ])) {
                    $validacaoCnab->{$modeloSegmentoQValidacao[$keyModeloQ]}($valorQ, $keyModeloQ, $this->segmentoQ[$keySegmentoP], 'segmentoQ');
                }

                $segmentoQ[] = $valorQ;
            }

            $contalinhas++;
            if ($this->segmentoR) {

                $segmentoR = [];

                foreach ($modeloSegmentoR as $keyModeloR => $especificacoesModeloR) {

                    $valorR = $instanciaPadrao->tratarDados($especificacoesModeloR, $this->segmentoR[$keySegmentoP][$keyModeloR], $keyModeloR, $config, 'segmentoR');

                    if (isset($modeloSegmentoRValidacao[$keyModeloR])) {
                        $validacaoCnab->{$modeloSegmentoRValidacao[$keyModeloR]}($valorR, $keyModeloR, $this->segmentoR[$keySegmentoP], 'segmentoR');
                    }

                    $segmentoR[] = $valorR;
                }

                $contalinhas++;
            }

            $resultado[] = $segmentoP;
            $resultado[] = $segmentoQ;

            if ($this->segmentoR) {
                $resultado[] = $segmentoR;
            }
        }


        $modeloTraillerLote = $instancia->traillerLote();
        $modeloTraillerLoteDefault = $instancia->traillerLoteDefault($headerArquivo);
        $modeloTraillerLoteValidacao = $instancia->traillerLoteValidacao();
        $modeloTraillerLoteDinamico = $instancia->traillerLoteDinamico($quantTitulos, $somaValor);
        $traillerLote = [];

        $this->traillerLote = $validacaoCnab->setDefault($modeloTraillerLote, $this->traillerLote, $modeloTraillerLoteDefault, $modeloTraillerLoteDinamico, 'traillerLote');

        foreach ($modeloTraillerLote as $key => $especificacoes) {

            $valor = $instanciaPadrao->tratarDados($especificacoes, $this->traillerLote[$key], $key, $config, 'traillerLote');

            if (isset($modeloTraillerLoteValidacao[$key])) {
                $validacaoCnab->{$modeloTraillerLoteValidacao[$key]}($valor, $key, $this->traillerLote, 'traillerLote');
            }

            $traillerLote[] = $valor;
        }

        $validacaoCnab->validaSegmentosObrigatorios($this->traillerLote, 5, $segmentosObrigatorios);
        $resultado[] = $traillerLote;

        $modeloTraillerArquivo = $instancia->traillerArquivo();
        $modeloTraillerArquivoDefault = $instancia->traillerArquivoDefault($headerArquivo);
        $modeloTraillerArquivoValidacao = $instancia->traillerArquivoValidacao();
        $modeloTraillerArquivoDinamico = $instancia->traillerArquivoDinamico($contalinhas);
        $traillerArquivo = [];

        $this->traillerArquivo = $validacaoCnab->setDefault($modeloTraillerArquivo, $this->traillerArquivo, $modeloTraillerArquivoDefault, $modeloTraillerArquivoDinamico, 'traillerArquivo');

        foreach ($modeloTraillerArquivo as $key => $especificacoes) {


            $valor = $instanciaPadrao->tratarDados($especificacoes, $this->traillerArquivo[$key], $key, $config, 'traillerArquivo');

            if (isset($modeloTraillerArquivoValidacao[$key])) {
                $validacaoCnab->{$modeloTraillerArquivoValidacao[$key]}($valor, $key, $this->traillerArquivo, 'traillerArquivo');
            }

            $traillerArquivo[] = $valor;
        }

        $resultado[] = $traillerArquivo;
        $validacaoCnab->validaTamanhoArray($resultado);

        return $instanciaPadrao->gravar($resultado, $caminhoArquivo, $nomeArquivo);
    }

}
