<?php


get_header(); ?>

    <div class="main-content">
      <div class="inner">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-9 col-md-8 col-xs-12">


  		                    <?php while ( have_posts() ) : the_post()  ?>
        		                    <div class="main-content-left kb-content">
        		                      <div class="row">
        		                        <div class="col-xs-12">
                                      <div class="kb-meta">
                                        <div class="row">
                                          <div class="col-sm-6">
                                            <div class="kb-meta__item">
                                              <i class="icon icon-user"></i>
                                              <?php echo get_the_author_meta('display_name'); ?>
                                            </div>
                                            <div class="kb-meta__item">
                                              <i class="icon icon-date2"></i>
                                              <?php echo get_the_date("d.m.Y"); ?>
                                            </div>
                                          </div>
                                          <div class="col-sm-6 tar">
                                            <div class="kb-meta__item">
                                              <i class="icon icon-view"></i>
                                              <?php
                                                $views = (int) get_field("views");

                                                echo $views;
                                              ?>
                                            </div>
                                            <?php /*?>
                                            <div class="kb-meta__item">
                                              <i class="icon icon-comment"></i>
                                              <?php echo number_format_i18n(get_comments_number()); ?>
                                            </div>
                                            <?php */ ?>
                                          </div>
                                        </div>

                                      </div>
                                    </div>
                                    <div class="col-xs-12">
                                        <div class="kb-tags">
                                          <?php
                                          $posttags = get_the_tags();
                                          if ($posttags) {
                                            foreach($posttags as $tag) {?>
                                              <a href="<?php echo get_term_link($tag->term_id); ?>" class="kb-tag"><?php echo $tag->name; ?></a>
                                            <?php }
                                          }
                                          ?>
                                        </div>


                                        <?php if(is_singular("kb")){?>


                                        <div class="kb-top">
                                          <div class="row">
                                            <?php $img = get_the_post_thumbnail(get_the_ID(), "large"); ?>
                                            <?php $c = $img ? 'col-sm-6' : 'col-sm-12';?>
                                            <div class="<?php echo $c; ?>">
                                                <h1>
                                                    <?php the_title(); ?>
                                                </h1>
                                                <?php the_excerpt(); ?>
                                            </div>

                                            <?php if($img){?>

                                              <div class="col-sm-6">
                                                  <?php echo $img; ?>
                                              </div>

                                            <?php } ?>
                                          </div>
                                        </div>

                                        <?php } ?>
                                    </div>
                                    <div class="col-xs-12">

                                        <?php if(!is_singular("kb")){?>
                                        <h1><?php  the_title(); ?></h1>
                                        <?php } ?>
                                        <?php

                                          the_content();

                                        ?>
                                        <script id="LdItENAQw9wmWMbG">if (window.relap) window.relap.ar('LdItENAQw9wmWMbG');</script>
                                    </div>


        		                      </div>
        		                    </div>

        		                    <?php if(!is_single()){?>
        		                    <div class="helpbox">
        		                      <div class="row">
        		                        <div class="col-md-6">
        		                          <h3>Помогла ли вам статья?</h3>

        		                          <a href="#" class="helpbox__btn">Да</a>
        		                          <a href="#" class="helpbox__btn">Нет</a>


        		                        </div>
        		                        <div class="col-md-6">

        		                          <div class="author-block">

        		                            <div>
          		                            <div class="author-info">
          		                                <?php $authorID = get_the_author_meta('ID'); ?>

                                             <div class="author-name"><?php echo get_the_author_meta("first_name"); ?> <?php echo get_the_author_meta("last_name"); ?></div>
          		                                <div class="author-post">автор статьи</div>
          		                            </div>
          		                            <div class="author-img">
          		                              <?php echo get_avatar($authorID); ?>
          		                            </div>

        		                            </div>

        		                            <a href="#" class="author-btn">Еще статьи</a>
        		                            <a href="#" class="author-btn">Об авторе</a>

        		                          </div>

        		                        </div>
        		                      </div>
        		                    </div>
        		                    <?php } ?>
                                <div id="comments">
                                  <?php
                                  if ( comments_open() || get_comments_number() ) :
                          					comments_template();
                          				endif;
                                  ?>
                                </div>

                                <div class="clearfix"></div>
                                <?php get_template_part("inc/questions"); ?>
                                   <?php /*?>
            		                    <div class="comments-container">




            		                      <div class="comments-list">
            		                        <?php $num_comments = get_comments_number(); ?>
            		                        <h2>Комментарии: (<?php echo $num_comments; ?>)</h2>


            		                        <?php if($num_comments == 0){ ?>
              		                        <div class="comments-zero">
              		                          <img src="/wp-content/themes/voxlink/img/zerocomment.svg">
              		                          Никто ещё не оставил комментариев, станьте первым.
              		                        </div>

            		                        <?php } else { ?>
                                          <ul id="comments-list">
                                            <?php
                                              $comments = get_comments(array(
                                                "post_id" => get_the_ID(),
                                                'hierarchical' => 'threaded',
                                                'number' => 10,
                                                'offset' => isset($_REQUEST['compage']) ? $_REQUEST['compage']*10-11 : 0
                                              ));


                                              foreach($comments as $comment){

    	        	                                  setup_postdata( $GLOBALS['post'] =& $comment );
                                                  get_template_part("loop/comment");
                                                  wp_reset_postdata();
                                              }




                                            ?>
                                          </ul>
                                          <?php
                                            $args = array(
                                              	'base'    => add_query_arg( 'compage', '%#%' ),
      	                                        'format'  => null,
                                              	'echo' => true,
                                              	'add_fragment' => '#comments-list',
                                              	'total' => ceil($num_comments/10),
                                              	"current" => $_REQUEST['compage'] ? $_REQUEST['compage'] : 1,
                                              	'prev_text' => "<",
      	                                        'next_text' => ">"
                                            );
                                          ?>
                                          <div class="pagination">
                                            <?php paginate_comments_links( $args );  ?>
                                          </div>
                                        <?php } ?>
            		                      </div>




            		                      <div id="comments">

                                          <?php
                                            comment_form(array(
                                              "fields" => array(
                                                  	'author' => '<p class="comment-form-author">' . '<label for="author">' . __( 'Name' ) . '</label> ' .
                                                  				'<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" /></p>'
                                              )
                                            ));
                                          ?>

            		                      </div>




            		                    </div>
                                <?php */?>

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