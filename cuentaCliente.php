<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    include_once('../Conexion/conexion.php');

 
    $nombreUsu = $_POST['usuario'];
    $contra = $_POST['contrasenia'];


    $consulta = "SELECT COUNT(*) FROM cuentacliente WHERE usuario = '$nombreUsu'";

   // Verificar si el usuario tiene menos de 3 cuentas bancarias
   if ($numCuentas < 3) {
    // Generar identificador numérico de cuenta bancaria aleatorio
    $idCuenta = rand();

    // Insertar nueva cuenta bancaria en la base de datos
    $consulta = "INSERT INTO cuentacliente (id_cuenta, usuario) VALUES ('$idCuenta', '$nombreUsu')";
    mysqli_query($conexion, $consulta);

    // Mostrar mensaje de éxito
    echo "La cuenta bancaria ha sido creada exitosamente.";
} else {
    // Mostrar mensaje de error
    echo "Lo sentimos, ha excedido el límite de cuentas bancarias permitido.";
}
}
?>  