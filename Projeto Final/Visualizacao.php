<?php

require_once 'Gafanhoto.php';
require_once 'Video.php';

class Visualizacao {

    private $espectador;
    private $video;

    public function __construct($espectador, $video) {
        $this->espectador = $espectador;
        $this->video = $video;
        $this->video->setVisualizacoes($this->video->getVisualizacoes() + 1);
        $this->espectador->assistirVideo();
    }

    // getodders e setters
    public function getEspectador() {
        return $this->espectador;
    }
    public function setEspectador($espectador) {
        $this->espectador = $espectador;
    }
    public function getVideo() {
        return $this->video;
    }
    public function setVideo($video) {
        $this->video = $video;
    }
}

?>