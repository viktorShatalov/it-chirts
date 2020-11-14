<?php
/*
Template Name: Офрмление заказа
*/
?>
<?php get_header() ?>

<div id="checkout">

	<section id="main__wrapper">
		<div class="main__content">
			<!-- header -->
			<?php $path_file = locate_template('menu_shop_head.php');
			load_template($path_file);
			?>
			<!-- main -->
			<main id="main">
				<div class="container">
					<h1>Оформление заказа</h1>
					<div class="checkout__content">
						<?php while (have_posts()) {
							the_post();
							the_content();
						} ?>
					</div>
				</div>
			</main>
			<!-- footer -->
			<footer id="footer">
				<div class="container">
					<p>© Интернет-магазин брендовой одежды для IT-сообщества IT-shirts™ Все изображения являются
						собственностью магазина и охраняются авторским правом.</p>
				</div>
			</footer>
		</div>
		<script>
			jQuery(document).ready(function($) {
				jQuery("input[name=billing_first_name]").prop('required', true);
				jQuery("input[name=billing_phone]").prop('required', true);
				jQuery("input[name=billing_email]").prop('required', true);
				jQuery("input[name=checkbox_choice]").prop('required', false);

                const value_country = jQuery('select[name=billing_country]');

				value_country.on('change', function() {
					if (jQuery(this).val() === 'RU' || jQuery(this).val() === 'BY') {
						setTimeout(function() {
							location.href = "/checkout/?currency=RUB"
						}, 500);
					} else {
						setTimeout(function() {
							location.href = "/checkout/?currency=UAH"
						}, 500);
					}
				});

				if (value_country.val() === 'RU' || value_country.val() === 'BY'){
                    setTimeout(function() {
                        jQuery('.payment_method_bacs').remove();
                    }, 1000);
                }

			})
		</script>
	</section>
</div>

<?php get_footer() ?>