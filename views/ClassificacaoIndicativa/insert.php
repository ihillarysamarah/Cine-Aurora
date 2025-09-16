<?php
    require "../../autoload.php";

    // Construir o objeto do Fornecedor
    $fornecedor = new Fornecedor();
    $fornecedor->setDescricao($_POST['descricao']);

    // Inserir no Banco de Dados
    $dao = new FornecedorDAO();
    $dao->create($fornecedor);

    // Redirecionar para o index (Comentar quando não funcionar)
    header('Location: index.php');