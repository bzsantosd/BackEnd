<?php

$nota1 = 8.5;
$nota = 6.0;
$presenca = 80;
$nome = "enzo enrico";
$media = ($nota1 + $nota) / 2;

if ($nome == "enzo enrico" || ($media >= 7 && $presenca >= 75)) {
    echo "Aluno aprovado com média: $media";
} else {
    echo "Aluno reprovado com média: $media";
}

?>