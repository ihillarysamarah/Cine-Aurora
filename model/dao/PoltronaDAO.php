<?php
    class PoltronaDAO {
        public function create($poltrona){
            try {
                $query = BD::getConexao()->prepare(
                    "INSERT INTO Poltrona(num_poltrona, sala_id_sala)
                    VALUES (:n, :s)"
                );
                $query->bindValue(':n', $Poltrona -> getNum_poltrona(), PDO::PARAM_INT);
                $query->bindValue(':s', $Poltrona -> getSala_id_sala(), PDO::PARAM_INT);

                if(!$query->execute())
                    print_r($query->errorInfo());
            }
            catch(PDOException $e) {
                echo "Erro #1: " . $e->getMessage();
            }
        }

        public function read() {
            try {
                $query = BD::getConexao()->prepare("SELECT * FROM Poltrona");
                

                if(!$query->execute())
                    print_r($query->errorInfo());

                $Poltronas = array();
                foreach($query->fetchAll(PDO::FETCH_ASSOC) as $linha) {
                    $Poltrona = new Poltrona();
                    $Poltrona->setId($linha['id_poltrona']);
                    $Poltrona->setNum_poltrona($linha['num_poltrona']);

                    array_push($Poltronas,$Poltrona);
                }

                return $Poltronas;
            }
            catch(PDOException $e) {
                echo "Erro #2: " . $e->getMessage();
            }
        }

        public function find($id) {
            try {
                $query = BD::getConexao()->prepare("SELECT * FROM Poltrona WHERE id_poltrona = :i");
                $query->bindValue(':i',$id, PDO::PARAM_INT);
                

                if(!$query->execute())
                    print_r($query->errorInfo());

                $linha = $query->fetch(PDO::FETCH_ASSOC);
                
                $Poltrona = new Poltrona();
                $Poltrona->setId($linha['id_poltrona']);
                $Poltrona->setNum_poltrona($linha['num_poltrona']);


                return $Poltrona;
            }
            catch(PDOException $e) {
                echo "Erro #3: " . $e->getMessage();
            }
        }

        public function update($Poltrona) {
            try {
                $query = BD::getConexao()->prepare(
                    "UPDATE Poltrona
                     SET num_poltrona = :n
                     WHERE id_poltrona = :i"
                );
                $query->bindValue(':n',$Poltrona->getNum_poltrona(), PDO::PARAM_INT);
                $query->bindValue(':i',$Poltrona->getId(), PDO::PARAM_INT);

                if(!$query->execute())
                    print_r($query->errorInfo());
            }
            catch(PDOException $e) {
                echo "Erro #3: " . $e->getMessage();
            }
        }

        public function destroy($id) {
            try {
                $query = BD::getConexao()->prepare(
                    "DELETE FROM Poltrona
                     WHERE id_poltrona :i"
                );
                $query->bindValue(':i',$id, PDO::PARAM_INT);

                if(!$query->execute())
                    print_r($query->errorInfo());
            }
            catch(PDOException $e) {
                echo "Erro #4: " . $e->getMessage();
            }
        }
    }