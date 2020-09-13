<?php 
if( !defined( 'WPINC' ) ){
    die;
}
/**
 * @Packge       : Zeus
 * @Version      : 1.0
 * @Author       : Hasan Fardous
 * @Author URI 	 : https://github.com/hasanfardous
 *
 */

// demo import file
function zeus_import_files() {
	
	$demoImg = '<img src="'.plugins_url( 'screen-image.jpg', __FILE__ ) .'" alt="'.esc_attr__( 'Demo Preview Imgae', 'zeus-companion' ).'" />';
	
  return array(
    array(
      'import_file_name'             => 'Zeus Demo',
      'local_import_file'            => ZEUS_COMPANION_DEMO_DIR_PATH .'zeus-demo.xml',
      'local_import_widget_file'     => ZEUS_COMPANION_DEMO_DIR_PATH .'zeus-widgets-demo.wie',
      'import_customizer_file_url'   => plugins_url( 'zeus-customizer.dat', __FILE__ ),
      'import_notice' => $demoImg,
    ),
  );
}
add_filter( 'pt-ocdi/import_files', 'zeus_import_files' );
	
// demo import setup
function zeus_after_import_setup() {
	// Assign menus to their locations.
	$primary_menu    	= get_term_by( 'name', 'Primary Menu', 'nav_menu' );
	$explore   			= get_term_by( 'name', 'Explore', 'nav_menu' );
	$navigation   	 	= get_term_by( 'name', 'Navigation', 'nav_menu' );
	$footer_menu   		= get_term_by( 'name', 'Footer Bottom Menu', 'nav_menu' );

	set_theme_mod( 'nav_menu_locations', array(
			'primary-menu' 			=> $primary_menu->term_id,
			'explore'  				=> $explore->term_id,
			'navigation'  			=> $navigation->term_id,
			'footer-bottom-menu'	=> $footer_menu->term_id
		)
	);

	// Assign front page and posts page (blog page).
	$front_page_id = get_page_by_title( 'Homepage' );
	$blog_page_id  = get_page_by_title( 'Blog' );

	update_option( 'show_on_front', 'page' );
	update_option( 'page_on_front', $front_page_id->ID );
	update_option( 'page_for_posts', $blog_page_id->ID );

	// Add an option to check after import is done
	update_option( 'zeus-import-data', true );

}
add_action( 'pt-ocdi/after_import', 'zeus_after_import_setup' );

//disable the branding notice after successful demo import
add_filter( 'pt-ocdi/disable_pt_branding', '__return_true' );

//change the location, title and other parameters of the plugin page
function zeus_import_plugin_page_setup( $default_settings ) {
	$default_settings['parent_slug'] = 'themes.php';
	$default_settings['page_title']  = esc_html__( 'One Click Demo Import' , 'zeus-companion' );
	$default_settings['menu_title']  = esc_html__( 'Import Demo Data' , 'zeus-companion' );
	$default_settings['capability']  = 'import';
	$default_settings['menu_slug']   = 'zeus-demo-import';

	return $default_settings;
}
add_filter( 'pt-ocdi/plugin_page_setup', 'zeus_import_plugin_page_setup' );

// Enqueue scripts
function zeus_demo_import_custom_scripts(){
	
	
	if( isset( $_GET['page'] ) && $_GET['page'] == 'zeus-demo-import' ){
		// style
		wp_enqueue_style( 'zeus-demo-import', plugins_url( 'css/demo-import.css', __FILE__ ), array(), '1.0', false );
	}
	
	
}
add_action( 'admin_enqueue_scripts', 'zeus_demo_import_custom_scripts' );
