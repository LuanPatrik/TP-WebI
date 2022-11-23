<?php
    session_start();

    require_once '../../Model/Usuario.php';
    require_once '../../DAO/conexao.php';
    require_once '../../DAO/DAOUsuario.php';

    $obj = new Usuario();
    $dao = new DAOusuario();
    
    $id = $_SESSION['id_usuario'];
    $nome = filter_input(INPUT_POST, 'name');
    $cpf = filter_input(INPUT_POST, 'cpf');
    $data_nasc = filter_input(INPUT_POST, 'data_nasc');
    $email = filter_input(INPUT_POST, 'email');
    $usuario = filter_input(INPUT_POST, 'usuario');
    $senha = filter_input(INPUT_POST, 'senha');

    $obj->setId_usuario($id);
    $obj->setNome($nome);
    $obj->setCpf($cpf);
    $obj->setData_nasc($data_nasc);
    $obj->setEmail($email);
    $obj->setUsuario($usuario);
    $obj->setSenha($senha);

    if ($nome && $data_nasc && $cpf && $email && $usuario && $senha) {
        $dao->atualizar($obj);
        $retorno = ['status' => 'ok', 'mensagem' => 'Usuário atualizado com sucesso!'];
    }else {
        $retorno = ['status' => 'error', 'mensagem' => 'Preencha todos os campos!'];
    }
    echo json_encode($retorno);