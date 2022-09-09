
jQuery(document).ready(function() 
{       
        jQuery('#moppm_new_pass1').keyup(function()
        {
            var pswd = jQuery(this).val();
            var array = [4];
            if ( pswd.length >= ajax_object.min_length) 
            {
                jQuery('#moppm_digit_entered').removeClass('moppm_invalid fa fa-times').addClass('moppm_valid fa fa-check ');
            }
            else
            {
                jQuery('#moppm_digit_entered').removeClass('moppm_valid fa fa-check').addClass('moppm_invalid fa fa-times');
            }

            if ( pswd.match(/[0-9]/) ) 
            {
                jQuery('#moppm_number').removeClass('moppm_invalid fa fa-times').addClass('moppm_valid fa fa-check');
            }
            else
            {
                jQuery('#moppm_number').removeClass('moppm_valid fa fa-check').addClass('moppm_invalid fa fa-times');
            }

            if ( pswd.match(/[A-Z]/) ) 
            {
                jQuery('#moppm_upper_letter').removeClass('moppm_invalid fa fa-times').addClass('moppm_valid fa fa-check');
            }
            else
            {
                jQuery('#moppm_upper_letter').removeClass('moppm_valid fa fa-check').addClass('moppm_invalid fa fa-times');
            }

            if ( pswd.match(/[a-z]/) ) 
            {
                jQuery('#moppm_lower_letter').removeClass('moppm_invalid fa fa-times').addClass('moppm_valid fa fa-check');
            }
            else
            {
                jQuery('#moppm_lower_letter').removeClass('moppm_valid fa fa-check').addClass('moppm_invalid fa fa-times');
            }

            if ( pswd.match(/[@#$%&*()_+{:;'/><,.}]/) ) 
            {
                jQuery('#moppm_special_symbol').removeClass('moppm_invalid fa fa-times').addClass('moppm_valid fa fa-check');
            }
            else
            {
                jQuery('#moppm_special_symbol').removeClass('moppm_valid fa fa-check').addClass('moppm_invalid fa fa-times');
            }
        });
});
function moppm_myFunction() {
  var x = document.getElementById("moppm_new_pass2");
  var y = document.getElementById("moppm_new_pass1");
  var z = document.getElementById("moppm_old_pass");

  if (x.type === "password" && y.type === "password" && z.type === "password") {
    x.type = "text";
    y.type = "text";
    z.type = "text";
  } else {
    x.type = "password"; 
    y.type = "password";
    z.type = "password";
  }
}
jQuery('#moppm_new_pass2').keypress(function (e) {

            if (e.which == 13) {//Enter key pressed     
               moppm_submit();
            }           
        });
jQuery("#moppm_save_pass").click(function(e){
   
                 moppm_submit();
                
            });
        
        function moppm_submit()
			{
				var Old_pass = jQuery("input[name ='OldPass']").val();
				var session_id = jQuery("input[name ='session_id']").val();
				var moppm_save_pass = jQuery("input[name ='moppm_new_pass2']").val();
				var nonce = jQuery("input[name ='NONCE']").val(); ;	
					 var data = {
                                'action'                            :  'moppm_login',
                                'option'                            :  'moppm_Submit_new_pass',
                                'optionValue'                       :  'moppm_save_pass',
                                'nonce'                             :   nonce,
                                'session_id'						:   jQuery("input[name='session_id']").val(),
                                'OldPass'                           :   jQuery("input[name='OldPass']").val(),
                                'Newpass'                           :   jQuery("input[name ='Newpass']").val(),
                                'Newpass2'                          :   jQuery("input[name ='Newpass2']").val()
                            };
						jQuery.post(ajax_object.ajaxurl, data, function(response) 
						{
							var response = response.replace(/\s+/g,' ').trim();
                            if(response == 'OLDPASSWORD_NOTMATCH')
                            { 
                            	Moppm_error_msg("Your old Password and Entered old Password does not match");
                            }
                            else if(response =='PASS_NOT_MATCH')
                            {
                            	Moppm_error_msg("Your Entered and ReEnter Password does not match");
                            }
                            else if(response == 'ERROR'){
                              Moppm_error_msg("An unknow error occured. please try again later!");
                            }
                            else if(response =='SESSION_TIMEOUT')
                            {  
                                Moppm_success_msg('Session Timeout'); 
                                document.location.href = ajax_object.loginUrl; 
                            }else if(response =='Login')
                            {  
                                Moppm_success_msg('Your Password is successfully changed'); 
                                document.location.href = ajax_object.redirecturl; 
                            }
                            else{
                                 Moppm_error_msg(response);                                        
                            }
			    		});
			    
			}
function Moppm_error_msg(error) 
{
	jQuery('#moppm_message').empty();
	var msg = "<div id='notice_div' class='moppm_overlay_error'><div class='popup_text'>&nbsp; &nbsp; "+error+"</div></div>";
	jQuery('#moppm_message').append(msg);
	window.onload = Moppm_nav_popup();
}
function Moppm_nav_popup() 
{
  document.getElementById("notice_div").style.width = "40%";
  document.getElementById("notice_div").style.height = "10%";
  setTimeout(function(){ jQuery('#notice_div').fadeOut('slow'); }, 3000);
}			
function Moppm_success_msg(success) 
{
jQuery('#moppm_message').empty();
var msg = "<div id='notice_div' class='moppm_overlay_success'><div class='popup_text'>&nbsp; &nbsp; "+success+"</div></div>";
jQuery('#moppm_message').append(msg);
window.onload = Moppm_nav_popup();
}

