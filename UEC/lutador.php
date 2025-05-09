<?php

 class Lutador{
    private $nome;
    private $nacionalidade;
    private $idade;
    private $altura;
    private $peso;
    private $categoria;
    private $vitorias;
    private $derrotas;
    private $empates;

    public function __construct($nome, $nacionalidade, $idade, $altura, $peso, $vitorias, $derrotas, $empates){
        $this->nome = $nome;
        $this->nacionalidade = $nacionalidade;
        $this->idade = $idade;
        $this->altura = $altura;
        $this->peso = $peso;
        $this->setCategoria($peso);
        $this->vitorias = $vitorias;
        $this->derrotas = $derrotas;
        $this->empates = $empates;
    }
    
    // Getters e Setters
    public function getNome(){
        return $this->nome;
    }
    public function setNome($nome){
        $this->nome = $nome;
    }
    public function getNacionalidade(){
        return $this->nacionalidade;
    }
    public function setNacionalidade($nacionalidade){
        $this->nacionalidade = $nacionalidade;
    }
    public function getIdade(){
        return $this->idade;
    }
    public function setIdade($idade){
        $this->idade = $idade;
    }
    public function getAltura(){
        return $this->altura;
    }
    public function setAltura($altura){
        $this->altura = $altura;
    }
    public function getPeso(){
        return $this->peso;
    }
    public function setPeso($peso){
        $this->peso = $peso;
    }
    public function getCategoria(){
        return $this->categoria;
    }
    public function setCategoria($peso){
        if ($peso < 52.2){
            $this->categoria = "Invalido";
        } elseif ($peso <= 70.3){
            $this->categoria = "Leve";
        } elseif ($peso <= 83.9){
            $this->categoria = "Médio";
        } elseif ($peso <= 120.2){
            $this->categoria = "Pesado";
        } else {
            $this->categoria = "Invalido";
        }
    }

    public function getVitorias(){
        return $this->vitorias;
    }
    public function setVitorias($vitorias){
        $this->vitorias = $vitorias;
    }
    public function getDerrotas(){
        return $this->derrotas;
    }
    public function setDerrotas($derrotas){
        $this->derrotas = $derrotas;
    }
    public function getEmpates(){
        return $this->empates;
    }
    public function setEmpates($empates){
        $this->empates = $empates;
    }


    // Métodos
    public function apresentar(){
        echo "<br> Lutador: {$this->getNome()}";
        echo "<br> Nacionalidade: {$this->getNacionalidade()}";
        echo "<br> Idade: {$this->getIdade()} anos";
        echo "<br> Altura: {$this->getAltura()} m";
        echo "<br> Peso: {$this->getPeso()} kg";
        echo "<br> Categoria: {$this->getCategoria()}";
        echo "<br> Vitorias: {$this->getVitorias()}";
        echo "<br> Derrotas: {$this->getDerrotas()}";
        echo "<br> Empates: {$this->getEmpates()}";
    }

    public function status(){
        echo "<br> {$this->getNome()} é um lutador da categoria {$this->getCategoria()}";
        echo "<br> Vitorias: {$this->getVitorias()}";
        echo "<br> Derrotas: {$this->getDerrotas()}";
        echo "<br> Empates: {$this->getEmpates()}";
    }

    public function ganharLuta(){
        $this->setVitorias($this->getVitorias() + 1);
    }

    public function perderLuta(){
        $this->setDerrotas($this->getDerrotas() + 1);
    }

    public function empatarLuta(){
        $this->setEmpates($this->getEmpates() + 1);
    }
}