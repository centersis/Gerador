<?php

namespace Cnab400;

use Arquivo\ArquivoPadrao;
use Cnab400\ValidacaoCnab400;

class Cnab400
{

    private $headerArquivo;
    private $tipoUm;
    private $tipoDois;
    private $tipoTres;
    private $tipoQuatro;
    private $tipoCinco;
    private $tipoSeis;
    private $tipoSete;
    private $traillerArquivo;

    function __construct()
    {
        $this->headerArquivo = [];
        $this->tipoUm = [];
        $this->tipoDois = [];
        $this->tipoTres = [];
        $this->tipoQuatro = [];
        $this->tipoCinco = [];
        $this->tipoSeis = [];
        $this->tipoSete = [];
        $this->traillerArquivo = [];
    }

    function setHeaderArquivo($headerArquivo)
    {
        $this->headerArquivo = $headerArquivo;
    }

    function setTipoUm($tipoUm)
    {
        $this->tipoUm[] = $tipoUm;
    }

    function setTipoDois($tipoDois)
    {
        $this->tipoDois[] = $tipoDois;
    }

    function setTipoTres($tipoTres)
    {
        $this->tipoTres[] = $tipoTres;
    }

    function setTipoQuatro($tipoQuatro)
    {
        $this->tipoQuatro[] = $tipoQuatro;
    }

    function setTipoCinco($tipoCinco)
    {
        $this->tipoCinco[] = $tipoCinco;
    }

    function setTipoSeis($tipoSeis)
    {
        $this->tipoSeis[] = $tipoSeis;
    }

    function setTipoSete($tipoSete)
    {
        $this->tipoSete[] = $tipoSete;
    }

    function setTraillerArquivo($traillerArquivo)
    {
        $this->traillerArquivo = $traillerArquivo;
    }

