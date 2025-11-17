<?php

namespace Aula_16;

require_once __DIR__. "\\..\\Model\\BebidaDAO.php";
require_once __DIR__. "\\..\\Model\\Bebida.php";

class BebidaController {
    private $dao;

    public function __construct() {
        $this->dao = new BebidaDAO();
    }

    public function ler() {
        return $this->dao->lerBebidas();
    }

    public function criar($nome,$categoria,$volume,$valor,$qtde) {
        // $id = time(); // Removido por não ser usado
        $bebida = new Bebida( $nome, $categoria, $volume, $valor, $qtde);
        $this->dao->criarBebida($bebida);
    }

    // ATUALIZAÇÃO: Aceita o nome antigo para a DAO gerenciar a mudança de chave.
    public function atualizar($nomeAntigo, $nomeNovo, $categoria, $volume, $valor, $qtde) {
        $bebidaNova = new Bebida($nomeNovo, $categoria, $volume, $valor, $qtde);
        $this->dao->atualizarBebida ($nomeAntigo, $bebidaNova,$categoria, $volume, $valor, $qtde);
    }

    public function deletar($nome) {
        $this->dao->excluirBebida($nome);
    }
}
?>