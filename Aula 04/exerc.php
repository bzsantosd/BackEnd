<?php 
$marca_carro1 ="Nissan";
$modelo_carro1 = "Versa";
$ano_carro1 = 2020;
$revisao_carro1 = true;  
$Ndonos_carro1 = 2;

function exibirCarro($modelo, $marca, $ano, $revisao, $Ndonos) {
    echo "Marca: $marca\n";
    echo "Carro: $modelo\n";
    echo "Ano: $ano\n";
    echo "Revisão: $revisao\n";
    echo "Número de donos: $Ndonos\n";
}
exibirCarro($modelo_carro1, $marca_carro1, $ano_carro1, $revisao_carro1, $Ndonos_carro1);
?>

<?php
$marca_carro1 = "Honda";
$modelo_carro1 = "Civic";
$ano_carro1 = 2016;
$revisao_carro1 = true;
$Ndonos_carro1 = 2;

$marca_carro2 = "BMW";
$modelo_carro2 = "320i";
$ano_carro2 = 2012;
$revisao_carro2 = false;
$Ndonos_carro2 = 3;

$marca_carro3 = "Fiat";
$modelo_carro3 = "Uno";
$ano_carro3 = 2005;
$revisao_carro3 = false;
$Ndonos_carro3 = 1;

$marca_carro4 = "Volkswagen";
$modelo_carro4 = "Jetta";
$ano_carro4 = 2020;
$revisao_carro4 = true;
$Ndonos_carro4 = 7;

function ehSeminovo($ano) {
    $anoAtual = date('Y');
    $idadeCarro = $anoAtual - $ano;
    return $idadeCarro <= 3;
}

$carros = [
    ['modelo' => 'Civic', 'ano' => $ano_carro1],
    ['modelo' => '320i', 'ano' => $ano_carro2],
    ['modelo' => 'Uno', 'ano' => $ano_carro3],
    ['modelo' => 'Jetta', 'ano' => $ano_carro4]
];

echo "Verificação de carros seminovos:\n";
foreach ($carros as $carro) {
    $modelo = $carro['modelo'];
    $ano = $carro['ano'];
    $status = ehSeminovo($ano) ? 'Seminovo' : 'Não é seminovo';

    echo "$modelo ($ano): $status\n";
}

?>

<?php
function precisaRevisao($revisao, $ano) {
    if (!$revisao && $ano < 2022) {
        return "Precisa de revisão";
    } else {
        return "Revisão em dia";
    }
}

$marca_carro1 = "Honda";
$modelo_carro1 = "Civic";
$ano_carro1 = 2016;
$revisao_carro1 = true;
$Ndonos_carro1 = 2;

$marca_carro2 = "BMW";
$modelo_carro2 = "320i";
$ano_carro2 = 2012;
$revisao_carro2 = false;
$Ndonos_carro2 = 3;

$marca_carro3 = "Fiat";
$modelo_carro3 = "Uno";
$ano_carro3 = 2005;
$revisao_carro3 = false;
$Ndonos_carro3 = 1;

$marca_carro4 = "Volkswagen";
$modelo_carro4 = "Jetta";
$ano_carro4 = 2020;
$revisao_carro4 = true;
$Ndonos_carro4 = 7;

echo "O Honda Civic {$ano_carro1} " . precisaRevisao($revisao_carro1, $ano_carro1) . "\n";
echo "O BMW 320i {$ano_carro2} " . precisaRevisao($revisao_carro2, $ano_carro2) . "\n";
echo "O Fiat Uno {$ano_carro3} " . precisaRevisao($revisao_carro3, $ano_carro3) . "\n";
echo "O Volkswagen Jetta {$ano_carro4} " . precisaRevisao($revisao_carro4, $ano_carro4) . "\n";

?>

 
<?php
// Aula 4 - Exercícios 04 de PHP

function calcularValor($marca, $ano, $Ndonos) {
    $precoBase = 0;
    
    // Define o preço base de acordo com a marca
    switch ($marca) {
        case "Honda":
            $precoBase = 150000;
            break;
        case "BMW":
            $precoBase = 300000;
            break;
        case "Fiat":
            $precoBase = 300000;
            break;
        case "Volkswagen":
            $precoBase = 70000;
            break;
        
    }

    // Calcula o desconto por ano de uso
    $anoAtual = date("Y");
    $anosDeUso = $anoAtual - $ano;
    $descontoAnos = $anosDeUso * 3000;

    // Calcula o desconto por número de donos
    $descontoDonos = 0;
    if ($Ndonos > 1) {
        $donosAdicionais = $Ndonos - 1;
        $descontoDonos = ($precoBase * 0.05) * $donosAdicionais;
    }
    
    // Calcula o valor final
    $valorFinal = $precoBase - $descontoAnos - $descontoDonos;
    
    // Garante que o valor não seja negativo
    if ($valorFinal < 0) {
        $valorFinal = 0;
    }
    
    return "Valor estimado: R$ " . number_format($valorFinal, 2, ',', '.');
}

// Exemplos de uso da função
echo "Carro 1 (Honda, 2016, 2 donos): " . calcularValor("Honda", 2016, 3) ."\n";
echo "Carro 2 (BMW, 2012, 3 donos): " . calcularValor("BMW", 2012, 3) . "\n";
echo "Carro 3 (Fiat, 2005, 1 dono): " . calcularValor("Fiat", 2005, 1) . "\n";
echo "Carro 4 (Volkswagem, 2020, 7 donos): " . calcularValor("Volkswagem", 2020, 7) . "\n";

?>