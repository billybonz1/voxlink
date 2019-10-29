<?php

// Template Name: Закладки

if(!isset($_GET['ajax'])){


get_header("shop");

$current_term = get_queried_object();
?>




<div class="main-content">
      <div class="inner">
        <div class="container-fluid">
          <div class="row">
				<div class="col-md-9 col-xs-12">
	                <div class="main-content-left main-content-left-pcat">


							<div class="row">

<?php } ?>

<?php if(!isset($_GET['ajax']) || $_GET['ajax'] == 1){ ?>

								<?php if(isset($_COOKIE['bookmarks'])){?>
									<?php $currentCat = get_queried_object(); ?>
									<div class="filterBlock" data-current-termid="<?php echo $currentCat->term_id ;?>">
										<?php

											global $wp_query;
											$compareString = $_COOKIE['bookmarks'];
		                                    $compareArr = explode(",", $compareString);
											$args = array(
							                    'post_type' => "product",
							                    'posts_per_page' => 9,
							                    "post__in" => $compareArr
							                );


							                $wp_query = new WP_Query( $args );


											?>
											<?php if ( have_posts() ) : ?>
												<div class="col-md-12">
													<?php wc_print_notices(); ?>
												</div>
												<div class="col-md-12 products-sorting">
													<p class="woocommerce-result-count" data-total="15">
														<!--Отображаются все <?php echo count($compareArr); ?>-->
													</p>
													<div>
														<form class="woocommerce-ordering has-validation-callback" method="get">
														<p>Сортировка</p>
														<select name="orderby" class="orderby">
															<option value="menu_order" selected="selected">Исходная сортировка</option>
															<option value="popularity">По популярности</option>
															<option value="rating">По рейтингу</option>
															<option value="date">По новизне</option>
															<option value="price">Цены: по возрастанию</option>
															<option value="price-desc">Цены: по убыванию</option>
														</select>
														</form>
													</div>


												</div>
												<div class="clearfix"></div>
													<?php woocommerce_product_loop_start(); ?>

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
															<div class="bookmarks-product">
																<?php wc_get_template_part( 'content', 'product' ); ?>
																<div class="bookmark-remove"></div>
															</div>

														</div>
													<?php endwhile; // end of the loop. ?>

													<?php woocommerce_product_loop_end(); ?>

												<div class="clearfix"></div>


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
			                    <?php } else { ?>
			                    	<div class="col-md-12 bookmarks-not-found">
										В закладках пока нет ни одного товара :(
									</div>
			                    <?php } ?>

<?php } ?>
<?php if(!isset($_GET['ajax'])){ ?>

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


			                    <div class="col-md-12">

			                      	<?php get_template_part("inc/questions"); ?>

			                    </div>

			                 </div>
                	</div>
              	</div>
<?php } ?>

<?php if(!isset($_GET['ajax']) || $_GET['ajax'] == 2){ ?>
              	<div class="col-md-3 col-xs-12 main-xs-pad">
					<div class="bookmarks-sidebar">
						<h3>
							Товары в закладках
						</h3>
						<div class="bookmarks-table">
							<div class="bookmarks-table-item">
								<div>Число товаров</div>
								<strong><?php echo count($compareArr); ?> шт.</strong>
							</div>
						</div>
					</div>

				</div>
<?php } ?>

<?php if(!isset($_GET['ajax'])){ ?>
        </div>
      </div>
    </div>

<?php get_footer("shop");
}
?>
