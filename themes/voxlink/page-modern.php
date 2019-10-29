<?php
/*
Template Name: Модернизация существующей АТС
*/
get_header(); ?>

<!--Внедрение-->

<section class="header-geo">
    <h1 class="h1-geo">
        Модернизация <br> существующей АТС
    </h1>
    <a href="#nextBlock" rel="m_PageScroll2id" class="mouseWheel"></a>
</section>

<div class="b2">
    <div class="inner">
        <div class="b2-row">
            <div class="b2-item">
                <p>
                    Почти в каждой компании наступает момент, когда существующая цифровая (или аналоговая) АТС становится узким местом в бизнес-коммуникациях компании, и тогда руководство и IT-отдел начинают задумываться о её полной замене или модернизации.
                </p>
                <p>
                    <strong>
                        Чаще всего модернизация производится одним из трех способов:
                    </strong>
                </p>
                <ul>
                    <li>
                        <p>
                            Интеграция Asterisk и существующей АТС.
                        </p>

                    </li>
                    <li>
                        <p>
                            Замена существующей АТС на аналоговые шлюзы. Сохранение телефонной проводки и аппаратов.
                        </p>

                    </li>
                    <li>
                        <p>
                            Замена существующей АТС на IP-АТС Asterisk и IP-телефоны.
                        </p>

                    </li>
                </ul>
            </div>
            <div class="b2-item">
                <img src="/wp-content/themes/voxlink/minimg/modern/b2.jpg" alt="">
            </div>
        </div>
    </div>
</div>


<div class="b3">
    <div class="inner">
        <h2>Наиболее популярными являются следующие симптомы:</h2>
        <div class="b3-row">
            <div class="b3-item">
                <ul>
                    <li>Закончились свободные порты. Новых сотрудников подключать некуда.</li>
                    <li>Требуется запись разговоров. АТС не умеет записывать разговоры.</li>
                    <li>Необходимы функции колл-центра для отдела продаж и маркетинга. В текущей АТС нет таких возможностей.</li>
                    <li>Требуется аналитика по звонкам для управленческого учета.</li>
                    <li>Функции ограничены. Нет возможности подключить VoIP-операторов связи, Skype, звонок с сайта.</li>
                </ul>
            </div>
            <div class="b3-item">
                <ul>
                    <li>Количество внешних линий не позволяет принимать все звонки клиентов, кто-то не может из-за этого дозвониться в компанию.</li>
                    <li>Есть необходимость подключить телефонию к серверу 1C, но АТС на это не рассчитана.</li>
                    <li>У компании появляются региональные подразделения, но их невозможно подключить к центральной АТС.</li>
                    <li>АТС морально устарела, под неё не выпускают плат или запасных частей. Отказ любого из узлов приведет к остановке работы всей компании.</li>
                </ul>
            </div>
        </div>
        <strong>
            На самом деле, перечень можно перечислять достаточно долго.
        </strong>
    </div>
</div>


<div class="b4">
    <div class="inner">
        <h2>
            И тут возникает вопрос: какие есть способы получить желаемое, при этом сохраняя то что устраивает.
            <strong>
                Есть три варианта модернизации старой АТС:
            </strong>
        </h2>
        <div class="b4-row">
            <div class="b4-item">
                <span>0</span>
                <p>
                    <strong>1</strong>
                    Установка сервера Asterisk и интеграция его с АТС. Старая АТС сохраняется вместе с парком телефонов.
                </p>
            </div>
            <div class="b4-item">
                <span>0</span>
                <p>
                    <strong>2</strong>
                    Установка сервера Asterisk и замена АТС на аналоговые шлюзы. Аналоговая проводка и телефоны сохраняются.
                </p>
            </div>
            <div class="b4-item">
                <span>0</span>
                <p>
                    <strong>3</strong>
                    Установка сервера Asterisk и полная замена парка телефонов. Используется существующая ЛВС, аналоговые телефоны заменяются на IP-телефоны.
                </p>
            </div>
        </div>
        <div class="b4-text">
            Рассмотрим все эти варианты.
        </div>
    </div>
</div>


<div class="b5">
    <div class="inner">
        <div class="b5-row">
            <div class="b5-item">
                <div class="b5-num">
                    01
                </div>
                <h2>
                    Интеграция Asterisk и существующей АТС
                </h2>
            </div>
            <div class="b5-item">
                <p>
                    Данный вариант предполагает классическую схему модернизации, при которой Asterisk ставится «в разрыв» между оператором телефонии и существующей АТС. Все функции по обработке звонков переносятся в Asterisk. Существующая АТС становится «хабом», к которому подключены телефоны, не выполняя при этом никаких действий по интеллектуальной обработке звонка.
                </p>
            </div>
        </div>
    </div>
