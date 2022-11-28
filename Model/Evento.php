<?php
    class Evento
    {
        private $id_evento;
        private $imagem;
        private $nome;
        private $data_evento;
        private $cidade;
        private $bairro;
        private $rua;
        private $valor;

        public function __construct($i = null, $n = null, $d = null, $c = null, $b = null, $r = null, $v = null)
        {
            $this->imagem = $i;
            $this->nome = $n;
            $this->data_evento = $d;
            $this->cidade = $c;
            $this->bairro = $b;
            $this->rua = $r;
            $this->valor = $v;
        }

        public function getId_evento()
        {
            return $this->id_evento;
        }

        public function setId_evento($id_evento)
        {
            $this->id_evento = $id_evento;

            return $this;
        }

        public function getImagem()
        {
            return $this->imagem;
        }

        public function setImagem($imagem)
        {
            $this->imagem = $imagem;

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

        public function getData_evento()
        {
            return $this->data_evento;
        }

        public function setData_evento($data_evento)
        {
            $this->data_evento = $data_evento;

            return $this;
        }

        public function getCidade()
        {
            return $this->cidade;
        }

        public function setCidade($cidade)
        {
            $this->cidade = $cidade;

            return $this;
        }

        public function getBairro()
        {
            return $this->bairro;
        }

        public function setBairro($bairro)
        {
            $this->bairro = $bairro;

            return $this;
        }

        public function getRua()
        {
            return $this->rua;
        }

        public function setRua($rua)
        {
            $this->rua = $rua;

            return $this;
        }

        public function getValor()
        {
            return $this->valor;
        }

        public function setValor($valor)
        {
            $this->valor = $valor;

            return $this;
        }
    }
?>