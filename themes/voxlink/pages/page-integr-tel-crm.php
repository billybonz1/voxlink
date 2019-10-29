<?php
/*
Template Name: Интеграция телефонии и CRM
*/
get_header(); ?>

<!--ИНТЕГРАЦИЯ ТЕЛЕФОНИИ И CRM-->

<section class="header-inter-tel">
    <h1 class="h1-inter-tel">
        Интеграция телефонии<br>
        и CRM
    </h1>
    <a href="#nextBlock" rel="m_PageScroll2id" class="mouseWheel"></a>
</section>

<section id="nextBlock" class="inter-struk">
    <div class="inner">
        <div class="inter-struk-container">
            <div class="inter-struk-item">
                <div class="inter-struk-in">
                    <h3>
                        Структура каждой компании уникальна и порой<br>
                        бывает так, что готовых решений у<br>
                        разработчиков CRM Системы нет.
                    </h3>
                    <p>
                        Случается так, что рассмотрев все решения на рынке, Ваша компания<br>
                        может принять решение разработать собственную CRM систему под свои<br>
                        нужды. <span>Но функционал CRM системы не может быть полон, если он<br>
                        не интегрирован с телефонией компании.</span> Тогда как раз и может<br>
                        потребоваться.
                    </p>
                </div>
            </div>
            <div class="inter-struk-item">
                <div class="inter-struk-in">
                    <img src="/wp-content/themes/voxlink/minimg/inter-struk-img.png">
                </div>
            </div>
        </div>
    </div>
</section>

<section class="tel-crm">
    <div class="inner">
        <h2>
            Интеграция телефонии Asterisk и самописной<br>
            CRM системы
        </h2>
        <p>
            Какая бы уникальная CRM система не была, все CRM системы можно объединить по  генерализирующему признаку- эти системы управления<br>
            взаимоотношениями с клиентами, а это значит что основные функции интеграции с телефонией должны присутствовать и в ней, дополняя уникальные<br>
            аспекты.
        </p>
        <div class="tel-crm-container">
            <a class="gallery-item" href="/wp-content/themes/voxlink/minimg/tel-crm-shem.png">
                <img src="/wp-content/themes/voxlink/minimg/tel-crm-shem.png">
            </a>
        </div>
    </div>
</section>

<section class="inter-vzaim">
    <div class="inner">
        <div class="inter-vzaim-container">
            <div class="inter-vzaim-item">
                <img src="/wp-content/themes/voxlink/minimg/inter-vzaim.png">
            </div>
            <div class="inter-vzaim-item">
                <div class="inter-vzaim-in">
                    <h2>
                        Интерфейсы<br>
                        взаимодействия
                    </h2>
                    <p>
                        Через различные интерфейсы взаимодействия (API, AMI, AJAM, AGI, ARI)<br>
                        Asterisk может отдавать уведомления о событиях телефонии в CRM<br>
                        систему и обратно. Это <span>позволит CRM системе реагировать на события<br>
                        телефонии в реальном или приближенном к реальному времени.</span>
                    </p>
                    <div class="inter-vzaim-line">
                        <img src="/wp-content/themes/voxlink/minimg/inter-vzaim-icon-1.png">
                        <p>
                            <span>Поступил звонок</span>-> всплыла карточка клиента.
                        </p>
                    </div>
                    <div class="inter-vzaim-line">
                        <img src="/wp-content/themes/voxlink/minimg/inter-vzaim-icon-2.png">
                        <p>
                            <span>Звонок завершился</span>-> произошла запись в историю.
                        </p>
                    </div>
                    <div class="inter-vzaim-line">
                        <img src="/wp-content/themes/voxlink/minimg/inter-vzaim-icon-3.png">
                        <p>
                            <span>Звонок пропущен</span>-> создается напоминание перезвонить.
                        </p>
                    </div>
                    <p>
                        Это позволит Asterisk’у реагировать на события в CRM системе, например
                        реализовывать функцию click2call или реализовать функцию умной
                        маршрутизации при указании в CRM ответственного менеджера над<br>
                        клиентом.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="inter-tabs">
    <div class="inner">
        <div class="inter-tabs-block">
            <a href="#inter-tab1" class="inter-tabs-a active">
                Обращение к CDR
            </a>
            <a href="#inter-tab2" class="inter-tabs-a">
                Обращение к файловой системе
            </a>
        </div>
        <div id="inter-tab1" class="inter-content-container active">
            <div class="inter-content-item">
                <div class="inter-content-in">
                    <h4>
                        Обращение к CDR
                    </h4>
                    <p>
                        Иной стороной интеграции является обращение к CDR (подробной записи<br>
                        о вызове). Данная часть интеграции  затрагивает систему сбора<br>
                        статистики, встроенную в CRM систему. По результатам обработки таких<br>
                        запросов CRM система сможет ответить на вопросы «Кто больше всех<br>
                        ответил на звонок?», «Какое среднее время разговора?», «Кто самая<br>
                        быстрая рука на диком западе?»  и т.д.
                    </p>
                </div>
            </div>
            <div class="inter-content-item">
                <div class="inter-content-in">
                    <img src="/wp-content/themes/voxlink/minimg/inter-tab-1.png">
                </div>
            </div>
        </div>
        <div id="inter-tab2" class="inter-content-container">
            <div class="inter-content-item">
                <div class="inter-content-in">
                    <h4>
                        Обращение к файловой системе
                    </h4>
                    <p>
                        Прежде всего в этом разделе хотелось бы отметить, что записи<br>
                        разговоров не появятся в CRM системе, если они не пишутся на сервере<br>
                        телефонии или не направляются в отдельное файлохранилище.<br>
                        Дистрибутив VoxDistro пишет аудиозаписи в формате WAV, но может<br>
                        конвертировать в формат MP3 и отсылать на любое файлохранилище<br>
                        при завершении вызова или раз в какое-то время.  Существуют CRM<br>
                        системы, которые просто формируют ссылки на аудиозаписи, хранящиеся<br>
                        на сервере, а есть и те, которые в себе реализуют и функции<br>
                        файлохранилища. В любом случае разработчик CRM системы должен<br>
                        указать, где он хочет хранить аудиозаписи и в каком формате, чтоб CRM<br>
                        система не утеряла функцию «Воспроизведение записи разговора»
                    </p>
                </div>
            </div>
            <div class="inter-content-item">
                <div class="inter-content-in">
                    <img src="/wp-content/themes/voxlink/minimg/inter-tab-2.png">
                </div>
            </div>
        </div>
    </div>
