<div id="main_class" >
<div id="moppm_report" class="moppm_main_table">
				<table style="width:100%">
                    <tbody>
                    <tr style="text-align:right">
                        <td  class="moppm_enable_disable_report"> <label>Enable Report Entry</label>  
                        <label class="moppm_switch" style="float:right; margin-left:20px;margin-right:-20px">
                            <input type="checkbox"  id="moppm_enable_disable_report"
                            name="moppm_enable_disable_report">    
                        <span class="moppm_switch_slider moppm_switch_round" ></span>
                        </label></td>
                    </tr>
                        <tr class="moppm-header">
                            <td class="moppm_1click_text1">Users Login Report</td>
                            <td><input type="button" value="Clear All"  id="moppm_clear_all" class="button button-primary"></td>
                        </tr>
                    </tbody>
    			</table>
				
				<table id="moppm_customers" class="display">
                    <thead><tr><th>User ID&emsp;&emsp;</th><th>User Email&emsp;&emsp;</th><th>Last Log in Time&emsp;&emsp;</th><th>Last password change&emsp;&emsp;</th><th>Action&emsp;&emsp;</th></tr></thead>
                    <tbody>
                        <?php
                            global $wpdb;
                            global $moppm_db_queries;
                            $result =  $moppm_db_queries->get_Report_list();
                            global $results;
                            $disabled ='';
                            foreach($result as $results)
                                {		
                                    echo "<tr class='moppm_not_bold' id =".esc_html($results->id)."><td>".esc_html($results->id)."</td><td>".esc_html($results->user_email)."</td><td>".esc_html($results->Login_time)."</td><td>".esc_html($results->input)."</td><td>  <a style='cursor:pointer' onclick=removefromlist(".esc_html($results->id).")>Remove</a></td></tr>";
                                } 
                        ?>
                    </tbody>
                </table>
                <script type="text/javascript">
                    jQuery("#moppm_customers").DataTable({
                    "order": [[ 3, "desc" ]]
                    });
                </script>
			</div>	
	</div><br><br>
    <hr style="border:2px solid #dcdcde;background-color:#dcdcde;margin:0 -27px 0 -27px"/>
    <br>
	<div id="moppm_inactive_user" class="moppm_inactive">
                <table style="width:100%">
                <tbody>
                <tr class="moppm-header">
                <td class="moppm_1click_text1">Inactive Users Report <?php echo '  <a href="'.esc_url_raw($upgrade_url).'" style="color: red;font-size:14px;">'; ?>[ UPGRADE ]</a></td>
                <td ><input type="button" value="Remove All"  id="moppm_clear_all_inactive" class="button button-primary"></td>
                </tr>
                </tbody>
                </table>
                <span class="moppm_premium_instruction" id="moppm_report_error"></span>
                
                <table id="moppm_inactive_customer" class="display">
                <thead><tr><th>User ID&emsp;&emsp;</th><th>User Email&emsp;&emsp;</th><th>Status&emsp;&emsp;</th><th>Action&emsp;&emsp;</th></tr></thead>
                <tbody>
               <?php
                $meta_key = 'moppm_inactive_user_is_block';
                $users = get_users();
                if (!empty($users)) {
                    foreach ($users as $user)
                    {  
                       if (get_user_meta($user->ID,$meta_key)) {
                         echo "<tr class='moppm_not_bold' id =".esc_html($user->ID)."><td>".esc_html($user->ID)."</td><td>".esc_html($user->user_email)."</td><td>Locked</td><td>  <a onclick=removefrominactivelist(".esc_html($user->ID).")>Remove</a></td></tr>";
                      }      
                    } 
                }
                ?>
                </tbody>
                </table>
                <script type="text/javascript">
                        jQuery("#moppm_inactive_customer").DataTable({
                        "order": [[ 3, "desc" ]]
                        });
                    </script>
            </div>  
<script type="text/javascript">

	 jQuery("#moppm_clear_all_inactive").click(function(e){   
  document.getElementById("moppm_report_error").innerHTML = "This feature is available in paid plugin";
     return ;
  });
function removefromlist(id){
	var nonce = '<?php echo esc_html (wp_create_nonce("moppm_remove_Nonce"));?>';
	
	user_value = id;
	
	if(user_value != '')
	{
		var data = {
		'action'					: 'moppm_ajax',
		'option' 					: 'moppm_report_remove', 
		'user_value'				:  user_value,
		'nonce'						:  nonce
		};
		jQuery.post(ajaxurl, data, function(response) {
				var response = response.replace(/\s+/g,' ').trim();
				if(response == 'UNKNOWN_ERROR')
				{
            Moppm_error_msg(" Unknow Error occured while removing the user.");
				}
				else
				{
              Moppm_success_msg("User detail is removed from list successfully.");
      
             jQuery('#'+id).hide();      
        }
		});
					
	}
}
jQuery("#moppm_clear_all").click(function()
        {
            var nonce = '<?php echo esc_html (wp_create_nonce("moppm_clear_nonce"));?>'; 
                    var data = {
                                'action'                            :  'moppm_ajax',
                                'option'                            :  'moppm_clear_button',
                                'nonce'                             :   nonce
                            };
                        jQuery.post(ajaxurl, data, function(response) 
                        {
                            var response = response.replace(/\s+/g,' ').trim(); 
                             if(response == 'ERROR')
                                Moppm_error_msg('Please click again');
                            else
                            	Moppm_success_msg('Your report list is clear');
                                
                        });
        }); 
function moppmrefreshListTable(html)
{
	 jQuery('#moppm_customers').html(html);
}
function Moppm_success_msg(success) {
	jQuery('#moppm_message').empty();
	var msg = "<div id='notice_div' class='moppm_overlay_success'><div class='popup_text'>&nbsp; &nbsp; "+success+"</div></div>";
	jQuery('#moppm_message').append(msg);
	window.onload = Moppm_nav_popup();
}
function Moppm_error_msg(error) 
{
    jQuery('#moppm_message').empty();
    var msg = "<div id='notice_div' class='moppm_overlay_error'><div class='popup_text'>&nbsp; &nbsp; "+error+"</div></div>";
    jQuery('#moppm_message').append(msg);
    window.onload = Moppm_nav_popup();
}
</script>
<script>
  
              var moppm_enable_disable_report = "<?php echo esc_html (get_site_option('moppm_enable_disable_report'));?>";
             if(moppm_enable_disable_report == 'on')
                {
                    jQuery('#moppm_enable_disable_report').prop("checked",true);   
                }
                else
                {
                    jQuery('#moppm_enable_disable_report').prop("checked",false);
                }
  jQuery("#moppm_enable_disable_report").click(function()
  {
    var moppm_enable_disable_report = jQuery("input[name='moppm_enable_disable_report']:checked").val();

    var nonce = '<?php echo esc_html (wp_create_nonce("moppm_enable_disable_report"));?>'; 
                    var data = {
                                'action'                            :  'moppm_ajax',
                                'option'                            :  'moppm_enable_disable_report',
                                'moppm_enable_disable_report'       :  moppm_enable_disable_report,
                                'nonce'                             :   nonce
                            };
                             jQuery.post(ajaxurl, data, function(response) 
                        {
                            var response = response.replace(/\s+/g,' ').trim();
                            if (response == "true"){
                                Moppm_success_msg("Your Report Log is now enabled");
                            }
                            else{
                                    Moppm_error_msg("Your Report Log is now disabled.");
                                }
                        });
  });
</script>