<?php

require_once 'Pessoa.php';

class Gafanhoto extends Pessoa {
    private $login;
    private $totalAssistido;

    public function __construct($nome, $idade, $sexo, $login) {
        parent::__construct($nome, $idade, $sexo);
        $this->login = $login;
        $this->totalAssistido = 0; // Inicializa o total assistido como 0
    }

    public function assistirVideo() {
        echo "{$this->getNome()} está assistindo um vídeo.\n";
        $this->totalAssistido++;
    }

    // Getters e Setters
    public function getLogin() {
        return $this->login;
    }

    public function setLogin($login) {
        $this->login = $login;
    }

    public function getTotalAssistido() {
        return $this->totalAssistido;
    }

    public function setTotalAssistido($totalAssistido) {
        $this->totalAssistido = $totalAssistido;
    }
}

?>