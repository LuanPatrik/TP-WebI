<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../Styles/Home/perfil.css">
    <title>Perfil</title>

    <script>
        window.addEventListener('load', () => {
            document.querySelector('button').addEventListener('click', () => {
                const dados = new FormData(document.forms[0]);
                const config ={
                    method: 'POST',
                    body: dados
                };
                fetch('./atualizarUsuario.php', config)
                .then((response) => {
                    return response.json();
                })
                .then((json) => {
                    console.log(json);
                    let mensagem = document.querySelector('.mensagem p');
                    let div = document.querySelector('.mensagem');
                    mensagem.innerText = json.mensagem;
                    if (json.status == 'ok') {
                        div.style.backgroundColor = 'green';
                        // limparCampos();
                    }else{
                        div.style.backgroundColor = 'red';
                    }
                })
            });

            document.forms[0].addEventListener('submit', (event) => {
                event.preventDefault();
            });
        })

        function limparCampos(){
            document.getElementById('name').value = '';
            document.getElementById('cpf').value = '';
            document.getElementById('data_nasc').value = '';
            document.getElementById('email').value = '';
            document.getElementById('usuario').value = '';
            document.getElementById('senha').value = '';
            document.getElementById('confirmarSenha').value = '';
        }
    </script>
</head>
<body>
    <?php
        session_start();
        $id = $_SESSION['id_usuario'];
        $nome = $_SESSION['nome'];
        $cpf = $_SESSION['cpf'];
        $data_nasc = $_SESSION['data_nasc'];
        $email = $_SESSION['email'];
        $usuario = $_SESSION['usuario'];
    ?>

    <a href="../Home/home.php">Voltar</a>

    <div class="container">
        <form action="" method="POST">
            <div class="inputBox">
                <label for="name" class="title">Nome</label>
                <br>
                <input type="text" name="name" id="name" class="input" value="<?php echo $nome?>">
            </div>
            <br><br>
            <div class="inputBox">
                <label for="cpf" class="title">CPF</label>
                <br>
                <input type="text" name="cpf" id="cpf" class="input" value="<?php echo $cpf?>">
            </div>
            <br><br>
            <div class="inputBox">
                <label for="date" class="title">Data de Nascimento</label>
                <br>
                <input type="date" name="data_nasc" id="data_nasc" class="input" value="<?php echo $data_nasc?>">
            </div>
            <br><br>
            <div class="inputBox">
                <label for="email" class="title">E-mail</label>
                <br>
                <input type="email" name="email" id="email" class="input" value="<?php echo $email?>">
            </div>
            <br><br>
            <div class="inputBox">
                <label for="usuario" class="title">Usuário</label>
                <br>
                <input type="text" name="usuario" id="usuario" class="input" value="<?php echo $usuario?>">
            </div>
            <br><br>
            <div class="inputBox">
                <label for="senha" class="title">Senha</label>
                <br>
                <input type="password" name="senha" id="senha" class="input" required>
            </div>
            <br><br>
            <div class="inputBox">
                <label for="confirmarSenha" class="title">Confirme sua Senha</label>
                <br>
                <input type="password" name="confirmarSenha" id="confirmarSenha" class="input" required>
            </div>
            <br><br>
            <button name="submit" id="submit">Salvar</button>
        </form>
    </div>
    <div class="mensagem">
        <p></p>
    </div>
</body>
</html>