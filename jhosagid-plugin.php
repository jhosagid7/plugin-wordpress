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

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Require once the Composer Autoload
if ( file_exists( dirname( __FILE__ ) . '/vendor/autoload.php' ) ) {
    require_once dirname( __FILE__ ) . '/vendor/autoload.php';
}

/**
 * The code that runs during plugin activation
 */
function activate_jhosagid_plugin() {
    Inc\Base\Activate::activate();
}
register_activation_hook( __FILE__, 'activate_jhosagid_plugin' );

/**
 * The code that runs during plugin deactivation
 */
function deactivate_jhosagid_plugin() {
    Inc\Base\Deactivate::deactivate();
}
register_deactivation_hook( __FILE__, 'deactivate_jhosagid_plugin' );

/**
 * Initialize all the core classes of the plugin
 */
if ( class_exists( 'Inc\\Init' ) ) {
    Inc\Init::register_services();
}

