<?php

    global $moppm_utility,$moppm_dirname;
    $controller = $moppm_dirname . 'controllers'.DIRECTORY_SEPARATOR;

    
if (current_user_can('administrator')) {
    if (isset($_GET[ 'page' ])) {
        $page = sanitize_text_field($_GET[ 'page' ]);
        if($page == 'moppm_upgrade'){
            include $controller . 'moppm_upgrade.php';
        }
        else{
            include $controller      . 'navbar.php';
            echo ' <br> <table class="moppm_main_table" style="width:100%;"><tr><td class="moppm_layout" style="width:74%;">';
            switch ($page) {
                case 'moppm_account':
                    include $controller . 'account.php';
                    break;
                case 'moppm_menu':
                    include $controller . 'configuration.php';
                    break;
                case 'moppm':
                 include $controller . 'password-policy.php';
                    break;
                case 'moppm_addons':
                     include $controller . 'moppm_addons.php';
                    break;
                case 'moppm_reports':
                    include $controller . 'moppm_reports.php';
                    break;
                case 'moppm_registration_form':
                    include $controller . 'moppm_registration_form.php';
                    break;
                case 'moppm_advertise':
                    include $controller . 'moppm_advertise.php';
                    break;
                    
            }             
 echo '</td><td></td><td class="moppm_support_layout" style="width:25%;vertical-align:top;">';         
            include $controller . 'support.php';
            echo '</td ></tr></table>';

        }
    }
}
