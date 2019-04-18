<?php

namespace Cnab240;

use Arquivo\ArquivoPadrao;
use Cnab240\ValidacaoCnab240;

class Cnab240Empresarial
{

    private $headerArquivo;
    private $headerLoteTitulo;
    private $headerLoteConvenio;
    private $segmentoJ;
    private $segmentoJ52;
    private $segmentoO;
    private $traillerLoteTitulo;
    private $traillerLoteConvenio;
    private $traillerArquivo;
    private $lotes;
    private $linhas;

    function __construct()
    {
        $this->headerArquivo = [];
        $this->headerLoteTitulo = [];
        $this->headerLoteConvenio = [];
        $this->segmentoJ = [];
        $this->segmentoJ52 = [];
        $this->segmentoO = [];
        $this->traillerLoteTitulo = [];
        $this->traillerLoteConvenio = [];
        $this->traillerArquivo = [];
        $this->lotes = [];
        $this->linhas = [];
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

    function setTraillerLoteTitulo($traillerLote, $lote)
    {
        $this->traillerLoteTitulo[$lote] = $traillerLote;
    }

    function setTraillerLoteConvenio($traillerLote, $lote)
    {
        $this->traillerLoteConvenio[$lote] = $traillerLote;
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

        foreach ($this->lotes as $loteNumero => $loteTipo) {

            if ($loteTipo == 'titulo') {

                $modeloHeaderLoteTituloDefault = $iLayout->headerLoteTituloDefault($headerArquivo);
                $modeloHeaderLoteTituloValidacao = $iLayout->headerLoteTituloValidacao();
                $modeloHeaderLoteTituloDinamico = $iLayout->headerLoteTituloDinamico($sequencial);
                $modeloHeaderLoteTitulo = $iLayout->headerLoteTitulo();

                $headerLoteTitulo = [];
                $validacaoCnab->validaSegmentosObrigatorios($this->headerLoteTitulo[$loteNumero], 1, $segmentosObrigatorios);

                $this->headerLoteTitulo[$loteNumero] = $validacaoCnab->setDefault($modeloHeaderLoteTitulo, $this->headerLoteTitulo[$loteNumero], $modeloHeaderLoteTituloDefault, $modeloHeaderLoteTituloDinamico, 'headerLoteTitulo');

                foreach ($modeloHeaderLoteTitulo as $key => $especificacoes) {

                    $valor = $arquivoPadrao->tratarDados($especificacoes, $this->headerLote[$loteNumero][$key], $key, $config, 'headerLoteTitulo');

                    if (isset($modeloHeaderLoteTituloValidacao[$key])) {
                        $validacaoCnab->{$modeloHeaderLoteTituloValidacao[$key]}($valor, $key, $headerLoteTitulo, 'headerLoteTitulo');
                    }

                    $headerLoteTitulo[] = $valor;
                }

                $this->linhas[] = $headerLoteTitulo;


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

                    $this->linhas[] = $segmentoJ;
                    $this->linhas[] = $segmentoJ52;
                }

                $modeloTraillerLoteTitulo = $iLayout->traillerLoteTitulo();
                $modeloTraillerLoteTituloDefault = $iLayout->traillerLoteTituloDefault($headerArquivo);
                $modeloTraillerLoteTituloValidacao = $iLayout->traillerLoteTituloValidacao();
                $modeloTraillerLoteTituloDinamico = $iLayout->traillerLoteTituloDinamico($quantTitulos, $somaValor);
                $traillerLoteTitulo = [];

                $this->traillerLoteTitulo[$loteNumero] = $validacaoCnab->setDefault($modeloTraillerLoteTitulo, $this->traillerLoteTitulo[$loteNumero], $modeloTraillerLoteTituloDefault, $modeloTraillerLoteTituloDinamico, 'traillerLoteTitulo');

                foreach ($modeloTraillerLoteTitulo as $key => $especificacoes) {

                    $valor = $arquivoPadrao->tratarDados($especificacoes, $this->traillerLoteTitulo[$loteNumero][$key], $key, $config, 'traillerLoteTitulo');

                    if (isset($modeloTraillerLoteTituloValidacao[$key])) {
                        $validacaoCnab->{$modeloTraillerLoteTituloValidacao[$key]}($valor, $key, $this->traillerLoteTitulo[$loteNumero], 'traillerLoteTitulo');
                    }

                    $traillerLoteTitulo[] = $valor;
                }

                $validacaoCnab->validaSegmentosObrigatorios($this->traillerLoteTitulo[$loteNumero], 5, $segmentosObrigatorios);
                $this->linhas[] = $traillerLoteTitulo;
            } else if ($loteTipo == 'convenio') { ##Tipo Convênio-------------------------------------------------------------------------------------------------
                $modeloHeaderLoteConvenioDefault = $iLayout->headerLoteConvenioDefault($headerArquivo);
                $modeloHeaderLoteConvenioValidacao = $iLayout->headerLoteConvenioValidacao();
                $modeloHeaderLoteConvenioDinamico = $iLayout->headerLoteConvenioDinamico($sequencial);
                $modeloHeaderLoteConvenio = $iLayout->headerLoteConvenio();

                $headerLoteConvenio = [];
                $validacaoCnab->validaSegmentosObrigatorios($this->headerLoteConvenio[$loteNumero], 1, $segmentosObrigatorios);

                $this->headerLoteConvenio[$loteNumero] = $validacaoCnab->setDefault($modeloHeaderLoteConvenio, $this->headerLoteConvenio[$loteNumero], $modeloHeaderLoteConvenioDefault, $modeloHeaderLoteConvenioDinamico, 'headerLoteConvenio');

                foreach ($modeloHeaderLoteConvenio as $key => $especificacoes) {

                    $valor = $arquivoPadrao->tratarDados($especificacoes, $this->headerLote[$loteNumero][$key], $key, $config, 'headerLoteConvenio');

                    if (isset($modeloHeaderLoteConvenioValidacao[$key])) {
                        $validacaoCnab->{$modeloHeaderLoteConvenioValidacao[$key]}($valor, $key, $headerLoteConvenio, 'headerLoteConvenio');
                    }

                    $headerLoteConvenio[] = $valor;
                }

                $this->linhas[] = $headerLoteConvenio;

                $modeloSegmentoO = $iLayout->segmentoO();
                $modeloSegmentoODefault = $iLayout->segmentoODefault($headerArquivo);
                $modeloSegmentoOValidacao = $iLayout->segmentoOValidacao();
                $modeloSegmentoODinamico = $iLayout->segmentoODinamico();

                $validacaoCnab->validaSegmentosObrigatorios($this->segmentoO[$loteNumero], "O", $segmentosObrigatorios);
                $this->segmentoO[$loteNumero] = $validacaoCnab->setDefault($modeloSegmentoO, $this->segmentoO[$loteNumero], $modeloSegmentoODefault, $modeloSegmentoODinamico, 'segmentoO');

                foreach ($this->segmentoO[$loteNumero] as $dadosSegmentoO) {

                    $segmentoO = [];

                    foreach ($modeloSegmentoO as $keyModeloO => $especificacoesModeloO) {

                        $valorO = $arquivoPadrao->tratarDados($especificacoesModeloO, $dadosSegmentoO[$keyModeloO], $keyModeloO, $config, 'segmentoO');

                        if (isset($modeloSegmentoOValidacao[$keyModeloO])) {
                            $validacaoCnab->{$modeloSegmentoOValidacao[$keyModeloO]}($valorO, $keyModeloO, $dadosSegmentoO, 'segmentoO');
                        }

                        $segmentoO[] = $valorO;
                    }

                    $contalinhas++;
                    $quantTitulos++;

                    $this->linhas[] = $segmentoO;
                }

                $modeloTraillerLoteConvenio = $iLayout->traillerLoteConvenio();
                $modeloTraillerLoteConvenioDefault = $iLayout->traillerLoteConvenioDefault($headerArquivo);
                $modeloTraillerLoteConvenioValidacao = $iLayout->traillerLoteConvenioValidacao();
                $modeloTraillerLoteConvenioDinamico = $iLayout->traillerLoteConvenioDinamico($quantTitulos, $somaValor);
                $traillerLoteConvenio = [];

                $this->traillerLoteConvenio[$loteNumero] = $validacaoCnab->setDefault($modeloTraillerLoteConvenio, $this->traillerLoteConvenio[$loteNumero], $modeloTraillerLoteConvenioDefault, $modeloTraillerLoteConvenioDinamico, 'traillerLoteConvenio');

                foreach ($modeloTraillerLoteConvenio as $key => $especificacoes) {

                    $valor = $arquivoPadrao->tratarDados($especificacoes, $this->traillerLoteConvenio[$loteNumero][$key], $key, $config, 'traillerLoteConvenio');

                    if (isset($modeloTraillerLoteConvenioValidacao[$key])) {
                        $validacaoCnab->{$modeloTraillerLoteConvenioValidacao[$key]}($valor, $key, $this->traillerLoteConvenio[$loteNumero], 'traillerLoteConvenio');
                    }

                    $traillerLoteConvenio[] = $valor;
                }

                $validacaoCnab->validaSegmentosObrigatorios($this->traillerLoteConvenio[$loteNumero], 5, $segmentosObrigatorios);
                $this->linhas[] = $traillerLoteConvenio;
            }
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
