<div class="wrap about-wrap full-width-layout">
	<em>
		<?php esc_html_e('These instructions were written for Gutenberg 11.6 if you are using a different version, the UI might look different.', 'wowmall'); ?>
	</em>

	<div class="feature-section">
		<h3><?php esc_html_e('How to open Gutenberg editor?', 'wowmall'); ?></h3>
		<p>
			<?php esc_html_e('Currently, there are two ways to access the Gutenberg editor, the site editor and the template editor.', 'wowmall'); ?>
		</p>
		<ol>
			<li>
				<b>
					<?php esc_html_e('Site Editor', 'wowmall'); ?>
				</b>
				<p>
					<?php esc_html_e('You can access the site editor through the WordPress admin area:', 'wowmall'); ?>
				</p>
				<p>
					<img src="<?php echo esc_url(WOWMALL_THEME_URL . '/assets/images/site-editor-menu.jpg'); ?>" alt="<?php esc_attr_e('The site editor menu is above the Appearance menu in the WordPress admin.', 'wowmall'); ?>">
				</p>
			</li>
			<li>
				<b>
					<?php esc_html_e('Template Editor', 'wowmall'); ?>
				</b>
				<p>
					<?php esc_html_e('In the block editor, the template edit link is found in the post/page settings sidebar under Status and Visibility:', 'wowmall'); ?>
				</p>
				<p>
					<img src="<?php echo esc_url(WOWMALL_THEME_URL . '/assets/images/page-template-editor.jpg'); ?>" alt="<?php esc_attr_e('The select field where you can select the template for the current page.', 'wowmall'); ?>">
				</p>
			</li>
		</ol>
	</div>
	<div class="feature-section">
		<h3><?php esc_html_e('How to edit header and footer?', 'wowmall'); ?></h3>
		<p>
			<?php esc_html_e('The header and footer can be edited in either the site editor or the block editor.', 'wowmall'); ?>
		</p>
		<p>
			<b><?php esc_html_e('If you are not already familiar with the site editor, then the second option may be easier.', 'wowmall'); ?></b>
		</p>
		<ol>
			<li>
				<b>
					<?php esc_html_e('First, open the editor that you prefer:', 'wowmall'); ?>
				</b>
			</li>
			<li>
				<b>
					<?php esc_html_e('Next, open the list view feature.', 'wowmall'); ?>
				</b>
				<p>
					<?php esc_html_e('The list view can be opened from the top toolbar. It looks a little bit different depending on which editor you selected.', 'wowmall'); ?>
				</p>
				<p>
					<?php esc_html_e('It is a list of all the blocks on the page. If you want to change the header, click on the item in the list that says "Header":', 'wowmall'); ?>
				</p>
				<p>
					<img src="<?php echo esc_url(WOWMALL_THEME_URL . '/assets/images/page-template-part-header.jpg'); ?>" alt="<?php esc_attr_e('The template part header selected.', 'wowmall'); ?>">
				</p>
				<p>
					<?php esc_html_e('You can see all the blocks used to create the header, for example, the first column has a site title. The second column has a navigation, and the third column has a search form. ', 'wowmall'); ?>
				</p>
				<p>
					<?php esc_html_e('To change the black background, you can select the group, and change the color in the block settings sidebar.', 'wowmall'); ?>
				</p>
				<p>
					<?php esc_html_e('This is only one example of changes that you can make. Remember to save your changes.', 'wowmall'); ?>
				</p>				
			</li>
		</ol>
	</div>
	<div class="feature-section">
		<h3><?php esc_html_e('How to edit content of the sidebar?', 'wowmall'); ?></h3>
		<p>
			<?php esc_html_e('The sidebar is inside a template part. Like the header and footer can be edited in either the site editor or the block editor.', 'wowmall'); ?>
		</p>
		<ol>
			<li>
				<b><?php esc_html_e('First, open the editor that you prefer.', 'wowmall'); ?></b>
			</li>
			<li>
				<p>
					<b><?php esc_html_e('Choose the Page template and click edit.', 'wowmall'); ?></b>
				</p>
				<p>
					<?php esc_html_e('Select the Sidebar template part.', 'wowmall'); ?>
				</p>
				<p>
					<?php esc_html_e('Edit, remove and add any blocks that you want.', 'wowmall'); ?>
				</p>
				<p>
					<?php esc_html_e('When you save, make sure that the template part sidebar is selected. Once the sidebar has been saved, the changes will be reflected across the website.', 'wowmall'); ?>
				</p>
				<p>
					<img src="<?php echo esc_url(WOWMALL_THEME_URL . '/assets/images/page-template-part-sidebar.jpg'); ?>" alt="<?php esc_attr_e('The sidebar template part selected.', 'wowmall'); ?>">
				</p>
			</li>
		</ol>
	</div>
	<div class="feature-section">
		<h3><?php esc_html_e('How to use a premade templates?', 'wowmall'); ?></h3>
		<?php esc_html_e('Wowmall comes with a set of predefined layouts for the most common sections of every site: About Us, Contact Us, Faq and Services.', 'wowmall'); ?>
		<p>
			<?php esc_html_e('By default these templates are assigned to the pages with the url that matches their names: about-us, contact-us, faq and services.', 'wowmall'); ?>
		</p>
		<p>
			<?php esc_html_e('If you want to change assigning any of these templates to another page, you can follow these instructions.', 'wowmall'); ?>
		</p>
		<ol>
			<li>
				<b>
					<?php esc_html_e('First, create a new page and open the block editor.', 'wowmall'); ?>
				</b>
				<p>
					<?php esc_html_e('In the block editor, under Status and Visibility section you will find a selector with all the templates available on the site.', 'wowmall'); ?>
				</p>
			</li>
			<li>
				<b>
					<?php esc_html_e('Next, open the list of templates by clicking the selector.', 'wowmall'); ?>
				</b>
				<p>
					<?php esc_html_e('Select the desired template an save changes.', 'wowmall'); ?>
				</p>
			</li>
		</ol>
	</div>
	<div class="welcome-panel">
		<div class="welcome-panel-content">
			<h3><?php esc_html_e('Required Plugin', 'wowmall'); ?></h3>
			<?php esc_html_e('Please install and activate Gutenberg version 11.6 or newer.', 'wowmall'); ?>
			<br/>
			<a class="button button-primary button-hero" target="_blank" href="<?php echo esc_url('https://wordpress.org/plugins/gutenberg/'); ?>"><?php esc_html_e('Gutenberg', 'wowmall'); ?></a>
			<br/>
			<br/>
		</div>
	</div>
</div>