    public function gerar($layout, $caminhoArquivo, $nomeArquivo, $config = [])
    {
        $caminho = 'Cnab400\\Layout\\' . $layout;
        $instancia = new $caminho;
        $instanciaPadrao = new ArquivoPadrao();
        $validacaoCnab = new ValidacaoCnab400();

        $resultado = [];
        $headerArquivo = [];

        $modeloHeaderArqDefault = $instancia->headerArquivoDefault();
        $modeloHeaderArqValidacao = $instancia->headerArquivoValidacao();
        $modeloHeaderArqDinamico = $instancia->headerArquivoDinamico();
        $modeloHeaderArquivo = $instancia->headerArquivo();

        $segmentosObrigatorios = $instancia->segmentosObrigatorios();
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

        $modeloTipoUmValidacao = $instancia->tipoUmValidacao();
        $modeloTipoUmDinamico = $instancia->tipoUmDinamico();
        $modeloTipoUmDefault = $instancia->tipoUmDefault();
        $modeloTipoUm = $instancia->tipoUm();

        $validacaoCnab->validaSegmentosObrigatorios($this->tipoUm, 1, $segmentosObrigatorios);
        $this->tipoUm = $validacaoCnab->setDefault($modeloTipoUm, $this->tipoUm, $modeloTipoUmDefault, $modeloTipoUmDinamico, 'tipoUm');

        if ($this->tipoDois) {
            $modeloTipoDoisValidacao = $instancia->tipoDoisValidacao();
            $modeloTipoDoisDinamico = $instancia->tipoDoisDinamico();
            $modeloTipoDoisDefault = $instancia->tipoDoisDefault();
            $modeloTipoDois = $instancia->tipoDois();
            $validacaoCnab->validaSegmentosObrigatorios($this->tipoDois, 2, $segmentosObrigatorios);
            $this->tipoDois = $validacaoCnab->setDefault($modeloTipoDois, $this->tipoDois, $modeloTipoDoisDefault, $modeloTipoDoisDinamico, 'tipoDois');
        }

        if ($this->tipoTres) {
            $modeloTipoTresValidacao = $instancia->tipoTresValidacao();
            $modeloTipoTresDinamico = $instancia->tipoTresDinamico();
            $modeloTipoTresDefault = $instancia->tipoTresDefault();
            $modeloTipoTres = $instancia->tipoTres();
            $validacaoCnab->validaSegmentosObrigatorios($this->tipoTres, 3, $segmentosObrigatorios);
            $this->tipoTres = $validacaoCnab->setDefault($modeloTipoTres, $this->tipoTres, $modeloTipoTresDefault, $modeloTipoTresDinamico, 'tipoTres');
        }

        if ($this->tipoQuatro) {
            $modeloTipoQuatroValidacao = $instancia->tipoQuatroValidacao();
            $modeloTipoQuatroDinamico = $instancia->tipoQuatroDinamico();
            $modeloTipoQuatroDefault = $instancia->tipoQuatroDefault();
            $modeloTipoQuatro = $instancia->tipoQuatro();
            $validacaoCnab->validaSegmentosObrigatorios($this->tipoQuatro, 4, $segmentosObrigatorios);
            $this->tipoQuatro = $validacaoCnab->setDefault($modeloTipoQuatro, $this->tipoQuatro, $modeloTipoQuatroDefault, $modeloTipoQuatroDinamico, 'tipoQuatro');
        }

        if ($this->tipoCinco) {
            $modeloTipoCincoValidacao = $instancia->tipoCincoValidacao();
            $modeloTipoCincoDinamico = $instancia->tipoCincoDinamico();
            $modeloTipoCincoDefault = $instancia->tipoCincoDefault();
            $modeloTipoCinco = $instancia->tipoCinco();
            $validacaoCnab->validaSegmentosObrigatorios($this->tipoCinco, 5, $segmentosObrigatorios);
            $this->tipoCinco = $validacaoCnab->setDefault($modeloTipoCinco, $this->tipoCinco, $modeloTipoCincoDefault, $modeloTipoCincoDinamico, 'tipoCinco');
        }

        if ($this->tipoSeis) {
            $modeloTipoSeisValidacao = $instancia->tipoSeisValidacao();
            $modeloTipoSeisDinamico = $instancia->tipoSeisDinamico();
            $modeloTipoSeisDefault = $instancia->tipoSeisDefault();
            $modeloTipoSeis = $instancia->tipoSeis();
            $validacaoCnab->validaSegmentosObrigatorios($this->tipoSeis, 6, $segmentosObrigatorios);
            $this->tipoSeis = $validacaoCnab->setDefault($modeloTipoSeis, $this->tipoSeis, $modeloTipoSeisDefault, $modeloTipoSeisDinamico, 'tipoSeis');
        }

        if ($this->tipoSete) {
            $modeloTipoSeteValidacao = $instancia->tipoSeteValidacao();
            $modeloTipoSeteDinamico = $instancia->tipoSeteDinamico();
            $modeloTipoSeteDefault = $instancia->tipoSeteDefault();
            $modeloTipoSete = $instancia->tipoSete();
            $validacaoCnab->validaSegmentosObrigatorios($this->tipoSete, 7, $segmentosObrigatorios);
            $this->tipoSete = $validacaoCnab->setDefault($modeloTipoSete, $this->tipoSete, $modeloTipoSeteDefault, $modeloTipoSeteDinamico, 'tipoSete');
        }

        foreach ($this->tipoUm as $keyTipoUm => $dadosTipoUm) {

            $tipoUm = [];

            foreach ($modeloTipoUm as $keyModelo1 => $especificacoesModelo1) {               

                $valorUm = $instanciaPadrao->tratarDados($especificacoesModelo1, $dadosTipoUm[$keyModelo1], $keyModelo1, $config, 'tipoUm');

                if (isset($modeloTipoUmValidacao[$keyModelo1])) {

                    $validacaoCnab->{$modeloTipoUmValidacao[$keyModelo1]}($valorUm, $keyModelo1, $dadosTipoUm, 'tipoUm');
                }

                $tipoUm[] = $valorUm;
            }



            if ($this->tipoDois) {

                $tipoDois = [];
                
                foreach ($modeloTipoDois as $keyModelo2 => $especificacoesModelo2) {
                    
                    $valorDois = $instanciaPadrao->tratarDados($especificacoesModelo2, $this->tipoDois[$keyTipoUm][$keyModelo2], $keyModelo2, $config, 'tipoDois');

                    if (isset($modeloTipoDoisValidacao[$keyModelo2])) {
                        $validacaoCnab->{$modeloTipoDoisValidacao[$keyModelo2]}($valorDois, $keyModelo2, $this->tipoDois[$keyTipoUm], 'tipoDois');
                    }

                    $tipoDois[] = $valorDois;
                }
            }


            if ($this->tipoTres) {

                $tipoTres = [];                

                foreach ($modeloTipoTres as $keyModelo3 => $especificacoesModelo3) {
                    
                    $valorTres = $instanciaPadrao->tratarDados($especificacoesModelo3, $this->tipoTres[$keyTipoUm][$keyModelo3], $keyModelo3, $config, 'tipoTres');

                    if (isset($modeloTipoTresValidacao[$keyModelo3])) {
                        $validacaoCnab->{$modeloTipoTresValidacao[$keyModelo3]}($valorTres, $keyModelo3, $this->tipoTres[$keyTipoUm], 'tipoTres');
                    }

                    $tipoTres[] = $valorTres;
                }
            }


            if ($this->tipoQuatro) {

                $tipoQuatro = [];

                foreach ($modeloTipoQuatro as $keyModelo4 => $especificacoesModelo4) {
                    
                    $valorQuatro = $instanciaPadrao->tratarDados($especificacoesModelo4, $this->tipoQuatro[$keyTipoUm][$keyModelo4], $keyModelo4, $config, 'tipoQuatro');

                    if (isset($modeloTipoQuatroValidacao[$keyModelo4])) {
                        $validacaoCnab->{$modeloTipoQuatroValidacao[$keyModelo4]}($valorQuatro, $keyModelo4, $this->tipoQuatro[$keyTipoUm], 'tipoQuatro');
                    }

                    $tipoQuatro[] = $valorQuatro;
                }
            }


            if ($this->tipoCinco) {

                $tipoCinco = [];

                foreach ($modeloTipoCinco as $keyModelo5 => $especificacoesModelo5) {
                    
                    $valorCinco = $instanciaPadrao->tratarDados($especificacoesModelo5, $this->tipoCinco[$keyTipoUm][$keyModelo5], $keyModelo5, $config, 'tipoCinco');

                    if (isset($modeloTipoCincoValidacao[$keyModelo5])) {
                        $validacaoCnab->{$modeloTipoCincoValidacao[$keyModelo5]}($valorCinco, $keyModelo5, $this->tipoCinco[$keyTipoUm], 'tipoCinco');
                    }

                    $tipoCinco[] = $valorCinco;
                }
            }

            if ($this->tipoSeis) {

                $tipoSeis = [];

                foreach ($modeloTipoSeis as $keyModelo6 => $especificacoesModelo6) {
                    
                    $valorSeis = $instanciaPadrao->tratarDados($especificacoesModelo6, $this->tipoSeis[$keyTipoUm][$keyModelo6], $keyModelo6, $config, 'tpoSeis');

                    if (isset($modeloTipoSeisValidacao[$keyModelo6])) {
                        $validacaoCnab->{$modeloTipoSeisValidacao[$keyModelo6]}($valorSeis, $keyModelo6, $this->tipoSeis[$keyTipoUm], 'tipoSeis');
                    }

                    $tipoSeis[] = $valorSeis;
                }
            }

            if ($this->tipoSete) {

                $tipoSete = [];

                foreach ($modeloTipoSete as $keyModelo7 => $especificacoesModelo7) {
                   
                    $valorSete = $instanciaPadrao->tratarDados($especificacoesModelo7, $this->tipoSete[$keyTipoUm][$keyModelo7], $keyModelo7, $config, 'tipoSete');

                    if (isset($modeloTipoSeteValidacao[$keyModelo7])) {
                        $validacaoCnab->{$modeloTipoSeteValidacao[$keyModelo7]}($valorSete, $keyModelo7, $tipoSete, 'tipoSete');
                    }

                    $tipoSete[] = $valorSete;
                }
            }

            $resultado[] = $tipoUm;
            if ($this->tipoDois) {
                $resultado[] = $tipoDois;
            }
            if ($this->tipoTres) {
                $resultado[] = $tipoTres;
            }
            if ($this->tipoQuatro) {
                $resultado[] = $tipoQuatro;
            }
            if ($this->tipoCinco) {
                $resultado[] = $tipoCinco;
            }
            if ($this->tipoSeis) {
                $resultado[] = $tipoSeis;
            }
            if ($this->tipoSete) {
                $resultado[] = $tipoSete;
            }
        }

        $modeloTraillerArqDefault = $instancia->traillerArquivoDefault();
        $modeloTraillerArqValidacao = $instancia->traillerArquivoValidacao();
        $modeloTraillerArqDinamico = $instancia->traillerArquivoDinamico();
        $modeloTraillerArquivo = $instancia->traillerArquivo();
        $traillerArquivo = [];
        
        $this->traillerArquivo = $validacaoCnab->setDefault($modeloTraillerArquivo, $this->traillerArquivo, $modeloTraillerArqDefault, $modeloTraillerArqDinamico, 'traillerArquivo');

        foreach ($modeloTraillerArquivo as $key => $especificacoes) {
            
            $valor = $instanciaPadrao->tratarDados($especificacoes, $this->traillerArquivo[$key], $key, $config, 'traillerArquivo');

            if (isset($modeloTraillerArqValidacao[$key])) {
                $validacaoCnab->{$modeloTraillerArqValidacao[$key]}($valor, $key, $this->traillerArquivo, 'traillerArquivo');
            }

            $traillerArquivo[] = $valor;
        }

        $resultado[] = $traillerArquivo;
        $validacaoCnab->validaTamanhoArray($resultado);

        return $instanciaPadrao->gravar($resultado, $caminhoArquivo, $nomeArquivo);
    }

}
