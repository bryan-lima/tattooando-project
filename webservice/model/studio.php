<?php

class Studio {
    private $id;
    private $tipoUsuario;
    private $nome;
    private $cnpj;
    private $telefone;
    private $email;
    private $senha;
    private $fkEnderecoId;

    // Construtor
    function __construct($studio) {
        if(asset($studio->id))
        $this->id = $studio->id;
        $this->tipoUsuario = $studio->tipoUsuario;
        $this->nome = $studio->nome;
        $this->cnpj = $studio->cnpj;
        $this->telefone = $studio->telefone;
        $this->email = $studio->email;
        $this->senha = $studio->senha;
        $this->fkEnderecoId = $studio->fkEnderecoId;
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

    function getCnpj() {
        return $this->cnpj;
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