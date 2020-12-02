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
    <?php woocommerce_breadcrumb(); ?>
</nav>
<script>
    jQuery(document).ready(function($) {
        // card-single-product settings
        const modalOpen = document.getElementById("cart")
        const addToCart = document.querySelector(".single_add_to_cart_button");
        const pseudoCartBtn = document.getElementById("pseudoCartBtn");
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

        /** Отключаем ссылки для меню подкатегорий в подкатегориях (для робота) */
        jQuery('.subcategory__menu-items').find('a').attr('rel', 'nofollow');
    })
</script>
<?php $terms = $product->get_category_ids();

/** Выбираем только подкатегорию (исключаем родительские категории с ID 43, 16) */
$new_terms = [];
foreach ($terms as $key => $item) {
    if ($item == 16 || $item == 43) {
        continue;
    } else {
        $new_terms[] = $item;
    }
}
//pr($terms);
//pr($new_terms);
if (in_array(16, $terms)) : ?>
    <nav class="subcategory__menu">
        <ul class="subcategory__menu-items">
            <?php
            /** Для товаров из категории ПРОГРАММИСТУ */
            if (in_array(16, $terms)) {
                wp_nav_menu([
                    'theme_location' => 'sub_footbolki',
                    'container'      => false,        // Убираем контейнер у меню, можно добавить свой
                    'items_wrap'     => '%3$s', // Убираем обёртку <ul>
                    'menu_class'     => '',
                ]);
            ?>
                <script>
                    jQuery(document).ready(function($) {
                        /** Делаем активным элемент в меню подкатегорий (шапка) */
                        $('#<?= $new_terms[0] ?>').children('a').attr('aria-current', 'page');

                        /** Делаем активным элемент меню ФУТБОЛКИ -> ПРОГРАММИСТУ (меню в сайдбаре) */
                        $('#16').children('a').attr('aria-current', 'page');

                        /** Открываем сслыку на подкатегорию для робота */
                        jQuery('.subcategory__menu-items').find('a[aria-current="page"]').removeAttr('rel', 'nofollow');
                    });
                </script>
            <?php } ?>
        </ul>
    </nav>
<?php endif; ?>
<script>
    jQuery(document).ready(function($) {
        /** Делаем активным элемент меню в сайдбаре */
        $('#<?= $new_terms[0] ?>').children('a').attr('aria-current', 'page');
    });
</script>
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

