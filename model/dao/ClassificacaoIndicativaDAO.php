<?php
    class ClassificacaoIndicativaDAO {
        public function create($classificacaoIndicativa) {
            try {
                $query = BD::getConexao()->prepare(
                    "INSERT INTO classificacaoIndicativa(descricao) 
                     VALUES (:d)"
                );
                $query->bindValue(':d',$classificacaoIndicativa->getDescricao(), PDO::PARAM_STR);

                if(!$query->execute())
                    print_r($query->errorInfo());
            }
            catch(PDOException $e) {
                echo "Erro #1: " . $e->getMessage();
            }
        }

        public function read() {
            try {
                $query = BD::getConexao()->prepare("SELECT * FROM classificacaoIndicativa");
                

                if(!$query->execute())
                    print_r($query->errorInfo());

                $classificacaoIndicativaF = array();
                foreach($query->fetchAll(PDO::FETCH_ASSOC) as $linha) {
                    $classificacaoIndicativa = new classificacaoIndicativa();
                    $classificacaoIndicativa->setId($linha['idclassificacaoIndicativa']);
                    $classificacaoIndicativa->setDescricao($linha['descricao']);

                    array_push($classificacaoIndicativaF,$classificacaoIndicativa);
                }

                return $classificacaoIndicativaF;
            }
            catch(PDOException $e) {
                echo "Erro #2: " . $e->getMessage();
            }
        }

        
        public function find($id) {
            try {
                $query = BD::getConexao()->prepare("SELECT * FROM classificacaoIndicativa WHERE idclassificacaoIndicativa = :i");
                $query -> bindValue(':i', $id, PDO::PARAM_INT);

                

                if(!$query->execute())
                    print_r($query->errorInfo());

                //$classificacaoIndicativaF = array();
                $linha = $query->fetch(PDO::FETCH_ASSOC);
                $classificacaoIndicativa = new classificacaoIndicativa();
                $classificacaoIndicativa->setId($linha['idclassificacaoIndicativa']);
                $classificacaoIndicativa->setDescricao($linha['descricao']);

                return $classificacaoIndicativa;
            }
            catch(PDOException $e) {
                echo "Erro #3: " . $e->getMessage();
            }
        }

         public function update($classificacaoIndicativa) {
            try {
                $query = BD::getConexao()->prepare(
                    "UPDATE classificacaoIndicativa
                     SET descricao = :d
                     WHERE idclassificacaoIndicativa = :i"
                );
                $query->bindValue(':d',$classificacaoIndicativa->getDescricao(), PDO::PARAM_STR);
                $query->bindValue(':i',$classificacaoIndicativa->getId(), PDO::PARAM_INT);

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
                    "DELETE FROM classificacaoIndicativa
                     WHERE idclassificacaoIndicativa = :i"
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