<?php
    class AlimenticiosDAO {
        public function create($alimenticios) {
            try {
                $query = BD::getConexao()->prepare(
                    "INSERT INTO alimenticios(descricao,valor) 
                     VALUES (:d, :v)"
                );
                $query->bindValue(':d',$alimenticios->getDescricao(), PDO::PARAM_STR);
                $query->bindValue(':v',$alimenticios->getValor(), PDO::PARAM_STR);

                if(!$query->execute())
                    print_r($query->errorInfo());
            }
            catch(PDOException $e) {
                echo "Erro #1: " . $e->getMessage();
            }
        }

        public function read() {
            try {
                $query = BD::getConexao()->prepare("SELECT * FROM alimenticios");
                

                if(!$query->execute())
                    print_r($query->errorInfo());

                $alimenticiosF = array();
                foreach($query->fetchAll(PDO::FETCH_ASSOC) as $linha) {
                    $alimenticios = new alimenticios();
                    $alimenticios->setId($linha['idalimenticios']);
                    $alimenticios->setDescricao($linha['descricao']);
                    $alimenticios->setValor($linha['valor']);

                    array_push($alimenticiosF,$alimenticios);
                }

                return $alimenticiosF;
            }
            catch(PDOException $e) {
                echo "Erro #2: " . $e->getMessage();
            }
        }
    }