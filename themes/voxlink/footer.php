
<?php if(!is_404() && !is_front_page()){?>
<div class="clients">
      <div class="inner">
        <div class="container-fluid">
          <div class="row">
            <div class="col-xs-12">
              <h2>Наши<br>клиенты</h2>
              <div class="clients-content">
                <div class="clients-item">
                  <img src="/wp-content/themes/voxlink/img/client1.png">
                  </div>
                <div class="clients-item"><img src="/wp-content/themes/voxlink/img/client2.png"></div>
                <div class="clients-item"><img src="/wp-content/themes/voxlink/img/client3.png"></div>
                <div class="clients-item"><img src="/wp-content/themes/voxlink/img/client4.png"></div>
                <div class="clients-item"><img src="/wp-content/themes/voxlink/img/client5.png"></div>
              </div>
              <a href="/about-us/our-clients/" class="btn btn-clients">Посмотреть все<i class="icon icon-2arrow"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  <?php } ?>
<footer>
  <div class="inner">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-3 col-sm-6">
          <div class="f-item-1"><a href="#top" rel="m_PageScroll2id" class="btn btn-vtop"><i class="icon icon-arrow-vtop"></i></a>
            <div class="f-in"><a href="/" class="logo"><img src="/wp-content/themes/voxlink/img/logo-foot.png"/>
                <p>IP-телефония на базе Asterisk</p></a>
              <div class="foot-item foot-item-mod"><i class="icon icon-phone-foot"></i>
                <div class="foot-item-right">
                  <h6><span>В Москве:</span><br/>
                  <?php if(isset($_GET['utm_source']) && $_GET['utm_source'] == 'yandex'){?>
                  		8 (495) 989-85-99
                  	<?php } else { ?>
                  		8 (495) 989-85-33
                  	<?php } ?>
                  </h6>
                  <p>РФ (Звонок бесплатный):<br/> 8 (800) 333-75-33</p>
                </div>
              </div>
              <div class="foot-item"><i class="icon icon-mail-foot"></i>
                <div class="foot-item-right">
                  <p>team@voxlink.ru</p>
                </div>
              </div>
              <div class="foot-item"><i class="icon icon-geo-foot"></i>
                <div class="foot-item-right">
                  <p>г.Москва, ул. Гостиничная д. 3 офис 314.</p>
                </div>
              </div>
              <img src="/wp-content/themes/voxlink/img/map-foot.jpg" class="map-foot"/>
              <a href="#" class="btn btn-foot">Найти нас на карте</a>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-sm-6">
          <div class="f-item-2">
            <div class="f-in">
              <h4 class="orange-dot">Новые статьи</h4>
              <div class="new-content new-content-mod">
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
                            <?php
                            $img = get_the_post_thumbnail_url();
                            if(empty($img)){ ?>
                            <span class="new-block-img-empty"></span>
                            <?php }else{?>
                            <img src="<?php echo $img; ?>" alt="">
                            <?php } ?>
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
              <h5 class="orange-dot">Подпишийтесь и получайте<br/> только свежие новости и материалы</h5>
              <div class="just-mail form-block">
                <form class="form-shake">
                   <div style="display: none;">
                                  <input type="text" name="fullName" value="" />
                              </div>
                  <input type="hidden" name="action" value="submitForm" />
                  <input type="text" name="email" placeholder="Введите ваш email" />
                  <button name="send" class="btn btn-mail"><i class="icon icon-arrow-mail"></i></button>
                </form>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-sm-6">
          <div class="f-item-3">
            <div class="f-in">
              <h4 class="orange-dot">Популярные теги</h4>
              <?php
                $tags = get_terms( array(
                   'taxonomy' => 'post_tag',
                   'hide_empty' => false,
                   'orderby' => 'count',
                   'order' => 'DESC',
                   'number' => 25
                ));
              ?>

              <?php foreach($tags as $tag){?>
                  <a href="<?php echo get_term_link($tag->term_id); ?>" class="btn btn-tag">
                    <?php echo $tag->name; ?>
                  </a>
              <?php } ?>



            </div>
          </div>
        </div>
        <div class="col-lg-3 col-sm-6">
          <div class="f-item-4">
            <div class="f-in">
              <h4 class="orange-dot">Связаться с нами</h4>
              <div class="foot-form form-block">
                <form class="form-shake">
                   <div style="display: none;">
                                  <input type="text" name="fullName" value="" />
                              </div>
                  <input type="hidden" name="action" value="submitForm" />
                  <div class="field">
                    <input type="text" name="name" placeholder="Имя" />
                  </div>
                  <div class="field">
                    <input type="text" name="email" placeholder="Email" />
                  </div>
                  <textarea name="comment" placeholder="Сообщение"></textarea>
                  <button name="send" class="btn btn-orange">Отправить</button>
                </form>
              </div>
              <div class="social">
                <h4 class="orange-dot">Присоединяйтесь  к нам</h4><a href="#" class="btn btn-vk"></a><a href="#" class="btn btn-you"></a><a href="#" class="btn btn-fb"></a><a href="#" class="btn btn-inst"></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>
