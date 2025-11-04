<?php
    require "../../autoload.php";

    // Construir o objeto da poltrona
    $Poltrona = new Poltrona();
    $Poltrona->setNum_poltrona($_POST['num_poltrona']);

    $sala = new sala();
    $sala->setId($_POST['Sala']);

    $Poltrona->setSala($sala);

    // Inserir no Banco de Dados
    $dao = new PoltronaDAO();
    $dao->create($Poltrona);

    // Redirecionar para o index (Comentar quando não funcionar)
    header('Location: index.php');