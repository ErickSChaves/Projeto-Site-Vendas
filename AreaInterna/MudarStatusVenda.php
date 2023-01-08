<?php

    require_once '../dao/VendaDAO.php';

    header("Location: form_Venda.php");

    $venda = new Venda();
    $venda->setId($_POST['idvendaModal']);
    $venda->setStatus($_POST['status']);

    VendaDao::atualizarStatus($venda);

?>