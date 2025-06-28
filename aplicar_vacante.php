<?php
session_start();
if (!isset($_SESSION['usuario_id']) || $_SESSION['tipo'] != 'postulante') {
    header("Location: login.php");
}

include 'includes/conexion.php';

if (isset($_GET['id'])) {
    $vacante_id = $_GET['id'];
    $postulante_id = $_SESSION['usuario_id'];

    $stmt = $conn->prepare("INSERT INTO postulaciones (id_vacante, id_postulante) VALUES (?, ?)");
    $stmt->execute([$vacante_id, $postulante_id]);

    header("Location: dashboard_postulante.php?msg=Postulación exitosa");
}
?>
