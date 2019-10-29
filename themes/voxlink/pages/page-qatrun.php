<?php
/*
Template Name: Qatrun
*/
get_header(); ?>

<div class="qatrun-top-banner" style="background-image: url(<?php the_field('banner-img') ?>);">
        <div class="inner">
            <div class="descr">
                <h1><?php the_field('banner-title') ?></h1>
                <p class='banner_p'><?php the_field('banner-descr') ?></p>
                <span><img src="/wp-content/themes/voxlink/img/qatrun/mouse.png" alt=""></span>
            </div>
        </div>
    </div>

    <div class="qatrun-block2">
        <div class="inner">
            <div class="qat-row">
                <div class="qat-line"><img src="/wp-content/themes/voxlink/img/qatrun/qat-line.png" alt=""></div>
                <?php if(get_field('block1-list')): ?>

                    <?php while(the_repeater_field('block1-list')): ?>

                            <div class="qat-item">
                                <div class="qat-head">
                                    <img src="<?php echo the_sub_field('img'); ?>" alt="">
                                    <span class="qat-head__symbol"><?php echo the_sub_field('symbol'); ?></span>
                                </div>
                                <div class="qat-body">
                                    <span class="qat-body-title"><?php echo the_sub_field('title'); ?></span>
                                    <span class="qat-body-info"><?php echo the_sub_field('info'); ?></span>
                                    <span class="qat-body-descr"><?php echo the_sub_field('descr'); ?></span>
                                </div>
                            </div>

                    <?php endwhile; ?>

                <?php endif; ?>
                <span class="block2-show">Время</span>
            </div>
        </div>
    </div>

    <div class="qatrun-block3">
        <div class="inner">
            <div class="qat-row">
                <div class="qatb3-descr">
                    <div class="qat-head">
                        <span class="qat-head-c">C</span>
                        <span class="qat-head-spec">+</span>
                        <span class="qat-head-p">P</span>
                        <span class="qat-head-spec">=</span>
                        <span class="qat-head-result"><img src="/wp-content/themes/voxlink/img/qatrun/q-text.png" alt=""></span>
                    </div>
                    <div class="qat-body">
                        <span class="qat-body-text"><?php the_field('block2-text') ?></span>
                    </div>
                </div>
                <div class="qatb3-img">
                    <img src="<?php the_field('block2-img') ?>" alt="">
                </div>
            </div>
        </div>
    </div>

    <div class="qatrun-video1">
        <video controls width="100%" height="100%" id="video1">
            <source src="<?php the_field('video1') ?>" type="video/mp4">
        </video>
        <div class="qatrun-video1-banner" style="background-image: url(/wp-content/themes/voxlink/img/qatrun/bg-video1.png);">
            <div class="play-wrap">
                <a href="#" class="video1-play"><span><img src="/wp-content/themes/voxlink/img/qatrun/play.png" alt=""></span></a>
            </div>
        </div>
    </div>

    <div class="qatrun-block4">
        <span class="qatb4-show">
            qatrun
        </span>
        <div class="inner">
            <div class="qat-row">
                <?php if(get_field('system-list')): ?>

                <?php while(the_repeater_field('system-list')): ?>

                        <div class="qatb4-item">
                            <div class="qat-head">
                                <img src="<?php echo the_sub_field('img'); ?>" alt="">
                                <span class="qat-head-title"><?php echo the_sub_field('title'); ?></span>
                            </div>
                            <div class="qat-body">
                                <span class="qat-body-text"><?php echo the_sub_field('text'); ?></span>
                            </div>
                        </div>

                <?php endwhile; ?>

                <?php endif; ?>
            </div>
            <div class="qatb4-bottom">
                <span class="bot-thumb"><img src="/wp-content/themes/voxlink/img/qatrun/lamp.png" alt=""></span>
                <span class="bot-text"><?php the_field('lamp-text') ?></span>
            </div>
        </div>
    </div>

    <div class="qatrun-block5">
        <div class="inner">
            <div class="qat-row">
                <div class="qatb5-descr">
                    <span class="qatb5-title"><?php the_field('sob-title') ?></span>
                    <span class="qatb5-info"><?php the_field('sob-text') ?></span>
                    <img src="<?php the_field('sob-img') ?>" alt="">
                </div>
                <div class="qatb5-list">
                    <?php if(get_field('sob-list')): ?>

                        <?php while(the_repeater_field('sob-list')): ?>

                            <div class="qatb5-item">
                                <span class="qatb5-item-num"><?php echo the_sub_field('num'); ?></span>
                                <img src="<?php echo the_sub_field('img'); ?>" alt="">
                                <span class="qatb5-item-title"><?php echo the_sub_field('title'); ?></span>
                            </div>

                        <?php endwhile; ?>

                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <div class="qatrun-form1" style="background: #3f5766 url(/wp-content/themes/voxlink/img/qatrun/form-bg.png) no-repeat center right;">
        <div class="inner">
            <div class="qat-row">
                <div class="qat-form-descr">
                    <span class="qat-form-title">
                        <?php the_field('title-form1') ?>
                    </span>
                    <span class="qat-form-info"><?php the_field('text-form1') ?></span>
                </div>
                <div class="qat-form-form">
                    <form>
                        <div class="form__field"><input type="text" placeholder="Введите имя"></div>
                        <div class="form__field"><input type="text" placeholder="Введите телефон"><button type="submit"
                                class="btn form-sub"><img src="<?php get_bloginfo('template_url'); ?>/img/qatrun/ar.png" alt=""></button></div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="qatrun-block6">
        <div class="inner">
            <div class="qatb6-title">
                <h3><?php the_field('tool-title') ?></h3>
            </div>
            <div class="qat-content">
                <img src="<?php the_field('tool-img') ?>" alt="">
                <?php if(get_field('tool-list')): ?>

                <?php while(the_repeater_field('tool-list')): ?>

                    <div class="block-circle bc<?php echo the_sub_field('num'); ?>"><?php echo the_sub_field('text'); ?></div>

                <?php endwhile; ?>

                <?php endif; ?>
            </div>
        </div>
    </div>

    <div class="qatrun-block7">
        <div class="inner">
            <div class="qatb7-title">
                <h3><?php the_field('voz-title') ?></h3>
            </div>
            <div class="qat-row">
                <div class="qat-line">
                    <div class="qatb7-descr">
                        <span class="num"><?php the_field('num-voz1') ?></span>
                        <span class="qatb7-descr-title"><?php the_field('title-voz1') ?></span>
                        <span class="qatb7-info"><?php the_field('text-voz1') ?></span>
                    </div>
                    <div class="qatb7-content">
                        <img src="<?php the_field('img-voz1') ?>" alt="">
                    </div>
                </div>
                <div class="qat-line">
                    <div class="qatb7-descr">
                        <span class="num"><?php the_field('num-voz2') ?></span>
                        <span class="qatb7-descr-title"><?php the_field('title-voz2') ?></span>
                        <span class="qatb7-info"><?php the_field('text-voz2') ?></span>
                    </div>
                    <div class="qatb7-content">
                        <div class="qatb7-slider">
                            <?php if(get_field('slider-voz')): ?>

                            <?php while(the_repeater_field('slider-voz')): ?>

                                <div class="item">
                                    <img src="<?php echo the_sub_field('img'); ?>" alt="">
                                </div>

                            <?php endwhile; ?>

                            <?php endif; ?>
                        </div>
                        <div class="sl-controls">
                            <a href="#" class="sl-btn sl-prev"><img src="/wp-content/themes/voxlink/img/qatrun/sl-left.png" alt=""></a>
                            <a href="#" class="sl-btn sl-next"><img src="/wp-content/themes/voxlink/img/qatrun/sl-right.png" alt=""></a>
                        </div>
                    </div>
                </div>
                <div class="qat-line">
                    <div class="qatb7-descr">
                        <span class="num"><?php the_field('num-voz3') ?></span>
                        <span class="qatb7-descr-title"><?php the_field('title-voz3') ?></span>
                        <span class="qatb7-info"><?php the_field('text-voz3') ?></span>
                    </div>
                    <div class="qatb7-content">
                        <img src="<?php the_field('img-voz3') ?>" alt="">
                    </div>
                </div>
                <div class="qat-line">
                    <div class="qatb7-descr">
                        <span class="num"><?php the_field('num-voz4') ?></span>
                        <span class="qatb7-descr-title"><?php the_field('title-voz4') ?></span>
                        <span class="qatb7-info"><?php the_field('text-voz4') ?></span>
                    </div>
                    <div class="qatb7-content">
                        <img src="<?php the_field('img-voz4') ?>" alt="">
                    </div>
                </div>
                <div class="qat-line">
                    <div class="qatb7-descr">
                        <span class="num"><?php the_field('num-voz5') ?></span>
                        <span class="qatb7-descr-title"><?php the_field('title-voz5') ?></span>
                        <span class="qatb7-info"><?php the_field('text-voz5') ?></span>
                    </div>
                    <div class="qatb7-content">
                        <div class="qatb7-playholder">
                            <img src="<?php the_field('img-voz5') ?>" alt="">
                            <a href="#" class="play-video2"><img src="/wp-content/themes/voxlink/img/qatrun/play.png" alt=""></a>
                        </div>
                        <video controls width="100%" height="100%" id="video2">
                            <source src="<?php the_field('video2') ?>" type="video/mp4">
                        </video>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="qatrun-form2" style="background: #3f5766 url(/wp-content/themes/voxlink/img/qatrun/form-bg2.png) no-repeat center right;">
        <div class="inner">
            <div class="qat-row">
                <div class="qat-form-descr">
                    <span class="qat-form-title">
                        <?php the_field('title-form2') ?>
                    </span>
                    <span class="qat-form-info"><?php the_field('text-form2') ?></span>
                </div>
                <div class="qat-form-form">
                    <form>
                        <div class="form__field"><input type="text" placeholder="Введите имя"></div>
                        <div class="form__field"><input type="text" placeholder="Введите телефон"><button type="submit"
                                class="btn form-sub"><img src="/wp-content/themes/voxlink/img/qatrun/ar.png" alt=""></button></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php get_footer(); ?>