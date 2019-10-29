<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.4.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}



if(!isset($_GET['ajax'])){


get_header( 'shop' );

$current_term = get_queried_object();
?>




<div class="main-content">
      <div class="inner">
        <div class="container-fluid">
          <div class="row">
				<div class="col-md-9 col-xs-12">
	                <div class="main-content-left main-content-left-pcat">

	                	<?php
	                		// is_post_type_archive("product") || is_product_category()
	                		$terms = [];

	                		$topproductsArgs = array(
		                		"post_type" => "product",
		                		"posts_per_page" => -1,
		                		"meta_query" => array(
		                			"relation" => "AND",
		                			array(
		                				"key" => "sticker",
		                				"value" => array("hit", "top", "action"),
		                				"compare" => "IN"
		                			)
		                		)
		                	);

		                	if(is_product_category()){
		                		$topproductsArgs['tax_query'] = array(
		                			"relation" => "AND",
		                			array(
		                				"taxonomy" => "product_cat",
		                				"field" => "term_id",
		                				"terms" => $current_term->term_id,
		                				"operator" => "IN",
		                				"include_children" => true
		                			)
		                		);
		                	}

	                		$topproducts = get_posts($topproductsArgs);

							foreach($topproducts as $p){
								if(is_post_type_archive("product")){
									$cats = wp_get_object_terms( $p->ID,  'product_cat' );
									$term = get_term_top_most_parent($cats[0]->term_id,$cats[0]->taxonomy);

								}else if(is_product_category()){
									$term = $current_term;
								}
								$termid = $term->term_id;

								if(!isset($terms[$termid])){
									$terms[$termid] = [];
									$terms[$termid]['term'] = $term;
								}

								if(!isset($terms[$termid]['products'])){
									$terms[$termid]['products'] = [];
								}
								$terms[$termid]['products'][] = $p;

							}

		                ?>


						<?php if(is_post_type_archive("product")){?>
							<?php if(count($terms) > 0){?>
							<div class="products-cat-slider" data-items="7">
									<div id="products-cat-slider" class="cats-slider">
										<?php
										$counter = 0;
										foreach($terms as $key=>$term){
											$icon = get_field("icon2", "product_cat_".$key);
										?>
										<a href="#cat<?php echo $key; ?>" title="<?php echo $term['term']->name; ?>" class="products-cat-slide <?php if ($counter == 0){?>selected<?php } ?>">
											<img src="<?php echo $icon;?>" alt="<?php echo $term['term']->name; ?>">
										</a>
										<?php
											$counter++;
										}
										?>
									</div>


									<div class="products-cat-arr-left products-cat-arr">
            							<svg width="39" height="39" viewBox="0 0 39 39"><defs><path id="a" d="M410 349a18 18 0 1 1 0 36 18 18 0 0 1 0-36z"/><path id="b" d="M413.99 361.34l-2.46-2.4-8.08 8.02 8.08 8.01 2.4-2.4-5.62-5.62z"/></defs><g transform="translate(-390 -347)"><use fill="#263139" xlink:href="#a"/></g><g transform="translate(-390 -347)"><use fill="#fff" xlink:href="#b"/></g></svg>
            						</div>

            						<div class="products-cat-arr-right products-cat-arr">
            							<svg width="39" height="39" viewBox="0 0 39 39"><defs><path id="a1" d="M1210 349a18 18 0 1 1 0 36 18 18 0 0 1 0-36z"/><path id="b1" d="M1205.45 361.34l2.46-2.4 8.08 8.02-8.08 8.01-2.4-2.4 5.61-5.62z"/></defs><g transform="translate(-1190 -347)"><use fill="#263139" xlink:href="#a1"/></g><g transform="translate(-1190 -347)"><use fill="#fff" xlink:href="#b1"/></g></svg>
            						</div>
							</div>
							<?php } ?>
						<?php } ?>
							<div class="clearfix"></div>
						<?php if(count($topproducts) > 0){?>
							<div class="top-products">
								<?php
								$counter = 0;
								foreach($terms as $key=>$term){
								?>
								<div id="cat<?php echo $key; ?>" class="top-product <?php if ($counter == 0){?>active<?php } ?>">
									<div class="top-product-slider owl-carousel">
										<?php foreach($term['products'] as $product){
											setup_postdata( $GLOBALS['post'] =& $product );
											?>
											<?php wc_get_template_part( 'content', 'productTop' ); ?>
										<?php }
										wp_reset_postdata();
										?>
									</div>

								</div>
								<?php
									$counter++;
								}
								?>
							</div>
						<?php } ?>
							<div class="row">

<?php } ?>

