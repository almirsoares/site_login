<?php
require_once 'includes/config.php';
require_once 'includes/auth.php';

// Verifica se o usuário está logado
if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | Seu Site</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <header class="dashboard-header">
        <div class="container">
            <h1>Bem-vindo, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h1>
            <nav>
                <a href="logout.php" class="btn-logout">Sair</a>
            </nav>
        </div>
    </header>
    
    <main class="dashboard-content">
        <div class="container">
            <section class="user-info">
                <h2>Seu Painel</h2>
                <p>Conteúdo exclusivo para usuários logados.</p>
            </section>
        </div>
    </main>
    
    <script src="assets/js/script.js"></script>
</body>
</html>