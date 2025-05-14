<?php
// Conexão com o banco de dados (MySQL)
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'lutadoresDB';

require_once 'lutador.php';

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die('Erro de conexão: ' . $conn->connect_error);
}

// Processa o formulário
$mensagem = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $conn->real_escape_string($_POST['nome']);
    $nacionalidade = $conn->real_escape_string($_POST['nacionalidade']);
    $idade = (int)$_POST['idade'];
    $altura = (float)$_POST['altura'];
    $peso = (float)$_POST['peso'];
    $vitoria = 0;
    $derrota = 0;
    $empate = 0;


    $lutador = new Lutador($nome, $nacionalidade, $idade, $altura, $peso, $vitoria, $derrota, $empate);

    $categoria = $lutador->getCategoria();

    // Atualize os valores conforme definidos pela classe
    $nome = $conn->real_escape_string($lutador->getNome());
    $nacionalidade = $conn->real_escape_string($lutador->getNacionalidade());
    $altura = (float)$lutador->getAltura();
    $idade = (int)$lutador->getIdade();
    $peso = (float)$lutador->getPeso();
    $categoria = $conn->real_escape_string($lutador->getCategoria());
    $sql = "INSERT INTO lutadores (nome, nacionalidade, idade, altura, peso, categoria, vitorias, derrotas, empates) 
            VALUES ('$nome', '$nacionalidade', $idade, $altura, $peso, '$categoria', $vitoria, $derrota, $empate)";

    if ($conn->query($sql) === TRUE) {
        $mensagem = "Lutador cadastrado com sucesso!";
    } else {
        $mensagem = "Erro ao cadastrar: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Lutador</title>
</head>
<body>
    <h1>Cadastrar Lutador</h1>
    <?php if ($mensagem): ?>
        <p><?php echo $mensagem; ?></p>
    <?php endif; ?>
    <form method="post">
        <label>Nome: <input type="text" name="nome" required></label><br>
        <label>Nacionalidade: <input type="text" name="nacionalidade" required></label><br>
        <label>Idade: <input type="number" name="idade" min="0" required></label><br>
        <label>Altura (m): <input type="number" step="0.01" name="altura" min="0" required></label><br>
        <label>Peso (kg): <input type="number" step="0.01" name="peso" min="0" required></label><br>
        <button type="submit">Cadastrar</button>
    </form>
</body>
</html>