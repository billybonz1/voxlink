
<?php
global $post;

?>


<a href="<?php echo get_the_permalink($post->ID); ?>" class="event__item post">
    <div class="event__title">
        <?php echo $post->post_title; ?>
    </div>
    <div class="event__img" style="background-image: url(<?php echo get_the_post_thumbnail_url($post->ID); ?>);"></div>
    <div class="event__date">
        <i class="icon icon-calendar"></i> <?php echo get_field("date", $post->ID); ?>
    </div>
</a>