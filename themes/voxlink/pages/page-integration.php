<?php
/*
Template Name: Интеграция сетей
*/
get_header(); ?>

<section class="header-obed">
    <h1 class="h1-tarmain">
        GSM и Asterisk:<br>
        интеграция сетей
    </h1>
    <a href="#nextBlock" rel="m_PageScroll2id" class="mouseWheel"></a>
</section>

<section class="stik-set" id="nextBlock">
    <div class="inner">
        <h2 class="h2-stik">
            СТЫК С GSM<br>
            СЕТЯМИ
        </h2>
        <div class="stik-container">
            <div class="stik-item">
                <p class="p-stik">
                    Не секрет, что к IP-АТС Asterisk могут быть подключены любые<br>
                    типы телефонных линий. Это может быть SIP номер, цифровой<br>
                    поток Е1 или же обычная аналоговая «лапша». Но часто<br>
                    пользователи упускают из виду возможность подключения IP-АТС<br>
                    на базе Asterisk к GSM сетям.
                </p>
                <img src="/wp-content/themes/voxlink/minimg/stik-gsm.png">
            </div>
            <img class="img-stik" src="/wp-content/themes/voxlink/minimg/yearstar-stik.png">
        </div>
    </div>
</section>

<section class="rout-set">
    <div class="inner">
        <div class="rout-set-container">
            <div class="rout-set-item">
                <p>
                    Использование сотовых операторов возможно за счет<br>
                    подключения SIP-GSM шлюза и его настройки. На рынке<br>
                    существует большой выбор подобных устройств. Самый<br>
                    простой шлюз имеет слот на подключение одной сим-карты,<br>
                    а вообще есть устройства на 4, 8, 16, 24 и более сим-карт.<br>
                    Некоторые шлюзы имеют на борту установленный Asterisk,<br>
                    что делает их более гибкими в настройке.
                </p>
            </div>
            <div class="rout-set-item">
                <img src="/wp-content/themes/voxlink/minimg/rout-set.png">
            </div>
        </div>
    </div>
</section>

<section class="pig-set">
    <div class="inner">
        <div class="pig-set-container">
            <div class="pig-set-item">
                <div class="pig-set-in">
                    <img src="/wp-content/themes/voxlink/minimg/pig-set.png">
                </div>
            </div>
            <div class="pig-set-item">
                <div class="pig-set-in">
                    <p>
                        Таким образом пользователь получает широкий выбор<br>
                        тарифов на исходящую связь, ведь например в В2С большой<br>
                        поток вызовов идет именно на сотовые телефоны клиентов, а<br>
                        значит <span>сим-карта с безлимитным или очень<br>
                        выгодным тарифом экономит бюджет компании.</span>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="primer-set">
    <div class="inner">
        <div class="primer-set-container">
            <div class="primer-set-item">
                <div class="primer-in">
                    <h4>ПРИМЕР ИСПОЛЬЗОВАНИЯ:</h4>
                    <p>
                        Компания «Альфа» работает с мелкими индивидуальными
                        предпринимателями и менеджеры компании в 95% случаев звонят на
                        сотовые телефоны клиентов. До подключения к Asterisk GSM шлюза
                        стоимость исходящей минуты составляла 60 копеек.
                    </p>
                    <h5>
                        Теперь, с подключенным GSM шлюзом, сотрудники «Альфы»
                        имеют возможность звонить по 20 копеек, приобретая
                        подходящие пакетные тарифы
                    </h5>
                </div>
            </div>
            <div class="primer-set-item">
                <div class="primer-in">
                    <img src="/wp-content/themes/voxlink/minimg/primer-set.png">
                </div>
            </div>
        </div>
    </div>
</section>



<?php get_template_part("inc/q2"); ?>
<?php get_footer(); ?>