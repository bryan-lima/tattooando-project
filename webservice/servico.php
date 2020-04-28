<?php

class Servico {
    private $id;
    private $fkStudioId;
    private $nome;
    private $descricao;
    private $preco;
    private $tempoMedio;

    // Construtor
    function __construct($servico) {
        if(isset($servico->id))
        $this->id = $servico->id;
        $this->fkStudioId = $servico->fkStudioId;
        $this->nome = $servico->nome;
        $this->descricao = $servico->descricao;
        $this->preco = $servico->preco;
        $this->tempoMedio = $servico->tempoMedio;
    }

    // Funções getters
    function getId()  {
        return $this->id;
    }

    function getFkStudioId() {
        return $this->fkStudioId;
    }

    function getNome() {
        return $this->nome;
    }

    function getDescricao() {
        return $this->descricao;
    }

    function getPreco() {
        return $this->preco;
    }

    function getTempoMedio() {
        return $this->tempoMedio;
    }
}

?>