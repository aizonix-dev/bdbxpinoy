<div class="react-addon-services services-<?php echo esc_attr( $settings['services_style'] ); ?>">
    <div class="working-step-nine">
        <?php if( !empty($settings['selected_icon']) || !empty($settings['selected_image']['url'])){?>
            <div class="icon-inner">

                    <?php if(!empty($settings['selected_icon'])) : ?>
                        <div class="icon">
                            <?php \Elementor\Icons_Manager::render_icon( $settings['selected_icon'], [ 'aria-hidden' => 'true' ] ); ?>
                        </div>
                    <?php endif; ?>
                    <?php if(!empty($settings['selected_image'])) :?>
                        <div class="services-icon">
                            <img src="<?php echo esc_url( $settings['selected_image']['url'] );?>" alt="image"/>
                        </div>
                    <?php endif;?>					
            </div>
        <?php }?>	 
        <?php if(!empty( $settings['title'] || $settings['text'] )) : ?>       
            <div class="wrapper-inner">
                <?php if(!empty($settings['title_prefix'])) : ?>
                    <span><?php echo $settings['title_prefix']; ?></span>
                <?php endif; ?>	
                <?php if( !empty($settings['title'])) : ?>
                    <h5 class="title"><?php echo wp_kses_post($settings['title']); ?></h5>
                <?php endif; ?>

                <?php if(!empty($settings['text'])) : ?>
                    <p class="disc"><?php echo wp_kses_post($settings['text']); ?></p>
                <?php endif; ?>

            </div>
        <?php endif; ?>
    </div>
</div>