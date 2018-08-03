<?php
/*
Template Name: Contacto
*/
?>
<?php get_header() ?>
<div id="page_wrap" class="limit_short">
	<div id="zone_contact">
		<h1>Contacto</h1>
		<fieldset>
			<label>Nombre
				<input type="text" id="nombre" value="" />
			</label>
			<label>Apellido
				<input type="text" id="apellido" value="" />
			</label>
			<label>Correo
				<input type="text" id="mail" value="" />
			</label>
			<label>Mensaje
				<textarea type="text" id="mensaje" value=""></textarea>
			</label>
			<input id="send_c" type="button" value="Enviar" />
		</fieldset>
	</div>
</div>
<?php get_footer() ?>