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
            $sql = 'INSERT INTO evento (imagem, nome, data_evento, cidade, bairro, rua, valor) VALUES (?,?,?,?,?,?,?);';

            $obj = Conexao::getpreparedStatement($sql);
            $obj->bindValue(1, $evento->getImagem());
            $obj->bindValue(2, $evento->getNome());
            $obj->bindValue(3, $evento->getData_evento());
            $obj->bindValue(4, $evento->getCidade());
            $obj->bindValue(5, $evento->getBairro());
            $obj->bindValue(6, $evento->getRua());
            $obj->bindValue(7, $evento->getValor());

            if ($obj->execute()) 
            {
                return true;
            }
            else
            {
                return false;
            }
        }

        public function atualizar(Evento $evento)
        {
            $sql = 'UPDATE evento SET imagem = ?, nome = ?, data_evento = ?, cidade = ?, bairro = ?,
                    rua = ?, valor = ? WHERE id = ?;';
            $obj = Conexao::getPreparedStatement($sql);
            $obj->bindValue(1,$evento->getImagem());
            $obj->bindValue(2,$evento->getNome());
            $obj->bindValue(3,$evento->getData_evento());
            $obj->bindValue(4,$evento->getCidade());
            $obj->bindValue(5, $evento->getBairro());
            $obj->bindValue(6, $evento->getRua());
            $obj->bindValue(7, $evento->getValor());
            $obj->bindValue(8,$evento->getId_evento());

            if ($obj->execute()) {
                return true;
            }else {
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
    }
?>