<?php
    class Sala {
        // Atributos
        private $id;
        private $descricao;

        // Métodos
        public function getId() {
            return $this->id;
        }

        public function setId($id) {
            $this->id = $id;
        }

        public function getDescricao() {
            return $this->descricao;
        }

        public function setDescricao($descricao) {
            $this->descricao = $descricao;
        }

        // Método para retornar uma string do objeto
        public function __toString() {
            return $this->id;
        }
    }