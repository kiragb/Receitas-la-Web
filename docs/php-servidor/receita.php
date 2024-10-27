<?php
require "classes/Receita.php";
require "servicos/ReceitaServico.php";

$servico = new ReceitaServico();
$id = $_GET["receita_id"] ? $_GET["receita_id"] : 0;
$receita = $servico->buscarReceitaPorID($id);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acessar receitas à la web</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="/css/global.css">
    <link rel="stylesheet" type="text/css" href="/css/style.css" media="screen">
    <link rel="stylesheet" href="/css/receita.css">
    <link href="https://fonts.googleapis.com/css2?family=Caveat+Brush&display=swap" rel="stylesheet">
</head>

<body>
    <div id="cabecalho">
        <form method="post" action="busca.php">
            <div class="search-box">
                <input class="busca" placeholder="Buscar..." name="buscar" type="text">
                <button class="search-button"><i class="fas fa-search"></i></button>
            </div>
        </form>
        <div id="navbar">
            <a class="navLink" href="index.php">Tematicas</a>
            <a class="navLink" href="index.php">Salgados</a>
            <a class="navLink" href="index.php">Doces</a>
            <a class="navLink" href="index.php">Drinks</a>
            <a class="navButton" href="login.php">Login</a>
        </div>
    </div>
    <div class="pagina-de-receita">
        <?php
        if (!$receita) {
            echo "<h1>Receita não encontrada</h1>";
        } else {
            ?>
            <img src="<?= $receita->imagem_url ?>" alt="imagem de um <?= $receita->titulo_receita ?>">

            <main>
                <div class="ingredientes">
                    <div class="titulo">

                        <h1><?= $receita->titulo_receita ?></h1>
                        <div class="icons">
                            <span><i class="fas fa-clock"></i> <?= $receita->minutos_para_preparo ?> min</span>
                            <span><i class="fas fa-heart"></i> 10,4 mil</span>
                            <span><i class="fas fa-comment"></i> 500 </span>
                        </div>
                    </div>

                    <div class="painel">
                        <h2> Ingredientes
                            (<?= $receita->porções > 1 ? $receita->porções . " porções" : $receita->porções . " porção" ?>)
                        </h2>
                        <ul>
                            <?php
                            foreach ($receita->ingredientes as $ingrediente) {
                                echo "<li>" . $ingrediente . "</li>";
                            }
                            ?>
                        </ul>
                    </div>

                </div>

                <div class="modo-de-preparo">

                    <div class="painel">
                        <h2>Modo de preparo</h2>
                        <ol>
                            <?php
                            foreach ($receita->modo_de_preparo as $etapa) {
                                echo "<li>" . $etapa . "</li>";
                            }
                            ?>
                        </ol>
                    </div>
                </div>

            </main>
        <?php } ?>
    </div>
</body>

</html>