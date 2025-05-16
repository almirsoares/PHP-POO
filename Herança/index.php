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
        require_once 'Adm.php';
        require_once 'Bolsista.php';
        require_once 'Pessoa.php';
        require_once 'Funcionario.php';
        require_once 'Pagante.php';

        // Professor: nome, idade, sexo, raça, setor, trabalhando, salario, especialidade, nivel
        $professor = new Professor("Maria", 35, "Feminino", "Branca", "Matemática", true, 3000, "Matemática", "Mestre");
        $professor2 = new Professor("João", 40, "Masculino", "Pardo", "Física", true, 4000, "Física", "Doutor");
        $professor3 = new Professor("Ana", 30, "Feminino", "Branca", "Química", true, 5000, "Química", "Doutor");


        // Adm: nome, idade, sexo, raça, setor, trabalhando, salario, cargo
        $adm = new Adm("Ana", 30, "Feminino", "Branca", "Administração", true, 2500, "Gerente");
        $adm2 = new Adm("Carlos", 28, "Masculino", "Pardo", "Administração", true, 3000, "Assistente");
        $adm3 = new Adm("Fernanda", 25, "Feminino", "Branca", "Administração", true, 3500, "Coordenador");

        $bolsista = new Bolsista("Lucas", 18, "Masculino", "Pardo", 67890, "Física", 50);
        $bolsista2 = new Bolsista("Mariana", 19, "Feminino", "Branca", 12345, "Matemática", 70);
        $bolsista3 = new Bolsista("Pedro", 20, "Masculino", "Pardo", 54321, "Química", 80);

        $alunoPagante = new Pagante("Fernanda", 22, "Feminino", "Branca", 54321, "Química", 500);
        $alunoPagante2 = new Pagante("Ricardo", 23, "Masculino", "Pardo", 67890, "Física", 600);
        $alunoPagante3 = new Pagante("Juliana", 24, "Feminino", "Branca", 12345, "Matemática", 700);
        

        $professor->apresentar();
        $professor2->apresentar();
        $professor3->apresentar();

        $adm->apresentar();
        $adm2->apresentar();
        $adm3->apresentar();

        $bolsista->apresentar();
        $bolsista2->apresentar();
        $bolsista3->apresentar();

        $alunoPagante->apresentar();
        $alunoPagante2->apresentar();
        $alunoPagante3->apresentar();

        $adm->mudarSetor("Recursos Humanos");
        $adm->receberAumento(500);
        $adm->apresentar();

        $adm2->mudarSetor("Financeiro");
        $adm2->receberAumento(1000);
        $adm2->apresentar();

        $adm3->mudarSetor("Marketing");
        $adm3->receberAumento(1500);
        $adm3->apresentar();

        $bolsista->setBolsa(60);
        $bolsista->apresentar();

        $bolsista2->setBolsa(80);
        $bolsista2->apresentar();

        $bolsista3->setBolsa(90);
        $bolsista3->apresentar();

        $alunoPagante->setMensalidade(600);
        $alunoPagante->pagar(700);
        $alunoPagante->aumentarMensalidade(100);
        $alunoPagante->apresentar();

        $alunoPagante2->setMensalidade(700);
        $alunoPagante2->pagar(800);
        $alunoPagante2->aumentarMensalidade(200);
        $alunoPagante2->apresentar();

        $alunoPagante3->setMensalidade(800);
        $alunoPagante3->pagar(900);
        $alunoPagante3->aumentarMensalidade(300);
        $alunoPagante3->apresentar();
    ?>
</body>
</html>
