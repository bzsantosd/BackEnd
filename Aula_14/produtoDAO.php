<?php
namespace Aula_14;

class ProdutoDAO { 
    private $produtos = []; 
     private $arquivo = "produtos.json"; 

    
    public function __construct() {
        if (file_exists($this->arquivo)) {
            
            $conteudo = file_get_contents($this->arquivo); 
            
            $dados = json_decode($conteudo, true);
           
            if ($dados){ 
                foreach ($dados AS $codigo => $info){ 
                    $this->produtos[$codigo] = new Produto( 
                        $info['codigo'],
                        $info['nome'],
                        $info['preco']
                        
                    );
                }
            }   
        }
    }
    private function salvaremArquivo() {
        $dados = [];
        foreach ($this->produtos AS $codigo => $produto) {
            $dados[$codigo] = [
                'codigo' => $produto->getcodigo(),
                'nome' => $produto->getnome(),
                'preco' => $produto->getpreco()
            ];
        }
        file_put_contents($this->arquivo, json_encode($dados, JSON_PRETTY_PRINT));
    }

    public  function criarProduto(produto $produto) { 
        $this->produtos[$produto->getcodigo()] = $produto;
        $this->salvaremArquivo(); 
    }

    public  function lerProduto() { 
        return $this->produtos;
    }

    public  function atualizarProduto($codigo, $novoNome, $novoPreco) { 
        if (isset($this->produto[$codigo])) {
            $this->produtos[$codigo]->setnome($novoNome);
            $this->produtos[$codigo]->setpreco($novoPreco);
        }
        $this->salvaremArquivo(); 
    }

    public  function excluirProduto($id) { 
        unset($this->produto[$id]);
        $this->salvaremArquivo(); 
    }
}