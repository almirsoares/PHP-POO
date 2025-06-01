<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Projeto Final</title>
</head>
<body>
    <pre>
    <?php
        require_once 'Video.php';
        require_once 'Gafanhoto.php';
        require_once 'Visualizacao.php';

        echo "<h1>Bem-vindo ao Projeto Final!</h1>";

        $video[0] = new Video("Aula 01 - Introdução ao PHP");
        $video[1] = new Video("Aula 02 - Estruturas de Controle");
        $video[2] = new Video("Aula 03 - Funções e Métodos");

        $gafanhoto[0] = new Gafanhoto("João", 25, "M", "joao123");
        $gafanhoto[1] = new Gafanhoto("Maria", 22, "F", "maria456");


        $visualizacao1 = new Visualizacao($gafanhoto[0], $video[0]);
        $video[0]->like();
        $visualizacao2 = new Visualizacao($gafanhoto[0], $video[1]);
        $video[1]->pause();        
        $visualizacao3 = new Visualizacao($gafanhoto[0], $video[2]);
        $video[2]->share();
        $visualizacao4 = new Visualizacao($gafanhoto[1], $video[2]);

        $video[0]->like();
        $video[1]->pause();        

        print_r($video);
        print_r($gafanhoto);


    ?>
    </pre>
</body>
</html>