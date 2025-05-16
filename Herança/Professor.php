<?php

require_once 'Pessoa.php';

class Professor extends Pessoa {
    private $especialidade;
    private $salario;

    public function __construct($nome, $idade, $sexo, $raça, $especialidade, $salario) {
        parent::__construct($nome, $idade, $sexo, $raça);
        $this->especialidade = $especialidade;
        $this->salario = $salario;
    }

    public function receberAumento($aumento) {
        $this->setSalario($this->getSalario() + $aumento);
    }

    public function apresentar() {
        echo "<p>Olá, meu nome é {$this->getNome()}, tenho {$this->getIdade()} anos, sou do sexo {$this->getSexo()}, minha raça é {$this->getRaça()}. Sou professor, minha especialidade é {$this->getEspecialidade()} e meu salário é R$ {$this->getSalario()}.</p>";
    }
    
    // Getters e Setters
    public function getEspecialidade() {
        return $this->especialidade;
    }
    
    public function setEspecialidade($especialidade) {
        $this->especialidade = $especialidade;
    }
    
    public function getSalario() {
        return $this->salario;
    }
    
    public function setSalario($salario) {
        $this->salario = $salario;
    }
}

?>