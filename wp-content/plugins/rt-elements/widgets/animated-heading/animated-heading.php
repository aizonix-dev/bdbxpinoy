<?php
/**
 * Elementor Animated Heading
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */

use Elementor\Repeater;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Typography;
use Elementor\Core\Schemes\Typography;
use Elementor\Group_Control_Background;

defined( 'ABSPATH' ) || die();

class ReacThemes_Elementor_Animated_Heading_Widget extends \Elementor\Widget_Base {

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
		return 'rts-animated-heading';
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
		return esc_html__( 'RTS Animated Text', 'rtelements' );
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
		return 'glyph-icon flaticon-files-and-folders';
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
			'global_content_section',
			[
				'label' => esc_html__( 'Global', 'rtelements' ),
				'tab' => Controls_Manager::TAB_CONTENT,
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
						'icon'  => 'fa fa-align-left',
                    ],
                    'center' => [
						'title' => esc_html__( 'Center', 'rtelements' ),
						'icon'  => 'fa fa-align-center',
                    ],
                    'right' => [
						'title' => esc_html__( 'Right', 'rtelements' ),
						'icon'  => 'fa fa-align-right',
                    ],
                    'justify' => [
						'title' => esc_html__( 'Justify', 'rtelements' ),
						'icon'  => 'fa fa-align-justify',
                    ],
                ],
                'toggle' => true,
                'selectors' => [
                    '{{WRAPPER}} .rs-animated-heading' => 'text-align: {{VALUE}}'
                ]
            ]
        );
		$this->end_controls_section();


		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Normal Title', 'rtelements' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);


		$this->add_control(
			'title',
			[
				'label' => esc_html__( 'Normal Text', 'rtelements' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Animated Heading', 'rtelements' ),				
				'separator' => 'before',
			]
		);

		$this->add_control(
			'title_tag',
			[
				'label'   => esc_html__( 'Select Heading Tag', 'rtelements' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'h2',
				'options' => [						
					'h1' => esc_html__( 'H1', 'rtelements'),
					'h2' => esc_html__( 'H2', 'rtelements'),
					'h3' => esc_html__( 'H3', 'rtelements' ),
					'h4' => esc_html__( 'H4', 'rtelements' ),
					'h5' => esc_html__( 'H5', 'rtelements' ),
					'h6' => esc_html__( 'H6', 'rtelements' ),				
					
				],
			]
		);
		$this->end_controls_section();


		$this->start_controls_section(
			'animated_section',
			[
				'label' => esc_html__( 'Animated Title', 'rtelements' ),
				'tab' => Controls_Manager::TAB_CONTENT,							
			]
		);
		$this->add_control(
			'animated_text',
			[
				'type' => Controls_Manager::WYSIWYG,
				'rows' => 10,				
				'placeholder' => esc_html__( 'Animated Text here', 'rtelements' ),
			]
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'des_section',
			[
				'label' => esc_html__( 'Description Text', 'rtelements' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'content',
			[
				'type' => Controls_Manager::WYSIWYG,
				'rows' => 10,				
				'placeholder' => esc_html__( 'Type your description here', 'rtelements' ),
			]
		);
		
		$this->end_controls_section();


		$this->start_controls_section(
			'section_heading_style',
			[
				'label' => esc_html__( 'Normal', 'rtelements' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
            'title_color',
            [
                'label' => esc_html__( 'Title Color', 'rtelements' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .rs-animated-heading .title-inner .title' => 'color: {{VALUE}};',
                ],                
            ]
        );

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'label' => esc_html__( 'Title Typography', 'rtelements' ),
				
				'selector' => '{{WRAPPER}} .rs-animated-heading .title-inner .title',
			]
		);

		$this->add_group_control(
		    Group_Control_Background::get_type(),
			[
				'name' => 'background_normal',
				'label' => esc_html__( 'Title Background', 'rtelements' ),
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .rs-animated-heading .title-inner .title .cd-headline p',
			]
		);

		$this->add_control(
            'des_color',
            [
                'label' => esc_html__( 'Description Color', 'rtelements' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .description' => 'color: {{VALUE}};',
                ],                
            ]
        );
               
		$this->end_controls_section();


		$this->start_controls_section(
			'animate_heading_style',
			[
				'label' => esc_html__( 'Animated', 'rtelements' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'animate_style',
			[
				'label'   => esc_html__( 'Animated Style', 'rtelements' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'clip',
				'options' => [
					'rotate-1'    => esc_html__( 'Rotate', 'rtelements'),
					'loading-bar' => esc_html__( 'Loading-bar', 'rtelements'),
					'slide' 	  => esc_html__( 'Slide', 'rtelements'),
					'slide' 	  => esc_html__( 'Slide', 'rtelements'),
					'clip' 	  	  => esc_html__( 'Clip', 'rtelements'),
					'zoom' 	  	  => esc_html__( 'Zoom', 'rtelements'),
					'push' 	  	  => esc_html__( 'Push', 'rtelements'),
				],
			]
		);


		$this->add_control(
            'animate_title_color',
            [
                'label' => esc_html__( 'Title Color', 'rtelements' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .rs-animated-heading .title-inner .title .cd-headline p' => 'color: {{VALUE}};',
                ],                
            ]
        );

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'animate_title_typography',
				'label' => esc_html__( 'Title Typography', 'rtelements' ),
				
				'selector' => '{{WRAPPER}} .rs-animated-heading .title-inner .title .cd-headline p',
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

		$show_animate_title = ($settings['animated_text']) ? '<span class="cd-headline '.$settings['animate_style'].'">
			<div class="cd-words-wrapper">
				'.$settings['animated_text'].'
			</div>
		</span>' : '';


		$main_title     = ($settings['title']) ? '<'.$settings['title_tag'].' class="title">'.wp_kses_post($settings['title']).''.$show_animate_title.'
		</'.$settings['title_tag'].'>' : '';
		    
      ?>
        <div class="rs-animated-heading  <?php echo esc_attr($settings['align']);?>">
        	<div class="title-inner">		
	            <?php 
					echo  wp_kses_post($main_title);
				?>
	        </div>
	        <?php if ($settings['content']) { ?>
            	<div class="description">
            		<?php echo wp_kses_post($settings['content']);?>
            	</div>
        	<?php } ?>
        </div>
        <?php 	


        echo '<script>
			jQuery(document).ready(function($) {
				$(".rs-animated-heading .cd-words-wrapper p:first-child").addClass("is-visible");
			});
		</script>';	
	}
}?>