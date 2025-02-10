<?php 


$selecTipo = $_POST['selecTipo'];
$selecSol = $_POST['selecSol'];
$oficio = $_POST['txtOficio'];
$asunto = $_POST['txtAsunto'];
$txtNombre = $_POST['txtNombre'];
$txtCorreo = $_POST['txtCorreo'];
$txtTelefono = $_POST['txtTelefono'];

$fileNombre = $_FILES['fileOficio']['name'];
$fileTamanio = $_FILES['fileOficio']['size'];
$fileTipo = $_FILES['fileOficio']['type'];
$fileNombre = $_FILES['fileOficio']['name'];
$fileTemporal = $_FILES['fileOficio']['tmp_name'];


//librerias
  require '../PHPMailer/PHPMailerAutoload.php';

//Create a new PHPMailer instance
$mail = new PHPMailer();
$mail->IsSMTP();

//Configuracion servidor mail
//$mail->From = "soporte_correo@comunidad.unam.mx"; //remitente

$mail->setFrom('soporte_correo@comunidad.unam.mx', 'Soporte Correo');
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'tls'; //seguridad
$mail->Host = "smtp.office365.com"; // servidor smtp
$mail->Port = 587; //puerto
$mail->Username ="soporte_correo@comunidad.unam.mx"; //nombre usuario
$mail->Password = 'S0p0rt3#RiU'; //contraseña

$cuerpo ='<html><head></head><body><b>'.
		 $asunto . 
		 '<br><h1>Form data</h1><br>1) :<br><br>2) :<br></b>'.
		 'Informaci&oacute;n del oficio'.
		 '<br><b>3) Tipo de documento :</b>' . $selecTipo .
		 '<br><b>4) Solicitud interna o externa a la DGTIC :</b>' .  $selecSol .
		 '<br><b>5) Número de oficio o documento :</b>' .  $oficio .
		 '<br><b>6) Asunto :</b>' .  $asunto .
		 '<br><b>7) Anexar Documento :</b> Attached document' .
		 '<br><b>8) :</b>' .
		 '<br>Información del contacto'.
		 '<br><b>9) Nombre completo :</b>' .  $txtNombre .
		 '<br><b>10) Correo electrónico :</b>' .  $txtCorreo . 
		 '<br><b>11) Teléfono de oficina (10 dígitos) :</b>' .  $txtTelefono .
		 '</body></html>';


$mail->AddAddress('jorge.salazar@unam.mx');
$mail->Subject = utf8_decode($asunto) . ' [' . utf8_decode($oficio) . ']';
//$mail->Body = utf8_decode($cuerpo) . utf8_decode($firma);

//$mail->Body =  html_entity_decode($cuerpo);
$mail->IsHTML(true);
$mail->Body = utf8_decode($cuerpo);
$mail->AddAttachment($fileTemporal,$fileNombre);

$mail->Send();


?>