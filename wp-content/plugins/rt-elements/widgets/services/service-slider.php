<?php
/**
 * Logo widget class
 *
 */
use Elementor\Group_Control_Css_Filter;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Repeater;
use Elementor\Utils;
use Elementor\Control_Media;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Image_Size;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Background;
use Elementor\register_controls;

defined( 'ABSPATH' ) || die();

class Reactheme_Elementor_Services_Slider_Widget  extends \Elementor\Widget_Base {
    /**
     * Get widget name.
     *   
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget name.
     */

    public function get_name() {
        return 'rt-service-slider';
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
        return esc_html__( 'RT Service Slider', 'rtelements' );
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
        return 'eicon-gallery-grid';
    }


    public function get_categories() {
        return [ 'pielements_category' ];
    }

    public function get_keywords() {
        return [ 'service' ];
    }


    protected function register_controls() {       

        $this->start_controls_section(
            '_section_logo',
            [
                'label' => esc_html__( 'Slider Item', 'rtelements' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'image',
            [
                'label' => esc_html__('Image', 'rtelements'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );  
        $repeater->add_responsive_control(
            'img_margin',
            [
                'label' => esc_html__( 'Image Right Margin', 'rtelements' ),
                'type' => Controls_Manager::TEXT,
                              
            ]
        ); 		
		$repeater->add_control(
            'sub-name',
            [
                'label' => esc_html__('Sub Title', 'rtelements'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('', 'rtelements'),
                'label_block' => true,
                'placeholder' => esc_html__( 'Service 01', 'rtelements' ),
                'separator'   => 'before',
            ]
        );      

        $repeater->add_control(
            'name',
            [
                'label' => esc_html__('Title', 'rtelements'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('', 'rtelements'),
                'label_block' => true,
                'placeholder' => esc_html__( 'Name', 'rtelements' ),
                'separator'   => 'before',
            ]
        );
        $repeater->add_control(
            'btn_text',
            [
                'label' => esc_html__('Button Text', 'rtelements'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('', 'rtelements'),
                'label_block' => true,
                'placeholder' => esc_html__( 'Name', 'rtelements' ),
                'separator'   => 'before',
            ]
        );        
        $repeater->add_control(
            'link',
            [
                'label' => esc_html__('Link', 'rtelements'),
                'type' => Controls_Manager::URL,                
            ]
        ); 
        $repeater->add_control(
            'description',
            [
                'label' => esc_html__('Description', 'rtelements'),
                'type' => Controls_Manager::WYSIWYG,
                'default' => esc_html__('', 'rtelements'),
                'label_block' => true,
                'placeholder' => esc_html__( 'Description', 'rtelements' ),
                'separator'   => 'before',
            ]
        );      

        $repeater->add_control(
            'logo_client',
            [
                'label' => esc_html__('Services Icon', 'rtelements'),
                'type' => Controls_Manager::ICONS,
            ]
        );        

        $this->add_control(
            'logo_list',
            [
                'show_label' => false,
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => '{{{ name }}}',
                'default' => [
                    ['image' => ['url' => Utils::get_placeholder_image_src()]],
                    ['image' => ['url' => Utils::get_placeholder_image_src()]],
                    ['image' => ['url' => Utils::get_placeholder_image_src()]],
                    ['image' => ['url' => Utils::get_placeholder_image_src()]],
                    ['image' => ['url' => Utils::get_placeholder_image_src()]],
                ]
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
            'content_slider',
            [
                'label' => esc_html__( 'Slider Settings', 'rtelements' ),
                'tab' => Controls_Manager::TAB_CONTENT,               
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
                    '5' => esc_html__( '5 Column', 'rtelements' ),
                    '6' => esc_html__( '6 Column', 'rtelements' ),                 
                ],
                'separator' => 'before',
                            
            ]
            
        );

        $this->add_control(
            'col_md',
            [
                'label'   => esc_html__( 'Desktops > 991px', 'rtelements' ),
                'type'    => Controls_Manager::SELECT,  
                'default' => 3,         
                'options' => [
                    '1' => esc_html__( '1 Column', 'rtelements' ), 
                    '2' => esc_html__( '2 Column', 'rtelements' ),
                    '3' => esc_html__( '3 Column', 'rtelements' ),
                    '4' => esc_html__( '4 Column', 'rtelements' ),
                    '5' => esc_html__( '5 Column', 'rtelements' ),
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
                    '5' => esc_html__( '5 Column', 'rtelements' ),
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
                    '5' => esc_html__( '5 Column', 'rtelements' ),
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
            'slider_dots_color',
            [
                'label' => esc_html__( 'Navigation Dots Color', 'rsaddon' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .swiper-pagination .swiper-pagination-bullet' => 'background-color: {{VALUE}} !important;',
                ],
                'condition' => [ 'slider_dots' => 'true', ],
            ]
        );
        $this->add_control(
            'slider_dots_color_active',
            [
                'label' => esc_html__( 'Active Navigation Dots Color', 'rsaddon' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .swiper-pagination .swiper-pagination-bullet.swiper-pagination-bullet-active' => 'background-color: {{VALUE}} !important;',
                ],
                'condition' => [ 'slider_dots' => 'true', ],
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
            'pcat_nav_text_bg',
            [
                'label' => esc_html__( 'Nav BG Color', 'rsaddon' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .swiper-button-next' => 'background-color: {{VALUE}} !important;',
                    '{{WRAPPER}} .swiper-button-prev' => 'background-color: {{VALUE}} !important;',
                ],
                'condition' => [ 'slider_nav' => 'true', ],
            ]
        );
        $this->add_control(
            'pcat_nav_text_bg_hover',
            [
                'label' => esc_html__( 'Nav BG Hover Color', 'rsaddon' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .swiper-button-next:hover' => 'background-color: {{VALUE}} !important;',
                    '{{WRAPPER}} .swiper-button-prev:hover' => 'background-color: {{VALUE}} !important;',
                ],
                'condition' => [ 'slider_nav' => 'true', ],
            ]
        );
        $this->add_control(
            'pcat_nav_text_bg_icon',
            [
                'label' => esc_html__( 'Nav BG Icon Color', 'rsaddon' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .rt-slider-navigation i:before' => 'color: {{VALUE}} !important;',
                ],
                'condition' => [ 'slider_nav' => 'true', ],
            ]
        );
        $this->add_control(
            'pcat_nav_text_bg_hover_icon',
            [
                'label' => esc_html__( 'Nav BG Icon Hover Color', 'rsaddon' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .rt-slider-navigation i:hover::before' => 'color: {{VALUE}} !important;',
                ],
                'condition' => [ 'slider_nav' => 'true', ],
            ]
        );

        $this->add_control(
            'pcat_prev_text',
            [
                'label' => esc_html__( 'Previous Text', 'rsaddon' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( '<i class="rt rt-arrow-left-long"></i>', 'rsaddon' ),
                'placeholder' => esc_html__( 'Type your title here', 'rsaddon' ),
                'condition' => [ 'slider_nav' => 'true', ],
            ]
        );

        $this->add_control(
            'pcat_next_text',
            [
                'label' => esc_html__( 'Next Text', 'rsaddon' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( '<i class="rt rt-arrow-right-long"></i>', 'rsaddon' ),
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

        $this->add_control(
            'item_gap_custom',
            [
                'label' => esc_html__( 'Item Gap', 'rtelements' ),
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
                    '{{WRAPPER}} .rs-addon-slider .grid-item' => 'padding:0 {{SIZE}}{{UNIT}};',                    
                ],
            ]
        ); 
                
        $this->end_controls_section();

   
        $this->start_controls_section(
            '_section_style_grid',
            [
                'label' => esc_html__( 'Slider Style', 'rtelements' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );


        $this->add_control(
            'title_color',
            [
                'label' => esc_html__( 'Title Color', 'rtelements' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .rt--slider .single--item .content--box .slider-title' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'desc_color',
            [
                'label' => esc_html__( 'Description Color', 'rtelements' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service-one-inner-four .big-thumbnail-area .content .disc' => 'color: {{VALUE}}',
                ],
            ]
        );

      
        $this->add_control(
            'btn_style_options',
            [
                'label' => esc_html__( 'Button Styles', 'textdomain' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'btn_color',
            [
                'label' => esc_html__( 'Button Text Color', 'rtelements' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .rt--slider .single--item .content--box .slider-btn' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .service-one-inner-four a.rts-btn' => 'color: {{VALUE}}',
                    
                ],
            ]
        );
        $this->add_control(
            'btn_bg_color',
            [
                'label' => esc_html__( 'Button Background', 'rtelements' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .rt--slider .single--item .content--box .slider-btn' => 'background: {{VALUE}}',
                    '{{WRAPPER}} .service-one-inner-four a.rts-btn' => 'background: {{VALUE}}',                    
                ],
            ]
        );
        $this->add_control(
            'btn_border_color',
            [
                'label' => esc_html__( 'Button Background', 'rtelements' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [                    
                    '{{WRAPPER}} .service-one-inner-four a.rts-btn' => 'border-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'btn_hover_color',
            [
                'label' => esc_html__( 'Button Hover Color', 'rtelements' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .rt--slider .single--item .content--box .slider-btn:hover' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .service-one-inner-four a.rts-btn:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'btn_hover_bg_color',
            [
                'label' => esc_html__( 'Button Hover Background', 'rtelements' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .rt--slider .single--item .content--box .slider-btn:hover' => 'background: {{VALUE}}',
                    '{{WRAPPER}} .service-one-inner-four a.rts-btn:hover' => 'background: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'slider_btn_typography',
                'selector' => '{{WRAPPER}} .rt--slider .single--item .content--box .slider-btn',
            ]
        );

        $this->add_control(
            'slider_btn_margin',
            [
                'label' => esc_html__( 'Margin', 'textdomain' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .rt--slider .single--item .content--box .slider-btn' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ],
            ]
        );
        $this->add_control(
            'slider_btn_padding',
            [
                'label' => esc_html__( 'Padding', 'textdomain' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .rt--slider .single--item .content--box .slider-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ],
            ]
        );
        $this->add_control(
            'slider_btn_border_radius',
            [
                'label' => esc_html__( 'Border Radius', 'textdomain' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .rt--slider .single--item .content--box .slider-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {

        $settings = $this->get_settings_for_display();
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
        $item_gap        = $settings['item_gap_custom']['size'];
        $item_gap        = !empty($item_gap) ? $item_gap : '30';
        $prev_text       = $settings['pcat_prev_text'];
        $prev_text       = !empty($prev_text) ? $prev_text : '';
        $next_text       = $settings['pcat_next_text'];
        $next_text       = !empty($next_text) ? $next_text : '';
        $unique          = rand(2012,35120);

        $all_pcat = rselemetns_woocommerce_product_categories();

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

        if ( empty($settings['logo_list'] ) ) {
            return;
        }   

        ?>
        <?php $gray_scale = $settings['show_graycale']; ?>

        <div class="swiper rt-service--slider  rt_slider-<?php echo esc_attr($unique); ?> gray_<?php echo $settings['show_graycale'];?>">
           
            <div class="swiper-wrapper">                   
                <?php
                foreach ( $settings['logo_list'] as $index => $item ) :                        
                    $imgId = $item['image']['id'];
                                            
                    if($imgId ){
                        $image = wp_get_attachment_image_src($imgId, 'full')[0];                        
                    }else{
                        $IMGstyle = '';
                        $image = '';
                    }                            
                   
                    $title        = !empty($item['name']) ? $item['name'] : '';                              
                    $sub_title    = !empty($item['sub-name']) ? $item['sub-name'] : '';                              
                    $description  = !empty($item['description']) ? $item['description'] : '';
                    $btn_text     = !empty($item['btn_text']) ? $item['btn_text'] : '';
                    $target       = !empty($item['link']['is_external']) ? 'target=_blank' : '';  
                    $link         = !empty($item['link']['url']) ? $item['link']['url'] : '';
                    $img_gap = $item['img_margin'];                                            
                    
                    ?>
                    <div class="swiper-slide">
                        <div class="service-one-inner-four">
                             <div class="content">
                                <div class="icon">
                                    <?php \Elementor\Icons_Manager::render_icon( $item['logo_client'], [ 'aria-hidden' => 'true' ] ); ?>
                                    
                                </div>
                                <?php if(!empty($title)):?>
                                    <h5 class="title"><?php echo wp_kses_post($title); ?></h5>
                                <?php endif;?>
                                <div class="disc"><?php echo  $description; ?>
                                </div>
                            </div>
                            <div class="big-thumbnail-area">
                            <a href="<?php echo $link;?>" class="rts-btn btn-primary-3" <?php echo $target;?>> <?php echo  $btn_text;?></a>
                                <a href="<?php echo $link;?>" class="thumbnail">
                                <?php if(!empty($image)):?>
                                    <img src="<?php echo esc_attr($image); ?>" alt="Subtitle Icon">
                                <?php endif;?>
                                </a>
                                
                                <a href="<?php echo $link;?>" class="over_link"></a>
                            </div>
                        
                        </div>
                </div>
                    <?php
                endforeach; ?>

            </div>
            <div class="pagination-arrow navigation-center-bottom service text-center position-relative">
            <?php if( $sliderNav =='true' ) : ?>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <?php endif; ?>
            <?php
                if( $sliderDots == 'true' ) echo '<div class="swiper-pagination"></div>';
            ?>
            </div>
        </div>

        <script type="text/javascript"> 
            jQuery(document).ready(function(){
                var swiper<?php echo esc_attr($unique); ?><?php echo esc_attr($unique); ?> = new Swiper(".rt_slider-<?php echo esc_attr($unique); ?>", {				
                    slidesPerView: 1,
                    <?php echo $seffect; ?>
                    speed: <?php echo esc_attr($autoplaySpeed); ?>,
                    slidesPerGroup: 1,
                    loop: <?php echo esc_attr($infinite ); ?>,
                <?php echo esc_attr($slider_autoplay); ?>,
                spaceBetween:  <?php echo esc_attr($item_gap); ?>,
                pagination: {
                    el: ".swiper-pagination",                    
                    clickable: true,
                    },
                    centeredSlides: <?php echo esc_attr($centerMode); ?>,
                    navigation: {
                        nextEl: ".swiper-button-next",
                        prevEl: ".swiper-button-prev",
                    },
                    breakpoints: {
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
}