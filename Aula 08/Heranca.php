<?php
class animal{
    private $especie;
    private $habitat;
    private $sexo;
    private $alimentacao;

    public function __construct($especie, $habitat, $sexo, $alimentacao) {
        $this ->setEspecie($especie);
        $this ->setHabitat($habitat);
        $this ->setSexo($sexo);
        $this ->setAlimentacao($alimentacao);
    }

    public function getEspecie() {
        return $this->especie;
}
    public function setEspecie($especie) {
        $this->especie = $especie;
    }

     public function getHabitat() {
        return $this->habitat;
}
    public function setHabitat($habitat) {
        $this->habitat = $habitat;
    }
    
     public function getSexo() {
        return $this->sexo;
}
    public function setSexo($sexo) {
        $this->sexo = $sexo;
    }
    
     public function getAlimentacao() {
        return $this->alimentacao;
}
    public function setAlimentacao($alimentacao) {
        $this->alimentacao = $alimentacao;
    }
}
class Cachorro extends animal {
    private $raca;

    public function __construct($especie, $habitat, $sexo, $alimentacao, $raca) {
       parent::__construct($especie, $habitat, $sexo, $alimentacao);

       $this->setRaca($raca);
    }

    public function getRaca() {
         return $this->raca;
    }
    public function setRaca($raca) {
         $this->raca = $raca;
    }
}

class pangolim extends animal {
    private $N_escamas;

    public function __construct($especie, $habitat, $sexo, $alimentacao, $N_escamas) {
       parent::__construct($especie, $habitat, $sexo, $alimentacao);

       $this->N_escamas = $N_escamas;
    }
}

class macaco extends animal {

    private $tempo_dormindo;
    private $qtde_bananas_dia;
    public function __construct($especie, $habitat, $sexo, $alimentacao, $tempo_dormindo, $qtde_bananas_dia) {
       parent::__construct($especie, $habitat, $sexo, $alimentacao);

       $this->tempo_dormindo = $tempo_dormindo;
       $this->qtde_bananas_dia = $qtde_bananas_dia;
}
}


class gato extends animal {
    private $tipo_ronronamento;

    public function __construct($especie, $habitat, $sexo, $alimentacao, $tipo_ronronamento) {
       parent::__construct($especie, $habitat, $sexo, $alimentacao);

       $this->tipo_ronronamento = $tipo_ronronamento;
    }

    
}