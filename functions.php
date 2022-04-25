<?php 
 
  // Add Theme Features
 function wptd_theme_features() {
         add_theme_support( 'title-tag' );
         add_theme_support( 'menus' );
         
         //custom logo

         add_theme_support( 'custom-logo',  array(
          'height'               => 110,
          'width'                => 180,
          'flex-height'          => true,
          'flex-width'           => true,
          'unlink-homepage-logo' => true, 
          
         ));
         //nav menu
         register_nav_menus(
          array(
            'header-menu' => ( 'Header Menu' ),
            
          )
         );
 } 
 add_action( 'after_setup_theme', 'wptd_theme_features' ); 
 
 // Include Css and Js
 add_action( 'wp_enqueue_scripts', 'wptd_theme_css_js' );
 function wptd_theme_css_js() {
  wp_enqueue_style( 'wptd-style', get_stylesheet_uri() ); 

  wp_enqueue_style( 'google-fonts', '//fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap' );

  wp_enqueue_script( 'wptd-custom', get_template_directory_uri() . '/assets/js/scripts.js', array( 'jquery' ),  false, true );
}

// Add Icon to Menu Item has Sub Menu

function add_icon_has_submenu($classes, $menu_item, $args ) {
                            
    if('header-menu' === $arge->theme_location && in_array( 'menu-item-has-children', $classes)) {
       $menu_item->title .= '<span class="dropdown-menu-toggle"></span>';
    }
  return $classes;
}
 