<div class="footer-line">
  <div class="inner">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="pull-left">
            <p>@ 2011-<?php echo date("Y"); ?> ООО "Вокс Линк" Установка и настройка Asterisk. IP-телефония для офиса и Call-центры., ИНН: 7715856113, ОГРН: 1117746186084. Все права защищены.</p>
          </div>
          <div class="pull-right"><a href="/files/privacy-policy.pdf" download >Политика конфиденциальности</a></div>
        </div>
      </div>
    </div>
  </div>
</div>

<div id="success" class="reviews-popup mfp-hide">
	Спасибо ! <br>
	Мы свяжемся с Вами в ближайшее время
</div>
<a href="#success" class="open-popup-link"></a>


<a href="#" class="check-number-btn">
  Проверка номера
</a>



<div class="check-number-form">

  <div class="check-number-form-close"></div>

  <div class="check-form-pre-result">
    <img src="/wp-content/themes/voxlink/img/2-layers.png" alt="">
    <h2>Проверка номера</h2>
    <p>
      Быстро узнать мобильного или городского оператора.
      <strong>Впишите номер</strong>
    </p>
    <?php
      $ip = $_SERVER['HTTP_CLIENT_IP'] ? $_SERVER['HTTP_CLIENT_IP'] : ($_SERVER['HTTP_X_FORWARDED_FOR'] ? $_SERVER['HTTP_X_FORWARDED_FOR'] : $_SERVER['REMOTE_ADDR']);
    ?>
    <form class="cnf">
      <label>
        <input type="tel" name="phone1" autocomplete="off" placeholder="+7 ___ - __-__-___">
      </label>
      <div style="display: none;">
        <input type="text" name="name1">
        <input type="hidden" name="checkSite" value="1">
        <input type="hidden" name="ip" value="<?php echo $ip; ?>">
      </div>
      <button class="cfn-btn" disabled>Проверить</button>
    </form>
  </div>

  <div class="check-form-result">
    <img src="/wp-content/themes/voxlink/img/cfresult.svg" alt="">
    <h2>
      Мы проверили номер
    </h2>
    <span>+7 846 254 51 02</span>
    <div class="cfn-operators">
      <p>МТС (с 2016)</p>
      <div class="cfn-arr"></div>
      <p></p>
    </div>

    <a href="#" class="cfn-btn cfn-repeat">Повторить</a>
  </div>





</div>

<?php get_template_part("inc/banners"); ?>



<?php wp_footer(); ?>


<script>
  document.querySelectorAll("input").forEach(function(item){
    item.classList.add("ym-record-keys");
  });
  document.querySelectorAll("[name=fullName]").forEach(function(item){
    item.value = 1;
  });
</script>



