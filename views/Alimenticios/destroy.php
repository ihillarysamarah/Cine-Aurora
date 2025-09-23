<?php
    require "../../autoload.php";

    // Deletar  no Banco de Dados
    $dao = new alimenticiosDAO();
    $dao->destroy($_GET['id']);

    // Redirecionar para o index (Comentar quando não funcionar)
    header('Location: index.php');