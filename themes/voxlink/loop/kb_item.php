<?php $img = get_the_post_thumbnail(get_the_ID(), "medium"); ?>
<div class="kb__item">
  <div class="row">

      <div class="col-sm-4">
        <a href="<?php the_permalink(); ?>">
            <?php if($img){?>
                <?php echo $img; ?>
            <?php } else { ?>
                <div class="noimg-kb"></div>
            <?php } ?>

            <span class="kb__item__date">
                <span>
                    <?php echo get_the_date("d"); ?>
                </span>
                <div>
                    <?php echo get_the_date("M"); ?>
                </div>
            </span>
        </a>
      </div>

    <div class="col-sm-8">
      <a href="<?php the_permalink(); ?>"><h2><?php the_title(); ?></h2></a>

      <?php  if(is_category()){?>
        <div class="kb-meta" style="border: 0;">
              <div class="kb-meta__item">
                <i class="icon icon-date2"></i>
                <?php echo get_the_date("d.m.Y"); ?>
              </div>
        </div>
      <?php } ?>


      <?php the_excerpt(); ?>
      <div class="kb-tags">
        <?php
        $posttags = get_the_tags();
        if ($posttags) {
          foreach($posttags as $tag) {?>
            <a href="<?php echo get_term_link($tag->term_id); ?>" class="kb-tag"><?php echo $tag->name; ?></a>
          <?php }
        }
        ?>
      </div>
      <a href="<?php the_permalink(); ?>" class="round-more"></a>
    </div>
  </div>
</div>