<?php
 class pessoa {
    private $nome;
    private $cpf;
    private $telefone;
    private $idade;
    private $email;
    private $senha;

    // crie o construtor para a classe pessoa.

    public function __construct($nome, $cpf, $telefone, $idade, $email, $senha) {
        $this->setNome($nome);
        $this->setcpf($cpf);
        $this->settelefone($telefone);
        $this->setIdade($idade);
        $this->email = $email;
        $this->senha = $senha;
    }

    // getter e setter para $nome

    // ucwords: deixa todas as iniciais em maiusculo 
   //strtolower: deixa todo o texto em minusculo

    public function setNome($nome) { //setter nome
       $this->nome= ucwords(strtolower
       ($nome));
    }

    public function getNome() { //getter nome
        return $this->nome;
    }

    // getter e setter para $cpf 
    // preg_replace: altera a estrutura de uma string 
    //pattern:/\D/ significa qualquer caracter que nao seja digito

    public function setcpf($cpf) {
        $this->cpf = preg_replace( '/\D/','', $cpf);
    }
    public function getcpf() { //getter cpf
        return $this->cpf
        ;
    }

    public function settelefone($telefone) {
        $this->telefone = preg_replace( '/\D/','', $telefone);
    }
    public function gettelefone() { //getter telefone
        return $this->telefone
        ;
    }

    //getter e setter para idade
    //(int)$variavel: garante valor inteiro
    //abs($variavel): garante numero positivo
    public function setIdade($idade){
        $this->idade = abs((int)$idade);
    }
    public function getIdade(){
        return $this->idade;
    }

    public function exibirInfor(){
        return "nome do aluno:  $this->nome \n cpf: $this->cpf \n telefone: $this->telefone\n idade: $this->idade\n email: $this->email\n senha: $this->senha";
    }

 }

 $aluno1 = new pessoa("BeAtriZ dos sAnToS", "123.456.789-00", "(19) 99999-9999", -20, "teste@gmail.com", "teste123");

 echo $aluno1->getNome();
