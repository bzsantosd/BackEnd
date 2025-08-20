<?php
class Carro {
    public $marca;
    public $modelo;
    public $ano;
    public $revisao;
    public $N_Donos;

    public function __construct($marca, $modelo, $ano, $revisao, $N_Donos) {
        $this->marca = $marca;
        $this->modelo = $modelo;
        $this->ano = $ano;
        $this->revisao = $revisao;
        $this->N_Donos = $N_Donos;
    }
}

$carro1 = new Carro("Porsche", "911", 2020, false, 3);
$carro2 = new Carro("Mitsubishi", "Lancer", 1945, true, 1);

// Exercicio: crie mais 4 novos objetos para a classe carro. 
$carro3 = new Carro("Ford", "EcoSport", 2021, false, 2);
$carro4 = new Carro("Hyundai", "Creta", 2025, true, 1);
$carro5 = new Carro("Chevrolet", "Corsa", 2004, false, 3);
$carro6 = new Carro("Fiat", "Palio", 2015, true, 2);
?>