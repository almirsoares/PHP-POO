<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Aula 02 - POO PHP</title>
</head>
<body> 
    <?php
        require_once 'Caneta.php';
        $caneta1 = new Caneta;
        $caneta1->cor = "azul";
        $caneta1->modelo = "bic cristal";

        var_dump($caneta1);

        $caneta1->raciscar();
        $caneta1->raciscar();
    ?>
</body>
</html>
