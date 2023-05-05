<?php

session_start();

	if ($_SERVER['REQUEST_METHOD'] === 'POST') {

		include_once('../Conexion/conexion.php');

		$usuario = $_POST['usuario'];
		$contrasena = $_POST['contrasena'];

		$query = "SELECT * FROM clientes WHERE usuario = '$usuario' AND contraseña = '$contrasena'";
		$resultado = $db->query($query);
		

		if ($resultado->num_rows == 1) {
			// Usuario y contraseña válidos
			// Redirigir a la página de usuario

			
			$datos_usuario = $resultado->fetch_assoc();
			$_SESSION['datos_usuario'] = $datos_usuario;
			
			header('Location:../cliente.php');
		
		  } else {
			// Usuario y/o contraseña inválidos
			echo 'Usuario y/o contraseña inválidos';
		  }
		
	}
	
	?>