<?php

namespace Gerador\Src\Cnab240;

use Gerador\Src\Arquivo\ArquivoPadrao;
use Gerador\Src\Cnab240\ValidacaoCnab240;
use Gerador\Src\Base;

class Cnab240 extends Base
{

    protected $headerArquivo;
    protected $headerLote;
    protected $segmentoP;
    protected $segmentoQ;
    protected $segmentoR;
    protected $trailerLote;
    protected $trailerArquivo;

    function __construct()
    {
        parent::__construct();

        $this->headerArquivo = [];
        $this->headerLote = [];
        $this->segmentoP = [];
        $this->segmentoQ = [];
        $this->segmentoR = [];
        $this->trailerLote = [];
        $this->trailerArquivo = [];
    }

    function setHeaderArquivo($headerArquivo)
    {
        $this->headerArquivo = $headerArquivo;
    }

    function setHeaderLote($headerLote, $lote)
    {
        $this->headerLote[$lote] = $headerLote;
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

    function setTrailerLote($trailerLote, $lote)
    {
        $this->trailerLote[$lote] = $trailerLote;
    }

    function setTrailerArquivo($trailerArquivo)
    {
        $this->trailerArquivo = $trailerArquivo;
    }

    public function processar($layout, $config = [])
    {
        $caminho = 'Gerador\\Src\\Cnab240\\Layout\\' . $layout;

        $iLayout = new $caminho;
        $arquivoPadrao = new ArquivoPadrao();
        $validacaoCnab = new ValidacaoCnab240();

        $this->linhas = [];
        $headerArquivo = [];

        $modeloHeaderArqDefault = $iLayout->headerArquivoDefault();
        $modeloHeaderArqValidacao = $iLayout->headerArquivoValidacao();
        $modeloHeaderArquivo = $iLayout->headerArquivo();

        $this->headerArquivo = $validacaoCnab->setDefault($modeloHeaderArquivo, $this->headerArquivo, $modeloHeaderArqDefault, 'headerArquivo');

        foreach ($modeloHeaderArquivo as $key => $especificacoes) {

            $valor = $arquivoPadrao->tratarDados($especificacoes, $this->headerArquivo[$key], $key, $config, 'headerArquivo');

            if (isset($modeloHeaderArqValidacao[$key])) {
                $validacaoCnab->{$modeloHeaderArqValidacao[$key]}($valor, $key, $this->headerArquivo, 'headerArquivo');
            }

            $headerArquivo[] = $valor;
        }

        $this->linhas[] = $headerArquivo;

        $modeloHeaderLoteDefault = $iLayout->headerloteDefault();
        $modeloHeaderLoteValidacao = $iLayout->headerLoteValidacao();
        $modeloHeaderLote = $iLayout->headerLote();

        foreach (array_keys($this->headerLote) as $loteNumero) {

            $headerLote = [];

            $this->headerLote[$loteNumero] = $validacaoCnab->setDefault($modeloHeaderLote, $this->headerLote[$loteNumero], $modeloHeaderLoteDefault, 'headerLote');

            foreach ($modeloHeaderLote as $key => $especificacoes) {

                $valor = $arquivoPadrao->tratarDados($especificacoes, $this->headerLote[$loteNumero][$key], $key, $config, 'headerLote');

                if (isset($modeloHeaderLoteValidacao[$key])) {
                    $validacaoCnab->{$modeloHeaderLoteValidacao[$key]}($valor, $key, $headerLote, 'headerLote');
                }

                $headerLote[] = $valor;
            }

            $this->linhas[] = $headerLote;

            #Remessa
            if (isset($this->segmentoP[$loteNumero])) {
                $modeloSegmentoP = $iLayout->segmentoP();
                $modeloSegmentoPDefault = $iLayout->segmentoPDefault($headerArquivo);
                $modeloSegmentoPValidacao = $iLayout->segmentoPValidacao();

                $this->segmentoP[$loteNumero] = $validacaoCnab->setDefault($modeloSegmentoP, $this->segmentoP[$loteNumero], $modeloSegmentoPDefault, 'segmentoP');

                $modeloSegmentoQ = $iLayout->segmentoQ();
                $modeloSegmentoQDefault = $iLayout->segmentoQDefault($headerArquivo);
                $modeloSegmentoQValidacao = $iLayout->segmentoQValidacao();


                $this->segmentoQ[$loteNumero] = $validacaoCnab->setDefault($modeloSegmentoQ, $this->segmentoQ[$loteNumero], $modeloSegmentoQDefault, 'segmentoQ');

                if (isset($this->segmentoR[$loteNumero])) {
                    $modeloSegmentoR = $iLayout->segmentoR();
                    $modeloSegmentoRDefault = $iLayout->segmentoRDefault($headerArquivo);
                    $modeloSegmentoRValidacao = $iLayout->segmentoRValidacao();

                    $this->segmentoR[$loteNumero] = $validacaoCnab->setDefault($modeloSegmentoR, $this->segmentoR[$loteNumero], $modeloSegmentoRDefault, 'segmentoR');
                }

                foreach ($this->segmentoP[$loteNumero] as $keySegmentoP => $dadosSegmentoP) {

                    $segmentoP = [];                    

                    foreach ($modeloSegmentoP as $keyModeloP => $especificacoesModeloP) {

                        $valorP = $arquivoPadrao->tratarDados($especificacoesModeloP, $dadosSegmentoP[$keyModeloP], $keyModeloP, $config, 'segmentoP');

                        if (isset($modeloSegmentoPValidacao[$keyModeloP])) {
                            $validacaoCnab->{$modeloSegmentoPValidacao[$keyModeloP]}($valorP, $keyModeloP, $dadosSegmentoP, 'segmentoP');
                        }

                        $segmentoP[] = $valorP;
                    }

                    $segmentoQ = [];

                    foreach ($modeloSegmentoQ as $keyModeloQ => $especificacoesModeloQ) {

                        $valorQ = $arquivoPadrao->tratarDados($especificacoesModeloQ, $this->segmentoQ[$loteNumero][$keySegmentoP][$keyModeloQ], $keyModeloQ, $config, 'segmentoQ');

                        if (isset($modeloSegmentoQValidacao[$keyModeloQ])) {
                            $validacaoCnab->{$modeloSegmentoQValidacao[$keyModeloQ]}($valorQ, $keyModeloQ, $this->segmentoQ[$loteNumero][$keySegmentoP], 'segmentoQ');
                        }

                        $segmentoQ[] = $valorQ;
                    }

                    if (isset($this->segmentoR[$loteNumero])) {

                        $segmentoR = [];

                        foreach ($modeloSegmentoR as $keyModeloR => $especificacoesModeloR) {

                            $valorR = $arquivoPadrao->tratarDados($especificacoesModeloR, $this->segmentoR[$loteNumero][$keySegmentoP][$keyModeloR], $keyModeloR, $config, 'segmentoR');

                            if (isset($modeloSegmentoRValidacao[$keyModeloR])) {
                                $validacaoCnab->{$modeloSegmentoRValidacao[$keyModeloR]}($valorR, $keyModeloR, $this->segmentoR[$loteNumero][$keySegmentoP], 'segmentoR');
                            }

                            $segmentoR[] = $valorR;
                        }
                    }

                    $this->linhas[] = $segmentoP;
                    $this->linhas[] = $segmentoQ;

                    if (isset($this->segmentoR[$loteNumero])) {
                        $this->linhas[] = $segmentoR;
                    }
                }
            }

            $modeloTrailerLote = $iLayout->trailerLote();
            $modeloTrailerLoteDefault = $iLayout->trailerLoteDefault($headerArquivo);
            $modeloTrailerLoteValidacao = $iLayout->trailerLoteValidacao();            
            $trailerLote = [];

            $this->trailerLote[$loteNumero] = $validacaoCnab->setDefault($modeloTrailerLote, $this->trailerLote[$loteNumero], $modeloTrailerLoteDefault, 'trailerLote');

            foreach ($modeloTrailerLote as $key => $especificacoes) {

                $valor = $arquivoPadrao->tratarDados($especificacoes, $this->trailerLote[$loteNumero][$key], $key, $config, 'trailerLote');

                if (isset($modeloTrailerLoteValidacao[$key])) {
                    $validacaoCnab->{$modeloTrailerLoteValidacao[$key]}($valor, $key, $this->trailerLote[$loteNumero], 'trailerLote');
                }

                $trailerLote[] = $valor;
            }

            $this->linhas[] = $trailerLote;
        }//Fim forech trailer lote


        $modeloTrailerArquivo = $iLayout->trailerArquivo();
        $modeloTrailerArquivoDefault = $iLayout->trailerArquivoDefault($headerArquivo);
        $modeloTrailerArquivoValidacao = $iLayout->trailerArquivoValidacao();        
        $trailerArquivo = [];

        $this->trailerArquivo = $validacaoCnab->setDefault($modeloTrailerArquivo, $this->trailerArquivo, $modeloTrailerArquivoDefault, 'trailerArquivo');

        foreach ($modeloTrailerArquivo as $key => $especificacoes) {


            $valor = $arquivoPadrao->tratarDados($especificacoes, $this->trailerArquivo[$key], $key, $config, 'trailerArquivo');

            if (isset($modeloTrailerArquivoValidacao[$key])) {
                $validacaoCnab->{$modeloTrailerArquivoValidacao[$key]}($valor, $key, $this->trailerArquivo, 'trailerArquivo');
            }

            $trailerArquivo[] = $valor;
        }

        $this->linhas[] = $trailerArquivo;
        $validacaoCnab->validaTamanhoArray($this->linhas);

        return $this->linhas;
    }

}
