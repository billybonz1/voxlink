<?php
/* Template name: About  */
get_header(); ?>

    <div class="main-content">
      <div class="inner">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-9 col-md-8 col-xs-12">
              <div class="main-content-left main-content-about">
                  <div class="row">
                      <div class="about-top clearfix">
                          <div class="col-md-6">
                              <h1>Voxlink — IP-телефония для вашего бизнеса</h1>
                              <p>
                                  VoxLink является одним из ведущих интеграторов IP-АТС на базе Asterisk в России. Компания предлагает широкий спектр услуг, так или иначе связанных с Asterisk, включая внедрение IP-АТС под ключ. В нашей копилке более 1 000 реализованных проектов, а наш средний клиент – это компания, насчитывающая от 25 до 250 абонентов. При этом в числе наших проектов есть компании с численностью более 2 000 абонентов. Мы проходим со своими клиентами полный цикл реализации проекта - от их задумки до воплощения поставленных задач.
                              </p>
                          </div>
                          <div class="col-md-6">
                              <img src="/wp-content/themes/voxlink/img/about-img.jpg"></img>
                          </div>
                      </div>
                  </div>


                  <div class="about-map">
                      <h2>Наши офисы <br> расположены:</h2>
                      <div class="russiamap">
                          <img src="/wp-content/themes/voxlink/img/russiamap.png">
                          <div class="russiamap__dot dot1">
                              <div>
                                  <img src="/wp-content/themes/voxlink/img/moscowmap.jpg">
                                  <span>
                                      <h4>г. Москва</h4>
                                      <p>
                                          ул.Гостиничная д. 3 <br> офис 314
                                      </p>
                                  </span>
                              </div>
                          </div>
                          <div class="russiamap__dot dot2">
                              <div>
                                  <img src="/wp-content/themes/voxlink/img/moscowmap.jpg">
                                  <span>
                                      <h4>г. Москва</h4>
                                      <p>
                                          ул.Гостиничная д. 3 <br> офис 314
                                      </p>
                                  </span>
                              </div>
                          </div>

                          <div class="russiamap__dot dot3">
                              <div>
                                  <img src="/wp-content/themes/voxlink/img/moscowmap.jpg">
                                  <span>
                                      <h4>г. Москва</h4>
                                      <p>
                                          ул.Гостиничная д. 3 <br> офис 314
                                      </p>
                                  </span>
                              </div>
                          </div>
                      </div>
                  </div>


                  <?php
                    $team = get_posts(array(
                        "post_type" => "team",
                        "posts_per_page" => -1,
                        "orderby" => "create_date",
                        "order" => "ASC",
                        'meta_query' => array(
                      		'relation' => 'AND',
                      		array(
                      			'key' => 'show_on_site',
                      			'value' => '1'
                      		)
                      	)
                    ));
                  ?>


                  <div class="team-slider loading">
                      <?php $counter = 0;?>
                      <?php foreach($team as $member){
                        $counter++;
                      ?>
                      <?php if($counter == 1 || $counter%5 == 1){?>
                      <div>
                          <div class="team-slider__item x2">
                              <h2>Наша команда</h2>
                              <p>
                                  Наша компания состоит из молодых специалистов, которые быстро адаптируются к переменам. Все-таки IP-телефония постоянно совершенствуется, и этому необходимо соответствовать.
                              </p>
                          </div>
                      <?php } ?>
                      <?php $url = get_the_post_thumbnail_url( $member->ID );?>
                      <div class="team-slider__item gray">
                          <img src="<?=$url?>" alt="<?php echo $member->post_title; ?>" title="<?php echo $member->post_title; ?>">
                      </div>
                      <?php if($counter == 5 || $counter%5 == 0 || $counter == count($team)){?>
                          <div class="team-slider__item text">
                              <p>Более <strong>20</strong> <br> сотрудников</p>
                              <a href="/about-us/team/">
                                Подробнее
                              </a>
                          </div>
                          <div class="clearfix"></div>
                      </div>
                      <?php } ?>

                      <?php } ?>
                  </div>



                  <div class="our-developments clearfix">
                    <h2>Собственные разработки</h2>
                    <div>

                      <?php
                          $developments = get_posts(array(
                            "post_type" => "developments",
                            "posts_per_page" => -1,
                            "order" => "ASC"
                          ));
                      ?>

                      <?php foreach($developments as $d){?>
                      <div class="our-developments__item">
                        <div class="our-developments__img">
                          <?php
                            $post_meta = get_post_meta($d->ID);
				                    $icon = wp_get_attachment_image_url( $post_meta['icon'][0], "full");
                          ?>
                          <img src="<?php echo $icon; ?>"></img>
                        </div>
                        <p>
                          <?php echo $d->post_title; ?>
                        </p>
                      </div>
                      <?php } ?>
                    </div>

                  </div>


                  <div class="our-adv clearfix">
                    <h2>Наши преимущества</h2>
                    <div>
                      <div class="our-adv__item">
                        <div class="our-adv__item__top">
                          <img src="/wp-content/themes/voxlink/img/adve1.png"></img>
                          <span>С нами удобно работать</span>
                        </div>
                        <p>
                          Мы выполняем работы по установке Asterisk «под ключ». Мы сами решаем все вопросы по подключению с операторами телефонии и провайдерами Интернета.
                        </p>
                      </div>

                      <div class="our-adv__item">
                        <div class="our-adv__item__top">
                          <img src="/wp-content/themes/voxlink/img/adve2.png"></img>
                          <span>Наши решения сбалансированы по цене</span>
                        </div>
                        <p>
                          Мы осознаем, что для малого и среднего бизнеса важно экономить каждый рубль. Поэтому мы подбираем как оборудование для IP-АТС, так и операторов телефонии с учетом минимизации всех затрат. При этом мы не делаем «дешево».
                        </p>
                      </div>

                      <div class="our-adv__item">
                        <div class="our-adv__item__top">
                          <img src="/wp-content/themes/voxlink/img/adve3.png"></img>
                          <span>Мы вникаем в потребности клиента</span>
                        </div>
                        <p>
                          Не существует двух одинаковых IP-АТС Asterisk: у каждого нашего Заказчика свои требования к телефонии. Мы предлагаем различные варианты, которые оптимизируют затраты на связь и повысить качество работы сотрудников.
                        </p>
                      </div>

                      <div class="our-adv__item">
                        <div class="our-adv__item__top">
                          <img src="/wp-content/themes/voxlink/img/adve4.png"></img>
                          <span>Мы внедряем безопасные решения</span>
                        </div>
                        <p>
                          Безопасность IP-АТС Asterisk — это краеугольный камень, который невозможно преодолеть людям, не имеющим опыта работы с IP-телефонией. Ведь не секрет, что взлом любой IP-АТС может привести к серьезным убыткам компании.
                        </p>
                      </div>

                      <div class="our-adv__item">
                        <div class="our-adv__item__top">
                          <img src="/wp-content/themes/voxlink/img/adve5.png"></img>
                          <span>Быстрый старт — Asterisk за 24 часа</span>
                        </div>
                        <p>
                          Мы не тянем резину: уже через сутки после подтверждения платежа у Вас будет установлена IP-АТС Asterisk. Мы ценим время наших клиентов, ведь время — это деньги.
                        </p>
                      </div>

                      <div class="our-adv__item">
                        <div class="our-adv__item__top">
                          <img src="/wp-content/themes/voxlink/img/adve6.png"></img>
                          <span>Обучение сотрудников Заказчика</span>
                        </div>
                        <p>
                          Мы не из тех компаний, которые после установки какого-либо продукта стараются всеми средствами привязать клиента к себе навсегда. Мы в обязательном порядке передаем все логины и пароли администратору Заказчика.
                        </p>
                      </div>
                    </div>
                  </div>


                  <?php
                    $clients = get_posts(array(
                      "post_type" => "clients",
                      "posts_per_page" => 5,
                      "meta_key" => "priority",
                      'orderby'=> 'meta_value rand',
                      'order'=>'DESC'
                    ));
                  ?>

                  <div class="our-clients">
                    <h2>Наши крупнейшие клиенты</h2>
                    <p>За 10 лет работы в нашей копилке уже более 200 клиентов</p>
                    <div>
                      <?php
                        aboutclients();
                      ?>
                    </div>

                    <a href="/about-us/our-clients/" class="more-btn">Все клиенты</a>
                  </div>


                  <?php
                    $letters = get_posts(array(
                      "post_type" => "clients",
                      "posts_per_page" => 4,
                      'meta_key' => 'rekomendatel-noe-pis-mo',
                      "meta_query" => array(
                        'relation' => 'AND',
                    		array(
                    			'key' => 'rekomendatel-noe-pis-mo',
                    			'value' => "",
			                    'compare' => '!=',
                    		)
                      ),
                      'orderby'=> 'rand priority',
                      'order'=>'DESC'
                    ));
                  ?>

                  <div class="our-letters">
                    <h2>Рекомендательные письма</h2>
                    <div>
                      <?php foreach($letters as $letter){?>

                        <?php $img = get_field("rekomendatel-noe-pis-mo", $letter->ID); ?>

                        <div class="our-letters__item">
                          <a href="<?php echo $img['url'];?>" class="gallery-item">
                            <img src="<?php echo $img['sizes']['product_itm']; ?>" alt="">
                          </a>
                        </div>
                      <?php } ?>
                    </div>
                    <a href="/about-us/rekomendatelnye-pisma/" class="more-btn">Все письма</a>
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