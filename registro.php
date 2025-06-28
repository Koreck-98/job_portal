<?php 
// Incluir la conexión a la base de datos
require 'C:/xampp/htdocs/job_portal/includes/conexion.php';

// Habilitar el reporte de errores
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Procesar el formulario si se envió
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $tipo = $_POST['tipo'];

    try {
        $stmt = $conn->prepare("INSERT INTO usuarios (nombre, email, password, tipo) VALUES (?, ?, ?, ?)");
        $stmt->execute([$nombre, $email, $password, $tipo]);
        
        // Redirigir al login después de registrar
        header("Location: login.php");
        exit();
    } catch(PDOException $e) {
        $error = "Error al registrar: " . $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Registro | Bolsa de Empleo</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto max-w-md mt-10 p-6 bg-white rounded shadow">
        <h2 class="text-2xl font-bold mb-6 text-center">Registro</h2>
        
        <?php if(isset($error)): ?>
            <div class="bg-red-100 border-red-400 text-red-700 px-4 py-3 mb-4 rounded"><?= $error ?></div>
        <?php endif; ?>
        
        <form method="POST">
            <div class="mb-4">
                <label class="block text-gray-700 mb-2">Nombre</label>
                <input type="text" name="nombre" class="w-full px-3 py-2 border rounded" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 mb-2">Correo Electrónico</label>
                <input type="email" name="email" class="w-full px-3 py-2 border rounded" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 mb-2">Contraseña</label>
                <input type="password" name="password" class="w-full px-3 py-2 border rounded" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 mb-2">Tipo de Usuario</label>
                <select name="tipo" class="w-full px-3 py-2 border rounded" required>
                    <option value="postulante">Postulante</option>
                    <option value="empleador">Empleador</option>
                </select>
            </div>
            <button type="submit" class="w-full bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700">
                Registrarse
            </button>
        </form>
        
        <div class="text-center mt-4">
            <a href="login.php" class="text-blue-600 hover:underline">¿Ya tienes cuenta? Inicia Sesión</a>
        </div>
    </div>
</body>
</html>

