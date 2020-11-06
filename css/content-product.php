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
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined('ABSPATH') || exit;

global $product;

// Ensure visibility.
if (empty($product) || !$product->is_visible()) {
    return;
}
?>
<li class="product__item">
    <a href="<?= get_permalink() ?>">
        <span class="product__item-img">
            <?php $images = $product->get_gallery_image_ids(); ?>
            <img class="item__img-top" src="<?= wp_get_attachment_image_url($product->get_image_id(), 'full') ?>" alt="">
            <img class="item__img-bottom" src="<?= wp_get_attachment_image_url($images[0], 'full') ?>" alt="">
        </span>
        <span class="product__item-title"><?= $product->get_name() ?></span>
        <span class="product__item-price">
            <span class="woocommerce-Price-amount amount"><?= $product->get_price(); ?>
                <span class="woocommerce-Price-currencySymbol">грн.</span>
            </span>
            <?php if ($product->get_stock_status() == 'instock') : ?>
                <span class="in__stock">в наличии</span>
            <?php else : ?>
                <span class="out__stock">нет наличии</span>
            <?php endif; ?>
        </span>
        <a href="<?= get_permalink() ?>" class="add_to_cart_button">Смотреть</a>
    </a>
</li>