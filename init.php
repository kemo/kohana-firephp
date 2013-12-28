<?php defined('SYSPATH') or die('No direct script access.');

// Disable in CLI
if (PHP_SAPI === 'cli')
	return;

// Disable in production
if (Kohana::$environment === Kohana::PRODUCTION)
	return;

// Find and include the vendor
require_once Kohana::find_file('vendor/FirePHPCore','FirePHP.class');

$fire_logger = new Fire_Log(array(
	
));

// Attach a Fire_Log writer to Kohana
Kohana::$log->attach($fire_logger);