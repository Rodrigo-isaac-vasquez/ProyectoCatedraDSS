<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro cuenta</title>
    <link rel="stylesheet" href="css/style1.css">
</head>
<body>
<div class="contenedor-formulario">
<form action="Logica/cuentaCliente.php" method="post">

    <label for="nombreusuario">Nombre de usuario:</label>
   <input type="text" id="usuario" name="usuario" maxlength="25"  required>

    <label for="contrasena">Contraseña:</label>
   <input type="text" id="contrasenia" name="contrasenia" maxlength="25" required>
    <button type="submit">Crear cuenta</button>
</form>
</div>
<br>

<a href="cajero.php"><button type="button">Regresar</button></a>
</body>
</html>