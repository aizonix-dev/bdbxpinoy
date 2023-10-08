<?php
use Elementor\Repeater;
use Elementor\Core\Schemes\Typography;
use Elementor\Utils;
use Elementor\Control_Media;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Background;

defined( 'ABSPATH' ) || die();

class RTS_Topbar_Icon_List_Widget extends \Elementor\Widget_Base {

    /**
     * Get widget name.
     *
     * Retrieve rsgallery widget name.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget name.
     */

    public function get_name() {
        return 'topbar-icon-list';
    }   


    /**
     * Get widget title.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title() {
        return esc_html__( 'RT Icon list', 'rsaddon' );
    }

    /**
     * Get widget icon.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget icon.
     */
    public function get_icon() {
        return 'glyph-icon flaticon-price';
    }


    public function get_categories() {
        return [ 'header_footer_rts' ];
    }

    public function get_keywords() {
        return [ 'list', 'title', 'features', 'heading', 'plan' ];
    }

	protected function register_controls() {
		$this->start_controls_section(
			'_section_header',
			[
				'label' => esc_html__( 'Content', 'rtelements' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);     

        $this->add_control(
            'field_type',
            [
                'label'        => __( 'Field Type', 'rtelements'),
                'type'         => Controls_Manager::SELECT,
                'default'      => 'default',
                'options'      => [
                    'default' => __( 'Default Icon box', 'rtelements'),
                    'mail'      => __( 'Mail Field', 'rtelements'),
                    'phone'      => __( 'Phone Field', 'rtelements'),
                   
                ],               
            ]
        );

        
        $this->add_control(
            'sub-text',
            [
                'label' => esc_html__( 'Sub Title', 'rsaddon' ),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__( 'Phone Number', 'rsaddon' ),
            ]
        );

        $this->add_control(
            'text',
            [
                'label' => esc_html__( 'Title', 'rsaddon' ),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__( '', 'rsaddon' ),
            ]
        );
        
        $this->add_control(
            'message',
            [
                'label' => esc_html__( 'Message', 'rsaddon' ),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__( '', 'rsaddon' ),
                'condition' =>[
                    'field_type' => [ 'mail' ]
                ]
            ]
        );

        $this->add_control(
            'icon_type',
            [
                'label'        => __( 'Icon Type', 'rtelements'),
                'type'         => Controls_Manager::SELECT,
                'default'      => 'default',
                'options'      => [
                    'default' => __( 'Default Icon', 'rtelements'),
                    'theme'      => __( 'Theme Icon', 'rtelements'),                   
                   
                ],               
            ]
        );

        $this->add_control(
            'icon',
            [
                'label' => esc_html__( 'Icon', 'rsaddon' ),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-star',
                    'library' => 'solid',
                ],   
                
                'condition' =>[
                    'icon_type' =>  'default'
                ]
                
            ]
        );

        $this->add_control(
			'theme_icon',
			[
				'label' => esc_html__( 'Icon', 'rsaddon' ),
				'type' => Controls_Manager::SELECT2,
				'options' => rts_custom_get_icons(),				
				'default' => 'rt-angle-right',
				'separator' => 'before',
                'condition' =>[
                    'icon_type' =>  'theme'
                ]			
			]
		);

        

       
        $this->end_controls_section();


           
        $this->start_controls_section(
            '_section_style_text',
            [
                'label' => esc_html__( 'Text', 'rsaddon' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'more_options',
            [
                'label' => esc_html__( 'Sub Title', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        
        $this->add_control(
            'text_color',
            [
                'label' => esc_html__( 'Sub Title Color', 'rsaddon' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .rt-features-list-content ul li .sub-text' => 'color: {{VALUE}};',
                ],
            ]
        );

        

         $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'text_typography',
                'selector' => '{{WRAPPER}} .rt-features-list-content ul li .sub-text',
                'scheme' => Elementor\Core\Schemes\Typography::TYPOGRAPHY_1,
            ]
        );  

        $this->add_control(
			'padding-sub',
			[
				'label' => esc_html__( 'Sub title padding', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .rt-features-list-content ul li .sub-text' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

        $this->add_control(
            'more_options_title',
            [
                'label' => esc_html__( 'Title', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        
        $this->add_control(
            'title_text_color',
            [
                'label' => esc_html__( 'Title Color', 'rsaddon' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .rt-features-list-content ul li .text-heading' => 'color: {{VALUE}};',
                ],
            ]
        ); 

        $this->add_control(
            'title_hover_color',
            [
                'label' => esc_html__( 'Title Hover Color', 'rsaddon' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .rt-features-list-content ul li .text-heading:hover' => 'color: {{VALUE}};',
                ],
                'condition' =>[
                    'field_type' => [ 'mail', 'phone', 'default' ]
                ]
            ]
        ); 

         $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_text_typography',
                'selector' => '{{WRAPPER}} .rt-features-list-content ul li .text-heading',
                'scheme' => Elementor\Core\Schemes\Typography::TYPOGRAPHY_1,
            ]
        );   
        
        $this->add_control(
			'show_separator',
			[
				'label' => esc_html__( 'Show Speator', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'your-plugin' ),
				'label_off' => esc_html__( 'Hide', 'your-plugin' ),
				'return_value' => 'yes',
				'default' => 'no',
			]
		);

        $this->add_control(
            'separator_color',
            [
                'label' => esc_html__( 'Separator Color', 'rsaddon' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .rt-features-list.separator_yes:after' => 'background: {{VALUE}};',
                   
                ],
            ]
        );    

        $this->add_control(
            'separtor_width',
            [
                'label' => esc_html__( 'Separator Height', 'rtelements' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 200,
						'step' => 5,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				
				'selectors' => [
					'{{WRAPPER}} .rt-features-list.separator_yes:after' => 'height: {{SIZE}}{{UNIT}}; height:{{SIZE}}{{UNIT}} ',
                  
				],
            ]
        );

        $this->add_control(
			'show_rotate',
			[
				'label' => esc_html__( 'Enable Skew', 'rtelements' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'your-plugin' ),
				'label_off' => esc_html__( 'Hide', 'your-plugin' ),
				'return_value' => 'yes',
				'default' => 'no',
			]
		);
        
        
        

        $this->add_control(
			'enable_hover_border',
			[
				'label' => esc_html__( 'Enable Hover Border', 'rtelements' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'your-plugin' ),
				'label_off' => esc_html__( 'Hide', 'your-plugin' ),
				'return_value' => 'yes',
				'default' => 'no',
			]
		);

        $this->add_control(
			'title_padding',
			[
				'label' => esc_html__( 'Title Padding', 'rtelements' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .rt-features-list-content ul li .text-heading' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

        $this->add_responsive_control(
            'alignment',
            [
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'label' => esc_html__( 'Alignment', 'rtelements' ),
                'options' => [
                    'left' => [
                        'title' => esc_html__( 'Left', 'rtelements' ),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__( 'Center', 'rtelements' ),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => esc_html__( 'Right', 'rtelements' ),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                 'selectors' => [
                    '{{WRAPPER}} .rt-features-list-content ul' => 'justify-content: {{VALUE}}',
                ],
                'default' => 'center',
            ]
        );


        $this->add_control(
            'message_heading',
            [
                'label' => esc_html__( 'Message', 'rsaddon' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
                'condition' =>[
                    'field_type' => [ 'mail' ]
                ]
            ]
        );
        
        $this->add_control(
            'message_color',
            [
                'label' => esc_html__( 'Color', 'rsaddon' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .rt-features-list-content ul li .message' => 'color: {{VALUE}};',
                ],
                'condition' =>[
                    'field_type' => [ 'mail' ]
                ]
            ]
        );

        
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'message_typography',
                'selector' => '{{WRAPPER}} .rt-features-list-content ul li .message',
                'scheme' => Elementor\Core\Schemes\Typography::TYPOGRAPHY_1,
                'condition' =>[
                    'field_type' => [ 'mail' ]
                ]
            ]
        );  

        $this->add_control(
			'message_padding',
			[
				'label' => esc_html__( 'Padding', 'rsaddon' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .rt-features-list-content ul li .message' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
                'condition' =>[
                    'field_type' => [ 'mail' ]
                ]
			]
		);        

        $this->add_control(
			'message_margin',
			[
				'label' => esc_html__( 'Margin', 'rsaddon' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .rt-features-list-content ul li .message' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
                'condition' =>[
                    'field_type' => [ 'mail' ]
                ]
			]
		); 

        $this->end_controls_section();       


        $this->start_controls_section(
            '_section_style_icon',
            [
                'label' => esc_html__( 'Icon', 'rsaddon' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'icon_color',
            [
                'label' => esc_html__( 'Color', 'rsaddon' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .rt-features-list-content ul li .icon i' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .rt-features-list-content ul li .icon svg path' => 'fill: {{VALUE}};',
                ],
            ]
        );
        
        $this->add_control(
            'icon_hover_color',
            [
                'label' => esc_html__( 'Hover Color', 'rsaddon' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .rt-features-list-content:hover ul li .icon i' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .rt-features-list-content:hover ul li .icon svg path' => 'fill: {{VALUE}};',
                ],
            ]
        );    
        
        $this->add_responsive_control(
            'icon_width',
            [
                'label' => esc_html__( 'Icon Size', 'rtelements' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 200,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				
				'selectors' => [
					'{{WRAPPER}} .rt-features-list .icon svg' => 'width: {{SIZE}}{{UNIT}}; height:{{SIZE}}{{UNIT}} ',
                    '{{WRAPPER}} .rt-features-list .icon i' => 'font-size: {{SIZE}}{{UNIT}};',
				],
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'icon_bg',
                'label' => esc_html__( 'Icon Background', 'rsaddon' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .rt-features-list-content ul li .icon i',
            ]
        );  
               
        $this->add_control(
            'icon_hover_bg',
            [
                'label' => esc_html__( 'Hover Background', 'rsaddon' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .rt-features-list-content:hover ul li .icon i' => 'background: {{VALUE}} !important;',
                ],
                'condition' =>[
                    'field_type' => [ 'default' ]
                ]
            ]
        );

        $this->add_responsive_control(
            'icon_box_width',
            [
                'label' => esc_html__( 'Icon Box Width', 'rtelements' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 200,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				
				'selectors' => [					
                    '{{WRAPPER}} .rt-features-list .icon i' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'icon_box_height',
            [
                'label' => esc_html__( 'Icon Box Height', 'rtelements' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 200,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				
				'selectors' => [                    
                    '{{WRAPPER}} .rt-features-list .icon i' => 'height: {{SIZE}}{{UNIT}};',                   
				],
            ]
        );
        $this->add_responsive_control(
            'icon_box_lineheight',
            [
                'label' => esc_html__( 'Icon Box With Size', 'rtelements' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 200,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				
				'selectors' => [					
                  
                    '{{WRAPPER}} .rt-features-list .icon i' => 'line-height: {{SIZE}}{{UNIT}};',
				],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'icon_typography',
                'selector' => '{{WRAPPER}} .rt-features-list-content ul li .icon',
                'scheme' => Elementor\Core\Schemes\Typography::TYPOGRAPHY_1,
            ]
        ); 

        $this->add_responsive_control(
            'icon_item_alignment',
            [
                'label' => esc_html__( 'Icon Alignment', 'rtelements' ),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => esc_html__( 'Left', 'rtelements' ),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__( 'Center', 'rtelements' ),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => esc_html__( 'Right', 'rtelements' ),
                        'icon' => 'eicon-text-align-right',
                    ],
             
                ],
                'toggle' => true,
                'selectors' => [
                    '{{WRAPPER}} .rt-features-list-content ul li .icon i' => 'text-align: {{VALUE}}',
                ],
                
            ]
        );
        
        $this->add_control(
			'padding-icon',
			[
				'label' => esc_html__( 'Icon area Padding', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .rt-features-list-content ul li .icon' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

        $this->add_control(
			'border-radius',
			[
				'label' => esc_html__( 'Icon area Border Radius', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .rt-features-list-content ul li .icon i' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'general_hover_box_shadow',
                'exclude' => [
                    'box_shadow_position',
                ],
                'selector' => '{{WRAPPER}} .rt-features-list-content ul li .icon i'
            ]
        );     
        
        $this->add_control(
            'icon_wrapper_style',
            [
                'label' => esc_html__( 'Icon Wrapper Styles', 'rsaddon' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'icon_wrap',
                'label' => esc_html__( 'Icon Wrapper Background', 'rsaddon' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .rt-features-list-content ul li .icon',
            ]
        );  

        $this->add_control(
			'icon_wrap_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'rsaddon' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .rt-features-list-content ul li .icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);


		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'icon_wrap_border',
				'selector' => '{{WRAPPER}} .rt-features-list-content ul li .icon',
			]
		);

        $this->add_control(
			'icon_wrap_padding',
			[
				'label' => esc_html__( 'Padding', 'rsaddon' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .rt-features-list-content ul li .icon' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
             
        $this->add_control(
			'icon_wrap_margin',
			[
				'label' => esc_html__( 'Margin', 'rsaddon' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .rt-features-list-content ul li .icon' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

        $this->end_controls_section();



        $this->start_controls_section(
            '_section_style_icon_box',
            [
                'label' => esc_html__( 'Box Style', 'rsaddon' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => '_box_bg_color',
                'label' => esc_html__( 'Background', 'rsaddon' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .rt-features-list-content',
            ]
        ); 

        $this->add_control(
            '_box_hover_bg_color',
            [
                'label' => esc_html__( 'Hover Background', 'rsaddon' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .rt-features-list-content:hover' => 'background: {{VALUE}};',
                ],
            ]
        ); 

        $this->add_control(
            'box_hover__subtitle_color',
            [
                'label' => esc_html__( 'Subtitle Hover Color', 'rsaddon' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .rt-features-list-content:hover ul li .sub-text' => 'color: {{VALUE}};',
                ],
            ]
        );

        
        $this->add_control(
            'box_hover__title_color',
            [
                'label' => esc_html__( 'Title Hover Color', 'rsaddon' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .rt-features-list-content:hover ul li .text-heading' => 'color: {{VALUE}};',
                ],
            ]
        );
        
        
        
        $this->add_control(
            'icon_hover_box_bg_color',
            [
                'label' => esc_html__( 'Icon Box Hover Background', 'rsaddon' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .rt-features-list-content:hover ul li .icon' => 'background: {{VALUE}};',
                ],
            ]
        );      
        
        $this->add_control(
            'icon_hover__color',
            [
                'label' => esc_html__( 'Icon hover Color', 'rsaddon' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .rt-features-list-content:hover ul li .icon i' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .rt-features-list-content:hover ul li .icon svg path' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'icon_box_border',
				'selector' => '{{WRAPPER}} .rt-features-list-content',
			]
		);

        $this->add_responsive_control(
			'icon_box_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'rsaddon' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .rt-features-list-content' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

        $this->add_responsive_control(
			'icon_box_padding',
			[
				'label' => esc_html__( 'Padding', 'rsaddon' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .rt-features-list-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

        $this->add_responsive_control(
			'icon_box_margin',
			[
				'label' => esc_html__( 'Margin', 'rsaddon' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .rt-features-list-content' => 'Margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);


        $this->end_controls_section();




    } 

	protected function render() {
        $settings = $this->get_settings_for_display();?> 

        <div class="rt-features-list-content">                
            <ul class="rt-features-list separator_<?php echo $settings['show_separator'];?> border_<?php echo $settings['enable_hover_border'];?> rotate_<?php echo $settings['show_rotate'];?>">
                    <li>
                        <?php if ( $settings['icon'] ) : ?>
                            <div class="icon"><?php \Elementor\Icons_Manager::render_icon( $settings['icon'], [ 'aria-hidden' => 'true' ] ); ?></div>                            
                        <?php endif; ?>
                        <?php if ( $settings['theme_icon'] ) : ?>
                            <div class="icon"><i class="<?php echo  $settings['theme_icon'];?>"></i></div>                            
                        <?php endif; ?>
                        <div class="query-list">
                            <span class="sub-text"><?php echo wp_kses_post( $settings['sub-text'] ); ?></span>
                            <?php if('mail' == $settings['field_type']) : ?>
                                <a href="mailto:<?php echo esc_attr($settings['text']);?>"><span class="text-heading"><?php echo wp_kses_post( $settings['text'] ); ?></span></a>                            
                            <?php elseif('phone' == $settings['field_type']) : ?>
                                <a href="tel:<?php echo esc_attr(str_replace(" ","",($settings['text'])))?>"><span class="text-heading"><?php echo wp_kses_post( $settings['text'] ); ?></span></a>
                                <?php else: ?>
                                <span class="text-heading"><?php echo wp_kses_post( $settings['text'] ); ?></span>
                            <?php endif; ?>
                            <?php if(!empty( $settings['message'] )) : ?>
                                <p class="message"><?php echo wp_kses_post( $settings['message'] ); ?></p>
                            <?php endif; ?>
                        </div>                        
                    </li>
                
            </ul>                          
        </div>
        <?php
    }
}