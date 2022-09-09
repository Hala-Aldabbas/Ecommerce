<?php
global $moppm_dir;	
$Back_button = admin_url().'admin.php?page=moppm';
$is_customer_registered = get_site_option( 'registration_status') == 'SUCCESS' ? true : false;	
echo '<a class="moppm_back_button" style="font-size: 16px; color: #000;" href="'.esc_html($Back_button).'"> <big> <big>&#8592; </big></big> Back To Plugin Configuration</a>';
?>
<link rel="stylesheet" href=<?php echo esc_html($moppm_dir).DIRECTORY_SEPARATOR.'includes'.DIRECTORY_SEPARATOR.'css'.DIRECTORY_SEPARATOR.'moppm_upgrade.css';?>>
  <div class="moppm_upgrade_super_div" id="moppm_pass_plans">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous"/>
    <div class="moppm_upgrade_main_div">
      <div id="pricing_tabs_mo" class="moppm_pricing_tabs_mo moppm_pricing_tabs_mo_premium">
        <div id="pricing_head" class="moppm_pricing_head_supporter">
          <center>
            <h3 class="moppm_pricing_head_moppm">Premium</h3>
          </center>
        </div>
        <div id="pricing_addons_site_based" class="moppm_pricing">
          <div id="custom_my_plan_mo">
            <div id="pricing_head" class="moppm_pricing_head_supporter_amount">
              <div class="moppm_dollar"><center><span>$</span><span id="mo2fa_pricing_adder_site_based"></span><span class="moppm_per_year">/Year</span></center></div>
            </div>
            <br><br>
            <center>
               <?php if( isset($is_customer_registered)&& $is_customer_registered ) {
              ?>
              <button class="moppm_upgrade_my_plan" 
                          onclick="moppm_upgradeform('wp_security_ppm_premium_plan','moppm_plan')">BUY</button>
          <?php }else{ ?>

             <button class="moppm_upgrade_my_plan"
                      onclick="mopmm_register_and_upgradeform('wp_security_ppm_premium_plan','moppm_plan')">BUY</button>
          <?php } 
          ?>
            </center>
          </div>
          <div id="purchase_user_limit">
            <center>
              <h3> For Single Site</h3>
              <h3 class="moppm_purchase_user_limit_mo moppm_purchase_limit_mo">Choose No. of Sites</h3>
              <select id="moppm_site_price" onchange="moppm_premium_update_site_limit()" onclick="moppm_premium_update_site_limit()" class="moppm_increase_my_limit">
                <option value="79"> 1 Sites</option>
                <option value="129">2 Sites </option>
                <option value="299">5 Sites</option>
                <option value="499">10 Sites </option>
                <option value="799">20 Sites</option>
              </select>
            </center>
          </div>
        </div>
        <div id="pricing_feature_collection_supporter" class="moppm_pricing_feature_collection_supporter">
          <div id="pricing_feature_collection" class="moppm_pricing_feature_collection">
            <ul class="moppm_ul">
              <p class="moppm_feature"><strong>Features</strong></p>
              <li class="moppm_feature_collect moppm_available_feature"><i class="fas fa-check"></i>Role Based Password Policy settings</li>
              <li class="moppm_feature_collect moppm_available_feature"><i class="fas fa-check"></i>Disallow Previously used Passwords</li>
              <li class="moppm_feature_collect moppm_available_feature"><i class="fas fa-check"></i>Role Based 1 Click Reset all password</li>
              <li class="moppm_feature_collect moppm_available_feature"><i class="fas fa-check"></i>Automatically lock inactive users</li>
              <li class="moppm_feature_collect moppm_available_feature"><i class="fas fa-check"></i>Role based Enforce Reset Password</li>
              <li class="moppm_feature_collect moppm_unavailable_feature"><i class="fas fa-times"></i>Logout Inactive Users</li>
              
              <li class="moppm_feature_collect moppm_available_feature"><i class="fas fa-check"></i>Enforce Password reset on first login</li>
               <li class="moppm_feature_collect moppm_unavailable_feature"><i class="fas fa-times"></i>Custom Redirect Url</li>
              <li class="moppm_feature_collect moppm_unavailable_feature"><i class="fas fa-times"></i>Customize Reset page/Form Template</li>
              <li class="moppm_feature_collect moppm_unavailable_feature"id="addon_site_based"><i class="fas fa-times"></i>Multi-Site Support</li>
              <li class="moppm_feature_collect moppm_available_feature"><i class="fas fa-check"></i>Generate Random Password</li>
              <li class="moppm_feature_collect moppm_available_feature"><i class="fas fa-check"></i>Unlimited users for single-site</li>
              <li class="moppm_feature_collect moppm_available_feature"><i class="fas fa-check"></i>Single-site Compatible</li>
              <li class="moppm_feature_collect moppm_available_feature"><i class="fas fa-check"></i>Language Translation Support</li>
              <li class="moppm_feature_collect moppm_available_feature"><i class="fas fa-check"></i>Priority support (24/7 response time)</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <!-- Second one -->
    <div class="moppm_upgrade_main_div">
      <div id="pricing_tabs_mo" class="moppm_pricing_tabs_mo moppm_pricing_tabs_mo_premium">
        <div id="pricing_head" class="moppm_pricing_head_supporter">
          <center>
            <h3 class="moppm_pricing_head_moppm">Enterprise</h3>
          </center>
        </div>
        <div id="pricing_addons_site_based" class="moppm_pricing">
          <div id="custom_my_plan_mo">
            <div id="pricing_head" class="moppm_pricing_head_supporter_amount">
              <div class="moppm_dollar"><center><span>$</span><span id="moppm_pricing_adder_site_based"></span><span class="moppm_per_year">/Year</span></center></div>
            </div>
            <br><br>
            <center>
               <?php if( isset($is_customer_registered)&& $is_customer_registered ) {
      ?>
              <button class="moppm_upgrade_my_plan" 
                          onclick="moppm_upgradeform('wp_security_ppm_enterprise_plan','moppm_plan')">BUY</button>
          <?php }else{ ?>
             <button class="moppm_upgrade_my_plan"
                      onclick="mopmm_register_and_upgradeform('wp_security_ppm_enterprise_plan','moppm_plan')">BUY</button>
          <?php } 
          ?>
            </center>
          </div>
          <div id="purchase_user_limit">
            <center>
              <h3>For Multisite</h3>
              <h3 class="moppm_purchase_user_limit_mo moppm_purchase_limit_mo">Choose No. of Sites</h3>
              <select id="moppm_multi_site_price" onchange="moppm_update_site_limit()" onclick="moppm_update_site_limit()" class="moppm_increase_my_limit">
                 <option value="159"> 1 Site</option>
                  <option value="259">2 Sites</option>
                  <option value="499">5 Sites</option>
                  <option value="699">10 Sites</option>
                  <option value="999">20 Sites</option>
              </select>
            </center>
          </div>
        </div>    
        <div id="pricing_feature_collection_supporter" class="moppm_pricing_feature_collection_supporter">
          <div id="pricing_feature_collection" class="moppm_pricing_feature_collection">
          <ul class="moppm_ul">
              <p class="moppm_feature"><strong>Features</strong></p>
              <li class="moppm_feature_collect moppm_available_feature"><i class="fas fa-check"></i>Role Based Password Policy settings</li>
              <li class="moppm_feature_collect moppm_available_feature"><i class="fas fa-check"></i>Disallow Previously used Passwords</li>
              <li class="moppm_feature_collect moppm_available_feature"><i class="fas fa-check"></i>Role Based 1 Click Reset all password</li>
              <li class="moppm_feature_collect moppm_available_feature"><i class="fas fa-check"></i>Automatically lock inactive users</li>
              <li class="moppm_feature_collect moppm_available_feature"><i class="fas fa-check"></i>Role based Enforce Reset Password</li>
              <li class="moppm_feature_collect moppm_available_feature"><i class="fas fa-check"></i>Logout Inactive Users</li>       
              <li class="moppm_feature_collect moppm_available_feature"><i class="fas fa-check"></i>Enforce Password reset on first login</li>
               <li class="moppm_feature_collect moppm_available_feature"><i class="fas fa-check"></i>Custom Redirect Url</li>
              <li class="moppm_feature_collect moppm_available_feature"><i class="fas fa-check"></i>Customize Reset page/Form Template</li>
              <li class="moppm_feature_collect moppm_available_feature"id="addon_site_based"><i class="fas fa-check"></i>Multi-Site Support</li>
              <li class="moppm_feature_collect moppm_available_feature"><i class="fas fa-check"></i>Generate Random Password</li>
              <li class="moppm_feature_collect moppm_available_feature"><i class="fas fa-check"></i>Unlimited users for single-site</li>
              <li class="moppm_feature_collect moppm_available_feature"><i class="fas fa-check"></i>Single-site Compatible</li>
              <li class="moppm_feature_collect moppm_available_feature"><i class="fas fa-check"></i>Language Translation Support</li>
              <li class="moppm_feature_collect moppm_available_feature"><i class="fas fa-check"></i>Priority support (24/7 response time)</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="moppm_setting_layout moppm_setting_layout1">
    <div>
      <h2><?php echo __('Steps to upgrade to the Premium Plan :');?></h2>
      <ol class="moppm_licensing_plans_ol">
        <li><?php echo __( 'Click on <b>BUY</b> button above.' ); ?></li>
        <li><?php echo __( ' You will be redirected to the miniOrange Console. Enter your miniOrange username and password, after which you will be redirected to the payment page.' ); ?></li>

        <li><?php echo __( 'Select the number of sites you wish to upgrade for, and make the payment.' ); ?></li>
        <li><?php echo __( 'After making the payment, you can find the Premium plugin to download from the <b>License</b> tab in the left navigation bar of the miniOrange Console.' ); ?></li>
        <li><?php echo __( 'Download the paid plugin from the <b>Releases and Downloads</b> tab through miniOrange Console .' ); ?></li>
        <li><?php echo __( 'Deactivate and delete the free plugin from <b>WordPress dashboard</b> and install the paid plugin downloaded.' ); ?></li>
        <li><?php echo __( 'Login to the paid plugin with the miniOrange account you used to make the payment, after this you will be able to set the password policy settings' ); ?></li>
      </ol>
    </div><hr>
    <div>
      <h2><?php echo __('Note :');?></h2>
      <ol class="moppm_licensing_plans_ol">
        <li><?php echo __( 'The plugin works with many Login page buider plugins (like Woocommerce/Ultimate member/User Registratin/Buddy press), however if you face any issues with your custom pages, contact us and we will help you with it.' ); ?></li>
        <li><?php echo __( 'The <b>license key </b>is required to activate the <b>Premium</b> Plugin. You will have to login with the miniOrange Account you used to make the purchase then enter license key to activate plugin.' ); ?></li>
      </ol>
    </div><hr><br>
    <div>
      <?php echo __( '<b class="moppm_note">Refund Policy : </b> <p style = "font-size:14px;">At miniOrange, we want to ensure you are 100% happy with your purchase. If the premium plugin you purchased is not working as advertised and you\'ve attempted to resolve any issues with our support team, which couldn\'t get resolved then we will refund the whole amount within 10 days of the purchase. </p>' ); ?>
    </div><br><hr><br>
    <div>
      <?php echo __( '<b class="moppm_note">Contact Us : </b> <p style = "font-size:14px;">If you have any doubts regarding the licensing plans, you can mail us at <a    href="mailto:info@xecurify.com"><i>info@xecurify.com</i></a>
      or submit a query using the support form. </p>' ); ?>
    </div>
    <br><br>
  </div>  

<form class="moppm_display_none_forms" id="moppm_loginform"action="<?php echo MOPPM_HOST_NAME . '/moas/login'; ?>"target="_blank" method="post">
    <input type="hidden" name="username" value="<?php echo esc_html(get_site_option( 'email')); ?>"/>
    <input type="hidden" name="redirectUrl"value="<?php echo MOPPM_HOST_NAME . '/moas/initializepayment'; ?>"/>
    <input type="hidden" name="requestOrigin" id="requestOrigin"/>
</form>   
<form class="moppm_display_none_forms" id="moppm_register_to_upgrade_form"method="post">
    <input type="hidden" name="requestOrigin" />
    <input type="hidden" name="moppm_register_to_upgrade_nonce"value="<?php echo wp_create_nonce( 'miniorange-moppm-user-reg-to-upgrade-nonce' ); ?>"/>
</form>
  <script type="text/javascript">

    var base_price_site_based =0;
    var display_my_site_based_price = parseInt(base_price_site_based)+parseInt(0)+parseInt(0)+parseInt(0);
    document.getElementById("mo2fa_pricing_adder_site_based").innerHTML = + display_my_site_based_price;
    jQuery('#moppm_site_price').click();
    function moppm_premium_update_site_limit() {
      var users = document.getElementById("moppm_site_price").value;
      var users_addion = parseInt(base_price_site_based)+parseInt(users);
      document.getElementById("mo2fa_pricing_adder_site_based").innerHTML = + users_addion;
    }
     var moppm_base_price_site_based =0;
    var moppm_display_my_site_based_price = parseInt(moppm_base_price_site_based)+parseInt(0)+parseInt(0)+parseInt(0);
    document.getElementById("moppm_pricing_adder_site_based").innerHTML = + moppm_display_my_site_based_price;
    jQuery('#moppm_multi_site_price').click();
    function moppm_update_site_limit() {
      var users = document.getElementById("moppm_multi_site_price").value;
      var users_addion = parseInt(moppm_base_price_site_based)+parseInt(users);
      console.log(users_addion);
      document.getElementById("moppm_pricing_adder_site_based").innerHTML = + users_addion;
    }
		function moppm_upgradeform(planType,planname) 
		{  
      var nonce = '<?php echo wp_create_nonce("moppm_update_plan");?>';
            jQuery('#requestOrigin').val(planType);
            jQuery('#moppm_loginform').submit();
            var data =  {
								'action'				    : 'moppm_ajax',
								'option' 				    : 'moppm_update_plan', 
								'planname'				  :  planname,
                 'nonce'            :  nonce,
								'planType'				  :  planType,
					}
					jQuery.post(ajaxurl, data, function(response) {
					});
        }

       function mopmm_register_and_upgradeform(planType,planname)
       {
          var nonce = '<?php echo wp_create_nonce("moppm_update_plan");?>';
          jQuery('#requestOrigin').val(planType);
                    jQuery('input[name="requestOrigin"]').val(planType);
                    jQuery('#moppm_register_to_upgrade_form').submit();
                var data =  {
                'action'            : 'moppm_ajax',
                'option'            : 'moppm_update_plan', 
                'planname'          :  planname,
                'nonce'            :  nonce,
                'planType'          :  planType,
          }
          jQuery.post(ajaxurl, data, function(response) {
          });

       }
    </script>
   