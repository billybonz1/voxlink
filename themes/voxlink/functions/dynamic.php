<?php
function aboutclients(){
    $clients = get_posts(array(
      "post_type" => "clients",
      "posts_per_page" => 5,
      "meta_key" => "priority",
      'orderby'=> 'meta_value rand',
      'order'=>'DESC'
    ));
    foreach($clients as $client){?>
        <div class="our-clients__item">
          <img src="<?php echo get_the_post_thumbnail_url( $client->ID, "product_cat" );?>">
        </div>
    <?php }
}


function mainclients(){ ?>
    <div class="col-md-12">

						<?php


                          $cl = get_posts(array(
                            "post_type" => "clients",
                            "posts_per_page" => -1,
                            'order'=>'DESC'
                          ));
                          $tagsArr = [
                        	"100000" => (object) array(
                        		"name" => "Другое",
                        		"items" => array()
                        	)
                          ];
                          foreach($cl as $client){
                          	$tags = wp_get_post_terms( $client->ID, "clients_tags" );
                          	if(count($tags) > 0){
                          		foreach($tags as $tag){
	                          		if(isset($tagsArr[$tag->term_id])){
	                          			$tagsArr[$tag->term_id]->items[] = array(
	                          				"item" => $client,
	                          				"priority" => get_field("priority", $client->ID)
	                          			);
	                          		}else{
	                          			$tagsArr[$tag->term_id] = $tag;
	                          			$tagsArr[$tag->term_id]->items = [array(
	                          				"item" => $client,
	                          				"priority" => get_field("priority", $client->ID)
	                          			)];
	                          		}
	                          	}
                          	}else{
                          		$tagsArr['100000']->items[] = array(
	                          		"item" => $client,
	                          		"priority" => get_field("priority", $client->ID)
	                          	);
                          	}

                          }

                          ksort($tagsArr);

                          foreach($tagsArr as $tag){
                          	foreach($tag->items as $key=>$item){
                          		$tag->items[$key]['rand'] = rand(0, 10);
                          	}
                          	$priority  = array_column($tag->items, 'priority');
                          	$rand  = array_column($tag->items, 'rand');
                          	array_multisort($priority, SORT_DESC, $rand, SORT_ASC, $tag->items);
                          }
                        ?>

						<div class="main-clients-tabs">
							<?php
							$counter = 0;
							foreach($tagsArr as $key=>$tag){
							$counter++;
							?>
							<a href="#ctab<?php echo $key; ?>" class="tab-link <?php if($counter == 1){?>active<?php } ?>">
								<?php echo $tag->name; ?>
							</a>
							<?php } ?>
						</div>

						<div class="tabs-container loading">
							<?php
							$counter = 0;
							foreach($tagsArr as $key=>$tag){
							$counter++;
							?>
							<div id="ctab<?php echo $key; ?>" class="tab ctab <?php if($counter == 1){?>active<?php } ?>">
								<div class="main-cl-slider" id="cslid<?php echo $counter; ?>">
									<?php
									$counter2 = 0;
									foreach($tag->items as $key=>$i){
									$item = $i['item'];
									$counter2 = $key + 1;
									?>

									<?php if($counter2 == 1 || $counter2%2 == 1){?>
									<div class="main-cl-slide">
									<?php } ?>

										<?php $imgURL = get_the_post_thumbnail_url( $item->ID, "full" );?>
	                                    <div class="main-cl-slider-item">
	                                        <img src="<?php echo $imgURL; ?>" alt="">
	                                    </div>

									<?php if($counter2%2 == 0 || $counter2 == count($tag->items)){?>
									</div>
									<?php } ?>


	                                <?php } ?>
								</div>
								<a href="#" data-slider="<?php echo $counter; ?>" class="main-cl-slider-prev ip-prev"></a>
								<a href="#" data-slider="<?php echo $counter; ?>" class="main-cl-slider-next ip-next"></a>
							</div>
							<?php } ?>
						</div>
					</div>
<?php }

function cartheader(){ ?>
	<?php
		global $woocommerce;
		$cartitems = $woocommerce->cart->get_cart();

	?>
	<a href="/cart/" class="btn-korz btn-korz-active">
		<i class="icon icon-korz"></i>
		<div class="orange-circle <?php if(count($cartitems) == 0){?>hide<?php } ?>">
			<?php echo count($cartitems); ?>
		</div>
	</a>
	<?php } ?>