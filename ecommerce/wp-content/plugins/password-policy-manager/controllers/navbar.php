<?php
global $moppm_utility,$moppm_dirname;
$logo_url           = plugin_dir_url(dirname(__FILE__)) . 'includes/images/miniorange_logo.png';
$active_tab         = sanitize_text_field($_GET['page']);
$configuration_url  = add_query_arg(array('page' => 'moppm'), sanitize_text_field($_SERVER['REQUEST_URI']));
$addon_url          = add_query_arg(array('page' => 'moppm_addons'),sanitize_text_field($_SERVER['REQUEST_URI']));
$report_url         = add_query_arg(array('page' => 'moppm_reports'), sanitize_text_field($_SERVER['REQUEST_URI']));
$registration_url   = add_query_arg(array('page' => 'moppm_registration_form'),sanitize_text_field($_SERVER['REQUEST_URI']));
$upgrade_url        = add_query_arg(array('page' => 'moppm_upgrade'),sanitize_text_field ($_SERVER['REQUEST_URI']));
$account_url        = add_query_arg(array('page' => 'moppm_account'),sanitize_text_field ($_SERVER['REQUEST_URI']));
$advertise_url      = add_query_arg(array('page' => 'moppm_advertise'), sanitize_text_field($_SERVER['REQUEST_URI']));
include $moppm_dirname . 'views'.DIRECTORY_SEPARATOR.'navbar.php';
?>