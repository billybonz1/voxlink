<?php 

/*
Template Name: Korz
*/

get_header(); ?>
    
    <div class="main-content">
      <div class="inner">
        <div class="container-fluid">
          <div class="row">
            <div class="col-xs-12">

                      
                            <?php while ( have_posts() ) : the_post()  ?>
                               
                                            <?php the_content(); ?>
                                      
                                    
                          <?php endwhile; ?>
              
                    
               
              
            </div>
      
          </div>
        </div>
      </div>
    </div>
    
 <?php get_footer(); ?>