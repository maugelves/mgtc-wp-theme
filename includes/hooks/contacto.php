<?php

/**
 * Función para capturar los valores del
 * formulario de contacto del website.
 *
 * Los datos son enviados por email a mg@maugelves.com
 */
function enviar_formulario_por_email(){

	// Verificamos que los 2 campos tengan valores
	if( empty( $_POST['txtnombre'] ) || empty( $_POST['txtmensaje'] ) ):

		// Enviamos al usuario a la misma página con una variable GET de error.
		wp_redirect( add_query_arg( array( 'errormsg' => "Campos incompletos" ), get_home_url() . '/contacto') );
		exit;

	endif;


	// SIEMPRE SE DEBEN SANITIZAR LOS VALORES
	$nombre     = sanitize_text_field( $_POST['txtnombre'] );
	$email      = sanitize_email( $_POST['txtemail'] );
	$mensaje    = sanitize_text_field( $_POST['txtmensaje'] );


	// SET THE BODY

	$body        = sprintf("<p><b>Nombre:</b> %s</p>", $nombre);
	$body       .= sprintf("<p><b>Email:</b> %s</p>", $email);
	$body    .= sprintf("<p><b>Mensaje:</b> %s</p>", $mensaje);


	// SET THE HEADERS
	$headers = array(
						'Content-Type: text/html; charset=UTF-8',
						sprintf('Reply-To: %s <%s>', $nombre, $email)
					);

	/*
	Una vez que tenemos los datos del formulario podemos
	hacer con ellos lo que nuestro proyecto web necesite, ej:
	a)  Enviar un email con esta información
	b)  Guardar los valores en base de datos
	c)  Hacer una nueva llamada POST a otro servicio que necesita
		esta información.

	En nuestro caso vamos a mandar un email con el nombre y el mensaje del usuario.
	*/
	wp_mail( get_bloginfo('admin_email'), "Avanti Teatro Web - Formulario de contacto", $body, $headers );


	/* Una vez que hayamos trabajado con los datos debemos
	redireccionar al usuario a la misma u a otra nueva página.
	En nuestro ejemplo, vamos a redirigirlo a la misma página
	de contacto con una variable de éxito.*/
	wp_redirect( get_home_url() . '/contacto?exito=1'); exit;


}
add_action('admin_post_nopriv_contacto', 'enviar_formulario_por_email');
add_action('admin_post_contacto', 'enviar_formulario_por_email');