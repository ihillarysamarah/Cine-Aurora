<?php
    class Alimenticios {
        // Atributos
        private $id;
        private $nomefilme;
        private $duracao;
        private $sala_id_sala; // ASSOCIAÇÃO
        private $classificacaoIndicativa_idclassificacaoIndicativa; // ASSOCIAÇÃO

        // Métodos
        public function getId() {
            return $this->id;
        }

        public function setId($id) {
            $this->id = $id;
        }

        public function getNomefilme() {
            return $this->nomefilme;
        }

        public function setNomefilme($nomefilme) {
            $this->nomefilme = $nomefilme;
        }

        public function getDuracao() {
            return $this->duracao;
        }

        public function setDuracao($duracao) {
            $this->duracao = $duracao;
        }

        public function getSala_id_sala() {
            return $this->sala_id_sala;
        }

        public function setSala_id_sala($sala_id_sala) {
            $this->sala_id_sala = $sala_id_sala;
        }

        public function getClassificacaoIndicativa_idclassificacaoIndicativa() {
            return $this->classificacaoIndicativa_idclassificacaoIndicativa;
        }

        public function setClassificacaoIndicativa_idclassificacaoIndicativaa($classificacaoIndicativa_idclassificacaoIndicativa) {
            $this->classificacaoIndicativa_idclassificacaoIndicativa = $classificacaoIndicativa_idclassificacaoIndicativa;
        }


        // Método para retornar uma string do objeto
        public function __toString() {
            return $this->nomefilme;
        }
    }