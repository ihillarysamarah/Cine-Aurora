<?php
    require "../../autoload.php";

    // Construir o objeto do Filme
    $Filme = new Filme();
    $Filme->setNomefilme($_POST['nome']);
    $Filme->setDuracao($_POST['duracao']);
    $Filme->setSala_id_sala($_POST['sala_id_sala']);
    $Filme->setClassificacaoIndicativa_idclassificacaoIndicativaa($_POST['classificacaoIndicativa_idclassificacaoIndicativaa']);
    $Filme->setId($_POST['id']); 

    // Inserir no Banco de Dados
    $dao = new FilmeDAO();
    $dao-> update($Filme);

    // Redirecionar para o index (Comentar quando não funcionar)
    header('Location: index.php');