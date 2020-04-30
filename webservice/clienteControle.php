<?php

include_once "model/cliente.php";
include_once "dao/clienteDao.php";
header('Content-Type: application/json; charset=utf-8');

// Captura o método de requisição e armazena na váriavel
$metodo = $_SERVER['REQUEST_METHOD'];

// Modelo arquitetural REST
if($metodo == "GET") {
    $ClienteDao = new ClienteDao();
    if(isset($_GET['id'])) {
        $ClienteDao->listarCliente($_GET['id']);
    } else {
        $ClienteDao->listarTodosClientes();
    }
    
} else if($metodo == "POST") {

} else if($metodo == "PUT") {

} else if($metodo == "DELETE") {

}

?>