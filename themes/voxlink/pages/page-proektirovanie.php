<?php
/*
Template Name: Проектирование и настройка сети
*/
get_header(); ?>

<!--Внедрение-->

<section class="header-geo">
    <h1 class="h1-geo">
        Проектирование <br> и настройка сети
    </h1>
    <a href="#nextBlock" rel="m_PageScroll2id" class="mouseWheel"></a>
</section>

<div class="pb2">
    <div class="inner">
        <p>
            Телефония, как и любой программно-аппаратный комплекс очень зависит от сетевой среды, в которую он помещен. В этой статье пойдет речь о тех вещах, которые необходимо знать, а по необходимости делать ради работы телефонии, как эффективного инструмента для бизнеса.
        </p>
        <p>
            <strong>На чём нужно заострить внимание:</strong>
        </p>
    </div>
</div>

<div class="vncall-block2 vncall-block2p">
    <div class="inner">
        <div class="vncall-row vncall-rowp">
            <div class="vncall-col50">
                <a href="/wp-content/themes/voxlink/minimg/proektirovanie/b3.png" class="gallery-item">
                     <img src="/wp-content/themes/voxlink/minimg/proektirovanie/b3.png" alt="">
                </a>

            </div>
            <div class="vncall-col50">
                <h3>Резервирование каналов</h3>
                <p>
                    Локальная сеть, в которой необходимо разместить телефонию, в большинстве случаев должна иметь доступ к интернету, если телефония не специализированная, только для внутренней связи по одной локации. Во всех других случаях бесперебойный доступ к интернетe гарантирует высокий стандарт связи. Поэтому распространенным решением является резервирование каналов интернета, ведь даже дорогостоящий интернет с большой пропускающей способностью может допустить сбой, который повлияет на работу телефонии, что очень критично для Call-центров.
                </p>
                <p class='strong'>
                    Настройка резервирования канала интернета происходит на сетевом оборудовании, но в некоторых случаях может произвестись силами сервера Asterisk таким образом, чтоб при сбое основного канала, телефония использовала другой канал.
                </p>
                <p>
                    Некоторые виды сетевого оборудования при верной настройке, делают все действия, связанные с переходом на резервный канал, автоматически.
                </p>
            </div>
        </div>
    </div>
</div>

<div class="vncall-grow">
    <div class="vncall-gitem">
        <div>
            <h2>
                QoS
                <span>(технология приоритезации трафика)</span>
            </h2>

            <p>
                Еще одной проблемой, связанной с интернетом можно считать его недостаточную проходимость. И с этой проблемой тоже может столкнуться владелец интернета, заявленная скорость которого покроет работу предприятия с запасом. Проблема незаметна в более количество времени и показывает себя в пиковые моменты использования интернета, а заключается она в том, что если будет занят канал иными устройствами, телефония просто не будет работать или будет работать с отвратительным качеством.
            </p>
        </div>
    </div>
    <div class="vncall-gitem">
        <a href="/wp-content/themes/voxlink/img/proektirovanie/qos.jpg" class="gallery-item">
            <img src="/wp-content/themes/voxlink/img/proektirovanie/qos.jpg" alt="">
        </a>
    </div>
</div>

<div class="vncall-grow2-cont">
    <div class="inner">
        <div class="vncall-grow2">
            <div class="vncall-gitem2">
                <img src="/wp-content/themes/voxlink/minimg/proektirovanie/b4.png" alt="">
            </div>
            <div class="vncall-gitem2">
                <div>
                    <h3>
                         Почему именно так происходит?
                    </h3>
                    <p>
                        Потому, что телефония похожа на параллельную потоковую передачу мультимедиа в две стороны без возможности буферизации и любое проседание интернета будет на ней сказываться, даже в тех случаях, когда другим устройствам это не будет заметно из-за сглаживания за счет буферизации.
                    </p>
                    <p>
                        Проблема может появляться в предприятиях, где сервер телефонии находится в общей сети с устройствами, которые могут позволить себе использовать интернет сверх меры.
                    </p>
                </div>
            </div>
            <div class="vncall-gitem2-full">
                <div>
                    Например:
                </div>
            </div>
        </div>
    </div>
