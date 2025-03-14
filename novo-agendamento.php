<?php 
$id= "";
if(isset($_GET['id'])){
  $id = $_GET['id'];
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
                <li class="nav-item active">
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
    <!-- rever como os formularios funcionam -->
    <form action="./cadastrar-agendamento.php" method="post" class="m-4">
        <div class="form-row">
            <div class="col-8">
                <label for="idCliente">Id Cliente</label>
                <input type="number" class="form-control" name="idCliente" id="idCliente" value="<?php echo $id; ?>" required>
            </div>

            
            <div class="col-8">
                <label for="inputProfissional">Profissional</label>
                <select class="custom-select mr-sm-2" name="inputProfissional" id="inputProfissional" required>
                    <option selected>Escolher...</option>
                    <option value="profissional1">Profissional 1</option>
                    <option value="profissional2">Profissional 2</option>
                </select>
            </div>
            <div class="col-4">

            </div>
            <div class="col-auto">
                <label for="dataConsulta">Data da Consulta</label>
                <input type="date" class="form-control" name="dataConsulta" id="dataConsulta" required>
            </div>
            <div class="col-auto">
                <label for="horaConsulta">Horário</label>
                <input type="time" class="form-control" name="horaConsulta" id="horaConsulta" required>
            </div>
            <div class="col-auto">
                <label for="convenioCliente">Convênio</label>
                <select class="custom-select mr-sm-2" name="convenioCliente" id="convenioCliente" required>
                    <option selected>Escolher...</option>
                    <option value="particular">Particular</option>
                    <option value="convenio">Convênio</option>
                </select>
            </div>
        </div>        
        <div class="form-group col-5 p-0">
            <label for="motivoConsulta">Motivo da consulta</label>
            <textarea class="form-control" id="motivoConsulta" name="motivoConsulta" rows="4"></textarea>
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Confirmar agendamento</button>
    </form>
</body>

</html>