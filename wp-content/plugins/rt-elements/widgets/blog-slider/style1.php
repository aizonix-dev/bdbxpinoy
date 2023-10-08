<?php 
	$cat   = $settings['portfolio_category'];

	$primary_btn = "primary_btn";
	$secondary_btn = "secondary_btn";

	if(empty($cat)){
    	$best_wp = new wp_Query(array(
				'post_type'      => 'post',
				'posts_per_page' => $settings['per_page'],								
		));	  
    }   
    else{
    	$best_wp = new wp_Query(array(
			'post_type'      => 'post',
			'posts_per_page' => $settings['per_page'],				
			'tax_query'      => array(
		        array(
					'taxonomy' => 'category',
					'field'    => 'slug', //can be set to ID
					'terms'    => $cat //if field is ID you can reference by cat/term number
		        ),
		    )
		));	  
    }
	while($best_wp->have_posts()): $best_wp->the_post();			
	$cats_show = get_the_term_list( $best_wp->ID, 'category', ' ', '<span class="separator">,</span> ');	
	
	$full_date      = get_the_date();
		$blog_date      = get_the_date('M d y');	
		$post_admin     = get_the_author();						
	?>
	<div class="align-items-center no-gutter blog-item reactheme-blog-grid1 col-md-12 swiper-slide">
		<div class="rts-blog-h-2-wrapper">
			<div class="col-top">
				<div class="image-part">
					<a href="<?php the_permalink();?>">
						<?php the_post_thumbnail($settings['thumbnail_size']); ?>
					</a> 
				</div>
			</div>

            <?php if( !empty($settings['blog_meta_show_hide']) || !empty($settings['blog_avatar_show_hide'])){?>
            <div class="blog-meta-area">
                <ul class="blog-meta">

                    <?php if(($settings['blog_cat_show_hide'] == 'yes') ){ ?>
                        <li class="cat_list">
                           <?php the_category(', '); ?>
                        </li>
                    <?php } ?>

					<?php if(($settings['blog_meta_show_hide'] == 'yes') ){ ?>
                    <li>
                        <div class="blog-badge"> <?php echo openup_reading_time(); ?></div>
                    </li>
                    <?php } ?>
                    
                </ul>
            </div>
            <?php } ?>
			

            <div class="blog_content">
                <h3 class="title dd"><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
				<div class="blog-footer-area">
					<?php if(($settings['blog_avatar_show_hide'] == 'yes') ){ ?>
						<div class="left-area">
							<?php echo get_avatar(get_the_author_meta( 'ID' ), 40);?>
							<div class="info">
								<?php if(!empty($post_admin)){ ?>
									<h6 class="title"><?php echo esc_html($post_admin);?></h6>
									<?php if(!empty($settings['blog_author_text'])) : ?>
										<span><?php echo esc_html($settings['blog_author_text']); ?></span>
									<?php endif; ?>

								<?php } ?>									
							</div>
						</div>
						<?php } ?>
					<?php if($settings['blog_readmore_text']) : ?>
                    <div class="blog-btn react-button <?php if($settings['select_button'] == 1 ){echo $primary_btn; }else{ echo $secondary_btn; }?>">
                        <a class="rts-read-more btn-primary" href="<?php the_permalink(); ?>">
                        <?php echo $settings['blog_readmore_text'];?> 
						<?php if(!empty($settings['blog_button_icon']['value'])): ?>
							<span><i class="fa <?php echo esc_html( $settings['blog_button_icon']['value'] );?>"></i></span> 
						<?php endif; ?>
					</a>								
                    </div>
                <?php endif; ?>
				</div>
                
            </div>		
		</div>
        
    </div>
	<?php	
	endwhile;
	wp_reset_query();  
 ?>  
