<?php
namespace Elementor;


if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class WPInsurers_Elementor_Widget_Section_Title extends Widget_Base {

    public function get_name() {
        return 'section-title-addons';
    }
    
    public function get_title() {
        return __( 'Insurance: Section Title', 'wpinsurance' );
    }

    public function get_icon() {
        return 'eicon-site-title';
    }
    public function get_categories() {
        return [ 'wpinsurance' ];
    }

    protected function register_controls() {

        $this->start_controls_section(
            'section_title_txt',
            [
                'label' => esc_html__( 'Section Title', 'wpinsurance' ),
            ]
        );
        
            $this->add_control(
                'titlestyle',
                [
                    'label' => esc_html__( 'Title Style', 'wpinsurance' ),
                    'type' => Controls_Manager::SELECT,
                    'default' => '1',
                    'options' => [
                        '1' => esc_html__( 'Style One', 'wpinsurance' ),
                        '2' => esc_html__( 'Style Two', 'wpinsurance' ),
                        '3' => esc_html__( 'Style Three', 'wpinsurance' ),
                        '4' => esc_html__( 'Style Four', 'wpinsurance' ),
                    ],
                ]
            );

            $this->add_control(
                'section_title_text',
                [
                    'label' => __( 'Title', 'wpinsurance' ),
                    'type' => Controls_Manager::TEXT,
                    'default' => 'Here Your Title',
                    'title' => __( 'Enter section title', 'wpinsurance' ),
                ]
            );
            
            $this->add_control(
                'section_subtitle_text',
                [
                    'label' => __( 'Sub Title', 'wpinsurance' ),
                    'type' => Controls_Manager::TEXTAREA,
                    'default' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod.',
                    'title' => __( 'Enter sub title', 'wpinsurance' ),
                ]
            );
            $this->add_control(
                'section_show_border',
                [
                    'label' => esc_html__( 'Show/Hide Border', 'wpinsurance' ),
                    'type' => Controls_Manager::SWITCHER,
                    'return_value' => 'yes',
                    'default' => 'yes',
                ]
            );
        $this->end_controls_section();

        // Style tab section
        $this->start_controls_section(
            'section_area_style',
            [
                'label' => __( 'Section style', 'wpinsurance' ),
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
                        '{{WRAPPER}} .section-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                        '{{WRAPPER}} .section-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
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
                    'default' => 'center',
                    'selectors' => [
                        '{{WRAPPER}} .section-title' => 'text-align: {{VALUE}};',
                    ],
                ]
            );

        $this->end_controls_section();

        // Style tab tite section
        $this->start_controls_section(
            'section_title_style',
            [
                'label' => __( 'Title style', 'wpinsurance' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

            $this->add_control(
                'sectitle-heading',
                [
                    'label' => __( 'Title', 'wpinsurance' ),
                    'type' => Controls_Manager::HEADING,
                ]
            );

            $this->add_control(
                'title_color',
                [
                    'label' => __( 'Color', 'wpinsurance' ),
                    'type' => Controls_Manager::COLOR,
                    'default' => '#525252',
                    'selectors' => [
                        '{{WRAPPER}} .section-title h1,{{WRAPPER}} h4.section-title-txt' => 'color: {{VALUE}};',
                        '{{WRAPPER}} h4.section-title-txt:before' => 'border-color: {{VALUE}};',
                    ],
                ]
            );
            $this->add_control(
                'title_color_span',
                [
                    'label' => __( 'title Span Color', 'wpinsurance' ),
                    'type' => Controls_Manager::COLOR,
                    'default' => '#6cad19',
                    'selectors' => [
                        '{{WRAPPER}} .section-title h1 > span' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'titletypography',
                    'selector' => '{{WRAPPER}} .section-title h1,{{WRAPPER}} h4.section-title-txt',
                ]
            );

            $this->add_responsive_control(
                'titlenmargin',
                [
                    'label' => __( 'Margin', 'wpinsurance' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .section-title h1,{{WRAPPER}} h4.section-title-txt' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                        '{{WRAPPER}} .section-title h1' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

        $this->end_controls_section();

        // Style tab sub title section
        $this->start_controls_section(
            'section_subtitle_style',
            [
                'label' => __( 'Sub title style', 'wpinsurance' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
            $this->add_control(
                'subtitle-heading',
                [
                    'label' => __( 'Sub Title', 'wpinsurance' ),
                    'type' => Controls_Manager::HEADING,
                ]
            );

            $this->add_control(
                'subtitle_color',
                [
                    'label' => __( 'Color', 'wpinsurance' ),
                    'type' => Controls_Manager::COLOR,
                    'default' => '#525252',
                    'selectors' => [
                        '{{WRAPPER}} .section-title p' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'subtitletypography',
                    'selector' => '{{WRAPPER}} .section-title p',
                ]
            );

            $this->add_responsive_control(
                'subtitlemargin',
                [
                    'label' => __( 'Margin', 'wpinsurance' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .section-title p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_responsive_control(
                'subtitlepadding',
                [
                    'label' => __( 'Padding', 'wpinsurance' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .section-title p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            
        $this->end_controls_section();

        // Devider Style
        $this->start_controls_section(
            'section_devider_style',
            [
                'label' => __( 'Devider Style', 'wpinsurance' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
            $this->add_control(
                'section_devider_heading',
                [
                    'label' => __( 'Sub Title', 'wpinsurance' ),
                    'type' => Controls_Manager::HEADING,
                ]
            );

            $this->add_group_control(
                Group_Control_Border::get_type(),
                [
                    'name' => 'border',
                    'label' => __( 'Border', 'wpinsurance' ),
                    'selector' => '{{WRAPPER}} .section-title span',
                ]
            ); 

            $this->add_responsive_control(
                'section_devider_width',
                [
                    'label' => __( 'Width', 'wpinsurance' ),
                    'type' => Controls_Manager::NUMBER,
                    'selectors' => [
                        '{{WRAPPER}} .section-title span' => 'width: {{VALUE}}px;',
                    ],
                ]
            );
            $this->add_responsive_control(
                'section_devider_height',
                [
                    'label' => __( 'Height', 'wpinsurance' ),
                    'type' => Controls_Manager::NUMBER,
                    'selectors' => [
                        '{{WRAPPER}} .section-title span' => 'height: {{VALUE}}px;',
                    ],
                ]
            );

            $this->add_responsive_control(
                'section_devider_margin',
                [
                    'label' => __( 'Margin', 'wpinsurance' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .section-title span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_responsive_control(
                'section_devider_padding',
                [
                    'label' => __( 'Padding', 'wpinsurance' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .section-title span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            
        $this->end_controls_section();

    }

    protected function render( $instance = [] ) {

        $settings   = $this->get_settings_for_display();

        $titlestyle = $this->get_settings_for_display('titlestyle');
        $section_show_border = $this->get_settings_for_display('section_show_border');

        $title      = ! empty( $settings['section_title_text'] ) ? $settings['section_title_text'] : '';
        $subtitle   = ! empty( $settings['section_subtitle_text'] ) ? $settings['section_subtitle_text'] : '';
        ?>
            <div class="section-title <?php if( $titlestyle == 2){ echo 'title-style-two'; }elseif($titlestyle == 3){echo 'title-style-three'; }else{echo 'default-style'; }?>">
                <?php
                    if( $titlestyle == 3){
                        if(!empty($title)){
                            echo '<h1 class="section-title-txt">'. $title.'</h1>';
                        }
                    }elseif( $titlestyle == 4){

                         if(!empty($title)){
                            echo '<h4 class="section-title-txt">'.$title.'</h4>';
                        }


                    }else{
                        if(!empty($title)){
                            echo '<h1 class="section-title-txt">'.$title.'</h1>';
                        }
                    }
                    if( !empty($subtitle) ){
                        echo '<p>'.$subtitle.'</p>';
                       
                    }
                    if( $section_show_border == 'yes' ){
                         echo '<span>&nbsp;</span>';
                    }
                    
                ?>
            </div>
        <?php

    }


}

wpinsurance_widget_register_manager( new WPInsurers_Elementor_Widget_Section_Title() );