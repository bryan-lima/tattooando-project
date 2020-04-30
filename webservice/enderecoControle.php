<?php

include_once "model/endereco.php";
include_once "dao/enderecoDao.php";
header('Content-Type: application/json; charset=utf-8');

// Captura o método de requisição e armazena na váriavel
$metodo = $_SERVER['REQUEST_METHOD'];

// Modelo arquitetural REST
if($metodo == "GET") {
    $EnderecoDao = new EnderecoDao();
    if(isset($_GET['id'])) {
        $EnderecoDao->listarEnderecoPorId($_GET['id']);
    } else if(isset($_GET['cep']) && isset($_GET['numero'])) {
        $EnderecoDao->listarEnderecoPorCepENumero($_GET['cep'], $_GET['numero']);
    } else {
        $EnderecoDao->listarTodosEnderecos();
    }

} else if($metodo == "POST") {
    $json = file_get_contents('php://input');
    $endereco = json_decode($json);
    $EnderecoDao = new EnderecoDao();
    $Endereco = new Endereco($endereco);
    echo $EnderecoDao->inserirEndereco($Endereco);

} else if($metodo == "PUT") {
    $json = file_get_contents('php://input');
    $endereco = json_decode($json);
    $EnderecoDao = new EnderecoDao();
    $Endereco = new Endereco($endereco);
    echo $EnderecoDao->atualizarEndereco($Endereco);

} else if($metodo == "DELETE") {
    $json = file_get_contents('php://input');
    $endereco = json_decode($json);
    $EnderecoDao = new EnderecoDao();
    $Endereco = new Endereco($endereco);
    echo $EnderecoDao->deletarEndereco($Endereco);

}

?>