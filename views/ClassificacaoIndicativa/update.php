<?php
    require "../../autoload.php";

    // Construir o objeto do classificacaoIndicativa
    $classificacaoIndicativa = new classificacaoIndicativa();
    $classificacaoIndicativa->setDescricao($_POST['descricao']);
    $classificacaoIndicativa->setId($_POST['id']); 

    // Inserir no Banco de Dados
    $dao = new classificacaoIndicativaDAO();
    $dao-> update($classificacaoIndicativa);

    // Redirecionar para o index (Comentar quando não funcionar)
    header('Location: index.php');