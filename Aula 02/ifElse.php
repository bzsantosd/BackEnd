<?php

$nome = "Enzo Enrico";

echo "Boa Tarde!";
$nota1 = readline( "Digite a 1° nota do aluno: ");
$nota2 = readline( "Digite a 2° nota do aluno: ");
$presenca = readline( "Digite a presença do aluno: ");
$media = ($nota1 + $nota2) / 2;

if (($media >= 7 && $presenca >= 75) || $nome == "enzo enrico") {
    echo "Aluno aprovado com média: $media e presenca: $presenca%";
} else {
    echo "Aluno reprovado com média: $media";
}

?>