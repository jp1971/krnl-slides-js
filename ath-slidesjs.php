<?php
/*
Plugin Name: Athletics SlidesJS
Description: A WordPress plugin for the SlidesJS jQuery plugin by Nathan Searles.
Version: 1.0.0
Author: Athletics
Author URI: http://athleticsnyc.com
License: GPL2
*/

/*  Copyright 2013 JP1971 (jameson@athleticsnyc.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA 02110-1301 USA
*/


register_activation_hook( __FILE__, 'ath_slidesjs_activate' );
function ath_slidesjs_activate() {

    update_option ( 'slides_width', 940 );
    update_option ( 'slides_height', 450 );
    update_option ( 'slides_navigation', 'false' );
    update_option ( 'slides_navigation_effect', 'slide' );
    update_option ( 'slides_pagination', 'true' );
    update_option ( 'slides_pagination_effect', 'slide' );
    update_option ( 'slides_play_active', 'false' );
    update_option ( 'slides_play_effect', 'slide' );
    update_option ( 'slides_play_interval', 5000 );
    update_option ( 'slides_play_auto', 'false' );
    update_option ( 'slides_play_swap', 'false' );
    update_option ( 'slides_play_hover', 'false' );
    update_option ( 'slides_play_delay', 2500 );
    update_option ( 'slides_effect_slide_speed', 200 );
    update_option ( 'slides_effect_fade_speed', 300 );
    update_option ( 'slides_effect_fade_crossfade', 'true' );

}

register_uninstall_hook( __FILE__, 'ath_slidesjs_uninstall' );
function ath_slidesjs_uninstall() {

    delete_option ( 'slides_width' );
    delete_option ( 'slides_height' );
    delete_option ( 'slides_navigation' );
    delete_option ( 'slides_navigation_effect' );
    delete_option ( 'slides_pagination' );
    delete_option ( 'slides_pagination_effect' );
    delete_option ( 'slides_play_active' );
    delete_option ( 'slides_play_effect' );
    delete_option ( 'slides_play_interval' );
    delete_option ( 'slides_play_auto' );
    delete_option ( 'slides_play_swap' );
    delete_option ( 'slides_play_hover' );
    delete_option ( 'slides_play_delay' );
    delete_option ( 'slides_effect_slide_speed' );
    delete_option ( 'slides_effect_fade_speed' );
    delete_option ( 'slides_effect_fade_crossfade' );

    unregister_setting( 'ath_slidesjs_settings_group', 'slides_width' );
    unregister_setting( 'ath_slidesjs_settings_group', 'slides_height' );
    unregister_setting( 'ath_slidesjs_settings_group', 'slides_start' );
    unregister_setting( 'ath_slidesjs_settings_group', 'slides_navigation' );
    unregister_setting( 'ath_slidesjs_settings_group', 'slides_navigation_effect' );
    unregister_setting( 'ath_slidesjs_settings_group', 'slides_pagination' );
    unregister_setting( 'ath_slidesjs_settings_group', 'slides_pagination_effect' );
    unregister_setting( 'ath_slidesjs_settings_group', 'slides_play_active' );
    unregister_setting( 'ath_slidesjs_settings_group', 'slides_play_effect' );
    unregister_setting( 'ath_slidesjs_settings_group', 'slides_play_interval' );
    unregister_setting( 'ath_slidesjs_settings_group', 'slides_play_auto' );
    unregister_setting( 'ath_slidesjs_settings_group', 'slides_play_swap' );
    unregister_setting( 'ath_slidesjs_settings_group', 'slides_play_hover' );
    unregister_setting( 'ath_slidesjs_settings_group', 'slides_play_delay' );
    unregister_setting( 'ath_slidesjs_settings_group', 'slides_effect_slide_speed' );
    unregister_setting( 'ath_slidesjs_settings_group', 'slides_effect_fade_speed' );
    unregister_setting( 'ath_slidesjs_settings_group', 'slides_effect_fade_crossfade' );
}

register_deactivation_hook( __FILE__, 'ath_slidesjs_deactivate' );
function ath_slidesjs_deactivate() {

}   

add_action( 'wp_enqueue_scripts', 'ath_slidesjs_enqueue_scripts' );
function ath_slidesjs_enqueue_scripts() {
    wp_enqueue_script(
        'ath_slidesjs', //$handle
        plugins_url( 'athletics-slidesjs/js/jquery.slides.min.js' , dirname(__FILE__) ), //$src
        'jquery', //$deps (dependencies)
        '3.0.4', //$ver
        false //$in_footer
    );
}

