<?php
namespace Elementor;


if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class WPInsurance_Elementor_Widget_Service extends Widget_Base {

    public function get_name() {
        return 'services-post';
    }
    
    public function get_title() {
        return __( 'Insurance : Services Box', 'wpinsurance' );
    }

    public function get_icon() {
        return 'eicon-info-box';
    }

    public function get_categories() {
        return [ 'wpinsurance' ];
    }

    protected function register_controls() {

        // Service Area Start
        $this->start_controls_section(
            'service_setting',
            [
                'label' => esc_html__( 'Services', 'wpinsurance' ),
            ]
        );
        $this->start_controls_tabs(
                'wpinsurance_tabs'
            );
                $this->start_controls_tab(
                    'wpinsurance_content_tab',
                    [
                        'label' => __( 'Content', 'wpinsurance' ),
                    ]
                );

            $this->add_control(
                'content_show_ttie',
                [
                    'label' => __( 'Content Source Option', 'wpinsurance' ),
                    'type' => Controls_Manager::HEADING,
                ]
            );
            $this->add_control(
                'iagent_layout_style',
                [
                    'label' => esc_html__( 'Select Style', 'wpinsurance' ),
                    'type' => Controls_Manager::SELECT,
                    'default' => 'style1',
                    'options' => [
                        'style1' => esc_html__( 'Style One', 'wpinsurance' ),
                        'style2' => esc_html__( 'Style Two', 'wpinsurance' ),
                    ],
                ]
            ); 

            $this->add_control(
                'wpinsurance_categories',
                [
                    'label' => esc_html__( 'Select Service Category', 'wpinsurance' ),
                    'type' => Controls_Manager::SELECT2,
                    'label_block' => true,
                    'multiple' => true,
                    'options' => wpinsurance_categories(),                   
                ]
            );          
            $this->add_control(
                'title_length',
                [
                    'label' => __( 'Title Length', 'wpinsurance' ),
                    'type' => Controls_Manager::NUMBER,
                    'min' => 1,
                    'max' => 100,
                    'step' => 1,
                    'default' => 5,
                ]
            );
            $this->add_control(
                'title_link_show',
                [
                    'label' => esc_html__( 'Title Link Show/Hide', 'wpinsurance' ),
                    'type' => Controls_Manager::SWITCHER,
                    'return_value' => 'yes',
                    'default' => 'yes',
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
                    'default' => 20,
                ]
            );
            $this->add_control(
                'read_more_btn_show_hide',
                [
                    'label' => esc_html__( 'Read More Show/Hide', 'wpinsurance' ),
                    'type' => Controls_Manager::SWITCHER,
                    'return_value' => 'yes',
                    'default' => 'yes',
                ]
            );
            $this->add_control(
                'read_more_btn_txt',
                [
                    'label' => __( 'Read more button Text', 'wpinsurance' ),
                    'type' => Controls_Manager::TEXT,
                    'default' => 'Read More',
                    'title' => __( 'Enter button text', 'wpinsurance' ),
                    'condition' => [
                        'read_more_btn_show_hide' => 'yes',
                    ]
                ]
            );
            $this->end_controls_tab();

            $this->start_controls_tab(
                'wpinsurance_option_tab',
                [
                    'label' => __( 'Option', 'wpinsurance' ),
                ]
            );

            $this->add_control(
                'item_show_ttie',
                [
                    'label' => __( 'Item Show Option', 'wpinsurance' ),
                    'type' => Controls_Manager::HEADING,
                ]
            );
            $this->add_control(
                'iagent_layout',
                [
                    'label' => esc_html__( 'Select layout', 'wpinsurance' ),
                    'type' => Controls_Manager::SELECT,
                    'default' => 'grid',
                    'options' => [
                        'carosul' => esc_html__( 'Carousel', 'wpinsurance' ),
                        'grid' => esc_html__( 'Grid', 'wpinsurance' ),
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
                'caselautoplay',
                [
                    'label' => esc_html__( 'Auto play', 'wpinsurance' ),
                    'type' => Controls_Manager::SWITCHER,
                    'return_value' => 'yes',
                    'default' => 'yes',
                    'condition' => [
                        'iagent_layout' => 'carosul',
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
                        'iagent_layout' => 'carosul',
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
                        'iagent_layout' => 'carosul',
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
                        'iagent_layout' => 'carosul',
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
                        'iagent_layout' => 'carosul',
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
                        'iagent_layout' => 'carosul',
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
                    'default' => 3,
                    'condition' => [
                        'iagent_layout' => 'carosul',
                    ]
                ]
            );
            $this->add_control(
                'showitemtablet',
                [
                    'label' => __( 'Show Item (Tablet)', 'wpinsurance' ),
                    'type' => Controls_Manager::NUMBER,
                    'min' => 1,
                    'max' => 100,
                    'step' => 1,
                    'default' => 2,
                    'condition' => [
                        'iagent_layout' => 'carosul',
                    ]
                ]
            );
            $this->add_control(
                'showitemmobile',
                [
                    'label' => __( 'Show Item (Large Mobile)', 'wpinsurance' ),
                    'type' => Controls_Manager::NUMBER,
                    'min' => 1,
                    'max' => 100,
                    'step' => 1,
                    'default' => 1,
                    'condition' => [
                        'iagent_layout' => 'carosul',
                    ]
                ]
            );
            $this->add_control(
                'grid_column_number',
                [
                    'label' => esc_html__( 'Columns', 'wpinsurance' ),
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
                    'condition' => [
                        'iagent_layout' => 'grid',
                    ]
                ]
            );  

            $this->add_control(
                'playiconty',
                [
                    'label' => esc_html__( 'Play Icon type', 'wpinsurance' ),
                    'type' => Controls_Manager::SELECT,
                    'default' => '1',
                    'options' => [
                        '1' => esc_html__( 'Icon', 'wpinsurance' ),
                        '2' => esc_html__( 'image', 'wpinsurance' ),
                    ],
                ]
            );

            $this->add_control(
                'iconiamge',
                [
                    'label' => __( 'Play Icon image', 'wpinsurance' ),
                    'type' => Controls_Manager::MEDIA,
                    'default' => [
                        'url' => Utils::get_placeholder_image_src(),
                    ],
                    'condition' => [
                        'playiconty' => '2',
                    ]
                ]
            );
            $this->add_control(
                'playicon',
                [
                    'label' => __( 'Play icon', 'wpinsurance' ),
                    'type' => Controls_Manager::ICONS,
                    'default' => [
                        'value' => 'eicon-play',
                        'library' => 'solid',
                    ],
                    'condition' => [
                        'playiconty' => '1',
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
                'wpinsurance_style_tabs'
            );
                $this->start_controls_tab(
                    'wpinsurance_style_normal_tab',
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
                    'default' => '#6cad19',
                    'selectors' => [
                        '{{WRAPPER}} .single-service-box .media-body .heading,{{WRAPPER}} .wpinsurance-service_st2-content h2' => 'color: {{VALUE}};',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'titletypography',
                    'selector' => '{{WRAPPER}} .single-service-box .media-body .heading,{{WRAPPER}} .wpinsurance-service_st2-content h2',
                ]
            );
            $this->add_responsive_control(
                'margin',
                [
                    'label' => __( 'Title Margin', 'wpinsurance' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .single-service-box .media-body .heading,{{WRAPPER}} .wpinsurance-service_st2-content h2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_control(
                'item_content_heading',
                [
                    'label' => __( 'Content Style', 'wpinsurance' ),
                    'type' => Controls_Manager::HEADING,
                ]
            );
            $this->add_control(
                'item_content_color',
                [
                    'label' => __( 'Content color', 'wpinsurance' ),
                    'type' => Controls_Manager::COLOR,
                    'default' => '#666',
                    'selectors' => [
                        '{{WRAPPER}} .single-service-box p,{{WRAPPER}} .wpinsurance-service_st2-content p' => 'color: {{VALUE}};',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'contetnttyphography',
                    'selector' => '{{WRAPPER}} .single-service-box > p,{{WRAPPER}} .wpinsurance-service_st2-content p',
                ]
            );
            // Icon Style
            $this->add_control(
                'item_icon_heading',
                [
                    'label' => __( 'Icon/Icon Box Style', 'wpinsurance' ),
                    'type' => Controls_Manager::HEADING,
                ]
            );
            $this->add_control(
                'item_icon_color',
                [
                    'label' => __( 'Icon color', 'wpinsurance' ),
                    'type' => Controls_Manager::COLOR,
                    'default' => '#333',
                    'selectors' => [
                        '{{WRAPPER}} .wp-insurance-image i' => 'color: {{VALUE}};',
                    ],
                    'condition' => [
                        'iagent_layout_style' => 'style1',
                    ]
                ]
            );
            $this->add_control(
                'item_box_title_color',
                [
                    'label' => __( 'Box Title Color', 'wpinsurance' ),
                    'type' => Controls_Manager::COLOR,
                    'default' => '#222845',
                    'selectors' => [
                        '{{WRAPPER}} .wpinsurance-service_st2-category span' => 'color: {{VALUE}};',
                    ],
                    'condition' => [
                        'iagent_layout_style' => 'style2',
                    ]
                ]
            );            
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'icontypography',
                    'selector' => '{{WRAPPER}} .wp-insurance-image i,{{WRAPPER}} .wpinsurance-service_st2-category span',
                ]
            );
            $this->add_group_control(
                Group_Control_Border::get_type(),
                [
                    'name' => 'border_icone',
                    'label' => __( 'Icon Border', 'wpinsurance' ),
                    'selector' => '{{WRAPPER}} .wp-insurance-image i,{{WRAPPER}} .wpinsurance-icn_box',
                ]
            );  
            $this->add_responsive_control(
                'icon_margin',
                [
                    'label' => __( 'Icon margin', 'wpinsurance' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .wp-insurance-image' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                    'condition' => [
                        'iagent_layout_style' => 'style1',
                    ]                    
                ]
            );
            $this->add_responsive_control(
                'padding',
                [
                    'label' => __( 'Icon Padding', 'wpinsurance' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .wp-insurance-image i' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                    'condition' => [
                        'iagent_layout_style' => 'style1',
                    ]                    
                ]
            );
            $this->end_controls_tab();

            $this->start_controls_tab(
                'wpinsurance_style_hover_tab',
                [
                    'label' => __( 'Hover', 'wpinsurance' ),
                ]
            );
            $this->add_control(
                'item_title_heading_hover',
                [
                    'label' => __( 'Title Hover Color', 'wpinsurance' ),
                    'type' => Controls_Manager::HEADING,
                ]
            );
            $this->add_control(
                'title_color_hover_link',
                [
                    'label' => __( 'Title Hover Link color', 'wpinsurance' ),
                    'type' => Controls_Manager::COLOR,
                    'default' => '#444',
                    'selectors' => [
                        '{{WRAPPER}} .single-service-box .media-body .heading a:hover,{{WRAPPER}} .wpinsurance-service_st2-content h2 a:hover' => 'color: {{VALUE}};',
                    ],
                ]
            );
            $this->add_control(
                'item_content_heading_hover',
                [
                    'label' => __( 'Content Hover Style', 'wpinsurance' ),
                    'type' => Controls_Manager::HEADING,
                ]
            );
            $this->add_control(
                'item_content_color_hover',
                [
                    'label' => __( 'Content Hover color', 'wpinsurance' ),
                    'type' => Controls_Manager::COLOR,
                    'default' => '#555',
                    'selectors' => [
                        '{{WRAPPER}} .single-service-box:hover p' => 'color: {{VALUE}};',
                    ],
                    'condition' => [
                        'iagent_layout_style' => 'style1',
                    ]                    
                ]
            );
            $this->add_control(
                'item_icon_heading_hover',
                [
                    'label' => __( 'Icon Hover Style', 'wpinsurance' ),
                    'type' => Controls_Manager::HEADING,
                ]
            );
            $this->add_control(
                'item_icon_color_hover',
                [
                    'label' => __( 'Icon Hover color', 'wpinsurance' ),
                    'type' => Controls_Manager::COLOR,
                    'default' => '#333',
                    'selectors' => [
                        '{{WRAPPER}} .single-service-box:hover .wp-insurance-image i' => 'color: {{VALUE}};',
                    ],
                    'condition' => [
                        'iagent_layout_style' => 'style1',
                    ]                    
                ]
            );
            $this->add_control(
                'item_icon_ttile_hover',
                [
                    'label' => __( 'Icon Box Title', 'wpinsurance' ),
                    'type' => Controls_Manager::COLOR,
                    'default' => '#6cad19',
                    'selectors' => [
                        '{{WRAPPER}} .wpinsurance-service_st2-category:hover span, {{WRAPPER}} .wpinsurance-service_st2-category.slick-current span' => 'color: {{VALUE}};',
                    ],
                    'condition' => [
                        'iagent_layout_style' => 'style2',
                    ]                    
                ]
            );
            $this->add_control(
                'item_icon_border_hover',
                [
                    'label' => __( 'Icon Box Hover Border', 'wpinsurance' ),
                    'type' => Controls_Manager::COLOR,
                    'default' => '#6cad19',
                    'selectors' => [
                        '{{WRAPPER}} .wpinsurance-service_st2-category:hover .wpinsurance-icn_box,{{WRAPPER}} .wpinsurance-service_st2-category.slick-current .wpinsurance-icn_box' => 'border-color: {{VALUE}};',
                    ],
                    'condition' => [
                        'iagent_layout_style' => 'style2',
                    ]                    
                ]
            );
            $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();

        $this->start_controls_section(
            'item_video_pop_style',
            [
                'label' => __( 'Video Popup Style', 'wpinsurance' ),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                        'iagent_layout_style' => 'style2',
                    ]  
            ]
        );
            $this->add_control(
                'item_video_popupheading',
                [
                    'label' => __( 'Video Popup Style', 'wpinsurance' ),
                    'type' => Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            ); 

            $this->add_responsive_control(
                'video_popup_height',
                [
                    'label' => __( 'Video Height', 'wpinsurance' ),
                    'type' => Controls_Manager::NUMBER,
                    'min' => 0,
                    'max' => 2000,
                    'step' => 1,
                    'default' =>485,
                    'selectors' => [
                        '{{WRAPPER}} .wpinsurence_service_video_popup' => 'height: {{VALUE}}px;',
                    ],
                ]
            );
            $this->add_control(
                'video_overlay_color',
                [
                    'label' => __( 'Video Overlay Color', 'wpinsurance' ),
                    'type' => Controls_Manager::COLOR,
                    'default'=>'rgba(0,0,0,0.0)',
                    'selectors' => [
                        '{{WRAPPER}} .wpinsurence_service_video_popup::before' => 'background: {{VALUE}};',
                    ],
                ]
            );

            $this->add_control(
                'play_icon_color',
                [
                    'label' => __( 'Play Icon Color', 'wpinsurance' ),
                    'type' => Controls_Manager::COLOR,
                    'default' => '#fff',
                    'selectors' => [
                        '{{WRAPPER}} .wpinsurance_popup-youtube' => 'color: {{VALUE}};',
                    ],
                ]
            );
            $this->add_control(
                'play_icon_color_hover',
                [
                    'label' => __( 'Play Icon Hover Color', 'wpinsurance' ),
                    'type' => Controls_Manager::COLOR,
                    'default' => '#6cad19',
                    'selectors' => [
                        '{{WRAPPER}} .wpinsurance_popup-youtube:hover' => 'color: {{VALUE}};',
                    ],
                ]
            );
        $this->end_controls_section();


        $this->start_controls_section(
            'item_box_style',
            [
                'label' => __( 'Box Style', 'wpinsurance' ),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                        'iagent_layout_style' => 'style1',
                    ]                
            ]
        );
        $this->start_controls_tabs(
                'wpinsurance_item_box_style'
            );
                $this->start_controls_tab(
                    'item_box_style_normal_tab',
                    [
                        'label' => __( 'Normal', 'wpinsurance' ),
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
                    'default'=>'rgba(255,255,255,0)',
                    'selectors' => [
                        '{{WRAPPER}} .single-service-box' => 'background: {{VALUE}};',
                    ],
                ]
            );
            $this->add_responsive_control(
                'box_alignment',
                [
                    'label' => __( 'Content Alignment', 'wpinsurance' ),
                    'type' => Controls_Manager::CHOOSE,
                    'options' => [
                        'left' => [
                            'title' => __( 'Left', 'wpinsurance' ),
                            'icon' => 'fa fa-align-left',
                        ],
                        'center' => [
                            'title' => __( 'Center', 'wpinsurance' ),
                            'icon' => 'fa fa-align-center',
                        ],
                        'right' => [
                            'title' => __( 'Right', 'wpinsurance' ),
                            'icon' => 'fa fa-align-right',
                        ],
                    ],
                    'default' => 'Left',
                    'selectors' => [
                        '{{WRAPPER}} .single-service-box' => 'text-align: {{VALUE}};',
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
                        '{{WRAPPER}} .single-service-box' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                        '{{WRAPPER}} .single-service-box' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_control(
                'box_border_radious',
                [
                    'label' => __( 'Box Border Radius', 'wpinsurance' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%' ],
                    'selectors' => [
                        '{{WRAPPER}} .single-service-box' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Border::get_type(),
                [
                    'name' => 'box_border_single',
                    'label' => __( 'Box Border', 'wpinsurance' ),
                    'selector' => '{{WRAPPER}} .single-service-box',
                ]
            ); 
            $this->add_control(
                'content_box_haeading',
                [
                    'label' => __( 'Content Box Style', 'wpinsurance' ),
                    'type' => Controls_Manager::HEADING,
                ]
            );
            $this->add_responsive_control(
                'content_box_margin',
                [
                    'label' => __( 'Content Box Margin', 'wpinsurance' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .single-service-box .media-body' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_responsive_control(
                'content_box_padding',
                [
                    'label' => __( 'Content Box Padding', 'wpinsurance' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .single-service-box .media-body' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->end_controls_tab();

            $this->start_controls_tab(
                    'item_box_style_hover_tab',
                    [
                        'label' => __( 'Hover', 'wpinsurance' ),
                    ]
                );
                $this->add_control(
                    'box_overlay_hover_color',
                    [
                        'label' => __( 'Overlay Hover  BG Color', 'wpinsurance' ),
                        'type' => Controls_Manager::COLOR,
                        'default'=>'rgba(255,255,255,0)',
                        'selectors' => [
                            '{{WRAPPER}} .single-service-box:hover' => 'background: {{VALUE}};',
                        ],
                    ]
                );
                $this->add_group_control(
                    Group_Control_Border::get_type(),
                    [
                        'name' => 'box_border_single_hover',
                        'label' => __( 'Box Border Hover', 'wpinsurance' ),
                        'selector' => '{{WRAPPER}} .single-service-box:hover',
                    ]
                ); 
            $this->end_controls_tab();
            $this->end_controls_tabs();

        $this->end_controls_section();

        // Our Services Button Style
        $this->start_controls_section(
            'ourservices_button_style',
            [
                'label' => __( 'Button Style', 'wpinsurance' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'ourservices_button_color',
            [
                'label' => __( 'Color', 'wpinsurance' ),
                'type' => Controls_Manager::COLOR,
                'default' =>'#fff',
                'selectors' => [
                    '{{WRAPPER}} .single-service-box .servbtn,{{WRAPPER}} .wpinsurance-service_st2-readmore > a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'ourservices_button_color_hvr',
            [
                'label' => __( 'Color Hover', 'wpinsurance' ),
                'type' => Controls_Manager::COLOR,
                'default' =>'#fff',
                'selectors' => [
                    '{{WRAPPER}} .single-service-box .servbtn:hover,{{WRAPPER}} .wpinsurance-service_st2-readmore > a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'ourservices_button__typography',
                'selector' => '{{WRAPPER}} .single-service-box .servbtn,{{WRAPPER}} .wpinsurance-service_st2-readmore > a',
            ]
        );

        $this->add_control(
            'ourservices_button_bg_color',
            [
                'label' => __( 'BG Color', 'wpinsurance' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single-service-box .servbtn,{{WRAPPER}} .wpinsurance-service_st2-readmore > a' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'ourservices_button_bg_color_hover',
            [
                'label' => __( 'BG Color Hover', 'wpinsurance' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single-service-box .servbtn:hover,{{WRAPPER}} .wpinsurance-service_st2-readmore > a:hover' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'ourservices_button_border_radius',
            [
                'label' => __( 'Border Radius', 'wpinsurance' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .single-service-box .servbtn,{{WRAPPER}} .wpinsurance-service_st2-readmore > a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],

            ]
        );

        $this->add_control(
            'ourservices_button_border_radius_hover',
            [
                'label' => __( 'Border Radius Hover', 'wpinsurance' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .single-service-box .servbtn:hover,{{WRAPPER}} .wpinsurance-service_st2-readmore > a:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],

            ]
        );

        $this->add_responsive_control(
            'ourservices_button__margin',
            [
                'label' => __( 'Margin', 'wpinsurance' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .single-service-box .servbtn,{{WRAPPER}} .wpinsurance-service_st2-readmore > a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'ourservices_button__padding',
            [
                'label' => __( 'Padding', 'wpinsurance' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .single-service-box .servbtn,{{WRAPPER}} .wpinsurance-service_st2-readmore > a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    'condition' => [
                        'caselarrows' => 'yes',
                        'iagent_layout' => 'carosul',
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
                                '{{WRAPPER}} .service-active .slick-arrow,{{WRAPPER}} .slider-nav-video-item .slick-arrow' => 'color: {{VALUE}};',
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
                                '{{WRAPPER}} .service-active .slick-arrow,{{WRAPPER}} .slider-nav-video-item .slick-arrow' => 'background: {{VALUE}};',
                            ],
                        ]
                    );
                    $this->add_group_control(
                        Group_Control_Border::get_type(),
                        [
                            'name' => 'arrwo_border',
                            'label' => __( 'Border', 'wpinsurance' ),
                            'selector' => '{{WRAPPER}} .service-active .slick-arrow,{{WRAPPER}} .slider-nav-video-item .slick-arrow',
                        ]
                    ); 
                    $this->add_control(
                        'carousel_nav_border_radius',
                        [
                            'label' => __( 'Border Radius', 'wpinsurance' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%' ],
                            'selectors' => [
                                '{{WRAPPER}} .service-active .slick-arrow,{{WRAPPER}} .slider-nav-video-item .slick-arrow' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                                '{{WRAPPER}} .service-active .slick-arrow,{{WRAPPER}} .slider-nav-video-item .slick-arrow' => 'width: {{VALUE}}px;',
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
                                '{{WRAPPER}} .service-active .slick-arrow,{{WRAPPER}} .slider-nav-video-item .slick-arrow' => 'height: {{VALUE}}px;',
                            ],
                        ]
                    );

                    $this->add_group_control(
                        Group_Control_Typography::get_type(),
                        [
                            'name' => 'carousel_nav_typography',
                            'selector' => '{{WRAPPER}} .service-active .slick-arrow,{{WRAPPER}} .slider-nav-video-item .slick-arrow',
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
                                '{{WRAPPER}} .indicator-style-two.service-active .slick-arrow' => 'top: {{VALUE}}px;',
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
                            'default' =>'#e2a750',
                            'selectors' => [
                                '{{WRAPPER}} .service-active .slick-arrow:hover,{{WRAPPER}} .slider-nav-video-item .slick-arrow:hover' => 'color: {{VALUE}};',
                            ],
                        ]
                    );
                    $this->add_control(
                        'carousel_nav_bg_color_hover',
                        [
                            'label' => __( 'BG COlor', 'wpinsurance' ),
                            'type' => Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .service-active .slick-arrow:hover,{{WRAPPER}} .slider-nav-video-item .slick-arrow:hover' => 'background: {{VALUE}};',
                            ],
                        ]
                    );
                    $this->add_group_control(
                        Group_Control_Border::get_type(),
                        [
                            'name' => 'arrwo_border_hover',
                            'label' => __( 'Border', 'wpinsurance' ),
                            'selector' => '{{WRAPPER}} .service-active .slick-arrow:hover,{{WRAPPER}} .slider-nav-video-item .slick-arrow:hover',
                        ]
                    ); 
                    $this->add_control(
                        'carousel_nav_border_radius_hover',
                        [
                            'label' => __( 'Border Radius', 'wpinsurance' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%' ],
                            'selectors' => [
                                '{{WRAPPER}} .service-active .slick-arrow:hover,{{WRAPPER}} .slider-nav-video-item .slick-arrow:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],

                        ]
                    );
                $this->end_controls_tab();
            $this->end_controls_tabs();                
        $this->end_controls_section();

    }

    protected function render( $instance = [] ) {

        $settings = $this->get_settings_for_display();

        $iagent_layout = $settings['iagent_layout'];
        $iagent_layout_style = $settings['iagent_layout_style'];
        $caselautoplay = $settings['caselautoplay'];
        $caselarrows = $settings['caselarrows'];
        $caselautoplayspeed = $settings['caselautoplayspeed'];
        $showitem = $settings['showitem'];
        $showitemtablet = $settings['showitemtablet'];
        $showitemmobile = $settings['showitemmobile'];
        $title_link_show = $settings['title_link_show'];
        $columns = $this->get_settings_for_display('grid_column_number');
        $arrow_icon_prev        = $this->get_settings_for_display('arrow_icon_prev');
        $arrow_icon_next        = $this->get_settings_for_display('arrow_icon_next');
        $item_order        = $this->get_settings_for_display('item_order');
        $slarrowsstyle = $settings['slarrowsstyle'];
        $get_item_categories = $settings['wpinsurance_categories'];
        $read_more_btn_show_hide = $settings['read_more_btn_show_hide'];

        $per_page       = ! empty( $settings['post_per_page'] ) ? $settings['post_per_page'] : 6;
        $titlelength    = ! empty( $settings['title_length'] ) ? $settings['title_length'] : 2;
        $contetnlength  = ! empty( $settings['content_length'] ) ? $settings['content_length'] : 20;
        $btntext        = ! empty( $settings['read_more_btn_txt'] ) ? $settings['read_more_btn_txt'] : '';
        $sectionid =  $this-> get_id();
        $sectionid  = 'sid'.$sectionid; 

        $playiconty      = $this->get_settings_for_display('playiconty');
        $playicon        = $this->get_settings_for_display('playicon');
        $iconiamge  =   ( isset( $settings['iconiamge']['url'])  && !empty($settings['iconiamge'] ) ? $settings['iconiamge']['url'] : '');



        $collumval = 'col-lg-3 col-sm-6';
        if( $columns !='' ){
            $colwidth = round(12/$columns);
            $collumval = 'col-lg-'.$colwidth.' col-sm-6';
        }

        ?>
            <?php if( $iagent_layout_style =='style1'){ ?>
            <div class="our-services-area">
                <div class="<?php if($iagent_layout == 'carosul'){ echo 'service-active '.$sectionid; if($slarrowsstyle==2){ echo ' indicator-style-two';} } else echo 'row'; ?>">
                    <?php
                    $item_cates = str_replace(' ', '', $get_item_categories);
                        $htsargs = array(
                            'post_type'            => 'wpinsurance',
                            'posts_per_page'       => $per_page, 
                            'ignore_sticky_posts'  => 1,
                            'order'                => $item_order,
                        );

                        if ( "0" != $get_item_categories) {
                            if( is_array($item_cates) && count($item_cates) > 0 ){
                                $field_name = is_numeric($item_cates[0])?'term_id':'slug';
                                $htsargs['tax_query'] = array(
                                    array(
                                        'taxonomy' => 'wpinsurance_category',
                                        'terms' => $item_cates,
                                        'field' => $field_name,
                                        'include_children' => false
                                    )
                                );
                            }
                        }
                        $htspost = new \WP_Query($htsargs);
                        // echo '<pre>';
                        // var_dump($htspost);
                        while($htspost->have_posts()):$htspost->the_post();
                        $short_des = get_post_meta( get_the_ID(),'_wpinsurance_service_short_des', true ); 
                        $service_icon = get_post_meta( get_the_ID(),'_wpinsurance_service_icon', true ); 
                    ?>
                    <!-- Single Item --> 
                    <?php if($iagent_layout == 'grid') { echo '<div class="'.$collumval.'">'; } ?>
                    <div class="single-service-box">
                        <div class="media-image">
                            <?php the_post_thumbnail('wpinsurance_img550x348');?>
                        </div>
                        <div class="media-body">
                            <h1 class="heading"> <?php if( $title_link_show == 'yes' ){?>
                                <a href="<?php the_permalink(); ?>">
                                    <?php echo wp_trim_words( get_the_title(), $titlelength, '' );?>
                                </a>
                            <?php } else{ echo wp_trim_words( get_the_title(), $titlelength, '' );}?>
                            </h1>
                            <div class="excerpt">
                                <?php echo '<p>'.wp_trim_words( $short_des, $contetnlength, '' ).'</p>';?>
                            </div>
                            <?php if( $read_more_btn_show_hide == 'yes' && !empty($btntext)){ ?>
                                <a class="servbtn" href="<?php the_permalink(); ?>"><?php echo $btntext; ?></a>
                                            <?php } ?>
                        </div>
                    </div>
                    <!-- Single Item -->

                    <?php if($iagent_layout == 'grid'){echo '</div> ';}?>
                <?php endwhile; ?>
                </div>
            </div>
            <?php } else{ ?>
            <!-- Mission New Style Start -->
            <div class="service_st2_new_style">
                <div class="slider wpinsurance_service_st2_slider_nav service-active <?php if($slarrowsstyle==2){ echo ' indicator-style-two ';}else{echo ' indicator1 ';}   echo $sectionid;?>">
                <?php
                 $item_cates = str_replace(' ', '', $get_item_categories);
                    $htsargs = array(
                        'post_type'            => 'wpinsurance',
                        'posts_per_page'       => $per_page, 
                        'ignore_sticky_posts'  => 1,
                        'order'                => $item_order,
                    );

                    if ( "0" != $get_item_categories) {
                        if( is_array($item_cates) && count($item_cates) > 0 ){
                            $field_name = is_numeric($item_cates[0])?'term_id':'slug';
                            $htsargs['tax_query'] = array(
                                array(
                                    'taxonomy' => 'wpinsurance_category',
                                    'terms' => $item_cates,
                                    'field' => $field_name,
                                    'include_children' => false
                                )
                            );
                        }
                    }
                    $htspost = new \WP_Query($htsargs);
                    while($htspost->have_posts()):$htspost->the_post();

                        $wpinsurance_service_icon  = get_post_meta( get_the_ID(),'_wpinsurance_service_icon', true ); 
                          ?>

                        <div class="wpinsurance-service_st2-category">
                            <div class="wpinsurance-icn_box">
                            <?php if( !empty($wpinsurance_service_icon)){ ?>
                                <img src="<?php  echo esc_url( $wpinsurance_service_icon); ?>" alt="<?php esc_attr( the_title()); ?>">  
                            <?php } ?>
                             </div>
                            <span><?php the_title(); ?></span>
                        </div>

                    <?php endwhile; ?>
                </div>


                <div class="slider wpinsurance_service_st2_slider_for <?php echo $sectionid;?>">
                <?php
                 $item_cates = str_replace(' ', '', $get_item_categories);
                    $htsargs = array(
                        'post_type'            => 'wpinsurance',
                        'posts_per_page'       => $per_page, 
                        'ignore_sticky_posts'  => 1,
                        'order'                => $item_order,
                    );

                    if ( "0" != $get_item_categories) {
                        if( is_array($item_cates) && count($item_cates) > 0 ){
                            $field_name = is_numeric($item_cates[0])?'term_id':'slug';
                            $htsargs['tax_query'] = array(
                                array(
                                    'taxonomy' => 'wpinsurance_category',
                                    'terms' => $item_cates,
                                    'field' => $field_name,
                                    'include_children' => false
                                )
                            );
                        }
                    }
                    $htspost = new \WP_Query($htsargs);
                    while($htspost->have_posts()):$htspost->the_post();
                    $terms = get_the_terms(get_the_id(),'wpinsurance_category');

                    $short_des = get_post_meta( get_the_ID(),'_wpinsurance_service_short_des', true ); 
                    $des_title = get_post_meta( get_the_ID(),'_wpinsurance_des_title', true ); 
 

                    $wpinsurance_service_st2_video  = get_post_meta( get_the_ID(),'_wpinsurance_service_st2_video', true ); 
                     $wpinsurance_service_st2_video_thumbnail  = get_post_meta( get_the_ID(),'_wpinsurance_service_st2_video_thumbnail', true );  

                          ?> 
                        <div class="wpinsurance-service_st2-item">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="wpinsurance-service_st2-content">
                                    <?php if( !empty($des_title) ){ ?>
                                    <h2>
                                        <?php if( $title_link_show == 'yes' ){?>
                                        <a href="<?php the_permalink(); ?>">
                                            <?php echo wp_trim_words( $des_title, $titlelength , '' );?>
                                        </a>
                                            <?php } else{ echo wp_trim_words( $des_title, $titlelength , '' ); }?></h2>
                                          <?php } ?>

                                        <?php if( $short_des ){ ?>
                                            <?php echo '<p>'.$short_des.'</p>';?>
                                         <?php } ?>


                                        <div class="wpinsurance-service_st2-readmore">
                                        <?php if( $read_more_btn_show_hide == 'yes' && !empty($btntext)){ ?>
                                            <a class="service_st2-redmore" href="<?php the_permalink(); ?>"><?php echo $btntext; ?></a>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="wpinsurance-service_st2-video-content">
                                        <div class="wpinsurance-service_st2-video">
                                            <div class="wpinsurence_service_video_popup" style="background: rgba(0, 0, 0, 0) url(<?php echo $wpinsurance_service_st2_video_thumbnail; ?> ) no-repeat scroll;">
                                            <?php if ($settings['playicon']['value'] !='' || !empty($iconiamge)): ?>
                                                <div class="video-content wpinsurance">
                                                    <a href="<?php echo $wpinsurance_service_st2_video; ?>" class="wpinsurance_popup-youtube">
                                                    <?php
                                                        if( $playiconty == 2 && !empty( $iconiamge )){
                                                           ?>
                                                            <img src="<?php echo $iconiamge; ?>" alt="<?php echo esc_attr('wpinsurance'); ?>" />
                                                            <?php
                                                        }else{
                                                            \Elementor\Icons_Manager::render_icon( $settings['playicon'], [ 'aria-hidden' => 'true' ] );
                                                        }

                                                    ?>
                                                    </a>  

                                                </div>  
                                                <?php endif; ?>                  
                                            </div>  

                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    <?php endwhile; ?>
                </div>
                        
            </div>
            <?php  } ?>


            <script type="text/javascript">
                (function($){

                    var _arrows_set = <?php echo esc_js( $caselarrows ) == 'yes' ? 'true': 'false'; ?>;
                    var _autoplay_set = <?php echo esc_js( $caselautoplay ) == 'yes' ? 'true': 'false'; ?>;
                    var _autoplay_speed = <?php if( isset($caselautoplayspeed) ){ echo esc_js($caselautoplayspeed); }else{ echo esc_js(5000); }; ?>;
                    var _showitem_set = <?php if( isset($showitem) ){ echo esc_js($showitem); }else{ echo esc_js(3); }; ?>;
                    var _showitemtablet_set = <?php if( isset($showitemtablet) ){ echo esc_js($showitemtablet); }else{ echo esc_js(2); }; ?>;
                    var _showitemmobile_set = <?php if( isset($showitemmobile) ){ echo esc_js($showitemmobile); }else{ echo esc_js(2); }; ?>;
                    var _itemmarginset = <?php if( isset($itemmargin) ){ echo esc_js($itemmargin); }else{ echo esc_js(30); }; ?>;
                     <?php if( $iagent_layout_style =='style1'){ ?>
                    $('.service-active.<?php echo $sectionid;?>').slick({
                        slidesToShow: _showitem_set,
                        arrows:_arrows_set,
                        dots: false,
                        autoplay: _autoplay_set,
                        autoplaySpeed: _autoplay_speed,
                        loop:true,
                        prevArrow: '<div class="btn-prev"><?php \Elementor\Icons_Manager::render_icon( $settings['arrow_icon_prev'], [ 'aria-hidden' => 'true' ] );?></div>',
                        nextArrow: '<div><?php \Elementor\Icons_Manager::render_icon( $settings['arrow_icon_next'], [ 'aria-hidden' => 'true' ] );?></div>',
                        responsive: [
                                {
                                  breakpoint: 768,
                                  settings: {
                                    slidesToShow: _showitemtablet_set
                                  }
                                },
                                {
                                  breakpoint: 575,
                                  settings: {
                                    slidesToShow: _showitemmobile_set
                                  }
                                }
                              ]
                        });
                    
                        <?php }else{ ?>

            $('.wpinsurance_service_st2_slider_for.<?php echo $sectionid;?>').slick({
              slidesToShow: 1,
              slidesToScroll: 1,
              arrows: false,
              fade: true,
               adaptiveHeight: true,
              asNavFor: '.wpinsurance_service_st2_slider_nav'
            });
            $('.wpinsurance_service_st2_slider_nav.<?php echo $sectionid;?>').slick({
              slidesToShow: _showitem_set,
              slidesToScroll: 1,
              asNavFor: '.wpinsurance_service_st2_slider_for.<?php echo $sectionid;?>',
              dots: false,
              arrows:_arrows_set,
              autoplay: _autoplay_set,
              autoplaySpeed: _autoplay_speed,
              centerPadding:0,
              vertical: false,
              centerMode: false,
              focusOnSelect: true,
              focusOnSelect: true,
              adaptiveHeight: true,
              loop:true,
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
                                    slidesToShow: 1
                                  }
                                }
                              ]
            });

    <?php } ?>

                })(jQuery);

            </script>

        <?php

        wp_reset_query(); wp_reset_postdata();

    }

}

wpinsurance_widget_register_manager( new WPInsurance_Elementor_Widget_Service() );