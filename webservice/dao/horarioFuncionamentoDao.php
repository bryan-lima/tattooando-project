<?php

include_once "./model/conexao.php";
include_once "./model/horarioFuncionamento.php";

class HorarioFuncionamentoDao {
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

    // Lista todos os registros da tabela 'horario_funcionamento' do BD
    function listarTodosHorariosFuncionamento() {
        $sql = "SELECT * FROM horario_funcionamento";
        $result = $this->conn->query($sql);
        if($result->num_rows > 0) {
            $horariosFuncionamento = [];
            while($row = $result->fetch_assoc()) {
                $horarioFuncionamento = ["id"=>$row["id"], "fkStudioId"=>$row["fk_studio_id"], "diasAberto"=>$row["dias_aberto"], "hrSemanaInicio"=>$row["hr_semana_inicio"], "hrSemanaFim"=>$row["hr_semana_fim"], "hrFimSemanaInicio"=>$row["hr_fim_semana_inicio"], "hrFimSemanaFim"=>$row["hr_fim_semana_fim"]];
                array_push($horariosFuncionamento, $horarioFuncionamento);
            }
            echo json_encode($horariosFuncionamento);
        } else {
            echo "0 resultados encontrados";
        }
    }

    // Lista registro correspondente ao ID informado, da tabela 'horario_funcionamento' do BD
    function listarHorarioFuncionamentoPorId($id) {
        $sql = "SELECT * FROM horario_funcionamento WHERE id=$id";
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

    // Lista registro correspondente ao ID do Studio informado, da tabela 'horario_funcionamento' do BD
    function listarHorarioFuncionamentoPorStudio($fkStudioId) {
        $sql = "SELECT * FROM horario_funcionamento WHERE fk_studio_id=$fkStudioId";
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

    // Insere novo registro na tabela 'horario_funcionamento' do BD
    function inserirHorarioFuncionamento($HorarioFuncionamento) {
        $sql = "INSERT INTO horario_funcionamento (fk_studio_id, dias_aberto, hr_semana_inicio, hr_semana_fim, hr_fim_semana_inicio, hr_fim_semana_fim)
            VALUES ('".$HorarioFuncionamento->getFkStudioId()."', '".$HorarioFuncionamento->getDiasAberto()."', 
            '".$HorarioFuncionamento->getHrSemanaInicio()."', '".$HorarioFuncionamento->getHrSemanaFim()."', 
            '".$HorarioFuncionamento->getHrFimSemanaInicio()."', '".$HorarioFuncionamento->getHrFimSemanaFim()."')";
        if($this->conn->query($sql) === TRUE) {
            $status = ["status"=>"sucesso"];
        } else {
            $status = ["status"=>"erro: " . $this->conn->error];
        }
        return json_encode($status);
    }

    // Deleta registro correspondente ao ID informado, da tabela 'horario_funcionamento' do BD
    function deletarHorarioFuncionamento($HorarioFuncionamento) {
        $sql = "DELETE FROM horario_funcionamento WHERE id = '".$HorarioFuncionamento->getId()."'";
        if($this->conn->query($sql) === TRUE) {
            $status = ["status"=>"sucesso"];
        } else {
            $status = ["status"=>"erro: " . $this->conn->error];
        }
        return json_encode($status);
    }

    // Atualiza registro correspondente ao ID informado, da tabela 'horario_funcionamento' do BD
    function atualizarHorarioFuncionamento($HorarioFuncionamento) {
        $sql = "UPDATE horario_funcionamento 
                SET fk_studio_id='".$HorarioFuncionamento->getFkStudioId()."', dias_aberto='".$HorarioFuncionamento->getDiasAberto()."',  
                hr_semana_inicio='".$HorarioFuncionamento->getHrSemanaInicio()."', hr_semana_fim='".$HorarioFuncionamento->getHrSemanaFim()."', 
                hr_fim_semana_inicio='".$HorarioFuncionamento->getHrFimSemanaInicio()."', hr_fim_semana_fim='".$HorarioFuncionamento->getHrFimSemanaFim()."', 
                WHERE id='".$HorarioFuncionamento->getId()."'";
        if($this->conn->query($sql) === TRUE) {
            $status = ["status"=>"sucesso"];
        } else {
            $status = ["status"=>"erro: " . $this->conn->error];
        }
        return json_encode($status);
    }
}

?>