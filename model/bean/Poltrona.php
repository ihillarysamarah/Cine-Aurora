<?php
    class Poltrona {
        //Atributos
        private $id;
        private $num_poltrona;
        private $sala; // ASSOCIAÇÃO

        //Métodos
        public function getId(){
            return $this -> id;
        }

        public function setId($id){
            $this -> id = $id;
        }

        public function getNum_poltrona(){
            return $this -> num_poltrona;
        }

        public function setNum_poltrona($num_poltrona){
            $this -> num_poltrona = $num_poltrona;
        }

        public function getSala(){
            return $this -> sala;
        }

        public function setSala($sala){
            $this -> sala = $sala;
        }

        //Método para retornar um string do objeto
        public function __toString(){
            return $this -> num_poltrona;
        }
    }