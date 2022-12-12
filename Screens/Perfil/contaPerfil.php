<?php
    session_start();
    require_once '../../Model/Usuario.php';
    require_once '../../DAO/conexao.php';
    require_once '../../DAO/DAOUsuario.php';

    if (isset($_SESSION['id_usuario']) > 0) {
        $id = $_SESSION['id_usuario'];
        $dao = new DAOusuario();
        $result = $dao->getInformacoes($id);

        $nome = $result[0]['nome'];
        $cpf = $result[0]['cpf'];
        $data_nasc = $result[0]['data_nasc'];
        $telefone = $result[0]['telefone'];
        $email = $result[0]['email'];
        $usuario = $result[0]['usuario'];
    }else {
        header('Location: ../Login/login.php');
    }
?>

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
            document.querySelector('#submit').addEventListener('click', () => {
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

    <script>
        window.addEventListener('load', () => {
            document.querySelector('#delete').addEventListener('click', () => {
                const dados = new FormData(document.forms[0]);
                const config = {
                    method: 'POST',
                    body: dados
                };
                fetch('./deletarUsuario.php', config)
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

            document.forms[0].addEventListener('#delete', (event) => {
                event.preventDefault();
            });
        })
    </script>
</head>
<body>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>

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
                        <input type="text" name="cpf" id="cpf" class="input" placeholder="Cpf" maxlength="11" required value="<?php echo $cpf?>">
                    </div>
                    <div class="input-box">
                        <label for="date" class="title">Data de Nascimento</label>
                        <input type="date" name="data_nasc" id="data_nasc" class="input" placeholder="Data de Nascimento" required value="<?php echo $data_nasc?>">
                    </div>
                    <div class="input-box">
                        <label for="telefone" class="title">Telefone</label>
                        <input type="text" name="telefone" id="telefone" class="input" placeholder="Telefone" onkeypress="$(this).mask('(00) 00000-0000')" required value="<?php echo $telefone?>">
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

                <div class="alignButton">
                    <div class="action-button">
                        <!-- <form action="deletarUsuario.php" method="POST">
                            <input type="hidden" name="id" value="echo <?php echo $id ?>">
                        </form> -->
                        <button name="delete" id="delete" onclick="return confirm('Deseja realmente excluir o Usuário?')">Deletar</button>
                    </div>
                    <div class="action-button">
                        <button name="submit" id="submit">Salvar</button>
                    </div>
                </div>
                
                <div class="mensagem">
                    <p></p>
                </div>
            </form>
        </div>
    </div>
</body>
</html>