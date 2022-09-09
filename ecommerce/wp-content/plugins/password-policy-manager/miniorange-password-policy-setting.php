<?php
/**
 * Plugin Name: Password Policy Manager
 * Description: This plugin provides various passwod policy methods and make more secure password after the default wordpress login. We Support Password expiration, Enforce strong password for all Users in the free version of the plugin.
 * Version: 1.3.4
 * Author: miniOrange
 * Author URI: https://miniorange.com
 * License: GPL2
 */
    define('MOPPM_HOST_NAME', 'https://login.xecurify.com');
    define('MOPPM_VERSION', '1.3.4');
    define('MOPPM_TEST_MODE', false);
    global $moppm_dir,$moppm_directory_url;
    $moppm_dir = plugin_dir_url(__FILE__);
    $moppm_directory_url = plugin_dir_path(__FILE__);

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
class MOPPM
{
    function __construct()
    {
        add_action('admin_menu', array( $this,'moppm_add_thickbox'));
        register_deactivation_hook(__FILE__, array( $this, 'moppm_deactivate'    ));
        register_activation_hook(__FILE__, array( $this, 'moppm_activate'             ));
        add_action('admin_menu', array( $this, 'moppm_widget_menu'          ));
        add_action('admin_enqueue_scripts', array( $this, 'moppm_settings_style'       ));
        add_action('admin_enqueue_scripts', array( $this, 'moppm_settings_script'      ));
        add_action('moppm_show_message', array( $this, 'moppm_show_message'         ), 1, 2);
        add_action('admin_footer', array( $this, 'moppm_feedback_request'     ));
        add_action('validate_password_reset', array( $this, 'moppm_password_reset'     ), 1, 2);
        $this->moppm_includes();
        remove_filter('authenticate', 'wp_authenticate_username_password', 20);
        add_filter('authenticate', array( $this, 'custom_authenticate'  ), 1, 3);
        add_action('user_profile_update_errors', array( $this, 'profile_authenticate'  ), 0, 3);
        add_action('user_register', array( $this, 'moppm_create_usermeta'  ));
        add_action('admin_init',array($this, 'moppm_redirect_page'));
        add_action('elementor/init', array($this, 'moppm_login_extra_note'));
        add_filter('manage_users_columns'        , array( $this, 'moppm_password_column'        )         );
        add_action('manage_users_custom_column'  , array( $this, 'moppm_password_column_content'), 10,  3 );
        add_action( 'plugins_loaded', array( $this, 'moppm_update_db_check' ) );
        add_action( 'wp_print_scripts', array( $this,'webroom_wc_remove_password_strength'), 100);

    }
  function webroom_wc_remove_password_strength() {
        if ( wp_script_is( 'wc-password-strength-meter', 'enqueued' ) ) {
        wp_dequeue_script( 'wc-password-strength-meter' );
        }
    } 
   
    function moppm_add_thickbox() {
        add_thickbox();
    }
  
