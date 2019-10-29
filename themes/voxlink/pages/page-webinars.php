<?php
/*
Template Name: Вебинары
*/
get_header();

// global $wpdb;
// $result = $wpdb->get_results( "UPDATE wp_posts SET post_content=(REPLACE (post_content, 'http://79.137.209.54',''));");
// $result = $wpdb->get_results( "UPDATE wp_posts SET post_content=(REPLACE (post_content, 'http://voxlink.ru',''));");
// $result = $wpdb->get_results( "UPDATE wp_posts SET post_content=(REPLACE (post_content, 'http://9898599.ru',''));");
?>

    <div class="main-content">
      <div class="inner">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-9 col-md-8 col-xs-12">

                <div class="wtop-header">
                    <h2>Вебинары</h2>
                    <a href="#" class="btn">Записи старых вебинаров</a>
                </div>
                <a href="#" class="wtheme">Хотите предложить тему для вебинара?</a>
                <div class="webinar-sorder">
                    <div>
                        <p>
                           Сортировать по:
                        </p>
                        <select name="order">
                            <option>Ближайшим</option>
                        </select>
                    </div>
                </div>
                <div class="webinars">
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

			            	<?php
			                  $trainer = get_post($webinar->trainer);
			                  $trainerMeta = get_post_meta($webinar->trainer);
			                  $trainerImg = get_the_post_thumbnail_url($trainer->ID,"product_itm");
			                ?>
                            <div class="webinar">
                                <div class="webinar-row">
                                    <div class="webinar-item">
                                        <div class="wdate">
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
    									<div class="wname"><?php echo $trainer->post_title; ?></div>
    									<a href="<?php echo $webinar->url; ?>" class="btn" target="_blank">
    									    Записаться
    									</a>
                                    </div>
                                    <div class="webinar-item">
                                        <div class="wdays-to">
                                            <?php
                                            $date1 = new DateTime(substr($webinar->date, 4, 2).'/'.$dateNumber.'/'.substr($webinar->date, 0, 4));
                                            $date2 = new DateTime();
                                            $diff = $date1->diff($date2);
                                            ?>
                                            через <?php echo plural_form($diff->days,array("день","дня","дней")); ?>
                                        </div>
                                        <div class="wtime">
                                            <?php echo $webinar->time; ?>
                                        </div>
                                        <div class="wtitle">
                                             <?php echo $webinar->title; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    <?php } ?>
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