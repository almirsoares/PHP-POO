<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Aula 02 - POO PHP</title>
</head>
<body> 
    <?php
        require_once 'Caneta.php';
        $caneta1 = new Caneta("BIC", "Azul", 0.7, 100, true);        $caneta1->cor = "azul";
        
        print_r($caneta1);
        $caneta1->raciscar();
        print_r($caneta1);

        $caneta1->setModelo("BIC CRISTAL");
        $caneta1->setTampada(false);

        print_r($caneta1);
        $caneta1->raciscar();
        print_r($caneta1);

    ?>
</body>
</html>
