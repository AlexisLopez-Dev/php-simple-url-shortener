<?php
session_start();

if (!empty($_GET['id'])) {
    $id = $_GET['id'];
} else {
    $_SESSION['mensaje'] = 'Id necesario para la operación.';
    header('Location: ../admin.php');
    exit();
}
?>

<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editar Dirección</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body { background-color: #e9ecef; display: flex; align-items: center; justify-content: center; height: 100vh; }
        .card-edit { width: 100%; max-width: 500px; }
    </style>
</head>
<body>

<div class="card card-edit shadow-lg">
    <div class="card-header bg-warning text-dark">
        <h5 class="mb-0"><i class="fas fa-edit me-2"></i>Modificar Redirección</h5>
    </div>
    <div class="card-body">
        <p class="text-muted small">Estás editando la dirección con ID: <strong><?= htmlspecialchars($id) ?></strong></p>

        <form action="controlador/modificarDireccion.php" method="post">
            <div class="mb-4">
                <label class="form-label fw-bold">Nueva URL Destino</label>
                <input type="url" class="form-control form-control-lg" name="urlLarga" placeholder="https://nueva-url.com" required>
                <div class="form-text">Asegúrate de incluir https://</div>
            </div>

            <input type="hidden" name="id" value="<?=$id?>">

            <div class="d-flex justify-content-between">
                <a href="admin.php" class="btn btn-outline-secondary">Cancelar</a>
                <button type="submit" class="btn btn-warning fw-bold">Actualizar URL</button>
            </div>
        </form>
    </div>
</div>

</body>
</html>