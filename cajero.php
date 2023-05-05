<!DOCTYPE html>
<html>
  <head>
    <title>Cajero</title>
    <link rel="stylesheet" href="css/styleCajero.css">
  </head>
  <body>
    <header>
      <nav>
        <ul>
          <li>Cajero: <?php echo "Nombre del Cajero"; ?></li>
          <li>
            <ul>
            <li><button onclick="window.location.href='ConsultasBancarias.php'">Consultar historial bancario</button></li>
              <li><button onclick="window.location.href='NuevosClientes.php'">Registrar nuevos clientes</button></li>
              <li><button onclick="window.location.href='MovimientosCajero.php'">Realizar transacciones bancarias</button></li>
              <li><button onclick="window.location.href='SolicitaPrestamo.php'">Aperturar un préstamo</button></li>
            
            </ul>
          </li>
        </ul>
      </nav>
    </header>
    
    <main>
    <h1>Bienvenido al Banco Agricultura Salvadoreño</h1>  <br><br>

    <p>En el Banco Agricultura Salvadoreño, nos comprometemos a promover el desarrollo sostenible y la inclusión financiera en el sector agropecuario, contribuyendo así al crecimiento económico y social de El Salvador.</p>

    </main>
    
    <footer>
      <div>
        <img src="img/logob2.png" alt="Logo de la empresa">
        <p>Dirección: Calle 123, Ciudad, País</p>
        <p>Teléfono: +123456789</p>
        <p>Email: info@cajero.com</p>
        <p>&copy; <?php echo date("Y"); ?> Cajero Automático. Todos los derechos reservados.</p>
      </div>
    </footer>
  </body>
</html>
