<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Salade_bar
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php

		while ( have_posts() ) :
			the_post();
			?>

			<div class="bois-content">
				<h2><?php the_title(); ?></h2>
				<div class="bois-box_content">
					<?php the_post_thumbnail(); ?> <!-- affiche l'image -->
					<?php the_content(); ?>
				</div>
			</div>

			<?php

			
			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
// get_sidebar();
get_footer();