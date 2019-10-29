<?php get_header(); ?>


<div class="main-content">
      <div class="inner">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-9 col-md-8 col-xs-12">
                <div class="main-content-left">
                    <div class="search-results-cont">
                        <h3>Новый поиск</h3>
                        <p>Если вы не удовлетворены результатами ниже, пожалуйста, сделайте еще один поиск</p>
                        <form class="search-sidebar" action="/">
                            <input type="text" name="s" placeholder="Поиск" autocomplete="off"
                            <?php if(isset($_GET['s'])){?>value="<?php echo $_GET['s']; ?>"<?php } ?>>
                            <input type="submit">
                        </form>
                    </div>

                    <?php while ( have_posts() ) : the_post() ?>
                        <?php $post = get_post(get_the_ID()); ?>
                        <div class="search-main-item" data-post-type="<?php echo $post->post_type; ?>">
                            <a href="<?php the_permalink(); ?>" class="search-mi-img">
                                <?php
                                    $pt = $post->post_type;
                                    if($pt == "kb"){
                                        $img = "/wp-content/themes/voxlink/img/icons/kb-icon.svg";
                                        $section = "База знаний";
                                        $sectionURL = "/kb/";
                                    } else if ($pt == "clients"){
                                        $img = "/wp-content/themes/voxlink/img/icons/customer-icon.svg";
                                        $section = "Клиенты";
                                        $sectionURL = "/about-us/our-clients/";
                                    } else if ($pt == "team"){
                                        $img = "/wp-content/themes/voxlink/img/icons/team-icon.svg";
                                        $section = "Команда";
                                        $sectionURL = "/about-us/team/";
                                    } else if ($pt == "solutions"){
                                        $img = "/wp-content/themes/voxlink/img/icons/solutions-icon.svg";
                                        $section = "Решения";
                                        $sectionURL = "/solutions/";
                                    } else if ($pt == "developments"){
                                        $img = "/wp-content/themes/voxlink/img/icons/develop-icon.svg";
                                        $section = "Собственные разработки";
                                        $sectionURL = "/about-us/sobstvennye-razrabotki/";
                                    } else if ($pt == "product"){
                                        $img = "/wp-content/themes/voxlink/img/box_open.svg";
                                        $section = "Оборудование";
                                        $sectionURL = "/ip-pbx-hardware/";
                                    } else if ($pt == "events"){
                                        $img = "/wp-content/themes/voxlink/img/icons/events-icon.svg";
                                        $section = "События";
                                        $sectionURL = "/events/";
                                    } else if ($pt == "main_services"){
                                        $img = "/wp-content/themes/voxlink/img/services-icon.svg";
                                        $section = "Услуги";
                                        $sectionURL = "/services/";
                                    } else if ($pt == "page"){
                                        $parent = get_post($post->post_parent);
                                        $section = $parent->post_title;
                                        $sectionURL = get_the_permalink($parent->ID);
                                        $img = get_field("icon", $parent->ID);
                                    } else if ($pt == "post"){
                                        $cats = get_the_terms( $post->ID, "category" );
                                        $cat = end($cats);
                                        $section = $cat->name;
                                        $sectionURL = get_term_link($cat->term_id);
                                        $img = get_field("icon", "category_".$cat->term_id);
                                    }
                                ?>
                                <img src="<?php echo $img; ?>" alt="">
                            </a>
                            <div class="search-mi-text">
                                <a href="<?php the_permalink(); ?>">
                                    <h4><?php echo highlight_text($post->post_title,$_REQUEST['s']); ?></h4>
                                </a>
                                <a href="<?php echo $sectionURL; ?>">
                                    <h5><?php echo $section; ?></h5>
                                </a>
                                <p>
                                    <?php
        							$pattern = '/'.$_REQUEST['s'].'|'.mb_ucfirst($_REQUEST['s']).'|'.mb_strtolower($_REQUEST['s']).'|'.mb_strtoupper($_REQUEST['s']).'/';

        							if(preg_match($pattern,$post->post_content) == 1){?>
        								<?php echo cut_text_for_highlight($post->post_content,$_REQUEST['s']); ?>
        							<?php } else { ?>
        								<?php echo cut_text_for_highlight($post->post_excerpt,$_REQUEST['s']); ?>
        							<?php }?>
                                </p>
                            </div>
                        </div>
                    <?php endwhile; ?>
                    <div class="pagination" style="margin-bottom: 30px;">
                      <?php echo paginate_links(array(
                        'prev_text' => "<",
	                      'next_text' => ">",
                      )); ?>
                    </div>

            		<?php get_template_part("inc/questions"); ?>
        	    </div>
            </div>
            <div class="col-lg-3 col-md-4 col-xs-12 main-xs-pad">

                <?php get_sidebar(); ?>

            </div>
          </div>
        </div>
      </div>
</div>


<?php get_footer(); ?>