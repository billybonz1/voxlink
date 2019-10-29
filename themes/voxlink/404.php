<?php get_header(); ?>
<?php /*?>
<pre>
<?php
echo $_SERVER['REMOTE_ADDR'];
?></pre>


<?php
*/
function transliterate($input){ $gost = array( "а"=>"a","б"=>"b","в"=>"v","г"=>"g","д"=>"d", "е"=>"e", "ё"=>"yo","ж"=>"j","з"=>"z","и"=>"i", "й"=>"i","к"=>"k","л"=>"l", "м"=>"m","н"=>"n", "о"=>"o","п"=>"p","р"=>"r","с"=>"s","т"=>"t", "у"=>"y","ф"=>"f","х"=>"h","ц"=>"c","ч"=>"ch", "ш"=>"sh","щ"=>"sh","ы"=>"i","э"=>"e","ю"=>"u", "я"=>"ya", "А"=>"A","Б"=>"B","В"=>"V","Г"=>"G","Д"=>"D", "Е"=>"E","Ё"=>"Yo","Ж"=>"J","З"=>"Z","И"=>"I", "Й"=>"I","К"=>"K","Л"=>"L","М"=>"M","Н"=>"N", "О"=>"O","П"=>"P","Р"=>"R","С"=>"S","Т"=>"T", "У"=>"Y","Ф"=>"F","Х"=>"H","Ц"=>"C","Ч"=>"Ch", "Ш"=>"Sh","Щ"=>"Sh","Ы"=>"I","Э"=>"E","Ю"=>"U", "Я"=>"Ya", "ь"=>"","Ь"=>"","ъ"=>"","Ъ"=>"", "ї"=>"j","і"=>"i","ґ"=>"g","є"=>"ye", "Ї"=>"J","І"=>"I","Ґ"=>"G","Є"=>"YE" ); return strtr($input, $gost); }
function transliterateen($input){ $gost = array( "a"=>"а","b"=>"б","v"=>"в","g"=>"г","d"=>"д","e"=>"е","yo"=>"ё", "j"=>"ж","z"=>"з","i"=>"и","i"=>"й","k"=>"к", "l"=>"л","m"=>"м","n"=>"н","o"=>"о","p"=>"п","r"=>"р","s"=>"с","t"=>"т", "y"=>"у","f"=>"ф","h"=>"х","c"=>"ц", "ch"=>"ч","sh"=>"ш","sh"=>"щ","i"=>"ы","e"=>"е","u"=>"у","ya"=>"я","A"=>"А","B"=>"Б", "V"=>"В","G"=>"Г","D"=>"Д", "E"=>"Е","Yo"=>"Ё","J"=>"Ж","Z"=>"З","I"=>"И","I"=>"Й","K"=>"К","L"=>"Л","M"=>"М", "N"=>"Н","O"=>"О","P"=>"П", "R"=>"Р","S"=>"С","T"=>"Т","Y"=>"Ю","F"=>"Ф","H"=>"Х","C"=>"Ц","Ch"=>"Ч","Sh"=>"Ш", "Sh"=>"Щ","I"=>"Ы","E"=>"Е", "U"=>"У","Ya"=>"Я","'"=>"ь","'"=>"Ь","''"=>"ъ","''"=>"Ъ","j"=>"ї","i"=>"и","g"=>"ґ", "ye"=>"є","J"=>"Ї","I"=>"І", "G"=>"Ґ","YE"=>"Є" ); return strtr($input, $gost); }
$rusurl = str_replace("/", "", transliterateen($_SERVER['REQUEST_URI']));

$text=$rusurl;
#char patterns
$RusA = "[абвгдеёжзийклмнопрстуфхцчшщъыьэюя]";
$RusV = "[аеёиоуыэюя]";
$RusN = "[бвгджзклмнпрстфхцчшщ]";
$RusX = "[йъь]";

#main ruller
$regs[] = "~(". $RusX . ")(" . $RusA . $RusA . ")~iu";
$regs[] = "~(". $RusV . ")(" . $RusV . $RusA  . ")~iu";
$regs[] = "~(". $RusV . $RusN . ")(" . $RusN . $RusV . ")~iu";
$regs[] = "~(". $RusN . $RusV . ")(" . $RusN . $RusV . ")~iu";
$regs[] = "~(". $RusV . $RusN . ")(" . $RusN . $RusN. $RusV . ")~iu";
$regs[] = "~(". $RusV . $RusN . $RusN . ")(". $RusN . $RusN . $RusV . ")~iu";
$regs[] = "~(". $RusX . ")(" . $RusA . $RusA . ")~iu";
$regs[] = "~(". $RusV . ")(" . $RusA . $RusV  . ")~iu";


