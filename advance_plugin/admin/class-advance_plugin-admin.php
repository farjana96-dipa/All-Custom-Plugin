<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://farjana-dipa.com
 * @since      1.0.0
 *
 * @package    Advance_plugin
 * @subpackage Advance_plugin/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Advance_plugin
 * @subpackage Advance_plugin/admin
 * @author     Farjana Dipa <farjana96455@gmail.com>
 */
class Advance_plugin_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;
	private $activator;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

		//require_once plugin_dir_path( __FILE__ ) . '/includes/class-advance_plugin-activator.php';
		//$activator = new Advance_plugin_Activator;
		//$this->activator = new Advance_plugin_Activator;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Advance_plugin_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Advance_plugin_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		$valid_page = array("book_management","create_book","list_book","create_book_shelf","list_book_shelf");
		$page = isset($_REQUEST['page']) ? $_REQUEST['page'] : '';

		if(in_array($page,$valid_page)){
			wp_enqueue_style( 'advance_plugin-admin.css', plugin_dir_url(__FILE__) . 'css/advance_plugin-admin.css', array(), $this->version, 'all' );
			wp_enqueue_style('bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css', array(), $this->version, 'all');
			wp_enqueue_style('sweetalert',ADVANCE_PLUGIN_ADMIN_URL.'assets/css/sweetalert.css',array(),$this->version,'all');
			wp_enqueue_style('jquery.dataTables.min',ADVANCE_PLUGIN_ADMIN_URL.'assets/css/jquery.dataTables.min.css',array(),$this->version,'all');
		}

		

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Advance_plugin_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Advance_plugin_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */


		
		wp_enqueue_script('jquery');

		$valid_page = array("book_management","create_book","list_book","create_book_shelf","list_book_shelf");
		$page = isset($_REQUEST['page']) ? $_REQUEST['page'] : '';

		if(in_array($page,$valid_page)){
		
		wp_enqueue_script( 'bootstrap.bundle', ADVANCE_PLUGIN_ADMIN_URL . 'assets/js/bootstrap.bundle.js', array( 'jquery' ), $this->version, false );
		wp_enqueue_script('sweetalert.min',ADVANCE_PLUGIN_ADMIN_URL.'assets/js/sweetalert.min.js',array('jquery'),$this->version,false);
		wp_enqueue_script('jquery.dataTables.min',ADVANCE_PLUGIN_ADMIN_URL.'assets/js/jquery.dataTables.min.js',array('jquery'),$this->version,false);
		wp_enqueue_script('jquery.validate.min',ADVANCE_PLUGIN_ADMIN_URL.'assets/js/jquery.validate.min.js',array('jquery'),$this->version,false);
		wp_enqueue_script( $this->plugin_name, plugin_dir_url(__FILE__) . 'js/advance_plugin-admin.js', array( 'jquery' ), $this->version, false );
		wp_localize_script($this->plugin_name,"add_book",array(
			"ajax_url" => admin_url("admin-ajax.php"),
			"author" => "Smart Coder",
			"name" => "Farjana Dipa"
		
		));

		}

	}

	public function advanced_menu_section(){
		add_menu_page(
			"Book Management",
			"Book Management",
			"manage_options",
			"book_management",
			array($this,"Book_Management_Dashboard")
		);

		add_submenu_page(
			"book_management",
			"Dashboard",
			"Dashboard",
			"manage_options",
			"book_management",
			array($this,"Book_Management_Dashboard")
		);

		add_submenu_page(
			"book_management",
			"Create Book",
			"Create Book",
			"manage_options",
			"create_book",
			array($this,"Create_Book_Callback")
		);

		add_submenu_page(
			"book_management",
			"Create Book Shelf",
			"Create Book Shelf",
			"manage_options",
			"create_book_shelf",
			array($this,"Create_Book_Shelf_Callback")
		);


		add_submenu_page(
			"book_management",
			"List Book",
			"List Book",
			"manage_options",
			"list_book",
			array($this,"List_Book_Callback")
		);

		add_submenu_page(
			"book_management",
			"List Book Shelf",
			"List Book Shelf",
			"manage_options",
			"list_book_shelf",
			array($this,"List_Book_Shelf_Callback")
		);
	}

	public function Book_Management_Dashboard(){
		echo "<h2>Book Management Dashboard</h2>";
        ?>
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<h2>This is from Bootstrap</h2>
						<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quia eligendi iste dolorum laudantium debitis beatae commodi aspernatur veritatis iusto. Quae voluptatibus fugiat ut aliquid minima sapiente error blanditiis pariatur minus.</p>
						<button class="btn btn-primary">Submit Now</button>
					</div>
				</div>
			</div>
			

		<?php
		global $wpdb;
		//$single = $wpdb->get_var("SELECT user_email FROM wp_users WHERE ID = 1");
		//$row = $wpdb->get_row("SELECT *FROM wp_users",ARRAY_N);
		//$col = $wpdb->get_col("SELECT post_title FROM wp_posts ");
		$res = $wpdb->get_results("SELECT *FROM wp_posts",ARRAY_N);
		//echo "<pre>";
		//print_r($res);
		//echo "</pre>";
	}

	

	public function Create_Book_Callback(){
		

		require_once(plugin_dir_path(__FILE__).'partials/template_create_book.php');
		ob_start();
		$template = ob_get_contents();

		ob_end_clean();
		echo $template;
	}

	public function List_Book_Callback(){
		//echo "List Book";
		require_once(plugin_dir_path(__FILE__).'partials/template_list_book.php');
		ob_start();
		$template = ob_get_contents();
		ob_end_clean();
		echo $template;
	}


	public function Create_Book_Shelf_Callback(){
		//echo "Create Book Shelf";
		require_once(plugin_dir_path(__FILE__).'partials/template_create_book_shelf.php');
		ob_start();
		$template = ob_get_contents();
		ob_end_clean();
		echo $template;
	}

	public function List_Book_Shelf_Callback(){

		global $wpdb;
		$res = $wpdb->get_results("SELECT *FROM wp_book_shelf_table");


		require_once(plugin_dir_path(__FILE__).'partials/template_list_book_shelf.php');
		ob_start();
		$template = ob_get_contents();
		ob_end_clean();
		echo $template;

		
	}

	public function First_Ajax_Request(){
			$param = isset($_REQUEST['param']) ? $_REQUEST['param'] : '';
			//echo $param;
			if(!empty($param)){
				if($param == 'simple_ajax_form'){
					echo json_encode(array(
						'status' => 1,
						'message' => 'first ajax call',
						'data' => array(
							'name' => 'Smart Coder',
							'author' => 'Farjana Dipa'
						)
					));
				}
				else if($param=='create_book_shelf'){
					print_r($_REQUEST);
					$name = isset($_REQUEST['shelf_name']) ? $_REQUEST['shelf_name'] : '';
					$capacity = isset($_REQUEST['shelf_capacity']) ? $_REQUEST['shelf_capacity'] : '';
					$location = isset($_REQUEST['shelf_location']) ? $_REQUEST['shelf_location'] : '';
					$status = isset($_REQUEST['shelf_status']) ? $_REQUEST['shelf_status'] : '';

					global $wpdb;
					//require_once(ABSPATH.'wp-admin/includes/upgrade.php');

					$wpdb->insert(
							'wp_book_shelf_table',
						array(
							'shelf_name' => $name,
							'capacity' => $capacity,
							'shelf_location' => $location,
							'status' => $status
						),
						array('%s', '%d', '%s', '%d')
					);

					if($wpdb->insert_id > 0){
						echo json_encode(array(
							'status' => 1,
							'message' => "Successfully Data Inserted"
						));
					}
					else{
						echo json_encode(array(
							'status' => 0,
							'message' => "Data insertion Failed !!"
						));
					}
					
				}
				else if($param == 'delete_book_shelf'){
					$id = isset($_REQUEST['id']) ? $_REQUEST['id'] : 0;
					global $wpdb;
					if($id > 0){
						$wpdb->delete('wp_book_shelf_table',
						array('id'=>$id));
						echo json_encode(array(
							'status' => 0,
							'message' => 'Book Shelf Deleted Successfully'
						));
					}
					else{
						echo json_encode(array(
							'status' => 0,
							'message' => 'Invalid Delete Request'
						));
					}
				}
				else{
					echo json_encode(array(
						'status' => 0,
						'message' => 'Invalid Request'
					));
				}
			}

			wp_die();
	}
}
