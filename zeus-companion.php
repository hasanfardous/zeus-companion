<?php
/*
 * Plugin Name:       Zeus Companion
 * Plugin URI:        https://github.com/hasanfardous/zeus-companion/
 * Description:       Zeus Companion is a companion plugin for Zeus theme.
 * Version:           1.0.
 * Author:            Hasan Fardous
 * Author URI:        https://github.com/hasanfardous
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       zeus-companion
 * Domain Path:       /languages
 */


if( !defined( 'WPINC' ) ){
    die;
}

/*************************
    Define Constant
*************************/

// Define version constant
if( !defined( 'ZEUS_COMPANION_VERSION' ) ){
    define( 'ZEUS_COMPANION_VERSION', '1.1' );
}

// Define dir path constant
if( !defined( 'ZEUS_COMPANION_DIR_PATH' ) ){
    define( 'ZEUS_COMPANION_DIR_PATH', plugin_dir_path( __FILE__ ) );
}

// Define inc dir path constant
if( !defined( 'ZEUS_COMPANION_INC_DIR_PATH' ) ){
    define( 'ZEUS_COMPANION_INC_DIR_PATH', ZEUS_COMPANION_DIR_PATH.'inc/' );
}

// Define sidebar widgets dir path constant
if( !defined( 'ZEUS_COMPANION_SW_DIR_PATH' ) ){
    define( 'ZEUS_COMPANION_SW_DIR_PATH', ZEUS_COMPANION_INC_DIR_PATH.'sidebar-widgets/' );
}

// Define demo data dir path constant
if( !defined( 'ZEUS_COMPANION_DEMO_DIR_PATH' ) ){
    define( 'ZEUS_COMPANION_DEMO_DIR_PATH', ZEUS_COMPANION_INC_DIR_PATH.'demo-data/' );
}


$current_theme = wp_get_theme();

$is_parent = $current_theme->parent();



if( ( 'Zeus' ==  $current_theme->get( 'Name' ) ) || ( $is_parent && 'Zeus' == $is_parent->get( 'Name' ) ) ){
    require_once ZEUS_COMPANION_DIR_PATH . 'zeus-init.php';
}else{

    add_action( 'admin_notices', 'zeus_companion_admin_notice', 99 );
    function zeus_companion_admin_notice() {
        $url = 'https://github.com/hasanfardous/zeus-theme/';
    ?>
        <div class="notice-warning notice">
            <p><?php printf( __( 'In order to use the <strong>Zeus Companion</strong> plugin you have to also install the %1$sZeus Theme%2$s', 'zeus-companion' ), '<a href="'.esc_url( $url ).'" target="_blank">', '</a>' ); ?></p>
        </div>
        <?php
    }
}

?>