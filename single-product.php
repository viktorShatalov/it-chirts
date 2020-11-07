<?php

/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     1.6.4
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly
}

get_header('shop'); ?>
<div id="content__wrapper">
	<?php
	/**
	 * woocommerce_sidebar hook.
	 *
	 * @hooked woocommerce_get_sidebar - 10
	 */
	do_action('woocommerce_sidebar');
	?>
	<div class="right__content">
		<section id="main__wrapper">
			<div class="main__content">
				<div class="product__card-content">
					<!-- header -->
					<?php $path_file = locate_template('menu_shop_head.php');
					load_template($path_file);
					?>
					<?php
					remove_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
					remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);
					/**
					 * woocommerce_before_main_content hook.
					 *
					 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content) ---
					 * @hooked woocommerce_breadcrumb - 20
					 */
					do_action('woocommerce_before_main_content');
					?>

					<!-- main -->
					<main id="main" class="container">
						<?php while (have_posts()) : ?>
							<?php the_post(); ?>

							<?php wc_get_template_part('content', 'single-product'); ?>

						<?php endwhile; // end of the loop. 
						?>
					</main>
					<?php
					remove_action('woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
					/**
					 * woocommerce_after_main_content hook.
					 *
					 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
					 */
					do_action('woocommerce_after_main_content');
					?>
				</div>
				<!-- footer -->
				<footer id="footer">
					<div class="container">
						<p>© Интернет-магазин брендовой одежды для IT-сообщества IT-shirts™ Все изображения являются
							собственностью магазина и охраняются авторским правом.</p>
					</div>
				</footer>
			</div>
		</section>
	</div>

</div>
<script>
	// zoom
	jQuery(document).ready(function($) {
		$(".card__product-img").zoom({});
	})
</script>
<?php
get_footer('shop');

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
