<li>
  <?php $post_meta = get_post_meta(get_the_ID()); ?>
  <div class="resh-item">
    <div class="resh-item-img-cont tac">
      <div class="resh-item-img">
        <?php
        $icon1 = wp_get_attachment_image_url( $post_meta['icon1'][0], "full");
        ?>
        <img src="<?php echo $icon1; ?>" alt="">
      </div>
    </div>

    <h3>
      <?php the_title(); ?><br><span>(<?php echo $post_meta['people'][0]; ?>)</span>
    </h3>
    <div class="resh-item-price">
      <?php echo $post_meta['price'][0]; ?>
    </div>
    <div class="resh-item-desc"><?php echo $post_meta['desc'][0]; ?></div>
    <div class="resh-item-content">
      <?php the_field("include"); ?>
    </div>
    <a href="<?php the_permalink(); ?>" class="btn btn-orange2">Подробнее</a>
  </div>
</li>