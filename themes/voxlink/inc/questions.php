<?php
    $postid = get_the_ID();

    $managerid = get_field("manager",$postid);
    if(!empty($managerid)){
      $manager = get_post($managerid);
    } else {
      $manager = get_posts(array(
        "post_type" => "managers",
        "posts_per_page" => 1,
        'orderby' => 'rand'
      ))[0];
    }
?>


<div class="questions" id="questions">
  <img src="<?php the_field("img",$manager); ?>">
  <div class="questions-text">
    <h3>Остались вопросы?</h3>
    <p>
      Я - <?php echo $manager->post_title; ?>, менеджер компании Voxlink. Хотите уточнить детали или готовы оставить заявку? Укажите номер телефона, я перезвоню в течение 3-х секунд.
    </p>
    <div class="questions-btns">
      <a href="#quest-open-tab1" class="quest-open-tab quest-active-a btn btn-transparent">Заказть звонок</a>
      <form id="quest-open-tab1" class="quest-tab quest-active-tab form-quest1">
         <div style="display: none;">
                                  <input type="text" name="fullName" value="" />
                              </div>
        <div class="field">
          <input type="tel" name="phone" placeholder="Телефон" />
        </div>
        <input type="submit" value="Заказать звонок" name="send">
        <input type="hidden" name="action" value="submitForm" />
      </form>
      <a href="#quest-open-tab2" class="quest-open-tab btn btn-transparent">Отправить сообщение</a>
      <form id="quest-open-tab2" class="quest-tab form-quest2">
         <div style="display: none;">
                                  <input type="text" name="fullName" value="" />
                              </div>
        <div class="forms-names">
          <div class="field">
            <input type="text" class="name" name="name" placeholder="Введите ваше имя">
          </div>
          <div class="field">
            <input type="text" class="email" name="email" placeholder="Введите ваш email">
          </div>
        </div>
        <div class="field">
          <textarea name="message" placeholder="Ваше сообщение"></textarea>
        </div>
        <input type="submit" value="отправить" name="send">
        <input type="hidden" name="action" value="submitForm" />
      </form>
      <a href="#quest-open-tab3" class="quest-open-tab btn btn-transparent">Заявка на расчет проекта</a>
      <form id="quest-open-tab3" class="quest-tab form-quest3">
         <div style="display: none;">
                                  <input type="text" name="fullName" value="" />
                              </div>
        <textarea name="message" placeholder="Ваше сообщение"></textarea>
        <div class="namenum">
          <div class="field">
            <input type="text" class="name" name="name" placeholder="Введите ваше имя" />
          </div>
          <div class="field">
            <input type="tel" name="phone" placeholder="Введите ваш телефон" />
          </div>
        </div>
        <div class="emailsend">
          <div class="field">
            <input type="text" class="email" name="email" placeholder="Введите ваш email">
          </div>
          <input type="submit" value="отправить" name="send">
          <input type="hidden" name="action" value="submitForm" />
        </div>
      </form>
    </div>
  </div>
</div>