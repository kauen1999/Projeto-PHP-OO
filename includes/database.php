<?php

function getConnection() {
    $host = "localhost"; // Nome do host do banco de dados
    $dbname = "gerenciador"; // Nome do banco de dados
    $username = "root"; // Nome de usuário do banco de dados
    $password = ""; // Senha do banco de dados
    
    // Estabelecer a conexão usando a extensão PDO
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    return $conn;
}

?>
