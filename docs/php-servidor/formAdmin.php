<?php
require "classes/Receita.php";
require "servicos/ReceitaServico.php";

if (count($_POST) > 0) {
    $servico = new ReceitaServico();
    $imagem = $servico->salvarImagem($_FILES["imagem"]);
    $sucesso = $servico->criarReceita($_POST, $imagem);
    if ($sucesso) {
        header("Location: http://localhost:8000/php-servidor");
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/formAdmin.css">
    <title>Inserir Receita</title>
</head>

<body>
    <div class="outer-container">
        <div class="container">
            <div class="imagem-container"></div>

            <form method="POST" action="formAdmin.php" enctype="multipart/form-data">
                <h1>Formulário de Postagens de Receitas</h1>
                <p>Todos os Campos São Obrigatórios</p>
                <label for="capaReceita">Imagem de Capa:</label>
                <input id="imagem" name="imagem" type="file" accept="image/*" required onchange="previewImagem(event)">
                <!-- Elemento onde a imagem será exibida -->
                <div class="imagem-preview-container">
                    <img class="arquivo" id="preview" src="#" alt="Prévia da imagem">
                </div>

                <label for="nomeReceita">Prato:</label>
                <input class="placeholder" id="titulo" name="titulo" type="text" placeholder="Nome do prato"
                    required><br>

                <label for="nomeReceita">Tempo de preparo em minutos:</label>
                <input class="placeholder" id="minutos" name="minutos" type="number" placeholder="10" required><br>

                <label for="nomeReceita">Porções:</label>
                <input class="placeholder" id="porcao" name="porcao" type="number" placeholder="25" required><br>

                <label for="ingredienteReceita">Ingredientes:</label>
                <textarea class="placeholder" id="ingredientes" name="ingredientes"
                    placeholder="Descreva em lista todos os ingredientes necessários" rows="4" required></textarea><br>

                <label for="etapasReceita">Passo à Passo:</label>
                <textarea class="placeholder" id="etapas" name="etapas"
                    placeholder="Descreva o passo a passo para preparar o prato" rows="4" required></textarea><br>

                <label for="tipoReceita">Tipo de prato:</label>
                <select name="tipo" id="tipo">
                    <option value="Salgado">Salgado</option>
                    <option value="Doce">Doce</option>
                    <option value="Drink">Drink</option>
                </select>

                <label style="text-align: center;">Esta é uma receita temática?</label>
                <div class="checkbox-wrapper-10">
                    <input class="tgl tgl-flip" id="cb5" type="checkbox" name="tematica" checked>
                    <label class="tgl-btn" data-tg-off="Não" data-tg-on="Sim" for="cb5"></label>
                </div>
                <div style="text-align: center;">
                    <button class="btn-principal" type="submit">Enviar</button>
                    <button class="btn-principal" type="reset">Limpar</button>
                </div>
            </form>
        </div>
    </div>
    <script>
        function previewImagem(event) {
            var reader = new FileReader();
            reader.onload = function () {
                var preview = document.getElementById('preview');
                preview.src = reader.result;
                preview.style.display = 'block'; // Exibe a imagem
            };
            reader.readAsDataURL(event.target.files[0]); // Lê o arquivo selecionado
        }
    </script>
</body>

</html>