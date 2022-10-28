<section class="my-5 pt-3 mx-0 mx-md-5">
	<br>
	<div class="col-md-12 col-lg-9 col-xl-7 mx-auto bg-dark p-0">
		<form action="" method="post" class="text-center bg-dark p-2 rounded">
			<h4 class='text-warning'>Contáctanos a través del Whatsapp <b class='text-light'>+41791025333</b></h4>
			<h6 class='text-warning'>o dejanos un mensaje.</h6>
<?php
if(isset($_POST['recibido'])){
	if($_POST['recibido']=='si'){
		$visitante_nombre= htmlentities(addslashes($_POST['nombre']));
		$visitante_correo= htmlentities(addslashes($_POST['correo']));
		$visitante_telf= htmlentities(addslashes($_POST['telf']));
		$comentario= htmlentities(addslashes($_POST['mensaje']));
		$fh_comentario=date("Y-m-d h:m:s");

		//parche de correo
		$titulo="Nuevo mensaje en PACOXPRESS.com";
		$cuerpo="Tienes un mensaje de: " . $visitante_nombre . "<br>Correo: " . $visitante_correo . "<br>Teléfono: " . $visitante_telf . "<br>El mensaje es el siguiente:<br>" . $comentario;
		$destinatario="Paco Chiriboga";
		$correo_destinatario="pacochiriboga@gmail.com";

		//Especificamos los datos y configuración del servidor
		$mail = new PHPMailer();
		$mail->IsSMTP();
		$mail->SMTPAuth = true;
		//$mail->SMTPSecure = "ssl";
		$mail->Host = "smtp.hostinger.com";
		$mail->Port = 587;

		//Nos autenticamos con nuestras credenciales en el servidor de correo
		$mail->Username = "info@pacoxpress.com";
		$mail->Password = "0v@ORMtQ0";

		//Agregamos la información que el correo requiere
		$mail->From = "info@pacoxpress.com";
		$mail->FromName = "pacoxpress.com_info";
		$mail->Subject = $titulo;
		$mail->AltBody = $cuerpo;
		$mail->MsgHTML("<p>$cuerpo</p>");
		//$mail->AddAttachment("adjunto.txt");
		$mail->AddAddress($correo_destinatario, $destinatario);
		$mail->IsHTML(true);

		//Enviamos el correo electrónico
		if(!$mail->Send()) {
			echo "<h5 class='text-center bg-danger text-dark p-2 m-3'>Tu mensaje no pudo ser procesado, inténtalo más tarde.</h5>";
			echo "<h6 class='text-left bg-dark text-light p-2 m-3'>" . $mail->ErrorInfo . "</h6>";
		} else {
			echo "<h3 class='text-center bg-success text-dark p-2 m-3'>Tu mensaje fue recibido con ÉXITO.</h3>";
		}
	}
}
?>
			<input type="hidden" id="recibido" name="recibido" value="si">
			<div class="input-group mb-2">
				<div class="col-md-3 p-0 m-0">
					<span class="input-group-text rounded-0 w-100">Nombre:</span>
				</div>
				<input type="text" class="form-control col-md-9 p-0 m-0 px-2 rounded-0" name="nombre" id="nombre" placeholder="Introduce tu Nombre" required autocomplete="off" title="Introduce tu Nombre">
			</div>
			<div class="input-group mb-2">
				<div class="col-md-3 p-0 m-0">
					<span class="input-group-text rounded-0 w-100">Correo:</span>
				</div>
				<input type="email" class="form-control col-md-9 p-0 m-0 px-2 rounded-0" name="correo" id="correo" placeholder="Introduce tu Correo" required autocomplete="off" title="Introduce tu Correo">
			</div>
			<div class="input-group mb-2">
				<div class="col-md-3 p-0 m-0">
					<span class="input-group-text rounded-0 w-100">Teléfono:</span>
				</div>
				<input type="tel" class="form-control col-md-9 p-0 m-0 px-2 rounded-0" name="telf" id="telf" placeholder="Introduce tu Teléfono" required autocomplete="off" title="Introduce tu Teléfono">
			</div>
			<div class="input-group mb-2">
				<span class="input-group-text rounded-0 w-100">Mensaje:</span>
				<textarea class="form-control p-0 m-0 px-2 rounded-0" name="mensaje" id="mensaje" placeholder="Escribe tu mensaje aquí" required autocomplete="off" title="Introduzca su mensaje" rows="4"></textarea>
			</div>
			<div class="m-auto pt-2">
				<input type="submit" value="Enviar &raquo;" class="btn btn-warning mb-2">
			</div>
		</form>
	</div>
</section>
