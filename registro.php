<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <p>DOCUMENTO N°:
    <label for="iddocumento"></label>
  <input type="text" name="iddocumento" id="iddocumento" />
  </p>
  <p>
    <label for="remitente"></label>
    <input type="text" name="remitente" id="remitente" placeholder="Remitente" />
  </p>
  <p>
    <label for="destinatario"></label>
    <input type="text" name="destinatario" id="destinatario" placeholder="Destinatario" />
    <label for="email"></label>
    <input type="text" name="email" id="email" placeholder="Ingrese E-mail" />
  </p>
  <p>ASUNTO: 
    <label for="asunto"></label>
    <input type="text" name="asunto" id="asunto" />
  </p>
  <p>TENOR:</p>
  <p>
    <label for="tenor"></label>
    <textarea name="tenor" id="tenor" cols="45" rows="5" placeholder="Ingrese Tenor"></textarea>
  </p>
  <p>
    <input type="submit" name="enviar"
     id="enviar" value="ENVIAR" />
  </p>
</form>
<?php
if(isset($_POST['email'])) {

// Debes editar las próximas dos líneas de código de acuerdo con tus preferencias
$email_to = "heber_love_libra@hotmail.com";
$email_subject = "Contacto desde el sitio web";

// Aquí se deberían validar los datos ingresados por el usuario
if(!isset($_POST['iddocumento']) ||
!isset($_POST['remitente']) ||
!isset($_POST['destinatario']) ||
!isset($_POST['email']) ||
!isset($_POST['asunto']) ||
!isset($_POST['tenor'])) {

echo "<b>Ocurrió un error y el formulario no ha sido enviado. </b><br />";
echo "Por favor, vuelva atrás y verifique la información ingresada<br />";
die();
}

$email_message = "Detalles del formulario de contacto:\n\n";
$email_message .= "Documento N°: " . $_POST['iddocumento'] . "\n";
$email_message .= "Remitente: " . $_POST['remitente'] . "\n";
$email_message .= "Destinatario: " . $_POST['destinatario'] . "\n";
$email_message .= "E-mail: " . $_POST['email'] . "\n";
$email_message .= "Asunto: " . $_POST['asunto'] . "\n";
$email_message .= "Tenor: " . $_POST['tenor'] . "\n\n";


// Ahora se envía el e-mail usando la función mail() de PHP
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);

echo "¡El formulario se ha enviado con éxito!";
}
?>

</body>
</html>