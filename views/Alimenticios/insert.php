<?php
    require "../../autoload.php";

    // Construir o objeto do alimenticios
    $alimenticios = new Alimenticios();
    $alimenticios->setDescricao($_POST['descricao']);
    $alimenticios->setValor($_POST['valor']);

    // Inserir no Banco de Dados
    $dao = new alimenticiosDAO();
    $dao->create($alimenticios);

    // Redirecionar para o index (Comentar quando não funcionar)
    header('Location: index.php');