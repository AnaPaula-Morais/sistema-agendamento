<?php 
  session_start();

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Agendamento</title>
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/styleCalendar.css">
    <!--links bootstrap-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <!--Link da biblioteca do calendario-->
    <script src="./assets/js/index.global.min.js"></script>
    <script src="./assets/js/core/locales-all.global.min.js"></script>
    <script src="./assets/js/calendario.js"></script>
    <script>

      document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
          initialView: 'dayGridMonth',
          locale: 'pt-br'
        });
        calendar.render();
      });

    </script>
    <style>
      .linkSair{
        color: white;
        margin-left: 10px;
        
      }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="paginaInicial.php"><img class="img-logo" src="./assets/logo.png" alt="logo"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#conteudoNavbarSuportado" aria-controls="conteudoNavbarSuportado" aria-expanded="false" aria-label="Alterna navegação">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="conteudoNavbarSuportado">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="./paginaInicial.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="./novo-cliente.html">Cadastrar Cliente</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="./clientes.php">Clientes</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="./listar-agendamentos.php">Agendamentos</a>
      </li>
      <?php if (isset($_SESSION['usuario_tipo']) && $_SESSION['usuario_tipo'] == 'admin'): ?>
        <hr>
          <li class="nav-item"><a class="nav-link" href="cadastrar-usuario.php">Cadastrar Usuário</a></li>
      <?php endif; ?>

    </ul>
    
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2 " type="search" placeholder="Pesquisar" aria-label="Pesquisar">
      <button class="btn btn-light my-2 my-sm-0 " type="submit">Pesquisar</button>
      <a class="linkSair" href="./logout.php" onclick="return confirm('Tem certeza que deseja sair?');">Sair</a>
    </form>
  </div>
</nav>
<div class="m-4">
    <h2>
      <?php 
        if (isset($_SESSION['usuario_nome'])) {
            echo "<h2>Bem-vindo(a), " . htmlspecialchars($_SESSION['usuario_nome']) . " ao seu sistema de agendamento!</h2>";
        } else {
            echo "<h2>Bem-vindo ao sistema de agendamento!</h2>";
        }
      ?>
    </h2>
    
</div>
<div id="calendar"></div>
</body>
</html>