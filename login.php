<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Administrador</title>
    <link rel="stylesheet" href="css/estilo_login.css"> 
    <link rel="icon" type="image/png" href="img/logU.png"><!-- Nuevo archivo CSS -->
</head>
<body>
    <div class="container">
        <div class="login-box">
            <header>
                <img src="img/logo.png" alt="Logo Universidad" id="logo">
                <button class="back-button" onclick="location.href='index.php'">Volver</button>
            </header>
            <h2>Inicio Sesión Administrador</h2>
            <form id="loginForm">
                <label for="usuario">Correo:</label>
                <input type="email" id="usuario" name="usuario" required>
                <label for="contrasena">Contraseña:</label>
                <input type="password" id="contrasena" name="contrasena" required>
                <button type="submit">Ingresar</button>
                <p id="error-message" style="color: red; display: none;"></p>
            </form>
        </div>
    </div>

    <script>
        document.getElementById('loginForm').addEventListener('submit', function(event) {
            event.preventDefault();
            var form = new FormData(this);

            fetch('validar_login.php', {
                method: 'POST',
                body: form
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
                    window.location.href = 'admin_index.php';
                } else {
                    var errorMessage = document.getElementById('error-message');
                    errorMessage.textContent = data.message;
                    errorMessage.style.display = 'block';
                }
            })
            .catch(error => console.error('Error:', error));
        });
    </script>
</body>
</html>
