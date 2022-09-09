<?php
 global $moppm_directory_url;
$setup_dirName = $moppm_directory_url .DIRECTORY_SEPARATOR.'views'.DIRECTORY_SEPARATOR.'account'.DIRECTORY_SEPARATOR.'link_tracer.php';
require ($setup_dirName);
?>
<div class="moppm_div_hover">
<h3><?php echo __('Select the specific set of Policy Settings for your users.');?></h3>
    <input type="radio" id="moppm_for_roles" class="moppm_for_roles" name="moppm_all_users_method" value="1" checked="checked" />
         <?php echo __('For all Users','miniorange-password-policy-settings');?>&nbsp;&nbsp;
         <input type="radio" id="moppm_for_Select_users" class="moppm_for_Select_users" name="moppm_all_users_method" value="0" />
         <?php echo __('Specific Roles','miniorange-password-policy-settings'); ?>
    <br><br></div>
    <div class="moppm_show_roles">
      <?php
    global $wp_roles;
    if (!isset($wp_roles))
    $wp_roles = new WP_Roles(); 
    $count = 1;
    foreach($wp_roles->role_names as $id => $name)
    {?>
       <span class="moppm_display_tab moppm_btn" style="border-radius:6px;padding: 5px 25px; width:2px !important;"   ID="moppm_role_<?php echo esc_html($id) ?>" onclick="displayTab('<?php echo esc_html($id) ?>');" value="<?php echo esc_html($id) ?>" <?php if(get_site_option('moppm_all_users_method')){echo 'hidden';}?>> <?php echo esc_html($name) ?></span>

       <?php
       if($count%7 == 0)
            echo "<br><br><br>";
        $count = $count+1;

    }?>
    <br><br><br>
    <span class="moppm_advertise">This Feature is available in our Paid plugin <?php echo '<a href="'.esc_html($upgrade_url).'" style="color: red">'; ?>[ UPGRADE ]</a></span>
    <hr>  
</div>
<div class="moppm_show_user_redirect">
<div  class="moppm_hide_user_redirect">
<div id="main_class" style="display: flex;">
 <div id="main_first" style="width: 50%;"><h1> Password Policy Settings </h1></div>
 <div class="" id="disable_two_factor_tour" style="width: 50%;margin-top: 1em;">
    <div class="moppm_doc_video">
    <a href= '<?php echo esc_url($passwordPolicySettings['passwordPolicySettings']);?>' target="_blank">
    <span class="dashicons dashicons-video-alt3" title="More Information" style="color:red; "></span></a>  
    <a href= '<?php echo esc_url($moppm_premium_doc['passwordPolicySettings']);?>' target="_blank">
    <span class="dashicons dashicons-text-page" title="More Information" ></span> </a>
    </div>               
  <div style="padding-top: -50%;">
           <form name="f" method="post" action="">
             <div id="enabling_password_ploicy" >

               <p class="moppm_enable_settings_text" style="margin-left: 6em">Enable/Disable all settings </p>

               <label class="mo_wpns_switch" >
               <input type="checkbox"  id="Moppm_enable_ppm"
                      name="Moppm_enable_ppm">    
               <span class="mo_wpns_slider mo_wpns_round"></span>
               </label>
             </div>
           </form>
         </div>
       </div>
</div>

