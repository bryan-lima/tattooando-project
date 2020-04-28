<?php

class HorarioFuncionamento {
    private $id;
    private $fkStudioId;
    private $diasAberto;
    private $hrSemanaInicio;
    private $hrSemanaFim;
    private $hrFimSemanaInicio;
    private $hrFimSemanaFim;

    // Construtor
    function __construct($horarioFuncionamento) {
        if(isset($horarioFuncionamento->id))
        $this->id = $horarioFuncionamento->id;
        $this->fkStudioId = $horarioFuncionamento->fkStudioId;
        $this->diasAberto = $horarioFuncionamento->diasAberto;
        $this->hrSemanaInicio = $horarioFuncionamento->hrSemanaInicio;
        $this->hrSemanaFim = $horarioFuncionamento->hrSemanaFim;
        $this->hrFimSemanaInicio = $horarioFuncionamento->hrFimSemanaInicio;
        $this->hrFimSemanaFim = $horarioFuncionamento->hrFimSemanaFim;
    }

    // Funções getters
    function getId() {
        return $this->id;
    }

    function getFkStudioId() {
        return $this->fkStudioId;
    }

    function getDiasAberto() {
        return $this->diasAberto;
    }

    function getHrSemanaInicio() {
        return $this->hrSemanaInicio;
    }

    function getHrSemanaFim() {
        return $this->hrSemanaFim;
    }

    function getHrFimSemanaInicio() {
        return $this->hrFimSemanaInicio;
    }

    function getHrFimSemanaFim() {
        return $this->hrFimSemanaFim;
    }
}

?>