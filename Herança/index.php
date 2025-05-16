<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leitura de Livros</title>
</head>

<body>
    <h1>Escola</h1>
    <?php

        require_once 'Aluno.php';
        require_once 'Professor.php';
        require_once 'Funcionario.php';

        $aluno = new Aluno("João", 20, "Masculino", "Pardo", 12345, "Matemática");
        $professor = new Professor("Maria", 35, "Feminino", "Branca", "Matemática", 5000);
        $funcionario = new Funcionario("Carlos", 40, "Masculino", "Pardo", "Secretário", True);

        $aluno->apresentar();
        $professor->apresentar();
        $funcionario->apresentar();

        $aluno->fazerAniversario();
        $professor->receberAumento(1000);
        $funcionario->mudarSetor("RH");

        $aluno->apresentar();
        $professor->apresentar();
        $funcionario->apresentar();

    ?>
</body>
</html>
