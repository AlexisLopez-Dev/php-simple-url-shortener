<?php
require_once '../modelo/DAODireccion.php';
session_start();

if(!empty($_POST['urlCorta']) && !empty($_POST['urlLarga'])){
    $urlCorta = $_POST['urlCorta'];
    $urlLarga = $_POST['urlLarga'];

    $dao = new DAODireccion();

    $existe = $dao->buscarPorUrlCorta($urlCorta);
    if (empty($existe)){
        $dao->insert($urlCorta, $urlLarga);

        $_SESSION['mensaje'] = 'Dirección insertada satisfactoriamente.';
        header('Location: ../admin.php');
        exit();

    } else {
        $_SESSION['mensaje'] = 'Ese código ya existe.';
        header('Location: ../admin.php');
        exit();
    }

} else {
    $_SESSION['mensaje'] = 'Todos los campos son obligatorios';
    header('Location: ../admin.php');
    exit();
}

