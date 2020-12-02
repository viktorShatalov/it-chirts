<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

use Carbon_Fields\Container;
use Carbon_Fields\Field;

Container::make( 'post_meta', __( 'Связи (Толстовка/Футболка/Прочее)' ) )
         ->where( 'post_type', '=', 'product' )
         ->add_fields( [
	         Field::make( 'association', 'product_rel', __( 'Отношения с другими записями' ) )
	              ->set_types( array(
		              array(
			              'type'      => 'post',
			              'post_type' => 'product',
		              )
	              ) ),
	         Field::make( 'html', 'product_image_info' )
	              ->set_html( '<h2 style="background-color: lightblue; font-weight: bold">
									Превью и принты</h2>' ),
	         Field::make('image', 'product_prev_one', __('Первое превью'))
	            ->set_width(33)
	            ->set_value_type('url'),
	         Field::make('image', 'product_print_white', __('Принт для белого цвета'))
	              ->set_width(33)
	              ->set_value_type('url'),
	         Field::make('image', 'product_print_black', __('Принт для чёрного цвета'))
	              ->set_width(33)
	              ->set_value_type('url'),
         ] );
Container::make( 'theme_options', __( 'Доп. настройки' ) )
         ->set_page_menu_position( 59 )
         ->set_icon( 'dashicons-hammer' )
         ->add_tab( 'Дополнительная информация в товаре', [
	         Field::make( 'html', 'crb_information_1' )
	              ->set_html( '<h2 style="background-color: lightblue; font-weight: bold">
									Доставка - страница продукта</h2>' ),
	         Field::make( 'rich_text', 'dostavka', __( '' ) ),
	         Field::make( 'html', 'crb_information_2' )
	              ->set_html( '<h2 style="background-color: lightblue; font-weight: bold">
									Оплата - страница продукта</h2>' ),
	         Field::make( 'rich_text', 'oplata', __( '' ) ),
	         Field::make( 'html', 'crb_information_3' )
	              ->set_html( '<h2 style="background-color: lightblue; font-weight: bold">
									Описание о товаре</h2>' ),
	         Field::make( 'html', 'crb_information_3_foot' )
	              ->set_html( '<span style="font-weight: bold; font-style: oblique">
									Описание о товаре Футболка</span>' ),
	         Field::make( 'complex', 'desc_product_foot', __( '' ) )
	              ->setup_labels( [ 'singular_name' => 'строку' ] )
	              ->add_fields( array(
		              Field::make( 'text', 'text_1', __( 'Левая колонка' ) )
		                   ->set_width( 50 ),
		              Field::make( 'textarea', 'text_2', __( 'Правая колонка' ) )
		                   ->set_width( 50 ),
	              ) ),
	         Field::make( 'html', 'crb_information_3_tolst' )
	              ->set_html( '<span style="font-weight: bold; font-style: oblique">
									Описание о товаре Толстовка</span>' ),
	         Field::make( 'complex', 'desc_product__tolst', __( '' ) )
	              ->setup_labels( [ 'singular_name' => 'строку' ] )
	              ->add_fields( array(
		              Field::make( 'text', 'text_1', __( 'Левая колонка' ) )
		                   ->set_width( 50 ),
		              Field::make( 'textarea', 'text_2', __( 'Правая колонка' ) )
		                   ->set_width( 50 ),
	              ) ),
         ] )
         ->add_tab( 'Скрывать товары', [
	         Field::make( 'html', 'crb_information_4_foot' )
	              ->set_html( '<h2 style="background-color: lightblue; font-weight: bold">
									Скрывать цвет футболок</h2>' ),
	         Field::make( 'checkbox', 'white_remove_foot', __( 'Скрывать белые' ) )
	              ->set_width( 33 )
	              ->set_option_value( 'yes' ),
	         Field::make( 'checkbox', 'black_remove_foot', __( 'Скрывать чёрные' ) )
	              ->set_width( 33 )
	              ->set_option_value( 'yes' ),
	         Field::make( 'checkbox', 'gray_remove_foot', __( 'Скрывать серые' ) )
	              ->set_width( 33 )
	              ->set_option_value( 'yes' ),
	         Field::make( 'html', 'crb_information_4_tolst' )
	              ->set_html( '<h2 style="background-color: lightblue; font-weight: bold">
									Скрывать цвет толстовок</h2>' ),
	         Field::make( 'checkbox', 'white_remove_tolst', __( 'Скрывать белые' ) )
	              ->set_width( 33 )
	              ->set_option_value( 'yes' ),
	         Field::make( 'checkbox', 'black_remove_tolst', __( 'Скрывать чёрные' ) )
	              ->set_width( 33 )
	              ->set_option_value( 'yes' ),
	         Field::make( 'checkbox', 'gray_remove_tolst', __( 'Скрывать серые' ) )
	              ->set_width( 33 )
	              ->set_option_value( 'yes' ),
         ] )
         ->add_tab( 'Backgrounds', [
	         Field::make( 'html', 'back_foot_info' )
	              ->set_html( '<h2 style="background-color: lightblue; font-weight: bold">
									Фоны для Футболок</h2>' ),
	         Field::make( 'image', 'back_foot_white', __( 'Белая' ) )
	              ->set_width( 33 )
	              ->set_value_type( 'url' ),
	         Field::make( 'image', 'back_foot_black', __( 'Чёрная' ) )
	              ->set_width( 33 )
	              ->set_value_type( 'url' ),
	         Field::make( 'image', 'back_foot_grey', __( 'Серая' ) )
	              ->set_width( 33 )
	              ->set_value_type( 'url' ),
	         Field::make( 'html', 'back_tolst_info' )
	              ->set_html( '<h2 style="background-color: lightblue; font-weight: bold">
									Фоны для Толстовок</h2>' ),
	         Field::make( 'image', 'back_tolst_white', __( 'Белая' ) )
	              ->set_width( 33 )
	              ->set_value_type( 'url' ),
	         Field::make( 'image', 'back_tolst_black', __( 'Чёрная' ) )
	              ->set_width( 33 )
	              ->set_value_type( 'url' ),
	         Field::make( 'image', 'back_tolst_grey', __( 'Серая' ) )
	              ->set_width( 33 )
	              ->set_value_type( 'url' ),
         ] )
         ->add_tab( 'Таблицы размеров', [
	         Field::make( 'html', 'crb_information_table_1' )
	              ->set_html( '<h2 style="background-color: lightblue; font-weight: bold">
									Таблица размеров Футболки</h2>' ),
	         Field::make( 'rich_text', 'table_foot', __( 'Таблица' ) )
	              ->set_width( 70 ),
	         Field::make( 'image', 'table_foot_img', __( 'Картинка' ) )
	              ->set_width( 30 ),
	         Field::make( 'text', 'txt_table_foot', __( 'Примечание' ) ),
	         Field::make( 'html', 'crb_information_table_2' )
	              ->set_html( '<h2 style="background-color: lightblue; font-weight: bold">
									Таблица размеров Толстовки</h2>' ),
	         Field::make( 'rich_text', 'table_tolst', __( 'Таблица' ) )
	              ->set_width( 70 ),
	         Field::make( 'image', 'table_tolst_img', __( 'Картинка' ) )
	              ->set_width( 30 ),
	         Field::make( 'text', 'txt_table_tolst', __( 'Примечание' ) ),
         ] )
         ->add_tab( 'Уведомление на сайте', [
	         Field::make( 'checkbox', 'crb_show_content', __( 'Показывать уведомление?' ) )
	              ->set_option_value( 'yes' ),
	         Field::make( 'text', 'notice_txt', __( 'Текст уведомления' ) ),
	         Field::make( 'text', 'notice_href', __( 'Ссылка' ) ),

         ] );
Container::make( 'post_meta', __( 'Настройки Главной' ) )
         ->where( 'post_template', '=', 'templates/main-page.php' )
         ->add_fields( [
	         Field::make( 'html', 'crb_information_5' )
	              ->set_html( '<h2 style="background-color: lightblue; font-weight: bold">
									Первый слайдер</h2>' ),
	         Field::make( 'complex', 'crb_slider', __( '' ) )
	              ->set_layout( 'tabbed-horizontal' )
	              ->add_fields( array(
		              Field::make( 'text', 'title', __( 'Alt' ) )
		                   ->set_width( 70 ),
		              Field::make( 'image', 'photo', __( 'Изображение' ) )
		                   ->set_width( 30 ),
		              Field::make( 'text', 'href', __( 'Ссылка' ) ),
	              ) ),
	         Field::make( 'html', 'crb_information_6' )
	              ->set_html( '<h2 style="background-color: lightblue; font-weight: bold">
									Блок Футболки</h2>' ),
	         Field::make( 'text', 'head_footbolki', __( 'Заголовок' ) ),
	         Field::make( 'association', 'product_rel_footbolki', __( 'Отношения с другими записями' ) )
	              ->set_types( [
		              [
			              'type'      => 'post',
			              'post_type' => 'product',
		              ],
	              ] ),
	         Field::make( 'html', 'crb_information_7' )
	              ->set_html( '<h2 style="background-color: lightblue; font-weight: bold">
									Блок Толстовки</h2>' ),
	         Field::make( 'text', 'head_tolstovki', __( 'Заголовок' ) ),
	         Field::make( 'association', 'product_rel_tolstovki', __( 'Отношения с другими записями' ) )
	              ->set_types( [
		              [
			              'type'      => 'post',
			              'post_type' => 'product',
		              ],
	              ] ),
	         Field::make( 'html', 'crb_information_8' )
	              ->set_html( '<h2 style="background-color: lightblue; font-weight: bold">
									Второй слайдер</h2>' ),
	         Field::make( 'complex', 'crb_slider_2', __( '' ) )
	              ->set_layout( 'tabbed-horizontal' )
	              ->add_fields( array(
		              Field::make( 'text', 'title', __( 'Alt' ) )
		                   ->set_width( 70 ),
		              Field::make( 'image', 'photo', __( 'Изображение' ) )
		                   ->set_width( 30 ),
		              Field::make( 'text', 'href', __( 'Ссылка' ) ),
	              ) ),
	         Field::make( 'html', 'crb_information_9' )
	              ->set_html( '<h2 style="background-color: lightblue; font-weight: bold">
									Блок Чашки</h2>' ),
	         Field::make( 'text', 'head_chashki', __( 'Заголовок' ) ),
	         Field::make( 'association', 'product_rel_chashki', __( 'Отношения с другими записями' ) )
	              ->set_types( [
		              [
			              'type'      => 'post',
			              'post_type' => 'product',
		              ],
	              ] ),
	         Field::make( 'html', 'crb_information_10' )
	              ->set_html( '<h2 style="background-color: lightblue; font-weight: bold">
									Блок IT-box</h2>' ),
	         Field::make( 'text', 'head_box', __( 'Заголовок' ) ),
	         Field::make( 'association', 'product_rel_box', __( 'Отношения с другими записями' ) )
	              ->set_types( [
		              [
			              'type'      => 'post',
			              'post_type' => 'product',
		              ],
	              ] ),
	         Field::make( 'html', 'crb_information_11' )
	              ->set_html( '<h2 style="background-color: lightblue; font-weight: bold">
									Текст описание</h2>' ),
	         Field::make( 'rich_text', 'main_desc', __( '' ) ),
         ] );
Container::make( 'post_meta', __( 'Настройки страницы' ) )
         ->where( 'post_template', '=', 'templates/sotrud.php' )
         ->add_fields( [
	         Field::make( 'rich_text', 'sotr_txt_1', __( 'Текст' ) ),
	         Field::make( 'html', 'crb_information_12' )
	              ->set_html( '<h2 style="background-color: lightblue; font-weight: bold">
									Условия для крупных клиентов</h2>' ),
	         Field::make( 'rich_text', 'sotr_text_2', __( 'Текст' ) ),
	         Field::make( 'complex', 'sotr_fields_1', __( 'Поля' ) )
	              ->set_layout( 'tabbed-horizontal' )
	              ->add_fields( array(
		              Field::make( 'text', 'title', __( 'Заголовок' ) )
		                   ->set_width( 25 ),
		              Field::make( 'image', 'photo', __( 'Изображение' ) )
		                   ->set_width( 25 ),
		              Field::make( 'rich_text', 'text', __( 'Текст' ) )
		                   ->set_width( 50 ),
	              ) ),
	         Field::make( 'rich_text', 'sotr_text_3', __( 'Текст' ) ),
	         Field::make( 'html', 'crb_information_13' )
	              ->set_html( '<h2 style="background-color: lightblue; font-weight: bold">
									Брендирование</h2>' ),
	         Field::make( 'rich_text', 'sotr_text_4', __( 'Текст' ) ),
	         Field::make( 'complex', 'sotr_fields_2', __( 'Поля' ) )
	              ->set_layout( 'tabbed-horizontal' )
	              ->add_fields( array(
		              Field::make( 'text', 'title', __( 'Заголовок' ) )
		                   ->set_width( 25 ),
		              Field::make( 'image', 'photo', __( 'Изображение' ) )
		                   ->set_width( 25 ),
		              Field::make( 'rich_text', 'text', __( 'Текст' ) )
		                   ->set_width( 50 ),
	              ) ),
	         Field::make( 'rich_text', 'sotr_text_5', __( 'Текст' ) ),
         ] );
Container::make( 'post_meta', __( 'Контакты' ) )
         ->where( 'post_template', '=', 'templates/contacts.php' )
         ->add_fields( [
	         Field::make( 'text', 'cont_title', __( 'Заголовок' ) ),
	         Field::make( 'text', 'cont_address', __( 'Адрес' ) ),
	         Field::make( 'text', 'cont_phone', __( 'Телефон' ) ),
	         Field::make( 'text', 'cont_phone_desc', __( 'Телефон (описание)' ) ),
	         Field::make( 'text', 'cont_email', __( 'E-mail' ) ),
	         Field::make( 'text', 'cont_head', __( 'Заголовок 2' ) ),
	         Field::make( 'text', 'cont_time', __( 'Время работы' ) ),
	         Field::make( 'text', 'cont_vk', __( 'VK' ) ),
	         Field::make( 'text', 'cont_insta', __( 'Instagram' ) ),
	         Field::make( 'text', 'cont_facebook', __( 'Facebook' ) ),
         ] );
Container::make( 'post_meta', __( 'Отзывы' ) )
         ->where( 'post_template', '=', 'templates/reviews.php' )
         ->add_fields( [
	         Field::make( 'text', 'rev_head', __( 'Заголвоок' ) ),
	         Field::make( 'text', 'rev_href', __( 'Ссылка (Оставить отзыв)' ) ),
	         Field::make( 'rich_text', 'rev_txt', __( 'Текст' ) ),
	         Field::make( 'html', 'crb_information_14' )
	              ->set_html( '<h2 style="background-color: lightblue; font-weight: bold">
									Отзывы</h2>' ),
	         Field::make( 'complex', 'reviews', __( '' ) )
	              ->set_layout( 'tabbed-horizontal' )
	              ->add_fields( array(
		              Field::make( 'text', 'name', __( 'Имя' ) )
		                   ->set_width( 33 ),
		              Field::make( 'text', 'city', __( 'Город' ) )
		                   ->set_width( 33 ),
		              Field::make( 'image', 'photo', __( 'Изображение' ) )
		                   ->set_value_type( 'url' )
		                   ->set_width( 33 ),
		              Field::make( 'rich_text', 'text', __( 'Текст отзыва' ) )
	              ) ),
         ] );
Container::make( 'post_meta', __( 'Акции' ) )
         ->where( 'post_template', '=', 'templates/akcii.php' )
         ->add_fields( [
	         Field::make( 'complex', 'akcii', __( '' ) )
	              ->set_layout( 'tabbed-horizontal' )
	              ->add_fields( array(
		              Field::make( 'text', 'name', __( 'Название акции' ) )
		                   ->set_attribute( 'placeholder', 'Название акции: например, процент скидки %20 или просто название, футболка и т.д.' )
		                   ->set_width( 50 ),
		              Field::make( 'image', 'photo', __( 'Изображение' ) )
		                   ->set_value_type( 'url' )
		                   ->set_width( 50 ),
		              Field::make( 'rich_text', 'text', __( 'Текст' ) )
	              ) ),
         ] );