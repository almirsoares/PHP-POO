<?php
    class Caneta{
        public $modelo;
        public $cor;
        private $ponta;
        protected $carga;
        protected $tampada = true;

        public function raciscar(){
            if($this->tampada){
                $this->destampar();
                echo "<p>caneta destampada</p>";
            }
            echo "<p>Estou Rabiscando</p>";
            $this->tampar();
            echo "<p>caneta tampada</p>";
        }

        private function tampar(){
            $this->tampada = true;
        }

        private function destampar (){
            $this->tampada = false;
        }
    }        
?>