<?php

include_once "./model/conexao.php";
include_once "./model/agendamento.php";

class AgendamentoDao {
    public $conn;

    // Abre conexão com BD
    function __construct() {
        $conexao = new Conexao();
        $this->conn = $conexao->getConn();
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

    // Lista registro correspondente ao ID informado, da tabela 'endereco' do BD
    function listarAgendamentoPorId($id) {
        $sql = "SELECT * FROM agendamento WHERE id=$id";
        $result = $this->conn->query($sql);
        if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $value = json_encode($row);
                echo($value);
            }
        } else {
            echo "0 resultados encontrados";
        }
    }

    // Lista registro correspondente ao ID do cliente informado, da tabela 'endereco' do BD
    function listarAgendamentoPorCliente($fkClienteId) {
        $sql = "SELECT * FROM agendamento WHERE fk_cliente_id=$fkClienteId";
        $result = $this->conn->query($sql);
        if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $value = json_encode($row);
                echo($value);
            }
        } else {
            echo "0 resultados encontrados";
        }
    }

    // Lista registro correspondente ao ID do serviço informado, da tabela 'endereco' do BD
    function listarAgendamentoPorServico($fkServicoId) {
        $sql = "SELECT * FROM agendamento WHERE fk_servico_id=$fkServicoId";
        $result = $this->conn->query($sql);
        if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $value = json_encode($row);
                echo($value);
            }
        } else {
            echo "0 resultados encontrados";
        }
    }

    // Lista registro correspondente ao status informado, da tabela 'endereco' do BD
    function listarAgendamentoPorStatus($status) {
        $sql = "SELECT * FROM agendamento WHERE status='$status'";
        $result = $this->conn->query($sql);
        if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $value = json_encode($row);
                echo($value);
            }
        } else {
            echo "0 resultados encontrados";
        }
    }

    // Insere novo registro na tabela 'agendamento' do BD
    function inserirAgendamento($Agendamento) {
        $sql = "INSERT INTO agendamento (fk_cliente_id, fk_servico_id, data_agendada, horaAgendada, status)
            VALUES ('".$Agendamento->getFkClienteId()."', '".$Agendamento->getFkServicoId()."', '".$Agendamento->getDataAgendada()."', 
            '".$Agendamento->getHoraAgendada()."', '".$Agendamento->getStatus()."')";
        if($this->conn->query($sql) === TRUE) {
            $status = ["status"=>"sucesso"];
        } else {
            $status = ["status"=>"erro: " . $this->conn->error];
        }
        return json_encode($status);
    }

    // Deleta registro correspondente ao ID informado, da tabela 'agendamento' do BD
    function deletarAgendamento($Agendamento) {
        $sql = "DELETE FROM agendamento WHERE id = '".$Agendamento->getId()."'";
        if($this->conn->query($sql) === TRUE) {
            $status = ["status"=>"sucesso"];
        } else {
            $status = ["status"=>"erro: " . $this->conn->error];
        }
        return json_encode($status);
    }

    // Atualiza registro correspondente ao ID informado, da tabela 'agendamento' do BD
    function atualizarAgendamento($Agendamento) {
        $sql = "UPDATE agendamento 
                SET fk_cliente_id='".$Agendamento->getFkClienteId()."', fk_servico_id='".$Agendamento->getFkServicoId()."', 
                data_agendada='".$Agendamento->getDataAgendada()."', hora_agendada='".$Agendamento->getHoraAgendada()."', status='".$Agendamento->getStatus()."' 
                WHERE id='".$Cliente->getId()."'";
        if($this->conn->query($sql) === TRUE) {
            $status = ["status"=>"sucesso"];
        } else {
            $status = ["status"=>"erro: " . $this->conn->error];
        }
        return json_encode($status);
    }
}

?>