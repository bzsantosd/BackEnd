<?php
namespace BibliotecaEscolar;

class Livro {
    private $titulo;
    private $autor;
    private $ano;
    private $genero;
    private $quantidade;

    public function __construct($titulo, $autor, $ano, $genero, $quantidade) {
        $this->titulo = $titulo;
        $this->autor = $autor;
        $this->ano = $ano;
        $this->genero = $genero;
        $this->quantidade = $quantidade;
    }

    // Getters
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

    // Setters
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