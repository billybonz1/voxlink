<?php
/*
Template Name: Группы вызова
*/
get_header(); ?>
<div class="ande">
<div class="ande-head call-group">
	<div class="inner">
		<div class="ande-head-text">
			<h2>Группы вызовов</h2>
		</div>

	</div>
	<a href="#nextBlock" rel="m_PageScroll2id" class="mouseWheel"></a>
</div>
<div id="nextBlock"  class="ande-enter-call">
	<div class="inner">
		<div class="ande-entcall-in">
			<div class="ande-ec-b">
				<p class="ecb-lp">
					Допустим, что поступил звонок из вне в организацию.
					<span class="ecb-ls">Вызов автоматически был переведен в голосовое меню (IVR):</span>
				</p>
			</div>
			<div class="ande-ec-b">
				<img src="/wp-content/themes/voxlink/minimg/anphone.png" alt="phone">
			</div>
			<div class="ande-ec-b">
				<P class="ecb-rp">Вы позвонили в компанию Вокс Линк. Если вы знаете внутренний номер оператора — наберите его в тональном режиме.</P>
				<ul>
					<li>Чтобы связаться с бухгалтерией, нажмите кнопку 1.</li>
					<li>С группой поддержки — нажмите 2.</li>
					<li>Для связи с оператором, оставайтесь на линии</li>
				</ul>
			</div>
		</div>
	</div>
</div>
<div class="ande-call-way">
	<div class="inner">
		<div class="ande-cw-in">
			<div class="ande-cw-b">
				<p>В голосовом меню была нажата клавиша 1 и вызов был перенаправлен в группу вызова «Бухгалтерия»:</p>
			</div>
			<div class="ande-cw-b">
					<div class="cw-mini-b">
						<img src="/wp-content/themes/voxlink/minimg/anmini1.png" alt="anmini1">
						<span>Оператор связи</span>
					</div>
					<div class="cw-mini-b">
						<img src="/wp-content/themes/voxlink/minimg/anmini2.png" alt="anmini2">
						<span>Входящий вызов</span>
					</div>
					<div class="cw-mini-b">
						<img src="/wp-content/themes/voxlink/minimg/anmini3.png" alt="anmini3">
					</div>
					<div class="cw-mini-b">
						<img src="/wp-content/themes/voxlink/minimg/anmini4.png" alt="anmini4">
						<span>Нажата кнопка 1</span>
					</div>
					<div class="cw-mini-b">
						<img src="/wp-content/themes/voxlink/minimg/anmini5.png" alt="anmini5">
					</div>
			</div>
		</div>
	</div>
</div>
<div class="ande-phone-strategy">
	<div class="inner">
		<h3>В настройках <span class="stra-h">«группы вызова»</span> можно выбрать разнообразные стратегии звонков.
			Рассмотрим каждую из них и решим, где удобно их использовать.</h3>
		<div class="ande-strategy-in">
			<div class="ande-callall-b">
				<h3 class="calla-h">Звонят все</h3>
				<p class="calla-p">Звонят все телефонные аппараты, находящиеся в данной группе вызова.
					 Как только кто-то  один из данной группы снимет трубку на своем телефонном аппарате, то вызов будет направлен на его аппарат.
					 <span class="calla-s">Данная стратегия хорошо подходит для секритариата, когда необходимо, как говорят, «дозвониться любой ценой».</span></p>
				<p class="calla-p calla-line">Не рекомендуется для отдела техподдержки, так как будет создаваться шум, когда один консультант уже снял трубку и разговаривает с Клиентом, а на линии звонок нового Клиента.</p>
			</div>
			<div class="ande-callall-b">
				<img src="/wp-content/themes/voxlink/minimg/ancall1.png" alt="call1">
			</div>
		</div>
	</div>
</div>
<div class="ande-serial">
	<div class="inner">
			<div class="ande-strategy-in">
					<div class="ande-callall-b">
						<h3 class="calla-h">Серийное искание</h3>
						<p class="calla-p">Звонок поступает на любой доступный внутренний номер в группе. По рисунку видно, что абонент под номером 101 в данный момент разговаривает, следовательно вызов может пойти либо на 102, либо на 103 внутренние номера. На какой из внутренних номеров пойдет вызов определяется случайным образом.</p>
						<p class="calla-p calla-line">Данная стратегия эффективна для использования в группе менеджеров по продажам, так как на каждый звонок Клиента будет дан ответ, даже учитывая то, что кто-то  из коллег в данный момент занят.</p>
					</div>
					<div class="ande-callall-b">
						<img src="/wp-content/themes/voxlink/minimg/ancall2.png" alt="call2">
					</div>
				</div>
	</div>
</div>
<div class="ande-progress">
	<div class="inner">
		<div class="ande-prog-in">
			<div class="ande-prog-text">
				<div class="prog-h-block">
					<h3>Прогресс. серийное искание</h3>
				</div>
				<div class="prog-p-block">
					<p>Звонок поступает сперва на первый внутренний номер в группе, далее на первый и второй, потом на первый, второй и третий и так далее, по нарастанию. Т.е., по картинке видо, что сперва идет вызов на 101 внутренний номер, далее, если не было ответа, звонок подключается еще и на 102 внутренний номер, далее и на 103 и так далее, пока кто-то из группы не снимет трубку. </p>
					<p class="prog-p-line">Стратегия эффективна для использования в службе технической поддержки.</p>
				</div>
			</div>
			<div class="ande-prog-img">
				<div class="ande-primg-b">
					<img src="/wp-content/themes/voxlink/minimg/anprog1.png" alt="prog1">
				</div>
				<div class="ande-primg-b">
					<img src="/wp-content/themes/voxlink/minimg/anprog2.png" alt="prog2">
				</div>
				<div class="ande-primg-b">
					<img src="/wp-content/themes/voxlink/minimg/anprog3.png" alt="prog3">
				</div>
			</div>
		</div>
	</div>
</div>
<div class="ande-access">
	<div class="inner">
		<div class="ande-prog-in">
			<div class="ande-prog-text">
				<div class="prog-h-block">
					<h3>Первый доступный</h3>
				</div>
				<div class="prog-p-block">
					<p>Звонок проходит на первый доступный внутренний номер. Если номер 101 занят, а 102 свободен (не зависимо от статуса номера 103), то вызов будет перенаправлен на внутренний номер 102. Если абонент с номером 101 свободен, то вызов будет направлен ему. Если же и 101 и 102 абонент заняты, то вызов отправиться на 103 внутренний номер.</p>
					<p class="prog-p-line">Стратегия также эффективна для менеджеров по продажам.</p>
				</div>
			</div>
			<div class="ande-prog-img">
				<div class="ande-primg-b">
					<img src="/wp-content/themes/voxlink/minimg/anacc1.png" alt="acc1">
				</div>
				<div class="ande-primg-b">
					<img src="/wp-content/themes/voxlink/minimg/anacc1.png" alt="acc1">
				</div>
				<div class="ande-primg-b">
					<img src="/wp-content/themes/voxlink/minimg/anacc1.png" alt="acc1">
				</div>
			</div>
		</div>
	</div>
</div>
</div>


<?php get_template_part("inc/q2"); ?>
<?php get_footer(); ?>