add_action( 'wp_footer', 'ath_slidesjs_footer_code' );
function ath_slidesjs_footer_code() {

    $html = "<script>
jQuery(document).ready(function(){
    jQuery('#slides').slidesjs({
        width: " . get_option( 'slides_width' ) . ",
        height: " . get_option( 'slides_height' ) . ",
        navigation: {
            active: " . get_option( 'slides_navigation' ) . ",
            effect: '" . get_option( 'slides_navigation_effect' ) . "'
        },
        pagination: {
            active: " . get_option( 'slides_pagination' ) . ",
            effect: '" . get_option( 'slides_pagination_effect' ) . "'
        },
        play: {
            active: " . get_option( 'slides_play_active' ) . ",
            effect: '" . get_option( 'slides_play_effect' ) . "',
            interval: " . get_option( 'slides_play_interval' ) . ",
            auto: " . get_option( 'slides_play_auto' ) . ",
            swap: " . get_option( 'slides_play_swap' ) . ",
            pauseOnHover: " . get_option( 'slides_play_hover' ) . ",
            restartDelay: " . get_option( 'slides_play_delay' ) . "
        },
        effect: {
            slide: {
                speed: " . get_option( 'slides_effect_slide_speed' ) . "
            },
            fade: {
                speed: " . get_option( 'slides_effect_fade_speed' ) . ",
                crossfade: " . get_option( 'slides_effect_fade_crossfade' ) . "
            }
        }
    });
});</script>";
    echo $html;
}

// create custom plugin settings menu
add_action( 'admin_menu', 'ath_slidesjs_create_menu' );
function ath_slidesjs_create_menu() {

    //create new top-level menu
    add_options_page( 'SlidesJS Settings', 'SlidesJS', 'manage_options', __FILE__, 'ath_slidesjs_settings_page' );

    //call register settings function
    add_action( 'admin_init', 'register_ath_slidesjs_settings' );
}

function register_ath_slidesjs_settings() {
    //Register SlidesJS settings
    register_setting( 'ath_slidesjs_settings_group', 'slides_width' );
    register_setting( 'ath_slidesjs_settings_group', 'slides_height' );
    register_setting( 'ath_slidesjs_settings_group', 'slides_start' );
    register_setting( 'ath_slidesjs_settings_group', 'slides_navigation' );
    register_setting( 'ath_slidesjs_settings_group', 'slides_navigation_effect' );
    register_setting( 'ath_slidesjs_settings_group', 'slides_pagination' );
    register_setting( 'ath_slidesjs_settings_group', 'slides_pagination_effect' );
    register_setting( 'ath_slidesjs_settings_group', 'slides_play_active' );
    register_setting( 'ath_slidesjs_settings_group', 'slides_play_effect' );
    register_setting( 'ath_slidesjs_settings_group', 'slides_play_interval' );
    register_setting( 'ath_slidesjs_settings_group', 'slides_play_auto' );
    register_setting( 'ath_slidesjs_settings_group', 'slides_play_swap' );
    register_setting( 'ath_slidesjs_settings_group', 'slides_play_hover' );
    register_setting( 'ath_slidesjs_settings_group', 'slides_play_delay' );
    register_setting( 'ath_slidesjs_settings_group', 'slides_effect_slide_speed' );
    register_setting( 'ath_slidesjs_settings_group', 'slides_effect_fade_speed' );
    register_setting( 'ath_slidesjs_settings_group', 'slides_effect_fade_crossfade' );
}

