<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Laboratorios - Administrador</title>
    <link rel="stylesheet" href="css/estilo.css">
    <link rel="icon" type="image/png" href="img/logU.png"> 
    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
</head>
<body>
    <header>
        <img src="img/logo.png" alt="Logo Universidad" id="logo">
        <nav>
            <!-- Botón de cerrar sesión -->
            <button onclick="confirmarLogout()">Cerrar Sesión</button>
        </nav>
    </header>
    <main>
        <div class="facultades">
            <a href="admin_facultad.php?id=1" class="facultad azul">
                Facultad de Arquitectura y Diseño
            </a>
            <a href="admin_facultad.php?id=2" class="facultad amarillo">
                Facultad de Ciencias Humanas, Sociales y de la Educación
            </a>
            <a href="admin_facultad.php?id=3" class="facultad rojo">
                Facultad de Ciencias Básicas e Ingeniería
            </a>
            <a href="admin_facultad.php?id=4" class="facultad verde">
                Facultad de Ciencias Económicas y Administrativas
            </a>
        </div>
    </main>

    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function confirmarLogout() {
            Swal.fire({
                title: '¿Está seguro de que desea cerrar sesión?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, cerrar sesión',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = 'logout.php';
                }
            });
        }
    </script>
</body>
</html>