<?php
/**
 * Enqueue theme assets
 *
 * @package GCC
 */

namespace GCC_THEME\Inc;

use GCC_THEME\Inc\Traits\Singleton;

class Assets {
	use Singleton;

	protected function __construct() {

		// load class.
		$this->setup_hooks();
	}

	protected function setup_hooks() {

		/**
		 * Actions.
		 */
		add_action( 'wp_enqueue_scripts', [ $this, 'register_styles' ] );
		add_action( 'wp_enqueue_scripts', [ $this, 'register_scripts' ] );
		/**
		 * The 'enqueue_block_assets' hook includes styles and scripts both in editor and frontend,
		 * except when is_admin() is used to include them conditionally
		 */
		// add_action( 'enqueue_block_assets', [ $this, 'enqueue_editor_assets' ] );
	}

	public function register_styles() {
	   //Register Style
	   wp_register_style('style-css', GCC_DIR_URI . '/dist/main.css', [], fileatime(GCC_DIR_PATH . '/dist/main.css'), 'all');
	   wp_register_style('carbon-css', GCC_DIR_URI . '/assets/library/css/carbon-components.min.css', [], false, 'all');
	
	
	 //Enqueue Style
	 wp_enqueue_style('style-css');
	 wp_enqueue_style('carbon-css');  
	}

	public function register_scripts() {
	   //Register Script
   		//Register Script
   		wp_register_script('main-js', GCC_DIR_URI . '/dist/main.js', [], fileatime(GCC_DIR_PATH  . '/dist/main.js'), true);
   		wp_register_script('carbon-js', GCC_DIR_URI . '/assets/library/js/carbon-components.min.js', [], false, true);

		  //Enqueue Script
		  wp_enqueue_script('main-js');
		  wp_enqueue_script('carbon-js');
	}
}