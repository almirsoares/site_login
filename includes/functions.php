<?php
function registerUser($username, $email, $password) {
    global $pdo;
    
    // Validações básicas
    if (empty($username) || empty($email) || empty($password)) {
        return "Todos os campos são obrigatórios!";
    }
    
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return "Email inválido!";
    }
    
    if (strlen($password) < 8) {
        return "A senha deve ter pelo menos 8 caracteres!";
    }
    
    // Verifica se usuário/email já existe
    $stmt = $pdo->prepare("SELECT id FROM users WHERE username = ? OR email = ?");
    $stmt->execute([$username, $email]);
    
    if ($stmt->rowCount() > 0) {
        return "Usuário ou email já cadastrado!";
    }
    
    // Cria hash da senha
    $passwordHash = password_hash($password, PASSWORD_BCRYPT);
    
    // Insere no banco
    try {
        $stmt = $pdo->prepare("INSERT INTO users (username, email, password_hash) VALUES (?, ?, ?)");
        $stmt->execute([$username, $email, $passwordHash]);
        
        return true; // Sucesso
    } catch (PDOException $e) {
        error_log("Erro ao registrar usuário: " . $e->getMessage());
        return "Erro ao registrar. Tente novamente mais tarde.";
    }
}

function isLoggedIn() {
    return isset($_SESSION['logged_in']) && $_SESSION['logged_in'];
}

function redirectIfNotLoggedIn() {
    if (!isLoggedIn()) {
        header('Location: login.php');
        exit;
    }
}
?>