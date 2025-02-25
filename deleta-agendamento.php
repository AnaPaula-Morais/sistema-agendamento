<?php 
    require('./conexao.php');
    session_start();

    if (!isset($_SESSION['usuario_id']) || $_SESSION['usuario_tipo'] != 'admin') {
        echo "<script>alert('Acesso negado! Somente o administrador pode excluir agendamentos.'); window.location.href = 'listar-agendamentos.php';</script>";
        exit();
    }
    
    if(isset($_POST['id'])){

        $id = intval($_POST['id']);

        try {
            // Buscar a data e hora do agendamento
            $query = "SELECT dataConsulta, horaConsulta FROM agendamentos WHERE id = :id";
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            $agendamento = $stmt->fetch(PDO::FETCH_ASSOC);
    
            // Se o agendamento não existir
            if (!$agendamento) {
                echo "<script>alert('Agendamento não encontrado!'); window.location.href = 'listar-agendamentos.php';</script>";
                exit();
            }
    
            // Criar objeto DateTime para a consulta e para a data atual
            $dataHoraConsulta = new DateTime($agendamento['dataConsulta'] . ' ' . $agendamento['horaConsulta']);
            $dataHoraAtual = new DateTime();
    
            // Calcular a diferença em horas
            $diferencaHoras = $dataHoraAtual->diff($dataHoraConsulta)->h + ($dataHoraAtual->diff($dataHoraConsulta)->days * 24);
    
            // Se faltam menos de 72 horas, impedir exclusão
            if ($diferencaHoras < 72) {
                echo "<script>alert('Não é possível excluir o agendamento. Faltam menos de 72 horas para a consulta!'); window.location.href = 'listar-agendamentos.php';</script>";
                exit();
            }
    
    
            $query = " DELETE FROM agendamentos WHERE id = :id";
            $stmt = $pdo -> prepare($query);
            $stmt -> bindParam(':id', $id, PDO::PARAM_INT);
            $stmt ->execute();

            echo "<script>alert('Agendamento excluído com sucesso!'); window.location.href = 'listar-agendamentos.php';</script>";

        } catch (PDOException $e) {
            echo "<script>alert('Erro ao excluir agendamento: " . $e->getMessage() . "'); window.location.href = 'listar-agendamentos.php';</script>";
        }
        } else {
            echo "<script>alert('ID inválido!'); window.location.href = 'listar-agendamentos.php';</script>";
    }   
    







?>