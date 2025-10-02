<?php
    class Cliente {
        // Atributos
        private $id;
        private $nome;
        private $dt_nascimento;
        private $vendedor_id_vendedor;

        // Métodos
        public function getId() {
            return $this->id;
        }

        public function setId($id) {
            $this->id = $id;
        }

        public function getNome() {
            return $this->nome;
        }

        public function setNome($nome) {
            $this->nome = $nome;
        }

        public function getDt_nascimento() {
            return $this->dt_nascimento;
        }

        public function setDt_nascimento($dt_nascimento) {
            $this->dt_nascimento = $dt_nascimento;
        }

       public function getVendedor_id_vendedor() {
            return $this->vendedor_id_vendedor;
        }

        public function setVendedor_id_vendedor($vendedor_id_vendedor) {
            $this->vendedor_id_vendedor = $vendedor_id_vendedor;
        }


        // Método para retornar uma string do objeto
        public function __toString() {
            return $this->nome;
        }
    }