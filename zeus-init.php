<?php
if( !defined( 'WPINC' ) ){
    die;
}
/**
 * @Packge       : Zeus Companion
 * @Version      : 1.0
 * @Author       : Hasan Fardous
 * @Author URI 	 : https://github.com/hasanfardous
 *
 */

// Sidebar widgets include
require_once ZEUS_COMPANION_SW_DIR_PATH. 'about-widget.php';
require_once ZEUS_COMPANION_SW_DIR_PATH. 'blog-widget.php';
require_once ZEUS_COMPANION_SW_DIR_PATH. 'contact-info.php';
require_once ZEUS_COMPANION_SW_DIR_PATH. 'instagram.php';
require_once ZEUS_COMPANION_SW_DIR_PATH. 'newsletter-widget.php';
require_once ZEUS_COMPANION_SW_DIR_PATH. 'social-links.php';
require_once ZEUS_COMPANION_INC_DIR_PATH . 'functions.php';
require_once ZEUS_COMPANION_INC_DIR_PATH . 'instagram-api.php';

// Demo import include
require_once ZEUS_COMPANION_DEMO_DIR_PATH . 'demo-import.php';

?>