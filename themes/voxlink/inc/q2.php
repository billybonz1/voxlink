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


<div class="questions2" id="question2">
  <div class="questions2-left">
    <div class="q2l-block">
      <img src="<?php the_field("img",$manager); ?>">
      <div class="q2l-text">
        <h3>Здравствуйте!</h3>
        <p><?php the_field("text",$manager); ?></p>
      </div>
    </div>
    <div class="questions2-table">
      <div class="q2t-row">
        <div class="q2t-col">Ф.И.О</div>
        <div class="q2t-col"><?php echo $manager->post_title; ?></div>
      </div>
      <div class="q2t-row">
        <div class="q2t-col">Должность</div>
        <div class="q2t-col"><?php the_field("post",$manager); ?></div>
      </div>
      <div class="q2t-row">
        <div class="q2t-col">Email</div>
        <div class="q2t-col"><a href="mailto:<?php the_field("email",$manager); ?>"><?php the_field("email",$manager); ?></a></div>
      </div>
      <?php
        $phone = get_field("phone1",$manager)
      ?>
      <?php if(!empty($phone)){?>
      <div class="q2t-row">
        <div class="q2t-col">Тел. городской</div>
        <div class="q2t-col"><?php echo $phone; ?></div>
      </div>
      <?php } ?>
      <?php
        $phone1 = get_field("phone2",$manager)
      ?>
      <?php if(!empty($phone1)){?>
      <div class="q2t-row">
        <div class="q2t-col">Тел. внутрений</div>
        <div class="q2t-col"><?php echo $phone1; ?></div>
      </div>
      <?php } ?>
    </div>
  </div>



  <div class="questions2-right">
     <form>
        <div style="display: none;">
           <input type="text" name="fullName" value="" />
       </div>
       <input type="hidden" name="action" value="submitForm" />
        <label>
          Ваше имя
          <input type="text" name="name" />
        </label>
        <label>
          Ваш телефон
          <input type="tel" name="phone" />
        </label>
        <label>
          Ваша почта
          <input type="text" name="email" />
        </label>
        <input type="submit" value="Оставить заявку" name="send" class="btn btn-orange2" />
        <input type="hidden" name="action" value="submitForm">
        <input type="hidden" name="actionName" value="Отправка формы">
        <?php
        $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        ?>
        <input type="hidden" name="url" value="<?php echo $actual_link; ?>">
    </form>
  </div>

</div>