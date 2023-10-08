<div class="grid-item col-lg-<?php echo esc_html($col);?> col-md-4 col-sm-6  <?php echo esc_attr($termsString);?>">
   <div class="align-items-center no-gutter blog-item reactheme-blog-grid1">     
         <div class="blog-inner">                            
                <div class="image-part <?php echo $settings['image_gray'];?>">
                
                    <a href="<?php the_permalink();?>">
                        <?php the_post_thumbnail($settings['thumbnail_size']); ?>
                    </a> 
                    <?php if(($settings['blog_cat_show_hide'] == 'yes') ){ ?>
                        <div class="cat_list">
                            <?php the_category( ); ?>
                        </div>
                    <?php } ?>
                </div>              
            
                <div class="blog-content">                                    
                    <?php if( !empty($settings['blog_meta_show_hide']) || !empty($settings['blog_avatar_show_hide'])){?>
                        <ul class="blog-meta">
                        <?php if(($settings['blog_meta_show_hide'] == 'yes') ){ ?>
                                <?php if(!empty($full_date)){ ?>
                                <li>  <i class="far fa-clock"></i> <?php echo esc_html($full_date);?></li>
                                <?php } ?>
                            <?php } ?>
                            <?php if(($settings['blog_avatar_show_hide'] == 'yes') ){ ?>
                                <?php if(!empty($post_admin)){ ?>
                                <li><i class="rt-user"></i> <?php echo esc_html($post_admin);?></li>
                                <?php } ?>
                            <?php } ?>
                            
                        </ul>
                        <?php } ?>
                        <div class="bottom-part">
                            <div class="title dd"><a href="<?php the_permalink();?>"><?php the_title();?></a></div>
                                <?php if(($settings['blog_content_show_hide'] == 'yes') ){ ?>
                                    <p class="txt"><?php echo wp_trim_words( get_the_content(), $limit, '...' ); ?></p>
                                <?php } ?>
                            <?php if($settings['blog_readmore_show_hide'] == 'yes') { ?>
                                <div class="btn-part">
                                    <a class="readon-arrow" href="<?php the_permalink(); ?>">
                                        <?php echo esc_html($settings['blog_btn_text']);?> <i class="fa <?php echo esc_html( $settings['blog_btn_icon'] );?>"></i>
                                    </a>
                                </div>
                            <?php } ?>
                        </div>
                </div>          
            </div>                      
                                                                
    </div>
</div>