<?php
   ini_set('display_errors', 1);
   ini_set('display_startup_errors', 1);
   error_reporting(E_ALL);
    
session_start();
if (!isset($_SESSION['usuario_id']) || $_SESSION['tipo'] != 'postulante') {
header("Location: login.php");
    exit();
}

require 'C:/xampp/htdocs/job_portal/includes/conexion.php';
include 'includes/header.php'; 
?>

<style>
    body {
        background: linear-gradient(135deg, #4f46e5, #8b5cf6);
        color: #333;
        padding: 30px;
    }
    .container {
        background: #fff;
        padding: 40px;
        border-radius: 20px;
        box-shadow: 0 10px 25px rgba(0,0,0,0.15);
        max-width: 900px;
        margin: auto;
    }
    .form-group {
        margin-bottom: 20px;
    }
    .vacante-card {
        background: #f8f9fa;
        border-left: 5px solid #4f46e5;
        border-radius: 10px;
        padding: 20px;
        margin-bottom: 20px;
        box-shadow: 0 4px 10px rgba(0,0,0,0.05);
    }
    .btn-primary {
        background-color: #4f46e5;
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
    }
    .btn-primary:hover {
        background-color: #3b3f9a;
    }
</style>

<div class="container">
    <h2 class="text-center mb-4">🔍 Buscar Vacantes</h2>
    <form method="GET" action="buscar_vacantes.php" class="mb-4">
        <div class="form-group">
            <input type="text" name="busqueda" placeholder="Palabra clave" class="form-control" required>
        </div>
        <div class="form-group">
            <input type="text" name="ubicacion" placeholder="Ubicación" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Buscar</button>
    </form>

    <h3 class="text-center mb-4">📄 Mis Postulaciones</h3>
    <?php
    $stmt = $conn->prepare("SELECT v.* FROM vacantes v JOIN postulaciones p ON v.id = p.id_vacante WHERE p.id_postulante = ?");
    $stmt->execute([$_SESSION['usuario_id']]);
    $postulaciones = $stmt->fetchAll();

    if (count($postulaciones) > 0) {
        foreach ($postulaciones as $post) {
            echo "<div class='vacante-card'>";
            echo "<h4 class='text-primary'>" . htmlspecialchars($post['titulo']) . "</h4>";
            echo "<p><strong>Empresa:</strong> " . htmlspecialchars($post['empresa']) . "</p>";
            echo "<p><strong>Publicado:</strong> " . htmlspecialchars($post['fecha_publicacion']) . "</p>";
            echo "</div>";
        }
    } else {
        echo "<p class='text-center text-muted'>No has realizado ninguna postulación aún.</p>";
    }
    ?>

    <div class="text-center mt-4">
        <a href="index.php" class="btn btn-secondary">🏠 Regresar a Inicio</a>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