</div>


<div class="picons">
    <div class="inner">
        <div class="picons-row">
            <div class="picons-item">
                <img src="/wp-content/themes/voxlink/img/proektirovanie/icon1.svg" alt="">
                <p>
                    В сети все компьютеры одновременно в начале рабочего дня производят плановое обновление программного обеспечения.
                </p>
            </div>
            <div class="picons-item">
                <img src="/wp-content/themes/voxlink/img/proektirovanie/icon2.svg" alt="">
                <p>
                    В сети есть WI-FI роутер, который может быть внезапно загружен.
                </p>
            </div>
            <div class="picons-item">
                <img src="/wp-content/themes/voxlink/img/proektirovanie/icon3.svg" alt="">
                <p>
                    Кто-то использует интернет для скачивания или раздачи большого объема информации.
                </p>
            </div>
            <div class="picons-item">
                <img src="/wp-content/themes/voxlink/img/proektirovanie/icon4.svg" alt="">
                <p>
                    Иногда появляется необходимость использовать потоковую передачу мультимедиа.
                </p>
            </div>
        </div>
    </div>
</div>

<div class="vncall-block2 vncall-block2b">
    <div class="inner">
        <div class="vncall-row vncall-rowp vncall-rowb">
            <div class="vncall-col50">
                <a href="/wp-content/themes/voxlink/minimg/proektirovanie/b5.png" class="gallery-item">
                     <img src="/wp-content/themes/voxlink/minimg/proektirovanie/b5.png" alt="">
                </a>

            </div>
            <div class="vncall-col50">
                <p>
                    Все эти проблемы могут проявляться даже не в главном здании, где всё с интернетом хорошо и есть целый человек, который это отслеживает, а в филиале или удаленном рабочем месте.
                </p>
                <p class='strong'>
                    Тогда и приходит на помощь настройка приоритезации телефонного трафика (QoS).

                </p>
                <p>
                    Настройка приводит к тому, что при распределении интернета между различными точками, первыми будут покрываться потребности телефонии, а остальные субъекты сети будут пользоваться по остаточному принципу. Маршрутизаторы могут поддерживать несколько уровней приоретизации и тогда самые нужные сегменты сети не останутся без интернета. <strong>Особенно эта технология сочетается с VLAN’ом,</strong> <span>об этом далее…</span>
                </p>
            </div>
        </div>
    </div>
</div>


<div class="vncall-grow vncall-grow-black">
    <div class="vncall-gitem">
        <div>
            <h2>
                VLAN
                <span>(Виртуальная локальная сеть для телефонии)</span>
            </h2>

            <p>
                Локальная сеть может быть как лук. Может доводить до слёз, а может быть многослойной и содержать в одной физической топологии содержать несколько виртуальных сетей. Если в вашей сети есть возможность организовать VLAN для системы телефонии, то это может стать хорошим решением, а с технологией QoS это будет отличное решение. Дело в том, что физически разбить сеть на телефонию и остальную сеть может быть физически невозможно.
            </p>
            <p>
                <strong>Напомним читателю</strong>, что подавляющее большинство IP- телефонных аппаратов имеют функцию bridge (ставятся в разрыв между рабочим персональным компьютером и локальной сетью) пропуская через себя поток данных, а это значит, что они находятся физически на одном проводе и поделить их можно только виртуально.

            </p>
        </div>
    </div>
    <div class="vncall-gitem">
        <a href="/wp-content/themes/voxlink/img/proektirovanie/b7.png" class="gallery-item">
            <img src="/wp-content/themes/voxlink/img/proektirovanie/b7.png" alt="">
        </a>
    </div>
