<?php 
    require('./conexao.php');

    if(isset($_POST['id'])){

        $id = intval($_POST['id']);
    
        $query = " DELETE FROM clientes WHERE id = :id";
        $stmt = $pdo -> prepare($query);
        $stmt -> bindParam(':id', $id, PDO::PARAM_INT);
        $stmt ->execute();
    }

    header("location:./clientes.php");





?>