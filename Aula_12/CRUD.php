<?php
namespace Aula_12;
class aluno {
    private $id;
    private $nome;
    private $curso;

    public function __construct ($id, $nome, $curso) {
        $this->id = $id;
        $this->nome = $nome;
        $this->curso = $curso;
    }

    public  function setid($id) {
        $this->id = $id;
    }

     public  function setnome($nome) {
        $this->nome = $nome;
    }

     public  function setcurso($curso) {
        $this->curso = $curso;
    }

     public  function getid() {
        return $this->id;
    }

     public  function getnome() {
        return $this->nome;
    }

     public  function getcurso() {
        return $this->curso;
    }

    

}

