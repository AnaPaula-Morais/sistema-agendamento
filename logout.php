<?php
    session_start(); // Inicia a sessão
    session_destroy(); // Destroi todos os dados da sessão
    header("Location: index.html"); // Redireciona para a página de login
    exit;
?>