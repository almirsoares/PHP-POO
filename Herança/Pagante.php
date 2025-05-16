<?php

require_once 'Aluno.php';

class Pagante extends Aluno {

    private $pagamento;
    private $mensalidade;

    public function __construct($nome, $idade, $sexo, $raça, $matricula, $curso, $mensalidade) {
        parent::__construct($nome, $idade, $sexo, $raça, $matricula, $curso);
        $this->mensalidade = $mensalidade;
    }

    public function apresentar() {
        echo "<p>Olá, meu nome é {$this->getNome()}, tenho {$this->getIdade()} anos, sou do sexo {$this->getSexo()}, minha raça é {$this->getRaça()}. Sou aluno pagante na escola, minha matrícula é {$this->getMatricula()} e estou cursando {$this->getCurso()}. Meu pagamento é de R$ {$this->getPagamento()}.</p>";
    }
    
    public function pagar($valor) {
        if ($valor < $this->getMensalidade()) {
            $this->setPagamento(false);
            echo "<p>Valor insuficiente para o pagamento da mensalidade.</p>";
            return;
        } else if ($valor > $this->getMensalidade()) {
            $valor = $valor - $this->getMensalidade();
            $this->setPagamento(true);
            echo "<p>Pagamento realizado com sucesso!</p>";
            echo "<p>Valor maior que o necessário para o pagamento da mensalidade. Dar troco de {$valor} reais</p>";
            return;
        } else{
            $this->setPagamento(true);
            echo "<p>Pagamento realizado com sucesso!</p>";
            return;
        }
    }

    public function aumentarMensalidade($valor) {
        $this->setMensalidade($this->getMensalidade() + $valor);
        echo "<p>Mensalidade aumentada para R$ {$this->getMensalidade()}.</p>";
    }

    // Getters e Setters
    public function getMensalidade() {
        return $this->mensalidade;
    }
    
    public function setMensalidade($mensalidade) {
        $this->mensalidade = $mensalidade;
    }

    public function getPagamento() {
        return $this->pagamento;
    }

    public function setPagamento($pagamento) {
        $this->pagamento = $pagamento;
    }
}