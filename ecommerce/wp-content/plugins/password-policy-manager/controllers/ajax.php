<?php
class MOPPM_Ajax
{
    function __construct()
    {
        add_action('init', array( $this, 'moppm_ajax_fun' ));
    }

    function moppm_ajax_fun()
    {
        if(isset($_POST['moppm_user_password']))
        {
            $username = sanitize_text_field($_POST['moppm_user_name']);
            $password = $_POST['moppm_user_password'] ;
            do_action( 'authenticate', null, $username, $password );
                
        }
         add_action('wp_ajax_moppm_ajax', array($this,'moppm_ajax'));
         add_action('wp_ajax_moppm_login', array($this,'moppm_login' ));
         add_action('wp_ajax_nopriv_moppm_login', array($this,'moppm_login' ));
    }

    function moppm_ajax()
    {
        global $moppm_db_queries;
        $option = sanitize_text_field($_POST['option']);
        switch ($option) {
            case 'moppm_setting_enable_disable':
                $this->moppm_setting_enable_disable();
                break;
            case 'moppm_log_out_form' :
                $this->moppm_log_out_form();
                break;
            case 'moppm_setting_enable_disable_form':
                $this->moppm_setting_enable_disable_form();
                break;
            case 'moppm_reset_button':
                $this->moppm_reset_button_submit();
                break;
            case 'moppm_enable_disable_report':
                $this->moppm_enable_disable_report();
                break;
            case 'moppm_report_remove':
                $this->moppm_report_remove();
                break;
            case 'moppm_clear_button':
                $this->moppm_clear_button();
                break;
            case 'moppm_update_plan':
                $this->moppm_update_plan();
                break;
                
        }
    }
    function moppm_login()
    {
        $option = sanitize_text_field($_POST['option']);
        switch ($option) {
            case 'moppm_Submit_new_pass':
                $this->moppm_Submit_new_pass();
                break;
        }
    }
    function moppm_log_out_form()
    {
        delete_site_option('email');
        delete_site_option('customerKey');
        delete_site_option('api_key');
        delete_site_option('customer_token');
    }
    function moppm_update_plan()
    {
         $nonce = sanitize_text_field( $_POST['nonce']);
            
         if (! wp_verify_nonce($nonce, 'moppm_update_plan')) {
            wp_send_json('ERROR');
            return;
        }
        $moppm_all_plannames = sanitize_text_field($_POST['planname']);
        $moppm_plan_type     = sanitize_text_field($_POST['planType']);
        update_site_option('moppm_planname', $moppm_all_plannames);
        update_site_option('moppm_plantype', $moppm_plan_type);
        
    }
    function moppm_enable_disable_report()
    {
        $nonce = sanitize_text_field( $_POST['nonce']);
            
         if (! wp_verify_nonce($nonce, 'moppm_enable_disable_report')) {
            wp_send_json('ERROR');
            return;
        }
        $Moppm_enable_disable_ppm = '';
        if (isset($_POST['moppm_enable_disable_report'])) {
            $Moppm_enable_disable_ppm = sanitize_text_field($_POST['moppm_enable_disable_report']);
           }
        update_site_option('moppm_enable_disable_report', $Moppm_enable_disable_ppm);
        if ($Moppm_enable_disable_ppm == "on") {
            wp_send_json('true');
        } elseif ($Moppm_enable_disable_ppm == "") {
            wp_send_json('false');
        }
        
    }
    function moppm_clear_button()
    {
        $nonce = sanitize_text_field( $_POST['nonce']);
        if (! wp_verify_nonce($nonce, 'moppm_clear_nonce')) {
            wp_send_json('ERROR');
            return;
        }
        else
        {
            global $wpdb;
            global $moppm_db_queries;
            $moppm_db_queries->clear_report_list();
            return;
        }
    }
    function moppm_report_remove()
    {
        global $moppm_db_queries;
        $nonce = sanitize_text_field( $_POST['nonce']);
        if (! wp_verify_nonce($nonce, 'moppm_remove_Nonce')) {
            wp_send_json('ERROR');
            return;
        }
        $user_id = sanitize_text_field($_POST['user_value']);
        $moppm_db_queries->delete_report_list($user_id);
    }
    function moppm_reset_button_submit()
    {
        $nonce = sanitize_text_field($_POST['nonce']);
        if (!wp_verify_nonce($nonce, 'moppm_reset_nonce')) {
            wp_send_json('ERROR');
            return;
        } 
        $users = get_users();
        if (!$no_of_attempt) {
           $no_of_attempt = 0;
        }
        $no_of_attempt =+1;
        update_site_option("no_of_of_attempt",$no_of_attempt);
        $message = 'Dear customer,<br>
            You have successfully reset the password for all your users. They will be asked to reset their password the next time they login';
        $headers = array('Content-Type: text/html; charset=UTF-8');
        $email = get_site_option('admin_email');
        $result = wp_mail($email,'Reset All Password - WordPress',$message,$headers); 
        if (!$result) {
            wp_send_json('SMTP_NOT_SET');
            return;
        }
        if (!empty($users)) {
            foreach ($users as $user)
            {
                add_user_meta( $user->id, 'moppm_points', '1');
                $sessions = WP_Session_Tokens::get_instance($user->id);
                $sessions->destroy_all();
            }
        }

    }
    function moppm_setting_enable_disable()
    {
        $nonce = sanitize_text_field($_POST['nonce']);
        if (! wp_verify_nonce($nonce, 'WAFsettingNonce')) {
            wp_send_json('ERROR');
            return;
        }
        if (isset($_POST['Moppm_enable_ppm'])) {
            $Moppm_enable_disable_ppm = sanitize_text_field($_POST['Moppm_enable_ppm']);
            update_site_option('Moppm_enable_disable_ppm', $Moppm_enable_disable_ppm);
        } else {
            $Moppm_enable_disable_ppm = '';
            update_site_option('Moppm_enable_disable_ppm', $Moppm_enable_disable_ppm);
        }
        if ($Moppm_enable_disable_ppm == "on") {
            wp_send_json('true');
        } elseif ($Moppm_enable_disable_ppm == "") {
            wp_send_json('false');
        }
    }
    function moppm_setting_enable_disable_form()
    {
        $nonce = sanitize_text_field($_POST['nonce']);
        if (! wp_verify_nonce($nonce, 'WAFsettingNonce')) {
            wp_send_json('ERROR');
            return;
        }
        $moppm_Numeric_digit = sanitize_text_field($_POST['moppm_Numeric_digit']);
        $moppm_enable_disable_expiry = sanitize_text_field($_POST['moppm_enable_disable_expiry']);
        $moppm_letter = sanitize_text_field($_POST['moppm_letter']);
        $moppm_first_reset = sanitize_text_field($_POST['moppm_first_reset']);
        $moppm_digit = intval(sanitize_text_field($_POST['moppm_digit']));
        $moppm_special_char = sanitize_text_field($_POST['moppm_special_char']);
        $moppm_letter == 'true'?update_site_option('moppm_letter', 1):update_site_option('moppm_letter', 0);
        $moppm_first_reset == 'true'?update_site_option('moppm_first_reset', 1):update_site_option('moppm_first_reset', 0);
        $moppm_Numeric_digit == 'true'?update_site_option('moppm_Numeric_digit', 1):update_site_option('moppm_Numeric_digit', 0);
        $moppm_enable_disable_expiry == 'true'?update_site_option('moppm_enable_disable_expiry', 1):update_site_option('moppm_enable_disable_expiry', 0);
        $moppm_special_char == 'true'?update_site_option('moppm_special_char', 1):update_site_option('moppm_special_char', 0);
        if ($moppm_digit >7 && $moppm_digit < 26) {
               update_site_option('moppm_digit', $moppm_digit);
        }
        if ($moppm_digit<8 || $moppm_digit >25) {
            wp_send_json('Digit_Invalid');
        }    
        wp_send_json('true');
    }
    function moppm_Submit_new_pass()
    {
        global $moppm_db_queries;
        $nonce = sanitize_text_field($_POST['nonce']);
        if (! wp_verify_nonce($nonce, 'moppmresetformnonce')) {
            wp_send_json('ERROR');
            return;
        }

        $session_id =  sanitize_text_field($_POST['session_id']);
    

        if (isset($_POST['moppm_save_pass'])) {
            $moppm_Submit_new_pass = sanitize_text_field($_POST['moppm_save_pass']);
             update_site_option('moppm_save_pass', $moppm_Submit_new_pass);
        }
        $Newpass = $_POST['Newpass'];
        $Newpass2 = $_POST['Newpass2'];
        $OldPass =  $_POST['OldPass'];
        $user_id =  get_transient($session_id);

        if(!$user_id)
            wp_send_json('SESSION_TIMEOUT');

        $user =get_user_by('ID', $user_id);
        $user_pass = $user->data->user_pass;
        $user_name = $user->data->user_login;
        if (!wp_check_password($OldPass, $user_pass, $user_id)) {
            wp_send_json("OLDPASSWORD_NOTMATCH");
            exit;
        }
        if ($Newpass != $Newpass2) {
            wp_send_json("PASS_NOT_MATCH");
            exit;
        }
        if ($Newpass == $Newpass2) {
            $result = Moppm_Utility::validate_password($Newpass2);
            if ($result != 'VALID') {
                wp_send_json($result);
            }
            $moppm_count = Moppm_Utility::check_password_score($Newpass2);
            update_user_meta($user_id, 'moppm_pass_score',$moppm_count);
            $log_out_time = date("M j, Y, g:i:s a");
            if(get_site_option('moppm_enable_disable_report')=='on')
            {
                 $moppm_db_queries->update_report_list($user_id,$log_out_time);
            }
            $length_pass = strlen($Newpass);
            wp_set_password($Newpass, $user_id);
            $meta_key = 'moppm_last_pass_timestmp';
            update_user_meta($user_id, $meta_key, time());
            add_user_meta( $user_id, 'moppm_first_reset', '2');
            $info = array();
            $info['user_login'] = $user_name;
            $info['user_password'] = $Newpass;
            $info['remember'] = true;
            $user_signon = wp_signon($info, false);

            if (is_wp_error($user_signon)) {
                wp_send_json(json_encode(array('loggedin'=>false, 'message'=>__('Wrong username or password.'))));
            } else {
                wp_send_json("Login");
            }
            exit;
        }
        if ($moppm_Submit_new_pass == "on") {
            wp_send_json('true');
        } elseif ($moppm_Submit_new_pass == "") {
            wp_send_json('false');
        }
    }
}
new MOPPM_Ajax;
