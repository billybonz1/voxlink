<?php
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}

//Views  counter
add_action( 'shutdown', 'addViews' );
function addViews() {
	$currentPageID = get_the_ID();
	if(!empty($currentPageID)){
		$views = (int)get_field("views", $currentPageID);
		$views++;
		update_field("views", $views, $currentPageID);
	}
}




if(isset($_REQUEST['action'])){
	if($_REQUEST['action'] == 'submitForm'){
		require 'PHPMailer/PHPMailer.php';
		require 'PHPMailer/Exception.php';
	}
}
include("dynamic.php");
// include("tracking.php");

// add this to functions.php, a custom plugin, or a snippets plugin to remove the description tab in woocommerce
// by Robin Scott of Silicon Dales - full info at https://silicondales.com/tutorials/woocommerce-tutorials/remove-description-tab-woocommerce/
// add_filter( 'woocommerce_product_tabs', 'sd_remove_product_tabs', 98 );
// function sd_remove_product_tabs( $tabs ) {
//     unset( $tabs['description'] );
//     return $tabs;
// }





if( function_exists('acf_add_options_page') ) {

	acf_add_options_page(array(
		'page_title' 	=> 'Настройки сайта',
		'menu_title'	=> 'Настройки сайта',
		'menu_slug' 	=> 'general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false,
		'update_button'		=> "Обновить",
	));

}



add_filter('acf/load_field/name=filter', function($field) {
    $taxonomies = get_taxonomies([
        'public' => false,
        '_builtin' => false
    ], 'objects');
    $field['choices'] = [];
    /** @var \WP_Taxonomy $taxonomy */
    foreach($taxonomies as $taxonomy) {
        // Exclude non-woocommerce choices:
        if(strncmp('pa_', $taxonomy->name, 3) !== 0) {
            continue;
        }
        $field['choices'][$taxonomy->name] = $taxonomy->labels->singular_name;
    }
    return $field;
});


// Склонение по падежам
function plural_form($number, $after) {
  $cases = array (2, 0, 1, 1, 1, 2);
  echo $number.' '.$after[ ($number%100>4 && $number%100<20)? 2: $cases[min($number%10, 5)] ];
}

function pewc_filter_is_purchasable( $is_purchasable, $product ) {
	return true;
}
add_filter( 'woocommerce_is_purchasable', 'pewc_filter_is_purchasable', 10, 2 );


function highlight_text($text, $query){
	return str_replace(
		array($query,mb_ucfirst($query),mb_strtolower($query,'UTF-8'),mb_strtoupper($query,'UTF-8')),
		array(
			"<span class='highlighted'>".$query."</span>",
			"<span class='highlighted'>".mb_ucfirst($query)."</span>",
			"<span class='highlighted'>".mb_strtolower($query,'UTF-8')."</span>",
			"<span class='highlighted'>".mb_strtoupper($query,'UTF-8')."</span>"
		),$text);
}

function cut_text_for_highlight($text, $query){
	$string = strip_tags($text);
	$posValues = array();
	$pos = mb_strpos($string, $query);
	if($pos !== FALSE){
		$posValues[] = $pos;
	}
	$pos2 = mb_strpos($string, mb_strtolower($query,'UTF-8'));
	if($pos2 !== FALSE){
		$posValues[] = $pos2;
	}
	$pos3 = mb_strpos($string, mb_strtoupper($query,'UTF-8'));
	if($pos3 !== FALSE){
		$posValues[] = $pos3;
	}
	$pos4 = mb_strpos($string, mb_ucfirst($query));
	if($pos4 !== FALSE){
		$posValues[] = $pos4;
	}

	if(count($posValues) > 0){
		$pos = min($posValues);
	} else {
		$pos = 0;
	}



	if($pos !== FALSE){
		$pos -= 20;
		if($pos < 0){
			$pos = 0;
		}
		$string = mb_substr($string,$pos,100)."...";
		if($pos != 0){
			$string = "...".$string;
		}
		return highlight_text($string, $query);
	}else{
		return "";
	}
}

if(!function_exists('mb_ucfirst'))
{
 function mb_ucfirst($string, $enc = 'UTF-8')
 {
	return mb_strtoupper(mb_substr($string, 0, 1, $enc), $enc) .
         mb_substr($string, 1, mb_strlen($string, $enc), $enc);
 }
}

