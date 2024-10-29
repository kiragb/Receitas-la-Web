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
    <?php require "componentes/cabecalho.php"; ?>
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
                            (<?= $receita->porcoes > 1 ? $receita->porcoes . " porções" : $receita->porcoes . " porção" ?>)
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