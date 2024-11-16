<?php
require "classes/Receita.php";
require "servicos/ReceitaServico.php";

$tipo = array_key_exists("tipo", $_GET) ? $_GET["tipo"] : null;

$servico = new ReceitaServico();
if ($tipo !== "Tematica") {
  $receitas = $servico->buscarReceitas(false, $tipo);
  $receitas_tematicas = $servico->buscarReceitas(true, $tipo);
} else {
  $receitas = [];
  $receitas_tematicas = $servico->buscarReceitas(true, null);
}
$data = array("receitas" => $receitas, "receitasTematicas" => $receitas_tematicas);
header('Content-Type: application/json; charset=utf-8');
echo json_encode($data);