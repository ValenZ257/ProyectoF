<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Laboratorios</title>
    <link rel="stylesheet" href="css/estilo.css">
    <link rel="icon" type="image/png" href="img/logU.png">
</head>
<body>
    <header>
        <img src="img/logo.png" alt="Logo Universidad" id="logo">
        <nav>
            <button onclick="location.href='login.php'">Administrador</button>
        </nav>
    </header>
    <main>
        <div class="facultades">
            <a href="facultad.php?id=1" class="facultad azul">
                Facultad de Arquitectura y Diseño
            </a>
            <a href="facultad.php?id=2" class="facultad amarillo">
                Facultad de Ciencias Humanas, Sociales y de la Educación
            </a>
            <a href="facultad.php?id=3" class="facultad rojo">
                Facultad de Ciencias Básicas e Ingeniería
            </a>
            <a href="facultad.php?id=4" class="facultad verde">
                Facultad de Ciencias Económicas y Administrativas
            </a>
        </div>
    </main>
</body>
</html>
