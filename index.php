<?php
// Token-based authentication
$token = $_GET['token'] ?? $_COOKIE['auth_token'] ?? '';

if (empty($token)) {
    header("Location: login/login.php");
    exit();
}

// Validate token (you can implement more sophisticated validation)
if (strlen($token) < 32) {
    header("Location: login/login.php");
    exit();
}

// Optional: Store token in session for additional security
session_start();
$_SESSION['auth_token'] = $token;
$_SESSION['authenticated'] = true;
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Gerenciamento</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="login/styles.css">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="#">
                <i class="fas fa-cogs me-2"></i>
                Sistema de Gerenciamento
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="#dashboard">
                            <i class="fas fa-tachometer-alt me-1"></i>Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#usuarios">
                            <i class="fas fa-users me-1"></i>Usuários
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#configuracoes">
                            <i class="fas fa-cog me-1"></i>Configurações
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login/logout.php">
                            <i class="fas fa-sign-out-alt me-1"></i>Sair
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero bg-gradient text-white py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h1 class="display-4 fw-bold mb-4">Bem-vindo ao Sistema</h1>
                    <p class="lead mb-4">Gerencie usuários, configure o sistema e monitore todas as atividades em um só lugar.</p>
                    <a href="#dashboard" class="btn btn-light btn-lg me-3">
                        <i class="fas fa-play me-2"></i>Começar
                    </a>
                    <a href="#ajuda" class="btn btn-outline-light btn-lg">
                        <i class="fas fa-question-circle me-2"></i>Ajuda
                    </a>
                </div>
                <div class="col-lg-6">
                    <img src="https://via.placeholder.com/500x300/667eea/ffffff?text=Sistema+de+Gerenciamento" alt="Sistema" class="img-fluid rounded shadow">
                </div>
            </div>
        </div>
    </section>

    <!-- Dashboard Section -->
    <section id="dashboard" class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center mb-5">
                <i class="fas fa-tachometer-alt text-primary me-2"></i>
                Dashboard
            </h2>
            <div class="row g-4">
                <div class="col-md-3">
                    <div class="card text-center h-100 shadow-sm">
                        <div class="card-body">
                            <i class="fas fa-users fa-3x text-primary mb-3"></i>
                            <h5 class="card-title">Usuários Ativos</h5>
                            <h3 class="text-primary">1,234</h3>
                            <p class="text-muted">+12% este mês</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card text-center h-100 shadow-sm">
                        <div class="card-body">
                            <i class="fas fa-chart-line fa-3x text-success mb-3"></i>
                            <h5 class="card-title">Acessos Hoje</h5>
                            <h3 class="text-success">567</h3>
                            <p class="text-muted">+8% hoje</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card text-center h-100 shadow-sm">
                        <div class="card-body">
                            <i class="fas fa-server fa-3x text-warning mb-3"></i>
                            <h5 class="card-title">Serviços Online</h5>
                            <h3 class="text-warning">99.9%</h3>
                            <p class="text-muted">Uptime</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card text-center h-100 shadow-sm">
                        <div class="card-body">
                            <i class="fas fa-shield-alt fa-3x text-danger mb-3"></i>
                            <h5 class="card-title">Segurança</h5>
                            <h3 class="text-danger">100%</h3>
                            <p class="text-muted">Protegido</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Funcionalidades Section -->
    <section id="usuarios" class="py-5">
        <div class="container">
            <h2 class="text-center mb-5">
                <i class="fas fa-users text-primary me-2"></i>
                Gerenciamento de Usuários
            </h2>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body text-center">
                            <i class="fas fa-user-plus fa-4x text-success mb-3"></i>
                            <h5 class="card-title">Adicionar Usuário</h5>
                            <p class="card-text">Crie novas contas de usuário com permissões personalizadas.</p>
                            <a href="login/signup.php" class="btn btn-success">
                                <i class="fas fa-plus me-2"></i>Adicionar
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body text-center">
                            <i class="fas fa-edit fa-4x text-primary mb-3"></i>
                            <h5 class="card-title">Editar Usuários</h5>
                            <p class="card-text">Gerencie e edite informações de usuários existentes.</p>
                            <a href="login/edit_users.php" class="btn btn-primary">
                                <i class="fas fa-edit me-2"></i>Editar
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body text-center">
                            <i class="fas fa-key fa-4x text-warning mb-3"></i>
                            <h5 class="card-title">Recuperação de Senha</h5>
                            <p class="card-text">Ajude usuários a recuperarem o acesso às suas contas.</p>
                            <a href="login/recover.php" class="btn btn-warning">
                                <i class="fas fa-key me-2"></i>Recuperar
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Configurações Section -->
    <section id="configuracoes" class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center mb-5">
                <i class="fas fa-cog text-primary me-2"></i>
                Configurações do Sistema
            </h2>
            <div class="row g-4">
                <div class="col-md-6">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">
                                <i class="fas fa-database text-primary me-2"></i>
                                Banco de Dados
                            </h5>
                            <p class="card-text">Configure conexões de banco de dados e parâmetros de segurança.</p>
                            <button class="btn btn-outline-primary" disabled>
                                <i class="fas fa-database me-2"></i>Configurar DB
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">
                                <i class="fas fa-envelope text-success me-2"></i>
                                E-mail
                            </h5>
                            <p class="card-text">Configure servidores SMTP e templates de e-mail.</p>
                            <button class="btn btn-outline-success" disabled>
                                <i class="fas fa-envelope me-2"></i>Configurar E-mail
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">
                                <i class="fas fa-shield-alt text-warning me-2"></i>
                                Segurança
                            </h5>
                            <p class="card-text">Gerencie políticas de senha e configurações de segurança.</p>
                            <button class="btn btn-outline-warning" disabled>
                                <i class="fas fa-shield-alt me-2"></i>Configurar Segurança
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">
                                <i class="fas fa-file-alt text-info me-2"></i>
                                Logs do Sistema
                            </h5>
                            <p class="card-text">Visualize e gerencie logs de atividades do sistema.</p>
                            <button class="btn btn-outline-info" disabled>
                                <i class="fas fa-file-alt me-2"></i>Ver Logs
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-dark text-white py-4 mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h5>Sistema de Gerenciamento</h5>
                    <p>Versão 1.0.0 - Desenvolvido com tecnologia moderna</p>
                </div>
                <div class="col-md-6 text-end">
                    <p>&copy; 2024 Todos os direitos reservados</p>
                    <div>
                        <a href="#" class="text-white me-3">
                            <i class="fab fa-facebook"></i>
                        </a>
                        <a href="#" class="text-white me-3">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="text-white">
                            <i class="fab fa-linkedin"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Smooth scrolling for navigation links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth'
                    });
                }
            });
        });
    </script>
</body>
</html>
