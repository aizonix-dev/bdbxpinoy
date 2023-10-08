<div class="swiper-slide">
    <div class="vision-main-wrapper">
        <div class="working-process-main-wrapper">
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <div class="thumbnail-main-wrapper">
                        <img class="banner-img" src="<?php echo esc_url($image); ?>" alt="Product Image">
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="slider-content">

                       <span class="trans"><?php echo wp_kses_post ( $item['step-number'] ); ?></span>

                        <?php if(!empty($title)):?>
                            <h2 class="slider-title"><?php echo wp_kses_post($title); ?></h2>
                        <?php endif;?>

                        <?php if(!empty($description)) : ?>
                            <div class="desc">
                                <?php echo wp_kses_post($description); ?>
                            </div>
                        <?php endif; ?>

                        <?php if(!empty($btn_text)):?>
                            <a class="rts-btn btn-primary" <?php echo esc_attr($target); ?> href="<?php echo esc_url($link); ?>"><?php echo wp_kses_post($btn_text); ?></a>
                        <?php endif;?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>