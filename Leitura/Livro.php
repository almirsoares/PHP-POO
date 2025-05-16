<?php

require_once 'Publicacao.php';

class Livro implements Publicacao {
    private $titulo;
    private $autor;
    private $totPaginas;
    private $paginaAtual;
    private $aberto;
    private $leitor;

    public function __construct($titulo, $autor, $totPaginas) {
        $this->titulo = $titulo;
        $this->autor = $autor;
        $this->totPaginas = $totPaginas;
        $this->paginaAtual = 0;
        $this->aberto = false;
        $this->leitor = null;
    }

    public function emprestar($leitor) {
        $this->setLeitor($leitor);
    }

    public function detalhes() {
        echo "<p>Livro: {$this->getTitulo()}<br>";
        echo "Autor: {$this->getAutor()}<br>";
        echo "Total de Páginas: {$this->getTotPaginas()}<br>";
        echo "Página Atual: {$this->getPaginaAtual()}<br>";
        echo "Aberto: " . ($this->getAberto() ? 'Sim' : 'Não') . "<br>";
        echo "Leitor: {$this->getLeitor()}</p>";
    }

    // Getters e Setters
    public function getTitulo() {
        return $this->titulo;
    }
    public function setTitulo($titulo) {
        $this->titulo = $titulo;
    }
    public function getAutor() {
        return $this->autor;
    }
    public function setAutor($autor) {
        $this->autor = $autor;
    }
    public function getTotPaginas() {
        return $this->totPaginas;
    }
    public function setTotPaginas($totPaginas) {
        $this->totPaginas = $totPaginas;
    }
    public function getPaginaAtual() {
        return $this->paginaAtual;
    }
    public function setPaginaAtual($paginaAtual) {
        $this->paginaAtual = $paginaAtual;
    }
    public function getAberto() {
        return $this->aberto;
    }
    public function setAberto($aberto) {
        $this->aberto = $aberto;
    }
    public function getLeitor() {
        return $this->leitor;
    }
    public function setLeitor($leitor) {
        $this->leitor = $leitor;
    }


    public function abrir() {
        $this->setAberto(true);
    }

    public function fechar() {
        $this->setAberto(false);
    }

    public function folhear($pagina) {
        if($this->getAberto() == false) {
            $this->abrir();
        }
        if ($pagina > $this->getTotPaginas()) {
            $this->setPaginaAtual(0);
        } else {
            $this->setPaginaAtual($pagina);
        }
    }

    public function avancarPagina() {
        if ($this->getAberto() == false) {
            $this->abrir();
        }
        if ($this->getPaginaAtual() < $this->getTotPaginas()) {
            $this->setPaginaAtual($this->getPaginaAtual() + 1);
        } else {
            $this->setPaginaAtual(0);
            echo "Você já estava na última página.<br>";
            echo "Livro fechado.<br>";
            $this->fechar();
        }
    }

    public function voltarPagina() {
        if ($this->getAberto() == false) {
            $this->abrir();
        }
        if ($this->getPaginaAtual() > 0) {
            $this->setPaginaAtual($this->getPaginaAtual() - 1);
        } else {
            $this->setPaginaAtual(0);
            echo "Você já estava na primeira página.<br>";
            echo "Livro fechado.<br>";
            $this->fechar();
        }
    }

}

