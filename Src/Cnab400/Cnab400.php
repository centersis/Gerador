<?php

namespace Gerador\Src\Cnab400;

use Gerador\Src\Cnab400\ValidacaoCnab400;
use Gerador\Src\Arquivo\ArquivoPadrao;
use Gerador\Src\Base;

class Cnab400 extends Base {

    protected $headerArquivo;
    protected $tipoUm;
    protected $tipoDois;
    protected $tipoTres;
    protected $tipoQuatro;
    protected $tipoCinco;
    protected $tipoSeis;
    protected $tipoSete;
    protected $trailerArquivo;

    function __construct() {

        parent::__construct();

        $this->headerArquivo = [];
        $this->tipoUm = [];
        $this->tipoDois = [];
        $this->tipoTres = [];
        $this->tipoQuatro = [];
        $this->tipoCinco = [];
        $this->tipoSeis = [];
        $this->tipoSete = [];
        $this->trailerArquivo = [];
    }

    function setHeaderArquivo($headerArquivo) {
        $this->headerArquivo = $headerArquivo;
    }

    function setTipoUm($tipoUm) {
        $this->tipoUm[] = $tipoUm;
    }

    function setTipoDois($tipoDois) {
        $this->tipoDois[] = $tipoDois;
    }

    function setTipoTres($tipoTres) {
        $this->tipoTres[] = $tipoTres;
    }

    function setTipoQuatro($tipoQuatro) {
        $this->tipoQuatro[] = $tipoQuatro;
    }

    function setTipoCinco($tipoCinco) {
        $this->tipoCinco[] = $tipoCinco;
    }

    function setTipoSeis($tipoSeis) {
        $this->tipoSeis[] = $tipoSeis;
    }

    function setTipoSete($tipoSete) {
        $this->tipoSete[] = $tipoSete;
    }

    function setTrailerArquivo($trailerArquivo) {
        $this->trailerArquivo = $trailerArquivo;
    }

