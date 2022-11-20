<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../Styles/Login/cadastro.css">
    <title>Cadastro de Usuário</title>

    <script>
        window.addEventListener('load', () => {
            document.querySelector('button').addEventListener('click', () => {
                const dados = new FormData(document.forms[0]);
                const config ={
                    method: 'POST',
                    body: dados
                };
                fetch('./cadastroUsuario.php', config)
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
    <div class="voltar">
        <a href="../Login/login.php"><img src="../../Assets/voltar.png" alt="Voltar"></a>
    </div>
    <div class="container">
        <form action="" method="POST">
            <fieldset>
                <legend><b>Cadastro de Usuário</b></legend>
                <br>
                <div class="inputBox">
                    <input type="text" name="name" id="name" class="input" required>
                    <label for="name" class="title">Nome</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="cpf" id="cpf" class="input" required>
                    <label for="cpf" class="title">CPF</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <label for="date">Data de Nascimento</label>
                    <input type="date" name="data_nasc" id="data_nasc" class="input" required>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="email" name="email" id="email" class="input" required>
                    <label for="email" class="title">E-mail</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="usuario" id="usuario" class="input" required>
                    <label for="usuario" class="title">Usuário</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="password" name="senha" id="senha" class="input" required>
                    <label for="senha" class="title">Senha</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="password" name="confirmarSenha" id="confirmarSenha" class="input" required>
                    <label for="confirmarSenha" class="title">Confirme sua Senha</label>
                </div>
                <br><br>
                <button name="submit" id="submit">Salvar</button>
            </fieldset>
        </form>
    </div>
    <div class="mensagem">
        <p></p>
    </div>
    
</body>
</html>