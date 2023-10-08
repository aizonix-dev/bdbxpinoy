<div class="react-addon-services services-<?php echo esc_attr( $settings['services_style'] ); ?>">
    <div class="rts-single-project-one">
        <?php if( !empty($settings['select_image_style5'])) : ?>
            <a href="<?php the_permalink(); ?>" class="thumbnail">
                <?php if(!empty($settings['select_image_style5'])) :?>
                    <img src="<?php echo esc_url( $settings['select_image_style5']['url'] );?>" alt="image"/>
                <?php endif;?>
                <?php if(!empty($settings['selected_icon'])) : ?>
                    <span class="icon">
                        <?php \Elementor\Icons_Manager::render_icon( $settings['selected_icon'], [ 'aria-hidden' => 'true' ] ); ?>
                     </span>
                <?php endif; ?>
            </a>
        <?php endif; ?>
        <div class="project-inner">
            <div class="content">
                <?php if(!empty($settings['title_prefix'])) : ?>
                    <p class="pre-title"><?php echo esc_html($settings['title_prefix']); ?></p>
                <?php endif; ?>

                <?php if(!empty($settings['title'])) : ?>
                    <a href="<?php echo esc_url($settings['services_btn_link']); ?>">
                        <h5 class="title"><?php echo esc_html($settings['title']);?></h5>
                    </a>
                <?php endif; ?>
            </div>
            <?php if(!empty($settings['services_btn_icon'])) : ?>
                <div class="icon"> 
                    <a href="<?php echo esc_url($settings['services_btn_link']); ?>">
                        <i class="<?php echo esc_attr($settings['services_btn_icon']['value']); ?>"></i>
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

