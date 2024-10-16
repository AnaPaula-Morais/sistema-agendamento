<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Sistema de Agendamento</title>
    <?php
    require './header.php';
    ?>
</head>

<body>
    <main class="d-flex flex-nowrap">
        <?php
        require './aside.php';

        ?>
        <div class="d-flex flex-column flex-shrink-0 ">
            <form action="#" method="post" id="form">
                <fieldset>
                    <legend>Dados Pessoais</legend>
                    <div>
                        <label for="nome">Nome:</label>
                        <input type="text" name="nome" id="inNome">
                    </div>
                    <br>
                    <div>
                        <label for="dataNascimento">Data de Nascimento:</label>
                        <input type="date" name="dataNascimento" id="inDataNascimento">
                    </div>
                    <br>
                    <div>
                        <label for="genero">Gênero: </label>
                        F<input type="radio" name="genero" value="Feminino">
                        M<input type="radio" name="genero" value="Masculino">
                    </div>
                    <br>
                    <div>
                        <label for="endereco">Endereço:</label>
                        <input type="text" name="endereco" id="inEndereco">
                    </div>
                    <br>
                    <div>
                        <label for="telefone">Telefone:</label>
                        <input type="tel" name="telefone" id="inTelefone">
                    </div>
                    <br>
                    <div>
                        <label for="email">E-mail:</label>
                        <input type="email" name="email" id="inEmail">
                    </div>
                    <br>
                    <div>
                        <input type="submit" id="cadastrar" value="Cadastrar" onclick="mostrarInformacoes()">
                    </div>
                </fieldset>
            </form>
            <hr>
            <div id="outNome"></div>
            <div id="outDataNasc"></div>
            <div id="outGenero"></div>
            <div id="outEndereco"></div>
            <div id="outTelefone"></div>
            <div id="outEmail"></div>
        </div>
        <script src="/sistema-agendamento/assets/js/script.js"></script>
    </main>

</body>

</html>