function myactions(){
	if(isset($_REQUEST['action']) || isset($_POST['action'])){
		if(isset($_REQUEST['action'])){
			status_header(200);
		}
		if($_REQUEST['action'] == "removeFromCart"){
			$cartId = WC()->cart->generate_cart_id( $_REQUEST['id'] );
			$cartItemKey = WC()->cart->find_product_in_cart( $cartId );
			WC()->cart->remove_cart_item( $cartItemKey );
			echo $_REQUEST['id'];
			exit();
		}

		if($_REQUEST['action'] == "add-to-cart"){
			global $woocommerce;
			// $WC_Product = new WC_Product($_REQUEST['id']);
			// if(empty($WC_Product->get_regular_price())){
			// 	update_post_meta( $_REQUEST['id'], '_regular_price', '1' );
			// 	wc_delete_product_transients( $_REQUEST['id'] );
			// }
			$key = $woocommerce->cart->add_to_cart($_REQUEST['id'],$_REQUEST['quantity']);
			echo $key;

			exit();
		}

		if($_REQUEST['action'] == 'add-review'){

			$comment_args = array(
			    'comment_post_ID'      => $_REQUEST['product_id'], // <=== The product ID where the review will show up
			    // 'comment_author'       => 'LoicTheAztec',
			    // 'comment_author_email' => 'loictheaztec@fantastic.com', // <== Important
			    // 'comment_author_url'   => '',
			    'comment_content'      => $_REQUEST['comment'],
			    'comment_parent'       => 0,
			    // 'user_id'              => 5, // <== Important
			    'comment_date'         => date('Y-m-d H:i:s'),
			    'comment_approved'     => 0,
			);

			if(is_user_logged_in()){
			    $user = wp_get_current_user();
			    $comment_args['user_id'] = $user->data->ID;
			    $comment_args['comment_author'] = $user->data->user_nicename;
			    $comment_args['comment_author_email'] = $user->data->user_email;
			} else {
				$comment_args['comment_author'] = $_REQUEST['author'];
			    $comment_args['comment_author_email'] = $_REQUEST['email'];
			}
			$comment_id = wp_insert_comment($comment_args);

			// HERE inserting the rating (an integer from 1 to 5)
			update_comment_meta( $comment_id, 'rating', $_REQUEST['rating'] );
			echo $comment_id;
			exit();
		}


		if($_POST['action'] == "add-order"){
			global $woocommerce;

			$address = array(
			    'first_name' => $_REQUEST['name'],
			    'company'    => $_REQUEST['org_name'],
			    'email'      => $_REQUEST['email'],
			    'phone'      => $_REQUEST['phone'],
			    'address_1'  => $_REQUEST['address'],
			    'address_2'  => $_REQUEST['ur_address'],
			    'state'      => $_REQUEST['region']
			);

			// Now we create the order
			$order = wc_create_order();
			$items = $woocommerce->cart->get_cart();
			foreach($items as $item => $values) {
				$order->add_product(
					get_product($values['product_id']),
					$values['quantity'],
					array(
						"subtotal" => $values["line_subtotal"],
						"total" => $values["line_total"]
					)
				);
			}
			$order->set_address( $address, 'billing' );
			$order->update_status('processing');
			//
			$order->calculate_totals();


			$order_id = trim(str_replace('#', '', $order->get_order_number()));
			update_field("inn1", $_REQUEST['inn'], $order_id);
			update_field("delivery", $_REQUEST['delivery'], $order_id);
			update_field("org_type", $_REQUEST['org_type'], $order_id);
			update_field("okopf", $_REQUEST['okopf'], $order_id);
			update_field("org_name", $_REQUEST['org_name'], $order_id);
			update_field("org_inn", $_REQUEST['org_inn'], $order_id);
			update_field("org_kpp", $_REQUEST['org_kpp'], $order_id);
			update_field("region", $_REQUEST['region'], $order_id);
			update_field("ur_address", $_REQUEST['ur_address'], $order_id);
			update_field("address", $_REQUEST['address'], $order_id);
			update_field("order-text", $_REQUEST['order-text'], $order_id);
			
			if(isset($_FILES['file-0'])){
				$uploadedfile = $_FILES['file-0'];
				$movefile = wp_handle_upload($uploadedfile, array('test_form' => false));
				//On sauvegarde la photo dans le média library
				if ($movefile) {
					$wp_upload_dir = wp_upload_dir();
					$attachment = array(
						'guid' => $wp_upload_dir['url'].'/'.basename($movefile['file']),
						'post_mime_type' => $movefile['type'],
						'post_title' => preg_replace('/\.[^.]+$/',"", basename($movefile['file'])),
						'post_content' => "",
						'post_status' => "inherit"
					);
					$attach_id = wp_insert_attachment($attachment, $movefile['file']);
					update_field('reqs',$attach_id,$order_id);
				}
			}
			

			echo $order_id;

			$woocommerce->cart->empty_cart();

			exit();
		}


		if($_REQUEST['action'] == "get-about-clients"){

	    	exit();
		}


		if($_REQUEST['action'] == "ajax-search"){

			if ( false === ( $special_query_results = get_transient( 'ajax_search_results'.sanitize_title($_REQUEST['s']) ) ) ) {
			    // It wasn't there, so regenerate the data and save the transient
			    global $wpdb;
				$query = "
				    SELECT COUNT(*)
				    FROM `wp_posts`
				    WHERE `post_status` = 'publish'
				    AND `post_password` = ''
				    AND (`post_title` LIKE '%".$_REQUEST['s']."%'
				    OR `post_content` LIKE '%".$_REQUEST['s']."%'
				    OR `post_excerpt` LIKE '%".$_REQUEST['s']."%'
				    )";
				$result = $wpdb->get_results( $query );
				$special_query_results = array(
					"count" => current($result[0]),
				);
				// ...Perform the query
				$args = array(
					'post_type'        => 'any',
					'post_status'      => 'publish',
					'order'            => 'DESC',
					'orderby'          => 'date',
					's'                => $_REQUEST['s']
				);
				$args['posts_per_page'] = 4;

				$special_query_results['results'] = get_posts($args);

			    set_transient( 'ajax_search_results'.sanitize_title($_REQUEST['s']) , $special_query_results, 60*60*12 );
			} else {
				$special_query_results = get_transient( 'ajax_search_results'.sanitize_title($_REQUEST['s']));
			}?>


			<?php if($special_query_results['count'] > 0){ ?>

				<div class="search-content">
			<?php
			foreach($special_query_results['results'] as $post){ ?>
				<a href="<?php echo get_the_permalink($post->ID); ?>" class="search-content-item">
					<?php $imgURL = get_the_post_thumbnail_url( $post->ID, "thumbnail" );?>
					<?php if(!empty($imgURL)){?>
					<div class="search-content-item-img">
						<img src="<?php echo $imgURL; ?>" alt="">
					</div>
					<?php } ?>
					<span class="search-content-item-text">
						<div class="search-content-item-title">
							<?php echo highlight_text($post->post_title,$_REQUEST['s']); ?>
						</div>
						<div class="search-content-item-content">
							<?php
							$pattern = '/'.$_REQUEST['s'].'|'.mb_ucfirst($_REQUEST['s']).'|'.mb_strtolower($_REQUEST['s']).'|'.mb_strtoupper($_REQUEST['s']).'/';

							if(preg_match($pattern,$post->post_content) == 1){?>
								<?php echo cut_text_for_highlight($post->post_content,$_REQUEST['s']); ?>
							<?php } else { ?>
								<?php echo cut_text_for_highlight($post->post_excerpt,$_REQUEST['s']); ?>
							<?php }?>
						</div>
					</span>

					<?php
						$post_type = get_post_type_object( $post->post_type );
					?>
					<span class="search-content-item-type">
						<?php echo $post_type->labels->singular_name; ?>
					</span>
				</a>
			<?php } ?>
				<a href="/?s=<?php echo $_REQUEST['s']; ?>" class="show-all-search">Показать все результаты (<?php echo $special_query_results['count']; ?>)</a>
			</div>

			<?php } else { ?>
				<div class="search-content empty">Ничего не найдено :(</div>
			<?php } ?>
			<?php
			exit();
		}

		if($_REQUEST['action'] == 'json-team'){
			$team = get_posts(array(
				"post_type" => "team",
				"posts_per_page" => -1
			));
			echo json_encode($team);
			exit();
		}

		if($_REQUEST['action'] == 'addHistory'){
			// if(isset($_REQUEST['user'])){
			// 	$user = get_user_by("ID",$_REQUEST['user']);
			// 	if(!empty($user)){
			// 		$_COOKIE['user'] = $_REQUEST['user'];
			// 	}
			// }
			// function mergeUsers($oldUser, $newUser){
			// 	//mergeFirstName;
			// 	$oldFirstTime = get_field("firstTime", 'user_'.$oldUser);
			// 	$newFirstTime = get_field("firstTime", 'user_'.$newUser);
			// 	if(strtotime($oldFirstTime) > strtotime($newFirstTime)){
			// 		update_field("firstTime", $newFirstTime, 'user_'.$newUser);
			// 	}else{
			// 		update_field("firstTime", $oldFirstTime, 'user_'.$newUser);
			// 	}


			// 	//mergeHistory
			// 	$oldHistory = get_field("history", 'user_'.$oldUser);
			// 	$newHistory = get_field("history", 'user_'.$newUser);

			// 	$newArrHistory = array_merge($oldHistory, $newHistory);
			// 	update_field("history", $newArrHistory, 'user_'.$newUser);


			// 	//mergeIps
			// 	$oldIps = get_field("ips", 'user_'.$oldUser);
			// 	$newIps = get_field("ips", 'user_'.$newUser);
			// 	$newArrIps = array_merge($oldIps, $newIps);

			// 	$ips = [];
			// 	foreach($newArrIps as $ip){
			// 		$ips[] = $ip['ip'];
			// 	}
			// 	$uniqueIps = array_unique($ips);
			// 	$arrIps = [];
			// 	foreach($uniqueIps as $ip){
			// 		$arrIps[] = array(
			// 			"ip" => $ip
			// 		);
			// 	}
			// 	update_field("ips", $arrIps, 'user_'.$newUser);


			// 	//mergePhones
			// 	$oldPhones = get_field("phones", 'user_'.$oldUser);
			// 	$newPhones = get_field("phones", 'user_'.$newUser);
			// 	$phones = array_merge($oldPhones, $newPhones);
			// 	$newPhones = [];
			// 	foreach($phones as $phone){
			// 		$newPhones[] = $phone['phone'];
			// 	}
			// 	$newArrPhones = array_unique($newPhones);
			// 	$newArrPhones1 = [];
			// 	foreach($newArrPhones as $phone){
			// 		$newArrPhones1[] = array(
			// 			"phone" => $phone
			// 		);
			// 	}
			// 	update_field("phones", $newArrPhones1, 'user_'.$newUser);



			// 	require_once(ABSPATH.'wp-admin/includes/user.php');
			// 	wp_delete_user($oldUser);
			// 	setcookie("user", $newUser);
			// 	$_COOKIE['user'] = $newUser;
			// }






			// if(!isset($_COOKIE['user'])){
			//     if(is_user_logged_in()){
			//     	$user = wp_get_current_user();
			//     	setcookie("user", $user->ID);
			//     	$_COOKIE['user'] = $user->ID;
			//     }else{
			//         $userID = wp_create_user( time() , "knopka91019251" );
			//         setcookie("user", $userID);
			//         $_COOKIE['user'] = $userID;
			//     }
			// }else{
			// 	if(is_user_logged_in()){
			// 		$user = wp_get_current_user();
			// 		if($user->ID != $_COOKIE['user']){
			// 			mergeUsers($_COOKIE['user'],$user->ID);
			// 		}
			// 	}
			// }

			// $rowDate = date ("d.m.Y H:i:s");
			// $row = array(
			// 	'action'=> $_REQUEST['actionName'],
			// 	'url'	=> $_REQUEST['url'],
			// 	'time'	=> $rowDate,
			// 	'title' => $_REQUEST['title']
			// );

			// $i = add_row('history', $row, 'user_'.$_COOKIE['user']);


			// $firstTime = get_field("firstTime", 'user_'.$_COOKIE['user']);
			// if(empty($firstTime)){
			// 	update_field("firstTime", date ("d.m.Y H:i:s"), 'user_'.$_COOKIE['user']);
			// }

			// function getRealIpAddr()
			// {
			//     if (!empty($_SERVER['HTTP_CLIENT_IP']))   //check ip from share internet
			//     {
			//       $ip=$_SERVER['HTTP_CLIENT_IP'];
			//     }
			//     elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   //to check ip is pass from proxy
			//     {
			//       $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
			//     }
			//     else
			//     {
			//       $ip=$_SERVER['REMOTE_ADDR'];
			//     }
			//     return $ip;
			// }

			// if(isset($_REQUEST['ip'])){
			// 	$reqIP = $_REQUEST['ip'];
			// }else{
			// 	$reqIP = getRealIpAddr();
			// }

			// $findIP = 0;
			// $ips = get_field("ips",'user_'.$_COOKIE['user']);
			// foreach($ips as $ip){
			// 	if($ip['ip'] == $reqIP){
			// 		$findIP = 1;
			// 	}
			// }

			// if($findIP == 0){
			// 	add_row('ips', array("ip"=>$reqIP), 'user_'.$_COOKIE['user']);
			// }

			// if(isset($_REQUEST['phone'])){
			// 	$phones = get_field("phones", 'user_'.$_COOKIE['user']);
			// 	$newPhones = [];
			// 	foreach($phones as $phone){
			// 		$newPhones[] = $phone['phone'];
			// 	}
			// 	$newPhones[] = $_REQUEST['phone'];
			// 	$newArrPhones = array_unique($newPhones);
			// 	$newArrPhones1 = [];
			// 	foreach($newArrPhones as $phone){
			// 		$newArrPhones1[] = array(
			// 			"phone" => $phone
			// 		);
			// 	}
			// 	update_field("phones", $newArrPhones1, 'user_'.$_COOKIE['user']);
			// }

			// if(isset($_REQUEST['email'])){

			// 	$user = get_user_by("email",$_REQUEST['email']);
			// 	if($user !== false){
			// 		if($_COOKIE['user'] != $user->data->ID){
			// 			mergeUsers($_COOKIE['user'],$user->data->ID);
			// 		}
			// 	}else{
			// 		$user = get_user_by("ID", $_COOKIE['user']);
			// 	    if(empty($user->data->user_email)){
			// 	    	$user_id = wp_update_user( array( 'ID' => $_COOKIE['user'], 'user_email' => $_REQUEST['email'] ) );
			// 	    }
			// 	}


			// }


			// if($_REQUEST['actionName'] == "Отправка формы"){
			// 	require_once(ABSPATH.'sendmail.php');
			// }else{
			// 	echo $_COOKIE['user'].",".$i.",".$rowDate;
			// }
			exit();
		} else if($_REQUEST['action'] == 'updateSecond'){
			// if(isset($_REQUEST['user'])){
			// 	$user = get_user_by("ID",$_REQUEST['user']);
			// 	if(!empty($user)){
			// 		$_COOKIE['user'] = $_REQUEST['user'];
			// 	}
			// }
			// $row = array(
			// 	'action'=> $_REQUEST['actionName'],
			// 	'url'	=> $_REQUEST['url'],
			// 	'time'	=> $_REQUEST['date'],
			// 	'title' => $_REQUEST['title']
			// );
			// $row['seconds'] = $_REQUEST['seconds'];
			// update_row('history', $_REQUEST['row'], $row, 'user_'.$_COOKIE['user'] );
			// print_r($_REQUEST);
			exit();
		} else if($_REQUEST['action'] == 'submitForm'){
			$mail = new PHPMailer\PHPMailer\PHPMailer(true);                              // Passing `true` enables exceptions
			try {
			    //Recipients
			    $mail->setFrom('log@voxlink.ru', 'VoxLink.ru');
			    $mail->addAddress('kalini.art@gmail.com');
			    $mail->addAddress('team@voxlink.ru');


			    //Attachments
			    // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
			    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

			    //Content
			    $mail->isHTML(true);

			    if(empty($_POST['subject'])){
			        $sub = "Сообщение с сайта";
			    }else{
			        $sub = $_POST['subject'];
			    }
			    $body = "";
			    $body2 = "Тема: ".$sub."\n";
			    foreach($_POST as $key=>$value){

			        if(!empty($value)){
			            if($key == "name" || $key == "name2"){
			                $key = "Имя";
			            }
			            if($key == "city2"){
			                $key = "Город";
			            }
			            if($key == "phone"){
			                $key = "Телефон";
			            }
			            if($key == "age"){
			                $key = "Возраст";
			            }
			            if($key == "sex"){
			                $key = "Пол";
			            }
			            if($key == "skintype"){
			                $key = "Тип кожы";
			            }
			            if(strpos($key, "addinfo") !== false){
			                $key = "Дополнительная информация";
			            }

			            if($key == "problems"){
			                $key = "Какие проблемы Вас беспокоят?";
			            }
			            if($key == "whatcosmetic"){
			                $key = "Какую косметику хотите подобрать?";
			            }
			            if($key == "usedecor"){
			                $key = "Пользуетесь ли вы декоративной косметикой ?";
			            }
			            if($key == "stages"){
			                $key = "Сколько этапов в вашем уходе ?";
			            }

			            if($key == "stages"){
			                $key = "Сколько этапов в вашем уходе ?";
			            }
			            if($key == "describeStages"){
			                $key = "Опишите этапы";
			            }

			            if($key == "infosource"){
			                $key = "Где вы получаете информацию про уход за кожей лица и про косметику?";
			            }

			            if($key == "infosource"){
			                $key = "Где вы получаете информацию про уход за кожей лица и про косметику?";
			            }

			            if($key == "ecommerce"){
			                $key = "В каких интернет-магазинах покупаете?";
			            }

			            if($key == "network"){
			                $key = "В каких парфюмерных сетях покупаете?";
			            }

			            if($key == "offline"){
			                $key = "В каких офлайн магазинах покупаете?";
			            }

			            if($key == "priority"){
			                $key = "Какие приоритеты у вас при выборе косметики?";
			            }
			            if($key == "email2" || $key == "email"){
			                $key = "E-mail";
			            }
			            if($key == "question"){
			                $key = "Возникший вопрос или предложение";
			            }


			            if($key != "subject" && $key != "accept"){
			                $body .= $key.": ".$value."<br>";
			                $body2 .= $key.": ".$value."\n";
			            }


			        }

			    }


				if(isset($_COOKIE['HTTP_REFERER'])){
			        $body .= "Реферальная ссылка: ".$_COOKIE['HTTP_REFERER']."<br>";
			    }

			    if(isset($_COOKIE['user'])){

			        $body .= "Трекинг: http://voxlink.ru/wp-admin/admin.php?id=".$_COOKIE['user']."&page=tracking<br>";
			    }

			    if(isset($_COOKIE['URL'])){
			        $body .= "Ссылка заявки: ".$_COOKIE['URL'];
			    }


			    $mail -> CharSet = "UTF-8";
			    $mail->Subject = $sub;
			    $mail->Body    = $body;
			    if($_POST['fullName'] == "1" || $_POST['fullName'] == ""){
			    	$mail->send();
			    }

			    // sendMessageToTelegram("341981452", $body2);
			    // sendMessageToTelegram("282631635", $body2);
			    // sendMessageToTelegram("295197760", $body2);
			    // sendMessageToTelegram("193496025", $body2);
			    echo '1';
			} catch (Exception $e) {
			    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
			}
			exit();
		}
	}
}

add_action( 'template_redirect', 'myactions' );


//Функция вывода кнопок Сравнения и Закладок
function to_compare($product_id){
	if(isset($_COOKIE['compare'])){
		$compareString = $_COOKIE['compare'];
	}else{
		$compareString = "";
	}

	$compareArr = explode(",", $compareString);
	if(in_array ($product_id,$compareArr)){
		$compareActive = "active";
		$compareText = "В сравнении";
	}else{
		$compareActive = "";
		$compareText = "К сравнению";
	}
	?>
	<a href="/compare/" class="to-compare <?php echo $compareActive; ?>" data-id="<?php echo $product_id; ?>">
		<svg width="14pt" height="16pt" viewBox="0 0 14 16" version="1.1" xmlns="http://www.w3.org/2000/svg">
			<g id="#999999ff">
			<path fill="#999999" opacity="1.00" d=" M 4.01 0.00 L 14.00 0.00 L 14.00 13.00 C 12.67 13.00 11.34 13.00 10.02 13.00 C 10.01 13.75 9.98 15.25 9.97 16.00 L 0.00 16.00 L 0.00 3.00 C 1.33 3.00 2.66 3.00 3.99 3.00 C 3.99 2.25 4.00 0.75 4.01 0.00 M 4.96 1.00 C 4.97 1.50 5.00 2.50 5.01 3.00 C 6.67 3.00 8.34 3.00 10.00 3.00 C 10.00 6.01 10.00 9.01 10.00 12.01 C 10.76 12.01 12.29 12.01 13.05 12.00 C 13.06 8.33 13.03 4.66 13.00 0.99 C 10.32 0.98 7.64 0.98 4.96 1.00 M 0.99 4.00 C 0.98 7.68 0.99 11.36 1.00 15.03 C 3.67 15.04 6.33 15.03 9.00 15.00 C 9.00 11.33 9.00 7.67 9.00 4.00 C 6.33 4.00 3.66 4.00 0.99 4.00 Z" />
			</g>
		</svg>
		<span class="to-compare-text"><?php echo $compareText; ?></span>
	</a>

	<?php
	if(isset($_COOKIE['bookmarks'])){
		$bookmarksString = $_COOKIE['bookmarks'];
	}else{
		$bookmarksString = "";
	}

	$bookmarksArr = explode(",", $bookmarksString);
	if(in_array ($product_id,$bookmarksArr)){
		$bookmarkActive = "active";
		$bookmarkText = "В закладках";
	}else{
		$bookmarkActive = "";
		$bookmarkText = "В закладки";
	}
	?>
	<a href="/bookmarks/" class="to-bookmark <?php echo $bookmarkActive; ?>" data-id="<?php echo $product_id; ?>">
		<svg width="11pt" height="15pt" viewBox="0 0 11 15" version="1.1" xmlns="http://www.w3.org/2000/svg">
			<g id="#999999ff">
			<path fill="#999999" opacity="1.00" d=" M 0.00 0.00 L 11.00 0.00 L 11.00 15.00 L 10.89 15.00 C 9.13 13.35 7.39 11.67 5.62 10.03 C 3.67 11.53 1.89 13.23 0.18 15.00 L 0.00 15.00 L 0.00 0.00 M 1.00 1.00 C 0.98 4.95 0.97 8.90 0.99 12.84 C 2.44 11.39 4.00 10.06 5.68 8.88 C 7.12 10.20 8.56 11.52 10.00 12.85 C 10.04 8.90 10.01 4.95 10.00 1.00 C 7.00 1.00 4.00 1.00 1.00 1.00 Z" />
			</g>
		</svg>
		<span class="to-compare-text">
			<?php echo $bookmarkText; ?>
		</span>
	</a>
<?php }


//Получить самого первого родителя категории
function get_term_top_most_parent($term_id, $taxonomy){
    // start from the current term
    $parent  = get_term_by( 'id', $term_id, $taxonomy);
    // climb up the hierarchy until we reach a term with parent = '0'
    while ($parent->parent != '0'){
        $term_id = $parent->parent;

        $parent  = get_term_by( 'id', $term_id, $taxonomy);
    }
    return $parent;
}




//Добавляем в выборку значения о наличии товара
add_action( 'woocommerce_product_query', 'my_theme_posts_filter', 1000 );
function my_theme_posts_filter( $q ){
	if(!is_admin()){
		if(isset($_GET['stock']) && $_GET['stock'] != ''){
			$meta_query = $q->get( 'meta_query' );
		    if ( get_option( 'woocommerce_hide_out_of_stock_items' ) == 'no' ) {
		        $meta_query[] = array(
		            'key'       => '_stock_status',
		            'value'     => $_GET['stock'],
		            'compare'   => '='
		        );
		    }
		    $q->set( 'meta_query', $meta_query );
		}


		if(strpos($_SERVER['REQUEST_URI'], "page") != FALSE){
			$arr = explode("/", $_SERVER['REQUEST_URI']);
			$index = count($arr) - 2;
			$page = $arr[$index];
			$q->set( 'paged', $page);
		}
		$meta_query = $q->get( 'meta_query' );
	}
	// echo "<pre>";
	// print_r($meta_query);
	// echo "</pre>";
}


/**
 * Количество товаров в магазине на сранице
 */
add_filter( 'loop_shop_per_page', 'new_loop_shop_per_page', 20 );

function new_loop_shop_per_page( $cols ) {
  // $cols contains the current number of products per page based on the value stored on Options -> Reading
  // Return the number of products you wanna show per page.
  $cols = 15;
  return $cols;
}


// Сортировка товаров по акционной цене

add_filter('woocommerce_get_catalog_ordering_args', 'am_woocommerce_catalog_orderby');
function am_woocommerce_catalog_orderby( $args ) {
	if(!isset($_GET['orderby']) || $_GET['orderby']=="menu_order"){
		$args['meta_key'] = '_sale_price';
	    $args['orderby'] = 'meta_value';
	    $args['order'] = 'desc';
	}
    return $args;
}




//Изменяем цену, если указана в долларах
add_action( "save_post", 'change_product_price', 1000 );
function change_product_price($post_ID){
	$post = get_post($post_ID);
	if($post->post_type == "product"){
		if(!isset($_SESSION['usd']) || !isset($_SESSION['eur'])){
			// require_once($_SERVER['DOCUMENT_ROOT']."/parser/html_dom/simple_html_dom.php");
			// $html = file_get_html('http://cbr.ru/');
			// print_r($html);
			// $currencyValue = strip_tags($html->find('#widget_exchange tr .weak', 0)->plaintext);
			// $currencyValue = (float)trim(str_replace(array("руб.","&nbsp;", ","), array("","","."), $currencyValue));
			$_SESSION['usd'] = "65.6686";
			// // $currencyValue = strip_tags($html->find('#widget_exchange tr .weak', 1)->plaintext);
			// // $currencyValue = (float)trim(str_replace(array("руб.","&nbsp;", ","), array("","","."), $currencyValue));
			$_SESSION['eur'] = "74.7703";
		}
		$currency_price = get_field("currency_price", $post_ID);
		$currency_discount_price = get_field("currency_discount_price", $post_ID);
	    $currency = get_field("currency", $post_ID);
	    if(!empty($currency_price) && !empty($currency)){
	    	update_post_meta($post_ID, '_regular_price', ceil($currency_price*$_SESSION[$currency]));
	    	update_post_meta($post_ID, '_price', ceil($currency_price*$_SESSION[$currency]));
	    }
	    if(!empty($currency_discount_price) && !empty($currency)){
	    	update_post_meta($post_ID, '_sale_price', ceil($currency_discount_price*$_SESSION[$currency]));
	    }
	}

}

//Получить максимальную и минимальную цену для фильтра
function get_filter_prices() {
	global $wpdb, $wp_the_query;
	$currentCat = get_queried_object();
	$args       = $wp_the_query->query_vars;
	$tax_query  = isset( $args['tax_query'] ) ? $args['tax_query'] : array();
	$meta_query = isset( $args['meta_query'] ) ? $args['meta_query'] : array();

	if ( ! is_post_type_archive( 'product' ) && ! empty( $args['taxonomy'] ) && ! empty( $args['term'] ) ) {
		$tax_query[] = array(
			'taxonomy' => $args['taxonomy'],
			'terms'    => array( $args['term'] ),
			'field'    => 'slug',
		);
	}

	foreach ( $meta_query + $tax_query as $key => $query ) {
		if ( ! empty( $query['price_filter'] ) || ! empty( $query['rating_filter'] ) ) {
			unset( $meta_query[ $key ] );
		}
	}

	$meta_query = new WP_Meta_Query( $meta_query );
	$tax_query  = new WP_Tax_Query( $tax_query );

	$meta_query_sql = $meta_query->get_sql( 'post', $wpdb->posts, 'ID' );
	$tax_query_sql  = $tax_query->get_sql( $wpdb->posts, 'ID' );

	$sql  = "SELECT min( FLOOR( price_meta.meta_value ) ) as min_price, max( CEILING( price_meta.meta_value ) ) as max_price FROM {$wpdb->posts} ";
	$sql .= " LEFT JOIN {$wpdb->postmeta} as price_meta ON {$wpdb->posts}.ID = price_meta.post_id
		LEFT JOIN wp_term_relationships ON (wp_posts.ID = wp_term_relationships.object_id)
	";
	$sql .= " 	WHERE {$wpdb->posts}.post_type IN ('" . implode( "','", array_map( 'esc_sql', apply_filters( 'woocommerce_price_filter_post_type', array( 'product' ) ) ) ) . "')
				AND {$wpdb->posts}.post_status = 'publish'
				AND price_meta.meta_key IN ('" . implode( "','", array_map( 'esc_sql', apply_filters( 'woocommerce_price_filter_meta_keys', array( '_price' ) ) ) ) . "')
				AND price_meta.meta_value > '' ";
	$sql .= " AND wp_term_relationships.term_taxonomy_id IN (".$currentCat->term_id.") ";

	if ( $search = WC_Query::get_main_search_query_sql() ) {
		$sql .= ' AND ' . $search;
	}

	return $wpdb->get_row( $sql );
}


//Вспомогательные функции для фильтров по аттрибутам
//Получить url для фильтров аттрибутов
function get_page_base_url() {
	if ( defined( 'SHOP_IS_ON_FRONT' ) ) {
		$link = home_url();
	} elseif ( is_post_type_archive( 'product' ) || is_page( wc_get_page_id( 'shop' ) ) ) {
		$link = get_post_type_archive_link( 'product' );
	} elseif ( is_product_category() ) {
		$link = get_term_link( get_query_var( 'product_cat' ), 'product_cat' );
	} elseif ( is_product_tag() ) {
		$link = get_term_link( get_query_var( 'product_tag' ), 'product_tag' );
	} else {
		$queried_object = get_queried_object();
		$link = get_term_link( $queried_object->slug, $queried_object->taxonomy );
	}

	// Min/Max
	if ( isset( $_GET['min_price'] ) ) {
		$link = add_query_arg( 'min_price', wc_clean( $_GET['min_price'] ), $link );
	}

	if ( isset( $_GET['max_price'] ) ) {
		$link = add_query_arg( 'max_price', wc_clean( $_GET['max_price'] ), $link );
	}

	// Order by
	if ( isset( $_GET['orderby'] ) ) {
		$link = add_query_arg( 'orderby', wc_clean( $_GET['orderby'] ), $link );
	}

	/**
	 * Search Arg.
	 * To support quote characters, first they are decoded from &quot; entities, then URL encoded.
	 */
	if ( get_search_query() ) {
		$link = add_query_arg( 's', rawurlencode( htmlspecialchars_decode( get_search_query( false ) ) ), $link );
	}

	// Post Type Arg
	if ( isset( $_GET['post_type'] ) ) {
		$link = add_query_arg( 'post_type', wc_clean( $_GET['post_type'] ), $link );
	}

	// Min Rating Arg
	if ( isset( $_GET['rating_filter'] ) ) {
		$link = add_query_arg( 'rating_filter', wc_clean( $_GET['rating_filter'] ), $link );
	}

	// All current filters
	if ( $_chosen_attributes = WC_Query::get_layered_nav_chosen_attributes() ) {
		foreach ( $_chosen_attributes as $name => $data ) {
			$filter_name = sanitize_title( str_replace( 'pa_', '', $name ) );
			if ( ! empty( $data['terms'] ) ) {
				$link = add_query_arg( 'filter_' . $filter_name, implode( ',', $data['terms'] ), $link );
			}
			if ( 'or' == $data['query_type'] ) {
				$link = add_query_arg( 'query_type_' . $filter_name, 'or', $link );
			}
		}
	}

	return $link;
}

function get_current_taxonomy() {
	return is_tax() ? get_queried_object()->taxonomy : '';
}

function get_current_term_id() {
	return absint( is_tax() ? get_queried_object()->term_id : 0 );
}

function get_current_term_slug() {
	return absint( is_tax() ? get_queried_object()->slug : 0 );
}

function get_filtered_term_product_counts( $term_ids, $taxonomy, $query_type ) {
	global $wpdb;
	$currentCat = get_queried_object();
	$tax_query  = WC_Query::get_main_tax_query();
	$meta_query = WC_Query::get_main_meta_query();

	if ( 'or' === $query_type ) {
		foreach ( $tax_query as $key => $query ) {
			if ( is_array( $query ) && $taxonomy === $query['taxonomy'] ) {
				unset( $tax_query[ $key ] );
			}
		}
	}

	$meta_query      = new WP_Meta_Query( $meta_query );
	$tax_query       = new WP_Tax_Query( $tax_query );
	$meta_query_sql  = $meta_query->get_sql( 'post', $wpdb->posts, 'ID' );
	$tax_query_sql   = $tax_query->get_sql( $wpdb->posts, 'ID' );

	// Generate query
	$query           = array();
	$query['select'] = "SELECT COUNT( DISTINCT {$wpdb->posts}.ID ) as term_count, terms.term_id as term_count_id";
	$query['from']   = "FROM {$wpdb->posts}";
	$query['join']   = "
		INNER JOIN {$wpdb->term_relationships} AS term_relationships ON {$wpdb->posts}.ID = term_relationships.object_id
		INNER JOIN {$wpdb->term_taxonomy} AS term_taxonomy USING( term_taxonomy_id )
		INNER JOIN {$wpdb->terms} AS terms USING( term_id )
		LEFT JOIN wp_term_relationships ON (wp_posts.ID = wp_term_relationships.object_id)
		";

	$query['where']   = "
		WHERE {$wpdb->posts}.post_type IN ( 'product' )
		AND {$wpdb->posts}.post_status = 'publish'
		AND wp_term_relationships.term_taxonomy_id IN (".$currentCat->term_id.")
		AND terms.term_id IN (" . implode( ',', array_map( 'absint', $term_ids ) ) . ")
	";


	// echo "<pre>";
	// print_r($tax_query_sql);
	// echo "</pre>";

	if ( $search = WC_Query::get_main_search_query_sql() ) {
		$query['where'] .= ' AND ' . $search;
	}

	$query['group_by'] = "GROUP BY terms.term_id";
	$query             = apply_filters( 'woocommerce_get_filtered_term_product_counts_query', $query );
	$query             = implode( ' ', $query );

	// We have a query - let's see if cached results of this query already exist.
	$query_hash    = md5( $query );
	$cached_counts = (array) get_transient( 'wc_layered_nav_counts' );

	if ( ! isset( $cached_counts[ $query_hash ] ) ) {
		$results                      = $wpdb->get_results( $query, ARRAY_A );
		$counts                       = array_map( 'absint', wp_list_pluck( $results, 'term_count', 'term_count_id' ) );
		$cached_counts[ $query_hash ] = $counts;
		set_transient( 'wc_layered_nav_counts', $cached_counts, DAY_IN_SECONDS );
	}

	return array_map( 'absint', (array) $cached_counts[ $query_hash ] );
}

function layered_nav_list( $terms, $taxonomy, $query_type, $label ) {
	// List display
	if ( ! is_post_type_archive( 'product' ) && ! is_tax( get_object_taxonomies( 'product' ) ) ) {
		return;
	}

	if ( 0 === sizeof( $terms ) ) {
		return;
	}

	$term_counts  = get_filtered_term_product_counts( wp_list_pluck( $terms, 'term_id' ), $taxonomy, $query_type );
	if (count($term_counts) == 0){
		return;
	}



	echo '<div class="sidebar-filter-block">';

	echo "<h3>".$label."</h3>";

	$_chosen_attributes = WC_Query::get_layered_nav_chosen_attributes();
	$found              = false;

	foreach ( $terms as $term ) {
		$current_values = isset( $_chosen_attributes[ $taxonomy ]['terms'] ) ? $_chosen_attributes[ $taxonomy ]['terms'] : array();
		$option_is_set  = in_array( $term->slug, $current_values );
		$count          = isset( $term_counts[ $term->term_id ] ) ? $term_counts[ $term->term_id ] : 0;

		// Skip the term for the current archive
		if ( get_current_term_id() === $term->term_id ) {
			continue;
		}

		// Only show options with count > 0
		if ( 0 < $count ) {
			$found = true;
		} elseif ( 0 === $count && ! $option_is_set ) {
			continue;
		}

		$filter_name    = 'filter_' . sanitize_title( str_replace( 'pa_', '', $taxonomy ) );
		$current_filter = isset( $_GET[ $filter_name ] ) ? explode( ',', wc_clean( $_GET[ $filter_name ] ) ) : array();
		$current_filter = array_map( 'sanitize_title', $current_filter );

		if ( ! in_array( $term->slug, $current_filter ) ) {
			$current_filter[] = $term->slug;
		}

		$link = get_page_base_url( $taxonomy );

		// Add current filters to URL.
		foreach ( $current_filter as $key => $value ) {
			// Exclude query arg for current term archive term
			if ( $value === get_current_term_slug() ) {
				unset( $current_filter[ $key ] );
			}

			// Exclude self so filter can be unset on click.
			if ( $option_is_set && $value === $term->slug ) {
				unset( $current_filter[ $key ] );
			}
		}

		if ( ! empty( $current_filter ) ) {
			$link = add_query_arg( $filter_name, implode( ',', $current_filter ), $link );

			// Add Query type Arg to URL
			if ( 'or' === $query_type && ! ( 1 === sizeof( $current_filter ) && $option_is_set ) ) {
				$link = add_query_arg( 'query_type_' . sanitize_title( str_replace( 'pa_', '', $taxonomy ) ), 'or', $link );
			}
		}

		if ( $count > 0 || $option_is_set ) {
			$link      = esc_url( apply_filters( 'woocommerce_layered_nav_link', $link, $term, $taxonomy ) );
			$term_html = '<input type="checkbox" '.( $option_is_set ? 'checked' : '' ).' name="'.$filter_name.'" data-term-id="'.$term->term_id.'" data-value="'.$term->slug.'"><span>' . esc_html( $term->name )."</span>";
		} else {

		}
		echo '<label>';
		echo $term_html;
		echo '</label>';
	}

	echo '</div>';
}



// Увеличить количество символов в создании атрибутов товаров
function valid_attribute_name( $attribute_name ) {
    if ( strlen( $attribute_name ) >= 128 ) {
            return new WP_Error( 'error', sprintf( __( 'Slug "%s" is too long (128 characters max). Shorten it, please.', 'woocommerce' ), sanitize_title( $attribute_name ) ) );
    } elseif ( wc_check_if_attribute_name_is_reserved( $attribute_name ) ) {
            return new WP_Error( 'error', sprintf( __( 'Slug "%s" is not allowed because it is a reserved term. Change it, please.', 'woocommerce' ), sanitize_title( $attribute_name ) ) );
    }

    return true;
}


if(isset($_REQUEST['type'])){
	if($_REQUEST['type'] == "events"){
		$events = get_posts(array(
			"post_type" => $_REQUEST['type'],
			"posts_per_page" => 9,
			"paged" => $_REQUEST['page']
		));
		if(is_array($events)){
			foreach($events as $event){
				$post_object = get_post( $event->ID );
	        	setup_postdata( $GLOBALS['post'] =& $post_object );
				get_template_part("loop/event");
				wp_reset_postdata();
			}
		}
		exit;
	}
	function updateCartItem(){
		if($_REQUEST['type'] == "updateCartItem"){
			$cart = WC()->instance()->cart;
			$cart->set_quantity( $_REQUEST['key'], $_REQUEST['q'] );
		}
	}

	add_action("pre_get_posts", "updateCartItem");
}



function setup() {
	add_theme_support( 'automatic-feed-links' );

	add_theme_support( 'title-tag' );

	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 825, 510, true );

	add_image_size( "product_cat", 99999, 140 );
	add_image_size( "product_itm", 99999, 260 );

	add_image_size( "otr", 260, 260, true );
	add_image_size( "developments", 450, 999999 );

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary' => "Основное Меню",
		'footer' => "Футер",
		'personal' => "Personal"
	) );

	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );

	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link', 'gallery', 'status', 'audio', 'chat'
	) );
	add_theme_support( 'customize-selective-refresh-widgets' );
	add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'setup' );





