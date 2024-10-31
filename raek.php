<?php

/**
* Plugin Name: RAEK First-Party Data Collection
* Plugin URI: https://www.raekdata.com/wordpress?utm_source=plugin-description&utm_medium=wordpress&utm_campaign=plugin-home-page
* Description: One tool to collect, organize and utilize your first-party data, so you can turn more visitors into buyers.
* Version: 1.0.29
* Author: RAEK
* Author URI: https://www.raekdata.com/?utm_source=plugins-admin-page&utm_medium=wordpress&utm_campaign=plugins-admin-author
* Text Domain: raek-real-time-identification
* License: GPL2
* License URI: http://www.gnu.org/licenses/gpl-2.0.html
* RAEK's WordPress Plugin is free software: you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation, either version 2 of the License, or any later version.
* RAEK is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.
* You should have received a copy of the GNU General Public License along with RAEK. If not, see https://www.gnu.org/licenses/gpl-2.0.html.
*/

// Block If Accessed Directly
if(!defined('ABSPATH')){
	exit;
}

// Define Plugin Variables
define("RAEK_VERSION", '1.0.29');

define("RAEK_DOMAIN", $_SERVER['HTTP_HOST']);

define("RAEK_PLUGIN", __FILE__ );

define("RAEK_PLUGIN_NAME", plugin_basename(__FILE__));

define("RAEK_PLUGIN_DIR", untrailingslashit( dirname( RAEK_PLUGIN ) ) );

define("RAEK_PLUGIN_URL", untrailingslashit( plugins_url( '', RAEK_PLUGIN ) ) );

define("RAEK_CRON", 'raek_cron');

require_once(RAEK_PLUGIN_DIR . '/raek-ini.php');

?>
