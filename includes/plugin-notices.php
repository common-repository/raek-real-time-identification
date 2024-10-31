<?php

// Block If Accessed Directly
if(!defined('ABSPATH')){
	exit;
}

$raek_error = get_option('raek_error');

if(isset($raek_error) && !empty($raek_error)){
	delete_option('raek_error');
	echo '<div class="col-12">';
	echo "<div class='notice notice-error is-dismissible my-3'><p class='m-1'>$raek_error</p></div>";
	echo '</div>';
}

?>
