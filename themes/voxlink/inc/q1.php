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

<div class="questions">
  <img src="<?php the_field("img",$manager); ?>">
  <div class="questions-text">
    <h3>Остались вопросы?</h3>
    <p>
      Я - <?php echo $manager->post_title; ?> компании Voxlink. Хотите уточнить детали или готовы оставить заявку? Укажите номер телефона, я перезвоню в течение 3-х секунд.
    </p>
    <div class="questions-btns">
      <a href="#" class="btn btn-transparent active">Заказть звонок</a>
      <a href="#" class="btn btn-transparent">Отправить сообщение</a>
      <a href="#" class="btn btn-transparent">Заявка на расчет проекта</a>
    </div>
    <form>
       <div style="display: none;">
          <input type="text" name="fullName" value="" />
      </div>
      <input type="hidden" name="action" value="submitForm" />
      <input type="tel" name="Телефон" placeholder="Телефон"  required>
      <input type="submit" value="Заказать звонок" name="send">
    </form>
  </div>
</div>