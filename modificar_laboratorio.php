<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}

include 'conexion.php';

$idLaboratorio = $_GET['id'];
$sql = "SELECT * FROM laboratorios WHERE idLaboratorio = $idLaboratorio";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
} else {
    echo "Laboratorio no encontrado.";
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombreLaboratorio = $_POST['nombreLaboratorio'];
    $descripcion = $_POST['descripcion'];
    $idFacultad = $_POST['idFacultad'];
    $encargado = $_POST['encargado'];
    $linkReserva = $_POST['linkReserva'];

    if ($_FILES["imagen"]["name"]) {
        $target_dir = "img/";
        $target_file = $target_dir . basename($_FILES["imagen"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        $check = getimagesize($_FILES["imagen"]["tmp_name"]);
        if ($check !== false) {
            if (move_uploaded_file($_FILES["imagen"]["tmp_name"], $target_file)) {
                $nombreImagen = $target_file;
            } else {
                echo "Error al subir la imagen.";
                exit();
            }
        } else {
            echo "El archivo no es una imagen.";
            exit();
        }
    } else {
        $nombreImagen = $row['imagen'];
    }

    $sql = "UPDATE laboratorios SET nombreLaboratorio = '$nombreLaboratorio', descripcion = '$descripcion', idFacultad = '$idFacultad', encargado = '$encargado', imagen = '$nombreImagen', linkReserva = '$linkReserva' WHERE idLaboratorio = $idLaboratorio";

    if ($conn->query($sql) === TRUE) {
        header("Location: admin_facultad.php?id=$idFacultad");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Laboratorio</title>
    <link rel="stylesheet" href="css/estilo_formulario.css"> 
    <link rel="icon" type="image/png" href="img/logU.png">
</head>
<body>
    <div class="container">
        <div class="form-box">
            <header>
                <img src="img/logo.png" alt="Logo Universidad" id="logo">
                <button class="back-button" onclick="location.href='admin_facultad.php?id=<?php echo $row['idFacultad']; ?>'">Volver</button>
            </header>
            <h2>Modificar Laboratorio</h2>
            <form action="modificar_laboratorio.php?id=<?php echo $idLaboratorio; ?>" method="post" enctype="multipart/form-data">
                <input type="hidden" name="idFacultad" value="<?php echo $row['idFacultad']; ?>">
                <label for="nombreLaboratorio">Nombre del Laboratorio:</label>
                <input type="text" id="nombreLaboratorio" name="nombreLaboratorio" value="<?php echo $row['nombreLaboratorio']; ?>" required>
                <label for="descripcion">Descripción:</label>
                <textarea id="descripcion" name="descripcion" required><?php echo $row['descripcion']; ?></textarea>
                <label for="imagen">Imagen (JPG):</label>
                <input type="file" id="imagen" name="imagen" accept=".jpg">
                <label for="linkReserva">Enlace de Solicitud de Reserva:</label>
                <input type="url" id="linkReserva" name="linkReserva" value="<?php echo $row['linkReserva']; ?>" required>
                <label for="encargado">Encargado:</label>
                <input type="text" id="encargado" name="encargado" value="<?php echo $row['encargado']; ?>" required>
                <button type="submit">Actualizar</button>
            </form>
        </div>
    </div>
</body>
</html>
