<?php
// 1. Criação básica
class carro {
    private string $marca;
    private string $modelo;

    public function __construct($marca, $modelo) {
        $this->setMarca($marca);
        $this->setModelo($modelo);
    }
    public function setMarca($marca) {
        $this->marca = $marca;
    }
    public function getMarca() {
        return $this->marca;
}
    public function setModelo($modelo) {
        $this->modelo = $modelo;
    }
    public function getModelo() {
        return $this->modelo;
    }
}
$car1 = new carro("Chevrolet", "corsa");
echo $car1->getMarca();
?>

<?php
// 2. Pessoa com atributos
class Pessoa {
    private $nome;
    private $idade;
    private $email;

    public function __construct(string $nome, int $idade, string $email) {
        $this->setNome($nome);
        $this->setIdade($idade);
        $this->setEmail($email);
    }

    public function setNome(string $nome) {
        $this->nome = $nome;
    }

    public function getNome(): string {
        return $this->nome;
    }

    public function setIdade(int $idade) {
        if ($idade >= 0) {
            $this->idade = $idade;
        } else {
            $this->idade = 0;
        }
    }

    public function getIdade(): int {
        return $this->idade;
    }

    public function setEmail(string $email) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->email = $email;
        } else {
            $this->email = "";
        }
    }

    public function getEmail(): string {
        return $this->email;
    }
}

$pessoa = new Pessoa("Beatriz", "20", "bdossantos@gmail.com");
echo "O nome é " . $pessoa->getNome() . ", tem " . $pessoa->getIdade() . " anos e o email é " . $pessoa->getEmail() . ".\n";
?>

<?php
// 3. Validação em setter
class Aluno {
    private $nome;
    private $nota;

    public function __construct($nome, $nota) {
        $this->setNome($nome);
        $this->setNota($nota);
    }
    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setNota($nota) {
        if ($nota >= 0 && $nota <= 10) {
            $this->nota = $nota;
        } else {
            $this->nota = 0;
        }
    }

    public function getNota() {
        return $this->nota;
    }
}

// Teste Aluno
$aluno1 = new Aluno("Beatriz",8.5);
$aluno2 = new Aluno("Luiza",12 );
echo "Aluno: " . $aluno1->getNome() . ", Nota: " . $aluno1->getNota() . "\n";
echo "Aluno: " . $aluno2->getNome() . ", Nota: " . $aluno2->getNota() . "\n";
?>

<?php
// 4. Encapsulamento de Produto
class Produto {
    private $nome;
    private $preco;
    private $estoque;

    public function __construct($nome, $preco, $estoque) {
        $this->setNome($nome);
        $this->setPreco($preco);
        $this->setEstoque($estoque);
    }
    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setPreco($preco) {
        $this->preco = $preco;
    }

    public function getPreco() {
        return $this->preco;
    }

    public function setEstoque($estoque) {
        $this->estoque = $estoque;
    }

    public function getEstoque() {
        return $this->estoque;
    }
}

// Teste Produto
$produto = new Produto("Notebook", 3500.00, 15);
echo "O produto " . $produto->getNome() . " custa R$ " . number_format($produto->getPreco(), 2, ',', '.') . " e possui " . $produto->getEstoque() . " unidades em estoque.";
?>

<?php
// 5. Alteração de dados
class Funcionario {
    private $nome;
    private $salario;

    public function __construct($nome, $salario) {
        $this->setNome($nome) ;
        $this->setSalario($salario);
    }
    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setSalario($salario) {
        $this->salario = $salario;
    }

    public function getSalario() {
        return $this->salario;
    }
}

// Teste Funcionario
$funcionario = new Funcionario("Luiza", 2500.00);

echo "Funcionário: " . $funcionario->getNome() . ", Salário: R$ " . number_format($funcionario->getSalario(), 2, ',', '.') . "\n";

$funcionario->setNome("Beatriz");
$funcionario->setSalario(3200.00);

echo "Funcionário: " . $funcionario->getNome() . ", Salário: R$ " . number_format($funcionario->getSalario(), 2, ',', '.') . "\n";
?>

 
