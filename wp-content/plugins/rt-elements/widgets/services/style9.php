<div class="react-addon-services services-<?php echo esc_attr( $settings['services_style'] ); ?>">
	<div class="service-area-eight">
		<?php if( !empty($settings['select_image_style5'])) : ?>
			<div class="thumbnail">
				<?php if(!empty($settings['select_image_style5'])) :?>
					<img src="<?php echo esc_url( $settings['select_image_style5']['url'] );?>" alt="image"/>
				<?php endif;?>
			</div>
		<?php endif; ?>
		<div class="badge-area">

			<?php if(!empty($settings['title'])) : ?>
				<span><?php echo esc_html($settings['title']);?></span>
			<?php endif; ?>

			<div class="icon">
				<?php if(!empty($settings['selected_icon'])) : ?>
					<?php \Elementor\Icons_Manager::render_icon( $settings['selected_icon'], [ 'aria-hidden' => 'true' ] ); ?>
				<?php endif; ?>
			</div>
		</div>
		<div class="hov-area">
			<div class="badge">
				<?php if(!empty($settings['selected_icon'])) : ?>
					<?php \Elementor\Icons_Manager::render_icon( $settings['selected_icon'], [ 'aria-hidden' => 'true' ] ); ?>
				<?php endif; ?>
			</div>
			<?php if(!empty($settings['title'])) : ?>
				<h5 class="title"><?php echo esc_html($settings['title']);?></h5>
			<?php endif; ?>
			<?php if(!empty($settings['text'])) : ?>
				<p class="disc"><?php echo wp_kses_post($settings['text']); ?></p>
			<?php endif; ?>
			<?php if(!empty($settings['services_btn_text'])) : ?>
				<div class="button">
					<a href="<?php echo esc_url($settings['services_btn_link']); ?>">
						<?php echo wp_kses_post($settings['services_btn_text']); ?> 
						<i class="<?php echo esc_attr($settings['services_btn_icon']['value']); ?>"></i>
					</a>
				</div>
			<?php endif; ?>
		</div>
	</div>
</div>

