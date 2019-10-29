<?php
/* Template Name: Home2 */

get_header(); ?>


<div class="main-page-content">
	<div class="mSlider-cont">
		<div class="inner">
		</div>
		<div class="mSlider owl-carousel">
			<div class="mSlider-item mslider1" style='background-image: url(/wp-content/themes/voxlink/minimg/mslider1.jpg);'>
				<div class="inner">
					<div class="container-fluid">
						<div class="row">
							<div class="col-xs-6 col-sm-6">
								<img src="/wp-content/themes/voxlink/minimg/chel.png" alt="">
							</div>
							<div class="col-xs-6 col-sm-6">
								<div class="mSlider-text-cont">
									<div class="mSlider-text">
										<h3>IP-телефония и CRM-система без абонентской платы на всю жизнь</h3>
										<p>
											Комплексное внедрение телефонии + базовая настройка CRM-системы все от <strong>65 000 рублей</strong> за проект
										</p>
										<a href="/solutions/small-business/" class="mSlider-more">
											Подробнее
											<i class="icon icon-m-more"></i>
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="mSlider-item mslider1" style='background-image: url(/wp-content/themes/voxlink/minimg/mslider2.jpg);'>
				<div class="inner">
					<div class="container-fluid">
						<div class="row">
							<div class="col-xs-6 col-sm-6">
								<img src="/wp-content/themes/voxlink/minimg/chel1.png" alt="">
							</div>
							<div class="col-xs-6 col-sm-6">
								<div class="mSlider-text-cont">
									<div class="mSlider-text">
										<h3>Бесплатная техническая поддержка Вашего Asterisk на всю жизнь</h3>
										<p>
											Решаем любые проблемы с Вашим сервером Asterisk бесплатно (лимит обращений – 1 час в месяц)
										</p>
										<a href="/projects/free-techsupport/" class="mSlider-more">
											Подробнее
											<i class="icon icon-m-more"></i>
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="mSlider-item mslider1" style='background-image: url(/wp-content/themes/voxlink/minimg/mslider3.jpg);'>
				<div class="inner">
					<div class="container-fluid">
						<div class="row">
							<div class="col-xs-6 col-sm-6">
								<img src="/wp-content/themes/voxlink/minimg/chel2.png" alt="">
							</div>
							<div class="col-xs-6 col-sm-6">
								<div class="mSlider-text-cont">
									<div class="mSlider-text">
										<h3>Решения VoxLink для Call-центров любых масштабов</h3>
										<p>
											Автоматизируем с интеллектом входящие и исходящие звонки. Поднимите обслуживание клиентов на новый уровень.
										</p>
										<a href="/solutions/call-center/" class="mSlider-more">
											Подробнее
											<i class="icon icon-m-more"></i>
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="mSlider-item mslider1" style='background-image: url(/wp-content/themes/voxlink/minimg/mslider4.jpg);'>
				<div class="inner">
					<div class="container-fluid">
						<div class="row">
							<div class="col-xs-6 col-sm-6">
								<img src="/wp-content/themes/voxlink/minimg/chel3.png" alt="">
							</div>
							<div class="col-xs-6 col-sm-6">
								<div class="mSlider-text-cont">
									<div class="mSlider-text">
										<h3>Обучение Asterisk: 5-ти дневный очный курс по Asterisk в Москве</h3>
										<p>
											Выбирайте программу обучения: «Интенсив-курс по Asterisk», «Asterisk в Крупном бизнесе», «Asterisk в Call-центре»
										</p>
										<a href="/edu/asterisk/" class="mSlider-more">
											Подробнее
											<i class="icon icon-m-more"></i>
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

    <div class="reshenie-content loading" style="padding-bottom: 0;">
      <div class="inner">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <h2 class="tac">Все готовые решения</h2>

              <div class="resh-slider">
                <ul id="ip">
                  <?php
                    $solutions = get_posts(array(
                        "post_type" => "solutions",
                        "posts_per_page" => -1,
                        "order" => "ASC"
                    ));
                  ?>

                  <?php foreach($solutions as $solution){
						$hidemain = get_field("hidemain", $solution->ID);
						if($hidemain != 1){
							 $post_object = get_post( $solution->ID );

		                      setup_postdata( $GLOBALS['post'] =& $post_object );
		                      get_template_part("loop/solution");
		                      wp_reset_postdata();
						}


                  } ?>
                </ul>
                <a href="#" class="ip-prev"></a>
                <a href="#" class="ip-next"></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="main-services" style="background-image: url(/wp-content/themes/voxlink/newimg/main-services-bg.png);">
    	<div class="inner">
    		<div class="container-fluid">
    			<div class="row">
    				<div class="col-md-12">
    					<h2>Услуги компании</h2>



						<div class="main-services-tabs">

							<?php

							$services = get_posts(array(
								"post_type" => "main_services",
								"posts_per_page" => -1,
								"order" => "ASC"
							));

							?>

							<?php
							$counter = 0;
							foreach($services as $service){
								$counter++;
								$post_object = get_post( $service->ID );
				                setup_postdata( $GLOBALS['post'] =& $post_object );
				                $post_meta = get_post_meta(get_the_ID());
				                $icon = wp_get_attachment_image_url( $post_meta['icon'][0], "full");
							?>
								<a href="#stab<?php echo $counter; ?>" class="tab-link <?php if($counter == 1){?>active<?php } ?>" data-color="<?php echo $post_meta['color'][0]; ?>">
									<?php
									$url = $icon;
									$ch = curl_init();
									curl_setopt($ch, CURLOPT_USERPWD, "kv:01");
									curl_setopt($ch, CURLOPT_URL, $url);
									curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
									curl_setopt($ch, CURLOPT_REFERER, $_SERVER['REQUEST_URI']);
									$svg = curl_exec($ch);
									curl_close($ch);
									echo $svg;
									?>
									<span><?php the_title(); ?></span>
									<span class="tab-link-line" style="background-color: <?php echo $post_meta['color'][0]; ?>;"></span>
								</a>
							<?php
								wp_reset_postdata();
								}
							?>

						</div>


						<div class="tabs-container">
							<?php
							$counter = 0;
							foreach($services as $service){
								$counter++;
								$post_object = get_post( $service->ID );
				                setup_postdata( $GLOBALS['post'] =& $post_object );
								$post_meta = get_post_meta(get_the_ID());
				                $icon = wp_get_attachment_image_url( $post_meta['icon'][0], "full");
							?>
								<div id="stab<?php echo $counter; ?>" class="tab stab <?php if($counter == 1){?>active<?php } ?>">

									<div class="row">
										<div class="col-sm-6">
											<div class="stab-img" style="background-color: <?php echo $post_meta['color'][0]; ?>;">
												<?php
													$url = $icon;
													$ch = curl_init();
													curl_setopt($ch, CURLOPT_USERPWD, "kv:01");
													curl_setopt($ch, CURLOPT_URL, $url);
													curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
													curl_setopt($ch, CURLOPT_REFERER, $_SERVER['REQUEST_URI']);
													$svg = curl_exec($ch);
													curl_close($ch);
													echo $svg;
												?>
											</div>
											<div class="mapa-content" style="--my-color-var: <?php echo $post_meta['color'][0]; ?>;">
												<h3 style="color: <?php echo $post_meta['color'][0]; ?>;">
													<?php the_title(); ?>
												</h3>
												<?php the_content(); ?>
											</div>
											<div class="tabs-buttons">
												<a href="<?php echo $post_meta['href'][0]; ?>" class="btn btn-orange2" style="background-color: <?php echo $post_meta['color'][0]; ?>;">
													Еще преимущества
												</a>
												<a href="#questions" class="btn btn-empty" rel="m_PageScroll2id">
													Задать вопрос
												</a>
											</div>
										</div>
										<div class="col-sm-6">
											<?php
												$url = get_the_post_thumbnail_url( get_the_id() );
											?>
											<img src="<?php echo $url; ?>" alt="">
										</div>

									</div>
								</div>
							<?php
								wp_reset_postdata();
							}
							?>
						</div>


    				</div>
    			</div>
    		</div>
    	</div>
    </div>


	<div class="main-digits"  style="background-image: url(/wp-content/themes/voxlink/minimg/digits.jpg);">
		<div class="inner">
    		<div class="container-fluid">
    			<div class="row">
    				<div class="col-md-12">
    					<h2 class="white">Мы в цифрах</h2>
    					<div class="digit-items">

    						<?php $digits = get_field("digits", "option"); ?>

    						<?php if(count($digits) > 0){?>
    							<?php foreach($digits as $i){?>
	    						<div class="digit-item">
									<h3 class="white with-border"><?php echo $i['h']; ?></h3>
									<p>
										<?php echo $i['v']; ?>
									</p>
								</div>
								<?php } ?>
							<?php } ?>
    					</div>

    				</div>

    			</div>
    		</div>
    	</div>
	</div>

	<div class="main-developments">
		<div class="inner">

			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						<h2>Наши разработки</h2>
						<div class="md-slider-cont loading">
							<a href="#" class="ip-prev mdSlider-prev"></a>
							<a href="#" class="ip-next mdSlider-next"></a>
							<div class="main-developments-slider">

								<?php
								$counter = 0;
				              	$args = array(
				              		"post_type" => "developments",
									"posts_per_page" => -1,
									"order" => "ASC"
								);

								$query = new WP_Query( $args );

								// Цикл
								if ( $query->have_posts() ) {
									while ( $query->have_posts() ) {
										$query->the_post();?>
				                    <?php
				                    	$counter++;
				                    	$post_meta = get_post_meta(get_the_ID());
										$icon = wp_get_attachment_url($post_meta['icon'][0]);
									?>
									<div class="md-slide-cont" data-slide="<?php echo $counter; ?>">


										<div>
											<img src="<?php echo $icon; ?>" alt="">

											<?php
												$title = get_the_title();
												$titleArr = explode(" ", $title);
												if(count($titleArr) <= 5 && count($titleArr) > 3){
													$strongWords = 2;
												}else if(count($titleArr) <= 3){
													$strongWords = 1;
												}else {
													$strongWords = 0;
												}
												$strongTitle = array_splice($titleArr, -(int)$strongWords, $strongWords);
												$titleArr[] = "<strong>";
												foreach($strongTitle as $word){
													$titleArr[] = $word;
												}
												$titleArr[] = "</strong>";
												$title = join(" ", $titleArr);
											?>

											<p>
												<?php echo $title; ?>
											</p>
											<div class="md-price" <?php if(get_the_ID() == 8302){?>style="border-right: 0;"<?php } ?>>
												<strong><?php echo $post_meta["price"][0]; ?></strong>
												руб.
											</div>

											<?php if(get_the_ID() != 8302){ ?>
											<div class="md-info">
												<i class="icon mdi-icon"></i>
												<strong><?php echo $post_meta["infa1"][0]; ?></strong>
											</div>
											<?php } ?>

										</div>
									</div>

								<?php
									}
								} else {
									// Постов не найдено
								}
								// Возвращаем оригинальные данные поста. Сбрасываем $post.
								wp_reset_postdata();
			              		?>
							</div>
						</div>
						<?php
						$counter = 0;
						if ( $query->have_posts() ) {
							while ( $query->have_posts() ) {
								$query->the_post();
								$counter++;
								$post_meta = get_post_meta(get_the_ID());
						?>

							<div class="main-developments-content <?php if($counter == 1){?>active<?php } ?>" data-slide="<?php echo $counter; ?>">
							<div class="row">
								<div class="col-md-6">
									<div class="row">
										<div class="col-xs-12">
											<div class="mapa-content">
												<h3>Особенности</h3>
												<p><?php echo $post_meta["features"][0]; ?></p>
											</div>


											<div class="mapa-content mapa-content-adv">
												<h3>Преимущества</h3>
												<p><?php echo $post_meta["advantages"][0]; ?></p>
											</div>
										</div>
									</div>
								</div>

								<div class="col-md-6">
										<div class="mr-images-cont">
											<div class="mr-images owl-carousel">
												<?php
													$images = get_field("images");
												?>
												<?php foreach($images as $img){?>
												<div>
													<a href="<?php echo $img['url']; ?>" class="single-photo-popup">
														<img src="<?php echo $img['sizes']['developments']; ?>" alt="">
													</a>
												</div>
												<?php } ?>
											</div>

										</div>
										<div class="tac">
											<a href="#" class="btn btn-orange2">
												Подробнее
											</a>
										</div>
								</div>
							</div>

						</div>

						<?php
							}
						} else {
							// Постов не найдено
						}
						// Возвращаем оригинальные данные поста. Сбрасываем $post.
						wp_reset_postdata();
			            ?>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="main-exp"  style="background-image: url(/wp-content/themes/voxlink/minimg/main-exp.jpg); ">
		<div class="inner">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						<i class="icon icon-mplay"></i>
						<h3>Опыт компании Вокс Линк</h3>
						<p>
							- это более 600 внедрений Asterisk по всей России
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="main-webinars">
		<div class="inner">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						<h2>Вебинары</h2>
					</div>
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
		            	<?php if($key <= 2){?>
			            	<?php
			                  $trainer = get_post($webinar->trainer);
			                  $trainerMeta = get_post_meta($webinar->trainer);
			                  $trainerImg = get_the_post_thumbnail_url($trainer->ID,"product_itm");
			                ?>
							<div class="col-md-4">
								<div class="mw-item">
									<div class="mw-item-date">
										<?php $dateNumber = substr($webinar->date, 6, 2); ?>
					                    <strong><?php echo $dateNumber; ?></strong>
					                    <span style="text-transform: uppercase;"><?php echo mb_substr(numberMonthToText(substr($webinar->date, 4, 2)),0, 3);?></span>
									</div>
									<div class="mw-item-type">
										<strong>ONLINE</strong>
										webinar
									</div>
									<div class="mw-item-img">
										<img src="<?=$trainerImg?>" alt="">
									</div>
									<div class="mw-item-text">
										<div class="mw-item-name">
											<?php echo $trainer->post_title; ?>
											<?php
							                	$trainerPost = $trainerMeta['post2'][0];
							                ?>
											<span><?php echo $trainerPost; ?></span>
										</div>
										<p>
											<?php echo $webinar->title; ?>
										</p>
									</div>
									<div class="btn-mw-cont">
										<a href="<?php echo $webinar->url; ?>" class="btn btn-mw-more">Подробнее</a>

										<a href="<?php echo $webinar->url; ?>" class="btn btn-mw-order">Записаться</a>

									</div>

								</div>
							</div>
						<?php } ?>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>

	<div class="main-kb main-kb-add">
      <div class="inner">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-4">
              <div>
                <h2 class="white with-border">База знаний</h2>
                <p>
                  В современном обществе не обходится ни одного дня, где человек не использовал бы «мессенджеры». Для примера был взят один — Телеграм. Плюсы данного мессенджера — открыты API, Telegram развивает свой API для ботов, и с каждым днем их становится все больше.
                </p>
                <a href="/kb/" class="main-kb-btn">Перейти в раздел</a>
              </div>
              <div class="main-kb-bg"  style="background-image: url(/wp-content/themes/voxlink/minimg/kb_bg.jpg);"></div>
            </div>
            <div class="col-md-8">
              <h3>Новые статьи</h3>
	 			<div class="row">
              		<?php
              		$args = array(
              			"post_type" => "kb",
						'posts_per_page' => 4,
						"orderby" => "date",
						"order" => "DESC"
					);

					$query = new WP_Query( $args );

					// Цикл
					if ( $query->have_posts() ) {
						while ( $query->have_posts() ) {
							$query->the_post();?>
							<div class="col-md-6 main-kb-item">

			                    <div class="row">

			                      <?php
									$item = get_post(get_the_ID());
			                        $imgUrl = get_the_post_thumbnail_url();
			                        $c = "col-sm-6";

			                      ?>
			                      <div class="<?php echo $c; ?>">
			                        <a href="<?php echo get_the_permalink(); ?>" class="main-kb-img" <?php if(!empty($imgUrl)){?> style="background-image: url(<?php echo $imgUrl; ?>);"<?php } ?>></a>
			                      </div>
			                      <div class="<?php echo $c; ?>">
			                        <a href="<?php echo get_the_permalink(); ?>" class="main-kb-item-title"><?php echo $item->post_title; ?></a>
			                      </div>

			                    </div>
			                    <p>
			                      <?php echo wp_trim_words( $item->post_excerpt, 20, " ..."); ?>
			                    </p>
			                    <div class="main-kb-meta">
			                      <?php echo get_the_author_meta("display_name", $item->post_author )?> / <?php echo get_the_date( "j F, Y" ); ?>
			                      	<a href="<?php echo get_the_permalink(); ?>" class="main-kb-more"></a>
			                    </div>

			                </div>
					<?php
						}
					} else {
						// Постов не найдено
					}
					// Возвращаем оригинальные данные поста. Сбрасываем $post.
					wp_reset_postdata();
              		?>

              	</div>
          	</div>
          </div>
        </div>
      </div>
    </div>

	<div class="main-news">
		<div class="inner">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						<h2>Новости компании</h2>
						<div class="main-news-slider loading">
							<?php
							  $counter = 0;
		                      $args = array(
		                        'post_type' => "post",
		                        'posts_per_page' => 6,
		                        'orderby' => 'date',
		                        'order' => 'DESC'
		                      );

		                      $news = new WP_Query( $args );
		                      ?>

		                      <?php while($news->have_posts()) :
		                           $news->the_post();
		                           $counter++;
		                       ?>
		 						<?php if($counter%2 != 0){?>
		 						<div class="mns-slide">
		 						<?php } ?>
		                        <a href="<?php the_permalink(); ?>" class="mns-item">
									<?php
										$imgURL = get_the_post_thumbnail_url();
										if(empty($imgURL)){
											$imgURL = "/wp-content/themes/voxlink/minimg/news-img.png";
											$color = "background-color: #ebebeb;";
										}else{
											$color = "";
										}
									?>
									<?php if($counter%2 != 0){?>
										<div class="mns-item-img"  style="background-image: url(<?php echo $imgURL; ?>); <?=$color?>"></div>
									<?php } ?>
									<div class="mns-item-text">
										<div class="mns-item-date">
											<?php echo get_the_date("j F"); ?> <br>
											<?php echo get_the_date("Y"); ?>
										</div>
										<div class="mns-item-title"><?php the_title(); ?></div>
									</div>
									<?php if($counter%2 == 0){?>
										<div class="mns-item-img" style="background-image: url(<?php echo $imgURL; ?>); <?=$color?>"></div>
									<?php } ?>
								</a>
								<?php if($counter%2 == 0){?>
								</div>
								<?php } ?>

		                      <?php  endwhile; ?>

		                      <?php
		                      wp_reset_postdata();
		                    ?>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="main-kb main-ed">
      <div class="inner">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-4">
              <div>
                <h2 class="white with-border">Учебный центр</h2>
                <p>
                  Курсы по IP-телефонии Asterisk регулярно проводятся нашей компанией порядка 3-х лет. Основная категория слушателей — IT-специалисты, которым нужно за короткий срок получить основные навыки по работе с Asterisk, его внедрению и его отладке.
                </p>
                <a href="#" class="main-kb-btn">Перейти в раздел</a>
              </div>
              <div class="main-kb-bg" style="background-image: url(/wp-content/themes/voxlink/minimg/edcenter.jpg);"></div>
            </div>
            <div class="col-md-8">
              <h3>Ближайшие курсы</h3>
           		<div class="row">
           			<?php
		              $mcourses_json = file_get_contents("https://voxlink.ru/mikrotik-courses.json");
		              $mcourses = json_decode($mcourses_json);

		              $acourses_json = file_get_contents("https://voxlink.ru/asterisker-courses.json");
		              $acourses = json_decode($acourses_json);
		              $courses = array_merge($mcourses, $acourses);
		              usort($courses, function($a, $b) {
		                  return $a->date_start - $b->date_start;
		              });

		            ?>
		            <?php foreach($courses as $key=>$webinar){?>
			            <?php if($key <= 1){?>
				            <?php
			                  $trainer = get_post($webinar->trainer);
			                  $trainerMeta = get_post_meta($webinar->trainer);
			                  $trainerImg = get_the_post_thumbnail_url($trainer->ID,"developments");
			                ?>
		           			<div class="col-md-6">
		           				<div class="me-item">
		           					<div class="me-item-img" style="background-image: url(/wp-content/themes/voxlink/minimg/ed.jpg);">
		           						<img src="<?php echo $trainerImg; ?>" alt="">
		           						<div class="me-item-meta">
		           							<div class="me-item-meta-item">
		           								<i class="icon icon-me-date"></i>


		           								<?php
		           								$dateNumber = substr($webinar->date_start, 6, 2); ?>
		           								<strong><?php echo $dateNumber; ?></strong> <?php echo mb_substr(numberMonthToText(substr($webinar->date_start, 4, 2)),0, 3);?>.
		           								<?php if($webinar->date_start != $webinar->date_end){?>
			           								-
			           								<?php
			           								$dateNumber = substr($webinar->date_end, 6, 2); ?>
			           								<strong><?php echo $dateNumber; ?></strong> <?php echo mb_substr(numberMonthToText(substr($webinar->date_start, 4, 2)),0, 3);?>.
		           								<?php } ?>
		           							</div>
		           							<div class="me-item-meta-item">
		           								<i class="icon icon-me-time"></i>
		           								<strong><?php echo $webinar->time; ?></strong>
		           							</div>
		           						</div>
		           					</div>
		           					<div class="me-item-title">
		           						<?php echo $webinar->name; ?>
		           					</div>

		           					<?php if($webinar->name == "MTCNA"){
		           						$mec = "mtcna";
		           					}else if($webinar->name == "Интенсив-курс по Asterisk"){
		           						$mec = "aster";
		           					}?>

		           					<div class="btn-mw-cont">
		           						<a href="<?php echo $webinar->url; ?>" class="btn btn-mw-more">Подробнее</a>
										<a href="<?php echo $webinar->url; ?>" class="btn btn-mw-order home-course-<?php echo $mec; ?>">Записаться</a>
		           					</div>

		           				</div>
		           			</div>
	           			<?php } ?>
           			<?php } ?>
           		</div>
          	</div>
          </div>
        </div>
      </div>
    </div>

    <!--<div class="main-calc">-->
    <!--	<div class="inner">-->
    <!--		<div class="container-fluid">-->
    <!--			<div class="row">-->
		  <!--  		<div class="col-md-12">-->
		  <!--  			<h2>РАССЧИТАЙТЕ ПРИМЕРНЫЕ РАСХОДЫ НА СВЯЗЬ</h2>-->
		  <!--  		</div>-->

		  <!--  		<div class="col-md-6">-->
		  <!--  			<div class="mc-select-container">-->
		  <!--  				<div class="mc-select">-->
			 <!--   				<p>Подключаемый номер</p>-->
			 <!--   				<select name="pnumber">-->
			 <!--   					<option>Москва 495</option>-->
			 <!--   				</select>-->
			 <!--   			</div>-->
			 <!--   			<div class="mc-select">-->
			 <!--   				<p>Тип подключаемого номера</p>-->
			 <!--   				<select name="tnumber">-->
			 <!--   					<option>-->
			 <!--   						Обычный-->
			 <!--   					</option>-->
			 <!--   				</select>-->
			 <!--   			</div>-->
			 <!--   			<div class="mc-slider">-->
			 <!--   				<p>Выбор количества сотрудников</p>-->
			 <!--   				<div class="mc-slider-i mc-slider-i-l" data-name="pcount" data-current="20" data-max="40"></div>-->
			 <!--   				<span>-->
			 <!--   					<span class="mc-slider-i-value">0</span>-->
				<!--					чел.-->
			 <!--   				</span>-->
			 <!--   			</div>-->
			 <!--   			<div class="mc-slider">-->
			 <!--   				<p>Исходящие вызовы на 1 сотрудника в день</p>-->
			 <!--   				<div class="mc-slider-i mc-slider-i-l" data-name="ptime" data-current="10" data-max="40"></div>-->
			 <!--   				<span>-->
			 <!--   					<span class="mc-slider-i-value">18</span>-->
				<!--					мин.-->
			 <!--   				</span>-->
			 <!--   			</div>-->
			 <!--   			<div class="mc-slider">-->
			 <!--   				<p>Процент соотношения вызовов</p>-->
			 <!--   				<div class="mc-slider-i" data-name="procent" data-current="60" data-max="100"></div>-->
			 <!--   				<div class="mc-result-cont pull-left">-->
			 <!--   					<span>-->
				<!--    					<span class="mc-slider-i-value">81%</span>-->
				<!--    				</span>-->
				<!--    				<p>Городские</p>-->
			 <!--   				</div>-->
			 <!--   				<div class="mc-result-cont pull-right">-->
			 <!--   					<span>-->
				<!--    					<span class="mc-slider-i-value">19%</span>-->
				<!--    				</span>-->
				<!--    				<p>Мобильные</p>-->
			 <!--   				</div>-->
			 <!--   			</div>-->
		  <!--  			</div>-->
		  <!--  		</div>-->

		  <!--  		<div class="col-md-6">-->
		  <!--  			<p>Стоимость подключения</p>-->
		  <!--  			<table>-->
		  <!--  				<tr>-->
		  <!--  					<td>Стоимость подключения номера (разово):</td>-->
		  <!--  					<td><span id="mcp1">990.00</span> руб.</td>-->
		  <!--  				</tr>-->
		  <!--  				<tr>-->
		  <!--  					<td>Абонентская плата:</td>-->
		  <!--  					<td><span id="mcp2">150.00</span> руб.</td>-->
		  <!--  				</tr>-->
		  <!--  				<tr>-->
		  <!--  					<td>Виртуальная АТС:</td>-->
		  <!--  					<td><span id="mcp3">708.00</span> руб.</td>-->
		  <!--  				</tr>-->
		  <!--  				<tr>-->
		  <!--  					<td>Средняя стоимость исходящих звонков (ежемесячно):</td>-->
		  <!--  					<td><span id="mcp4">21.13</span> руб.</td>-->
		  <!--  				</tr>-->
		  <!--  			</table>-->

		  <!--  			<div class="mc-total row">-->
		  <!--  				<div class="col-xs-5">-->
		  <!--  					<strong>Итого</strong>-->
				<!--				<p>1-й платеж:</p>-->
		  <!--  				</div>-->
		  <!--  				<div class="col-xs-7">-->
		  <!--  					<div class="mc-total-price">-->
		  <!--  						<strong>2 059.30</strong>-->
				<!--					руб.-->
		  <!--  					</div>-->
		  <!--  				</div>-->
		  <!--  			</div>-->
		  <!--  			<div class="tac">-->
				<!--			<a href="#" class="btn btn-empty mc-reset">-->
				<!--				<i class="icon icon-mc-reset"></i>-->
				<!--				Сбросить-->
				<!--			</a>-->
			 <!--   			<a href="#" class="btn btn-orange2">-->
				<!--				Подключить-->
				<!--			</a>-->
		  <!--  			</div>-->

		  <!--  		</div>-->
		  <!--  	</div>-->
    <!--		</div>-->
    <!--	</div>-->
    <!--</div>-->

    <div class="main-otr">
    	<div class="inner clearfix">
    		<div class="main-otr4">
    		</div>
    		<div class="main-otr2 main-otr3">
    			<a href="#" class="motrSlider-prev"></a>
				<a href="#" class="motrSlider-next"></a>
    		</div>
    		<div class="clearfix"></div>
    		<div class="main-otr1">
    			<div>
    				Выберите <br>
					ip телефонию <br>
					для своей <br>
					отрасли
    			</div>
    			<div class="main-otr1-bg" style="background-image: url(/wp-content/themes/voxlink/minimg/mainotr.png);"></div>
    		</div>
    		<div class="main-otr2">
    			<div class="main-otr-slider">
					<?php
					$otr = get_posts(array(
						"post_type" => "page",
						"post_parent" => 2302,
						"posts_per_page" => -1
					));
					?>

					<?php foreach($otr as $i){?>


    				<div class="mot-item" style="background-image: url(<?php echo get_the_post_thumbnail_url($i->ID, "otr"); ?>);">

    					 <span><?php echo $i->post_title; ?></span>

    				</div>
    				<?php } ?>
    			</div>
    		</div>
    	</div>
    </div>


    <div class="main-clients">
    	<div class="inner">
    		<div class="container-fluid">
    			<div class="row">
		    		<div class="col-md-12">
		    			<h2>Клиенты</h2>
		    		</div>
					<?php
                        mainclients();
                    ?>
		    	</div>
		    </div>
		</div>
	</div>

	<div class="main-clients-about loading">
		<div class="inner">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
			    		<h2>Клиенты  о нас</h2>

						<?php $aboutus = get_field("aboutus", "option"); ?>


			    		<div class="main-clients-about-full-slider owl-carousel">
			    			<?php foreach($aboutus as $key=>$c){?>
			    			<div class="main-clients-about-full-cont">
					    		<div class="main-clients-about-full" id="clAboutFull<?php echo $key; ?>">
									<img src="<?php echo $c['photo']['sizes']['medium']; ?>" alt="">
									<div class="main-clients-about-text">
										<p>
											<span>
												<?php echo $c['text']; ?>
											</span>
										</p>
										<strong><?php echo $c['name']; ?></strong>
										<span><?php echo $c['post']; ?></span>
									</div>
								</div>
							</div>
							<?php } ?>
			    		</div>
			    		<div class="main-clients-about-full-cont">
							<div class="main-clients-about-slider-cont2">
								<div class="main-clients-about-slider-cont">
									<div class="main-clients-about-slider owl-carousel">
										<?php for($i=1;$i<=10;$i++){
											$j = $i - 1;
											?>
											<div class="main-clients-about-slide" data-count="<?php echo $j; ?>">
					                            <img src="/wp-content/themes/voxlink/minimg/clients/client<?php echo $i; ?>.png" alt="">
					                        </div>
				                        <?php } ?>
									</div>
								</div>
								<a href="#" class="ip-prev main-clients-about-slider-prev"></a>
								<a href="#" class="ip-next main-clients-about-slider-next"></a>
							</div>
						</div>
			    	</div>
				</div>

			</div>
		</div>
	</div>

	<?php get_template_part("inc/questions"); ?>


</div>







 <?php get_footer(); ?>