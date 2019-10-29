<?php
/**
 * Single Product tabs
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/tabs/tabs.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.4.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
global $product;
/**
 * Filter tabs and allow third parties to add their own.
 *
 * Each tab is an array containing title, callback and priority.
 * @see woocommerce_default_product_tabs()
 */
$tabs = apply_filters( 'woocommerce_product_tabs', array() );

if ( ! empty( $tabs ) ) : ?>


	<?php
	$id = get_the_ID();
	$options = $product->get_attributes();

	?>
	<div class="woocommerce-tabs wc-tabs-wrapper">
		<ul class="tabs wc-tabs" role="tablist">
			<?php if(count($options) > 0){?>
				<li class="options_tab" id="tab-title-options" role="tab" aria-controls="tab-options">
					<a href="#tab-options">Характеристики товара</a>
				</li>
			<?php } ?>
			<?php foreach ( $tabs as $key => $tab ) : ?>
				<li class="<?php echo esc_attr( $key ); ?>_tab" id="tab-title-<?php echo esc_attr( $key ); ?>" role="tab" aria-controls="tab-<?php echo esc_attr( $key ); ?>">
					<a href="#tab-<?php echo esc_attr( $key ); ?>"><?php echo apply_filters( 'woocommerce_product_' . $key . '_tab_title', esc_html( $tab['title'] ), $key ); ?></a>
				</li>
			<?php endforeach; ?>
		</ul>
		<?php if(count($options) > 0){?>
			<div class="woocommerce-Tabs-panel woocommerce-Tabs-panel--options panel entry-content wc-tab" id="tab-options" role="tabpanel" aria-labelledby="tab-title-options">
				<div class="options">

						<div class="options__list">
							<?php foreach($options as $name=>$option){?>
							<div class="clearfix">
								<div class="options__list__name">
									<?php
										$taxonomy = get_taxonomy( $name );

									?>
									<span><?php echo $taxonomy->labels->singular_name; ?></span>
								</div>
								<div class="options__list__value">
									<?php
										$values = array();
										foreach($option->get_data()['options'] as $value){?>
										<?php
											$term = get_term_by( "id", $value, $name);
											$values[] = $term->name;
										?>
									<?php } ?>
									<span><?php echo join(",", $values); ?></span>
								</div>
							</div>
							<?php } ?>
						</div>

				</div>

			</div>
		<?php } ?>
		<?php foreach ( $tabs as $key => $tab ) : ?>
			<div class="woocommerce-Tabs-panel woocommerce-Tabs-panel--<?php echo esc_attr( $key ); ?> panel entry-content wc-tab" id="tab-<?php echo esc_attr( $key ); ?>" role="tabpanel" aria-labelledby="tab-title-<?php echo esc_attr( $key ); ?>">
				<?php if ( isset( $tab['callback'] ) ) { call_user_func( $tab['callback'], $key, $tab ); } ?>
			</div>
		<?php endforeach; ?>
	</div>

<?php endif; ?>
