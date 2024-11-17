<?php
require "classes/Receita.php";
require "servicos/ReceitaServico.php";

$servico = new ReceitaServico();
$id = $_GET["receita_id"] ? $_GET["receita_id"] : 0;
$receita = $servico->buscarReceitaPorID($id);

header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: X-Requested-With");
echo json_encode($receita);
