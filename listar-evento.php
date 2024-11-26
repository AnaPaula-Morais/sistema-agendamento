<?php 
    require("./conexao.php");

    // 1. entender todo o código, explicar cada linha
    // 2. estudar select com where
    // 3. pegar e usar na consulta parametros start e end
    // 4. ler doc do componente e descobrir quais atributos o evento possui
    // 5. fazer as modificacoes necessarias para apresentar nome do paciente etc....
    // 6. criar modal com bootstrap

    $query_agendamentos = "SELECT a.id, a.dataConsulta, a.motivoConsulta, a.horaConsulta, c.nome ". 
    "FROM agendamentos a JOIN clientes c ON c.id = a.Clientes_id ";
    
    $result = $pdo -> prepare($query_agendamentos);
    $result -> execute();
    $agendamentos = [];
    while($row_agendamentos = $result -> fetch(PDO::FETCH_ASSOC)){
        extract($row_agendamentos);
        $agendamentos[]= [
            'id'=> $row_agendamentos['id'],
            'title' => $row_agendamentos['nome'] . ' - ' . $row_agendamentos['horaConsulta'],
            'time' => $row_agendamentos['horaConsulta'],
            'start'=> $row_agendamentos['dataConsulta']
            // 'end' poderia adicionar 1h por padrao


        ];
    }
    header('Content-Type: application/json');
    echo json_encode($agendamentos);
?>