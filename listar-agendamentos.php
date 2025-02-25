<?php 
    require ("./conexao.php");
    session_start(); // Inicia a sessão
    try {
        $sql = "SELECT agendamentos.id, agendamentos.dataConsulta, agendamentos.horaConsulta, 
                   clientes.nome AS nomeCliente FROM agendamentos JOIN clientes ON agendamentos.Clientes_id = clientes.id";
        $stmt = $pdo->query($sql);
        $agendamentos = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Erro ao buscar agendamentoss: " . $e->getMessage();
        exit;
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $email = $_POST['email'] ?? '';
        $senha = $_POST['senha'] ?? '';
        
    
        if (empty($email) || empty($senha)) {
            echo "Preencha todos os campos!";
        } else {
            try {
                // Consulta o usuário no banco de dados
                $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE email = :email");
                $stmt->bindParam(':email', $email, PDO::PARAM_STR);
                $stmt->execute();
    
                $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
    
                if ($usuario && password_verify($senha, $usuario['senha'])) {
                    // Login bem-sucedido, define variáveis de sessão
                    $_SESSION['usuario_id'] = $usuario['id'];
                    $_SESSION['usuario_nome'] = $usuario['nome'];
                    $_SESSION['usuario_tipo'] = $usuario['tipo'];
                    header("Location: paginaInicial.php"); // Redireciona para a página principal
                    exit;
                } else {
                    echo "Email ou senha incorretos!";
                }
            } catch (PDOException $e) {
                echo "Erro ao acessar o banco de dados: " . $e->getMessage();
            }
        }
    }

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar agendamentos</title>
    <link rel="stylesheet" href="./assets/css/style.css">
    <!--links bootstrap-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="./assets/js/funcoesjs.js"></script>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    
        .linkSair{
        color: white;
        margin-left: 10px;
        
      }
    
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="./paginaInicial.php"><img class="img-logo" src="./assets/logo.png" alt="logo"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#conteudoNavbarSuportado" aria-controls="conteudoNavbarSuportado" aria-expanded="false" aria-label="Alterna navegação">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="conteudoNavbarSuportado">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="./paginaInicial.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./novo-cliente.html">Cadastrar Cliente</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./clientes.php">Clientes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="./listar-agendamentos.php">Agendamentos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Configurações</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2 " type="search" placeholder="Pesquisar" aria-label="Pesquisar">
                <button class="btn btn-light my-2 my-sm-0 " type="submit">Pesquisar</button>
                <a class="linkSair" href="./logout.php" onclick="return confirm('Tem certeza que deseja sair?');">Sair</a>
            </form>
        </div>
    </nav>

    <div class="m-3">
        <h1>Lista de Agendamentos</h1>
        <table>
            <thead>
                <th>ID</th>
                <th>NOME</th>
                <th>DATA DA CONSULTA</th>
                <th>HORA DA CONSULTA</th>
                <th>OPÇÕES</th>
            </thead>
            <tbody>
                <?php foreach ($agendamentos as $agendamento): ?>
                    <tr>
                        <td><?= htmlspecialchars($agendamento['id']) ?></td>
                        <td><?= htmlspecialchars($agendamento['nomeCliente']) ?></td>
                        <td><?= htmlspecialchars($agendamento['dataConsulta']) ?></td>
                        <td><?= htmlspecialchars($agendamento['horaConsulta']) ?></td>
                        <td>
                            <?php if($_SESSION['usuario_tipo'] == 'admin'): ?>

                            <button onclick="window.location.href='editar-cliente.php?id=<?php echo $agendamento['id']; ?>'" class="btn btn-success">Editar</button>

                            <form method="post" action="./deleta-agendamento.php">
                                <input  name="id" type="hidden" value="<?php echo $agendamento['id']; ?>"> <br>

                                <input type="submit" onclick="return excluirRegistro('<?= htmlspecialchars($agendamento['id'])?>')" class="btn btn-danger" value="Excluir"></input>
                            </form>

                    
                            <?php endif; ?>
                        </td>
                        </td>
                    </tr>

                

                <?php endforeach; ?>
    
            </tbody>
        </table>
    </div>
</body>
</html>