<?php
namespace Aula_10;

// Exercício 1 – Formas Geométricas
interface Forma {
    public function calcularArea();
}

class Quadrado implements Forma {
    private $lado;

    public function __construct($lado) {
        $this->lado = $lado;
    }

    public function calcularArea() {
        return $this->lado * $this->lado;
    }
}

class Retangulo implements Forma {
    private $base;
    private $altura;

    public function __construct($base, $altura) {
        $this->base = $base;
        $this->altura = $altura;
    }

    public function calcularArea() {
        return $this->base * $this->altura;
    }
}

class Circulo implements Forma {
    private $raio;

    public function __construct($raio) {
        $this->raio = $raio;
    }

    public function calcularArea() {
        return pi() * $this->raio * $this->raio;
    }
}

// Exemplo de uso:
$q = new Quadrado(4);
$r = new Retangulo(4, 6);
$c = new Circulo(3);
echo "Área do quadrado: " . $q->calcularArea() . "\n";
echo "Área do retângulo: " . $r->calcularArea() . "\n";
echo "Área do círculo: " . $c->calcularArea() . "\n";

// Exercício 2 – Animais e Sons
class Animal {
    public function fazerSom() {
        return "Som genérico de animal.";
    }
}

class Dog extends Animal {
    public function fazerSom() {
        return "Au au!";
    }
}

class Cat extends Animal {
    public function fazerSom() {
        return "Miau!";
    }
}

class Cow extends Animal {
    public function fazerSom() {
        return "Muuu!";
    }
}

// Teste interativo no terminal
echo "Escolha o animal (Cachorro, Gato, Vaca): ";
$animal = trim(fgets(STDIN));

switch (strtolower($animal)) {
    case "cachorro":
        $obj = new Dog();
        break;
    case "gato":
        $obj = new Cat();
        break;
    case "vaca":
        $obj = new Cow();
        break;
    default:
        $obj = null;
        break;
}

if ($obj) {
    echo $obj->fazerSom() . "\n";
} else {
    echo "Animal inválido!" . "\n";
}

//Exercício 3 – Meios de Transporte
abstract class Transporte {
    abstract public function mover();
}

class CarroTransporte extends Transporte {
    public function mover() {
        return "O carro está andando na estrada";
    }
}

class Barco extends Transporte {
    public function mover() {
        return "O barco está navegando no mar";
    }
}

class Aviao extends Transporte {
    public function mover() {
        return "O avião está voando no céu";
    }
}

class Elevador extends Transporte {
    public function mover() {
        return "O Elevador está correndo pelo prédio";
    }
}

// Teste interativo
echo "Escolha o transporte (Carro, Barco, Aviao, Elevador): ";
$transporte = trim(fgets(STDIN));

switch ($transporte) {
    case "Carro":
        $carro = new CarroTransporte();
        echo $carro->mover() . PHP_EOL;
        break;
    case "Barco":
        $barco = new Barco();
        echo $barco->mover() . PHP_EOL;
        break;
    case "Aviao":
        $aviao = new Aviao();
        echo $aviao->mover() . PHP_EOL;
        break;
    case "Elevador":
        $elevador = new Elevador();
        echo $elevador->mover() . PHP_EOL;
        break;
    default:
        echo "Transporte inválido!" . PHP_EOL;
        break;
}

//Exercício 4 – Notificações
class Email {
    public function enviar() {
        return "Enviando email...";
    }
}

class Sms {
    public function enviar() {
        return "Enviando SMS...";
    }
}

function notificar($meio) {
    if (method_exists($meio, 'enviar')) {
        echo $meio->enviar() . "\n";
    } else {
        echo "Objeto inválido para notificação." . "\n";
    }
}

// Teste interativo
echo "Escolha o meio de notificação (Email, Sms): ";
$notificacao = trim(fgets(STDIN));

if ($notificacao == "Email") {
    $email = new Email();
    notificar($email);
} elseif ($notificacao == "Sms") {
    $sms = new Sms();
    notificar($sms);
} else {
    echo "Meio de notificação inválido!" . "\n";
}

// Exercício 5 – Calculadora com Sobrecarga Simulada
class Calculadora {
    public function somar(...$numeros) {
        if (count($numeros) === 2 || count($numeros) === 3) {
            return array_sum($numeros);
        } else {
            return "Quantidade inválida de argumentos.";
        }
    }
}

// Exemplos de uso:
$calc = new Calculadora();
echo $calc->somar(2, 3) . "\n";      // 5
echo $calc->somar(1, 2, 3) . "\n";   // 6
echo $calc->somar(1) . "\n";         // Quantidade inválida de argumentos.


// Interfaces

interface Movel {
    public function mover();
}

interface Abastecivel {
    public function abastecer(int $quantidade);
}

interface Manutenivel {
    public function fazerManutencao();
}

// Classes

class Carro implements Movel, Abastecivel {
    private $modelo;
    private $ano;

    public function __construct(string $modelo, int $ano) {
        $this->modelo = $modelo;
        $this->ano = $ano;
    }

    public function mover() {
        echo "O carro {$this->modelo} ({$this->ano}) está se movimentando.\n";
    }

    public function abastecer(int $quantidade) {
        echo "Foram abastecidos {$quantidade} litros no carro {$this->modelo} ({$this->ano}).\n";
    }
}

class Bicicleta implements Movel, Manutenivel {
    public function mover() {
        echo "A bicicleta está pedalando.\n";
    }

    public function fazerManutencao() {
        echo "A bicicleta foi lubrificada.\n";
    }
}

class Onibus implements Movel, Abastecivel, Manutenivel {
    public function mover() {
        echo "O ônibus está transportando passageiros.\n";
    }

    public function abastecer(int $quantidade) {
        echo "Foram abastecidos {$quantidade} litros no ônibus.\n";
    }

    public function fazerManutencao() {
        echo "O ônibus passou por manutenção.\n";
    }
}

// Exemplo de uso

echo "--- Testando o Carro ---\n";
$carro = new Carro("Fusca", 1980);
$carro->mover();
$carro->abastecer(50);

echo "\n--- Testando a Bicicleta ---\n";
$bicicleta = new Bicicleta();
$bicicleta->mover();
$bicicleta->fazerManutencao();

echo "\n--- Testando o Ônibus ---\n";
$onibus = new Onibus();
$onibus->mover();
$onibus->abastecer(200);
$onibus->fazerManutencao();
?>