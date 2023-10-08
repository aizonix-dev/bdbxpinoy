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
class Reactheme_Elementor_Marque_Testimonial_Widget  extends \Elementor\Widget_Base {
  
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
        return 'rt-marque-testimonial';
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
        return esc_html__( 'RT Marque Testimonial', 'rtelements' );
    }

    public function get_style_depends() {

		wp_register_style( 'rtelements-style-slider', plugins_url( 'marque-testimonial-css/slider.css', __FILE__ ) );
		
		return [
			'rtelements-style-slider'
		];

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
        return [ 'slider' ];
    }
    protected function register_controls() {
        
        $this->start_controls_section(
            '_section_marque_tes',
            [
                'label' => esc_html__( 'Marque Content', 'rtelements' ),
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
		
		$repeater->add_control(
            'sub-name',
            [
                'label' => esc_html__('Sub Title', 'rtelements'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__( 'Designation', 'rtelements'),
                'label_block' => true,
                'placeholder' => esc_html__( 'designation', 'rtelements' ),
                'separator'   => 'before',
            ]
        );

        $repeater->add_control(
            'name',
            [
                'label' => esc_html__('Title', 'rtelements'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__( 'Testimonial Name', 'rtelements'),
                'label_block' => true,
                'placeholder' => esc_html__( 'Name', 'rtelements' ),
                'separator'   => 'before',
            ]
        );

        $repeater->add_control(
            'des',
            [
                'label' => esc_html__('Description', 'rtelements'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__( 'So glad i found openup!! It has made my blog tasks a billion times more enjoyable which is an emotion way beyond.', 'rtelements'),
                'label_block' => true,
                'placeholder' => esc_html__( 'Write your Description here', 'rtelements' ),
                'separator'   => 'before',
            ]
        );

        $repeater->add_control(
            'rt_marque_test_rating',
            [
                'label'   => esc_html__( 'Select Rating', 'rtelements' ),
                'type'    => Controls_Manager::SELECT,
                'options' => [					
                    '1' => esc_html__( '1', 'rtelements'),
                    '1.5' => esc_html__( '1.5', 'rtelements'),
                    '2' => esc_html__( '2', 'rtelements'),
                    '2.5' => esc_html__( '2.5', 'rtelements'),
                    '3' => esc_html__( '3', 'rtelements'),
                    '3.5' => esc_html__( '3.5', 'rtelements'),
                    '4' => esc_html__( '4', 'rtelements'),
                    '4.5' => esc_html__( '4.5', 'rtelements'),
                    '5' => esc_html__( '5', 'rtelements'),
                ],
            ]
        );

        $this->add_control(
            'item_list',
            [
                'show_label' => false,
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => '{{{ name }}}',
            ]
        );   

        $this->add_control(
            'rt_marque_direction',
            [
                'label'   => esc_html__( 'Animate Direction', 'rtelements' ),
                'type'    => Controls_Manager::SELECT,
                'default' => 1,
                'options' => [					
                    '1' => esc_html__( 'Left', 'rtelements'),
                    '2' => esc_html__( 'Right', 'rtelements'),
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
                    '{{WRAPPER}} .marque-single-item .top .author .info-content .title' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'selector' => '{{WRAPPER}} .marque-single-item .top .author .info-content .title',
            ]
        );

        $this->add_control(
            'subtitle_color',
            [
                'label' => esc_html__( 'Sub Title Color', 'rtelements' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .marque-single-item .top .author .info-content span.deg' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'subtitle_typography',
                'selector' => '{{WRAPPER}} .marque-single-item .top .author .info-content span.deg',
            ]
        );

        $this->add_control(
            'rating_title_color',
            [
                'label' => esc_html__( 'Rating Color', 'rtelements' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .marque-single-item .top .review-rating .star-rating .star' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'rating_typography',
                'selector' => '{{WRAPPER}} .marque-single-item .top .review-rating .star-rating .star',
            ]
        );
        $this->add_responsive_control(
			'rating_width',
			[
				'label' => esc_html__( 'Rating Width', 'textdomain' ),
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
					'{{WRAPPER}} .marque-single-item .top .review-rating .star-rating .star' => 'width: {{SIZE}}{{UNIT}} !important;',
				],
			]
		);


        $this->add_control(
            'des__styles',
            [
                'label' => esc_html__( 'Description Styles', 'rtelements' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'des__color',
            [
                'label' => esc_html__( 'Color', 'rtelements' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .marque-single-item.left .body p' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'des__typography',
                'selector' => '{{WRAPPER}} .marque-single-item.left .body p',
            ]
        );
        $this->end_controls_section();


    }
    protected function render() {
        $settings = $this->get_settings_for_display();
        $animate_left = "left";
        $animate_right = "right";
        
    ?>
        <div class="single-testimonials-marquree">
            <div class="container">
                <div class="row">
                <?php 
                foreach ( $settings['item_list'] as $item ) : ?>
                    
                   <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                        <div class="marque-single-item <?php if( $settings['rt_marque_direction'] == 1 ){ echo esc_attr($animate_left); }else{ echo esc_attr( $animate_right) ; } ?>">
                            <div class="top">
                                <div class="author">
                                    <?php if( !empty($item['image']) ) : ?>
                                        <img src="<?php echo esc_url($item['image']['url']); ?>" alt="team">
                                    <?php endif; ?>

                                    <div class="info-content">

                                        <?php if( !empty($item['name']) ) : ?>
                                            <h6 class="title"><?php echo wp_kses_post($item['name']); ?></h6>
                                        <?php endif; ?>

                                        <?php if( !empty($item['sub-name']) ) : ?>
                                            <span class="deg"><?php echo wp_kses_post($item['sub-name']); ?></span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="review-rating">
                                    <?php
                                        $args = array(
                                            'rating' => $item['rt_marque_test_rating'],
                                            'type' => 'rating',
                                            'number' => 1234,
                                            );
                                        wp_star_rating( $args ); 
                                    ?>
                                </div>
                            </div>
                            <?php if( !empty($item['des']) ) : ?>
                                <div class="body">
                                    <p><?php echo wp_kses_post( $item['des'] ); ?></p>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php 
                endforeach; ?>

                </div>
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
                    renderBullet: function (index, className) {
                        return '<span class="' + className + '">' + (index+1) + '</span>';
                    },
                    },
                    centeredSlides: <?php echo esc_attr($centerMode); ?>,
                    navigation: {
                        nextEl: ".rts-next<?php echo esc_attr($unique); ?>",
                        prevEl: ".rts-prev<?php echo esc_attr($unique); ?>",
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