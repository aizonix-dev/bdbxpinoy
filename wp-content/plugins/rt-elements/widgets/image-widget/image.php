<?php
/**
 * Image widget class
 *
 */
use Elementor\Group_Control_Text_Shadow;
use Elementor\Scheme_Typography;
use Elementor\Control_Media;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Background;

defined( 'ABSPATH' ) || die();

class Reactheme_Image_Showcase_Widget extends \Elementor\Widget_Base {
    /**    
     * @since 1.0.0
     * @access public
     *
     * @return string Widget name.
     */

    public function get_name() {
        return 'rt-react-image';
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
        return esc_html__( 'RT Image Showcase', 'rtelements' );
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
        return 'glyph-icon flaticon-image';
    }


    public function get_categories() {
        return [ 'pielements_category' ];
    }

    public function get_keywords() {
        return [ 'logo', 'clients', 'brand', 'parnter', 'image' ];
    }

    

	protected function register_controls() {
		$this->start_controls_section(
            '_section_logo',
            [
                'label' => esc_html__( 'Image Settings', 'rtelements' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        ); 

        $this->add_control(
            'first_image',
            [
                'label' => esc_html__( 'Choose Image', 'rtelements' ),
                'type' => \Elementor\Controls_Manager::MEDIA,     
                'separator' => 'before',
            ]
        ); 


        $this->add_control(
			'image_caption',
			[
				'label' => esc_html__( 'Image Caption', 'rtelements' ),
				'type' => Controls_Manager::TEXT,			
			]
		);

  

        $this->add_control(
			'opacity',
			[
				'label' => esc_html__( 'Image Opacity', 'elementor' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 1,
						'min' => 0.10,
						'step' => 0.01,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .react-multi-image img' => 'opacity: {{SIZE}};',
				],
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
                'default' => 'left',
                'toggle' => true,
                'selectors' => [
                    '{{WRAPPER}} .react-image' => 'text-align: {{VALUE}}'
                ],
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'image_animation_reveal',
            [
                'label' => esc_html__( 'Image Reveal', 'rtelements' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Show', 'rtelements' ),
                'label_off' => esc_html__( 'Hide', 'rtelements' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );


        $this->add_control(
            'image_animation_rotate',
            [
                'label' => esc_html__( 'Image Rotate', 'rtelements' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Show', 'rtelements' ),
                'label_off' => esc_html__( 'Hide', 'rtelements' ),
                'return_value' => 'yes',
                'default' => 'no',
            ]
        ); 

        $this->add_control(
            'image_animation_scale',
            [
                'label' => esc_html__( 'Image Scale', 'rtelements' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Show', 'rtelements' ),
                'label_off' => esc_html__( 'Hide', 'rtelements' ),
                'return_value' => 'yes',
                'default' => 'no',
            ]
        ); 

        $this->add_control(
            'image_animation',
            [
                'label' => esc_html__( 'Animation', 'rtelements' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Show', 'rtelements' ),
                'label_off' => esc_html__( 'Hide', 'rtelements' ),
                'return_value' => 'yes',
                'default' => 'no',
            ]
        );

        $this->add_responsive_control(
            'react_image_size',
            [
                'label' => esc_html__( 'Image Size', 'rtelements' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
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
					'{{WRAPPER}} img.react-multi-image' => 'width: {{SIZE}}{{UNIT}};',
				],
                
            ]
        ); 
        

        $this->add_control(
            'images_translate',
            [
                'label'   => esc_html__( 'Translate Position', 'rtelements' ),
                'type'    => Controls_Manager::SELECT,
                'default' => 'veritcal',
                'options' => [                  
                    'veritcal' => esc_html__( 'Veritcal', 'rtelements'),
                    'horizontal' => esc_html__( 'Horizontal', 'rtelements'),
                ],
                'condition' => [
                    'image_animation' => 'yes',
                ],
            ]
        );

        $this->add_responsive_control(
            'rs_image_duration',
            [

                'label' => esc_html__( 'Animation Duration', 'rtelements' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                   'px' => [
                       'min' => 0,
                       'max' => 20,
                   ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .react-image.react-multi-image' => 'animation-duration: {{SIZE}}s;',
                ],
                'condition' => [
                    'image_animation' => 'yes',
                ],
            ]
        ); 

        $this->add_responsive_control(
            'react_image_animation_start_x',
            [

                'label' => esc_html__( 'Translate X Start', 'rtelements' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                   'px' => [
                       'min' => 0,
                       'max' => 100,
                   ],
                ],
                'condition' => [
                    'image_animation' => 'yes',
                    'images_translate' => 'horizontal',
                ],
            ]
        );  

        $this->add_responsive_control(
            'react_image_animation_end_x',
            [

                'label' => esc_html__( 'Translate X End', 'rtelements' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                   'px' => [
                       'min' => -100,
                       'max' => 100,
                   ],
                ],
                'condition' => [
                    'image_animation' => 'yes',
                    'images_translate' => 'horizontal',
                ],
            ]
        ); 


        $this->add_responsive_control(
            'react_image_animation_start_y',
            [

                'label' => esc_html__( 'Translate Y Start', 'rtelements' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                   'px' => [
                       'min' => 0,
                       'max' => 100,
                   ],
                   '%' => [
                        'min' => -100,
                        'max' => 100,
                    ],
                ],
                'condition' => [
                    'image_animation' => 'yes',
                    'images_translate' => 'veritcal',
                ],
            ]
        );  

        $this->add_responsive_control(
            'react_image_animation_end_y',
            [

                'label' => esc_html__( 'Translate Y End', 'rtelements' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                   'px' => [
                       'min' => -100,
                       'max' => 100,
                   ],
                   '%' => [
                        'min' => -100,
                        'max' => 100,
                    ],
                ],
                'condition' => [
                    'image_animation' => 'yes',
                    'images_translate' => 'veritcal',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
		    '_section_style_caption',
		    [
		        'label' => esc_html__( 'Caption Style', 'rtelements' ),
		        'tab' => Controls_Manager::TAB_STYLE,
		    ]
		);

        
		$this->add_control(
		    'img_caption_color',
		    [
		        'label' => esc_html__( 'Color', 'rtelements' ),
		        'type' => Controls_Manager::COLOR,		      
		        'selectors' => [
		            '{{WRAPPER}} .react-image .img_caption' => 'color: {{VALUE}};',
		        ],
		    ]
		);

         $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'caption_bg',
                'label' => esc_html__( 'Caption Background', 'elementor' ),
                'types' => [ 'classic', 'gradient' ],
                'exclude' => [ 'image' ],
                'selector' => '{{WRAPPER}} .reach_thumb_caption.react-multi-image.veritcal',  
                           
            ]
        );
       

		$this->add_group_control(
		    Group_Control_Typography::get_type(),
		    [
		        'name' => 'btn_typography',
		        'selector' => '{{WRAPPER}} .react-image .img_caption',
		        'scheme' => Elementor\Core\Schemes\Typography::TYPOGRAPHY_4,
		    ]
		);

		$this->add_responsive_control(
		    'img_caption_padding',
		    [
		        'label' => esc_html__( 'Padding', 'rtelements' ),
		        'type' => Controls_Manager::DIMENSIONS,
		        'size_units' => [ 'px', 'em', '%' ],
		        'selectors' => [
		            '{{WRAPPER}} .react-image .img_caption' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		        ],
		    ]
		);


        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display(); 
        $image_rotate =  !empty($settings['image_animation_rotate']) ? 'image-rotate' : '';
        $image_scale =  !empty($settings['image_animation_scale']) ? 'image-scale' : '';
        ?>
        <?php if(!empty($settings['image_animation_reveal'])) {
           if(!empty($settings['first_image']['url'])) : ?>
           <div class="reveal-item overflow-hidden aos-init">
                <div class="reveal-animation reveal-end reveal-primary aos aos-init" data-aos="reveal-end"></div>
                <img class="react-multi-image <?php echo esc_attr($settings['images_translate']); ?> " src="<?php echo esc_url($settings['first_image']['url']);?>" alt="image"/>
               
            </div>
           
            <?php endif;
        }else {
            ?>
                <div class="react-image <?php echo esc_attr($settings['image_animation']); ?>">
                    <div class="reach_thumb_caption react-multi-image <?php echo esc_attr($settings['images_translate']); ?> <?php echo esc_attr($image_rotate);?> <?php echo esc_attr($image_scale);?>">
                        <?php if(!empty($settings['first_image']['url'])) : ?>
                            <img src="<?php echo esc_url($settings['first_image']['url']);?>" alt="image"/>    
                        <?php endif; ?>
                        <?php if(!empty($settings['image_caption'])) : ?>
                            <span class="img_caption">
                                <?php echo esc_html( $settings['image_caption']); ?>
                            </span>
                        <?php endif; ?>
                    </div>
                    
                </div>
            <?php

        }?>
        
        <?php        
             if(!empty($settings['react_image_animation_start_x']['size'])):
                $start   = $settings['react_image_animation_start_x']['size'].$settings['react_image_animation_start_x']['unit'];   
            endif; 

            if(!empty($settings['react_image_animation_end_x']['size'])):         
            $end     = $settings['react_image_animation_end_x']['size'].$settings['react_image_animation_end_x']['unit'];  
            endif;

            if(!empty($settings['react_image_animation_start_y']['size'])):          
            $start_y = $settings['react_image_animation_start_y']['size'].$settings['react_image_animation_start_y']['unit'];  
            endif; 

            if(!empty($settings['react_image_animation_end_y']['size'])):          
            $end_y   = $settings['react_image_animation_end_y']['size'].$settings['react_image_animation_end_y']['unit'];
            endif; 
        ?>
       
    <?php
    }
}