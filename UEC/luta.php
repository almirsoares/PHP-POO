<?php

require_once 'lutador.php';

class luta{

    private $desafiado;
    private $desafiante;
    private $rounds;
    private $aprovada;
    private $resultado = 0;


    public function __construct()
    {
        
    }

    // Getters e Setters
    public function getDesafiado(){
        return $this->desafiado;
    }
    public function setDesafiado($desafiado){
        $this->desafiado = $desafiado;
    }
    public function getDesafiante(){
        return $this->desafiante;
    }
    public function setDesafiante($desafiante){
        $this->desafiante = $desafiante;
    }
    public function getRounds(){
        return $this->rounds;
    }
    public function setRounds($rounds){
        $this->rounds = $rounds;
    }
    public function getAprovada(){
        return $this->aprovada;
    }
    public function setAprovada($aprovada){
        $this->aprovada = $aprovada;
    }
    private function getResultado(){
        return $this->resultado;
    }
    private function setResultado($resultado){
        $this->resultado = $resultado;
    }

    public function marcarLuta($l1, $l2){
        if($l1->getCategoria() == $l2->getCategoria() && $l1 != $l2){
            $this->setAprovada(true);
            $this->setDesafiado($l1);
            $this->setDesafiante($l2);
        }else{
            $this->setAprovada(false);
            $this->setDesafiado($l1);
            $this->setDesafiante($l2);
        }
    }

    public function lutar(){


        if($this->getAprovada()){
            $this->getDesafiado()->apresentar();
            $this->getDesafiante()->apresentar();
            for($i = 0; $i < $this->getRounds(); $i++){
                echo "Round " . ($i + 1) . "<br>";
                $vencedor = rand(0, 2);
                switch($vencedor){
                    case 0:
                        echo "Round " . ($i+1) . " = Empate! <br>";
                        break;
                    case 1:
                        echo $this->getDesafiado()->getNome() . " venceu o round " . ($i + 1) . "<br>";
                        $this->setResultado($this->getResultado() + 1);
                        break;
                    case 2:
                        echo $this->getDesafiante()->getNome() . " venceu o round " . ($i + 1) . "<br>";
                        $this->setResultado($this->getResultado() - 1);
                        break;
                }
            }
            echo "<br> Resultado final: ";
            if($this->getResultado() > 0){
                echo $this->getDesafiado()->getNome() . " venceu a luta!";
                $this->getDesafiado()->ganharLuta();
                $this->getDesafiante()->perderLuta();
            }elseif($this->getResultado() < 0){
                echo $this->getDesafiante()->getNome() . " venceu a luta!";
                $this->getDesafiante()->ganharLuta();
                $this->getDesafiado()->perderLuta();
            }else{
                echo "Empate!";
                $this->getDesafiado()->empatarLuta();
                $this->getDesafiante()->empatarLuta();
            }
        }else{
            echo "Luta não aprovada!";
        }
    }

}

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Luta</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Luta</h1>
    <form method="post">
        <?php
        // Conexão com o banco de dados (ajuste os dados conforme necessário)
        $conn = new mysqli('localhost', 'root', '', 'lutadoresDB');
        if ($conn->connect_error) {
            die("Erro de conexão: " . $conn->connect_error);
        }

        // Busca os lutadores
        $sql = "SELECT id, nome FROM lutadores";
        $result = $conn->query($sql);
        ?>

        <label for="desafiado">Desafiado:</label>
        <select name="desafiado" id="desafiado" required>
            <option value="">Selecione</option>
            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<option value='{$row['id']}'>{$row['nome']}</option>";
                }
            }
            ?>
        </select>

        <label for="desafiante">Desafiante:</label>
        <select name="desafiante" id="desafiante" required>
            <option value="">Selecione</option>
            <?php
            // Reexecuta a consulta para o segundo select
            $result2 = $conn->query($sql);
            if ($result2->num_rows > 0) {
                while($row = $result2->fetch_assoc()) {
                    echo "<option value='{$row['id']}'>{$row['nome']}</option>";
                }
            }
            ?>
        </select>

        <label for="rounds">Rounds:</label>
        <input type="number" name="rounds" id="rounds" min="1" max="12" required>

        <?php $conn->close(); ?>
        <button type="submit">Marcar Luta</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $desafiado = $_POST['desafiado'];
        $desafiante = $_POST['desafiante'];
        $rounds = $_POST['rounds'];

        // Busca os lutadores selecionados
        $conn = new mysqli('localhost', 'root', '', 'lutadoresDB');
        if ($conn->connect_error) {
            die("Erro de conexão: " . $conn->connect_error);
        }
        $sql = "SELECT * FROM lutadores WHERE id IN ($desafiado, $desafiante)";
        $result = $conn->query($sql);
        $lutadores = [];
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $lutadores[] = new Lutador(
                    $row['nome'],
                    $row['nacionalidade'],
                    $row['idade'],
                    $row['altura'],
                    $row['peso'],
                    $row['vitorias'],
                    $row['derrotas'],
                    $row['empates']
                );
            }
        }
        $conn->close();

        // Verifica se os lutadores foram encontrados
        if (count($lutadores) < 2) {
            echo "Lutadores não encontrados.";
            exit;
        }
        $lutador1 = $lutadores[0];
        $lutador2 = $lutadores[1];

        $luta = new luta();
        $luta->setRounds($rounds);
        $luta->marcarLuta($lutador1, $lutador2);
        $luta->lutar();
    }
    ?>
</body>
</html>