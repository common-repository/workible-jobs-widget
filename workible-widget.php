<?php
/*
Plugin Name: Workible Jobs Widget
Plugin URI: http://www.workible.com.au/
Description: Workible’s FREE Jobs@ site plugin creates your own Careers page in seconds.
Author: Workible
Version: 2.7.0
Author URI: http://www.workible.com.au/
Author Email: support@workible.com.au
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

/**
 * Copyright © 2016 Workible (support@workible.com.au)
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License, version 2, as
 * published by the Free Software Foundation.
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 */

define('WORKIBLEURL', WP_PLUGIN_URL."/".dirname( plugin_basename( __FILE__ ) ) );
define('WORKIBLEPATH', WP_PLUGIN_DIR."/".dirname( plugin_basename( __FILE__ ) ) );


function workible_plugin_activate() {
  	//set default workible option value
  	add_option( 'workible_affiliate_guid', '' );
	add_option( 'workible_job_listing_page', array() );
	add_option( 'workible_job_search_page', array() );

	//global settings
	
	//styling
	add_option( 'workible_job_search_btn_bgcolor', '#286090' );
	add_option( 'workible_job_search_btn_color', '#ffffff' );
	add_option( 'workible_job_search_btn_bdrcolor' , '#204d74');
	
	add_option( 'workible_job_search_btn_hover_bgcolor', '#eeeeee' );
	add_option( 'workible_job_search_btn_hover_color', '#ffffff' );
	add_option( 'workible_job_search_btn_hover_bdrcolor', '#122b40' );
	
	//job search panel box
	add_option( 'workible_job_search_box_bgcolor', '#ffffff' );
	add_option( 'workible_job_search_box_bdrcolor', '#ddd' );
	add_option( 'workible_job_search_box_fontcolor', 'inherit' );
	
	//job pagination button
	add_option( 'workible_job_pagi_btn_color', '#337ab7' );
	add_option( 'workible_job_pagi_btn_bgcolor', '#ffffff' );
	add_option( 'workible_job_pagi_btn_bdrcolor', '#dddddd' );
	
	add_option( 'workible_job_pagi_btn_hover_color', '#23527c' );
	add_option( 'workible_job_pagi_btn_hover_bgcolor', '#eeeeee' );
	add_option( 'workible_job_pagi_btn_hover_bdrcolor', '#dddddd' );
	
	add_option( 'workible_job_pagi_btn_active_color', '#ffffff' );
	add_option( 'workible_job_pagi_btn_active_bgcolor', '#337ab7' );
	add_option( 'workible_job_pagi_btn_active_bdrcolor', '#337ab7' );
	
}
register_activation_hook( __FILE__, 'workible_plugin_activate' );

function workible_plugin_deactivate() {
	//delete_option( 'workible_affiliate_guid');
	//delete_option( 'workible_job_listing_page');
	//delete_option('workible_job_search_page');	
}
register_deactivation_hook( __FILE__, 'workible_plugin_deactivate' );

function register_workible_jobs_plugin_settings(){
	//register our settings
	register_setting( 'workible-plugin-settings-group', 'workible_affiliate_guid' );
	register_setting( 'workible-plugin-settings-group', 'workible_job_listing_guid' );
	register_setting( 'workible-plugin-settings-group', 'workible_job_search_guid' );
	register_setting( 'workible-plugin-settings-group', 'workible_job_listing_page' );
	register_setting( 'workible-plugin-settings-group', 'workible_job_search_page' );
	
	//global settings
	register_setting( 'workible-plugin-settings-group', 'workible_global_loader' );
	register_setting( 'workible-plugin-settings-group', 'workible_global_custom_css' );
	
	//job search button
	register_setting( 'workible-plugin-settings-group', 'workible_job_search_btn_bgcolor' );
	register_setting( 'workible-plugin-settings-group', 'workible_job_search_btn_color' );
	register_setting( 'workible-plugin-settings-group', 'workible_job_search_btn_bdrcolor' );
	
	register_setting( 'workible-plugin-settings-group', 'workible_job_search_btn_hover_bgcolor' );
	register_setting( 'workible-plugin-settings-group', 'workible_job_search_btn_hover_color' );
	register_setting( 'workible-plugin-settings-group', 'workible_job_search_btn_hover_bdrcolor' );
	
	//search box panel
	register_setting( 'workible-plugin-settings-group', 'workible_job_search_box_bgcolor' );
	register_setting( 'workible-plugin-settings-group', 'workible_job_search_box_bdrcolor' );
	register_setting( 'workible-plugin-settings-group', 'workible_job_search_box_fontcolor' );
	
	//job pagination button
	register_setting( 'workible-plugin-settings-group', 'workible_job_pagi_btn_color' );
	register_setting( 'workible-plugin-settings-group', 'workible_job_pagi_btn_bgcolor' );
	register_setting( 'workible-plugin-settings-group', 'workible_job_pagi_btn_bdrcolor' );
	
	register_setting( 'workible-plugin-settings-group', 'workible_job_pagi_btn_hover_color' );
	register_setting( 'workible-plugin-settings-group', 'workible_job_pagi_btn_hover_bgcolor' );
	register_setting( 'workible-plugin-settings-group', 'workible_job_pagi_btn_hover_bdrcolor' );
	
	register_setting( 'workible-plugin-settings-group', 'workible_job_pagi_btn_active_color' );
	register_setting( 'workible-plugin-settings-group', 'workible_job_pagi_btn_active_bgcolor' );
	register_setting( 'workible-plugin-settings-group', 'workible_job_pagi_btn_active_bdrcolor' );
	
}

//call register settings function
add_action( 'admin_init', 'register_workible_jobs_plugin_settings' );

//action plugin settings hook
add_filter( 'plugin_action_links_' . plugin_basename(__FILE__), 'add_action_links' );

function add_action_links ( $links ) {
 $settings = array(
 '<a href="' . admin_url( 'options-general.php?page=workible' ) . '">Settings</a>',
 );
return array_merge( $links, $settings );
}

//insert bootstrap
add_action('wp_enqueue_scripts', 'workible_app', 999);	

add_action('wp_enqueue_scripts', 'workible_javascript_widget', 99);	

//shortcodes
add_shortcode( 'wk-job-list', 'workible_job_list_shortcode' );
add_shortcode( 'wk-job-search', 'workible_job_search_shortcode' );

add_action('admin_enqueue_scripts', 'wk_admin_scripts');

add_action( 'wp_enqueue_scripts', 'wk_styles_method' );

// Hook for adding admin menus
add_action('admin_menu', 'workible_add_pages');

function workible_add_pages() {
    // Add a new submenu under Settings:
    add_options_page(__('Workible','workible-widget'), __('Workible Widget','workible-widget'), 'manage_options', 'workible', 'workible_settings_page');
	
}

//require once
require_once('admin-settings.php');
require_once('admin-scripts.php');
require_once('inline-styles.php');
require_once('front-end-scripts.php');
require_once('shortcode.php');

