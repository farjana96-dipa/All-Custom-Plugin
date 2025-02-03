<?php

/**
 * Fired during plugin activation
 *
 * @link       https://farjana-dipa.com
 * @since      1.0.0
 *
 * @package    Advance_plugin
 * @subpackage Advance_plugin/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Advance_plugin
 * @subpackage Advance_plugin/includes
 * @author     Farjana Dipa <farjana96455@gmail.com>
 */
class Advance_plugin_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public function activate() {
		global $wpdb;
		require_once(ABSPATH.'wp-admin/includes/upgrade.php');

		

		$book_shelf_tbl = "CREATE TABLE {$this->book_shelf_table_prefix()} (
								`id` int(11) NOT NULL AUTO_INCREMENT,
								`shelf_name` varchar(200) NOT NULL,
								`capacity` int(11) NOT NULL,
								`shelf_location` varchar(200) NOT NULL,
								`status` int(11) NOT NULL,
								`created_at` timestamp NOT NULL DEFAULT current_timestamp(),
								PRIMARY KEY (`id`)
								) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci";



		dbDelta($book_shelf_tbl);

		$book_tbl = "CREATE TABLE {$this->book_table_prefix()} (
			`id` int(11) NOT NULL AUTO_INCREMENT,
			`name` varchar(200) DEFAULT NULL,
			`amount` int(11) DEFAULT NULL,
			`description` text DEFAULT NULL,
			`book_image` varchar(250) DEFAULT NULL,
			`language` varchar(200) DEFAULT NULL,
			`shelf_id` int(11) DEFAULT NULL,
			`status` int(11) NOT NULL DEFAULT 1,
			`created_at` timestamp NOT NULL DEFAULT current_timestamp(),
			PRIMARY KEY (`id`)
			) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci";

		dbDelta($book_tbl);

		//$insert = "INSERT INTO " . $this->book_shelf_table_prefix() . "(shelf_name,capacity,shelf_location,status) VALUES('REK01',100,'Corner',1)";

		//$wpdb->query($insert);

		$wpdb->insert(
			$this->book_shelf_table_prefix(),
			array(
				'shelf_name' => 'REK01',
				'capacity' => 100,
				'shelf_location' => 'Corner',
				'status' => 1
			),
			array('%s', '%d', '%s', '%d')
		);


		$page = array(
			'post_title' => "Book Page",
			'post_content' => "This page is created when plugin is activated",
			'post_author' => 1,
			'post_status' => "Publish",
			'post_type' => "page"
		);

		wp_insert_post($page);

     

	}

	// Prefix Table
	public function book_table_prefix(){
		global $wpdb;
		return $wpdb->prefix."book_table";
	}

	public function book_shelf_table_prefix(){
		global $wpdb;
		return $wpdb->prefix."book_shelf_table";
	}

}
