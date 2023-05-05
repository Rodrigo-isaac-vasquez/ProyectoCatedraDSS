<?php
    // Verificar si se ha enviado el formulario
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Incluir archivo de conexión a la base de datos
        include_once('../Conexion/conexion.php');

        // Obtener valores del formulario
        $DUI = $_POST['dui'];
        $codTipoMovimiento = $_POST['codTipoMovimiento'];
        $numCuentaDestino = $_POST['numCuentaDestino'];
        $numCuentaOrigen = $_POST['numCuentaOrigen'];
        $valorTransaccion = $_POST['valorTransaccion'];

        

         $stmt =$db->prepare("SELECT  Num_cuenta  FROM cuentas WHERE Cod_Cliente = ? AND Num_cuenta = ?");
         $stmt->bind_param("si",$DUI ,$numCuentaOrigen);
         $stmt->execute();
         $cuentaexite = $stmt->get_result();
         $cuentaArray = $cuentaexite->fetch_assoc();
        
         if ($cuentaArray !== null) {

            $CuentaExistente = $cuentaArray['Num_cuenta'];

        

         // Obtener saldo disponible de la cuenta origen
         $stmt =$db->prepare("SELECT Saldo_disponible FROM Cuentas WHERE Num_cuenta = ?");
         $stmt->bind_param("i", $numCuentaOrigen);
         $stmt->execute();
         $saldoDisponibleResult = $stmt->get_result();
         $saldoDisponibleArray = $saldoDisponibleResult->fetch_assoc();
         $Saldo_disponible = $saldoDisponibleArray['Saldo_disponible'];
    

    
        $fecha_registro  = date('Y-m-d');

        echo $DUI."<br>";
        echo  $codTipoMovimiento."<br>" ;
        echo  $numCuentaOrigen."<br>";
        echo  $numCuentaDestino."<br>";
        echo $Saldo_disponible."<br>";
        echo $valorTransaccion."<br>" ;
        echo $fecha_registro."<br>" ;

        
        
     if($numCuentaDestino == null){
        

            if( $codTipoMovimiento==1){
                $saldoNuevo1 = $Saldo_disponible + $valorTransaccion;

                $stmt = $db->prepare("UPDATE cuentas SET Saldo_disponible = ? WHERE Num_cuenta = ?");
                $stmt->bind_param("di", $saldoNuevo1, $numCuentaOrigen);

                $stmt2 = $db->prepare("INSERT INTO movimientos_bancarios (Cod_TipoMovimiento, NumCuenta_Origen, Saldo_disponible, Valor_transaccion, Fecha_registro) VALUES (?, ?, ?, ?, ?)");
                $stmt2->bind_param('iidds',$codTipoMovimiento, $numCuentaOrigen, $Saldo_disponible,$valorTransaccion,$fecha_registro);
        
                if ($stmt->execute()&& $stmt2->execute()) {
                    echo "Los datos se han insertado correctamente en la base de datos.";
            
                } else {
                    echo "Ha ocurrido un error al insertar los datos en la base de datos". mysqli_error($db);;
                }
                              
            }
            else{
            $saldoNuevo = $Saldo_disponible - $valorTransaccion;  
             
            
            if($saldoNuevo > 5.00){ 

                $stmt = $db->prepare("UPDATE cuentas SET Saldo_disponible = ? WHERE Num_cuenta = ?");
                $stmt->bind_param("di", $saldoNuevo, $numCuentaOrigen);
                
                $stmt2 = $db->prepare("INSERT INTO movimientos_bancarios (Cod_TipoMovimiento, NumCuenta_Origen, Saldo_disponible, Valor_transaccion, Fecha_registro) VALUES (?, ?, ?, ?, ?)");
                $stmt2->bind_param('iidds',$codTipoMovimiento, $numCuentaOrigen, $Saldo_disponible,$valorTransaccion,$fecha_registro);
        




                
                if ($stmt->execute()&& $stmt2->execute() ) {
                    echo "Los datos se han insertado correctamente en la base de datos.";
            
                } else {
                    echo "Ha ocurrido un error al insertar los datos en la base de datos". mysqli_error($db);;
                }
            }
                else{
                    echo "Su solicitud excede al limite del retiro autorizado";}
           
            }
    

        
     
    
    }else {

        $stmt =$db->prepare("SELECT Saldo_disponible FROM Cuentas WHERE Num_cuenta = ?");
        $stmt->bind_param("i",  $numCuentaDestino);
        $stmt->execute();
        $saldoDisponibleResult = $stmt->get_result();
        $saldoDisponibleArray = $saldoDisponibleResult->fetch_assoc();
        

        if( $saldoDisponibleArray !== null){
            $Saldo_disponible1 = $saldoDisponibleArray['Saldo_disponible'];

            $saldoNuevo = $Saldo_disponible - $valorTransaccion;
        
            $saldoNuevo1 = $Saldo_disponible1+$valorTransaccion;
                
                if($saldoNuevo > 5.00){ 
    
                    $stmt = $db->prepare("UPDATE cuentas SET Saldo_disponible = ? WHERE Num_cuenta = ?");
                    $stmt->bind_param("di", $saldoNuevo, $numCuentaOrigen);
                    
                    
                    $stmt2 = $db->prepare("INSERT INTO movimientos_bancarios (Cod_TipoMovimiento, NumCuenta_destino, NumCuenta_Origen, Saldo_disponible, Valor_transaccion, Fecha_registro) VALUES (?, ?, ?, ?, ?, ?)");
                    $stmt2->bind_param('iiidds',$codTipoMovimiento, $numCuentaDestino, $numCuentaOrigen, $Saldo_disponible,$valorTransaccion,$fecha_registro);
    
    
                    $stmt3 = $db->prepare("UPDATE cuentas SET Saldo_disponible = ? WHERE Num_cuenta = ?");
                    $stmt3->bind_param("di", $saldoNuevo1, $numCuentaDestino);
    
                    if ($stmt->execute()&& $stmt2->execute()&& $stmt3->execute() ) {
                        echo "Los datos se han insertado correctamente en la base de datos.";
                
                    } else {
                        echo "Ha ocurrido un error al insertar los datos en la base de datos". mysqli_error($db);;
                    }
                }
                    else{
                        echo "Su solicitud excede al limite del retiro autorizado";
                    }
        }
        else{
            
            echo "No se encontro la cuenta destino para seguir la transferencia";
        }
       
       

     }

        } else {
           echo "No se encontro una cuenta relacionada al DUI";
        }


        // Cerrar la consulta
        $stmt->close();
        $db->close();
    }   
    ?>