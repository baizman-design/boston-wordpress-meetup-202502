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

// dynamic filter.
// https://developer.wordpress.org/reference/hooks/update_plugins_hostname/
add_filter( 'update_plugins_private-repository.baizmandesign.com', 'check_for_updates', 10, 4 );
function check_for_updates ( $update, $plugin_data, $plugin_file, $locales ) {

	$curl_args = [
		'timeout' => 10,
		'headers' => [ 'Accept' => 'application/json', ],
		// disable ssl certificate verification for local hostname.
		'sslverify' => false,
	];

	$private_repository_url = 'https://private-repository.baizmandesign.com';

	$response = wp_remote_get(
		$private_repository_url,
		$curl_args,
	);

	// is this an error?
	if ( is_wp_error ( $response ) || 200 !== wp_remote_retrieve_response_code( $response ) || empty ( wp_remote_retrieve_body( $response ) ) ) {
		return $update;
	}

	// decode the JSON and convert it to an array.
	$json_response = json_decode(wp_remote_retrieve_body( $response ), true);

	// return the response.
	if ( ! empty( $json_response['my-private-plugin'] ) ) {
		return $json_response['my-private-plugin'];
	} else {
		return $update;
	}

}
