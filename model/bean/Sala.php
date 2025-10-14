<?php
    class Sala {
        // Atributos
        private $id;
        private $descricao;
        private $sala_id_sala; // Associação com a classe POltrona

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

        public function getSala_id_sala(){
            return $this -> sala_id_sala;
        }

        public function setSala_id_sala($sala_id_sala){
            $this -> sala_id_sala = $sala_id_sala;
        }

        // Método para retornar uma string do objeto
        public function __toString() {
            return $this->id;
        }
    }