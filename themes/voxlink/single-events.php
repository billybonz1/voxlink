<?php get_header(); ?>



<div class="main-content">
    <div class="inner">
        <div class="container-fluid">  
            <div class="row">
                <div class="col-md-12">
                    <?php while ( have_posts() ) : the_post(); ?>
                        <h1><?php the_title(); ?></h1>
                        
                        <div class="single-event-img">
                            <div class="single-event-date">
                                <?php 
                                    $date = get_field("date"); 
                                    $date = explode(".",$date);
                                ?>
                                <strong>
                                    <?php echo $date[0];?>
                                </strong>
                                <?php echo numberMonthToText($date[1]);?> <br>
                                <?php echo $date[2];?>
                                
                            </div>
                            <img src="<?php echo get_field("bigimg")['url']; ?>"></img>
                        </div>
                        
                        
                        <div class="row">
                            <div class="col-sm-6">
                                <?php the_content(); ?>
                            </div>
                            <div class="col-sm-6">
                                <h2>Детали проекта:</h2>
                                <div class="row">
                                    <div class="col-md-12 icon__items clearfix">
                                        <div class="icon__item">
                                            <div class="ii__icon"></div>
                                            <div class="ii__text">
                                                <strong>Клиент</strong>
                                                <?php the_field("client"); ?>
                                            </div>
                                        </div>
                                        <div class="icon__item">
                                            <div class="ii__icon">
                                                <img src="/wp-content/themes/voxlink/img/event-marker.svg">
                                            </div>
                                            <div class="ii__text">
                                                <strong>Город</strong>
                                                <?php the_field("city"); ?>
                                            </div>
                                        </div>
                                        <div class="icon__item">
                                            <div class="ii__icon">
                                                <img src="/wp-content/themes/voxlink/img/event-square.svg">
                                            </div>
                                            <div class="ii__text">
                                                <strong>Площадь</strong>
                                                <?php the_field("square"); ?>
                                            </div>
                                        </div>
                                        <div class="icon__item">
                                            <div class="ii__icon">
                                                <img src="/wp-content/themes/voxlink/img/event-done.svg">
                                            </div> 
                                            <div class="ii__text">
                                                <strong>Завершено</strong>
                                                <?php the_field("done"); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                
                                <h2>Было внедрено оборудование:</h2>
                                
                                <?php $seProducts = get_field("equip"); 
                                foreach ($seProducts as $product) { ?>
                                    <a href="<?php get_the_permalink($product->ID); ?>" class="single-event-product"><?php echo $product->post_title; ?></a>
                                <?php } ?>
                                
                                
                            </div>
                        </div>
                        
                    <?php endwhile; ?>
                </div>
            </div>
        </div>
    </div>
</div>    




<?php get_footer(); ?>