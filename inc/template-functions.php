<?php

/**
 *  Template functions
 * 
 * @package NM_THEME
 */



//Enable classic editor for wordpress//
//add_filter('use_block_editor_for_post','__return_false');

/**
 * ACF
 */

// if ( is_plugin_active('advanced-custom-fields') ) {
//    // do something
// }

// Hide the ACF admin menu item.
// add_filter('acf/settings/show_admin', 'my_acf_settings_show_admin');
// function my_acf_settings_show_admin( $show_admin ) {
//     return false;
// }

/**
 * Learnpress
 */

add_filter('learn-press/override-templates', function () {
   return true;
});

// User redirection for profile
function redirect_for_non_login_user()
{
   global $wp;

   // if (is_user_logged_in()) {
   //    wp_safe_redirect(NM_SITE_URL . '/usc-profile');
   //    exit;
   // }
   if (is_user_logged_in() && $wp->request == 'usc-login') {
      wp_safe_redirect(NM_SITE_URL . '/usc-profile');
      exit;
   }
   if (!is_user_logged_in() && $wp->request == 'usc-profile') {
      wp_safe_redirect(NM_SITE_URL . '/usc-login');
      exit;
   }
}

add_action('template_redirect', 'redirect_for_non_login_user');

// add_action('learnpress/template/pages/checkout/before-content', function(){
//    echo " test me";
// });




//echo learn_press_get_page_link( 'profile' );

// add_filter( 'learn-press/registration-redirect', 'my_redirect_home' );
// function my_redirect_home( $registration_redirect ) {
//     return home_url();
// }

// add_action('init', 'reg_test');

// function reg_test(){
//    if(wp_verify_nonce($_POST['learn-press-register-nonce'], 'learn-press-register')){
//       //$_SESSION['register'] = "completed";

//       wp_safe_redirect(home_url());
//    }
// }



//Hide admin bar for all user
// add_filter( 'show_admin_bar' , 'usc_hide_adminbar_all');
// function usc_hide_adminbar_all($show_admin_bar) {
//     return ( current_user_can( 'administrator' ) ) ? $show_admin_bar : false;
// }

add_action('init', 'usc_apply_form_submmission');

function usc_apply_form_submmission()
{
   if (isset($_POST['nm_usc_submit']) && isset($_POST['usc_nonce_field'])) { //&& wp_verify_nonce($_POST['usc_nonce_field'], 'usc_nonce_action')) {
      if (wp_verify_nonce($_POST['usc_nonce_field'], 'usc_nonce_action')) {

         // Mail Details
         $to = 'arosh019@gmail.com';
         $subject = 'New Application';

         $headers = "MIME-Version: 1.0" . "\r\n";
         $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
         $headers .= 'From: <frombdsoftcreation@gmail.com>' . "\r\n";
         //$headers .= 'Cc: designland019@gmail.com' . "\r\n";

         //Message format
         $message = '<html><body>';
         $message .= '<h2>Basic Info</h2>';
         $message .= '<strong>Name :</strong><span>' . sanitize_text_field($_POST['usc_name']) . '</span><br>';
         $message .= '<strong>Email :</strong><span>' . sanitize_text_field($_POST['usc_email']) . '</span><br>';
         $message .= '<strong>Password :</strong><span>' . sanitize_text_field($_POST['usc_phone']) . '</span><br>';
         $message .= '<strong>Password :</strong><span>' . sanitize_text_field($_POST['usc_country']) . '</span><br>';
         $message .= '<strong>Password :</strong><span>' . sanitize_text_field($_POST['usc_zip']) . '</span><br>';
         $message .= '<strong>Password :</strong><span>' . sanitize_text_field($_POST['usc_subscription']) . '</span><br>';
         $message .= '</body></html>';

         //Send
         $sent = mail($to, $subject, $message, $headers);

         if ($sent) {
            wp_safe_redirect(NM_SITE_URL . '/message');
            exit;
         } else {
            echo "not send";
         }
      }
   }
}
