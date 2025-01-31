


<?php

/*

Plugin Name: Related Post Plugin
Plugin URI: https://related_post_plugin.com/
Version: 1.0.0
Description: This plugin is created for practice perpose
Author: Farjana Dipa
Author URI: https://farjana-dipa.com/
Text Domain: something

*/


function css_file_calling(){
    wp_enqueue_style('custom-style', plugins_url('style.css', __FILE__), array(), '1.0', 'all');
}
add_action('wp_enqueue_scripts', 'css_file_calling');


add_filter('the_content','dp_related_post');

function dp_related_post($content){
    if(is_single()){

       $cur_post_id = get_the_ID();
       $categories = wp_get_post_categories($cur_post_id);
       
       $args = array(
            'categories_in' => $categories,
            'post__not_in' => array($cur_post_id),
            'posts_per_page' => 3,
            'order' => 'rand'
       );

       $related_posts = new WP_Query($args);

       if($related_posts->have_posts()){
        $content.= "<div class='relpost'><h2>Related Posts</h2>";
        $content .= "<ul>";
        while($related_posts->have_posts()):
            $related_posts->the_post();
            
            $content .= "<li>";
            $content .="<div class='post_block'>";
            if(has_post_thumbnail()){
                $content .= get_the_post_thumbnail() ;
            }

            $catName = get_the_category();
            if(!empty($catName)){
                $content .= "<strong class='catlevel'>Category: </strong>";
                foreach($catName as $c){
                    $content .= ' <a href="'.get_category_link($c->term_id).'" class="cat-link">' .($c->name). '</a>';
                    $content .= "<br>";
                }
            }
            $content .= "<a href='".get_permalink()."'>" . get_the_title() . "</a><br>";

            $cont = get_the_content();
            $limit = 20;

            $cont = explode(' ',wp_strip_all_tags($cont));

            if(count($cont) > $limit){
                $excerpt = implode(' ',array_slice($cont,0,$limit));
                $readmore = '<br><a href="'.get_the_permalink().'" class="read_btn">Read More</a><br>';
                $content .= "<p>" . $excerpt . "</p>";
                $content .= $readmore;
            }
            
            else{
                $content .= "<p>" . get_the_content() . "</p>";
            }

            

            $content .= "</div>";

            $content .= "</li>";

            

            wp_reset_postdata();

        endwhile;

        $content .= "</ul>";
        $content .= "</div>";
       }

    }

    return $content;
}




// Wp Admin Menu

add_action('after_setup_theme','dp_admin_menu');

function dp_admin_menu(){
    register_nav_menus(array(
        'main_menu' => 'Main Menu'
    ));
}


?>


