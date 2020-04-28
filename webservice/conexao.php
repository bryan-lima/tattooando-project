<?php

class Conexao {

    public $servername = "localhost";
    public $username = "root";
    public $password = "";
    public $dbname = "tattooandobd";
    public $conn;

    // Construtor
    function __construct() {
        // Cria a conexão
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        
        // Verifica conexão
        if ($this->conn->connect_error) {
            die("Conexão falhou: " . $conn->connect_error);
        }
    }

    function getConn() {
        return $this->conn;
    }

    function exitConn() {
        return $this->conn;
    }
}
?>