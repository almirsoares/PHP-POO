<?php
session_start();
require_once 'ControleRemoto.php';

// Inicializar o controle remoto na sessão
if (!isset($_SESSION['controle'])) {
    $_SESSION['controle'] = serialize(new ControleRemoto());
}

// Recuperar o controle remoto da sessão
$controle = unserialize($_SESSION['controle']);

// Processar o volume desejado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['volumeDesejado'])) {
        $volumeDesejado = (int)$_POST['volumeDesejado'];

        // Ligar o controle remoto, se estiver desligado
        if (!$controle->getLigado()) {
            $controle->ligar();
        }

        if ($volumeDesejado >= 0 && $volumeDesejado <= 100) {
            if ($volumeDesejado > $controle->getVolume()) {
                while ($controle->getVolume() < $volumeDesejado) {
                    $controle->maisVolume();
                }
            } elseif ($volumeDesejado < $controle->getVolume()) {
                while ($controle->getVolume() > $volumeDesejado) {
                    $controle->menosVolume();
                }
            }
        } else {
            echo "Volume inválido. O volume deve estar entre 0 e 100.";
        }
    }

    // Processar os botões de ligar e desligar
    if (isset($_POST['ligar'])) {
        $controle->ligar();
    } elseif (isset($_POST['desligar'])) {
        $controle->desligar();
    }
}

// Salvar o estado atualizado do controle remoto na sessão
$_SESSION['controle'] = serialize($controle);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Controle Remoto</title>
</head>
<body>
    <h1>Bem-vindo ao Controle Remoto</h1>
    <form method="post">
        <label for="volumeDesejado">Digite o volume desejado (0 a 100):</label>
        <input type="number" id="volumeDesejado" name="volumeDesejado" min="0" max="100" required>
        <button type="submit">Enviar</button>
    </form>
    <form method="post">
        <button type="submit" name="ligar">Ligar TV</button>
        <button type="submit" name="desligar">Desligar TV</button>
    </form>
    <?php
    $controle->abrirMenu();
    $controle->fecharMenu();
    ?>
</body>
</html>