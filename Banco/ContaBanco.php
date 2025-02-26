<?php
    class ContaBanco{
        public $numConta;
        protected $tipo;
        private $dono;
        private $saldo;
        private $status;

        public function __construct($numConta,$tipo,$dono,$saldo,){
            $this->numConta = $numConta;
            $this->dono = $dono;
            $this->saldo = $saldo;
            $this->abrirConta($tipo);
        }

        public function abrirConta($tipo){
            $this->setTipo($tipo);
            $this->setStatus(true);
            if($tipo == "CC"){
                $this->setSaldo($this->getSaldo()+50);
            } elseif ($tipo == "CP"){
                $this->setSaldo($this->getSaldo()+150);
            }
        }

        public function fecharConta(){
            if($this->getSaldo()>0){
                echo "conta ainda tem dinheiro. redirecionando para saque";
                $this->sacar($this->getSaldo());
                echo "valor foi sacado, seguindo para fechar conta";
                $this->fecharConta();
            }elseif($this->getSaldo()<0){
                echo "conta está em debito. impossivel encerrar no momento";
            }else{
                $this->setStatus(false);
                echo "conta encerrada";
            }
        }

        public function depositar($valor){
            if($this->getStatus()){
                $this->setSaldo($this->getSaldo()+$valor);
            }else{
                echo "conta fechada. Impossivel depositar";
            }
        }
        public function sacar($valor){
            if($this->getStatus()){
                if($this->getSaldo()<$valor){
                    echo "saldo insuficiente";
                }else{
                    echo"Sacando " .$valor. " reais";
                    $this->setSaldo($this->getSaldo()-$valor);
                }
            }else{
                echo "conta fechada. Impossivel sacar";
            }
        }

        public function pagarMensalidade(){
            if($this->getTipo()=="CC"){
                $v=20;
            }elseif($this->getTipo()=="CP"){
                $v=0;
            }

            if($this->getStatus()){
                $this->setSaldo($this->getSaldo()-$v);
            }else{
                echo "conta não está ativa. Não há cobrança de taxa";
            }
        }


        /**
         * Get the value of numConta
         */ 
        public function getNumConta()
        {
                return $this->numConta;
        }

        /**
         * Set the value of numConta
         *
         * @return  self
         */ 
        public function setNumConta($numConta)
        {
                $this->numConta = $numConta;

                return $this;
        }

        /**
         * Get the value of tipo
         */ 
        public function getTipo()
        {
                return $this->tipo;
        }

        /**
         * Set the value of tipo
         *
         * @return  self
         */ 
        public function setTipo($tipo)
        {
                $this->tipo = $tipo;

                return $this;
        }

        /**
         * Get the value of dono
         */ 
        public function getDono()
        {
                return $this->dono;
        }

        /**
         * Set the value of dono
         *
         * @return  self
         */ 
        public function setDono($dono)
        {
                $this->dono = $dono;

                return $this;
        }

        /**
         * Get the value of saldo
         */ 
        public function getSaldo()
        {
                return $this->saldo;
        }

        /**
         * Set the value of saldo
         *
         * @return  self
         */ 
        public function setSaldo($saldo)
        {
                $this->saldo = $saldo;

                return $this;
        }

        /**
         * Get the value of status
         */ 
        public function getStatus()
        {
                return $this->status;
        }

        /**
         * Set the value of status
         *
         * @return  self
         */ 
        public function setStatus($status)
        {
                $this->status = $status;

                return $this;
        }
    }
?>