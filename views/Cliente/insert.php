<?php
    require "../../autoload.php";

    // Construir o objeto do Cliente
    $Cliente = new Cliente();
    $Cliente->setNome($_POST['Nome']);
    $Cliente->setDt_Nascimento($_POST['dt_Nascimento']);
    $Cliente->setVendedor_id_vendedor($_POST['Vendedor']);

    // Inserir no Banco de Dados
    $dao = new ClienteDAO();
    $dao->create($Cliente);

    // Redirecionar para o index (Comentar quando não funcionar)
    header('Location: index.php');