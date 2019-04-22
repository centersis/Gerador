<?php

namespace Src;

use Src\Arquivo\ArquivoPadrao;

class Base {

    protected $linhas;

    public function __construct() {
        $this->linhas = [];
    }

    public function getLinhas() {
        return $this->linhas;
    }

    public function getLinhasAgrupadas() {
        $agrupado = [];

        foreach ($this->linhas as $dados) {
            $agrupado[] = implode('', $dados);
        }

        return $agrupado;
    }

    protected function validaSegmentosObrigatorios($config) {
        
        if (isset($config['obrigatorio']) and is_array($config['obrigatorio'])) {
            foreach ($config['obrigatorio'] as $segmento) {
                if (!isset($this->{$segmento}) or count($this->{$segmento}) < 1) {
                    throw new \Exception("O " . $segmento . " não foi preenchido e é obrigatório");
                }
            }
        }
    }

    public function gerar($layout, $caminhoArquivo, $nomeArquivo, $config = []) {
        $arquivoPadrao = new ArquivoPadrao();

        $linhas = $this->processar($layout, $config);

        return $arquivoPadrao->gravar($linhas, $caminhoArquivo, $nomeArquivo);
    }

}
