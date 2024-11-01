<?php
/**
 * Template Name: Insurance Single Page
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package wpinsurance
 */

get_header();?>
<div class="page-wrapper clear">
	<?php
		while ( have_posts() ) : the_post();
			$relatedtitle = wpinsurance_get_option( 'wpinsurance_posts_related_title', 'settings' );
			$wpinsurance_featured_image_show = wpinsurance_get_option( 'wpinsurance_featured_image_show', 'settings' );
			$wpinsurance_title_show = wpinsurance_get_option( 'wpinsurance_title_show', 'settings' );
			$wpinsurance_related_service_show = wpinsurance_get_option( 'wpinsurance_related_service_show', 'settings' );
			$wpinsurance_related_service_style = wpinsurance_get_option( 'wpinsurance_related_service_style', 'settings' );
	?>
		<!-- Service Details Area Start -->
		<div class="wp-insurance-detals-area">
			<div class="container">
				<div class="wp-insurance-detals-content">
					<?php if($wpinsurance_featured_image_show =='yes'){?>
					<div class="ht-servie-details-image">
						<?php the_post_thumbnail(); ?>
					</div> 
					<?php } 

					 if($wpinsurance_title_show =='yes'){?> 
					<h3>
                        <?php the_title();?>
                    </h3>
                    <?php } ?>
					<div class="wp-insurance-details-content">
	                    <?php the_content(); ?>
	                </div> 
				</div>
			</div>
		</div>
		<!-- Service Details Area End -->
		<!-- Related Service Area Start -->
		<?php
          
		$related = array(
		    'post_type'  => 'wpinsurance',
		    'post__not_in' =>array(get_the_ID()),
		    'posts_per_page' =>-1,
		);
		$relatedd = new WP_Query($related);

		if($wpinsurance_related_service_show =='yes' && !empty( $relatedd )){
		?>
		<div class="related-area-wp-insurance">
			<div class="container">
				<?php if(!empty($relatedtitle)){?>
					<div class="htrelated-title">
						<h3><?php echo esc_html($relatedtitle);?> </h3>
					</div>
				<?php } ?>
                <div class="related-service-active indicator-style-two">
					<?php
                        while($relatedd->have_posts()): $relatedd->the_post();
                            $short_des = get_post_meta( get_the_ID(),'_wpinsurance_service_short_des', true );  
                    	?>
                    	<div class="<?php echo esc_attr( $wpinsurance_related_service_style ) ?>">
							<div class="wp-insurance-box">
								<div class="wp-insurance-image">
									<?php the_post_thumbnail('wpinsurance_img550x348'); ?>
								</div>
								<div class="wp-insurance-content">
									<h3><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h3>
									<p><?php echo esc_html( $short_des ); ?></p>
								</div>
							</div>
						</div>


                    <?php endwhile; ?>
                </div>
            </div>
		</div>
		<!-- Related Service Area End -->
	<?php
}
		endwhile; // End of the loop.
	?>
</div><!-- #primary -->
<?php
get_footer();