<?php

namespace Gerador\Src\Cnab240;

use Gerador\Src\Arquivo\ArquivoPadrao;
use Gerador\Src\Cnab240\ValidacaoCnab240;
use Gerador\Src\Base;

class Cnab240Empresarial extends Base
{

    protected $headerArquivo;
    protected $headerLoteTitulo;
    protected $headerLoteConvenio;
    protected $segmentoJ;
    protected $segmentoJ52;
    protected $segmentoO;
    protected $trailerLoteTitulo;
    protected $trailerLoteConvenio;
    protected $trailerArquivo;
    protected $lotes;

    function __construct()
    {
        parent::__construct();
        
        $this->headerArquivo = [];
        $this->headerLoteTitulo = [];
        $this->headerLoteConvenio = [];
        $this->segmentoJ = [];
        $this->segmentoJ52 = [];
        $this->segmentoO = [];
        $this->trailerLoteTitulo = [];
        $this->trailerLoteConvenio = [];
        $this->trailerArquivo = [];
        $this->lotes = [];
    }

    function setHeaderArquivo($headerArquivo)
    {
        $this->headerArquivo = $headerArquivo;
    }

    function setHeaderLoteTitulo($headerLote, $lote)
    {
        $this->lotes[$lote] = 'titulo';
        $this->headerLoteTitulo[$lote] = $headerLote;
    }

