<?php

// Template Name: Сравнение


get_header("shop");

$current_term = get_queried_object();
?>




<div class="main-content">
    <div class="inner">
        <div class="container-fluid">
			<?php
				if(isset($_COOKIE['compare'])){
					$compareItems = explode(",",$_COOKIE['compare']);
					$cats = [];
					foreach($compareItems as $item){
						$term = wp_get_post_terms($item,'product_cat')[0];
						$top_term = get_term_top_most_parent($term->term_id, 'product_cat');
						if(!isset($cats[$top_term->term_id])){
							$cats[$top_term->term_id] = array(
								"name" => $top_term->name,
								"slug" => $top_term->slug,
								"products" => [],
								"attrs" => []
							);
						}

						$WC_Product = new WC_Product($item);
						$options = $WC_Product->get_attributes( );

						$pattrs = [];


						foreach($options as $taxname=>$option){
							$valuesArr = [];
							foreach($option->get_data()['options'] as $value){
								$valuesArr[] = get_term($value, $taxname)->name;
							}
							$taxonomy = get_taxonomy( $taxname );
							$cats[$top_term->term_id]['attrs'][$taxname] = array(
								"name" => $taxonomy->labels->singular_name
							);
							$pattrs[$taxname] = array(
								"name" => $taxonomy->labels->singular_name,
								"value" => implode(",",$valuesArr)
							);
						}

						ksort($pattrs);

						$cats[$top_term->term_id]['products'][] = array(
							"id" => $item,
							"attrs" => $pattrs
						);
					}

					foreach($cats as $cat){
						ksort($cat['attrs']);
					}

			?>

				<div class="compare-container">
					<div class="compare-left">
						<h3>Категории товаров</h3>
						<select name="compare-cats">
							<?php foreach($cats as $cat){?>
							<option value="<?php echo $cat['slug']; ?>"><?php echo $cat['name']; ?></option>
							<?php } ?>
						</select>
						<div class="compare-cat-blocks">
						<?php
						$counter = 0;
						foreach($cats as $cat){
							$counter++;
						?>

							<div class="compare-cat-block <?php if($counter == 1){?>active<?php } ?>" data-slug="<?php echo $cat['slug']; ?>" >
								<div class="compare-clear">
									<div>
										<div class="compare-clear-icon"></div>
										Очистить список
									</div>
									<div class="compare-clear-count">
										<?php echo count($cat['products']); ?>
									</div>
								</div>
								<div class="compare-show">
									<h4>Отобразить</h4>
									<label>
										<input type="radio" checked="checked" name="show-options-<?php echo $cat['slug']; ?>" value="all"  />
										<span>Все характеристики</span>
									</label>
									<label>
										<input type="radio" name="show-options-<?php echo $cat['slug']; ?>" value="different" />
										<span>Только отличия</span>
									</label>
								</div>

								<div class="compare-options-list">
									<?php foreach($cat['attrs'] as $slug=>$attr){ ?>
										<div class="compare-option" data-slug="<?php echo $slug?>">
											<?php echo $attr['name']; ?>
										</div>
									<?php } ?>
								</div>
							</div>
						<?php } ?>
						</div>
					</div>
					<div class="compare-right">
						<?php
						$counter = 0;
						foreach($cats as $cat){
							$counter++;
							?>
							<div class="compare-cat-block <?php if($counter == 1){?>active<?php } ?>" data-slug="<?php echo $cat['slug']; ?>" >
								<div class="compare-slider owl-carousel">
									<?php foreach($cat['products'] as $p){?>
										<div class="compare-product">
											<?php
											$post_object = get_post( $p['id'] );

											setup_postdata( $GLOBALS['post'] =& $post_object );

											wc_get_template_part( 'content', 'product' ); ?>


											<div class="compare-del" data-id="<?php echo $p['id']; ?>">
												<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24" height="24" viewBox="0 0 24 24"><defs><path id="72zfa<?php echo $p['id']; ?>" d="M933.012 475c-6.627 0-12-5.373-12-12 0-6.628 5.373-12 12-12s12 5.372 12 12c0 6.627-5.373 12-12 12zm4.58-14.576a.578.578 0 0 0 0-.817l-1.226-1.225a.577.577 0 0 0-.817 0l-2.548 2.548-2.548-2.548a.577.577 0 0 0-.817 0l-1.226 1.225a.578.578 0 0 0 0 .817l2.549 2.548-2.549 2.548a.578.578 0 0 0 0 .817l1.226 1.225a.578.578 0 0 0 .817 0l2.548-2.548 2.548 2.548a.578.578 0 0 0 .817 0l1.225-1.225a.578.578 0 0 0 0-.817l-2.548-2.548z"/></defs><g><g transform="translate(-921 -451)"><use fill="#bfc3c7" xlink:href="#72zfa<?php echo $p['id']; ?>"/></g></g></svg>
											</div>

											<div class="compare-options">
												<?php foreach($cat['attrs'] as $slug=>$attr){ ?>
													<div class="compare-option" data-slug="<?php echo $slug?>">
														<strong><?php echo $attr['name']; ?></strong>
														<?php if(!isset($p['attrs'][$slug]['value'])){ ?>
															-
														<?php } else { ?>
															<?php echo $p['attrs'][$slug]['value']; ?>
														<?php } ?>
													</div>
												<?php } ?>
											</div>

										</div>
									<?php } ?>
								</div>
							</div>
						<?php } ?>
					</div>

					<?php
						$counter = 0;
						foreach($cats as $cat){
							$counter++;
							?>
							<div class="compare-cat-block <?php if($counter == 1){?>active<?php } ?>" data-slug="<?php echo $cat['slug']; ?>" >
								<?php
									$related_products = get_posts(array(
										"posts_per_page" => 4,
										"post_type" => "product",
										"post__not_in" => $compareItems,
										'tax_query' => array(
											'relation' => 'AND',
											array(
												'taxonomy' => "product_cat",
												'terms' => $cat['slug'],
												'field' => 'slug',
												'operator' => 'IN',
											)
										)
									));
								?>

								<?php if(count($related_products) > 0){?>
									<div class="compare-related">
										<section class="related products clearfix">

											<h2><?php esc_html_e( 'Related products', 'woocommerce' ); ?></h2>

											<div class="row">
											<?php foreach ( $related_products as $related_product ) : ?>

												<div class="col-md-3 col-sm-6 col-xs-6">
												<?php
												 	$post_object = get_post( $related_product->ID );

													setup_postdata( $GLOBALS['post'] =& $post_object );

													wc_get_template_part( 'content', 'product' ); ?>
												</div>

											<?php endforeach; ?>
											</div>
										</section>
									</div>
								<?php } ?>
							</div>
					<?php } ?>
				</div>

			<?php } else { ?>
				<div class="korzina-content"><div class="korzina-p"><img style="max-width: 300px;" src="/wp-content/themes/voxlink/img/scales.svg"><h2>В сравнении пока нет ни одного товара :(</h2><a href="/ip-pbx-hardware/" class="btn btn-orgkorzina">Вернуться назад</a></div></div>
			<?php } ?>
      	</div>
    </div>
	<?php get_template_part("inc/questions"); ?>
</div>
<?php get_footer("shop"); ?>