</div>


<div class="pab">
    <div class="inner">
        <div>Зачем может понадобиться отделять телефонию от остальной сети?</div>
        <strong>Есть 3 основные причины</strong>
    </div>
</div>

<div class="bitrix24-tabs">
    <div class="inner">
            <div class="bitrix24-tabs-links">
                <a href="#tab1" class="bitrix24-tab-link quest-open-tab quest-active-a">
                    Безопасность
                </a>
                <a href="#tab2" class="bitrix24-tab-link quest-open-tab">
                    Администрирование
                </a>
                <a href="#tab3" class="bitrix24-tab-link quest-open-tab">
                    Безопасность
                </a>
            </div>
            <div class="bitrix24-tabs-content">
                <div class="bitrix24-tab quest-tab quest-active-tab" id="tab1">
                    <div class="bitrix24-tab-row">
                        <div class="bitrix24-tab-item">
                            <div class="bitrix24-tab-item-number">01/</div>
                            <h2>Безопасность</h2>
                            <p>
                                Деликатная тема. т.к. VLAN - это мера безопасности в меньшей мере от нападений извне, а в большей - внутренняя, т.к. любое предприятие следит за безопасностью сети внутри предприятия. Вряд ли остались люди, которые оставляют HotSpot в общей сети предприятия, но и более защищенные доступы в корпоративную сеть могут привести к несанкционированному использованию телефонии. Кроме настроек самой телефонии ценность для злоумышленников может представлять и файлы телефонии. Записи разговоров, контакты и личные данные клиентов могут быть хорошим стимулом для того, чтоб совершить взлом телефонии. Кроме этого, проблема безопасности может быть затронута в ситуации, когда на предприятии для удобства настроена система autoprovisioning. Телефонный аппарат, попадающий в локальную сеть получает конфигурации, в которых есть все данные, чтоб начать звонить по разрешенным направлениям и если в вашей телефонии есть возможность звонить в Тимбукту за счет организации и нет VLAN, то по закону Мёрфи кто-то позвонит.
                            </p>
                        </div>
                        <div class="bitrix24-tab-item">
                            <a href="/wp-content/themes/voxlink/img/proektirovanie/tab.png" class="gallery-item">
                                <img src="/wp-content/themes/voxlink/img/proektirovanie/tab.png" alt="">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="bitrix24-tab quest-tab" id="tab2">
                    <div class="bitrix24-tab-row">
                        <div class="bitrix24-tab-item">
                            <div class="bitrix24-tab-item-number">02/</div>
                            <h2>Администрирование</h2>
                            <p>
                                Часто ли в компании могут проводиться плановые работы по сети? У каждой компании на это свой ответ, но никто не станет отрицать, что эти работы затрагивают все устройства и лучше их проводить в нерабочее время. А как же дежурные телефонисты? У вас такие есть? Или дежурный автоответчик? Голосовая почта? Журналирование пропущенных звонков? Будьте уверены, это всё будет требовать внимания даже в нерабочее время. Если в обычные дни телефония на базе Asterisk живет по принципу «Поставил и забыл» и администрирование заключается в заведении новых сотрудников и сборе статистике, то при обновлении сети телефония тоже потребует работы. У вас 100 рабочих мест? Это не 100 устройств, а как минимум 200, т.к.  в пару к компьютеру всегда идет и телефон. А еще могут быть шлюзы иные устройства. Серверов тоже больше, минимум на 1. VLAN не панацея, но помочь в администрировании точно сможет.
                            </p>
                        </div>
                        <div class="bitrix24-tab-item">
                            <a href="/wp-content/themes/voxlink/img/proektirovanie/tab2.png" class="gallery-item">
                                <img src="/wp-content/themes/voxlink/img/proektirovanie/tab2.png" alt="">
                            </a>
                        </div>
                    </div>

                </div>
                <div class="bitrix24-tab quest-tab" id="tab3">
                    <div class="bitrix24-tab-row">
                        <div class="bitrix24-tab-item">
                            <div class="bitrix24-tab-item-number">03/</div>
                            <h2>Стабильность</h2>
                            <p>
                                Как говорилось в разделе про QoS, телефония любит бесперебойный канал связи. Лучший способ освободить канал связи- это отделить телефонию в отдельный VLAN. В Эту виртуальную сеть можно пустить другой интернет, или выделенный QoS’ом трафик. А еще телефония освободится от широковещательного трафика остальной сети, что естественно улучшит качество связи в среде с большим потоком таких данных.
                            </p>
                        </div>
                        <div class="bitrix24-tab-item">
                            <a href="/wp-content/themes/voxlink/img/proektirovanie/tab3.png" class="gallery-item">
                                <img src="/wp-content/themes/voxlink/img/proektirovanie/tab3.png" alt="">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>

