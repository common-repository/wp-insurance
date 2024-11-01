<?php
namespace Elementor;


if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class WPInsurers_Elementor_Widget_Testimonial extends Widget_Base {

    public function get_name() {
        return 'insurers-testimonial';
    }
    
    public function get_title() {
        return __( 'Insurance: Testimonial', 'wpinsurance' );
    }

    public function get_icon() {
        return 'eicon-testimonial-carousel';
    }
    public function get_categories() {
        return [ 'wpinsurance' ];
    }

    protected function register_controls() {

        $this->start_controls_section(
            'testimonial-setting',
            [
                'label' => esc_html__( 'Testimonial', 'wpinsurance' ),
            ]
        );


        $repeater = new Repeater();

            $repeater->add_control(
                'climage',
                [
                    'label' => __( 'Testimonial Image', 'wpinsurance' ),
                    'type' => Controls_Manager::MEDIA,
                    'default' => [
                        'url' => Utils::get_placeholder_image_src(),
                    ],
                ]
            );

            $repeater->add_group_control(
                Group_Control_Image_Size::get_type(),
                [
                    'name' => 'climagesize',
                    'default' => 'large',
                    'separator' => 'none',
                ]
            );
            
            $repeater->add_control(
                'clname',
                [
                    'label' => __( 'Client Name', 'wpinsurance' ),
                    'type' => Controls_Manager::TEXT,
                    'default' => '',
                    'title' => __( 'Enter client name', 'wpinsurance' ),
                ]
            );
            $repeater->add_control(
                'cldesignation',
                [
                    'label' => __( 'Designation', 'wpinsurance' ),
                    'type' => Controls_Manager::TEXT,
                    'default' => '',
                    'label_block' => 'true',
                    'title' => __( 'Enter Designation', 'wpinsurance' ),
                ]
            );

            $repeater->add_control(
                'clsay',
                [
                    'label' => __( 'Client say', 'wpinsurance' ),
                    'type' => Controls_Manager::TEXTAREA,
                    'rows' => 10,
                    'placeholder' => __( 'Client say', 'wpinsurance' ),
                    'title' => __( 'Enter client say', 'wpinsurance' ),
                ]
            );

            $this->add_control(
                'testimonial_list',
                [
                    'label' => __( 'Testimonial', 'wpinsurance' ),
                    'type' => Controls_Manager::REPEATER,
                    'fields' => $repeater->get_controls(),
                    'default' => [
                        [
                            'clname' => __( 'Christopher Fox', 'wpinsurance' ),
                            'cldesignation' => __( 'Author', 'wpinsurance' ),
                            'clsay' => __( 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text. It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.', 'wpinsurance' ),
                        ],
                    ],
                    'title_field' => '{{{ clname }}}',
                ]
            );
            $this->add_control(
                'testimoial_style',
                [
                    'label' => esc_html__( 'Select Style', 'wpinsurance' ),
                    'type' => Controls_Manager::SELECT,
                    'default' => '1',
                    'options' => [
                        '1' => esc_html__( 'Style One', 'wpinsurance' ),
                        '2' => esc_html__( 'Style Two', 'wpinsurance' ),
                    ],
                ]
            );            
        $this->end_controls_section();
        // content tab

        // Slider Option
        $this->start_controls_section(
            'slider_option_setting',
            [
                'label' => esc_html__( 'Slider Option', 'wpinsurance' ),
            ]
        );
            $this->add_control(
                'tsautoplay',
                [
                    'label' => esc_html__( 'Auto play', 'wpinsurance' ),
                    'type' => Controls_Manager::SWITCHER,
                    'return_value' => 'yes',
                    'default' => 'yes',
                ]
            );

            $this->add_control(
                'tsautoplayspeed',
                [
                    'label' => __( 'Auto play speed', 'wpinsurance' ),
                    'type' => Controls_Manager::NUMBER,
                    'min' => 5,
                    'min' => 1000,
                    'step' => 100,
                    'default' => 5000,
                    'condition' => [
                        'tsautoplay' => 'yes',
                    ]
                ]
            );

            $this->add_control(
                'tsarrows',
                [
                    'label' => esc_html__( 'Arrow', 'wpinsurance' ),
                    'type' => Controls_Manager::SWITCHER,
                    'return_value' => 'yes',
                    'default' => 'yes',
                ]
            );
            $this->add_control(
                'arrow_icon_next',
                [
                    'label' => __( 'Icon Next', 'wpinsurance' ),
                    'type' => Controls_Manager::ICONS,
                    'default' => [
                        'value' => 'eicon-angle-right',
                        'library' => 'solid',
                    ],
                    'condition' => [
                        'tsarrows' => 'yes',
                    ]
                ]
            );

            $this->add_control(
                'arrow_icon_prev',
                [
                    'label' => __( 'Icon Prev', 'wpinsurance' ),
                    'type' => Controls_Manager::ICONS,
                    'default' => [
                        'value' => 'eicon-angle-left',
                        'library' => 'solid',
                    ],
                    'condition' => [
                        'tsarrows' => 'yes',
                    ]
                ]
            );

            $this->add_control(
                'tsdots',
                [
                    'label' => esc_html__( 'Dots', 'wpinsurance' ),
                    'type' => Controls_Manager::SWITCHER,
                    'return_value' => 'yes',
                    'default' => 'no',
                ]
            );

        $this->end_controls_section();

        // Style tab section
        $this->start_controls_section(
            'testimonial_style',
            [
                'label' => __( 'Content Style', 'wpinsurance' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
            /* Client Name Style */
            $this->add_control(
                'clname-heading',
                [
                    'label' => __( 'Name', 'wpinsurance' ),
                    'type' => Controls_Manager::HEADING,
                ]
            );

            $this->add_control(
                'clname_color',
                [
                    'label' => __( 'Color', 'wpinsurance' ),
                    'type' => Controls_Manager::COLOR,
                    'default' => '#333333',
                    'selectors' => [
                        '{{WRAPPER}} .single-testimonial .testimonial-content h2' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'clnametypography',
                    'selector' => '{{WRAPPER}} .single-testimonial .testimonial-content h2',
                ]
            );

            $this->add_responsive_control(
                'clname_margin',
                [
                    'label' => __( 'Margin', 'wpinsurance' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .single-testimonial .testimonial-content h2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_responsive_control(
                'clname_padding',
                [
                    'label' => __( 'Padding', 'wpinsurance' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .single-testimonial .testimonial-content h2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            /* Client Designation Style */
            $this->add_control(
                'cldesignation-heading',
                [
                    'label' => __( 'Designation', 'wpinsurance' ),
                    'type' => Controls_Manager::HEADING,
                ]
            );

            $this->add_control(
                'cldesignation-color',
                [
                    'label' => __( 'Color', 'wpinsurance' ),
                    'type' => Controls_Manager::COLOR,
                    'default' => '#333333',
                    'selectors' => [
                        '{{WRAPPER}} .single-testimonial .testimonial-content span' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'cldesignationtypography',
                    'selector' => '{{WRAPPER}} .single-testimonial .testimonial-content span',
                ]
            );

            $this->add_responsive_control(
                'cldesignation-margin',
                [
                    'label' => __( 'Margin', 'wpinsurance' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .single-testimonial .testimonial-content span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_responsive_control(
                'cldesignation-padding',
                [
                    'label' => __( 'Padding', 'wpinsurance' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .single-testimonial .testimonial-content span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            /* Client Descriptin Style */
            $this->add_control(
                'cldescription-heading',
                [
                    'label' => __( 'Client Say', 'wpinsurance' ),
                    'type' => Controls_Manager::HEADING,
                ]
            );


            $this->add_control(
                'clsay-color',
                [
                    'label' => __( 'Color', 'wpinsurance' ),
                    'type' => Controls_Manager::COLOR,
                    'default'=>'#333333',
                    'selectors' => [
                        '{{WRAPPER}} .single-testimonial .testimonial-content p' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'clsaytypography',
                    'selector' => '{{WRAPPER}} .single-testimonial .testimonial-content p',
                ]
            );

             $this->add_responsive_control(
                'clsay-margin',
                [
                    'label' => __( 'Margin', 'wpinsurance' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .single-testimonial .testimonial-content p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_responsive_control(
                'clsay-padding',
                [
                    'label' => __( 'Padding', 'wpinsurance' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .single-testimonial .testimonial-content p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            
        $this->end_controls_section();
      // Carousel Style
        $this->start_controls_section(
            'carousel_style',
            [
                'label' => __( 'Carousel Button', 'wpinsurance' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
            $this->start_controls_tabs(
                    'wpinsurance_carousel_style_tabs'
                );
                $this->start_controls_tab(
                    'wpinsurance__carouse_style_normal_tab',
                    [
                        'label' => __( 'Normal', 'wpinsurance' ),
                    ]
                );


            $this->add_control(
                'arrow_color',
                [
                    'label' => __( 'Button Color', 'wpinsurance' ),
                    'type' => Controls_Manager::COLOR,
                    'default'=>'#333',
                    'selectors' => [
                        '{{WRAPPER}} .testimonial-slider .slick-arrow' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_control(
                'arrow__bg_color',
                [
                    'label' => __( 'Button BG Color', 'wpinsurance' ),
                    'type' => Controls_Manager::COLOR,
                    'default'=>'rgba(0,0,0,0)',
                    'selectors' => [
                        '{{WRAPPER}} .testimonial-slider .slick-arrow,{{WRAPPER}} .testimonial-slider ul.slick-dots li' => 'background: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Border::get_type(),
                [
                    'name' => 'border',
                    'label' => __( 'Button Border', 'wpinsurance' ),
                    'selector' => '{{WRAPPER}} .testimonial-slider .slick-arrow,{{WRAPPER}} .testimonial-slider ul.slick-dots li',
                ]
            );
                       $this->add_control(
                        'carousel_nav_border_radius',
                        [
                            'label' => __( 'Border Radius', 'wpinsurance' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%' ],
                            'selectors' => [
                                '{{WRAPPER}} .testimonial-slider .slick-arrow' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],

                        ]
                    );

                    $this->add_responsive_control(
                        'carousel_navicon_width',
                        [
                            'label' => __( 'Width', 'wpinsurance' ),
                            'type' => Controls_Manager::NUMBER,
                            'min' => 0,
                            'max' => 200,
                            'step' => 1,
                            'selectors' => [
                                '{{WRAPPER}} .testimonial-slider .slick-arrow' => 'width: {{VALUE}}px;',
                            ],
                        ]
                    );
                    $this->add_responsive_control(
                        'carousel_navicon_height',
                        [
                            'label' => __( 'Height', 'wpinsurance' ),
                            'type' => Controls_Manager::NUMBER,
                            'min' => 0,
                            'max' => 200,
                            'step' => 1,
                            'selectors' => [
                                '{{WRAPPER}} .testimonial-slider .slick-arrow' => 'height: {{VALUE}}px;',
                            ],
                        ]
                    );

                    $this->add_group_control(
                        Group_Control_Typography::get_type(),
                        [
                            'name' => 'carousel_nav_typography',
                            'selector' => '{{WRAPPER}} .testimonial-slider .slick-arrow',
                        ]
                    );
                $this->end_controls_tab();
                $this->start_controls_tab(
                    'wpinsurance_brand_carouse_style_hover_tab',
                    [
                        'label' => __( 'Hover', 'wpinsurance' ),
                    ]
                );

                    $this->add_control(
                        'arrow_color_hover',
                        [
                            'label' => __( 'Button Hover Color', 'wpinsurance' ),
                            'type' => Controls_Manager::COLOR,
                            'default'=>'#6cad19',
                            'selectors' => [
                                '{{WRAPPER}} .testimonial-slider .slick-arrow:hover' => 'color: {{VALUE}};',
                            ],
                        ]
                    );



                    $this->add_control(
                        'arrow_bg_color_hover',
                        [
                            'label' => __( 'Button BG Hover Color', 'wpinsurance' ),
                            'type' => Controls_Manager::COLOR,
                            'default'=>'rgba(0,0,0,0)',
                            'selectors' => [
                                '{{WRAPPER}} .testimonial-slider .slick-arrow:hover,{{WRAPPER}} .testimonial-slider ul.slick-dots li.slick-active' => 'background: {{VALUE}};',
                            ],
                        ]
                    );

                    $this->add_group_control(
                        Group_Control_Border::get_type(),
                        [
                            'name' => 'arrwo_border_hover',
                            'label' => __( 'Border Hover', 'wpinsurance' ),
                            'selector' => '{{WRAPPER}} .testimonial-slider .slick-arrow:hover,{{WRAPPER}} .testimonial-slider ul.slick-dots li.slick-active',
                        ]
                    ); 

                $this->end_controls_tab();
            $this->end_controls_tabs(); 
        $this->end_controls_section();

    }

    protected function render( $instance = [] ) {

        $settings = $this->get_settings_for_display();

        // Slider Option
        $tsautoplay = $settings['tsautoplay'];
        $tsarrows = $settings['tsarrows'];
        $tsdots = $settings['tsdots'];
        $tsautoplayspeed = $settings['tsautoplayspeed'];
        $testimoial_style = $settings['testimoial_style'];

        ?>
            <div class="testimonial-slider text-center">

                <?php foreach ( $settings['testimonial_list'] as $item ) : ?>

                    <?php if( $testimoial_style =='2' ){  ?>

                    <div class="single-testimonial teststyle_2">
                        <?php
                            echo '<div class="testimonial-image">'.Group_Control_Image_Size::get_attachment_image_html( $item, 'climagesize', 'climage' ).'</div>';
                        ?>
                        <div class="testimonial-content">
                            <?php
                             if(!empty($item['clsay'])){ echo '<p>'.$item['clsay'].'</p>'; }
                                if( !empty( $item['clname'] ) ){
                                echo '<h2>'.$item['clname'].'</h2>';
                                }
                                if( !empty( $item['cldesignation'] ) ){
                                    echo '<span>'.$item['cldesignation'].'</span>';
                                }
                               
                            ?>
                        </div>
                    </div>
                <?php }else{ ?>

                    <div class="single-testimonial">
                        <?php
                            echo '<div class="testimonial-image">'.Group_Control_Image_Size::get_attachment_image_html( $item, 'climagesize', 'climage' ).'</div>';
                        ?>
                        <div class="testimonial-content">
                            <?php
                                if( !empty( $item['clname'] ) ){
                                echo '<h2>'.$item['clname'].'</h2>';
                                }
                                if( !empty( $item['cldesignation'] ) ){
                                    echo '<span>'.$item['cldesignation'].'</span>';
                                }
                                if(!empty($item['clsay'])){ echo '<p>'.$item['clsay'].'</p>'; }
                            ?>
                        </div>
                    </div>


                <?php } endforeach; ?>

            </div>

            <script type="text/javascript">
                (function($){

                    var _arrows_set = <?php echo esc_js( $tsarrows ) == 'yes' ? 'true': 'false'; ?>;
                    var _autoplay_set = <?php echo esc_js( $tsautoplay ) == 'yes' ? 'true': 'false'; ?>;
                    var _autoplay_speed = <?php if( isset($tsautoplayspeed) ){ echo esc_js($tsautoplayspeed); }else{ echo esc_js(5000); }; ?>;
                    var _dots_set = <?php echo esc_js( $tsdots ) == 'yes' ? 'true': 'false'; ?>;
                    var testimonialSlider = $('.testimonial-slider');
                    testimonialSlider.slick({
                        arrows: _arrows_set,
                        autoplay: _autoplay_set,
                        autoplaySpeed: _autoplay_speed,
                        dots: _dots_set,
                        infinite: true,
                        slidesToShow: 1,
                        prevArrow: '<div class="slick-prev"><?php \Elementor\Icons_Manager::render_icon( $settings['arrow_icon_prev'], [ 'aria-hidden' => 'true' ] );?></div>',
                        nextArrow: '<div class="slick-next"><?php \Elementor\Icons_Manager::render_icon( $settings['arrow_icon_next'], [ 'aria-hidden' => 'true' ] );?></div>',
                    });

                })(jQuery);

            </script>

        <?php

    }

}

wpinsurance_widget_register_manager( new WPInsurers_Elementor_Widget_Testimonial() );