$_SESSION['terms_in_count'] = 0;
// Присваиваем значение вложенных категорий товаров
// Вспомогательная переменная


function wpb_adding_scripts() {

	global $template;
	$templateArr = explode("/",$template);
	$templateName = end($templateArr);
	if(is_post_type_archive("product") || is_product_category()){
		if(isset(get_queried_object()->term_id)){
			$catID = get_queried_object()->term_id;
			$args = array(
				'taxonomy' => 'product_cat',
				'hide_empty' => false,
				'parent' => $catID,
			);
			$terms_in = get_terms( $args );
			$_SESSION['terms_in_count'] = count($terms_in);
		}
	}



	wp_register_script('libs', "/wp-content/themes/voxlink/js/libs.js" , array(), '1.1', true);
	wp_enqueue_script('libs');

	wp_register_script('imask', "/wp-content/themes/voxlink/libs/inputmask/dist/min/jquery.inputmask.bundle.min.js" , array(), '1.1', true);
	wp_enqueue_script('imask');

	wp_register_script('cookie', "/wp-content/themes/voxlink/libs/js-cookie/src/js.cookie.js" , array(), '1.0', true);
	wp_enqueue_script('cookie');


	//photo-swipe
	wp_register_style('fancybox', "/wp-content/themes/voxlink/libs/fancybox/dist/jquery.fancybox.min.css","",getdate()[0]);
	wp_enqueue_style('fancybox');
	wp_register_script('fancybox', "/wp-content/themes/voxlink/libs/fancybox/dist/jquery.fancybox.min.js" , array(), '1.0', true);
	wp_enqueue_script('fancybox');



	if(is_post_type_archive("events")){
		wp_register_script('masonry', "/wp-content/themes/voxlink/libs/masonry/masonry.min.js" , array(), '1.1', true);
		wp_enqueue_script('masonry');
	}

	wp_register_script('myvalidator', "/wp-content/themes/voxlink/js/validator.js" , array(), '1.1', true);
	wp_enqueue_script('myvalidator');

	if(is_front_page() || get_the_id() == 2222 || (is_product_category() && $_SESSION['terms_in_count'] == 0) || $templateName == "page-voice-greeting.php"){
		wp_register_script('nouislider', "/wp-content/themes/voxlink/libs/nouislider/nouislider.min.js" , array(), '1.1', true);
		wp_enqueue_script('nouislider');
		wp_register_style('nouislider', "/wp-content/themes/voxlink/libs/nouislider/nouislider.css","",getdate()[0]);
		wp_enqueue_style('nouislider');
	}

	if(is_product_category() && $_SESSION['terms_in_count'] == 0){
		// wp_register_script('rivets', "/wp-content/themes/voxlink/libs/rivets/dist/rivets.bundled.min.js" , array('jquery'), '1.1', true);
		// wp_enqueue_script('rivets');

		wp_register_script('productFilters', "/wp-content/themes/voxlink/js/productFilters.js" , array(), '1.1', true);
		wp_enqueue_script('productFilters');

		wp_register_style('productFilter', "/wp-content/themes/voxlink/css/productFilter.css","",getdate()[0]);
		wp_enqueue_style('productFilter');

	}

	if(is_front_page() || get_the_id() == 7699 || get_the_id() == 2234 || get_the_id() == 2623 || $templateName == "page.php" || is_post_type_archive("kb") || is_post_type_archive("product") || is_post_type_archive("solutions") || is_product_category() || is_post_type_archive("post") || is_category() || is_tax( 'kb_cat' ) || is_singular("kb") || is_singular("solutions") || $templateName=="about.php" || $templateName=="page-clients.php" || $templateName=="pisma.php" || $templateName=="team.php" || $templateName=="page-develop.php" || is_tag() || is_category() || is_single() || $templateName=="page-zaglushka.php" || is_search() || is_archive() || $templateName == "page-webinars.php"){
		wp_register_script('lightslider', "/wp-content/themes/voxlink/libs/lightslider/dist/js/lightslider.min.js" , array(), '1.1', true);
		wp_enqueue_script('lightslider');

		wp_register_style('lightslider', "/wp-content/themes/voxlink/libs/lightslider/dist/css/lightslider.css","",getdate()[0]);
		wp_enqueue_style('lightslider');
	}

	if(is_front_page() || get_the_id() == 2228 || get_the_id() == 2222 || get_the_id() == 2634 || is_post_type_archive("product") || is_product_category() || $templateName == "page-compare.php" || $templateName=="page-create-call-center1.php" || $templateName == "single-solution-mbiz.php" || is_404() || $templateName=="page-complex-implementation.php" || $templateName=="page-ochered.php" || $templateName=="page-callmetrix.php" || $templateName=="page-telephone-connection.php" || $templateName=="page-1c-crm.php" || $templateName=="page-bitrix24.php" || $templateName=="page-vnedrenie.php" || $templateName=="page-amocrm.php" || $templateName == "page-supervisor.php" || $templateName == "page-shemy.php" || $templateName == "single-solution-smbiz.php" || $templateName == "single-solution-bbiz.php" || $templateName=="page-zaglushka.php" || is_post_type_archive("solutions") || $templateName == 'page-proektirovanie.php' || $templateName == 'pahe-tech-support.php' || $templateName == "page-cc-komponenty.php" || $templateName == "page-mikrotik-courses.php"  || $templateName == "page-fmc.php" || $templateName == "page-voxdistro.php" || $templateName == "page-asteriskconf.php" || $templateName=="page-stat.php" || $templateName=="page-callforce.php"){
		wp_register_script('owlcarousel', "/wp-content/themes/voxlink/libs/owl.carousel/dist/owl.carousel.min.js" , array(), '1.1', true);
		wp_enqueue_script('owlcarousel');

		wp_register_style('owlcarousel', "/wp-content/themes/voxlink/libs/owl.carousel/dist/assets/owl.carousel.css","",getdate()[0]);
		wp_enqueue_style('owlcarousel');
	}



	wp_register_script('mycommon', "/wp-content/themes/voxlink/js/common.js" , array(), getdate()[0], true);
	wp_enqueue_script('mycommon');


	wp_register_style('myheader', "/wp-content/themes/voxlink/css/header.css","",getdate()[0]);
	wp_enqueue_style('myheader');

	wp_register_style('voxlink-common', "/wp-content/themes/voxlink/css/common.css","",getdate()[0]);
	wp_enqueue_style('voxlink-common');


	if(is_search()){
		wp_register_style('search-page', "/wp-content/themes/voxlink/css/search-page.css","",getdate()[0]);
		wp_enqueue_style('search-page');
	}

	if(is_front_page()){
		wp_register_style('selectize', "/wp-content/themes/voxlink/libs/selectize/dist/css/selectize.css","",getdate()[0]);
		wp_enqueue_style('selectize');
		wp_register_script('selectize', "/wp-content/themes/voxlink/libs/selectize/dist/js/standalone/selectize.min.js" , array(), getdate()[0], true);
		wp_enqueue_script('selectize');

		wp_register_style('home', "/wp-content/themes/voxlink/css/home.css","",getdate()[0]);
		wp_enqueue_style('home');

		wp_register_script('home', "/wp-content/themes/voxlink/js/home.js" , array(), getdate()[0], true);
		wp_enqueue_script('home');

		wp_register_script('solutionsSlider', "/wp-content/themes/voxlink/js/solutionsSlider.js" , array(), getdate()[0], true);
		wp_enqueue_script('solutionsSlider');

		wp_register_style('solutionsSlider', "/wp-content/themes/voxlink/css/solutionsSlider.css","",getdate()[0]);
		wp_enqueue_style('solutionsSlider');
	}


	if(is_post_type_archive("product") || is_product_category() || $templateName=="page-zaglushka.php"){
		wp_register_style('productArchive', "/wp-content/themes/voxlink/css/productArchive.css","",getdate()[0]);
		wp_enqueue_style('productArchive');

		wp_register_script('productArchive', "/wp-content/themes/voxlink/js/productArchive.js" , array(), getdate()[0], true);
		wp_enqueue_script('productArchive');

		wp_register_style('kb-archive', "/wp-content/themes/voxlink/css/kb-archive.css","",getdate()[0]);
		wp_enqueue_style('kb-archive');
	}


	if(is_post_type_archive("solutions")){
		wp_register_style('solutionsArchive', "/wp-content/themes/voxlink/css/solutionsArchive.css","",getdate()[0]);
		wp_enqueue_style('solutionsArchive');

		wp_register_style('solutionsSlider', "/wp-content/themes/voxlink/css/solutionsSlider.css","",getdate()[0]);
		wp_enqueue_style('solutionsSlider');

		wp_register_script('solutionsArchive', "/wp-content/themes/voxlink/js/solutionsArchive.js" , array(), getdate()[0], true);
		wp_enqueue_script('solutionsArchive');

		wp_register_script('solutionsSlider', "/wp-content/themes/voxlink/js/solutionsSlider.js" , array(), getdate()[0], true);
		wp_enqueue_script('solutionsSlider');
	}
	if(is_singular("solutions")){
		wp_register_script('solutionsArchive', "/wp-content/themes/voxlink/js/solutionsArchive.js" , array(), getdate()[0], true);
		wp_enqueue_script('solutionsArchive');
	}

	if(is_post_type_archive("product") || is_tax( 'kb_cat' )){
		wp_register_script('productsCatSlider', "/wp-content/themes/voxlink/js/productsCatSlider.js" , array(), getdate()[0], true);
		wp_enqueue_script('productsCatSlider');

		wp_register_style('productsCatSlider', "/wp-content/themes/voxlink/css/productsCatSlider.css","",getdate()[0]);
		wp_enqueue_style('productsCatSlider');
	}


	if(is_singular("product")){
		wp_register_script('singleProduct', "/wp-content/themes/voxlink/js/singleProduct.js" , array(), getdate()[0], true);
		wp_enqueue_script('singleProduct');

		wp_register_style('singleProduct', "/wp-content/themes/voxlink/css/singleProduct.css","",getdate()[0]);
		wp_enqueue_style('singleProduct');
	}


	if(is_post_type_archive("kb") || is_archive()){
		wp_register_style('kb-archive', "/wp-content/themes/voxlink/css/kb-archive.css","",getdate()[0]);
		wp_enqueue_style('kb-archive');
	}


	if($templateName == "page.php" || is_post_type_archive("product") || is_post_type_archive("kb") || is_product_category() || is_post_type_archive("post") || is_category() || is_tax( 'kb_cat' ) || is_singular("kb") || is_singular("solutions") || $templateName=="about.php" || $templateName=="page-clients.php" || $templateName=="pisma.php" || $templateName=="team.php"  || $templateName=="page-develop.php" || is_tag() || is_category() || is_single() || $templateName=="page-zaglushka.php" || is_search() || is_archive() || $templateName == "page-webinars.php"){
		wp_register_script('sidebar', "/wp-content/themes/voxlink/js/sidebar.js" , array(), getdate()[0], true);
		wp_enqueue_script('sidebar');

		wp_register_style('sidebar', "/wp-content/themes/voxlink/css/sidebar.css","",getdate()[0]);
		wp_enqueue_style('sidebar');
	}



	wp_register_style('mymain', "/wp-content/themes/voxlink/css/main.css","",getdate()[0]);
	wp_enqueue_style('mymain');
	wp_register_style('nnew', "/wp-content/themes/voxlink/css/new.css","",getdate()[0]);
	wp_enqueue_style('nnew');
	wp_register_style('newmedia', "/wp-content/themes/voxlink/css/newmedia.css","",getdate()[0]);
	wp_enqueue_style('newmedia');

	wp_register_style('danil', "/wp-content/themes/voxlink/css/danil.css","",getdate()[0]);
	wp_enqueue_style('danil');

	// wp_register_style('zashitaAsterisk', "/wp-content/themes/voxlink/css/zashitaAsterisk.css","",getdate()[0]);
	// wp_enqueue_style('zashitaAsterisk');



	if(get_the_id() == 2623){ // Предпроектный аудит
		wp_register_style('paudit', "/wp-content/themes/voxlink/css/paudit.css","",getdate()[0]);
		wp_enqueue_style('paudit');

		wp_register_style('whyus', "/wp-content/themes/voxlink/css/whyus.css","",getdate()[0]);
		wp_enqueue_style('whyus');

		wp_register_script('paudit', "/wp-content/themes/voxlink/js/paudit.js" , array(), '1.1', true);
		wp_enqueue_script('paudit');

		wp_register_style('q2', "/wp-content/themes/voxlink/css/q2.css","",getdate()[0]);
		wp_enqueue_style('q2');
	}

	if(get_the_id() == 2232){ // Аудит IPATC
		wp_register_style('audit', "/wp-content/themes/voxlink/css/audit.css","",getdate()[0]);
		wp_enqueue_style('audit');

		wp_register_style('whyus', "/wp-content/themes/voxlink/css/whyus.css","",getdate()[0]);
		wp_enqueue_style('whyus');

		wp_register_style('q2', "/wp-content/themes/voxlink/css/q2.css","",getdate()[0]);
		wp_enqueue_style('q2');

		wp_register_script('audit', "/wp-content/themes/voxlink/js/audit.js" , array(), '1.1', true);
		wp_enqueue_script('audit');
	}

	if(get_the_id() == 2234){ // Монтаж СКС
		wp_register_style('montaj', "/wp-content/themes/voxlink/css/montaj.css","",getdate()[0]);
		wp_enqueue_style('montaj');

		wp_register_style('q2', "/wp-content/themes/voxlink/css/q2.css","",getdate()[0]);
		wp_enqueue_style('q2');

		wp_register_script('montaj', "/wp-content/themes/voxlink/js/montaj.js" , array(), '1.1', true);
		wp_enqueue_script('montaj');
	}


	if(get_the_id() == 7699){//Предиктивный обзвон
		wp_register_style('obzvon', "/wp-content/themes/voxlink/css/obzvon.css","",getdate()[0]);
		wp_enqueue_style('obzvon');

		wp_register_style('q2', "/wp-content/themes/voxlink/css/q2.css","",getdate()[0]);
		wp_enqueue_style('q2');

		wp_register_script('obzvon', "/wp-content/themes/voxlink/js/obzvon.js" , array(), '1.1', true);
		wp_enqueue_script('obzvon');
	}

	if(get_the_id() == 14805){ // Qatrun

		wp_register_style('qatrun', "/wp-content/themes/voxlink/css/qatrun.css","",getdate()[0]);
		wp_enqueue_style('qatrun');

		wp_register_script('qatrun', "/wp-content/themes/voxlink/js/qatrun.js" , array(), '1.1', true);
		wp_enqueue_script('qatrun');
	}


	if(get_the_id() == 2228){ // Защита Астерикс
		wp_register_style('quard', "/wp-content/themes/voxlink/css/quard.css","",getdate()[0]);
		wp_enqueue_style('quard');

		wp_register_style('q2', "/wp-content/themes/voxlink/css/q2.css","",getdate()[0]);
		wp_enqueue_style('q2');

		wp_register_script('guard', "/wp-content/themes/voxlink/js/guard.js" , array(), '1.1', true);
		wp_enqueue_script('guard');
	}

	if(get_the_id() == 2222){ // Запись IVR
		wp_register_style('ivr', "/wp-content/themes/voxlink/css/ivr.css","",getdate()[0]);
		wp_enqueue_style('ivr');

		wp_register_style('voice-form', "/wp-content/themes/voxlink/css/voice-form.css","",getdate()[0]);
		wp_enqueue_style('voice-form');

		wp_register_script('voice-form', "/wp-content/themes/voxlink/js/voice-form.js" , array(), '1.1', true);
		wp_enqueue_script('voice-form');

		wp_register_style('q2', "/wp-content/themes/voxlink/css/q2.css","",getdate()[0]);
		wp_enqueue_style('q2');

		wp_register_script('ivr', "/wp-content/themes/voxlink/js/ivr.js" , array(), '1.1', true);
		wp_enqueue_script('ivr');
	}


	if(get_the_id() == 2634){ //Рабочее место оператора кол-центра
		wp_register_style('rabmcallc', "/wp-content/themes/voxlink/css/rabmcallc.css","",getdate()[0]);
		wp_enqueue_style('rabmcallc');

		wp_register_script('rabmcallc', "/wp-content/themes/voxlink/js/rabmcallc.js" , array(), '1.1', true);
		wp_enqueue_script('rabmcallc');

		wp_register_style('q2', "/wp-content/themes/voxlink/css/q2.css","",getdate()[0]);
		wp_enqueue_style('q2');
	}
	if(get_the_id() == 15672){ //Speech Analytics
        wp_register_style('speech', "/wp-content/themes/voxlink/css/speech.min.css","",getdate()[0]);
		wp_enqueue_style('speech');
		
		wp_register_style('q2', "/wp-content/themes/voxlink/css/q2.css","",getdate()[0]);
		wp_enqueue_style('q2');

		wp_register_script('lightslider', "/wp-content/themes/voxlink/libs/lightslider/dist/js/lightslider.min.js","",getdate()[0]);
		wp_enqueue_script('lightslider');

        wp_register_script('speech', "/wp-content/themes/voxlink/js/speech.js" , array(), '1.1', true);
        wp_enqueue_script('speech');

  }



	if($templateName == "page-create-call-center1.php"){ // Внедренеие кол-центра
		wp_register_style('vncall', "/wp-content/themes/voxlink/css/vncall.css","",getdate()[0]);
		wp_enqueue_style('vncall');

		wp_register_script('vncall', "/wp-content/themes/voxlink/js/vncall.js" , array(), '1.1', true);
		wp_enqueue_script('vncall');

		wp_register_style('q2', "/wp-content/themes/voxlink/css/q2.css","",getdate()[0]);
		wp_enqueue_style('q2');
	}

	if($templateName == "page-supervisor.php"){
		wp_register_style('supervisor', "/wp-content/themes/voxlink/css/supervisor.css","",getdate()[0]);
		wp_enqueue_style('supervisor');

		wp_register_script('supervisor', "/wp-content/themes/voxlink/js/supervisor.js" , array(), '1.1', true);
		wp_enqueue_script('supervisor');

		wp_register_style('q2', "/wp-content/themes/voxlink/css/q2.css","",getdate()[0]);
		wp_enqueue_style('q2');
	}

	if(get_the_id() == 2276 || get_the_id() == 2254 || get_the_id() == 2270){ // Панель оператора
		wp_register_style('operatorpanel', "/wp-content/themes/voxlink/css/operatorpanel.css","",getdate()[0]);
		wp_enqueue_style('operatorpanel');

		wp_register_style('q2', "/wp-content/themes/voxlink/css/q2.css","",getdate()[0]);
		wp_enqueue_style('q2');
	}


	if(get_the_id() == 2266){
		wp_register_style('page-ochered', "/wp-content/themes/voxlink/css/page-ochered.css","",getdate()[0]);
		wp_enqueue_style('page-ochered');

		wp_register_style('q2', "/wp-content/themes/voxlink/css/q2.css","",getdate()[0]);
		wp_enqueue_style('q2');

		wp_register_script('ochered', "/wp-content/themes/voxlink/js/ochered.js" , array(), '1.1', true);
		wp_enqueue_script('ochered');
	}


	if(get_the_id() == 2262){
		wp_register_style('proslushka', "/wp-content/themes/voxlink/css/proslushka.css","",getdate()[0]);
		wp_enqueue_style('proslushka');

		wp_register_style('q2', "/wp-content/themes/voxlink/css/q2.css","",getdate()[0]);
		wp_enqueue_style('q2');
	}


	if(is_checkout()){
		wp_register_style('checkout', "/wp-content/themes/voxlink/css/checkout.css","",getdate()[0]);
		wp_enqueue_style('checkout');

		wp_register_script('checkout', "/wp-content/themes/voxlink/js/checkout.js" , array(), '1.1', true);
		wp_enqueue_script('checkout');
	}


	if($templateName == "page-connect-offices.php"){
		wp_register_style('connect-offices', "/wp-content/themes/voxlink/css/connect-offices.css","",getdate()[0]);
		wp_enqueue_style('connect-offices');

		wp_register_style('q2', "/wp-content/themes/voxlink/css/q2.css","",getdate()[0]);
		wp_enqueue_style('q2');

	}


	if($templateName == "thankyou.php"){
		wp_register_style('thankyou', "/wp-content/themes/voxlink/css/thankyou.css","",getdate()[0]);
		wp_enqueue_style('thankyou');

		wp_register_style('q2', "/wp-content/themes/voxlink/css/q2.css","",getdate()[0]);
		wp_enqueue_style('q2');

	}

	if($templateName == "page-integration.php"){
		wp_register_style('integration', "/wp-content/themes/voxlink/css/integration.css","",getdate()[0]);
		wp_enqueue_style('integration');

		wp_register_style('q2', "/wp-content/themes/voxlink/css/q2.css","",getdate()[0]);
		wp_enqueue_style('q2');

	}

	if($templateName == "page-integration-crm.php"){
		wp_register_style('integration-crm', "/wp-content/themes/voxlink/css/integration-crm.css","",getdate()[0]);
		wp_enqueue_style('integration-crm');

		wp_register_style('q2', "/wp-content/themes/voxlink/css/q2.css","",getdate()[0]);
		wp_enqueue_style('q2');

	}


	if($templateName == "page-compare.php"){
		wp_register_style('compare', "/wp-content/themes/voxlink/css/compare.css","",getdate()[0]);
		wp_enqueue_style('compare');

		wp_register_style('q2', "/wp-content/themes/voxlink/css/q2.css","",getdate()[0]);
		wp_enqueue_style('q2');

		wp_register_script('compare', "/wp-content/themes/voxlink/js/compare.js" , array(), '1.1', true);
		wp_enqueue_script('compare');
	}

	if($templateName == "page-bookmarks.php"){
		wp_register_style('bookmarks', "/wp-content/themes/voxlink/css/bookmarks.css","",getdate()[0]);
		wp_enqueue_style('bookmarks');

		wp_register_style('q2', "/wp-content/themes/voxlink/css/q2.css","",getdate()[0]);
		wp_enqueue_style('q2');

		wp_register_script('bookmarks', "/wp-content/themes/voxlink/js/bookmarks.js" , array(), '1.1', true);
		wp_enqueue_script('bookmarks');

		wp_register_script('productFilters', "/wp-content/themes/voxlink/js/productFilters.js" , array(), '1.1', true);
		wp_enqueue_script('productFilters');
	}

	if($templateName == "page-recording-call.php"){
		wp_register_style('recording-call', "/wp-content/themes/voxlink/css/recording-call.css","",getdate()[0]);
		wp_enqueue_style('recording-call');
		wp_register_style('q2', "/wp-content/themes/voxlink/css/q2.css","",getdate()[0]);
		wp_enqueue_style('q2');
	}

	if($templateName == "page-voice-greeting.php"){
		wp_register_style('voice-greeting', "/wp-content/themes/voxlink/css/voice-greeting.css","",getdate()[0]);
		wp_enqueue_style('voice-greeting');
		wp_register_style('q2', "/wp-content/themes/voxlink/css/q2.css","",getdate()[0]);
		wp_enqueue_style('q2');
		wp_register_script('voice-greeting', "/wp-content/themes/voxlink/js/voice-greeting.js" , array(), '1.1', true);
		wp_enqueue_script('voice-greeting');

		wp_register_style('voice-form', "/wp-content/themes/voxlink/css/voice-form.css","",getdate()[0]);
		wp_enqueue_style('voice-form');

		wp_register_script('voice-form', "/wp-content/themes/voxlink/js/voice-form.js" , array(), '1.1', true);
		wp_enqueue_script('voice-form');
	}

	if($templateName == "page-save-number.php"){
		wp_register_style('save-number', "/wp-content/themes/voxlink/css/save-number.css","",getdate()[0]);
		wp_enqueue_style('save-number');
		wp_register_style('q2', "/wp-content/themes/voxlink/css/q2.css","",getdate()[0]);
		wp_enqueue_style('q2');
	}

	if($templateName == "page-save-number1.php"){
		wp_register_style('save-number', "/wp-content/themes/voxlink/css/save-number1.css","",getdate()[0]);
		wp_enqueue_style('save-number');
		wp_register_style('q2', "/wp-content/themes/voxlink/css/q2.css","",getdate()[0]);
		wp_enqueue_style('q2');
	}

	if($templateName == "page-conference.php"){
		wp_register_style('conference', "/wp-content/themes/voxlink/css/conference.css","",getdate()[0]);
		wp_enqueue_style('conference');
		wp_register_style('q2', "/wp-content/themes/voxlink/css/q2.css","",getdate()[0]);
		wp_enqueue_style('q2');
	}

	if($templateName == "page-fax.php"){
		wp_register_style('fax', "/wp-content/themes/voxlink/css/fax.css","",getdate()[0]);
		wp_enqueue_style('fax');
		wp_register_style('q2', "/wp-content/themes/voxlink/css/q2.css","",getdate()[0]);
		wp_enqueue_style('q2');
	}


	if($templateName == "page-voice-mail.php"){
		wp_register_style('voice-mail', "/wp-content/themes/voxlink/css/voice-mail.css","",getdate()[0]);
		wp_enqueue_style('voice-mail');
		wp_register_style('q2', "/wp-content/themes/voxlink/css/q2.css","",getdate()[0]);
		wp_enqueue_style('q2');
	}

	if($templateName == "page-geo-numbers.php"){
		wp_register_style('geo-numbers', "/wp-content/themes/voxlink/css/geo-numbers.css","",getdate()[0]);
		wp_enqueue_style('geo-numbers');
		wp_register_style('q2', "/wp-content/themes/voxlink/css/q2.css","",getdate()[0]);
		wp_enqueue_style('q2');
	}

	if($templateName == "page-parking1.php"){
		wp_register_style('parking', "/wp-content/themes/voxlink/css/parking.css","",getdate()[0]);
		wp_enqueue_style('parking');
		wp_register_style('q2', "/wp-content/themes/voxlink/css/q2.css","",getdate()[0]);
		wp_enqueue_style('q2');
	}

	if($templateName == "page-callback.php"){
		wp_register_style('callback', "/wp-content/themes/voxlink/css/callback.css","",getdate()[0]);
		wp_enqueue_style('callback');
		wp_register_style('q2', "/wp-content/themes/voxlink/css/q2.css","",getdate()[0]);
		wp_enqueue_style('q2');
	}

	if($templateName == "page-transit.php"){
		wp_register_style('transit1', "/wp-content/themes/voxlink/css/transit.css","",getdate()[0]);
		wp_enqueue_style('transit1');
		wp_register_style('q2', "/wp-content/themes/voxlink/css/q2.css","",getdate()[0]);
		wp_enqueue_style('q2');
	}

	if($templateName == "page-courses-asterisk.php"){
		wp_register_style('courses-asterisk', "/wp-content/themes/voxlink/css/courses-asterisk.css","",getdate()[0]);
		wp_enqueue_style('courses-asterisk');
		wp_register_style('q2', "/wp-content/themes/voxlink/css/q2.css","",getdate()[0]);
		wp_enqueue_style('q2');

		wp_register_script('courses-asterisk', "/wp-content/themes/voxlink/js/courses-asterisk.js" , array(), '1.1', true);
		wp_enqueue_script('courses-asterisk');
	}

	if($templateName == "page-integr-tel-crm.php"){
		wp_register_style('integr-tel-crm', "/wp-content/themes/voxlink/css/integr-tel-crm.css","",getdate()[0]);
		wp_enqueue_style('integr-tel-crm');
		wp_register_style('q2', "/wp-content/themes/voxlink/css/q2.css","",getdate()[0]);
		wp_enqueue_style('q2');

		wp_register_script('integr-tel-crm', "/wp-content/themes/voxlink/js/integr-tel-crm.js" , array(), '1.1', true);
		wp_enqueue_script('integr-tel-crm');
	}

	if($templateName == "single-solution-smbiz.php"){
		wp_register_style('smbiz', "/wp-content/themes/voxlink/css/smbiz.css","",getdate()[0]);
		wp_enqueue_style('smbiz');
		wp_register_style('q2', "/wp-content/themes/voxlink/css/q2.css","",getdate()[0]);
		wp_enqueue_style('q2');

		wp_register_script('smbiz', "/wp-content/themes/voxlink/js/smbiz.js" , array(), '1.1', true);
		wp_enqueue_script('smbiz');
	}

	if($templateName == "single-solution-bbiz.php"){
		wp_register_style('sbbiz', "/wp-content/themes/voxlink/css/sbbiz.css","",getdate()[0]);
		wp_enqueue_style('sbbiz');
		wp_register_style('q2', "/wp-content/themes/voxlink/css/q2.css","",getdate()[0]);
		wp_enqueue_style('q2');

		wp_register_script('sbbiz', "/wp-content/themes/voxlink/js/sbbiz.js" , array(), '1.1', true);
		wp_enqueue_script('sbbiz');
	}

	if($templateName == "about.php"){

		wp_register_style('about-total', "/wp-content/themes/voxlink/css/about-total.css","",getdate()[0]);
		wp_enqueue_style('about-total');


		wp_register_style('about-us', "/wp-content/themes/voxlink/css/about-us.css","",getdate()[0]);
		wp_enqueue_style('about-us');




		wp_register_script('about-us', "/wp-content/themes/voxlink/js/about-us.js" , array(), '1.1', true);
		wp_enqueue_script('about-us');
	}

	if($templateName == "page-cart.php"){
		wp_register_style('cart', "/wp-content/themes/voxlink/css/cart.css","",getdate()[0]);
		wp_enqueue_style('cart');

		wp_register_script('cart', "/wp-content/themes/voxlink/js/cart.js" , array(), '1.1', true);
		wp_enqueue_script('cart');
	}

	if($templateName == "single-solution-mbiz.php"){
		wp_register_style('single-solution-mbiz', "/wp-content/themes/voxlink/css/single-solution-mbiz.css","",getdate()[0]);
		wp_enqueue_style('single-solution-mbiz');

		wp_register_script('single-solution-mbiz', "/wp-content/themes/voxlink/js/single-solution-mbiz.js" , array(), '1.1', true);
		wp_enqueue_script('single-solution-mbiz');

		wp_register_style('q2', "/wp-content/themes/voxlink/css/q2.css","",getdate()[0]);
		wp_enqueue_style('q2');
	}



	if($templateName == "page-clients.php"){
		wp_register_style('about-total', "/wp-content/themes/voxlink/css/about-total.css","",getdate()[0]);
		wp_enqueue_style('about-total');

		wp_register_style('clients', "/wp-content/themes/voxlink/css/clients.css","",getdate()[0]);
		wp_enqueue_style('clients');

		wp_register_script('clients', "/wp-content/themes/voxlink/js/clients.js" , array(), '1.1', true);
		wp_enqueue_script('clients');
	}


	if($templateName == "pisma.php"){
		wp_register_style('about-total', "/wp-content/themes/voxlink/css/about-total.css","",getdate()[0]);
		wp_enqueue_style('about-total');

		wp_register_style('pisma', "/wp-content/themes/voxlink/css/pisma.css","",getdate()[0]);
		wp_enqueue_style('pisma');
	}

	if($templateName=="page-develop.php"){
		wp_register_style('our-developments', "/wp-content/themes/voxlink/css/our-developments.css","",getdate()[0]);
		wp_enqueue_style('our-developments');
	}


	if($templateName=="page-free-tech.php"){
		wp_register_style('free-tech', "/wp-content/themes/voxlink/css/free-tech.css","",getdate()[0]);
		wp_enqueue_style('free-tech');

		wp_register_style('q2', "/wp-content/themes/voxlink/css/q2.css","",getdate()[0]);
		wp_enqueue_style('q2');
	}

	if($templateName=="page-stat.php"){
		wp_register_style('stat', "/wp-content/themes/voxlink/css/stat.css","",getdate()[0]);
		wp_enqueue_style('stat');

		wp_register_script('stat', "/wp-content/themes/voxlink/js/stat.js" , array(), '1.1', true);
		wp_enqueue_script('stat');

		wp_register_style('q2', "/wp-content/themes/voxlink/css/q2.css","",getdate()[0]);
		wp_enqueue_style('q2');
	}


	if($templateName=="page-callforce.php"){
		wp_register_style('callforce', "/wp-content/themes/voxlink/css/callforce.css","",getdate()[0]);
		wp_enqueue_style('callforce');


		wp_register_script('particles', "/wp-content/themes/voxlink/libs/particles.js/particles.min.js" , array(), '1.1', true);
		wp_enqueue_script('particles');

		wp_register_script('particles-app', "/wp-content/themes/voxlink/libs/particles.js/demo/js/app.js" , array(), '1.1', true);
		wp_enqueue_script('particles-app');

		wp_register_script('particles-stats', "/wp-content/themes/voxlink/libs/particles.js/demo/js/lib/stats.js" , array(), '1.1', true);
		wp_enqueue_script('particles-stats');



		wp_register_script('callforcejs', "/wp-content/themes/voxlink/js/callforce.js" , array(), '1.1', true);
		wp_enqueue_script('callforcejs');

		wp_register_style('q2', "/wp-content/themes/voxlink/css/q2.css","",getdate()[0]);
		wp_enqueue_style('q2');
	}

	if($templateName=="page-proj-passport.php"){
		wp_register_style('proj-passport', "/wp-content/themes/voxlink/css/proj-passport.css","",getdate()[0]);
		wp_enqueue_style('proj-passport');

		wp_register_style('q2', "/wp-content/themes/voxlink/css/q2.css","",getdate()[0]);
		wp_enqueue_style('q2');
	}

	if($templateName=="page-documentation.php"){
		wp_register_style('documentation', "/wp-content/themes/voxlink/css/documentation.css","",getdate()[0]);
		wp_enqueue_style('documentation');

		wp_register_style('q2', "/wp-content/themes/voxlink/css/q2.css","",getdate()[0]);
		wp_enqueue_style('q2');
	}

	if($templateName=="contacts.php"){
		wp_register_style('client', "/wp-content/themes/voxlink/css/client.css","",getdate()[0]);
		wp_enqueue_style('client');
	}

	if($templateName=="team.php"){
		wp_register_style('team', "/wp-content/themes/voxlink/css/team.css","",getdate()[0]);
		wp_enqueue_style('team');
	}

	if($templateName=="page-partners.php"){
		wp_register_style('partners', "/wp-content/themes/voxlink/css/partners.css","",getdate()[0]);
		wp_enqueue_style('partners');
	}

	if($templateName=="page-scalability.php"){
		wp_register_style('scalability', "/wp-content/themes/voxlink/css/scalability.css","",getdate()[0]);
		wp_enqueue_style('scalability');

		wp_register_style('q2', "/wp-content/themes/voxlink/css/q2.css","",getdate()[0]);
		wp_enqueue_style('q2');
	}
	if($templateName=="page-obuchenie.php"){
		wp_register_style('obuchenie', "/wp-content/themes/voxlink/css/obuchenie.css","",getdate()[0]);
		wp_enqueue_style('obuchenie');

		wp_register_style('q2', "/wp-content/themes/voxlink/css/q2.css","",getdate()[0]);
		wp_enqueue_style('q2');
	}

	if($templateName=="page-800.php"){
		wp_register_style('page800', "/wp-content/themes/voxlink/css/800.css","",getdate()[0]);
		wp_enqueue_style('page800');

		wp_register_script('page800', "/wp-content/themes/voxlink/js/800.js" , array(), getdate()[0], true);
		wp_enqueue_script('page800');

		wp_register_style('q2', "/wp-content/themes/voxlink/css/q2.css","",getdate()[0]);
		wp_enqueue_style('q2');
	}

	if($templateName=="page-lowing-cost.php"){
		wp_register_style('lowing-cost', "/wp-content/themes/voxlink/css/lowing-cost.css","",getdate()[0]);
		wp_enqueue_style('lowing-cost');

		wp_register_script('lowing-cost', "/wp-content/themes/voxlink/js/lowing-cost.js" , array(), getdate()[0], true);
		wp_enqueue_script('lowing-cost');

		wp_register_style('q2', "/wp-content/themes/voxlink/css/q2.css","",getdate()[0]);
		wp_enqueue_style('q2');
	}

	if($templateName=="page-complex-implementation.php"){
		wp_register_style('complex-implementation', "/wp-content/themes/voxlink/css/complex-implementation.css","",getdate()[0]);
		wp_enqueue_style('complex-implementation');

		wp_register_script('complex-implementation', "/wp-content/themes/voxlink/js/complex-implementation.js" , array(), getdate()[0], true);
		wp_enqueue_script('complex-implementation');

		wp_register_style('q2', "/wp-content/themes/voxlink/css/q2.css","",getdate()[0]);
		wp_enqueue_style('q2');
	}

	if($templateName=="page-skype-connect.php"){
		wp_register_style('skype-connect', "/wp-content/themes/voxlink/css/skype-connect.css","",getdate()[0]);
		wp_enqueue_style('skype-connect');

		wp_register_style('q2', "/wp-content/themes/voxlink/css/q2.css","",getdate()[0]);
		wp_enqueue_style('q2');
	}

	if($templateName=="page-international.php"){
		wp_register_style('international', "/wp-content/themes/voxlink/css/international.css","",getdate()[0]);
		wp_enqueue_style('international');

		wp_register_style('q2', "/wp-content/themes/voxlink/css/q2.css","",getdate()[0]);
		wp_enqueue_style('q2');
	}

    if($templateName=="page-stages.php"){
		wp_register_style('stages', "/wp-content/themes/voxlink/css/stages.css","",getdate()[0]);
		wp_enqueue_style('stages');

		wp_register_style('q2', "/wp-content/themes/voxlink/css/q2.css","",getdate()[0]);
		wp_enqueue_style('q2');
	}

	if($templateName=="page-callmetrix.php"){
		wp_register_style('callmetrix', "/wp-content/themes/voxlink/css/callmetrix.css","",getdate()[0]);
		wp_enqueue_style('callmetrix');

		wp_register_script('callmetrix-js', "/wp-content/themes/voxlink/js/callmetrix.js" , array(), getdate()[0], true);
		wp_enqueue_script('callmetrix-js');

		wp_register_style('q2', "/wp-content/themes/voxlink/css/q2.css","",getdate()[0]);
		wp_enqueue_style('q2');
	}

	if($templateName=="page-calltracking.php"){
		wp_register_style('calltracking', "/wp-content/themes/voxlink/css/calltracking.css","",getdate()[0]);
		wp_enqueue_style('calltracking');

		// wp_register_script('calltracking-js', "/wp-content/themes/voxlink/js/calltracking.js" , array(), getdate()[0], true);
		// wp_enqueue_script('calltracking-js');

		wp_register_style('q2', "/wp-content/themes/voxlink/css/q2.css","",getdate()[0]);
		wp_enqueue_style('q2');
	}

	if($templateName=="page-komponenty.php"){
		wp_register_style('komponenty', "/wp-content/themes/voxlink/css/komponenty.css","",getdate()[0]);
		wp_enqueue_style('komponenty');

		wp_register_script('komponenty-js', "/wp-content/themes/voxlink/js/komponenty.js" , array(), getdate()[0], true);
		wp_enqueue_script('komponenty-js');

		wp_register_style('q2', "/wp-content/themes/voxlink/css/q2.css","",getdate()[0]);
		wp_enqueue_style('q2');
	}

	if($templateName=="page-own-crm.php"){
		wp_register_style('own-crm', "/wp-content/themes/voxlink/css/own-crm.css","",getdate()[0]);
		wp_enqueue_style('own-crm');

		wp_register_style('q2', "/wp-content/themes/voxlink/css/q2.css","",getdate()[0]);
		wp_enqueue_style('q2');
	}

	if($templateName=="page-tarif-link.php"){
		wp_register_style('tarif-link', "/wp-content/themes/voxlink/css/tarif-link.css","",getdate()[0]);
		wp_enqueue_style('tarif-link');

		wp_register_style('q2', "/wp-content/themes/voxlink/css/q2.css","",getdate()[0]);
		wp_enqueue_style('q2');
	}


	if($templateName=="page-bezlim-tarify.php"){
		wp_register_style('bezlim-tarify', "/wp-content/themes/voxlink/css/bezlim-traify.css","",getdate()[0]);
		wp_enqueue_style('bezlim-tarify');

		wp_register_style('q2', "/wp-content/themes/voxlink/css/q2.css","",getdate()[0]);
		wp_enqueue_style('q2');
	}

	if($templateName=="page-claster.php"){
		wp_register_style('claster', "/wp-content/themes/voxlink/css/claster.css","",getdate()[0]);
		wp_enqueue_style('claster');

		wp_register_style('q2', "/wp-content/themes/voxlink/css/q2.css","",getdate()[0]);
		wp_enqueue_style('q2');
	}

	if($templateName=="page-number495.php"){
		wp_register_style('number495', "/wp-content/themes/voxlink/css/number495.css","",getdate()[0]);
		wp_enqueue_style('number495');

		wp_register_style('q2', "/wp-content/themes/voxlink/css/q2.css","",getdate()[0]);
		wp_enqueue_style('q2');
	}

	if($templateName=="page-1c-crm.php"){
		wp_register_style('1ccrm', "/wp-content/themes/voxlink/css/1ccrm.css","",getdate()[0]);
		wp_enqueue_style('1ccrm');

		wp_register_script('1ccrm-js', "/wp-content/themes/voxlink/js/1ccrm.js" , array(), getdate()[0], true);
		wp_enqueue_script('1ccrm-js');

		wp_register_style('q2', "/wp-content/themes/voxlink/css/q2.css","",getdate()[0]);
		wp_enqueue_style('q2');
	}

	if($templateName=="page-vnedrenie.php"){ // Внедренеие кол-центра
		wp_register_style('vnedrenie', "/wp-content/themes/voxlink/css/vnedrenie.css","",getdate()[0]);
		wp_enqueue_style('vnedrenie');
		wp_register_script('d3', "https://d3js.org/d3.v5.min.js" , array(), '1.1', true);
		wp_enqueue_script('d3');
		wp_register_script('vnedrenie', "/wp-content/themes/voxlink/js/vnedrenie.js" , array(), '1.1', true);
		wp_enqueue_script('vnedrenie');

		wp_register_style('q2', "/wp-content/themes/voxlink/css/q2.css","",getdate()[0]);
		wp_enqueue_style('q2');
	}

	if($templateName=="page-proektirovanie.php"){
		wp_register_style('proektirovanie', "/wp-content/themes/voxlink/css/proektirovanie.css","",getdate()[0]);
		wp_enqueue_style('proektirovanie');
		wp_register_script('proektirovanie', "/wp-content/themes/voxlink/js/proektirovanie.js" , array(), '1.1', true);
		wp_enqueue_script('proektirovanie');

		wp_register_style('q2', "/wp-content/themes/voxlink/css/q2.css","",getdate()[0]);
		wp_enqueue_style('q2');
	}

	if($templateName=="page-bitrix24.php"){
		wp_register_style('bitrix24', "/wp-content/themes/voxlink/css/bitrix24.css","",getdate()[0]);
		wp_enqueue_style('bitrix24');

		wp_register_script('bitrix24-js', "/wp-content/themes/voxlink/js/bitrix24.js" , array(), getdate()[0], true);
		wp_enqueue_script('bitrix24-js');

		wp_register_style('q2', "/wp-content/themes/voxlink/css/q2.css","",getdate()[0]);
		wp_enqueue_style('q2');
	}

	if($templateName=="page-amocrm.php"){
		wp_register_style('amocrm', "/wp-content/themes/voxlink/css/amocrm.css","",getdate()[0]);
		wp_enqueue_style('amocrm');

		wp_register_script('amocrm-js', "/wp-content/themes/voxlink/js/amocrm.js" , array(), getdate()[0], true);
		wp_enqueue_script('amocrm-js');

		wp_register_style('q2', "/wp-content/themes/voxlink/css/q2.css","",getdate()[0]);
		wp_enqueue_style('q2');
	}

	if($templateName=="page-salesman.php"){
		wp_register_style('salesman', "/wp-content/themes/voxlink/css/salesman.css","",getdate()[0]);
		wp_enqueue_style('salesman');

		wp_register_script('salesman-js', "/wp-content/themes/voxlink/js/salesman.js" , array(), getdate()[0], true);
		wp_enqueue_script('salesman-js');

		wp_register_style('q2', "/wp-content/themes/voxlink/css/q2.css","",getdate()[0]);
		wp_enqueue_style('q2');
	}

	if($templateName == "page-telephone-connection.php"){
		wp_register_style('telephone-connection', "/wp-content/themes/voxlink/css/telephone-connection.css","",getdate()[0]);
		wp_enqueue_style('telephone-connection');

		wp_register_script('telephone-connection-js', "/wp-content/themes/voxlink/js/telephone-connection.js" , array(), getdate()[0], true);
		wp_enqueue_script('telephone-connection-js');

		wp_register_style('q2', "/wp-content/themes/voxlink/css/q2.css","",getdate()[0]);
		wp_enqueue_style('q2');
	}

	if($templateName == "page-shemy.php"){
		wp_register_style('shemy', "/wp-content/themes/voxlink/css/shemy.css","",getdate()[0]);
		wp_enqueue_style('shemy');

		wp_register_script('shemy-js', "/wp-content/themes/voxlink/js/shemy.js" , array(), getdate()[0], true);
		wp_enqueue_script('shemy-js');

		wp_register_style('q2', "/wp-content/themes/voxlink/css/q2.css","",getdate()[0]);
		wp_enqueue_style('q2');
	}


	if($templateName == "pahe-tech-support.php"){
		wp_register_style('techsupport', "/wp-content/themes/voxlink/css/techsupport.css","",getdate()[0]);
		wp_enqueue_style('techsupport');

		wp_register_script('techsupport', "/wp-content/themes/voxlink/js/techsupport.js" , array(), getdate()[0], true);
		wp_enqueue_script('techsupport');

		wp_register_style('q2', "/wp-content/themes/voxlink/css/q2.css","",getdate()[0]);
		wp_enqueue_style('q2');
	}

	if($templateName == "page-cc-komponenty.php"){
		wp_register_style('css-komponenty', "/wp-content/themes/voxlink/css/css-komponenty.css","",getdate()[0]);
		wp_enqueue_style('css-komponenty');

		wp_register_script('cs-komponenty.js', "/wp-content/themes/voxlink/js/cc-komponenty.js" , array(), getdate()[0], true);
		wp_enqueue_script('cs-komponenty.js');

		wp_register_style('q2', "/wp-content/themes/voxlink/css/q2.css","",getdate()[0]);
		wp_enqueue_style('q2');
	}


	if($templateName == "page-autoconfig.php"){
		wp_register_style('autoconfig', "/wp-content/themes/voxlink/css/autoconfig.css","",getdate()[0]);
		wp_enqueue_style('autoconfig');

		wp_register_style('q2', "/wp-content/themes/voxlink/css/q2.css","",getdate()[0]);
		wp_enqueue_style('q2');
	}


	if($templateName == "page-mikrotik-courses.php"){
		wp_register_style('mikrotik-courses', "/wp-content/themes/voxlink/css/mikrotik-courses.css","",getdate()[0]);
		wp_enqueue_style('mikrotik-courses');

		wp_register_script('mikrotik-courses.js', "/wp-content/themes/voxlink/js/mikrotik-courses.js" , array(), getdate()[0], true);
		wp_enqueue_script('mikrotik-courses.js');

		wp_register_style('q2', "/wp-content/themes/voxlink/css/q2.css","",getdate()[0]);
		wp_enqueue_style('q2');
	}



	if($templateName == "page-fmc.php"){
		wp_register_style('fcm', "/wp-content/themes/voxlink/css/fcm.css","",getdate()[0]);
		wp_enqueue_style('fcm');

		wp_register_script('fcm.js', "/wp-content/themes/voxlink/js/fcm.js" , array(), getdate()[0], true);
		wp_enqueue_script('fcm.js');

		wp_register_style('q2', "/wp-content/themes/voxlink/css/q2.css","",getdate()[0]);
		wp_enqueue_style('q2');
	}

	if($templateName == "price-tech.php"){
		wp_register_style('price-tech', "/wp-content/themes/voxlink/css/price-tech.css","",getdate()[0]);
		wp_enqueue_style('price-tech');


		wp_register_script('price-tech-js', "/wp-content/themes/voxlink/js/price-tech.js" , array(), getdate()[0], true);
		wp_enqueue_script('price-tech-js');


		wp_register_style('q2', "/wp-content/themes/voxlink/css/q2.css","",getdate()[0]);
		wp_enqueue_style('q2');
	}



	if($templateName == "page-kpi.php"){
		wp_register_style('kpi', "/wp-content/themes/voxlink/css/kpi.css","",getdate()[0]);
		wp_enqueue_style('kpi');

		wp_register_script('kpi.js', "/wp-content/themes/voxlink/js/kpi.js" , array(), getdate()[0], true);
		wp_enqueue_script('kpi.js');

		wp_register_style('q2', "/wp-content/themes/voxlink/css/q2.css","",getdate()[0]);
		wp_enqueue_style('q2');
	}

	if($templateName == "page-asteriskconf.php"){
		wp_register_style('asteriskconf', "/wp-content/themes/voxlink/css/asteriskconf.css","",getdate()[0]);
		wp_enqueue_style('asteriskconf');


		wp_register_style('selectize', "/wp-content/themes/voxlink/libs/selectize/dist/css/selectize.css","",getdate()[0]);
		wp_enqueue_style('selectize');
		wp_register_script('selectize', "/wp-content/themes/voxlink/libs/selectize/dist/js/standalone/selectize.min.js" , array(), getdate()[0], true);
		wp_enqueue_script('selectize');

		wp_register_script('asteriskconf.js', "/wp-content/themes/voxlink/js/asteriskconf.js" , array(), getdate()[0], true);
		wp_enqueue_script('asteriskconf.js');




		wp_register_style('q2', "/wp-content/themes/voxlink/css/q2.css","",getdate()[0]);
		wp_enqueue_style('q2');
	}


	if($templateName == "page-voxdistro.php"){
		wp_register_style('voxdistro', "/wp-content/themes/voxlink/css/voxdistro.css","",getdate()[0]);
		wp_enqueue_style('voxdistro');

		wp_register_script('voxdistro.js', "/wp-content/themes/voxlink/js/voxdistro.js" , array(), getdate()[0], true);
		wp_enqueue_script('voxdistro.js');

		wp_register_style('q2', "/wp-content/themes/voxlink/css/q2.css","",getdate()[0]);
		wp_enqueue_style('q2');
	}


	if($templateName == "page-modern.php"){
		wp_register_style('moder', "/wp-content/themes/voxlink/css/moder.css","",getdate()[0]);
		wp_enqueue_style('moder');

		wp_register_script('modern.js', "/wp-content/themes/voxlink/js/modern.js" , array(), getdate()[0], true);
		wp_enqueue_script('modern.js');

		wp_register_style('q2', "/wp-content/themes/voxlink/css/q2.css","",getdate()[0]);
		wp_enqueue_style('q2');
	}


	if($templateName == "page-dect.php"){
		wp_register_style('dect', "/wp-content/themes/voxlink/css/dect.css","",getdate()[0]);
		wp_enqueue_style('dect');

		wp_register_style('q2', "/wp-content/themes/voxlink/css/q2.css","",getdate()[0]);
		wp_enqueue_style('q2');
	}


	if($templateName == "page-kb-dect-compare.php"){
		wp_register_style('dect-compare', "/wp-content/themes/voxlink/css/dect-compare.css","",getdate()[0]);
		wp_enqueue_style('dect-compare');

		wp_register_style('q2', "/wp-content/themes/voxlink/css/q2.css","",getdate()[0]);
		wp_enqueue_style('q2');
	}

	if($templateName == "page-webinars.php"){
		wp_register_style('webinars', "/wp-content/themes/voxlink/css/webinars.css","",getdate()[0]);
		wp_enqueue_style('webinars');

		wp_register_style('q2', "/wp-content/themes/voxlink/css/q2.css","",getdate()[0]);
		wp_enqueue_style('q2');
	}


	if(is_singular("kb")){
		wp_register_style('book1', "/wp-content/themes/voxlink/css/book.css","",getdate()[0]);
		wp_enqueue_style('book1');
	}
	
	
	//banners
	wp_register_style('banners', "/wp-content/themes/voxlink/css/banners.css","",getdate()[0]);
	wp_enqueue_style('banners');
	
	wp_register_script('banners', "/wp-content/themes/voxlink/js/banners.js" , array(), getdate()[0], true);
	wp_enqueue_script('banners');
	
	
	

	wp_register_style('myfooter', "/wp-content/themes/voxlink/css/footer.css","",getdate()[0]);
	wp_enqueue_style('myfooter');

	wp_register_script('total', "/wp-content/themes/voxlink/js/total.js" , array(), getdate()[0], true);
	wp_enqueue_script('total');

	if(is_404()){
		wp_register_style('page404', "/wp-content/themes/voxlink/css/404.css","",getdate()[0]);
		wp_enqueue_style('page404');

		wp_register_script('page404', "/wp-content/themes/voxlink/js/404.js" , array(), getdate()[0], true);
		wp_enqueue_script('page404');
	}
}
add_action ('wp_enqueue_scripts', 'wpb_adding_scripts');

