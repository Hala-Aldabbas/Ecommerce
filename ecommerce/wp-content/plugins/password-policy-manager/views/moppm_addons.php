<?php
global $moppm_directory_url;

$setup_dirName = $moppm_directory_url .DIRECTORY_SEPARATOR.'views'.DIRECTORY_SEPARATOR.'account'.DIRECTORY_SEPARATOR.'link_tracer.php';
require ($setup_dirName);
?>
<div id="main_class" style="display: flex;">
 <div id="main_first" style="width: 50%;"><h1 ><b>Paid Features </b> <span class="moppm_advertise"> <?php echo '  <a href="'.esc_url($upgrade_url).'" style="color: red">'; ?>[ UPGRADE ]</a></span> </h1></div>
 <div class="" style="width: 50%;margin-top: 1em;"></div>
</div>
<hr>
  <div style="margin-top:12px" >
  	<table>
  		<tbody>
  			<tr>
  				<td class="moppm_premium_feature_text"> Disallow Previously Used Passwords <span class="moppm_premium_instruction" id="error1"></span></td>
  				<td class="moppm_premium_button"><label class="mo_wpns_switch" >
    <input type="checkbox"  id="Moppm_previously_used" name="Moppm_previously_used"><span class="mo_wpns_slider mo_wpns_round mo_ppm_switch"></span>
    
                        </a>  
                        <a href= '<?php echo esc_url($moppm_premium_doc['DisallowPreviouslyUsedPasswords']);?>' target="_blank">
                        <span class="dashicons dashicons-text-page" title="More Information" style="font-size:22px;color:#224fa2; float: right;margin-right: -2.6em;margin-top: 0.2em;"></span></a>

                         <a href= '<?php echo esc_url($passwordPolicySettings['passwordPolicySettings']);?>' target="_blank">
                        <span class="dashicons dashicons-video-alt3" title="More Information" style="font-size:22px;color:red; float: left;margin-left: 3.2em;margin-top: -0.6em;"></span>
                        </a>
               </label> </td>
  			</tr>

  		</tbody>
  	</table>

    <p class="moppm_text"> select the number of previous password you do not want to allow:  <input type="number" max=30  min=1 name="moppm_prev_password_lim" id="moppm_prev_password_lim" value="<?php echo esc_html (get_site_option('moppm_prev_password_lim',1));?>" /> <input  name="moppm_prev_password_lim_save" id="moppm_prev_password_lim_save" value="Save Settings" type="button" class="button button-primary">
  </p>

  	<p style="margin-top:29px;" class="moppm_text">It will restrict users from using  previously stored password,Which will make the password more secure and safe from attacks.</p>
  </div>
  <hr>
  <div style="margin-top:12px">
  	<table>
  		<tbody>
  			<tr>
  				<td class="moppm_premium_feature_text">Automatically Lock Inactive Users <span class="moppm_premium_instruction" id="error3"></span></td>
  				<td class="moppm_premium_button"><label class="mo_wpns_switch" >
    <input type="checkbox"  id="Moppm_automatically_Inactive" name="Moppm_automatically_Inactive"><span class="mo_wpns_slider mo_wpns_round mo_ppm_switch"></span><a href= '<?php echo esc_url($moppm_premium_doc['AutomaticallyLockInactiveUsers']);?>' target="_blank">
                        <span class="dashicons dashicons-text-page" title="More Information" style="font-size:22px;color:#224fa2; float: right; margin-right: -2.6em;margin-top: 0.2em;"></span></a>
                        <a href= '<?php echo  esc_url($passwordPolicySettings['AutomaticallyLockInactiveUsers']);?>' target="_blank">
                        <span class="dashicons dashicons-video-alt3" title="More Information" style="font-size:22px;color:red; float: left;margin-left: 3.2em;margin-top: -0.6em;"></span>
                        </a>
               </label> </td>
  			</tr>
  		</tbody>
  	</table>
  <form class="moppm_select_dropdown">
  <label for="cars"style=" font-size:15px;" >Choose the time duration </label>
  <input type="number" max=30  min=1 name="moppm_prev_password_lim" id="moppm_prev_password_lim" value="<?php echo esc_html (get_site_option('moppm_prev_password_lim',3));?>" />
    <select id="moppm_select_days" name="cars">
    <option value="Days">Days</option>
    <option value="Weeks">Weeks</option>
    <option value="Month">Month</option>
    </select>
    <input  name="moppm_inactive_user" id="moppm_inactive_user" value="Save Settings" type="button" class="button button-primary">
  </form><br><br>
  </div>
  <hr>
  <div>
    <table>
      <tbody>
        <tr>
          <td class="moppm_premium_feature_text">Custom Redirect Url <span class="moppm_premium_instruction" id="error5"></span></td>
          <td class="moppm_premium_button"><label class="mo_wpns_switch" >
    <input type="checkbox"  id="Moppm_custom_redirect_url" name="Moppm_custom_redirect_url"><span class="mo_wpns_slider mo_wpns_round mo_ppm_switch"></span><a href= '<?php echo esc_url($moppm_premium_doc['CustomRedirectUrl']);?>' target="_blank">
                        <span class="dashicons dashicons-text-page" title="More Information" style="font-size:22px;color:#224fa2; float: right;margin-right: -2.6em;margin-top: 0.2em;"></span></a>
                        <a href= '<?php echo  esc_url($passwordPolicySettings['CustomRedirectUrl']);?>'target="_blank">
                        <span class="dashicons dashicons-video-alt3" title="More Information" style="font-size:22px;color:red; float: left;margin-left: 3.2em;margin-top: -0.6em;"></span>
                        </a>
               </label> </td>
        </tr>
      </tbody>
    </table>
    <p style= " font-size: 15px;"> <?php echo __('Set the redirect url, where user can redirect after the reset password','password-policy-manager');?></p> 
    <?php
        global $wp_roles;
        if (!isset($wp_roles))
            $wp_roles = new WP_Roles();
        print '<div><span style="font-size:18px;">Roles<div style="float:right;">' . __('Custom Redirect Login Url','password-policy-manager') . '</div></span><br /><br />';
        foreach($wp_roles->role_names as $id => $name) 
        {    
                $setting = get_site_option('moppm_'.$id);
                $redirect =(get_site_option( 'moppm_' . $id . '_login_url' , '') !== '')?esc_html (get_site_option('moppm_' . $id . '_login_url')):get_site_option('siteurl');
                ?>
            <div><input type="checkbox" name="<?php echo 'moppm_'.esc_html($id); ?>" style="margin-left: 2%;"  value="1"<?php checked($setting == 1);?>/><?php echo esc_html($name); ?>
            <input type="text" class="moppm_table_textbox_redirect"  name="<?php echo esc_html('moppm_'.$id); ?>_login_url" value="<?php echo esc_html($redirect); ?>"/>
            </div> 
            <br /><?php
        }
         $current_user_id = wp_get_current_user()->ID;
   
        if(is_network_admin( $current_user_id ) && is_multisite())
        {?>
            <div><input type="checkbox" name="moppm_superadmin" style="margin-left: 2%;" value="1"  />Super Admin
            <input type="text" class="moppm_table_textbox_redirect" name="moppm_superadmin_login_url" value="<?php echo esc_html (get_option('moppm_superadmin_login_url')); ?>"/>
            </div> <br><?php 
        }?> 
        <br><br>
        <input type="submit" class="button button-primary" value="Submit"> 
       <?php  echo '<input type="hidden" name="moppm_redirect_url" value="moppm_remove_account"/>';?>
  </div> <br>
  <hr>
  <div style="margin-top:12px" >
  	<table>
  		<tbody>
  			<tr>
  				<td class="moppm_premium_feature_text"> Generate Random Password <span class="moppm_premium_instruction" id="error4"></span></td>
  				<td class="moppm_premium_button"><label class="mo_wpns_switch" >
    <input type="checkbox"  id="Moppm_generate_password" name="Moppm_generate_password"><span class="mo_wpns_slider mo_wpns_round mo_ppm_switch"></span><a href= '<?php echo esc_url($moppm_premium_doc['GenerateRandomPassword']);?>' target="_blank">
                        <span class="dashicons dashicons-text-page" title="More Information" style="font-size:22px;color:#224fa2; float: right;margin-right: -2.6em;margin-top: 0.2em;"></span></a>
                        <a href= '<?php echo  esc_url($passwordPolicySettings['GenerateRandomPassword']);?>' target="_blank">
                        <span class="dashicons dashicons-video-alt3" title="More Information" style="font-size:22px;color:red; float: left;margin-left: 3.2em;margin-top: -0.6em;"></span>
                        </a>
               </label> </td>
  			</tr>
  		</tbody>
  	</table>
  	<p style="margin-top:12px" class="moppm_text">This function will generate a random and strong password according to the set policy on password reset window.</p>
  </div>
  <hr>
  <div >
    <table>
      <tbody>
        <tr>
        <td class="moppm_premium_feature_text">Hide Password reset link from WP-login <span class="moppm_premium_instruction" id="error6"> </td>
       <td class="moppm_premium_button"><label class="mo_wpns_switch" >
  <input type="checkbox"  id="Moppm_reset_pass" name="Moppm_reset_pass"><span class="mo_wpns_slider mo_wpns_round mo_ppm_switch"></span>
  
              <a href= '<?php echo esc_url($moppm_premium_doc['HidePasswordresetlinkfromWP-login']);?>' target="_blank">
                        <span class="dashicons dashicons-text-page" title="More Information" style="font-size:22px;color:#224fa2; float: right;margin-right: -2.6em;margin-top: 0.2em;"></span></a>
                        <a href= '<?php echo esc_url($passwordPolicySettings['HidePasswordresetlinkfromWP-login']);?>'target="_blank">
                        <span class="dashicons dashicons-video-alt3" title="More Information" style="font-size:22px;color:red; float:left;margin-left: 3.2em;margin-top: -0.6em;"></span>
                        </a>
               </label>
        </td>
      </tr>
      </tbody>
    </table>  
  </div>
<script type="text/javascript">
  jQuery(".mo_ppm_switch").click(function(e){
    Moppm_error_msg("This feature is available in premium plugin");
  });
</script>