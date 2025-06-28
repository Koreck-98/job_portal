<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JobConnect - Bolsa de Empleo</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .hero-bg {
            background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), url('https://images.unsplash.com/photo-1521791136063-7986c2920216?ixlib=rb-4.0.3');
            background-size: cover;
            background-position: center;
        }
    </style>
</head>
<body class="bg-gray-100">
    <!-- Barra de navegación -->
    <nav class="bg-blue-800 text-white shadow-lg">
        <div class="container mx-auto px-4 py-3 flex justify-between items-center">
            <div class="flex items-center space-x-2">
                <i class="fas fa-briefcase text-2xl"></i>
                <span class="text-xl font-bold">JobConnect</span>
            </div>
            <div class="space-x-4">
                   <!-- Enlaces CORRECTOS así: -->
   <a href="login.php" class="btn btn-primary">Iniciar Sesión</a>
   <a href="registro.php" class="btn btn-secondary">Registrarse</a>
   
     <?php

   ?>
   
  
            </div>
        </div>
    </nav>

    <!-- Sección Hero -->
    <!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Encuentra tu trabajo ideal</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .hero-bg {
            position: relative;
            overflow: hidden;
        }
        .hero-bg::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 0;
        }
        .hero-content {
            position: relative;
            z-index: 1;
        }
        .hero-image {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: -1;
        }
    </style>
</head>
<body>
    <section class="hero-bg text-white py-20">
        <!-- Imagen de fondo -->
        <img src="https://imgs.search.brave.com/bDQCIONRSZpG32Jrr4JfegJkgjFZm1w9D-a-E1PJ0J8/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9tZWRp/YS5nZXR0eWltYWdl/cy5jb20vaWQvOTc2/NjYxMjgvZXMvZm90/by9wcm9mZXNpb25l/cy5qcGc_cz02MTJ4/NjEyJnc9MCZrPTIw/JmM9UTQwQmVDaC1i/bl9ZUzhKWXl0Q1l6/amlqNHIzVWN0VlV6/QThKd3dqeE4yZz0" 
             alt="Profesionales diversos trabajando felices en una oficina moderna con luz natural" 
             class="hero-image" />
        
        <!-- Contenido hero -->
        <div class="container mx-auto px-4 text-center hero-content">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">Encuentra el trabajo de tus sueños</h1>
            <p class="text-xl mb-8">Conectamos a los mejores talentos con las mejores empresas</p>
            <a href="registro.php" class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-3 rounded-lg text-lg font-semibold transition duration-300 transform hover:scale-105">¡Empieza ahora!</a>
        </div>
    </section>
</body>
</html>



    <!-- Estadísticas -->
    <section class="bg-white py-12">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-center">
                <div>
                    <div class="text-blue-600 text-4xl mb-2">
                        <i class="fas fa-building"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-1">+500 Empresas</h3>
                    <p class="text-gray-600">Confían en nosotros</p>
                </div>
                <div>
                    <div class="text-blue-600 text-4xl mb-2">
                        <i class="fas fa-briefcase"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-1">+1,200 Vacantes</h3>
                    <p class="text-gray-600">Disponibles ahora</p>
                </div>
                <div>
                    <div class="text-blue-600 text-4xl mb-2">
                        <i class="fas fa-users"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-1">+8,000 Profesionales</h3>
                    <p class="text-gray-600">Han encontrado trabajo</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Últimas vacantes (con conexión PHP) -->
    <section class="bg-gray-100 py-12">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold mb-8 text-center">Últimas Vacantes Publicadas</h2>
            
            <?php
            // Conexión a la base de datos
                  require 'C:/xampp/htdocs/job_portal/includes/conexion.php';
   
   

            // Consulta para obtener las últimas 6 vacantes
            $query = "SELECT * FROM vacantes ORDER BY fecha_publicacion DESC LIMIT 6";
            $vacantes = $conn->query($query);
            
            if ($vacantes->rowCount() > 0) {
                echo '<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">';
                foreach ($vacantes as $vacante) {
                    echo '
                    <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow">
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-blue-800 mb-2">'.$vacante['titulo'].'</h3>
                            <p class="text-gray-700 mb-4">'.$vacante['empresa'].'</p>
                            <p class="text-gray-600 mb-4">'.substr($vacante['descripcion'], 0, 100).'...</p>
                            <div class="flex justify-between items-center">
                                <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-sm">'.$vacante['ubicacion'].'</span>
                                <span class="text-green-600 font-semibold">'.$vacante['salario'].'</span>
                            </div>
                        </div>
                        <div class="bg-gray-50 px-6 py-4">
                            <a href="login.php" class="text-blue-600 hover:text-blue-800 font-medium">Ver detalles <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>';
                }
                echo '</div>';
                echo '<div class="text-center mt-8">';
                echo '<a href="buscar_vacantes.php" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg font-semibold">Ver todas las vacantes</a>';
                echo '</div>';
            } else {
                echo '<p class="text-center text-gray-600">No hay vacantes disponibles actualmente.</p>';
            }
            ?>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-8">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div>
                    <h3 class="text-xl font-bold mb-4">JobConnect</h3>
                    <p>La mejor plataforma para conectar talento con oportunidades.</p>
                </div>
                <div>
                    <h3 class="text-xl font-bold mb-4">Enlaces Rápidos</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="hover:text-blue-400">Inicio</a></li>
                        <li><a href="buscar_vacantes.php" class="hover:text-blue-400">Vacantes</a></li>
                        <li><a href="registro.php" class="hover:text-blue-400">Registro</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-xl font-bold mb-4">Contacto</h3>
                    <p><i class="fas fa-envelope mr-2"></i> contacto@jobconnect.com</p>
                    <p><i class="fas fa-phone mr-2"></i> +52 55 1234 5678</p>
                </div>
            </div>
            <div class="border-t border-gray-700 mt-8 pt-6 text-center">
                <p>&copy; <?php echo date('Y'); ?> JobConnect. Todos los derechos reservados.</p>
            </div>
        </div>
    </footer>
</body>
</html>
