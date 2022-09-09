<?php

class MOPPM_Api
{

    public static function wp_remote_post($url, $args = array())
    {
        $response = wp_remote_post($url, $args);
        if (!is_wp_error($response)) {
            return $response['body'];
        } else {
            $message = 'Please enable curl extension. <a href="admin.php?page=mo_2fa_troubleshooting">Click here</a> for the steps to enable curl.';

            return json_encode(array( "status" => 'ERROR', "message" => $message ));
        }
    }
  public static  function moppm_is_curl_installed()
    {
        if  (in_array ('curl', get_loaded_extensions()))
            return 1;
        else 
            return 0;
    }

    public static function make_curl_call($url, $fields, $http_header_array = array("Content-Type"=>"application/json","charset"=>"UTF-8","Authorization"=>"Basic"))
    {
        if (gettype($fields) !== 'string') {
            $fields = json_encode($fields);
        }

        $args = array(
            'method' => 'POST',
            'body' => $fields,
            'timeout' => '5',
            'redirection' => '5',
            'httpversion' => '1.0',
            'blocking' => true,
            'headers' => $http_header_array
        );

        $response = self::wp_remote_post($url, $args);
        return $response;
    }
    public static function get_customer_key($email, $password)
    {
        $url    = MOPPM_Constants::HOST_NAME. "/moas/rest/customer/key";
        $fields = array (
                    'email'     => $email,
                    'password'  => $password
                );
        $json       = json_encode($fields);
        $response   = self::make_curl_call($url, $json);
        return $response;
    }
public static function forgot_password()
    {
        $url         = MOPPM_Constants::HOST_NAME. '/moas/rest/customer/password-reset';
        $email       = esc_attr(get_site_option('email'));
        $key         = esc_attr(get_site_option('customerKey'));
        $api         = esc_attr (get_site_option('api_key'));
        $token       = esc_attr (get_site_option('customer_token'));
        $fields      = array('email' => $email);
        $json        = wp_json_encode($fields);
        $authHeader  = self ::createAuthHeader($key, $api);
        $response    = self::make_curl_call($url, $json, $authHeader);
        return $response;
    }

public static function check_customer($email)
    {
        $url    = MOPPM_Constants::HOST_NAME . "/moas/rest/customer/check-if-exists";
        $fields = array(
                    'email'     => $email,
                );
        $json     = json_encode($fields);
        $response = self::make_curl_call($url, $json);
        return $response;
    }

    public static function create_customer($email, $company, $password, $phone = '', $first_name = '', $last_name = '')
    {
        $url = MOPPM_Constants::HOST_NAME . '/moas/rest/customer/add';
        $fields = array (
            'companyName'    => $company,
            'areaOfInterest' => 'WordPress Password Policy Plugin',
            'firstname'      => $first_name,
            'lastname'       => $last_name,
            'email'          => $email,
            'phone'          => $phone,
            'password'       => $password
        );
        $json = json_encode($fields);
        $response = self::make_curl_call($url, $json);
        return $response;
    }
public static function submit_contact_us($q_email, $q_phone, $query)
    {
        $current_user = wp_get_current_user();
        $url          = MOPPM_Constants::HOST_NAME . "/moas/rest/customer/contact-us";
        global $mowafutility;
        $query = '[miniOrange password policy | Setting -V '.MOPPM_VERSION.']: ' . esc_html($query);
        
        $fields = array(
                    'firstName' => $current_user->user_firstname,
                    'lastName'  => $current_user->user_lastname,
                    'company'   => sanitize_text_field ($_SERVER['SERVER_NAME']),
                    'email'     => $q_email,
                    'ccEmail'   => '2fasupport@xecurify.com',
                    'phone'     => $q_phone,
                    'query'     => $query
                );
        $field_string = json_encode($fields);
        $response = self::make_curl_call($url, $field_string);
        return $response;
    }

public static function send_email_alert($email, $phone, $message, $feedback_option)
    {
        global $user;
        $url = MOPPM_Constants::HOST_NAME . '/moas/api/notify/send';
        $customerKey = MOPPM_Constants::DEFAULT_CUSTOMER_KEY;
        $apiKey      = MOPPM_Constants::DEFAULT_API_KEY;
        $fromEmail   = 'no-reply@xecurify.com';
        if ($feedback_option == 'moppm_skip_feedback') {
            $subject = "Deactivate [Feedback Skipped]: miniOrange password policy setting";
        } elseif ($feedback_option == 'moppm_feedback') {
            $subject = "Feedback: miniOrange password policy setting - ". sanitize_email($email);
        }
        $user  = wp_get_current_user();
        $query = '[miniOrange password policy setting: - V '.MOPPM_VERSION.']: ' . $message;
        $content='<div >Hello, <br><br>First Name :'.sanitize_text_field($user->user_firstname).'<br><br>Last  Name :'.sanitize_text_field($user->user_lastname).'   <br><br>Company :<a href="'.sanitize_text_field($_SERVER['SERVER_NAME']).'" target="_blank" >'.sanitize_text_field($_SERVER['SERVER_NAME']).'</a><br><br>Phone Number :'.sanitize_text_field($phone).'<br><br>Email :<a href="mailto:'.sanitize_text_field($email).'" target="_blank">'.sanitize_text_field($email).'</a><br><br>Query :'.$query.'</div>';
        $fields = array(
            'customerKey'   => $customerKey,
            'sendEmail'     => true,
            'email'         => array(
            'customerKey'   => $customerKey,
            'fromEmail'     => $fromEmail,
            'fromName'      => 'Xecurify',
            'toEmail'       => '2fasupport@xecurify.com',
            'toName'        => '2fasupport@xecurify.com',
            'subject'       => $subject,
            'content'       => $content),
        );

        $field_string = json_encode($fields);
        $authHeader   = self::createAuthHeader($customerKey, $apiKey);
        $response     = self::make_curl_call($url, $field_string, $authHeader);
        return $response;
    }

public static function createAuthHeader($customerKey, $apiKey)
    {
        $currentTimestampInMillis = round(microtime(true) * 1000);
        $currentTimestampInMillis = number_format($currentTimestampInMillis, 0, '', '');
        $stringToHash             = $customerKey . $currentTimestampInMillis . $apiKey;
        $hashValue                = hash("sha512", $stringToHash);
        $headers = array(
            "Content-Type"  => "application/json",
            "Customer-Key"  => $customerKey,
            "Timestamp"     => $currentTimestampInMillis,
            "Authorization" => $hashValue
        );

        return $headers;
    }
}
