<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../Styles/Login/cadastro.css">
    <title>Cadastro de Usuário</title>
</head>
<body>
    <div class="voltar">
        <a href="../Login/login.html"><img src="../../Assets/voltar.png" alt="Voltar"></a>
    </div>
    <div class="container">
        <form action="">
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
                    <input type="date" name="date" id="date" class="input" required>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="usuario" id="usuario" class="input" required>
                    <label for="usuario" class="title">Usuário</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="senha" id="senha" class="input" required>
                    <label for="senha" class="title">Senha</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="senha" id="senha" class="input" required>
                    <label for="senha" class="title">Confirme sua Senha</label>
                </div>
                <br><br>
                <input type="submit" name="submit" id="submit">
            </fieldset>
        </form>
    </div>
</body>
</html>