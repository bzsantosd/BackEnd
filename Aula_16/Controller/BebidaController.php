<?php
namespace Aula_16;

require_once __DIR__. "\\..\\Model\\BebidaDAO.php";
require_once __DIR__. "\\..\\Model\\Bebida.php";

class BebidaController {
    private $dao;

    public function __construct() {
        $this->dao = new BebidaDAO();
    }

    //lista todas as bebidas 
    public function ler() {
        return $this->dao->lerBebidas();

    }

    //cadastra nova bebida

    public function criar($nome,$categoria,$volume,$valor,$qtde) {
        $id = time();
        $bebida = new Bebida( $nome, $categoria, $volume, $valor, $qtde);
        $this->dao->criarBebida($bebida);

    }

    // atualiza bebida existente
    public function atualizar($nomeOriginal, $novoNome, $categoria, $volume, $valor, $qtde) {
        $this->dao->atualizarBebida($nomeOriginal, $novoNome, $categoria, $volume, $valor, $qtde);
    }

    public function deletar($nome) {
        $this->dao->excluirBebida($nome);
    }

    // editar mantém o mesmo nome, atualiza os outros campos
    public function editar($nome, $categoria, $volume, $valor, $qtde) {
        $this->dao->atualizarBebida($nome, $nome, $categoria, $volume, $valor, $qtde);
    }

    public function buscar($nome) {
        return $this->dao->buscarPorNome($nome);
    }
}

?>