    function moppm_update_db_check() {
        global $moppm_db_queries;   
        if ( ! get_site_option( 'moppm_dbversion' ) ) {
            update_site_option( 'moppm_dbversion', MOPPM_Constants::DB_VERSION );
            $moppm_db_queries->generate_tables();
        }

    }
    function moppm_password_column($columns) {
        $columns['current_status'] = 'Password Strength Score';
        return $columns;
    }
    function moppm_password_column_content($value, $column_name, $user_id)
    { 
        $moppm_score = get_user_meta($user_id,'moppm_pass_score'); 
       
        if ( 'current_status' == $column_name && !empty($moppm_score[0]) )
        {
            $moppm_score=intval($moppm_score[0]);
            if ($moppm_score < 5) {
                $moppm_result = '<span style="color:red;">WEAK PASSWORD</span>';
            }
            if ($moppm_score < 8 && $moppm_score>=5) {
                $moppm_result = '<span style="color:orange;">MEDIUM PASSWORD</span>';
            }
            if ($moppm_score < 10 && $moppm_score>=8) {
                $moppm_result = '<span style="color:green;">STRONG PASSWORD</span>';
            }
            elseif ($moppm_score == 10) {
               $moppm_result = '<span style="color:green;">VERY STRONG PASSWORD</span>';
            }       
            return ($moppm_result);
        }
        return 'N/A';
    }
    function moppm_login_extra_note()
    {
        if(!is_user_logged_in())
        {
            wp_enqueue_script( 'jquery' );    
            wp_enqueue_script( 'moppm_elementor_script', plugins_url( 'includes/js/moppm_elementor.js', __FILE__)  );
            wp_localize_script( 'moppm_elementor_script', 'my_ajax_object',
            array( 'ajax_url' => get_site_url() .'/login/' ) );

        }
    
    }
    function moppm_redirect_page()
    {

        if(get_site_option('moppm_plugin_redirect'))
        {
            delete_site_option('moppm_plugin_redirect');
            wp_safe_redirect(admin_url().'admin.php?page=moppm');
            exit();
        }
         if (isset($_POST['moppm_register_to_upgrade_nonce'])) { //registration with miniOrange for upgrading
                $nonce = sanitize_text_field($_POST['moppm_register_to_upgrade_nonce']);
                if (!wp_verify_nonce($nonce, 'miniorange-moppm-user-reg-to-upgrade-nonce')) {
                    update_site_option('mo2f_message', molms_2fConstants:: langTranslate("INVALID_REQ"));
                }
                else
                {
                $requestOrigin = sanitize_text_field($_POST['requestOrigin']);
                update_site_option('mo2f_customer_selected_plan', $requestOrigin);
                header('Location: admin.php?page=moppm_account');
                }
            }
       
    }
    function moppm_password_reset($error, $user)
    {
        if(isset($_POST['pass1'])){
                $new_pass = sanitize_text_field($_POST['pass1']);
            if (get_site_option('Moppm_enable_disable_ppm')=='on' &&!empty($new_pass)) {
                $result = Moppm_Utility::validate_password($new_pass);
                if ($result != 'VALID') {
                    $error->add('weak_password', $result);
                }
                $moppm_count = Moppm_Utility::check_password_score($new_pass);
                update_user_meta($user->ID, 'moppm_pass_score',$moppm_count);
            }
        }
        delete_user_meta($user->ID, 'moppm_points');
    }
    function moppm_create_usermeta($user_id)
    {
        global $moppm_db_queries;
        $user =get_user_by('ID', $user_id);
        $moppm_count = 0;
        if (isset($_POST["pass2"])) {
            $moppm_count = Moppm_Utility::check_password_score($_POST["pass2"]);
        }
        update_user_meta($user_id, 'moppm_pass_score',$moppm_count);
        $meta_key = 'moppm_last_pass_timestmp';
        if (get_site_option('moppm_expiration_time')) {
            update_user_meta($user_id, $meta_key, time());
        }  
        $log_time = 'N/A';
        $log_out_time = date("M j, Y, g:i:s a");
        if(get_site_option('moppm_enable_disable_report')=='on')
        {
            $moppm_db_queries->insert_report_list($user_id,$user->user_email,$log_time,$log_out_time);
        }
        
    }
    function profile_authenticate($errors, $update, $userData)
    {
        $password = (isset($_POST['pass1']) && trim($_POST['pass1'])) ? $_POST['pass1'] : false;
       
        if (get_site_option('Moppm_enable_disable_ppm')=='on' && $password != false) {
            $result = Moppm_Utility::validate_password($password);
            if ($result != 'VALID') {
                $errors->add('weak_password', $result);
            }
        }
    }
    function custom_authenticate($user, $username, $password)
    {
        $error = new WP_Error();
        if (empty($username)) {
            $error->add('empty_username', __('<strong>ERROR</strong>: Username is empty'));
        }
        if (empty($password)) {
            $error->add('empty_password', __('<strong>ERROR</strong>:Password is empty.'));
        }
        if ( is_email( $username ) ) {
        $user =  get_user_by( 'email', $username );
        }
        $user        = wp_authenticate_username_password($user, $username, $password);
        $currentuser = wp_authenticate_username_password($user, $username, $password);
        if (is_wp_error($currentuser)) {
             $error->add('invalid_username_password', '<strong>' . ( 'ERROR' ) . '</strong>: ' . ( 'Invalid Username or password.' ));
             return $currentuser;
        }
        if (is_wp_error($user)) {
            $error->add('empty_username', __('<strong>ERROR</strong>: Invalid username or Password.'));
            return $user;
        }
        global $moppm_db_queries;
        $log_time = date("M j, Y, g:i:s a");
        $log_out_time = date("M j, Y, g:i:s a");
        $user_id = $currentuser->ID;  
        if (get_site_option('Moppm_enable_disable_ppm')=='on') {
                 if (get_user_meta($user->ID, 'moppm_points')) {    
                        $this->moppm_send_reset_link($currentuser->user_email,$user->ID,$user);
                        $error->add('Reset Password', '<strong>' . ( 'ERROR' ) . '</strong>: ' . ( 'Reset password link has been sent in your email please check.' ));
                        return $error;
                }
            if (get_site_option('moppm_enable_disable_expiry')) {
                $user_time = get_user_meta($user->ID, 'moppm_last_pass_timestmp');
                $tstamp = isset($user_time[0])?$user_time[0]:0;
                $current_time = time();
                $start_time =  $current_time - $tstamp;
                $get_save_time = get_site_option('moppm_expiration_time')*7*24*3600;
                if (!get_user_meta($user->ID, 'moppm_last_pass_timestmp') || ($start_time > $get_save_time && get_site_option('moppm_expiration_time'))) {
                        moppm_reset_pass_form($user);
                        exit();
                        }
                    }
                if (!get_user_meta($user->ID, 'moppm_last_pass_timestmp')) {
                         $meta_key = 'moppm_last_pass_timestmp';

                            if (get_site_option('moppm_expiration_time')) {
                            update_user_meta($user_id, $meta_key, time());
                            moppm_reset_pass_form($user);
                            exit();
                            } 
                }

                $result = Moppm_Utility::validate_password($password);
                if ($result != 'VALID') {
                    moppm_reset_pass_form($user);
                    exit();
                }
                if (get_site_option('moppm_first_reset') == 1 && !get_user_meta($user->ID, 'moppm_first_reset')) {
                   moppm_reset_pass_form($user);
                    exit();
                }
                
        }
       
        if(get_site_option('moppm_enable_disable_report')=='on')
        {
            $moppm_db_queries->insert_report_list($user_id,$user->user_email,$log_time,$log_out_time);
        }
         return $currentuser;
    }
    function moppm_widget_menu()
    {
        $menu_slug =  'moppm';
        add_menu_page('miniOrange Password policy', 'miniOrange Password policy', 'administrator', $menu_slug, array( $this, 'moppm'), plugin_dir_url(__FILE__). 'includes/images/miniorange_icon.png');
        add_submenu_page($menu_slug, 'miniOrange Password policy', 'Addons', 'administrator', 'moppm_addons', array( $this, 'moppm'), 1);
        add_submenu_page($menu_slug, 'miniOrange Password policy', 'Reports', 'administrator', 'moppm_reports', array( $this, 'moppm'), 2);
        add_submenu_page($menu_slug, 'miniOrange Password policy', 'Upgrade', 'administrator', 'moppm_upgrade', array( $this, 'moppm'), 3);
        add_submenu_page($menu_slug, 'miniOrange Password policy', 'Account', 'administrator', 'moppm_account', array( $this, 'moppm'), 4);
        add_submenu_page($menu_slug, 'miniOrange Password policy', 'Registration forms', 'administrator', 'moppm_registration_form', array( $this, 'moppm'), 5);
        add_submenu_page($menu_slug, 'miniOrange Password policy', 'Other Products', 'administrator', 'moppm_advertise', array( $this, 'moppm'), 6);
         
    }
   
