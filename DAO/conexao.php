<?php
class Conexao
{
    private static $login = 'mysql:host=localhost;dbname=proximaparada;port=3306';
    private static $usuario = 'root';
    private static $senha = '';
    private static $conexao = null;

    public static function getConexao() : PDO
    {
        if (Conexao::$conexao == null) {
            try {
                Conexao::$conexao = new PDO(Conexao::$login, Conexao::$usuario, Conexao::$senha);
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }
        return Conexao::$conexao;
    }

    public static function getPreparedStatement($sql) : PDoStatement
    {
        $pst = null;
        if (Conexao::getConexao() != null) {
            try {
                $pst = Conexao::$conexao->prepare($sql);            
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }
        return $pst;
    }
}

$con = Conexao::getConexao();
?>