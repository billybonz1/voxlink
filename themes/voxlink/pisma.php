<?php
/* Template name: Pisma */
get_header(); ?>
    <div class="main-content">
      <div class="inner">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-9 col-md-8 col-xs-12">
              <div class="main-content-left solutions-content main-content-left-pisma">
                <h2>Рекомендательные письма</h2>
                <p>Changing the global strategy, discarding details, covers a constructive marketing tool. The placement plan actively accelerates the role-playing side-effect PR-effect. The method of studying the market, of course, orders the industry standard, realizing marketing as a part of production.</p>
                <div class="pisma-block">

                  <?php
                    $_SESSION['post_id'] = get_the_ID();

                    global $wp_query;
                    $old_wp_query = $wp_query;
                    $args = array(
                      "post_type" => "clients",
                      "posts_per_page" => 10,
                      'meta_key' => 'rekomendatel-noe-pis-mo',
                      "meta_query" => array(
                        'relation' => 'AND',
                    		array(
                    			'key' => 'rekomendatel-noe-pis-mo',
                    			'value' => "",
			                    'compare' => '!=',
                    		)
                      ),
                      'orderby'=> 'priority',
                      'order'=>'DESC'
                    );
                    $paged = get_query_var("paged") ? get_query_var("paged") : get_query_var("pg");

                    if($paged){
                      $args['paged'] = $paged;
                    }
                    $wp_query = new WP_Query( $args );
                  ?>

                  <?php while ( have_posts() ) : the_post() ?>
                    <div class="pisma-item clearfix">

                      <?php
                      $post_meta = get_post_meta(get_the_ID());

                      $full_letter = wp_get_attachment_image_url( $post_meta['rekomendatel-noe-pis-mo'][0], "full" );
                      $thumb_letter = wp_get_attachment_image_url( $post_meta['rekomendatel-noe-pis-mo'][0], "product_itm" );
                      ?>

                      <div class="our-letters__item">
                        <a href="<?php echo $full_letter; ?>" class="gallery-item">
                          <img src="<?php echo $thumb_letter; ?>" alt="">
                        </a>
                      </div>

                      <div class="pisma-right">
                        <h5><?php the_title(); ?></h5>
                        <?php the_content(); ?>
                        <?php $site = $post_meta['adres-sayta'][0]; ?>
                        <?php if($site){?>
                          <a href="<?php echo $site; ?>"><?php echo $site; ?></a>
                        <?php } ?>
                      </div>
                    </div>
                  <?php endwhile; ?>
                </div>
                <div class="pagination">
                    <?php echo paginate_links(array(
                      'prev_text' => "<",
  	                  'next_text' => ">",
                    ));
                    $wp_query = $old_wp_query;
                    ?>
                </div>

              </div>
              <div class="solutions-ind clients-ind pisma-ind">
                  <div class="row">
                    <div class="col-md-6">
                      <h2>Полный перечень всех наших клиентов</h2>
                      <p>За 10 лет работы в нашей копилке уже более 200 крупных и мелких заказчиков.</p>
                      <a href="/about-us/our-clients/" class="btn btn-orange">Посмотреть клиентов</a>
                    </div>
                    <div class="col-md-6">
                      <?php
                        $cl = get_posts(array(
                          "post_type" => "clients",
                          "posts_per_page" => 6,
                        	'meta_key'  => 'priority',
	                        'orderby'	=> 'meta_value name',
                          'order'=>'DESC'
                        ));
                      ?>
                      <?php foreach($cl as $key=>$client){?>
                        <?php
                          $imgURL = get_the_post_thumbnail_url( $client->ID, "developments" );;
                        ?>
                        <div class="pisma-client">
                          <img src="<?php echo $imgURL; ?>" alt="<?php echo $client->post_title; ?>">
                        </div>
                      <?php } ?>
                      <div class="clients-item2 clients-item22 x2"><div> &gt;200</div><div> <i class="icon icon-members"></i> <br> <span>Довольных <br> клиентов</span></div></div>
                    </div>
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