<div class="main-content">
      <div class="inner">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-9 col-md-8 col-xs-12">

                <?php
                $current_term = get_queried_object();
                if(!is_tag()){?>

                  <?php

                      if($current_term->parent == 0){
                          $id = $current_term->term_id;
                      }else{
                          $id = $current_term->parent;
                      }

                      $cats = get_terms( array(
                          'taxonomy' => 'kb_cat',
                          'hide_empty' => false,
                          'parent' => $id
                      ) );
                  ?>

                <?php } ?>
                <div class="main-content-left">
                    <?php
                    if(isset($cats)){
                      if(count($cats) > 0 && !is_tag()){?>

                        <div class="products-cat-slider" style="max-height: unset;" data-items="5">
                						<div id="cats-slider" class="cats-slider">
                						  <?php

                						    $slide = 0;
                						    foreach($cats as $cat){
                						      $slide++;
                    						    ?>


                      							<a data-slide="<?php echo $slide; ?>" href="<?php echo get_term_link($cat->term_id); ?>" class="products-cat-slide cat-slide <?php if ($cat->term_id == $current_term->term_id) echo "current"; ?>">
                      								<img src="<?php echo get_field("img", "kb_cat_".$cat->term_id); ?>">

                      								<span><?php echo $cat->name; ?></span>
                      							</a>
                							<?php } ?>
                						</div>


                						<div class="products-cat-arr-left products-cat-arr">
                      				<svg width="39" height="39" viewBox="0 0 39 39"><defs><path id="a" d="M410 349a18 18 0 1 1 0 36 18 18 0 0 1 0-36z"/><path id="b" d="M413.99 361.34l-2.46-2.4-8.08 8.02 8.08 8.01 2.4-2.4-5.62-5.62z"/></defs><g transform="translate(-390 -347)"><use fill="#263139" xlink:href="#a"/></g><g transform="translate(-390 -347)"><use fill="#fff" xlink:href="#b"/></g></svg>
                      			</div>

                      			<div class="products-cat-arr-right products-cat-arr">
                      				<svg width="39" height="39" viewBox="0 0 39 39"><defs><path id="a1" d="M1210 349a18 18 0 1 1 0 36 18 18 0 0 1 0-36z"/><path id="b1" d="M1205.45 361.34l2.46-2.4 8.08 8.02-8.08 8.01-2.4-2.4 5.61-5.62z"/></defs><g transform="translate(-1190 -347)"><use fill="#263139" xlink:href="#a1"/></g><g transform="translate(-1190 -347)"><use fill="#fff" xlink:href="#b1"/></g></svg>
                      			</div>
                				</div>
                				<div class="clearfix"></div>

                    <?php }
                    }
                    ?>



                    <?php
                      global $wp_query;
                      $paged = get_query_var("paged") ? get_query_var("paged") : get_query_var("pg");
                      if(is_tag()){
                        $ppp = 13;
                        $tax = "post_tag";
                        $post_type = "kb";
                      }else if(is_category()){
                        $ppp = 9;
                        $tax = "category";
                        $post_type = "post";
                      }else{
                        $ppp = 9;
                        $tax = "kb_cat";
                        $post_type = "kb";
                      }

                      $args = array(
                        'post_type' => $post_type,
                        'posts_per_page' => $ppp,
                        'orderby' => 'date',
                        'order' => 'DESC',
                        'tax_query' => array(
                            array(
                                'taxonomy' => $tax,
                                'field'    => 'slug',
                                'terms'    => $current_term->slug,
                            ),
                        )
                      );


                      if($paged){
                        $args['paged'] = $paged;
                      }

                      $wp_query = new WP_Query( $args );

                    ?>
                    <div class="kb__items">
                        <?php while ( have_posts() ) : the_post() ?>


                          <?php get_template_part("loop/kb_item")?>


                        <?php endwhile; ?>
                    </div>
                    <div class="pagination">
                      <?php echo paginate_links(array(
                        'prev_text' => "<",
	                      'next_text' => ">",
                      )); ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-xs-12 main-xs-pad">
              <?php get_sidebar(); ?>
            </div>
          </div>
        </div>
      </div>
    </div>