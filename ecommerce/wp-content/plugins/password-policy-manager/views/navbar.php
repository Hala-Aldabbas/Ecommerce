<?php
			echo'<div class="wrap">
			<div id ="moppm_message"></div>
				<div><img  style="float:left;margin-top:5px;" src="'.esc_url($logo_url).'"></div>
				<h1>
					miniOrange Password Policy 
					
                    <a class="add-new-h2" id ="moppm_upgrade" style="font-size:14px;border-radius:4px;background-color:orange; color:white; color:black;" href="'.esc_url($upgrade_url).'">Upgrade</a>
                    <a class="add-new-h2" id ="moppm_upgrade" style="font-size:14px;border-radius:4px;background-color: #224fa2; color:white;" href="'.esc_url($account_url).'">Account</a></h1>';

                    echo '<br><br>	';
			echo '<a id="moppm_menu" class="nav-tab '.esc_html(($active_tab == 'moppm'
                   ? 'nav-tab-active' : '')).'" href="'.esc_url($configuration_url).'"><span class="dashicons dashicons-admin-generic"></span> Policy Settings</a>';
			
			echo '<a id="moppm_reports" class="nav-tab '.esc_html(($active_tab == 'moppm_reports'
                        ? 'nav-tab-active' : '')).'" href="'.esc_url($report_url).'"><span class="dashicons dashicons-media-spreadsheet"></span> Reports</a>';

			echo '<a id="moppm_registration_form" class="nav-tab '.esc_html(($active_tab == 'moppm_registration_form'
                        ? 'nav-tab-active' : '')).'" href="'.esc_url($registration_url).'"><span class="dashicons dashicons-forms"></span> Custom Forms</a>';

			echo '<a id="moppm_addons" class="nav-tab '.esc_html(($active_tab == 'moppm_addons'
                        ? 'nav-tab-active' : '')).'" href="'.esc_url($addon_url).'"><span class="dashicons dashicons-shield"></span> Premium Features</a>';


			echo '<a id="moppm_advertise" class="nav-tab '.esc_html(($active_tab == 'moppm_advertise'
						? 'nav-tab-active' : '')).'" href="'.esc_url($advertise_url).'"><span class="dashicons dashicons-plugins-checked"></span> Other Plugins <sup>2</sup></a>';