<article itemscope itemtype="http://schema.org/Product" class="product__card summary entry-summary tolst">
    <div class="product__card-top">
        <section class="product__card-left">
            <meta itemprop="image" content="<?= wp_get_attachment_image_url($product->get_image_id(), 'full') ?>" />
            <div class="product__card__img-sliders">
                <div class="slider-for">
                    <?php
                    if (carbon_get_theme_option('black_remove_tolst') && carbon_get_theme_option('white_remove_tolst')) : ?>
                        <div class="card__product-img" style="background-image: url(<?= carbon_get_theme_option('back_tolst_grey') ?>);">
                            <img src="<?= carbon_get_post_meta($product->get_id(), 'product_print_white') ?>" alt="">
                        </div>
                    <?php elseif (carbon_get_theme_option('gray_remove_tolst') && carbon_get_theme_option('black_remove_tolst')) : ?>
                        <div class="card__product-img" style="background-image: url(<?= carbon_get_theme_option('back_tolst_white') ?>);">
                            <img src="<?= carbon_get_post_meta($product->get_id(), 'product_print_white') ?>" alt="">
                        </div>
                    <?php elseif (carbon_get_theme_option('gray_remove_tolst') && carbon_get_theme_option('white_remove_tolst')) : ?>
                        <div class="card__product-img" style="background-image: url(<?= carbon_get_theme_option('back_tolst_black') ?>);">
                            <img src="<?= carbon_get_post_meta($product->get_id(), 'product_print_black') ?>" alt="">
                        </div>
                    <?php elseif (carbon_get_theme_option('white_remove_tolst')) : ?>
                        <div class="card__product-img" style="background-image: url(<?= carbon_get_theme_option('back_tolst_black') ?>);">
                            <img src="<?= carbon_get_post_meta($product->get_id(), 'product_print_black') ?>" alt="">
                        </div>
                        <div class="card__product-img" style="background-image: url(<?= carbon_get_theme_option('back_foot_grey') ?>);">
                            <img src="<?= carbon_get_post_meta($product->get_id(), 'product_print_white') ?>" alt="">
                        </div>
                    <?php elseif (carbon_get_theme_option('black_remove_tolst')) : ?>
                        <div class="card__product-img" style="background-image: url(<?= carbon_get_theme_option('back_tolst_white') ?>);">
                            <img src="<?= carbon_get_post_meta($product->get_id(), 'product_print_white') ?>" alt="">
                        </div>
                        <div class="card__product-img" style="background-image: url(<?= carbon_get_theme_option('back_tolst_grey') ?>);">
                            <img src="<?= carbon_get_post_meta($product->get_id(), 'product_print_white') ?>" alt="">
                        </div>
                    <?php elseif (carbon_get_theme_option('gray_remove_tolst')) : ?>
                        <div class="card__product-img" style="background-image: url(<?= carbon_get_theme_option('back_tolst_white') ?>);">
                            <img src="<?= carbon_get_post_meta($product->get_id(), 'product_print_white') ?>" alt="">
                        </div>
                        <div class="card__product-img" style="background-image: url(<?= carbon_get_theme_option('back_tolst_black') ?>);">
                            <img src="<?= carbon_get_post_meta($product->get_id(), 'product_print_black') ?>" alt="">
                        </div>
                    <?php else : ?>
                        <div class="card__product-img" style="background-image: url(<?= carbon_get_theme_option('back_tolst_white') ?>);">
                            <img src="<?= carbon_get_post_meta($product->get_id(), 'product_print_white') ?>" alt="">
                        </div>
                        <div class="card__product-img" style="background-image: url(<?= carbon_get_theme_option('back_tolst_black') ?>);">
                            <img src="<?= carbon_get_post_meta($product->get_id(), 'product_print_black') ?>" alt="">
                        </div>
                        <div class="card__product-img" style="background-image: url(<?= carbon_get_theme_option('back_tolst_grey') ?>);">
                            <img src="<?= carbon_get_post_meta($product->get_id(), 'product_print_white') ?>" alt="">
                        </div>
                    <?php endif; ?>
                    <div class="card__product-img" style="background-image: url(<?= carbon_get_theme_option('back_tolst_white') ?>);">
                        <img src="<?= carbon_get_post_meta($product->get_id(), 'product_print_white') ?>" alt="">
                    </div>
                </div>
                <div class="slider-nav__box">
                    <div class="slider-nav">
                        <?php
                        if (carbon_get_theme_option('black_remove_tolst') && carbon_get_theme_option('white_remove_tolst')) : ?>
                            <div class="slider-nav__img" style="background-image: url(<?= carbon_get_theme_option('back_tolst_grey') ?>);">
                                <img src="<?= carbon_get_post_meta($product->get_id(), 'product_print_white') ?>" alt="">
                            </div>
                        <?php elseif (carbon_get_theme_option('gray_remove_tolst') && carbon_get_theme_option('black_remove_tolst')) : ?>
                            <div class="slider-nav__img" style="background-image: url(<?= carbon_get_theme_option('back_tolst_white') ?>);">
                                <img src="<?= carbon_get_post_meta($product->get_id(), 'product_print_white') ?>" alt="">
                            </div>
                        <?php elseif (carbon_get_theme_option('gray_remove_tolst') && carbon_get_theme_option('white_remove_tolst')) : ?>
                            <div class="slider-nav__img" style="background-image: url(<?= carbon_get_theme_option('back_tolst_black') ?>);">
                                <img src="<?= carbon_get_post_meta($product->get_id(), 'product_print_black') ?>" alt="">
                            </div>
                        <?php elseif (carbon_get_theme_option('white_remove_tolst')) : ?>
                            <div class="slider-nav__img" style="background-image: url(<?= carbon_get_theme_option('back_tolst_black') ?>);">
                                <img src="<?= carbon_get_post_meta($product->get_id(), 'product_print_black') ?>" alt="">
                            </div>
                            <div class="slider-nav__img" style="background-image: url(<?= carbon_get_theme_option('back_tolst_grey') ?>);">
                                <img src="<?= carbon_get_post_meta($product->get_id(), 'product_print_white') ?>" alt="">
                            </div>
                        <?php elseif (carbon_get_theme_option('black_remove_tolst')) : ?>
                            <div class="slider-nav__img" style="background-image: url(<?= carbon_get_theme_option('back_tolst_white') ?>);">
                                <img src="<?= carbon_get_post_meta($product->get_id(), 'product_print_white') ?>" alt="">
                            </div>
                            <div class="slider-nav__img" style="background-image: url(<?= carbon_get_theme_option('back_tolst_grey') ?>);">
                                <img src="<?= carbon_get_post_meta($product->get_id(), 'product_print_white') ?>" alt="">
                            </div>
                        <?php elseif (carbon_get_theme_option('gray_remove_tolst')) : ?>
                            <div class="slider-nav__img" style="background-image: url(<?= carbon_get_theme_option('back_tolst_white') ?>);">
                                <img src="<?= carbon_get_post_meta($product->get_id(), 'product_print_white') ?>" alt="">
                            </div>
                            <div class="slider-nav__img" style="background-image: url(<?= carbon_get_theme_option('back_tolst_black') ?>);">
                                <img src="<?= carbon_get_post_meta($product->get_id(), 'product_print_black') ?>" alt="">
                            </div>
                        <?php else : ?>
                            <div class="slider-nav__img" style="background-image: url(<?= carbon_get_theme_option('back_tolst_white') ?>);">
                                <img src="<?= carbon_get_post_meta($product->get_id(), 'product_print_white') ?>" alt="">
                            </div>
                            <div class="slider-nav__img" style="background-image: url(<?= carbon_get_theme_option('back_tolst_black') ?>);">
                                <img src="<?= carbon_get_post_meta($product->get_id(), 'product_print_black') ?>" alt="">
                            </div>
                            <div class="slider-nav__img" style="background-image: url(<?= carbon_get_theme_option('back_tolst_grey') ?>);">
                                <img src="<?= carbon_get_post_meta($product->get_id(), 'product_print_white') ?>" alt="">
                            </div>
                        <?php endif; ?>
                        <div class="slider-nav__img" style="background-image: url(<?= carbon_get_theme_option('back_tolst_white') ?>);">
                            <img src="<?= carbon_get_post_meta($product->get_id(), 'product_print_white') ?>" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="product__card-description">
                <ul>
                    <?php $desc_product = carbon_get_theme_option('desc_product_foot');
                    foreach ($desc_product as $item) :
                    ?>
                        <li>
                            <span><?= $item['text_1'] ?></span>
                            <span><?= $item['text_2'] ?></span>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </section>
        <section class="product__card-right">
            <h1 itemprop="name"><?= $product->get_name() ?></h1>
            <div class="sku">
                <?php if ($product->get_stock_status() == 'instock') : ?>
                    <span class="in__stock">
                        <img src="<?= get_template_directory_uri() ?>/assets/img/iconfinder_check_.svg" alt=""> В наличии</span>
                <?php else : ?>
                    <span class="out__stock">Нет наличии</span>
                <?php endif; ?>
                <span class="product__id">Код товара: <span><?= $product->get_sku() ?></span></span>
            </div>
            <div class="price_button" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                <link itemprop="availability" href="https://schema.org/InStock" />
                <meta itemprop="priceCurrency" content="[UAH]" />
                <meta itemprop="price" content="439" />
                <meta itemprop="priceValidUntil" content="2030-11-25T17:04:04" />
                <meta itemprop="url" content="<?php echo get_permalink(); ?>" />
                <span><?= wc_price($product->get_price()) ?></span>
                <div class="quantity">
                    <button id="pseudoCartBtn">Купить</button>
                </div>
            </div>
            <script type="application/ld+json">
                {
                    "@context": "https://schema.org",
                    "@type": "Brand",
                    "name": "IT-shirts",
                    "url": "https://it-shirts.com/"
                }
            </script>
            <div class="product__card-atribute">
                <?php $relation = carbon_get_post_meta($product->get_id(), 'product_rel');
                $cat_parent_ids = wc_get_product_cat_ids($relation[0]['id']);
                ?>
                <?php if ($relation) : ?>
                    <div class="item__type">
                        <span class="atribute__title">Тип</span>
                        <?php if (in_array(44, $cat_parent_ids)) : ?>
                            <span class="t__shirt active item">Футболка</span>
                            <a href="<?= get_permalink($relation[0]['id']) ?>" class="hoody item">Толстовка</a>
                        <?php elseif (in_array(43, $cat_parent_ids)) : ?>
                            <a href="<?= get_permalink($relation[0]['id']) ?>" class="hoody item">Футболка</a>
                            <span class="t__shirt active item">Толстовка</span>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </div>
            <?php woocommerce_template_single_add_to_cart() ?>
            <div class="table__size">
                <a href="">Таблица размеров</a>
                <div class="table__size-pseudo ">
                    <div class="table__size-pseudo-content">
                        <img src="<?= wp_get_attachment_image_url(carbon_get_theme_option('table_foot_img')) ?>" alt="table_foot">
                        <?= wpautop(carbon_get_theme_option('table_foot')) ?>
                    </div>
                    <p><?= carbon_get_theme_option('txt_table_foot') ?></p>
                </div>
            </div>
            <div class="product__card-right__description">
                <ul class="right__description-items">
                    <li class="right__description-item">
                        <img src="<?= get_template_directory_uri() ?>/assets/img/icon-mona-lisa-gray.png" alt="">
                        <strong>УНИКАЛЬНЫЙ РИСУНОК</strong>
                        <span class="item__tooltip-hover">авторская работа наших иллюстраторов</span>
                    </li>
                    <li class="right__description-item">
                        <img src="<?= get_template_directory_uri() ?>/assets/img/icon-washing-gray.png" alt="">
                        <strong>ДОЛГИЙ СРОК СЛУЖБЫ</strong>
                        <span class="item__tooltip-hover">высокое качество ткани и рисунка обеспечивает
                            износостойкость</span>
                    </li>
                    <li class="right__description-item">
                        <img src="<?= get_template_directory_uri() ?>/assets/img/icon-cotton-gray.png" alt="">
                        <strong>ПРЕМИАЛЬНОЕ КАЧЕСТВО</strong>
                        <span class="item__tooltip-hover">лучшая ткань и высочайшее качество пошива</span>
                    </li>
                    <li class="right__description-item">
                        <img src="<?= get_template_directory_uri() ?>/assets/img/icon-tshirt-gray.png" alt="">
                        <strong>СТИЛЬНЫЙ ПОКРОЙ</strong>
                        <span class="item__tooltip-hover">футболки отлично сидят на любой фигуре</span>
                    </li>
                </ul>
            </div>
        </section>
    </div>
    <section class="product__card-tabs">
        <ul class="tab">
            <li class="tablinks active" datat-tab-name="tab-1"><span class="tablinks__title">Описание</span>
            </li>
            <li class="tablinks" datat-tab-name="tab-2"><span class="tablinks__title">Доставка</span></li>
            <li class="tablinks" datat-tab-name="tab-3"><span class="tablinks__title">Оплата</span></li>
        </ul>
        <div itemprop="description" class="tabs__content tab-1 active">
            <?= $product->get_short_description(); ?>
        </div>
        <div class="tabs__content tab-2">
            <?= wpautop(carbon_get_theme_option('dostavka')) ?>
        </div>
        <div class="tabs__content tab-3">
            <?= wpautop(carbon_get_theme_option('oplata')) ?>
        </div>
    </section>
