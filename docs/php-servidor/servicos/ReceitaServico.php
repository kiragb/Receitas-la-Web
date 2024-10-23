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

        $receita = new Receita();

        $receita->titulo_receita = $dado["titulo"];
        $receita->minutos_para_preparo = $dado["minutos"];
        $receita->porções = $dado["porcao"];
        $receita->imagem_url = $dado["imagem"];
        $receita->ingredientes = [];
        while ($linha = $ingredientes->fetch()) {
            $receita->ingredientes[] = $linha["ingrediente"];
        }
        $receita->modo_de_preparo = [];
        while ($linha = $modo_de_preparo->fetch()) {
            $receita->modo_de_preparo[] = $linha["etapa"];
        }

        return $receita;
    }
}