<?php
/**
 * Plugin Name:         My Private Plugin
 * Description:         A private plugin for a client website.
 * Version:             1.0.0
 * Author:              Saul Baizman
 * Author URI:          https://baizmandesign.com
 * Update URI:          https://private-repository.baizmandesign.com
 */

defined( 'ABSPATH' ) || die ( 'This file cannot be run outside of WordPress.' );

// get plugin header info as an array.
$plugin_metadata = get_file_data(__FILE__, [ 'Version' => 'Version', 'Update URI' => 'Update URI', 'Description' => 'Description', 'Plugin Name' => 'Plugin Name', ]);
if (! $plugin_metadata['Update URI'] ) {
	// do nothing.
	return;
}
