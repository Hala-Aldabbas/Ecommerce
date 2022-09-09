<?php
$support_logo = dirname(plugin_dir_url(__FILE__)).'/includes/images/support3.png	';

echo'	
		<div class = "moppm_mo_page_divided_layout_2">
			
			<img src="'.esc_url_raw($support_logo).'">
			<h1>Support</h1>
			<p>Need any help? We are available any time, Just send us a query so we can help you.</p>
				<form name="f" method="post" action="">
					<input type="hidden" name="option" value="moppm_send_query"/>
					<input type="hidden" name="nonce" value="'.esc_html (wp_create_nonce('sendQueryNonce')).'"/>
					<table class="moppm_mo_settings_table">
						<tr><td>
							<input type="email" class="moppm_table_textbox" id="query_email" name="query_email" value="'.esc_html($email).'" placeholder="Enter your email" required />
							</td>
						</tr>
						<tr><td>
							<input type="text" class="moppm_table_textbox" name="query_phone" id="query_phone" value="'.esc_html($phone).'" placeholder="Enter your phone"/>
							</td>
						</tr>
						<tr>
							<td>
								   <textarea id="query" name="query" class="moppm_mo_settings_textarea" style="resize:vertical; width:100%;" cols="52" rows="7" onkeyup="mo_wpns_valid(this)" onblur="mo_wpns_valid(this)" onkeypress="mo_wpns_valid(this)" placeholder="Write your query here"></textarea>
							</td>
						</tr>
					</table>
					<input type="submit" name="send_query" id="send_query" value="Submit Query" style="margin-bottom:3%;" class="button button-primary"/>
				</form>
				<br/>			
		</div>';