<!--<link rel="stylesheet" href="/wp-content/themes/voxlink/libs/contextMenu/contextMenu.css" type="text/css" />-->
<!--<script type="text/javascript" src="/wp-content/themes/voxlink/libs/contextMenu/contextMenu.min.js"></script>-->
<!--<script type="text/javascript" src="/wp-content/themes/voxlink/mega/mega.js"></script>-->

  <script>
     if(document.querySelector('[data-cls="intensive-course"] a')){
       document.querySelectorAll('[data-cls="intensive-course"] a').forEach(function(item){
         item.addEventListener("click", function(){
           ym(7681135, 'reachGoal', 'kurs_aster_verh',{}, function(){
             console.log("kurs_aster_verh");
           });
         });
       });
     }
      
     if(document.querySelector('[data-cls="call-center"] a')){
       document.querySelectorAll('[data-cls="call-center"] a').forEach(function(item){
         item.addEventListener("click", function(){
           ym(7681135, 'reachGoal', 'kurs_callcenr_verh',{}, function(){
             console.log("kurs_callcenr_verh");
           });
         });
       });
     }  
     
     
     if(document.querySelector('[data-cls="mikrotik-course"] a')){
       document.querySelectorAll('[data-cls="mikrotik-course"] a').forEach(function(item){
         item.addEventListener("click", function(){
           ym(7681135, 'reachGoal', 'kurs_mikrotik_verh',{}, function(){
             console.log("kurs_mikrotik_verh");
           });
         });
       });
     }  
     
     
     if(document.querySelector('.top-callback-open')){
       document.querySelectorAll('.top-callback-open').forEach(function(item){
         item.addEventListener("click", function(){
           ym(7681135, 'reachGoal', 'obrat_zvon',{}, function(){
             console.log("obrat_zvon");
           });
         });
       });
     }
     
     
     if(document.querySelector('.top-callback button')){
       document.querySelectorAll('.top-callback button').forEach(function(item){
         item.addEventListener("click", function(){
           ym(7681135, 'reachGoal', 'header_callback',{}, function(){
             console.log("header_callback");
           });
         });
       });
     }
        
      


    
     
     
     if(document.querySelector('.priob-item-in button')){
       document.querySelectorAll('.priob-item-in button').forEach(function(item){
         item.addEventListener("click", function(){
           ym(7681135, 'reachGoal', 'content_form',{}, function(){
             console.log("Goal reached");
           });
         });
       });
     }
     
     
     
     if(document.querySelector('.home-course-mtcna')){
       document.querySelectorAll('.home-course-mtcna').forEach(function(item){
         item.addEventListener("click", function(){
           ym(7681135, 'reachGoal', 'kurs_mikrotik_sergl',{}, function(){
             console.log("kurs_mikrotik_sergl");
           });
         });
       });
     }
     
     if(document.querySelector('.home-course-aster')){
       document.querySelectorAll('.home-course-aster').forEach(function(item){
         item.addEventListener("click", function(){
           ym(7681135, 'reachGoal', 'kurs_aster_sergl',{}, function(){
             console.log("kurs_aster_sergl");
           });
         });
       });
     }
     
    

     if(document.querySelector('.form-quest1 input[type="submit"]')){
       document.querySelectorAll('.form-quest1 input[type="submit"]').forEach(function(item){
         item.addEventListener("click", function(){
           ym(7681135, 'reachGoal', 'zakaz_zvon_form',{}, function(){
             console.log("zakaz_zvon_form");
           });
         });
       });
     }
     
     
     if(document.querySelector('.form-quest2 input[type="submit"]')){
       document.querySelectorAll('.form-quest2 input[type="submit"]').forEach(function(item){
         item.addEventListener("click", function(){
           ym(7681135, 'reachGoal', 'otprav_soobsh_form',{}, function(){
             console.log("otprav_soobsh_form");
           });
         });
       });
     }
     
     
     if(document.querySelector('.form-quest3 input[type="submit"]')){
       document.querySelectorAll('.form-quest3 input[type="submit"]').forEach(function(item){
         item.addEventListener("click", function(){
           ym(7681135, 'reachGoal', 'zayavka_forms3',{}, function(){
             console.log("zayavka_forms3");
           });
         });
       });
     }  
     
     
     if(document.querySelector('.foot-form button')){
       document.querySelectorAll('.foot-form button').forEach(function(item){
         item.addEventListener("click", function(){
           ym(7681135, 'reachGoal', 'form_niz',{}, function(){
             console.log("form_niz");
           });
         });
       });
     }
     
     
     if(document.querySelector('.guard-form input[type="submit"]')){
       document.querySelectorAll('.guard-form input[type="submit"]').forEach(function(item){
         item.addEventListener("click", function(){
           ym(7681135, 'reachGoal', 'tel_vse_str',{}, function(){
             console.log("tel_vse_str");
           });
         });
       });
     }


     if(document.querySelector('.questions2-right input[type="submit"]')){
       document.querySelectorAll('.questions2-right input[type="submit"]').forEach(function(item){
         item.addEventListener("click", function(){
           ym(7681135, 'reachGoal', 'zayavka_forms1',{}, function(){
             console.log("zayavka_forms1");
           });
         });
       });
     }



     if(document.querySelector('.just-mail button')){
       document.querySelectorAll('.just-mail button').forEach(function(item){
         item.addEventListener("click", function(){
           ym(7681135, 'reachGoal', 'footer_subscribe',{}, function(){
             console.log("footer_subscribe");
           });
         });
       });
     }
     
     
     if(document.querySelector('.priob-item input[type="submit"]')){
       document.querySelectorAll('.priob-item input[type="submit"]').forEach(function(item){
         item.addEventListener("click", function(){
           ym(7681135, 'reachGoal', 'content_form',{}, function(){
             console.log("content_form");
           });
         });
       });
     }

      
     if(document.querySelector('a[href="#asterconf-form"]')){
       document.querySelectorAll('a[href="#asterconf-form"]').forEach(function(item){
         item.addEventListener("click", function(){
           ym(7681135, 'reachGoal', 'asterconf_form_open',{}, function(){
             console.log("asterconf_form_open");
           });
         });
       });
     }
    
     
     if(document.querySelector('#asterconf-form button')){
       document.querySelectorAll('#asterconf-form button').forEach(function(item){
         item.addEventListener("click", function(){
           ym(7681135, 'reachGoal', 'asterconf_form_send',{}, function(){
             console.log("asterconf_form_send");
           });
         });
       });
     }
    
     

  </script>

  <?php
  /*
  <a href="https://metrika.yandex.ru/stat/?id=7681135&amp;from=informer"
  target="_blank" rel="nofollow"><img src="https://informer.yandex.ru/informer/7681135/3_1_DBDBDBFF_BBBBBBFF_0_pageviews"
  style="width:88px; height:31px; border:0;" alt="Яндекс.Метрика" title="Яндекс.Метрика" class="ym-advanced-informer" data-cid="7681135" data-lang="ru" /></a>
  <!-- /Yandex.Metrika informer -->

  <!-- Yandex.Metrika counter -->
 
  <noscript><div><img src="https://mc.yandex.ru/watch/7681135" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
  <!-- /Yandex.Metrika counter -->
  <?php */
  ?>
  <!-- Facebook Pixel Code --><script type="text/javascript">(window.Image ? (new Image()) : document.createElement('img')).src = location.protocol + '//vk.com/rtrg?r=xvRaBA6Q4jBeuJ/nN/wpkHnbeUsqxU2F2QTYHa2zGnagozX8hvDCYPUroKq5D08Czhtt6x9SiBGQSD8hRp2XX3T7BjI3vW2a06U0Ox/mq6cu/TN5W*8meQNoKkCXfffiWb7MFi/ZJarXP/5w*U/oxQO*Xc0FgaXc0vqFQ*t2VtQ-&pixel_id=1000042466';</script><script>!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,document,'script','https://connect.facebook.net/en_US/fbevents.js');fbq('init', '1230549483685446');fbq('track', 'PageView');</script><noscript><img height="1" width="1"src="https://www.facebook.com/tr?id=1230549483685446&ev=PageView&noscript=1"/></noscript><!-- End Facebook Pixel Code -->

  <!-- VK Pixel code --><script type="text/javascript">(window.Image ? (new Image()) : document.createElement('img')).src = location.protocol + '//vk.com/rtrg?r=xvRaBA6Q4jBeuJ/nN/wpkHnbeUsqxU2F2QTYHa2zGnagozX8hvDCYPUroKq5D08Czhtt6x9SiBGQSD8hRp2XX3T7BjI3vW2a06U0Ox/mq6cu/TN5W*8meQNoKkCXfffiWb7MFi/ZJarXP/5w*U/oxQO*Xc0FgaXc0vqFQ*t2VtQ-&pixel_id=1000042466';</script><!-- VK Pixel code -->


  <!-- Begin Me-Talk {literal} --><script type='text/javascript'>(function(d, w, m) {window.supportAPIMethod = m;var s = d.createElement('script');s.type ='text/javascript'; s.id = 'supportScript'; s.charset = 'utf-8';s.async = true;var id = '27fbc0d3c205f0566caa280737e50292';s.src = 'https://me-talk.ru/support/support.js?h='+id;var sc = d.getElementsByTagName('script')[0];w[m] = w[m] || function() { (w[m].q = w[m].q || []).push(arguments); };if (sc) sc.parentNode.insertBefore(s, sc);else d.documentElement.firstChild.appendChild(s);})(document, window, 'MeTalk');</script><!-- {/literal} End Me-Talk -->

  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-26260977-1"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-26260977-1');
  </script>

</body>
</html>