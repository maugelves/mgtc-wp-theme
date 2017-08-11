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

					</section>


				</div>


				<?php get_sidebar(); ?>

			</div>

		</div>
	<?php endwhile;

endif; ?>

<?php get_footer(); ?>
