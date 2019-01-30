<?php

namespace Agz;

use Agz\ValidacaoAgz;
use Arquivo\ArquivoPadrao;

class Agz
{

    private $segmentoA;
    private $segmentoG;
    private $segmentoZ;
    private $linhas;

    public function __construct()
    {
        $this->segmentoA = [];
        $this->segmentoG = [];
        $this->segmentoZ = [];
        $this->linhas = [];
    }

    public function setSegmentoA(array $segmentoA)
    {
        $this->segmentoA = $segmentoA;
    }

    public function setSegmentoG(array $segmentoG)
    {
        $this->segmentoG[] = $segmentoG;
    }

    public function setSegmentoZ(array $segmentoZ)
    {
        $this->segmentoZ = $segmentoZ;
    }

    public function getLinhas()
    {
        return $this->linhas;
    }

    public function processar($layout, $config = [])
    {
        $caminho = 'Agz\\Layout\\' . $layout;

        $iLayout = new $caminho;
        $validacaoAgz = new ValidacaoAgz();
        $arquivoPadrao = new ArquivoPadrao();

        $this->linhas = [];
        $segmentoA = [];

        $contaLinhas = 2;
        $somaValor = 0;

        $modeloA = $iLayout->segmentoA();
        $modeloADefault = $iLayout->segmentoADefault();
        $modeloAValidacao = $iLayout->segmentoAValidacao();
        $modeloADinamico = $iLayout->segmentoADinamico();

        $segmentosObrigatorios = $iLayout->segmentosObrigatorios();

        $validacaoAgz->validaSegmentosObrigatorios($this->segmentoA, "A", $segmentosObrigatorios);
        $validacaoAgz->validaSegmentosObrigatorios($this->segmentoG, "G", $segmentosObrigatorios);

        $this->segmentoA = $validacaoAgz->setDefault($modeloA, $this->segmentoA, $modeloADefault, $modeloADinamico, 'segmentoA');

        foreach ($modeloA as $key => $especificacoes) {

            $valor = $arquivoPadrao->tratarDados($especificacoes, $this->segmentoA[$key], $key, $config, 'segmentoA');

            if (isset($modeloAValidacao[$key])) {
                $validacaoAgz->{$modeloAValidacao[$key]}($valor, $key, $this->segmentoA, 'segmentoA');
            }

            $segmentoA[] = $valor;
        }

        $this->linhas[] = $segmentoA;

        $modeloG = $iLayout->segmentoG();
        $modeloGValidacao = $iLayout->segmentoGValidacao();
        $modeloGDinamico = $iLayout->segmentoGDinamico();
        $modeloGDefault = $iLayout->segmentoGDefault();

        $this->segmentoG = $validacaoAgz->setDefault($modeloG, $this->segmentoG, $modeloGDefault, $modeloGDinamico, 'segmentoG');

        foreach ($this->segmentoG as $segmento) {

            $segmentoG = [];

            foreach ($modeloG as $key => $especificacoes) {

                $valor = $arquivoPadrao->tratarDados($especificacoes, $segmento[$key], $key, $config, 'segmentoG');

                if (isset($modeloGValidacao[$key])) {
                    $validacaoAgz->{$modeloGValidacao[$key]}($valor, $key, $segmento[$key], 'segmentoG');
                }

                if ($key == 6) {
                    $somaValor += $arquivoPadrao->toFloat($valor);
                }

                $segmentoG[] = $valor;
            }

            $this->linhas[] = $segmentoG;
            $contaLinhas++;
        }

        $modeloZ = $iLayout->segmentoZ();
        $modeloZDefault = $iLayout->segmentoZDefault();
        $modeloZValidacao = $iLayout->segmentoZValidacao();
        $modeloZDinamico = $iLayout->segmentoZDinamico($contaLinhas, $somaValor);
        $segmentoZ = [];

        $this->segmentoZ = $validacaoAgz->setDefault($modeloZ, $this->segmentoZ, $modeloZDefault, $modeloZDinamico, 'segmentoZ');

        foreach ($modeloZ as $key => $especificacoes) {

            $valor = $arquivoPadrao->tratarDados($especificacoes, $this->segmentoZ[$key], $key, $config, 'segmentoZ');

            if (isset($modeloZValidacao[$key])) {
                $validacaoAgz->{$modeloZValidacao[$key]}($valor, $key, $this->segmentoZ, 'segmentoZ');
            }

            $segmentoZ[] = $valor;
        }

        $this->linhas[] = $segmentoZ;
        $validacaoAgz->validaTamanhoArray($this->linhas);

        return $this->linhas;
    }

    public function gerar($layout, $caminhoArquivo, $nomeArquivo, $config = [])
    {
        $arquivoPadrao = new ArquivoPadrao();

        $linhas = $this->processar($layout, $config);

        return $arquivoPadrao->gravar($linhas, $caminhoArquivo, $nomeArquivo);
    }

}
