<div class="react-addon-services services-<?php echo esc_attr( $settings['services_style'] ); ?>">
    <div class="services-part">
		
			<div class="contents">
				<div class="icon">
					<?php \Elementor\Icons_Manager::render_icon( $settings['selected_icon'], [ 'aria-hidden' => 'true' ] ); ?>
				</div>
					<?php if(!empty($settings['title_prefix'])) : ?>
		    			<span class="pretitle"><?php echo $settings['title_prefix']; ?></span>
		    		<?php endif; ?>	
				<h4 class="title"><?php echo wp_kses_post($settings['title']);?></h4>
				<?php echo wp_kses_post($settings['text']);?>
			</div>
			<div class="product-thumb">
			<?php 
				$link_open = $settings['services_btn_link_open'] == 'yes' ? 'target=_blank' : ''; 		    		 
				$icon_position = $settings['services_btn_icon_position'] == 'before' ? 'icon-before' : 'icon-after';
			?>
			
			   <div class="react-button">
				<a class="rts-btn btn-primary <?php echo esc_html($icon_position); ?>" href="<?php echo esc_url($settings['services_btn_link']);?>" <?php echo wp_kses_post($link_open); ?>>
				
						<?php echo esc_html($settings['services_btn_text']);?>   						
				
				
				</a>	  
			</div>  
			<?php if(!empty($settings['select_image_style5'])) :?>
				<div class="thumbnail">
					<img src="<?php echo esc_url( $settings['select_image_style5']['url'] );?>" alt="image"/>
				</div>
			<?php endif;?>	
			</div>
		
	</div>
</div>