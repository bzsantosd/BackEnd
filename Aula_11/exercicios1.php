<!-- Exercícios para a extração de classes e métodos de cenários reais

Cenário 1 – Viagem pelo Mundo
Um grupo de turistas vai visitar o Japão, o Brasil e o Acre. Em cada lugar da
Terra, eles poderão comer comidas típicas e nadar em rios ou praias. -->

<?php
class Turista {
    public $pais;
    public function __construct($pais) {
        $this->pais = $pais;
    }
    public function visitar(){
        echo "Visitando $this->pais\n";
    }
}
class Lugares {
    public function comer(){
        echo "Comendo comida típica\n";
    }
    public function nadar(){
        echo "Nadando em rios ou praias\n";
    }
}


$turista1 = new Turista("Japão");
$turista1->visitar();
$Lugares1 = new Lugares();
$Lugares1->comer();
$Lugares1->nadar();