</section>

<section class="inter-zalog">
    <div class="inner">
        <div class="inter-zalog-container">
            <div class="inter-zalog-item">
                <img src="/wp-content/themes/voxlink/minimg/inter-zalog-img.png">
            </div>
            <div class="inter-zalog-item">
                <div class="inter-zalog-in">
                    <h2>
                        Залог успеха
                    </h2>
                    <p>
                        Важным условием успеха такого проекта является наличие у Заказчика<br>
                        разработчиков, которые могут дорабатывать его CRM. Поскольку<br>
                        потребуется именно доработка самой CRM и реализация там тех функций,<br>
                        которые при поступлении данных от Asterisk смогут выполнять в CRM<br>
                        определенные действия.
                    </p>
                    <p>
                        В таких проектах клиент платит нам за консалтинг и экспертизу. В тандеме<br>
                        с разработчиками Заказчика, мы помогаем реализовать интеграцию,<br>
                        консультируя разработчиков по методам Asterisk и по тем способам, как<br>
                        эффективнее и быстрее реализовать полностью техническое задание.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="kod-kanal">
    <div class="inner">
        <div class="kod-kanal-container">
            <div class="kod-kanal-item">
                <div class="kod-kanal-in">
                    <h2>
                        Возможно ли<br>
                        интегрировать без<br>
                        одного из этих<br>
                        пунктов?
                    </h2>
                    <p>
                        Да, возможно, но тогда функционал будет не полным. Если<br>
                        это не проблема для Вас, то реализуемо.
                    </p>
                </div>
            </div>
            <div class="kod-kanal-item">
                <div class="kod-kanal-in">
                    <img src="/wp-content/themes/voxlink/minimg/inter-kanal-img.png">
                </div>
            </div>
        </div>
    </div>
</section>

<section class="slowanoth">
    <div class="inner">
        <div class="slowanoth-container">
            <div class="slowanoth-item">
                <div class="slowanoth-item-in">
                    <div class="slowanoth-left">
                        <h3>
                            Можно ли<br>
                            интегрировать с<br>
                            Asterisk не одну<br>
                            самописную CRM<br>
                            систему?
                        </h3>
                    </div>
                    <div class="slowanoth-right">
                        <img src="/wp-content/themes/voxlink/minimg/slow-icon-1.png">
                    </div>
                </div>
                <p>
                    Да, это возможно. Часто бывает так, что для разных отделов может<br>
                    подойти функционал разных систем. Тогда и приходится<br>
                    производить больше одной интеграции. <span>Стоит отметить, что<br>
                    обмен событиями будет производиться параллельно.</span>
                </p>
            </div>
            <div class="slowanoth-item">
                <div class="slowanoth-item-in">
                    <div class="slowanoth-left">
                        <h3>
                            Что дешевле<br>
                            интегрировать<br>
                            самописную или<br>
                            популярную CRM<br>
                            систему?
                        </h3>
                    </div>
                    <div class="slowanoth-right">
                        <img src="/wp-content/themes/voxlink/minimg/slow-icon-2.png">
                    </div>
                </div>
                <p>
                    Стоит упомянуть, что сейчас разработка CRM системы изначально не<br>
                    дешевое удовольствие. Иметь собственную оригинальную CRM систему<br>
                    означает содержать группу разработчиков, производящих обновление и<br>
                    поддержку системы. Вместе с этим нестандартность решения интеграции<br>
                    может заставить разработать ее с нуля.
                </p>
            </div>
        </div>
    </div>
</section>

<section class="snig-inter">
    <div class="inner">
        <div class="snig-inter-container">
            <div class="snig-inter-item">
                <img src="/wp-content/themes/voxlink/minimg/snig-zakaz-img.png">
            </div>
            <div class="snig-inter-item">
                <div class="snig-inter-in">
                    <h2>
                        Заказывая перевод своего<br>
                        предприятия или компании на<br>
                        IP-телефонию <span>на базе Asterisk в<br>
                        компании Voxlink</span>, вы получаете<br>
                        современную функциональную<br>
                        качественную связь со всем миром<br>
                        по разумной цене.
                    </h2>
                    <p>
                        Дистрибутив компании позволяет устанавливать системы с<br>
                        практически любым функционалом. <span>На сегодняшний день наши<br>
                        специалисты установили их уже более 800.</span>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>


<?php get_template_part("inc/q2"); ?>
<?php get_footer(); ?>

