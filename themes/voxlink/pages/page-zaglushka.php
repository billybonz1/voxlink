<?php
/*
Template Name: Заглушка
*/
get_header(); ?>

    <div class="main-content">
      <div class="inner">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-9 col-md-8 col-xs-12">
              <div class="main-content-left">
                <div class="row">

                  <?php
                    $cats = get_posts( array(
                        'posts_per_page' => -1,
                        'post_parent' => get_the_ID(),
                        "post_type" => 'page'
                    ) );
                  ?>


                  <?php foreach($cats as $cat){ ?>
                  <div class="col-md-4 col-xs-6">
                      <a href="<?php echo get_the_permalink($cat->ID); ?>" class="main-item">
                        <div class="main-item-img">
                          <img src="<?php the_field("img-func", $cat->ID); ?>">
                        </div>
                        <p><?php echo $cat->post_title; ?></p>
                      </a>
                  </div>
                  <?php } ?>
                  <!--<div class="col-md-4 col-sm-6"><a href="#" class="main-item">-->
                  <!--    <div class="main-item-img"><img src="/wp-content/themes/voxlink/img/item2.png"></div>-->
                  <!--    <p>Интеграция с CRM</p></a></div>-->
                  <!--<div class="col-md-4 col-sm-6"><a href="#" class="main-item">-->
                  <!--    <div class="main-item-img"><img src="/wp-content/themes/voxlink/img/item3.png"></div>-->
                  <!--    <p>Использование Elastix</p></a></div>-->
                  <!--<div class="col-md-4 col-sm-6"><a href="#" class="main-item">-->
                  <!--    <div class="main-item-img"><img src="/wp-content/themes/voxlink/img/item4.png"></div>-->
                  <!--    <p>Установка Asterisk</p></a></div>-->
                  <!--<div class="col-md-4 col-sm-6"><a href="#" class="main-item">-->
                  <!--    <div class="main-item-img"><img src="/wp-content/themes/voxlink/img/item5.png"></div>-->
                  <!--    <p>Настройка Asterisk</p></a></div>-->
                  <!--<div class="col-md-4 col-sm-6"><a href="#" class="main-item">-->
                  <!--    <div class="main-item-img"><img src="/wp-content/themes/voxlink/img/item6.png"></div>-->
                  <!--    <p>Настройка IP-телефонов</p></a></div>-->
                  <!--<div class="col-md-4 col-sm-6"><a href="#" class="main-item">-->
                  <!--    <div class="main-item-img"><img src="/wp-content/themes/voxlink/img/item7.png"></div>-->
                  <!--    <p>Настройка VoIP-оборудования</p></a></div>-->
                  <!--<div class="col-md-4 col-sm-6"><a href="#" class="main-item">-->
                  <!--    <div class="main-item-img"><img src="/wp-content/themes/voxlink/img/item8.png"></div>-->
                  <!--    <p>Подключение операторов связи</p></a></div>-->
                  <!--<div class="col-md-4 col-sm-6"><a href="#" class="main-item">-->
                  <!--    <div class="main-item-img"><img src="/wp-content/themes/voxlink/img/item9.png"></div>-->
                  <!--    <p>Использование FreePBX</p></a></div>-->
                  <!--<div class="col-md-4 col-sm-6"><a href="#" class="main-item">-->
                  <!--    <div class="main-item-img"><img src="/wp-content/themes/voxlink/img/item10.png"></div>-->
                  <!--    <p>Интеграция с другими АТС</p></a></div>-->
                  <!--<div class="col-md-4 col-sm-6"><a href="#" class="main-item">-->
                  <!--    <div class="main-item-img"><img src="/wp-content/themes/voxlink/img/item11.png"></div>-->
                  <!--    <p>Новости и статьи</p></a></div>-->
                  <!--<div class="col-md-4 col-sm-6"></div>-->
                </div>
              </div>
              <div class="hr"></div>

        		  <?php get_template_part("inc/questions"); ?>
            </div>
            <div class="col-lg-3 col-md-4 col-xs-12 main-xs-pad">

                <?php get_sidebar(); ?>

            </div>
          </div>
        </div>
      </div>
    </div>

 <?php get_footer(); ?>