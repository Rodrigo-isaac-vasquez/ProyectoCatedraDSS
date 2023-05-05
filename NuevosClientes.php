<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro Clientes</title>
    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/style1.css" rel="stylesheet" media="all">
</head>
<body>
<div class="page-wrapper bg-gra-01 p-t-180 p-b-100 font-poppins">
        <div class="wrapper wrapper--w780">
            <div class="card card-3">
                <div class="card-heading"></div>
                <div class="card-body">
                    <h2 class="title">Registro de usuario</h2>
                    <form action="Logica/RegistroClientes.php" method="POST">
                        <div class="input-group">
                            <input class="input--style-3" type="text" placeholder="Digite su DUI" id="DUI" name="dui" pattern="\d{8}-\d{1}" required>
                        </div>

                        <div class="input-group">
                            <input class="input--style-3 js-datepicker" type="text" placeholder="Introduzca su nombre"  id="nombre" name="nombre" pattern="[A-Za-z]+" maxlength="50" required>
                        </div>

                        <div class="input-group">
                            <input class="input--style-3 js-datepicker" type="text" placeholder="Introduzca su apellido"  id="apellido" name="apellido" pattern="[A-Za-z]+" maxlength="50" required>
                        </div>

                        <div class="input-group">
                            <input class="input--style-3" type="text" placeholder="Introduzca un usuario" id="nombreusuario" name="nombreusuario" maxlength="25"  required>
                        </div>

                        <div class="input-group">
                            <input class="input--style-3" type="password" placeholder="Introduzca su contraseña" id="contrasena" name="contrasena" maxlength="25" required>
                        </div>

                        <div class="input-group">
                            <input class="input--style-3" type="email" placeholder="Introduzca su correo" id="correo" name="correo"  pattern="[a-zA-Z0-9._%+-]+@gmail\.com$" required>
                        </div>

                        <div class="p-t-10">
                            <button class="btn btn--pill btn--green" type="submit" value="Registrar">Registrarse</button>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js/global.js"></script>

<a href="cajero.php"><button type="button">Regresar</button></a>
</body>
</html>