<?php
    require "../../autoload.php";

    // Construir o objeto do Poltrona
    $Poltrona = new Poltrona();
   $Poltrona->setNum_poltrona($_POST['num_poltrona']);
    $Poltrona->setId($_POST['id']); 
    
    // Construir um objeto do Sala
    $Sala = new Sala();
    $Sala->setId($_POST['sala_id_sala']);

    // Definir o Sala (objeto da associação) na classe Poltrona
    $Poltrona->setsala($Sala);

    // Inserir no Banco de Dados
    $dao = new PoltronaDAO();
    $dao->update($Poltrona);

    // Redirecionar para o index (Comentar quando não funcionar)
    header('Location: index.php');