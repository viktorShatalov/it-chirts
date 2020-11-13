<?php

/**
 * Review order table
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/review-order.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.8.0
 */

defined('ABSPATH') || exit;
?>
<table class="shop_table woocommerce-checkout-review-order-table">

    <tbody>
        <?php
        do_action('woocommerce_review_order_before_cart_contents');

        foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) {
            $_product = apply_filters('woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key);

            if ($_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters('woocommerce_checkout_cart_item_visible', true, $cart_item, $cart_item_key)) {
        ?>
                <tr class="<?php echo esc_attr(apply_filters('woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key)); ?>">
                    <td class="product_img">
                        <img src="<?= wp_get_attachment_image_url($_product->get_image_id(), 'full') ?>" alt="">
                    </td>
                    <td class="product-name">
                        <span class="name"><?= $_product->parent->name ?></span>
                        <span class="color_pa"><?= $_product->get_attribute('pa_color'); ?>, <?= $_product->get_attribute('pa_size'); ?></span>

                        <span class="quantity"><?= $cart_item['quantity'] ?> шт. = <?= apply_filters('woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal($_product, $cart_item['quantity']), $cart_item, $cart_item_key); ?></span>
                    </td>
                </tr>
        <?php
            }
        }

        do_action('woocommerce_review_order_after_cart_contents');
        ?>
    </tbody>
    <tfoot>

        <tr class="cart-subtotal">
            <td><?php esc_html_e('Итого:', 'woocommerce'); ?><?php wc_cart_totals_subtotal_html(); ?></td>
        </tr>
        <tr id="shipping__pseudo">
            <?php if (WC()->cart->needs_shipping() && WC()->cart->show_shipping()) : ?>

                <?php do_action('woocommerce_review_order_before_shipping'); ?>

                <?php wc_cart_totals_shipping_html(); ?>

                <?php do_action('woocommerce_review_order_after_shipping'); ?>

            <?php endif; ?>
        </tr>

        <?php foreach (WC()->cart->get_coupons() as $code => $coupon) : ?>
            <tr class="cart-discount coupon-<?php echo esc_attr(sanitize_title($code)); ?>">
                <th><?php wc_cart_totals_coupon_label($coupon); ?></th>
                <td><?php wc_cart_totals_coupon_html($coupon); ?></td>
            </tr>
        <?php endforeach; ?>



        <?php foreach (WC()->cart->get_fees() as $fee) : ?>
            <tr class="fee">
                <th><?php echo esc_html($fee->name); ?></th>
                <td><?php wc_cart_totals_fee_html($fee); ?></td>
            </tr>
        <?php endforeach; ?>

        <?php if (wc_tax_enabled() && !WC()->cart->display_prices_including_tax()) : ?>
            <?php if ('itemized' === get_option('woocommerce_tax_total_display')) : ?>
                <?php foreach (WC()->cart->get_tax_totals() as $code => $tax) : // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited 
                ?>
                    <tr class="tax-rate tax-rate-<?php echo esc_attr(sanitize_title($code)); ?>">
                        <th><?php echo esc_html($tax->label); ?></th>
                        <td><?php echo wp_kses_post($tax->formatted_amount); ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <tr class="tax-total">
                    <th><?php echo esc_html(WC()->countries->tax_or_vat()); ?></th>
                    <td><?php wc_cart_totals_taxes_total_html(); ?></td>
                </tr>
            <?php endif; ?>
        <?php endif; ?>

        <?php do_action('woocommerce_review_order_before_order_total'); ?>

        <tr class="order-total">
            <td><span id="show__modalCart">Изменить заказ</span><span class="order-total__total-sum"><?php esc_html_e('К оплате:', 'woocommerce'); ?><?php wc_cart_totals_order_total_html(); ?></span></td>
        </tr>

        <?php do_action('woocommerce_review_order_after_order_total'); ?>
        <script>
            jQuery(document).ready(function($) {
                const modalOpen = document.getElementById("cart")
                const show__modalCart = document.getElementById("show__modalCart");
                jQuery(show__modalCart).on("click", function(e) {
                    $(modalOpen).trigger(e.type);
                });
            })
        </script>
    </tfoot>
</table>