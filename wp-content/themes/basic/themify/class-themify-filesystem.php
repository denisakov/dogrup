<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Themify_Filesystem' ) ) {

	/**
	 * Themify Filesystem class.
	 */
	class Themify_Filesystem {

		/**
		 * @var $instance
		 */
		protected static $instance = null;

		protected static $direct = null;

		public $execute = null;

		public function __construct() {
			$this->initialize();
		}

		/**
		 * Return an instance of this class.
		 *
		 * @return    object    A single instance of this class.
		 */
		public static function get_instance() {

			// If the single instance hasn't been set, set it now.
			if ( null == self::$instance ) {
				self::$instance = new self;
			}

			return self::$instance;
		}

		/**
		 * Initialize filesystem method.
		 */
		public function initialize() {
			// Load WP Filesystem
			if ( ! function_exists('WP_Filesystem') ) {
				require_once ABSPATH . 'wp-admin/includes/file.php';
			}
			WP_Filesystem();
			global $wp_filesystem;
			$access_type = get_filesystem_method();

			if ( 'direct' == $access_type ) {
				$this->execute = $wp_filesystem;
			} else {
				self::load_direct();
				$this->execute = self::$direct;
			}
		}

		/**
		 * Initialize Filesystem direct method.
		 */
		public static function load_direct() {
			if ( self::$direct === null ) {
				require_once ABSPATH . '/wp-admin/includes/class-wp-filesystem-base.php';
				require_once ABSPATH . '/wp-admin/includes/class-wp-filesystem-direct.php';
				self::$direct = new WP_Filesystem_Direct( array() );
			}
		}
	}
}