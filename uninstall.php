<?php

// if uninstall.php is not called by WordPress, die
if (!defined('WP_UNINSTALL_PLUGIN')) {
  die;
}

delete_option('raek_api_key');
delete_option('raek_error');
delete_option('raek_activation_redirect');
delete_option('raek_cron_last_update');
delete_option('raek_plugin_activated');
delete_option('raek_plugin_activation_date');
delete_option('raek_plugin_review_prompt_dnd');
delete_option('raek_plugin_setup');
delete_option('raek_plugin_agreement');

unregister_setting('raek-plugin-settings', 'raek_api_key');
unregister_setting('raek-plugin-settings', 'raek_error');
unregister_setting('raek-plugin-settings', 'raek_activation_redirect');
unregister_setting('raek-plugin-settings', 'raek_cron_last_update');
unregister_setting('raek-plugin-settings', 'raek_plugin_activated');
unregister_setting('raek-plugin-settings', 'raek_plugin_activation_date');
unregister_setting('raek-plugin-settings', 'raek_plugin_review_prompt_dnd');
unregister_setting('raek-plugin-settings', 'raek_plugin_setup');
unregister_setting('raek-plugin-settings', 'raek_plugin_agreement');

?>
