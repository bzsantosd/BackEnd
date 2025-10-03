<!-- Exercícios para a extração de classes e métodos de cenários reais

Cenário 2 – Heróis e Personagens
O Batman, o Superman e o Homem-Aranha estão em uma missão. Eles precisam
fazer treinamentos especiais no Cotil e, depois, irão ao shopping para doar
brinquedos às crianças. -->

<?php
class Heróis {
    public $missão;
    public function __construct($missão) {
        $this->missão = $missão;
    }
    public function treinar(){
        echo "Foi Treinamento especial no $this->missão\n";
    }
}
class Lugar {

    public $ambiente;
    public function __construct($ambiente) {
        $this->ambiente = $ambiente;
    }

    public function ação(){
        echo "depois ao $this->ambiente para doar brinquedos às crianças\n";
    }
    
}


$missão = new Heróis("Cotil");
$missão->treinar();
$Lugar = new Lugar("shopping");
$Lugar->ação();

