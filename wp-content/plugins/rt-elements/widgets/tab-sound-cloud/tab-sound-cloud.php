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

class Reactheme_Tab_Sound_Cloud_Widget extends \Elementor\Widget_Base {
    /**    
     * @since 1.0.0
     * @access public
     *
     * @return string Widget name.
     */

    public function get_name() {
        return 'rt-react-tab-soundcloud';
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
        return esc_html__( 'RT Tab Sound Cloud', 'rtelements' );
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

		wp_register_style( 'rtelements-tab-sound-cloud', plugins_url( 'tab-sound-css/sound.css', __FILE__ ) );
		
		return [
			'rtelements-tab-sound-cloud'
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
            '_section_item',
            [
                'label' => esc_html__( 'Tab Items', 'rtelements' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        ); 

        $repeater = new Repeater();

        $repeater->add_control(
			'title',
			[
				'label' => esc_html__( 'Title', 'rtelements' ),
				'type' => Controls_Manager::TEXT,	
                'label_block'  => true		
			]
		);

        $repeater->add_control(
			'subtitle',
			[
				'label' => esc_html__( 'Subtitle', 'rtelements' ),
				'type' => Controls_Manager::TEXT,	
                'label_block'  => true				
			]
		);
        
        $repeater->add_control(
			'sub_des',
			[
				'label' => esc_html__( 'Sub Description', 'rtelements' ),
				'type' => Controls_Manager::TEXT,	
                'label_block'  => true				
			]
		);

        $repeater->add_control(
            'nav_img',
            [
                'label' => esc_html__( 'Nav Image', 'rtelements' ),
                'type' => \Elementor\Controls_Manager::MEDIA,   
            ]
        ); 


        $repeater->add_control(
			'sound_url',
			[   
				'label' => esc_html__( 'Sound Url "mp3" ', 'rtelements' ),
				'type' => Controls_Manager::URL,			
			]
		);

        $this->add_control(
            'item_list',
            [
                'show_label' => false,
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => '{{{ title }}}',
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

        $this->add_control(
		    'sound-item-bg',
		    [
		        'label' => esc_html__( 'Nav Item BG', 'rtelements' ),
		        'type' => Controls_Manager::COLOR,		      
		        'selectors' => [
		            '{{WRAPPER}} .rts-audio-bot-area ul li .nav-link' => 'background: {{VALUE}};',
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
        ?>       
    <div class="rts-audio-bot-area">
        <!-- audio-bot left area end -->
        <div class="nav-button-voice-bot mt--40">
            <ul class="nav nav-tabs" id="myTabs" role="tablist">

            <?php
            $unique = rand(5223,55446);
            $x = 0;

            foreach( $settings['item_list'] as $items ) {

                $x++;
                if( $x == 1 ){
                    $tab_active = 'active';
                }else{
                    $tab_active = '';
                }
                
                $voice_url = !empty( $items['sound_url']['url']) ? $items['sound_url']['url'] : ''; 
                ?>


                <li role="presentation" id="<?php echo esc_html($x);?><?php echo esc_html($unique);?>" class="ppbutton fa nav-item fa-plays" data-src="<?php echo esc_url( $voice_url ); ?>">
                    <div class="nav-link <?php echo $tab_active; ?>" id="" data-bs-toggle="tab" data-bs-target="#" role="tab" aria-controls="homes" aria-selected="true">
                        <div class="press-area">

                            <?php if(!empty($items['nav_img'])) : ?>
                                <img src="<?php echo esc_url($items['nav_img']['url']); ?>" alt="tte4am" loading="lazy">
                            <?php endif; ?>

                            <div class="info">                            
                                <?php if(!empty($items['title'])) : ?>
                                    <h6><?php echo wp_kses_post( $items['title'] ); ?></h6>
                                <?php endif; ?>

                                <?php if(!empty($items['subtitle'])) : ?>
                                    <span class="one"><?php echo wp_kses_post( $items['subtitle'] ); ?></span>
                                <?php endif; ?>

                                <?php if(!empty($items['sub_des'])) : ?>
                                    <span class="two"><?php echo wp_kses_post( $items['sub_des'] ); ?></span>
                                <?php endif; ?>
                            </div>
                            <div class="icon-audio">

                                <svg width="46" height="23" viewBox="0 0 46 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0.859814 7.4884C0.384981 7.4884 0 7.87338 0 8.34822V13.6791C0 14.1539 0.384981 14.5389 0.859814 14.5389C1.33465 14.5389 1.71963 14.1539 1.71963 13.6791V8.34822C1.71963 7.87338 1.33465 7.4884 0.859814 7.4884Z" fill="#083A5E"></path>
                                    <path d="M4.26471 3.14746C3.78987 3.14746 3.40489 3.53244 3.40489 4.00727V18.0222C3.40489 18.4971 3.78987 18.882 4.26471 18.882C4.73954 18.882 5.12452 18.4971 5.12452 18.0222V4.00727C5.12452 3.53244 4.73954 3.14746 4.26471 3.14746Z" fill="#083A5E"></path>
                                    <path d="M7.66946 4.65173C7.19463 4.65173 6.80965 5.03671 6.80965 5.51155V16.5172C6.80965 16.992 7.19463 17.377 7.66946 17.377C8.14429 17.377 8.52927 16.992 8.52927 16.5172V5.51155C8.52927 5.03671 8.14429 4.65173 7.66946 4.65173Z" fill="#083A5E"></path>
                                    <path d="M11.0744 7.4884C10.5995 7.4884 10.2146 7.87338 10.2146 8.34822V13.6791C10.2146 14.1539 10.5995 14.5389 11.0744 14.5389C11.5492 14.5389 11.9342 14.1539 11.9342 13.6791V8.34822C11.9342 7.87338 11.5492 7.4884 11.0744 7.4884Z" fill="#083A5E"></path>
                                    <path d="M14.488 0C14.0131 0 13.6282 0.384981 13.6282 0.859813V21.1686C13.6282 21.6434 14.0131 22.0284 14.488 22.0284C14.9628 22.0284 15.3478 21.6434 15.3478 21.1686V0.859813C15.3478 0.384981 14.9628 0 14.488 0Z" fill="#083A5E"></path>
                                    <path d="M17.8927 4.19604C17.4179 4.19604 17.0329 4.58103 17.0329 5.05586V16.9729C17.0329 17.4477 17.4179 17.8327 17.8927 17.8327C18.3676 17.8327 18.7525 17.4477 18.7525 16.9729V5.05586C18.7525 4.58103 18.3676 4.19604 17.8927 4.19604Z" fill="#083A5E"></path>
                                    <path d="M21.2803 5.63184C20.8055 5.63184 20.4205 6.01682 20.4205 6.49165V15.5369C20.4205 16.0117 20.8055 16.3967 21.2803 16.3967C21.7552 16.3967 22.1402 16.0117 22.1402 15.5369V6.49165C22.1402 6.01682 21.7552 5.63184 21.2803 5.63184Z" fill="#083A5E"></path>
                                    <path d="M24.7197 7.4884C24.2448 7.4884 23.8599 7.87338 23.8599 8.34822V13.6791C23.8599 14.1539 24.2448 14.5389 24.7197 14.5389C25.1945 14.5389 25.5795 14.1539 25.5795 13.6791V8.34822C25.5795 7.87338 25.1945 7.4884 24.7197 7.4884Z" fill="#083A5E"></path>
                                    <path d="M28.1073 5.63184C27.6324 5.63184 27.2475 6.01682 27.2475 6.49165V15.5369C27.2475 16.0117 27.6324 16.3967 28.1073 16.3967C28.5821 16.3967 28.9671 16.0117 28.9671 15.5369V6.49165C28.9671 6.01682 28.5821 5.63184 28.1073 5.63184Z" fill="#083A5E"></path>
                                    <path d="M31.5122 4.19604C31.0373 4.19604 30.6524 4.58103 30.6524 5.05586V16.9729C30.6524 17.4477 31.0373 17.8327 31.5122 17.8327C31.987 17.8327 32.372 17.4477 32.372 16.9729V5.05586C32.372 4.58103 31.987 4.19604 31.5122 4.19604Z" fill="#083A5E"></path>
                                    <path d="M34.9256 0C34.4508 0 34.0658 0.384981 34.0658 0.859813V21.1686C34.0658 21.6434 34.4508 22.0284 34.9256 22.0284C35.4005 22.0284 35.7855 21.6434 35.7855 21.1686V0.859813C35.7855 0.384981 35.4005 0 34.9256 0Z" fill="#083A5E"></path>
                                    <path d="M38.3304 4.65173C37.8556 4.65173 37.4706 5.03671 37.4706 5.51155V16.5172C37.4706 16.992 37.8556 17.377 38.3304 17.377C38.8052 17.377 39.1902 16.992 39.1902 16.5172V5.51155C39.1902 5.03671 38.8052 4.65173 38.3304 4.65173Z" fill="#083A5E"></path>
                                    <path d="M41.7353 7.4884C41.2605 7.4884 40.8755 7.87338 40.8755 8.34822V13.6791C40.8755 14.1539 41.2605 14.5389 41.7353 14.5389C42.2101 14.5389 42.5951 14.1539 42.5951 13.6791V8.34822C42.5951 7.87338 42.2101 7.4884 41.7353 7.4884Z" fill="#083A5E"></path>
                                    <path d="M45.1402 7.4884C44.6654 7.4884 44.2804 7.87338 44.2804 8.34822V13.6791C44.2804 14.1539 44.6654 14.5389 45.1402 14.5389C45.615 14.5389 46 14.1539 46 13.6791V8.34822C46 7.87338 45.615 7.4884 45.1402 7.4884Z" fill="#083A5E"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </li>

                <?php } ?>
                
            </ul>
        </div>
    </div>
    <?php
    }
}