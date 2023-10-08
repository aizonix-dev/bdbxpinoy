<div class="swiper-slide">
    <div  class="single--item">
        
        <div class="review-rating">
             <?php
                $args = array(
                    'rating' => $item['rt_slider_style'],
                    'type' => 'rating',
                    'number' => 1234,
                    );
                wp_star_rating( $args ); 
            ?>

        </div>   

        <?php if(!empty($description)) : ?>
            <div class="review-body">
                <div class="desc">
                    <?php echo wp_kses_post($description); ?>
                </div>
            </div>
        <?php endif; ?>

        <div class="content--box">
            <div class="content-text-thumb">
                <div class="banner-image">
                        <img class="banner-img" src="<?php echo esc_url($image); ?>" alt="Product Image">
                </div>
                <div class="description">
                    <?php if(!empty($title)):?>
                        <h2 class="slider-title"><?php echo wp_kses_post($title); ?></h2>
                    <?php endif;?>
                    <?php if(!empty($sub_title)):?>
                        <p class="slider-subtitle"><?php echo wp_kses_post($sub_title); ?></p>
                    <?php endif;?>
                </div>   
            </div>
            <div class="logo-end">   
                <?php if(!empty($image2)): ?>       
                    <img class="banner-img2" src="<?php echo esc_url($image2); ?>" alt="Product Image">
                <?php endif; ?>
                <?php if(!empty($sub_img_link)): ?>
                    <img class="quote" src="<?php echo $sub_img_link;?>" alt="quote">
                <?php endif; ?>   
            </div>          
        </div>
    </div>
</div> 