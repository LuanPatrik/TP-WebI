<?php
    session_start();

    require_once '../../Model/Usuario.php';
    require_once '../../DAO/conexao.php';
    require_once '../../DAO/DAOUsuario.php';

    $obj = new Usuario();
    $dao = new DAOusuario();
    
    $id = filter_input(INPUT_POST, 'id');

    $obj->setId_usuario($id);
    $result = $dao->excluir($obj);

    if ($result == true) {
        echo '<script>alert("Usuário Excluído com sucesso!") </script>';
        header('Location: ../Login/login.php');
        // $retorno = ['status' => 'ok', 'mensagem' => 'Usuário Excluído com sucesso!'];
    }else {
        $retorno = ['status' => 'error', 'mensagem' => 'Erro ao deletar Usuário!'];
    }
    echo json_encode($retorno);
?>