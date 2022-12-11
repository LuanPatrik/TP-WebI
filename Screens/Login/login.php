<?php
    session_start();

    if (isset($_POST['submit']) && !empty($_POST['usuario']) && !empty($_POST['senha'])) {
        require_once '../../DAO/conexao.php';
        require_once '../../DAO/DAOUsuario.php';

        $dao = new DAOUsuario();

        $usuario = filter_input(INPUT_POST, 'usuario');
        $senha = filter_input(INPUT_POST, 'senha');

        $result = $dao->verificaUsuario($usuario, $senha);

        if ($result != null) {
            $_SESSION['id_usuario'] = $result[0]['id_usuario'];
            $_SESSION['nome'] = $result[0]['nome'];
            $_SESSION['cpf'] = $result[0]['cpf'];
            $_SESSION['data_nasc'] = $result[0]['data_nasc'];
            $_SESSION['telefone'] = $result[0]['telefone'];
            $_SESSION['email'] = $result[0]['email'];
            $_SESSION['usuario'] = $result[0]['usuario'];
            header('Location: ../Home/home.php');
        }
        else {
            
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../Styles/Login/login.css">
    <title>Login</title>

    <script>
            
    </script>
</head>
<body>
    <div class="voltar">
        <a href="../Home/home.php"><img src="../../Assets/voltar.png" alt="Voltar"></a>
    </div>

    <div class="main-login">
        <div class="left-login">
            <h1>Faça login<br>E divulgue a Próxima Parada</h1>
            <img src="../../Assets/logo.png" class="img-left" alt="Logo">
        </div>
        <div class="right-login">
            <div class="card-login">
                <form action="" method="POST">
                    <h1>Login</h1>
                    <div class="textfield">
                        <label for="usuario">Usuário</label>
                        <input type="text" placeholder="Usuário" name="usuario" class="input">
                    </div>
                    <div class="textfield">
                        <label for="senha">Senha</label>
                        <input type="password" placeholder="Senha" name="senha" class="input">
                    </div>
                    <button class="btn-login" type="submit" name="submit">Acessar</button>
                </form>
                <div class="cadastro">
                    <a href="./formularioUsuario.php">Cadastre-se</a>
                </div>   
            </div>
        </div>
    </div>

    <!-- <div class="container">
        <div class="logo">
            <img src="../../Assets/logo.png" alt="Logo">
        </div>
        <form action="" method="POST" class="form">
            <input type="text" placeholder="Usuário" name="usuario" class="input">
            <br><br>
            <input type="password" placeholder="Senha" name="senha" class="input">
            <br><br>
            <input class="button" type="submit" name="submit" value="Entrar">
        </form>
        <div class="cadastro">
            <a href="./formularioUsuario.php">Cadastre-se</a>
        </div>
    </div> -->
</body>
</html>