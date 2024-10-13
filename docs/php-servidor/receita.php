<?php
class Receita
{
    public string $titulo_receita;
    public int $minutos_para_preparo;
    public int $porções;
    public string $imagem_url;
    public array $ingredientes;
    public array $modo_de_preparo;
}

$cupcake = new Receita();

$cupcake->titulo_receita = "Cupcake de Chocolate";
$cupcake->minutos_para_preparo = 20;
$cupcake->porções = 10;
$cupcake->imagem_url = "img/cupcake-de-chocolate.jpg";
$cupcake->ingredientes = array(
    "3 ovos",
    "leite",
    "1 xícara (chá) de leite",
    "açúcar",
    "2 xícaras (chá) de açúcar",
    "farinha de trigo",
    "2 xícaras (chá) de farinha de trigo",
    "fermento em pó químico",
    "1 colher (sopa) de fermento em pó",
    "manteiga sem sal",
    "1/2 xícara (chá) de manteiga sem sal",
    "chocolate em pó",
    "4 colheres (sopa) de chocolate em pó",
);
$cupcake->modo_de_preparo = array(
    "Acenda o forno, enquanto separa as forminhas de papel e as posiciona na assadeira.",
    "Peneire, em uma tigela grande, o chocolate em pó, a farinha e o fermento.",
    "Separe cuidadosamente as gemas das claras e coloque-as em tigelas separadas.",
    "Bata a manteiga e o açúcar na batedeira.",
    "Quando estiver formado um creme homogêneo e macio, acrescente as gemas uma a uma e bata mais.",
    "Em seguida, adicione os ingredientes peneirados e o leite.",
    "Bata as claras em neve na batedeira ou com um batedor manual.",
    "Coloque a massa nas forminhas e leve para assar.",
    "Deixe no forno por, aproximadamente, 20 minutos.",
    "Faça o teste do palito e, se os cupcakes estiverem prontos, tire-os do forno e deixe esfriar.",
);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acessar receitas à la web</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" type="text/css" href="css/style.css" media="screen">
    <link rel="stylesheet" href="css/receita.css">
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
            <a class="navLink" href="index.html">Tematicas</a>
            <a class="navLink" href="index.html">Salgados</a>
            <a class="navLink" href="index.html">Doces</a>
            <a class="navLink" href="index.html">Drinks</a>
            <a class="navButton" href="login.html">Login</a>
        </div>
    </div>
    <div class="pagina-de-receita">
        <img src="<?= $cupcake->imagem_url ?>" alt="imagem de um <?= $cupcake->titulo_receita ?>">

        <main>
            <div class="ingredientes">
                <div class="titulo">

                    <h1><?= $cupcake->titulo_receita ?></h1>
                    <div class="icons">
                        <span><i class="fas fa-clock"></i> <?= $cupcake->minutos_para_preparo ?> min</span>
                        <span><i class="fas fa-heart"></i> 10,4 mil</span>
                        <span><i class="fas fa-comment"></i> 500 </span>
                    </div>
                </div>

                <div class="painel">
                    <h2> Ingredientes
                        (<?= $cupcake->porções > 1 ? $cupcake->porções . " porções" : $cupcake->porções . " porção" ?>)
                    </h2>
                    <ul>
                        <?php
                        foreach ($cupcake->ingredientes as $ingrediente) {
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
                        foreach ($cupcake->modo_de_preparo as $etapa) {
                            echo "<li>" . $etapa . "</li>";
                        }
                        ?>
                    </ol>
                </div>
            </div>

        </main>
    </div>
</body>

</html>