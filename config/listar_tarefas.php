<?php

require_once "../includes/database.php";

// Testar a conexão com o banco de dados
try {
    $conn = getConnection();
    echo "Conexão bem-sucedida!<br/>";
} catch (PDOException $e) {
    echo "Erro de conexão com o banco de dados: " . $e->getMessage();
    exit();
}

// Consulta para obter todas as tarefas com os dados de tarefa_pessoal e tarefa_profissional
$query = "SELECT tarefa.id, tarefa.titulo, tarefa.descricao, tarefa.tipo, tarefa.prioridade, tarefa.status, tarefa_pessoal.data, tarefa_pessoal.hora, tarefa_profissional.projeto, tarefa_profissional.prazo
          FROM tarefa
          LEFT JOIN tarefa_pessoal ON tarefa.id = tarefa_pessoal.id
          LEFT JOIN tarefa_profissional ON tarefa.id = tarefa_profissional.id";
$stmt = $conn->query($query);
$tarefas = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Exibir as tarefas
foreach ($tarefas as $tarefa) {
    echo "ID: " . $tarefa['id'] . "<br>";
    echo "Título: " . $tarefa['titulo'] . "<br>";
    echo "Descrição: " . $tarefa['descricao'] . "<br>";
    echo "Tipo: " . $tarefa['tipo'] . "<br>";
    echo "Prioridade: " . $tarefa['prioridade'] . "<br>";
    echo "Status: " . $tarefa['status'] . "<br>";
    echo "Data: " . $tarefa['data'] . "<br>"; // Adicionei a exibição da data de tarefa_pessoal
    echo "Hora: " . $tarefa['hora'] . "<br>"; // Adicionei a exibição da hora de tarefa_pessoal
    echo "Projeto: " . $tarefa['projeto'] . "<br>"; // Adicionei a exibição do projeto de tarefa_profissional
    echo "Prazo: " . $tarefa['prazo'] . "<br>"; // Adicionei a exibição do prazo de tarefa_profissional
    echo "<br>";
}

?>
