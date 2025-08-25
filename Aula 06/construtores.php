<?php
class ProdutosMercado {  // criando classe
    // Atributos
    public $nome;
    public $categoria;
    public $fornecedor;

    public $qtde_estoque;

    // Metodos
    public function atualizarEstoque($qtde_vendida) {
        $this->qtde_estoque -= $qtde_vendida;
        return $this->qtde_estoque; 
    }

    // criando construtor
    public function __construct($nome, $categoria, $fornecedor, $qtde_estoque) {
        $this-> nome = $nome;
        $this-> categoria = $categoria;
        $this-> fornecedor = $fornecedor;
        $this-> qtde_estoque = $qtde_estoque;
    }
}

// criando objetos sem construtor feito
$produto1 = new ProdutosMercado();
$produto1 -> nome = "Suco Tang";
$produto1 -> categoria = "Bebidas";
$produto1 -> fornecedor = "Mondelez";
$produto1 -> qtde_estoque = 200;

$produto2 = new ProdutosMercado();
$produto2 -> nome = "Energetico Monster";
$produto2 -> categoria = "Bebidas";
$produto2 -> fornecedor = "Coca-Cola";
$produto2 -> qtde_estoque = 150;

// criando objetos com construtor feito
$produto1 = new ProdutosMercado ("Suco Tang" , "Bebidas" , "Mondelez" , 200); 
$produto2 = new ProdutosMercado ("Energetico Monster", "Bebidas", "Coca-Cola", 150);

?>