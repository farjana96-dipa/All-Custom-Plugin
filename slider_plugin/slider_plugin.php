

<script>

</script>


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


public function __construct(){
    add_action('init',array($this,'dp_custom_slider'));
	add_action('wp_enqueue_scripts',array($this,'slider_css_js_file_calling'));
	add_shortcode('dp-slider',array($this,'dp_slider_shortcode'));
}
//DP Slider Shortcode

	
public function dp_slider_shortcode(){


	?>
	<div class="container text-center">
	 <div class="row py-5 row3 owl-carousel event-row">
        
		<?php
				$slider = new WP_Query(array(
					'post_type' => 'dp_custom_slider',
					'posts_per_page' => 6
				));

			  
			
				if($slider->have_posts()) :
				   
					while($slider->have_posts()) : $slider->the_post();
			
			?>
	<div class="item">


		<div class="inner_container">
			<div class="event_img">
			   <?php echo the_post_thumbnail(); ?>
			</div>
			
			<div class="title">
				<h3><?php echo the_title(); ?></h3>
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
		'supports'              => array( 'title', 'editor', 'thumbnail' ),
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
	register_post_type( 'dp_custom_slider', $args );

}



}

new dp_slider();





?>