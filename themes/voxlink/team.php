<?php
/* Template name: Team */
get_header(); ?>

    <?php
      $team = get_posts(array(
          "post_type" => "team",
          "posts_per_page" => -1,
          "order" => "ASC",
          'meta_query' => array(
          	'relation' => 'AND',
          	array(
          		'key' => 'show_on_site',
          		'value' => '1'
          	)
          )
      ));
      $first = $team[0];
      unset($team[0]);
    ?>

    <div class="main-content">
      <div class="inner">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-9 col-md-8 col-xs-12">
              <div class="main-content-left main-content-left-pisma">
                <h2>Наша команда — основа компании</h2>
                <p>Наша компания состоит из молодых специалистов, которые быстро адаптируются к переменам. Все-таки IP-телефония постоянно совершенствуется, и этому необходимо соответствовать.</p>
                <div class="team-main">
                  <?php
                  $post_meta = get_post_meta($first->ID);
                  $first_post = $post_meta['post'][0];
                  $img = get_the_post_thumbnail_url( $first->ID, "full" );
                  ?>

                  <img src="<?php echo $img; ?>">
                  <div class="team-main-right">
                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $first->post_content; ?></p>
                    <h3><?php echo $first->post_title; ?><br><span><?php echo $first_post; ?></span></h3>
                    <div class="team-icons">
                      <?php if (!empty($post_meta['phone'][0])){?>
                      <a href="tel: <?php echo $post_meta['phone'][0]; ?>">
                        <i class="icon icon-teamphone"></i>
                        <div class="opis-mod"><?php echo $post_meta['phone'][0]; ?></div>
                      </a>
                      <?php } ?>
                      <?php if (!empty($post_meta['e-mail'][0])){?>
                      <a href="mailto: <?php echo $post_meta['e-mail'][0]; ?>">
                        <i class="icon icon-teammail"></i>
                        <div class="opis-mod"><?php echo $post_meta['e-mail'][0]; ?></div>
                      </a>
                      <?php } ?>
                      <?php if (!empty($post_meta['jabber'][0])){?>
                      <a href="tel: <?php echo $post_meta['jabber'][0]; ?>">
                        Jabber
                        <div class="opis-mod"><?php echo $post_meta['jabber'][0]; ?></div>
                      </a>
                      <?php } ?>
                      <?php if (!empty($post_meta['sip-uri'][0])){?>
                      <a href="tel: <?php echo $post_meta['sip-uri'][0]; ?>">
                        SIP-URI
                        <div class="opis-mod"><?php echo $post_meta['sip-uri'][0]; ?></div>
                      </a>
                      <?php } ?>
                    </div>
                  </div>
                </div>
                <div class="team-content">
                  <div class="row">
                    <?php foreach($team as $member) {
                    $post_meta = "";
                    $post_meta = get_post_meta($member->ID);
                    $img = get_the_post_thumbnail_url( $member->ID, "full" );
                    ?>
                    <div class="col-lg-4 col-md-6 col-sm-4 col-xs-12">
                      <div class="team-sm">
                        <div class="team-sm-top">
                          <img src="<?php echo $img; ?>">
                        </div>
                        <div class="team-sm-bottom">
                          <h5><?php echo $member->post_title; ?><br><span><?php echo $post_meta['post'][0]; ?></span></h5>
                          <div class="team-icons">
                            <?php if (!empty($post_meta['phone'][0])){?>
                            <a href="tel: <?php echo $post_meta['phone'][0]; ?>">
                              <i class="icon icon-teamphone"></i>
                              <div class="opis-mod"><?php echo $post_meta['phone'][0]; ?></div>
                            </a>
                            <?php } ?>
                            <?php if (!empty($post_meta['e-mail'][0])){?>
                            <a href="mailto: <?php echo $post_meta['e-mail'][0]; ?>">
                              <i class="icon icon-teammail"></i>
                              <div class="opis-mod"><?php echo $post_meta['e-mail'][0]; ?></div>
                            </a>
                            <?php } ?>
                            <?php if (!empty($post_meta['jabber'][0])){?>
                            <a href="tel: <?php echo $post_meta['jabber'][0]; ?>">
                              Jabber
                              <div class="opis-mod"><?php echo $post_meta['jabber'][0]; ?></div>
                            </a>
                            <?php } ?>
                            <?php if (!empty($post_meta['sip-uri'][0])){?>
                            <a href="tel: <?php echo $post_meta['sip-uri'][0]; ?>">
                              SIP-URI
                              <div class="opis-mod"><?php echo $post_meta['sip-uri'][0]; ?></div>
                            </a>
                            <?php } ?>
                          </div>
                        </div>
                      </div>
                    </div>
                    <?php } ?>
                  </div>
                </div>
              </div>
              <div class="solutions-ind clients-ind team-ind">
                  <div class="row">
                    <div class="col-md-12" style="max-width: 466px;">
                      <h2>Полезные статьи от наших специалистов</h2>
                      <p>Наши специалисты являются авторами полезных статей и инструкций, которые помогут вам решить вопросы по установке и настройке IP-оборудования</p>
                      <a href="/kb/" class="btn btn-orange">Посмотреть статьи</a>
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