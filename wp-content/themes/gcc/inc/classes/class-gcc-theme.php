<?php

/**
 * Bootstraps the Theme.
 *
 * @package GCC
 */

namespace GCC_THEME\Inc;

use GCC_THEME\Inc\Traits\Singleton;

class GCC_THEME
{
	use Singleton;

	protected function __construct()
	{

		// Load class.
		Assets::get_instance();
		Menus::get_instance();

		$this->setup_hooks();
	}

	protected function setup_hooks()
	{
		/**
		 * Actions.
		 */
		add_action('init', [$this, 'gcc_post_typs']);
		add_action('after_setup_theme', [$this, 'setup_theme']);
		add_action('pre_get_posts', [$this, 'add_my_post_types_to_query']);
	}

	/**
	 * Setup theme.
	 *
	 * @return void
	 */

	public function setup_theme()
	{
		add_theme_support('title-tag');

		// add_theme_support(
		// 	'custom-logo',
		// 	[
		// 		'header-text' => [
		// 			'site-title',
		// 			'site-description',
		// 		],
		// 		'height'      => 100,
		// 		'width'       => 400,
		// 		'flex-height' => true,
		// 		'flex-width'  => true,
		// 	]
		// );

		add_theme_support(
			'custom-background',
			[
				'default-color' => 'f7f7f7',
				'default-image' => '',
				'default-repeat' => 'no-repeat',
			]
		);

		add_theme_support('post-thumbnails');

		add_theme_support('customize-selective-refresh-widgets');

		// Add default posts and comments RSS feed links to head.
		add_theme_support('automatic-feed-links');

		add_theme_support(
			'html5',
			[
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'script',
				'style',
			]
		);

		add_editor_style();

		add_theme_support('wp-block-styles');

		add_theme_support('align-wide');

		add_theme_support('custom-header', [
			'default-text-color' => '000',
			'width'              => 1122,
			'height'             => 180,
			'flex-width'         => true,
			'flex-height'        => true,
		]);

		/**
		 * Register image sizes.
		 */
		add_image_size('featured-thumbnail', 350, 233, true);
		add_image_size('assetCard', 288, 204, true);

		global $content_width;
		if (!isset($content_width)) {
			$content_width = 1240;
		}
	}

	function add_my_post_types_to_query($query)
	{
		if (is_home() && $query->is_main_query())
			$query->set('post_type', ['post', 'industrie']);
		return $query;
	}

	// register new post type to the theme
	function gcc_post_typs()
	{

		// industrie post type
		register_post_type('industrie', [
			'public' => true,
			'has_archive' => true,
			'rewrite' => ['slug' => 'industries'],
			'hierarchical' => true,
			'show_in_rest' => true,
			'supports' => ['title', 'thumbnail', 'page-attributes'],
			'menu_icon' => 'dashicons-chart-line',
			'labels' => [
				'name' => 'Industries',
				'add_new_item' => 'Add New Industry',
				'edit_item' => 'Edit Industry',
				'all_items' => 'All Industries',
				'singular_name' => 'Industry'
			]
		]);

		// journy post type
		register_post_type('journey', [
			'public' => true,
			'has_archive' => true,
			'rewrite' => ['slug' => 'journey'],
			'hierarchical' => true,
			'show_in_rest' => true,
			'supports' => ['title', 'editor', 'thumbnail', 'page-attributes'],
			'menu_icon' => 'dashicons-location-alt',
			'labels' => [
				'name' => 'Journeys',
				'add_new_item' => 'Add New Journey',
				'edit_item' => 'Edit Journey',
				'all_items' => 'All Journeys',
				'singular_name' => 'Journy'
			]
		]);

		// Assets post type
		register_post_type('Assets', [
			'public' => true,
			'has_archive' => true,
			'rewrite' => ['slug' => 'assets'],
			'hierarchical' => true,
			'show_in_rest' => true,
			'supports' => ['title', 'thumbnail', 'page-attributes'],
			'menu_icon' => 'dashicons-money-alt',
			'labels' => [
				'name' => 'Assets',
				'add_new_item' => 'Add New Asset',
				'edit_item' => 'Edit Asset',
				'all_items' => 'Assets',
				'singular_name' => 'Asset'
			]
		]);

		// SME post type
		register_post_type('sme', [
			'public' => true,
			'has_archive' => true,
			// 'rewrite' => ['slug' => 'sme'],
			'hierarchical' => true,
			'show_in_rest' => true,
			'taxonomies'  => array('category', 'post_tag'),
			'supports' => ['title', 'thumbnail', 'page-attributes'],
			'menu_icon' => 'dashicons-media-spreadsheet',
			'labels' => [
				'name' => 'SMEs',
				'add_new_item' => 'Add New SME',
				'edit_item' => 'Edit SME',
				'all_items' => 'All SMEs',
				'singular_name' => 'SME'
			]
		]);
	}
}
