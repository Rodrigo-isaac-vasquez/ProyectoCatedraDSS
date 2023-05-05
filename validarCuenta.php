<?php
include_once('../Conexion/conexion.php');
function generar_token() {
    return bin2hex(random_bytes(32));
}

function enviar_correo($email, $token) {
    $to = $email;
    $subject = 'Activación de cuenta';
    $message = 'Haga clic en el siguiente enlace para activar su cuenta: ' . $_SERVER['HTTP_HOST'] . '/activar-cuenta.php?token=' . $token;
    $headers = 'From: tu@correo.com' . "\r\n" .
               'Reply-To: tu@correo.com' . "\r\n" .
               'X-Mailer: PHP/' . phpversion();

    return mail($to, $subject, $message, $headers);
}

function activar_cuenta($token) {
    global $db;
    $stmt = $db->prepare("SELECT * FROM clientes WHERE token = :token");
    $stmt->bindParam(":token", $token);
    $stmt->execute();
    $cliente = $stmt->fetch();
    if ($cliente) {
        $stmt = $db->prepare("UPDATE clientes SET activo = 1 WHERE DUI = :dui");
        $stmt->bindParam(":dui", $cliente['DUI']);
        $stmt->execute();
        return true;
    } else {
        return false;
    }
}

// Generar token de activación
$token = bin2hex(random_bytes(32));
$stmt = $db->prepare("INSERT INTO clientes (usuario, Correo_Electronico	, contraseña, token) VALUES (:usuario, :Correo_Electronico, :contraseña, :token)");
$stmt->bindParam(":usuario", $nombre);
$stmt->bindParam(":contraseña", $password_encriptado);
$stmt->bindParam(":correo", $email);
$stmt->bindParam(":token", $token);
$stmt->execute();


// Enviar correo electrónico de activación
$activacion_enviada = enviar_correo($email, $token);
if ($activacion_enviada) {
    echo "Se ha enviado un correo electrónico para activar su cuenta. Por favor, revise su bandeja de entrada.";
} else {
    echo "Ha ocurrido un error al enviar el correo electrónico de activación.";
}

if (isset($_GET['token'])) {
    $token = $_GET['token'];
    if (activar_cuenta($token)) {
        echo "¡Su cuenta ha sido activada correctamente!";
    } else {
        echo "Ha ocurrido un error al activar su cuenta. Por favor, póngase en contacto con el soporte técnico.";
    }
}
?>`