function disable_emojis() {
 remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
 remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
 remove_action( 'wp_print_styles', 'print_emoji_styles' );
 remove_action( 'admin_print_styles', 'print_emoji_styles' );
 remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
 remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
 remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
 add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
 add_filter( 'wp_resource_hints', 'disable_emojis_remove_dns_prefetch', 10, 2 );
}
add_action( 'init', 'disable_emojis' );

function de_script() {
	global $template;
	$templateArr = explode("/",$template);
	$templateName = end($templateArr);

	$current_obj = get_queried_object();
	if(!(is_object($current_obj) || isset($current_obj->post_parent))){
		$current_obj = (object) array(
			"post_parent" => 0
		);
	}
	/*Отключаем ненужные скрипты*/
	
	if(is_front_page()){
		wp_deregister_script( 'lodash' );
		wp_deregister_script( 'jquery-migrate' );

	}
	
	if(isset($current_obj->post_parent)){
		if($current_obj->post_parent == 7701 || $current_obj->post_parent == 2238 || $current_obj->post_parent == 2181 || is_front_page() || is_post_type_archive("product") || is_post_type_archive("kb") || is_product_category() || is_tax("kb_cat")  || $templateName == "page-compare.php" || $templateName == "page-bookmarks.php" || $templateName == "page-recording-call.php" || $templateName == "page-voice-greeting.php" || $templateName == "page-save-number.php" || $templateName == "page-conference.php" || $templateName == "page-fax.php" || is_singular("product") || is_checkout() || $templateName == "thankyou.php" || $templateName == "about.php" || $templateName == "page-cart.php" || $templateName == "page-clients.php" || $templateName == "pisma.php" || is_tag() || $templateName=="page-develop.php" || $templateName == "single-solution-mbiz.php" || $templateName=="contacts.php" || $templateName=="team.php" || $templateName=="page-partners.php" || is_404() || is_singular("kb")){
			//Общие страницы услуг и другие страницы
			wp_deregister_script( 'mycommon' );
			wp_deregister_script( 'berocket_aapf_widget-scroll-script' );
			wp_deregister_script( 'wc-add-to-cart' );
			wp_deregister_script( 'wc-add-to-cart-variation' );
			wp_deregister_script('wc-geolocation');
			wp_deregister_script('wc-lost-password');
			wp_deregister_script('jcrop');
			wp_deregister_script('wp-user-avatar-webcam');
			wp_deregister_script('wp-user-avatar-imgloader');
			wp_deregister_script('jquery-blockui');
			wp_deregister_script('jquery-cookie');
			wp_deregister_script('woocommerce');
			wp_deregister_script('wc-cart-fragments');
			wp_deregister_script('yith-woocompare-main');
			wp_deregister_script('jquery-colorbox');
			wp_deregister_script('prettyPhoto');
			wp_deregister_script('prettyPhoto-init');
			wp_deregister_script('jquery-selectBox');
			wp_deregister_script('ts-extend-hammer');
			wp_deregister_script('wp-embed');
			wp_deregister_script('ts-extend-nacho');
			wp_deregister_script('jquery-ui-core');
			wp_deregister_script('jquery-ui-widget');
			wp_deregister_script('jquery-ui-mouse');
			wp_deregister_script('wc-jquery-ui-touchpunch');
			wp_deregister_script('accounting');
			wp_deregister_script('wc-price-slider');
			wp_deregister_script('wc-single-product');
			wp_deregister_script( 'select2' );
			wp_dequeue_script( 'select2' );
			wp_deregister_script( 'selectWoo' );
			wp_deregister_script( 'wc-password-strength-meter' );
			wp_deregister_script( 'password-strength-meter' );
		}
	}
	if(get_the_id() == 2222 || get_the_id() == 2228 || get_the_id() == 7699 || get_the_id() == 2234 || get_the_id() == 2232 || get_the_id() == 2623){
		//Страницы услуг с уникальным стилем

	}

	if(isset($current_obj->post_parent)){
	//Отключаем WP 5 Block Library
		if($templateName == "about.php" || $templateName == "page-clients.php" || is_tag() || is_post_type_archive("kb") || is_tax("kb_cat") || is_front_page() || $templateName == "pisma.php" || $templateName=="page-develop.php" || $templateName == "single-solution-mbiz.php"  || $templateName=="contacts.php"   || $templateName=="team.php" || $templateName=="page-partners.php" || is_404() || $current_obj->post_parent == 2238){
			// wp_deregister_script( 'wp-block-library');
		}
	}
}
add_action( 'plugins_loaded', 'de_script', 1000 );
add_action( 'wp_print_scripts', 'de_script', 1000 );
add_action( 'wp_footer', 'de_script', 100 );
add_action( 'wp_header', 'de_script', 100 );

