<?php
include 'conexion.php';

$response = array();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];

    // Validar credenciales en la base de datos
    $sql = "SELECT * FROM administradores WHERE usuario = '$usuario' AND contrasena = '$contrasena'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        session_start();
        $_SESSION['usuario'] = $usuario;
        $response['status'] = 'success';
    } else {
        $response['status'] = 'error';
        $response['message'] = 'Usuario o contraseña incorrectos.';
    }

    $conn->close();
}

echo json_encode($response);
?>
