<?php

global $product;
$id = $product->get_id();
$_product = wc_get_product( $id );

$productIMG = get_the_post_thumbnail_url(get_the_ID(), "product_itm");
if(empty($productIMG)){
	$productIMG = "/wp-content/themes/voxlink/img/no-photo.svg";
}

?>
<?php
	$sticker = get_field("sticker");
?>

<div class="row">
	<div class="col-sm-5">
	    <a href="<?php the_permalink(); ?>">
	        <img src="<?php echo $productIMG;?>" alt="<?php the_title(); ?>" />
	    </a>
	</div>
	<div class="col-sm-7">
		<?php
		if($sticker == "hit"){
		?>
		<div class="top-product-sticker hit">
			Хит продаж
		</div>
		<?php } ?>

		<?php
		if($sticker == "top"){
		?>
		<div class="top-product-sticker top">
			Топ продаж
		</div>
		<?php } ?>

		<?php
		if($sticker == "action"){
		?>
		<div class="top-product-sticker action">
			Акция
		</div>
		<?php } ?>




		<div class="top-product-rating">
			<span class="icon icon-product-rating"></span>
			<span class="icon icon-product-rating"></span>
			<span class="icon icon-product-rating"></span>
			<span class="icon icon-product-rating"></span>
			<span class="icon icon-product-rating"></span>
		</div>

        <a href="<?php the_permalink(); ?>">
            <h3><?php the_title(); ?></h3>
        </a>
		<div class="top-product-price">
			<?php echo $product->get_price_html(); ?>
		</div>
		<?php the_excerpt(); ?>
		<a href="#" data-quantity="1" data-id="<?php echo $id; ?>" class="top-product-btn add-to-cart">В корзину</a>

		<div class="top-product-bookcomp pull-left">
			<?php echo to_compare($id); ?>
		</div>

		<div class="tp-clearfix"></div>

		<a href="<?php the_permalink(); ?>" class="top-product-link pull-right">
			<span>Подробнее</span>
			<i class="icon icon-arr-right"></i>
		</a>

	</div>
</div>