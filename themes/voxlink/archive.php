<?php get_header(); ?>
    <?php if(is_category()){?>
      <?php get_template_part("kb-cat");?>
    <?php } else { ?>
      <div class="main-content">
      <div class="inner">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-9 col-md-8 col-xs-12">
              <div class="main-content-left">
                <div class="row">


                  <?php while ( have_posts() ) : the_post(); ?>
                  <div class="col-md-4 col-xs-6">
                      <a href="<?php the_permalink() ?>" class="main-item">
                        <div class="main-item-img">
                          <?php echo get_the_post_thumbnail(); ?>
                        </div>
                        <p><?php the_title(); ?></p>
                      </a>
                  </div>
                   <?php endwhile; ?>

                </div>
              </div>
              <div class="pagination">
                <?php echo paginate_links(array(
                  'prev_text' => "<",
	                'next_text' => ">",
                )); ?>
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
    <?php } ?>
 <?php get_footer(); ?>