<?php 

    require("./conexao.php");

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    //oid é passado quando quando se quer fazer uma atualização no cadastro
    $id = filter_input(INPUT_POST, 'id');
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

    // se todos os campos estiverem preenchidos entra no if
    if($nome && $email && $sexo && $dataNasc && $convenio && $endereco && $cidade && $telefone && $cpf){
        
        

        //se for passado um id entra neste outro if e faz um update do cliente
        if($id){
            $pdo -> query("UPDATE clientes SET nome ='$nome', email = '$email', sexo = '$sexo', dataNascimento = '$dataNasc', convenio = '$convenio', endereco = '$endereco', cidade = '$cidade', telefone = '$telefone', cpf = '$cpf', obs = '$observacoes'  WHERE id = $id");
        }

        //Verifica se o email já está cadastrado
        $sql = $pdo->prepare("SELECT * FROM clientes WHERE email = :email");
        $sql ->bindValue('email', $email);
        $sql ->execute();

        if($sql ->rowCount() === 0){
            // SQL injection
            $pdo -> query("INSERT INTO clientes(nome,email,sexo,dataNascimento,convenio,endereco,cidade,telefone,cpf,obs) VALUES ('$nome' ,'$email', '$sexo', '$dataNasc', '$convenio', '$endereco', '$cidade', '$telefone', '$cpf', '$observacoes')");

            header('location:./clientes.php');
            exit;
        }else{
            echo"Email já cadastrado";
        exit;
        }
    }else{
        header('location:./novo-cliente.html');
        exit;
    }
    if($id){
        echo "Cadastro atualizado com sucesso!";
    }else{
        echo "Cliente cadastrado com sucesso!";
    }
    

?>