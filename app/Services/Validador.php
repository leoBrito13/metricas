<?php

namespace App\Services;

class Validador
{

    function verificaMapa($item)
    {
        $buscamapa = "NÂO";
        if (!empty($item["cfdata_enablebuscamapa"]) && $item["cfdata_enablebuscamapa"] != 'no') {
            $buscamapa = "SIM";
            $mapa  = " " . $buscamapa . ' - ';

            if (!empty($item['cfdata_buscamapaapikey'])) {
                $mapa .= '<span class="text-danger">Google</span>';
            } else {
                $mapa .= 'Padrão';
            }
        } else {
            $mapa = $buscamapa;
        }

        return $mapa;
    }

    function validaCampo($item)
    {
        $resposta = "NÃO";
        if (isset($item) && $item !== 'no' && !empty($item)) {
            $resposta = 'SIM';
        }

        return $resposta;
    }

    function VerificaDominios($site)
    {
        $dominios = array("colibritemporario2.com.br", "colibritemporario.com.br", "rocketimob.com.br", "colibridigital2.com.br", "colibridigital.com.br", "colibri360.com.br", "roccketimob.com.br");
        $dominio_valido = true; // Reseta o valor para cada cliente
        foreach ($dominios as $dominio) {
            if (strpos($site, $dominio) !== false) {
                $dominio_valido = false;
            }
        }

        return $dominio_valido;
    }

    function VerificaData($timestamp)
    {
        $dataAtual = time(); // Obtém o timestamp atual
        if ($timestamp < $dataAtual) {
            return false;
        } elseif ($timestamp > $dataAtual) {
            return true;
        } else {
            return true;
        }
    }

    function ValidaDominio($item, $dominiosValidados)
    {
        if (isset($item) && !empty($item)) {
            $dominio_valido = $this->VerificaDominios($item);
            if ($dominio_valido && !in_array($item, $dominiosValidados)) {
                return true;
            } else {
                return false;
            }
        }
    }

    public function listarArquivosEDiretorios($diretorio) {
        $resultados = [];

        // Verifica se o diretório existe
        if (is_dir($diretorio)) {
            // Obtém uma lista de arquivos e diretórios dentro do diretório especificado
            $itens = scandir($diretorio);

            // Filtra os itens para remover os diretórios '.' e '..'
            $itens = array_diff($itens, array('.', '..'));

            // Adiciona arquivos e diretórios ao array de resultados
            foreach ($itens as $item) {
                $caminhoItem = $diretorio . DIRECTORY_SEPARATOR . $item;

                // Verifica se o item é um diretório
                if (is_dir($caminhoItem)) {
                    // Se for um diretório, chama o método recursivamente para listar seu conteúdo
                    $resultados[] = $item . DIRECTORY_SEPARATOR;
                    $resultados[] = $this->listarArquivosEDiretorios($caminhoItem);
                } else {
                    // Se for um arquivo, apenas adiciona ao resultado
                    $resultados[] = $item;
                }
            }
        }

        // Converte o array de resultados em uma string separada por vírgulas
        return implode('<br>', $this->achatarArray($resultados));
    }

    // Função auxiliar para achatar arrays multidimensionais
    private function achatarArray($array) {
        $resultado = [];
        foreach ($array as $item) {
            if (is_array($item)) {
                $resultado = array_merge($resultado, $this->achatarArray($item));
            } else {
                $resultado[] = $item;
            }
        }
        return $resultado;
    }

    function verificaFuncaoNoArquivo($arquivo, $dominio) {
        if (file_exists($arquivo)) {
            $conteudo = file_get_contents($arquivo);
            
            $dominioFiltrado = "'$dominio'";
            if (strpos($conteudo, $dominioFiltrado) !== false) {
                return true; // A função foi encontrada no arquivo
            } else {
                return false; // A função não foi encontrada no arquivo
            }
        } else {
            return null; // Arquivo não encontrado
        }
    }

    // function VerificaCamposVazios($campos)
    // {
    //     $camposVazios = [];
    //     foreach ($campos as $campo => $valor) {
    //         if (empty($valor) && ($campo =="cfdata_key" && $campos["cfdata_crm_integrado"] !=='redeimoveis')) {
    //             $camposVazios[] = $campo;
    //         }
    //     }

    //     return $camposVazios;
    // }

    // function gerarNotificacao($url, $campos)
    // {
    //     $camposStr = implode(', ', $campos);
    //     return '<div class="alert alert-warning alert-dismissible fade show" role="alert">
    //                 <strong>Atenção:</strong> O site ' . htmlspecialchars($url) . ' possui os seguintes campos vazios: ' . htmlspecialchars($camposStr) . '
    //             </div>';
    // }
}
