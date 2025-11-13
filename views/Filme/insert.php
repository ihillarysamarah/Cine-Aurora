<?php
    require "../../autoload.php";

    // Construir o objeto da Classificação Indicativa
    $Filme = new Filme();
    $Filme->setNomefilme($_POST['nome']);

    // Inserir no Banco de Dados
    $dao = new FilmeDAO();
    $dao->create($Filme);

    // Redirecionar para o index (Comentar quando não funcionar)
    header('Location: index.php');