<?php
/**
 * Simple product add to cart
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/add-to-cart/simple.php.
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
 * @version     3.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $product;

if ( ! $product->is_purchasable() ) {
	return;
}

echo wc_get_stock_html( $product );

if ( $product->is_in_stock() ) : ?>

	<?php do_action( 'woocommerce_before_add_to_cart_form' ); ?>

	<form class="cart single-add-to-cart" method="post" enctype='multipart/form-data'>
		<?php
			/**
			 * @since 2.1.0.
			 */
			do_action( 'woocommerce_before_add_to_cart_button' );

			/**
			 * @since 3.0.0.
			 */
			do_action( 'woocommerce_before_add_to_cart_quantity' );

		?>
		<div class="single-product-quantity">
			<div class="minus">-</div>
			<input type="text" class="input-text qty text" name="quantity" value="1" title="Кол-во" size="4" pattern="[0-9]*" readonly>
			<div class="plus">+</div>
		</div>


		<?php
			/**
			 * @since 3.0.0.
			 */
			do_action( 'woocommerce_after_add_to_cart_quantity' );
		?>

		<?php if(woo_in_cart($product->get_id())){?>
			<a href="/cart/" class="product-item-btn added_to_cart" title="Просмотр корзины">В корзине</a>
		<?php } else { ?>
			<a rel="nofollow" href="#" data-quantity="1" data-id="<?php echo $product->get_id();?>" class="product-item-btn add-to-cart">В корзину</a>
		<?php } ?>


		<div class="top-product-bookcomp">
			<?php to_compare($product->get_id()); ?>
		</div>
		<?php
			/**
			 * @since 2.1.0.
			 */
			do_action( 'woocommerce_after_add_to_cart_button' );
		?>
	</form>

	<?php do_action( 'woocommerce_after_add_to_cart_form' ); ?>

<?php endif; ?>
