<?php 
    require ("./conexao.php");

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nome = $_POST['nome'] ?? '';
        $email = $_POST['email'] ?? '';
        $senha = $_POST['senha'] ?? '';
        $tipo = $_POST['tipo'] ?? 'restito';
    
        if (empty($nome) || empty($email) || empty($senha) || empty($tipo)) {
            echo "Preencha todos os campos!";
        } else {
            try {
                $senhaHash = password_hash($senha, PASSWORD_DEFAULT); // Criptografa a senha
    
                $stmt = $pdo->prepare("INSERT INTO usuarios (nome, email, senha,tipo) VALUES (:nome, :email, :senha, :tipo)");
                $stmt->bindParam(':nome', $nome);
                $stmt->bindParam(':email', $email);
                $stmt->bindParam(':senha', $senhaHash);
                $stmt->bindParam(':tipo', $tipo);
                $stmt->execute();
    
                header("Location: index.php");
            } catch (PDOException $e) {
                echo "Erro ao cadastrar usuário: " . $e->getMessage();
            }
        }
    }    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar usuário</title>
    <!--links bootstrap-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <style>
        .container{
            border: 1px solid black;
            border-radius: 10px;
            margin-top:50px;
            width: 50%;
        }
        .inputEmail{
            margin-left: 6px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="m-4">Cadastrar novo usuário</h2>
        <div class="m-5">
            <form method="POST" action="">
                <div class="form-group">
                    <label for="nome">Nome:</label>
                    <input type="text" id="nome" name="nome" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input class="inputEmail" type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="senha">Senha:</label>
                    <input type="password" id="senha" name="senha" required>
                </div>
                <div class="form-group">
                    <label for="tipo">Tipo de Usuário:</label>
                    <select id="tipo" name="tipo" required>
                        <option value="restrito">Restrito</option>
                        <option value="admin">Admin</option>
                    </select>
                </div>
                
                <button class="btn btn-primary" type="submit">Cadastrar</button>
            </form>
        </div>
    </div>
</body>
</html>