<?php

/*
Template Name: Develop
*/
get_header(); ?>

    <div class="main-content">
      <div class="inner">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-9 col-md-8 col-xs-12">

  		                    <?php while ( have_posts() ) : the_post()  ?>
        		                    <div class="main-content-left kb-content solutions-content">
                                  <h1>Полезные решения от наших специалистов</h1>
                                  <p>
                                    Наши специалисты не только устанавливают и настраивают готовое оборудование и ПО, но и разрабатывают собственные программные решения для IP-телефонии Asterisk.
                                  </p>
                                  <div class="develop-items">
                                    <div class="row">

                                      <?php
                                          $developments = get_posts(array(
                                            "post_type" => "developments",
                                            "posts_per_page" => -1,
                                            "order" => "ASC"
                                          ));
                                      ?>
                                      <?php foreach($developments as $key=>$d){
                                      $counter = $key + 1;
                                      ?>
                                      <div class="col-md-6">
                                        <div class="develop-item develop-item<?php echo $counter; ?>">
                                          <?php
                                            $post_meta = get_post_meta($d->ID);
                				                    $icon = wp_get_attachment_image_url( $post_meta['icon'][0], "full");
                                          ?>
                                          <div class="develop-item-img">
                                            <?php
                                              $url = $icon;
                            									$ch = curl_init();
                            									curl_setopt($ch, CURLOPT_USERPWD, "kv:01");
                            									curl_setopt($ch, CURLOPT_URL, $url);
                            									curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                            									curl_setopt($ch, CURLOPT_REFERER, $_SERVER['REQUEST_URI']);
                            									$svg = curl_exec($ch);
                            									curl_close($ch);
                            									echo $svg;
                                            ?>
                                          </div>
                                          <h3><?php echo $d->post_title; ?></h3>
                                          <?php echo $post_meta['features'][0]; ?>
                                        </div>
                                      </div>
                                      <?php } ?>
                                    </div>
                                  </div>
        		                    </div>
        		                    <div class="solutions-ind develop-ind">
                                  <div class="row">
                                    <div class="col-md-6">
                                      <h2>Наша команда — основа компании</h2>
                                      <p>Наша компания состоит из молодых специалистов, которые быстро адаптируются к переменам. Все-таки IP-телефония постоянно совершенствуется, и этому необходимо соответствовать.</p>
                                      <a href="/about-us/team/" class="btn btn-orange">Посмотреть команду</a>
                                    </div>
                                    <div class="col-md-6">
                                      <img src="/wp-content/themes/voxlink/minimg/develop.png" alt="">
                                    </div>
                                  </div>

                                </div>

        		                    <div class="hr"></div>

        		                    <?php get_template_part("inc/questions"); ?>


                          <?php endwhile; ?>




            </div>
            <div class="col-lg-3 col-md-4 col-xs-12 main-xs-pad">
              <?php get_sidebar(); ?>
            </div>
          </div>
        </div>
      </div>
    </div>

 <?php get_footer(); ?>