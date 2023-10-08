<div class="react-addon-services services-<?php echo esc_attr( $settings['services_style'] ); ?>">
    <div class="services-part">
    	<?php if( !empty($settings['selected_icon']) || !empty($settings['selected_image']['url'])){?>
    		<div class="services-icon">
	    		<?php if(!empty($settings['selected_icon'])) : ?>
					<?php \Elementor\Icons_Manager::render_icon( $settings['selected_icon'], [ 'aria-hidden' => 'true' ] ); ?>
	    		<?php endif; ?>
	    		<?php if(!empty($settings['selected_image'])) :?>
	    			<img src="<?php echo esc_url( $settings['selected_image']['url'] );?>" alt="image"/>
	    		<?php endif;?>
    		</div>	
    	<?php } ?>		    		       
	    <div class="services-text">
	    	<?php if(!empty($settings['title'])){ ?>
		    	<div class="services-title">	
		    		<?php if(!empty($settings['title_prefix'])) : ?>
		    			<span class="service_number"><?php echo $settings['title_prefix']; ?></span>
		    		<?php endif; ?>
					
		    		<?php if(!empty($settings['title_link'])) : 
		    			$link_open = $settings['link_open'] == 'yes' ? 'target=_blank' : '';
		    		?>					    							    			
		    		<<?php echo esc_html($settings['title_tag']);?>  <?php  echo wp_kses_post($this->print_render_attribute_string( 'title' )); ?>><?php echo esc_html($settings['title']);?></<?php echo esc_html($settings['title_tag']);?>>
		    		<?php else: ?>
		    			<<?php echo esc_html($settings['title_tag']);?> <?php  echo wp_kses_post($this->print_render_attribute_string( 'title' )); ?>> <?php echo esc_html($settings['title']);?></<?php echo esc_html($settings['title_tag']);?>>
		    		<?php endif; ?>				    		
		    	</div>
	    	<?php } ?>	

	    	<?php if(!empty($settings['text'])) : ?>
	    		<p <?php  echo wp_kses_post($this->print_render_attribute_string( 'text' )); ?>>  <?php echo wp_kses_post($settings['text']);?></p>	
	    	<?php endif; ?>	
	    </div>
		<?php if(!empty($settings['service_box_batch'])){ ?>
			<div class="batch-number">
				<span><?php echo esc_html($settings['service_box_batch']); ?></span>
			</div>
		<?php } ?>
	</div>
</div>