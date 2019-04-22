<?php

namespace Src\Arquivo;

use Src\Arquivo\Util;

class ArquivoPadrao
{

    public function gravar($resultado, $caminho, $nomeArquivo)
    {
        $caminhoAbsoluto = $this->tratarCaminho($caminho, $nomeArquivo);
        $this->verificaPermissao($caminhoAbsoluto);

        if (file_exists($caminhoAbsoluto)) {
            if (!is_readable($caminhoAbsoluto)) {
                throw new \Exception("O arquivo já existe e você não tem permissão para leitura!");
            }

            if (!is_writable($caminhoAbsoluto)) {
                throw new \Exception("O arquivo já existe e você não tem permissão para escrita!");
            }
        }

        $arquivoAberto = fopen($caminhoAbsoluto, "w+");

        foreach ($resultado as $value) {

            $linha = '';
            foreach ($value as $dados) {
                $linha .= $dados;
            }

            fwrite($arquivoAberto, $linha . "\r\n");
        }

        fclose($arquivoAberto);
    }

    /**
     * Formatos
     * 
     * Datas:
     * data-Ymd
     * data-ymd
     * data-dmY
     * data-dmy
     * 
     * @param type $especificacoes
     * @param type $valor
     * @param type $posicao
     * @param type $config
     * @param type $identifica
     * @return type
     */
    public function tratarDados($especificacoes, $valor, $posicao, $config, $identifica)
    {
        $util = new Util();
        $arquivoValidacao = new ArquivoValidacao();


        switch ($especificacoes[1]) {

            case 'doc':
                $valorFormatado = $util->somenteNumeros($valor);
                $arquivoValidacao->validaTamanhoNum($valorFormatado, $especificacoes[0], $posicao, $identifica);
                $valor = $util->adicionarZerosEsq($valorFormatado, $especificacoes[0]);
                break;

            case 'num':
                $valorFormatado = $util->somenteNumeros($valor);
                $arquivoValidacao->validaTamanhoNum($valorFormatado, $especificacoes[0], $posicao, $identifica);
                $valor = $util->adicionarZerosEsq($valorFormatado, $especificacoes[0]);
                break;

            case 'valor':
                $valor = $util->adicionarZerosEsq($util->trataValor($valor), $especificacoes[0]);

                $arquivoValidacao->validaTamanhoNum($valor, $especificacoes[0], $posicao, $identifica);
                break;

            case 'data-Ymd': case 'data-ymd': case 'data-dmY': case 'data-dmy':

                if (empty($valor)) {
                    $valor = $util->adicionarZerosEsq('0', $especificacoes[0]);
                } else {

                    $valorCru = $util->somenteNumeros($valor);

                    if (strlen($valorCru) > 8) {
                        $valorCru = substr($valorCru, 0, 8);
                    }

                    $arquivoValidacao->validaData($valorCru, $posicao, $especificacoes[0], $identifica);

                    $partes = explode('-', $especificacoes[1]);

                    $valor = (new \DateTime($valor))->format($partes[1]);
                }

                break;

            default :
                $case = null;

                if (isset($config['case'])) {
                    $case = strtolower($config['case']);
                }

                $valorPreparado = $util->preparaTexto($valor, $case);

                $valor = $util->adicionarEspacosDir($valorPreparado, $especificacoes[0]);
                break;
        }


        return $valor;
    }

    private function tratarCaminho($caminho, $nomeArquivo)
    {
        if (empty($caminho)) {
            return $nomeArquivo;
        } elseif ((substr($caminho, -1) == "/")) {
            return $caminho . $nomeArquivo;
        } elseif (PHP_OS == "WINNT") {
            return $caminho . "\\" . $nomeArquivo;
        } else {
            return $caminho . "/" . $nomeArquivo;
        }
    }

    public function verificaPermissao($filename)
    {
        if (!is_writable(dirname($filename))) {
            throw new \Exception("Você não tem permissão de escrita nesta pasta!");
        }

        return true;
    }

}
