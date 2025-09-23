<?php
    require "../../autoload.php";

    // Construir o objeto do alimenticios
    $alimenticios = new Alimenticios();
    $alimenticios->setDescricao($_POST['descricao']);
    $alimenticios->setValor($_POST['valor']); 
    $alimenticios->setId($_POST['id']); 

    // Inserir no Banco de Dados
    $dao = new alimenticiosDAO();
    $dao-> update($alimenticios);

    // Redirecionar para o index (Comentar quando não funcionar)
    header('Location: index.php');