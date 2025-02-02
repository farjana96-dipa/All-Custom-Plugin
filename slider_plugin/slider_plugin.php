


<?php
/*


Plugin Name: slider_plugin
Plugin URI: https://slider_plugin.com/
Version: 1.0.0
Description: This Plugin is created for Custom Slider
Author: Farjana Dipa
Author URI: https://farjana-dipa.com/
Text Domain: slider_plugin 




*/





class dp_slider{

// Add Actions
public function __construct(){
    add_action('init',array($this,'dp_custom_slider'));
	add_action('wp_enqueue_scripts',array($this,'slider_css_js_file_calling'));
	add_shortcode('dp-event-slider',array($this,'dp_event_slider_shortcode'));
	//add_shortcode('dp-background-slider',array($this,'dp_background_slider_shortcode'));

    add_action('add_meta_boxes',array($this,'Add_Meta_Box'));
	add_action('save_post',array($this,'Save_Meta_Field'));
}



//DP Slider Shortcode

	
public function dp_event_slider_shortcode(){


	?>
	<div class="container">
	 <div class="row py-5 row3 owl-carousel event-row">
        
		<?php
				$slider = new WP_Query(array(
					'post_type' => 'dp_slider',
					'posts_per_page' => 6
				));

			  
			
				if($slider->have_posts()) :
				  
					while($slider->have_posts()) : $slider->the_post();
			
			?>
	<div class="item">


		<div class="inner_container">
			<div class="event-img">
			  <a href="<?php the_permalink(); ?>"><?php echo the_post_thumbnail(); ?></a> 
			</div>


			<div class="event-date">
			   <?php
					$date = get_post_meta(get_the_ID(),'event_date');
					echo esc_html($date[0]);
			   ?>
			</div>

			
			
			<div class="event-title">
				<h3><?php echo the_title(); ?></h3>
			</div>

			
			<div class="event-place">
				<?php
					$place = get_post_meta(get_the_ID(),'event_place');
					echo esc_html($place[0]);
				?>
			</div>

			

			<div class="event_content">
				<?php
					$content = get_the_content();
					$lim = 25;
					$word = explode(' ',wp_strip_all_tags($content));

					if(count($word) > $lim){
						$content = implode(' ',array_slice($word,0,$lim));
					}

				?>
				<p><?php echo $content ?></p>

						
				
			</div>

			<div class="btn btn-primary">Submit Now</div>
			
			
		
		</div>
	 
	   

	</div>
	<?php endwhile;
			endif; ?>
 </div>
		</div>
    <?php
}



// CSS JS File Enqueue
public function slider_css_js_file_calling(){
	wp_enqueue_style('custom',plugins_url('/css/custom.css',__FILE__));
	wp_enqueue_style('bootstrap','https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css','','5.3.3');
	wp_enqueue_style('owl.carousel.min',plugins_url('/css/owl.carousel.min.css',__FILE__));
	wp_enqueue_style('owl.theme.default.min',plugins_url('/css/owl.theme.default.min.css',__FILE__));



	//JS
	
	wp_enqueue_script('bootstrap.bundle',plugins_url('js/bootstrap.bundle.js',__FILE__),array('jquery'));
	wp_enqueue_script('owl.carousel.min',plugins_url('js/owl.carousel.min.js',__FILE__),false);
	wp_enqueue_script('custom',plugins_url('js/custom.js',__FILE__),false);
} 
// Register Custom Post Type
public function dp_custom_slider() {

	$labels = array(
		'name'                  => _x( 'DP Sliders', 'Post Type General Name', 'slider_plugin' ),
		'singular_name'         => _x( 'DP Slider', 'Post Type Singular Name', 'slider_plugin' ),
		'menu_name'             => __( 'DP Sliders', 'slider_plugin' ),
		'name_admin_bar'        => __( 'DP Slider', 'slider_plugin' ),
		'archives'              => __( 'Item Archives', 'slider_plugin' ),
		'attributes'            => __( 'Item Attributes', 'slider_plugin' ),
		'parent_item_colon'     => __( 'Parent Item:', 'slider_plugin' ),
		'all_items'             => __( 'All Items', 'slider_plugin' ),
		'add_new_item'          => __( 'Add New Item', 'slider_plugin' ),
		'add_new'               => __( 'Add New', 'slider_plugin' ),
		'new_item'              => __( 'New Item', 'slider_plugin' ),
		'edit_item'             => __( 'Edit Item', 'slider_plugin' ),
		'update_item'           => __( 'Update Item', 'slider_plugin' ),
		'view_item'             => __( 'View Item', 'slider_plugin' ),
		'view_items'            => __( 'View Items', 'slider_plugin' ),
		'search_items'          => __( 'Search Item', 'slider_plugin' ),
		'not_found'             => __( 'Not found', 'slider_plugin' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'slider_plugin' ),
		'featured_image'        => __( 'Featured Image', 'slider_plugin' ),
		'set_featured_image'    => __( 'Set featured image', 'slider_plugin' ),
		'remove_featured_image' => __( 'Remove featured image', 'slider_plugin' ),
		'use_featured_image'    => __( 'Use as featured image', 'slider_plugin' ),
		'insert_into_item'      => __( 'Insert into item', 'slider_plugin' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'slider_plugin' ),
		'items_list'            => __( 'Items list', 'slider_plugin' ),
		'items_list_navigation' => __( 'Items list navigation', 'slider_plugin' ),
		'filter_items_list'     => __( 'Filter items list', 'slider_plugin' ),
	);
	$args = array(
		'label'                 => __( 'DP Slider', 'slider_plugin' ),
		'description'           => __( 'Post Type Description', 'slider_plugin' ),
		'labels'                => $labels,
		'supports'              => array('title','thumbnail','editor','excerpt'),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
        'menu_icon'             => 'dashicons-buddicons-replies',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'dp_slider', $args );

}

// Add Meta Box DP_Event_Slider

public function Add_Meta_Box(){
	add_meta_box(
		'dp_event_meta', //Meta Box ID
		'Event Details', //Meta Box Title
		array($this,'Custom_Meta_Box_Field'), //Meta Box Callback Function
		'dp_slider',
		'normal', //Custom Post Type Name
		'default'
	);
}
//Add Meta Box Field DP_Event_Slider
public function Custom_Meta_Box_Field($post){
	$date = get_post_meta($post->ID,'event_date',true);
	$place = get_post_meta($post->ID,'event_place',true);
	$price = get_post_meta($post->ID,'event_price',true);


	// Show These Field 

	echo '<label>Date : </label>';
	echo '<input type="text" name="event_date" value="'.esc_attr($date).'"/><br><br>';


	echo '<label>Place : </label>';
	echo '<input type="text" name="event_place" value="'.esc_attr($place).'"/><br><br>';

	echo '<label>Price : </label>';
	echo '<input type="text" name="event_price" value="'.esc_attr($price).'"/><br><br>';
}
// Save Meta Box Field Dp_Event_Slider
public function Save_Meta_Field($post_id) {

	error_log("Save_Meta_Field function is running for post ID: " . $post_id);

    global $wpdb;
	require_once(ABSPATH.'wp-admin/includes/upgrade.php');

   // if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
   // if (!current_user_can('edit_post', $post_id)) return;

    // Get sanitized meta fields
    $date = isset($_POST['event_date']) ? sanitize_text_field($_POST['event_date']) : '';
    $place = isset($_POST['event_place']) ? sanitize_text_field($_POST['event_place']) : '';
    $price = isset($_POST['event_price']) ? sanitize_text_field($_POST['event_price']) : '';

    // Save to post meta
    update_post_meta($post_id, 'event_date', $date);
    update_post_meta($post_id, 'event_place', $place);
    update_post_meta($post_id, 'event_price', $price);

    // Retrieve updated data
    $title   = get_the_title($post_id);
    $content = get_post_field('post_content', $post_id);
    $img     = get_the_post_thumbnail_url($post_id);
    $date    = get_post_meta($post_id, 'event_date', true);
    $place   = get_post_meta($post_id, 'event_place', true);
    $price   = get_post_meta($post_id, 'event_price', true);

    $tbl = $wpdb->prefix . 'slider_plugin_table';

    // Check if entry already exists
    $exist = $wpdb->get_var($wpdb->prepare("SELECT COUNT(*) FROM $tbl WHERE post_id = %d", $post_id));




	
    if ($exist) {
        $wpdb->update(
            $tbl,
            array(
                'title'   => $title,
                'content' => $content,
                'image'   => $img,
                'date'    => $date,
                'place'   => $place,
                'price'   => $price
            ),
            array('post_id' => $post_id),
            array('%s', '%s', '%s', '%s', '%s', '%s'),
            array('%d')
        );
    } else {
        $wpdb->insert(
            $tbl,
            array(
                'post_id' => $post_id,
                'title'   => $title,
                'content' => $content,
                'image'   => $img,
                'date'    => $date,
                'place'   => $place,
                'price'   => $price
            ),
            array('%d', '%s', '%s', '%s', '%s', '%s', '%s')
        );
    }

    // Debugging logs
    error_log("Saving post ID: " . $post_id);
    error_log("Title: " . $title);
    error_log("Image: " . $img);
    error_log("Date: " . $date);
    error_log("Place: " . $place);
    error_log("Price: " . $price);

    if ($wpdb->last_error) {
        error_log("Database Error: " . $wpdb->last_error);
    }
}




}