    function moppm_send_reset_link($email,$user_id,$user){
          
            $url = is_multisite() ? get_blogaddress_by_id( (int) $blog_id ) : home_url('', 'http');
            $adt_rp_key = get_password_reset_key( $user );
            $user_login = $user->user_login;
            $subject  =  'Reset password link';        
            $messages = '<table cellpadding="25" style="margin:0px auto">
                            <tbody>
                            <tr>
                            <td>
                            <table cellpadding="24" width="584px" style="margin:0 auto;max-width:584px;background-color:#f6f4f4;border:1px solid #a8adad">
                            <tbody>
                            <tr>
                            <td><img src="https://ci5.googleusercontent.com/proxy/10EQeM1udyBOkfD2dwxGhIaMXV4lOwCRtUecpsDkZISL0JIkOL2JhaYhVp54q6Sk656rW2rpAFJFEgGQiAOVcYIIKxXYMHHMNSNB=s0-d-e1-ft#https://login.xecurify.com/moas/images/xecurify-logo.png" style="color:#5fb336;text-decoration:none;display:block;width:auto;height:auto;max-height:35px" class="CToWUd"></td>
                            </tr>
                            </tbody>
                            </table>
                            <table cellpadding="24" style="background:#fff;border:1px solid #a8adad;width:584px;border-top:none;color:#4d4b48;font-family:Arial,Helvetica,sans-serif;font-size:13px;line-height:18px">
                            <tbody>
                            <tr>
                            <td>
                            <p style="margin-top:0;margin-bottom:20px">Dear '.sanitize_text_field($user->user_nicename).',</p>
                            <p style="margin-top:0;margin-bottom:10px">Your admin has requested to reset the password for security aspects</b>:</p>
                            <p style="margin-top:0;margin-bottom:10px">Site: '.sanitize_url($url).'
                            <p style="margin-top:0;margin-bottom:10px">Please use the below link to reset the password and make secure your account
                            <p style="margin-top:0;margin-bottom:10px"><a href="' .sanitize_url (network_site_url("wp-login.php?action=rp&key=$adt_rp_key&login=" . rawurlencode(sanitize_text_field($user_login)), 'login')) . '">' . sanitize_url( network_site_url("wp-login.php?action=rp&key=$adt_rp_key&login=" . rawurlencode(sanitize_text_field($user_login)), 'login')) . ' </a> 
                            <p style="margin-top:0;margin-bottom:15px">Thank you,<br>miniOrange Team</p>
                            <p style="margin-top:0;margin-bottom:0px;font-size:11px">Disclaimer: This email and any files transmitted with it are confidential and intended solely for the use of the individual or entity to whom they are addressed.</p>
                            </div></div></td>
                            </tr>
                            </tbody>
                            </table>
                            </td>
                            </tr>
                            </tbody>
                            </table>';
            $headers = array('Content-Type: text/html; charset=UTF-8');        
            wp_mail( $email,$subject,$messages,$headers);
    }


