<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../Styles/Home/perfil.css">
    <title>Perfil</title>
</head>
<body>
    <div class="container">
        <form action="" method="POST">
            <div class="alinha">
                <div class="inputBox">
                    <label for="name" class="title">Nome</label>
                    <br>
                    <input type="text" name="name" id="name" class="input" required>
                </div>
                <br><br>
                <div class="inputBox">
                    <label for="cpf" class="title">CPF</label>
                    <br>
                    <input type="text" name="cpf" id="cpf" class="input" required>
                </div>
                <br><br>
                <div class="inputBox">
                    <label for="date" class="title">Data de Nascimento</label>
                    <br>
                    <input type="date" name="data_nasc" id="data_nasc" class="input" required>
                </div>
                <br><br>
                <div class="inputBox">
                    <label for="email" class="title">E-mail</label>
                    <br>
                    <input type="email" name="email" id="email" class="input" required>
                </div>
            </div>
            <div class="alinha2">
                <br><br>
                <div class="inputBox">
                    <label for="usuario" class="title">Usuário</label>
                    <br>
                    <input type="text" name="usuario" id="usuario" class="input" required>
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
            </div>
            <br><br>
            <button name="submit" id="submit">Salvar</button>
        </form>
    </div>
    
</body>
</html>