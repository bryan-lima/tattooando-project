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

} else if($metodo == "PUT") {

} else if($metodo == "DELETE") {

}

?>