    function moppm()
    {
        include 'controllers'.DIRECTORY_SEPARATOR.'main_controller.php';
    }

    function moppm_activate()
    {
        global $moppm_db_queries;
        add_site_option('moppm_letter', 1);
        add_site_option('moppm_Numeric_digit', 1);
        add_site_option('moppm_special_char', 1);
        add_site_option('moppm_digit', 8);
        add_site_option('moppm_first_reset', 0);
        add_site_option('moppm_expiration_time',7);
        update_site_option('moppm_plugin_redirect', true);
        $moppm_db_queries->plugin_activate();
        $expiry_time = get_site_option('moppm_expiration_time');
    }
    function moppm_deactivate()
    {
        delete_site_option('moppm_activated_time');
    }

    function moppm_settings_style($hook)
    {
        if (strpos($hook, 'page_moppm')) {
            wp_enqueue_style('moppm_admin_settings_style', plugins_url('includes'.DIRECTORY_SEPARATOR.'css'.DIRECTORY_SEPARATOR.'moppm_style_settings.css?ver='.MOPPM_VERSION, __FILE__));
            wp_enqueue_style('moppm_admin_settings_datatable_style', plugins_url('includes'.DIRECTORY_SEPARATOR.'css'.DIRECTORY_SEPARATOR.'jquery.dataTables.min.css', __FILE__));
        }
    }
    function moppm_settings_script($hook)
    {
        wp_enqueue_script('moppm_admin_settings_script', plugins_url('includes'.DIRECTORY_SEPARATOR.'js'.DIRECTORY_SEPARATOR.'moppm_settings_page.js', __FILE__), array('jquery'));
        if (strpos($hook, 'page_moppm')) {
            wp_enqueue_script('moppm_admin_datatable_script', plugins_url('includes'.DIRECTORY_SEPARATOR.'js'.DIRECTORY_SEPARATOR.'jquery.dataTables.min.js', __FILE__), array('jquery'));
        }
    }

