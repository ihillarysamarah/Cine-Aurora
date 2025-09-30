<?php
    require "../../autoload.php";

    // Construir o objeto do cliente
    $cliente = new cliente();
    $cliente->setNome($_POST['Nome']);
    $cliente->setDt_Nascimento($_POST['Data de Nascimento']);
    $cliente->setVendedor_id_vendedor($_POST['Vendedor']);
    $cliente->setId($_POST['id']); 

    // Inserir no Banco de Dados
    $dao = new clienteDAO();
    $dao-> update($cliente);

    // Redirecionar para o index (Comentar quando não funcionar)
    header('Location: index.php');