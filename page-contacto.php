<?php get_header(); ?>

<?php

if( have_posts() ):

	while( have_posts() ): the_post(); ?>

		<section class="sgheader">

			<?php the_post_thumbnail('large', array( 'class' => 'sgheader__fi' ) ); ?>

			<div class="sgheader__meta">
				<h1 class="sgheader__h"><?php the_title() ?></h1>
			</div>

		</section>


		<div class="wrapper">

			<div class="content">

				<div class="content-wrapper">

					<section class="sgcontent">

						<?php the_content(); ?>

						<?php if( isset( $_GET['exito'] ) && $_GET['exito'] == "1" ): ?>
						<div class="mgtcontact__message--success">El email se ha enviado con éxito.</div>
						<?php endif; ?>


						<form class="mgtcontact" method="post" action="<?php echo esc_url( admin_url('admin-post.php') ); ?>">

							<div class="mgtcontact__row">
								<label class="mgtcontact__label" for="txtnombre">Nombre:</label>
								<input class="mgtcontact__input" id="txtnombre" name="txtnombre">
							</div>

							<div class="mgtcontact__row">
								<label class="mgtcontact__label" for="txtemail">Email:</label>
								<input class="mgtcontact__input" type="email" id="txtemail" name="txtemail">
							</div>

							<div class="mgtcontact__row">
								<label class="mgtcontact__label" for="txtmensaje">Mensaje:</label>
								<textarea class="mgtcontact__textarea" name="txtmensaje" id="txtmensaje" cols="15" rows="4"></textarea>
							</div>

							<input type="hidden" name="action" value="contacto">

							<div class="linkcontainer">
								<input type="submit" class="mgtcontact__submit link-right" value="Enviar">
							</div>

						</form>

					</section>


				</div>


				<?php get_sidebar(); ?>

			</div>

		</div>
	<?php endwhile;

endif; ?>

<?php get_footer(); ?>
