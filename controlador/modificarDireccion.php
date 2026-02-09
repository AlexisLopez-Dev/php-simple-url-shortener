<?php
require_once '../modelo/DAODireccion.php';
session_start();

if(!empty($_POST['urlLarga']) && !empty($_POST['id'])){

    $url = $_POST['urlLarga'];
    $id = $_POST['id'];

    $dao = new DAODireccion();

    $dao->updateUrlLarga($id, $url);
    $_SESSION['mensaje'] = 'Dirección actualizada correctamente.';
    header('Location: ../admin.php');
    exit();

} else {

    $_SESSION['mensaje'] = 'Error.';
    header('Location: ../admin.php');
    exit();

}

