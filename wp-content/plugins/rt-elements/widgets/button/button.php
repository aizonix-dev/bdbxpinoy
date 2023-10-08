<?php
use Elementor\Controls_Manager;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Typography;
use Elementor\Core\Schemes\Typography;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Background;

defined( 'ABSPATH' ) || die();

class Reactheme_Button_Widget extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve counter widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'react-button';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve counter widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'RT Button', 'rtelements' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve counter widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'glyph-icon flaticon-menu';
	}

	

	/**
	 * Retrieve the list of scripts the counter widget depended on.
	 *
	 * Used to set scripts dependencies required to run the widget.
	 *
	 * @since 1.3.0
	 * @access public
	 *
	 * @return array Widget scripts dependencies.
	 */
	public function get_categories() {
        return [ 'rtelements_category' ];
    }

	/**
	 * Get widget keywords.
	 *
	 * Retrieve the list of keywords the widget belongs to.
	 *
	 * @since 2.1.0
	 * @access public
	 *
	 * @return array Widget keywords.
	 */
	public function get_keywords() {
		return [ 'button' ];
	}

	/**
	 * Register counter widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function register_controls() {
		$this->start_controls_section(
			'section_button',
			[
				'label' => esc_html__( 'Content', 'rtelements' ),
			]
		);

		$this->add_control(
			'button_style',
			[
				'label'   => esc_html__( 'Select Style', 'rtelements' ),
				'type'    => Controls_Manager::SELECT,
				'label_block' => true,
				'default' => 'primary_btn',
				'separator' => 'before',
				'options' => [					
					'primary_btn' => esc_html__( 'Primary Button', 'rtelements'),
					'secondary_btn' => esc_html__( 'Secondary Button', 'rtelements'),
					
				],
			]
		);
		
		$this->add_control(
			'btn_text',
			[
				'label'       => esc_html__( 'Button Text', 'rtelements' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'default'     => 'Sample',
				'placeholder' => esc_html__( 'Button Text', 'rtelements' ),
				'separator'   => 'before',
			]
		);

		$this->add_control(
			'btn_link',
			[
				'label'       => esc_html__( ' Button Link', 'rtelements' ),
				'type'        => Controls_Manager::URL,
				'label_block' => true,						
			]
		);

		$this->add_responsive_control(
            'align',
            [
                'label' => esc_html__( 'Alignment', 'rtelements' ),
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
                    'justify' => [
                        'title' => esc_html__( 'Justify', 'rtelements' ),
                        'icon' => 'eicon-text-align-justify',
                    ],
                ],
                'toggle' => true,
                'selectors' => [
                    '{{WRAPPER}} .react-button' => 'text-align: {{VALUE}}'
                ]
            ]
        );

		$this->add_control(
            'icon',
            [
				'label' => esc_html__( 'Icon', 'rtelements' ),
				'type'  => Controls_Manager::HEADING,               
            ]
        );

		$this->add_control(
            'show_icon',
            [
				'label'        => esc_html__( 'Show Icon', 'rtelements' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'Show', 'rtelements' ),
				'label_off'    => esc_html__( 'Hide', 'rtelements' ),
				'return_value' => 'yes',
				'default'      => 'yes',
            ]
        );

		$this->add_control(
			'icon_position',
			[
				'label' => esc_html__( 'Icon Position', 'rtelements' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'after',
				'options' => [
					'before'  => esc_html__( 'Before Content', 'rtelements' ),
					'after' => esc_html__( 'After Content', 'rtelements' ),
				],

				'condition' => [
					'show_icon' => 'yes',
				],
			]
		);

		$this->add_control(
			'btn_icon',
			[
				'label'     => esc_html__( 'Icon', 'rtelements' ),
				'type'      => Controls_Manager::ICONS,
				'default' => [
					'value' => 'rt rt-arrow-left',					
				],
				'separator' => 'before',

				'condition' => [
					'show_icon' => 'yes',
				],				
			]
		);

			$this->add_control(
		    'btn_icon_spacing',
		    [
		        'label' => esc_html__( 'Icon Left Spacing', 'rtelements' ),
		        'type' => Controls_Manager::SLIDER,
		        'default' => [
		            'size' => 10
		        ],
		      
		        'selectors' => [
		            '{{WRAPPER}} .react-button i' => 'margin-left: {{SIZE}}{{UNIT}};',		
					'{{WRAPPER}} .react-button a svg' => 'margin-left: {{SIZE}}{{UNIT}};',	            
		        ],
		        'condition' => [
					'icon_position' => 'after',
				],	
		    ]
		);		

		$this->add_control(
		    'btn_icon_spacing_left',
		    [
		        'label' => esc_html__( 'Icon Right Spacing', 'rtelements' ),
		        'type' => Controls_Manager::SLIDER,
		        'default' => [
		            'size' => 10
		        ],
		      
		        'selectors' => [
		            '{{WRAPPER}} .react-button i' => 'margin-right: {{SIZE}}{{UNIT}};',		 
					'{{WRAPPER}} .react-button a svg' => 'margin-right: {{SIZE}}{{UNIT}};',	           
		        ],
		        'condition' => [
					'icon_position' => 'before',
				],	
		    ]
		);		

		$this->add_control(
		    'btn_icon_spacing_top',
		    [
		        'label' => esc_html__( 'Icon Top/Bottom Spacing', 'rtelements' ),
		        'type' => Controls_Manager::SLIDER,
				'px' => [
					'min' => -100,
					'max' => 100,
					'step' => 1,
				],
				'default' => [					
					'size' => 0,
					
				],
		      
		        'selectors' => [
		            '{{WRAPPER}} .react-button i' => 'top: {{SIZE}}px;',		 
					'{{WRAPPER}} .react-button a svg' => 'top: {{SIZE}}px;',	           
		        ],
		        'condition' => [
					'show_icon' => 'yes',
				],	
		    ]
		);		
		$this->add_control(
		    'btn_icon_width',
		    [
		        'label' => esc_html__( 'Icon Width', 'rtelements' ),
		        'type' => Controls_Manager::SLIDER,
				'size_units' => ['px'],
		        'selectors' => [
		      		            
		            '{{WRAPPER}} .react-button a svg' => 'height: {{SIZE}}{{UNIT}}; width: {{SIZE}}{{UNIT}};',		            
		        ],
		    ]
		);		
		
		
		$this->end_controls_section();	


		$this->start_controls_section(
		    '_section_style_button',
		    [
		        'label' => esc_html__( 'Button', 'rtelements' ),
		        'tab' => Controls_Manager::TAB_STYLE,
		    ]
		);

		$this->start_controls_tabs( '_tabs_button' );

		$this->start_controls_tab(
            'style_normal_tab',
            [
                'label' => esc_html__( 'Normal', 'rtelements' ),
            ]
        ); 

		$this->add_control(
		    'btn_text_color',
		    [
		        'label' => esc_html__( 'Text Color', 'rtelements' ),
		        'type' => Controls_Manager::COLOR,		      
		        'selectors' => [
		            '{{WRAPPER}} .react-button a' => 'color: {{VALUE}};',
		        ],
		    ]
		);

		$this->add_responsive_control(
		    'link_padding',
		    [
		        'label' => esc_html__( 'Padding', 'rtelements' ),
		        'type' => Controls_Manager::DIMENSIONS,
		        'size_units' => [ 'px', 'em', '%' ],
		        'selectors' => [
		            '{{WRAPPER}} .react-button a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		        ],
		    ]
		);

		$this->add_group_control(
		    Group_Control_Typography::get_type(),
		    [
		        'name' => 'btn_typography',
		        'selector' => '{{WRAPPER}} .react-button a',
		        'scheme' => Elementor\Core\Schemes\Typography::TYPOGRAPHY_4,
		    ]
		);

		$this->add_group_control(
		    Group_Control_Background::get_type(),
			[
				'name' => 'background_normal',
				'label' => esc_html__( 'Background', 'rtelements' ),
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .react-button a',
			]
		);

		$this->add_group_control(
		    Group_Control_Border::get_type(),
		    [
		        'name' => 'button_border',
		        'selector' => '{{WRAPPER}} .react-button a',
		    ]
		);

		$this->add_control(
		    'button_border_radius',
		    [
		        'label' => esc_html__( 'Border Radius', 'rtelements' ),
		        'type' => Controls_Manager::DIMENSIONS,
		        'size_units' => [ 'px', '%' ],
		        'selectors' => [
		            '{{WRAPPER}} .react-button a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',  
					'{{WRAPPER}} .react-button a::before' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',         
		        ],
		    ]
		);

		$this->add_group_control(
		    Group_Control_Box_Shadow::get_type(),
		    [
		        'name' => 'button_box_shadow',
		        'selector' => '{{WRAPPER}} .react-button a',
		    ]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
            'style_hover_tab',
            [
                'label' => esc_html__( 'Hover', 'rtelements' ),
            ]
        ); 

		$this->add_control(
		    'btn_text_hover_color',
		    [
		        'label' => esc_html__( 'Text Color', 'rtelements' ),
		        'type' => Controls_Manager::COLOR,		      
		        'selectors' => [
		            '{{WRAPPER}} .react-button a:hover' => 'color: {{VALUE}};',
		        ],
		    ]
		);

		$this->add_responsive_control(
		    'link_hover_padding',
		    [
		        'label' => esc_html__( 'Padding', 'rtelements' ),
		        'type' => Controls_Manager::DIMENSIONS,
		        'size_units' => [ 'px', 'em', '%' ],
		        'selectors' => [
		            '{{WRAPPER}} .react-button a:hover' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		        ],
		    ]
		);

		$this->add_group_control(
		    Group_Control_Typography::get_type(),
		    [
		        'name' => 'btn_hover_typography',
		        'selector' => '{{WRAPPER}} .react-button a:hover',
		        'scheme' => Elementor\Core\Schemes\Typography::TYPOGRAPHY_4,
		    ]
		);

		$this->add_group_control(
		    Group_Control_Background::get_type(),
			[
				'name' => 'hover_background',
				'label' => esc_html__( 'Background', 'rtelements' ),
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .react-button a:hover',
			]
		);

		$this->add_control(
		    'btn_after_bg_color',
		    [
		        'label' => esc_html__( 'Hover After BG Color', 'rtelements' ),
		        'type' => Controls_Manager::COLOR,		      
		        'selectors' => [
		            '{{WRAPPER}} .react-button a::before' => 'background: {{VALUE}};',
		        ],
		    ]
		);		

		$this->add_group_control(
		    Group_Control_Border::get_type(),
		    [
		        'name' => 'button_hover_border',
		        'selector' => '{{WRAPPER}} .react-button a:hover',
		    ]
		);

		$this->add_control(
		    'button_hover_border_radius',
		    [
		        'label' => esc_html__( 'Border Radius', 'rtelements' ),
		        'type' => Controls_Manager::DIMENSIONS,
		        'size_units' => [ 'px', '%' ],
		        'selectors' => [
		            '{{WRAPPER}} .react-button a:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		        ],
		    ]
		);

		$this->add_group_control(
		    Group_Control_Box_Shadow::get_type(),
		    [
		        'name' => 'button_hover_box_shadow',
		        'selector' => '{{WRAPPER}} .react-button a:hover',
		    ]
		);

		$this->end_controls_tab();
		$this->end_controls_tabs();
		$this->end_controls_section();

		$this->start_controls_section(
		    '_section_style_icon',
		    [
		        'label' => esc_html__( 'Icon', 'rtelements' ),
		        'tab' => Controls_Manager::TAB_STYLE,
		    ]
		);

		$this->add_control(
		    'icon_text_color',
		    [
		        'label' => esc_html__( 'Color', 'rtelements' ),
		        'type' => Controls_Manager::COLOR,		      
		        'selectors' => [
		            '{{WRAPPER}} .react-button a i' => 'color: {{VALUE}};',
					'{{WRAPPER}} .react-button a svg' => 'fill: {{VALUE}};',
		        ],
		    ]
		);

		$this->add_control(
		    'icon_hover_color',
		    [
		        'label' => esc_html__( 'Hover Color', 'rtelements' ),
		        'type' => Controls_Manager::COLOR,		      
		        'selectors' => [
		            '{{WRAPPER}} .react-button a:hover i' => 'color: {{VALUE}};',
					'{{WRAPPER}} .react-button a:hover svg' => 'fill: {{VALUE}};',
		        ],
		    ]
		);

		$this->add_control(
		    'icon_background',			[
				
				'label' => esc_html__( 'Background', 'rtelements' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => ['{{WRAPPER}} .react-button a i' => 'background: {{VALUE}};',],
			]
		);

		$this->add_control(
		    'icon_hover_background',			[
				
				'label' => esc_html__( 'Hover Background', 'rtelements' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => ['{{WRAPPER}} .react-button a:hover i'=> 'background: {{VALUE}};',],
			]
		);

		
		$this->add_responsive_control(
		    'icon_padding',
		    [
		        'label' => esc_html__( 'Padding', 'rtelements' ),
		        'type' => Controls_Manager::DIMENSIONS,
		        'size_units' => [ 'px', 'em', '%' ],
		        'selectors' => [
		            '{{WRAPPER}} .react-button a i' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		        ],
		    ]
		);


		$this->add_control(
		    'icon_border_radius',
		    [
		        'label' => esc_html__( 'Border Radius', 'rtelements' ),
		        'type' => Controls_Manager::DIMENSIONS,
		        'size_units' => [ 'px', '%' ],
		        'selectors' => [
		            '{{WRAPPER}} .react-button a i' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		        ],
		    ]
		);

		$this->end_controls_section();

	}

	/**
	 * Render counter widget output in the editor.
	 *
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	/**
	 * Render counter widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {	
		$settings = $this->get_settings_for_display();
		$this->add_inline_editing_attributes( 'btn_text', 'basic' );
        $this->add_render_attribute( 'btn_text', 'class', 'btn_text' );
	?>	
		
		<div class="react-button <?php echo esc_attr($settings['button_style']);?>">
			<?php $target = $settings['btn_link']['is_external'] ? 'target=_blank' : '';?>
			<a class="react_button <?php echo esc_html($settings['align']);?>" href="<?php echo esc_url($settings['btn_link']['url']);?>" <?php echo esc_attr($target);?>>				
			
			<?php if(!empty($settings['btn_icon']) &&  ($settings['icon_position']=='before')) : ?>
					<?php \Elementor\Icons_Manager::render_icon( $settings['btn_icon'], [ 'aria-hidden' => 'true' ] ); ?>				
				<?php endif; ?>	
			<span <?php echo wp_kses_post($this->print_render_attribute_string('btn_text'));?>><?php echo esc_html($settings['btn_text']);?></span>
				<?php if(!empty($settings['btn_icon']) &&  ($settings['icon_position']=='after')) : ?>
					<?php \Elementor\Icons_Manager::render_icon( $settings['btn_icon'], [ 'aria-hidden' => 'true' ] ); ?>				
				<?php endif; ?>
			</a>
		</div>    
	<?php 
	}
}