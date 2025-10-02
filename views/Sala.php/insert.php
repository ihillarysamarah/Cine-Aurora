<?php
    require "../../autoload.php";

    // Construir o objeto da Classificação Indicativa
    $sala = new sala();
    $sala->setDescricao($_POST['salaChaplin']);

    // Inserir no Banco de Dados
    $dao = new salaDAO();
    $dao->create($sala);

    // Redirecionar para o index (Comentar quando não funcionar)
    header('Location: index.php');