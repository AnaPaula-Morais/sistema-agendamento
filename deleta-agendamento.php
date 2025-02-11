<?php 
    require('./conexao.php');
    session_start();
    if(isset($_POST['id'])){

        $id = intval($_POST['id']);
    
        $query = " DELETE FROM agendamentos WHERE id = :id";
        $stmt = $pdo -> prepare($query);
        $stmt -> bindParam(':id', $id, PDO::PARAM_INT);
        $stmt ->execute();
    }

   
    if (!isset($_SESSION['usuario_id']) || $_SESSION['usuario_tipo'] != 'admin') {
        echo "Acesso negado, somente o administrador poderá alterar esta página!";
        exit();
    }
    header("location:./listar-agendamentos.php");





?>