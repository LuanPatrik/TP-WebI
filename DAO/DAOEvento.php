<?php
    Class DAOEvento
    {
        public function exibirLista()
        {
            $lista = [];
            $pst = Conexao::getPreparedStatement('SELECT * FROM evento;');
            $pst->execute();
            $lista = $pst->fetchAll(PDO::FETCH_ASSOC);
            return $lista;
        }

        public function incluir(Evento $evento)
        {
            $sql = 'INSERT INTO evento (nome, data_evento, cidade, bairro, rua, valor) VALUES (?,?,?,?,?,?);';

            $obj = Conexao::getpreparedStatement($sql);
            $obj->bindValue(1, $evento->getNome());
            $obj->bindValue(2, $evento->getData_evento());
            $obj->bindValue(3, $evento->getCidade());
            $obj->bindValue(4, $evento->getBairro());
            $obj->bindValue(5, $evento->getRua());
            $obj->bindValue(6, $evento->getValor());

            if ($obj->execute()) 
            {
                return true;
            }
            else
            {
                return false;
            }
        }

        public function excluir(Evento $evento)
        {
            $sql = 'DELETE FROM evento WHERE id = ?;';
            $obj = Conexao::getPreparedStatement($sql);
            $obj->bindValue(1,$evento->getId_evento());

            if ($obj->execute()) {
                return true;
            }else {
                return false;
            }
        }

        public function atualizar(Evento $evento)
        {
            $sql = 'UPDATE evento SET nome = ?, data_evento = ?, cidade = ?, bairro = ?,
                    rua = ?, valor = ? WHERE id = ?;';
            $obj = Conexao::getPreparedStatement($sql);
            $obj->bindValue(1,$evento->getNome());
            $obj->bindValue(2,$evento->getData_evento());
            $obj->bindValue(3,$evento->getCidade());
            $obj->bindValue(4, $evento->getBairro());
            $obj->bindValue(5, $evento->getRua());
            $obj->bindValue(6, $evento->getValor());
            $obj->bindValue(7,$evento->getId_evento());

            if ($obj->execute()) {
                return true;
            }else {
                return false;
            }
        }
    }
?>