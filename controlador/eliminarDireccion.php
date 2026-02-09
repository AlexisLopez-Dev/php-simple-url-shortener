<?php
require_once '../modelo/DAODireccion.php';
session_start();

if(!empty($_GET['id'])){
    $id = $_GET['id'];
    $dao = new DAODireccion();

    $existe = $dao->obtenerPorId($id);

    if ($existe){
        $dao->delete($id);

        $_SESSION['mensaje'] = 'Dirección eliminada correctamente.';
        header('Location: ../admin.php');
        exit();

    } else {
        $_SESSION['mensaje'] = 'Ese ID no existe.';
        header('Location: ../admin.php');
        exit();
    }

} else {
    $_SESSION['mensaje'] = 'Id necesario para la operación.';
    header('Location: ../admin.php');
    exit();
}

