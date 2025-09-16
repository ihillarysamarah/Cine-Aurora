<?php
    class Sala {
        // Atributos
        private $id;
        private $salaChaplin;
        private $salaSinfonia;

        // Métodos
        public function getId() {
            return $this->id;
        }

        public function setId($id) {
            $this->id = $id;
        }

        public function getSalaChaplin() {
            return $this->salaChaplin;
        }

        public function setSalaChaplin($salaChaplin) {
            $this->salaChaplin = $salaChaplin;
        }

        public function getSalaSinfonia() {
            return $this->salaSinfonia;
        }

        public function setSalaSinfonia($salaSinfonia) {
            $this->salaSinfonia = $salaSinfonia;
        }


        // Método para retornar uma string do objeto
        public function __toString() {
            return $this->id;
        }
    }