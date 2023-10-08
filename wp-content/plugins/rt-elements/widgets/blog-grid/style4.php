<div class="grid-item col-lg-<?php echo esc_html($col);?> col-md-4 col-sm-6  <?php echo esc_attr($termsString);?>">
    <div class="align-items-center no-gutter blog-item reactheme-blog-grid1">
        <div class="col-md-12">
            <div class="image-part">
                <a href="<?php the_permalink();?>">
                    <?php the_post_thumbnail($settings['thumbnail_size']); ?>
                </a>
                <?php if(($settings['blog_meta_show_hide'] == 'yes') ){ ?>
                    <?php if(!empty($full_date)){ ?>
                        <div class="date-full">
                            <div class="day"><?php echo get_the_date('d');?></div>
                            <div class="month"><?php echo get_the_date('M');?></div>
                        </div>
                    <?php } ?>
                <?php } ?>
                <div class="meta-info">
                <?php if(($settings['blog_avatar_show_hide'] == 'yes') ){ ?>
                        <?php if(!empty($post_admin)){                         
                            ?>
                        <div class="author-info d-flex align-items-center">   
                            <i class="fal fa-user-circle"></i>                    
                            <div class="info">
                                <p class="author-name m-0"><?php echo esc_html($post_admin);?></p>                           
                            </div>
                        </div>
                        <?php } ?>
                    <?php } ?>
                <?php if( !empty($settings['blog_meta_show_hide']) || !empty($settings['blog_avatar_show_hide'])){?>
                <ul class="blog-meta d-flex align-items-center">

                    <?php if(($settings['blog_cat_show_hide'] == 'yes') ){ ?>
                        <i class="fal fa-tags"></i>
                        <div class="cat_list">
                            
                            <?php the_category( ); ?>
                        </div>
                    <?php } ?>
                </ul>
                <?php } ?>
            
                </div>
            
            </div>
        </div>
        <div class="col-md-12">
            <div class="blog-content">        
            
                <h3 class="title dd"><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
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