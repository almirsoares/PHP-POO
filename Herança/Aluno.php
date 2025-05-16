<?php

require_once 'Pessoa.php';

class Aluno extends Pessoa {
    private $matricula;
    private $curso;

    public function __construct($nome, $idade, $sexo, $raça, $matricula, $curso) {
        parent::__construct($nome, $idade, $sexo, $raça);
        $this->matricula = $matricula;
        $this->curso = $curso;
    }

    function apresentar() {
        echo "<p>Olá, meu nome é {$this->getNome()}, tenho {$this->getIdade()} anos, sou do sexo {$this->getSexo()}, minha raça é {$this->getRaça()}. Sou aluno na escola, minha matrícula é {$this->getMatricula()} e estou cursando {$this->getCurso()}.</p>";
    }

    public function cancelarMatricula() {
        $this->setMatricula(null);
        $this->setCurso(null);
    }

    // Getters e Setters
    public function getMatricula() {
        return $this->matricula;
    }
    
    public function setMatricula($matricula) {
        $this->matricula = $matricula;
    }
    
    public function getCurso() {
        return $this->curso;
    }
    
    public function setCurso($curso) {
        $this->curso = $curso;
    }

}

?>