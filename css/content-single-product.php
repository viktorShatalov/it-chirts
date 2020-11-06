<?php

/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
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

global $product; ?>
<!-- breadcumps -->
<nav id="breadcumbs">
    <?php woocommerce_breadcrumb() ?>
</nav>
<?php
/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked woocommerce_output_all_notices - 10
 */
do_action('woocommerce_before_single_product');

if (post_password_required()) {
    echo get_the_password_form(); // WPCS: XSS ok.
    return;
}
?>

<article class="product__card">
    <div class="product__card-top">
        <section class="product__card-left">
            <div class="product__card__img-sliders">
                <div class="slider-for">
                    <?php $images = $product->get_gallery_image_ids();
                    foreach ($images as $image) :
                    ?>
                        <div class="card__product-img">
                            <img src="<?= wp_get_attachment_image_url($image, 'full') ?>" alt="<?= $product->get_name() ?>">
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="slider-nav__box">
                    <div class="slider-nav">
                        <?php $images = $product->get_gallery_image_ids();
                        foreach ($images as $image) :
                        ?>
                            <div class="slider-nav__img"><img src="<?= wp_get_attachment_image_url($image, 'full') ?>" alt="<?= $product->get_name() ?>"></div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <div class="product__card-description">
                <ul>
                    <li>
                        <span>Состав</span>
                        <span>95% хлопок, 5% эластан. Ткань дышит и тянется.</span>
                    </li>
                    <li>
                        <span>Покрой</span>
                        <span>Подходит для мужской и женской фигуры.</span>
                    </li>
                    <li>
                        <span>Рисунок</span>
                        <span>Авторский</span>
                    </li>
                </ul>
            </div>
        </section>
        <section class="product__card-right">
            <h1>Футболка «Deadline is Coming», железный трон</h1>
            <div class="sku">
                <span class="in__stock"><img src="img/iconfinder_check_.svg" alt=""> В наличии</span>
                <!-- <span class="out__stock">Нет наличии</span> -->
                <span class="product__id">Код товара: <span>IT-030</span></span>
            </div>
            <div class="price_button">
                <span>439 грн.</span>
                <div class="quantity">
                    <button class="single_add_to_cart_button button alt">Купить</button>
                </div>
            </div>
            <div class="product__card-atribute">
                <div class="atribute__items item__type">
                    <span class="atribute__title">Тип</span>
                    <span class="t__shirt active item">Футболка</span>
                    <span class="hoody item">Толстовка</span>
                </div>
                <div class="atribute__items item__color">
                    <span class="atribute__title">Цвет</span>
                    <span class="white__color active item">Белая</span>
                    <span class="black__color item">Черная</span>
                </div>
                <div class="atribute__items item__size">
                    <span class="atribute__title">Размер</span>
                    <span class="atribute__size-xs active item">xs</span>
                    <span class="atribute__size-s item">s</span>
                    <span class="atribute__size-m item">m</span>
                    <span class="atribute__size-l item">l</span>
                    <span class="atribute__size-xl item">xl</span>
                    <span class="atribute__size-xxl item">xxl</span>
                </div>
            </div>
            <div class="table__size">
                <img src="img/shirt_sizes.svg" alt="Таблица размеров">
                <span>Таблица размеров</span>
                <div class="table__size-pseudo">
                    text
                </div>
            </div>
            <div class="product__card-right__description">
                <ul class="right__description-items">
                    <li class="right__description-item">
                        <img src="img/icon-mona-lisa-gray.png" alt="">
                        <strong>УНИКАЛЬНЫЙ РИСУНОК</strong>
                        <span class="item__tooltip-hover">авторская работа наших иллюстраторов</span>
                    </li>
                    <li class="right__description-item">
                        <img src="img/icon-washing-gray.png" alt="">
                        <strong>ДОЛГИЙ СРОК СЛУЖБЫ</strong>
                        <span class="item__tooltip-hover">высокое качество ткани и рисунка обеспечивает
                            износостойкость</span>
                    </li>
                    <li class="right__description-item">
                        <img src="img/icon-cotton-gray.png" alt="">
                        <strong>ПРЕМИАЛЬНОЕ КАЧЕСТВО</strong>
                        <span class="item__tooltip-hover">лучшая ткань и высочайшее качество пошива</span>
                    </li>
                    <li class="right__description-item">
                        <img src="img/icon-tshirt-gray.png" alt="">
                        <strong>СТИЛЬНЫЙ ПОКРОЙ</strong>
                        <span class="item__tooltip-hover">футболки отлично сидят на любой фигуре</span>
                    </li>
                </ul>
            </div>
        </section>
    </div>
</article>

<?php do_action('woocommerce_after_single_product'); ?>