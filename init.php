<?php defined('SYSPATH') or die('No direct script access.');

// Disable in CLI
if (PHP_SAPI === 'cli')
	return;

// Disable in production
if (Kohana::$environment === Kohana::PRODUCTION)
	return;

// Find the FirePHP vendor class
$vendor_path = Kohana::find_file('vendor/firephp-core/lib/FirePHPCore','FirePHP.class');

if ($vendor_path === FALSE)
{
	/**
	 * If the vendor doesn't exist, user probably didn't update submodules so
	 * warn him instead of ending up with a fatal error. Updating submodules:
	 *
	 * 		git submodule update --init
	 *
	 * (inside of the firephp submodule folder)
	 */
	throw new Kohana_Exception('You must update submodules (vendor class) to make FirePHP work with Kohana.');
}

require_once $vendor_path;

$fire_logger = new Fire_Log;

// Attach a Fire_Log writer to Kohana
Kohana::$log->attach($fire_logger);