<?php
namespace Aula_14;

class Produto {
    public $codigo;
    public $nome;
    public $preco;

    public function __construct($codigo, $nome, $preco) {
        $this->codigo = $codigo;
        $this->nome = $nome;
        $this->preco = $preco;
    }

    public  function setcodigo($codigo) {
        $this->codigo = $codigo;
    }

     public  function setnome($nome) {
        $this->nome = $nome;
    }

     public  function setpreco($preco) {
        $this->preco = $preco;
    }

     public  function getcodigo() {
        return $this->codigo;
    }

     public  function getnome() {
        return $this->nome;
    }

     public  function getpreco() {
        return $this->preco;
    }

    
}