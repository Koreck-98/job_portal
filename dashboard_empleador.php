<?php 
session_start();
if (!isset($_SESSION['usuario_id']) || $_SESSION['tipo'] != 'empleador') {
    header("Location: login.php");
    exit();
}

include 'includes/conexion.php';
include 'includes/header.php'; 
?>

<style>
    body {
        background: linear-gradient(135deg, #4f46e5, #8b5cf6);
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 30px;
    }
    .form-container {
        background: #fff;
        padding: 40px;
        border-radius: 20px;
        box-shadow: 0 10px 25px rgba(0,0,0,0.15);
        max-width: 900px;
        width: 100%;
    }
    .vacante-card {
        background: #f8f9fa;
        border-left: 5px solid #4f46e5;
        border-radius: 10px;
        padding: 20px;
        margin-bottom: 20px;
        box-shadow: 0 4px 10px rgba(0,0,0,0.05);
    }
</style>

<div class="form-container">
    <h2 class="text-center mb-4 text-primary">📄 Publicar Nueva Vacante</h2>
    <p class="text-center text-muted mb-5">Completa el formulario para agregar una nueva oportunidad laboral.</p>

    <form method="POST" action="publicar_vacante.php" class="row g-3">
        <div class="col-md-6">
            <label class="form-label">Título de la vacante</label>
            <input type="text" name="titulo" class="form-control" required>
        </div>
        <div class="col-md-6">
            <label class="form-label">Nombre de la empresa</label>
            <input type="text" name="empresa" class="form-control" required>
        </div>
        <div class="col-12">
            <label class="form-label">Descripción del trabajo</label>
            <textarea name="descripcion" rows="4" class="form-control" required></textarea>
        </div>
        <div class="col-md-6">
            <label class="form-label">Salario ofrecido</label>
            <input type="number" name="salario" class="form-control">
        </div>
        <div class="col-md-6">
            <label class="form-label">Ubicación del trabajo</label>
            <input type="text" name="ubicacion" class="form-control">
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary w-100 py-2">🚀 Publicar Vacante</button>
        </div>
    </form>

    <hr class="my-5">

    <h4 class="text-center text-success mb-4">📌 Mis Vacantes Publicadas</h4>

    <?php
    $stmt = $conn->prepare("SELECT * FROM vacantes WHERE id_empleador = ?");
    $stmt->execute([$_SESSION['usuario_id']]);
    $vacantes = $stmt->fetchAll();

    if (count($vacantes) > 0) {
        foreach ($vacantes as $vacante) {
            echo "<div class='vacante-card'>";
            echo "<h5 class='text-primary'>" . htmlspecialchars($vacante['titulo']) . "</h5>";
            echo "<p>" . nl2br(htmlspecialchars($vacante['descripcion'])) . "</p>";
            echo "<div class='mt-2'>";
            echo "<a href='editar_vacante.php?id=" . $vacante['id'] . "' class='btn btn-sm btn-outline-primary me-2'>✏️ Editar</a>";
            echo "<a href='eliminar_vacante.php?id=" . $vacante['id'] . "' class='btn btn-sm btn-outline-danger'>🗑️ Eliminar</a>";
            echo "</div>";
            echo "</div>";
        }
    } else {
        echo "<p class='text-center text-muted'>No has publicado ninguna vacante aún.</p>";
    }
    ?>

    <!-- Botón para regresar a inicio -->
    <div class="text-center mt-4">
        <a href="index.php" class="btn btn-secondary">🏠 Regresar a Inicio</a>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