</div>


<div class="amocrom-tabs">
    <div class="inner">
        <div class="oper-tabs">
             <div class="oper-click variac-click">
                 <a href="#vartab1" class="active">Базовая схема (до модернизации)</a>
                 <a href="#vartab2">
                     Схема «Оператор - Asterisk - Аналоговая АТС»
                 </a>
                 <a href="#vartab3">
                     Схема «Оператор - Asterisk - Аналоговая АТС» + подключение IP-телефонов к Asterisk
                 </a>
                 <a href="#vartab4">
                     Схема «Оператор - Asterisk - Аналоговая АТС» — IP-телефоны + удаленные подразделения компании
                 </a>
                 <a href="#vartab5">
                     Схема «Оператор - Asterisk - Аналоговая АТС» — IP-телефоны + подразделения + оператор IP-телефонии
                 </a>

             </div>
         </div>
         <div id="vartab1" class="variac-container oper-container oper-container-fir active">
             <div class="oper-item">
                 <h5>
                     Базовая схема (до модернизации)
                 </h5>
                 <p>
                     Ввод — внешние линии Е1 в АТС. Внутренние абоненты — с аналоговыми телефонами.
                 </p>
             </div>
             <div class="oper-item">
                 <a href="/wp-content/themes/voxlink/minimg/modern/tab11.png" class="gallery-item">
                     <img src="/wp-content/themes/voxlink/minimg/modern/tab11.png">
                 </a>
             </div>
         </div>
          <div id="vartab2" class="variac-container oper-container oper-container-fir">
             <div class="oper-item">
                 <h5>
                     Схема «Оператор - Asterisk - Аналоговая АТС»
                 </h5>
                 <p>
                    Сервер Asterisk перенимает логические функции по управлению звонками (IVR, Routing, Voicemail), выполняет запись разговоров, ведет статистику.

                 </p>
             </div>
             <div class="oper-item">
                 <a href="/wp-content/themes/voxlink/minimg/modern/tab12.png" class="gallery-item">
                     <img src="/wp-content/themes/voxlink/minimg/modern/tab12.png">
                 </a>
             </div>
         </div>
         <div id="vartab3" class="variac-container oper-container oper-container-fir">
             <div class="oper-item">
                 <h5>
                     Схема «Оператор - Asterisk - Аналоговая АТС» + подключение IP-телефонов к Asterisk
                 </h5>
                 <p>

                    Дальнейшее наращивание абонентской базы производится на Asterisk. К Asterisk подключаются как IP-телефоны, так и другие VoIP-устройства.

                 </p>
             </div>
             <div class="oper-item">
                 <a href="/wp-content/themes/voxlink/minimg/modern/tab13.png" class="gallery-item">
                     <img src="/wp-content/themes/voxlink/minimg/modern/tab13.png">
                 </a>
             </div>
         </div>
         <div id="vartab4" class="variac-container oper-container oper-container-fir">
             <div class="oper-item">
                 <h5>
                     Схема «Оператор - Asterisk - Аналоговая АТС» + подключение IP-телефонов к Asterisk
                 </h5>
                 <p>

                    Дальнейшее наращивание абонентской базы производится на Asterisk. К Asterisk подключаются как IP-телефоны, так и другие VoIP-устройства.

                 </p>
             </div>
             <div class="oper-item">
                 <a href="/wp-content/themes/voxlink/minimg/modern/tab14.png" class="gallery-item">
                     <img src="/wp-content/themes/voxlink/minimg/modern/tab14.png">
                 </a>
             </div>
         </div>
         <div id="vartab5" class="variac-container oper-container oper-container-fir">
             <div class="oper-item">
                 <h5>
                     Схема «Оператор - Asterisk - Аналоговая АТС» — IP-телефоны + подразделения + оператор IP-телефонии
                 </h5>
                 <p>

                    По данной схеме помимо IP-телефонов подключается VoIP-оператор, который может давать дополнительную канальность, предоставлять номера из других городов, номер 8-800, Skype-аккаунт или кнопку звонка с сайта.

                 </p>
             </div>
             <div class="oper-item">
                 <a href="/wp-content/themes/voxlink/minimg/modern/tab15.png" class="gallery-item">
                     <img src="/wp-content/themes/voxlink/minimg/modern/tab15.png">
                 </a>
             </div>
         </div>


    </div>