<table class="moppm_table">
  <tbody>
    <tr >
      <td><div  class="moppm_form_space"></div> </td>
      <td> <div  class="moppm_lower_case"> <label> Must Contain Lower and Uppercase letter like [a|A] </label></div> </td>
      <td> <div  class="moppm_lower_checkbox"><input class="moppm_checkbox" style="padding-top: 200px" type="checkbox" id="moppm_letter" name="moppm_letter" value="moppm_letter"></div> </td>
    </tr>
    <tr>
      <td><div  class="moppm_form_space"> Policy Settings</div> </td>
      <td> <div  class="moppm_Numweric"> <label>Must Contain Numeric digits like [0,9] </label></div> </td>
      <td> <div  class="moppm_Numweric_checkbox"><input class="moppm_checkbox" type="checkbox" id="moppm_Numeric_digit" name="moppm_Numeric_digit"></div> </td>
    </tr>
    <tr>
      <td><div  class="moppm_form_space"></div> </td>
      <td> <div  class="moppm_spec_char"> <label>Must Contain characters like [@, #, $, % etc] </label></div> </td>
      <td> <div  class="moppm_spec_checkbox"><input class="moppm_checkbox" type="checkbox" id="moppm_special_char" name="moppm_special_char" value="moppm_special_char"></div> </td>
    </tr>
    <tr>
      <td><div  class="moppm_form_space"></div> </td>
      <td> <div  class="moppm_len_pass"> <label for="quantity">Length of password [between 8 and 25]</label></div> </td>
      <td> <div  class="moppm_len_checkbox"><input class="moppm_selector" type="number" id="moppm_digit" name="moppm_digit" value="8" min="8" max="25"></div> </td>
    </tr>
    <tr>
      <td><div  class="moppm_form_space"></div> </td>
      <td> <div  class="moppm_first_reset"> <label>Force reset password on first login </label></div> </td>
      <td> <div  class="moppm_first_checkbox"><input class="moppm_checkbox" type="checkbox" id="moppm_first_reset" name="moppm_first_reset" value="moppm_first_reset"></div> </td>
    </tr>
  </tbody>
</table>
  <div class="moppm_exp_form">
  <table class="moppm_table">
    <tbody>
      <tr>
        <td class="moppm_exp_space"> </td><td class="moppm_expiry_text">Enable expiration time</td><td class="moppm_expiry_toggle">
               <label class="mo_expiry_switch" >
               <input type="checkbox"  id="moppm_enable_disable_expiry"
                      name="moppm_enable_disable_expiry">    
               <span class="moppm_switch_slider moppm_switch_round"></span>
               </label>
             </td>
      </tr>
      <tr>
        <td class="moppm_exp_space">Expiry Time <div class="">
        <a href= '<?php echo esc_url($moppm_premium_doc['ExpiryTime']);?>' target="_blank">
        <span class="dashicons dashicons-text-page" title="More Information" style="font-size:22px;color:#224fa2; float: right;margin-right: -228%;margin-top: -22%;"></span></a>
        <a href= '<?php echo esc_url($passwordPolicySettings['ExpiryTime']);?>' target="_blank">
        <span class="dashicons dashicons-video-alt3" title="More Information" style="font-size:22px;color:red; float: right;margin-right: -218%; margin-top: -22%;"></span></a>  </div>
        </td>
        
        <td class="moppm_exp_text"> Password will be expired after 7 weeks</td><td class="moppm_expiry_toggle"> <input class="moppm_selector" style="margin-left: 4% !important;"type="number" id="moppm_expiration_time" name="moppm_expiration_time" value="7" min="7" max="7" disabled></td>
      </tr>
    </tbody>
  </table>
  </div>
  <div>
    <center>
  <input type="button" value="Save Settings"  id="moppm_save_form" class="button button-primary">
</div>
  </center>
 
  <hr>
<div>
    <table>
      <tbody>
        <tr>
          <td class="moppm_1click_text"><h1>One-click Reset Password </h1><a href= '<?php echo esc_url($moppm_premium_doc['One-clickResetPassword']);?>' target="_blank">
                        <span class="dashicons dashicons-text-page" title="More Information" style="font-size:22px;color:#224fa2; float: right;    margin-right: -51%; margin-top: -6%"></span>
                        </a>

                     <a href= '<?php echo esc_url($passwordPolicySettings['One-clickResetPassword']);?>' target="_blank">
                        <span class="dashicons dashicons-video-alt3" title="More Information" style="font-size:22px;color:red; float:right;    margin-right: -46.5%; margin-top: -6%"></span>
                        </a>
             </td>
          <td class="moppm_premium_button"><input type="button" value="Reset Password"  id="moppm_reset_pass" class="button button-primary" ></td>
        </tr>
      </tbody>
    </table>
    <p style="margin-top:12px;font-size: 15px"><span> Terminates all logged in sessions for the users and resets their Password. Users need to set up a new Password via a Reset link sent on their email</span></p>  
  </div>
</div>
</div>
    <script>
      
jQuery('.moppm_show_roles').hide();


function displayTab(role){
    role_name_value = role;
    jQuery('.moppm_display_tab').removeClass("moppm_blue");
    jQuery('.moppm_display_tab').addClass("moppm_btn");
    jQuery('#moppm_role_'+role).removeClass("moppm_btn");
    jQuery('#moppm_role_'+role).addClass("moppm_blue");
    jQuery('#moppm_for_all_'+role).show();
    jQuery('.moppm_show_user_redirect').show();
    jQuery('.moppm_hide_user_redirect').find('input, textarea, button, select').attr('disabled','disabled');
  }
  jQuery('#moppm_for_roles' ).click(function(){
       jQuery('.moppm_show_roles').hide();
       jQuery('.moppm_show_user_redirect').show();
       jQuery('.moppm_hide_user_redirect').find('input, textarea, button, select').removeAttr('disabled');

     })
     jQuery('#moppm_for_Select_users').click(function(){
    
       jQuery('.moppm_show_roles').show();
        jQuery('.moppm_show_user_redirect').hide();
      
     })

        var Moppm_enable_ppm = "<?php echo esc_html (get_site_option('Moppm_enable_disable_ppm'));?>";
             if(Moppm_enable_ppm == 'on')
                {
                    jQuery('#Moppm_enable_ppm').prop("checked",true);   
                }
                else
                {
                    jQuery('#Moppm_enable_ppm').prop("checked",false);
                }
        jQuery("#Moppm_enable_ppm").click(function()
            {

                var Moppm_enable_ppm = jQuery("input[name='Moppm_enable_ppm']:checked").val();
                var nonce = '<?php echo wp_create_nonce("WAFsettingNonce");?>';
                if(Moppm_enable_ppm != '')
                {
                    var data = {
                                'action'                            : 'moppm_ajax',
                                'option'                            : 'moppm_setting_enable_disable',
                                'Moppm_enable_ppm'                  :  Moppm_enable_ppm,
                                'nonce'                             :  nonce
                            };
                        jQuery.post(ajaxurl, data, function(response) 
                        {
                            var response = response.replace(/\s+/g,' ').trim();
                            if (response == "true"){
                                Moppm_success_msg("Password policy setting is now enabled");
                            }
                            else{
                                    Moppm_error_msg("Password policy is now disabled.");
                                }
                        });
                }
            });
    </script>
  <script>  
            const moppm_Numeric_digit= "<?php echo esc_html(get_site_option('moppm_Numeric_digit',0));?>";
            const moppm_enable_disable_expiry= "<?php echo esc_html(get_site_option('moppm_enable_disable_expiry',0));?>";
            const moppm_letter= "<?php echo esc_html(get_site_option('moppm_letter',0));?>";
            const moppm_special_char= "<?php echo esc_html(get_site_option('moppm_special_char',0));?>";
            const moppm_first_reset= "<?php echo esc_html(get_site_option('moppm_first_reset',0));?>";
            const moppm_digit= "<?php echo  esc_html(get_site_option('moppm_digit'),8);?>";

            
            jQuery('#moppm_Numeric_digit').prop("checked",parseInt(moppm_Numeric_digit));   
            jQuery('#moppm_enable_disable_expiry').prop("checked",parseInt(moppm_enable_disable_expiry));   
            jQuery('#moppm_letter').prop("checked",parseInt(moppm_letter));  
            jQuery('#moppm_special_char').prop("checked",parseInt(moppm_special_char));    
            jQuery('#moppm_first_reset').prop("checked",parseInt(moppm_first_reset));  
            jQuery('#moppm_digit').val(moppm_digit);


        jQuery("#moppm_save_form").click(function()
        {
            jQuery("#moppm_save_form").attr('disabled','disabled');
            var nonce = '<?php echo wp_create_nonce("WAFsettingNonce");?>'; 
                    var data = {
                                'action'                            :  'moppm_ajax',
                                'option'                            :  'moppm_setting_enable_disable_form',
                                'moppm_save_form'                   :   'moppm_save_form',
                                'nonce'                             :   nonce,
                                'moppm_special_char'                :   jQuery("#moppm_special_char").is(':checked'),
                                'moppm_Numeric_digit'               :   jQuery("#moppm_Numeric_digit").is(':checked'),
                                'moppm_enable_disable_expiry'       :   jQuery("#moppm_enable_disable_expiry").is(':checked'),
                                'moppm_letter'                      :   jQuery("#moppm_letter").is(':checked'),
                                'moppm_first_reset'                 :   jQuery("#moppm_first_reset").is(':checked'),
                                'moppm_digit'                       :   jQuery("#moppm_digit").val(),
                                
                            };
                        jQuery.post(ajaxurl, data, function(response) 
                        {
                          console.log(response);
                            var response = response.replace(/\s+/g,' ').trim(); 
                             jQuery("#moppm_save_form").removeAttr('disabled');
                             if(response == 'Exp_Time_Invalid')
                                Moppm_error_msg('Please enter expiration time in given range');
                            else if(response == 'Digit_Invalid')
                                Moppm_error_msg('Please enter the characters of password between given range');
                            else
                                Moppm_success_msg('Your Password policy Settings are saved');
                        });
        }); 

    jQuery("#moppm_reset_pass").click(function()
        {
            jQuery("#moppm_reset_pass").attr('disabled','disabled');
            var nonce = '<?php echo wp_create_nonce("moppm_reset_nonce");?>'; 
                    var data = {
                                'action'                            :  'moppm_ajax',
                                'option'                            :  'moppm_reset_button',
                                'moppm_reset_form'                  :  'moppm_reset_form',
                                'nonce'                             :   nonce,
                            };
                        jQuery.post(ajaxurl, data, function(response) 
                        {
                            var response = response.replace(/\s+/g,' ').trim(); 
                            jQuery("#moppm_reset_pass").removeAttr('disabled');
                             if(response == 'reset_not_submit')
                                Moppm_error_msg('Please click again');
                            else if (response == 'SMTP_NOT_SET') {
                                Moppm_error_msg("Please Configure SMTP to Reset Your all user password");
                              }
                             else if (response == 'attempts_over')
                                Moppm_error_msg('Your Reset password limit is expire please upgraded to premium');
                            else
                                Moppm_success_msg('Your all user password is reset');
                        });
        }); 

        function Moppm_success_msg(success) {
          jQuery('#moppm_message').empty();
          var msg = "<div id='notice_div' class='moppm_overlay_success'><div class='popup_text'>&nbsp; &nbsp; "+success+"</div></div>";
          jQuery('#moppm_message').append(msg);
          window.onload = Moppm_nav_popup();
        }
        function Moppm_nav_popup() {
          document.getElementById("notice_div").style.width = "40%";
          document.getElementById("notice_div").style.height = "8%";
          setTimeout(function(){ jQuery('#notice_div').fadeOut('slow'); }, 3000);
        }
        function Moppm_error_msg(error) 
        {
          jQuery('#moppm_message').empty();
          var msg = "<div id='notice_div' class='moppm_overlay_error'><div class='popup_text'>&nbsp; &nbsp; "+error+"</div></div>";
          jQuery('#moppm_message').append(msg);
          window.onload = Moppm_nav_popup();
        }
</script>

