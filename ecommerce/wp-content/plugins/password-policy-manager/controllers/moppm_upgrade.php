<?php
global $moppm_dirname;
include $moppm_dirname . 'views'.DIRECTORY_SEPARATOR.'moppm_upgrade.php';
update_site_option("moppm_pricing_page_visitor",time());