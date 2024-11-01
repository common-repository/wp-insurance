<?php
namespace Elementor;


if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class WPInsurers_Elementor_Widget_Benefits extends Widget_Base {

    public function get_name() {
        return 'benefits-addons';
    }
    
    public function get_title() {
        return __( 'Insurers : Benefits', 'wpinsurance' );
    }

    public function get_icon() {
        return 'eicon-code-highlight';
    }
    public function get_categories() {
        return [ 'wpinsurance' ];
    }

    protected function register_controls() {

        $this->start_controls_section(
            'benefits-setting',
            [
                'label' => esc_html__( 'Benefits Settings', 'wpinsurance' ),
            ]
        );
        
            $this->add_control(
                'benefitsiconty',
                [
                    'label' => esc_html__( 'Benefits Icon type', 'wpinsurance' ),
                    'type' => Controls_Manager::SELECT,
                    'default' => '1',
                    'options' => [
                        '1' => esc_html__( 'Icon', 'wpinsurance' ),
                        '2' => esc_html__( 'image', 'wpinsurance' ),
                    ],
                ]
            );

            $this->add_control(
                'benefitsimage',
                [
                    'label' => __( 'Benefits image', 'wpinsurance' ),
                    'type' => Controls_Manager::MEDIA,
                    'default' => [
                        'url' => Utils::get_placeholder_image_src(),
                    ],
                    'condition' => [
                        'benefitsiconty' => '2',
                    ]
                ]
            );

            $this->add_group_control(
                Group_Control_Image_Size::get_type(),
                [
                    'name' => 'benefitsimagesize',
                    'default' => 'large',
                    'separator' => 'none',
                    'condition' => [
                        'benefitsiconty' => '2',
                    ]
                ]
            );

            $this->add_control(
                'benefitsicon',
                [
                    'label' => __( 'Benefits icon', 'wpinsurance' ),                   
                    'type' => Controls_Manager::ICONS,
                    'default' => [
                        'value' => 'eicon-navigator',
                        'library' => 'solid',
                    ],
                    'condition' => [
                        'benefitsiconty' => '1',
                    ]
                ]
            );

            $this->add_control(
                'benefitstitle',
                [
                    'label' => __( 'Benefits Title', 'wpinsurance' ),
                    'type' => Controls_Manager::TEXT,
					'default' => 'Your Title',
                    'placeholder' => __( 'Benefits Title', 'wpinsurance' ),
                ]
            );

            $this->add_control(
                'benefitscontent',
                [
                    'label' => __( 'Benefits description', 'wpinsurance' ),
                    'type' => Controls_Manager::TEXTAREA,
					'default' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
                    'rows' => 10,
                    'placeholder' => __( 'Type your description here', 'wpinsurance' ),
                ]
            );

        $this->end_controls_section();

        // benefits Box Style
        $this->start_controls_section(
            'section_area_style',
            [
                'label' => __( 'Benefits Box Style', 'wpinsurance' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

            $this->add_responsive_control(
                'sectionmargin',
                [
                    'label' => __( 'Margin', 'wpinsurance' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .single-benefits' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_responsive_control(
                'sectionpadding',
                [
                    'label' => __( 'Padding', 'wpinsurance' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .single-benefits' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_control(
                'single-benefits-background',
                [
                    'label' => __( 'BG Color', 'wpinsurance' ),
                    'type' => Controls_Manager::COLOR,
                    
                    'selectors' => [
                        '{{WRAPPER}} .single-benefits' => 'background: {{VALUE}};',
                    ],
                ]
            );

            $this->add_control(
                'single-benefits-background-hover',
                [
                    'label' => __( 'Bg Color Hover', 'wpinsurance' ),
                    'type' => Controls_Manager::COLOR,
                    
                    'selectors' => [
                        '{{WRAPPER}} .single-benefits:hover' => 'background: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Border::get_type(),
                [
                    'name' => 'border',
                    'label' => __( 'Border', 'wpinsurance' ),
                    'selector' => '{{WRAPPER}} .single-benefits',
                ]
            ); 

            $this->add_group_control(
                Group_Control_Border::get_type(),
                [
                    'name' => 'borderhvr',
                    'label' => __( 'Border Hover Color', 'wpinsurance' ),
                    'selector' => '{{WRAPPER}} .single-benefits:hover',
                ]
            ); 

            $this->add_responsive_control(
                'aligntitle',
                [
                    'label' => __( 'Alignment', 'wpinsurance' ),
                    'type' => Controls_Manager::CHOOSE,
                    'options' => [
                        'left' => [
                            'title' => __( 'Left', 'wpinsurance' ),
                            'icon' => 'eicon-text-align-left',
                        ],
                        'center' => [
                            'title' => __( 'Center', 'wpinsurance' ),
                            'icon' => 'eicon-text-align-center',
                        ],
                        'right' => [
                            'title' => __( 'Right', 'wpinsurance' ),
                            'icon' => 'eicon-text-align-right',
                        ],
                        'justify' => [
                            'title' => __( 'Justified', 'wpinsurance' ),
                            'icon' => 'eicon-text-align-justify',
                        ],
                    ],
                    'default' => '',
                    'selectors' => [
                        '{{WRAPPER}} .section-title' => 'text-align: {{VALUE}};',
                    ],
                ]
            );

        $this->end_controls_section();

        // benefits Section Title
        $this->start_controls_section(
            'section_title_style',
            [
                'label' => __( 'Title Style', 'wpinsurance' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => __( 'Color', 'wpinsurance' ),
                'type' => Controls_Manager::COLOR,
                'default' => '#464646',
                'selectors' => [
                    '{{WRAPPER}} .single-benefits .benefits-content h4' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'title_color-hvr',
            [
                'label' => __( 'Hover Color', 'wpinsurance' ),
                'type' => Controls_Manager::COLOR,
                'default' => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .single-benefits:hover .benefits-content h4' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'titletypography',
                'selector' => '{{WRAPPER}} .single-benefits .benefits-content h4',
            ]
        );

        $this->add_responsive_control(
            'titlenmargin',
            [
                'label' => __( 'Margin', 'wpinsurance' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .single-benefits .benefits-content h4' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'titlepadding',
            [
                'label' => __( 'Padding', 'wpinsurance' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .single-benefits .benefits-content h4' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        // benefits Section Description
        $this->start_controls_section(
            'section_description_style',
            [
                'label' => __( 'Description Style', 'wpinsurance' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'desc_color',
            [
                'label' => __( 'Color', 'wpinsurance' ),
                'type' => Controls_Manager::COLOR,
                'default' => '#666',
                'selectors' => [
                    '{{WRAPPER}} .single-benefits .benefits-content p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'desc_color-hvr',
            [
                'label' => __( 'Hover Color', 'wpinsurance' ),
                'type' => Controls_Manager::COLOR,
                'default' => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .single-benefits:hover .benefits-content p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'desctypography',
                'selector' => '{{WRAPPER}} .single-benefits .benefits-content p',
            ]
        );

        $this->add_responsive_control(
            'descnmargin',
            [
                'label' => __( 'Margin', 'wpinsurance' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .single-benefits .benefits-content p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'descpadding',
            [
                'label' => __( 'Padding', 'wpinsurance' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .single-benefits .benefits-content p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        // benefits Icon Style
        $this->start_controls_section(
            'icon_style',
            [
                'label' => __( 'Icon Style', 'wpinsurance' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'icon_color',
            [
                'label' => __( 'Color', 'wpinsurance' ),
                'type' => Controls_Manager::COLOR,
                'default' => '#525252',
                'selectors' => [
                    '{{WRAPPER}} .single-benefits .benefits-icon' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'icon_color-hvr',
            [
                'label' => __( 'Hover Color', 'wpinsurance' ),
                'type' => Controls_Manager::COLOR,
                'default' => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .single-benefits:hover .benefits-icon' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'icontypography',
                'selector' => '{{WRAPPER}} .single-benefits .benefits-icon',
            ]
        );

        $this->add_responsive_control(
            'icon_margin',
            [
                'label' => __( 'Margin', 'wpinsurance' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .single-benefits .benefits-icon' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'icon_padding',
            [
                'label' => __( 'Padding', 'wpinsurance' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .single-benefits .benefits-icon' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();


    }

    protected function render( $instance = [] ) {

        $settings           = $this->get_settings_for_display();
        $benefitsiconty      = $this->get_settings_for_display('benefitsiconty');
        $benefitstitle       = $this->get_settings_for_display('benefitstitle');
        $benefitscontent     = $this->get_settings_for_display('benefitscontent');
        $benefitsicon        = $this->get_settings_for_display('benefitsicon');

        ?>
            <div class="single-benefits text-center">
                <div class="benefits-icon">
                    <?php
                        if( $benefitsiconty == 2 ){
                            echo Group_Control_Image_Size::get_attachment_image_html( $settings, 'benefitsimagesize', 'benefitsimage' );
                        }else{
                            \Elementor\Icons_Manager::render_icon( $settings['benefitsicon'], [ 'aria-hidden' => 'true' ] );
                        }
                    ?>
                </div>
                <div class="benefits-content">
                    <?php
                        if( !empty($benefitstitle) ){
                            echo '<h4>'.esc_attr($benefitstitle).'</h4>';
                        }
                        if( !empty($benefitscontent) ){
                            echo '<p>'.$benefitscontent.'</p>';
                        }
                    ?>
                </div>
            </div>

        <?php

    }

}

wpinsurance_widget_register_manager( new WPInsurers_Elementor_Widget_Benefits() );