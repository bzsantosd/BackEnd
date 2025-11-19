<?php
namespace BibliotecaEscolar;

require_once __DIR__. "\\..\\Model\\LivroDAO.php";
require_once __DIR__. "\\..\\Model\\Livro.php";

class LivroController {
    private $dao;

    public function __construct() {
        $this->dao = new LivroDAO();
    }

    // Lista todos os livros
    public function ler() {
        return $this->dao->lerLivros();
    }

    // Cadastra novo livro
    public function criar($titulo, $autor, $ano, $genero, $quantidade) {
        $livro = new Livro($titulo, $autor, $ano, $genero, $quantidade);
        $this->dao->criarLivro($livro);
    }

    // Atualiza livro existente
    public function atualizar($tituloOriginal, $novoTitulo, $autor, $ano, $genero, $quantidade) {
        $this->dao->atualizarLivro($tituloOriginal, $novoTitulo, $autor, $ano, $genero, $quantidade);
    }

    // Deleta livro
    public function deletar($titulo) {
        $this->dao->excluirLivro($titulo);
    }

    // Editar mantém o mesmo título, atualiza os outros campos
    public function editar($titulo, $autor, $ano, $genero, $quantidade) {
        $this->dao->atualizarLivro($titulo, $titulo, $autor, $ano, $genero, $quantidade);
    }

    // Busca livro por título
    public function buscar($titulo) {
        return $this->dao->buscarPorTitulo($titulo);
    }
}
?>