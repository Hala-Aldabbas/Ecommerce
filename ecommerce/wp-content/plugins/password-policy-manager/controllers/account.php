<?php
    
    global $moppm_utility,$moppm_dirname,$moppm_db_queries;

if (current_user_can('manage_options') and isset($_POST['option'])) {
    $option = sanitize_text_field(trim($_POST['option']));
    switch ($option) {
        case "moppm_register_customer":
            moppm_register_customer();
            break;
        case "moppm_verify_customer":
            moppm_verify_customer();
            break;
        case "moppm_cancel":
            moppm_revert_back_registration();
            break;
        case "moppm_reset_password":
            moppm_reset_password();
            break;
        case "moppm_goto_verifycustomer":
            moppm_goto_sign_in_page();
            break;
    }
}

    $user = wp_get_current_user();
   
    if (get_site_option('verify_customer') == 'true') {

        $admin_email = get_site_option('email') ? get_site_option('email') : "";
        include $moppm_dirname . 'views'.DIRECTORY_SEPARATOR.'account'.DIRECTORY_SEPARATOR.'login.php';
    } 
    elseif (! moppm_icr()) {

        include $moppm_dirname . 'views'.DIRECTORY_SEPARATOR.'account'.DIRECTORY_SEPARATOR.'register.php';
    } 
    else {
        $email = get_site_option('email');
        $key   = get_site_option('customerKey');
        $api   = get_site_option('api_key');
        $token = get_site_option('customer_token');
        include $moppm_dirname . 'views'.DIRECTORY_SEPARATOR.'account'.DIRECTORY_SEPARATOR.'profile.php';
}
function moppm_register_customer()
{
    global $moppm_db_queries, $moppm_utility;
    $nonce = sanitize_text_field($_POST['nonce']);
    if (! wp_verify_nonce($nonce, 'moppm-account-nonce')) {
        do_action('moppm_show_message', MOPPM_Messages::showMessage('ERROR'), 'ERROR');
        return;
        }
        $email           = sanitize_email($_POST['email']);
        $company         = sanitize_text_field($_SERVER["SERVER_NAME"]);
        $password        = sanitize_text_field($_POST['password']);
        $confirmPassword = sanitize_text_field($_POST['confirmPassword']);

    if(strlen($password) < 6 || strlen($confirmPassword) < 6) {
        do_action('moppm_show_message', MOPPM_Messages::showMessage('PASS_LENGTH'), 'ERROR');
        return;
    }       
    if ($password != $confirmPassword) {
        do_action('moppm_show_message', MOPPM_Messages::showMessage('PASS_MISMATCH'), 'ERROR');
        return;
    }
    if (moppm_check_empty_or_null($email) || moppm_check_empty_or_null($password)
        || moppm_check_empty_or_null($confirmPassword)) {
        do_action('moppm_show_message', MOPPM_Messages::showMessage('REQUIRED_FIELDS'), 'ERROR');
        return;
    }
        update_site_option('email', $email);
        update_site_option('company', $company);
        update_site_option('password', $password);
        $customer = new MOPPM_Api();
        $content  = json_decode($customer->check_customer($email), true);
        switch ($content['status']) {
        case 'CUSTOMER_NOT_FOUND':
              $customerKey = json_decode($customer->create_customer($email, $company, $password, $phone = '', $first_name = '', $last_name = ''), true);
                  
            if (strcasecmp($customerKey['status'], 'SUCCESS') == 0) {
                moppm_save_success_customer_config($email, $customerKey['id'], $customerKey['apiKey'], $customerKey['token'], $customerKey['appSecret']);
                moppm_get_current_customer($email, $password);
            }
                
            break;
        default:
            moppm_get_current_customer($email, $password);
            break;
    }
}