</div>


<div class="modern-ul">
    <div class="inner">
        <div class="modern-ul-row">
            <div class="modern-ul-item">
                <div>
                    <h4>Где подходит хорошо</h4>
                    <ul>
                        <li>Устаревшая АТС подключается к оператору телефонии по Е1 или VoIP (SIP, H.323), либо просто имеет платы подключения E1 или VoIP.</li>
                        <li>Внутернних абонентов много.</li>
                        <li>Пользователям требуются базовые функции.</li>
                        <li>Не требуется запись звонков между абонентами устаревшей АТС.</li>
                    </ul>
                </div>
            </div>
            <div class="modern-ul-item">
                <h4>Где подходит плохо</h4>
                <ul>
                    <li>
                        Устаревшая АТС подключается к оператору телефонии аналоговыми линиями.
                    </li>
                    <li>
                        Требуется запись всех разговоров, в т.ч. между внутренними абонентами.
                    </li>
                    <li>
                        Абоненты аналоговой АТС являются операторами колл-центра.
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="modern-ul">
    <div class="inner">
        <div class="modern-ul-row">
            <div class="modern-ul-item">
                <div>
                    <h4>Преимущества такой схемы:</h4>
                    <ul>
                        <li>
                            Такая модернизация является самой бюджетной: работы + оборудование (сервер HP, плата потоков Е1 Parabel) могут стоить порядка 75000 рублей.
                        </li>
                        <li>
                            Процесс модернизации является безболезненным — не требуется замены коммуникаций, расшивки плинтов и патч-панелей.
                        </li>
                        <li>
                            Самая быстрая по времени — работы можно подготовить и выполнить за 1 день: с 10-00 до 17-00 — подготовительные работы, 17-00 — 19-00 — переключение.
                        </li>
                        <li>
                            Самая незаметная для пользователей. Придя утром на работу, наверняка никто и не почувствует изменений: телефоны прежние, номерной план и схема набора — как и раньше.
                        </li>
                    </ul>
                </div>

                <img src="/wp-content/themes/voxlink/minimg/modern/b4.jpg" alt="">
            </div>
            <div class="modern-ul-item">
                <h4>Недостатки такой схемы:</h4>
                <ul>
                    <li>Абоненты Asterisk не видят статусы абонентов существующей АТС и наоборот. Секретарю может потребоваться установить системный IP-телефон и сохранить старый системный телефон, чтобы видеть, кто занят, а кто — нет.</li>
                    <li>Соединение между станциями ограничено емкостью потока Е1, т.е. более 30-ти разговоров одновременно не может проходить (в случае использования 1-го потока)</li>
                    <li>Ряд функций Asterisk становятся недоступными для абонентов существующей АТС.</li>
                    <li>Абоненты, которые подключены к Asterisk звонят, набирая «8-код города-номер абонента», абоненты АТС — начинают набор с 9-ки.</li>
                    <li>При внедрении такой схемы потребуются работы по перенастройке АТС. Если системный администратор компании не сможет выполнить все настройки самостоятельно, потребуется привлекать профильных специалистов, что потребует дополнительных затрат (порядка 8000-15000 рублей в зависимости от станции)</li>
                    <li>Модернизация сохраняет все старое железо: если АТС все-же поломается, а комплектующих под нее не будет, то придется в оперативном режиме заменять её на шлюзы.</li>
                    <li>В случае если нет платы E1 или VoIP в аналоговой АТС, может потребоваться её приобретение, что скажется на стоимости проекта.</li>
                    <li>Необходимо заниматься поддержкой двух АТС — новой IP-АТС Asterisk и прежней АТС.</li>
                </ul>
            </div>
        </div>
    </div>
</div>


<div class="modern-info-block">
    <div class="inner">
        <div class="mib-row">
            <img src="/wp-content/themes/voxlink/minimg/modern/icon1.png" alt="">
            <div>
                <h4>Особенности данной конфигурации</h4>
                <p>
                    Надо заметить, что даже при перечисленных недостатках, эта схема модернизации — одна из наиболее популярных. Нередко «существующей АТС» является вполне современная и функциональная IP-АТС, например, Cisco или Avaya (а также многочисленные Panasonic KX-TDA/KX-TDE, Samsung OfficeServ 7200/7400, LG и пр.), в которых использование необходимых функций (например, запись разговоров, голосовая почта, call-center) может потребовать приобретения дорогостоящих лицензий.
                </p>

            </div>
        </div>
    </div>
