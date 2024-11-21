<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}

include 'conexion.php';

$idLaboratorio = $_GET['id'];
$idFacultad = $_GET['facultad'];

// Eliminar el laboratorio de la base de datos
$sql = "DELETE FROM laboratorios WHERE idLaboratorio = $idLaboratorio";

if ($conn->query($sql) === TRUE) {
    // Redirigir de vuelta a la página de administración de la facultad
    header("Location: admin_facultad.php?id=$idFacultad");
    exit();
} else {
    echo "Error al eliminar el laboratorio: " . $conn->error;
}

$conn->close();
?>
