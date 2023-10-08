<?php 
    $cat = $settings['portfolio_category'];
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    $details_btn_text = !empty($settings['details_btn_text']) ? $settings['details_btn_text'] : 'Case Studies';
	if($settings['show_releted_post'] == 'yes' ){

		$all_term_pf = get_the_terms( $post->ID, 'rt-portfolio-category' );
		$releted_cat = [];
		if( is_array($all_term_pf) ){
			foreach ($all_term_pf as $terms_pf ) {
				$releted_cat[] = $terms_pf->slug;
			}
		}
			$best_wp = new wp_Query(array(
				'post_type'      => 'rt-portfolios',
				'posts_per_page' => $settings['per_page'],
				'post__not_in' => array( get_the_ID() ),
				'tax_query'      => array(
					array(
						'taxonomy' => 'rt-portfolio-category',
						'field'    => 'slug', //can be set to ID
						'terms'    => $releted_cat //if field is ID you can reference by cat/term number
					),
				)
			));
	}else {
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
	}

    $x = 1;

	while($best_wp->have_posts()): $best_wp->the_post();
	$cats_show = get_the_term_list( $best_wp->ID, 'rt-portfolio-category', ' ', '<span class="separator">,</span> ');	
	$termsArray  = get_the_terms( $best_wp->ID, "rt-portfolio-category" );  //Get the terms for this particular item
	$termsString = ""; //initialize the string that will contain the terms
	$termsSlug   = "";

	foreach ( $termsArray as $term ) { 
		$termsString .= 'filter_'.$term->slug.' '; 
		$termsSlug .= $term->name;
	}		

	$content       = get_the_content();
	
								
	?>	

	<div class="col-lg-<?php echo esc_html($settings['portfolio_columns']);?> col-md-6 col-xs-1 grid-item <?php echo $termsString;?>">

		<div class="rts-business-case-s-2 portfolio-item">		
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
	$x++;	
	endwhile;
	wp_reset_query();