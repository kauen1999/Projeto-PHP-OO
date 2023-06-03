<?php

require_once "Tarefa.php";

class TarefaProfissional extends Tarefa {
    protected $projeto;
    protected $prazo;

    public function __construct($titulo, $descricao, $tipo, $prioridade, $status, $projeto, $prazo) {
        parent::__construct($titulo, $descricao, $tipo, $prioridade, $status);
        $this->projeto = $projeto;
        $this->prazo = $prazo;
    }

    public function getProjeto() {
        return $this->projeto;
    }

    public function getPrazo() {
        return $this->prazo;
    }
}
?>
