<?php
namespace Aula_16;


class Bebida { //atributos
    private $nome; 
    private $categoria;
    private $volume;
    private $valor;
    private $qtde;

    public function __construct($nome, $categoria, $volume, $valor, $qtde) { //metodo construtor
        $this->nome = $nome;
        $this->categoria = $categoria;
        $this->volume = $volume;
        $this->valor = $valor;
        $this->qtde = $qtde;
    }
    public function getNome() //getters e setters
    {
        return $this->nome;
    }
    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }
    public function getCategoria()
    {
        return $this->categoria;
    }
    public function setCategoria($categoria)
    {
        $this->categoria = $categoria;

        return $this;
    }
    public function getVolume()
    {
        return $this->volume;
    }
    public function setVolume($volume)
    {
        $this->volume = $volume;

        return $this;
    }

    public function getValor()
    {
        return $this->valor;
    }
 
    public function setValor($valor)
    {
        $this->valor = $valor;

        return $this;
    }
 
    public function getQtde()
    {
        return $this->qtde;
    }

    public function setQtde($qtde)
    {
        $this->qtde = $qtde;

        return $this;
    }
}