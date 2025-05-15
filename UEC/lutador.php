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
        $conn = new mysqli("localhost", "root", "", "lutadoresDB");
        if ($conn->connect_error) {
            die("Conexão falhou: " . $conn->connect_error);
        }
        $stmt = $conn->prepare("UPDATE lutadores SET vitorias = ? WHERE nome = ?");
        $stmt->bind_param("is", $vitorias, $this->nome);
        $stmt->execute();
        $stmt->close();
        $conn->close();
    }
    public function getDerrotas(){
        return $this->derrotas;
    }
    public function setDerrotas($derrotas){
        $this->derrotas = $derrotas;
        $conn = new mysqli("localhost", "root", "", "lutadoresDB");
        if ($conn->connect_error) {
            die("Conexão falhou: " . $conn->connect_error);
        }
        $stmt = $conn->prepare("UPDATE lutadores SET derrotas = ? WHERE nome = ?");
        $stmt->bind_param("is", $derrotas, $this->nome);
        $stmt->execute();
        $stmt->close();
        $conn->close();
    }
    public function getEmpates(){
        return $this->empates;
    }
    public function setEmpates($empates){
        $this->empates = $empates;
        $conn = new mysqli("localhost", "root", "", "lutadoresDB");
        if ($conn->connect_error) {
            die("Conexão falhou: " . $conn->connect_error);
        }
        $stmt = $conn->prepare("UPDATE lutadores SET empates = ? WHERE nome = ?");
        $stmt->bind_param("is", $empates, $this->nome);
        $stmt->execute();
        $stmt->close();
        $conn->close();
    }


    // Métodos
    public function apresentar(){
        echo "Lutador: {$this->getNome()}<br>";
        echo "Nacionalidade: {$this->getNacionalidade()}<br>";
        echo "Idade: {$this->getIdade()} anos<br>";
        echo "Altura: {$this->getAltura()} m<br>";
        echo "Peso: {$this->getPeso()} kg<br>";
        echo "Categoria: {$this->getCategoria()}<br>";
        echo "Vitorias: {$this->getVitorias()}<br>";
        echo "Derrotas: {$this->getDerrotas()}<br>";
        echo "Empates: {$this->getEmpates()}<br>";
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