<?php
session_start();
include 'config.php';

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

$message = "";
$user_data = null;

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM users WHERE id='$id'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $user_data = $result->fetch_assoc();
    } else {
        $message = "Usuário não encontrado.";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $user = $_POST['user'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $sql = "UPDATE users SET name='$name', user='$user', email='$email', phone='$phone' WHERE id='$id'";
    if ($conn->query($sql) === TRUE) {
        $message = "Usuário atualizado com sucesso!";
        // Refresh data
        $sql = "SELECT * FROM users WHERE id='$id'";
        $result = $conn->query($sql);
        $user_data = $result->fetch_assoc();
    } else {
        $message = "Erro ao atualizar usuário: " . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuário</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="card p-4 shadow" style="width: 100%; max-width: 500px;">
            <h2 class="text-center mb-4">Editar Usuário</h2>
            <?php if ($message != "") { echo "<div class='alert alert-info'>$message</div>"; } ?>
            <?php if ($user_data): ?>
            <form action="edit_user.php" method="post">
                <input type="hidden" name="id" value="<?php echo $user_data['id']; ?>">
                <div class="mb-3">
                    <label for="name" class="form-label">Nome</label>
                    <input type="text" class="form-control" id="name" name="name" value="<?php echo $user_data['name']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="user" class="form-label">Usuário</label>
                    <input type="text" class="form-control" id="user" name="user" value="<?php echo $user_data['user']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">E-mail</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?php echo $user_data['email']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Telefone</label>
                    <input type="tel" class="form-control" id="phone" name="phone" value="<?php echo $user_data['phone']; ?>" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Atualizar</button>
            </form>
            <?php else: ?>
            <p>Usuário não encontrado.</p>
            <?php endif; ?>
            <div class="text-center mt-3">
                <a href="edit_users.php" class="btn btn-secondary">Voltar</a>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
