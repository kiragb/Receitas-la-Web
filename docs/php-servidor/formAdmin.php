<?php
require "classes/Receita.php";
require "servicos/ReceitaServico.php";

if (count($_POST) > 0) {
    $servico = new ReceitaServico();
    $imagem = $servico->salvarImagem($_FILES["imagem"]);
    $sucesso = $servico->criarReceita($_POST, $imagem);
    if ($sucesso) {
        header("Location: http://localhost:4200");
    }
}