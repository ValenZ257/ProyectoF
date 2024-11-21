<?php
include 'conexion.php';

$idFacultad = $_GET['id'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laboratorios</title>
    <link rel="stylesheet" href="css/estilo.css">
    <link rel="stylesheet" href="css/estilo_facultad1.css">
    <link rel="icon" type="image/png" href="img/logU.png">
</head>
<body>
    <header>
        <img src="img/foto.png" alt="Logo Universidad" id="logo">
        <nav>
            <button onclick="history.back()">Volver</button>
        </nav>
    </header>
    <main>
        <?php if ($idFacultad == 1) { // Facultad 1 ?>
            <div class="laboratorios">
                <?php
                $sql = "SELECT * FROM laboratorios WHERE idFacultad = 1";
                $result = $conn->query($sql);

                while ($row = $result->fetch_assoc()) {
                    $rutaImagen = 'img/' . basename($row['imagen']);
                ?>
                    <div class="laboratorio">
                        <img src="<?php echo htmlspecialchars($rutaImagen); ?>" alt="Laboratorio">
                        <div class="laboratorio-content">
                            <h3><?php echo htmlspecialchars($row['nombreLaboratorio']); ?></h3>
                            <p><?php echo htmlspecialchars($row['descripcion']); ?></p>
                            <button onclick="location.href='<?php echo htmlspecialchars($row['linkReserva']); ?>'">Solicitar Reserva</button>
                        </div>
                    </div>
                <?php } ?>
            </div>
        <?php } elseif ($idFacultad == 2) { // Facultad 2 ?>
            <div class="laboratorios">
                <?php
                $sql = "SELECT * FROM laboratorios WHERE idFacultad = 2";
                $result = $conn->query($sql);

                while ($row = $result->fetch_assoc()) {
                    $rutaImagen = 'img/' . basename($row['imagen']);
                ?>
                    <div class="laboratorio">
                        <img src="<?php echo htmlspecialchars($rutaImagen); ?>" alt="Laboratorio">
                        <div class="laboratorio-content">
                            <h3><?php echo htmlspecialchars($row['nombreLaboratorio']); ?></h3>
                            <p><?php echo htmlspecialchars($row['descripcion']); ?></p>
                            <button onclick="location.href='<?php echo htmlspecialchars($row['linkReserva']); ?>'">Solicitar Reserva</button>
                        </div>
                    </div>
                <?php } ?>
            </div>
        <?php } elseif ($idFacultad == 3) { // Facultad 3 ?>
            <div class="laboratorios">
                <?php
                $sql = "SELECT * FROM laboratorios WHERE idFacultad = 3";
                $result = $conn->query($sql);

                while ($row = $result->fetch_assoc()) {
                    $rutaImagen = 'img/' . basename($row['imagen']);
                ?>
                    <div class="laboratorio">
                        <img src="<?php echo htmlspecialchars($rutaImagen); ?>" alt="Laboratorio">
                        <div class="laboratorio-content">
                            <h3><?php echo htmlspecialchars($row['nombreLaboratorio']); ?></h3>
                            <p><?php echo htmlspecialchars($row['descripcion']); ?></p>
                            <button onclick="location.href='<?php echo htmlspecialchars($row['linkReserva']); ?>'">Solicitar Reserva</button>
                        </div>
                    </div>
                <?php } ?>
            </div>
        <?php } elseif ($idFacultad == 4) { // Facultad 4 ?>
            <div class="laboratorios">
                <?php
                $sql = "SELECT * FROM laboratorios WHERE idFacultad = 4";
                $result = $conn->query($sql);

                while ($row = $result->fetch_assoc()) {
                    $rutaImagen = 'img/' . basename($row['imagen']);
                ?>
                    <div class="laboratorio">
                        <img src="<?php echo htmlspecialchars($rutaImagen); ?>" alt="Laboratorio">
                        <div class="laboratorio-content">
                            <h3><?php echo htmlspecialchars($row['nombreLaboratorio']); ?></h3>
                            <p><?php echo htmlspecialchars($row['descripcion']); ?></p>
                            <button onclick="location.href='<?php echo htmlspecialchars($row['linkReserva']); ?>'">Solicitar Reserva</button>
                        </div>
                    </div>
                <?php } ?>
            </div>
        <?php } else { // Otras Facultades ?>
            <div class="laboratorios-vacio">
                <h3>No hay información disponible para esta facultad.</h3>
            </div>
        <?php } ?>
    </main>
</body>
</html>
