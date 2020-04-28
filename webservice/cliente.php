<?php

class Cliente {
    private $id;
    private $tipoUsuario;
    private $nome;
    private $cpf;
    private $nascimento;
    private $telefone;
    private $email;
    private $senha;
    private $fkEnderecoId;

    // Construtor
    function __construct($cliente) {
        if(isset($cliente->id))
        $this->id = $cliente->id;
        $this->tipoUsuario = $cliente->tipoUsuario;
        $this->nome = $cliente->nome; 
        $this->cpf = $cliente->cpf;
        $this->nascimento = $cliente->nascimento;
        $this->telefone = $cliente->telefone;
        $this->email = $cliente->email;
        $this->senha = $cliente->senha;
        $this->fkEnderecoId = $cliente->fkEnderecoId;
    }

    // Funções getters
    function getId() {
        return $this->id;
    }

    function getTipoUsuario() {
        return $this->tipoUsuario;
    }

    function getNome() {
        return $this->nome;
    }

    function getCpf() {
        return $this->cpf;
    }

    function getNascimento() {
        return $this->nascimento;
    }

    function getTelefone() {
        return $this->telefone;
    }

    function getEmail() {
        return $this->email;
    }

    function getSenha() {
        return $this->senha;
    }

    function getfkEnderecoId() {
        return $this->fkEnderecoId;
    }
}

?>
