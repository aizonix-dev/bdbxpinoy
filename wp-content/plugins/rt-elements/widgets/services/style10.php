<div class="react-addon-services services-<?php echo esc_attr( $settings['services_style'] ); ?>">
	<div class="rts-single-process-wrapper-eight">
		<?php if( !empty($settings['selected_icon']) || !empty($settings['selected_image']['url'])) : ?>
			<div class="icon-1">
			<?php if(!empty($settings['selected_icon'])) : ?>
					<?php \Elementor\Icons_Manager::render_icon( $settings['selected_icon'], [ 'aria-hidden' => 'true' ] ); ?>
				<?php endif; ?>
				<?php if(!empty($settings['selected_image'])) :?>
						<img src="<?php echo esc_url( $settings['selected_image']['url'] );?>" alt="image"/>
				<?php endif;?>	
			</div>
		<?php endif; ?>
		<?php if(!empty($settings['title'])) : ?>
			<h5 class="title"><?php echo esc_html($settings['title']);?></h5>
		<?php endif; ?>
		<?php if(!empty($settings['text'])) : ?>
			<p class="disc"><?php echo wp_kses_post($settings['text']); ?></p>
		<?php endif; ?>

		<?php if(!empty($settings['services_btn_icon']['value'])) : ?>
			<div class="icon">
				<i class="<?php echo esc_attr($settings['services_btn_icon']['value']); ?>"></i>
			</div>
		<?php endif; ?>
	</div>  
</div>

