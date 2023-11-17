<?php    
	$nameuser =  "Team Rocket";
	$mailuser = "teamrocket085@gmail.com";
	$passmail = "Gerardocordova23090015";
	$mailcliente = $_POST['correo'];
	$namecliente = $_POST['titular'];
	$enviado = 'Enviado: ' . date("Y-m-d H:i:s") . "\n";
	$subject = "Reservacion ";
	$message = 'Este es el mensaje a enviar.';
         
 	require("PHPMailer-master/src/PHPMailer.php");
  require("PHPMailer-master/src/SMTP.php");
	require("PHPMailer-master/src/Exception.php");
	require("PHPMailer-master/src/OAuth.php");
   
	$mail = new PHPMailer\PHPMailer\PHPMailer();
   
	$mail->isSMTP();
   
  // Habilitando SMTP debugging
  // 0 = apagado (para producción)
  // 1 = mensajes del cliente
  // 2 = mensajes del cliente y servidor
  $mail->SMTPDebug = 0;
   
  $mail->Debugoutput = 'html';
   
  $mail->Host = 'smtp.gmail.com';
   
  $mail->Port = 587;
   
  $mail->SMTPSecure = 'tls';
   
  $mail->SMTPAuth = true;
   
  $mail->Username = $mailuser;
   
  $mail->Password = $passmail;
   
  $mail->setFrom($mailuser,$nameuser);
   
  $mail->addAddress($mailcliente, $namecliente);
   
  $mail->Subject = $subject . $nameuser;
   
  $mail->MsgHTML($message);
   
   
  // Adjuntando una imagen
  //$mail->addAttachment('images/phpmailer_mini.png');

  if (!$mail->send()) {
    echo "No se pudo enviar el correo. Intentelo más tarde.";
  } else {
    echo "Gracias por contactarnos.";
  }
?>