function de_styles() {
	global $template;
	$templateArr = explode("/",$template);
	$templateName = end($templateArr);

	$current_obj = get_queried_object();
	if(!is_object($current_obj) || !isset($current_obj->post_parent)){
		$current_obj = (object) array(
			"post_parent" => 0
		);
	}
	/*Отключаем ненужные стили*/
	if($current_obj->post_parent == 7701 || $current_obj->post_parent == 2238 || $current_obj->post_parent == 2181 || is_front_page() || is_post_type_archive("product") || is_post_type_archive("kb") || is_product_category() || is_tax("kb_cat") || $templateName == "page-compare.php" || $templateName == "page-bookmarks.php"  || $templateName == "page-recording-call.php" || $templateName == "page-voice-greeting.php" || $templateName == "page-save-number.php" || $templateName == "page-conference.php" || $templateName == "page-fax.php" || is_singular("product") || is_checkout() || $templateName == "thankyou.php" || $templateName == "about.php" || $templateName == "page-cart.php" || $templateName == "page-clients.php" || $templateName == "pisma.php"   || is_tag() || $templateName=="page-develop.php" || $templateName == "single-solution-mbiz.php"  || $templateName=="contacts.php"  || $templateName=="team.php" || $templateName=="page-partners.php" || is_404() || is_singular("kb")){
		//Общие страницы услуг и другие страницы
		wp_deregister_style("berocket_aapf_widget-style");
		wp_deregister_style("berocket_aapf_widget-scroll-style");
		if($templateName != "page-cart.php"){
			wp_deregister_style("woocommerce-smallscreen");
			wp_deregister_style("woocommerce-layout");
			wp_deregister_style("woocommerce-general");
		}
		wp_deregister_style("woocommerce_prettyPhoto_css");
		wp_deregister_style("jquery-colorbox");
		wp_deregister_style("jquery-selectBox");
		wp_deregister_style("yith-wcwl-main");
		wp_deregister_style("yith-wcwl-font-awesome");
		wp_deregister_style("jcrop");
		wp_deregister_style("yith_woocompare_page");
		wp_deregister_style("wp-user-avatar");
		wp_deregister_style("jquery-fixedheadertable-style");
		wp_deregister_style("ts-extend-nacho");
		wp_deregister_style("tooltipster");
		if(!is_singular("product")){
			wp_deregister_style("slick-carousel");
			wp_deregister_style("iconic-woothumbs-css");
		}
		wp_deregister_style("acf-global");
		wp_dequeue_style("select2");
		wp_deregister_style("select2");
		wp_deregister_style("acf-datepicker");
		wp_deregister_style("acf-timepicker");
		wp_deregister_style("wp-block-library-theme");

	}

	if($current_obj->post_parent == 7701 || $current_obj->post_parent == 2238 || $current_obj->post_parent == 2181 || get_the_id() == 2222 || get_the_id() == 2228 || get_the_id() == 7699 || get_the_id() == 2234 || get_the_id() == 2232 || get_the_id() == 2623 || is_front_page() || is_post_type_archive("product") || is_post_type_archive("kb") || is_product_category() || is_tax("kb_cat") ||  $templateName == "page-compare.php" || $templateName == "page-bookmarks.php"  || $templateName == "page-recording-call.php" || $templateName == "page-voice-greeting.php" || $templateName == "page-save-number.php" || $templateName == "page-conference.php" || $templateName == "page-fax.php" || is_singular("product") || is_checkout() || $templateName == "thankyou.php" || $templateName == "about.php" || $templateName == "page-cart.php" ||  $templateName == "page-clients.php"  || is_tag() || $templateName == "pisma.php" || $templateName=="page-develop.php" || $templateName == "single-solution-mbiz.php"  || $templateName=="contacts.php"  || $templateName=="team.php" || $templateName=="page-partners.php" || is_404() || is_singular("kb")){
		//Страницы услуг с уникальным стилем

		wp_deregister_style("mymain");
		wp_deregister_style("nnew");
		wp_deregister_style("newmedia");
		wp_deregister_style("danil");
	}



	//Отключаем WP 5 Block Library
	if($templateName == "about.php" ||  $templateName == "page-clients.php" || is_tag() || is_post_type_archive("kb") || is_tax("kb_cat") || is_front_page() || $templateName == "pisma.php" || $templateName=="page-develop.php" || $templateName == "single-solution-mbiz.php"  || $templateName=="team.php" || $templateName=="page-partners.php" || is_404() || $current_obj->post_parent == 2238 || $current_obj->post_parent == 7701){
		wp_deregister_style("wp-block-library");
		wp_deregister_style("wc-vendors");
		wp_deregister_style("wc-featured-product-editor");
		wp_deregister_style("wc-block-style");
		wp_deregister_style("infoblock");
	}

}
add_action( 'wp_print_styles', 'de_styles', 100 );
add_action( 'wp_footer', 'de_styles', 100 );

