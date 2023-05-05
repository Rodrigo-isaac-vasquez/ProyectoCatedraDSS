
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    include_once('../Conexion/conexion.php');

    $dui = $_POST['dui'];
    $numCuentaOrigen = $_POST['numCuentaOrigen'];


    $stmt =$db->prepare("SELECT Saldo_disponible FROM Cuentas WHERE Num_cuenta = ? AND Cod_Cliente = ?");
    $stmt->bind_param("is", $numCuentaOrigen,$dui);
    $stmt->execute();
    $saldoDisponibleResult = $stmt->get_result();
    $saldoDisponibleArray = $saldoDisponibleResult->fetch_assoc();
    if ($saldoDisponibleArray !== null) {

        $Saldo_disponible = $saldoDisponibleArray['Saldo_disponible'];

        echo "<h3 style='text-align: center;'>Número de la cuenta:</h3>";
        echo  "<h1 style='text-align: center;'>".$numCuentaOrigen."</h1>";

        echo "<br>";
        echo "<h3 style='text-align: center;'>El saldo actual:</h3>";
        echo  "<h1 style='text-align: center;'>"."$ ".$Saldo_disponible."</h1>";
        echo "<br>";

        $stmt =$db->prepare("SELECT Cod_movimentos_Banca,Cod_TipoMovimiento,NumCuenta_Origen,Saldo_disponible,Valor_transaccion,Fecha_registro FROM movimientos_bancarios WHERE NumCuenta_Origen = ? ");
        $stmt->bind_param("i", $numCuentaOrigen);
        $stmt->execute();
        $resultado = $stmt->get_result();
        
        echo "<h3 style='text-align: center;'>Historial de movimientos</h3>";
        echo "<table style='margin: 0 auto; border: 1px solid black; border-collapse: collapse;'>";
        echo "<thead style='background-color: #c06c84;'><tr><th style='padding: 10px;'>Código Movimiento</th><th style='padding: 10px;'> Tipo Movimiento</th><th style='padding: 10px;'>Número de cuenta </th><th style='padding: 10px;'>Saldo de la cuenta</th><th style='padding: 10px;'>Valor de transacción</th><th style='padding: 10px;'>Fecha de registro</th></tr></thead>";
        echo "<tbody>";
        while ($fila = $resultado->fetch_assoc()) {

            $cod_mov = $fila['Cod_TipoMovimiento'];

            $stmt =$db->prepare("SELECT Nombre FROM tipo_movimiento WHERE Cod_movimiento= ?");
            $stmt->bind_param("i",  $cod_mov);
            $stmt->execute();
            $saldoDisponibleResult = $stmt->get_result();
            $saldoDisponibleArray = $saldoDisponibleResult->fetch_assoc();
            $nombre_mov = $saldoDisponibleArray['Nombre'];

            echo "<tr><td style='text-align: center;'>" . $fila['Cod_movimentos_Banca'] . "</td><td style='text-align: center;'>" . $nombre_mov. "</td><td style='text-align: center;'>" . $fila['NumCuenta_Origen'] . "</td><td style='text-align: center;'>" . $fila['Saldo_disponible'] . "</td><td style='text-align: center;'>" . $fila['Valor_transaccion'] . "</td><td style='text-align: center;'>" . $fila['Fecha_registro'] . "</td></tr>";
        }
        echo "</tbody>";
        echo "</table>";

    }else{
        echo "No se encontro una cuenta relacionada al DUI";
    }
  //Cerrar la conexión a la base de datos
  $stmt->close();
  $db->close();
    
}
?>  