</article>
<?php if ($product->get_cross_sell_ids()) : ?>
    <h2>ПОХОЖИЕ ТОЛСТОВКИ</h2>
    <ul class="product__items">
        <?php $cross_sell_ids = $product->get_cross_sell_ids();
        foreach ($cross_sell_ids as $cross_sell_id) :
            $cross_sell_product = wc_get_product($cross_sell_id);
            $images           = $cross_sell_product->get_gallery_image_ids();
        ?>
            <li class="product__item">
                <a href="<?= get_permalink($cross_sell_id) ?>" rel="nofollow">
                    <span class="product__item-img">
                        <img class="item__img-top" src="<?= carbon_get_post_meta($cross_sell_product->get_id(), 'product_prev_one') ?>" alt="<?= $cross_sell_product->get_name() ?>">
                        <img class="item__img-bottom" src="<?= wp_get_attachment_image_url($cross_sell_product->get_image_id(), 'full') ?>" alt="<?= $cross_sell_product->get_name() ?>">
                    </span>
                    <span class="product__item-title"><?= $cross_sell_product->get_name() ?></span>
                    <span class="product__item-price">
                        <span class="woocommerce-Price-amount amount"><?= wc_price($cross_sell_product->get_price()) ?>
                        </span>
                        <?php if ($cross_sell_product->get_stock_status() == 'instock') : ?>
                            <span class="in__stock">в наличии</span>
                        <?php else : ?>
                            <span class="out__stock">нет наличии</span>
                        <?php endif; ?>
                    </span>
                    <a href="<?= get_permalink($cross_sell_id) ?>" class="add_to_cart_button">Смотреть</a>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<?php if ($product->get_upsell_ids()) : ?>
    <h2>Мы рекомендуем</h2>
    <ul class="product__items">
        <?php $up_sell_ids = $product->get_upsell_ids();
        foreach ($up_sell_ids as $up_sell_id) :
            $up_sell_product = wc_get_product($up_sell_id);
            $images           = $up_sell_product->get_gallery_image_ids();
        ?>
            <li class="product__item">
                <a href="<?= get_permalink($up_sell_id) ?>" rel="nofollow">
                    <span class="product__item-img">
                        <img class="item__img-top" src="<?= carbon_get_post_meta($up_sell_product->get_id(), 'product_prev_one') ?>" alt="<?= $up_sell_product->get_name() ?>">
                        <img class="item__img-bottom" src="<?= wp_get_attachment_image_url($up_sell_product->get_image_id(), 'full') ?>" alt="<?= $up_sell_product->get_name() ?>">
                    </span>
                    <span class="product__item-title"><?= $up_sell_product->get_name() ?></span>
                    <span class="product__item-price">
                        <span class="woocommerce-Price-amount amount"><?= wc_price($up_sell_product->get_price()) ?>
                        </span>
                        <?php if ($up_sell_product->get_stock_status() == 'instock') : ?>
                            <span class="in__stock">в наличии</span>
                        <?php else : ?>
                            <span class="out__stock">нет наличии</span>
                        <?php endif; ?>
                    </span>
                    <a href="<?= get_permalink($up_sell_id) ?>" class="add_to_cart_button">Смотреть</a>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>


