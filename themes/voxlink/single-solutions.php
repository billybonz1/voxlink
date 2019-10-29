<?php 


get_header(); ?>
    
    <div class="main-content">
      <div class="inner">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-9 col-md-8 col-xs-12">

                      
  		                    <?php while ( have_posts() ) : the_post()  ?>
        		                    <div class="main-content-left kb-content solutions-content">
        		                     
                                    <div class="single-solutions-img" style="background-image: url(<?php the_field("bigimg");?>)">
                                        <div class="single-solutions-icon">
                                          <img src="<?php the_field("icon2");?>">
                                        </div>  
                                        <h1>
                                          Для кого предназначено решение <span>«<?php the_title(); ?>»</span>
                                        </h1>
                                        <p>
                                          Для крупных компаний, холдингов, банков с численностью сотрудников от 70-ти до 300-х.
                                          Решение подходит для компаний, у которых существует большое число офисов (независимо
                                          от географического расположения) и/или работает большое число сотрудников. Офис компании должен быть подключен к Интернету. В компании уже может быть оператор телефонии, которого можно сохранить, но можно подключить и нового.
                                        </p>
                                    </div> 
                                    <div class="resh-item">
                                      <?php the_content(); ?>
                                    </div>  

                                    <h2>Варианты исполнения (расчет на 100 сотрудников)</h2>


                                    <div class="tabs">
                                      <a class="tab-link active" href="#tab1">Вариант 1</a>
                                      <a class="tab-link" href="#tab2">Вариант 2</a>
                                      <a class="tab-link" href="#tab3">Вариант 3</a>
                                    </div>

                                    <div class="tab active" id="tab1">
                                      <div class="solutions-tab">
                                        <h3>Состав решения</h3>
                                        <div class="solutions-tab-table">
                                          <div class="row">
                                            <div class="col-xs-8">
                                              Сервер HP ProLiant DL320Gen8
                                            </div>
                                            <div class="col-xs-4">45 000 руб.</div>
                                          </div>
                                          <div class="row">
                                            <div class="col-xs-8">х100 IP-телефонов GrandStream GXP1160</div>
                                            <div class="col-xs-4">180 000 руб.</div>
                                          </div>
                                          <div class="row">
                                            <div class="col-xs-8">IP-телефон секретаря (руководителя) GrandStream GXP2124</div>
                                            <div class="col-xs-4">6 500 руб.</div>
                                          </div>
                                          <div class="row">
                                            <div class="col-xs-8">Полный комплекс работ</div>
                                            <div class="col-xs-4">129 000 руб.</div>
                                          </div>
                                          <div class="row">
                                            <div class="col-xs-8">Лицензия на панель оператора FOP2</div>
                                            <div class="col-xs-4">2 000 руб.</div>
                                          </div>
                                          <div class="row">
                                            <div class="col-xs-8">Модуль статистики Asternic Call Stats PRO2</div>
                                            <div class="col-xs-4">25 200 руб.</div>
                                          </div>
                                          <div class="row">
                                            <div class="col-xs-8">Номер в коде 495/499</div>
                                            <div class="col-xs-4">—</div>
                                          </div>
                                          
                                        </div>
                                        <div class="row">
                                          <a href="#" class="solutions-tab-btn">
                                            <i class="icon icon-view2"></i>
                                            Как это выглядит
                                          </a>
                                          <div class="solutions-tab-total">
                                            Итого: <strong>387 700 руб.</strong>
                                          </div>
                                        </div>
                                        
                                      </div>  
                                    </div>



                                    <div class="solutions-ind">
                                      <div class="row">
                                        <div class="col-md-12" style="max-width: 478px;">
                                          <h2>Подбор индивидуального решения</h2>
                                          <p>В случае, если ни один представленный выше вариант не походит для Вашего бизнеса, связывайтесь с нашими специалистами для подбора индивидуальной конфигурации.</p>
                                          <a href="#" class="btn btn-orange">Подобрать решение</a>
                                        </div>
                                      </div>
                                      
                                    </div>


                                    <h2>
                                      Что мы делаем?
                                    </h2>

                                    <div class="solutions-slider">
                                      <div class="solutions-slide">
                                        <img src="/wp-content/themes/voxlink/img/sol1.svg" alt="">
                                        <div>
                                          <h4>01/</h4> 
                                          <p>
                                            Изучаем потребности
                                            Заказчика 
                                          </p>
                                        </div>
                                      </div>
                                      <div class="solutions-slide">
                                        <img src="/wp-content/themes/voxlink/img/sol2.svg" alt="">
                                        <div>
                                          <h4>02/</h4> 
                                          <p>
                                            Подбираем компоненты системы, высылаем коммерческое предложение 
                                          </p>
                                        </div>
                                      </div>
                                      <div class="solutions-slide">
                                        <img src="/wp-content/themes/voxlink/img/sol3.svg" alt="">
                                        <div>
                                          <h4>03/</h4> 
                                          <p>
                                            Согласуем с клиентом Техническое задание, утверждаем его
                                          </p>
                                        </div>
                                      </div>
                                       <div class="solutions-slide">
                                        <img src="/wp-content/themes/voxlink/img/sol1.svg" alt="">
                                        <div>
                                          <h4>01/</h4> 
                                          <p>
                                            Изучаем потребности
                                            Заказчика 
                                          </p>
                                        </div>
                                      </div>
                                      <div class="solutions-slide">
                                        <img src="/wp-content/themes/voxlink/img/sol2.svg" alt="">
                                        <div>
                                          <h4>02/</h4> 
                                          <p>
                                            Подбираем компоненты системы, высылаем коммерческое предложение 
                                          </p>
                                        </div>
                                      </div>
                                      <div class="solutions-slide">
                                        <img src="/wp-content/themes/voxlink/img/sol2.svg" alt="">
                                        <div>
                                          <h4>03/</h4> 
                                          <p>
                                            Согласуем с клиентом Техническое задание, утверждаем его
                                          </p>
                                        </div>
                                      </div>
                                    </div>  


                                    <div class="row solutions-steps">
                                      <div class="col-md-6">
                                        <div class="solutions-step">
                                          <div class="solutions-step-number">01</div>
                                          <h4>Что потребуется оплачивать клиенту на начальном этапе</h4>
                                          <p>
                                            Оплачивается стоимость оборудования
                                            и производимых работ. При чем, оплата
                                            работ может оплачиваться полностью либо авансовым методом (50% до начала работ
                                            и 50% — после подписания акта сдачи- приемки работ), а оплата оборудования оплачивается полностью.
                                            <strong>Форма оплаты — безналичный расчет.</strong>
                                          </p>
                                        </div>
                                      </div>
                                      <div class="col-md-6">
                                        <div class="solutions-step">
                                          <div class="solutions-step-number">02</div>
                                          <h4>Что потребуется оплачивать после окончания работ</h4>
                                          <p>
                                            Оператору телефонии потребуется оплачивать абонентскую плату за выделение телефонного номера и телефонных линий,
                                            а также – по факту совершенных телефонных звонков.
                                            Нашей компании – ничего, кроме случаев, если Клиент планирует заключить Договор
                                            на техническую поддержку.
                                          </p>
                                        </div>
                                      </div>
                                    </div>

                                    
        		                    </div>
        		                    
        		                 
        		                    <div class="faq">
                                  
                                          <div class="row">
                                            <div class="col-md-12">
                                              <h2>Часто задаваемые вопросы</h2>
                                            </div>
                                            <div class="col-md-12">
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
        		                    
        		                    
        		                    
        		                    <?php get_template_part("inc/questions"); ?>
        		                    
        		                
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