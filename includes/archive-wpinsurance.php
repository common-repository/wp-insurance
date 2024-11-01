<?php
/**
 * Template Name: Insurance Single Page
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package wpinsurance
 */

get_header();

?>

<div class="page-wrapper clear wpinsurance-details">
	<div class="container">
		<div class="row">
			<?php
				if ( have_posts() ) : 
                        while( have_posts() ):the_post();
                            $short_des = get_post_meta( get_the_ID(),'_wpinsurance_service_short_des', true ); 
                            $wpinsurance_related_service_style = wpinsurance_get_option( 'wpinsurance_related_service_style', 'settings' );
                    	?>
                    	<div class="col-md-4">
                    	<div class="<?php echo esc_attr( $wpinsurance_related_service_style ) ?>">
							<div class="wp-insurance-box">
								<div class="wp-insurance-image">
									<?php the_post_thumbnail('wpinsurance_img550x348');?>
								</div>
								<div class="wp-insurance-content">
									<h3><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h3>
									<p><?php echo wp_kses_post( $short_des ); ?></p>
								</div>
							</div>
						</div>
                        </div>
                    <?php endwhile; ?>
                    <!-- Pagination -->
					<div class="col-md-12">
						<div class="wp-insurance-pagination">
							<?php  wpinsurance_pagination();?>
						</div>
					</div>
				<?php endif; ?>
        </div>
	</div>
</div>

<?php

get_footer();