<?php
/* Template name: reshenie */
get_header(); ?>

    <?php ?>

    <div class="reshenie-content" style="padding-bottom: 0;">
      <div class="inner">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <h2>Все готовые решения</h2>
              <div class="bis-line clearfix"><a href="https://voxlink.ru/solutions/small-business/" class="bis-item"><i class="icon icon-resh1"></i><span>Малый бизнес</span></a><a href="https://voxlink.ru/solutions/medium-business/" class="bis-item"><i class="icon icon-resh2"></i><span>Средний бизнес</span></a><a href="https://voxlink.ru/solutions/big-business/" class="bis-item"><i class="icon icon-resh3"></i><span>Крупный бизнес</span></a><a href="https://voxlink.ru/solutions/komponenty-reshenij/" class="bis-item"><i class="icon icon-resh4"></i><span>Компоненты решений</span></a><a href="https://voxlink.ru/solutions/tehnicheskaja-podderzhka/" class="bis-item"><i class="icon icon-resh5"></i><span>Техническая поддержка</span></a><a href="https://voxlink.ru/projects/milestones/" class="bis-item"><i class="icon icon-resh4"></i><span>Этапы работ</span></a></div>
              <div class="resh-slider">
                <ul id="ip">


                  <?php while ( have_posts() ) : the_post(); ?>
                    <?php $hidemain = get_field("hidemain", get_the_ID());?>

                    <?php
                      if($hidemain != 1){
                        get_template_part("loop/solution");
                      }
                    ?>

                  <?php endwhile; ?>


                </ul>
                <a href="#" class="ip-prev"></a>
                <a href="#" class="ip-next"></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="main-content-left kb-content reshenie-content" style="padding-top: 0;margin-bottom: 0; border-bottom: 0">
      <div class="inner">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="vc_message_box vc_message_box-standard vc_message_box-rounded vc_color-alert-warning">
              	<div class="vc_message_box-icon">
              	  <i class="fa fa-info-circle"></i>
              	</div>
              	<p>Сохраняем все номера и линии</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="happy-clients">
      <div class="inner">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <h2>Счастливые клиенты</h2>
              <p>Вот несколько отзывов от наших клиентов</p>
            </div>
            <div class="col-md-4">
              <div class="hc__item">
                <img src="/wp-content/themes/voxlink/img/cc1.png" alt="">
                <p>
                  Опыт, накопленный за 10 лет работы на Российском медицинском рынке, компания «Формед» доказывает свои компетентность и профессионализм путем успешной эффективной работы.
                </p>
                <div class="hc__name">
                  <strong>Иван Иванов</strong> - Компания «Формед»
                </div>
              </div>
            </div>

            <div class="col-md-4">
              <div class="hc__item">
                <img src="/wp-content/themes/voxlink/img/cc2.png" alt="">
                <p>
                  Сеть магазинов "Магнолия" сегодня - это 200 удобных магазинов с продуктами на каждый день, мясными полуфабрикатами собственного производства и необходимым набором хозяйственных товаров.
                </p>
                <div class="hc__name">
                  <strong>Наталия Петровна</strong> - Сеть магазинов "Магнолия"
                </div>
              </div>
            </div>

            <div class="col-md-4">

              <div class="hc__item">
                <img src="/wp-content/themes/voxlink/img/cc3.png" alt="">
                <p>
                  Компанией накоплен практический опыт работы в нелегких условиях бурлящей экономической системы России. В соответствии с изменением конъюнктуры рынка и потребностями клиентов компания постоянно проводит работу по усовершенствованию ассортиментного ряда.
                </p>
                <div class="hc__name">
                  <strong>Иван Иванов</strong> - Компания "ГРАТ-ВЕСТ"
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>



   <!-- <div class="faq">
      <div class="inner">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-4">
              <h2>Часто задаваемые вопросы</h2>
            </div>
            <div class="col-md-8">
              <div class="faq__item">
                <div class="faq__q">Что нужно иметь с собой для посещения?</div>
                <div class="faq__a">
                  По большому счету - ничего. Однако, на второй день мы устраиваем практический мастер-класс по настройке Mikrotik для Asterisk, где каждый участник будет выполнять настройку своего маршрутизатора. Если вы хотите присутствовать на этом мастер-классе, то необходимо иметь с собой ноутбук, ethernet-порт и патч-корд (и, желательно, Mikrotik HAP Lite). Ноутбук должен держать заряд аккумулятора не менее 3-х часов.
                </div>
              </div>
              <div class="faq__item">
                <div class="faq__q">Некоторые интересные мне доклады будут идти в обоих залах. Как быть?</div>
                <div class="faq__a">
                  По большому счету - ничего. Однако, на второй день мы устраиваем практический мастер-класс по настройке Mikrotik для Asterisk, где каждый участник будет выполнять настройку своего маршрутизатора. Если вы хотите присутствовать на этом мастер-классе, то необходимо иметь с собой ноутбук, ethernet-порт и патч-корд (и, желательно, Mikrotik HAP Lite). Ноутбук должен держать заряд аккумулятора не менее 3-х часов.
                </div>
              </div>
              <div class="faq__item">
                <div class="faq__q">Будут ли доступны видео-записи с конференции?</div>
                <div class="faq__a">
                  По большому счету - ничего. Однако, на второй день мы устраиваем практический мастер-класс по настройке Mikrotik для Asterisk, где каждый участник будет выполнять настройку своего маршрутизатора. Если вы хотите присутствовать на этом мастер-классе, то необходимо иметь с собой ноутбук, ethernet-порт и патч-корд (и, желательно, Mikrotik HAP Lite). Ноутбук должен держать заряд аккумулятора не менее 3-х часов.
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>-->
</br>
    <?php get_template_part("inc/questions"); ?>

    <?php ?>

<?php get_footer(); ?>