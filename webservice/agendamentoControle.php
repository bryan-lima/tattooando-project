<?php

include_once "model/agendamento.php";
include_once "dao/agendamentoDao.php";
header('Content-Type: application/json; charset=utf-8');

// Captura o método de requisição e armazena na váriavel
$metodo = $_SERVER['REQUEST_METHOD'];

// Modelo arquitetural REST
if($metodo == "GET") {
    $AgendamentoDao = new AgendamentoDao();
    if(isset($_GET['id'])) {
        $AgendamentoDao->listarAgendamentoPorId($_GET['id']);
    } else if(isset($_GET['fkClienteId'])) {
        $AgendamentoDao->listarAgendamentoPorCliente($_GET['fkClienteId']);
    } else if(isset($_GET['fkServicoId'])) {
        $AgendamentoDao->listarAgendamentoPorServico($_GET['fkServicoId']);
    } else if(isset($_GET['status'])) {
        $AgendamentoDao->listarAgendamentoPorStatus($_GET['status']);
    } else {
        $AgendamentoDao->listarTodosAgendamentos();
    }

} else if($metodo == "POST") {
    $json = file_get_contents('php://input');
    $agendamento = json_decode($json);
    $AgendamentoDao = new AgendamentoDao();
    $Agendamento = new Agendamento($agendamento);
    echo $AgendamentoDao->inserirAgendamento($Agendamento);

} else if($metodo == "PUT") {

} else if($metodo == "DELETE") {

}

?>