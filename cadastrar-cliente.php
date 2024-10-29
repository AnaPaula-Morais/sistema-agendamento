<?php 

    require("./conexao.php");

    $nome = filter_input(INPUT_POST, 'nomeCliente');
    $email = filter_input(INPUT_POST, 'emailCliente', FILTER_VALIDATE_EMAIL);

    if($nome && $email){
        // SQL injection
        $pdo -> query("INSERT INTO clientes(nome,email) VALUES ('$nome' ,'$email')");
    }else{
        header('location:./novo-cliente.html');
        exit;
    }

    echo "Cliente cadastrado com sucesso!";

?>