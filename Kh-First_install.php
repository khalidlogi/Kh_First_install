<?php 

/**
 *
 * @link              http://khalid.com
 * @since             1.0.0
 * @package           kh_Post_Cars
 *
 * @wordpress-plugin
 * Plugin Name:       KHalid
 * Plugin URI:        http://khalid.com/
 * Description:       A plugin with a custom post type called Cars. The Custom post type will be storing data about cars
 * Version:           1.0.0
 * Author:            Ocen Chris
 * Author URI:        http://ocenchris.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       kh-post-cars
 * Domain Path:       /languages
 */

// If this file is access directly, abort!!!
defined( 'ABSPATH' ) or die( 'Unauthorized Access' );




class KH_First_Install {
    public function __construct() {
        register_activation_hook(__FILE__, array($this,'custom_plugin_modify_htaccess'));
        add_action( 'admin_notices', array($this,'show_upload_max_filesize_notice' ));

    }
    
    public function activate(){
       // $this->set_custom_php_config();
        add_option( 'custom_plugin_activated', true );
    }

    function custom_plugin_modify_htaccess() {
        add_option( 'custom_plugin_activated', true );
        $htaccess_path = ABSPATH . '.htaccess';
    
        if (is_writable($htaccess_path)) {
            $htaccess_content = "<IfModule mod_php5.c>\n";
            $htaccess_content .= "    php_value upload_max_filesize 128M\n";
            $htaccess_content .= "    php_value post_max_size 128M\n";
            $htaccess_content .= "    php_value max_execution_time 300\n";
            $htaccess_content .= "    php_value max_input_time 300\n";
            $htaccess_content .= "</IfModule>\n\n";
    
            $htaccess_content .= "<IfModule mod_php7.c>\n";
            $htaccess_content .= "    php_value upload_max_filesize 128M\n";
            $htaccess_content .= "    php_value post_max_size 128M\n";
            $htaccess_content .= "    php_value max_execution_time 300\n";
            $htaccess_content .= "    php_value max_input_time 300\n";
            $htaccess_content .= "</IfModule>\n\n";
    
            $htaccess_content .= "<IfModule mod_fcgid.c>\n";
            $htaccess_content .= "    FcgidMaxRequestLen 134217728\n";
            $htaccess_content .= "</IfModule>\n\n";
    
            $htaccess_content .= "<IfModule mod_fcgid.c>\n";
            $htaccess_content .= "    FcgidConnectTimeout 60\n";
            $htaccess_content .= "    FcgidIdleTimeout 600\n";
            $htaccess_content .= "    FcgidProcessLifeTime 30\n";
            $htaccess_content .= "    FcgidIOTimeout 120\n";
            $htaccess_content .= "</IfModule>\n\n";
    
            $htaccess_content .= "<IfModule mod_cgi.c>\n";
            $htaccess_content .= "    php_value upload_max_filesize 128M\n";
            $htaccess_content .= "    php_value post_max_size 128M\n";
            $htaccess_content .= "    php_value max_execution_time 300\n";
            $htaccess_content .= "    php_value max_input_time 300\n";
            $htaccess_content .= "</IfModule>\n\n";
    
            $htaccess_file = fopen($htaccess_path, 'a');
            fwrite($htaccess_file, $htaccess_content);
            fclose($htaccess_file);
        }
    }

    function set_custom_php_config() {
        // Set the maximum file upload size
        ini_set('upload_max_filesize', '500M');
        // Set the maximum POST data size
        ini_set('post_max_size', '500M');
        // Set the maximum execution time
        ini_set('max_execution_time', 300);
        // Set the maximum input time
        ini_set('max_input_time', 300);
    }

    function show_upload_max_filesize_notice() {
        $custom_plugin_activated = get_option( 'custom_plugin_activated', false );
        if ( $custom_plugin_activated ) {
            $upload_max_size = ini_get('upload_max_filesize'); $post_max_size = ini_get('post_max_size');
            $message = sprintf( __( 'The maximum upload file size is now set to %s.', 'custom-plugin' ), $upload_max_size );
            echo '<div class="notice notice-success is-dismissible"><p>' . $message . '</p></div>';
       
            delete_option( 'custom_plugin_activated' );
        }
    }
    
    

}


$newcar = new KH_First_Install();





 