function moppm_goto_sign_in_page()
{
     global $moppm_db_queries;
     $nonce = sanitize_text_field($_POST['nonce']);
    if (! wp_verify_nonce($nonce, 'moppm-account-nonce')) {
        do_action('moppm_show_message', MOPPM_Messages::showMessage('ERROR'), 'ERROR');
        return;
        }
    update_site_option('verify_customer', 'true');

}

function moppm_revert_back_registration()
{
    $nonce = sanitize_text_field($_POST['nonce']);
    if (! wp_verify_nonce($nonce, 'moppm-account-nonce')) {
            do_action('moppm_show_message', MOPPM_Messages::showMessage('ERROR'), 'ERROR');
        return;
    }
    delete_site_option('email');
    delete_site_option('verify_customer');
}
function moppm_reset_password()
{
    global $moppm_db_queries;
    $nonce = sanitize_text_field($_POST['nonce']);
    if (! wp_verify_nonce($nonce, 'moppm-account-nonce')) {
        do_action('moppm_show_message', MOPPM_Messages::showMessage('ERROR'), 'ERROR');
        return;
    }
    $customer = new MOPPM_Api();
    $forgot_password_response = json_decode($customer->forgot_password());
    if ($forgot_password_response->status == 'SUCCESS') {
        do_action('moppm_show_message', MOPPM_Messages::showMessage('RESET_PASS'), 'SUCCESS');
    }
    return;
}


function moppm_verify_customer()
{
    global $moppm_db_queries;
    $nonce = sanitize_text_field($_POST['nonce']);
    if (! wp_verify_nonce($nonce, 'moppm-account-nonce')) {
        do_action('moppm_show_message', MOPPM_Messages::showMessage('ERROR'), 'ERROR');
        return;
    }
    global $moppm_utility;
    $email    = sanitize_email($_POST['email']);
    $password = sanitize_text_field($_POST['password']);
    if (moppm_check_empty_or_null($email) || moppm_check_empty_or_null($password)) {
        do_action('moppm_show_message', MOPPM_Messages::showMessage('REQUIRED_FIELDS'), 'ERROR');
        return;
    }
    moppm_get_current_customer($email, $password);
}

function moppm_get_current_customer($email, $password)
{
    global $moppm_db_queries;
    $user        = wp_get_current_user();
    $customer    = new MOPPM_Api();
    $content     = $customer->get_customer_key($email, $password);
    $customerKey = json_decode($content, true);
    if (json_last_error() == JSON_ERROR_NONE) {
        if (isset($customerKey['phone'])) {
            update_site_option('admin_phone', $customerKey['phone']);
        }
        
        update_site_option('email', $email);
        moppm_save_success_customer_config($email, $customerKey['id'], $customerKey['apiKey'], $customerKey['token'], $customerKey['appSecret']);
        do_action('moppm_show_message', MOPPM_Messages::showMessage('REG_SUCCESS'), 'SUCCESS');
        return;
    } else {
        update_site_option('verify_customer', 'true');
        do_action('moppm_show_message', MOPPM_Messages::showMessage('ACCOUNT_EXISTS'), 'ERROR');
    }
}
    
        
function moppm_save_success_customer_config($email, $id, $apiKey, $token, $appSecret)
{
    global $moppm_db_queries;
    $user   = wp_get_current_user();
    update_site_option('customerKey', $id);
    update_site_option('api_key', $apiKey);
    update_site_option('customer_token', $token);
    update_site_option('app_secret', $appSecret);
    update_site_option('registration_status', 'SUCCESS');
    delete_site_option('verify_customer');
    delete_site_option('mo_wpns_password');
}

function moppm_icr()
{
    global $moppm_db_queries;
    $email          = get_site_option('email');
    $customerKey    = get_site_option('customerKey');
    if (! $email || ! $customerKey || ! is_numeric(trim($customerKey))) {
        return 0;
    } else {
        return 1;
    }
}
    
function moppm_check_empty_or_null($value)
{
    if (! isset($value) || empty($value)) {
        return true;
    }
    return false;
}