function ath_slidesjs_settings_page(){ ?>

    <div class="wrap">
        <h2>SlidesJS</h2>

        <form method="post" action="options.php">
            <?php settings_fields( 'ath_slidesjs_settings_group' ); ?>
            <table class="form-table">

                <tr valign="top">
                    <th scope="row">Slideshow Width</th>
                    <td>
                        <input name="slides_width" type="text" id="slides_width" value="<?php echo get_option( 'slides_width' ); ?>" size="5" />
                        width
                    </td>
                </tr>

                <tr valign="top">
                    <th scope="row">Slideshow Height</th>
                    <td>
                        <input name="slides_height" type="text" id="slides_height" value="<?php echo get_option( 'slides_height' ); ?>" size="5" />
                        height
                    </td>
                </tr>

                <tr valign="top">
                    <th scope="row">Show Navigation</th>
                    <td>
                        <select name="slides_navigation" id="slides_navigation">
                            <option value="true" <?php if( get_option( 'slides_navigation' ) == 'true' ) echo "selected" ?>>Yes</option>
                            <option value="false" <?php if( get_option( 'slides_navigation' ) == 'false' ) echo "selected" ?>>No</option>
                        </select>
                    </td>
                </tr>

                <tr valign="top">
                    <th scope="row">Navigation Effect</th>
                    <td>
                        <select name="slides_navigation_effect" id="slides_navigation_effect">
                            <option value="fade" <?php if( get_option( 'slides_navigation_effect' ) == 'fade' ) echo "selected" ?>>fade</option>
                            <option value="slide" <?php if( get_option( 'slides_navigation_effect' ) == 'slide' ) echo "selected" ?>>slide</option>
                        </select>
                    </td>
                </tr>

                <tr valign="top">
                    <th scope="row">Show Pagination</th>
                    <td>
                        <select name="slides_pagination" id="slides_pagination">
                            <option value="true" <?php if( get_option( 'slides_pagination' ) == 'true' ) echo "selected" ?>>Yes</option>
                            <option value="false" <?php if( get_option( 'slides_pagination' ) == 'false' ) echo "selected" ?>>No</option>
                        </select>
                    </td>
                </tr>

                <tr valign="top">
                    <th scope="row">Pagination Effect</th>
                    <td>
                        <select name="slides_pagination_effect" id="slides_pagination_effect">
                            <option value="fade" <?php if( get_option( 'slides_pagination_effect' ) == 'fade' ) echo "selected" ?>>fade</option>
                            <option value="slide" <?php if( get_option( 'slides_pagination_effect' ) == 'slide' ) echo "selected" ?>>slide</option>
                        </select>
                    </td>
                </tr>

                <tr valign="top">
                    <th scope="row">Generate Play button</th>
                    <td>
                        <select name="slides_play_active" id="slides_play_active">
                            <option value="true" <?php if( get_option( 'slides_play_active' ) == 'true' ) echo "selected" ?>>Yes</option>
                            <option value="false" <?php if( get_option( 'slides_play_active' ) == 'false' ) echo "selected" ?>>No</option>
                        </select>
                    </td>
                </tr>

                <tr valign="top">
                    <th scope="row">Play Effect</th>
                    <td>
                        <select name="slides_play_effect" id="slides_play_effect">
                            <option value="fade" <?php if( get_option( 'slides_play_effect' ) == 'fade' ) echo "selected" ?>>fade</option>
                            <option value="slide" <?php if( get_option( 'slides_play_effect' ) == 'slide' ) echo "selected" ?>>slide</option>
                        </select>
                    </td>
                </tr>

                <tr valign="top">
                    <th scope="row">Play Speed</th>
                    <td>
                        <input name="slides_play_interval" type="text" id="slides_play_interval" value="<?php echo get_option('slides_play_interval'); ?>" size="5" />
                        milliseconds
                    </td>
                </tr>

                <tr valign="top">
                    <th scope="row">Auto Play</th>
                    <td>
                        <select name="slides_play_auto" id="slides_play_auto">
                            <option value="true" <?php if( get_option( 'slides_play_auto' ) == 'true' ) echo "selected" ?>>Yes</option>
                            <option value="false" <?php if( get_option( 'slides_play_auto' ) == 'false' ) echo "selected" ?>>No</option>
                        </select>
                    </td>
                </tr>

                <tr valign="top">
                    <th scope="row">Show Play Button</th>
                    <td>
                        <select name="slides_play_swap" id="slides_play_swap">
                            <option value="true" <?php if( get_option( 'slides_play_swap' ) == 'true' ) echo "selected" ?>>Yes</option>
                            <option value="false" <?php if( get_option( 'slides_play_swap' ) == 'false' ) echo "selected" ?>>No</option>
                        </select>
                    </td>
                </tr>

                <tr valign="top">
                    <th scope="row">Pause on Hover</th>
                    <td>
                        <select name="slides_play_hover" id="slides_play_hover">
                            <option value="true" <?php if( get_option( 'slides_play_hover' ) == 'true' ) echo "selected" ?>>Yes</option>
                            <option value="false" <?php if( get_option( 'slides_play_hover' ) == 'false' ) echo "selected" ?>>No</option>
                        </select>
                    </td>
                </tr>

                <tr valign="top">
                    <th scope="row">Delay on Restart</th>
                    <td>
                        <input name="slides_play_delay" type="text" id="slides_play_delay" value="<?php echo get_option( 'slides_play_delay' ); ?>" size="5" />
                        milliseconds
                    </td>
                </tr>

                <tr valign="top">
                    <th scope="row">Speed of Slide Animation</th>
                    <td>
                        <input name="slides_effect_slide_speed" type="text" id="slides_effect_slide_speed" value="<?php echo get_option( 'slides_effect_slide_speed' ); ?>" size="5" />
                        milliseconds
                    </td>
                </tr>

                <tr valign="top">
                    <th scope="row">Speed of Fade Animation</th>
                    <td>
                        <input name="slides_effect_fade_speed" type="text" id="slides_effect_fade_speed" value="<?php echo get_option( 'slides_effect_fade_speed' ); ?>" size="5" />
                        milliseconds
                    </td>
                </tr>

                <tr valign="top">
                    <th scope="row">Crossfade Effect</th>
                    <td>
                        <select name="slides_effect_fade_crossfade" id="slides_effect_fade_crossfade">
                            <option value="true" <?php if( get_option( 'slides_effect_fade_crossfade' ) == 'true' ) echo "selected" ?>>Yes</option>
                            <option value="false" <?php if( get_option( 'slides_effect_fade_crossfade' ) == 'false' ) echo "selected" ?>>No</option>
                        </select>
                    </td>
                </tr>

            </table>
            
            <p class="submit">
                <input type="submit" class="button-primary" value="<?php _e( 'Save Changes' ) ?>" />
            </p>

        </form>
    </div>
<?php } 

