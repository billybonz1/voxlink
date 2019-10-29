<?php
/*
Template Name: Панель оператора call-центра
*/
get_header();  ?>

<div class="ande">
    <div class="ande-head">
    	<div class="inner">
    		<div class="ande-head-text">
    			<h2>Панель оператора FOP2
    				и IP-АТС Asterisk</h2>
    		</div>

    	</div>
    	<a href="#nextBlock" rel="m_PageScroll2id" class="mouseWheel"></a>
    </div>
    <div id="nextBlock" class="ande-control-employee">
    			<div class="ande-employee-block">
    				<div class="ande-empl-text">
    					<h3>Контроль над сотрудниками</h3>
    					<div class="ande-empl-in">
    					<p class="ande-empl-p">У супервайзера перед глазами находится информация обо всех сотрудниках Call-центра.</p>
    					<p class="ande-empl-p">На панели представлены все сотрудника. Причем, они имеют разные цвета:</p>
    					<ul>
    						<li class="ande-empl-li"><span>зеленый</span> – сотрудник свободен;</li>
    						<li class="ande-empl-li"><span>оранжевый</span> – сотрудник разговаривает;</li>
    						<li class="ande-empl-li"><span>серый</span> – сотрудник не в сети.</li>
    					</ul>
    						<p class="ande-empl-p">Также видно на какой номер звонит сотрудник и с какого номера позвонили в Call-центр.</p>
    					</div>
    				</div>
    				</div>
    			<div class="ande-employee-block">
    				<img src="/wp-content/themes/voxlink/minimg/employee.png" alt="employee">
    			</div>
    </div>
    <div class="ande-operation-employee">
    	<div class="inner">
    		<div class="opem-inner">
    			<div class="ande-opem-block">
    				<img src="/wp-content/themes/voxlink/minimg/opem.png" alt="eperemployee">
    			</div>
    			<div class="ande-opem-block">
    				<h3>Управление сотрудниками через панель</h3>
    				<div class="opem-text">
    						<p class="opem-p">Имеется возможность звонить на любой внутренний номер сотрудника Call-центра прямо с панели Оператора.</p>
    						<p class="opem-p">Для этого достаточно выбрать на панели сотрудника и нажать на соответствующую кнопку в шапке панели FOP2.
    							Плюс в том, что Вы всегда видите занят или свободен нужный Оператор.</p>
    				</div>

    			</div>
    		</div>
    	</div>
    </div>
    <div class="ande-record">
    	<div class="inner">
    		<div class="ande-rec-inner">
    				<div class="ande-recblock">
    						<h3>Запись любого разговора</h3>
    						<p>Можно записать любой активный телефонный разговор Оператора с Клиентом, нажав на нужного сотрудника и выбрав «Запись разговора».</p>
    					</div>
    					<div class="ande-recblock">
    						<img src="/wp-content/themes/voxlink/minimg/ande-record.png" alt="record">
    					</div>
    		</div>
    	</div>
    </div>
    <div class="ande-prompert">
    		<div class="ande-prompert-b">
    			<img src="/wp-content/themes/voxlink/minimg/prompert.png" alt="prompert">
    		</div>
    		<div class="ande-prompert-b">
    			<h3>Помощь суфлера</h3>
    			<span class="promper-s">Одним из важных преимуществ FOP2 является функция суфлера. Как это работает?</span>
    			<p class="promper-p">Супервайзер выбирает нужного сотрудника на панели Оператора и нажимает соответствующую кнопку, тем самым подключаясь к диалогу.
    				 Далее он слышит весь разговор, имея возможность объяснять своему подопечному что нужно ответить или спросить в каждом конкретном случае.
    				 Особенностью этого режима является то, что Клиент не слышит подсказок супервайзера.</p>
    		</div>
    </div>
    <div class="ande-purpos">
    	<div class="inner">
    		<div class="ande-purpos-head">
    			<h3>Назначение групп вызова в режиме онлайн</h3>
    		</div>
    		<div class="ande-pur-in">
    			<div class="ande-pur-b">
    				<p class="pur-p">Супервайзер имеет возможность назначать и редактировать группы вызова и очереди в режиме онлайн.</p>
    				<p class="pur-p pur-line"><span class="pur-sli">Это делается в два клика мыши:</span> сперва клик на нужном Операторе, затем выбор из меню соответствующей опции.</p>
    				<p class="pur-p">Таким образом, супервайзер Call-центра имеет возможность редактировать группы вызова и очереди Операторов в любое время, так, как это необходимо.</p>
    			</div>
    			<div class="ande-pur-b">
    				<img src="/wp-content/themes/voxlink/minimg/purpose.png" alt="purpose">
    			</div>
    		</div>
    	</div>
    </div>

</div>
<?php get_template_part("inc/q2"); ?>
<?php get_footer(); ?>