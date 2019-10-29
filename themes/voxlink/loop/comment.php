<?php

global $post;

?>


<div class="comment">
    <div class="comment-img">
        <?php echo get_avatar( $post->user_id ); ?>
    </div>
    <div class="comment-content">
        <?php if($post->user_id !== "0"){ ?>
            <h3><?php echo get_user_meta( $post->user_id, "first_name")[0];?> <?php echo get_user_meta( $post->user_id, "last_name")[0];?></h3>
        <?php } else {?>
            <h3><?php echo $post->comment_author; ?></h3>
        <?php } ?>
        
        <p><?php echo $post->comment_content; ?></p>
    </div>
    
    <div class="comment-bottom clearfix">
        <a href="#" class="comment-btn">Ответить</a>
        <div class="comment-likes">
            <a href="#like">
                <i class="icon icon-like"></i>
                0
            </a>
            <a href="#nolike">
                <i class="icon icon-nolike"></i>
                0
            </a>
        </div>
    </div>
    
    <div class="comment-date">
        <?php echo $post->comment_date; ?>
    </div>
    
</div>