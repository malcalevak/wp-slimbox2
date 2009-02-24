<?php
/*
Plugin Name: WP-Slimbox2
Plugin URI: http://transientmonkey.com/wp-slimbox2
Description: A Wordpress implementation of the Slimbox2 javascript, utilizing jQuery, originally written by Christophe Beyls. Requires WP 2.6+
Author: Greg Yingling (malcalevak)
Version: 0.9.6
Author URI: http://transientmonkey.com/

Copyright 2009 Transient Monkey

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/

if (!defined( 'WP_CONTENT_URL')) {define('WP_CONTENT_URL',get_option('siteurl').'/wp-content');}
if (!defined('WP_PLUGIN_URL')) {define('WP_PLUGIN_URL',WP_CONTENT_URL.'/plugins');}

wp_register_script('slimbox2', WP_PLUGIN_URL.'/wp-slimbox2/slimbox2.js',array('jquery'), '2.02');
wp_register_script('slimbox2_autoload', WP_PLUGIN_URL.'/wp-slimbox2/slimbox2_autoload.js.php',array('slimbox2'),get_option('wp_slimbox_cache'));//add option for version number, update with each save
wp_register_script('jquery_easing', WP_PLUGIN_URL.'/wp-slimbox2/jquery.easing.1.3.packed.js',array('jquery'), '1.3');
wp_register_script('jquery_farbtastic', WP_PLUGIN_URL.'/wp-slimbox2/farbtastic/farbtastic.js',array('jquery'), '1.2');
wp_register_script('load_farbtastic', WP_PLUGIN_URL.'/wp-slimbox2/farbtastic/load_farbtastic.js',array('jquery_farbtastic'), '1.0');

add_action('wp_print_scripts', 'wp_slimbox');
function wp_slimbox() {
	if (!is_admin())
	{
		if(get_option('wp_slimbox_maintenance') == 'on') {
			if (isset($_REQUEST['slimbox'])) setcookie('slimboxC',$_REQUEST['slimbox'],0,'/');
			if ($_REQUEST['slimbox'] == 'off' OR (!isset($_REQUEST['slimbox']) AND $_COOKIE['slimboxC'] != 'on')) return;
		}
		echo '<link rel="stylesheet" href="'.WP_PLUGIN_URL.'/wp-slimbox2/slimbox2.css" type="text/css" media="screen" />
';
		if(get_option('wp_slimbox_resizeEasing') != 'swing') wp_enqueue_script('jquery_easing');
		wp_enqueue_script('slimbox2_autoload');
	} else {
		echo '<link rel="stylesheet" href="'.WP_PLUGIN_URL.'/wp-slimbox2/farbtastic/farbtastic.css" type="text/css" media="screen" />
';
		wp_enqueue_script('load_farbtastic');}
}

add_action('admin_menu', 'show_slimbox_options');

function show_slimbox_options() {require('adminmenu.php');}

function slimbox_options() {
	require('adminpage.php');
}