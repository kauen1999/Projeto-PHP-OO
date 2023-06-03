<?php
require_once "../includes/database.php";
require_once "../classes/Tarefa.php";

$conn = getConnection(); // Obter a conexão com o banco de dados

// Recuperar os valores do formulário
$titulo = isset($_POST['titulo']) ? $_POST['titulo'] : '';
$descricao = isset($_POST['descricao']) ? $_POST['descricao'] : '';
$tipo = isset($_POST['tipo']) ? $_POST['tipo'] : '';
$prioridade = isset($_POST['prioridade']) ? $_POST['prioridade'] : '';
$status = isset($_POST['status']) ? $_POST['status'] : '';
$data = isset($_POST['data']) ? $_POST['data'] : '';
$hora = isset($_POST['hora']) ? $_POST['hora'] : '';
$projeto = isset($_POST['projeto']) ? $_POST['projeto'] : '';
$prazo = isset($_POST['prazo']) ? $_POST['prazo'] : '';

// Criar uma nova instância da classe Tarefa
$tarefa = new Tarefa($titulo, $descricao, $tipo, $prioridade, $status);

// Inserir a nova tarefa no banco de dados
$query = "INSERT INTO tarefa (titulo, descricao, tipo, prioridade, status) VALUES (?, ?, ?, ?, ?)";
$stmt = $conn->prepare($query);
$stmt->execute([$tarefa->getTitulo(), $tarefa->getDescricao(), $tarefa->getTipo(), $tarefa->getPrioridade(), $tarefa->getStatus()]);
$tarefaId = $conn->lastInsertId();

if ($tarefa->getTipo() === "Pessoal") {
    // Inserir na tabela "tarefa_pessoal"
    $query = "INSERT INTO tarefa_pessoal (id, data, hora) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->execute([$tarefaId, $data, $hora]);
} elseif ($tarefa->getTipo() === "Profissional") {
    // Inserir na tabela "tarefa_profissional"
    $query = "INSERT INTO tarefa_profissional (id, projeto, prazo) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->execute([$tarefaId, $projeto, $prazo]);
}

// Redirecionar para a página de listar tarefas
header("Location: ../config/listar_tarefas.php");
exit();
?>
