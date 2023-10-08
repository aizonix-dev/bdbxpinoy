<?php
/**
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */

 use Elementor\Controls_Manager;
 use Elementor\Group_Control_Box_Shadow;
 use Elementor\Group_Control_Image_Size;
 use Elementor\Group_Control_Typography;
 use Elementor\Group_Control_Background;
 use Elementor\Group_Control_Border;
 use Elementor\Utils;

defined( 'ABSPATH' ) || die();

class RTElements_Elementor_Team_Slider_Widget extends \Elementor\Widget_Base {
    
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
		return 'rsteam-slider';
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
		return esc_html__( 'RT Team Slider', 'rselements' );
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
		return 'glyph-icon flaticon-slider-1';
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

		wp_register_style( 'rtelements-team-member-slider', plugins_url( 'team-slider-css/team-slider.css', __FILE__ ) );
		
		return [
			'rtelements-team-member-slider'
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
				'label' => esc_html__( 'Content', 'rselements' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'team_slider_style',
			[
				'label'   => esc_html__( 'Select Style', 'rselements' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'style1',				
				'options' => [
					'style1' => 'Style 1',
                    'style2' => 'Style 2',
                    'style3' => 'Style 3',
                    'style4' => 'Style 4',
                    'style5' => 'Style 5',
                    'style6' => 'Style 6',
                    'style7' => 'Style 7',
                    'style8' => 'Style 8',
				],											
			]
		);

		$this->add_control(
			'team_category',
			[
				'label'   => esc_html__( 'Category', 'rselements' ),
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
				'label' => esc_html__( 'Team Show Per Page', 'rselements' ),
				'type' => Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'example 3', 'rselements' ),
				'separator' => 'before',
			]
		);
        $this->add_control(
			'show_graycale',
			[
				'label' => esc_html__( 'Enable Image Grayscale', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'your-plugin' ),
				'label_off' => esc_html__( 'Hide', 'your-plugin' ),
				'return_value' => 'yes',
				'default' => 'no',
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
                'label'   => esc_html__( 'Wide Screen > 1399px', 'rselements' ),
                'type'    => Controls_Manager::SELECT,  
                'default' => 3,
                'options' => [
                    '1' => esc_html__( '1 Column', 'rselements' ), 
                    '2' => esc_html__( '2 Column', 'rselements' ),
                    '3' => esc_html__( '3 Column', 'rselements' ),
                    '4' => esc_html__( '4 Column', 'rselements' ),
                    '4.5' => esc_html__( '4.5 Column', 'rselements' ),
                    '5' => esc_html__( '5 Column', 'rselements' ),
                    '6' => esc_html__( '6 Column', 'rselements' ),                 
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
                'label' => esc_html__( 'Previous Text', 'rselements' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Previous', 'rselements' ),
                'placeholder' => esc_html__( 'Type your title here', 'rselements' ),
                'condition' => [
                    'slider_nav' => 'true',
                ],
            ]
        );

        $this->add_control(
            'pcat_next_text',
            [
                'label' => esc_html__( 'Next Text', 'rselements' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Next', 'rselements' ),
                'placeholder' => esc_html__( 'Type your title here', 'rselements' ),
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
                    '{{WRAPPER}} .rts-team.team-slider-style5 .team-item.swiper-slide-active' => 'margin-right:{{SIZE}}{{UNIT}};',                    
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
				'label' => esc_html__( 'Team Style', 'rselements' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		

        $this->add_control(
            'title_color',
            [
                'label' => esc_html__( 'Title Color', 'rselements' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team-slider-style1 .team-item .team-content h3.team-name a' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .team-slider-style2 .team-item-wrap .team-img .team-content .team-name a' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .team-slider-style3 .team-img .team-img-sec .team-content .team-name a' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .team-slider-style4 .team-item .team-content .team-name a' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .team-slider-style5 .rts-team-one-start .inner .title' => 'color: {{VALUE}};',

                ],                
            ]
        );



        $this->add_control(
            'title_color_hover',
            [
                'label' => esc_html__( 'Title Hover Color', 'rselements' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team-slider-style1 .team-item .team-content h3.team-name a:hover' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .team-slider-style2 .team-item-wrap .team-img .team-content .team-name a:hover' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .team-slider-style3 .team-img .team-img-sec .team-content .team-name a:hover' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .team-slider-style4 .team-item .team-content .team-name a:hover' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .team-slider-style5 .rts-team-one-start .inner .title:hover' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .team-slider-style7 .single-team-seven .inner-content h4 a:hover' => 'color: {{VALUE}};',
                ],                
            ]
        );


        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'label' => esc_html__( 'Title Typography', 'rselements' ),
				'scheme' => Elementor\Core\Schemes\Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .team-slider-style1 .team-item .team-content h3.team-name a',
                     '{{WRAPPER}} .team-slider-style2 .team-item-wrap .team-img .team-content .team-name a',
                     '{{WRAPPER}} .team-slider-style4 .team-item .team-content .team-name a',
                     '{{WRAPPER}} .swiper.team-slider-style5 .rts-team-one-start .inner .title',
			]
		);


        $this->add_control(
            'designation_color',
            [
                'label' => esc_html__( 'Designation Color', 'rselements' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team-content .team-title' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .team-slider-style4 .team-item .team-content .team-title' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .swiper.team-slider-style5 .rts-team-one-start .inner span' => 'color: {{VALUE}};',

                ],         
            ]
        );


        $this->add_control(
            'content_hover_bg',
            [
                'label' => esc_html__( 'Content Hover Background', 'rselements' ),
                'type' => Controls_Manager::COLOR,
                'condition' => [
                	'team_slider_style' => 'style5',
                ],
                'selectors' => [
                    '{{WRAPPER}} .team-slider-style5 .team-inner-wrap:hover .team-content' => 'background: {{VALUE}};',

                ],                
            ]
        );


        $this->add_control(
            'content_hover_text_color',
            [
                'label' => esc_html__( 'Content Hover Text Color', 'rselements' ),
                'type' => Controls_Manager::COLOR,
                'condition' => [
                	'team_slider_style' => 'style5',
                ],
                'selectors' => [
                    '{{WRAPPER}} .team-slider-style5 .team-inner-wrap:hover .team-content .member-desc .team-name a' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .team-slider-style5 .team-inner-wrap:hover .team-content .member-desc .team-title' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .team-slider-style5 .team-inner-wrap:hover .team-content .social-icons a i' => 'color: {{VALUE}};',

                ],                
            ]
        );


        $this->add_control(
            'content_color',
            [
                'label' => esc_html__( 'Content Color', 'rselements' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team-item .team-content .team-text' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .team-slider-style3 .team-img .team-img-sec .team-content' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .team-slider-style4 .team-item .team-content .team-text' => 'color: {{VALUE}};',

                ],                
            ]
        );


        $this->add_control(
            'content_top_border_color',
            [
                'label' => esc_html__( 'Content Top Border Color', 'rselements' ),
                'type' => Controls_Manager::COLOR,
                'condition' => [
                	'team_slider_style' => 'style4',
                ],
                'selectors' => [
                    '{{WRAPPER}} .team-slider-style4 .team-item .team-content .team-text::before' => 'background: {{VALUE}};',

                ],                
            ]
        );


        $this->add_control(
            'content_bottom_border_color',
            [
                'label' => esc_html__( 'Content Bottom Border Color', 'rselements' ),
                'type' => Controls_Manager::COLOR,
                'condition' => [
                	'team_slider_style' => 'style5',
                ],
                'selectors' => [
                    '{{WRAPPER}} .team-slider-style5 .team-inner-wrap .team-content::before' => 'background: {{VALUE}};',

                ],                
            ]
        );


        $this->add_control(
            'image_overlay',
            [
                'label' => esc_html__( 'Image Overlay', 'rselements' ),
                'type' => Controls_Manager::COLOR,
                'condition' => [
                	'team_slider_style' => 'style3',
                ],
                'selectors' => [
                    '{{WRAPPER}} .team-slider-style3 .team-img .team-img-sec::before' => 'background: {{VALUE}};',

                ],                
            ]
        );


        $this->add_control(
            'navigation_arrow_background',
            [
                'label' => esc_html__( 'Navigation Arrow Background', 'rselements' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .rs-addon-slider .slick-next, .rs-addon-slider .slick-prev' => 'background: {{VALUE}};',
                    '{{WRAPPER}} .rs-addon-slider .slick-next, .rs-addon-slider .slick-next' => 'background: {{VALUE}};',

                ],                
            ]
        );

        $this->add_control(
            'navigation_arrow_icon_color',
            [
                'label' => esc_html__( 'Navigation Arrow Icon Color', 'rselements' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .rs-addon-slider .slick-next::before' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .rs-addon-slider .slick-prev::before' => 'color: {{VALUE}};',

                ],                
            ]
        );

        $this->add_control(
            'navigation_dot_border_color',
            [
                'label' => esc_html__( 'Navigation Dot Icon Border Color', 'rselements' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .rs-addon-slider .slick-dots li button' => 'border-color: {{VALUE}};',

                ],                
            ]
        );



        $this->add_control(
            'navigation_dot_icon_background',
            [
                'label' => esc_html__( 'Navigation Dot Icon Background', 'rselements' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .rs-addon-slider .slick-dots li button:hover' => 'background: {{VALUE}};',
                    '{{WRAPPER}} .rs-addon-slider .slick-dots li.slick-active button' => 'background: {{VALUE}};',

                ],                
            ]
        );


        $this->add_control(
            'image_corner_border_color',
            [
                'label' => esc_html__( 'Image Corner Border Color', 'rselements' ),
                'type' => Controls_Manager::COLOR,
                'condition' => [
                	'team_slider_style' => 'style3',
                ],
                'selectors' => [
                    '{{WRAPPER}} .team-slider-style3 .team-img::before' => 'border-bottom-color: {{VALUE}};',
                    '{{WRAPPER}} .team-slider-style3 .team-img::after' => 'border-top-color: {{VALUE}};',

                ],                
            ]
        );


        $this->add_control(
            'icon_section_bg',
            [
                'label' => esc_html__( 'Icon Section Background', 'rselements' ),
                'type' => Controls_Manager::COLOR,
                'condition' => [
                	'team_slider_style' => 'style1',
                ],
                'selectors' => [
                    '{{WRAPPER}} .team-slider-style1 .team-item .image-wrap .social-icons1' => 'background: {{VALUE}};',
                ],
                'separator' => 'before',                
            ]
        );
		

        $this->add_control(
			'icon_font_size',
			[
				'label' => esc_html__( 'Icon Font Size', 'rselements' ),
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
                     '{{WRAPPER}} .social-icons1 a i' => 'font-size: {{SIZE}}{{UNIT}}',
                     '{{WRAPPER}} .team-social a i' => 'font-size: {{SIZE}}{{UNIT}}',
                     '{{WRAPPER}} .team-social a i' => 'font-size: {{SIZE}}{{UNIT}}',
                ],
                'separator' => 'before',
			]
		);


        $this->add_control(
            'icon_color',
            [
                'label' => esc_html__( 'Icon Color', 'rselements' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .social-icons1 a i' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .team-social a i' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .team-slider-style4 .team-item .team-content .social-icons a i' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .team-slider-style5 .team-inner-wrap .team-content .social-icons a i' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .team-slider-style2 .team-content .social-icons a i' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .team-slider-style5 .team-inner-wrap .image-wrap .team-social .main i' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .team-slider-style5 .team-inner-wrap .image-wrap .team-social .team-social-one i' => 'color: {{VALUE}};',
                ],
                'separator' => 'before',                
            ]
        );

        $this->add_control(
            'icon_color_hover',
            [
                'label' => esc_html__( 'Icon Hover Color', 'rselements' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .social-icons1 a i:hover' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .team-social a i:hover' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .team-slider-style4 .team-item .team-content .social-icons a:hover i' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .team-slider-style5 .team-inner-wrap .team-content .social-icons a:hover i' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .team-slider-style2 .team-content .social-icons a:hover i' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .team-slider-style5 .team-inner-wrap .image-wrap .team-social .team-social-one i:hover' => 'color: {{VALUE}};',
                ],
                'separator' => 'before',                
            ]

            
        );

        $this->add_control(
            'icon_color_bg',
            [
                'label' => esc_html__( 'Icon Box Bg', 'rselements' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [                    
                    '{{WRAPPER}} .team-slider-style2 .team-content .social-icons a' => 'background: {{VALUE}};',
                ],
                'separator' => 'before',                
            ]
        );

        $this->add_control(
            'icon_color_bg_hover',
            [
                'label' => esc_html__( 'Icon Hover Bg Color', 'rselements' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team-slider-style2 .team-content .social-icons a:hover' => 'background: {{VALUE}};',
                    '{{WRAPPER}} .team-slider-style5 .team-inner-wrap .image-wrap .team-social .team-social-one i:hover' => 'background: {{VALUE}};',
                ],
                'separator' => 'before',                
            ]

            
        );

        $this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'box_shadow',
				'label' => esc_html__( 'Box Shadow', 'plugin-domain' ),
				'selector' => '{{WRAPPER}} .team-content',
			]
		);

        $this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'background',
				'label' => esc_html__( 'Background', 'plugin-domain' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .team-content',
				
			]
		);

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

		$settings = $this->get_settings_for_display(); 
				
		$col_xl          = $settings['col_xl'];
        $col_xl          = !empty($col_xl) ? $col_xl : 3;
        $slidesToShow    = $col_xl;
        $autoplaySpeed   = $settings['slider_autoplay_speed'];
        $autoplaySpeed = !empty($autoplaySpeed) ? $autoplaySpeed : '1000';
        $interval        = $settings['slider_interval'];
        $interval = !empty($interval) ? $interval : '3000';
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
        $item_gap = $settings['item_gap_custom']['size'];
        $item_gap = !empty($item_gap) ? $item_gap : '30';
        $prev_text = $settings['pcat_prev_text'];
        $prev_text = !empty($prev_text) ? $prev_text : '';
        $next_text = $settings['pcat_next_text'];
        $next_text = !empty($next_text) ? $next_text : '';
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
        $gray_scale = $settings['show_graycale'];		
		?>	 
        <div class="team-slider-main-wrapper">
            <?php
            if( $sliderNav == 'true' ){
                echo '<div class="rt-slider-navigation team">
                    <div class="testimonial-cat-prev rts-prev'.esc_attr($unique).'"><i class="rt rt-arrow-left"></i></div>
                    <div class="testimonial-cat-next rts-next'.esc_attr($unique).'"><i class="rt rt-arrow-right"></i></div></div>';
            } ?>
            <div class="swiper rt-addon-slider rt_team-<?php echo esc_attr($unique); ?> rts-team team-slider-<?php echo esc_attr($settings['team_slider_style']); ?>">
            

                <div class="swiper-wrapper rt-addon-slider gray_<?php echo $gray_scale;?>">
            

                    <?php 	if('style1' == $settings['team_slider_style']){
                            require_once plugin_dir_path(__FILE__)."/style1.php";
                        }
                        if('style2' == $settings['team_slider_style']){
                            require_once plugin_dir_path(__FILE__)."/style2.php";
                        }
                        if('style3' == $settings['team_slider_style']){
                            require_once plugin_dir_path(__FILE__)."/style3.php";
                        }
                        if('style4' == $settings['team_slider_style']){
                            require_once plugin_dir_path(__FILE__)."/style4.php";
                        }
                        if('style5' == $settings['team_slider_style']){
                            require_once plugin_dir_path(__FILE__)."/style5.php";
                        }
                        if('style6' == $settings['team_slider_style']){
                            require_once plugin_dir_path(__FILE__)."/style6.php";
                        }
                        if('style7' == $settings['team_slider_style']){
                            require_once plugin_dir_path(__FILE__)."/style7.php";
                        }
                        if('style8' == $settings['team_slider_style']){
                            require_once plugin_dir_path(__FILE__)."/style8.php";
                        }
                    ?>
                </div>	
            </div>
        </div>
	<script type="text/javascript"> 
            jQuery(document).ready(function(){
                    
                var swiper = new Swiper(".rt_team-<?php echo esc_attr($unique); ?>", {				
                    slidesPerView: <?php echo $slidesToShow;?>,
                    speed: <?php echo esc_attr($autoplaySpeed); ?>,
                  
                    loop: <?php echo esc_attr($infinite ); ?>,
                   <?php echo esc_attr($slider_autoplay); ?>,
                   spaceBetween:  <?php echo esc_attr($item_gap); ?>,
                   pagination: {
                       el: ".swiper-pagination",
                       clickable: true,
                    },
                    centeredSlides: <?php echo esc_attr($centerMode); ?>,
                    navigation: {
                        nextEl: ".testimonial-cat-next",
                        prevEl: ".testimonial-cat-prev",
                    },
                    breakpoints: {
                        0: { slidesPerView: <?php echo $col_xs;?>},
                        <?php
                        
                        echo (!empty($col_xs)) ?  '575: { slidesPerView: '. $col_xs .' },' : '';
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
             if ( post_type_exists( 'teams' ) ) { 
              $terms = get_terms( array(
                 'taxonomy'    => 'team-category',
                 'hide_empty'  => true            
             ) ); 
            foreach($terms as $post) {
                $cat_list[$post->slug]  = [$post->name];
            }
        }  
        return $cat_list;
    }
}?>