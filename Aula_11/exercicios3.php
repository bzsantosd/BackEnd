<!-- Exercícios para a extração de classes e métodos de cenários reais

Cenário 3 – Fantasia e Destino
John Snow, Papai Smurf, Deadpool e Dexter estão em uma jornada. Durante o
caminho, começa a chover, e eles precisam amar uns aos outros para superar as
dificuldades. No fim da jornada, eles celebram ao comer juntos. -->

<?php
class Personagens {
    private $personagens;

    public function __construct(array $nomes) {
        $this->personagens = $nomes;
    }

    public function todos() {
        return implode(", ", $this->personagens);
    }
}

class Jornada {
    
    public function iniciarJornada() {
        $personagens = new Personagens(["John Snow", "Papai Smurf", "Deadpool", "Dexter"]);
        echo "{$personagens->todos()} iniciaram a jornada.\n";
    }

    public function chuvaESuperacao() {
        $personagens = new Personagens(["John Snow", "Papai Smurf", "Deadpool", "Dexter"]);
        $clima = new Clima();
        $clima->chuva();
        echo "{$personagens->todos()} se amam e superam as dificuldades juntos.\n";
    }

    public function celebrar() {
        $personagens = new Personagens(["John Snow", "Papai Smurf", "Deadpool", "Dexter"]);
        echo "No fim da jornada, {$personagens->todos()} celebram comendo juntos.\n";
    }
}

class Clima {

    public function chuva() {
        echo "Começou a chover!\n";
    }
}

$jornada = new Jornada();
$clima = new Clima();

$jornada->iniciarJornada();
$clima->chuva();
$jornada->celebrar();
