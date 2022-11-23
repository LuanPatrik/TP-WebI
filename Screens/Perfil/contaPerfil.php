<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../Styles/Perfil/perfil.css">
    <title>Perfil</title>

    <script>
        window.addEventListener('load', () => {
            document.querySelector('button').addEventListener('click', () => {
                const dados = new FormData(document.forms[0]);
                const config = {
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
                    mensagem.innerText = json.mensagem;
                    if (json.status == 'ok') {
                        mensagem.style.backgroundColor = 'green';
                        limparCampos();
                    }else{
                        mensagem.style.backgroundColor = 'red';
                    }
                })
            });

            document.forms[0].addEventListener('submit', (event) => {
                event.preventDefault();
            });
        })

        function limparCampos(){
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
        $telefone = $_SESSION['telefone'];
        $email = $_SESSION['email'];
        $usuario = $_SESSION['usuario'];
    ?>

    <a href="../Home/home.php">Voltar</a>

    <div class="container">
        <div class="form-image">
            <img src="../../Assets/perfil.svg" alt="Usuário">
        </div>
        <div class="form">
            <form action="">
                <div class="form-header">
                    <div class="title">
                        <h1>Dados Pessoais</h1>
                    </div>
                </div>
                <div class="input-group">
                    <div class="input-box">
                        <label for="name" class="title">Nome</label>
                        <input type="text" name="name" id="name" class="input" placeholder="Nome" required value="<?php echo $nome?>">
                    </div>
                    <div class="input-box">
                        <label for="cpf" class="title">CPF</label>
                        <input type="text" name="cpf" id="cpf" class="input" placeholder="Cpf" required value="<?php echo $cpf?>">
                    </div>
                    <div class="input-box">
                        <label for="date" class="title">Data de Nascimento</label>
                        <input type="date" name="data_nasc" id="data_nasc" class="input" placeholder="Data de Nascimento" required value="<?php echo $data_nasc?>">
                    </div>
                    <div class="input-box">
                        <label for="telefone" class="title">Telefone</label>
                        <input type="text" name="telefone" id="telefone" class="input" placeholder="Telefone" required value="<?php echo $telefone?>">
                    </div>
                    <div class="input-box">
                        <label for="email" class="title">E-mail</label>
                        <input type="email" name="email" id="email" class="input" placeholder="E-mail" required value="<?php echo $email?>">
                    </div>
                    <div class="input-box">
                        <label for="usuario" class="title">Usuário</label>
                        <input type="text" name="usuario" id="usuario" class="input" placeholder="Usuário" required value="<?php echo $usuario?>">
                    </div>
                    <div class="input-box">
                        <label for="senha" class="title">Senha</label>
                        <input type="password" name="senha" id="senha" class="input" placeholder="Senha" required>
                    </div>
                    <div class="input-box">
                        <label for="confirmarSenha" class="title">Confirme sua Senha</label>
                        <input type="password" name="confirmarSenha" id="confirmarSenha" class="input" placeholder="Confirme sua senha" required>
                    </div>
                </div>
                <div class="atualizar-button">
                    <button name="submit" id="submit">Salvar</button>
                </div>
                <div class="mensagem">
                    <p></p>
                </div>
            </form>
        </div>
    </div>
</body>
</html>