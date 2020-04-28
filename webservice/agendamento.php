<?php

class Agendamento {
    private $id;
    private $fkClienteId;
    private $fkServicoId;
    private $dataAgendada;
    private $horaAgendada;
    private $status;

    // Construtor
    function __construct($agendamento) {
        if(isset($agendamento->id))
        $this->id = $agendamento->id;
        $this->fkClienteId = $agendamento->fkClienteId;
        $this->fkServicoId = $agendamento->fkServicoId;
        $this->dataAgendada = $agendamento->dataAgendada;
        $this->horaAgendada = $agendamento->horaAgendada;
        $this->status = $agendamento->status;
    }

    // Funções getters
    function getId() {
        return $this->id;
    }

    function getFkClienteId() {
        return $this->fkClienteId;
    }

    function getFkServicoId() {
        return $this->fkServicoId;
    }

    function getDataAgendada() {
        return $this->dataAgendada;
    }

    function getHoraAgendada() {
        return $this->horaAgendada;
    }

    function getStatus() {
        return $this->status;
    }
}

?>