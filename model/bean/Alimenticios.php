<?php
    class Alimenticios {
        // Atributos
        private $id;
        private $descricao;
        private $valor;

        // Métodos
        public function getId() {
            return $this->id;
        }

        public function setId($id) {
            $this->id = $id;
        }

        public function getdescricao() {
            return $this->descricao;
        }

        public function setdescricao($descricao) {
            $this->descricao = $descricao;
        }

        public function getValor() {
            return $this->valor;
        }

        public function setValor($valor) {
            $this->valor = $valor;
        }


        // Método para retornar uma string do objeto
        public function __toString() {
            return $this->descricao;
        }
    }