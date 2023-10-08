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
	?>
	<div class="grid-item swiper-slide">
		
		<div class="rts-business-case-s-2">

			<a href="<?php the_permalink();?>" class="thumbnail">
				<?php the_post_thumbnail($settings['thumbnail_size']);?>
			</a>
			<div class="inner">
				<a href="<?php the_permalink();?>">
					<h5 class="title">
						<?php the_title(); ?>
					</h5>
				</a>
				<span class="p-category"><?php echo $cats_show; ?></span>
				
			</div>
			<a href="<?php the_permalink();?>" class="over_link"></a>			
		</div>        
	</div>
	<?php	
	endwhile;
	wp_reset_query();  
 ?>  
