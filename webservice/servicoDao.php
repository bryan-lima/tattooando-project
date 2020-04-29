<?php

include_once "conexao.php";
include_once "servico.php";

class ServicoDao {
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

    // Lista todos os registros da tabela 'servico' do BD
    function listarTodosServicos() {
        $sql = "SELECT * FROM servico";
        $result = $this->conn->query($sql);
        if($result->num_rows > 0) {
            $servicos = [];
            while($row = $result->fetch_assoc()) {
                $servico = ["id"=>$row["id"], "fkStudioId"=>$row["fk_studio_id"], "nome"=>$row["nome"], "descricao"=>$row["descricao"], "preco"=>$row["preco"], "tempoMedio"=>$row["tempo_medio"]];
                array_push($servicos, $servico);
            }
            echo json_encode($servicos);
        } else {
            echo "0 resultados encontrados";
        }
    }
}

?>