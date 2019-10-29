<?php $imgUrl = get_the_post_thumbnail_url(get_the_ID(), "developments");?>
<a href="<?php the_permalink(); ?>" class="page404-item">
    <div class="main-kb-img page404-item-img" <?php if(!empty($imgUrl)){?>style="background-image: url(<?php echo $imgUrl; ?>)"<?php } ?>></div>
    <h3><?php the_title(); ?></h3>
    <p><?php echo wp_trim_words( get_the_content() ,8, "..."  ); ?></p>
</a>