function wpdocs_theme_slug_widgets_init() {
    register_sidebar( array(
        'name'          => __( 'Main Sidebar', 'textdomain' ),
        'id'            => 'sidebar-1',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>',
    ) );
}
add_action( 'widgets_init', 'wpdocs_theme_slug_widgets_init' );



function woo_in_cart($product_id) {
    global $woocommerce;

    foreach($woocommerce->cart->get_cart() as $key => $val ) {
        $_product = $val['data'];

        if($product_id == $_product->get_id() ) {
            return true;
        }
    }

    return false;
}


function numberMonthToText($i){
	$monthes = array(
		"01" => "Января",
		"02" => "Февраля",
		"03" => "Марта",
		"04" => "Апреля",
		"05" => "Мая",
		"06" => "Июня",
		"07" => "Июля",
		"08" => "Августа",
		"09" => "Сентября",
		"10" => "Октября",
		"11" => "Ноября",
		"12" => "Декабря",
	);
	return $monthes[$i];
}



function wp_get_post_by_slug( $slug, $post_type = 'post', $unique = true ){
    $args=array(
        'name' => $slug,
        'post_type' => $post_type,
        'post_status' => 'publish',
        'posts_per_page' => 1,
        'fields' => 'ids'
    );
    $my_posts = get_posts( $args );
    if( $my_posts ) {
        //echo 'ID on the first post found ' . $my_posts[0]->ID;
        if( $unique ){
            return $my_posts[ 0 ];
        }else{
            return $my_posts;
        }
    }
    return false;
}


