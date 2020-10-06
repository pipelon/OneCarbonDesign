<?php
/**
 * TemplateMela
 * @copyright  Copyright (c) TemplateMela. (http://www.templatemela.com)
 * @license    http://www.templatemela.com/license/
 * @author         TemplateMela
 * @version        Release: 1.0
 */
/**  Set Default options : Theme Settings  **/
function tmpmela_set_default_options_child()
{
  add_option("tmpmela_logo_image", get_stylesheet_directory_uri()."/images/megnor/logo.png"); // set logo image	
	add_option("tmpmela_mob_logo_image", get_stylesheet_directory_uri()."/images/megnor/logo.png"); // set logo image	
  
  add_option("tmpmela_button_color","FFF138"); // button color
  add_option("tmpmela_button_text_color","FFFFFF"); // button Text color

  add_option("tmpmela_header_bkg_color","ffffff"); // header background color   
  add_option("tmpmela_header_topbkg_color","ffffff"); // header top background color
  add_option("tmpmela_header_bottombkg_color","000000"); // header bottom background color 
  add_option("tmpmela_header_bottombkg_opacity","0.5"); // header bottom background opacity  
  add_option("tmpmela_header_toptext_color","000000"); // header top text color
  add_option("tmpmela_header_toptexthover_color","FFF138"); // header top text hover color  

  add_option("tmpmela_menu_activelink_color","FFF138"); // Navigation menu active link color
  add_option("tmpmela_menu_activelinkhover_color","FFF138"); // Navigation menu active link hover color
  add_option("tmpmela_menu_parentlink_color","ffffff"); // Navigation menu parent link color
  add_option("tmpmela_menu_parentlinkhover_color","FFF138"); // Navigation menu parent link hover color
  add_option("tmpmela_menu_childlink_color", "ffffff"); // Navigation menu child link color
  add_option("tmpmela_menu_subchildlink_color","8a8a8a"); // Navigation menu sub-child link color
  add_option("tmpmela_menu_childlinkhover_color","FFF138"); // Navigation menu sub-child link hover color

  add_option("tmpmela_hoverlink_color","8A8A8A"); // link hover color

  add_option("tmpmela_footerhoverlink_color","FFF138"); // footer link hover text color
}
add_action('init', 'tmpmela_set_default_options_child');
function tmpmela_child_scripts() {
    wp_enqueue_style( 'tmpmela-child-style', get_template_directory_uri(). '/style.css' );	
}
add_action( 'wp_enqueue_scripts', 'tmpmela_child_scripts' );

/********************************************************
**************** One Click Import Data ******************
********************************************************/

if ( ! function_exists( 'tmpmela_sampledata_import_files' ) ) :
function tmpmela_sampledata_import_files() {
    return array(
		 array(
            'import_file_name'             => __( 'Default Demo', 'sheon_skateboard'),
            'local_import_file'            => trailingslashit( get_stylesheet_directory() ) . 'demo-content/demo3/sheon_skateboard.wordpress.xml',
            'local_import_customizer_file' => trailingslashit( get_stylesheet_directory() ) . 'demo-content/demo3/sheon_skateboard_customizer_export.dat',
			'local_import_widget_file'     => trailingslashit( get_stylesheet_directory() ) . 'demo-content/demo3/sheon_skateboard_widgets_settings.wie',
            'import_notice'                => esc_html__( 'Please waiting for a few minutes, do not close the window or refresh the page until the data is imported.', 'sheon' ),
        ),
		);
}
add_filter( 'pt-ocdi/import_files', 'tmpmela_sampledata_import_files' );
endif;

if ( ! function_exists( 'tmpmela_sampledata_after_import' ) ) :
function tmpmela_sampledata_after_import($selected_import) {
    //Set Menu
    $header_menu = get_term_by('name', 'MainMenu', 'nav_menu');
    $top_menu = get_term_by('name', 'Header Top Links', 'nav_menu');
    $account_menu = get_term_by('name', 'Header Account Links', 'nav_menu');
    $footer_menu = get_term_by('name', 'MainMenu', 'nav_menu');
    set_theme_mod( 'nav_menu_locations' , array( 
       'primary'   => $header_menu->term_id,
       'header-menu'   => $top_menu->term_id ,
       'account-menu'   => $account_menu->term_id ,
       'footer-menu'   => $footer_menu->term_id 
      ) 
    );
		
		//Set Front page and blog page
       $page = get_page_by_title( 'Home');
       if ( isset( $page->ID ) ) {
        update_option( 'page_on_front', $page->ID );
        update_option( 'show_on_front', 'page' );
       }
	   $post = get_page_by_title( 'Blog');
       if ( isset( $page->ID ) ) {
        update_option( 'page_for_posts', $post->ID );
        update_option( 'show_on_posts', 'post' );
       }
	   
	   //Import Revolution Slider
       if ( class_exists( 'RevSlider' ) ) {
           $slider_array = array(
              get_stylesheet_directory()."/demo-content/demo3/tmpmela_homeslider_skateboard.zip",
              );
 
           $slider = new RevSlider();
        
           foreach($slider_array as $filepath){
             $slider->importSliderFromPost(true,true,$filepath);  
           }
           echo esc_html__( 'Slider processed', 'sheon' );
      }
}
add_action( 'pt-ocdi/after_import', 'tmpmela_sampledata_after_import' );
endif;
?>