<?php

if (current_user_can('activate_plugins')) {
  esc_html_e('Wowmall is an experimental full site editing theme that requires the Gutenberg plugin. Activate the plugin to view the theme.', 'wowmall');
}
