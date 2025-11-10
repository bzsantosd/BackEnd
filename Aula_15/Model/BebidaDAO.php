<?php 
 namespace Aula_15;

class BebidaDAO {
    private $bebidasArray = [];
    private $arquivoJson = 'bebidas.json';

    public function __construct() {
        if (file_exists($this->arquivoJson)) {
            $conteudoArquivo = file_get_contents($this->arquivoJson);
            $dadosArquivosEmArray = json_decode($conteudoArquivo, true);

            if ($dadosArquivosEmArray) {
                foreach ($dadosArquivosEmArray as $nome => $info) {
                    $this->bebidasArray[$nome] = new Bebida(
                        $info['nome'],
                        $info['categoria'],
                        $info['volume'],
                        $info['valor'],
                        $info['qtde']
                    );
                }
            }
        }
    }

    private function salvarArquivo(){
        $dadosParaSalvar = [];

        foreach ($this->bebidasArray AS $nome => $bebida) {
            $dadosParaSalvar[$nome] = [
                'nome' => $bebida->getNome(),
                'categoria' => $bebida->getCategoria(),
                'volume' => $bebida->getVolume(),
                'valor' => $bebida->getValor(),
                'qtde' => $bebida->getQtde()
            ];
        }   
        file_put_contents($this->arquivoJson, json_encode($dadosParaSalvar, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    }
    
    // create
    public function criarBebidas(Bebida $bebida){
        $this->bebidasArray[$bebida->getNome()] = $bebida;
        $this->salvarArquivo();
    }

    // read 
    public function lerBebidas(){
        return $this->bebidasArray;
    }

    // update - AGORA ACEITA A BEBIDA COMPLETA E O NOME ANTIGO
    public function atualizarBebidas($nomeAntigo, Bebida $bebidaNova){
        // 1. Se o nome mudou, remove o registro antigo
        if ($nomeAntigo !== $bebidaNova->getNome() && isset($this->bebidasArray[$nomeAntigo])) {
            unset($this->bebidasArray[$nomeAntigo]);
        }
        
        // 2. Adiciona/Sobrescreve o registro com os novos dados (usando o novo nome como chave)
        $this->bebidasArray[$bebidaNova->getNome()] = $bebidaNova;
        
        $this->salvarArquivo();
    }

    // delete
    public function excluirBebida($nome){
        unset($this->bebidasArray[$nome]);
        $this->salvarArquivo();
    }
}