<?php
    require "../../autoload.php";

    // Construir o objeto do Poltrona
    $Poltrona = new Poltrona();
    $Poltrona->setNum_poltrona($_POST['num_poltrona']);
    $Poltrona->setSala_id_sala($_POST['sala_id_sala']); 
    $Poltrona->setId($_POST['id']); 

    // Inserir no Banco de Dados
    $dao = new PoltronaDAO();
    $dao-> update($Poltrona);

    // Redirecionar para o index (Comentar quando não funcionar)
    header('Location: index.php');