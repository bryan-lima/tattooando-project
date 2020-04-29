<?php

include_once "conexao.php";
include_once "horarioFuncionamento.php";

class HorarioFuncionamento {
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
}

?>