<div class="vncall-grow-grey-cont">
    <div class="inner">
        <div class="vncall-grow vncall-grow-grey">
            <div class="vncall-gitem">
                <div>
                    <h2>
                        Wi-Fi
                        <span>(Хорошо, но…)</span>
                    </h2>

                    <p>
                        Для телефонии Wi-Fi представляет зло не только, когда позволяет за корпоративный счет грузить канал связи Call-центра полезной информацией и видео с котиками, но и когда на нем решают еще и сделать на нем беспроводную телефонию. Бывает так, что заходя в новое здание, где не хочется тратиться на инженерные сети  или арендуемое, где по договору аренда запрещено прокладывать кабель канал директор говорит: «А вот здесь мы поставим роутер и раздадим Wi-FI. Не будет проводов, только софтфоны на ноутбуках или моноблоках. Будет здорово…».
                    </p>
                </div>
            </div>
            <div class="vncall-gitem">
                <a href="/wp-content/themes/voxlink/img/proektirovanie/wifi.png" class="gallery-item">
                    <img src="/wp-content/themes/voxlink/img/proektirovanie/wifi.png" alt="">
                </a>
            </div>
        </div>

        <div class="ptext">
            Так вот, если ты, читатель, <strong>собираешься администрировать или пользоваться телефонией</strong>, твоя святая обязанность сказать, что это лучше не делать и вот почему :
        </div>
    </div>
</div>


