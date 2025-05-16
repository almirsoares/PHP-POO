<?php 

require_once 'Funcionario.php';

class Adm extends Funcionario {

    private $cargo;

    public function __construct($nome, $idade, $sexo, $raça, $setor, $trabalhando, $salario, $cargo) {
        parent::__construct($nome, $idade, $sexo, $raça, $setor, $trabalhando, $salario);
        $this->cargo = $cargo;
    }

    public function apresentar() {
        echo "<p>Olá, meu nome é {$this->getNome()}, tenho {$this->getIdade()} anos, sou do sexo {$this->getSexo()}, minha raça é {$this->getRaça()}. Sou administrador e meu cargo é {$this->getCargo()} no setor {$this->getSetor()}.</p>";
    }
    
    public function mudarCargo($novoCargo) {
        $this->setCargo($novoCargo);
    }
    
    // Getters e Setters
    public function getCargo() {
        return $this->cargo;
    }
    
    public function setCargo($cargo) {
        $this->cargo = $cargo;
    }
}