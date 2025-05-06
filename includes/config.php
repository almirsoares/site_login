<?php
// Configurações do banco de dados
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'site_login');

// Configurações de segurança
define('SECRET_KEY', 'sua_chave_secreta_unica_aqui');

// Inicia a sessão
session_start();

// Conexão com o banco de dados
try {
    $pdo = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro na conexão: " . $e->getMessage());
}

try {
    $stmt = $pdo->query("SELECT username FROM users LIMIT 1");
    echo "✅ Conexão com o banco de dados funcionando! Usuário encontrado: " . $stmt->fetchColumn();
} catch (PDOException $e) {
    die("❌ Erro na conexão: " . $e->getMessage());
}
?>

