<?php
/**
 * The template for displaying product category thumbnails within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product_cat.php.
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
 * @version 2.6.1
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<div class="col-md-4 col-sm-4 col-xs-6">
	<?php do_action( 'woocommerce_before_subcategory', $category ); ?>
	<div class="main-item">
		<div class="main-item-img">
			<?php do_action( 'woocommerce_before_subcategory_title', $category ); ?>
		</div>
		<p><?php echo $category->name ?></p>
		<span>
			<?php
				plural_form(
				  $category->category_count,
				  array('товар','товара','товаров')
				);
			?>
		</span>
	</div>
	<?php do_action( 'woocommerce_after_subcategory', $category ); ?>
</div>