add_action( 'generate_rewrite_rules', 'register_faq_rewrite_rules');
function register_faq_rewrite_rules( $wp_rewrite ) {
	$new_rules = array(
		'kb/([^/]+)/?$' => 'index.php?kb_cat=' . $wp_rewrite->preg_index( 1 ),
		'kb/([^/]+)/page/(\d{1,})/?$' => 'index.php?kb_cat=' . $wp_rewrite->preg_index( 1 ) . '&paged=' . $wp_rewrite->preg_index( 2 ),
		'kb/([^/]+)/([^/]+)/?$' => 'index.php?post_type=kb&kb=' . $wp_rewrite->preg_index( 2 ).'&kb_cat=' . $wp_rewrite->preg_index( 1 ),
		'kb/([^/]+)/([^/]+)/page/(\d{1,})/?$' => 'index.php?kb_cat=' . $wp_rewrite->preg_index( 2 ) . '&paged=' . $wp_rewrite->preg_index( 3 ),
		'kb/([^/]+)/([^/]+)/([^/]+)/?$' => 'index.php?post_type=kb&kb=' . $wp_rewrite->preg_index( 3 )
	);
	$wp_rewrite->rules = $new_rules + $wp_rewrite->rules;
}
// A hacky way of adding support for flexible custom permalinks
// There is one case in which the rewrite rules from register_kb_rewrite_rules() fail:
// When you visit the archive page for a child section(for example: http://example.com/faq/category/child-category)
// The deal is that in this situation, the URL is parsed as a Knowledgebase post with slug "child-category" from the "category" section

function fix_faq_subcategory_query($query) {

	if(!is_admin()){
		if ( isset( $query['post_type'] ) && 'kb' == $query['post_type'] ) {
			if ( isset( $query['kb'] ) && $query['kb'] && isset( $query['kb_cat'] ) && $query['kb_cat'] ) {
				$queried_post = wp_get_post_by_slug($query['name'],'kb');
				if(empty($queried_post)){
					$query_old = $query;
					// Check if this is a paginated result(like search results)
					if ( 'page' == $query['kb_cat'] ) {
						$query['paged'] = $query['name'];
						unset( $query['kb_cat'], $query['name'], $query['kb'] );
					}
					// Make it easier on the DB
					$query['fields'] = 'ids';
					$query['posts_per_page'] = 1;
					// See if we have results or not
					$_query = new WP_Query( $query );
					if ( ! $_query->posts ) {
						$query = array( 'kb_cat' => $query['kb'] );
						if ( isset( $query_old['kb_cat'] ) && 'page' == $query_old['kb_cat'] ) {
							unset($query['paged']);
							$query['pg'] = $query_old['name'];
						}
					}
				}

			}
		}
	}
	return $query;
}
add_filter( 'request', 'fix_faq_subcategory_query', 10 );



