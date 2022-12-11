<?php
    session_start();
    require_once '../../Model/Evento.php';
    require_once '../../DAO/conexao.php';
    require_once '../../DAO/DAOEvento.php';

    $obj = new Evento();
    $dao = new DAOEvento();

    $imagem = filter_input(INPUT_POST, 'arquivo');
    $nome = filter_input(INPUT_POST, 'nome');
    $data = filter_input(INPUT_POST, 'data');
    $cidade = filter_input(INPUT_POST, 'cidade');
    $bairro = filter_input(INPUT_POST, 'bairro');
    $rua = filter_input(INPUT_POST, 'rua');
    $valor = filter_input(INPUT_POST, 'valor');

    $obj->setImagem($imagem);
    $obj->setNome($nome);
    $obj->setData_evento($data);
    $obj->setCidade($cidade);
    $obj->setBairro($bairro);
    $obj->setRua($rua);
    $obj->setValor($valor);

    if ($imagem && $nome && $data && $cidade && $bairro && $rua && $valor) {
        $dao->incluir($obj);
        $retorno = ['status' => 'ok', 'mensagem' => 'Evento cadastrado com sucesso!'];
    }else {
        $retorno = ['status' => 'error', 'mensagem' => 'Preencha todos os campos!'];
    }
    echo json_encode($retorno);
?>

<script>
    window.addEventListener('load', () => {
        document.querySelector('button').addEventListener('click', () => {
            const dados = new FormData(document.forms[0]);
            const config ={
                method: 'POST',
                body: dados
            };
            fetch('formularioEvento.php', config)
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