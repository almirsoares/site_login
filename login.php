<?php
require_once 'config.php';
require_once 'functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['username'], $_POST['password'])) {
    $username = trim($_POST['username']);
    $password = $_POST['password'];
    
    // Verifica se é email ou username
    $isEmail = filter_var($username, FILTER_VALIDATE_EMAIL);
    $field = $isEmail ? 'email' : 'username';
    
    try {
        $stmt = $pdo->prepare("SELECT id, username, password_hash FROM users WHERE $field = ? AND is_active = TRUE LIMIT 1");
        $stmt->execute([$username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($user && password_verify($password, $user['password_hash'])) {
            // Login bem-sucedido
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['logged_in'] = true;
            
            // Atualiza último login
            $update = $pdo->prepare("UPDATE users SET last_login = NOW() WHERE id = ?");
            $update->execute([$user['id']]);
            
            header('Location: dashboard.php');
            exit;
        } else {
            // Credenciais inválidas
            $_SESSION['login_error'] = "Credenciais inválidas!";
            header('Location: login.php');
            exit;
        }
    } catch (PDOException $e) {
        error_log("Erro de login: " . $e->getMessage());
        $_SESSION['login_error'] = "Erro no sistema. Tente novamente mais tarde.";
        header('Location: login.php');
        exit;
    }
} else {
    header('Location: login.php');
    exit;
}
?>