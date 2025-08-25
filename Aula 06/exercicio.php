<?php
//crie uma classe "moto" com ao menos 4 atributos sem a utiliozação de um construtor 

class moto {
    public $marca;
    public $modelo;
    public $ano;
    public $cor;

    public function atualizarAno($novo_ano) {
        $this->ano = $novo_ano;
        return $this->ano; 
    }
}

// crie ao menos 3 objetos para essa classe

$objeto1 = new moto();
$objeto1->marca = "Honda";
$objeto1->modelo = "CB 500";
$objeto1->ano = "2021";
$objeto1->cor = "Vermelha";

$objeto2 = new moto();
$objeto2->marca = "Yamaha";
$objeto2->modelo = "Fazer 250";
$objeto2->ano = "2020";
$objeto2->cor = "Preta";
$objeto3 = new moto();

$objeto3->marca = "Yamaha";
$objeto3->modelo = "Fluo 125";
$objeto3->ano = "2025";
$objeto3->cor = "Marrom";

?>

// crie 3 construtores sendo:
// 1 construtor: Recebe 3 parametros sendo eles: $dia, $mes, $ano;
public function __construct($dia, $mes, $ano) {
        $this-> dia = $dia;
        $this-> mes = $mes;
        $this-> ano = $ano;
    }

// 2 construtor: Recebe 7 paramentros sendo eles: $nome, $idade, $cpf, $telefone, $endereco, $estado_civi e $sexo;
public function __construct($nome, $idade, $cpf, $telefone, $endereco, $estado_civi e $sexo) {
        $this-> nome = $nome;
        $this-> idade = $idade;
        $this-> cpf = $cpf;
        $this-> telefone = $telefone;
        $this-> endereco = $endereco;
        $this-> estado_civil = $estado_civil;
        $this-> sexo = $sexo;
    }

// 3 construtor: Recebe 5 parametros sendo eles: $marca, $nome, $categoria, $data_fabricacao e $data_venda;
public function __construct($marca, $nome, $categoria, $data_fabricacao e $data_venda) {
        $this-> marca = $marca;
        $this-> nome = $nome;
        $this-> categoria = $categoria;
        $this-> data_fabricacao = $data_fabricacao;
        $this-> data_venda = $data_venda;
    }

//Crie um método para a classe 'Cachorro' chamado de 'latir', no qual exibe uma
mensagem "O cachorro $nome está latindo!"

// Crie outro método para a classe 'Cachorro' chamado de 'marcar território', no qual
exibe uma mensagem "O cachorro $nome da raça $raça está marcando território".

>?php

class Cachorro {
    public $nome;
    public $idade;
    public $raca;
    public $castrado;
    public $sexo;

    public function __construct($nome, $idade, $raca, $castrado, $sexo) {
        $this->nome = $nome;
        $this->idade = $idade;
        $this->raca = $raca;
        $this->castrado = $castrado;
        $this->sexo = $sexo;
    }

    public function latir(): void { // EX5
        echo "O cachorro " . $this->nome . " está latindo!\n";
    }   

    public function marcarTerritorio(): void { //EX6
        echo "O cachorro " . $this->nome . " da raça " . $this->raca . " está marcando território.\n";
    }
}

$cachorro1 = new Cachorro("Mel", 3, "Shih tzu", false, "Fêmea");
$cachorro1->latir();
$cachorro1->marcarTerritorio();
$cachorro2 = new Cachorro("Max", 2, "Golden Retriever", true, "Macho");
$cachorro2->latir();
$cachorro2->marcarTerritorio();
?>

//Crie um método para a classe 'Usuários' chamado de 'Testando Reservista' no qual
testa se o usuário é homem e caso sim exiba uma mensagem "Apresente seu
certificado de reservista do tiro de guerra!", caso não, exiba uma mensagem "Tudo
certo".

//Crie um método para a classe 'Usuários' chamado de 'Casamento' que teste se o
estado civil é igual a 'Casado' e caso sim exiba a mensagem "Parabéns pelo seu
casamento de $anos_casado anos!" e caso não, exiba uma mensagem de "oloco". O
valor de anos de casamento será informado na hora de chamar o método para o
objeto em específico.

<?php
class Usuario {
    public $nome;
    public $cpf;
    public $sexo;
    public $email;
    public $estadoCivil;
    public $cidade;
    public $estado;
    public $endereco;
    public $cep;

    public function __construct($nome, $cpf, $sexo, $email, $estadoCivil, $cidade, $estado, $endereco, $cep) {
        $this->nome = $nome;
        $this->cpf = $cpf;
        $this->sexo = $sexo;
        $this->email = $email;
        $this->estadoCivil = $estadoCivil;
        $this->cidade = $cidade;
        $this->estado = $estado;
        $this->endereco = $endereco;
        $this->cep = $cep;
    }

     public function exibirdados(): void{
        echo "\nNome: " . $this->nome . "\n";
        echo "CPF: " . $this->cpf . "\n";
        echo "Sexo: " . $this->sexo . "\n";
        echo "Email: " . $this->email . "\n";
        echo "Estado Civil: " . $this->estadoCivil . "\n";
        echo "Cidade: " . $this->cidade . "\n";
        echo "Estado: " . $this->estado . "\n";
        echo "Endereço: " . $this->endereco . "\n";
        echo "CEP: " . $this->cep . "\n\n";
    }
    public function testandoReservista(): void { // EX7
        if ($this->sexo === "Masculino") {
            echo "Apresente seu certificado de reservista do tiro de guerra!\n";
        } else {
            echo "Tudo certo.\n";
        }
    }
    public function casamento($anos_casado=0): void { // EX8
        if ($this->estadoCivil === "Casado") {
            echo "Parabéns pelo seu casamento de " . $anos_casado . " anos!\n";
        } else {
            echo "Oloco.\n";
        }  
    }
}

$usuario1 = new Usuario(
    "Josenildo Afonso Souza",
    "100.200.300-40",
    "Masculino",
    "josenewdo.souza@gmail.com",
    "Casado",
    "Xique-Xique",
    "Bahia",
    "Rua da amizade, 99",
    "40123-98"
);
$usuario1 ->testandoReservista();
$usuario1 ->casamento(25);

$usuario2 = new Usuario(
    "Valentina Passos Scherrer",
    "070.070.060-70",
    "Feminino",
    "scherrer.valen@outlook.com",
    "Divorciada",
    "Iracemápolis",
    "São Paulo",
    "Avenida da saudade, 1942",
    "23456-24"
);
$usuario2 ->testandoReservista();
$usuario2 ->casamento();

$usuario3 = new Usuario(
    "Claudio Braz Nepumoceno",
    "575.575.242-32",
    "Masculino",
    "Clauclau.nepumoceno@gmail.com",
    "Solteiro",
    "Piripiri",
    "Piauí",
    "Estrada 3, 33",
    "12345-99"
);
$usuario3->testandoReservista();
$usuario3 ->casamento();

?>