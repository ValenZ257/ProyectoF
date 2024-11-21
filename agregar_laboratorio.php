<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}

include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombreLaboratorio = $_POST['nombreLaboratorio'];
    $descripcion = $_POST['descripcion'];
    $idFacultad = $_POST['idFacultad'];
    $encargado = $_POST['encargado'];
    $linkReserva = $_POST['linkReserva'];

    $target_dir = "img/";
    $target_file = $target_dir . basename($_FILES["imagen"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Verificar si el archivo es una imagen
    $check = getimagesize($_FILES["imagen"]["tmp_name"]);
    if ($check !== false) {
        // Mover el archivo subido a la carpeta de imágenes
        if (move_uploaded_file($_FILES["imagen"]["tmp_name"], $target_file)) {
            $nombreImagen = $target_file;

            // Insertar los datos en la base de datos
            $sql = "INSERT INTO laboratorios (nombreLaboratorio, descripcion, idFacultad, encargado, imagen, linkReserva) 
                    VALUES ('$nombreLaboratorio', '$descripcion', '$idFacultad', '$encargado', '$nombreImagen', '$linkReserva')";

            if ($conn->query($sql) === TRUE) {
                header("Location: admin_facultad.php?id=$idFacultad");
                exit();
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "Error al subir la imagen.";
        }
    } else {
        echo "El archivo no es una imagen.";
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Laboratorio</title>
    <link rel="stylesheet" href="css/estilo_formulario.css"> 
    <link rel="icon" type="image/png" href="img/logU.png">
</head>
<body>
    <div class="container">
        <div class="form-box">
            <header>
                <img src="img/logo.png" alt="Logo Universidad" id="logo">
                <button class="back-button" onclick="location.href='admin_facultad.php?id=<?php echo $_GET['id']; ?>'">Volver</button>
            </header>
            <h2>Agregar Laboratorio</h2>
            <form action="agregar_laboratorio.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="idFacultad" value="<?php echo $_GET['id']; ?>">
                <label for="nombreLaboratorio">Nombre del Laboratorio:</label>
                <input type="text" id="nombreLaboratorio" name="nombreLaboratorio" required>
                <label for="descripcion">Descripción:</label>
                <textarea id="descripcion" name="descripcion" required></textarea>
                <label for="imagen">Imagen (JPG):</label>
                <input type="file" id="imagen" name="imagen" accept=".jpg" required>
                <label for="linkReserva">Enlace de Solicitud de Reserva:</label>
                <input type="url" id="linkReserva" name="linkReserva" required>
                <label for="encargado">Encargado:</label>
                <input type="text" id="encargado" name="encargado" required>
                <button type="submit">Agregar</button>
            </form>
        </div>
    </div>
</body>
</html>
