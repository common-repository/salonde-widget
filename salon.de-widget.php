<?php
/*
Plugin Name: salon.de widget
Plugin URI: https://salon.de/
Description: Add a salon.de widget, review or button to your website.
Version: 1.0
Date: 20th October 2015
Author: Andreas Biller
License: GPL2

Copyright 2015 doxter GmbH / Andreas Biller (email : support@doxter.de / a.biller@doxter.de)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License, version 2, as 
published by the Free Software Foundation.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/
$plugin_header_translate = array( __('Add a salon.de widget, review or button to your website.', 'salon_plugin_widget') ); 

// Register the plugin class
if(!class_exists('salon_widget_plugin')) {
    class salon_widget_plugin {
        /**
         * Construct the plugin object
         */
        public function __construct() {
        	// Plugin name, dir and url
        	if (!defined('MYPLUGIN_PLUGIN_NAME'))
    		  define('MYPLUGIN_PLUGIN_NAME', trim(dirname(plugin_basename(__FILE__)), '/'));
			if (!defined('MYPLUGIN_PLUGIN_DIR'))
    		  define('MYPLUGIN_PLUGIN_DIR', WP_PLUGIN_DIR . '/' . MYPLUGIN_PLUGIN_NAME);
    		if (!defined('MYPLUGIN_PLUGIN_URL'))
    		  define('MYPLUGIN_PLUGIN_URL', WP_PLUGIN_URL . '/' . MYPLUGIN_PLUGIN_NAME);
        	// Set Plugin Path
		    $this->pluginPath = dirname(__FILE__);
		    // Set Plugin URL
		    $this->pluginUrl = WP_PLUGIN_URL . '/' . MYPLUGIN_PLUGIN_NAME;
            add_action('admin_init', array(&$this, 'admin_init'));
			add_action('admin_menu', array(&$this, 'add_menu'));
			// salon widget and review shortcode
			add_shortcode('salon.de-widget', array($this, 'shortcode'));
			add_shortcode('salon.de-review', array($this, 'shortcode'));
			add_shortcode('salon.de-button', array($this, 'shortcode'));
			add_shortcode('salon.de-widget-2', array($this, 'shortcode'));
			add_shortcode('salon.de-review-2', array($this, 'shortcode'));
			add_shortcode('salon.de-widget-3', array($this, 'shortcode'));
			add_shortcode('salon.de-review-3', array($this, 'shortcode'));
			add_shortcode('salon.de-widget-4', array($this, 'shortcode'));
			add_shortcode('salon.de-review-4', array($this, 'shortcode'));
			add_shortcode('salon.de-widget-5', array($this, 'shortcode'));
			add_shortcode('salon.de-review-5', array($this, 'shortcode'));
			// Add shortcode support for widgets
    		add_filter( 'widget_text', 'do_shortcode' );
			add_action( 'admin_enqueue_scripts', array( &$this, 'load_admin_cssjs' ) );
			add_action( 'wp_enqueue_scripts', array( &$this, 'load_cssjs' ) );
        } // END public function __construct

        /**
         * Activate the plugin
         */
        public static function activate() {
            // Do nothing
        } // END public static function activate

        /**
         * Deactivate the plugin
         */     
        public static function deactivate() {
            // Do nothing
        } // END public static function deactivate
        
        /**
		 * Hook into WP's admin_init action hook
		 */
		public function admin_init() {
		    // Set up the settings for this plugin
		    $this->init_settings();
		    // Possibly do additional admin_init tasks
		} // END public static function activate
		
		/**
		 * Initialize some custom settings
		 */     
		public function init_settings() {
		    // register the settings for this plugin
		    register_setting('salon_widget_plugin_group', 'salon_extended');
			/* salon plugin settings */
			register_setting('salon_widget_plugin_group', 'salon_ID');
			register_setting('salon_widget_plugin_group', 'salon_color1');
			register_setting('salon_widget_plugin_group', 'salon_color2');
			register_setting('salon_widget_plugin_group', 'salon_color3');
			register_setting('salon_widget_plugin_group', 'salon_width');
			register_setting('salon_widget_plugin_group', 'salon_height');
			register_setting('salon_widget_plugin_group', 'salon_review_width');
			register_setting('salon_widget_plugin_group', 'salon_review_height');
			register_setting('salon_widget_plugin_group', 'salon_link');
			register_setting('salon_widget_plugin_group', 'salon_button_text');
			register_setting('salon_widget_plugin_group', 'salon_button_text_color');
			register_setting('salon_widget_plugin_group', 'salon_button_color');
			register_setting('salon_widget_plugin_group', 'salon_button_width');
			register_setting('salon_widget_plugin_group', 'salon_button_height');
			// widget 2
			register_setting('salon_widget_plugin_group', 'salon_ID_2');
			register_setting('salon_widget_plugin_group', 'salon_color1_2');
			register_setting('salon_widget_plugin_group', 'salon_color2_2');
			register_setting('salon_widget_plugin_group', 'salon_color3_2');
			register_setting('salon_widget_plugin_group', 'salon_width_2');
			register_setting('salon_widget_plugin_group', 'salon_height_2');
			register_setting('salon_widget_plugin_group', 'salon_review_width_2');
			register_setting('salon_widget_plugin_group', 'salon_review_height_2');
			// widget 3
			register_setting('salon_widget_plugin_group', 'salon_ID_3');
			register_setting('salon_widget_plugin_group', 'salon_color1_3');
			register_setting('salon_widget_plugin_group', 'salon_color2_3');
			register_setting('salon_widget_plugin_group', 'salon_color3_3');
			register_setting('salon_widget_plugin_group', 'salon_width_3');
			register_setting('salon_widget_plugin_group', 'salon_height_3');
			register_setting('salon_widget_plugin_group', 'salon_review_width_3');
			register_setting('salon_widget_plugin_group', 'salon_review_height_3');
			// widget 4
			register_setting('salon_widget_plugin_group', 'salon_ID_4');
			register_setting('salon_widget_plugin_group', 'salon_color1_4');
			register_setting('salon_widget_plugin_group', 'salon_color2_4');
			register_setting('salon_widget_plugin_group', 'salon_color3_4');
			register_setting('salon_widget_plugin_group', 'salon_width_4');
			register_setting('salon_widget_plugin_group', 'salon_height_4');
			register_setting('salon_widget_plugin_group', 'salon_review_width_4');
			register_setting('salon_widget_plugin_group', 'salon_review_height_4');
			// widget 5
			register_setting('salon_widget_plugin_group', 'salon_ID_5');
			register_setting('salon_widget_plugin_group', 'salon_color1_5');
			register_setting('salon_widget_plugin_group', 'salon_color2_5');
			register_setting('salon_widget_plugin_group', 'salon_color3_5');
			register_setting('salon_widget_plugin_group', 'salon_width_5');
			register_setting('salon_widget_plugin_group', 'salon_height_5');
			register_setting('salon_widget_plugin_group', 'salon_review_width_5');
			register_setting('salon_widget_plugin_group', 'salon_review_height_5');
			/* end salon plugin settings */
		} // END public function init_custom_settings()
		
		/**
		 * Add a menu
		 */     
		public function add_menu() {
		    //add_options_page('WP Plugin Template Settings', 'WP Plugin Template', 'manage_options', 'wp_plugin_template', array(&$this, 'plugin_settings_page'));
		    add_options_page(__('salon.de widget settings', 'salon_plugin_widget'), __('salon.de widget', 'salon_plugin_widget'), 'manage_options', 'salon_settings_page', array(&$this, 'plugin_settings_page'));
		} // END public function add_menu()
		
		/**
		 * Menu callback
		 */     
		public function plugin_settings_page() {
		    if(!current_user_can('manage_options')) {
				wp_die(__('You do not have permission to access this site.', 'salon_plugin_widget'));
		    }
		
		    // Render the settings template
		    include(sprintf("%s/templates/settings.php", $this->pluginPath));
		} // END public function plugin_settings_page()
		
		/**
		 * Shortcode callbacks
		 */ 
		public function shortcode($atts, $content = null, $tag) {
	    	// Render the shortcode
		    include(sprintf("%s/templates/shortcodes.php", $this->pluginPath));
			return $shortcode;
	    } // END public function shortcode_button()
	    
	    /**
		 * Enqueue css and js files for backend
		 */ 
		public function load_admin_cssjs() {
	    	wp_enqueue_style('saloncss', sprintf("%s/css/salon_backend.css", $this->pluginUrl));
			wp_enqueue_style( 'wp-color-picker' );
   			wp_enqueue_script( 'wp-color-picker');
	    } // END public function load_admin_cssjs()
	    
	    /**
		 * Enqueue css and js files for frontend
		 */ 
		public function load_cssjs() {
			// stuff goes here
	    } // END public function load_admin_cssjs()
		
    } // END class salon_widget_plugin
} // END if(!class_exists('salon_widget_plugin'))

