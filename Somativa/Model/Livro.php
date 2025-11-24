<?php
namespace BibliotecaEscolar;

//Esta classe representa o livro como objeto
class Livro {
    private $titulo;
    private $autor;
    private $ano;
    private $genero;
    private $quantidade;

//Construtor: Inicializa classe objeto com os dados do livro
    public function __construct($titulo, $autor, $ano, $genero, $quantidade) {
        $this->titulo = $titulo;
        $this->autor = $autor;
        $this->ano = $ano;
        $this->genero = $genero;
        $this->quantidade = $quantidade;
    }

// Getters: Retornam valores dos atributos
    public function getTitulo() {
        return $this->titulo;
    }

    public function getAutor() {
        return $this->autor;
    }

    public function getAno() {
        return $this->ano;
    }

    public function getGenero() {
        return $this->genero;
    }

    public function getQuantidade() {
        return $this->quantidade;
    }

// Setters: Modificam os valores 
    public function setTitulo($titulo) {
        $this->titulo = $titulo;
        return $this;
    }

    public function setAutor($autor) {
        $this->autor = $autor;
        return $this;
    }

    public function setAno($ano) {
        $this->ano = $ano;
        return $this;
    }

    public function setGenero($genero) {
        $this->genero = $genero;
        return $this;
    }

    public function setQuantidade($quantidade) {
        $this->quantidade = $quantidade;
        return $this;
    }
}
?>