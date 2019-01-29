<?php

namespace Agz;

use Agz\ValidacaoAgz;
use Arquivo\ArquivoPadrao;

class Agz
{

    private $segmentoA;
    private $segmentoG;
    private $segmentoZ;

    public function __construct()
    {
        $this->segmentoA = [];
        $this->segmentoG = [];
        $this->segmentoZ = [];
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

    public function gerar($layout, $caminhoArquivo, $nomeArquivo, $config = [])
    {
        $caminho = 'Agz\\Layout\\' . $layout;

        $instancia = new $caminho;
        $validacaoAgz = new ValidacaoAgz();
        $instanciaPadrao = new ArquivoPadrao();

        $resultado = [];
        $segmentoA = [];

        $contaLinhas = 2;
        $somaValor = 0;

        $modeloA = $instancia->segmentoA();
        $modeloADefault = $instancia->segmentoADefault();
        $modeloAValidacao = $instancia->segmentoAValidacao();
        $modeloADinamico = $instancia->segmentoADinamico();

        $segmentosObrigatorios = $instancia->segmentosObrigatorios();

        $validacaoAgz->validaSegmentosObrigatorios($this->segmentoA, "A", $segmentosObrigatorios);
        $validacaoAgz->validaSegmentosObrigatorios($this->segmentoG, "G", $segmentosObrigatorios);

        $this->segmentoA = $validacaoAgz->setDefault($modeloA, $this->segmentoA, $modeloADefault, $modeloADinamico, 'segmentoA');

        foreach ($modeloA as $key => $especificacoes) {

            $valor = $instanciaPadrao->tratarDados($especificacoes, $this->segmentoA[$key], $key, $config, 'segmentoA');

            if (isset($modeloAValidacao[$key])) {
                $validacaoAgz->{$modeloAValidacao[$key]}($valor, $key, $this->segmentoA, 'segmentoA');
            }

            $segmentoA[] = $valor;
        }

        $resultado[] = $segmentoA;

        $modeloG = $instancia->segmentoG();
        $modeloGValidacao = $instancia->segmentoGValidacao();
        $modeloGDinamico = $instancia->segmentoGDinamico();
        $modeloGDefault = $instancia->segmentoGDefault();

        $this->segmentoG = $validacaoAgz->setDefault($modeloG, $this->segmentoG, $modeloGDefault, $modeloGDinamico, 'segmentoG');

        foreach ($this->segmentoG as $segmento) {

            $segmentoG = [];            

            foreach ($modeloG as $key => $especificacoes) {

                $valor = $instanciaPadrao->tratarDados($especificacoes, $segmento[$key], $key, $config, 'segmentoG');

                if (isset($modeloGValidacao[$key])) {
                    $validacaoAgz->{$modeloGValidacao[$key]}($valor, $key, $segmento[$key], 'segmentoG');
                }

                if($key == 6){
                    $somaValor +=  $instanciaPadrao->toFloat($valor);
                }
                
                $segmentoG[] = $valor;
            }

            $resultado[] = $segmentoG;
            $contaLinhas++;
        }

        $modeloZ = $instancia->segmentoZ();
        $modeloZDefault = $instancia->segmentoZDefault();
        $modeloZValidacao = $instancia->segmentoZValidacao();
        $modeloZDinamico = $instancia->segmentoZDinamico($contaLinhas, $somaValor);
        $segmentoZ = [];
        
        $this->segmentoZ = $validacaoAgz->setDefault($modeloZ, $this->segmentoZ, $modeloZDefault, $modeloZDinamico, 'segmentoZ');        
        
        foreach ($modeloZ as $key => $especificacoes) {

            $valor = $instanciaPadrao->tratarDados($especificacoes, $this->segmentoZ[$key], $key, $config, 'segmentoZ');

            if (isset($modeloZValidacao[$key])) {
                $validacaoAgz->{$modeloZValidacao[$key]}($valor, $key, $this->segmentoZ, 'segmentoZ');
            }

            $segmentoZ[] = $valor;
        }

        $resultado[] = $segmentoZ;
        $validacaoAgz->validaTamanhoArray($resultado);

        return $instanciaPadrao->gravar($resultado, $caminhoArquivo, $nomeArquivo);
    }

}