<?php if(!isset($_GET['ajax']) || $_GET['ajax'] == 1){ ?>
								<?php $currentCat = get_queried_object(); ?>
								<div class="filterBlock" data-current-termid="<?php echo $currentCat->term_id ;?>">

										<?php if ( have_posts() ) : ?>
											<div class="col-md-12">
												<?php wc_print_notices(); ?>
											</div>
											<div class="col-md-12 products-sorting">
												<?php
													/**
													 * woocommerce_before_shop_loop hook.
													 *
													 * @hooked wc_print_notices - 10
													 * @hooked woocommerce_result_count - 20
													 * @hooked woocommerce_catalog_ordering - 30
													 */
													// do_action( 'woocommerce_before_shop_loop' );

													woocommerce_result_count();
												?>
												<div>
													<?php
														woocommerce_catalog_ordering();
													?>
													<div class="mobile-filter-open">
													  <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" width="512px" height="512px" viewBox="0 0 402.577 402.577" style="enable-background:new 0 0 402.577 402.577;" xml:space="preserve" class=""><g><g>
														<path d="M400.858,11.427c-3.241-7.421-8.85-11.132-16.854-11.136H18.564c-7.993,0-13.61,3.715-16.846,11.136   c-3.234,7.801-1.903,14.467,3.999,19.985l140.757,140.753v138.755c0,4.955,1.809,9.232,5.424,12.854l73.085,73.083   c3.429,3.614,7.71,5.428,12.851,5.428c2.282,0,4.66-0.479,7.135-1.43c7.426-3.238,11.14-8.851,11.14-16.845V172.166L396.861,31.413   C402.765,25.895,404.093,19.231,400.858,11.427z" data-original="#000000" class="active-path" data-old_color="#f57c00" fill="#f57c00"/>
														</g></g>
														</svg>
														<span>Фильтр</span>
													</div>
												</div>


											</div>
											<div class="clearfix"></div>





												<?php woocommerce_product_loop_start(); ?>

												<?php woocommerce_product_subcategories(); ?>

												<?php while ( have_posts() ) : the_post(); ?>

													<?php
														/**
														 * woocommerce_shop_loop hook.
														 *
														 * @hooked WC_Structured_Data::generate_product_data() - 10
														 */
														do_action( 'woocommerce_shop_loop' );
													?>
													<div class="col-md-4 col-sm-4 col-xs-6">
													<?php wc_get_template_part( 'content', 'product' ); ?>
													</div>
												<?php endwhile; // end of the loop. ?>

												<?php woocommerce_product_loop_end(); ?>

											<div class="clearfix"></div>
											<div class="products-end"></div>
										<?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>

											<?php
												/**
												 * woocommerce_no_products_found hook.
												 *
												 * @hooked wc_no_products_found - 10
												 */
												do_action( 'woocommerce_no_products_found' );
											?>

										<?php endif; ?>


				                    	<div class="clearfix"></div>

			                    </div>

<?php } ?>
<?php if(!isset($_GET['ajax'])){ ?>
								<?php if(!is_shop()){?>
								<div class="col-md-12">
									<div class="delivery clearfix">
										<i class="icon icon-truck"></i>
										<span>
											Доставка по Москве от <strong>500 руб.</strong>
										</span>


										<a href="#" class="pull-right">Условия доставки по всей России</a>
									</div>

									<div class="product-line"></div>
								</div>

								<?php } ?>


			                    <div class="col-md-12">
				                   	<?php if(is_shop()){?>
				                      <div class="inner-content">
				                        <div class="row">
				                          <div class="col-sm-6">
				                            <h2>Качественное оборудование <br> для IP-телефонии</h2>
				                            <p>
				                            	Перераспределение бюджета нейтрализует институциональный целевой сегмент рынка. Бизнес-план парадоксально изменяет ролевой медийный канал.
				                            </p>
				                            <p>
				                            	Изменение глобальной стратегии, отбрасывая подробности, охватывает конструктивный инструмент маркетинга. План размещения деятельно ускоряет ролевой побочный PR-эффект. Метод изучения рынка, безусловно, упорядочивает отраслевой стандарт, осознав маркетинг как часть производства.
				                            </p>
				                          </div>
				                          <div class="col-sm-6">
				                            <img src="/wp-content/themes/voxlink/minimg/obmain.jpg">
				                          </div>
				                        </div>
				                      </div>
				                    <?php } ?>

			                      	<?php get_template_part("inc/questions"); ?>



			                    </div>

			                 </div>
                	</div>
              	</div>
<?php } ?>

<?php if(!isset($_GET['ajax']) || $_GET['ajax'] == 2){ ?>
              	<div class="col-md-3 col-xs-12 main-xs-pad">
					<?php
						/**
						 * woocommerce_sidebar hook.
						 *
						 * @hooked woocommerce_get_sidebar - 10
						 */
						do_action( 'woocommerce_sidebar' );
					?>

				</div>
<?php } ?>

<?php if(!isset($_GET['ajax'])){ ?>
        </div>
      </div>
    </div>

	<div class="finding-products" style="display: none;">
       Найдено товаров: <span>0</span>
       <a href="#">Показать</a>
    </div>

<?php
}
if(!isset($_GET['ajax'])){
	get_footer( 'shop' );
}
?>
