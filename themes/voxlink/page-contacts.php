<?php

/*
Template Name: contacts
*/
get_header(); ?>

<div class="c-contacts">
        <div class="inner">
            <div class="contacts-container">
                <div class="contacts-left">
                    <h3>Контакты <span>Связаться с нами Вы можете любым удобным способом</span></h3>
                    <div class="cont-block">
                        <span class="cont-ico-tel"></span>
                        <div class="cont-descr">
                            <p class="tel">8 (495) 989-85-33 <span>звонки по Москве</span></p>
                            <p class="tel">8 (800) 333-75-33 <span>звонки по России</span></p>
                        </div>
                    </div>
                    <div class="cont-block">
                        <span class="cont-ico-loc"></span>
                        <div class="cont-descr">
                            <p>г. Москва, ул. Гостиничная,
                                дом 3, офис 314</p>
                        </div>
                    </div>
                    <div class="cont-block">
                        <span class="cont-ico-telegr"></span>
                        <p>team@voxlink.ru</p>
                    </div>
                    <div class="download-block">
                        <a href="#">
                            Скачать схему проезда
                            <span>jpg, 259 Кбайт</span>
                        </a>
                        <a href="#">
                            Скачать реквизиты
                            <span>jpg, 75 Кбайт</span>
                        </a>
                    </div>
                </div>
                <div class="contacts-right">
                    <h3>Обратная связь <span>Также Вы можете оставить заявку, чтобы с Вами связался наш специалист</span></h3>
                    <form>
                        <input type="hidden" name="action" value="submitForm" />
                        <div class="cont-form-line">
                            <span>ФИО</span>
                            <input type="text">
                        </div>
                        <div class="cont-form-line">
                            <span>Email</span>
                            <input type="text">
                        </div>
                        <div class="cont-form-line">
                            <span>Текст вашего сообщения</span>
                            <textarea></textarea>
                        </div>
                        <div class="cont-form-sub">
                            <div class="check">
                                <input type="checkbox">
                                <span>Соглашение об обработке персональных данных</span>
                            </div>
                            <input type="submit" value="Отправить">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="contacts-map">
            <iframe src="https://yandex.ua/map-widget/v1/-/CBuvzPGaCD" width="100%" height="500" frameborder="1" allowfullscreen="true"></iframe>
    </div>


 <?php get_footer(); ?>