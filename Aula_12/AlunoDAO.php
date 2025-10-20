<?php
 namespace Aula_12;
 class AlunoDAO { // classe DAO (Data Access Object) para manipulacao das funcoes do CRUD (create, read, update, delete)
    private $alunos = []; // array $alunos para armazenamento temporario dos objetos a serem manipulados antes de ser enviado ao banco de daods. foi criado vazio inicalmente.
    
    public  function criarAlunos(Aluno $aluno) { // metodo para criar um objeto no array alunos --> create
        $this->alunos[$aluno->getid()] = $aluno;
    }

    public  function lerAlunos() { // metodo para ler os dados de um objeto ja criado --> read
        return $this->alunos;
    }

    public  function atualizarAlunos($id, $novoNome, $novoCurso) { // metodo para atualizar os dados de um objeto ja criado --> update
        if (isset($this->alunos[$id])) {
            $this->alunos[$id]->setnome($novoNome);
            $this->alunos[$id]->setcurso($novoCurso);
        }
    }

    public  function excluirAlunos($id) { // metodo para excluir um objeto do array alunos --> delete
        unset($this->alunos[$id]);
    }
}
