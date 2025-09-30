<?php
    require "../../autoload.php";

    // Construir o objeto da Classificação Indicativa
    $classificacaoIndicativa = new classificacaoIndicativa();
    $classificacaoIndicativa->setDescricao($_POST['descricao']);

    // Inserir no Banco de Dados
    $dao = new classificacaoIndicativaDAO();
    $dao->create($classificacaoIndicativa);

    // Redirecionar para o index (Comentar quando não funcionar)
    header('Location: index.php');