<?php

/**
 * Fired during plugin deactivation
 *
 * @link       https://farjana-dipa.com
 * @since      1.0.0
 *
 * @package    Advance_plugin
 * @subpackage Advance_plugin/includes
 */

/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @since      1.0.0
 * @package    Advance_plugin
 * @subpackage Advance_plugin/includes
 * @author     Farjana Dipa <farjana96455@gmail.com>
 */
class Advance_plugin_Deactivator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */

	 private $activator;
	 public function __construct($activator){
		$this->activator = $activator;
	 }

	public function deactivate() {
       global $wpdb;
	   $wpdb->query("DROP TABLE IF EXISTS " . $this->activator->book_shelf_table_prefix());
	   $wpdb->query("DROP TABLE IF EXISTS " . $this->activator->book_table_prefix());
	}

}
