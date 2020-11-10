<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
/**
 * Enqueue all scripts
 */
if ( ! function_exists( 'ast_scripts' ) ) {
	add_action( 'wp_enqueue_scripts', 'ast_scripts' );
	function ast_scripts() {
		wp_enqueue_script( 'slick-js', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js',
			array( 'jquery' ), null, true );
		wp_enqueue_script( 'main-js', get_template_directory_uri() .
		                                 '/assets/js/main.js', array( 'jquery' ), null, true );
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}
}
/**
 * Enqueue all styles
 */
if ( ! function_exists( 'ast_styles' ) ) {
	add_action( 'wp_enqueue_scripts', 'ast_styles' );
	function ast_styles() {
		wp_enqueue_style( 'ast-style', get_stylesheet_uri() );
		wp_enqueue_style( 'slick-css', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css',
			array(), null, 'all' );
		wp_enqueue_style( 'owl-css', 'https://fonts.googleapis.com/css?family=PT+Sans:400,400i,500,700%7CRoboto:500%7CRoboto+Condensed:700&subset=cyrillic,latin,cyrillic,latin,cyrillic,latin',
			array(), null, 'all' );
		wp_enqueue_style( 'style-it', get_template_directory_uri() . '/assets/css/style.css',
			array(), null, 'all' );
	}
}