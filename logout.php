<?php
require_once 'includes/config.php';

// Destroi todas as variáveis de sessão
$_SESSION = array();

// Destroi a sessão
session_destroy();

// Redireciona para a página de login
header('Location: login.php');
exit;
?>