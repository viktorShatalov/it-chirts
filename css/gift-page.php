<?php defined('ABSPATH') || exit;

global $product; ?>
<!-- breadcumps -->
<nav id="breadcumbs">
	<?php woocommerce_breadcrumb(); ?>
</nav>

<div class="content gift">
	<h1><?= $product->get_name() ?></h1>
	<div class="gift__content">
		<div class="gift__content-left">
			<?= wpautop($product->get_description()); ?>
		</div>
		<div class="gift__content-right">
			<strong><?= $product->get_name() ?></strong>
			<p class="gift__content-right-description"><?= $product->get_short_description(); ?></p>
			<?php woocommerce_template_single_add_to_cart() ?>
			<a href="#" class="gift__content-right__addToCart">Купить</a>
		</div>
		<script>
			jQuery(document).ready(function($) {
				// card-single-product settings
				const modalOpen = document.getElementById("cart")
				const addToCart = document.querySelector(".single_add_to_cart_button");
				const pseudoCartBtn = document.querySelector(".gift__content-right__addToCart");
				// для ajax добовления вариативного товара
				jQuery(pseudoCartBtn).on("click", function(e) {
					let text = $('input[name="variation_id"]').val()
					$('input[name="product_id"]').val(text);
					$('input[name="add-to-cart"]').val(text);
					$(addToCart).trigger(e.type);
					setTimeout(function() {
						$(modalOpen).trigger(e.type)
					}, 1000)
				});
			})
		</script>
	</div>
</div>