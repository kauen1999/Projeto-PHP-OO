<?php
$errorMessage = ''; // Define a variável $errorMessage
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Verifica as credenciais
    if ($username === 'admin' && $password === '123456') {
        echo 'Login bem-sucedido!';
    } else {
        $errorMessage = 'Credenciais inválidas!';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Erro</title>
</head>
<body>
    <?php if ($errorMessage !== ''): ?>
        <p><?php echo $errorMessage; ?></p>
    <?php endif; ?>
    <a href="login.php">Voltar para o login</a>
</body>
</html>
