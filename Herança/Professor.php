<?php

require_once 'Funcionario.php';

class Professor extends Funcionario {

    private $especialidade;
    private $nivel;

    public function __construct($nome, $idade, $sexo, $raça, $setor, $trabalhando, $salario, $especialidade, $nivel) {
        parent::__construct($nome, $idade, $sexo, $raça, $setor, $trabalhando, $salario);
        $this->especialidade = $especialidade;
        $this->nivel = $nivel;
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

    public function getNivel() {
        return $this->nivel;
    }

    public function setNivel($nivel) {
        $this->nivel = $nivel;
    }
}

?>