<div class="bitrix24-slider">
    <div class="inner">
        <div class="bitrix24-slider-block owl-carousel">
            <div>
                <div class="vncall-grow vncall-grow-in">
                    <div class="vncall-gitem">
                        <div>
                            <h3>
                                Микроволновая печь
                            </h3>

                            <p>

                                В диапазоне чистоты 2.4 Ггц работают большое количество приборов, а если они сами не используют эту частоту, то могут в этом диапазоне  создавать помехи, которые могут создавать задержку свыше 100 ms, а как мы говорили в разделе о QoS, телефония не любит задержки. Вряд ли Вам удастся создать условия, чтоб  ни одно устройство не создавало помехи. Придется построить экран от солярных бурь.  Кстати, сотрудников с кардиостимуляторами тоже придется уволить.

                            </p>
                        </div>
                    </div>
                    <div class="vncall-gitem">
                        <a href="/wp-content/themes/voxlink/img/proektirovanie/slider.png" class="gallery-item">
                            <img src="/wp-content/themes/voxlink/img/proektirovanie/slider.png" alt="">
                        </a>
                    </div>
                </div>
            </div>
            <div>
                <div class="vncall-grow vncall-grow-in">
                    <div class="vncall-gitem">
                        <div>
                            <h3>
                                Неконтролируемое использование
                            </h3>

                            <p>

                               Мы уже говорили о том, что в среде WI-FI может быть слишком много устройств или кто-то может перетянуть на себя весь трафик. Даже в среде, где доступ ограничен несколькими компьютерами, на которых софтфоны, есть возможность, что один или все из этих компьютеров начнут что-то качать. Как это остановить? Всё закрыть, но и тут могут возникнуть сложности. И если Вы системный администратор, то вы за это будете отвечать.

                            </p>
                        </div>
                    </div>
                    <div class="vncall-gitem">
                        <a href="/wp-content/themes/voxlink/img/proektirovanie/slider2.png" class="gallery-item">
                            <img src="/wp-content/themes/voxlink/img/proektirovanie/slider2.png" alt="">
                        </a>
                    </div>
                </div>
            </div>
            <div>
                <div class="vncall-grow vncall-grow-in">
                    <div class="vncall-gitem">
                        <div>
                            <h3>
                                Оборудование
                            </h3>

                            <p>
                                Проектирование схемы расположения роутеров, репитеров, девайсов подключенных к WI-FI очень важно для построение сети. Если к этому подойти достаточно скрупулёзно, то не только о посторонних устройствах не может быть речи, но и ноутбуки придется прибить к столам, чтоб они были чётко в зоне покрытия определенного устройства Wi-FI инфраструктуры. У устройств, к стати, должна быть она точно замерена. Не подойдет устройство домашнего типа, даже если оно очень дорогое, хорошее, красивое и вон сколько антенн имеет

                            </p>
                        </div>
                    </div>
                    <div class="vncall-gitem">
                        <a href="/wp-content/themes/voxlink/img/proektirovanie/slider3.png" class="gallery-item">
                            <img src="/wp-content/themes/voxlink/img/proektirovanie/slider3.png" alt="">
                        </a>
                    </div>
                </div>
            </div>
            <div>
                <div class="vncall-grow vncall-grow-in">
                    <div class="vncall-gitem">
                        <div>
                            <h3>
                                Удаленное администрирование
                            </h3>

                            <p>
                                Ниже я расскажу про удаленных сотрудников в целом, но конкретно к данному пункту имеет отношения, складывающаяся из всех факторов влияния на сеть, построенную на Wi-Fi. Удаленное рабочее место часто состоит из того, что есть под рукой. Простенький роутер, домашний компьютер или ноутбук с софтфоном и масса злобных факторов влияния на Wi-FI. Значительная часть звонков в нашу техническую поддержку связаны со сложностью администрирования таких рабочих мест, что приводит нас к выводу, что или такое рабочее место лучше исключить, подобрав нормальное оборудование или вкладывать в обслуживание свои силы и привлекать стороннюю компанию (например нас) для помощи с ним.

                            </p>
                        </div>
                    </div>
                    <div class="vncall-gitem">
                        <a href="/wp-content/themes/voxlink/img/proektirovanie/slider4.png" class="gallery-item">
                            <img src="/wp-content/themes/voxlink/img/proektirovanie/slider4.png" alt="">
                        </a>
                    </div>
                </div>
            </div>
            <div>
                <div class="vncall-grow vncall-grow-in">
                    <div class="vncall-gitem">
                        <div>
                            <h3>
                                 Альтернатива Wi-Fi
                            </h3>

                            <p>
                                Отсутствие Wi-Fi не ставит крест на беспроводной инфраструктуре инженерных сетей. Обратите внимание на DECT технологии.  Технология DECT утверждена в 1992 году (тогда, как wi-fi разработан в 1998 году) Европейским институтом телекоммуникационных стандартов и является специализированным средством для беспроводной связи. Сейчас есть большой выбор устройств, которые могут покрыть территории предприятия, а наши инженеры могут помочь Вам подобрать необходимые устройства для этого

                            </p>
                        </div>
                    </div>
                    <div class="vncall-gitem">
                        <a href="/wp-content/themes/voxlink/img/proektirovanie/slider5.png" class="gallery-item">
                            <img src="/wp-content/themes/voxlink/img/proektirovanie/slider5.png" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="bitrix24-text">
    <div class="inner">
        <div class="bitrix24-text-row">
            <div class="bitrix24-text-item">
                <h2>
                    Удалённые рабочие места
                </h2>
            </div>
            <div class="bitrix24-text-item">
                <p>
                    Грех не пользоваться возможностью объединения нескольких локаций в одну общую систему телефонии, когда такая возможность есть. Причем тут VPN? Разве нельзя сделать телефонию, например, на ВАТС без VPN и пользоваться всеми благами IP телефонии? На деле это чуть сложнее, чем на практике. ВАТС, ну и многие другие сетевые объединения без VPN на деле пускают незащищенный трафик прямо через интернет, который вот к чему приводит:
                </p>
            </div>
        </div>
    </div>
