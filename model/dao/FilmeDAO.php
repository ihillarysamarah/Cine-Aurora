<?php
    class FilmeDAO {
        public function create($Filme) {
            try {
                $query = BD::getConexao()->prepare(
                    "INSERT INTO Filme(nomefilme, duracao, sala_id_sala< classificacaoIndicativa_idclassificacaoIndicativa) 
                     VALUES (:f, :d, :s, :c)"
                );
                $query->bindValue(':f',$Filme->getNomefilme( ), PDO::PARAM_STR);
                $query->bindValue(':d,',$Filme->getDuracao(), PDO::PARAM_STR);
                $query->bindValue(':s,',$Filme->getSala_id_sala(), PDO::PARAM_STR);
                $query->bindValue(':c,',$Filme->getClassificacaoIndicativa_idclassificacaoIndicativa(), PDO::PARAM_STR);

                if(!$query->execute())
                    print_r($query->errorInfo());
            }
            catch(PDOException $e) {
                echo "Erro #1: " . $e->getMessage();
            }
        }

        public function read() {
            try {
                $query = BD::getConexao()->prepare("SELECT * FROM Filme");
                

                if(!$query->execute())
                    print_r($query->errorInfo());

                $FilmeF = array();
                foreach($query->fetchAll(PDO::FETCH_ASSOC) as $linha) {
                    $Filme = new Filme();
                    $Filme->setId($linha['idFilme']);
                    $Filme->setNomefilme( $linha['nomefilme' ]);
                    $Filme->setDuracao($linha['duracao']);
                    $Filme->setSala_id_sala($linha['sala']);
                    $Filme->setClassificacaoIndicativa_idclassificacaoIndicativa($linha['classificação']);

                    array_push($FilmeF,$Filme);
                }

                return $FilmeF;
            }
            catch(PDOException $e) {
                echo "Erro #2: " . $e->getMessage();
            }
        }

        
        public function find($id) {
            try {
                $query = BD::getConexao()->prepare("SELECT * FROM Filme WHERE idFilme = :i");
                $query -> bindValue(':i', $id, PDO::PARAM_INT);

                

                if(!$query->execute())
                    print_r($query->errorInfo());

                //$FilmeF = array();
                $linha = $query->fetch(PDO::FETCH_ASSOC);
                $Filme = new Filme();
                $Filme->setId($linha['idFilme']);
                $Filme->setNomefilme( $linha['nomefilme' ]);
                $Filme->setDuracao($linha['duracao']);
                $Filme->setSala_id_sala($linha['sala']);
                $Filme->setClassificacaoIndicativa_idclassificacaoIndicativa($linha['classificação']);


                return $Filme;
            }
            catch(PDOException $e) {
                echo "Erro #3: " . $e->getMessage();
            }
        }

         public function update($Filme) {
            try {
                $query = BD::getConexao()->prepare(
                    "UPDATE Filme
                     SET nomefilme  = :f, duracao = :d,
                     WHERE idFilme = :i"
                );
                $query->bindValue(':f',$Filme->getNomefilme( ), PDO::PARAM_STR);
                $query->bindValue(':d,',$Filme->getDuracao(), PDO::PARAM_STR);
                $query->bindValue(':s,',$Filme->getSala_id_sala(), PDO::PARAM_STR);
                $query->bindValue(':c,',$Filme->getClassificacaoIndicativa_idclassificacaoIndicativa(), PDO::PARAM_STR);

                $query->bindValue(':i',$Filme->getId(), PDO::PARAM_INT);

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
                    "DELETE FROM Filme
                     WHERE idFilme = :i"
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