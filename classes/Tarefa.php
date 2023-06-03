<?php
class Tarefa {
    protected $id;
    protected $titulo;
    protected $descricao;
    protected $tipo;
    protected $prioridade;
    protected $status;

    public function __construct($titulo, $descricao, $tipo, $prioridade, $status) {
        $this->titulo = $titulo;
        $this->descricao = $descricao;
        $this->tipo = $tipo;
        $this->prioridade = $prioridade;
        $this->status = $status;
    }

    public function getId() {
        return $this->id;
    }

    public function getTitulo() {
        return $this->titulo;
    }

    public function getDescricao() {
        return $this->descricao;
    }

    public function getTipo() {
        return $this->tipo;
    }

    public function getPrioridade() {
        return $this->prioridade;
    }

    public function getStatus() {
        return $this->status;
    }
}
?>