</div>

<div class="amocrom-tabs">
    <div class="inner">
        <div class="oper-tabs">
             <div class="oper-click variac-click">
                 <a href="#vartab1" class="active">Скорость</a>
                 <a href="#vartab2">
                     Защита
                 </a>
                 <a href="#vartab3">
                     Администрирование
                 </a>
             </div>
         </div>
         <div id="vartab1" class="variac-container oper-container oper-container-fir active">
             <div class="oper-item">
                 <h5>
                     Скорость
                 </h5>
                 <p>
                     Итак. Последний раз. Что не любит телефония? Падение скорости! А без VPN соединение между сервером и конечным пользователем может быть нарушено по дороге через интернет.

                 </p>
             </div>
             <div class="oper-item">
                 <img src="/wp-content/themes/voxlink/img/proektirovanie/tab2.jpg">
             </div>
         </div>
          <div id="vartab2" class="variac-container oper-container oper-container-fir">
             <div class="oper-item">
                 <h5>
                     Защита
                 </h5>
                 <p>
                    Нет VPN-Нет защиты. Разговорный трафик беззащитно гуляет по интернету и может быть перехвачен. Без VPN любой сегмент, от маршрутизатора через провайдера и далее по всему интернету может быть отловлен, записан. Всё, что вы скажите может быть использовано против вас! Для отлова такого трафика Вас даже не нужно будет взламывать. У Вас может быть многослойный фаерволл с искусственным интеллектом, как у Красной королевы, но трафик будет просто без присмотра гулять в интернете, как девушка по ночной улице.

                 </p>
             </div>
             <div class="oper-item">
                 <img src="/wp-content/themes/voxlink/img/proektirovanie/tab22.png">
             </div>
         </div>
         <div id="vartab3" class="variac-container oper-container oper-container-fir">
             <div class="oper-item">
                 <h5>
                     Администрирование
                 </h5>
                 <p>

                    Любому человеку, понимающему в IT известно, что в VPN администрировать оборудование удобно и телефония в этом схожа иной оргтехникой. Поэтому, опустим это. Телефония на базе Asterisk может сама себя администрировать! Тот же autoprovisioning, о котором мы говорили ранее, поможет подключать телефонные аппараты в любой удаленной локации, если в этих локациях есть VPN. Кроме этого, существуют не только телефонные аппараты, что не смогут работать без VPN, но и те, которые своими силами будут поднимать между собой и сервером VPN! Бы в нашей компании кейс, в котором у компании был список удаленных работников, не имеющих квалификации в IT технологиях и не умеющих настраивать VPN на домашних роутерах. Мало того, роутеры некоторых просто не были для этого приспособлены. Разговоры этих сотрудников имели консультационный характер юридического плана, а значит должны были быть защищенными. Наша компания подобрала телефонный аппарат, который после преднастройки отправлялся на такое удаленное место и поднимал VPN, независимо от сетевого устройства.

                 </p>
             </div>
             <div class="oper-item">
                 <img src="/wp-content/themes/voxlink/img/proektirovanie/tab23.png">
             </div>
         </div>
    </div>
</div>

