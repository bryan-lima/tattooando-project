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

    // Lista registro correspondente ao ID informado, da tabela 'servico' do BD
    function listarServicoPorId($id) {
        $sql = "SELECT * FROM servico WHERE id=$id";
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

    // Lista registro correspondente ao ID do Studio informado, da tabela 'servico' do BD
    function listarServicoPorStudio($fkStudioId) {
        $sql = "SELECT * FROM servico WHERE fk_studio_id=$fkStudioId";
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

    // Insere novo registro na tabela 'servico' do BD
    function inserirServico($Servico) {
        $sql = "INSERT INTO servico (fk_studio_id, nome, descricao, preco, tempo_medio)
            VALUES ('".$Servico->getFkStudioId()."', '".$Servico->getNome()."', '".$Servico->getDescricao()."',
            '".$Servico->getPreco()."', '".$Servico->getTempoMedio()."')";
        if($this->conn->query($sql) === TRUE) {
            $status = ["status"=>"sucesso"];
        } else {
            $status = ["status"=>"erro: " . $this->conn->erro];
        }
        return json_encode($status);
    }
}

?>