</div>


<div class="b5">
    <div class="inner">
        <div class="b5-row">
            <div class="b5-item">
                <div class="b5-num">
                    02
                </div>
                <h2>
                    Замена существующей АТС на аналоговые шлюзы. Сохранение телефонной проводки и аппаратов.
                </h2>
            </div>
            <div class="b5-item">
                <p>
                    В этом варианте от АТС отказываются, отключая её совсем. Вместо неё ставят сервер Asterisk и шлюзы аналоговых линий. Каждый шлюз рассчитан на 30 внутренних линий. Можно устанавливать любое количество шлюзов. Аналоговые телефоны подключаются непосредственно в сами шлюзы.
                </p>
            </div>
        </div>
    </div>
</div>

<div class="amocrom-tabs">
    <div class="inner">
        <div class="oper-tabs">
             <div class="oper-click variac-click">
                 <a href="#vartab21" class="active">Схема «Оператор - Asterisk - Шлюз»</a>
                 <a href="#vartab22">
                     Схема «Оператор - Asterisk - Шлюз» + расширение за счет IP-телефонов
                 </a>
                 <a href="#vartab23">
                     Схема «Оператор - Asterisk - Шлюз» + IP-телефоны + Подключение удаленных подразделений
                 </a>
                 <a href="#vartab24">
                     Схема «Оператор - Asterisk - Шлюз» + IP-телефоны + Подразделения + оператор IP-телефонии
                 </a>

             </div>
         </div>
         <div id="vartab21" class="variac-container oper-container oper-container-fir active">
             <div class="oper-item">
                 <h5>
                    Схема «Оператор- Asterisk-Шлюз»
                 </h5>
                 <p>
                     Вместо АТС подключается требуемое количество шлюзов, к которым будут подключены аналоговые абоненты. Функции АТС переносятся на Asterisk.
                 </p>
                 <p>
                     Проводка сохраняется. Пользователи «не замечают» обновления. Появляется возможность неограниченно расширять номерную ёмкость.
                 </p>
             </div>
             <div class="oper-item">
                 <a href="/wp-content/themes/voxlink/minimg/modern/tab21.png" class="gallery-item">
                     <img src="/wp-content/themes/voxlink/minimg/modern/tab21.png">
                 </a>

             </div>
         </div>
          <div id="vartab22" class="variac-container oper-container oper-container-fir">
             <div class="oper-item">
                 <h5>
                     Схема «Оператор-Asterisk-Шлюз» + расширение за счет IP-телефонов
                 </h5>
                 <p>
                    В дополнение к предыдущей схеме подключение новых абонентов происходит за счет IP-телефонов. Это не требует прокладывать провода, т.к. каждый IP-телефон оборудован коммутатором ЛВС, позволяющей ему и компьютеру использовать один кабель ЛВС. Аналоговые абоненты могут звонить абонентам на IP-телефоны, при этом никакой разницы между самими абонентами нет.

                 </p>
             </div>
             <div class="oper-item">
                 <a href="/wp-content/themes/voxlink/minimg/modern/tab22.png" class="gallery-item">
                     <img src="/wp-content/themes/voxlink/minimg/modern/tab22.png">
                 </a>
             </div>
         </div>
         <div id="vartab23" class="variac-container oper-container oper-container-fir">
             <div class="oper-item">
                 <h5>
                     Схема «Оператор-Asterisk-Шлюз» + IP-телефоны + Подключение удаленных подразделений
                 </h5>
                 <p>

                    В дополнении становится возможным подключить к IP-АТС в головном офисе все удаленные подразделения: филиалы, магазины, склады, производства и пр. А также — внеофисных работников. Все абоненты могут звонить друг другу совершенно бесплатно, набирая всего три (или четыре) цифры внутреннего номера.

                 </p>
             </div>
             <div class="oper-item">
                 <a href="/wp-content/themes/voxlink/minimg/modern/tab23.png" class="gallery-item">
                     <img src="/wp-content/themes/voxlink/minimg/modern/tab23.png">
                 </a>
             </div>
         </div>
         <div id="vartab24" class="variac-container oper-container oper-container-fir">
             <div class="oper-item">
                 <h5>
                     Схема «Оператор-Asterisk-Шлюз» + IP-телефоны + Подразделения + оператор IP-телефонии
                 </h5>
                 <p>

                    По данной схеме помимо IP-телефонов и удаленных подразделений подключается VoIP-оператор, который может давать дополнительную канальность, предоставлять номера из других городов, номер 8-800, Skype-аккаунт или кнопку звонка с сайта.

                 </p>
             </div>
             <div class="oper-item">
                 <a href="/wp-content/themes/voxlink/minimg/modern/tab24.png" class="gallery-item">
                     <img src="/wp-content/themes/voxlink/minimg/modern/tab24.png">
                 </a>
             </div>
         </div>

    </div>
