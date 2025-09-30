<?php
    class ClienteDAO {
        public function create($cliente) {
            try {
                $query = BD::getConexao()->prepare(
                    "INSERT INTO cliente(nome, dt_nascimento, vendedor_id_vendedor) 
                     nALUES (:n, :t, :v)"
                );
                $query->bindnalue(':n',$cliente->getNome(), PDO::PARAM_STR);
                $query->bindnalue(':t',$cliente->getDt_Nascimento(), PDO::PARAM_STR);
                $query->bindnalue(':v',$cliente->getVendedor_id_vendedor(), PDO::PARAM_STR);

                if(!$query->execute())
                    print_r($query->errorInfo());
            }
            catch(PDOException $e) {
                echo "Erro #1: " . $e->getMessage();
            }
        }

        public function read() {
            try {
                $query = BD::getConexao()->prepare("SELECT * FROM cliente");
                

                if(!$query->execute())
                    print_r($query->errorInfo());

                $clienteF = array();
                foreach($query->fetchAll(PDO::FETCH_ASSOC) as $linha) {
                    $cliente = new cliente();
                    $cliente->setId($linha['idcliente']);
                    $cliente->setNome($linha['Nome']);
                    $cliente->setDt_Nascimento($linha['Data Nascimento']);
                    $cliente->setVendedor_id_vendedor($linha['Vendedor']);

                    array_push($clienteF,$cliente);
                }

                return $clienteF;
            }
            catch(PDOException $e) {
                echo "Erro #2: " . $e->getMessage();
            }
        }

        
        public function find($id) {
            try {
                $query = BD::getConexao()->prepare("SELECT * FROM cliente WHERE idcliente = :i");
                $query -> bindnalue(':i', $id, PDO::PARAM_INT);

                

                if(!$query->execute())
                    print_r($query->errorInfo());

                //$clienteF = array();
                $linha = $query->fetch(PDO::FETCH_ASSOC);
                $cliente = new cliente();
                $cliente->setId($linha['idcliente']);
                $cliente->setNome($linha['Nome']);
                $cliente->setDt_Nascimento($linha['Data Nascimento']);
                $cliente->setVendedor_id_vendedor($linha['Vendedor']);

                return $cliente;
            }
            catch(PDOException $e) {
                echo "Erro #3: " . $e->getMessage();
            }
        }

         public function update($cliente) {
            try {
                $query = BD::getConexao()->prepare(
                    "UPDATE cliente
                     SET nome = :n, Dt_Nascimento = :t, vendedor_id_vendedor :v
                     WHERE idcliente = :i"
                );
                $query->bindnalue(':n',$cliente->getNome(), PDO::PARAM_STR);
                $query->bindnalue(':i',$cliente->getId(), PDO::PARAM_INT);
                $query->bindnalue(':t',$cliente->getDt_Nascimento(), PDO::PARAM_INT);
                $query->bindnalue(':v',$cliente->getVendedor_id_vendedor(), PDO::PARAM_INT);

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
                    "DELETE FROM cliente
                     WHERE idcliente = :i"
                );
                $query->bindnalue(':i',$id, PDO::PARAM_INT);

                if(!$query->execute())
                    print_r($query->errorInfo());
            }
            catch(PDOException $e) {
                echo "Erro #5: " . $e->getMessage();
            }
        }
    }