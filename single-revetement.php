<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Salade_bar
 */

$dataRevetement = get_fields(); // récupère les données ACF
var_dump($dataRevetement); // affiche les données ACF
get_header();
?>

	<main id="primary" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();
			?>

			<div class="revetement-content">
				<h2><?php the_title(); ?></h2>
				<div class="revetement-box_content">
					<?php the_post_thumbnail(); ?> <!-- affiche l'image -->
					<?php the_content(); ?>
				</div>
			</div>

			<section class="infos">
				<h2>Informations complémentaires</h2>
				<div class="complementaires">
					<p>Rapidité : <?=$dataRevetement['rapidite'] ?> </p>
					<p>Contrôle : <?=$dataRevetement['controle'] ?> </p>
					<p>Adhérence : <?=$dataRevetement['adherence'] ?> </p> 
					<p>Epaisseur : <?php foreach ($dataRevetement['epaisseur'] as $epaisseur) : ?>
                		<?= $epaisseur; ?> /
            		<?php endforeach; ?></p>
					
				</div>
			</section>

			<?php
			the_post_navigation(
				array(
					'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous:', 'Pingpassion' ) . '</span> <span class="nav-title">%title</span>',
					'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next:', 'Pingpassion' ) . '</span> <span class="nav-title">%title</span>',
				)
			);

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;
			?>

			

			
		<?php
		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
// get_sidebar();
get_footer();
