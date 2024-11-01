<?php
/*
  Plugin Name: Vistag
  Plugin URI: https://wordpress.org/plugins/vistag
  Description: Vistag is a tool for bloggers and online publishers which allows them to tag products in the photos in a few simple steps.
  Version: 1.3
  Author: Vistag
  Author URI:  https://www.vistag.com
  License: GPLv2+
  License URI: https://www.gnu.org/licenses/gpl-2.0.html
*/

class Vistag{

    function __construct() {

        add_action( 'admin_menu', array( $this, 'wpa_add_menu' ));
        add_action( 'admin_enqueue_scripts', array( $this, 'wpa_styles') );

        add_action('wp_head', array( $this, 'wp_head'));

        //register_activation_hook( __FILE__, array( $this, 'wpa_install' ) );
        //register_deactivation_hook( __FILE__, array( $this, 'wpa_uninstall' ) );
    }

    function wp_head()
    {
        echo str_replace("\\","",get_option( 'vistag_script'));
    }

    function wpa_add_menu()
    {
        add_menu_page('Vistag', 'Vistag', 'manage_options', 'vistag-settings', array(__CLASS__, 'wpa_page_file_path'), plugins_url('images/vistag-logo.png', __FILE__), '2.2.9');

        add_submenu_page('vistag-settings', 'Vistag' . ' Settings', 'Settings', 'manage_options', 'vistag-settings', array(__CLASS__, 'wpa_page_file_path'));
    }
    function wpa_page_file_path() {

        $screen = get_current_screen();
        if ( strpos( $screen->base, 'vistag-settings' ) !== false ) {
            include( dirname(__FILE__) . '/includes/vistag-settings.php' );
        }
//        else {
//            include( dirname(__FILE__) . '/includes/vistag-dashboard.php' );
//        }
    }
    public function wpa_styles( $page ) {
        wp_enqueue_style( 'vistag-style', plugins_url('css/vistag-style.css', __FILE__));
    }
}

new Vistag();  
?>
