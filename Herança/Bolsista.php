<?php

require_once 'Aluno.php';

class Bolsista extends Aluno {
    private $bolsa;

    public function __construct($nome, $idade, $sexo, $raça, $matricula, $curso, $bolsa) {
        parent::__construct($nome, $idade, $sexo, $raça, $matricula, $curso);
        $this->bolsa = $bolsa;
    }

    public function apresentar() {
        echo "<p>Olá, meu nome é {$this->getNome()}, tenho {$this->getIdade()} anos, sou do sexo {$this->getSexo()}, minha raça é {$this->getRaça()}. Sou aluno bolsista na escola, minha matrícula é {$this->getMatricula()} e estou cursando {$this->getCurso()}. Minha bolsa é de R$ {$this->getBolsa()}.</p>";
    }
    
    // Getters e Setters
    public function getBolsa() {
        return $this->bolsa;
    }
    
    public function setBolsa($bolsa) {
        $this->bolsa = $bolsa;
    }
}