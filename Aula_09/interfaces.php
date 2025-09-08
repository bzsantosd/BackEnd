<?php
// Modificadores de acesso:
// Existem 3 tipos: Public, Private e Protected

// Public NomedoAtributo: métodos e atributos públicos
// Private NomedoAtributo: métodos e atributos privados para acesso somente dentro da classe. Utilizamos os getters e setters para acessa-los.
// Protected NomedoAtributo: métodos e atributos protegidos para acesso somente da classes e de suas classes filhas.

// Pacotes (Packages): Sintaxe logo no inicio do código, que atribui de onde os arquivos pertencem , ou seja, o caminho da pasta em que ele esta contido. Exemplo:
// namespace Aula 09;

// Caso tenham mais arquivos que formam o BackEnd de uma pasta WEB e possuem a mesma raiz, o namespace será o mesmo.

namespace Aula_09;

// Interfaces: É um recurso no qual garante que obrigatoriamente a classe tenha que construir algum método previamente determinado. Funciona como uma promessa ou contrato. Exemplo: Configuramos uma interface "Pagamento" que faz com que qualquer classe que a implemente, tenha que obrigatoriamente construir o método "pagar".

interface Pagamento { // Interface de contrato de pagamento 
    public function pagar($valor); // Determinando o método que terá que ser criado
}

class CartaoDeCredito implements Pagamento{ //Criando classe CartaoDeCredito com implementacao da Interface Pagamento 
    public function pagar($valor){
        echo "Pagamento realizado com cartão de crédito, valor: $valor\n"; // Criando o método obrigatório "pagar"
    }
}

class PIX implements Pagamento{ //Criando classe PIX com implementacao da Interface Pagamento 
    public function pagar($valor){
        echo "Pagamento realizado via PIX, valor: $valor\n";  // Criando o método obrigatório "pagar"
    }
} 

class dinheiroEspecie implements Pagamento{ 
    public function pagar($valor){
        $valor *= 0.90;
        echo "Pagamento realizado com dinheiroEspecie, valor: $valor\n";  
    }
}   


$cred = new CartaoDeCredito(); // Criando o objeto
  echo "Testando cartão de crédito para pagamento".$cred -> pagar(250);

$PIX = new PIX(); 
  $PIX -> pagar(65);

$dinheiro = new dinheiroEspecie(); 
  $dinheiro-> pagar(320);
 
interface Forma {
    public function calcularArea();
}

class Quadrado implements Forma {
    public function calcularArea() {
        return 1 * 1;
    }
}

class Circulo implements Forma {
    public function calcularArea() {
        $raio = 1;
        return pi() * ($raio * $raio);
    }
}

$quadrado = new Quadrado();
echo "Área do quadrado: " . $quadrado->calcularArea() . "\n";

$circulo = new Circulo();
echo "Área do círculo: " . $circulo->calcularArea() . "\n";

interface FormaGeometrica {
    public function calcularArea(): float;
}
class Pentagono implements Forma {
    private $lado;

    public function __construct($lado) {
        $this->lado = $lado;
    }

    public function calcularArea() {
        $area = (5 * $this->lado * $this->lado) / (4 * tan(pi() / 5));
        return $area;
    }
}

echo "Digite o valor do lado do pentágono: ";
$lado = trim(fgets(STDIN));
$pentagono = new Pentagono($lado);
echo "Área do pentágono: " . $pentagono->calcularArea() . "\n";


class Hexagono implements Forma {
    private $lado;

    public function __construct($lado) {
        $this->lado = $lado;
    }

    public function calcularArea() {
        // Área do hexágono regular: (3 * sqrt(3) * lado^2) / 2
        return (3 * sqrt(3) * pow($this->lado, 2)) / 2;
    }   
}

echo "Digite o valor do lado do hexágono: ";
$ladoHex = trim(fgets(STDIN));
$hexagono = new Hexagono($ladoHex);
echo "Área do hexágono: " . $hexagono->calcularArea() . "\n";