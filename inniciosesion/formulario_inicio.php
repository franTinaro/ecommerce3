<?php
session_start();

// Configuración de la conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "abridores_pagina";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['passw'];

    // Consulta a la base de datos para verificar las credenciales del usuario
    $sql = "SELECT id_persona, passw FROM persona WHERE Email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['passw'])) {
            // Iniciar sesión y redirigir al usuario
            $_SESSION['user_id'] = $row['id_persona'];
            header("Location: carrito.php");
            exit();
        } else {
            $error = 'Contraseña incorrecta.';
        }
    } else {
        $error = 'Correo electrónico no encontrado.';
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicie Sesión</title>
    <link rel="stylesheet" href="../css/global.css">
    <link rel="stylesheet" href="../css/formularioi.css">
</head>
<body>
    <div class="container">
        <h2>Inicio de Sesión</h2>
        <form method="post" action="">
            <label for="email">Correo Electrónico:</label>
            <input type="email" id="email" name="email" required>
            
            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="passw" required>
            
            <input type="submit" value="Iniciar Sesión">
        </form>
        <?php
        if (!empty($error)) {
            echo '<p>' . $error . '</p>';
        }
        ?>
    </div>
</body>
</html>
