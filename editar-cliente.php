<?php 
    require ("./conexao.php");
    session_start();
    if(isset($_GET['id'])){
        $id = intval($_GET['id']);


        $query = "SELECT * FROM clientes WHERE id = :id";
        $stmt = $pdo -> prepare($query);
        $stmt-> bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $cliente = $stmt->fetch(PDO::FETCH_ASSOC);

        if(!$cliente){
            die("cliente inválido");
        }
    }

    if (!isset($_SESSION['usuario_id']) || $_SESSION['usuario_tipo'] != 'admin') {
        echo "Acesso negado, somente o administrador poderá alterar esta página!";
        exit();
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Cliente</title>
    <link rel="stylesheet" href="./assets/css/style.css">
    <!--links bootstrap-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <style>
        .linkSair{
        color: white;
        margin-left: 10px;
        
      }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="index.php"><img class="img-logo" src="./assets/logo.png" alt="logo"></a>
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
                    <a class="nav-link" href="./novo-agendamento.php">Agendar Consultas</a>
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
    <form action="./cadastrar-cliente.php" method="post" class="m-4">
        <div class="form-row">
<!-- este input existe para usa o id pars fazer o update do cliente-->
            <input type="hidden" name="id"  value="<?php echo htmlspecialchars($cliente['id']); ?>">
            <div class="col-5">
                <label for="nomeCliente">Nome</label>
                <input type="text" class="form-control" name="nomeCliente" id="nomeCliente" value="<?php echo htmlspecialchars($cliente['nome']); ?>" required>
            </div>
            <div class="col-auto">
                <label for="sexoCliente">Sexo</label>
                <select class="custom-select mr-sm-2" id="sexoCliente" name="sexoCliente" value="<?php echo htmlspecialchars($cliente['sexo']); ?>" required>
                    <option selected>Escolher...</option>
                    <option value="F">F</option>
                    <option value="M">M</option>
                </select>
            </div>
            <div class="col-auto">
                <label for="dataNascimento">Data de Nascimento</label>
                <input type="date" class="form-control" name="dataNascimento" id="dataNascimento" value="<?php echo htmlspecialchars($cliente['dataNascimento']); ?>" required>
            </div>
            <div class="col-auto">
                <label for="convenioCliente">Convênio</label>
                <select class="custom-select mr-sm-2" name="convenioCliente" id="convenioCliente" value="<?php echo htmlspecialchars($cliente['convenio']); ?>" required>
                    <option selected>Escolher...</option>
                    <option value="particular">Particular</option>
                    <option value="convenio">Convênio</option>
                </select>
            </div>
        </div>
        <div class="form-row">
            <div class="col-5">
                <label for="inputEndereco">Endereço</label>
                <input type="text" class="form-control" name="inputEndereco" id="inputEndereco" value="<?php echo htmlspecialchars($cliente['endereco']); ?>" required>
            </div>
            <div class="form-group col-5">
                <label for="inputCidade">Cidade</label>
                <input type="text" class="form-control" name="inputCidade"  id="inputCidade" value="<?php echo htmlspecialchars($cliente['cidade']); ?>" required>
            </div>

        </div>
        <div class="form-row">
            <div class="col-5">
                <label for="emailCliente">E-mail</label>
                <input type="text" class="form-control" name="emailCliente" id="emailCliente" value="<?php echo htmlspecialchars($cliente['email']); ?>" required>
            </div>
            <div class="col-auto">
                <label for="inputTelefone">Telefone</label>
                <input type="tel" class="form-control" name="inputTelefone" id="inputTelefone" value="<?php echo htmlspecialchars($cliente['telefone']); ?>" required>
            </div>
            <div class="col-auto">
                <label for="inputCPF">CPF</label>
                <input type="number" class="form-control" id="inputCPF" name="inputCPF" value="<?php echo htmlspecialchars($cliente['cpf']); ?>" required>
            </div>
        </div>
        <div class="form-row">


        </div>
        <div class="form-group col-5 p-0">
            <label for="textarea">Observações</label>
            <textarea class="form-control" id="textarea" name="textarea" rows="4"></textarea>
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Salvar alterações</button>
        <button onclick="window.location.href='clientes.php'" type="submit" name="submit" class="btn btn-danger">Cancelar</button>
    </form>
</body>

</html>