<?php 
     require("./conexao.php");
     
session_start(); // Inicia a sessão

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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de login</title>
     <!--links bootstrap-->
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./assets/css/styleIndex.css">
</head>
<body style="background-color: #007BFF;">
        <div style="background-color: white;" class="container div1">
            <h2 class="m-5">Login</h2>
            <div class="form">
                <form class="form" action="" method="post">
                    <div class="form-group">
                        <label for="">Email</label>
                        <input class="form-control" type="email" name="email">
                    </div>
                    <div class="form-group">
                        <label for="">Senha</label>
                        <input class="form-control" type="password" name="senha">
                    </div>
            
                    <button class="btn btn-primary" type="submit">Entrar</button>
                
                </form>  
            </div>
        </div>
    
    
</body>
</html>