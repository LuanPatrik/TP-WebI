<?php
    class Usuario
    {
        private $id_usuario;
        private $nome;
        private $cpf;
        private $data_nasc;
        private $usuario;
        private $senha;

        public function __construct($n = null, $c = null, $d = null, $u = null, $s = null)
        {
            $this->nome = $n;
            $this->cpf = $c;
            $this->data_nasc = $d;
            $this->usuario = $u;
            $this->senha = $s;
        }

        public function getId_usuario()
        {
                return $this->id_usuario;
        }

        public function setId_usuario($id_usuario)
        {
                $this->id_usuario = $id_usuario;

                return $this;
        }
 
        public function getNome()
        {
                return $this->nome;
        }

        public function setNome($nome)
        {
                $this->nome = $nome;

                return $this;
        }

        public function getCpf()
        {
                return $this->cpf;
        }

        public function setCpf($cpf)
        {
                $this->cpf = $cpf;

                return $this;
        }

        public function getData_nasc()
        {
                return $this->data_nasc;
        }

        public function setData_nasc($data_nasc)
        {
                $this->data_nasc = $data_nasc;

                return $this;
        }

        public function getUsuario()
        {
                return $this->usuario;
        }

        public function setUsuario($usuario)
        {
                $this->usuario = $usuario;

                return $this;
        }

        public function getSenha()
        {
                return $this->senha;
        }

        public function setSenha($senha)
        {
                $this->senha = $senha;

                return $this;
        }
    }
?>