<?php
/** Отключение цвета товара */
if (carbon_get_theme_option('black_remove_tolst') && carbon_get_theme_option('white_remove_tolst')) : ?>
    <script>
        jQuery('span[data-term="belaya"]').remove();
        jQuery('span[data-term="chernaya"]').remove();
        jQuery(".slider-nav__box").css({
            left: "38%"
        })
        if (jQuery(window).width() < 580) {
            jQuery(".slider-nav__box").css({
                left: "31%"
            })
        }
    </script>
<?php elseif (carbon_get_theme_option('gray_remove_tolst') && carbon_get_theme_option('black_remove_tolst')) : ?>
    <script>
        jQuery('span[data-term="chernaya"]').remove();
        jQuery('span[data-term="seraya"]').remove();
        jQuery(".slider-nav__box").css({
            left: "38%"
        })
        if (jQuery(window).width() < 580) {
            jQuery(".slider-nav__box").css({
                left: "31%"
            })
        }
    </script>
<?php elseif (carbon_get_theme_option('gray_remove_tolst') && carbon_get_theme_option('white_remove_tolst')) : ?>
    <script>
        jQuery(document).ready(function() {
            jQuery('span[data-term="belaya"]').remove();
            jQuery('span[data-term="seraya"]').remove();
            jQuery(".slider-nav__box").css({
                left: "38%"
            })
            if (jQuery(window).width() < 580) {
                jQuery(".slider-nav__box").css({
                    left: "31%"
                })
            }
        })
    </script>
<?php elseif (carbon_get_theme_option('white_remove_tolst')) : ?>
    <script>
        jQuery('span[data-term="belaya"]').remove();
        jQuery(".slider-nav__box").css({
            left: "30%"
        })
        if (jQuery(window).width() < 580) {
            jQuery(".slider-nav__box").css({
                left: "20%"
            })
        }
    </script>
<?php elseif (carbon_get_theme_option('black_remove_tolst')) : ?>
    <script>
        jQuery('span[data-term="chernaya"]').remove();
        jQuery(".slider-nav__box").css({
            left: "30%"
        })
        if (jQuery(window).width() < 580) {
            jQuery(".slider-nav__box").css({
                left: "20%"
            })
        }
    </script>
<?php elseif (carbon_get_theme_option('gray_remove_tolst')) : ?>
    <script>
        jQuery('span[data-term="seraya"]').remove();
        jQuery(".slider-nav__box").css({
            left: "30%"
        })
        if (jQuery(window).width() < 580) {
            jQuery(".slider-nav__box").css({
                left: "20%"
            })
        }
    </script>

<?php endif; ?>

<?php do_action('woocommerce_after_single_product'); ?>