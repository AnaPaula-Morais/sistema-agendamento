<?php 
    require ("./conexao.php");

    try {
        $sql = "SELECT id, nome, sexo, dataNascimento, cpf, convenio,endereco, telefone, cidade, email, obs FROM clientes";
        $stmt = $pdo->query($sql);
        $clientes = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Erro ao buscar clientes: " . $e->getMessage();
        exit;
    }



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes</title>
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
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="index.php"><img class="img-logo" src="./assets/logoSer.png" alt="logo"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#conteudoNavbarSuportado" aria-controls="conteudoNavbarSuportado" aria-expanded="false" aria-label="Alterna navegação">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="conteudoNavbarSuportado">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="./index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./novo-cliente.html">Cadastrar Cliente</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="#">Clientes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./novo-agendamento.php">Agendar Consultas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Configurações</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2 " type="search" placeholder="Pesquisar" aria-label="Pesquisar">
                <button class="btn btn-light my-2 my-sm-0 " type="submit">Pesquisar</button>
            </form>
        </div>
    </nav>
    <div class="m-3">
        <h1>Lista de Clientes</h1>
        <table>
            <thead>
                <th>ID</th>
                <th>NOME</th>
                <th>DATA DE NASCIMENTO</th>
                <th>CPF</th>
                <th>EMAIL</th>
                <th>OPÇÕES</th>
            </thead>
            <tbody>
            <?php foreach ($clientes as $cliente): ?>
                    <tr>
                        <td><?= htmlspecialchars($cliente['id']) ?></td>
                        <td><?= htmlspecialchars($cliente['nome']) ?></td>
                        <td><?= htmlspecialchars($cliente['dataNascimento']) ?></td>
                        <td><?= htmlspecialchars($cliente['cpf']) ?></td>
                        <td><?= htmlspecialchars($cliente['email']) ?></td>
                        <td>
                            <button class="btn btn-primary">Agendar</button>
                            <button onclick="window.location.href='editar-cliente.php?id=<?php echo $cliente['id']; ?>'" class="btn btn-success">Editar</button>
                            
                            <form method="post" action="./deleta-cliente.php">
                                <input  name="id" type="hidden" value="<?php echo $cliente['id']; ?>">

                                <input type="submit" onclick="return excluirRegistro('<?= htmlspecialchars($cliente['nome'])?>')" class="btn btn-danger" value="Excluir"></input>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
    
            </tbody>
        </table>
    </div>
</body>
</html>