add_action( 'init', 'ath_slidesjs_create_post_type' );
function ath_slidesjs_create_post_type() {

    register_post_type( 'slideshow',
        array(
            'labels' => array( 
                'name' => 'Slideshows',
                'singular_name' => 'Slideshow',
                'add_new_item' => 'Add New Slideshow',
                'edit_item'=> 'Edit Slideshow',
                'new_item' => 'New Slideshow',
                'view_item' => 'View Slideshow',
                'search_items' => 'Search Slideshows',
                'not_found' => 'No slideshows found',
                'not_found_in_trash' => 'No slideshows found in Trash'
            ),
            'public' => true,
            'has_archive' => true,
            'menu_position' => 55,
            'supports' => array(
                'title', 'editor'
            )
        )
    );
}

add_action( 'add_meta_boxes', 'ath_slidejs_metabox_create' );
function ath_slidejs_metabox_create(){

      add_meta_box( 
            'Athletics SlidesJS Plus Shortcode',
            'Athletics SlidesJS Shortcode',
            'ath_slidejs_metabox_content',
            'slideshow',
            'side',
            'default'
        );
}

function ath_slidejs_metabox_content(){
    global $post;
    echo '<p id="shortcode">[ath_slidesjs id="'.$post->ID.'"]</p>';
}

function ath_slidesjs_shortcode( $atts ) {
    extract( shortcode_atts( array(
        'id' => null
        ), $atts ) ); 

    $content = get_post( $id );
    preg_match_all( '/wp-image-(.*?)\"/', $content->post_content, $ids );
    unset( $ids[0] );
    
    $slides_query = new WP_Query( array( 'post_type' => 'attachment', 'post_status'=>'any', 'post__in' => $ids[1], 'orderby' => 'post__in', 'posts_per_page' => '-1' ) );
    $count = count( $slides_query->posts );

    if ( $count > 1) :
        $output = "<div id ='slides'>";
        while( $slides_query->have_posts() ) : $slides_query->the_post();
            $src = get_the_guid();
            $title = get_the_title();
            $excerpt = get_the_excerpt();
            // $output .= "<div class='slide'><img src='$src' /><div class='slide-info'><h2>$title</h2><p>$excerpt</p></div></div>";
            $output .= "<img src='$src' />";
        endwhile;
        wp_reset_query();
        $output .= "<a href='#' class='slidesjs-previous slidesjs-navigation'><i class='icon-angle-left icon-large'></i></a>";
        $output .= "<a href='#' class='slidesjs-next slidesjs-navigation'><i class='icon-angle-right icon-large'></i></a>";
        $output .= "</div>";
    else :
        $output = "<div style='text-align:center'>";
        while( $slides_query->have_posts() ) : $slides_query->the_post();
            $src = get_the_guid();
            $title = get_the_title();
            $excerpt = get_the_excerpt();
            // $output .= "<div class='slide'><img src='$src' /><div class='slide-info'><h2>$title</h2><p>$excerpt</p></div></div>";
            $output .= "<img src='$src' />";
        endwhile;
        wp_reset_query();
        $output .= "</div>";
    endif;

    return $output;
}
add_shortcode( 'ath_slidesjs', 'ath_slidesjs_shortcode' );

?>