foreach($regs as $cur_regxp) {
        $text = preg_replace( $cur_regxp , "$1-$2" , $text);
}
$textArr = explode("-", $text);

foreach($textArr as $key=>$text){
    if(iconv_strlen($text) < 3){
        unset($textArr[$key]);
    } else {
        $textArr[] = transliterate($text);
    }
}
$args = array(
	'post_type'        => 'kb',
	'post_status'      => 'publish',
	'order'            => 'DESC',
	"meta_key"         => "views",
	'orderby'          => 'meta_value',
	's'                => $textArr,
	"post__not_in" => array(2357)
);
$args['posts_per_page'] = 7;
$kb = get_posts($args);
$args['post_type'] = 'product';
$products = get_posts($args);
$args['post_type'] = 'page';
$pages = get_posts($args);
$args['orderby'] = 'date';
$pages1 = get_posts($args);
?>

<div class="page404">
    <div class="inner">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="first404">
                        <h1>404</h1>
                        <h2>О<span>оопа!</span></h2>
                        <p>
                            <strong>Страницы, которую Вы искали, почему-то не оказалось на месте.</strong>
                        </p>
                        <p>Если Вы уверены, что она когда-то тут была, нажмите кнопку</p>
                        <a href="#" class="page404-btn">Найти</a>
                        <p>и мы постараемся ее разыскать.</p>
                    </div>
                    <div class="second404">
                        <img src="/wp-content/themes/voxlink/minimg/check404.png" alt="">
                        <h3>Запрос отправлен!</h3>
                        <p>
                            <strong>Если нужно, чтобы мы с Вами связались, после того как найдем потерявшуюся страничку - напишите сюда свою почту:</strong>
                        </p>
                        <div class="just-mail form-block">
                          <form class="form-shake">
                              <div style="display: none;">
                                  <input type="text" name="fullName" value="" />
                              </div>

                              <input type="hidden" name="action" value="submitForm" />
                            <input type="text" name="email"  placeholder="Введите ваш email" />
                            <button name="send" class="btn btn-mail"><i class="icon icon-arrow-mail"></i></button>
                          </form>
                        </div>
                        <p>
                            Также, Вы можете оставить комментарий, если у Вас есть полезная информация:
                        </p>
                        <form>
                            <input type="hidden" name="action" value="submitForm" />
                            <label>
                                <textarea name="comment" placeholder="Введите текст"></textarea>
                            </label>
                            <button class="page404-btn">Отправить</button>
                        </form>
                    </div>
                </div>
                <div class="col-md-6">
                    <img src="/wp-content/themes/voxlink/minimg/404-1.png" alt="">
                    <img src="/wp-content/themes/voxlink/minimg/404-2.png" alt="">
                    <img src="/wp-content/themes/voxlink/minimg/404-3.png" alt="">
                    <img src="/wp-content/themes/voxlink/minimg/404-4.png" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
<div>
    <div class="page404-items">
        <div class="inner">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <h2>По Вашему запросу могут быть полезны следующие страницы:</h2>

                        <div class="owl-carousel">
                            <?php foreach($pages as $item){ ?>
                                <?php
                                $post_object = get_post( $item->ID );
                                setup_postdata( $GLOBALS['post'] =& $post_object );
                                get_template_part("loop/item404"); ?>
                            <?php }?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h2>А еще, большим интересом пользуются вот эти страницы нашего сайта:</h2>
                        <div class="owl-carousel">
                            <?php foreach($pages1 as $item){ ?>
                                <?php
                                $post_object = get_post( $item->ID );
                                setup_postdata( $GLOBALS['post'] =& $post_object );
                                get_template_part("loop/item404"); ?>
                            <?php }?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="page404-items">
        <div class="inner">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <h2>Вот эти статьи из Базы Знаний:</h2>
                        <div class="owl-carousel">
                            <?php foreach($kb as $item){ ?>
                                <?php
                                $post_object = get_post( $item->ID );
                                setup_postdata( $GLOBALS['post'] =& $post_object );
                                get_template_part("loop/item404"); ?>
                            <?php }?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h2>Вот эти товары из Интернет-Магазина:</h2>
                        <div class="owl-carousel">
                            <?php foreach($products as $item){ ?>
                                <?php
                                $post_object = get_post( $item->ID );
                                setup_postdata( $GLOBALS['post'] =& $post_object );
                                get_template_part("loop/item404"); ?>
                            <?php }?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>






<?php get_footer(); ?>