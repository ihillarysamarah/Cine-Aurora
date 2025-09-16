<?php
    class Cliente {
        // Atributos
        private $id;
        private $nome;
        private $dt_nascimento;

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


        // Método para retornar uma string do objeto
        public function __toString() {
            return $this->nome;
        }
    }