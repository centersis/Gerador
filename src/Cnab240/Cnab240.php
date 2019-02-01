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
    private $linhas;

    function __construct()
    {
        $this->headerArquivo = [];
        $this->headerLote = [];
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

        $headerLote = [];
        $validacaoCnab->validaSegmentosObrigatorios($this->headerLote, 1, $segmentosObrigatorios);

        $this->headerLote = $validacaoCnab->setDefault($modeloHeaderLote, $this->headerLote, $modeloHeaderLoteDefault, $modeloHeaderLoteDinamico, 'headerLote');

        foreach ($modeloHeaderLote as $key => $especificacoes) {

            $valor = $arquivoPadrao->tratarDados($especificacoes, $this->headerLote[$key], $key, $config, 'headerLote');

            if (isset($modeloHeaderLoteValidacao[$key])) {
                $validacaoCnab->{$modeloHeaderLoteValidacao[$key]}($valor, $key, $headerLote, 'headerLote');
            }

            $headerLote[] = $valor;
        }

        $this->linhas[] = $headerLote;

        $modeloSegmentoP = $iLayout->segmentoP();
        $modeloSegmentoPDefault = $iLayout->segmentoPDefault($headerArquivo);
        $modeloSegmentoPValidacao = $iLayout->segmentoPValidacao();
        $modeloSegmentoPDinamico = $iLayout->segmentoPDinamico();

        $validacaoCnab->validaSegmentosObrigatorios($this->segmentoP, "P", $segmentosObrigatorios);
        $this->segmentoP = $validacaoCnab->setDefault($modeloSegmentoP, $this->segmentoP, $modeloSegmentoPDefault, $modeloSegmentoPDinamico, 'segmentoP');

        $modeloSegmentoQ = $iLayout->segmentoQ();
        $modeloSegmentoQDefault = $iLayout->segmentoQDefault($headerArquivo);
        $modeloSegmentoQValidacao = $iLayout->segmentoQValidacao();
        $modeloSegmentoQDinamico = $iLayout->segmentoQDinamico();

        $validacaoCnab->validaSegmentosObrigatorios($this->segmentoQ, "Q", $segmentosObrigatorios);
        $this->segmentoQ = $validacaoCnab->setDefault($modeloSegmentoQ, $this->segmentoQ, $modeloSegmentoQDefault, $modeloSegmentoQDinamico, 'segmentoQ');

        if ($this->segmentoR) {
            $modeloSegmentoR = $iLayout->segmentoR();
            $modeloSegmentoRDefault = $iLayout->segmentoRDefault($headerArquivo);
            $modeloSegmentoRValidacao = $iLayout->segmentoRValidacao();
            $modeloSegmentoRDinamico = $iLayout->segmentoRDinamico();

            $validacaoCnab->validaSegmentosObrigatorios($this->segmentoR, "R", $segmentosObrigatorios);
            $this->segmentoR = $validacaoCnab->setDefault($modeloSegmentoR, $this->segmentoR, $modeloSegmentoRDefault, $modeloSegmentoRDinamico, 'segmentoR');
        }

        foreach ($this->segmentoP as $keySegmentoP => $dadosSegmentoP) {

            $segmentoP = [];
            $somaValor += $dadosSegmentoP[21];

            foreach ($modeloSegmentoP as $keyModeloP => $especificacoesModeloP) {

                $valorP = $arquivoPadrao->tratarDados($especificacoesModeloP, $dadosSegmentoP[$keyModeloP], $keyModeloP, $config, 'segmentoP');

                if (isset($modeloSegmentoPValidacao[$keyModeloP])) {
                    $validacaoCnab->{$modeloSegmentoPValidacao[$keyModeloP]}($valorP, $keyModeloP, $dadosSegmentoP, 'segmentoPY');
                }

                $segmentoP[] = $valorP;
            }

            $contalinhas++;
            $quantTitulos++;
            $segmentoQ = [];

            foreach ($modeloSegmentoQ as $keyModeloQ => $especificacoesModeloQ) {

                $valorQ = $arquivoPadrao->tratarDados($especificacoesModeloQ, $this->segmentoQ[$keySegmentoP][$keyModeloQ], $keyModeloQ, $config, 'segmentoQ');

                if (isset($modeloSegmentoQValidacao[$keyModeloQ])) {
                    $validacaoCnab->{$modeloSegmentoQValidacao[$keyModeloQ]}($valorQ, $keyModeloQ, $this->segmentoQ[$keySegmentoP], 'segmentoQ');
                }

                $segmentoQ[] = $valorQ;
            }

            $contalinhas++;
            if ($this->segmentoR) {

                $segmentoR = [];

                foreach ($modeloSegmentoR as $keyModeloR => $especificacoesModeloR) {

                    $valorR = $arquivoPadrao->tratarDados($especificacoesModeloR, $this->segmentoR[$keySegmentoP][$keyModeloR], $keyModeloR, $config, 'segmentoR');

                    if (isset($modeloSegmentoRValidacao[$keyModeloR])) {
                        $validacaoCnab->{$modeloSegmentoRValidacao[$keyModeloR]}($valorR, $keyModeloR, $this->segmentoR[$keySegmentoP], 'segmentoR');
                    }

                    $segmentoR[] = $valorR;
                }

                $contalinhas++;
            }

            $this->linhas[] = $segmentoP;
            $this->linhas[] = $segmentoQ;

            if ($this->segmentoR) {
                $this->linhas[] = $segmentoR;
            }
        }


        $modeloTraillerLote = $iLayout->traillerLote();
        $modeloTraillerLoteDefault = $iLayout->traillerLoteDefault($headerArquivo);
        $modeloTraillerLoteValidacao = $iLayout->traillerLoteValidacao();
        $modeloTraillerLoteDinamico = $iLayout->traillerLoteDinamico($quantTitulos, $somaValor);
        $traillerLote = [];

        $this->traillerLote = $validacaoCnab->setDefault($modeloTraillerLote, $this->traillerLote, $modeloTraillerLoteDefault, $modeloTraillerLoteDinamico, 'traillerLote');

        foreach ($modeloTraillerLote as $key => $especificacoes) {

            $valor = $arquivoPadrao->tratarDados($especificacoes, $this->traillerLote[$key], $key, $config, 'traillerLote');

            if (isset($modeloTraillerLoteValidacao[$key])) {
                $validacaoCnab->{$modeloTraillerLoteValidacao[$key]}($valor, $key, $this->traillerLote, 'traillerLote');
            }

            $traillerLote[] = $valor;
        }

        $validacaoCnab->validaSegmentosObrigatorios($this->traillerLote, 5, $segmentosObrigatorios);
        $this->linhas[] = $traillerLote;

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
