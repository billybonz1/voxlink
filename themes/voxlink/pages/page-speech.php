<?php
/*
Template Name: Speech
*/
get_header(); ?>

    <div class="dakr-top-banner" style="background-image: url(<?php the_field('banner-bg') ?>);">
        <div class="inner">
            <div class="descr">
                <h1><?php the_field('banner-title') ?></h1>
                <span><img src="/wp-content/themes/voxlink/img/speech/mouse.png" alt=""></span>
            </div>
        </div>
    </div>
    <div class="speech-block2">
        <div class="inner">
            <div class="block2-img">
                <?php if(get_field('block2-list')): ?>

                <?php while(the_repeater_field('block2-list')): ?>

                        <div class="block2-item" style="order: <?php echo the_sub_field('num'); ?>"><img src="<?php echo the_sub_field('img'); ?>" alt=""><span><?php echo the_sub_field('text'); ?></span></div>

                <?php endwhile; ?>

                <?php endif; ?>
                <div class="block2i-center">
                    <div class="block2i-title">
                        <span>Speech <br> Analytics</span>
                    </div>
                    <div class="block2i-list">
                        <div class="block2i-item"><img src="/wp-content/themes/voxlink/img/speech/block2c1.png" alt=""><span>Ваш <br> клиент</span></div>
                        <div class="block2i-item"><img src="/wp-content/themes/voxlink/img/speech/block2c2.png" alt=""></div>
                        <div class="block2i-item"><img src="/wp-content/themes/voxlink/img/speech/block2c3.png" alt=""><span>Ваш <br> сотрудник</span></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="speech-analytics">
        <div class="inner">
            <div class="analyt-list">
                <div class="analyt-descr">
                    <span class="analyt-title"><?php the_field('block3-title') ?></span>
                    <span class="analyt-text"><?php the_field('block3-text') ?></span>
                </div>
                <div class="analyt-img">
                    <img src="<?php the_field('block3-img') ?>" alt="">
                </div>
            </div>
        </div>
    </div>

    <div class="speech-func">
        <div class="func-head">
            <div class="inner">
                <span class="func-title"><?php the_field('block4-title') ?></span>
                <span class="func-descr">
                    <?php the_field('block4-text') ?>
                </span>
            </div>
        </div>
        <div class="inner">
            <div class="func-slider">
                <div class="func-controls">
                    <a href="#" class="sl-prev"><img src="/wp-content/themes/voxlink/img/speech/sl-prev.png" alt=""></a>
                    <a href="#" class="sl-next"><img src="/wp-content/themes/voxlink/img/speech/sl-next.png" alt=""></a>
                </div>
                <div class="slider">
                    <?php if(get_field('block4-list')): ?>

                    <?php while(the_repeater_field('block4-list')): ?>

                            <div class="item"><img src="<?php echo the_sub_field('img'); ?>" alt=""></div>

                    <?php endwhile; ?>

                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <div class="speech-blocks">
        <div class="inner">
            <?php if(get_field('block5-list')): ?>

            <?php while(the_repeater_field('block5-list')): ?>

                    <div class="blocks">
                        <div class="info">
                            <span class="num"><?php echo the_sub_field('num'); ?></span>
                            <span class="blocks-title"><?php echo the_sub_field('title'); ?></span>
                            <span class="block-descr">
                                <?php echo the_sub_field('text'); ?>
                            </span>
                        </div>
                        <div class="thumb">
                            <img src="<?php echo the_sub_field('img'); ?>" alt="">
                        </div>
                    </div>

            <?php endwhile; ?>

            <?php endif; ?>
        </div>
    </div>

    <div class="speech-dost">
        <div class="inner">
            <div class="dost-title">
                <span class="title">
                    <?php the_field('block6-title') ?>
                </span>
            </div>
            <div class="dost-list">
                <?php if(get_field('block6-list')): ?>

                <?php while(the_repeater_field('block6-list')): ?>

                    <div class="dost-item">
                        <div class="dost-img">
                            <img src="<?php echo the_sub_field('img'); ?>" alt="">
                            <span class="num"><?php echo the_sub_field('num'); ?></span>
                        </div>
                        <span class="dost-text">
                            <?php echo the_sub_field('text'); ?>
                        </span>
                    </div>

                <?php endwhile; ?>

                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="speech-need">
        <div class="inner">
            <div class="need-list">
                <div class="need-text">
                    <span class="need-title">
                        <?php the_field('block7-title') ?>
                    </span>
                    <span class="need-descr">
                        <?php the_field('block7-text') ?>
                    </span>
                </div>
                <?php if(get_field('block7-list')): ?>

                <?php while(the_repeater_field('block7-list')): ?>

                    <div class="need-block">
                        <div class="need-item" style="background-image: url(<?php echo the_sub_field('bg'); ?>)">
                            <span class="num"><?php echo the_sub_field('num'); ?></span>
                            <div class="need-img">
                                <img src="<?php echo the_sub_field('img'); ?>" alt="">
                            </div>
                            <div class="need-info">
                                <span><?php echo the_sub_field('text'); ?></span>
                            </div>
                        </div>
                    </div>

                <?php endwhile; ?>

                <?php endif; ?>
            </div>
        </div>
    </div>

    <div class="speech-vnedrit">
        <div class="inner">
            <div class="vnedr-list">
                <?php if(get_field('block8-list')): ?>

                <?php while(the_repeater_field('block8-list')): ?>

                    <div class="vnedr-item">
                        <div class="icon">
                            <img src="<?php echo the_sub_field('img'); ?>" alt="">
                        </div>
                        <span class="vnedr-text"><?php echo the_sub_field('text'); ?></span>
                        <a href="<?php echo the_sub_field('url'); ?>">Узнать, как это работает <img src="/wp-content/themes/voxlink/img/speech/arrow.png" alt=""></a>
                    </div>

                <?php endwhile; ?>

                <?php endif; ?>
                <div class="vnedr-img">
                    <img src="<?php the_field('block8-img') ?>" alt="">
                </div>
                <?php if(get_field('block8-list2')): ?>

                <?php while(the_repeater_field('block8-list2')): ?>

                    <div class="vnedr-item">
                        <div class="icon">
                            <img src="<?php echo the_sub_field('img'); ?>" alt="">
                        </div>
                        <span class="vnedr-text"><?php echo the_sub_field('text'); ?></span>
                        <a href="<?php echo the_sub_field('url'); ?>">Преимущества VoxDistro <img src="/wp-content/themes/voxlink/img/speech/arrow.png" alt=""></a>
                    </div>

                <?php endwhile; ?>

                <?php endif; ?>
            </div>
        </div>
    </div>

    <div class="speech-ponad">
        <div class="inner">
            <div class="ponad-title">
                <span><?php the_field('block9-title') ?></span>
            </div>
            <div class="ponad-list">
                <?php if(get_field('block9-list')): ?>

                <?php while(the_repeater_field('block9-list')): ?>

                    <div class="ponad-item">
                        <img src="<?php echo the_sub_field('img'); ?>" alt="">
                        <span class="ponad-text"><?php echo the_sub_field('text'); ?></span>
                    </div>

                <?php endwhile; ?>

                <?php endif; ?>
            </div>
            <div class="ponad-zametka">
                <span class="zametka-img"><img src="<?php the_field('block9-img') ?>" alt=""></span>
                <div class="zametka-descr">
                    <span class="z-title"><?php the_field('block9-head') ?></span>
                    <span class="z-text"><?php the_field('block9-text') ?></span>
                </div>
            </div>
        </div>
    </div>

    <div class="speech-integr">
        <div class="inner">
            <?php if(get_field('block10-list')): ?>

            <?php while(the_repeater_field('block10-list')): ?>

                <div class="integr-item">
                    <div class="integr-title">
                        <div class="icon">
                            <img src="<?php echo the_sub_field('img'); ?>" alt="">
                        </div>
                        <span class="title"><?php echo the_sub_field('title'); ?></span>
                    </div>
                    <div class="integr-descr">
                        <span><?php echo the_sub_field('text'); ?>
                        </span>
                    </div>
                </div>

            <?php endwhile; ?>

            <?php endif; ?>
        </div>
    </div>

    <div class="speech-trigger">
        <div class="inner">
            <div class="trigger-list">
                <div class="trigger-info">
                    <span class="trigger-title"><?php the_field('block11-title') ?></span>
                    <span class="trigger-descr"><?php the_field('block11-descr') ?>
                    </span>
                    <span class="trigger-text"><?php the_field('block11-text') ?></span>
                </div>
                <div class="trigger-img">
                    <img src="<?php the_field('block11-img') ?>" alt="">
                </div>
            </div>
        </div>
    </div>

    <div class="speech-form" style="background-image: url(/wp-content/themes/voxlink/img/speech/form-bg.png)">
        <div class="inner">
            <div class="sp-row">
                <div class="sp-form-descr">
                    <span class="sp-form-title">
                            Как начать?
                    </span>
                    <span class="sp-form-info">Запустить процесс интеграции IP-АТС Asterisk со Speech Analytics проще, чем может показаться. Всё что вам нужно – это оставить заявку в форме, после чего мы свяжемся с вами и пройдем вместе все этапы интеграции. </span>
                </div>
                <div class="sp-form-form">
                    <form>
                        <div style="display: none;">
                                  <input type="text" name="fullName" value="" />
                              </div>
                        <input type="hidden" name="action" value="submitForm" />
                        <div class="form__field"><input type="text" name="name" placeholder="Введите имя"></div>
                        <div class="form__field"><input type="text" name="email" placeholder="Введите email"></div>
                        <div class="form__field"><input type="text" name="phone" placeholder="Введите телефон"><button type="submit"
                                class="btn form-sub"><img src="/wp-content/themes/voxlink/img/speech/ar.png" alt=""></button></div>
                        <div class="form_data form__field"><input checked name="agree" type="checkbox"><span>Соглашение об обработке персональных данных</span></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
<?php get_template_part("inc/q2"); ?>
<?php get_footer(); ?>