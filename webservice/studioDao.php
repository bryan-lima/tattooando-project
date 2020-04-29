<?php

include_once "conexao.php";
include_once "studio.php";

class StudioDao {
    public $conn;

    // Abre conexão com BD
    function __construct() {
        $conexao = new Conexao();
        $this->conn - $conexao->getConn();
    }

    // Fecha conexão com BD
    function __destruct() {
        $this->conn->close();
    }

    // Lista todos os registros da tabela 'studio' do BD
    function listarTodosStudios() {
        $sql = "SELECT * FROM studio";
        $result = $this->conn->query($sql);
        if($result->num_rows > 0) {
            $studios = [];
            while($row = $result->fetch_assoc()) {
                $studio = ["id"=>$row["id"], "tipoUsuario"=>$row["tipo_usuario"], "nome"=>$row["nome"], "cpf"=>$row["cpf"], "nascimento"=>$row["nascimento"], "telefone"=>$row["telefone"], "email"=>$row["email"], "senha"=>$row["senha"], "fkEnderecoId"=>$row["fk_endereco_id"]];
                array_push($studios, $studio);
            }
            echo json_encode($studios);
        } else {
            echo "0 resultados encontrados";
        }
    }
}

?>