<div class="pbot">
    <div class="inner">
        <div class="pbot-row">
            <div class="pbot-item">
                <img src="/wp-content/themes/voxlink/minimg/proektirovanie/pbot.png" alt="">
            </div>
            <div class="pbot-item">
                <h2>
                    Вышеперечисленное и проекты по телефонии
                </h2>
                <p>
                    Всё вышеперечисленное, в силу влияния на телефонию достойно особого внимания при подготовки и реализации проектов по телефонии. Наша компания для выяснения сетевых параметров проводит опрос компетентных сотрудников в отношении сети. В рамках проекта вместе с сотрудниками клиента настраиваем сетевое оборудование для работы телефонии, ведь всем понятно, что системный администратор может не быть специалистом по телефонии.
                </p>
                <strong>
                    Мы можем не только настроить имеющуюся сеть, но и построить сеть в
                </strong>
                <strong>
                    здании, которое находится на любой стадии ремонта с нуля ВОЛС и СКС.
                </strong>
            </div>
        </div>
    </div>
</div>

<div class="pcalc">
    <h2>Калькулятор расчета стоимости СКС</h2>
    <div class="pcalc-row">
        <div class="pcalc-item">
            ПЛОЩАДЬ ПОМЕЩЕНИЙ:
        </div>
        <div class="pcalc-item">
            <input type="text">
            <span>м2</span>
        </div>
    </div>
    <div class="pcalc-row">
        <div class="pcalc-item">
            КОЛИЧЕСТВО РАБОЧИХ МЕСТ:
        </div>
        <div class="pcalc-item">
            <input type="text">
            <span>шт.</span>
        </div>
    </div>
    <div class="pcalc-row">
        <div class="pcalc-item">
            КОЛИЧЕСТВО ПОРТОВ RJ-45 <br>
            НА 1 РАБОЧЕЕ МЕСТО:
        </div>
        <div class="pcalc-item">
            <input type="text">
            <span>шт.</span>
        </div>
    </div>
    <div class="pcalc-row">
        <div class="pcalc-item">
            НЕОБХОДИМОСТЬ УСТАНОВКИ ЭЛЕКТРИЧЕСКИХ <br>
            РОЗЕТОК НА РАБОЧЕЕ МЕСТО:
        </div>
        <div class="pcalc-item pcalc-item-radio">
            <label>
                <input type="radio" name="name1" checked>
                <span class="pcalc-radio"></span>
                <span>Да</span>
            </label>
            <label>
                <input type="radio" name="name1">
                <span class="pcalc-radio"></span>
                <span>Нет</span>
            </label>
        </div>
    </div>
    <div class="pcalc-row">
        <div class="pcalc-item">
            ИСПОЛЬЗОВАНИЕ КАБЕЛЬ КАНАЛА:
        </div>
        <div class="pcalc-item pcalc-item-radio">
            <label>
                <input type="radio" name="name2">
                <span class="pcalc-radio"></span>
                <span>Да</span>
            </label>
            <label>
                <input type="radio" name="name2">
                <span class="pcalc-radio"></span>
                <span>Нет</span>
            </label>
        </div>
    </div>
    <button class="btn-orange2">РАССЧИТАТЬ</button>
    <p>
        Данный расчет является предварительным. Точный расчет мы предоставим по результатам бесплатного выезда на Ваш объект. Наш специалист внимательно изучит оптимальные варианты монтажа кабельных коммуникаций и согласует их с Вами на месте.
    </p>
    <div class="pcalc-row">
        <div class="pcalc-item">
            <strong>Стоимость оборудования и материалов:</strong>
        </div>
        <div class="pcalc-item">
            <strong>75 419 р.</strong>
        </div>
    </div>
    <div class="pcalc-row">
        <div class="pcalc-item">
            <strong>Стоимость монтажных работ:</strong>
        </div>
        <div class="pcalc-item">
            <strong>0 р.</strong>
        </div>
    </div>
</div>

<?php get_template_part("inc/q2"); ?>
<?php get_footer(); ?>