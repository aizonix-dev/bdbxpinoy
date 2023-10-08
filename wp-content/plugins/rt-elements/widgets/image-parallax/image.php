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

class Reactheme_Image_Parallax_Widget extends \Elementor\Widget_Base {
    /**    
     * @since 1.0.0
     * @access public
     *
     * @return string Widget name.
     */

    public function get_name() {
        return 'rt-parallax-image';
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
        return esc_html__( 'RT Image Parallax', 'rtelements' );
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
            'images_translate',
            [
                'label'   => esc_html__( 'Translate Position', 'rtelements' ),
                'type'    => Controls_Manager::SELECT,
                'default' => 'horizontal',
                'options' => [                  
                    
                    'horizontal' => esc_html__( 'Horizontal', 'rtelements'),
                    'veritcal' => esc_html__( 'Veritcal', 'rtelements'),
                ],
                
            ]
        );

       

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display(); 
       
        ?>

        <?php if($settings['images_translate'] == 'horizontal') : ?>
       
        <div class="rt-image">
            <?php if(!empty($settings['first_image']['url'])) : ?>
                <img class="react-parallax-image" src="<?php echo esc_url($settings['first_image']['url']);?>" alt="image"/>
            <?php endif; ?>
        </div>
        <?php endif; ?>
        <?php if($settings['images_translate'] == 'veritcal') : ?>
        <div class="rt-image">
            <?php if(!empty($settings['first_image']['url'])) : ?>
                <img class="react-parallax-image2" src="<?php echo esc_url($settings['first_image']['url']);?>" alt="image"/>
            <?php endif; ?>
        </div>
   
       
    <?php endif;
    }
}