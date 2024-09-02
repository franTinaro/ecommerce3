<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    // Si el usuario no está autenticado, redirigir a una página de confirmación
    header("Location: ../inniciosesion/redirect.php");
    exit();
} else {
    // Si el usuario está autenticado, redirigir al carrito
    header("Location: index.php");
    exit();
}
?>
