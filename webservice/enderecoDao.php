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

    // Lista registro correspondente ao ID informado, da tabela 'endereco' do BD
    function listarEnderecoPorId($id) {
        $sql = "SELECT * FROM endereco WHERE id=$id";
        $result = $this->conn->query($ql);
        if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $value = json_encode($row);
                echo($value);
            }
        } else {
            echo "0 resultados encontrados";
        }
    }

    // Lista registro correspondente ao CEP e número informados, da tabela 'endereco' do BD
    function listarEnderecoPorCepENumero($cep, $numero) {
        $sql = "SELECT * FROM endereco WHERE cep=$cep AND numero=$numero";
        $result = $this->conn->query($ql);
        if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $value = json_encode($row);
                echo($value);
            }
        } else {
            echo "0 resultados encontrados";
        }
    }
}

?>