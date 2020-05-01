<?php

include_once "model/horarioFuncionamento.php";
include_once "dao/horarioFuncionamentoDao.php";
header('Content-Type: application/json; charset=utf-8');

// Captura o método de requisição e armazena na váriavel
$metodo = $_SERVER['REQUEST_METHOD'];

// Modelo arquitetural REST
if($metodo == "GET") {
    $HorarioFuncionamentoDao = new HorarioFuncionamentoDao();
    if(isset($_GET['id'])) {
        $HorarioFuncionamentoDao->listarHorarioFuncionamentoPorId($_GET['id']);
    } else if(isset($_GET['fkStudioId'])) {
        $HorarioFuncionamentoDao->listarHorarioFuncionamentoPorStudio($_GET['fkStudioId']);
    } else {
        $HorarioFuncionamentoDao->listarTodosHorariosFuncionamento();
    }

} else if($metodo == "POST") {
    $json = file_get_contents('php://input');
    $horarioFuncionamento = json_decode($json);
    $HorarioFuncionamentoDao = new HorarioFuncionamentoDao();
    $HorarioFuncionamento = new HorarioFuncionamento($horarioFuncionamento);
    echo $HorarioFuncionamentoDao->inserirHorarioFuncionamento($HorarioFuncionamento);

} else if($metodo == "PUT") {
    $json = file_get_contents('php://input');
    $horarioFuncionamento = json_decode($json);
    $HorarioFuncionamentoDao = new HorarioFuncionamentoDao();
    $HorarioFuncionamento = new HorarioFuncionamento($horarioFuncionamento);
    echo $HorarioFuncionamentoDao->atualizarHorarioFuncionamento($HorarioFuncionamento);

} else if($metodo == "DELETE") {

}

?>