<?php
/*
Template Name: Простой шаблон
Template Post Type: solutions
*/
get_header(); ?>

    <div class="main-content">
      <div class="inner">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-9 col-md-8 col-xs-12">


                            <?php while ( have_posts() ) : the_post()  ?>
                                    <div class="main-content-left kb-content">
                                      <div class="row">


                                        <div class="col-md-12">
                                            <h1><?php the_title(); ?></h1>
                                            <?php the_content(); ?>
                                        </div>


                                      </div>
                                    </div>





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