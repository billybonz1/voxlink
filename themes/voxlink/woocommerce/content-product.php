<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;

// Ensure visibility
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
$id = $product->get_id();
$_product = wc_get_product( $id );
?>


	<div class="prouduct-item" data-id="<?php echo $id; ?>">

		<?php
		$sticker = get_field("sticker");
		?>

		<?php
		if($sticker == "hit"){
		?>

		<div class="product-sticker hit">
			Хит
		</div>

		<?php } ?>

		<?php
		if($sticker == "top"){
		?>

		<div class="product-sticker top">
			Топ
		</div>

		<?php } ?>



		<?php
		if($sticker == "action"){
		?>

		<div class="product-sticker action">
			Акция
		</div>

		<?php } ?>



		<a href="<?php the_permalink(); ?>">

			<?php
			$productIMG = get_the_post_thumbnail_url(get_the_ID(), "product_itm");
			if(empty($productIMG)){
				$productIMG = "/wp-content/themes/voxlink/img/no-photo.svg";
			}
			?>
			<span class="product-img" style="background-image: url(<?php echo $productIMG;?>);"></span>
			<h3><?php the_title(); ?></h3>

			<div class="product-rating">
			    <?php if ($average = $product->get_average_rating()) : ?>
			    	<?php
			    		$width = $average*100/5;
			    	?>
			        <div class="star-rating">
			        	<div class="star-rating-empty">
			        		<div class="sr-item"></div>
			        		<div class="sr-item"></div>
			        		<div class="sr-item"></div>
			        		<div class="sr-item"></div>
			        		<div class="sr-item"></div>
			        	</div>
			        	<div class="star-rating-full" style="width: <?php echo $width; ?>%">
			        		<div class="sr-item"></div>
			        		<div class="sr-item"></div>
			        		<div class="sr-item"></div>
			        		<div class="sr-item"></div>
			        		<div class="sr-item"></div>
			        	</div>
			        </div>
			    <?php endif; ?>
			</div>
			<div class="product-item-price">
				<?php echo $product->get_price_html(); ?>
			</div>
		</a>
		<div class="tac">
			<?php if(woo_in_cart($id)){?>
				<a href="/cart/" class="product-item-btn added_to_cart" title="Просмотр корзины">В корзине</a>
			<?php } else { ?>
				<a rel="nofollow" href="#" data-quantity="1" data-id="<?php echo $id;?>" class="product-item-btn add-to-cart">В корзину</a>
			<?php } ?>

			<div class="top-product-bookcomp">
				<?php echo to_compare($id); ?>
			</div>
		</div>
	</div>