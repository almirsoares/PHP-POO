<?php
    class Caneta{
        public $modelo;
        public $cor;
        private $ponta;
        protected $carga;
        protected $tampada;

        public function __construct($modelo, $cor, $ponta, $carga, $tampada){
            $this->modelo = $modelo;
            $this->cor = $cor;
            $this->ponta = $ponta;
            $this->carga = $carga;
            $this->tampada = $tampada;
        }

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
        

        /**
         * Get the value of modelo
         */ 
        public function getModelo()
        {
                return $this->modelo;
        }

        /**
         * Set the value of modelo
         *
         * @return  self
         */ 
        public function setModelo($modelo)
        {
                $this->modelo = $modelo;

                return $this;
        }

        /**
         * Get the value of cor
         */ 
        public function getCor()
        {
                return $this->cor;
        }

        /**
         * Set the value of cor
         *
         * @return  self
         */ 
        public function setCor($cor)
        {
                $this->cor = $cor;

                return $this;
        }

        /**
         * Get the value of ponta
         */ 
        public function getPonta()
        {
                return $this->ponta;
        }

        /**
         * Set the value of ponta
         *
         * @return  self
         */ 
        public function setPonta($ponta)
        {
                $this->ponta = $ponta;

                return $this;
        }

        /**
         * Get the value of carga
         */ 
        public function getCarga()
        {
                return $this->carga;
        }

        /**
         * Set the value of carga
         *
         * @return  self
         */ 
        public function setCarga($carga)
        {
                $this->carga = $carga;

                return $this;
        }

        /**
         * Get the value of tampada
         */ 
        public function getTampada()
        {
                return $this->tampada;
        }

        /**
         * Set the value of tampada
         *
         * @return  self
         */ 
        public function setTampada($tampada)
        {
                $this->tampada = $tampada;

                return $this;
        }
    }        
?>