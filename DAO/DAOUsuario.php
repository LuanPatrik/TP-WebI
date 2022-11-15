<?php
    Class DAOUsuario
    {
        public function verificaUsuario($usuario, $senha)
        {
            $sql = "SELECT id_usuario FROM usuario WHERE usuario = '$usuario' AND senha = '$senha';";
            $pst = Conexao::getPreparedStatement($sql);
            $pst->execute();
            $id = $pst->fetchAll(PDO::FETCH_ASSOC);
            return $id;
        }

        public function incluir(Usuario $usuario)
        {
            $sql = 'INSERT INTO usuario (nome, cpf, data_nasc, usuario, senha) VALUES (?,?,?,?,?);';

            $obj = Conexao::getpreparedStatement($sql);
            $obj->bindValue(1, $usuario->getNome());
            $obj->bindValue(2, $usuario->getCpf());
            $obj->bindValue(3, $usuario->getData_nasc());
            $obj->bindValue(4, $usuario->getUsuario());
            $obj->bindValue(5, $usuario->getSenha());

            if ($obj->execute()) 
            {
                return true;
            }
            else
            {
                return false;
            }
        }

        public function excluir(Usuario $usuario)
        {
            $sql = 'DELETE FROM usuario WHERE id = ?;';
            $obj = Conexao::getPreparedStatement($sql);
            $obj->bindValue(1,$usuario->getId_usuario());

            if ($obj->execute()) {
                return true;
            }else {
                return false;
            }
        }

        public function atualizar(Usuario $usuario)
        {
            $sql = 'UPDATE usuario SET nome = ?, cpf = ?, data_nasc = ?, usuario = ?,
                    senha = ? WHERE id = ?;';
            $obj = Conexao::getPreparedStatement($sql);
            $obj->bindValue(1,$usuario->getNome());
            $obj->bindValue(2,$usuario->getCpf());
            $obj->bindValue(3,$usuario->getData_nasc());
            $obj->bindValue(4, $usuario->getUsuario());
            $obj->bindValue(5, $usuario->getSenha());
            $obj->bindValue(7,$usuario->getId_usuario());

            if ($obj->execute()) {
                return true;
            }else {
                return false;
            }
        }
    }
?>