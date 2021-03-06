<?php
/*
Plugin Name: wp-travelermap
Plugin URI: http://bitschubser.org/projects/wp-travelermap
Description: A simple Plugin to create travel routes and manage maps
Version: 1.4.0
Author: Mathis Zeiher
Author URI: http://bitschubser.org/

Copyright (C) 2014 bitschubser.org

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to 
deal in the Software without restriction, including without limitation the
rights to use, copy, modify, merge, publish, distribute, sublicense, and/or
sell copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER 
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN 
THE SOFTWARE.
*/

if ( ! defined( 'ABSPATH' ) ) exit;

if ( ! defined( 'TM_VERSION' ) )	
	define( 'TM_VERSION', '1.4.0' );
	
if ( ! defined( 'TM_URL' ) )
	define( 'TM_URL', plugin_dir_url( __FILE__ ) );

if ( !defined( 'TM_BASENAME' ) )
	define( 'TM_BASENAME', plugin_basename( __FILE__ ) );
	
require_once('includes/travelermap-leaflet.php');

function travelermap_activate() {
	require_once('admin/travelermap-install.php');
}

function travelermap_deactivate() {
	
}

if ( is_admin() ) {
    require_once('admin/travelermap-admin.php');

    register_activation_hook( __FILE__, 'travelermap_activate' );
    register_deactivation_hook( __FILE__, 'travelermap_deactivate' );
} else {
    require_once('frontend/travelermap-frontend.php');
}

?>