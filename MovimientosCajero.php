<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acciones bancarias</title>
    <link rel="stylesheet" href="css/styleForm.css">
    <script src="JavaScript/modulador.js"></script>
</head>
<body>
<div class="contenedor-formulario">
	<form action="Logica/AccionesBancarias.php" method="post">
        <div class="container">
            <h2>Movimientos</h2>
        <div class="row100">
            <div class="col">
                <div class="inputBox">
                <input type="text" id="DUI" name="dui" pattern="\d{8}-\d{1}" required>
                <span class="text">DUI</span>
                <span class="line"></span>
                </div>
            </div>
        </div>

        <div class="row100">
            <div class="col">
                <div class="inputBox">
                <span class="text">Tipo de Movimiento</span>
                </div>
                <br>
                <div class="content-select">
                <select id="Cod_TipoMovimiento" name="codTipoMovimiento" onchange="mostrarCuentaOrigen()" required>
                <option value="">Seleccione una opción</option >
                <option value="1">Depósito</option> 
                <option value="2">Retiro</option>
                <option value="3">Transferencia</option>
            </select>
                </div>
            </div>
        </div>


        <div class="row100">
            <div class="col">
                <div class="inputBox">
                <input type="text" id="NumCuenta_Origen" name="numCuentaOrigen" pattern="\d{8}" title="Por favor ingrese 8 dígitos numéricos" required>
                <span class="text">Número de Cuenta</span>
                <span class="line"></span>
                </div>
            </div>
        </div>

        <div class="row100">
            <div class="col">
                <div class="inputBox">
                <input type="text" id="NumCuenta_destino" name="numCuentaDestino" pattern="\d{8}" title="Por favor ingrese 8 dígitos numéricos"><br><br>
                <span class="text">Número de Cuenta de Destino</span>
                <span class="line"></span>
                </div>
            </div>
        </div>

        <div class="row100">
            <div class="col">
                <div class="inputBox">
                 <input type="number" id="Valor_transaccion" name="valorTransaccion" placeholder="$0.00" step="0.01">
                <span class="text">Valor de la Transacción</span>
                <span class="line"></span>
                </div>
            </div>
        </div>

		<input type="submit" value="Enviar">
	</form>
    </div>
    <br>

    <a href="cajero.php"><button type="button">Regresar</button></a>
        </div>
</body>
</html>