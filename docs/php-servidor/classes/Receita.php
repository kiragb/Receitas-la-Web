<?php
class Receita
{
    public int $id;
    public string $titulo_receita;
    public int $minutos_para_preparo;
    public int $porcoes;
    public string $imagem_url;
    public array $ingredientes;
    public array $modo_de_preparo;
}