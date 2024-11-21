<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}

include 'conexion.php';

$idFacultad = $_GET['id'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laboratorios - Administrador</title>
    <link rel="stylesheet" href="css/estilo.css">
    <link rel="stylesheet" href="css/estilo_facultad.css">
    <link rel="icon" type="image/png" href="img/logU.png">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>  
        .agregar-laboratorio {
            position:relative;
            left:-4px;
            margin-bottom: 20px;
            background-color: #0066cc;
            color: white;
            border: none;
            padding: 10px;
            cursor: pointer;
            border-radius: 5px;
            font-size: 14px;
        }

        .agregar-laboratorio:hover {
            background-color: #004c99;
        }

        .btn-eliminar {
            background-color: #f44336;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 5px;
            font-size: 14px;
        }

        .btn-eliminar:hover {
            background-color: #d32f2f;
        }
    </style>
</head>
<body>
    <header>
        <img src="img/logo.png" alt="Logo Universidad" id="logo">
        <nav>
            <button onclick="location.href='admin_index.php'">Volver</button>
        </nav>
    </header>
    <main class="facultad-<?php echo $idFacultad; ?>"> <!-- Clase específica para cada facultad -->
        <?php if ($idFacultad == 1) { // Facultad 1 ?>
            <div class="laboratorios-header">
                <button class="agregar-laboratorio" onclick="location.href='agregar_laboratorio.php?id=<?php echo $idFacultad; ?>'">Agregar Laboratorio</button>
            </div>
            <div class="laboratorios">
                <?php
                $sql = "SELECT * FROM laboratorios WHERE idFacultad = $idFacultad";
                $result = $conn->query($sql);

                while ($row = $result->fetch_assoc()) {
                    $nombreImagen = htmlspecialchars($row['imagen']);
                ?>
                    <div class="laboratorio">
                        <img src="<?php echo $nombreImagen; ?>" alt="Laboratorio">
                        <div class="laboratorio-content">
                            <h3><?php echo htmlspecialchars($row['nombreLaboratorio']); ?></h3>
                            <p><?php echo htmlspecialchars($row['descripcion']); ?></p>
                            <button onclick="location.href='modificar_laboratorio.php?id=<?php echo $row['idLaboratorio']; ?>'">Modificar</button>
                            <button class="btn-eliminar" onclick="confirmarEliminar(<?php echo $row['idLaboratorio']; ?>, <?php echo $idFacultad; ?>)">Eliminar</button>
                            <button onclick="location.href='<?php echo htmlspecialchars($row['linkReserva']); ?>'">Realizar Reserva</button>
                        </div>
                    </div>
                <?php } ?>
            </div>
        <?php } elseif ($idFacultad == 2) { // Facultad 2 ?>
            <div class="laboratorios-header">
                <button class="agregar-laboratorio" onclick="location.href='agregar_laboratorio.php?id=<?php echo $idFacultad; ?>'">Agregar Laboratorio</button>
            </div>
            <div class="laboratorios">
                <?php
                $sql = "SELECT * FROM laboratorios WHERE idFacultad = $idFacultad";
                $result = $conn->query($sql);

                while ($row = $result->fetch_assoc()) {
                    $nombreImagen = htmlspecialchars($row['imagen']);
                ?>
                    <div class="laboratorio">
                        <img src="<?php echo $nombreImagen; ?>" alt="Laboratorio">
                        <div class="laboratorio-content">
                            <h3><?php echo htmlspecialchars($row['nombreLaboratorio']); ?></h3>
                            <p><?php echo htmlspecialchars($row['descripcion']); ?></p>
                            <button onclick="location.href='modificar_laboratorio.php?id=<?php echo $row['idLaboratorio']; ?>'">Modificar</button>
                            <button class="btn-eliminar" onclick="confirmarEliminar(<?php echo $row['idLaboratorio']; ?>, <?php echo $idFacultad; ?>)">Eliminar</button>
                            <button onclick="location.href='<?php echo htmlspecialchars($row['linkReserva']); ?>'">Realizar Reserva</button>
                        </div>
                    </div>
                <?php } ?>
            </div>
        <?php } elseif ($idFacultad == 3) { // Facultad 3 ?>
            <div class="laboratorios-header">
                <button class="agregar-laboratorio" onclick="location.href='agregar_laboratorio.php?id=<?php echo $idFacultad; ?>'">Agregar Laboratorio</button>
            </div>
            <div class="laboratorios">
                <?php
                $sql = "SELECT * FROM laboratorios WHERE idFacultad = $idFacultad";
                $result = $conn->query($sql);

                while ($row = $result->fetch_assoc()) {
                    $nombreImagen = htmlspecialchars($row['imagen']);
                ?>
                    <div class="laboratorio">
                        <img src="<?php echo $nombreImagen; ?>" alt="Laboratorio">
                        <div class="laboratorio-content">
                            <h3><?php echo htmlspecialchars($row['nombreLaboratorio']); ?></h3>
                            <p><?php echo htmlspecialchars($row['descripcion']); ?></p>
                            <button onclick="location.href='modificar_laboratorio.php?id=<?php echo $row['idLaboratorio']; ?>'">Modificar</button>
                            <button class="btn-eliminar" onclick="confirmarEliminar(<?php echo $row['idLaboratorio']; ?>, <?php echo $idFacultad; ?>)">Eliminar</button>
                            <button onclick="location.href='<?php echo htmlspecialchars($row['linkReserva']); ?>'">Realizar Reserva</button>
                        </div>
                    </div>
                <?php } ?>
            </div>
        <?php } elseif ($idFacultad == 4) { // Facultad 4 ?>
            <div class="laboratorios-header">
                <button class="agregar-laboratorio" onclick="location.href='agregar_laboratorio.php?id=<?php echo $idFacultad; ?>'">Agregar Laboratorio</button>
            </div>
            <div class="laboratorios">
                <?php
                $sql = "SELECT * FROM laboratorios WHERE idFacultad = $idFacultad";
                $result = $conn->query($sql);

                while ($row = $result->fetch_assoc()) {
                    $nombreImagen = htmlspecialchars($row['imagen']);
                ?>
                    <div class="laboratorio">
                        <img src="<?php echo $nombreImagen; ?>" alt="Laboratorio">
                        <div class="laboratorio-content">
                            <h3><?php echo htmlspecialchars($row['nombreLaboratorio']); ?></h3>
                            <p><?php echo htmlspecialchars($row['descripcion']); ?></p>
                            <button onclick="location.href='modificar_laboratorio.php?id=<?php echo $row['idLaboratorio']; ?>'">Modificar</button>
                            <button class="btn-eliminar" onclick="confirmarEliminar(<?php echo $row['idLaboratorio']; ?>, <?php echo $idFacultad; ?>)">Eliminar</button>
                            <button onclick="location.href='<?php echo htmlspecialchars($row['linkReserva']); ?>'">Realizar Reserva</button>
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

    <script>
        function confirmarEliminar(idLaboratorio, idFacultad) {
            Swal.fire({
                title: '¿Estás seguro?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: '¡Sí, eliminar!',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Si el usuario confirma, redirige a la página de eliminación
                    window.location.href = 'eliminar_laboratorio.php?id=' + idLaboratorio + '&facultad=' + idFacultad;
                }
            })
        }
    </script>
</body>
</html>
