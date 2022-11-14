<?php
    require_once '../../Model/Usuario.php';
    require_once '../../DAO/conexao.php';
    require_once '../../DAO/DAOUsuario.php';

    $obj = new Usuario();
    $dao = new DAOusuario();

    $id = filter_input(INPUT_POST, 'id');
    $nome = filter_input(INPUT_POST, 'nome');
    $cpf = filter_input(INPUT_POST, 'cpf');
    $data_nasc = filter_input(INPUT_POST, 'data_nasc');
    $usuario = filter_input(INPUT_POST, 'usuario');
    $senha = filter_input(INPUT_POST, 'senha');

    echo 'Nome '.$nome;

    $obj->setId_usuario($id);
    $obj->setId_usuario($nome);
    $obj->setId_usuario($cpf);
    $obj->setId_usuario($data_nasc);
    $obj->setId_usuario($usuario);
    $obj->setId_usuario($senha);

    if ($nome && $data_nasc && $cpf && $usuario && $senha) {
        $dao->incluir($obj);
        $retorno = ['status' => 'ok', 'mensagem' => 'Usuário cadastrado com sucesso!'];
    }else {
        $retorno = ['status' => 'error', 'mensagem' => 'Preencha todos os campos!'];
    }
    echo json_encode($retorno);
?>