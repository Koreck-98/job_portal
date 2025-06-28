<?php
session_start();
require 'includes/conexion.php';

// Verificar si el usuario está autenticado como empleador
if (!isset($_SESSION['usuario_id']) || $_SESSION['tipo'] != 'empleador') {
    header("Location: login.php");
    exit();
}

// Procesar el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validar y sanitizar los datos
    $titulo = filter_input(INPUT_POST, 'titulo', FILTER_SANITIZE_STRING);
    $empresa = filter_input(INPUT_POST, 'empresa', FILTER_SANITIZE_STRING);
    $descripcion = filter_input(INPUT_POST, 'descripcion', FILTER_SANITIZE_STRING);
    $salario = filter_input(INPUT_POST, 'salario', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    $ubicacion = filter_input(INPUT_POST, 'ubicacion', FILTER_SANITIZE_STRING);
    $id_empleador = $_SESSION['usuario_id'];

    try {
        // Insertar la vacante en la base de datos
        $stmt = $conn->prepare("INSERT INTO vacantes (titulo, empresa, descripcion, salario, ubicacion, id_empleador, fecha_publicacion) 
                               VALUES (?, ?, ?, ?, ?, ?, NOW())");
        $stmt->execute([$titulo, $empresa, $descripcion, $salario, $ubicacion, $id_empleador]);

        // Redirigir con mensaje de éxito
        $_SESSION['mensaje'] = "Vacante publicada exitosamente";
        header("Location: dashboard_empleador.php");
        exit();

    } catch (PDOException $e) {
        // Manejar errores de base de datos
        $_SESSION['error'] = "Error al publicar la vacante: " . $e->getMessage();
        header("Location: publicar_vacante.php");
        exit();
    }
} else {
    // Si no es POST, redirigir
    header("Location: dashboard_empleador.php");
    exit();
}
?>
