<?php 
    require("./conexao.php");

// select id from clientes where cpf =

    $idCliente = filter_input(INPUT_POST, 'idCliente', FILTER_VALIDATE_INT);
    $profissional = filter_input(INPUT_POST, 'inputProfissional');
    $dataConsulta = filter_input(INPUT_POST, 'dataConsulta');
    $horaConsulta = filter_input(INPUT_POST, 'horaConsulta');
    $convenio = filter_input(INPUT_POST, 'convenioCliente');
    $motivoConsulta = filter_input(INPUT_POST, 'motivoConsulta');

    // se os campos estiverem preenchidos
    if($idCliente && $profissional && $dataConsulta && $horaConsulta && $convenio && $motivoConsulta){
        $pdo -> query("INSERT INTO agendamentos(profissional, dataConsulta, horaConsulta, convenio, motivoConsulta, Clientes_id) VALUES ('$profissional', '$dataConsulta', '$horaConsulta', '$convenio', '$motivoConsulta', '$idCliente')");
    }else{

        echo "id cliente enviado:".$idCliente .'<br>';
        echo $profissional .'<br>';
        echo $dataConsulta .'<br>';
        echo $horaConsulta .'<br>';
        echo $convenio .'<br>';
        echo $motivoConsulta .'<br>';
    }

    // como fazer debug?

?>