</div>



<div class="modern-ul">
    <div class="inner">
        <div class="modern-ul-row">
            <div class="modern-ul-item">
                <div>
                    <h4>Где подходит хорошо</h4>
                    <ul>
                        <li>Схема оптимальна в тех случаях, когда существующая АТС значительно устарела, имеет сильно ограниченный функционал, необходимо расширить возможности телефонии, доступные для абонентов, но при этом нет возможности менять весь телефонный парк.</li>
                    </ul>
                </div>

            </div>
            <div class="modern-ul-item">
                <h4>Где подходит плохо</h4>
                <ul>
                    <li>
                        Плохо подходит для нужд колл-центров. Хотя при этом возможно реализовать внутренний колл-центр, где у операторов будут IP-телефоны.
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="modern-ul">
    <div class="inner">
        <div class="modern-ul-row">
            <div class="modern-ul-item">
                <div>
                    <h4>Преимущества такой схемы:</h4>
                    <ul>
                        <li>
                            Значительная экономия: стоимость порта в шлюзе в несколько раз ниже стоимости IP-телефона.

                        </li>
                        <li>
                            Централизованное управление: есть только одна IP-АТС, через нее происходит все управление.

                        </li>
                        <li>
                            Централизованное питание: все шлюзы можно подключить к ИБП, что даст бесперебойную работу связи даже при полном отключении питания.

                        </li>
                        <li>
                            Аналоговые телефоны обладают большим функционалом по сравнению с предыдущим вариантом. За исключением некоторых, появляется большинство функций IP-телефонов.
                        </li>
                    </ul>
                </div>
            </div>
            <div class="modern-ul-item">
                <h4>Недостатки такой схемы:</h4>
                <ul>
                    <li>В некоторых случаях требуются работы по перекроссировке телефонных кабелей для подключения в шлюзы.</li>
                    <li>Некоторые дешевые аналоговые и DECT-телефоны могут давать эхо.</li>
                    <li>На аналоговых телефонах не удобны некоторые цифровые функции — перевод вызова, отображение номера звонящего, постановка на удержание и консультационный звонок, и пр.</li>

                </ul>
            </div>
        </div>
    </div>
</div>



<div class="modern-info-block">
    <div class="inner">
        <div class="mib-row">
            <img src="/wp-content/themes/voxlink/minimg/modern/icon1.png" alt="">
            <div>
                <h4>Особенности данной конфигурации</h4>
                <p>
                    При правильном выборе шлюзов и сервера конфигурация может получиться очень удачной за счет высокой функциональности и низкой цены.
                </p>

            </div>
        </div>
    </div>
</div>


<div class="b5">
    <div class="inner">
        <div class="b5-row">
            <div class="b5-item">
                <div class="b5-num">
                    03
                </div>
                <h2>
                    Замена существующей АТС на IP-АТС Asterisk и IP-телефоны
                </h2>
            </div>
            <div class="b5-item">
                <p>
                   В этом варианте от АТС и от всех аналоговых телефонов отказываются полностью. Вместо неё ставят сервер Asterisk и IP-телефоны.
                </p>
            </div>
        </div>
    </div>
</div>


