<?php
namespace BibliotecaEscolar;

require_once __DIR__. "\\..\\Model\\LivroDAO.php";
require_once __DIR__. "\\..\\Model\\Livro.php";

// Conecta a interface (View) e o dados (Model)
class LivroController {
    private $dao;

    public function __construct() {
        $this->dao = new LivroDAO();
    }

    // Lista todos os livros
    public function ler() {
        return $this->dao->lerLivros();
    }

    // Cadastra um novo livro
    public function criar($titulo, $autor, $ano, $genero, $quantidade) {
        $livro = new Livro($titulo, $autor, $ano, $genero, $quantidade);
        $this->dao->criarLivro($livro);
    }

    // Atualiza o livro existente
    public function atualizar($tituloOriginal, $novoTitulo, $autor, $ano, $genero, $quantidade) {
        $this->dao->atualizarLivro($tituloOriginal, $novoTitulo, $autor, $ano, $genero, $quantidade);
    }

    // Deleta o livro
    public function deletar($titulo) {
        $this->dao->excluirLivro($titulo);
    }

    // Edita mas mantém o mesmo título, atualizando os outros campos
    public function editar($titulo, $autor, $ano, $genero, $quantidade) {
        $this->dao->atualizarLivro($titulo, $titulo, $autor, $ano, $genero, $quantidade);
    }

    // Busca o livro por título
    public function buscar($titulo) {
        return $this->dao->buscarPorTitulo($titulo);
    }
}
?>