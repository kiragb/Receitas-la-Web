<?php
require "classes/Receita.php";
require "servicos/ReceitaServico.php";


$servico = new ReceitaServico();
$receitas = $servico->buscarReceitas();
?>
<!Doctype html>
<html lang="pt-br">

<head>
  <title>Receita à la Web</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/css/global.css">
  <!-- CSS do NavBar-->
  <link rel="stylesheet" type="text/css" href="/css/style.css" media="screen">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <!--CSS Receitas-->
  <link rel="stylesheet" href="/css/index.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <!--Font Family-->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
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
      <a class="navLink" href="/php-servidor/index.php">Tematicas</a>
      <a class="navLink" href="/php-servidor/index.php">Salgados</a>
      <a class="navLink" href="/php-servidor/index.php">Doces</a>
      <a class="navLink" href="/php-servidor/index.php">Drinks</a>
      <a class="navButton" href="login.php">Login</a>
    </div>
  </div>
  <div id="logo">
    <img src="/img/logo-cropped.png" alt="logo">
  </div>
  <div id="imgLinks">
    <div class="linkContainer">
      <img src="https://i.pinimg.com/564x/da/bf/25/dabf259cf5500c37dc0241d9583d99c9.jpg" class="linkImage"
        alt="imagem receita">
      <div class="center">Salgados</div>
    </div>
    <div class="linkContainer">
      <img src="https://i.pinimg.com/564x/9e/fb/45/9efb452c5faffbc0616c3dd446faf4a6.jpg" class="linkImage"
        alt="imagem receita">
      <div class="center">Doces</div>
    </div>
    <div class="linkContainer">
      <img src="https://i.pinimg.com/564x/20/af/78/20af78383ea45e84a5b11f30ccd2ada4.jpg" class="linkImage"
        alt="imagem receita">
      <div class="center">Drinks</div>
    </div>
    <div class="linkContainer">
      <img src="https://i.pinimg.com/564x/ce/97/0b/ce970b53d055fe0e5ba2a50f727ae05c.jpg" class="linkImage"
        alt="imagem receita">
      <div class="center">Tematicas</div>
    </div>
  </div>
  <h2>ALGUMAS RECEITAS...</h2>
  <div class="recipes">
    <?php foreach ($receitas as $receita) { ?>
      <div class="recipe-card" onclick="abrir_receita(<?= $receita->id ?>)">
        <img src="<?= $receita->imagem_url ?>" alt="<?= $receita->titulo_receita ?>">
        <p><?= $receita->titulo_receita ?></p>
        <div class="icons">
          <span><i class="fas fa-clock"></i> <?= $receita->minutos_para_preparo ?> min</span>
          <span><i class="fas fa-heart"></i> 4,4 mil</span>
          <span><i class="fas fa-comment"></i> 100 </span>
        </div>
      </div>
    <?php } ?>
  </div>

  <h2>ALGUMAS RECEITAS TEMÁTICAS...</h2>
  <div class="recipes">
    <div class="recipe-card">
      <img src="/img/gem.jpg" alt="Boneco de Gengibre">
      <p>Boneco de Gengibre</p>
      <div class="icons">
        <span><i class="fas fa-clock"></i> 30 min</span>
        <span><i class="fas fa-heart"></i> 4,4 mil</span>
        <span><i class="fas fa-comment"></i> 100 </span>
      </div>
    </div>
    <div class="recipe-card">
      <img src="/img/donuts.jpeg" alt="A dama e o Vagabundo">
      <p>Macarronada</p>
      <div class="icons">
        <span><i class="fas fa-clock"></i> 30 min</span>
        <span><i class="fas fa-heart"></i> 4,4 mil</span>
        <span><i class="fas fa-comment"></i> 100 </span>
      </div>
    </div>
    <div class="recipe-card">
      <img src="/img/dama.jpeg" alt="Donuts dos Sipisons">

      <p>Donuts dos Simpisons</p>
      <div class="icons">
        <span><i class="fas fa-clock"></i> 30 min</span>
        <span><i class="fas fa-heart"></i> 4,4 mil</span>
        <span><i class="fas fa-comment"></i> 100 </span>
      </div>
    </div>

    <div class="recipe-card">
      <img src="/img/gem.jpg" alt="Boneco de Gengibre">
      <p>Boneco de Gengibre</p>
      <div class="icons">
        <span><i class="fas fa-clock"></i> 30 min</span>
        <span><i class="fas fa-heart"></i> 4,4 mil</span>
        <span><i class="fas fa-comment"></i> 100 </span>
      </div>
    </div>
    <div class="recipe-card">
      <img src="/img/donuts.jpeg" alt="A dama e o Vagabundo">
      <p>Macarronada</p>
      <div class="icons">
        <span><i class="fas fa-clock"></i> 30 min</span>
        <span><i class="fas fa-heart"></i> 4,4 mil</span>
        <span><i class="fas fa-comment"></i> 100 </span>
      </div>
    </div>
    <div class="recipe-card">
      <img src="/img/dama.jpeg" alt="Donuts dos Sipisons">

      <p>Donuts dos Simpisons</p>
      <div class="icons">
        <span><i class="fas fa-clock"></i> 30 min</span>
        <span><i class="fas fa-heart"></i> 4,4 mil</span>
        <span><i class="fas fa-comment"></i> 100 </span>
      </div>
    </div>
  </div>

  <div class="copyright">
    <p><small>&copy;Letícia Novaes, Natalia Dias Fernandes, Walquiria Gonçalves Brabosa</small></p>
  </div>

  <div class="adicionar-receita">
    <a href="/php-servidor/formAdmin.php">
      <i class="fa-solid fa-circle-plus"></i>
      Adicionar
    </a>
  </div>

  <script>
    function abrir_receita(id) {
      window.location.href = `http://${window.location.host}/php-servidor/receita.php?receita_id=${id}`
    }
  </script>
</body>

</html>