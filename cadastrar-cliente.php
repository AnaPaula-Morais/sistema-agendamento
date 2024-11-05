<?php 

    require("./conexao.php");

    $nome = filter_input(INPUT_POST, 'nomeCliente');
    $sexo = filter_input(INPUT_POST, 'sexoCliente');
    $dataNasc = filter_input(INPUT_POST, 'dataNascimento');
    $convenio = filter_input(INPUT_POST, 'convenioCliente');
    $endereco = filter_input(INPUT_POST, 'inputEndereco');
    $cidade = filter_input(INPUT_POST, 'inputCidade');
    $email = filter_input(INPUT_POST, 'emailCliente', FILTER_VALIDATE_EMAIL);
    $telefone = filter_input(INPUT_POST, 'inputTelefone');
    $cpf = filter_input(INPUT_POST, 'inputCPF');
    $observacoes = filter_input(INPUT_POST, 'textarea');

    if($nome && $email && $sexo && $dataNasc && $convenio && $endereco && $cidade && $telefone && $cpf && $observacoes){
        // SQL injection
        $pdo -> query("INSERT INTO clientes(nome,email,sexo,dataNascimento,convenio,endereco,cidade,telefone,cpf,obs) VALUES ('$nome' ,'$email', '$sexo', '$dataNasc', '$convenio', '$endereco', '$cidade', '$telefone', '$cpf', '$observacoes')");
    }else{
        header('location:./novo-cliente.html');
        exit;
    }

    echo "Cliente cadastrado com sucesso!";

?>