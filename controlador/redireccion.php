<?php
require_once '../modelo/DAODireccion.php';
session_start();


$urlCorta = $_GET['codigo'];
$dao = new DAODireccion();
$existe = $dao->obtenerPorUrlCorta($urlCorta);

if ($existe){

    $id = $existe->getId();
    $clicksActualizado = $existe->getClicks()+1;

    $dao->updateClicks($id, $clicksActualizado);

    header('Location: ' . $existe->getUrlLarga());
    exit();

} else {
    $_SESSION['errorRedireccion'] = 'Error de redireccion. Ese código no existe.';
    header('Location: ../index.php');
    exit();
}
