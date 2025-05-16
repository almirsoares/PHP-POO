<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Leitura de Livros</title>
        <link rel="stylesheet" href="style.css">

    </head>

    <body>
        <h1>Leitura de Livros</h1>
        <div class="container">
            <div class="livro">
                <h2>Livro 1</h2>
                <?php
                    require_once 'Livro.php';
                    require_once 'Pessoa.php';

                    $pessoa = new Pessoa("João", 25, "Masculino", "Pardo");
                    $livro = new Livro("Aprendendo PHP", "José da Silva", 300);

                    $livro->emprestar($pessoa->getNome());

                    $livro->abrir();
                    $livro->folhear(50);
                    $livro->avancarPagina();
                    $livro->avancarPagina();
                    $livro->avancarPagina();
                    $livro->detalhes();
                    $livro->voltarPagina();
                    $livro->fechar();

                    echo "<p>Título: " . $livro->getTitulo() . "</p>";
                    echo "<p>Autor: " . $livro->getAutor() . "</p>";
                    echo "<p>Total de Páginas: " . $livro->getTotPaginas() . "</p>";
                    echo "<p>Página Atual: " . $livro->getPaginaAtual() . "</p>";
                ?>
            </div>
        </div>
    </body>
</html>

