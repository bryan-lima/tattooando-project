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
}

?>