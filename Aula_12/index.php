<?php
namespace Aula_12;
require_once 'CRUD.php';
require_once 'AlunoDAO.php';

$dao = new AlunoDAO(); // objeto da classe Aluno DAO para testar metodos CRUD

//CREATE
$dao -> criarAlunos(new aluno(1, "Josias", "Panificação"));
$dao -> criarAlunos(new aluno (2, "Victor Hugo", "Manicure"));
$dao -> criarAlunos(new aluno(3, "Beatriz", "Eletricista"));

//READ
echo "\nListagem inicial:\n";
foreach ($dao->lerAlunos() as $aluno){
    echo "{$aluno->getid()} - {$aluno->getnome()} - {$aluno->getcurso()}\n";
}

//UPDATE
$dao->atualizarAlunos(1, "Jozias", "Técnico em Borracharia");

echo "\nApós Atualização:\n";
foreach ($dao->lerAlunos() as $aluno){
    echo "{$aluno->getid()} - {$aluno->getnome()} - {$aluno->getcurso()}\n";
}

//DELETE
$dao->excluirAlunos(1); 
echo "\nApós Exclusão:\n";
foreach ($dao->lerAlunos() as $aluno){
    echo "{$aluno->getid()} - {$aluno->getnome()} - {$aluno->getcurso()}\n";
}