function kb_permalink( $article_id, $section_id = false, $leavename = false, $only_permalink = false ) {
	$taxonomy = 'kb_cat';
	$article = get_post( $article_id );
	$return = '<a href="';
	$permalink = ( $section_id ) ? trailingslashit( get_term_link( intval( $section_id ), 'kb_cat' ) ) : home_url( '/kb/' );
	$permalink .= trailingslashit( ( $leavename ? "%$article->post_type%" : $article->post_name ) );
	$return .= $permalink . '/" >' . get_the_title( $article->ID ) . '</a>';
	return ( $only_permalink ) ? $permalink : $return;
}
function kb_post_link( $permalink, $post, $leavename ) {
	if ( get_post_type( $post->ID ) == 'kb' ) {
		$terms = wp_get_post_terms( $post->ID, 'kb_cat' );
		$term = ( $terms ) ? $terms[0]->term_id : false;
		$permalink = kb_permalink( $post->ID, $term, $leavename, true );
	}
	return $permalink;
}
add_filter( 'post_type_link', 'kb_post_link', 100, 3 );
function filter_kb_section_terms_link( $termlink, $term, $taxonomy = false ) {
	if ( $taxonomy == 'kb_cat' ) {
		$section_ancestors = get_ancestors( $term->term_id, $taxonomy );
		krsort( $section_ancestors );
		$termlink =  home_url( '/kb/' );
		foreach ( $section_ancestors as $ancestor ) {
			$section_ancestor = get_term( $ancestor, $taxonomy );
			$termlink .= $section_ancestor->slug . '/';
		}
		$termlink .= trailingslashit( $term->slug );
	}
	return $termlink;
}
add_filter( 'term_link', 'filter_kb_section_terms_link', 100, 3 );











add_action( 'generate_rewrite_rules', 'register_faq_rewrite_rules1');
function register_faq_rewrite_rules1( $wp_rewrite ) {
	$new_rules = array(
		'ip-pbx-hardware/([^/]+)/?$' => 'index.php?product_cat=' . $wp_rewrite->preg_index( 1 ),
		'ip-pbx-hardware/([^/]+)/([^/]+)/?$' => 'index.php?post_type=product&product=' . $wp_rewrite->preg_index( 2 ).'&product_cat=' . $wp_rewrite->preg_index( 1 ),
		'ip-pbx-hardware/([^/]+)/page/(\d{1,})/?$' => 'index.php?post_type=product&product_cat=' . $wp_rewrite->preg_index( 1 ) . '&paged=' . $wp_rewrite->preg_index( 2 ),
		'ip-pbx-hardware/([^/]+)/([^/]+)/page/(\d{1,})/?$' => 'index.php?post_type=product&product_cat=' . $wp_rewrite->preg_index( 2 ) . '&paged=' . $wp_rewrite->preg_index( 3 ),
		'ip-pbx-hardware/([^/]+)/([^/]+)/([^/]+)/?$' => 'index.php?post_type=product&product=' . $wp_rewrite->preg_index( 3 )
	);
	$wp_rewrite->rules = $new_rules + $wp_rewrite->rules;
}
// A hacky way of adding support for flexible custom permalinks
// There is one case in which the rewrite rules from register_product_rewrite_rules() fail:
// When you visit the archive page for a child section(for example: http://example.com/faq/category/child-category)
// The deal is that in this situation, the URL is parsed as a Knowledgebase post with slug "child-category" from the "category" section

function fix_faq_subcategory_query1($query) {
	if(!is_admin()){
		if ( isset( $query['post_type'] ) && 'product' == $query['post_type'] ) {
			if ( isset( $query['product'] ) && $query['product'] && isset( $query['product_cat'] ) && $query['product_cat'] ) {
				$queried_post = wp_get_post_by_slug($query['name'],'product');
				if(empty($queried_post)){
					$query_old = $query;
					// Check if this is a paginated result(like search results)
					if ( 'page' == $query['product_cat'] ) {
						$query['paged'] = $query['name'];
						unset( $query['product_cat'], $query['name'], $query['product'] );
					}
					// Make it easier on the DB
					$query['fields'] = 'ids';
					$query['posts_per_page'] = 1;
					// See if we have results or not
					$_query = new WP_Query( $query );
					if ( ! $_query->posts ) {
						$query = array( 'product_cat' => $query['product'] );
						if ( isset( $query_old['product_cat'] ) && 'page' == $query_old['product_cat'] ) {
							unset($query['paged']);
							$query['pg'] = $query_old['name'];
						}
					}
				}

			}
		}


	}
	return $query;
}
add_filter( 'request', 'fix_faq_subcategory_query1', 10 );



function product_permalink1( $article_id, $section_id = false, $leavename = false, $only_permalink = false ) {
	$taxonomy = 'product_cat';
	$article = get_post( $article_id );
	$return = '<a href="';
	$permalink = ( $section_id ) ? trailingslashit( get_term_link( intval( $section_id ), 'product_cat' ) ) : home_url( '/ip-pbx-hardware/' );
	$permalink .= trailingslashit( ( $leavename ? "%$article->post_type%" : $article->post_name ) );
	$return .= $permalink . '/" >' . get_the_title( $article->ID ) . '</a>';
	return ( $only_permalink ) ? $permalink : $return;
}
function product_post_link1( $permalink, $post, $leavename ) {
	if ( get_post_type( $post->ID ) == 'product' ) {
		$terms = wp_get_post_terms( $post->ID, 'product_cat' );
		$term = ( $terms ) ? $terms[0]->term_id : false;
		$permalink = product_permalink1( $post->ID, $term, $leavename, true );
	}
	return $permalink;
}
add_filter( 'post_type_link', 'product_post_link1', 100, 3 );
function filter_product_section_terms_link1( $termlink, $term, $taxonomy = false ) {
	if ( $taxonomy == 'product_cat' ) {
		$section_ancestors = get_ancestors( $term->term_id, $taxonomy );
		krsort( $section_ancestors );
		$termlink =  home_url( '/ip-pbx-hardware/' );
		foreach ( $section_ancestors as $ancestor ) {
			$section_ancestor = get_term( $ancestor, $taxonomy );
			$termlink .= $section_ancestor->slug . '/';
		}
		$termlink .= trailingslashit( $term->slug );
	}
	return $termlink;
}
add_filter( 'term_link', 'filter_product_section_terms_link1', 100, 3 );





add_action( 'generate_rewrite_rules', 'register_tag_rewrite_rules');
function register_tag_rewrite_rules( $wp_rewrite ) {
	$new_rules = array(
		'tag/([^/]+)/page/(\d{1,})/?$' => 'index.php?tag=' . $wp_rewrite->preg_index( 1 ) . '&paged=' . $wp_rewrite->preg_index( 2 )
	);
	$wp_rewrite->rules = $new_rules + $wp_rewrite->rules;
}



function fix_tag_query($query) {
	if(!is_admin()){
		if(isset($query['tag'])){
			if(isset($query['paged'])){
				$query['pg'] = $query['paged'];
				unset($query['paged']);
			}

		}
	}
	return $query;
}
add_filter( 'request', 'fix_tag_query', 10 );



add_action( 'generate_rewrite_rules', 'register_category_rewrite_rules');
function register_category_rewrite_rules( $wp_rewrite ) {
	$new_rules = array(
		'technoblog/page/(\d{1,})/?$' => 'index.php?category_name=technoblog&paged=' . $wp_rewrite->preg_index( 1 )
	);
	$wp_rewrite->rules = $new_rules + $wp_rewrite->rules;
}





function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');



function fix_svg_thumb_display() {
  echo '
  <style>
    td.media-icon img[src$=".svg"], img[src$=".svg"].attachment-post-thumbnail {
      width: 100% !important;
      height: auto !important;
    }
  </style>
  ';
}
add_action('admin_head', 'fix_svg_thumb_display');


function firstgutyblocks_assets() {
    wp_enqueue_style('infoblock',"/wp-content/themes/voxlink/functions/partials/infoblock/style.css");
}
add_action( 'enqueue_block_assets', 'firstgutyblocks_assets' );


add_action('template_redirect', 'template_redirect_attachment');
function template_redirect_attachment() {
	global $post;
	// Перенаправление на основную запись:
	if (is_attachment()) {
		wp_redirect(get_permalink($post->post_parent));
	}
}


include("search-modifier.php");


add_filter( 'lazyblock/random/frontend_callback', 'random_output', 10, 2 );
function get_post_by_name($post_name, $output = OBJECT) {
    global $wpdb;
        $post = $wpdb->get_var( $wpdb->prepare( "SELECT ID FROM $wpdb->posts WHERE post_name = %s AND post_type='post'", $post_name ));
        if ( $post )
            return get_post($post, $output);

    return null;
}
if ( ! function_exists( 'random_output' ) ) :
    /**
     * Test Render Callback
     *
     * @param string $output - block output.
     * @param array  $attributes - block attributes.
     */
    function random_output( $output, $attributes ) {
        ob_start();
        $index = rand(0,count($attributes['blocks']) - 1);
        $post = get_page_by_title( $attributes['blocks'][$index]['name'], OBJECT, 'lazyblocks' );
		$meta = get_post_meta($post->ID);
		echo $meta['lazyblocks_code_frontend_html'][0];
        return ob_get_clean();
    }
endif;



if($_SERVER['HTTP_HOST'] == "voxlink.kz"  || $_SERVER['HTTP_HOST'] == "www.voxlink.kz"){
	// Utility function to change the prices with a multiplier (number)
	function get_price_multiplier() {
	    return 5.895; // x2 for testing
	}

	// Simple, grouped and external products
	add_filter('woocommerce_product_get_price', 'custom_price', 99, 2 );
	add_filter('woocommerce_product_get_regular_price', 'custom_price', 99, 2 );
	// Variations
	add_filter('woocommerce_product_variation_get_regular_price', 'custom_price', 99, 2 );
	add_filter('woocommerce_product_variation_get_price', 'custom_price', 99, 2 );
	function custom_price( $price, $product ) {
	    return $price * get_price_multiplier();
	}

	// Variable (price range)
	add_filter('woocommerce_variation_prices_price', 'custom_variable_price', 99, 3 );
	add_filter('woocommerce_variation_prices_regular_price', 'custom_variable_price', 99, 3 );
	function custom_variable_price( $price, $variation, $product ) {
	    // Delete product cached price  (if needed)
	    // wc_delete_product_transients($variation->get_id());

	    return $price * get_price_multiplier();
	}

	// Handling price caching (see explanations at the end)
	add_filter( 'woocommerce_get_variation_prices_hash', 'add_price_multiplier_to_variation_prices_hash', 99, 1 );
	function add_price_multiplier_to_variation_prices_hash( $hash ) {
	    $hash[] = get_price_multiplier();
	    return $hash;
	}


	function change_existing_currency_symbol( $currency_symbol, $currency ) {
	     switch( $currency ) {
	          case 'RUB': $currency_symbol = 'тенге'; break;
	     }
	     return $currency_symbol;
	}
} else {

	function change_existing_currency_symbol( $currency_symbol, $currency ) {
	     switch( $currency ) {
	          case 'RUB': $currency_symbol = 'руб.'; break;
	     }
	     return $currency_symbol;
	}
}

add_filter('woocommerce_currency_symbol', 'change_existing_currency_symbol', 10, 2);


function digitsToMonth($digit){
    $ru_month['01'] = "января";
    $ru_month['02'] = "февраля";
    $ru_month['03'] = "марта";
    $ru_month['04'] = "апреля";
    $ru_month['05'] = "мая";
    $ru_month['06'] = "июня";
    $ru_month['07'] = "июля";
    $ru_month['08'] = "августа";
    $ru_month['09'] = "сентября";
    $ru_month['10'] = "октября";
    $ru_month['11'] = "ноября";
    $ru_month['12'] = "декабря";
    return $ru_month[$digit];
}

// filter for Frontend output.
add_filter( 'lazyblock/tasks/frontend_callback', 'tasks_block', 10, 2 );

if ( ! function_exists( 'tasks_block' ) ) :
    function tasks_block( $output, $attributes ) {
        ob_start();
        ?>

		<div class="tasks-block">
			<h4>Задача</h4>
			<?php foreach($attributes['tasks'] as $task){?>
				<div class="tb-item">
					<div><?php echo $task['task']; ?></div>
				</div>
			<?php } ?>
		</div>

        <?php
        return ob_get_clean();
    }
endif;



// filter for Frontend output.
add_filter( 'lazyblock/resh/frontend_callback', 'resh_block', 10, 2 );

if ( ! function_exists( 'resh_block' ) ) :
    function resh_block( $output, $attributes ) {
        ob_start();
        ?>

		<div class="tasks-block">
			<h4>Решение</h4>

			<div class="resh-item">
				<div><?php echo $attributes['resh']; ?></div>
			</div>

		</div>

        <?php
        return ob_get_clean();
    }
endif;



// filter for Frontend output.
add_filter( 'lazyblock/mycode/frontend_callback', 'mycode_output', 10, 2 );
// filter for Editor output.
if ( ! function_exists( 'mycode_output' ) ) :
    /**
     * Test Render Callback
     *
     * @param string $output - block output.
     * @param array  $attributes - block attributes.
     */
    function mycode_output( $output, $attributes ) {
        ob_start();
        ?>


       		<?php echo $attributes['code']; ?>


        <?php
        return ob_get_clean();
    }
endif;


add_filter( 'lazyblock/primechanie/frontend_callback', 'primechanie_output', 10, 2 );
// filter for Editor output.
if ( ! function_exists( 'primechanie_output' ) ) :
    /**
     * Test Render Callback
     *
     * @param string $output - block output.
     * @param array  $attributes - block attributes.
     */
    function primechanie_output( $output, $attributes ) {
        ob_start();
        ?>

        <div class='primechanie-block'>
        	<img src="/wp-content/themes/voxlink/minimg/book/info.png" alt="">
        	<div>
        		<?php echo  $attributes['text']; ?>
        	</div>
        </div>

        <?php
        return ob_get_clean();
    }
endif;


add_filter( 'lazyblock/preduprezhdenie/frontend_callback', 'preduprezhdenie_output', 10, 2 );
// filter for Editor output.
if ( ! function_exists( 'preduprezhdenie_output' ) ) :
    /**
     * Test Render Callback
     *
     * @param string $output - block output.
     * @param array  $attributes - block attributes.
     */
    function preduprezhdenie_output( $output, $attributes ) {
        ob_start();
        ?>

        <div class='primechanie-block'>
        	<img src="/wp-content/themes/voxlink/minimg/book/alert.png" alt="">
        	<div>
        		<?php echo  $attributes['text']; ?>
        	</div>
        </div>

        <?php
        return ob_get_clean();
    }
endif;

add_filter( 'lazyblock/bordered-text/frontend_callback', 'bordered_text_output', 10, 2 );
// filter for Editor output.
if ( ! function_exists( 'bordered_text_output' ) ) :
    /**
     * Test Render Callback
     *
     * @param string $output - block output.
     * @param array  $attributes - block attributes.
     */
    function bordered_text_output( $output, $attributes ) {
        ob_start();
        ?>


        <?php echo  $attributes['text']; ?>


        <?php
        return ob_get_clean();
    }
endif;


function print_filters_for( $hook = '' ) {
    global $wp_filter;
    if( empty( $hook ) || !isset( $wp_filter[$hook] ) )
        return;

    print '<pre>';
    print_r( $wp_filter[$hook] );
    print '</pre>';
}

