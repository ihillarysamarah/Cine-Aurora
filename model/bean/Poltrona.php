<?php
    class Poltrona {
        //Atributos
        private $id;
        private $num_poltrona;
        private $sala_id_sala;

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

        public function getSala_id_sala(){
            return $this -> sala_id_sala;
        }

        public function setSala_id_sala($sala_id_sala){
            $this -> sala_id_sala = $sala_id_sala;
        }

        //Método para retornar um string do objeto
        public function __toString(){
            return $this -> num_poltrona;
        }
    }