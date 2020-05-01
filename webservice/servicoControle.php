<?php

include_once "model/servico.php";
include_once "dao/servicoDao.php";
header('Content-Type: application/json; charset=utf-8');

// Captura o método de requisição e armazena na váriavel
$metodo = $_SERVER['REQUEST_METHOD'];

// Modelo arquitetural REST
if($metodo == "GET") {
    $ServicoDao = new ServicoDao();
    if(isset($_GET['id'])) {
        $ServicoDao->listarServicoPorId($_GET['id']);
    } else if(isset($_GET['fkStudioId'])) {
        $ServicoDao->listarServicoPorStudio($_GET['fkStudioId']);
    } else {
        $ServicoDao->listarTodosServicos();
    }

} else if($metodo == "POST") {
    $json = file_get_contents('php://input');
    $servico = json_decode($json);
    $ServicoDao = new ServicoDao();
    $Servico = new Servico($servico);
    echo $ServicoDao->inserirServico($Servico);

} else if($metodo == "PUT") {
    $json = file_get_contents('php://input');
    $servico = json_decode($json);
    $ServicoDao = new ServicoDao();
    $Servico = new Servico($servico);
    echo $ServicoDao->atualizarServico($Servico);

} else if($metodo == "DELETE") {
    $json = file_get_contents('php://input');
    $servico = json_decode($json);
    $ServicoDao = new ServicoDao();
    $Servico = new Servico($servico);
    echo $ServicoDao->deletarServico($Servico);

}

?>