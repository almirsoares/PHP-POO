<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Aula 02 - POO PHP</title>
</head>
<body> 
    <?php
        
        require_once 'ContaBanco.php';
        $contaJubileu = new ContaBanco(314159,"CC","Jubileu",300);
        $contaCreuza = new ContaBanco(265358,"CP","Creuza",500);

        print_r($contaJubileu);
        print_r($contaCreuza);

        $contaCreuza->fecharConta();
    ?>
</body>
</html>