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

class JhosagidPlugin
{
    function __construct(){
        add_action( 'init', array($this, 'custom_post_type') );
    }
    
    function activate() {
        // generate a CPT
        $this->custom_post_type();
        // flush rewrite rules
        flush_rewrite_rules(); 
    }

    function deactivate() {
        // flush rewrite rules
        flush_rewrite_rules();
    }

    function custom_post_type(){
        register_post_type( 'book', ['public' => true, 'label' => 'Books'] );
    }

    function enqueue(){
        // enqueue all our scripts
        wp_enqueue_style( $handle:string, $src:string, $deps:array, $ver:string|boolean|null, $media:string );
    }
    
} 

if ( class_exists( 'JhosagidPlugin' ) ) {
    //instance
    $jhosagidPlugin = new JhosagidPlugin();
}

// activate
register_activation_hook( __FILE__, array( $jhosagidPlugin, 'activate') );
 
// deactivate
register_deactivation_hook( __FILE__, array( $jhosagidPlugin, 'deactivate') );

// uninstall
register_uninstall_hook( __FILE__, array( $jhosagidPlugin, 'uninstall') );