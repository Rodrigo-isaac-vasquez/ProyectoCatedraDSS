
<?php
// Recibir los datos del formulario
$nombre = $_POST['dui'];
$salario = $_POST['salario'];
$monto_prestamo = $_POST['monto_prestamo'];

// Validar el salario y calcular el préstamo máximo y el interés correspondiente
if ($salario < 365) {
  $prestamo_maximo = 10000;
  $interes = 0.03;
} elseif ($salario < 600) {
  $prestamo_maximo = 25000;
  $interes = 0.03;
} elseif ($salario < 900) {
  $prestamo_maximo = 35000;
  $interes = 0.04;
} elseif ($salario >= 1000) {
  $prestamo_maximo = 550000;
  $interes = 0.05;
}


// Validar el monto del préstamo solicitado
if ($monto_prestamo > $prestamo_maximo) {
  echo "Lo sentimos, no podemos otorgar un préstamo mayor al máximo permitido.";
} else {
  // Calcular el interés correspondiente al monto del préstamo solicitado
  $interes_total = $monto_prestamo * $interes;
  // Mostrar los resultados al cliente
  echo '<div style="backgrounsd-color: #008080; padding: 20px; border: 1px solid #ddd; border-radius: 5px;">Hola ' . $nombre . ', tu préstamo máximo es de ' . number_format($prestamo_maximo, 2, '.', ',') . ' con un interés del ' . ($interes * 100) . '%. El interés correspondiente a tu préstamo solicitado de ' . number_format($monto_prestamo, 2, '.', ',') . ' es de ' . number_format($interes_total, 2, '.', ',') . '. ¡Préstamo solicitado con éxito! Se ha procesado la información del formulario.</div>';
}
?>

