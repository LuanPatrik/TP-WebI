<?php
    require_once '../../Model/Evento.php';
    require_once '../../DAO/conexao.php';
    require_once '../../DAO/DAOEvento.php';

    $obj = new Evento();
    $dao = new DAOEvento();

    $nome = filter_input(INPUT_POST, 'name');
    $data = filter_input(INPUT_POST, 'date');
    $cidade = filter_input(INPUT_POST, 'cidade');
    $bairro = filter_input(INPUT_POST, 'bairro');
    $rua = filter_input(INPUT_POST, 'rua');
    $valor = filter_input(INPUT_POST, 'valor');

    $obj->setNome($nome);
    $obj->setData_evento($data);
    $obj->setCidade($cidade);
    $obj->setBairro($bairro);
    $obj->setRua($rua);
    $obj->setValor($valor);

    if ($nome && $data && $cidade && $bairro && $rua && $valor) {
        $dao->incluir($obj);
        $retorno = ['status' => 'ok', 'mensagem' => 'Evento cadastrado com sucesso!'];
    }else {
        $retorno = ['status' => 'error', 'mensagem' => 'Preencha todos os campos!'];
    }
    echo json_encode($retorno);
?>