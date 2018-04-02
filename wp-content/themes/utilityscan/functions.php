<?php
require_once('modal/class.Base.php');
require_once('modal/class.Settings.php');
require_once('modal/class.PageSetting.php');
require_once('modal/class.Service.php');
require_once(STYLESHEETPATH . '/includes/wordpress-tweaks.php');
loadVCTemplates();
add_action( 'wp_enqueue_scripts', 'p_enqueue_styles');
function p_enqueue_styles() {
    wp_enqueue_style( 'bootstrap-css', get_stylesheet_directory_uri() . '/css/bootstrap.min.css?' . filemtime(get_stylesheet_directory() . '/css/bootstrap.min.css'));
    wp_enqueue_style( 'font-awesome', get_stylesheet_directory_uri() . '/css/font-awesome.min.css?' . filemtime(get_stylesheet_directory() . '/css/font-awesome.css'));
    wp_enqueue_style( 'understrap-theme', get_stylesheet_directory_uri() . '/style.css?' . filemtime(get_stylesheet_directory() . '/style.css'));
    wp_enqueue_style( 'opensans', 'https://fonts.googleapis.com/css?family=Open+Sans:400,700');
    wp_enqueue_style( 'raleway', 'https://fonts.googleapis.com/css?family=Raleway');
    wp_enqueue_style( 'kanit', 'https://fonts.googleapis.com/css?family=Kanit:400,700');
    wp_enqueue_script('bootstrap-js', get_stylesheet_directory_uri() . '/js/bootstrap.min.js?' . filemtime(get_stylesheet_directory() . '/js/bootstrap.min.js'), array('jquery'));
    wp_enqueue_script('understap-theme', get_stylesheet_directory_uri() . '/js/theme.js?' . filemtime(get_stylesheet_directory() . '/js/theme.js'), array('jquery'));
}
function understrap_remove_scripts() {
    wp_dequeue_style( 'understrap-styles' );
    wp_deregister_style( 'understrap-styles' );

    wp_dequeue_script( 'understrap-scripts' );
    wp_deregister_script( 'understrap-scripts' );

// Removes the parent themes stylesheet and scripts from inc/enqueue.php
}
add_action( 'wp_enqueue_scripts', 'understrap_remove_scripts', 20 );



add_filter( 'vc_load_default_templates', 'p_vc_load_default_templates' ); // Hook in
function p_vc_load_default_template( $data ) {
    return array();
}
add_image_size( 'inside-banner', 2000, 800, true );

function getImageID($image_url)
{
    global $wpdb;
    $sql = 'SELECT ID FROM wp_posts WHERE guid = "' . $image_url . '"';
    $result = $wpdb->get_results($sql);

    return $result[0]->ID;
}

function footerMenu() {
    $setting = new Setting(15);
    $html = '
    <ul>
        <li><a href="' . $setting->getBookingLink() . '" target="_blank">Make a booking</a></li>
        <li><a href="' . $setting->getAccountLink() . '" target="_blank">My account</a></li>
        <li><a href="' . get_page_link(19) . '">Terms of trade</a></li>
        <li><a href="tel:' . formatPhoneNumber($setting->getPhone()) . '">' . $setting->getPhone() . '</a></li>
    </ul>';

    return $html;
}
function formatPhoneNumber($ph) {
    $ph = str_replace('(', '', $ph);
    $ph = str_replace(')', '', $ph);
    $ph = str_replace(' ', '', $ph);
    $ph = str_replace('+64', '0', $ph);

    return $ph;

}
function hideCTA() {
    global $post;
    $setting = new PageSetting($post->ID);
    if($setting->getFooterCTA() == 1) {
        return true;
    } else {
        return false;
    }
}
function getServices() {
    $services = Array();
    $post_array = get_posts([
        'post_type' => 'service',
        'post_status' => 'published',
        'numberposts' => -1,
        'orderby' => 'ID',
        'order' => 'ASC'
    ]);
    foreach($post_array as $post) {
        $service = new Service($post);
        $services[] = $service;
    }
    return $services;
}