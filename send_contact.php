<?php
if(isset($_POST['email'])):
	@$name = addslashes($_POST['name']);
	@$apellido = addslashes($_POST['apellido']);
	@$email = addslashes($_POST['email']);
	@$message = addslashes($_POST['mens']);
	$cabeceras = "From: $email\n"
	 . "Reply-To: $email\n";
	$asunto = "Desde Contacto Travesías";
	$email_to = "contacto@travesiasdigital.com";
	$contenido = "$name $apellido le ha enviado el siguiente mensaje:\n". "\n". "Comentario : $message\n". "\n";
	if (@mail($email_to, $asunto ,$contenido ,$cabeceras )) {
		echo 1;
	}else{
		echo 0;
	}
else:
	echo 0;
endif;
?>