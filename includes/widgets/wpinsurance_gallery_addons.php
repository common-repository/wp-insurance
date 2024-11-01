<?php
namespace Elementor;


if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


class WPInsurance_Elementor_Widget_Gallery extends Widget_Base {


    public function get_name() {
        return 'wpinsurance-gallery-addons';
    }
    
    public function get_title() {
        return __( 'WP Insurance : Gallery', 'wpinsurance' );
    }

    public function get_icon() {
        return 'eicon-gallery-grid';
    }

    public function get_categories() {
        return [ 'wpinsurance' ];
    }

    protected function register_controls() {

        $this->start_controls_section(
            'wpinsurance-gallery',
            [
                'label' => esc_html__( 'Gallery', 'wpinsurance' ),
            ]
        );

            $this->add_control(
                'filttering_title',
                [
                    'label' => __( 'Filtter Options', 'wpinsurance' ),
                    'type' => Controls_Manager::HEADING,
                ]
            );
            $this->add_control(
                'filter_show_hide',
                [
                    'label' => esc_html__( 'Filter Menu Show/Hide', 'wpinsurance' ),
                    'type' => Controls_Manager::SWITCHER,
                    'return_value' => 'yes',
                    'default' => 'yes',
                ]
            );                    
            $this->add_control(
                'wpinsurance_item_categories',
                [
                    'label' => esc_html__( 'Select Item Category', 'wpinsurance' ),
                    'type' => Controls_Manager::SELECT2,
                    'label_block' => true,
                    'multiple' => true,
                    'options' => wpinsurance_gallery_categories(),
                ]
            );
            $this->add_control(
                'all_btn_show_hide',
                [
                    'label' => esc_html__( 'All Menu Show/Hide', 'wpinsurance' ),
                    'type' => Controls_Manager::SWITCHER,
                    'return_value' => 'yes',
                    'default' => 'yes',
                ]
            );
            $this->add_control(
                'all_btn_text',
                [
                    'label' => __( 'All Button Text', 'wpinsurance' ),
                    'type' => Controls_Manager::TEXT,
                    'default' => 'All',
                    'title' => __( 'Enter All Button Text', 'wpinsurance' ),
                    'condition' => [
                        'all_btn_show_hide' => 'yes',
                    ]
                ]
            );
            
            $this->add_control(
                'buttondivider_show_hide',
                [
                    'label' => esc_html__( 'Button Divider Show/Hide', 'wpinsurance' ),
                    'type' => Controls_Manager::SWITCHER,
                    'return_value' => 'yes',
                    'default' => 'yes',
                     'condition' => [
                        'filter_show_hide' => 'yes',
                    ]                   
                ]
            );
            $this->add_control(
                'buttondivider_text',
                [
                    'label' => __( 'Divider symbol', 'wpinsurance' ),
                    'type' => Controls_Manager::TEXT,
                    'default' => '/',
                    'title' => __( 'Enter symbol', 'wpinsurance' ),
                    'condition' => [
                        'buttondivider_show_hide' => 'yes',
                    ]
                ]
            );            
            $this->add_control(
                'item_title',
                [
                    'label' => __( 'Item  Options', 'wpinsurance' ),
                    'type' => Controls_Manager::HEADING,
                ]
            );  
            $this->add_control(
              'wpinsurance_all_item',
              [
                 'label'   => __( 'Show All Item Number', 'wpinsurance' ),
                 'type'    => Controls_Manager::NUMBER,
                 'default' => 6,
                 'min'     => 2,
                 'max'     => 1000,
                 'step'    => 1,
              ]
            );
            $this->add_control(
                'wpinsurance_item_column',
                [
                    'label' => esc_html__( 'Show Columns', 'wpinsurance' ),
                    'type' => Controls_Manager::SELECT,
                    'default' => '3',
                    'options' => [
                        '1' => esc_html__( '1', 'wpinsurance' ),
                        '2' => esc_html__( '2', 'wpinsurance' ),
                        '3' => esc_html__( '3', 'wpinsurance' ),
                        '4' => esc_html__( '4', 'wpinsurance' ),
                        '5' => esc_html__( '5', 'wpinsurance' ),
                        '6' => esc_html__( '6', 'wpinsurance' ),
                    ],
                ]
            ); 
            $this->add_control(
                'wpinsurance_item_column_md',
                [
                    'label' => esc_html__( 'Number Of Columns Displayed (Tab)', 'wpinsurance' ),
                    'type' => Controls_Manager::SELECT,
                    'default' => '3',
                    'options' => [
                        '1' => esc_html__( '1', 'wpinsurance' ),
                        '2' => esc_html__( '2', 'wpinsurance' ),
                        '3' => esc_html__( '3', 'wpinsurance' ),
                        '4' => esc_html__( '4', 'wpinsurance' ),
                    ],
                ]
            );

            $this->add_control(
                'wpinsurance_item_column_sm',
                [
                    'label' => esc_html__( 'Number Of Columns Displayed (Large Mobile)', 'wpinsurance' ),
                    'type' => Controls_Manager::SELECT,
                    'default' => '2',
                    'options' => [
                        '1' => esc_html__( '1', 'wpinsurance' ),
                        '2' => esc_html__( '2', 'wpinsurance' ),
                        '3' => esc_html__( '3', 'wpinsurance' ),
                        '4' => esc_html__( '4', 'wpinsurance' ),
                    ],
                ]
            );
           $this->add_control(
                'wpinsurance_item_order',
                [
                    'label' => esc_html__( 'Order By', 'wpinsurance' ),
                    'type' => Controls_Manager::SELECT,
                    'default' => 'recent-products',
                    'options' => [
                        'ASC' => esc_html__( 'Ascending', 'wpinsurance' ),
                        'DESC' => esc_html__( 'Descending', 'wpinsurance' ),
                    ],
                ]
            );
            $this->add_control(
              'wpinsurance_item_gutter',
              [
                 'label'   => __( 'Item Gutter', 'wpinsurance' ),
                 'type'    => Controls_Manager::NUMBER,
                 'default' => 20,
                 'min'     => 0,
                 'max'     => 100,
                 'step'    => 1,
              ]
            );

            $this->add_group_control(
                Group_Control_Image_Size::get_type(),
                [
                    'name' => 'wpinsurance_gallery_image',
                    'default' => 'large',
                    'separator' => 'none',
                ]
            );            
            $this->add_control(
                'item_icone_option',
                [
                    'label' => __( 'Icon Options', 'wpinsurance' ),
                    'type' => Controls_Manager::HEADING,
                ]
            );

            $this->add_control(
                'icon_show_hide',
                [
                    'label' => esc_html__( 'Icon Show/Hide', 'wpinsurance' ),
                    'type' => Controls_Manager::SWITCHER,
                    'return_value' => 'yes',
                    'default' => 'yes',
                ]
            );
            $this->add_control(
                'show_hide_gallery_title',
                [
                    'label' => esc_html__( 'Galler Title Show/Hide', 'wpinsurance' ),
                    'type' => Controls_Manager::SWITCHER,
                    'return_value' => 'yes',
                    'default' => 'no',
                ]
            ); 

           $this->add_control(
                'link_icon_type',
                [
                    'label' => esc_html__( 'Image popup Icon', 'wpinsurance' ),
                    'type' => Controls_Manager::SELECT,
                    'default' => 'icon',
                    'options' => [
                        'icon' => esc_html__( 'Icon', 'wpinsurance' ),
                        'image' => esc_html__( 'Image', 'wpinsurance' ),
                    ],
                    'condition' => [
                        'icon_show_hide' => 'yes',
                    ]                    
                ]
            );

            $this->add_control(
                'link_icon_iamge',
                [
                    'label' => __( 'Icon image', 'wpinsurance' ),
                    'type' => Controls_Manager::MEDIA,
                    'default' => [
                        'url' => Utils::get_placeholder_image_src(),
                    ],
                    'condition' => [
                        'icon_show_hide' => 'yes',
                        'link_icon_type' => 'image',
                    ]
                ]
            );
            $this->add_control(
                'link_icon_font',
                [
                    'label' => __( 'Icon', 'wpinsurance' ),
                    'type' => Controls_Manager::ICONS,
                    'default' => [
                        'value' => 'eicon-zoom-in-bold',
                        'library' => 'solid',
                    ],
                    'condition' => [
                        'icon_show_hide' => 'yes',
                        'link_icon_type' => 'icon',
                    ]
                ]
            );
           $this->add_control(
                'video_icon_type',
                [
                    'label' => esc_html__( 'Video popup Icon', 'wpinsurance' ),
                    'type' => Controls_Manager::SELECT,
                    'default' => 'icon',
                    'options' => [
                        'icon' => esc_html__( 'Icon', 'wpinsurance' ),
                        'image' => esc_html__( 'Image', 'wpinsurance' ),
                    ],
                    'condition' => [
                        'icon_show_hide' => 'yes',
                    ]                    
                ]
            );

            $this->add_control(
                'video_icon_iamge',
                [
                    'label' => __( 'Icon image', 'wpinsurance' ),
                    'type' => Controls_Manager::MEDIA,
                    'default' => [
                        'url' => Utils::get_placeholder_image_src(),
                    ],
                    'condition' => [
                        'icon_show_hide' => 'yes',
                        'video_icon_type' => 'image',
                    ]
                ]
            );
            $this->add_control(
                'video_icon_font',
                [
                    'label' => __( 'Icon', 'wpinsurance' ),
                    'type' => Controls_Manager::ICONS,
                    'default' => [
                        'value' => 'eicon-video-camera',
                        'library' => 'solid',
                    ],
                    'condition' => [
                        'icon_show_hide' => 'yes',
                        'video_icon_type' => 'icon',
                    ]
                ]
            );

        $this->end_controls_section();

        // Style tab section
        $this->start_controls_section(
            'item_style',
            [
                'label' => __( 'Style', 'wpinsurance' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

            $this->start_controls_tabs(
                'style_tabs'
            );

                // Normal style tab
                $this->start_controls_tab(
                    'style_normal_tab',
                    [
                        'label' => __( 'Normal', 'wpinsurance' ),
                    ]
                );
                    $this->add_control(
                        'filter_box_style',
                        [
                            'label' => __( 'Filter Box  Style', 'wpinsurance' ),
                            'type' => Controls_Manager::HEADING,
                        ]
                    );

                    $this->add_control(
                        'filter_box_bg_color',
                        [
                            'label' => __( 'Filter Box BG COlor', 'wpinsurance' ),
                            'type' => Controls_Manager::COLOR,
                            'default' =>'rgba(0,0,0,0)',
                            'selectors' => [
                                '{{WRAPPER}} .wpinsurance-filter-menu-list' => 'background: {{VALUE}};',
                            ],
                        ]
                    );
                    $this->add_group_control(
                        Group_Control_Border::get_type(),
                        [
                            'name' => 'filter_box_border',
                            'label' => __( 'Box Border', 'wpinsurance' ),
                            'selector' => '{{WRAPPER}} .wpinsurance-filter-menu-list',
                        ]
                    ); 
                    $this->add_control(
                        'filter_box_radius',
                        [
                            'label' => __( 'Border Radius', 'wpinsurance' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%' ],
                            'selectors' => [
                                '{{WRAPPER}} .wpinsurance-filter-menu-list' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],

                        ]
                    );
                    $this->add_responsive_control(
                        'filter_box_padding',
                        [
                            'label' => __( 'Padding', 'wpinsurance' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%' ],
                            'selectors' => [
                                '{{WRAPPER}} .wpinsurance-filter-menu-list' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],

                        ]
                    );
                    $this->add_responsive_control(
                        'filter_box_margin',
                        [
                            'label' => __( 'Margin', 'wpinsurance' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%' ],
                            'selectors' => [
                                '{{WRAPPER}} .wpinsurance-filter-menu-list' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],

                        ]
                    );
                    $this->add_responsive_control(
                        'filter_box_alignment',
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
                            ],
                            'default' => 'center',
                            'selectors' => [
                                '{{WRAPPER}} .wpinsurance-filter-menu-list' => 'text-align: {{VALUE}};',
                            ],
                        ]
                    );

                    // Filtter Button Style
                    $this->add_control(
                        'filter_style',
                        [
                            'label' => __( 'Filter Button Style', 'wpinsurance' ),
                            'type' => Controls_Manager::HEADING,
                        ]
                    );
                    $this->add_control(
                        'fillter_buttion_color',
                        [
                            'label' => __( 'Button Color', 'wpinsurance' ),
                            'type' => Controls_Manager::COLOR,
                            'default' =>'#666',
                            'selectors' => [
                                '{{WRAPPER}} .wpinsurance-filter-menu-list button' => 'color: {{VALUE}};',
                            ],
                        ]
                    );
                    $this->add_control(
                        'fillter_buttion_bg_color',
                        [
                            'label' => __( 'Button BG Color', 'wpinsurance' ),
                            'type' => Controls_Manager::COLOR,
                            'default' =>'rgba(0,0,0,0)',
                            'selectors' => [
                                '{{WRAPPER}} .wpinsurance-filter-menu-list button' => 'background: {{VALUE}};',
                            ],
                        ]
                    );
                    $this->add_group_control(
                        Group_Control_Border::get_type(),
                        [
                            'name' => 'buttion_border',
                            'label' => __( 'Button Border', 'wpinsurance' ),
                            'selector' => '{{WRAPPER}} .wpinsurance-filter-menu-list button',
                        ]
                    ); 
                    $this->add_control(
                        'button_border_radius',
                        [
                            'label' => __( 'Border Radius', 'wpinsurance' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%' ],
                            'selectors' => [
                                '{{WRAPPER}} .wpinsurance-filter-menu-list button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],

                        ]
                    );
                    $this->add_responsive_control(
                        'button_border_padding',
                        [
                            'label' => __( 'Button Padding', 'wpinsurance' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%' ],
                            'selectors' => [
                                '{{WRAPPER}} .wpinsurance-filter-menu-list button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],

                        ]
                    );
                    $this->add_responsive_control(
                        'button_border_margin',
                        [
                            'label' => __( 'Buttio Margin', 'wpinsurance' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%' ],
                            'selectors' => [
                                '{{WRAPPER}} .wpinsurance-filter-menu-list button' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],

                        ]
                    );

                    $this->add_group_control(
                        Group_Control_Typography::get_type(),
                        [
                            'name' => 'icon_typography_fillter',
                            'selector' => '{{WRAPPER}} .wpinsurance-filter-menu-list button',
                        ]
                    );
                    // Filtter Button Style
                    $this->add_control(
                        'filter_style_divider',
                        [
                            'label' => __( 'Button Divider Style', 'wpinsurance' ),
                            'type' => Controls_Manager::HEADING,
                            'condition' => [
                                'buttondivider_show_hide' => 'yes',
                            ]
                                        
                        ]
                    );
                    $this->add_control(
                        'fillter_buttion_divider_color',
                        [
                            'label' => __( 'Divider Color', 'wpinsurance' ),
                            'type' => Controls_Manager::COLOR,
                            'default' =>'#666',
                            'selectors' => [
                                '{{WRAPPER}} .wplolitic-filter-divider-btn .wpinsurance-filter-menu-list button:before' => 'color: {{VALUE}};',
                            ],
                            'condition' => [
                                'buttondivider_show_hide' => 'yes',
                            ]                            
                        ]
                    );
                    $this->add_responsive_control(
                        'filter_divider_margin',
                        [
                            'label' => __( 'Margin', 'wpinsurance' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%' ],
                            'selectors' => [
                                '{{WRAPPER}} .wplolitic-filter-divider-btn .wpinsurance-filter-menu-list button:before' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],

                        ]
                    );                    
                    $this->add_control(
                        'item_box_style',
                        [
                            'label' => __( 'Item Box Style', 'wpinsurance' ),
                            'type' => Controls_Manager::HEADING,
                        ]
                    );
                    $this->add_control(
                        'item_box_bg_color',
                        [
                            'label' => __( 'Box Bg Color', 'wpinsurance' ),
                            'type' => Controls_Manager::COLOR,
                            'default' =>'rgba(0,0,0,0)',
                            'selectors' => [
                                '{{WRAPPER}} .wpinsurance-ft_item_image::before' => 'background-color: {{VALUE}};',
                            ],
                        ]
                    );

                    $this->add_control(
                        'item_icon_style_heading',
                        [
                            'label' => __( 'Item Link Style', 'wpinsurance' ),
                            'type' => Controls_Manager::HEADING,
                        ]
                    );                    
                    $this->add_control(
                        'item_link_color',
                        [
                            'label' => __( 'Link Icon Color', 'wpinsurance' ),
                            'type' => Controls_Manager::COLOR,
                            'default' =>'#fff',
                            'selectors' => [
                                '{{WRAPPER}} .wpinsurance-ft_item_image a.icon_link' => 'color: {{VALUE}};',
                            ],
                        ]
                    );
                    $this->add_control(
                        'item_link_bg_color',
                        [
                            'label' => __( 'Link Icon BG Color', 'wpinsurance' ),
                            'type' => Controls_Manager::COLOR,
                            'default' =>'#6cad19',
                            'selectors' => [
                                '{{WRAPPER}} .wpinsurance-ft_item_image a.icon_link' => 'background: {{VALUE}};',
                            ],
                        ]
                    );
                    $this->add_group_control(
                        Group_Control_Border::get_type(),
                        [
                            'name' => 'border_icone',
                            'label' => __( 'Icon Border', 'wpinsurance' ),
                            'selector' => '{{WRAPPER}} .wpinsurance-ft_item_image a.icon_link',
                        ]
                    ); 
                    $this->add_control(
                        'icon_border_radius',
                        [
                            'label' => __( 'Border Radius', 'wpinsurance' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%' ],
                            'selectors' => [
                                '{{WRAPPER}} .wpinsurance-ft_item_image a.icon_link' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                            'default' => 65,
                            'selectors' => [
                                '{{WRAPPER}} .wpinsurance-ft_item_image a.icon_link' => 'width: {{VALUE}}px;',
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
                            'default' => 65,
                            'selectors' => [
                                '{{WRAPPER}} .wpinsurance-ft_item_image a.icon_link' => 'height: {{VALUE}}px;',
                            ],
                        ]
                    );

                    $this->add_group_control(
                        Group_Control_Typography::get_type(),
                        [
                            'name' => 'icon_typography',
                            'selector' => '{{WRAPPER}} .wpinsurance-ft_item_image a.icon_link',
                        ]
                    );

                    $this->add_control(
                        'category_style',
                        [
                            'label' => __( 'Item Category Style', 'wpinsurance' ),
                            'type' => Controls_Manager::HEADING,
                        ]
                    );                    
                    $this->add_control(
                        'category_link_color',
                        [
                            'label' => __( 'Category Color', 'wpinsurance' ),
                            'type' => Controls_Manager::COLOR,
                            'default' =>'#fff',
                            'selectors' => [
                                '{{WRAPPER}} .wpinsurance-cat-wrapper,.wpinsurance-cat-wrapper > a' => 'color: {{VALUE}};',
                            ],
                        ]
                    );
                    $this->add_control(
                        'category_link_hvr_color',
                        [
                            'label' => __( 'Category Hover Color', 'wpinsurance' ),
                            'type' => Controls_Manager::COLOR,
                            'default' =>'#6cad19',
                            'selectors' => [
                                '{{WRAPPER}} .wpinsurance-cat-wrapper > a:hover' => 'color: {{VALUE}};',
                            ],
                        ]
                    );
                    $this->add_group_control(
                        Group_Control_Typography::get_type(),
                        [
                            'name' => 'category_typography',
                            'selector' => '{{WRAPPER}} .wpinsurance-cat-wrapper,.wpinsurance-cat-wrapper > a',
                        ]
                    );

                $this->end_controls_tab();

                // Hover Style tab
                $this->start_controls_tab(
                    'style_hover_tab',
                    [
                        'label' => __( 'Hover', 'wpinsurance' ),
                    ]
                );
                    $this->add_control(
                        'filter_style_hover',
                        [
                            'label' => __( 'Filter Button Hover/Acitive Style', 'wpinsurance' ),
                            'type' => Controls_Manager::HEADING,
                        ]
                    );
                    $this->add_control(
                        'fillter_buttion_hover_color',
                        [
                            'label' => __( 'Button Hover Color', 'wpinsurance' ),
                            'type' => Controls_Manager::COLOR,
                            'default' =>'#6cad19',
                            'selectors' => [
                                '{{WRAPPER}} .wpinsurance-filter-menu-list button:hover, {{WRAPPER}} .wpinsurance-filter-menu-list button.is-checked ' => 'color: {{VALUE}};',
                            ],
                        ]
                    );
                    $this->add_control(
                        'fillter_buttion_hover_bg_color',
                        [
                            'label' => __( 'Button Hover BG Color', 'wpinsurance' ),
                            'type' => Controls_Manager::COLOR,
                            'default' =>'rgba(0,0,0,0)',
                            'selectors' => [
                                '{{WRAPPER}} .wpinsurance-filter-menu-list button:hover,{{WRAPPER}} .wpinsurance-filter-menu-list button.is-checked' => 'background: {{VALUE}};',
                            ],
                        ]
                    );
                    $this->add_group_control(
                        Group_Control_Border::get_type(),
                        [
                            'name' => 'buttion_border_hover',
                            'label' => __( 'Button Border', 'wpinsurance' ),
                            'selector' => '{{WRAPPER}} .wpinsurance-filter-menu-list button:hover,{{WRAPPER}} .wpinsurance-filter-menu-list button.is-checked',
                        ]
                    ); 

                    $this->add_control(
                        'item_box_style_hover',
                        [
                            'label' => __( 'Item Box Hover Style', 'wpinsurance' ),
                            'type' => Controls_Manager::HEADING,
                        ]
                    );
                    $this->add_control(
                        'item_box_bg_hover_color',
                        [
                            'label' => __( 'Box Bg Hover Color', 'wpinsurance' ),
                            'type' => Controls_Manager::COLOR,
                            'default' =>'rgba(0,0,0,0.4)',
                            'selectors' => [
                                '{{WRAPPER}} .wpinsurance-grid-item:hover .wpinsurance-ft_item_image::before' => 'background: {{VALUE}};',
                            ],
                        ]
                    );  
                    $this->add_control(
                        'item_icon_style',
                        [
                            'label' => __( 'Item Link Hover Style', 'wpinsurance' ),
                            'type' => Controls_Manager::HEADING,
                        ]
                    );                    
                    $this->add_control(
                        'item_link_hover_color',
                        [
                            'label' => __( 'Link Icon Hover Color', 'wpinsurance' ),
                            'type' => Controls_Manager::COLOR,
                            'default' =>'#fff',
                            'selectors' => [
                                '{{WRAPPER}} .wpinsurance-ft_item_image a.icon_link:hover' => 'color: {{VALUE}};',
                            ],
                        ]
                    );
                    $this->add_control(
                        'item_link_bg_hover_color',
                        [
                            'label' => __( 'Link Icon Hover BG Color', 'wpinsurance' ),
                            'type' => Controls_Manager::COLOR,
                            'default' =>'#6cad19',
                            'selectors' => [
                                '{{WRAPPER}} .wpinsurance-ft_item_image a.icon_link:hover' => 'background: {{VALUE}};',
                            ],
                        ]
                    );
                    $this->add_group_control(
                        Group_Control_Border::get_type(),
                        [
                            'name' => 'border_icone_hover',
                            'label' => __( 'Icon Border', 'wpinsurance' ),
                            'selector' => '{{WRAPPER}} .wpinsurance-ft_item_image a.icon_link:hover',
                        ]
                    ); 

                $this->end_controls_tab();

            $this->end_controls_tabs();

        $this->end_controls_section();
    }
    protected function render( $instance = [] ) {

        $settings           = $this->get_settings_for_display();
        $buttondivider_show_hide        = $this->get_settings_for_display('buttondivider_show_hide');
        $filter_show_hide        = $this->get_settings_for_display('filter_show_hide');
        $buttondivider_text        = $this->get_settings_for_display('buttondivider_text');
        $all_btn_show_hide        = $this->get_settings_for_display('all_btn_show_hide');
        $wpinsurance_all_item        = $this->get_settings_for_display('wpinsurance_all_item');
        $wpinsurance_item_column        = $this->get_settings_for_display('wpinsurance_item_column');
        $wpinsurance_item_column_md        = $this->get_settings_for_display('wpinsurance_item_column_md');
        $wpinsurance_item_column_sm        = $this->get_settings_for_display('wpinsurance_item_column_sm');
        $wpinsurance_item_order        = $this->get_settings_for_display('wpinsurance_item_order');
        $wpinsurance_item_gutter        = $this->get_settings_for_display('wpinsurance_item_gutter');
        $icon_show_hide      = $this->get_settings_for_display('icon_show_hide');
        $show_hide_gallery_title      = $this->get_settings_for_display('show_hide_gallery_title');
        $link_icon_type        = $this->get_settings_for_display('link_icon_type');
        $link_icon_font        = $this->get_settings_for_display('link_icon_font');
        $video_icon_iamge  =   (isset($settings['video_icon_iamge']['url']) ? $settings['video_icon_iamge']['url'] : '');
        $video_icon_type        = $this->get_settings_for_display('video_icon_type');
        $video_icon_font        = $this->get_settings_for_display('video_icon_font');
        $sectionid =  $this-> get_id();
        $sectionid = 'wid'.$sectionid;

        $wpinsurance_gallery_image  = $this->get_settings_for_display('wpinsurance_gallery_image_size');

        if($wpinsurance_item_gutter==''||$wpinsurance_item_gutter==0 ){
            $wpinsurance_item_gutter=0;
        }else{
        $wpinsurance_item_gutter = $wpinsurance_item_gutter/2;
        }
        if( $wpinsurance_item_column !='' ){
            $wpinsurance_item_column = 100/$wpinsurance_item_column;
        }

        if( $wpinsurance_item_column_md !='' ){
            $wpinsurance_item_column_md = 100/$wpinsurance_item_column_md;
        }

        if( $wpinsurance_item_column_sm !='' ){
            (float)$wpinsurance_item_column_sm = 100/$wpinsurance_item_column_sm;
        }

        $args = array(
            'post_type'             => 'wpinsurance_gallery',
            'post_status'           => 'publish',
            'ignore_sticky_posts'   => 1,
            'posts_per_page'        => $wpinsurance_all_item,
        );
        $get_item_categories = $settings['wpinsurance_item_categories'];
        $all_btn_text = $settings['all_btn_text'];


        $gallery_cats = str_replace(' ', '', $get_item_categories);

        if ( "0" != $get_item_categories) {
            if( is_array($gallery_cats) && count($gallery_cats) > 0 ){
                $field_name = is_numeric($gallery_cats[0])?'term_id':'slug';
                $args['tax_query'] = array(
                    array(
                        'taxonomy' => 'wpinsurance_gallery_cat',
                        'terms' => $gallery_cats,
                        'field' => $field_name,
                        'include_children' => false
                    )
                );
            }
        }

        ?>
            <div class="filter-area wplolitic_gallery_ars <?php if($buttondivider_show_hide=='yes'){ echo "wplolitic-filter-divider-btn"; } ?> ">
                <?php if($filter_show_hide=='yes'){ ?>
                    <div class="wpinsurance-filter-menu-list <?php echo $sectionid;?>">
                        <?php  if($all_btn_show_hide=='yes'){ ?>
                            <button class="is-checked " data-filter="*"><?php  echo  esc_html($all_btn_text); ?></button>
                        <?php } ?>
                        <?php  if($get_item_categories) { 

                        foreach( $get_item_categories as $selected_categorys_array_single ): ?>
                        <?php $catagories_name = str_replace('-', ' ', $selected_categorys_array_single);?>
                        <button data-filter=".<?php echo $selected_categorys_array_single; ?>"><?php echo $catagories_name; ?></button>
                        <?php endforeach; } ?>
                    </div>
                <?php } ?>
                <div class="ft_item-style">
                    <div class="wpinsurance_all_item_wrapper grid-active <?php echo $sectionid;?>">
                        <?php 
                            $args = new \WP_Query(array(
                                'post_type'  => 'wpinsurance_gallery',
                                'posts_per_page' =>$wpinsurance_all_item,
                                'wpinsurance_gallery_cat' => $get_item_categories,
                                'order' => $wpinsurance_item_order,
                            ));
                            while($args->have_posts()):$args->the_post();
                            $terms = get_the_terms(get_the_id(),'wpinsurance_gallery_cat');
                            $popup_video = get_post_meta( get_the_ID(),'_wpinsurance_wpinsurance_gallery_video', true ); 
                         $full_image = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_id()),'full',true); 

                        ?>
                        <div class="wpinsurance-filter_item_box wpinsurance-grid-item <?php if( $terms ){  foreach($terms as $term ){ echo $term->slug .' ';} } ?>">
                            <?php if(has_post_thumbnail() ){?>  
                            <div class="wpinsurance-ft_item_image">
                                <?php if($icon_show_hide == 'yes'){   
                                    if( $popup_video !=''){
                                 ?>
                                 <a class="icon_link various fancybox.iframe?" href="<?php echo esc_url( $popup_video ) ; ?>">
                                    <?php
                                        if( $video_icon_type == 'image' ){
                                           ?>
                                            <img src="<?php echo $video_icon_iamge; ?>" alt="<?php echo esc_attr('wpinsurance'); ?>" />
                                            <?php
                                        }else{
                                            \Elementor\Icons_Manager::render_icon( $settings['video_icon_font'], [ 'aria-hidden' => 'true' ] );
                                        }
                                    ?>
                                </a>
                                <?php the_post_thumbnail( $wpinsurance_gallery_image );?>
                                <?php  } else{ ?>

                                <a class="icon_link"  data-fancybox="wpinsurance_popup"  href="<?php echo esc_url( $full_image[0] ) ; ?>">
                                    <?php
                                        if( $link_icon_type == 'image' ){
                                           ?>
                                            <img src="<?php echo $link_icon_iamge; ?>" alt="<?php echo esc_attr('wpinsurance'); ?>" />
                                            <?php
                                        }else{
                                            \Elementor\Icons_Manager::render_icon( $settings['link_icon_font'], [ 'aria-hidden' => 'true' ] );
                                        }
                                    ?>
                                </a>
                                <?php the_post_thumbnail( $wpinsurance_gallery_image ); ?>
                                <?php } }else{ ?>
                                <a  data-fancybox="wpinsurance_popup"  href="<?php echo esc_attr( $full_image[0] ) ; ?>"><?php the_post_thumbnail( $wpinsurance_gallery_image );?> </a> <?php } ?>
                                <?php if( $show_hide_gallery_title == 'yes' ){ ?>
                                    <span class="wpinsurance-cat-wrapper">
                                        <?php the_title();
                                         ?>
                                    </span>
                                <?php } ?>
                            </div>
                            <?php } ?>
                        </div>
                        <?php endwhile; 
                        ?>
                    </div>
                </div>
            </div>

    <style>
  
    <?php if($wpinsurance_item_gutter >=0){ ?>
      .<?php echo $sectionid;?>.wpinsurance_all_item_wrapper{
            margin: -<?php echo $wpinsurance_item_gutter ?>px;
        }
         .<?php echo $sectionid;?> .wpinsurance-filter_item_box{
            padding:<?php echo $wpinsurance_item_gutter ?>px;
        }
        <?php } ?>

         .<?php echo $sectionid;?> .wpinsurance-filter_item_box{
            width:<?php echo $wpinsurance_item_column ?>%;
        }

        @media only screen and (min-width: 768px) and (max-width: 991px) {
            .<?php echo $sectionid;?> .wpinsurance-filter_item_box{
                width:<?php echo $wpinsurance_item_column_md ?>%;
            }
        }
        @media (max-width: 767px) {
           .<?php echo $sectionid;?> .wpinsurance-filter_item_box{
                width:<?php echo $wpinsurance_item_column_sm ?>%;
            }
        }
        @media (max-width: 575px) {
            .<?php echo $sectionid;?> .wpinsurance-filter_item_box{
                width: 100%;
            }
        }  

   .wplolitic-filter-divider-btn .wpinsurance-filter-menu-list button:not(:first-child):before {
    content: "<?php echo $buttondivider_text;?>";
    margin-right: 11px;
}     

    </style>

        <script type="text/javascript">
        
            jQuery(document).ready(function($) {

                // images have loaded
                $('.filter-area').imagesLoaded( function() {

                  // Isotop Active
                  $('.wpinsurance-filter-menu-list.<?php echo $sectionid;?>').on( 'click', 'button', function() {
                    var filterValue = $(this).attr('data-filter');
                    $grid.isotope({ filter: filterValue });
                  });

                  // Isotop Full Grid
                  var $grid = $('.grid-active.<?php echo $sectionid;?>').isotope({
                    itemSelector: '.wpinsurance-grid-item',
                    percentPosition: true,
                    masonry: {
                    columnWidth: '.wpinsurance-grid-item',
                    }

                  });
                  // Isotop Menu Active
                  $('.wpinsurance-filter-menu-list button').on('click', function(event) {
                        $(this).siblings('.is-checked').removeClass('is-checked');
                        $(this).addClass('is-checked');
                        event.preventDefault();
                    });
                  // Image Popup Fancy Active
                  $(".wpinsurance_popup").fancybox();

                    $(".various").fancybox({
                        maxWidth    : 800,
                        maxHeight   : 600,
                        fitToView   : false,
                        width       : '70%',
                        height      : '70%',
                        autoSize    : false,
                        closeClick  : false,
                        openEffect  : 'none',
                        closeEffect : 'none'
                    });
                });
                
            });

        </script>

        <?php

    }

}

wpinsurance_widget_register_manager( new WPInsurance_Elementor_Widget_Gallery() );