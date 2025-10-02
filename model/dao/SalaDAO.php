<?php
    class SalaDAO {
        public function create($sala) {
            try {
                $query = BD::getConexao()->prepare(
                    "INSERT INTO sala(descricao) 
                     VALUES (:s)"
                );
                $query->bindValue(':s',$sala->getdescricao(), PDO::PARAM_STR); //descricao usando como descrição

                if(!$query->execute())
                    print_r($query->errorInfo());
            }
            catch(PDOException $e) {
                echo "Erro #1: " . $e->getMessage();
            }
        }

        public function read() {
            try {
                $query = BD::getConexao()->prepare("SELECT * FROM sala");
                

                if(!$query->execute())
                    print_r($query->errorInfo());

                $salaF = array();
                foreach($query->fetchAll(PDO::FETCH_ASSOC) as $linha) {
                    $sala = new sala();
                    $sala->setId($linha['id_sala']);
                    $sala->setdescricao($linha['descricao']);

                    array_push($salaF,$sala);
                }

                return $salaF;
            }
            catch(PDOException $e) {
                echo "Erro #2: " . $e->getMessage();
            }
        }

        
        public function find($id) {
            try {
                $query = BD::getConexao()->prepare("SELECT * FROM sala WHERE id_sala = :i");
                $query -> bindValue(':i', $id, PDO::PARAM_INT);

                

                if(!$query->execute())
                    print_r($query->errorInfo());

                //$salaF = array();
                $linha = $query->fetch(PDO::FETCH_ASSOC);
                $sala = new sala();
                $sala->setId($linha['id_sala']);
                $sala->setdescricao($linha['descricao']);

                return $sala;
            }
            catch(PDOException $e) {
                echo "Erro #3: " . $e->getMessage();
            }
        }

         public function update($sala) {
            try {
                $query = BD::getConexao()->prepare(
                    "UPDATE sala
                     SET descricao = :s
                     WHERE id_sala = :i"
                );
                $query->bindValue(':s',$sala->getdescricao(), PDO::PARAM_STR);
                $query->bindValue(':i',$sala->getId(), PDO::PARAM_INT);

                if(!$query->execute())
                    print_r($query->errorInfo());
            }
            catch(PDOException $e) {
                echo "Erro #4: " . $e->getMessage();
            }

        }
          public function destroy($id) {
            try {
                $query = BD::getConexao()->prepare(
                    "DELETE FROM sala
                     WHERE id_sala = :i"
                );
                $query->bindValue(':i',$id, PDO::PARAM_INT);

                if(!$query->execute())
                    print_r($query->errorInfo());
            }
            catch(PDOException $e) {
                echo "Erro #5: " . $e->getMessage();
            }
        }
    }