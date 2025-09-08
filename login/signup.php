<?php
include 'config.php';

$message = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $user = $_POST['user'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $phone = $_POST['phone'];

    // Check if user or email exists
    $sql = "SELECT * FROM users WHERE user='$user' OR email='$email'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $message = "Usuário ou e-mail já existe.";
    } else {
        $sql = "INSERT INTO users (name, user, email, password, phone) VALUES ('$name', '$user', '$email', '$password', '$phone')";
        if ($conn->query($sql) === TRUE) {
            $message = "Conta criada com sucesso!";
        } else {
            $message = "Erro: " . $conn->error;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Conta</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="card p-4 shadow" style="width: 100%; max-width: 400px;">
            <h2 class="text-center mb-4">Criar Conta</h2>
            <?php if ($message != "") { echo "<div class='alert alert-info'>$message</div>"; } ?>
            <form id="signupForm" action="signup.php" method="post">
                <div class="mb-3">
                    <label for="name" class="form-label">Nome</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="mb-3">
                    <label for="user" class="form-label">Usuário</label>
                    <input type="text" class="form-control" id="user" name="user" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">E-mail</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Senha <i class="bi bi-info-circle" data-bs-toggle="tooltip" data-bs-placement="right" title="Requisitos: Pelo menos 8 caracteres, uma letra minúscula, uma maiúscula, um dígito e um caractere especial (@$!%*?&)."></i></label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <div class="mb-3">
                    <label for="confirmPassword" class="form-label">Confirmar Senha</label>
                    <input type="password" class="form-control" id="confirmPassword" required>
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Telefone <i class="bi bi-info-circle" data-bs-toggle="tooltip" data-bs-placement="right" title="Formato: +XX XXX XXXXX-XXXX ou similar internacional."></i></label>
                    <input type="tel" class="form-control" id="phone" name="phone" required>
                </div>
                <button type="submit" class="btn btn-primary w-100" id="signupBtn">Criar Conta</button>
            </form>
            <div class="text-center mt-3">
                <a href="login.php" class="btn btn-link">Voltar ao Login</a>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="signup.js"></script>
</body>
</html>
