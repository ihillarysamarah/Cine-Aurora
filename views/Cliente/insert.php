<?php
    require "../../autoload.php";

    // Construir o objeto do Cliente
    $Cliente = new Cliente();
    $Cliente->setNome($_POST['nome']);
    $Cliente->setDt_nascimento($_POST['dt_nascimento']);
    $Cliente->setVendedor_id_vendedor($_POST['vendedor_id_vendedor']);

    // Inserir no Banco de Dados
    $dao = new ClienteDAO();
    $dao->create($Cliente);

    // Redirecionar para o index (Comentar quando não funcionar)
    header('Location: index.php');