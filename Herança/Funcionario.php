<?php

require_once 'Pessoa.php';

class Funcionario extends Pessoa {
    
    private $setor;
    private $trabalhando;
    private $salario;


    public function __construct($nome, $idade, $sexo, $raça, $setor, $trabalhando, $salario) {
        parent::__construct($nome, $idade, $sexo, $raça);
        $this->setor = $setor;
        $this->trabalhando = $trabalhando;
    }

    public function apresentar() {
        echo "<p>Olá, meu nome é {$this->getNome()}, tenho {$this->getIdade()} anos, sou do sexo {$this->getSexo()}, minha raça é {$this->getRaça()}. Sou funcionário da empresa, trabalho no setor {$this->getSetor()} e estou " . ($this->trabalhando ? "trabalhando" : "de férias") . ".</p>";
    }

    public function mudarSetor($novoSetor) {
        $this->setSetor($novoSetor);
    }

    public function receberAumento($aumento) {
        $this->setSalario($this->getSalario() + $aumento);
    }
    

    // Getters e Setters
    public function getSetor() {
        return $this->setor;
    }
    
    public function setSetor($setor) {
        $this->setor = $setor;
    }
    
    public function getTrabalho() {
        return $this->trabalhando;
    }
    
    public function setTrabalhando($trabalhando) {
        $this->trabalhando = $trabalhando;
    }
    public function getSalario() {
        return $this->salario;
    }
    public function setSalario($salario) {
        $this->salario = $salario;
    }
}