if(class_exists('salon_widget_plugin')) {
    // Installation and uninstallation hooks
    register_activation_hook(__FILE__, array('salon_widget_plugin', 'activate'));
    register_deactivation_hook(__FILE__, array('salon_widget_plugin', 'deactivate'));

    // instantiate the plugin class
    $salon_widget_plugin = new salon_widget_plugin();
	
	// Add a link to the settings page onto the plugin page
	if(isset($salon_widget_plugin)) {
	    // Add the settings link to the plugins page
	    function salon_plugin_settings_link($links) { 
	        $settings_link = '<a href="options-general.php?page=salon_settings_page">'.__('settings', 'salon_plugin_widget').'</a>'; 
	        array_unshift($links, $settings_link); 
	        return $links; 
	    }
	    $plugin = plugin_basename(__FILE__); 
	    add_filter("plugin_action_links_$plugin", 'salon_plugin_settings_link');
	}
}


// Function to alter the TinyMCE interface
function salon_mce_button() {
  // Check if user have permission
  if ( !current_user_can( 'edit_posts' ) && !current_user_can( 'edit_pages' ) ) {
    return;
  }
  // Check if WYSIWYG is enabled
  /*if ( 'true' == get_user_option( 'rich_editing' ) ) {*/
  	add_filter( 'mce_external_plugins', 'salon_tinymce_plugin' );
	add_filter( 'mce_buttons', 'register_salon_mce_button' );
  /*}*/
}
add_action('admin_head', 'salon_mce_button');
// Function for new button
function salon_tinymce_plugin( $plugin_array ) {
	$plugin_array['salon_mce_button'] = MYPLUGIN_PLUGIN_URL . '/js/shortcode_btns.js';
  return $plugin_array;
}
// Register new button in the editor
function register_salon_mce_button( $buttons ) {
  array_push( $buttons, 'salon_mce_button' );
  return $buttons;
}
?>
