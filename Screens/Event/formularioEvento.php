<?php
    session_start();

    if (isset($_FILES['arquivo'])) {
        $extensao = strtolower(substr($_FILES['arquivo']['name'], -4)); //Pega a extensão do arquivo
        $novo_nome = md5(time()) . $extensao; //Defineo nome do arquivo
        $diretorio = '../../Files/'; //Define o diretório para envio dos arquivod

        if ($extensao != '.jpg' && $extensao != '.png') {
            echo '<div class="mensagem">
                    <p>Tipo de Arquivo Inválido!</p>
                </div>';
        }else {
            move_uploaded_file($_FILES['arquivo']['tmp_name'], $diretorio.$novo_nome); //Efetua o upload
            $_POST['nomeArquivo'] = $novo_nome;
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Evento</title>
    <link rel="stylesheet" href="../../Styles/Event/cadastro.css">

    <script>
        window.addEventListener('load', () => {
            document.querySelector('button').addEventListener('click', () => {
                const dados = new FormData(document.forms[0]);
                const config ={
                    method: 'POST',
                    body: dados
                };
                fetch('./cadastroEvento.php', config)
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
            document.getElementById('arquivo').value = '';
            document.getElementById('nome').value = '';
            document.getElementById('data').value = '';
            document.getElementById('cidade').value = '';
            document.getElementById('bairro').value = '';
            document.getElementById('rua').value = '';
            document.getElementById('valor').value = '';
        }
    </script>

</head>
<body>
    <header>
        <div class="logo">
            <a href="../Home/home.php"><img src="../../Assets/logo.png" 
            alt="Logo"></a>
        </div>
        <ul class="menu">
            <a href="../Home/home.php">
                <li class="item-menu">Home</li>
            </a>
            <a href="../Event/listagem.php">
                <li class="item-menu">Eventos</li>
            </a>
            <a href="../Event/formularioEvento.php">
                <li class="item-menu">Criar Eventos</li>
            </a>
        </ul>
    </header>
    
    <div class="container">
        <form action="" method="POST" enctype="multipart/form-data">
            <fieldset>
                <legend><b>Formulário de Evento</b></legend>
                <br>
                <div class="inputBox">
                    <label for="imgEvento">Imagem do Evento</label>
                    <br><br>
                    <label for="arquivo">Selecione uma imagem</label>
                    <input type="file" name="arquivo" id="arquivo" required>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="nome" id="nome" class="input" required>
                    <label for="name" class="title">Nome do Evento</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <label for="date">Data do Evento</label>
                    <input type="date" name="data" id="data" class="input" required>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="cidade" id="cidade" class="input" required>
                    <label for="cidade" class="title">Cidade</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="bairro" id="bairro" class="input" required>
                    <label for="bairro" class="title">Bairro</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="rua" id="rua" class="input" required>
                    <label for="rua" class="title">Rua</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="valor" id="valor" class="input" required>
                    <label for="valor" class="title">Valor</label>
                </div>
                <br><br>
                <Button name="submit" id="submit">Salvar</Button>
            </fieldset>
        </form>
        
    </div>
    <div class="mensagem">
        <p></p>
    </div>

    <!-- <footer>
        <div class="privacidade">
            <label for="">© Copyright Próxima Parada - 2022 / Criado por Luan</label>
        </div>
    </footer> -->
</body>
</html>