    public function processar($layout, $config = []) {
        $caminho = 'Src\\Cnab400\\Layout\\' . $layout;
        $iLayout = new $caminho;
        $arquivoPadrao = new ArquivoPadrao();
        $validacaoCnab = new ValidacaoCnab400();

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

        $modeloTipoUmValidacao = $iLayout->tipoUmValidacao();
        $modeloTipoUmDefault = $iLayout->tipoUmDefault();
        $modeloTipoUm = $iLayout->tipoUm();

        $this->tipoUm = $validacaoCnab->setDefault($modeloTipoUm, $this->tipoUm, $modeloTipoUmDefault, 'tipoUm');

        if ($this->tipoDois) {
            $modeloTipoDoisValidacao = $iLayout->tipoDoisValidacao();
            $modeloTipoDoisDefault = $iLayout->tipoDoisDefault();
            $modeloTipoDois = $iLayout->tipoDois();
            $this->tipoDois = $validacaoCnab->setDefault($modeloTipoDois, $this->tipoDois, $modeloTipoDoisDefault, 'tipoDois');
        }

        if ($this->tipoTres) {
            $modeloTipoTresValidacao = $iLayout->tipoTresValidacao();
            $modeloTipoTresDefault = $iLayout->tipoTresDefault();
            $modeloTipoTres = $iLayout->tipoTres();
            $this->tipoTres = $validacaoCnab->setDefault($modeloTipoTres, $this->tipoTres, $modeloTipoTresDefault, 'tipoTres');
        }

        if ($this->tipoQuatro) {
            $modeloTipoQuatroValidacao = $iLayout->tipoQuatroValidacao();
            $modeloTipoQuatroDefault = $iLayout->tipoQuatroDefault();
            $modeloTipoQuatro = $iLayout->tipoQuatro();
            $this->tipoQuatro = $validacaoCnab->setDefault($modeloTipoQuatro, $this->tipoQuatro, $modeloTipoQuatroDefault, 'tipoQuatro');
        }

        if ($this->tipoCinco) {
            $modeloTipoCincoValidacao = $iLayout->tipoCincoValidacao();
            $modeloTipoCincoDefault = $iLayout->tipoCincoDefault();
            $modeloTipoCinco = $iLayout->tipoCinco();
            $this->tipoCinco = $validacaoCnab->setDefault($modeloTipoCinco, $this->tipoCinco, $modeloTipoCincoDefault, 'tipoCinco');
        }

        if ($this->tipoSeis) {
            $modeloTipoSeisValidacao = $iLayout->tipoSeisValidacao();
            $modeloTipoSeisDefault = $iLayout->tipoSeisDefault();
            $modeloTipoSeis = $iLayout->tipoSeis();
            $this->tipoSeis = $validacaoCnab->setDefault($modeloTipoSeis, $this->tipoSeis, $modeloTipoSeisDefault, 'tipoSeis');
        }

        if ($this->tipoSete) {
            $modeloTipoSeteValidacao = $iLayout->tipoSeteValidacao();
            $modeloTipoSeteDefault = $iLayout->tipoSeteDefault();
            $modeloTipoSete = $iLayout->tipoSete();
            $this->tipoSete = $validacaoCnab->setDefault($modeloTipoSete, $this->tipoSete, $modeloTipoSeteDefault, 'tipoSete');
        }

        foreach ($this->tipoUm as $keyTipoUm => $dadosTipoUm) {

            $tipoUm = [];

            foreach ($modeloTipoUm as $keyModelo1 => $especificacoesModelo1) {

                $valorUm = $arquivoPadrao->tratarDados($especificacoesModelo1, $dadosTipoUm[$keyModelo1], $keyModelo1, $config, 'tipoUm');

                if (isset($modeloTipoUmValidacao[$keyModelo1])) {

                    $validacaoCnab->{$modeloTipoUmValidacao[$keyModelo1]}($valorUm, $keyModelo1, $dadosTipoUm, 'tipoUm');
                }

                $tipoUm[] = $valorUm;
            }



            if ($this->tipoDois) {

                $tipoDois = [];

                foreach ($modeloTipoDois as $keyModelo2 => $especificacoesModelo2) {

                    $valorDois = $arquivoPadrao->tratarDados($especificacoesModelo2, $this->tipoDois[$keyTipoUm][$keyModelo2], $keyModelo2, $config, 'tipoDois');

                    if (isset($modeloTipoDoisValidacao[$keyModelo2])) {
                        $validacaoCnab->{$modeloTipoDoisValidacao[$keyModelo2]}($valorDois, $keyModelo2, $this->tipoDois[$keyTipoUm], 'tipoDois');
                    }

                    $tipoDois[] = $valorDois;
                }
            }


            if ($this->tipoTres) {

                $tipoTres = [];

                foreach ($modeloTipoTres as $keyModelo3 => $especificacoesModelo3) {

                    $valorTres = $arquivoPadrao->tratarDados($especificacoesModelo3, $this->tipoTres[$keyTipoUm][$keyModelo3], $keyModelo3, $config, 'tipoTres');

                    if (isset($modeloTipoTresValidacao[$keyModelo3])) {
                        $validacaoCnab->{$modeloTipoTresValidacao[$keyModelo3]}($valorTres, $keyModelo3, $this->tipoTres[$keyTipoUm], 'tipoTres');
                    }

                    $tipoTres[] = $valorTres;
                }
            }


            if ($this->tipoQuatro) {

                $tipoQuatro = [];

                foreach ($modeloTipoQuatro as $keyModelo4 => $especificacoesModelo4) {

                    $valorQuatro = $arquivoPadrao->tratarDados($especificacoesModelo4, $this->tipoQuatro[$keyTipoUm][$keyModelo4], $keyModelo4, $config, 'tipoQuatro');

                    if (isset($modeloTipoQuatroValidacao[$keyModelo4])) {
                        $validacaoCnab->{$modeloTipoQuatroValidacao[$keyModelo4]}($valorQuatro, $keyModelo4, $this->tipoQuatro[$keyTipoUm], 'tipoQuatro');
                    }

                    $tipoQuatro[] = $valorQuatro;
                }
            }


            if ($this->tipoCinco) {

                $tipoCinco = [];

                foreach ($modeloTipoCinco as $keyModelo5 => $especificacoesModelo5) {

                    $valorCinco = $arquivoPadrao->tratarDados($especificacoesModelo5, $this->tipoCinco[$keyTipoUm][$keyModelo5], $keyModelo5, $config, 'tipoCinco');

                    if (isset($modeloTipoCincoValidacao[$keyModelo5])) {
                        $validacaoCnab->{$modeloTipoCincoValidacao[$keyModelo5]}($valorCinco, $keyModelo5, $this->tipoCinco[$keyTipoUm], 'tipoCinco');
                    }

                    $tipoCinco[] = $valorCinco;
                }
            }

            if ($this->tipoSeis) {

                $tipoSeis = [];

                foreach ($modeloTipoSeis as $keyModelo6 => $especificacoesModelo6) {

                    $valorSeis = $arquivoPadrao->tratarDados($especificacoesModelo6, $this->tipoSeis[$keyTipoUm][$keyModelo6], $keyModelo6, $config, 'tpoSeis');

                    if (isset($modeloTipoSeisValidacao[$keyModelo6])) {
                        $validacaoCnab->{$modeloTipoSeisValidacao[$keyModelo6]}($valorSeis, $keyModelo6, $this->tipoSeis[$keyTipoUm], 'tipoSeis');
                    }

                    $tipoSeis[] = $valorSeis;
                }
            }

            if ($this->tipoSete) {

                $tipoSete = [];

                foreach ($modeloTipoSete as $keyModelo7 => $especificacoesModelo7) {

                    $valorSete = $arquivoPadrao->tratarDados($especificacoesModelo7, $this->tipoSete[$keyTipoUm][$keyModelo7], $keyModelo7, $config, 'tipoSete');

                    if (isset($modeloTipoSeteValidacao[$keyModelo7])) {
                        $validacaoCnab->{$modeloTipoSeteValidacao[$keyModelo7]}($valorSete, $keyModelo7, $tipoSete, 'tipoSete');
                    }

                    $tipoSete[] = $valorSete;
                }
            }

            $this->linhas[] = $tipoUm;
            if ($this->tipoDois) {
                $this->linhas[] = $tipoDois;
            }
            if ($this->tipoTres) {
                $this->linhas[] = $tipoTres;
            }
            if ($this->tipoQuatro) {
                $this->linhas[] = $tipoQuatro;
            }
            if ($this->tipoCinco) {
                $this->linhas[] = $tipoCinco;
            }
            if ($this->tipoSeis) {
                $this->linhas[] = $tipoSeis;
            }
            if ($this->tipoSete) {
                $this->linhas[] = $tipoSete;
            }
        }

        $modeloTrailerArqDefault = $iLayout->trailerArquivoDefault();
        $modeloTrailerArqValidacao = $iLayout->trailerArquivoValidacao();
        $modeloTrailerArquivo = $iLayout->trailerArquivo();
        $trailerArquivo = [];

        $this->trailerArquivo = $validacaoCnab->setDefault($modeloTrailerArquivo, $this->trailerArquivo, $modeloTrailerArqDefault, 'trailerArquivo');

        foreach ($modeloTrailerArquivo as $key => $especificacoes) {

            $valor = $arquivoPadrao->tratarDados($especificacoes, $this->trailerArquivo[$key], $key, $config, 'trailerArquivo');

            if (isset($modeloTrailerArqValidacao[$key])) {
                $validacaoCnab->{$modeloTrailerArqValidacao[$key]}($valor, $key, $this->trailerArquivo, 'trailerArquivo');
            }

            $trailerArquivo[] = $valor;
        }

        $this->linhas[] = $trailerArquivo;

        $this->validaSegmentosObrigatorios($config);

        $validacaoCnab->validaTamanhoArray($this->linhas);

        return $this->linhas;
    }

}
