<?php
/* questao 1 */
$idade = readline("Digite a idade: ");

if($idade >=18) {
    echo "Maior de idade";
} else {
    echo "Menor de idade";
}
?>

<?php
/* questao 2 */
$nota = readline("Digite a nota do aluno: ");
if ($nota >= 9) {
echo "Excelente";
} elseif ($nota >= 7) {
echo "Bom";
} else {
echo "Reprovado";
}
?>

<?php
/* questao 3 */
$dia = readline("Digite um número entre 1 e 7: ");
switch ($dia) {
case 1:
echo "Segunda";
break;
case 2:
echo "Terca";
break;
case 3:
echo "Quarta";
break;
case 4:
echo "Quinta";
break;
case 5:
echo "Sexta";
break;
case 6:
echo "Sabado";
break;
case 7:
echo "Domingo";
default:
echo "Dia não reconhecido.";
}
?>

<?php
/* questao 4 */
$num1 = readline("Digite o primeiro número: ");
$num2 = readline("Digite o segundo número: ");
$operacao = readline("Digite a operação (+, -, *, /): ");

switch ($operacao) {
    case '+':
        echo "Resultado: " . ($num1 + $num2);
        break;
    case '-':
        echo "Resultado: " . ($num1 - $num2);
        break;
    case '*':
        echo "Resultado: " . ($num1 * $num2);
        break;
    case '/':
        if ($num2 == 0) {
            echo "Divisão por zero.";
        } else {
            echo "Resultado: " . ($num1 / $num2);
        }
        break;
    default:
        echo "Operação inválida.";
}
?>

<?php
/* questao 5 */
for ($i = 1; $i<= 10; $i++) {
echo "Contagem: $i
";
}
?>

<?php
/* questao 6 */
$numero = readline("Digite um número para iniciar a contagem regressiva: ");
for ($i = $numero; $i>= 1; $i--) {
echo " $i\n";
}
?>

<?php
/* questao 7 */
$final = readline("Digite o número final: ");
for ($i = 0; $i <= $final; $i++) {
    if ($i % 2 == 0) {
        echo "$i\n";
    }
}
?>

<?php
/* questao 8 */
$numero = readline("Digite um número para ver sua tabuada: ");
for ($i = 1; $i <= 10; $i++) {
    echo "$numero x $i = " . ($numero * $i) . "\n";
}
?>

<?php
/* questao 9 */
$temperatura = readline("Digite a temperatura em °C: ");
if ($temperatura < 15) {
    echo "Frio";
} elseif ($temperatura <= 25) {
    echo "Agradável";
} else {
    echo "Quente";
}
?>

<?php
/* questao 10 */
for ($j = 1; $j <= 5; $j++) {
    echo "1 - Olá\n";
    echo "2 - Data Atual\n";
    echo "3 - Sair\n";
    $opcao = readline("Escolha uma opção: ");

    switch ($opcao) {
        case 1:
            echo "Olá\n";
            break;
        case 2:
            echo "Data Atual: " . date('d/m/Y H:i:s') . "\n";
            break;
        case 3:
            echo "Saindo...\n";
            exit;
        default:
            echo "Opção inválida.\n";
    }
}
?>

<?php
/* questao extra */
?>