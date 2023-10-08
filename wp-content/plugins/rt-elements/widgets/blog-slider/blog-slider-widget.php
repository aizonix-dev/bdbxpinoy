<?php

use Elementor\Controls_Manager;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Image_Size;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Background;


defined( 'ABSPATH' ) || die();

class ReacTheme_Elementor_Blog_Slider_Widget extends \Elementor\Widget_Base {

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
        return 'rt-blog-slider';
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
        return __( 'RT Blog Slider', 'rtelements' );
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

		wp_register_style( 'rtelements-blog-slider', plugins_url( 'blog-slider-css/blog-slider.css', __FILE__ ) );
		
		return [
			'rtelements-blog-slider'
		];

	}
    
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
                    '3' => 'Style 3',               
                    '4' => 'Style 4', 
                    '5' => 'Style 5',               
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
                'label' => esc_html__( 'Blog Show Per Page', 'rtelements' ),
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
            'details_btn_text',
            [
                'label' => esc_html__( 'Button Text', 'rtelements' ),
                'type' => Controls_Manager::TEXT,               
                'separator' => 'before',
                 'condition' => [
                    'portfolio_slider_style' => '3',
                ],  
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

         

        $this->end_controls_section();
       

        $this->start_controls_section(
            'meta_section',
            [
                'label' => esc_html__( 'Meta Settings', 'rtelements' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'blog_avatar_show_hide',
            [
                'label' => esc_html__( 'Author Show / Hide', 'rtelements' ),
                'type' => Controls_Manager::SELECT,
                'default' => 'no',
                'options' => [
                    'yes' => esc_html__( 'Yes', 'rtelements' ),
                    'no' => esc_html__( 'No', 'rtelements' ),
                ],                
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'blog_author_text',
            [
                'label' => esc_html__( 'Author Text', 'rtelements' ),
                'type' => Controls_Manager::TEXT,   
                'condition' => [
                    'blog_avatar_show_hide' => 'yes'
                ]
            ]
        );

        $this->add_control(
            'blog_cat_show_hide',
            [
                'label' => esc_html__( 'Category Show / Hide', 'rtelements' ),
                'type' => Controls_Manager::SELECT,
                'default' => 'no',
                'options' => [
                    'yes' => esc_html__( 'Yes', 'rtelements' ),
                    'no' => esc_html__( 'No', 'rtelements' ),
                ],                
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'blog_meta_show_hide',
            [
                'label' => esc_html__( 'Date Show / Hide', 'rtelements' ),
                'type' => Controls_Manager::SELECT,
                'default' => 'yes',
                'options' => [
                    'yes' => esc_html__( 'Yes', 'rtelements' ),
                    'no' => esc_html__( 'No', 'rtelements' ),
                ],                
                'separator' => 'before',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'button_section',
            [
                'label' => esc_html__( 'Button Settings', 'rtelements' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'select_button',
            [
                'label'   => esc_html__( 'Select Button Styles', 'rtelements' ),
                'type'    => Controls_Manager::SELECT,
                'default' => '1',               
                'options' => [
                    '1' => 'Primary Button',
                    '2' => 'Secondary Button',            
                ],                                          
            ]
        );

        $this->add_control(
            'blog_readmore_text',
            [
                'label' => esc_html__( 'Button text', 'rtelements' ),
                'type' => Controls_Manager::TEXT,         
                'separator' => 'before',
            ]
        );

        $this->add_control(
			'blog_button_icon',
			[
				'label' => esc_html__( 'Icon', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::ICONS,
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
            'section_slider_box_style',
            [
                'label' => esc_html__( 'Box Style', 'rtelements' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

                
		$this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'blog_item_box_background',
                'label' => esc_html__( 'Background', 'elementor' ),
                'types' => [ 'classic', 'gradient' ],
                'exclude' => [ 'image' ],
                'selector' => '{{WRAPPER}} .rts-blog-h-2-wrapper',
                'fields_options' => [
                    'background' => [
                        'default' => 'classic',
                    ],
                ],
                
            ]
        );
        
        $this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'blog_item_box_border',
				'selector' => '{{WRAPPER}} .rts-blog-h-2-wrapper',
			]
            
		);

        $this->add_responsive_control(
            'blog_item_box_border_radius',
            [
                'label' => esc_html__( 'Border Radius', 'rtelements' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .rts-blog-h-2-wrapper' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'blog_item_box_shadow',
				'selector' => '{{WRAPPER}} .rts-blog-h-2-wrapper',
			]
		);


        $this->add_responsive_control(
            'blog_item_box_padding',
            [
                'label' => esc_html__( 'Padding', 'rtelements' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .rts-blog-h-2-wrapper' => 'Padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'blog_item_box_margin',
            [
                'label' => esc_html__( 'Margin', 'rtelements' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .rts-blog-h-2-wrapper' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .rt-blog-slider h3.title a' => 'color: {{VALUE}};',                   

                ],                
            ]
        );



        $this->add_control(
            'title_color_hover',
            [
                'label' => esc_html__( 'Title Hover Color', 'rtelements' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .rt-blog-slider h3.title a:hover' => 'color: {{VALUE}};',                    
                ],                
            ]
            
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'label' => esc_html__( 'Title Typography', 'rtelements' ),
                'selector' => '{{WRAPPER}} .reactheme-blog-grid1 .title a',                    
            ]
        );

        $this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'title_border',
				'selector' => '{{WRAPPER}} .rt-blog-slider.slider-style-3 .title',
                'condition' => [
                    'portfolio_slider_style' => '3'
                ]
			]
            
		);

        $this->add_responsive_control(
            'blog_title_padding',
            [
                'label' => esc_html__( 'Title Padding', 'rtelements' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .rt-blog-slider.slider-style-3 .title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'condition' => [
                    'portfolio_slider_style' => '3'
                ]
            ]
        );

        
        $this->add_responsive_control(
            'blog_title_margin',
            [
                'label' => esc_html__( 'Title Margin', 'rtelements' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .rt-blog-slider.slider-style-3 .title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'condition' => [
                    'portfolio_slider_style' => '3'
                ]
            ]
        );
        
		$this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'cat_grad_bg',
                'label' => esc_html__( 'Category Background', 'elementor' ),
                'types' => [ 'classic', 'gradient' ],
                'exclude' => [ 'image' ],
                'selector' => '{{WRAPPER}} .rt-blog-slider.rt-blog-style2 .portfolio-item .portfolio-content .p-category',
                'fields_options' => [
                    'background' => [
                        'default' => 'classic',
                    ],
                ],
                
            ]
        );

        $this->add_responsive_control(
            'blog_slider_meta_padding',
            [
                'label' => esc_html__( 'Meta Padding', 'rtelements' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .rt-blog-slider.slider-style-1 .blog-item .blog-meta' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ],
                'condition' => [
                    'portfolio_slider_style' => '1'
                ]
            ]
        );

        $this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'blog_slider_meta_border',
				'selector' => '{{WRAPPER}} .rt-blog-slider.slider-style-1 .blog-item .blog-meta',
                'condition' => [
                    'portfolio_slider_style' => '1'
                ]
			]
		);

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'blog_slider_meta_bg',
                'label' => esc_html__( 'Meta Background', 'elementor' ),
                'types' => [ 'classic', 'gradient' ],
                'exclude' => [ 'image' ],
                'selector' => '{{WRAPPER}} .rt-blog-slider.slider-style-1 .blog-item .blog-meta',  
                'condition' => [
                    'portfolio_slider_style' => '1'
                ]              
            ]
        );

        $this->add_control(
            'cat_icon_section',
            [
                'label' => esc_html__( 'Category Style', 'rtelements' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'category_color',
            [
                'label' => esc_html__( 'Category Color', 'rtelements' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .rt-blog-slider.slider-style-1 .blog-item .blog-meta li a' => 'color: {{VALUE}};',                   

                ],                
            ]
        );

        $this->add_control(
            'category_color_hover',
            [
                'label' => esc_html__( 'Category Hover Color', 'rtelements' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .rt-blog-slider.slider-style-1 .blog-item .blog-meta li a:hover' => 'color: {{VALUE}};',                    
                ],                
            ]
            
        ); 

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'category_typography',
                'label' => esc_html__( 'Category Typography', 'rtelements' ),
                'selector' => '{{WRAPPER}} .rt-blog-slider .post-categories li a',                    
            ]
        ); 

        $this->add_control(
            'category_bg',
            [
                'label' => esc_html__( 'Category Area Bg', 'rtelements' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .rt-blog-slider.slider-style-1 .blog-item .blog-meta li a' => 'background: {{VALUE}};',                   

                ],                
            ]
        );

        $this->add_control(
            'meta_icon_color',
            [
                'label' => esc_html__( 'Meta Icon Color', 'rtelements' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .rt-blog-slider.slider-style-1 .blog-item .blog-meta li i' => 'color: {{VALUE}};',                  
                ],                
            ]
            
        );   

        $this->add_control(
            'Seperator Color',
            [
                'label' => esc_html__( 'Author Separator Color', 'rtelements' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .rt-blog-slider .blog-content .blog-meta li' => 'color: {{VALUE}};',                    
                ],                
            ]
            
        ); 

        $this->add_control(
            'button_text_color',
            [
                'label' => esc_html__( 'Button Color', 'rtelements' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [                  
                    '{{WRAPPER}} .rt-blog-slider .rts-read-more' => 'color: {{VALUE}};', 
                    '{{WRAPPER}} .rt-blog-slider.slider-style-1 .blog-item .blog_content .blog-btn a' => 'color: {{VALUE}};', 
                ],                
            ]
        );

        $this->add_control(
            'button_text_color_hover',
            [
                'label' => esc_html__( 'Btton Hover Color', 'rtelements' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .rt-blog-slider .rts-read-more:hover' => 'color: {{VALUE}};',  
                    '{{WRAPPER}} .rt-blog-slider .rts-read-more:hover i' => 'background: {{VALUE}};',    
                    '{{WRAPPER}} .rt-blog-slider.slider-style-1 .blog-item .blog_content .blog-btn a:hover' => 'color: {{VALUE}};',               
                ],                
            ]
        );

        $this->add_control(
            'button_bg_color',
            [
                'label' => esc_html__( 'Background Color', 'rtelements' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [ 
                    '{{WRAPPER}} .rt-blog-slider.slider-style-1 .blog-item .blog_content .blog-btn a::before' => 'background: {{VALUE}};',               
                ],                
            ]
        );

        $this->add_control(
            'button_hover_bg_color',
            [
                'label' => esc_html__( 'Hover Background', 'rtelements' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [ 
                    '{{WRAPPER}} .rt-blog-slider.slider-style-1 .blog-item .blog_content .blog-btn a:hover' => 'background: {{VALUE}};',               
                ],                
            ]
        );

        $this->add_responsive_control(
            'button_padding',
            [
                'label' => esc_html__( 'Button Padding', 'rtelements' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .rt-blog-slider.slider-style-1 .blog-item .blog_content .blog-btn a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'button_border',
				'selector' => '{{WRAPPER}} .rt-blog-slider .blog-item .blog_content .blog-btn a',
                'selector' => '{{WRAPPER}} .rt-blog-slider.slider-style-1 .blog-item .blog_content .blog-btn a',
			]
		);

        $this->add_responsive_control(
            'button_border_radius',
            [
                'label' => esc_html__( 'Button Border Radius', 'rtelements' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .rt-blog-slider.slider-style-1 .blog-item .blog_content .blog-btn a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .rt-blog-slider.slider-style-1 .blog-item .blog_content .blog-btn a::before' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        
        $this->add_responsive_control(
            'button_top_space',
            [
                'label' => esc_html__( 'Button Spacing', 'rtelements' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .blog-btn.react-button' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'btn_typography',
                'label' => esc_html__( 'Typography', 'rtelements' ),
                'selector' => '{{WRAPPER}} .rt-blog-slider.slider-style-5 .footer-area .rts-read-more',  
                'condition' => [
                    'portfolio_slider_style' => ['5']
                ]                  
            ]
        );

        $this->add_responsive_control(
            'blog_button_padding',
            [
                'label' => esc_html__( 'Button Padding', 'rtelements' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .rt-blog-slider.slider-style-3 .blog-btn.react-button a, .rt-blog-slider.slider-style-5 .footer-area .rts-read-more' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'condition' => [
                    'portfolio_slider_style' => ['3', '5']
                ]
            ]
        );

        $this->add_control(
            'icon_color6',
            [
                'label' => esc_html__( 'Icon Color', 'rtelements' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .rt-portfolio-slider.slider-style-6 .portfolio-item .portfolio-content .p-icon i' => 'color: {{VALUE}};',                   

                ], 
                'condition' => [
                    'portfolio_slider_style' => '6',
                ],               
            ]
        ); 

        $this->add_control(
            'icon_bg_color6',
            [
                'label' => esc_html__( 'Icon Background Color', 'rtelements' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .rt-portfolio-slider.slider-style-6 .portfolio-item .portfolio-content .p-icon i' => 'background: {{VALUE}};',                   

                ], 
                'condition' => [
                    'portfolio_slider_style' => '6',
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
                    '{{WRAPPER}} .rt-portfolio-style3 .portfolio-item .portfolio-img:before' => 'background: {{VALUE}};',
                    '{{WRAPPER}} .rt-portfolio-style2 .portfolio-item:before' => 'background: {{VALUE}};',
                ],                
            ]
        );
        
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'blog_wrapper_bg',
                'label' => esc_html__( 'Blog Wrapper Backgound', 'elementor' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .rt-blog-slider.slider-style-3 .rts-blog-h-2-wrapper',
                'condition' => [
                    'portfolio_slider_style' => '3'
                ]
            ]
        );

        $this->add_responsive_control(
            'blog_slider_content_padding',
            [
                'label' => esc_html__( 'Content Padding', 'rtelements' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .rt-blog-slider.slider-style-1 .blog-item .blog_content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'blog_slider_content_bg',
                'label' => esc_html__( 'Background Color', 'rtelements' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .rt-blog-slider.slider-style-1 .blog-item .blog_content',
                'condition' => [
                    'portfolio_slider_style' => '1'
                ]
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

        $this->add_responsive_control(
            'blog_slider_image_padding',
            [
                'label' => esc_html__( 'Image Padding', 'rtelements' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .rt-blog-slider.slider-style-1 .blog-item .col-top' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'btn_icon_section',
            [
                'label' => esc_html__( 'Button Icon Style', 'rtelements' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        
        $this->add_control(
            'btn_icon_color',
            [
                'label' => esc_html__( 'Icon Color', 'rtelements' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .rt-blog-slider .rts-read-more i' => 'color: {{VALUE}};',
                ],                
            ]
        );

        $this->add_control(
            'btn_icon_hover_color',
            [
                'label' => esc_html__( 'Hover Color', 'rtelements' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .rt-blog-slider .rts-read-more:hover i' => 'color: {{VALUE}};',
                ],                
            ]
        );
        
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'btn_icon_bg_color',
                'label' => esc_html__( 'Background Color', 'rtelements' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .rt-blog-slider .rts-read-more i'
            ]
        );

        $this->add_control(
            'btn_icon_hover_bg_color',
            [
                'label' => esc_html__( 'Hover Background Color', 'rtelements' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .rt-blog-slider .rts-read-more:hover i' => 'background: {{VALUE}};',
                ],                
            ]
        );

        $this->add_responsive_control(
			'btn_icon_size',
			[
				'label' => esc_html__( 'Size', 'rtelements' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .rt-blog-slider .rts-read-more i' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		); 

        $this->add_responsive_control(
			'btn_icon_width',
			[
				'label' => esc_html__( 'Width', 'rtelements' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .rt-blog-slider .rts-read-more i' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

        $this->add_responsive_control(
			'btn_icon_height',
			[
				'label' => esc_html__( 'Height', 'rtelements' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .rt-blog-slider .rts-read-more i' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);        
        
        $this->add_responsive_control(
			'btn_icon_line_height',
			[
				'label' => esc_html__( 'Line Height', 'rtelements' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 5,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .rt-blog-slider .rts-read-more i' => 'line-height: {{SIZE}}{{UNIT}};',
				],
			]
		);         
        
        $this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'btn_icon_border',
				'selector' => '{{WRAPPER}} .rt-blog-slider .rts-read-more i',
			]
            
		);

        $this->add_responsive_control(
            'btn_icon_border_radius',
            [
                'label' => esc_html__( 'Border Radius', 'rtelements' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .rt-blog-slider .rts-read-more i' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );       

        
        $this->add_responsive_control(
            'btn_icon_margin',
            [
                'label' => esc_html__( 'Margin', 'rtelements' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .rt-blog-slider .rts-read-more i' => 'Margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
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

       


        $this->start_controls_tabs( 'tabs_toggle_arrow_bg' );

        $this->start_controls_tab(
            'tab_toggle_normal',
            [
                'label' => __( 'Normal', 'rtelements'),
            ]
        );


		$this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'blog_sliderarrow_bg',
                'label' => esc_html__( 'Arrow Background', 'elementor' ),
                'types' => [ 'classic', 'gradient' ],
                'exclude' => [ 'image' ],
                'selector' => '{{WRAPPER}} .rt-blog-slider.rt-blog-style2 .rt_widget_sliders .slick-arrow',
                'fields_options' => [
                    'background' => [
                        'default' => 'classic',
                    ],
                ],
            ]
        );



        $this->end_controls_tab();

        $this->start_controls_tab(
            'tab_toggle_hover',
            [
                'label' => __( 'Hover', 'rtelements'),
            ]
        );

		$this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'blog_sliderarrow_bg_hover',
                'label' => esc_html__( 'Arrow Background', 'elementor' ),
                'types' => [ 'classic', 'gradient' ],
                'exclude' => [ 'image' ],
                'selector' => '{{WRAPPER}} .rt-blog-slider.rt-blog-style2 .rt_widget_sliders .slick-arrow:hover',
                'fields_options' => [
                    'background' => [
                        'default' => 'classic',
                    ],
                ],
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->add_control(
            'navigation_arrow_icon_color',
            [
                'label' => esc_html__( 'Icon Color', 'rtelements' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .rt_widget_sliders .slick-next::before' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .rt_widget_sliders .slick-prev::before' => 'color: {{VALUE}};',

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
            'navigation_dot_border_color',
            [
                'label' => esc_html__( 'Border Color', 'rtelements' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .rt_widget_sliders .slick-dots li button' => 'border-color: {{VALUE}};',

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

        $settings              = $this->get_settings_for_display();             
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
        // $item_text          = $settings['pcat_item_text'];
        // $item_text = !empty($item_text) ? $item_text : '';
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
         

        ?>   
        <?php $gray_scale = $settings['show_graycale']; ?>
        <div class="rsaddon-unique-slider gray_<?php echo $settings['show_graycale'];?> rs-addon-slider rt-blog-slider rt-blog rt-blog-style<?php echo esc_attr($settings['portfolio_slider_style']); ?> slider-style-<?php echo esc_attr($settings['portfolio_slider_style']); ?> ">
            <div id="rsaddon-slick-slider-<?php echo esc_attr($unique); ?>" class="rt_widget_sliders swiper rtaddon-slider-<?php echo esc_attr($unique); ?>">
                <div class="swiper-wrapper">
                    <?php  if('1' == $settings['portfolio_slider_style']){ 
                            include plugin_dir_path(__FILE__)."/style1.php";
                        }

                        if('2' == $settings['portfolio_slider_style']){
                            include plugin_dir_path(__FILE__)."/style2.php";
                        }

                        if('3' == $settings['portfolio_slider_style']){
                            include plugin_dir_path(__FILE__)."/style3.php";
                        }

                        if('4' == $settings['portfolio_slider_style']){
                            include plugin_dir_path(__FILE__)."/style4.php";
                        }   
                        if('5' == $settings['portfolio_slider_style']){
                            include plugin_dir_path(__FILE__)."/style5.php";
                        }                                  
                        
                    ?>
                </div>
            </div>
        </div>
        <script type="text/javascript"> 
            jQuery(document).ready(function(){
                    
                var swiper = new Swiper(".rtaddon-slider-<?php echo esc_attr($unique); ?>", {				
                    slidesPerView: <?php echo $slidesToShow;?>,
                    speed: <?php echo esc_attr($autoplaySpeed); ?>,
                  
                    loop: <?php echo esc_attr($infinite ); ?>,
                   <?php echo esc_attr($slider_autoplay); ?>,
                   spaceBetween:  <?php echo esc_attr($item_gap); ?>,
                  
                    centeredSlides: <?php echo esc_attr($centerMode); ?>,
                    navigation: {
                        nextEl: ".testimonial-cat-next",
                        prevEl: ".testimonial-cat-prev",
                    },
                    breakpoints: {     
                        0: {
                            slidesPerView: <?php echo esc_attr($col_xs); ?>,
                           
                        },                   
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
            if ( post_type_exists( 'post' ) ) { 
            $terms = get_terms( array(
                'taxonomy'    => 'category',
                'hide_empty'  => true            
            ) );
            
            foreach($terms as $post) {
                $cat_list[$post->slug]  = [$post->name];
            }
        }  
        return $cat_list;
    }
}?>