<?php
/**
 * Template Name: Team  Single Page
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package wpinsurance
 */

get_header();?>
<div class="page-wrapper clear">
	<?php
		while ( have_posts() ) : the_post();

	?>

            <section class="wpinsurance-agent-details">
<?php the_content(); ?>
            </section>

			<?php
		endwhile; // End of the loop.
	?>
</div><!-- #primary -->
<?php
get_footer();