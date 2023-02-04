<?php
/**
 * @package JhosagidPlugin
 */
/*
Plugin Name: Jhosagid Plugin
Plugin URI: http://jhosagid.dev
Description: This is my first attempt on writing a custom Plugin for this amazing tutorial series.
Version: 1.0.0
Authot URI: http://jhosagid.com
License: GPL    v2 or later
Text Domain: jhosagid-plugin
*/

/*
  
This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License

as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be userl,
but WITHOUT'ANY'MMRRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License fbr more details.
 
You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA 02110-1301, USA.
copyright 2005—2015 Automattic, Inc.

*/

defined( 'ABSPATH' ) or die( 'Hey, you can/t access this file, yuo silly human!');

if ( ! class_exists( 'JhosagidPlugin' ) ) {

    class JhosagidPlugin
    {
        public $plugin;

        function __construct() {
            $this->plugin = plugin_basename( __FILE__ );
        }

        function register() {
            add_action( 'admin_enqueue_scripts', array( $this, 'enqueue' ) );

            add_action( 'admin_menu', array( $this, 'add_admin_pages' ) );

            add_filter( "plugin_action_links_$this->plugin", array( $this, 'settings_link' ) );
        }

        public function settings_link( $links ) {
            $setting_link = '<a href="admin.php?page=jhosagid_plugin">Settings</a>';
            array_push( $links, $setting_link );

            return $links;
        }

        public function add_admin_pages(){
            add_menu_page( 'Jhosagid Plugin', 'Jhosagid', 'manage_options', 'jhosagid_plugin', array( $this, 'admin_index' ), 'dashicons-superhero', 110 );
        }

        public function admin_index() {
            // requiere template
            require_once plugin_dir_path( __FILE__ ) . 'templates/admin.php';
        }

        protected function create_post_type() {
            add_action( 'init', array($this, 'custom_post_type') );
        }
        
        function custom_post_type(){
            register_post_type( 'book', ['public' => true, 'label' => 'Books'] );
        }
        
        function enqueue(){
            // enqueue all our scripts
            wp_enqueue_style( 'mypluginstyle', plugins_url( '/assets/mystyle.css', __FILE__ ) );
            wp_enqueue_script( 'mypluginscript', plugins_url( '/assets/myscript.js', __FILE__ ) );
        } 

        function activate() {
            require_once plugin_dir_path( __FILE__ ) . 'include/jhosagid-plugin-activate.php';
            JhosagidPluginActivate::activate();
        }
    } 

    //instance
    $jhosagidPlugin = new JhosagidPlugin();
    $jhosagidPlugin->register();

    // activate
    register_activation_hook( __FILE__, array( $jhosagidPlugin, 'activate' ) );
    
    // deactivate
    require_once plugin_dir_path( __FILE__ ) . 'include/jhosagid-plugin-deactivate.php';
    register_deactivation_hook( __FILE__, array( 'JhosagidPluginDeactivate', 'deactivate' ) );

}

