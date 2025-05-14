<?php
// Importando a classe Lutador
require_once 'lutador.php';
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Lutadores</title>
</head>
<body>
    <h1>Lutadores</h1>
    <a href="luta.php">
        <button type="button">Lutar</button>
    </a>
    <form method="post" style="display:inline;">
        <button type="submit" name="listar">Listar Lutadores</button>
    </form>
    <a href="cadastrarLutadores.php">
        <button type="button">Cadastrar Lutador</button>
    </a>
    <?php
    // Só lista se for POST e o botão 'listar' foi clicado
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['listar'])) {
        // Conexão com o banco de dados (ajuste conforme necessário)
        $conn = new mysqli('localhost', 'root', '', 'lutadoresDB');
        if ($conn->connect_error) {
            die("Erro de conexão: " . $conn->connect_error);
        }

        // Consulta para buscar os lutadores
        $sql = "SELECT * FROM lutadores";
        $result = $conn->query($sql);

        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                // Supondo que o construtor de Lutador aceita os campos do banco
                $lutador = new Lutador(
                    $row['nome'],
                    $row['nacionalidade'],
                    $row['idade'],
                    $row['altura'],
                    $row['peso'],
                    $row['vitorias'],
                    $row['derrotas'],
                    $row['empates']
                );
                $lutador->apresentar();
                echo "<hr>";
            }
        } else {
            echo "Nenhum lutador encontrado.";
        }
        $conn->close();
    }
    ?>
</body>
</html>