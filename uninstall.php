<?php


// If uninstall not called from WordPress, then exit.
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit;
}
$database = new Inc\Base\Database();
$database->deleteTables();
