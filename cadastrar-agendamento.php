<?php 
    require("./conexao.php");


    $idCliente = filter_input(INPUT_POST, 'idCliente', FILTER_VALIDATE_INT);
    $profissional = filter_input(INPUT_POST, 'inputProfissional');
    $dataConsulta = filter_input(INPUT_POST, 'dataConsulta');
    $horaConsulta = filter_input(INPUT_POST, 'horaConsulta');
    $convenio = filter_input(INPUT_POST, 'convenioCliente');
    $motivoConsulta = filter_input(INPUT_POST, 'motivoConsulta');

    // se os campos estiverem preenchidos
    if($idCliente && $profissional && $dataConsulta && $horaConsulta && $convenio && $motivoConsulta){
        $pdo -> query("INSERT INTO agendamentos(profissional, dataConsulta, horaConsulta, convenio, motivoConsulta, Clientes_id) VALUES ('$profissional', '$dataConsulta', '$horaConsulta', '$convenio', '$motivoConsulta', '$idCliente')");

        //isto é um função para redirecionar para outra página
        header("location:./paginaInicial.php");
    }else{

        echo "id cliente enviado:".$idCliente .'<br>';
        echo $profissional .'<br>';
        echo $dataConsulta .'<br>';
        echo $horaConsulta .'<br>';
        echo $convenio .'<br>';
        echo $motivoConsulta .'<br>';
    }
    

?>