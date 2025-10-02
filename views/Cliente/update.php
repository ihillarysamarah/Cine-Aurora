<?php
    require "../../autoload.php";

    // Construir o objeto do cliente
    $cliente = new cliente();
    $cliente->setNome($_POST['nome']);
    $cliente->setDt_nascimento($_POST['dt_nascimento']);
    $cliente->setId($_POST['id']); 

    // Inserir no Banco de Dados
    $dao = new clienteDAO();
    $dao-> update($cliente);

    // Redirecionar para o index (Comentar quando não funcionar)
    header('Location: index.php');