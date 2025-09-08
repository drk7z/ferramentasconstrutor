<?php
session_start();
include 'config.php';

$message = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST['user'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE user='$user'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            // Generate authentication token
            $token = bin2hex(random_bytes(32)); // 64 character token

            $_SESSION['user'] = $user;
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['auth_token'] = $token;

            // Set token as cookie for persistence
            setcookie('auth_token', $token, time() + (86400 * 30), "/"); // 30 days

            $message = "Login realizado com sucesso! Redirecionando...";
        } else {
            $message = "Senha incorreta.";
        }
    } else {
        $message = "Usuário não encontrado.";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela de Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="card p-4 shadow" style="width: 100%; max-width: 400px;">
            <h2 class="text-center mb-4">Login</h2>
            <?php if ($message != "") { echo "<div class='alert alert-info'>$message</div>"; } ?>
            <form id="loginForm" action="login.php" method="post">
                <div class="mb-3">
                    <label for="user" class="form-label">Usuário</label>
                    <input type="text" class="form-control" id="user" name="user" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Senha</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <button type="submit" class="btn btn-primary w-100" id="loginBtn" disabled>Entrar</button>
            </form>
            <?php if ($message == "Login realizado com sucesso! Redirecionando...") { echo "<script> setTimeout(function(){ window.location.href = '../index.php'; }, 2000); </script>"; } ?>
            <div class="text-center mt-3">
                <button class="btn btn-link" id="recoverBtn">Esqueci a Senha</button>
                <br>
                <button class="btn btn-link" id="signupBtn">Criar Conta</button>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="script.js"></script>
</body>
</html>
