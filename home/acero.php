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

// Consulta para obtener los productos de acero quirúrgico
$sql = "SELECT id_producto, Nombre, Costo as precio FROM producto WHERE id_producto IN (1, 2, 3)";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $productos = $result->fetch_all(MYSQLI_ASSOC);
} else {
    $productos = [];
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/global.css">
    <link rel="stylesheet" href="../css/catalogo.css">
    <title>Abridores de Acero Quirúrgico</title>
    <script>
        function showConfirmation() {
            alert('Producto añadido al carrito.');
            return false; // Previene la redirección automática del formulario
        }
    </script>
</head>
<body>
    <h1>Abridores de Acero Quirúrgico</h1>

    <?php if (!empty($productos)): ?>
        <?php foreach ($productos as $producto): ?>
        <div class="product">
            <h2>Abridor de Acero Quirúrgico <?php echo htmlspecialchars($producto['id_producto']); ?></h2>
            <img src="../fotos/acero<?php echo htmlspecialchars($producto['id_producto']); ?>.jpeg" alt="Abridor de Acero Quirúrgico <?php echo htmlspecialchars($producto['id_producto']); ?>" style="width: 300px; height: auto;">
            <p>Precio: $<?php echo htmlspecialchars($producto['precio']); ?></p>
            <form method="post" action="../carrito/index.php" onsubmit="return showConfirmation();">
                <input type="number" name="quantity" min="1" value="1" style="margin-right: 10px;">
                <input type="hidden" name="product_id" value="<?php echo htmlspecialchars($producto['id_producto']); ?>"> <!-- ID del producto -->
                <input type="hidden" name="action" value="add_to_cart">
                <button type="submit">Añadir al carrito</button>
            </form>
        </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>No hay productos disponibles.</p>
    <?php endif; ?>

    <br>
    <a href="../carrito/index.php">Ver carrito</a>
    <br>
    <a href="home.html">Volver al inicio</a>
</body>
</html>
