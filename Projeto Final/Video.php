<?php

require_once 'AcoesVideo.php';

class Video implements AcoesVideo {
    private $titulo;
    private $avaliacao;
    private $visualizacoes;
    private $curtidas;
    private $reproduzindo;

    public function __construct($titulo) {
        $this->titulo = $titulo;
        $this->avaliacao = 1;
        $this->visualizacoes = 0;
        $this->curtidas = 0;
        $this->reproduzindo = false;
    }

    public function play() {
        echo "Você está assistindo: {$this->titulo}\n";
        $this->setVisualizacoes($this->getVisualizacoes() + 1);
        $this->setReproduzindo(true);
    }

    public function pause() {
        echo "Video pausado: {$this->titulo}\n";
        $this->setReproduzindo(false);
    }

    public function like() {
        echo "{$this->titulo} foi adicionado na sua lista de favoritos\n";
        $this->setCurtidas($this->getCurtidas() + 1);
    }

    public function share() {
        echo "{$this->titulo} Foi compartilhado\n";
    }

    // Getters and Setters
    public function getTitulo() {
        return $this->titulo;
    }
    public function setTitulo($titulo) {
        $this->titulo = $titulo;
    }
    public function getAvaliacao() {
        return $this->avaliacao;
    }
    public function setAvaliacao($avaliacao) {
        if ($avaliacao >= 0 && $avaliacao <= 5) {
            $this->avaliacao = $avaliacao;
        } else {
            echo "Avaliação invalida. Avaliação deve estar entre 1 e 5.\n";
        }
    }
    public function getVisualizacoes() {
        return $this->visualizacoes;
    }
    public function setVisualizacoes($visualizacoes) {
        $this->visualizacoes = $visualizacoes;
    }
    public function getCurtidas() {
        return $this->curtidas;
    }
    public function setCurtidas($curtidas) {
        $this->curtidas = $curtidas;
    }
    public function isReproduzindo() {
        return $this->reproduzindo;
    }
    public function setReproduzindo($reproduzindo) {
        $this->reproduzindo = $reproduzindo;
    }
}

?>