<?php
require_once 'modelo/DAODireccion.php';
require_once 'modelo/Direccion.php';
session_start();

$dao = new DAODireccion();
$listaDirecciones = $dao->getAll();
$mensaje = $_SESSION['mensaje'] ?? '';
unset($_SESSION['mensaje']);
?>

<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Panel Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body { background-color: #f8f9fa; }
        .card { box-shadow: 0 4px 6px rgba(0,0,0,0.1); border: none; }
        .table-action-btn { margin: 0 2px; }
    </style>
</head>
<body>

<nav class="navbar navbar-dark bg-primary mb-4">
    <div class="container">
        <span class="navbar-brand mb-0 h1"><i class="fas fa-link me-2"></i>Gestor de Redirecciones</span>
    </div>
</nav>

<div class="container">

    <?php if (!empty($mensaje)): ?>
        <div class="alert alert-success" role="alert">
            <i class="fas fa-check-circle me-2"></i> <?= htmlspecialchars($mensaje) ?>
        </div>
    <?php endif; ?>

    <div class="row">
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <div class="card-header bg-white">
                    <h5 class="mb-0 text-primary"><i class="fas fa-plus-circle me-2"></i>Nueva Dirección</h5>
                </div>
                <div class="card-body">
                    <form action="controlador/nuevaDireccion.php" method="post">
                        <div class="mb-3">
                            <label class="form-label">Código</label>
                            <input type="text" class="form-control" name="urlCorta" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">URL</label>
                            <input type="text" class="form-control" name="urlLarga" required>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-2"></i>Añadir
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-white">
                    <h5 class="mb-0 text-secondary"><i class="fas fa-list me-2"></i>Lista de Direcciones</h5>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-striped mb-0 align-middle">
                            <thead class="table-light">
                            <tr>
                                <th>ID</th>
                                <th>Código</th>
                                <th>URL</th>
                                <th class="text-center">Clicks</th>
                                <th class="text-end">Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($listaDirecciones as $direccion): ?>
                                <tr>
                                    <td><?= $direccion->getId() ?></td>
                                    <td><span class="badge bg-info text-dark"><?= htmlspecialchars($direccion->getUrlCorta()) ?></span></td>
                                    <td class="text-truncate" style="max-width: 150px;">
                                        <?= htmlspecialchars($direccion->getUrlLarga()) ?>
                                    </td>
                                    <td class="text-center fw-bold"><?= $direccion->getClicks() ?></td>
                                    <td class="text-end">
                                        <a href="formModificar.php?id=<?= $direccion->getId() ?>" class="btn btn-sm btn-warning table-action-btn" title="Modificar">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="controlador/eliminarDireccion.php?id=<?= $direccion->getId() ?>" class="btn btn-sm btn-danger table-action-btn" title="Borrar">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>