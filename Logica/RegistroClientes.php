<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    include_once('../Conexion/conexion.php');

    $dui = $_POST['dui'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $nombreUsuario = $_POST['nombreusuario'];
    $contrasena = $_POST['contrasena'];
    $correo = $_POST['correo'];

    $stmt =$db->prepare("SELECT DUI FROM clientes WHERE DUI = ?");
    $stmt->bind_param("s", $dui);
    $stmt->execute();
    $duiResult = $stmt->get_result();
    $duiDisponibleArray = $duiResult->fetch_assoc();
    if (isset($duiDisponibleArray['DUI'])) {
      $dui1 = $duiDisponibleArray['DUI'];
  } else {
      $dui1 = null;
  }

    if($dui==$dui1){
      echo "Este DUI ya ha sido registrado con anterioridad";
    }
    else{
      $Nums= "";

    for ($i = 0; $i < 8; $i++) {
      $Nums .= rand(0, 9);
    }

    $saldo = 0.00;

    $stmt2 = $db->prepare("INSERT INTO  cuentas (Num_cuenta, Cod_Cliente, Saldo_disponible) VALUES (?, ?, ?)");
    $stmt2->bind_param("isd",$Nums , $dui, $saldo);  
    

    $stmt = $db->prepare("INSERT INTO  clientes (DUI, nombre, apellido, usuario, contraseña, Correo_Electronico) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $dui, $nombre, $apellido, $nombreUsuario, $contrasena, $correo);  
    
    //Ejecutar la consulta
    if ($stmt->execute()AND $stmt2->execute()) {
    echo "Los datos se han insertado correctamente en la base de datos.";
  } else {
    echo "Ha ocurrido un error al insertar los datos en la base de datos: " . $db->error;
  }
    }

  
  //Cerrar la conexión a la base de datos
  $stmt->close();
  $db->close();
    
}
?>  