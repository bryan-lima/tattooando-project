<?php

include_once "model/studio.php";
include_once "dao/studioDao.php";
header('Content-Type: application/json; charset=utf-8');

// Captura o método de requisição e armazena na váriavel
$metodo = $_SERVER['REQUEST_METHOD'];

// Modelo arquitetural REST
if($metodo == "GET") {
    $StudioDao = new StudioDao();
    if(isset($_GET['id'])) {
        $StudioDao->listarStudio($_GET['id']);
    } else {
        $StudioDao->listarTodosStudios();
    }

} else if($metodo == "POST") {

} else if($metodo == "PUT") {

} else if($metodo == "DELETE") {

}

?>