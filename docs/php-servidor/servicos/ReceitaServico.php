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

    public function buscarReceitas($tematica, $tipo = null)
    {
        $sql = "SELECT * FROM receita WHERE tematica = :tematica";
        if ($tipo !== null) {
            $sql .= " AND tipo = :tipo";
        }
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":tematica", $tematica);
        if ($tipo !== null) {
            $stmt->bindParam(":tipo", $tipo);
        }

        $stmt->execute();
        $receitas = [];

        if ($stmt->rowCount() == 0) {
            return [];
        }

        $dados = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($dados as $dado) {
            $receitas[] = $this->gerarReceita($dado);
        }

        return $receitas;
    }

    public function criarReceita($dado, $imagem)
    {
        $dado["tematica"] = $dado["tematica"] === "on";
        $receita = $this->gerarReceita($dado);
        $receita->imagem_url = "/img/$imagem";
        $receita->ingredientes = explode("\n", $_POST["ingredientes"]);
        $receita->modo_de_preparo = explode("\n", $_POST["etapas"]);

        try {
            $this->conn->beginTransaction();

            $sql = "INSERT INTO receita (titulo, minutos, porcao, imagem, tipo, tematica) VALUES (:titulo, :minutos, :porcao, :imagem, :tipo, :tematica);";
            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(":titulo", $receita->titulo_receita);
            $stmt->bindParam(":minutos", $receita->minutos_para_preparo);
            $stmt->bindParam(":porcao", $receita->porcoes);
            $stmt->bindParam(":imagem", $receita->imagem_url);
            $stmt->bindParam(":tipo", $receita->tipo);
            $stmt->bindParam(":tematica", $receita->tematica);
            $stmt->execute();

            $id = $this->conn->lastInsertId();

            $sql = "INSERT INTO ingredientes (receita_id, ingrediente) VALUES (:receita_id, :ingrediente);";
            $stmt = $this->conn->prepare($sql);
            foreach ($receita->ingredientes as $ingrediente) {
                $stmt->bindParam(":receita_id", $id);
                $stmt->bindParam(":ingrediente", $ingrediente);
                $stmt->execute();
            }

            $sql = "INSERT INTO modo_de_preparo (receita_id, etapa) VALUES (:receita_id, :etapa);";
            $stmt = $this->conn->prepare($sql);
            foreach ($receita->modo_de_preparo as $etapa) {
                $stmt->bindParam(":receita_id", $id);
                $stmt->bindParam(":etapa", $etapa);
                $stmt->execute();
            }

            $this->conn->commit();
            return true;
        } catch (PDOException $ex) {
            $this->conn->rollBack();
            return false;
        }
    }

    public function salvarImagem($imagem)
    {
        $target_dir = "../img/";
        $target_file = $target_dir . basename($imagem["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        $check = getimagesize($imagem["tmp_name"]);
        if ($check === false) {
            die("File is not an image.");
        }

        if (
            $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif"
        ) {
            die("Sorry, only JPG, JPEG, PNG & GIF files are allowed.");
        }

        if (!move_uploaded_file($imagem["tmp_name"], $target_file)) {
            die("Sorry, there was an error uploading your file.");
        }
        return $imagem["name"];
    }

    private function gerarReceita($dado)
    {
        $receita = new Receita();

        $receita->id = array_key_exists("id", $dado) ? $dado["id"] : 0;
        $receita->titulo_receita = $dado["titulo"];
        $receita->minutos_para_preparo = $dado["minutos"];
        $receita->porcoes = $dado["porcao"];
        $receita->tipo = $dado["tipo"];
        $receita->tematica = $dado["tematica"];
        $receita->imagem_url = array_key_exists("imagem", $dado) ? $dado["imagem"] : "";
        $receita->ingredientes = [];
        $receita->modo_de_preparo = [];

        return $receita;
    }
}