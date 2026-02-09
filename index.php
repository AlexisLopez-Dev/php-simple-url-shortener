<?php
session_start();
$codigo = $_GET['codigo'] ?? '';

$errorRedireccion = $_SESSION['errorRedireccion'];

if ($errorRedireccion){
    echo '<div style="font-family: sans-serif; text-align: center; margin-top: 50px; color: #721c24;">';
    echo '<h1>⚠️ Opps!</h1>';
    echo '<p>'. $errorRedireccion .'</p>';
    echo '<a href="admin.php">Ir al Panel Admin</a>';
    echo '</div>';

    session_unset();
    session_destroy();

} else {
    header('Location: controlador/redireccion.php?codigo=' . $codigo);
    exit();
}


