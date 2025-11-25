<?php
    require "../../autoload.php";

    // Construir o objeto do sala
    $sala = new sala();
    $sala->setDescricao($_POST['descricao']);
    $sala->setId($_POST['id']); 

    // Inserir no Banco de Dados
    $dao = new salaDAO();
    $dao-> update($sala);

    // Redirecionar para o index (Comentar quando não funcionar)
    header('Location: index.php');