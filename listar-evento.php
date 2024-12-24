
<?php 
    // este código serve para add eventos no calendário


    
    // faz conexão com o banco de dados
    require("./conexao.php");

    // 1. entender todo o código, explicar cada linha
    // 2. estudar select com where
    // 3. pegar e usar na consulta parametros start e end
    // 4. ler doc do componente e descobrir quais atributos o evento possui
    // 5. fazer as modificacoes necessarias para apresentar nome do paciente etc....
    // 6. criar modal com bootstrap
    
    //o parametro start e end é enviado pelo componente calendário
    $dataInicio = $_GET['start'];
    $dataFinal = $_GET['end'];
    // a faz referencia a agendamentos(isso se chama alias)
    $query_agendamentos = "SELECT a.id, a.dataConsulta, a.motivoConsulta, a.horaConsulta, c.nome ". 
    "FROM agendamentos a JOIN clientes c ON c.id = a.Clientes_id " . 
    "WHERE  a.dataConsulta >= '$dataInicio' and a.dataConsulta <= '$dataFinal'";
    
    //serve para preparar e executar a query
    $result = $pdo -> prepare($query_agendamentos);
    $result -> execute();
    //cria uma variável com um array vazio
    $agendamentos = [];
    //percorre as linhas retornado pela consulta e add no array agendamentos
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
    //add um header na resposta http indicando o conteúdo da resposta que é um json
    header('Content-Type: application/json');
    // escreve json para a resposta
    echo json_encode($agendamentos);
?>