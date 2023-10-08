<?php 
	$cat   = $settings['portfolio_category'];

	if(empty($cat)){
    	$best_wp = new wp_Query(array(
				'post_type'      => 'rt-portfolios',
				'posts_per_page' => $settings['per_page'],								
		));	  
    }   
    else{
    	$best_wp = new wp_Query(array(
			'post_type'      => 'rt-portfolios',
			'posts_per_page' => $settings['per_page'],				
			'tax_query'      => array(
		        array(
					'taxonomy' => 'rt-portfolio-category',
					'field'    => 'slug', //can be set to ID
					'terms'    => $cat //if field is ID you can reference by cat/term number
		        ),
		    )
		));	  
    }
    $details_btn_text = !empty($settings['details_btn_text']) ? $settings['details_btn_text'] : 'Case Details';
	while($best_wp->have_posts()): $best_wp->the_post();			
	$cats_show = get_the_term_list( $best_wp->ID, 'rt-portfolio-category', ' ', '<span class="separator">,</span> ');	
	
	//$icon = !empty($settings['icon']) ? '<i class="'.$settings['icon'].'"></i>': '';
	
	?>
	<div class="grid-item swiper-slide">
		<div class="portfolio-item content-overlay">			
			<?php if(has_post_thumbnail()): ?>
                <div class="portfolio-img">
                	<a href="<?php the_permalink();?>"><?php  the_post_thumbnail($settings['thumbnail_size']);?></a>
                </div>
            <?php endif;?>
            <div class="portfolio-content">
                <div class="vertical-middle">
                    <div class="vertical-middle-cell">
                    	<p class="p-category"><?php echo $cats_show; ?></p>
                    	<?php if(get_the_title()):?>
                    		<h4 class="p-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h4>
                    	<?php endif;?>		
                    </div>
                </div>
				<div class="porfolio_icon">
					<a href="<?php the_permalink(); ?>"><i class="<?php echo $settings['icon']['value']; ?>"></i></a>
				</div>
            </div>
        </div>
        
	</div>
	<?php	
	endwhile;
	wp_reset_query();  
 ?>  
