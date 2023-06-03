<?php
require_once 'classes/Tarefa.php'; // Inclui o arquivo que contém a classe Tarefa

class TarefaPessoal extends Tarefa {
    private $responsavel;

    public function __construct($titulo, $descricao, $prioridade, $data, $status, $responsavel) {
        parent::__construct($titulo, $descricao, $prioridade, $data, $status);
        $this->responsavel = $responsavel;
    }

    public function getResponsavel() {
        return $this->responsavel;
    }

    public function setResponsavel($responsavel) {
        $this->responsavel = $responsavel;
    }
}
?>
