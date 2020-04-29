<?php

include_once "conexao.php";
include_once "agendamento.php";

class AgendamentoDao {
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

    // Lista todos os registros da tabela 'agendamento' do BD
    function listarTodosAgendamentos() {
        $sql = "SELECT * FROM agendamento";
        $result = $this->conn->query($sql);
        if($result->num_rows > 0) {
            $agendamentos = [];
            while($row = $result->fetch_assoc()) {
                $agendamento = ["id"=>$row["id"], "fkClienteId"=>$row["fk_cliente_id"], "fkServicoId"=>$row["fk_servico_id"], "dataAgendada"=>$row["data_agendada"], "horaAgendada"=>$row["hora_agendada"], "status"=>$row["status"]];
                array_push($agendamentos, $agendamento);
            }
            echo json_encode($agendamentos);
        } else {
            echo "0 resultados encontrados";
        }
    }
}

?>