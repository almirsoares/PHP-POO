<?php
// Importando a classe Lutador
require_once 'lutador.php';

// Vetor de dois lutadores
$lutadores = array();

$lutadores[0] = new Lutador(
    "Anderson Silva",
    "Brasil",
    30,
    1.80,
    75,
    10,
    2,
    1
);
$lutadores[1] = new Lutador(
    "Conor McGregor",
    "Irlanda",
    32,
    1.75,
    70,
    12,
    3,
    0
);

$lutadores[2] = new Lutador(
    "Khabib Nurmagomedov",
    "Rússia",
    29,
    1.78,
    77,
    20,
    0,
    0
);

$lutadores[3] = new Lutador(
    "Amanda Nunes",
    "Brasil",
    33,
    1.70,
    65,
    15,
    4,
    0
);

$lutadores[4] = new Lutador(
    "Valentina Shevchenko",
    "Quirguistão",
    35,
    1.65,
    60,
    20,
    3,
    0
);

$lutadores[5] = new Lutador(
    "Jon Jones",
    "EUA",
    34,
    1.85,
    93,
    26,
    1,
    0
);
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
    <ul>
        <?php foreach ($lutadores as $lutador): ?>
            <?php echo $lutador->apresentar(); 
            ?>
            <br>
        <?php endforeach; ?>
    </ul>
</body>
</html>