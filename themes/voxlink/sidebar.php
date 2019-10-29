<?php
  $currentCat = get_queried_object();
  if(!isset($_GET['ajax'])){
      $subMenu = array();

      if(
        is_post_type_archive("kb") || is_singular("kb") || is_tax("kb_cat") ||
        is_shop() || is_singular("product") || is_tax("product_cat")
      ){

        if(is_post_type_archive("kb") || is_singular("kb") || is_tax("kb_cat")){
          $type = "kb_cat";
        }else{
          $type = "product_cat";
        }

        $links = get_terms( array(
            'taxonomy' => $type,
            'hide_empty' => false
        ) );


        foreach($links as $link){
          if($link->term_id != 3593){
            $iconUrl = get_field("icon", $type."_".$link->term_id);
            $imgUrl = get_field("img", $type."_".$link->term_id);
            if(empty($imgUrl)){
                $tid = get_term_meta($link->term_id,'thumbnail_id', true);
                $imgUrl = wp_get_attachment_url($tid);
            }
            if(empty($iconUrl)){
              $iconUrl = $imgUrl;
            }
            $subMenu[] = array(
              "id" => $link->term_id,
              "url" => get_term_link($link->term_id),
              "title" => $link->name,
              "icon" => $iconUrl,
              "img" => $imgUrl,
              "parent" => $link->parent
            );
          }
        }


      }else if(is_page()){


        $id = isset($_SESSION['post_id']) ? $_SESSION['post_id'] : get_the_ID();


        $post = get_post($id);

        if($post->post_parent == 0){
          $id = $post->ID;
        }else{
          $id = $post->post_parent;
        }

        $links = get_posts( array(
            'post_parent' => $id,
            "post_type" => "page",
            "posts_per_page" => -1
        ) );

        foreach($links as $link){
          $subMenu[] = array(
            "id" => $link->ID,
            "url" => get_permalink($link->ID),
            "title" => $link->post_title,
            "icon" => get_field("icon",$link->ID),
            "img" => get_field("img",$link->ID),
            "parent" => 0
          );
        }
    }
?>

<div class="main-content-right">

      <form class="search-sidebar" action="/">
          <input type="text" name="s" placeholder="Поиск" autocomplete="off"
          <?php if(isset($_GET['s'])){?>value="<?php echo $_GET['s']; ?>"<?php } ?>>
          <input type="submit" />
      </form>


      <?php if(count($subMenu) > 0){?>
      <div class="category">
        <h3 class="orange-dot">категории</h3>
        <ul>
                        <?php foreach($subMenu as $link){?>

                         <?php
                         if($link['parent'] == 0){


                            $inmenu = 0 ;
                            foreach($subMenu as $link2){
                              if($link2['parent'] == $link['id']){
                                $inmenu++;
                              }
                            }
                         ?>



                        <li>
                          <?php
                            $host = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : $_SERVER['REQUEST_SCHEME']."://".$_SERVER['HTTP_HOST']."/";
                            $curretnURL = substr($host, 0, -1).$_SERVER['REQUEST_URI'];
                          ?>
                          <a <?php if(strpos($curretnURL, $link['url']) !== FALSE){?>class="active"<?php } ?> href="<?php echo $link['url']; ?>">
                            <i class="icon icon-cat6" style="background-image: url(<?php echo $link['icon']; ?>)"></i>
                            <span><?php echo $link['title']; ?></span>
                          </a>
                          <?php if($inmenu > 0){?>
                          <div class="icon-sp icon-cat-plus"></div>
                          <div class="cat-hide">
                            <ul>
                              <?php
                              foreach($subMenu as $link2){
                                if($link2['parent'] == $link['id']){ ?>
                                  <li><a <?php if(strpos($curretnURL, $link2['url']) !== FALSE){?>class="active"<?php } ?> href="<?php echo $link2['url']; ?>"><?php echo $link2['title']; ?></a></li>
                              <?php  }
                              }
                              ?>
                            </ul>
                          </div>
                          <?php } else { ?>
                          <div class="icon-sp icon-cat-arrow"></div>
                          <?php } ?>

                        </li>
                        <?php }
                       } ?>
                      </ul>
      </div>
      <?php } ?>
      <?php if($_SESSION['terms_in_count'] != 0 || !is_product_category()){ ?>




      <div class="voip">
        <h3 class="orange-dot">VoIP оборудование</h3>
        <div class="voip-item">
          <ul id="voip" class="gallery content-slider list-unstyled clearfix">
            <li><img src="/wp-content/themes/voxlink/img/voip-phone.png">
              <p><span>Digium D40</span><br>11 100 руб</p><img src="/wp-content/themes/voxlink/minimg/stars.png">
            </li>
            <li><img src="/wp-content/themes/voxlink/img/voip-phone.png">
              <p><span>Digium D40</span><br>11 100 руб</p><img src="/wp-content/themes/voxlink/minimg/stars.png">
            </li>
            <li><img src="/wp-content/themes/voxlink/img/voip-phone.png">
              <p><span>Digium D40</span><br>11 100 руб</p><img src="/wp-content/themes/voxlink/minimg/stars.png">
            </li>
            <li><img src="/wp-content/themes/voxlink/img/voip-phone.png">
              <p><span>Digium D40</span><br>11 100 руб</p><img src="/wp-content/themes/voxlink/minimg/stars.png">
            </li>
            <li><img src="/wp-content/themes/voxlink/img/voip-phone.png">
              <p><span>Digium D40</span><br>11 100 руб</p><img src="/wp-content/themes/voxlink/minimg/stars.png">
            </li>
            <li><img src="/wp-content/themes/voxlink/img/voip-phone.png">
              <p><span>Digium D40</span><br>11 100 руб</p><img src="/wp-content/themes/voxlink/minimg/stars.png">
            </li>
          </ul>
          <div class="voip-arrow voip-arrow-left voip-prev">
            <div class="voip-vn-all voip-vn-left"></div>
          </div>
          <div class="voip-arrow voip-arrow-right voip-next">
            <div class="voip-vn-all voip-vn-right"></div>
          </div>
        </div>
      </div>


      <div class="blizh">
        <h3 class="orange-dot">ближайшие курсы</h3>
        <div class="advert-line advert-big">
          <div class="inner">
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-12">
                  <h6>Курсы по Asterisk<br><span> c 28 октября<br>по 1 ноября</span></h6><br><img src="/wp-content/themes/voxlink/minimg/arrow-bot.png" class="arrow"><br>
                  <a href="http://asterisker.ru" target="_blank" class="btn btn-white">Записаться</a><br><img src="/wp-content/themes/voxlink/minimg/face-big.png">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="new">
        <h3 class="orange-dot">Новые статьи</h3>
        <div class="new-content">

          <?php

          wp_reset_postdata();


          $args = array(
            'post_type' => "kb",
            'posts_per_page' => 3,
            'orderby' => 'date',
            'order' => 'DESC'
          );

          $news = new WP_Query( $args );
          ?>

          <?php while($news->have_posts()) :
               $news->the_post(); ?>

              <a href="<?php echo get_the_permalink(); ?>" class="new-item">
                <?php echo get_the_post_thumbnail(); ?>
                <div class="new-block">
                  <p>
                    <?php the_title(); ?>
                  </p>
                  <div class="date"><i class="icon icon-new1"></i>
                  <span><?php echo get_the_date("d.m.Y"); ?></span></div>
                </div>
              </a>
          <?php  endwhile; ?>

          <?php
          wp_reset_postdata();
          ?>
        </div>
      </div>
      <div class="stat">
        <a href="#" class="stat-item"><img src="/wp-content/themes/voxlink/img/stat1.jpg">
        <div class="stat-hide"><i class="icon icon-plus"></i>
          <div class="opis">Описание</div>
        </div></a><a href="#" class="stat-item"><img src="/wp-content/themes/voxlink/img/stat2.jpg">
        <div class="stat-hide"><i class="icon icon-plus"></i>
          <div class="opis">Описание</div>
        </div></a><a href="#" class="stat-item"><img src="/wp-content/themes/voxlink/img/stat3.jpg">
        <div class="stat-hide"><i class="icon icon-plus"></i>
          <div class="opis">Описание</div>
        </div></a><a href="#" class="stat-item"><img src="/wp-content/themes/voxlink/img/stat4.jpg">
        <div class="stat-hide"><i class="icon icon-plus"></i>
          <div class="opis">Описание</div>
        </div></a><a href="#" class="stat-item"><img src="/wp-content/themes/voxlink/img/stat5.jpg">
        <div class="stat-hide"><i class="icon icon-plus"></i>
          <div class="opis">Описание</div>
        </div></a><a href="#" class="stat-item"><img src="/wp-content/themes/voxlink/img/stat6.jpg">
        <div class="stat-hide"><i class="icon icon-plus"></i>
          <div class="opis">Описание</div>
        </div></a>
      </div>
      <div class="webinars">
        <h3 class="orange-dot">ближайшие Вебинары</h3>
        <div class="webinars__item">

          <div class="webinar__sticker">ONLINE</div>

          <div class="clearfix"></div>

          <ul id="webinar" class="gallery content-slider list-unstyled clearfix">
            <?php
              $mwebinars_json = file_get_contents("https://voxlink.ru/mikrotik-webinars.json");
              $mwebinars = json_decode($mwebinars_json);

              $awebinars_json = file_get_contents("https://voxlink.ru/asterisker-webinars.json");
              $awebinars = json_decode($awebinars_json);
              $webinars = array_merge($mwebinars, $awebinars);
              usort($webinars, function($a, $b) {
                  return $b->date - $a->date;
              });
            ?>
            <?php foreach($webinars as $key=>$webinar){?>
              <?php if($key <= 4){?>
              <li>
                <?php
                  $trainer = get_post($webinar->trainer);
                  $trainerMeta = get_post_meta($webinar->trainer);
                  $trainerImg = get_the_post_thumbnail_url($trainer->ID,"product_itm");
                ?>
                <div class="webinars__date" data-date="<?php echo $webinar->date; ?>">
                  <div class="webinars__date__item">
                    <div>
                      <?php $dateNumber = substr($webinar->date, 6, 2); ?>
                      <strong><?php echo $dateNumber; ?></strong>
                      <?php echo numberMonthToText(substr($webinar->date, 4, 2));?>
                    </div>
                    <i class="icon icon-calendar"></i>
                  </div>
                  <div class="webinars__date__item">
                    <?php
                    $time = str_replace("-", ":", $webinar->time);
                    ?>
                    <div>
                      <strong><?php echo $time; ?></strong>
                      начало
                    </div>
                    <i class="icon icon-time"></i>

                  </div>
                  <div class="webinars__date__item">
                    <div>
                      <?php $duration = explode(" ", $webinar->duration); ?>
                      <strong><?php echo $duration[0];?></strong>
                      <?php echo $duration[1];?>
                    </div>
                    <i class="icon icon-date"></i>
                  </div>
                </div>
                <div class="webinar__item">

                  <div class="webinar__dop left">
                    <?php echo $trainer->post_title; ?>
                  </div>
                  <?php
                  $trainerPost = $trainerMeta['post2'][0];
                  ?>
                  <div class="webinar__dop right">
                    <?php echo $trainerPost; ?>
                  </div>
                  <div class="webinar__item__img" style="background-image: url(<?php echo $trainerImg; ?>);"></div>
                  <a href="<?php echo $webinar->url; ?>">
                    <p>
                      <?php echo $webinar->title; ?>
                    </p>
                  </a>

                  <a href="<?php echo $webinar->url; ?>" class="webinar__btn">
                    Записаться
                  </a>



                </div>
              </li>
              <?php } ?>
            <?php } ?>
          </ul>
          <div class="voip-arrow voip-arrow-left voip-prev webinar-prev">
            <div class="voip-vn-all voip-vn-left"></div>
          </div>
          <div class="voip-arrow voip-arrow-right voip-next webinar-next">
            <div class="voip-vn-all voip-vn-right"></div>
          </div>
        </div>
      </div>

      <div class="why">
          <h3 class="orange-dot">Why Choose HUGE?</h3>


          <div class="why__item">
            <h3>Unlimited pre-designed elements</h3>
            <p>Each and every design element is designed for retina ready display on all kind of devices</p>
          </div>
          <div class="why__item">
            <h3>User friendly interface and design</h3>
            <p>Each and every design element is designed for retina ready display on all kind of devices</p>
          </div>
          <div class="why__item">
            <h3>100% editable layered PSD files</h3>
            <p>Each and every design element is designed for retina ready display on all kind of devices</p>
          </div>
          <div class="why__item">
            <h3>Created using shape layers</h3>
            <p>Each and every design element is designed for retina ready display on all kind of devices</p>
          </div>
      </div>

      <div class="sidebar-subscribe">
                      <img src="/wp-content/themes/voxlink/img/ssubscribe.png">
                      <p>
                        Подпишийтесь и получайте  <br> только свежие новости и материалы
                      </p>

                      <form>
                        <input type="text" name="email" placeholder="Введите ваш email">
                        <input type="submit">
                      </form>

                    </div>
    <?php } ?>



    <?php

    if($_SESSION['terms_in_count'] == 0 && is_product_category() ){ ?>
      <div class="all-sidebar-filters">
          <div class="close-filter">x</div>
          <div class="all-sidebar-filters-inner">
          <?php

          dynamic_sidebar("sidebar-1");

          $prices = get_filter_prices();
          $min  = floor( $prices->min_price );
		      $max  = ceil( $prices->max_price );
		      if(isset($_GET['min_price'])){
		          $currentMin = $_GET['min_price'];
		      }
		      if(isset($_GET['max_price'])){
		          $currentMax = $_GET['max_price'];
		      }

		      if(!isset($currentMin)){
		        $currentMin = $min;
		      }
		      if(!isset($currentMax)){
		        $currentMax = $max;
		      }
          ?>

          <?php if($min != $max){?>
          <div class="price-filter product-filter">
            <h3>Цена</h3>
            <div class="price-filter-block">
              <div class="price-filter-digit price-filter-min">
                <?php echo number_format($currentMin, 0, '', ' ');?>
              </div>
              <div class="price-filter-sep">
                -
              </div>
              <div class="price-filter-digit price-filter-max">
                <?php echo number_format($currentMax, 0, '', ' ');?>
              </div>
              <div class="price-filter-sep">
                руб.
              </div>
            </div>
            <div class="price-filter-slider" data-current-cat-slug="<?php echo $currentCat->slug; ?>" data-current-min="<?php echo $currentMin;?>" data-current-max="<?php echo $currentMax;?>" data-max="<?php echo $max; ?>" data-min="<?php echo $min; ?>"></div>
          </div>
          <?php } ?>




          <div class="filter-attrs">



            <div class="sidebar-filter-block">
              <h3>Наличие</h3>
              <label>
                <input type="checkbox" <?php if(isset($_GET['stock']) && $_GET['stock'] == "instock"){?>checked<?php } ?> name="stock" data-value="instock">
                <span>Только в наличии</span>
              </label>
            </div>



            <?php

            // Фильтры по атрибутам
            $attrsInFilter = get_field("filter", "option");
            $filterAttrs = wc_get_attribute_taxonomies();
            $query_type = "AND";
            ?>

            <?php foreach($attrsInFilter as $attr){
              $taxonomy = $attr["value"];
              $get_terms_args = array( 'hide_empty' => '1' );
              $orderby = wc_attribute_orderby( $taxonomy );
              switch ( $orderby ) {
          			case 'name' :
          				$get_terms_args['orderby']    = 'name';
          				$get_terms_args['menu_order'] = false;
          			break;
          			case 'id' :
          				$get_terms_args['orderby']    = 'id';
          				$get_terms_args['order']      = 'ASC';
          				$get_terms_args['menu_order'] = false;
          			break;
          			case 'menu_order' :
          				$get_terms_args['menu_order'] = 'ASC';
          			break;
          		}
          		$terms = get_terms( $taxonomy, $get_terms_args );
          		if(!is_wp_error($terms)){
          		  layered_nav_list($terms, $taxonomy, $query_type, $attr["label"]);
          		}
            ?>

            <?php } ?>
          </div>
        </div>
      </div>
    <?php } ?>


</div>
<?php } ?>