    function moppm_includes()
    {
        require('helper'.DIRECTORY_SEPARATOR.'class_moppm_utility.php');
        require('controllers'.DIRECTORY_SEPARATOR.'ajax.php');
        require('database'.DIRECTORY_SEPARATOR.'database.php');
        require('api'.DIRECTORY_SEPARATOR.'api.php');
        require('helper'.DIRECTORY_SEPARATOR.'constants.php');
        require('helper'.DIRECTORY_SEPARATOR.'messages.php');
        require('handler'.DIRECTORY_SEPARATOR.'feedback_form.php');
        require('views'.DIRECTORY_SEPARATOR.'reset_pass.php');
    }

    function moppm_show_message($content, $type)
    {
        if ($type=="CUSTOM_MESSAGE") {
              echo "<div class='moppm_overlay_not_JQ_success' id='pop_up_success'><p class='moppm_popup_text_not_JQ'>".esc_html($content)."</p> </div>";
            ?>
                <script type="text/javascript">
                 setTimeout(function () {
                    var element = document.getElementById("pop_up_success");
                       element.classList.toggle("moppm_overlay_not_JQ_success");
                       element.innerHTML = "";
                        }, 4000);
                        
                </script>
                <?php
        }
        if ($type=="NOTICE") {
               echo "<div class='moppm_overlay_not_JQ_error' id='pop_up_error'><p class='moppm_popup_text_not_JQ'>".esc_html($content)."</p> </div>";
            ?>
                <script type="text/javascript">
                 setTimeout(function () {
                    var element = document.getElementById("pop_up_error");
                       element.classList.toggle("moppm_overlay_not_JQ_error");
                       element.innerHTML = "";
                        }, 4000);
                        
                </script>
                <?php
        }
        if ($type=="ERROR") {
            echo "<div class='moppm_overlay_not_JQ_error' id='pop_up_error'><p class='moppm_popup_text_not_JQ'>".esc_html($content)."</p> </div>";
            ?>
                <script type="text/javascript">
                 setTimeout(function () {
                    var element = document.getElementById("pop_up_error");
                       element.classList.toggle("moppm_overlay_not_JQ_error");
                       element.innerHTML = "";
                        }, 4000);
                        
                </script>
                   <?php
        }
        if ($type=="SUCCESS") {
            echo "<div class='moppm_overlay_not_JQ_success' id='pop_up_success'><p class='moppm_popup_text_not_JQ'>".esc_html($content)."</p> </div>";
            ?>
                    <script type="text/javascript">
                     setTimeout(function () {
                        var element = document.getElementById("pop_up_success");
                           element.classList.toggle("moppm_overlay_not_JQ_success");
                           element.innerHTML = "";
                            }, 4000);
                            
                    </script>
            <?php
        }
    }
    function moppm_feedback_request()
    {
        if ('plugins.php' != basename(sanitize_text_field($_SERVER['PHP_SELF']))) {
            return;
        }
        global $moppm_dirname;

        $email = esc_html (get_site_option("email"));
        if (empty($email)) {
            $user = wp_get_current_user();
            $email = $user->user_email;
        }
        $imagepath=plugins_url('/includes/images/', __FILE__);
        wp_enqueue_style('wp-pointer');
        wp_enqueue_script('wp-pointer');
        wp_enqueue_script('utils');
        wp_enqueue_style('moppm_admin_plugins_page_style', plugins_url('/includes/css/moppm_feedback_style.css?ver='.MOPPM_VERSION, __FILE__));

        include $moppm_dirname . 'views'.DIRECTORY_SEPARATOR.'feedback_form.php';
    }
}new MOPPM;