<!-- Exercícios para a extração de classes e métodos de cenários reais

Cenário 4 – Ciclo da Vida
Na Terra, pessoas podem engravidar, nascer, crescer, fazer escolhas e até doar
sangue para ajudar outras. 

COMPOSIÇÃO-->

<?php 
    class Vida  {

        public function engravidar(){
            echo "Engravidou\n";
        }
        public function nascer( ) {
            echo "Nascer\n";
        }
        public function crescer() {
            echo "Crescer\n";
        }
        public function fazerEscolhas() {
            echo "Fazendo escolhas\n";
        }
    }
    class Sangue {
        public function doar() {
            echo "Doando sangue para ajudar outras pessoas\n";
        }
    }
?>


