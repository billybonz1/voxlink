<?php

/*
Template Name: Clients
*/
get_header(); ?>

    <div class="main-content">
      <div class="inner">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-9 col-md-8 col-xs-12">


  		        <?php while ( have_posts() ) : the_post()  ?>
        		        <div class="main-content-left kb-content solutions-content clients-content2">
                      <h1>Наши крупнейшие клиенты</h1>
                      <p>
                        Крупный и известные клиенты всегда показывают уровень профессионализма и надежность компании.
                      </p>
                      <div class="clients-wrap">
                        <?php
                          $cl = get_posts(array(
                            "post_type" => "clients",
                            "posts_per_page" => -1,
                          	'meta_key'			=> 'priority',
	                          'orderby'			=> 'meta_value name',
                            'order'=>'DESC'
                          ));
                        ?>
                        <?php foreach($cl as $key=>$client){
                          if($key <= 7){
                          unset($cl[$key]);
                          ?>
                          <div class="clients-item2">
                            <?php
                              $imgURL = get_the_post_thumbnail_url( $client->ID, "developments" );;
                            ?>
                            <img src="<?php echo $imgURL; ?>" alt="">
                            <div class="clients-item-hover">
                              <img src="<?php echo $imgURL; ?>" alt="">
                              <h3><?php echo $client->post_title; ?></h3>
                              <p>
                                <?php echo $client->post_content; ?>
                              </p>
                              <?php $letter = get_field("rekomendatel-noe-pis-mo", $client->ID); ?>
                              <?php if(!empty($letter)){?>
                              <a href="<?php echo $letter['url'];?>" class="single-photo-popup">
                                <i class="icon icon-pismo"></i>
                                Рекомендательное письмо
                              </a>
                              <?php } ?>
                              <div class="clients-item-hover-close"></div>
                            </div>
                          </div>
                          <?php } ?>
                        <?php } ?>


                      </div>


                      <h2>
                        Все наши клиенты
                      </h2>

                      <p>
                        За 10 лет работы мы построили более 1000 систем телефонии для самых различных сфер бизнеса. 
                        <br> <br>
                        Для компаний, как новых на рынке, с штатом из нескольких человек, так и гигантов, выходящих за рамки 1500 сотрудников.
                      </p>


                      <div class="clients-wrap">
                        <div class="clients-item2 clients-item22 x2">
                          <div>
                            >200
                          </div>
                          <div>
                            <i class="icon icon-members"></i> <br>
                            <span>Довольных <br> клиентов</span>
                          </div>
                        </div>
                        <?php foreach($cl as $key=>$client){ ?>
                          <?php
                            $imgURL = trim(get_the_post_thumbnail_url( $client->ID, "developments" ));
                          ?>
                          <?php if(!empty($imgURL)){?>
                            <div class="clients-item2 clients-item22">
                                <img src="<?php echo $imgURL; ?>" alt="">
                            </div>
                          <?php } ?>
                        <?php } ?>


                      </div>



        		        </div>



                    <div class="solutions-ind clients-ind">
                        <div class="row">
                          <div class="col-md-12" style="max-width: 466px;">
                            <h2>Письменная благодарность от наших клиентов</h2>
                            <p>Многие ниша клиенты не ограничиваются только устными благодарностями, а так же присылают нам рекомендательные письма</p>
                            <a href="/about-us/rekomendatelnye-pisma/" class="btn btn-orange">Посмотреть письма</a>
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