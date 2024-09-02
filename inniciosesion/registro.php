<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "abridores_pagina";
$conn = mysqli_connect ($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$email = $_POST['email'];
$password = password_hash($_POST['passw'], PASSWORD_BCRYPT);
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$direccion = $_POST['direccion'];
$ciudad = $_POST['ciudad'];
$sexo = $_POST['sexo'];
$provincia = $_POST['provincia'];
$pais = $_POST['pais'];
$codigoPostal = $_POST['codigoPostal'];
$otrosDatos = $_POST['otrosDatos'];


$sql = "INSERT INTO persona (email, passw, nombre, apellido, direccion, ciudad, sexo, provincia, pais, Codigo_Postal, Otros_Datos)
VALUES ('$email', '$password', '$nombre', '$apellido', '$direccion', '$ciudad', '$sexo', '$provincia', '$pais', '$codigoPostal', '$otrosDatos')";

if ($conn->query($sql) === TRUE) {
    echo "Registro exitoso";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
header("Location: ../home/home.html");
?>
