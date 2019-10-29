<?php get_header(); ?>



<div class="main-content">
    <div class="inner">
        <div class="container-fluid">  
            <div class="row">
                <div class="col-md-12">
                    <div class="events-container">
                        <div class="grid-sizer"></div>
                        <div class="gutter-sizer"></div>
                        <?php while ( have_posts() ) : the_post(); ?>
                            <?php get_template_part("loop/event"); ?>
                        <?php endwhile; ?>
                    </div>
                    
                    <div class="load-more" data-post-type="events" data-total="<?php echo wp_count_posts("events")->publish; ?>">
                        <i class="icon icon-load-more"></i>
                        Показать еще
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>    




<?php get_footer(); ?>