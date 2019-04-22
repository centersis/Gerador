<?php

namespace Gerador\Src\Agz;

use Gerador\Src\Agz\ValidacaoAgz;
use Gerador\Src\Arquivo\ArquivoPadrao;
use Gerador\Src\Base;

class Agz extends Base {

    protected $segmentoA;
    protected $segmentoG;
    protected $segmentoZ;

    public function __construct() {
        
        parent::__construct();
        
        $this->segmentoA = [];
        $this->segmentoG = [];
        $this->segmentoZ = [];
    }

    public function setSegmentoA(array $segmentoA) {
        $this->segmentoA = $segmentoA;
    }

    public function setSegmentoG(array $segmentoG) {
        $this->segmentoG[] = $segmentoG;
    }

    public function setSegmentoZ(array $segmentoZ) {
        $this->segmentoZ = $segmentoZ;
    }

    public function processar($layout, $config = []) {
        $caminho = 'Gerador\\Src\\Agz\\Layout\\' . $layout;

        $iLayout = new $caminho;
        $validacaoAgz = new ValidacaoAgz();
        $arquivoPadrao = new ArquivoPadrao();

        $this->linhas = [];
        $segmentoA = [];
        
        $modeloA = $iLayout->segmentoA();
        $modeloADefault = $iLayout->segmentoADefault();
        $modeloAValidacao = $iLayout->segmentoAValidacao();

        $this->segmentoA = $validacaoAgz->setDefault($modeloA, $this->segmentoA, $modeloADefault, 'segmentoA');

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
        $modeloGDefault = $iLayout->segmentoGDefault();

        $this->segmentoG = $validacaoAgz->setDefault($modeloG, $this->segmentoG, $modeloGDefault, 'segmentoG');

        foreach ($this->segmentoG as $segmento) {

            $segmentoG = [];

            foreach ($modeloG as $key => $especificacoes) {

                $valor = $arquivoPadrao->tratarDados($especificacoes, $segmento[$key], $key, $config, 'segmentoG');

                if (isset($modeloGValidacao[$key])) {
                    $validacaoAgz->{$modeloGValidacao[$key]}($valor, $key, $segmento[$key], 'segmentoG');
                }

                $segmentoG[] = $valor;
            }

            $this->linhas[] = $segmentoG;
        }

        $modeloZ = $iLayout->segmentoZ();
        $modeloZDefault = $iLayout->segmentoZDefault();
        $modeloZValidacao = $iLayout->segmentoZValidacao();
        $segmentoZ = [];

        $this->segmentoZ = $validacaoAgz->setDefault($modeloZ, $this->segmentoZ, $modeloZDefault, 'segmentoZ');

        foreach ($modeloZ as $key => $especificacoes) {

            $valor = $arquivoPadrao->tratarDados($especificacoes, $this->segmentoZ[$key], $key, $config, 'segmentoZ');

            if (isset($modeloZValidacao[$key])) {
                $validacaoAgz->{$modeloZValidacao[$key]}($valor, $key, $this->segmentoZ, 'segmentoZ');
            }

            $segmentoZ[] = $valor;
        }

        $this->linhas[] = $segmentoZ;
        
        $this->validaSegmentosObrigatorios($config);
        
        $validacaoAgz->validaTamanhoArray($this->linhas);

        return $this->linhas;
    }
}
