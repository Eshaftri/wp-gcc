<?php

/**
 * Theme Functions.
 *
 * @package GCC
 */

if (!defined('GCC_DIR_PATH')) {
   define('GCC_DIR_PATH', untrailingslashit(get_template_directory()));
}

if (!defined('GCC_DIR_URI')) {
   define('GCC_DIR_URI', untrailingslashit(get_template_directory_uri()));
}

require_once GCC_DIR_PATH . '/inc/helpers/autoloader.php';

function gcc_get_theme_instance()
{
   \GCC_THEME\Inc\GCC_THEME::get_instance();
}

gcc_get_theme_instance();

function truncate($string, $length, $dots = "...")
{
   return (strlen($string) > $length) ? substr($string, 0, $length - strlen($dots)) . $dots : $string;
}


function gt_get_post_view()
{
   $count = get_post_meta(get_the_ID(), 'post_views_count', true);
   return "$count";
}
function gt_set_post_view()
{
   $key = 'post_views_count';
   $post_id = get_the_ID();
   $count = (int) get_post_meta($post_id, $key, true);
   $count++;
   update_post_meta($post_id, $key, $count);
}
function gt_posts_column_views($columns)
{
   $columns['post_views'] = 'Views';
   return $columns;
}
function gt_posts_custom_column_views($column)
{
   if ($column === 'post_views') {
      echo gt_get_post_view();
   }
}
add_filter('manage_posts_columns', 'gt_posts_column_views');
add_action('manage_posts_custom_column', 'gt_posts_custom_column_views');



function BuildSearchQueryFromPost($post_type)
{



   // return new WP_Query(array(
   //    'numberposts'    => -1,
   //    'post_type'        => 'assets',
   //    'meta_query'    => array(
   //       'relation'        => 'AND',
   //       array(
   //          'key'        => 'asset_industry',
   //          'value'        => 47,
   //          'compare'    => 'LIKE'
   //       )
   //    )
   // ));


   // // // print_r($args);


   $form_post_terms = $_GET;


   if (empty($form_post_terms)) {
      return new WP_Query(
         array(
            'post_type' => $post_type,
            'post_status' => 'publish',
            'posts_per_page' => -1,
            'orderby' => 'title',
            'order' => 'ASC',
         )
      );
   }


   // Now build an array
   $to_search = ['relation' => 'AND'];

   foreach ($form_post_terms as $form_section => $form_values) {
      if ($form_section == '__text_search') {
         continue;
      }
      foreach ($form_values as $val) {
         array_push($to_search, [
            'key' => $form_section,
            'value' => $val,
            'compare' => 'LIKE'
         ]);
      }
   }

   // array_push($terms, array('key' => ))

   $args = array(
      'posts_per_page'    => -1,
      'post_type' => $post_type,
      'post_status' => 'publish',
      'orderby' => 'title',
      'order' => 'ASC',
      'meta_query' => $to_search,
   );

   if (isset($form_post_terms['__text_search'])) {
      $args['s'] = $form_post_terms['__text_search'];
   }

   return new WP_Query($args);
}

/**
 *  get_avatar_initial function return the name initials
 */
function get_avatar_initial($full_name)
{
   $initials = implode('', array_map(function ($name) {
      preg_match_all('/\b\w/', $name, $matches);
      return implode('', $matches[0]);
   }, $full_name));

   return substr($initials, 0, 2);
}


add_action('save_post', 'wpds_check_thumbnail');
add_action('admin_notices', 'wpds_thumbnail_error');

function wpds_check_thumbnail($post_id)
{

   // change to any custom post type 
   if (!in_array(get_post_type($post_id), ['assets', 'sme']))
      return;

   if (!has_post_thumbnail($post_id)) {
      // set a transient to show the users an admin message
      set_transient("has_post_thumbnail", "no");
      // unhook this function so it doesn't loop infinitely
      remove_action('save_post', 'wpds_check_thumbnail');
      // update the post set it to draft
      wp_update_post(array('ID' => $post_id, 'post_status' => 'draft'));

      add_action('save_post', 'wpds_check_thumbnail');
   } else {
      delete_transient("has_post_thumbnail");
   }
}

function wpds_thumbnail_error()
{
   // check if the transient is set, and display the error message
   if (get_transient("has_post_thumbnail") == "no") {
      echo "<div id='message' class='error' style='background-color:red;'><p><strong>You must select Featured Image. Your Post is saved but it can not be published.</strong></p></div>";
      delete_transient("has_post_thumbnail");
   }
}



function member_only_site()
{
   if (!is_user_logged_in()) {
      auth_redirect();
   }
}

add_action('wp', 'member_only_site');
