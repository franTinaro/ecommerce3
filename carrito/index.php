<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: ../inniciosesion/formulario_registro.php");
    exit();
}

// Conectar a la base de datos
$servername = "localhost";
$username = "root";
$password = ""; // Sin contraseña
$dbname = "abridores_pagina";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Función para obtener todos los productos desde la base de datos
function getProducts($conn) {
    $sql = "SELECT id, Nombre, Costo, Imagen FROM productos";
    $result = $conn->query($sql);

    $products = [];
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $products[$row['id']] = [
                'name' => $row['Nombre'],
                'price' => $row['Costo'],
                'image' => $row['Imagen']
            ];
        }
    }
    return $products;
}

// Obtener los productos desde la base de datos
$products = getProducts($conn);

// Handle add to cart action
if (isset($_POST['action']) && $_POST['action'] === 'add_to_cart') {
    $productId = $_POST['product_id'];
    $quantity = (int)$_POST['quantity'];
    
    if ($quantity > 0 && isset($products[$productId])) {
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }
        if (isset($_SESSION['cart'][$productId])) {
            $_SESSION['cart'][$productId] += $quantity;
        } else {
            $_SESSION['cart'][$productId] = $quantity;
        }
    }
    header("Location: index.php");
    exit();
}

// Handle remove from cart action
if (isset($_POST['action']) && $_POST['action'] === 'remove_from_cart') {
    $productId = $_POST['product_id'];
    if (isset($_SESSION['cart'][$productId])) {
        unset($_SESSION['cart'][$productId]);
    }
    header("Location: index.php");
    exit();
}

// Handle clear cart action
if (isset($_POST['action']) && $_POST['action'] === 'clear_cart') {
    unset($_SESSION['cart']);
    header("Location: index.php");
    exit();
}

// Calculate total price
function calculateTotal($products) {
    $total = 0;
    if (isset($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $productId => $quantity) {
            if (isset($products[$productId])) {
                $total += $products[$productId]['price'] * $quantity;
            }
        }
    }
    return $total;
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Carrito de Compras</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .product { margin-bottom: 20px; border: 1px solid #ccc; padding: 10px; display: flex; align-items: center; }
        .product img { width: 150px; height: auto; margin-right: 20px; }
        .cart { margin-top: 20px; }
        .cart img { width: 100px; height: auto; margin-right: 10px; }
    </style>
</head>
<body>
    <h1>Carrito de Compras</h1>
    <?php if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])): ?>
        <ul class="cart">
            <?php foreach ($_SESSION['cart'] as $productId => $quantity): ?>
                <li>
                    <img src="<?php echo htmlspecialchars($products[$productId]['image']); ?>" alt="<?php echo htmlspecialchars($products[$productId]['name']); ?>">
                    <?php echo htmlspecialchars($products[$productId]['name']); ?> - Cantidad: <?php echo htmlspecialchars($quantity); ?>
                    <form method="post" style="display:inline;">
                        <input type="hidden" name="product_id" value="<?php echo $productId; ?>">
                        <input type="hidden" name="action" value="remove_from_cart">
                        <button type="submit">Eliminar</button>
                    </form>
                </li>
            <?php endforeach; ?>
        </ul>
        <p>Total: $<?php echo htmlspecialchars(calculateTotal($products)); ?></p>
        <form method="post">
            <input type="hidden" name="action" value="clear_cart">
            <button type="submit">Vaciar Carrito</button>
        </form>
    <?php else: ?>
        <p>El carrito está vacío.</p>
        <a href="../home.html">Volver al inicio</a>
    <?php endif; ?>
</body>
</html>