    function setHeaderLoteConvenio($headerLote, $lote)
    {
        $this->lotes[$lote] = 'convenio';
        $this->headerLoteConvenio[$lote] = $headerLote;
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

    function setTrailerLoteTitulo($trailerLote, $lote)
    {
        $this->trailerLoteTitulo[$lote] = $trailerLote;
    }

    function setTrailerLoteConvenio($trailerLote, $lote)
    {
        $this->trailerLoteConvenio[$lote] = $trailerLote;
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

        foreach ($this->lotes as $loteNumero => $loteTipo) {

            if ($loteTipo == 'titulo') {

                $modeloHeaderLoteTituloDefault = $iLayout->headerLoteTituloDefault();
                $modeloHeaderLoteTituloValidacao = $iLayout->headerLoteTituloValidacao();
                $modeloHeaderLoteTitulo = $iLayout->headerLoteTitulo();

                $headerLoteTitulo = [];
                
                $this->headerLoteTitulo[$loteNumero] = $validacaoCnab->setDefault($modeloHeaderLoteTitulo, $this->headerLoteTitulo[$loteNumero], $modeloHeaderLoteTituloDefault, 'headerLoteTitulo');

                foreach ($modeloHeaderLoteTitulo as $key => $especificacoes) {

                    $valor = $arquivoPadrao->tratarDados($especificacoes, $this->headerLoteTitulo[$loteNumero][$key], $key, $config, 'headerLoteTitulo');

                    if (isset($modeloHeaderLoteTituloValidacao[$key])) {
                        $validacaoCnab->{$modeloHeaderLoteTituloValidacao[$key]}($valor, $key, $headerLoteTitulo, 'headerLoteTitulo');
                    }

                    $headerLoteTitulo[] = $valor;
                }

                $this->linhas[] = $headerLoteTitulo;
                
                $modeloSegmentoJ = $iLayout->segmentoJ();
                $modeloSegmentoJDefault = $iLayout->segmentoJDefault();
                $modeloSegmentoJValidacao = $iLayout->segmentoJValidacao();

                $this->segmentoJ[$loteNumero] = $validacaoCnab->setDefault($modeloSegmentoJ, $this->segmentoJ[$loteNumero], $modeloSegmentoJDefault, 'segmentoJ');

                $modeloSegmentoJ52 = $iLayout->segmentoJ52();
                $modeloSegmentoJ52Default = $iLayout->segmentoJ52Default();
                $modeloSegmentoJ52Validacao = $iLayout->segmentoJ52Validacao();

                $this->segmentoJ52[$loteNumero] = $validacaoCnab->setDefault($modeloSegmentoJ52, $this->segmentoJ52[$loteNumero], $modeloSegmentoJ52Default, 'segmentoJ52');

                foreach ($this->segmentoJ[$loteNumero] as $keySegmentoJ => $dadosSegmentoJ) {

                    $segmentoJ = [];

                    foreach ($modeloSegmentoJ as $keyModeloJ => $especificacoesModeloJ) {

                        $valorJ = $arquivoPadrao->tratarDados($especificacoesModeloJ, $dadosSegmentoJ[$keyModeloJ], $keyModeloJ, $config, 'segmentoJ');

                        if (isset($modeloSegmentoJValidacao[$keyModeloJ])) {
                            $validacaoCnab->{$modeloSegmentoJValidacao[$keyModeloJ]}($valorJ, $keyModeloJ, $dadosSegmentoJ, 'segmentoJ');
                        }

                        $segmentoJ[] = $valorJ;
                    }

                    $segmentoJ52 = [];

                    foreach ($modeloSegmentoJ52 as $keyModeloJ52 => $especificacoesModeloJ52) {

                        $valorJ52 = $arquivoPadrao->tratarDados($especificacoesModeloJ52, $this->segmentoJ52[$loteNumero][$keySegmentoJ][$keyModeloJ52], $keyModeloJ52, $config, 'segmentoJ52');

                        if (isset($modeloSegmentoJ52Validacao[$keyModeloJ52])) {
                            $validacaoCnab->{$modeloSegmentoJ52Validacao[$keyModeloJ52]}($valorJ52, $keyModeloJ52, $this->segmentoJ52[$loteNumero][$keySegmentoJ], 'segmentoJ52');
                        }

                        $segmentoJ52[] = $valorJ52;
                    }

                    $this->linhas[] = $segmentoJ;
                    $this->linhas[] = $segmentoJ52;
                }

                $modeloTrailerLoteTitulo = $iLayout->trailerLoteTitulo();
                $modeloTrailerLoteTituloDefault = $iLayout->trailerLoteTituloDefault();
                $modeloTrailerLoteTituloValidacao = $iLayout->trailerLoteTituloValidacao();
                $trailerLoteTitulo = [];

                $this->trailerLoteTitulo[$loteNumero] = $validacaoCnab->setDefault($modeloTrailerLoteTitulo, $this->trailerLoteTitulo[$loteNumero], $modeloTrailerLoteTituloDefault, 'trailerLoteTitulo');

                foreach ($modeloTrailerLoteTitulo as $key => $especificacoes) {

                    $valor = $arquivoPadrao->tratarDados($especificacoes, $this->trailerLoteTitulo[$loteNumero][$key], $key, $config, 'trailerLoteTitulo');

                    if (isset($modeloTrailerLoteTituloValidacao[$key])) {
                        $validacaoCnab->{$modeloTrailerLoteTituloValidacao[$key]}($valor, $key, $this->trailerLoteTitulo[$loteNumero], 'trailerLoteTitulo');
                    }

                    $trailerLoteTitulo[] = $valor;
                }

                $this->linhas[] = $trailerLoteTitulo;
            } else if ($loteTipo == 'convenio') { ##Tipo Convênio-------------------------------------------------------------------------------------------------
                $modeloHeaderLoteConvenioDefault = $iLayout->headerLoteConvenioDefault();
                $modeloHeaderLoteConvenioValidacao = $iLayout->headerLoteConvenioValidacao();
                $modeloHeaderLoteConvenio = $iLayout->headerLoteConvenio();

                $headerLoteConvenio = [];

                $this->headerLoteConvenio[$loteNumero] = $validacaoCnab->setDefault($modeloHeaderLoteConvenio, $this->headerLoteConvenio[$loteNumero], $modeloHeaderLoteConvenioDefault, 'headerLoteConvenio');

                foreach ($modeloHeaderLoteConvenio as $key => $especificacoes) {

                    $valor = $arquivoPadrao->tratarDados($especificacoes, $this->headerLoteConvenio[$loteNumero][$key], $key, $config, 'headerLoteConvenio');

                    if (isset($modeloHeaderLoteConvenioValidacao[$key])) {
                        $validacaoCnab->{$modeloHeaderLoteConvenioValidacao[$key]}($valor, $key, $headerLoteConvenio, 'headerLoteConvenio');
                    }

                    $headerLoteConvenio[] = $valor;
                }

                $this->linhas[] = $headerLoteConvenio;

                $modeloSegmentoO = $iLayout->segmentoO();
                $modeloSegmentoODefault = $iLayout->segmentoODefault();
                $modeloSegmentoOValidacao = $iLayout->segmentoOValidacao();

                $this->segmentoO[$loteNumero] = $validacaoCnab->setDefault($modeloSegmentoO, $this->segmentoO[$loteNumero], $modeloSegmentoODefault, 'segmentoO');

                foreach ($this->segmentoO[$loteNumero] as $dadosSegmentoO) {

                    $segmentoO = [];

                    foreach ($modeloSegmentoO as $keyModeloO => $especificacoesModeloO) {

                        $valorO = $arquivoPadrao->tratarDados($especificacoesModeloO, $dadosSegmentoO[$keyModeloO], $keyModeloO, $config, 'segmentoO');

                        if (isset($modeloSegmentoOValidacao[$keyModeloO])) {
                            $validacaoCnab->{$modeloSegmentoOValidacao[$keyModeloO]}($valorO, $keyModeloO, $dadosSegmentoO, 'segmentoO');
                        }

                        $segmentoO[] = $valorO;
                    }

                    $this->linhas[] = $segmentoO;
                }

                $modeloTrailerLoteConvenio = $iLayout->trailerLoteConvenio();
                $modeloTrailerLoteConvenioDefault = $iLayout->trailerLoteConvenioDefault();
                $modeloTrailerLoteConvenioValidacao = $iLayout->trailerLoteConvenioValidacao();
                $trailerLoteConvenio = [];

                $this->trailerLoteConvenio[$loteNumero] = $validacaoCnab->setDefault($modeloTrailerLoteConvenio, $this->trailerLoteConvenio[$loteNumero], $modeloTrailerLoteConvenioDefault, 'trailerLoteConvenio');

                foreach ($modeloTrailerLoteConvenio as $key => $especificacoes) {

                    $valor = $arquivoPadrao->tratarDados($especificacoes, $this->trailerLoteConvenio[$loteNumero][$key], $key, $config, 'trailerLoteConvenio');

                    if (isset($modeloTrailerLoteConvenioValidacao[$key])) {
                        $validacaoCnab->{$modeloTrailerLoteConvenioValidacao[$key]}($valor, $key, $this->trailerLoteConvenio[$loteNumero], 'trailerLoteConvenio');
                    }

                    $trailerLoteConvenio[] = $valor;
                }

                $this->linhas[] = $trailerLoteConvenio;
            }
        }//Fim forech trailer lote

        $modeloTrailerArquivo = $iLayout->trailerArquivo();
        $modeloTrailerArquivoDefault = $iLayout->trailerArquivoDefault();
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
        
        $this->validaSegmentosObrigatorios($config);
        
        $validacaoCnab->validaTamanhoArray($this->linhas);

        return $this->linhas;
    }
}
