<?php

use Elementor\Controls_Manager;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Image_Size;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Border;
use Elementor\Utils;


defined( 'ABSPATH' ) || die();

class ReacTheme_Portfolio_Slider_Widget extends \Elementor\Widget_Base {
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
		return 'rt-portfolio-slider';
	}		

	/**
	 * Get widget title.
	 *
	 * Retrieve rsgallery widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Portfolio Slider', 'rtelements' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve rsgallery widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'glyph-icon flaticon-slider-3';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the rsgallery widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
        return [ 'pielements_category' ];
    }

    public function get_style_depends() {

		wp_register_style( 'rtelements-style-portfolio-slider', plugins_url( 'portfolio-slider-css/portfolio-slider.css', __FILE__ ) );
		
		return [
			'rtelements-style-portfolio-slider'
		];
	}

  	/**
	 * Register rsgallery widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function register_controls() {	  
		

		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Content', 'rtelements' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);


		$this->add_control(
			'portfolio_slider_style',
			[
				'label'   => esc_html__( 'Select Style', 'rtelements' ),
				'type'    => Controls_Manager::SELECT,
				'default' => '1',				
				'options' => [
					'1' => 'Style 1',
                    '2' => 'Style 2',
				],											
			]
		);


		$this->add_control(
			'portfolio_category',
			[
				'label'   => esc_html__( 'Category', 'rtelements' ),
				'type'    => Controls_Manager::SELECT2,	
				'default' => 0,			
				'options' => $this->getCategories(),
				'multiple' => true,	
				'separator' => 'before',		
			]

		);

		

		$this->add_control(
			'per_page',
			[
				'label' => esc_html__( 'Portfolio Show Per Page', 'rtelements' ),
				'type' => Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'example 3', 'rtelements' ),
				'separator' => 'before',
			]
		);		

		$this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name' => 'thumbnail',
                'default' => 'large',
                'separator' => 'before',
                'exclude' => [
                    'custom'
                ],
                'separator' => 'before',
            ]
        );    	

        $this->add_control(
			'p-short-des',
			[
				'label' => esc_html__( 'Short Description', 'rtelements' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'rows' => 10,
				'placeholder' => esc_html__( 'Type your short description here', 'rtelements' ),
                'condition' => ['portfolio_slider_style' => ['2']],
			]
		);

        $this->add_control(
			'p-short-btn',
			[
				'label' => esc_html__( 'Button Text', 'rtelements' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'rows' => 10,
                'label_block' => true,
				'placeholder' => esc_html__( 'button text here', 'rtelements' ),
                'condition' => ['portfolio_slider_style' => ['2']],
			]
		);

        $this->add_control(
			'p-short-btn-url',
			[
				'label' => esc_html__( 'Button URL', 'rtelements' ),
				'type' => \Elementor\Controls_Manager::URL,
				'rows' => 10,
                'condition' => ['portfolio_slider_style' => ['2']],
                'separator' => 'after'
			]
		);

        $this->add_control(
			'icon',
			[
				'label' => esc_html__( 'Icon', 'rtelements' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'far fa-eye',
					'library' => 'fa-solid',
				],
				'recommended' => [
					'fa-solid' => [
						'circle',
						'dot-circle',
						'square-full',
					],
					'fa-regular' => [
						'circle',
						'dot-circle',
						'square-full',
					],
				],
                'condition' => ['portfolio_slider_style' => ['1', '2']],
			]
		);


        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'button_typography',
				'label' => esc_html__( 'Button Typography', 'rtelements' ),
				'selector' => '{{WRAPPER}} .rt-portfolio-style3 .portfolio-item a.pf-btn2',         
				'condition' => [
				    'portfolio_slider_style' => '3',
				],           
			]
		);

        $this->add_responsive_control(
            'button_padding',
            [
                'label' => esc_html__( 'Button Area Padding', 'rtelements' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .rt-portfolio-style3 .portfolio-item a.pf-btn2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'condition' => [
				    'portfolio_slider_style' => '3',
				],
            ]
        );
		
        $this->add_control(
            'contet_area_bg_color',
            [
                'label' => esc_html__( 'Content Area Bg Color', 'rtelements' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [                  
                    '{{WRAPPER}} .portfolio-item .p-title a' => 'color: {{VALUE}};',                   

                ],      
                'condition' => [
				    'portfolio_slider_style' => '6',
				],          
            ]
        );

        $this->add_control(
			'card_image',
			[
				'label' => esc_html__( 'Content Icon Image', 'rtelements' ),
				'type'  => Controls_Manager::MEDIA,				
				'separator' => 'before',
                'condition' => ['portfolio_slider_style' => ['7', '6', '8']],

			]
		);

        $this->add_control(
			'card_image_shape',
			[
				'label' => esc_html__( 'Details Icon', 'rtelements' ),
				'type'  => Controls_Manager::MEDIA,				
				'separator' => 'before',
				'condition' => ['portfolio_slider_style' => ['5']],              

			]
		);

         

        $this->end_controls_section();


	$this->start_controls_section(
            'content_slider',
            [
                'label' => esc_html__( 'Slider Settings', 'rtelements' ),
                'tab'   => Controls_Manager::TAB_CONTENT,               
            ]
        );

        $this->add_control(
            'col_xl',
            [
                'label'   => esc_html__( 'Wide Screen > 1399px', 'rsaddon' ),
                'type'    => Controls_Manager::SELECT,  
                'default' => 3,
                'options' => [
                    '1' => esc_html__( '1 Column', 'rsaddon' ), 
                    '2' => esc_html__( '2 Column', 'rsaddon' ),
                    '1.8' => esc_html__( '1.8 Column', 'rsaddon' ),
                    '3' => esc_html__( '3 Column', 'rsaddon' ),
                    '4' => esc_html__( '4 Column', 'rsaddon' ),
                    '4.5' => esc_html__( '4.5 Column', 'rsaddon' ),
                    '5' => esc_html__( '5 Column', 'rsaddon' ),
                    '6' => esc_html__( '6 Column', 'rsaddon' ),                 
                ],
                'separator' => 'before',
                            
            ]
            
        );
    
        $this->add_control(
            'col_lg',
            [
                'label'   => esc_html__( 'Desktops > 1199px', 'rtelements' ),
                'type'    => Controls_Manager::SELECT,  
                'default' => 3,
                'options' => [
                    '1' => esc_html__( '1 Column', 'rtelements' ), 
                    '2' => esc_html__( '2 Column', 'rtelements' ),
                    '1.8' => esc_html__( '1.8 Column', 'rsaddon' ),
                    '3' => esc_html__( '3 Column', 'rtelements' ),
                    '4' => esc_html__( '4 Column', 'rtelements' ),
                    '6' => esc_html__( '6 Column', 'rtelements' ),                 
                ],
                'separator' => 'before',                            
            ]
            
        );

        $this->add_control(
            'col_md',
            [
                'label'   => esc_html__( 'Laptop > 991px', 'rtelements' ),
                'type'    => Controls_Manager::SELECT,  
                'default' => 3,         
                'options' => [
                    '1' => esc_html__( '1 Column', 'rtelements' ), 
                    '2' => esc_html__( '2 Column', 'rtelements' ),
                    '3' => esc_html__( '3 Column', 'rtelements' ),
                    '4' => esc_html__( '4 Column', 'rtelements' ),
                    '6' => esc_html__( '6 Column', 'rtelements' ),                     
                ],
                'separator' => 'before',
                            
            ]
            
        );

        $this->add_control(
            'col_sm',
            [
                'label'   => esc_html__( 'Tablets > 767px', 'rtelements' ),
                'type'    => Controls_Manager::SELECT,  
                'default' => 2,         
                'options' => [
                    '1' => esc_html__( '1 Column', 'rtelements' ), 
                    '2' => esc_html__( '2 Column', 'rtelements' ),
                    '3' => esc_html__( '3 Column', 'rtelements' ),
                    '4' => esc_html__( '4 Column', 'rtelements' ),
                    '6' => esc_html__( '6 Column', 'rtelements' ),                 
                ],
                'separator' => 'before',
                            
            ]
            
        );

        $this->add_control(
            'col_xs',
            [
                'label'   => esc_html__( 'Tablets < 768px', 'rtelements' ),
                'type'    => Controls_Manager::SELECT,  
                'default' => 1,         
                'options' => [
                    '1' => esc_html__( '1 Column', 'rtelements' ), 
                    '2' => esc_html__( '2 Column', 'rtelements' ),
                    '3' => esc_html__( '3 Column', 'rtelements' ),
                    '4' => esc_html__( '4 Column', 'rtelements' ),
                    '6' => esc_html__( '6 Column', 'rtelements' ),                 
                ],
                'separator' => 'before',
                            
            ]
            
        );

        $this->add_control(
            'slides_ToScroll',
            [
                'label'   => esc_html__( 'Slide To Scroll', 'rtelements' ),
                'type'    => Controls_Manager::SELECT,  
                'default' => 2,         
                'options' => [
                    '1' => esc_html__( '1 Item', 'rtelements' ),
                    '2' => esc_html__( '2 Item', 'rtelements' ),
                    '3' => esc_html__( '3 Item', 'rtelements' ),
                    '4' => esc_html__( '4 Item', 'rtelements' ),                   
                ],
                'separator' => 'before',
                            
            ]
            
        );      

        $this->add_control(
            'rt_pslider_effect',
            [
                'label' => esc_html__('Slider Effect', 'rsaddon'),
                'type' => Controls_Manager::SELECT,
                'default' => 'default',
                'options' => [
					'default' => esc_html__('Default', 'rsaddon'),					
					'fade' => esc_html__('Fade', 'rsaddon'),
					'flip' => esc_html__('Flip', 'rsaddon'),
					'cube' => esc_html__('Cube', 'rsaddon'),
					'coverflow' => esc_html__('Coverflow', 'rsaddon'),
					'creative' => esc_html__('Creative', 'rsaddon'),
					'cards' => esc_html__('Cards', 'rsaddon'),
                ],
            ]
        );

        $this->add_control(
            'slider_dots',
            [
                'label'   => esc_html__( 'Navigation Dots', 'rtelements' ),
                'type'    => Controls_Manager::SELECT,  
                'default' => 'false',
                'options' => [
                    'true' => esc_html__( 'Enable', 'rtelements' ),
                    'false' => esc_html__( 'Disable', 'rtelements' ),              
                ],
                'separator' => 'before',                            
            ]            
        );

        $this->add_control(
            'slider_nav',
            [
                'label'   => esc_html__( 'Navigation Nav', 'rtelements' ),
                'type'    => Controls_Manager::SELECT,  
                'default' => 'false',           
                'options' => [
                    'true' => esc_html__( 'Enable', 'rtelements' ),
                    'false' => esc_html__( 'Disable', 'rtelements' ),              
                ],
                'separator' => 'before',
                            
            ]
            
        );

        $this->add_control(
            'pcat_prev_text',
            [
                'label' => esc_html__( 'Previous Text', 'rsaddon' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Previous', 'rsaddon' ),
                'placeholder' => esc_html__( 'Type your title here', 'rsaddon' ),
                'condition' => [
                    'slider_nav' => 'true',
                ],
            ]
        );

        $this->add_control(
            'pcat_next_text',
            [
                'label' => esc_html__( 'Next Text', 'rsaddon' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Next', 'rsaddon' ),
                'placeholder' => esc_html__( 'Type your title here', 'rsaddon' ),
                'condition' => [
                    'slider_nav' => 'true',
                ],

            ]
        );

        $this->add_control(
            'slider_autoplay',
            [
                'label'   => esc_html__( 'Autoplay', 'rtelements' ),
                'type'    => Controls_Manager::SELECT,  
                'default' => 'false',           
                'options' => [
                    'true' => esc_html__( 'Enable', 'rtelements' ),
                    'false' => esc_html__( 'Disable', 'rtelements' ),              
                ],
                'separator' => 'before',
                            
            ]
            
        );

        $this->add_control(
            'slider_autoplay_speed',
            [
                'label'   => esc_html__( 'Autoplay Slide Speed', 'rtelements' ),
                'type'    => Controls_Manager::SELECT,  
                'default' => 3000,          
                'options' => [
                    '1000' => esc_html__( '1 Seconds', 'rtelements' ),
                    '2000' => esc_html__( '2 Seconds', 'rtelements' ), 
                    '3000' => esc_html__( '3 Seconds', 'rtelements' ), 
                    '4000' => esc_html__( '4 Seconds', 'rtelements' ), 
                    '5000' => esc_html__( '5 Seconds', 'rtelements' ), 
                ],
                'separator' => 'before',
                'condition' => [
                    'slider_autoplay' => 'true',
                ],                          
            ]
            
        );

        $this->add_control(
            'slider_interval',
            [
                'label'   => esc_html__( 'Autoplay Interval', 'rtelements' ),
                'type'    => Controls_Manager::SELECT,  
                'default' => 3000,          
                'options' => [
                    '5000' => esc_html__( '5 Seconds', 'rtelements' ), 
                    '4000' => esc_html__( '4 Seconds', 'rtelements' ), 
                    '3000' => esc_html__( '3 Seconds', 'rtelements' ), 
                    '2000' => esc_html__( '2 Seconds', 'rtelements' ), 
                    '1000' => esc_html__( '1 Seconds', 'rtelements' ),     
                ],
                'separator' => 'before',
                'condition' => [
                    'slider_autoplay' => 'true',
                ],                                                      
            ]
            
        );

        $this->add_control(
            'slider_stop_on_interaction',
            [
                'label'   => esc_html__( 'Stop On Interaction', 'rtelements' ),
                'type'    => Controls_Manager::SELECT,
                'default' => 'false',               
                'options' => [
                    'true' => esc_html__( 'Enable', 'rtelements' ),
                    'false' => esc_html__( 'Disable', 'rtelements' ),              
                ],
                'separator' => 'before',
                'condition' => [
                    'slider_autoplay' => 'true',
                ],                                                      
            ]
            
        );

        $this->add_control(
            'slider_stop_on_hover',
            [
                'label'   => esc_html__( 'Stop on Hover', 'rtelements' ),
                'type'    => Controls_Manager::SELECT,
                'default' => 'false',               
                'options' => [
                    'true' => esc_html__( 'Enable', 'rtelements' ),
                    'false' => esc_html__( 'Disable', 'rtelements' ),              
                ],
                'separator' => 'before',
                'condition' => [
                    'slider_autoplay' => 'true',
                ],                                                      
            ]
            
        );

        $this->add_control(
            'slider_loop',
            [
                'label'   => esc_html__( 'Loop', 'rtelements' ),
                'type'    => Controls_Manager::SELECT,
                'default' => 'false',
                'options' => [
                    'true' => esc_html__( 'Enable', 'rtelements' ),
                    'false' => esc_html__( 'Disable', 'rtelements' ),
                ],
                'separator' => 'before',
                            
            ]            
        );

        $this->add_control(
            'slider_centerMode',
            [
                'label'   => esc_html__( 'Center Mode', 'rtelements' ),
                'type'    => Controls_Manager::SELECT,
                'default' => 'false',
                'options' => [
                    'true' => esc_html__( 'Enable', 'rtelements' ),
                    'false' => esc_html__( 'Disable', 'rtelements' ),
                ],
                'separator' => 'before',                            
            ]            
        );

        $this->add_responsive_control(
            'item_gap_custom',
            [
                'label' => esc_html__( 'Item Middle Gap', 'rtelements' ),
                'type' => Controls_Manager::SLIDER,
                'show_label' => true,               
                'range' => [
                    'px' => [
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'size' => 15,
                ],          

                'selectors' => [
                    '{{WRAPPER}} .reactheme-addon-slider .testimonial-item' => 'margin-left:{{SIZE}}{{UNIT}};',     
                    '{{WRAPPER}} .reactheme-addon-slider .testimonial-item' => 'margin-right:{{SIZE}}{{UNIT}};',                    
                ],
            ]
        ); 

         $this->add_control(
            'item_gap_custom_bottom',
            [
                'label' => esc_html__( 'Item Bottom Gap', 'rtelements' ),
                'type' => Controls_Manager::SLIDER,
                'show_label' => true,               
                'range' => [
                    'px' => [
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'size' => 15,
                ],          

                'selectors' => [
                    '{{WRAPPER}} .reactheme-addon-slider .testimonial-item' => 'margin-bottom:{{SIZE}}{{UNIT}};',                    
                ],
            ]
        ); 
                
        $this->end_controls_section();

		$this->start_controls_section(
			'section_slider_style',
			[
				'label' => esc_html__( 'Content', 'rtelements' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		

        $this->add_control(
            'title_color',
            [
                'label' => esc_html__( 'Title Color', 'rtelements' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [                  
                    '{{WRAPPER}} .portfolio-item .p-title a' => 'color: {{VALUE}};',  
                    '{{WRAPPER}} .rt-portfolio-style2 .portfolio-item .portfolio-content .content-inner .content-text .p-title a' => 'color: {{VALUE}};',  
                                    

                ],                
            ]
        );



        $this->add_control(
            'title_color_hover',
            [
                'label' => esc_html__( 'Title Hover Color', 'rtelements' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .portfolio-item .p-title  a:hover' => 'color: {{VALUE}};', 
                    '{{WRAPPER}} .rt-portfolio-style2 .portfolio-item .portfolio-content .content-inner .content-text .p-title a:hover' => 'color: {{VALUE}};',                    
                ],                
            ]
            
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'label' => esc_html__( 'Title Typography', 'rtelements' ),
				'selector' => '{{WRAPPER}} .rt-portfolio-slider.slider-style-6 .portfolio-item .portfolio-content .p-title > a, {{WRAPPER}} .p-title a',                    
			]
		);


        $this->add_control(
            'category_color',
            [
                'label' => esc_html__( 'Category Color', 'rtelements' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .rt-portfolio-slider.slider-style-6 .portfolio-item .portfolio-content .p-title .p-category a, {{WRAPPER}} .p-category a' => 'color: {{VALUE}};',                   

                ],                
            ]
        );

        $this->add_control(
            'category_color_hover',
            [
                'label' => esc_html__( 'Category Hover Color', 'rtelements' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .rt-portfolio-slider.slider-style-6 .portfolio-item .portfolio-content .p-title .p-category a:hover, {{WRAPPER}} .p-category a:hover' => 'color: {{VALUE}};',                    
                ],                
            ]
            
        );  

        $this->add_control(
            'icon_color6',
            [
                'label' => esc_html__( 'Icon Color', 'rtelements' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .rt-portfolio-style8 .rts-business-case-s-2 .thumbnail i' => 'color: {{VALUE}};',                   

                ], 
                           
            ]
        ); 

        $this->add_control(
            'icon_bg_color6',
            [
                'label' => esc_html__( 'Icon Background Color', 'rtelements' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .rt-portfolio-style8 .rts-business-case-s-2 .thumbnail i' => 'background: {{VALUE}};',                   

                ], 
                        
            ]
        ); 

        $this->add_control(
            'item_border_color',
            [
                'label' => esc_html__( 'Border Color', 'rtelements' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .rt-portfolio-slider.slider-style-6 .portfolio-item:before' => 'background: {{VALUE}};',                   

                ], 
                'condition' => [
		            'portfolio_slider_style' => '6',
		        ],               
            ]
        ); 

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'text_bg_color',
                'label' => esc_html__( 'Text Background Color', 'rtelements' ),
                'types' => [ 'classic', 'gradient' ],
                'condition' => [
		            'portfolio_slider_style' => '5',
		        ],
                'selector' => '{{WRAPPER}} .slider-style-5 .rt-portfolio4 .portfolio-item .portfolio-inner'
            ]
        );


        $this->add_control(
            'image_overlay',
            [
                'label' => esc_html__( 'Image Overlay', 'rtelements' ),
                'type' => Controls_Manager::COLOR,
               
                'selectors' => [
                    '{{WRAPPER}} .portfolio-content:before' => 'background: {{VALUE}};',
                    '{{WRAPPER}} .slider-style-5 .rt-portfolio4 .portfolio-item' => 'background: {{VALUE}};',
                    '{{WRAPPER}}  .rt-portfolio-style3 .portfolio-item .portfolio-img:before' => 'background: {{VALUE}};',
                    '{{WRAPPER}}  .rt-portfolio-style4 .portfolio-item .portfolio-img:before' => 'background: {{VALUE}};',
                    '{{WRAPPER}} .rt-portfolio-style2 .portfolio-item:before' => 'background: {{VALUE}};',

                ],                
            ]
        );

        $this->add_responsive_control(
            'image_border_radius',
            [
                'label' => esc_html__( 'Border Radius', 'rtelements' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .rt-portfolio-style2 .portfolio-item .portfolio-img a img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'condition' => [
				    'portfolio_slider_style' => '2',
				],
            ]
        );


        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'style_overly_bg',
                'label' => esc_html__( 'Overlay Background Color', 'rtelements' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .rt-portfolio-slider.slider-style-6 .portfolio-item:after',
                'condition' => [
		            'portfolio_slider_style' => '6'
		        ]
            ]
        );
      
        $this->add_control(
			'arrow_options',
			[
				'label' => esc_html__( 'Arrow Style', 'rtelements' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		
		$this->add_responsive_control(
		    'arrow_left_position',
		    [
				'label'      => esc_html__( 'Left Position', 'rtelements' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
		        'range' => [
		            '%' => [
		                'min' => 0,
		                'max' => 100,
		            ],
		            'px' => [
		                'min' => -1000,
		                'max' => 1000,
		            ],
		        ],
		        'condition' => [
				    'slider_centerMode' => 'true',
				],
		        'selectors' => [
		            '{{WRAPPER}} .rt-portfolio-slider.slider-style-5 .rt_widget_sliders .slick-prev' => 'left: {{SIZE}}{{UNIT}};',
		            '{{WRAPPER}} .rt_widget_sliders .slick-prev' => 'left: {{SIZE}}{{UNIT}};',
		        ],
		        'separator' => 'before',
		    ]
		);	

		$this->add_responsive_control(
		    'arrow_right_position',
		    [
				'label'      => esc_html__( 'Right Position', 'rtelements' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
		        'range' => [
		            '%' => [
		                'min' => 0,
		                'max' => 100,
		            ],
		            'px' => [
		                'min' => -1000,
		                'max' => 1000,
		            ],
		        ],
		        'condition' => [
				    'slider_centerMode' => 'true',
				],
		        'selectors' => [
		            '{{WRAPPER}} .rt-portfolio-slider.slider-style-5 .rt_widget_sliders .slick-next' => 'right: {{SIZE}}{{UNIT}};',
		            '{{WRAPPER}} .rt_widget_sliders .slick-next' => 'right: {{SIZE}}{{UNIT}};',
		        ],
		        'separator' => 'before',
		    ]
		);


        $this->add_control(
            'navigation_arrow_background',
            [
                'label' => esc_html__( 'Background', 'rtelements' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .rt_widget_sliders .slick-next,{{WRAPPER}}  .rt_widget_sliders .slick-prev' => 'background: {{VALUE}};',
                    '{{WRAPPER}} .rt_widget_sliders .slick-next,{{WRAPPER}}  .rt_widget_sliders .slick-next' => 'background: {{VALUE}};',

                ],                
            ]
        );

        $this->add_control(
            'navigation_arrow_background_hover',
            [
                'label' => esc_html__( 'Hover Background', 'rtelements' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [                    
                    '.rt-portfolio-style6 .swiper-button-prev:hover' => 'background: {{VALUE}}; !important',
                    '.rt-portfolio-style6 .swiper-button-next:hover' => 'background: {{VALUE}}; !important',
                ],                
            ]
        );

        $this->add_control(
            'navigation_arrow_icon_color',
            [
                'label' => esc_html__( 'Icon Color', 'rtelements' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .rt_widget_sliders .slick-next::before' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .rt_widget_sliders .slick-prev::before' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .swiper-button-prev:before' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .swiper-button-next:before' => 'color: {{VALUE}};',

                ],                
            ]
        );

        $this->add_control(
            'navigation_arrow_icon_color_hvoer',
            [
                'label' => esc_html__( 'Icon Hover Color', 'rtelements' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .rt_widget_sliders .slick-next::before' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .rt_widget_sliders .slick-prev::before' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .swiper-button-prev:hover:before' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .swiper-button-next:hover:before' => 'color: {{VALUE}};',

                ],                
            ]
        );

         $this->add_control(
			'bullet_options',
			[
				'label' => esc_html__( 'Bullet Style', 'rtelements' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
        $this->add_control(
            'button_color',
            [
                'label' => esc_html__( 'Button Style', 'rtelements' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .rt_widget_sliders .slick-dots li button' => 'border-color: {{VALUE}};',

                ],                
            ]
        );


        $this->add_control(
            'navigation_dot_border_color_active',
            [
                'label' => esc_html__( 'Active Color', 'rtelements' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .rt_widget_sliders .slick-dots li button.active' => 'border-color: {{VALUE}};',
                    '{{WRAPPER}} .rt-portfolio-style6.swiper .swiper-pagination-frac .swiper-pagination-current' => 'color: {{VALUE}};',

                ],                
            ]
        );




        $this->add_control(
            'navigation_dot_icon_background',
            [
                'label' => esc_html__( 'Background Color', 'rtelements' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .rt_widget_sliders .slick-dots li button:hover' => 'background: {{VALUE}};',
                    '{{WRAPPER}} .rt_widget_sliders .slick-dots li.slick-active button' => 'background: {{VALUE}};',

                ],                
            ]
        );


        $this->add_control(
			'button_options',
			[
				'label' => esc_html__( 'Button Style', 'rtelements' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
        $this->add_control(
            'button_color_normal',
            [
                'label' => esc_html__( 'Button Text Color', 'rtelements' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .rts-btn' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .rt-portfolio-style2 .portfolio-item .portfolio-content .content-inner .content-text .p-short-btn' => 'color: {{VALUE}};',
                ],                
            ]
        );      

        $this->add_control(
            'button_background',
            [
                'label' => esc_html__( 'Background Color', 'rtelements' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    ' {{WRAPPER}} .rts-btn' => 'background: {{VALUE}};',                    
                    ' {{WRAPPER}} .rt-portfolio-style2 .portfolio-item .portfolio-content .content-inner .content-text .p-short-btn::before' => 'background: {{VALUE}};',  
                ],                
            ]
        );

        $this->add_control(
            'button_color_hover',
            [
                'label' => esc_html__( 'Button Hover Text Color', 'rtelements' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .rts-btn:hover' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .rt-portfolio-style2 .portfolio-item .portfolio-content .content-inner .content-text .p-short-btn:hover' => 'color: {{VALUE}};',
                ],                
            ]
        );      



        $this->add_control(
            'Hover_button_background',
            [
                'label' => esc_html__( 'Hover Background Color', 'rtelements' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    ' {{WRAPPER}} .rts-btn:hover' => 'background: {{VALUE}};',                    
                    ' {{WRAPPER}} .rt-portfolio-style2 .portfolio-item .portfolio-content .content-inner .content-text .p-short-btn:hover' => 'background: {{VALUE}};',  
                ],                
            ]
        );

        $this->add_responsive_control(
            'p_button_padding',
            [
                'label' => esc_html__( 'Padding', 'rtelements' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .rt-portfolio-style2 .portfolio-item .portfolio-content .content-inner .content-text .p-short-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'condition' => [
				    'portfolio_slider_style' => '2',
				],
            ]
        );

          $this->add_control(
			'bullet_spacing_custom',
			[
				'label' => esc_html__( 'Top Gap', 'rtelements' ),
				'type' => Controls_Manager::SLIDER,
				'show_label' => true,				
				'range' => [
					'px' => [
						'max' => 100,
					],
				],
				'default' => [
					'size' => 25,
				],			

				'selectors' => [
                    '{{WRAPPER}} .rt_widget_sliders .slick-dots' => 'margin-bottom:-{{SIZE}}{{UNIT}};',                                     
                ],
			]
		); 

        

		$this->end_controls_section();

		$this->start_controls_section(
				    '_section_style_button',
				    [
				        'label' => esc_html__( 'Button', 'rsaddon' ),
				        'tab' => Controls_Manager::TAB_STYLE,
				        'condition' => ['portfolio_slider_style' => ['1']],
				    ]
				);

				
				$this->start_controls_tabs( '_tabs_button' );

				$this->start_controls_tab(
		            'style_normal_tab',
		            [
		                'label' => esc_html__( 'Normal', 'rsaddon' ),
		            ]
		        ); 

				$this->add_control(
				    'btn_text_color',
				    [
				        'label' => esc_html__( 'Text Color', 'rsaddon' ),
				        'type' => Controls_Manager::COLOR,		      
				        'selectors' => [
				            '{{WRAPPER}} .rt-portfolio-style1 .read-btn' => 'color: {{VALUE}};',
				        ],
				    ]
				);

				$this->add_group_control(
				    Group_Control_Background::get_type(),
					[
						'name' => 'background_normal',
						'label' => esc_html__( 'Background', 'rsaddon' ),
						'types' => [ 'classic', 'gradient' ],
						'selector' => '{{WRAPPER}} .portfolio-item .link-button',
					]
				);

		$this->end_controls_tab();

				$this->start_controls_tab(
		            'style_hover_tab',
		            [
		                'label' => esc_html__( 'Hover', 'rsaddon' ),
		            ]
		        ); 

				$this->add_control(
				    'btn_text_hover_color',
				    [
				        'label' => esc_html__( 'Text Color', 'rsaddon' ),
				        'type' => Controls_Manager::COLOR,		      
				        'selectors' => [
				            '{{WRAPPER}}  .rt-portfolio-style1 .grid-item:hover .read-btn' => 'color: {{VALUE}};',
				        ],
				    ]
				);

				$this->add_group_control(
				    Group_Control_Background::get_type(),
					[
						'name' => 'background',
						'label' => esc_html__( 'Background', 'rsaddon' ),
						'types' => [ 'classic', 'gradient' ],
						'selector' => '{{WRAPPER}} .rt-portfolio-style1 .grid-item:hover .read-btn:before',
					]
				);

				$this->end_controls_tab();
				$this->end_controls_tabs();    
				
				

	$this->end_controls_section();
   
	}

	/**
	 * Render rsgallery widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {

		$settings    = $this->get_settings_for_display();
        $placeholder = Utils::get_placeholder_image_src();
        $imgId       = !empty($settings['card_image']) ? $settings['card_image']['id'] : '';
        if( !empty($imgId) ){
            $img_link = wp_get_attachment_image_src($imgId, 'large')[0];
        }else{
            $img_link = $placeholder;
        }
        $imgId2 = !empty($settings['card_image_shape']) ? $settings['card_image_shape']['id'] : '';
        if( !empty($imgId2) ){
            $img_link2 = wp_get_attachment_image_src($imgId2, 'large')[0];
        }else{
            $img_link2 = $placeholder;
        }

		$col_xl          = $settings['col_xl'];
        $col_xl          = !empty($col_xl) ? $col_xl : 3;
        $slidesToShow    = $col_xl;
        $autoplaySpeed   = $settings['slider_autoplay_speed'];
        $autoplaySpeed   = !empty($autoplaySpeed) ? $autoplaySpeed : '1000';
        $interval        = $settings['slider_interval'];
        $interval        = !empty($interval) ? $interval : '3000';
        $slidesToScroll  = $settings['slides_ToScroll'];
        $slider_autoplay = $settings['slider_autoplay'] === 'true' ? 'true' : 'false';
        $pauseOnHover    = $settings['slider_stop_on_hover'] === 'true' ? 'true' : 'false';
        $pauseOnInter    = $settings['slider_stop_on_interaction'] === 'true' ? 'true' : 'false';
        $sliderDots      = $settings['slider_dots'] == 'true' ? 'true' : 'false';
        $sliderNav       = $settings['slider_nav'] == 'true' ? 'true' : 'false';        
        $infinite        = $settings['slider_loop'] === 'true' ? 'true' : 'false';
        $centerMode      = $settings['slider_centerMode'] === 'true' ? 'true' : 'false';
        $col_lg          = $settings['col_lg'];
        $col_md          = $settings['col_md'];
        $col_sm          = $settings['col_sm'];
        $col_xs          = $settings['col_xs'];     
        $item_gap   = $settings['item_gap_custom']['size'];
        $item_gap   = !empty($item_gap) ? $item_gap : '30';
        $prev_text  = $settings['pcat_prev_text'];
        $prev_text  = !empty($prev_text) ? $prev_text : '';
        $next_text  = $settings['pcat_next_text'];
        $next_text  = !empty($next_text) ? $next_text : '';
        $unique = rand(2012,35120);
		if( $slider_autoplay =='true' ){
            $slider_autoplay = 'autoplay: { ' ;
            $slider_autoplay .= 'delay: '.$interval;
            if(  $pauseOnHover =='true'  ){
                $slider_autoplay .= ', pauseOnMouseEnter: true';
            }else{
                $slider_autoplay .= ', pauseOnMouseEnter: false';
            }
            if(  $pauseOnInter =='true'  ){
                $slider_autoplay .= ', disableOnInteraction: true';
            }else{
                $slider_autoplay .= ', disableOnInteraction: false';
            }
            $slider_autoplay .= ' }';
        }else{
            $slider_autoplay = 'autoplay: false' ;
        }
        $effect = $settings['rt_pslider_effect'];

        if($effect== 'fade'){
            $seffect = "effect: 'fade', fadeEffect: { crossFade: true, },";
        }elseif($effect== 'cube'){
            $seffect = "effect: 'cube',";
        }elseif($effect== 'flip'){
            $seffect = "effect: 'flip',";
        }elseif($effect== 'coverflow'){
            $seffect = "effect: 'coverflow',";
        }elseif($effect== 'creative'){
            $seffect = "effect: 'creative', creativeEffect: { prev: { translate: [0, 0, -400], }, next: { translate: ['100%', 0, 0], }, },";
        }elseif($effect== 'cards'){
            $seffect = "effect: 'cards',";
        }else{
            $seffect = '';
        }
		?>	
        <?php if( $sliderNav =='true' ) : ?> 
            <div class="portfolio-slider-nav">
                <div class="swiper-button-prev">
                    <i class="rt rt-arrow-left"></i>
                </div>
                <div class="swiper-button-next">
                    <i class="rt rt-arrow-right"></i>
                </div>
            </div>
        <?php endif; ?>
		<div class="swiper rtaddon-portfolio-slider-<?php echo esc_attr($unique); ?>  rsaddon-unique-slider rs-addon-slider rt-portfolio-slider rt-portfolio rt-portfolio-style<?php echo esc_attr($settings['portfolio_slider_style']); ?> slider-style-<?php echo esc_attr($settings['portfolio_slider_style']); ?> center-mode-<?php echo $centerMode;?>">
			<div class="swiper-wrapper">

                <?php 	
                    if('1' == $settings['portfolio_slider_style']){ 
                        include plugin_dir_path(__FILE__)."/style1.php";
                    }
                    elseif('2' == $settings['portfolio_slider_style']){ 
                        include plugin_dir_path(__FILE__)."/style2.php";
                    }
                                       
                ?>
		    </div>
            <?php if( $sliderDots == 'true' ) : ?>
            <div class="swipper-bulet-pagination">
                    <div class="swiper-pagination-new"></div>
            </div>
        <?php endif; ?>
	    </div>
      
       
	<script type="text/javascript"> 
        jQuery(document).ready(function(){                
            var swiper = new Swiper(".rtaddon-portfolio-slider-<?php echo esc_attr($unique); ?>", {				
                slidesPerView: <?php echo $slidesToShow;?>,
                <?php if('6' == $settings['portfolio_slider_style']){ ?>
                      loop: true,
                      loopedSlides: 50,
                      autoHeight: true,
                      shortSwipes: false,
                      longSwipes: false,
                      effect: 'fade',
                      speed: 500,
                      autoplay: {
                          delay: 1500,
                      },
                <?php } else{                
                 echo $seffect; ?>
                speed: <?php echo esc_attr($autoplaySpeed); ?>,                
                loop: <?php echo esc_attr($infinite ); ?>,
                <?php echo esc_attr($slider_autoplay); ?>, 
                <?php } ?>
               
                spaceBetween:  <?php echo esc_attr($item_gap); ?>,
                
                centeredSlides: <?php echo esc_attr($centerMode); ?>,
                <?php if( $sliderNav =='true' ) : ?>
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
                <?php endif;?>
                <?php if( $sliderDots == 'true' ) : ?>
                pagination: {
                    el: ".swiper-pagination-new",
                    clickable: true
                },
                <?php endif;?>
                breakpoints: {
                    
                    
                    0: {
                       slidesPerView: <?php echo esc_attr($col_xs); ?>,
                      
                   },
                   <?php echo (!empty($col_xs)) ?  '575: { slidesPerView: '. $col_xs .' },' : '';
                   echo (!empty($col_sm)) ?  '767: { slidesPerView: '. $col_sm .' },' : '';
                   echo (!empty($col_md)) ?  '991: { slidesPerView: '. $col_md .' },' : '';
                   echo (!empty($col_lg)) ?  '1199: { slidesPerView: '. $col_lg .' },' : '';
                   ?>
                   1399: {
                       slidesPerView: <?php echo esc_attr($col_xl); ?>,
                       spaceBetween:  <?php echo esc_attr($item_gap); ?>
                   }
               }
            });
        
        });
    </script>
	<?php 
	}
	public function getCategories(){
        $cat_list = [];
         	if ( post_type_exists( 'rt-portfolios' ) ) { 
          	$terms = get_terms( array(
             	'taxonomy'    => 'rt-portfolio-category',
             	'hide_empty'  => true            
         	) );
            
	        foreach($terms as $post) {
	        	$cat_list[$post->slug]  = [$post->name];
	        }
    	}  
        return $cat_list;
    }
}?>