<section class="ivr-record">
    <div class="inner">
        <h2>
            Что необходимо для записи голосового приветствия?
        </h2>

        <div class="ir-steps">
            <div data-step="1" class="ir-step current">
                Выбрать диктора
            </div>
            <div data-step="2" class="ir-step">
                Выбрать интонацию
            </div>
            <div data-step="3" class="ir-step">
                Форма отправки
            </div>
            <div data-step="4" class="ir-step">
                Реквизиты
            </div>
            <div class="ir-progress"></div>
        </div>
        <form class="ivr-form">
        	 <div style="display: none;">
                                  <input type="text" name="fullName" value="" />
                              </div>
        	<input type="hidden" name="action" value="submitForm" />
            <div class="ir-step-block show active" data-step="1">
	            <div class="isb-top">
	                <div class="isb-num">
		                1
		            </div>
		            <div class="isb-top-text">
		                <h3>
		                    Выбрать диктора
		                </h3>
		                <p>
		                    У нас есть несколько вариантов записи голосового приветствия, несколько дикторов и разные голоса.
                            Подберите из представленного списка тот, который подходит вам больше всего.
		                </p>
		            </div>
	            </div>
	            <div class="isb-bottom">
	                <div class="isb-audios">
	                    <div class="isb-audios-column">
	                        <div class="isb-block">
	                            <label class="isb-input-radio">
		                            <input type="radio" name="dictor" value="Андрей" checked>
		                            <span></span>
		                            Андрей
		                        </label>
		                        <div class="isb-audio-track">
		                            <audio controls="controls">
                                      <source src="/dictors/andrey/dobro.wav" type="audio/wav">
                                    </audio>
		                            <div class="isbat-play"></div>
		                            <p>Включить демо</p>
		                            <div class="isbat-volume"></div>
		                        </div>
	                        </div>

	                        <div class="isb-block">
	                            <label class="isb-input-radio">
		                            <input type="radio" name="dictor" value="Юлия">
		                            <span></span>
		                            Юлия
		                        </label>
		                        <div class="isb-audio-track">
		                            <audio controls="controls">
                                      <source src="/dictors/julia/dobro.mp3" type="audio/mp3">
                                    </audio>
		                            <div class="isbat-play"></div>
		                            <p>Включить демо</p>
		                            <div class="isbat-volume"></div>
		                        </div>
	                        </div>

	                    </div>
	                    <div class="isb-audios-column">
	                        <div class="isb-block">
	                            <label class="isb-input-radio">
		                            <input type="radio" name="dictor" value="Алевтина">
		                            <span></span>
		                            Алевтина
		                        </label>
		                        <div class="isb-audio-track">
		                            <audio controls="controls">
                                      <source src="/dictors/alevtina/dobrojelatelnaya.wav" type="audio/wav">
                                    </audio>
		                            <div class="isbat-play"></div>
		                            <p>Включить демо</p>
		                            <div class="isbat-volume"></div>
		                        </div>
	                        </div>

	                        <div class="isb-block">
	                            <label class="isb-input-radio">
		                            <input type="radio" name="dictor" value="Мария">
		                            <span></span>
		                            Мария
		                        </label>
		                        <div class="isb-audio-track">
		                            <audio controls="controls">
                                      <source src="/dictors/maria/dobr.wav" type="audio/wav">
                                    </audio>
		                            <div class="isbat-play"></div>
		                            <p>Включить демо</p>
		                            <div class="isbat-volume"></div>
		                        </div>
	                        </div>
	                    </div>

	                    <div class="isb-audios-column">
	                        <div class="isb-textarea">
	                            <p>
	                                Напишите текст
	                            </p>
	                            <textarea name="audio-text" data-validation="required" data-validation-error-msg="Напишите текст, который нужно записать" placeholder="У нас есть несколько вариантов записи голосового приветствия, несколько дикторов и разные голоса"></textarea>
	                        </div>
	                    </div>
	                </div>
	                <div class="isb-urgency">
	                    <div class="isbu-text">
	                        Как срочно нужно сделать:
	                    </div>
	                    <label class="isb-input-radio isbu-input-radio">
	                      <input type="radio" name="urgency" value="2 часа" checked>
		                  <span></span>
		                  2 часа
	                    </label>
	                    <label class="isb-input-radio isbu-input-radio">
	                      <input type="radio" name="urgency" value="В течение суток">
		                  <span></span>
		                  В течение суток
	                    </label>
	                </div>
	                <div class="ir-nav">
	                	<div></div>
    		            <div class="ir-next"><span>Дальше</span></div>
    		        </div>
	            </div>
	        </div>

	        <div class="ir-step-block" data-step="2">
	            <div class="isb-top">
	                <div class="isb-num">
		                2
		            </div>
		            <div class="isb-top-text">
		                <h3>
		                    Выбрать интонацию
		                </h3>
		                <p>
		                    Голосовое приветствие может быть записано в разных интонациях – от радостной, до сексуальной.
							Выберите ту интонацию, с которой вы будете «приветствовать клиентов»
		                </p>
		            </div>
	            </div>
	            <div class="isb-bottom">

	            	<?php
	            	$dictors = array(
	            		array(
	            			"name" => "Андрей",
	            			"audios" => array(
	            				array(
	            					"name" => "Убедительная интонация",
	            					"path" => "/dictors/andrey/ubedit.wav"
	            				),
	            				array(
	            					"name" => "Доброжелательная интонация",
	            					"path" => "/dictors/andrey/dobro.wav"
	            				),
	            				array(
	            					"name" => "Игровая интонация",
	            					"path" => "/dictors/andrey/game.wav"
	            				),
	            				array(
	            					"name" => "Нейтральная интонация",
	            					"path" => "/dictors/andrey/neutral.wav"
	            				),
	            				array(
	            					"name" => "Сексуальная интонация",
	            					"path" => "/dictors/andrey/sex.wav"
	            				),
	            				array(
	            					"name" => "Разговорная интонация",
	            					"path" => "/dictors/andrey/talking.wav"
	            				),
	            				array(
	            					"name" => "Вкрадчивая интонация",
	            					"path" => "/dictors/andrey/vkrad.wav"
	            				),
	            			)
	            		),
	            		array(
	            			"name" => "Юлия",
	            			"audios" => array(
	            				array(
	            					"name" => "Убедительная интонация",
	            					"path" => "/dictors/julia/ubed.mp3"
	            				),
	            				array(
	            					"name" => "Доброжелательная интонация",
	            					"path" => "/dictors/julia/dobro.mp3"
	            				),
	            				array(
	            					"name" => "Динамичная интонация",
	            					"path" => "/dictors/julia/dynamic.mp3"
	            				),
	            				array(
	            					"name" => "Игровая интонация",
	            					"path" => "/dictors/julia/igriv.mp3"
	            				),
	            				array(
	            					"name" => "Нейтральная интонация",
	            					"path" => "/dictors/julia/Neitral.mp3"
	            				),
	            				array(
	            					"name" => "Разговорная интонация",
	            					"path" => "/dictors/julia/Razgovor.mp3"
	            				),
	            				array(
	            					"name" => "Сексуальная интонация",
	            					"path" => "/dictors/julia/sexual.mp3"
	            				),
	            				array(
	            					"name" => "Вкрадчивая интонация",
	            					"path" => "/dictors/julia/vkrad.mp3"
	            				),

	            				array(
	            					"name" => "На английском",
	            					"path" => "/dictors/julia/English_Julia.mp3"
	            				)


	            			)
	            		),
	            		array(
	            			"name" => "Алевтина",
	            			"audios" => array(
	            				array(
	            					"name" => "Убедительная интонация",
	            					"path" => "/dictors/alevtina/ybeditelnaya.wav"
	            				),
	            				array(
	            					"name" => "Доброжелательная интонация",
	            					"path" => "/dictors/alevtina/dobrojelatelnaya.wav"
	            				),
	            				array(
	            					"name" => "Динамичная интонация",
	            					"path" => "/dictors/alevtina/dinamichnaya.wav"
	            				),
	            				array(
	            					"name" => "Игровая интонация",
	            					"path" => "/dictors/alevtina/igrovaya.wav"
	            				),
	            				array(
	            					"name" => "Нейтральная интонация",
	            					"path" => "/dictors/alevtina/neytralnaya.wav"
	            				),
	            				array(
	            					"name" => "Разговорная интонация",
	            					"path" => "/dictors/alevtina/razgovornaya.wav"
	            				),
	            				array(
	            					"name" => "Сексуальная интонация",
	            					"path" => "/dictors/alevtina/sexyalnaya.wav"
	            				),
	            				array(
	            					"name" => "Вкрадчивая интонация",
	            					"path" => "/dictors/alevtina/vkradchivaya.wav"
	            				)


	            			)
	            		),
	            		array(
	            			"name" => "Мария",
	            			"audios" => array(
	            				array(
	            					"name" => "Убедительная интонация",
	            					"path" => "/dictors/maria/ubedit.wav"
	            				),
	            				array(
	            					"name" => "Доброжелательная интонация",
	            					"path" => "/dictors/maria/dobr.wav"
	            				),
	            				array(
	            					"name" => "Динамичная интонация",
	            					"path" => "/dictors/maria/dynamic.wav"
	            				),
	            				array(
	            					"name" => "Игровая интонация",
	            					"path" => "/dictors/maria/igrovaya.wav"
	            				),
	            				array(
	            					"name" => "Нейтральная интонация",
	            					"path" => "/dictors/maria/neytral.wav"
	            				),
	            				array(
	            					"name" => "Разговорная интонация",
	            					"path" => "/dictors/maria/razg.wav"
	            				),
	            				array(
	            					"name" => "Сексуальная интонация",
	            					"path" => "/dictors/maria/sex.wav"
	            				),
	            				array(
	            					"name" => "Вкрадчивая интонация",
	            					"path" => "/dictors/maria/vkradch.wav"
	            				),
	            				array(
	            					"name" => "На английском",
	            					"path" => "/dictors/maria/engl.wav"
	            				)



	            			)
	            		)
	            	);

	            	?>

	            	<?php foreach($dictors as $dictor){?>
	                <div class="isb-audios isb-audios2" data-dictor="<?php echo $dictor['name']; ?>">
	                	<?php foreach($dictor['audios'] as $audio){?>
	                    	<div class="isb-audios-column">
		                        <div class="isb-block">
		                            <label class="isb-input-radio">
			                            <input type="radio" name="intonation" value="<?php echo $audio['name']?>">
			                            <span></span>
			                            <?php echo $audio['name']?>
			                        </label>
			                        <div class="isb-audio-track">
			                        	<?php
			                        		$audioArr = explode("/",$audio['path']);
			                        		$file = end($audioArr);
			                        		$fileArr = explode(".",$file);
			                        		$format = end($fileArr);
			                        	?>
			                            <audio controls="controls">
	                                      <source src="<?php echo $audio['path']?>" type="audio/<?php echo $format; ?>">
	                                    </audio>
			                            <div class="isbat-play"></div>
			                            <p>Включить демо</p>
			                            <div class="isbat-volume"></div>
			                        </div>
		                        </div>
		                    </div>
	                    <?php } ?>
	                </div>
	                <?php } ?>
	                <div class="ir-nav">
	                	<div class="ir-prev"><span>Назад</span></div>
    		            <div class="ir-next"><span>Дальше</span></div>
    		        </div>
	            </div>
	        </div>

	        <div class="ir-step-block" data-step="3">
	        	<div class="isb-top">
	                <div class="isb-num">
		                3
		            </div>
		            <div class="isb-top-text">
		                <h3>
		                    Связаться с нами
		                </h3>
		            </div>
	            </div>
	            <div class="isb-bottom">
		        	<h4>Оставьте ваши контакты, и мы свяжемся с вами</h4>
		        	<div class="isb-form-block">
		        		<label class="field">
		        			<input type="text" name="name" placeholder="Имя" />
		        		</label>
		        		<label class="field">
		        			<input type="tel" name="phone" placeholder="+7" />
		        		</label>
		        		<label class="field">
		        			<input type="email" name="email" placeholder="Email" />
		        		</label>
		        		<label class="field input-checkbox">
		        			<input type="checkbox" checked name="agree" />
		        			<p>Соглашение об обработке персональных данных</p>
		        		</label>
		        		<div class="ta-center">
		        			<input type="submit" class="btn-orange2" value="Отправить" />
		        		</div>
		        	</div>
		        	<div class="ir-nav">
		            	<div class="ir-prev"><span>Назад</span></div>
        		        <div class="ir-next"><span>Дальше</span></div>
        		    </div>
		        </div>
	       	</div>
	       	<div class="ir-step-block" data-step="4">
	       		<div class="isb-top">
	                <div class="isb-num">
		                4
		            </div>
		            <div class="isb-top-text">
		                <h3>
		                    Прислать нам реквизиты вашей компании и рекомендации
		                </h3>
		            </div>
	            </div>
	            <div class="isb-bottom">
	            	<div class="isb-text-columns">
	            		<div class="isbt-column">
	            			<p>
	            				Вы можете связаться
								с нашими менеджерами по телефону
								<a href="tel: 8 (495) 989-85-33">8 (495) 989-85-33</a>
							</p>
							<p>
								или отправить все данные нам на почту
								<a href="mailto:ping@voxlink.ru">ping@voxlink.ru</a>
							</p>
	            		</div>
	            		<div class="isbt-column">
	            			<div class="isbt-info">
	            				При отправке заявки не забудьте указать интонацию и диктора,
								и способ получения готового приветствия, чтобы ваше приветствие соответствовало всем вашим пожеланиям.
	            			</div>
	            		</div>
	            	</div>
	            	<div class="ir-nav">
		            	<div class="ir-prev"><span>Назад</span></div>
		            	<div></div>
        		    </div>
	            </div>
	            <div class="isb-top-columns">
	            	<div class="isb-top">
		                <div class="isb-num">
    		                5
    		            </div>
    		            <div class="isb-top-text">
    		                <h3>
    		                    Ждать готовое приветствие
    		                </h3>
    		                <p>
    		                	В течение 24 часов с момента обращения диктор все запишет и обработает. Вы получите готовое приветствие любым удобным для вас способом.
    		                </p>
    		            </div>
		            </div>
		            <div class="isb-top">
		                <div class="isb-num">
    		                6
    		            </div>
    		            <div class="isb-top-text">
    		                <h3>
    		                    Получить довольных клиентов
    		                </h3>
    		                <p>
    		                	Вы сможете получить все плюсы голосового приветствия и получить множество довольных клиентов.
    		                </p>
    		            </div>
		            </div>
	            </div>
	       	</div>
        </form>
    </div>
</section>