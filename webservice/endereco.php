<?php

class Endereco {
    private $id;
    private $cep;
    private $numero;
    private $complemento;

    // Construtor
    function __construct($endereco) {
        if(isset($endereco->id))
        $this->id = $endereco->id;
        $this->cep = $endereco->cep;
        $this->numero = $endereco->numero;
        $this->complemento = $endereco->complemento;
    }

    // Funções getters
    function getId() {
        return $this->id;
    }

    function getCep() {
        return $this->cep;
    }

    function getNumero() {
        return $this->numero;
    }

    function getComplemento() {
        return $this->complemento;
    }
}

?>