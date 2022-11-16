<?php
    session_start();
    if (!isset($_SESSION['usuario']) == true) {
        header('Location: ../Login/login.php');
    }
    $logado = $_SESSION['usuario'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../styles/Home/home.css">
    <title>Home</title>

    
</head>

<body>
    <header>
        <div class="logo">
            <a href="./home.php"><img src="../../Assets/logo.png" alt="Logo"></a>
        </div>
        <ul class="menu">
            <a href="./home.php">
                <li class="item-menu">Home</li>
            </a>
            <a href="../Event/formularioEvento.php">
                <li class="item-menu">Eventos</li>
            </a>
        </ul>
        <div class="navigation">
            <div class="userBox">
                <div class="imgUser">
                    <img src="../../Assets/user.png" alt="Usuário">
                </div>
                <p class="usuarioLogado">Luan Patrik</p>
            </div>
            <div class="menuToggle"></div>
            <ul class="menuUsuario">
                <li><a href=""><img src="../../Assets/userConta.png" alt="">Conta</a></li>
                <li><a href="./sair.php"><img src="../../Assets/sair.png" alt="">Sair</a></li>
            </ul>
        </div>
        <script>
            let menuToggle = document.querySelector('.menuToggle');
            let navigation = document.querySelector('.navigation');
            menuToggle.onclick = function() {
                navigation.classList.toggle('active');
            }
        </script>
    </header>

    <div class="banner">

    </div>
    <div class="informativo">
        <h1>Informativo</h1>
        <p>Não sabe para onde ir? O Próxima Parada nasceu para te ajudar a escolher um rolê topzeira &#128526;. Sabe de alguma
            festa? Cadastra o evento no nosso site para outras pessoas possam se informar e acima de tudo, se divertir &#128527;.
        </p>
    </div>

    <footer>
        <div class="privacidade">
            <label for="">© Copyright Próxima Parada - 2022 / Criado por Luan</label>
        </div>
    </footer>
</body>

</html>