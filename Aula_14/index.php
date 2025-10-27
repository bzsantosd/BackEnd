<?php
namespace Aula_14;

require_once 'produto.php';
require_once 'produtoDAO.php';


$dao = new ProdutoDAO();

//CREATE

$dao -> criarProduto(new Produto(1, "Tomate", 7.50));
$dao -> criarProduto(new Produto(2, "Maça", 15.99));
$dao -> criarProduto(new Produto(3, "Queijo Brie", 28.90));;
$dao -> criarProduto(new Produto(4, "Iogurte Grego", 9.75));
$dao -> criarProduto(new Produto(5, "Guaraná Jesus", 6.25));
$dao -> criarProduto(new Produto(6, "Bolacha Bono", 8.10));
$dao -> criarProduto(new Produto(7, "Desinfetante Urca", 17.40));
$dao -> criarProduto(new Produto(8, "Prestobarba Bic", 12.99));

//READ

echo "\nListagem inicial:\n";
foreach ($dao->lerProduto() as $produto){
    echo "{$produto->getcodigo()} - {$produto->getnome()} - {$produto->getpreco()}\n";
}

//UPDATE

$dao->atualizarProduto(7, "Desinfetante Barbarex", "17.40");
echo "\nApós Atualização:\n";
foreach ($dao->lerProduto() as $produto){
    echo "{$produto->getcodigo()} - {$produto->getnome()} - {$produto->getpreco()}\n";
}

$dao->atualizarProduto(3, "Queijo Brie", "15.40");
echo "\nApós Atualização:\n";
foreach ($dao->lerProduto() as $produto){
    echo "{$produto->getcodigo()} - {$produto->getnome()} - {$produto->getpreco()}\n";
}

$dao->atualizarProduto(4, "Iogurte Grego", "7.40");
echo "\nApós Atualização:\n";
foreach ($dao->lerProduto() as $produto){
    echo "{$produto->getcodigo()} - {$produto->getnome()} - {$produto->getpreco()}\n";
}


//DELETE

$dao->excluirProduto(1); 
echo "\nApós Exclusão:\n";
foreach ($dao->lerProduto() as $produto){
    echo "{$produto->getcodigo()} - {$produto->getnome()} - {$produto->getpreco()}\n";
}

$dao->excluirProduto(2); 
echo "\nApós Exclusão:\n";
foreach ($dao->lerProduto() as $produto){
    echo "{$produto->getcodigo()} - {$produto->getnome()} - {$produto->getpreco()}\n";
}
 
 


// Modifique o Desinfetante Urca para Desinfetante Barbarex; E ao menos 2 valores dos preços que voce determinou.

