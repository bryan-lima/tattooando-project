<?php

include_once "conexao.php";
include_once "endereco.php"

class EnderecoDao {
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

    // Lista todos os registros da tabela 'endereco' do BD
    function listarTodosEnderecos() {
        $sql = "SELECT * FROM endereco";
        $result = $this->conn->query($sql);
        if($result->num_rows > 0) {
            $enderecos = [];
            while($row = $result->fetch_assoc()) {
                $endereco = ["id"=>$row["id"], "cep"=>$row["cep"], "numero"=>$row["numero"], "complemento"=>$row["complemento"]];
                array_push($enderecos, $endereco);
            }
            echo json_encode($enderecos);
        } else {
            echo "0 resultados encontrados";
        }
    }
}

?>