<div class="grid-item col-lg-<?php echo esc_html($col);?> col-md-12 col-sm-12  <?php echo esc_attr($termsString);?>">
    <div class="row align-items-center no-gutter blog-item reactheme-blog-grid1">   
        <?php 
        if($settings['image_position'] == 'top'){ ?>
            <div class="col-md-12 col-sm-12 col-12">
            <div class="image-part">
                <a href="<?php the_permalink();?>">
                <?php the_post_thumbnail($settings['thumbnail_size']); ?>
                </a> 
            </div>
        </div>
        <div class="col-md-12 col-sm-12 col-12">
            <div class="blog-content">        
                <?php if( !empty($settings['blog_meta_show_hide']) || !empty($settings['blog_avatar_show_hide'])){?>
                <ul class="blog-meta">
                <?php if(($settings['blog_cat_show_hide'] == 'yes') ){ ?>
                    <li class="cat_list">
                        <i class="fas fa-tags"></i>
                        <?php the_category( ); ?>
                    </li>
                <?php } ?>
                    <?php if(($settings['blog_meta_show_hide'] == 'yes') ){ ?>
                        <?php if(!empty($blog_date)){ ?>
                        <li><i class="rt rt-clock-regular"></i><?php echo esc_html($blog_date);?></li>
                        <?php } ?>
                    <?php } ?>
                    <?php if(($settings['blog_avatar_show_hide'] == 'yes') ){ ?>
                        <?php if(!empty($post_admin)){ ?>
                        <li><i class="fa fa-user-o"></i><?php echo esc_html($post_admin);?></li>
                        <?php } ?>
                    <?php } ?>
                </ul>
                
                <?php } ?>
                
                <div class="title dd"><a href="<?php the_permalink();?>">
                    <?php $length = !empty($settings['title_word_count']) ? $settings['title_word_count'] : '22'; ?>
                    <?php echo wp_trim_words( get_the_title(), $length, '...' ); ?></a>
                </div>
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
        <?php }else{ ?>
            <div class="col-md-4 col-sm-4 col-4">
            <div class="image-part">
                <a href="<?php the_permalink();?>">
                <?php the_post_thumbnail($settings['thumbnail_size']); ?>
                </a> 
            </div>
        </div>
        <div class="col-md-8 col-sm-8 col-8">
            <div class="blog-content">        
                <?php if( !empty($settings['blog_meta_show_hide']) || !empty($settings['blog_avatar_show_hide'])){?>
                <ul class="blog-meta">
                <?php if(($settings['blog_cat_show_hide'] == 'yes') ){ ?>
                    <li class="cat_list">
                        <i class="fas fa-tags"></i>
                        <?php the_category( ); ?>
                    </li>
                <?php } ?>
                    <?php if(($settings['blog_meta_show_hide'] == 'yes') ){ ?>
                        <?php if(!empty($blog_date)){ ?>
                        <li><i class="rt rt-clock-regular"></i><?php echo esc_html($blog_date);?></li>
                        <?php } ?>
                    <?php } ?>
                    <?php if(($settings['blog_avatar_show_hide'] == 'yes') ){ ?>
                        <?php if(!empty($post_admin)){ ?>
                        <li><i class="fa fa-user-o"></i><?php echo esc_html($post_admin);?></li>
                        <?php } ?>
                    <?php } ?>
                </ul>
                
                <?php } ?>
                
                <div class="title dd"><a href="<?php the_permalink();?>">
                    <?php $length = !empty($settings['title_word_count']) ? $settings['title_word_count'] : '22'; ?>
                    <?php echo wp_trim_words( get_the_title(), $length, '...' ); ?></a>
                </div>
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
        <?php } ?>
        
    </div>
</div>