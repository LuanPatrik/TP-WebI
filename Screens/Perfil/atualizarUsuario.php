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
    $telefone = filter_input(INPUT_POST, 'telefone');
    $email = filter_input(INPUT_POST, 'email');
    $usuario = filter_input(INPUT_POST, 'usuario');
    $senha = filter_input(INPUT_POST, 'senha');

    $obj->setId_usuario($id);
    $obj->setNome($nome);
    $obj->setCpf($cpf);
    $obj->setData_nasc($data_nasc);
    $obj->setData_nasc($email);
    $obj->setTelefone($telefone);
    $obj->setUsuario($usuario);
    $obj->setSenha($senha);

    if (strlen($cpf) < 11 || strlen($data_nasc) < 8 || strlen($telefone) < 11 || strlen($email) < 12) {
        $retorno = ['status' => 'error', 'mensagem' => 'Preencha todos os campos corretamente!'];
    }else {
        if ($nome && $data_nasc && $cpf && $telefone && $email && $usuario && $senha) {
            $dao->incluir($obj);
            $retorno = ['status' => 'ok', 'mensagem' => 'Usuário cadastrado com sucesso!'];
        }else {
            $retorno = ['status' => 'error', 'mensagem' => 'Preencha todos os campos!'];
        }
    }
    echo json_encode($retorno);
?>