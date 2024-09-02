<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/catalogo.css">
    <link rel="stylesheet" href="../css/global.css">
    <title>Abridores de Plata 925</title>
    <script>
        function showConfirmation() {
            alert('Producto añadido al carrito.');
            return false; // Previene la redirección automática del formulario
        }
    </script>
</head>
<body>
    <h1>Abridores de Plata 925</h1>

    <!-- Producto 1 -->
    <div>
        <h2>Abridor de Plata 925 1</h2>
        <img src="../fotos/plata1.jpeg" alt="Abridor de Plata 925 1" style="width: 300px; height: auto;">
        <p>Precio: $50</p>
        <form method="post" action="../carrito/index.php" onsubmit="return showConfirmation();">
            <input type="number" name="quantity" min="1" value="1" style="margin-right: 10px;">
            <input type="hidden" name="product_id" value="6"> <!-- ID del producto -->
            <input type="hidden" name="action" value="add_to_cart">
            <button type="submit">Añadir al carrito</button>
        </form>
    </div>

    <!-- Producto 2 -->
    <div>
        <h2>Abridor de Plata 925 2</h2>
        <img src="../fotos/plata2.jpeg" alt="Abridor de Plata 925 2" style="width: 300px; height: auto;">
        <p>Precio: $55</p>
        <form method="post" action="../carrito/index.php" onsubmit="return showConfirmation();">
            <input type="number" name="quantity" min="1" value="1" style="margin-right: 10px;">
            <input type="hidden" name="product_id" value="7"> <!-- ID del producto -->
            <input type="hidden" name="action" value="add_to_cart">
            <button type="submit">Añadir al carrito</button>
        </form>
    </div>

    <!-- Producto 3 -->
    <div>
        <h2>Abridor de Plata 925 3</h2>
        <img src="../fotos/plata3.jpeg" alt="Abridor de Plata 925 3" style="width: 300px; height: auto;">
        <p>Precio: $60</p>
        <form method="post" action="../carrito/index.php" onsubmit="return showConfirmation();">
            <input type="number" name="quantity" min="1" value="1" style="margin-right: 10px;">
            <input type="hidden" name="product_id" value="8"> <!-- ID del producto -->
            <input type="hidden" name="action" value="add_to_cart">
            <button type="submit">Añadir al carrito</button>
        </form>
    </div>

    <br>
    <a href="../carrito/index.php">Ver carrito</a>
    <br>
    <a href="home.html">Volver al inicio</a>
</body>
</html>
