<?php
namespace Elementor;


if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class WPInsurance_Elementor_Widget_Agent extends Widget_Base {

    public function get_name() {
        return 'wpinsurance-agent-post';
    }
    
    public function get_title() {
        return __( 'WP Agent: Agent Post', 'wpinsurance' );
    }

    public function get_icon() {
        return 'eicon-posts-ticker';
    }
    public function get_categories() {
        return [ 'wpinsurance' ];
    }

    protected function register_controls() {

        $this->start_controls_section(
            'wpinsurance_agent_setting',
            [
                'label' => esc_html__( 'Agent', 'wpinsurance' ),
            ]
        );
        $this->start_controls_tabs(
                'wpinsurance_agent_tabs'
            );
                $this->start_controls_tab(
                    'wpinsurance_agent_content_tab',
                    [
                        'label' => __( 'Content', 'wpinsurance' ),
                    ]
                );        
            $this->add_control(
                'item_show_ttie',
                [
                    'label' => __( 'Agent Show Option', 'wpinsurance' ),
                    'type' => Controls_Manager::HEADING,
                ]
            );
            $this->add_control(
                'layout_style',
                [
                    'label' => esc_html__( 'Select Style', 'wpinsurance' ),
                    'type' => Controls_Manager::SELECT,
                    'default' => 'style2',
                    'options' => [
                        'style1' => esc_html__( 'Style One', 'wpinsurance' ),
                        'style2' => esc_html__( 'Style Two', 'wpinsurance' ),
                    ],
                ]
            );

            $this->add_control(
                'post_per_page',
                [
                    'label' => __( 'Show Total Item', 'wpinsurance' ),
                    'type' => Controls_Manager::NUMBER,
                    'min' => 3,
                    'max' => 10000,
                    'step' => 1,
                    'default' => 6,
                ]
            );              
            $this->add_control(
                'wpinsurance_agent_categories',
                [
                    'label' => esc_html__( 'Select Category', 'wpinsurance' ),
                    'type' => Controls_Manager::SELECT2,
                    'label_block' => true,
                    'multiple' => true,
                    'options' => wpinsurance_agent_categories(),                   
                ]
            ); 
             $this->add_control(
                'item_order',
                [
                    'label' => esc_html__( 'Order By', 'wpinsurance' ),
                    'type' => Controls_Manager::SELECT,
                    'default' => 'DESC',
                    'options' => [
                        'ASC' => esc_html__( 'Ascending', 'wpinsurance' ),
                        'DESC' => esc_html__( 'Descending', 'wpinsurance' ),
                    ],
                ]
            );
            $this->add_control(
                'content_show_title',
                [
                    'label' => __( 'Content Show Option', 'wpinsurance' ),
                    'type' => Controls_Manager::HEADING,
                ]
            ); 
            $this->add_control(
                'show_name',
                [
                    'label' => esc_html__( 'Show/Hide Name', 'wpinsurance' ),
                    'type' => Controls_Manager::SWITCHER,
                    'return_value' => 'yes',
                    'default' => 'yes',
                ]
            );
            $this->add_control(
                'show_degination',
                [
                    'label' => esc_html__( 'Show/Hide Designation', 'wpinsurance' ),
                    'type' => Controls_Manager::SWITCHER,
                    'return_value' => 'yes',
                    'default' => 'yes',
                ]
            );            
            $this->add_control(
                'show_content',
                [
                    'label' => esc_html__( 'Show/Hide Content', 'wpinsurance' ),
                    'type' => Controls_Manager::SWITCHER,
                    'return_value' => 'yes',
                    'default' => 'no',
                ]
            );

            $this->add_control(
                'content_length',
                [
                    'label' => __( 'Content Length', 'wpinsurance' ),
                    'type' => Controls_Manager::NUMBER,
                    'min' => 1,
                    'max' => 200,
                    'step' => 1,
                    'default' => 15,
                    'condition' =>[

                        'show_content' =>'yes',
                    ]
                ]
            );
            $this->add_control(
                'socila_icon_show',
                [
                    'label' => esc_html__( 'Show/Hide Social Icon', 'wpinsurance' ),
                    'type' => Controls_Manager::SWITCHER,
                    'return_value' => 'yes',
                    'default' => 'yes',
                ]
            );
            $this->end_controls_tab();
            $this->start_controls_tab(
                'wpinsurance_agent_option_tab',
                [
                    'label' => __( 'Option', 'wpinsurance' ),
                ]
            );  
            $this->add_control(
                'item_style',
                [
                    'label' => esc_html__( 'Select layout', 'wpinsurance' ),
                    'type' => Controls_Manager::SELECT,
                    'default' => 'carosul',
                    'options' => [
                        'carosul' => esc_html__( 'Carousel', 'wpinsurance' ),
                        'grid' => esc_html__( 'Grid', 'wpinsurance' ),
                    ],
                ]
            );             
            $this->add_control(
                'caselautoplay',
                [
                    'label' => esc_html__( 'Auto play', 'wpinsurance' ),
                    'type' => Controls_Manager::SWITCHER,
                    'return_value' => 'yes',
                    'default' => 'yes',
                    'condition' => [
                        'item_style' => 'carosul',
                    ]
                ]
            );
            $this->add_control(
                'caselautoplayspeed',
                [
                    'label' => __( 'Auto play speed', 'wpinsurance' ),
                    'type' => Controls_Manager::NUMBER,
                    'min' => 5,
                    'max' => 10000,
                    'step' => 100,
                    'default' => 5000,
                    'condition' => [
                        'caselautoplay' => 'yes',
                        'item_style' => 'carosul',
                    ]
                ]
            );
            $this->add_control(
                'caselarrows',
                [
                    'label' => esc_html__( 'Arrow', 'wpinsurance' ),
                    'type' => Controls_Manager::SWITCHER,
                    'return_value' => 'yes',
                    'default' => 'yes',
                    'condition' => [
                        'item_style' => 'carosul',
                    ]
                ]
            );
            $this->add_control(
                'slarrowsstyle',
                [
                    'label' => esc_html__( 'Arrow Style Middle/Top', 'wpinsurance' ),
                    'type' => Controls_Manager::SELECT,
                    'default' => '1',
                    'options' => [
                        1 => esc_html__( 'Arrow Middle', 'wpinsurance' ),
                        2 => esc_html__( 'Arrow Top', 'wpinsurance' ),
                    ],
                     'condition' => [
                        'caselarrows' => 'yes',
                        'item_style' => 'carosul',
                    ]
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
                        'caselarrows' => 'yes',
                        'item_style' => 'carosul',
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
                        'caselarrows' => 'yes',
                        'item_style' => 'carosul',
                    ]
                ]
            );
            $this->add_control(
                'showitem',
                [
                    'label' => __( 'Show Item', 'wpinsurance' ),
                    'type' => Controls_Manager::NUMBER,
                    'min' => 1,
                    'max' => 20,
                    'step' => 1,
                    'default' => 4,
                    'condition' => [
                        'item_style' => 'carosul',
                    ]
                ]
            );
            $this->add_control(
                'showitemtablet',
                [
                    'label' => __( 'Show Item (Tablet)', 'wpinsurance' ),
                    'type' => Controls_Manager::NUMBER,
                    'min' => 1,
                    'max' => 6,
                    'step' => 1,
                    'default' => 3,
                    'condition' => [
                        'item_style' => 'carosul',
                    ]
                ]
            );
            $this->add_control(
                'showitemmobile',
                [
                    'label' => __( 'Show Item (Large Mobile)', 'wpinsurance' ),
                    'type' => Controls_Manager::NUMBER,
                    'min' => 1,
                    'max' => 6,
                    'step' => 1,
                    'default' => 2,
                    'condition' => [
                        'item_style' => 'carosul',
                    ]
                ]
            );
            $this->add_control(
              'wp_wpinsurance_agent_item_gutter',
              [
                 'label'   => __( 'Item Gutter', 'wpinsurance' ),
                 'type'    => Controls_Manager::NUMBER,
                 'default' => 15,
                 'min'     => 0,
                 'max'     => 200,
                 'step'    => 1,
                    'condition' => [
                        'item_style' => 'carosul',
                    ]
              ]
            );

            $this->add_control(
                'grid_column_number',
                [
                    'label' => esc_html__( 'Columns', 'wpinsurance' ),
                    'type' => Controls_Manager::SELECT,
                    'default' => '2',
                    'options' => [
                        '1' => esc_html__( '1', 'wpinsurance' ),
                        '2' => esc_html__( '2', 'wpinsurance' ),
                        '3' => esc_html__( '3', 'wpinsurance' ),
                        '4' => esc_html__( '4', 'wpinsurance' ),
                        '5' => esc_html__( '5', 'wpinsurance' ),
                        '6' => esc_html__( '6', 'wpinsurance' ),
                    ],
                    'condition' => [
                        'item_style' => 'grid',
                    ]
                ]
            );
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();

        // Style tab section
        $this->start_controls_section(
            'section_title_style1s',
            [
                'label' => __( 'Content Style', 'wpinsurance' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->start_controls_tabs(
                'wpinsurance_agentcontet_style_tabs'
            );
                $this->start_controls_tab(
                    'wpinsurance_contentstyle_tab',
                    [
                        'label' => __( 'Normal', 'wpinsurance' ),
                    ]
                );        
            $this->add_control(
                'item_title_heading',
                [
                    'label' => __( 'Title Color', 'wpinsurance' ),
                    'type' => Controls_Manager::HEADING,
                ]
            );
            // Title Style
            $this->add_control(
                'title_color',
                [
                    'label' => __( 'Title color', 'wpinsurance' ),
                    'type' => Controls_Manager::COLOR,
                    'default' => '#fff',
                    'selectors' => [
                        '{{WRAPPER}} .wpinsurance-agentper-title > h5' => 'color: {{VALUE}};',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'titletypography',
                    'selector' => '{{WRAPPER}} .wpinsurance-agentper-title > h5',
                ]
            );
            $this->add_responsive_control(
                'margin_title',
                [
                    'label' => __( 'Title Margin', 'wpinsurance' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .wpinsurance-agentper-title > h5' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            // Designation  Style
            $this->add_control(
                'designation_color',
                [
                    'label' => __( 'Designation color', 'wpinsurance' ),
                    'type' => Controls_Manager::COLOR,
                    'default' => '#fff',
                    'selectors' => [
                        '{{WRAPPER}} .wpinsurance-agentper-title > span' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'designation_typography',
                    'selector' => '{{WRAPPER}} .wpinsurance-agentper-title > span',
                ]
            );
            $this->add_responsive_control(
                'margin',
                [
                    'label' => __( 'Designation Margin', 'wpinsurance' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .wpinsurance-agentper-title > span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_control(
                'item_content_color',
                [
                    'label' => __( 'Content color', 'wpinsurance' ),
                    'type' => Controls_Manager::COLOR,
                    'default' => '#555',
                    'selectors' => [
                        '{{WRAPPER}} .wpinsurance-agent-thumb-content p' => 'color: {{VALUE}};',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'contetnttyphography',
                    'selector' => '{{WRAPPER}} .wpinsurance-agent-thumb-content p',
                ]
            );
            // Icon Style
            $this->add_control(
                'item_icon_heading',
                [
                    'label' => __( 'Social Icon Style', 'wpinsurance' ),
                    'type' => Controls_Manager::HEADING,
                ]
            );
                    $this->add_control(
                        'item_link_color',
                        [
                            'label' => __( 'Icon Color', 'wpinsurance' ),
                            'type' => Controls_Manager::COLOR,
                            'default' =>'#fff',
                            'selectors' => [
                                '{{WRAPPER}} .wpinsurance-agent-social > ul li a' => 'color: {{VALUE}};',
                            ],
                        ]
                    );
                    $this->add_control(
                        'item_link_bg_color',
                        [
                            'label' => __( 'Icon BG COlor', 'wpinsurance' ),
                            'type' => Controls_Manager::COLOR,
                            'default' =>'rgba(0,0,0,0)',
                            'selectors' => [
                                '{{WRAPPER}} .wpinsurance-agent-social > ul li a' => 'background: {{VALUE}};',
                            ],
                        ]
                    );
                    $this->add_group_control(
                        Group_Control_Border::get_type(),
                        [
                            'name' => 'border',
                            'label' => __( 'Icon Border', 'wpinsurance' ),
                            'selector' => '{{WRAPPER}} .wpinsurance-agent-social > ul li a',
                        ]
                    ); 
                    $this->add_control(
                        'icon_border_radius',
                        [
                            'label' => __( 'Border Radius', 'wpinsurance' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%' ],
                            'selectors' => [
                                '{{WRAPPER}} .wpinsurance-agent-social > ul li a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],

                        ]
                    );

                    $this->add_responsive_control(
                        'icon_width',
                        [
                            'label' => __( 'Icon Width', 'wpinsurance' ),
                            'type' => Controls_Manager::NUMBER,
                            'min' => 0,
                            'max' => 200,
                            'step' => 1,
                            'default' => 35,
                            'selectors' => [
                                '{{WRAPPER}} .wpinsurance-agent-social > ul li a' => 'width: {{VALUE}}px;',
                            ],
                        ]
                    );
                    $this->add_responsive_control(
                        'icon_height',
                        [
                            'label' => __( 'Icon Height', 'wpinsurance' ),
                            'type' => Controls_Manager::NUMBER,
                            'min' => 0,
                            'max' => 200,
                            'step' => 1,
                            'default' => 35,
                            'selectors' => [
                                '{{WRAPPER}} .wpinsurance-agent-social > ul li a' => 'height: {{VALUE}}px;',
                            ],
                        ]
                    );

                    $this->add_group_control(
                        Group_Control_Typography::get_type(),
                        [
                            'name' => 'icon_typography',
                            'selector' => '{{WRAPPER}} .wpinsurance-agent-social > ul li a',
                        ]
                    );
            $this->end_controls_tab();
                $this->start_controls_tab(
                    'wpinsurance_style_ctn_tab',
                    [
                        'label' => __( 'Hover', 'wpinsurance' ),
                    ]
                );
                $this->add_control(
                    'title_color_hover',
                    [
                        'label' => __( 'Title Hover color', 'wpinsurance' ),
                        'type' => Controls_Manager::COLOR,
                        'default' => '#6cad19',
                        'selectors' => [
                            '{{WRAPPER}} .wpinsurance-agentper-title > h5 a:hover' => 'color: {{VALUE}};',
                        ],
                    ]
                );
                    $this->add_control(
                        'item_icon_hover_heading',
                        [
                            'label' => __( 'Social Icon  Hover Color', 'wpinsurance' ),
                            'type' => Controls_Manager::HEADING,
                        ]
                    );
                    $this->add_control(
                        'item_link_hover_color',
                        [
                            'label' => __( 'Icon Hover COlor', 'wpinsurance' ),
                            'type' => Controls_Manager::COLOR,
                            'default' =>'#fff',
                            'selectors' => [
                                '{{WRAPPER}} .wpinsurance-agent-social > ul li a:hover' => 'color: {{VALUE}};',
                            ],
                        ]
                    );
                    $this->add_control(
                        'item_link_bg_hover_color',
                        [
                            'label' => __( 'Icon Hover BG COlor', 'wpinsurance' ),
                            'type' => Controls_Manager::COLOR,
                            'default' =>'#6cad19',
                            'selectors' => [
                                '{{WRAPPER}} .wpinsurance-agent-social > ul li a:hover' => 'background: {{VALUE}};',
                            ],
                        ]
                    );
                    $this->add_group_control(
                        Group_Control_Border::get_type(),
                        [
                            'name' => 'border_hover',
                            'label' => __( 'Icon Border', 'wpinsurance' ),
                            'selector' => '{{WRAPPER}} .wpinsurance-agent-social > ul li a:hover',
                        ]
                    ); 
            $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();
        $this->start_controls_section(
            'item_box_style',
            [
                'label' => __( 'Box Style', 'wpinsurance' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
            $this->add_control(
                'overlay_style',
                [
                    'label' => __( 'Overlay Style', 'wpinsurance' ),
                    'type' => Controls_Manager::HEADING,
                ]
            );
            $this->add_control(
                'box_overlay_color',
                [
                    'label' => __( 'Overlay BG Color', 'wpinsurance' ),
                    'type' => Controls_Manager::COLOR,
                    'default'=>'rgba(108,173,25,0.81)',
                    'selectors' => [
                        '{{WRAPPER}} .wpinsurance-agent-social:after, {{WRAPPER}} .wpinsurance_agent_st2 .wpinsurance-agent-thumb-content' => 'background: {{VALUE}};',
                    ],
                ]
            );
            $this->add_responsive_control(
                'box_margin',
                [
                    'label' => __( 'Margin', 'wpinsurance' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .wpinsurance-agent-single-item' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_responsive_control(
                'box_padding',
                [
                    'label' => __( 'Padding', 'wpinsurance' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .wpinsurance-agent-single-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

        $this->end_controls_section();
        // Carousel Style
       // Carousel Style
        $this->start_controls_section(
            'carousel_style',
            [
                'label' => __( 'Carousel Button', 'wpinsurance' ),
                'tab' => Controls_Manager::TAB_STYLE,
                     'condition' => [
                        'caselarrows' => 'yes',
                        'item_style' => 'carosul',
                    ]
            ]
        );
            $this->start_controls_tabs(
                    'wpinsurance_carousel_style_tabs'
                );
                $this->start_controls_tab(
                    'wpinsurance_carouse_style_normal_tab',
                    [
                        'label' => __( 'Normal', 'wpinsurance' ),
                    ]
                );
                    $this->add_control(
                        'slider_arrow_button_heading',
                        [
                            'label' => __( 'Arrow Button', 'wpinsurance' ),
                            'type' => Controls_Manager::HEADING,
                        ]
                    );   
                    $this->add_control(
                        'carousel_nav_color',
                        [
                            'label' => __( 'COlor', 'wpinsurance' ),
                            'type' => Controls_Manager::COLOR,
                            'default' =>'#000',
                            'selectors' => [
                                '{{WRAPPER}} .slick-arrow,{{WRAPPER}} .slider-nav-video-item .slick-arrow' => 'color: {{VALUE}};',
                            ],
                        ]
                    );
                    $this->add_control(
                        'carousel_nav_bg_color',
                        [
                            'label' => __( 'BG COlor', 'wpinsurance' ),
                            'type' => Controls_Manager::COLOR,
                            'default' =>'rgba(0,0,0,0)',
                            'selectors' => [
                                '{{WRAPPER}} .slick-arrow,{{WRAPPER}} .slider-nav-video-item .slick-arrow' => 'background: {{VALUE}};',
                            ],
                        ]
                    );
                    $this->add_group_control(
                        Group_Control_Border::get_type(),
                        [
                            'name' => 'arrwo_border',
                            'label' => __( 'Border', 'wpinsurance' ),
                            'selector' => '{{WRAPPER}} .slick-arrow,{{WRAPPER}} .slider-nav-video-item .slick-arrow',
                        ]
                    ); 
                    $this->add_control(
                        'carousel_nav_border_radius',
                        [
                            'label' => __( 'Border Radius', 'wpinsurance' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%' ],
                            'selectors' => [
                                '{{WRAPPER}} .slick-arrow,{{WRAPPER}} .slider-nav-video-item .slick-arrow' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                                '{{WRAPPER}} .slick-arrow,{{WRAPPER}} .slider-nav-video-item .slick-arrow' => 'width: {{VALUE}}px;',
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
                                '{{WRAPPER}} .slick-arrow,{{WRAPPER}} .slider-nav-video-item .slick-arrow' => 'height: {{VALUE}}px;',
                            ],
                        ]
                    );

                    $this->add_group_control(
                        Group_Control_Typography::get_type(),
                        [
                            'name' => 'carousel_nav_typography',
                            'selector' => '{{WRAPPER}} .slick-arrow,{{WRAPPER}} .slider-nav-video-item .slick-arrow',
                        ]
                    );
                    $this->add_responsive_control(
                        'carousel_navicon_top_margin',
                        [
                            'label' => __( 'Button Top Position', 'wpinsurance' ),
                            'type' => Controls_Manager::NUMBER,
                            'min' => -200,
                            'max' => 200,
                            'step' => 1,
                            'default' => -87,
                            'selectors' => [
                                '{{WRAPPER}} .wpinsurance_indicator-style-two .slick-arrow' => 'top: {{VALUE}}px;',
                            ],
                        ]
                    );                    
                $this->end_controls_tab();
                $this->start_controls_tab(
                    'wpinsurance_carouse_style_hover_tab',
                    [
                        'label' => __( 'Hover', 'wpinsurance' ),
                    ]
                );
                  $this->add_control(
                        'carousel_nav_color_hover',
                        [
                            'label' => __( 'COlor', 'wpinsurance' ),
                            'type' => Controls_Manager::COLOR,
                            'default' =>'#6cad19',
                            'selectors' => [
                                '{{WRAPPER}} .slick-arrow:hover' => 'color: {{VALUE}};',
                            ],
                        ]
                    );
                    $this->add_control(
                        'carousel_nav_bg_color_hover',
                        [
                            'label' => __( 'BG COlor', 'wpinsurance' ),
                            'type' => Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .slick-arrow:hover,{{WRAPPER}} .slider-nav-video-item .slick-arrow:hover' => 'background: {{VALUE}};',
                            ],
                        ]
                    );
                    $this->add_group_control(
                        Group_Control_Border::get_type(),
                        [
                            'name' => 'arrwo_border_hover',
                            'label' => __( 'Border', 'wpinsurance' ),
                            'selector' => '{{WRAPPER}} .slick-arrow:hover',
                        ]
                    ); 
                    $this->add_control(
                        'carousel_nav_border_radius_hover',
                        [
                            'label' => __( 'Border Radius', 'wpinsurance' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%' ],
                            'selectors' => [
                                '{{WRAPPER}} .slick-arrow:hover,{{WRAPPER}} .slider-nav-video-item .slick-arrow:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],

                        ]
                    );
                $this->end_controls_tab();
            $this->end_controls_tabs();                
        $this->end_controls_section();

    }

    protected function render( $instance = [] ) {

        $settings = $this->get_settings_for_display();
        $sectionid =  $this-> get_id();
        $item_style = $settings['item_style'];
        $caselautoplay = $settings['caselautoplay'];
        $caselarrows = $settings['caselarrows'];
        $caselautoplayspeed = $settings['caselautoplayspeed'];
        $wp_wpinsurance_agent_item_gutter = $this->get_settings_for_display('wp_wpinsurance_agent_item_gutter');
        $showitem = $settings['showitem'];
        $showitemtablet = $settings['showitemtablet'];
        $showitemmobile = $settings['showitemmobile'];        
        $columns = $this->get_settings_for_display('grid_column_number');
        $arrow_icon_prev        = $this->get_settings_for_display('arrow_icon_prev');
        $arrow_icon_next        = $this->get_settings_for_display('arrow_icon_next');
        $slarrowsstyle = $settings['slarrowsstyle'];
        $get_item_categories = $settings['wpinsurance_agent_categories'];
        $item_order        = $this->get_settings_for_display('item_order');

        $per_page       = ! empty( $settings['post_per_page'] ) ? $settings['post_per_page'] : 6;
        $contetnlength  = ! empty( $settings['content_length'] ) ? $settings['content_length'] : 20;
        $btntext        = ! empty( $settings['read_more_btn_txt'] ) ? $settings['read_more_btn_txt'] : '';
        $columns = $this->get_settings_for_display('grid_column_number');
        $show_name = $this->get_settings_for_display('show_name');
        $show_degination = $this->get_settings_for_display('show_degination');
        $socila_icon_show = $this->get_settings_for_display('socila_icon_show');
        $show_content = $this->get_settings_for_display('show_content');

        $layout_style = $settings['layout_style'];

        $collumval = 'col-lg-3 col-sm-6';
        if( $columns !='' ){
            $colwidth = round(12/$columns);
            $collumval = 'col-lg-'.$colwidth.' col-sm-6';
        }

        ?>
        <?php
            $item_cates = str_replace(' ', '', $get_item_categories);
                        $htsargs = array(
                            'post_type'            => 'wpinsurance_agent',
                            'post_status'          => 'publish',
                            'ignore_sticky_posts'  => 1,
                            'posts_per_page'       => $per_page,
                            'order'                => $item_order,
                        );

                        if ( "0" != $get_item_categories) {
                            if( is_array($item_cates) && count($item_cates) > 0 ){
                                $field_name = is_numeric($item_cates[0])?'term_id':'slug';
                                $htsargs['tax_query'] = array(
                                    array(
                                        'taxonomy' => 'wpinsurance_agent_cat',
                                        'terms' => $item_cates,
                                        'field' => $field_name,
                                        'include_children' => false
                                    )
                                );
                            }
                        }

            ?>

        <div class="ouragent-area">
            <div class="<?php if( $item_style == 'grid' ) {echo 'row';}else{ echo 'slider slider-for '.$sectionid; if($slarrowsstyle==2){ echo ' wpinsurance_indicator-style-two';}else echo ' wpinsurance_indicator1';}?> ">
                <?php
                 $posts = new \WP_Query($htsargs);
                while($posts->have_posts()):$posts->the_post();
                    /**
                    * Set Individual Column CSS
                    */
                    ?>         

                <!-- Agent Single -->
                    <?php if( $item_style == 'grid' ) {echo '<div class="'.$collumval.'">'; }?>


            <?php if( $layout_style == 'style2' ){ ?>


                <div class="wpinsurance-agent-single-item wpinsurance_agent_st2">
                    <div class="wpinsurance-agent-thumb-img">
                        <?php if(has_post_thumbnail()){ 
                            if( $socila_icon_show == 'yes' ){
                             the_post_thumbnail();
                            }else{ ?>
                                <a href="<?php the_permalink() ?>">
                                    <?php the_post_thumbnail() ;?> </a>

                        <?php } } ?>                        
                        <div class="wpinsurance-agent-thumb-content">
                            <div class="thumb-personal-info">
                                <div class="wpinsurance-agentper-title">
                                    <?php if( $show_degination == 'yes' ) { ?>
                                     <?php  $help_agentdeg  = get_post_meta( get_the_ID(),'_wpinsurance_agentdeg', true );?>
                                    
                                    <?php 
                                    if( !empty($help_agentdeg) ){?>
                                        <span>
                                            <?php echo esc_html( $help_agentdeg ); ?>
                                        </span>
                                    <?php } ?>

                                    <?php } // end degignation ?>                                    
                                <?php if( $show_name =='yes' ) { ?>
                                    <h5>
                                        <a href="<?php the_permalink() ?>">
                                        <?php the_title() ;?> </a>
                                    </h5>

                                    <?php } //end show title ?>

                                </div>

                                <?php 
                                    if($show_content =='yes'){
                                 echo '<p>'.wp_trim_words( get_the_content(), $contetnlength, '' ).'</p>';

                                    }
                                 ?>
                           <?php if( $socila_icon_show == 'yes' ) { ?>
                                <div class="wpinsurance-agent-social">
                                    <ul>
                                    <?php   
                                    $help_agentsicon  = get_post_meta( get_the_ID(),'_wpinsurance_agentsicon', true );
                                    foreach( (array) $help_agentsicon as $ticonskey => $ticons ){
                                        $ticons1 = $ticons2 ='';
                                        if ( isset( $ticons['_wpinsurance_turl'] ) ) {
                                            $ticons1 =  $ticons['_wpinsurance_turl']; 
                                        }
                                        if ( isset( $ticons['_wpinsurance_ticon'] ) ) {
                                            $ticons2 =  $ticons['_wpinsurance_ticon'];    
                                        }?>

                                        <li><a href="<?php echo $ticons1;?>"><i class="<?php echo $ticons2;?>"></i></a></li>
                                        <?php } ?>

                                        </ul>   
                                </div>
                                <?php } // end show social ?>


                            </div>
                        </div>
                    </div>    
                </div>

            <?php }else{ ?>

                <div class="wpinsurance-agent-single-item">
                    <div class="wpinsurance-agent-thumb-img">
                        <?php if(has_post_thumbnail()){ 
                            if( $socila_icon_show == 'yes' ){
                             the_post_thumbnail();
                            }else{ ?>
                                <a href="<?php the_permalink() ?>">
                                    <?php the_post_thumbnail() ;?> </a>

                        <?php } } ?>
                       <?php if( $socila_icon_show == 'yes' ) { ?>
                        <div class="wpinsurance-agent-social">
                            <ul>
                            <?php   
                            $help_agentsicon  = get_post_meta( get_the_ID(),'_wpinsurance_agentsicon', true );
                            foreach( (array) $help_agentsicon as $ticonskey => $ticons ){
                                $ticons1 = $ticons2 ='';
                                if ( isset( $ticons['_wpinsurance_turl'] ) ) {
                                    $ticons1 =  $ticons['_wpinsurance_turl']; 
                                }
                                if ( isset( $ticons['_wpinsurance_ticon'] ) ) {
                                    $ticons2 =  $ticons['_wpinsurance_ticon'];    
                                }?>

                                <li><a href="<?php echo $ticons1;?>"><i class="<?php echo $ticons2;?>"></i></a></li>
                                <?php } ?>

                                </ul>   
                        </div>
                            <?php } // end show social ?>                        
                    </div>
                    <div class="wpinsurance-agent-thumb-content">
                        <div class="thumb-personal-info">
                            <div class="wpinsurance-agentper-title">
                            <?php if( $show_name =='yes' ) { ?>
                                <h5>
                                    <a href="<?php the_permalink() ?>">
                                    <?php the_title() ;?> </a>
                                </h5>

                                <?php } //end show title ?>
                                <?php if( $show_degination == 'yes' ) { ?>
                                <?php  $help_agentdeg  = get_post_meta( get_the_ID(),'_wpinsurance_agentdeg', true );?>
                                
                                <?php 
                                if( !empty($help_agentdeg) ){?>
                                    <span>
                                        <?php echo esc_html( $help_agentdeg ); ?>
                                    </span>
                                <?php } ?>

                                <?php } // end degignation ?>
                            </div>

                            <?php 
                                if($show_content =='yes'){
                             echo '<p>'.wp_trim_words( get_the_content(), $contetnlength, '' ).'</p>';

                                }
                             ?>
                        </div>
                    </div>
                </div>


          <?php  } ?>
                <?php if( $item_style == 'grid' ) { echo '</div>'; }?>
                <!-- Agent Single end -->                                                
                <?php endwhile; // while have_posts ?>
            </div>
        </div>
   
        <?php if(!empty($wp_wpinsurance_agent_item_gutter)){ ?>
            <style>
            .ouragent-area{
                margin: 0  -<?php echo $wp_wpinsurance_agent_item_gutter ?>px;
            }
        .wpinsurance-agent-single-item{
            padding: 0 <?php echo $wp_wpinsurance_agent_item_gutter ?>px;
        }
        </style>
        
       <?php } ?>

    <?php if( $item_style == 'carosul' ) { ?>


            <script type="text/javascript">
                (function($){

                    var _arrows_set = <?php echo esc_js( $caselarrows ) == 'yes' ? 'true': 'false'; ?>;
                    var _autoplay_set = <?php echo esc_js( $caselautoplay ) == 'yes' ? 'true': 'false'; ?>;
                    var _autoplay_speed = <?php if( isset($caselautoplayspeed) ){ echo esc_js($caselautoplayspeed); }else{ echo esc_js(5000); }; ?>;
                    var _showitem_set = <?php if( isset($showitem) ){ echo esc_js($showitem); }else{ echo esc_js(3); }; ?>;
                    var _showitemtablet_set = <?php if( isset($showitemtablet) ){ echo esc_js($showitemtablet); }else{ echo esc_js(2); }; ?>;
                    var _showitemmobile_set = <?php if( isset($showitemmobile) ){ echo esc_js($showitemmobile); }else{ echo esc_js(2); }; ?>;
                    $('.slider-for.<?php echo $sectionid;?>').slick({
                        slidesToShow: _showitem_set,
                        arrows:_arrows_set,
                        dots: false,
                        autoplay: _autoplay_set,
                        autoplaySpeed: _autoplay_speed,
                        prevArrow: '<div class="btn-prev"><?php \Elementor\Icons_Manager::render_icon( $settings['arrow_icon_prev'], [ 'aria-hidden' => 'true' ] );?></div>',
                        nextArrow: '<div><?php \Elementor\Icons_Manager::render_icon( $settings['arrow_icon_next'], [ 'aria-hidden' => 'true' ] );?></div>',
                        responsive: [
                                {
                                  breakpoint: 991,
                                  settings: {
                                    slidesToShow: _showitemtablet_set
                                  }
                                },
                                {
                                  breakpoint: 768,
                                  settings: {
                                    slidesToShow: _showitemmobile_set
                                  }
                                },
                                {
                                  breakpoint: 575,
                                  settings: {
                                    slidesToShow:1
                                  }
                                }
                              ]
                        });
                    
                })(jQuery);

        </script>

<?php } ?>
    

   
        <?php
        wp_reset_query(); wp_reset_postdata();

    }

}

wpinsurance_widget_register_manager( new WPInsurance_Elementor_Widget_Agent() );