<div class="amocrom-tabs">
    <div class="inner">
        <div class="oper-tabs">
             <div class="oper-click variac-click">
                 <a href="#vartab31" class="active">Схема «Оператор-Asterisk»</a>
                 <a href="#vartab32">
                    Схема «Оператор - Asterisk» + подключение оператора IP-телефонии
                 </a>
                 <a href="#vartab33">
                    Схема «Оператор - Asterisk» + оператор IP-телефонии + удаленные подразделения
                 </a>

             </div>
         </div>
         <div id="vartab31" class="variac-container oper-container oper-container-fir active">
             <div class="oper-item">
                 <h5>
                    Схема «Оператор-Asterisk»
                 </h5>
                 <p>
                     Производится полная замена парка телефонов, АТС заменяется на сервер IP-телефонии Asterisk. Внутренние абоненты подключаются через ЛВС. У каждого сотрудника максимальный набор возможных функций IP-телефонии.
                 </p>
             </div>
             <div class="oper-item">
                 <a href="/wp-content/themes/voxlink/minimg/modern/tab31.png" class="gallery-item">
                     <img src="/wp-content/themes/voxlink/minimg/modern/tab31.png">
                 </a>
             </div>
         </div>
          <div id="vartab32" class="variac-container oper-container oper-container-fir">
             <div class="oper-item">
                 <h5>
                     Схема «Оператор-Asterisk» + подключение оператора IP-телефонии
                 </h5>
                 <p>
                    Становится возможным и целесообразным подключить оператора IP-телефонии для экономии на звонках по РФ и заграницу. Также оператор может подключить дополнительные номера 8-495, либо номера других городов РФ или мира, подключить номер 8-800, Skype или кнопку бесплатного звонка с сайта.

                 </p>
             </div>
             <div class="oper-item">
                 <a href="/wp-content/themes/voxlink/minimg/modern/tab32.png" class="gallery-item">
                     <img src="/wp-content/themes/voxlink/minimg/modern/tab32.png">
                 </a>
             </div>
         </div>
         <div id="vartab33" class="variac-container oper-container oper-container-fir">
             <div class="oper-item">
                 <h5>
                     Схема «Оператор-Asterisk» + оператор IP-телефонии + удаленные подразделения
                 </h5>
                 <p>

                    В дополнение к предыдущей схеме, через Интернет производится подключение удаленных подразделений компании: филиалов, магазинов, складов, АТС партнеров и пр. Все абоненты объединенной сети получают возможность звонить друг другу бесплатно, с использованием коротких внутренних номеров.

                 </p>
             </div>
             <div class="oper-item">
                 <a href="/wp-content/themes/voxlink/minimg/modern/tab33.png" class="gallery-item">
                     <img src="/wp-content/themes/voxlink/minimg/modern/tab33.png">
                 </a>
             </div>
         </div>

    </div>
</div>


<div class="modern-ul">
    <div class="inner">
        <div class="modern-ul-row">
            <div class="modern-ul-item">
                <div>
                    <h4>Где подходит хорошо</h4>
                    <ul>
                        <li>Схема наиболее хорошо подходит для небольших компаний, которые имеют незначительный парк телефонов. Также рассчитана на компании, которые готовы немного переплатить по сравнению с прежними вариантами, но получить новое оборудование и самый полный набор функций IP-телефонии. Отлично подходит для компаний, которые имея аналоговую АТС переезжают в новый офис, в котором нет телефонных линий и их потребуется прокладывать своими силами и за свой счет.</li>
                    </ul>
                </div>
            </div>
            <div class="modern-ul-item">
                <h4>Где подходит плохо</h4>
                <ul>
                    <li>
                        Нет.
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>


<div class="modern-ul">
    <div class="inner">
        <div class="modern-ul-row">
            <div class="modern-ul-item">
                <div>
                    <h4>Преимущества такой схемы:</h4>
                    <ul>
                        <li>Полностью обновляется парк телефонов и оборудования.</li>
                        <li>Все оборудование имеет все цифровые функции IP-телефонии. Возможности сотрудников по связи значительно расширяются.</li>
                        <li>Для подключения нового сотрудника к телефонии достаточно поставить ему IP-телефон на стол, подключенный к ЛВС. Кабелей протягивать не надо.</li>
                        <li>Гораздо престижнее иметь на столе современный IP-телефон Cisco, нежели обычный Panasonic. Это еще раз подчеркивает статус компании.</li>
                    </ul>
                </div>

            </div>
            <div class="modern-ul-item">
                <h4>Недостатки такой схемы:</h4>
                <ul>
                    <li>Схема является более затратной относительно предыдущих двух вариантов. При этом эти затраты очень часто окупаются в короткий срок.</li>
                    <li>Локальная сеть компании должна быть в хорошем состоянии, без узких мест.</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="modern-info-block">
    <div class="inner">
        <div class="mib-row">
            <img src="/wp-content/themes/voxlink/minimg/modern/icon1.png" alt="">
            <div>
                <h4>Особенности данной конфигурации</h4>
                <p>
                    Схема является самой революционной, так как предполагает полный отказ от устаревшей телефонии.
                </p>

            </div>
        </div>
    </div>
</div>

<?php get_template_part("inc/q2"); ?>
<?php get_footer(); ?>