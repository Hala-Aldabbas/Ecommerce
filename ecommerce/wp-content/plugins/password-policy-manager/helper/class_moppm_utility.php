<?php
class Moppm_Utility
{

    public static function validate_password($password)
    {
        $length_pass = strlen($password);
        if ((get_site_option('moppm_Numeric_digit') == 1) && (!preg_match("#[0-9]+#", $password))) {
             return "New Password must contain numeric value";
        }
        if ((get_site_option('moppm_letter') == 1) && (!preg_match("/[a-z]/", $password) )) {
                return "New Password must contain lower case letter";
        }
        if ((get_site_option('moppm_letter') == 1) && (!preg_match("/[A-Z]/", $password) )) {
            return "New Password must contain upper case letter";
        }
           
        if ((get_site_option('moppm_special_char') == 1) && (!preg_match("/[@#$\%&\*()_+{:;'\><,.}]/", $password) )) {
            return "New Password must contain Special character";
        }
        if ($length_pass < get_site_option('moppm_digit')) {
            return 'New Password must contain at least '. get_site_option('moppm_digit') .' characters ';
        }
        return 'VALID';
    }
    public static function moppm_lt( $string ) {
    return __($string ,'miniorange-password-policy-manager');
    }
     public static function check_password_score($password)
     {
        $score   = 0;   
        if (strlen($password) > 7){
             $score = $score+2;
        } 
        if (preg_match("/[a-z]/", $password))
        {
            $score++;
        }
        if (preg_match("/[A-Z]/", $password))
        {
            $score++;
        }
        if (preg_match("#[0-9]+#", $password))
        {
             $score++;
        } 
        if (preg_match("/[@#$\%&\*()_+{:;'\><,.}]/", $password))
        {
            $score++;
        } 
        if (strlen($password) > 12)
        {
             $score = $score+2;
        } 
        if (strlen($password) > 17)
        {
             $score = $score+2;
        } 
        return $score;
     }
    public static function getCurrentBrowser()
        {
            $useragent = sanitize_text_field($_SERVER['HTTP_USER_AGENT']);
            if(empty($useragent))
                return false;

           $useragent = strtolower($useragent);
            if(strpos($useragent, 'edge')       !== false)
                return 'edge';
            else if(strpos($useragent, 'edg')       !== false)
                return 'edge';
            else if(strpos($useragent, 'opr')   !== false)
                return 'opera';
            else if(strpos($useragent, 'chrome') !== false || strpos($useragent, 'CriOS') !== false)
                return 'chrome';
            else if(strpos($useragent, 'firefox')   !== false)
                return 'firefox';
            else if(strpos($useragent, 'msie')      !== false || strpos($useragent, 'trident')  !==false)
                return 'ie';
            else if(strpos($useragent, 'safari')    !== false)
                return 'safari';
    }

 public static function moppm_send_configuration($send_all_configuration=false){
            $user_object                    = wp_get_current_user();
            $key                            = get_site_option('customerKey');
            $space                          = "<span>&nbsp;&nbsp;&nbsp;</span>";
            $browser                        = Moppm_Utility:: getCurrentBrowser();
            $specific_plugins               = array('UM_Functions'=>'Ultimate Member', 'wc_get_product'=>'WooCommerce','pmpro_gateways'=>'Paid MemberShip Pro');
            $plugin_configuration ="<br><br><I>Plugin Configuration :-</I>".$space.(is_multisite()?"Multisite : Yes":"Single-site : Yes").$space.( $key? "Key : ".$key :'' ).$space."Browser : ".$browser;
            foreach($specific_plugins as $class_name => $plugin_name){
                if(class_exists($class_name) || function_exists($class_name)){
                    $plugin_configuration = $plugin_configuration.$space.'Installed Plugins :'.$plugin_name;
                }
            }
            if(is_multisite()){
                $plugin_configuration = $plugin_configuration.$space.($is_plugin_active_for_network?"Network activated:'Yes":"Site activated:'Yes");
            }
            if(get_site_option('registration_status')){
               $plugin_configuration = $plugin_configuration.$space.'registration_status : '.get_site_option('registration_status');     
            }
            if(get_site_option( 'no_of_of_attempt')){
                $plugin_configuration = $plugin_configuration.$space.'1 Click Reset : '.get_site_option( 'no_of_of_attempt');
            }
            if(time()-get_site_option("moppm_pricing_page_visitor")<2592000 && (get_site_option('moppm_plantype')|| get_site_option('moppm_plantype'))){
                $plugin_configuration=$plugin_configuration.$space."Checked plans : '";
                if(get_site_option('moppm_plantype'))
                    $plugin_configuration=$plugin_configuration.get_site_option('moppm_plantype')."'";
            }
            $plugin_configuration = $plugin_configuration.$space."PHP_version : " . phpversion().$space."Wordpress_version : " . get_bloginfo('version');
            if(!$send_all_configuration)
                return $plugin_configuration;

            return $plugin_configuration;
    }
}
