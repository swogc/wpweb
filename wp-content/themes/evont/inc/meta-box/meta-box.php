<?php
/**
 * Plugin Name: Meta Box
 * Plugin URI: https://metabox.io
 * Description: Create custom meta boxes and custom fields for any post type in WordPress.
 * Version: 4.8.7
 * Author: Rilwis
 * Author URI: http://www.deluxeblogtips.com
 * License: GPL2+
 * Text Domain: evont
 * Domain Path: /lang/
 */

if ( defined( 'ABSPATH' ) && ! defined( 'evont_RWMB_VER' ) )
{
	require get_template_directory() . '/inc/meta-box/inc/loader.php';
	$loader = new RWMB_Loader;
	$loader->init();
}
