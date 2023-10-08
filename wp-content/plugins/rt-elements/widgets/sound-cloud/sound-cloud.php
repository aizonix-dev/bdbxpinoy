<?php
/**
 * Image widget class
 *
 */
use Elementor\Group_Control_Text_Shadow;
use Elementor\Repeater;
use Elementor\Scheme_Typography;
use Elementor\Utils;
use Elementor\Control_Media;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Typography;

defined( 'ABSPATH' ) || die();

class Reactheme_Sound_Cloud_Widget extends \Elementor\Widget_Base {
    /**    
     * @since 1.0.0
     * @access public
     *
     * @return string Widget name.
     */

    public function get_name() {
        return 'rt-react-soundcloud';
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
        return esc_html__( 'RT Sound Cloud', 'rtelements' );
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


    public function get_style_depends() {

		wp_register_style( 'rtelements-sound-cloud', plugins_url( 'sound-css/sound.css', __FILE__ ) );
		
		return [
			'rtelements-sound-cloud'
		];

	}


    public function get_categories() {
        return [ 'pielements_category' ];
    }

    public function get_keywords() {
        return [ 'logo', 'clients', 'brand', 'parnter', 'image' ];
    }

    

	protected function register_controls() {
		$this->start_controls_section(
            '_section_sound',
            [
                'label' => esc_html__( 'Sound Cloud', 'rtelements' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        ); 

        $this->add_control(
            'img',
            [
                'label' => esc_html__( 'Choose Image', 'rtelements' ),
                'type' => \Elementor\Controls_Manager::MEDIA,     
                'separator' => 'before',
            ]
        ); 

        $this->add_control(
			'title',
			[
				'label' => esc_html__( 'Title', 'rtelements' ),
				'type' => Controls_Manager::TEXT,			
			]
		);

        $this->add_control(
			'subtitle',
			[
				'label' => esc_html__( 'Sub Title', 'rtelements' ),
				'type' => Controls_Manager::TEXT,			
			]
		);

        $this->add_control(
			'sound-url',
			[   
				'label' => esc_html__( 'Sound Url "mp3" ', 'rtelements' ),
				'type' => Controls_Manager::URL,			
			]
		);
        
        $this->add_control(
			'sound-animated',
			[
				'label' => esc_html__( 'Animation', 'rtelements' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'1' => esc_html__( 'Yes', 'rtelements' ),
				'2' => esc_html__( 'No', 'rtelements' ),
				'return_value' => 'yes',
				'default' => 'no',
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
		    'sound-title-color',
		    [
		        'label' => esc_html__( 'Title Color', 'rtelements' ),
		        'type' => Controls_Manager::COLOR,		      
		        'selectors' => [
		            '{{WRAPPER}} .single-mp3-start .mid p' => 'color: {{VALUE}};',
		        ],
		    ]
		);

		$this->add_group_control(
		    Group_Control_Typography::get_type(),
		    [
		        'name' => 'sound-title-typography',
		        'selector' => '{{WRAPPER}} .single-mp3-start .mid p',
		        'scheme' => Elementor\Core\Schemes\Typography::TYPOGRAPHY_4,
		    ]
		);

        $this->add_control(
		    'sound-subtitle-color',
		    [
		        'label' => esc_html__( 'Subtitle Color', 'rtelements' ),
		        'type' => Controls_Manager::COLOR,		      
		        'selectors' => [
		            '{{WRAPPER}} .single-mp3-start .mid p span' => 'color: {{VALUE}};',
		        ],
		    ]
		);

		$this->add_group_control(
		    Group_Control_Typography::get_type(),
		    [
		        'name' => 'sound-subtitle-typography',
		        'selector' => '{{WRAPPER}} .single-mp3-start .mid p span',
		        'scheme' => Elementor\Core\Schemes\Typography::TYPOGRAPHY_4,
		    ]
		);

		$this->add_control(
		    'sound-item-bg',
		    [
		        'label' => esc_html__( 'Item Background', 'rtelements' ),
		        'type' => Controls_Manager::COLOR,		      
		        'selectors' => [
		            '{{WRAPPER}} .single-mp3-start' => 'background: {{VALUE}};',
		        ],
		    ]
		);


		$this->add_responsive_control(
		    'sound-cloud-padding',
		    [
		        'label' => esc_html__( 'Area Padding', 'rtelements' ),
		        'type' => Controls_Manager::DIMENSIONS,
		        'size_units' => [ 'px', 'em', '%' ],
		        'selectors' => [
		            '{{WRAPPER}} .single-mp3-start' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		        ],
		    ]
		);

        $this->add_responsive_control(
		    'sound-cloud-border-radius',
		    [
		        'label' => esc_html__( 'Border Raius', 'rtelements' ),
		        'type' => Controls_Manager::DIMENSIONS,
		        'size_units' => [ 'px', 'em', '%' ],
		        'selectors' => [
		            '{{WRAPPER}} .single-mp3-start' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		        ],
		    ]
		);

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display(); 
        $animate = 'animate';
        ?>       
        <div class="single-mp3-start <?php if( $settings['sound-animated'] == 'yes' ){ echo $animate; } ?>">
            <?php if( !empty($settings['img']['url']) ) : ?>
                <img class="man" src="<?php echo esc_url( $settings['img']['url']); ?>" alt="banner" loading="lazy">
            <?php endif; ?>
            <?php if( !empty( $settings['title'] ||  $settings['subtitle'] )) : ?>  
                <div class="mid">
                    <p><?php echo wp_kses_post( $settings['title'] ); ?></p>
                    <span><?php echo wp_kses_post( $settings['subtitle'] ); ?></span>
                </div>
            <?php endif; ?>
            <div id="ppbutton6" class="ppbutton fa icon-play fa-plays" data-src="<?php echo esc_url( $settings['sound-url']['url']); ?>">
                <svg width="20" height="16" viewBox="0 0 20 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M7 3C7.53125 3 8 3.46875 8 4V12C8 12.5625 7.46875 13 6.96875 13C6.4375 13 6 12.5625 6 12V4C6 3.46875 6.4375 3 7 3ZM1 7C1.53125 7 2 7.46875 2 8C2 8.5625 1.46875 9 0.96875 9C0.4375 9 0 8.5 0 8C0 7.46875 0.4375 7 1 7ZM10 0C10.5312 0 11 0.46875 11 1V15C11 15.5625 10.4688 16 9.96875 16C9.4375 16 9 15.5625 9 15V1C9 0.46875 9.4375 0 10 0ZM4 6C4.53125 6 5 6.46875 5 7V9C5 9.5625 4.46875 10 3.96875 10C3.4375 10 3 9.5625 3 9V7C3 6.46875 3.4375 6 4 6ZM19 7C19.5312 7 20 7.53125 20 8.03125C20 8.5625 19.5312 9 19 9C18.4375 9 18 8.5 18 8C18 7.46875 18.4375 7 19 7ZM13 4C13.5312 4 14 4.46875 14 5V11C14 11.5625 13.4688 12 12.9688 12C12.4375 12 12 11.5625 12 11V5C12 4.46875 12.4375 4 13 4ZM16 2C16.5312 2 17 2.46875 17 3V13C17 13.5625 16.5312 14 15.9688 14C15.4375 14 15 13.5625 15 13V3C15 2.46875 15.4375 2 16 2Z" fill="white"></path>
                </svg>
            </div>
        </div>       
    <?php
    }
}