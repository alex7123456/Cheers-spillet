<?php
/**
* Plugin Name: Cheers The Game Plugin
* Plugin URI: https://achenza..dk/
* Description: This is the very first plugin I ever created.
* Version: 1.0
* Author: Alexander Achenza
* Author URI: http://achenza.dk/
**/


function cheers_function()
{
  $information = "this is a basic plugin.";
    return $information;
}
    add_shortcode('example','cheers_function');
  
function cheers_admin_menu_option()

{
add_menu_page('Header & Footer Scripts','Site Scripts','manage_options','cheers-admin-menu','cheers_scripts_page','',200);

}

add_action('admin_menu','cheers_admin_menu_option');

function cheers_scripts_page()
{


if(array_key_exists('submit_scripts_update',$_POST))
{

update_option('cheers_header_scripts',$_POST['header_scripts']);
update_option('cheers_footer_scripts',$_POST['footer_scripts']);

?>
<div id="setting-error-settings-updated" class="updated_settings_error notice is-dismissable"><strong>Settings have been saved.</strong></div>
<?php

}


  $header_scripts = get_option('cheers_header_scripts','none');
  $footer_scripts = get_option('cheers_footer_scripts','none');  

  ?>
<div class="wrap">
<h2>Update scripts on the header and footer</h2>

<form method="post" action="">

<label for="header_scripts">Header Scripts</label>
<textarea name="header_scripts" class="large-text"><?php print $header_scripts; ?></textarea>

<label for="footer_scripts">footer Scripts</label>
<textarea name="footer_scripts" class="large-text"><?php print $footer_scripts; ?></textarea>

<input type="submit" name="submit_scripts_update" class="button button-primary" value="UPDATE SCRIPTS">
</form>
</div>
  <?php
}

function cheers_display_header_scripts()
{
  $header_scripts = get_option('cheers_header_scripts','none');
  print $header_scripts;

}
add_action('wp_head','cheers_display_header_scripts');



function cheers_display_footer_scripts()
{
  $footer_scripts = get_option('cheers_footer_scripts','none');
  print $footer_scripts;

}
add_action('wp_footer','cheers_display_header_scripts');

?>