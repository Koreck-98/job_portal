<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Bolsa de Empleo</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <!-- En tu includes/header.php -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <nav>
        <a href="index.php">Inicio</a>
        <?php if (isset($_SESSION['usuario_id'])): ?>
            <a href="logout.php">Cerrar Sesión</a>
        <?php else: ?>
            <a href="login.php">Iniciar Sesión</a>
            <a href="registro.php">Registrarse</a>
        <?php endif; ?>
    </nav>