new dp_slider();

// Slider Plugin Activation Hook

function Slider_plugin_Activation(){
	global $wpdb;
	require_once(ABSPATH.'wp-admin/includes/upgrade.php');


	$sql = "CREATE TABLE `slider_plugin_table` (
			`id` int(11) NOT NULL AUTO_INCREMENT,
			`title` varchar(255) NOT NULL,
			`content` text NOT NULL,
			`image` varchar(255) NOT NULL,
			`date` varchar(255) NOT NULL,
			`place` varchar(255) NOT NULL,
			`price` varchar(255) NOT NULL,
			PRIMARY KEY (`id`)
			) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;";


	dbDelta($sql);


	


}

register_activation_hook(__FILE__, 'Slider_plugin_Activation');

//Slider Plugin Deactivation hook
function Slider_plugin_Deactivation(){
    global $wpdb;
    $wpdb->query("DROP TABLE IF EXISTS `slider_plugin_table`");
}
register_deactivation_hook(__FILE__,'Slider_plugin_Deactivation');

// Plugin Uninstall Hook
function Slider_plugin_Uninstall(){
	global $wpdb;
	$wpdb->query("DROP TABLE IF EXISTS 'slider_plugin_table' ");
}

register_uninstall_hook(__FILE__,'Slider_plugin_Uninstall');






?>