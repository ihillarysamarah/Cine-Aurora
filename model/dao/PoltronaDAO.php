<?php
    class PoltronaDAO {
        public function create($Poltrona){
            try {
                $query = BD::getConexao()->prepare(
                    "INSERT INTO Poltrona(num_poltrona, sala_id_sala)
                    VALUES (:n, :s)"
                );
                $query->bindValue(':n', $Poltrona -> getNum_poltrona(), PDO::PARAM_INT);
                $query->bindValue(':s', $Poltrona -> getSala()->getId(), PDO::PARAM_INT);

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
                    // Para a assoiação com a Sala
                    $SalaDAO = new SalaDAO();
                    $Sala = $SalaDAO -> find($linha['sala_id_sala']);

                    // Construindo um objeto do produto
                    $Poltrona = new Poltrona();
                    $Poltrona->setId($linha['id_poltrona']);
                    $Poltrona->setNum_poltrona($linha['num_poltrona']);
                    // Definir o atributo (objeto) Sala
                    $Poltrona->setSala($Sala);

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
                // Para a associação com a Sala
                $PoltronaDAO = new SalaDAO();
                $Sala = $PoltronaDAO->find($linha['Sala']);

                // Construindo um objeto da poltrona
                $Poltrona = new Poltrona();
                $Poltrona->setId($linha['id_poltrona']);
                $Poltrona->setNum_poltrona($linha['num_poltrona']);
                // Definir o atributo (objeto) sala
                $Poltrona -> setSala($sala);


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
                     SET num_poltrona = :n, sala_id,sala = :s
                     WHERE id_poltrona = :i"
                );
                $query->bindValue(':n',$Poltrona->getNum_poltrona(), PDO::PARAM_INT);
                $query->bindValue(':i',$Poltrona->getId(), PDO::PARAM_INT);
                // Bind para chave estrangeira
                $query->bindValue(':s', $Poltrona->getSala()->getId(), PDO::PARAM_INT);

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
                    "DELETE FROM Poltrona
                     WHERE id_poltrona :i"
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