<?php

require_once 'controlador.php';
class ControleRemoto implements Controlador
{
    // Atributos
    private $ligado;
    private $volume;
    private $tocando;

    //construtor
    public function __construct()
    {
        $this->ligado = false;
        $this->volume = 50;
        $this->tocando = false;
    }

    // Getters e Setters
    public function getLigado()
    {
        return $this->ligado;
    }
    public function setLigado($ligado)
    {
        $this->ligado = $ligado;
    }

    public function getVolume()
    {
        return $this->volume;
    }
    public function setVolume($volume)
    {
        $this->volume = $volume;
    }

    public function getTocando()
    {
        return $this->tocando;
    }
    public function setTocando($tocando)
    {
        $this->tocando = $tocando;
    }

    // Métodos
    public function ligar()
    {
        $this->setLigado(true);
        $this->setTocando(true);
        echo "<br> Controle remoto ligado.";
    }

    public function desligar()
    {
        $this->setLigado(false);
        $this->setTocando(false);
        echo "<br> Controle remoto desligado.";
    }

    public function abrirMenu()
    {
        echo "<br> Está ligado? " . ($this->getLigado() ? "Sim" : "Não");
        echo "<br> Volume: " . $this->getVolume();
        echo "<br> Está tocando? " . ($this->getTocando() ? "Sim" : "Não");
        for ($i = 0; $i <= $this->getVolume(); $i += 10) {
            echo "|";
        }
    }

    public function fecharMenu()
    {
        echo "<br> Fechando menu...";
    }

    public function maisVolume()
    {
        if ($this->getLigado()) {
            $this->setVolume($this->getVolume() + 1);
            echo "<br> Volume: " . $this->getVolume();
        } else {
            echo "<br> Controle remoto desligado.";
        }
    }
    public function menosVolume()
    {
        if ($this->getLigado()) {
            $this->setVolume($this->getVolume() -1 );
            echo "<br> Volume: " . $this->getVolume();
        } else {
            echo "<br> Controle remoto desligado.";
        }
    }

    public function ligarMudo()
    {
        if ($this->getLigado() && $this->getVolume() > 0) {
            $this->setVolume(0);
        }
    }
    public function desligarMudo()
    {
        if ($this->getLigado() && $this->getVolume() == 0) {
            $this->setVolume(50);
        }
    }

    public function play()
    {
        if ($this->getLigado() && !$this->getTocando()) {
            $this->setTocando(true);
        }
    }

    public function pause()
    {
        if ($this->getLigado() && $this->getTocando()) {
            $this->setTocando(false);
        }
    }

}
