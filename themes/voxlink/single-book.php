<?php
/*
Template Name: Книга
Template Post Type: kb
*/

get_header();
function number_to_roman($value)
{
    if($value<0) return "";
    if(!$value) return "0";
    $thousands=(int)($value/1000);
    $value-=$thousands*1000;
    $result=str_repeat("M",$thousands);
    $table=array(
        900=>"CM",500=>"D",400=>"CD",100=>"C",
        90=>"XC",50=>"L",40=>"XL",10=>"X",
        9=>"IX",5=>"V",4=>"IV",1=>"I");
    while($value) {
        foreach($table as $part=>$fragment) if($part<=$value) break;
            $amount=(int)($value/$part);
        $value-=$part*$amount;
        $result.=str_repeat($fragment,$amount);
    }
    return $result;
}
?>

    <div class="main-content">
      <div class="inner">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-9 col-md-8 col-xs-12">


                          <div class="book-chapters">
                              <?php
                                $chapters = get_posts(array(
                                    "posts_per_page" => -1,
                                    "post_type" => "kb",
                                    "order" => "ASC",
                                    'orderby' => 'meta_value_num',
                                    'meta_key' => 'chapter',
                                    'tax_query' => array(
                                        array(
                                            'taxonomy' => 'kb_cat',
                                            'field' => 'slug',
                                            'terms' => 'book'
                                        ),
                                    )
                                ));
                              ?>
                              <?php foreach($chapters as $chapter){?>
                                <a href="<?php echo get_permalink($chapter->ID); ?>" class="book-chapter">
                                  <?php
                                    $num = number_to_roman(get_field("chapter", $chapter->ID));
                                  ?>
                                    <span><?php echo $num; ?>.</span>
                                  <?php
                                  echo $chapter->post_title;
                                  ?>
                                </a>
                              <?php } ?>
                          </div>


  		                    <?php while ( have_posts() ) : the_post()  ?>
        		                    <div class="main-content-left kb-content">
        		                      <div class="row">


                                    <div class="col-xs-12">

                                        <div class="book-chapter-num">
                                          <?php $chapterNum = get_field("chapter"); ?>
                                          Глава <?php echo $chapterNum; ?>
                                        </div>
                                        <h1><?php  the_title(); ?></h1>

                                        <?php

                                          the_content();

                                        ?>

                                    </div>


        		                      </div>
        		                    </div>


                                <div class="clearfix"></div>


                                <div class="book-steps">
                                  <?php
                                    $chapterIndex = (int)$chapterNum - 1;
                                    if(isset($chapters[$chapterIndex - 1])){
                                  ?>
                                  <?php $chapterPrev = $chapters[$chapterIndex - 1];?>
                                  <a href="<?php echo get_permalink($chapterPrev->ID);?>" class="book-step-ff">
                                    ГЛАВА <?php echo get_field("chapter",$chapterPrev->ID);?>. <br>
                                    <?php echo $chapterPrev->post_title; ?>
                                  </a>
                                  <?php
                                    }
                                  ?>


                                  <?php
                                  if(isset($chapters[$chapterIndex + 1])){
                                  ?>
                                  <?php $chapterNext = $chapters[$chapterIndex + 1];?>
                                  <a href="<?php echo get_permalink($chapterNext->ID);?>" class="book-last-f">
                                    ГЛАВА <?php echo get_field("chapter",$chapterNext->ID);?>. <br>
                                    <?php echo $chapterNext->post_title; ?>
                                  </a>
                                  <?php
                                    }
                                  ?>

                                </div>

                                <?php get_template_part("inc/questions"); ?>


                          <?php endwhile; ?>




            </div>
            <div class="col-lg-3 col-md-4 col-xs-12 main-xs-pad">
              <?php get_sidebar(); ?>
            </div>
          </div>
        </div>
      </div>
    </div>

 <?php get_footer(); ?>