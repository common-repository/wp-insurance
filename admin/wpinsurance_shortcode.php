<?php
//Insurance Shortcode
//usages: [wp_insurance]
if(!function_exists('wp_insurance_shortcode')){
    function wp_insurance_shortcode($atts,$content=null){
        extract(shortcode_atts(array(
            'style'        => 'style1',
            'item'             => '6',
            'order'             => 'DESC',
            'cat'        => '',
            'column'        => '4',
        ),$atts));
        ob_start();
        ?>
            <div class="wp-insurance-area">
                <div class="service box">
                    <div class="row">
                          <?php 
                                $bargs = array(
                                    'post_type'            => 'wpinsurance',
                                    'post_status'          => 'publish',
                                    'ignore_sticky_posts'  => 1,
                                    'posts_per_page'       => $item,
                                    'order'                => $order,
                                );
                                $categories = str_replace(' ', '', $cat);
                                if( strlen($categories) > 0 ){
                                    $ar_categories = explode(',', $categories);
                                    if( is_array($ar_categories) && count($ar_categories) > 0 ){
                                        $field_name = is_numeric($ar_categories[0])?'term_id':'slug';
                                        $bargs['tax_query'] = array(
                                            array(
                                                'taxonomy' => 'wpinsurance_category'
                                                ,'terms' => $ar_categories
                                                ,'field' => $field_name
                                                ,'include_children' => false
                                            ),
                                        );
                                    }
                                }
                                $bldata = new WP_Query($bargs);


                                $collumval = 'col-lg-3';
                                if( $column !='' ){
                                    $colwidth = round(12/$column);
                                    $collumval = 'col-lg-'.$colwidth.' col-md-6';
                                }


                                while($bldata->have_posts()):$bldata->the_post();
                                    $short_des = get_post_meta( get_the_ID(),'_wpinsurance_service_short_des', true ); 
                                    $service_icon = get_post_meta( get_the_ID(),'_wpinsurance_service_icon', true ); 
                                    $service_icon_img = get_post_meta( get_the_ID(),'_wpinsurance_service_icon_img', true );
                                ?>
                                <div class="<?php echo $collumval; if( $style == 'style2' ){ echo ' wp_insurance_style2'; }elseif( $style == 'style3'){ echo ' wp_insurance_style2 ht_hover_box'; }else{ echo ' wp_insurance_style1'; } ?>">
                                    <div class="wp-insurance-box">
                                        <div class="wp-insurance-image">
                                            <?php 
                                            if( $style == 'style2' && !empty( $service_icon_img )){ ?>
                                                <img src="<?php echo esc_attr( $service_icon_img ); ?>" alt="<?php echo esc_attr( the_title() ); ?>">
                                                <?php
                                                }elseif ( $style =='style3' && !empty( $service_icon )) { ?>
                                                    <i class="<?php echo esc_attr( $service_icon ); ?>"></i>
                                                    <?php
                                                }else{
                                            the_post_thumbnail('wpinsurance_img550x348'); }?>
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
            </div>
        <?php
        wp_reset_postdata();
        return ob_get_clean();
    }
    add_shortcode('wp_insurance','wp_insurance_shortcode');
}