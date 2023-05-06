<?php

// Configuración de la conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "proyectoDSS";

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Función para ingresar nuevos empleados a la sucursal
function ingresarEmpleado($nombre, $apellido, $accion_personal) {
    $sql = "INSERT INTO empleados (nombre, apellido, accion_personal, estado) VALUES ('$nombre', '$apellido', '$accion_personal', 'espera')";
    
    global $conn;

    if ($conn->query($sql) === TRUE) {
        echo "Empleado ingresado correctamente.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Función para dar de baja a un empleado cambiando su estado a inactivo
function darDeBajaEmpleado($id) {
    $sql = "UPDATE empleados SET estado='inactivo' WHERE id=$id";
    
    global $conn;

    if ($conn->query($sql) === TRUE) {
        echo "Empleado dado de baja correctamente.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Función para obtener la lista de préstamos abiertos por los cajeros
function obtenerListaPrestamos() {
    $sql = "SELECT * FROM prestamos WHERE responsable='cajero' AND estado='abierto'";
    
    global $conn;

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "ID: " . $row["id"]. " - Monto: " . $row["monto"]. " - Estado: " . $row["estado"]. "<br>";
        }
    } else {
        echo "No se encontraron préstamos abiertos por cajeros.";
    }
}

// Función para aprobar o rechazar un crédito
function aprobarRechazarCredito($id, $accion) {
    $valid_actions = ['aprobar', 'rechazar'];
    if (!in_array($accion, $valid_actions)) {
        echo "La acción ingresada no es válida.";
        return;
    }

    $estado_nuevo = ($accion === 'aprobar') ? 'aprobado' : 'rechazado';
    $sql = "UPDATE prestamos SET estado='$estado_nuevo' WHERE id=$id";
    
    global $conn;

    if ($conn->query($sql) === TRUE) {
        echo "Crédito actualizado correctamente.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Cerrar la conexión a la base de datos
$conn->close();

?>

