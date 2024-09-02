<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Registro</title>
    <link rel="stylesheet" href="../css/formulario.css">
    <link rel="stylesheet" href="../css/global.css">

</head>
<body>

<main>


    <div class="form_container">
        <h2 class="title">Registro</h2>
        <form action="registro.php" method="POST">
            <div class="input_container">
                <label for="email">Email:</label>
                <input placeholder="Email" type="email" id="email" name="email" required>
            </div>
            <div class="input_container">
                <label for="password">Contraseña:</label>
                <input placeholder="Contraseña" type="password" id="password" name="passw" required>
            </div>
            <div class="input_container">
                <label for="nombre">Nombre:</label>
                <input placeholder="Nombre" type="text" id="nombre" name="nombre" required>
            </div>
            <div class="input_container">
                <label for="apellido">Apellido:</label>
                <input placeholder="Apellido" type="text" id="apellido" name="apellido" required>
            </div>
            <div class="input_container">
                <label for="direccion">Dirección:</label>
                <input placeholder="Dirección" type="text" id="direccion" name="direccion" required>
            </div>
            <div class="input_container">
                <label for="ciudad">Ciudad:</label>
                <input placeholder="Ciudad" type="text" id="ciudad" name="ciudad" required>
            </div>
            <div class="input_container">
                <label>Sexo:</label>
                <div class="radio-group">
                    <label class="radio-label"><input type="radio" name="sexo" value="masculino" required> Masculino</label>
                    <label class="radio-label"><input type="radio" name="sexo" value="femenino" required> Femenino</label>
                    <label class="radio-label"><input type="radio" name="sexo" value="otro" required> Otro</label>
                </div>
            </div>
            <div class="input_container">
                <label for="provincia">Provincia:</label>
                <input placeholder="Provincia" type="text" id="provincia" name="provincia" required>
            </div>
            <div class="input_container">
                <label for="pais">País:</label>
                <input placeholder="País" type="text" id="pais" name="pais" required>
            </div>
            <div class="input_container">
                <label for="codigoPostal">Código Postal:</label>
                <input placeholder="Código Postal" type="text" id="codigoPostal" name="codigoPostal" required>
            </div>
            <div class="input_container">
                <label for="otrosDatos">Otros Datos:</label>
                <textarea id="otrosDatos" name="otrosDatos" rows="4" cols="50"></textarea>
            </div>
            <button type="submit" class="button">Registrarse</button>
        </form>
    </div>
    </main>
    </body>
</html>
