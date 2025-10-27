<?php
namespace Aula_12;
require_once 'CRUD.php';
require_once 'AlunoDAO.php';

$dao = new AlunoDAO(); // objeto da classe Aluno DAO para testar metodos CRUD

//CREATE

$dao -> criarAlunos(new aluno(1, "Josias", "Panificação"));
$dao -> criarAlunos(new aluno (2, "Victor Hugo", "Manicure"));
$dao -> criarAlunos(new aluno(3, "Beatriz", "Eletricista"));


// crie mais 6 objetos:
// id - nome- curso
// 4 - Aurora - Arquitetura
// 5 - Oliver - Gestão
// 6 - Amanda - Luta
// 7 - Geysa - Engenharia
// 8 - Joab - Eletrica
// 9 - Miguel - Streamer

$dao -> criarAlunos(new aluno(4, "Aurora", "Arquitetura"));
$dao -> criarAlunos(new aluno(5,"Oliver", "Gestão"));
$dao -> criarAlunos(new aluno(6,"Amanda", "Luta"));
$dao -> criarAlunos(new aluno(7,"Geysa", "Engenharia"));
$dao -> criarAlunos(new aluno(8,"Joab", "Eletrica"));
$dao -> criarAlunos(new aluno(9, "Miguel", "Streamer"));


//READ

echo "\nListagem inicial:\n";
foreach ($dao->lerAlunos() as $aluno){
    echo "{$aluno->getid()} - {$aluno->getnome()} - {$aluno->getcurso()}\n";
}

//UPDATE

$dao->atualizarAlunos(1, "Jozias", "Técnico em Borracharia");

// faça as seguintes atualizações
// - Alterar nome da Geysa para Clotilde
// - Alterar nome do Joab para Joana (operou)
// - Alterar curso do Miguel para Designer
// - Alterar curso da Amanda para Logistica 
// - Alterar curso do Oliver para Eletrica

$dao->atualizarAlunos(7, "Clotilde", "Engenharia");
$dao->atualizarAlunos(8, "Joana", "Eletrica");
$dao->atualizarAlunos(9, "Miguel", "Designer");
$dao->atualizarAlunos(6, "Amanda", "Logistica");
$dao->atualizarAlunos(5, "Oliver", "Eletrica");

echo "\nApós Atualização:\n";
foreach ($dao->lerAlunos() as $aluno){
    echo "{$aluno->getid()} - {$aluno->getnome()} - {$aluno->getcurso()}\n";
}

//DELETE

// Exclua a Clotilde e a Aurora 

$dao->excluirAlunos(1); 
echo "\nApós Exclusão:\n";
foreach ($dao->lerAlunos() as $aluno){
    echo "{$aluno->getid()} - {$aluno->getnome()} - {$aluno->getcurso()}\n";
}

$dao->excluirAlunos(7);
echo "\nApós Exclusão:\n";
foreach ($dao->lerAlunos() as $aluno){
    echo "{$aluno->getid()} - {$aluno->getnome()} - {$aluno->getcurso()}\n";
}

$dao->excluirAlunos(4);
echo "\nApós Exclusão:\n";
foreach ($dao->lerAlunos() as $aluno){
    echo "{$aluno->getid()} - {$aluno->getnome()} - {$aluno->getcurso()}\n";
}
