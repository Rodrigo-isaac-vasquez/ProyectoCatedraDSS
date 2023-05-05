<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Bienvenido a Banco de Agricultura Salvadoreño</title>
	<link rel="stylesheet" href="css/styleUsuario.css">
</head>
<body>
	<nav>
		<div class="menu">
			<h2>Banco de Agricultura Salvadoreño</h2>
			</div>
			<ul>
				<li><a href="cliente.php">Inicio</a></li>
				<li><a href="registrarCuenta.php">Cuentas</a></li>
			</ul>
		</nav>
		<section class="banco">
			<img src="img/esa.jpg" alt="">
		</section>
	<main>
		<section class="content">
		<?php
		session_start();
		if (isset($_SESSION['datos_usuario'])) {
			$datos_usuario = $_SESSION['datos_usuario'];
			// Mostrar los datos del usuario en la página
			echo "<h2><center>Bienvenido(a) " . $datos_usuario['nombre'] ." " .$datos_usuario['apellido']. "</center></h2>";
			// ...
		} else {
			// Si no hay datos de usuario en la sesión, redirigir al login
			header('Location: login.php');
			exit;
		}
    	?>
		<p class="info">Aquí puedes mostrar información relevante sobre el usuario o la página.</p>
		</section>
	</main>

	<footer class="footer">
  	 <div class="container">
  	 	<div class="row">
  	 		<div class="footer-col">
  	 			<h4>Banco Agricola S.A</h4>
  	 			<ul>
  	 				<li><a href="#">Sobre nosotros</a></li>
  	 				<li><a href="#">Nuestros Servicios</a></li>
  	 				<li><a href="#">Nuestras politicas</a></li>
  	 			</ul>
  	 		</div>
  	 		<div class="footer-col">
  	 			<h4>get help</h4>
  	 			<ul>
  	 				<li><a href="#">FAQ</a></li>
  	 				<li><a href="#">shipping</a></li>
  	 				<li><a href="#">returns</a></li>
  	 				<li><a href="#">order status</a></li>
  	 				<li><a href="#">payment options</a></li>
  	 			</ul>
  	 		</div>
  	 	</div>
  	 </div>

</body>
</html>
