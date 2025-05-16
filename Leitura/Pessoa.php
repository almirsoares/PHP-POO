<?php

class Pessoa {

    private $nome;
    private $idade;
    private $sexo;
    private $raça;

    public function __construct($nome, $idade, $sexo, $raça)
    {
        $this->nome = $nome;
        $this->idade = $idade;
        $this->sexo = $sexo;
        $this->raça = $raça;
    }

    // Getters e Setters
    public function getNome()
    {
        return $this->nome;
    }
    public function setNome($nome)
    {
        $this->nome = $nome;
    }
    public function getIdade()
    {
        return $this->idade;
    }
    public function setIdade($idade)
    {
        $this->idade = $idade;
    }
    public function getSexo()
    {
        return $this->sexo;
    }
    public function setSexo($sexo)
    {
        $this->sexo = $sexo;
    }
    public function getRaça()
    {
        return $this->raça;
    }
    public function setRaça($raça)
    {
        $this->raça = $raça;
    }

    public function fazerAniversario()
    {
        $this->setIdade($this->getIdade() + 1);
    }
}
  
    