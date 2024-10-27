<?php
class ReceitaServico
{
    private PDO $conn;
    function __construct()
    {
        $servername = "localhost";
        $username = "root";
        $password = "";
        try {
            $this->conn = new PDO("mysql:host=$servername;dbname=receita_a_la_web", $username, $password);
            // set the PDO error mode to exception
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());

        }
    }
    public function buscarReceitaPorID(int $id)
    {

        $sql = "SELECT * FROM receita WHERE id=$id;";
        $resultado = $this->conn->query($sql);

        if ($resultado->rowCount() == 0) {
            return null;
        }
        $dado = $resultado->fetch();

        //ingredientes 
        $ingredientes = $this->conn->query("SELECT * FROM ingredientes WHERE receita_id=$id;");

        //modo de preparo
        $modo_de_preparo = $this->conn->query("SELECT * FROM modo_de_preparo WHERE receita_id=$id;");

        $receita = $this->gerarReceita($dado);
        while ($linha = $ingredientes->fetch()) {
            $receita->ingredientes[] = $linha["ingrediente"];
        }
        while ($linha = $modo_de_preparo->fetch()) {
            $receita->modo_de_preparo[] = $linha["etapa"];
        }

        return $receita;
    }

    public function buscarReceitas()
    {
        $sql = "SELECT * FROM receita";
        $resultado = $this->conn->query($sql);
        $receitas = [];

        if ($resultado->rowCount() == 0) {
            return null;
        }

        $dados = $resultado->fetchAll(PDO::FETCH_ASSOC);

        foreach ($dados as $dado) {
            $receitas[] = $this->gerarReceita($dado);
        }
        
        return $receitas;
    }

    private function gerarReceita($dado)
    {
        $receita = new Receita();

        $receita->id = $dado["id"];
        $receita->titulo_receita = $dado["titulo"];
        $receita->minutos_para_preparo = $dado["minutos"];
        $receita->porções = $dado["porcao"];
        $receita->imagem_url = $dado["imagem"];
        $receita->ingredientes = [];
        $receita->modo_de_preparo = [];

        return $receita;
    }
}