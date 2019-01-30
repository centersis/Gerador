<?php

namespace Arquivo;

use Arquivo\Util;

class ArquivoPadrao
{

    public function gravar($resultado, $caminho, $nomeArquivo)
    {
        $caminhoAbsoluto = $this->tratarCaminho($caminho, $nomeArquivo);
        $this->verificaPermissao($caminhoAbsoluto);

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

    public function tratarDados($especificacoes, $valor, $posicao, $config, $identifica)
    {
        $util = new Util();
        $arquivoValidacao = new ArquivoValidacao();

        if ($especificacoes[1] == 'num') {

            $valorFormatado = $util->formataNumDecimais($valor);
            $arquivoValidacao->validaTamanhoNum($valorFormatado, $especificacoes[0], $posicao, $identifica);
            $valor = $util->adicionarZerosEsq($valorFormatado, $especificacoes[0]);
        } else if ($especificacoes[1] == 'valor') {

            $valor = $util->adicionarZerosEsq($this->removePontuacao($this->floatCliente($valor)), $especificacoes[0]);

            $arquivoValidacao->validaTamanhoNum($valor, $especificacoes[0], $posicao, $identifica);
        } else {

            $case = null;

            if (isset($config['case'])) {
                $case = strtolower($config['case']);
            }

            $valorPreparado = $util->preparaTexto($valor, $case);

            $valor = $util->adicionarEspacosDir($valorPreparado, $especificacoes[0]);
        }

        return $valor;
    }

    public function toFloat($valor)
    {
        $valorLimpo = $this->removePontuacao($valor);
        
        $inicio = substr($valorLimpo, 0, -2);
        $fim = substr($valorLimpo, -2);

        return (float) ($inicio . '.' . $fim);
    }

    public function removePontuacao($texto)
    {
        return str_replace(['.', '/', '-', ','], '', $texto);
    }

    public function floatCliente($numero, $decimal = 2)
    {
        $float = $this->floatBanco($numero);
        return number_format($float, $decimal, ',', '.');
    }

    public function floatBanco($numero)
    {
        if (!empty($numero)) {
            //Verifica de o número ja esta formatado
            if (is_numeric($numero)) {
                return (float) $numero;
            }

            $valorA = str_replace('.', '', $numero);
            $valorB = str_replace(',', '.', $valorA);
            return (float) $valorB;
        }

        return 0;
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
