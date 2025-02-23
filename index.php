<?php

// new version number. uses semantic versioning (https://semver.org).
$new_version = '1.0.1';

// filename of ZIP archive with 1.0.1 version.
$zip_archive = 'my-private-plugin.zip';

// filename to store http requests.
$logfile = 'http-requests.log';

// for error_log(). sends output to a file.
$logfile_type = 3;

// more logic and data validation:
// + prevent requests from certain domains (could use .htaccess, too)
// + prevent "open" access to this domain / URL
// + pass a plugin or theme slug via a query string and ensure it's a valid asset

$user_agent = $_SERVER['HTTP_USER_AGENT'];

// log all http requests to a file.
$message = sprintf( 'Request from %s', $user_agent ) . PHP_EOL;
$timestamp = date('Y.m.d H.i');
error_log( sprintf ('%1$s: %2$s',
	$timestamp,
	$message
	),
	$logfile_type,
	$logfile
);
