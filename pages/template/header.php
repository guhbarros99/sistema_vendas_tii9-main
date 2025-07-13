<?php
// Inclui o serviço de autenticação para verificar o status do login
// Usar __DIR__ garante que o caminho funcione de qualquer página que inclua este header
require_once __DIR__ . '/../../services/authService.php'; 
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8"> <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Vendas</title>
    <link rel="stylesheet" href="/sistema_vendas_tii09/public/css/style.css">
</head>
<body>

<header class="toolbar">
    <div class="logo-nav">
        <a href="/sistema_vendas_tii09/index.php" class="logo">
            <img src="/sistema_vendas_tii09/public/img/logo.jpg" alt="Logo da Empresa">
        </a>
        <nav class="nav-menu">
            <a href="/sistema_vendas_tii09/index.php">Home</a>            
            <?php if (isAdmin()): ?>
                <a href="/sistema_vendas_tii09/pages/categorias/index.php">Gerenciar Categorias</a>
                <a href="/sistema_vendas_tii09/pages/produtos/index.php">Gerenciar Produtos</a>
                <a href="/sistema_vendas_tii09/pages/admin/usuarios.php">Gerenciar Usuários</a>
            <?php endif; ?>
        </nav>
    </div>

    <div class="user-actions">
        <a href="/sistema_vendas_tii09/pages/carrinho/index.php" class="cart-button">
            <span class="cart-icon">🛒</span>
            <span id="cart-counter" class="cart-badge">0</span>
        </a>
        
        <?php
        // Busca o estado do usuário uma única vez
        $loggedUser = getLoggedUser(); 
        
        // Renderização condicional baseada no estado de login
        if ($loggedUser): 
        ?>
            <span class="welcome-message">Olá, <?= htmlspecialchars(explode(' ', $loggedUser->getNomeCompleto())[0]) ?></span>
            <a href="/sistema_vendas_tii09/pages/usuarios/logout.php" class="auth-link">Sair</a>
        <?php else: ?>
            <a href="/sistema_vendas_tii09/pages/usuarios/login.php" class="auth-link">Entre ou Cadastre-se</a>
        <?php endif; ?>
    </div>
</header>

<main class="container">