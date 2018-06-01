<?php
/*
Plugin Name: VW Open Graph
Plugin URI:  http://www.visualworks.com.br
Description: This plugin lets you edit the description, image, links and other default settings used by Open Graph for social sharing.
Version:     0.1
Author:      Henrique Mattos
Author URI:  http://www.visualworks.com.br
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Domain Path: /languages
Text Domain: vw-og
*/

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

// include_once 'test-head-footer.php';

class VW_OG_Options {
	function __construct() {
		if(is_admin()){
			add_action('admin_enqueue_scripts', array($this, 'vw_og_enqueue_scripts'));
			add_action('admin_menu', array($this, 'vw_og_admin_menu'));
			add_action('wp_ajax_vw_og_save', array(&$this, 'ajax_save_data') );
		} else {
			add_action('wp_head', array($this, 'vw_og_wp_head'), 8765);
		}
	}
	function vw_og_enqueue_scripts() {
		wp_enqueue_script('media-upload');
		wp_enqueue_script('jQuery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js', false, true);

		// Register the script first.
		wp_register_script('vwog', plugins_url('default.js', __FILE__), array('jQuery', 'media-upload'), false, true);
		
		// Now we can localize the script with our data.
		$translation_array = array('getTemplateDirectoryUri' => get_template_directory_uri(), 'nonce' => wp_create_nonce('vw_og_nonce'));
		wp_localize_script('vwog', 'wpVar', $translation_array);
		
		// The script can be enqueued now or later.
		wp_enqueue_script('vwog');
	}
	function vw_og_admin_menu() {
		add_options_page( 'VW Open Graph','VW Open Graph','manage_options','vw-og.php', array($this, 'vw_og_init'));
	}
	function vw_og_init() {
		$nonce = wp_create_nonce('vw_og_nonce');
		include_once 'template-vwog.php';
    }
	
	function wp_ajax_vw_og_save() {
		wp_die('testing');
		if(isset($_POST)){
			echo 'blabla';
			update_option('vw_og_locale', $_POST['vw_og_locale']);
			update_option('vw_og_url', $_POST['vw_og_url']);
			update_option('vw_og_title', $_POST['vw_og_title']);
			update_option('vw_og_description', $_POST['vw_og_description']);
			update_option('vw_og_type', $_POST['vw_og_type']);
			update_option('vw_og_image', $_POST['vw_og_image']);
			update_option('vw_og_site_name', $_POST['vw_og_site_name']);
			update_option('vw_og_fb_admins', $_POST['vw_og_fb_admins']);
			update_option('vw_og_fb_app_id', $_POST['vw_og_fb_app_id']);
			update_option('vw_og_twitter_account_id', $_POST['vw_og_twitter_account_id']);
			update_option('vw_og_twitter_url', $_POST['vw_og_twitter_url']);
			update_option('vw_og_twitter_card', $_POST['vw_og_twitter_card']);
			update_option('vw_og_twitter_creator', $_POST['vw_og_twitter_creator']);
			update_option('vw_og_twitter_site', $_POST['vw_og_twitter_site']);
		}
	}

	function vw_og_wp_head() {
		if(!is_single()){
			$title = get_option('vw_og_title');
			$theTitle = wp_title('', false);
			if($theTitle !== null && $theTitle !== '' && $theTitle !== ' '){
				$title = ltrim(rtrim($theTitle)) . ' | ' . $title;
			}

			$url = get_permalink();
			if($url === null || $url === '' || $url ===' '){
				$url = get_option('vw_og_url');
			}

			$page_id = get_queried_object_id();
			if ( has_post_thumbnail( $page_id ) ) :
				$image_array = wp_get_attachment_image_src( get_post_thumbnail_id( $page_id ), 'optional-size' );
				$image = $image_array[0];
			else :
				$image = get_option('vw_og_image');
			endif;

			echo '<meta property="og:locale" content="' . get_option('vw_og_locale') . '"/>';
			echo '<meta property="og:url" content="' . $url . '" />';
			echo '<meta property="og:title" content="' . $title . '" />';
			echo '<meta property="og:description" content="' . get_option('vw_og_description') . '" />';
			echo '<meta property="og:type" content="' . get_option('vw_og_type') . '" />';
			echo '<meta property="og:image" content="' . $image . '" />';
			echo '<meta property="og:site_name" content="' . get_option('vw_og_site_name') . '"/>';
			echo '<meta property="fb:admins" content="' . get_option('vw_og_fb_admins') . '" />';
			echo '<meta property="fb:app_id" content="' . get_option('vw_og_fb_app_id') . '"/>';
			$twitter = get_option('vw_og_twitter_account_id');
			if($twitter !== null && $twitter !== '' && $twitter !== ' '){
				echo '<meta property="twitter:account_id" content="' . get_option('vw_og_twitter_account_id') . '" />';
				echo '<meta name="twitter:url" content="' . $url . '">';
				echo '<meta name="twitter:card" content="' . get_option('vw_og_twitter_card') . '">';
				echo '<meta name="twitter:creator" content="' . get_option('vw_og_twitter_creator') . '">';
				echo '<meta name="twitter:site" content="' . get_option('vw_og_twitter_site') . '">';
			}
		}
	}
}
new VW_OG_Options();

add_action('wp_ajax_vw_og_save_data', 'vw_og_save_data');
function vw_og_save_data() {
	if(isset($_POST)){
		update_option('vw_og_locale', $_POST['vw_og_locale']);
		update_option('vw_og_url', $_POST['vw_og_url']);
		update_option('vw_og_title', $_POST['vw_og_title']);
		update_option('vw_og_description', $_POST['vw_og_description']);
		update_option('vw_og_type', $_POST['vw_og_type']);
		update_option('vw_og_image', $_POST['vw_og_image']);
		update_option('vw_og_site_name', $_POST['vw_og_site_name']);
		update_option('vw_og_fb_admins', $_POST['vw_og_fb_admins']);
		update_option('vw_og_fb_app_id', $_POST['vw_og_fb_app_id']);
		update_option('vw_og_twitter_account_id', $_POST['vw_og_twitter_account_id']);
		update_option('vw_og_twitter_url', $_POST['vw_og_twitter_url']);
		update_option('vw_og_twitter_card', $_POST['vw_og_twitter_card']);
		update_option('vw_og_twitter_creator', $_POST['vw_og_twitter_creator']);
		update_option('vw_og_twitter_site', $_POST['vw_og_twitter_site']);
	}
	wp_die('settings saved');
}