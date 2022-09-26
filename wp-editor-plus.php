<?php
/*
Plugin Name: WP Editor+
Description: Permitir que los editores administren la apariencia.
Author: Sergio Cruz
Plugin URI: https://github.com/sergioccrr/wp-editor-plus
Version: 1.0.0
*/


register_activation_hook(__FILE__, '__editor_plus');

register_deactivation_hook(__FILE__, function() { __editor_plus(true); });


function __editor_plus($deactivation = true) {
	$caps = [
		'edit_themes',
		'switch_themes',
		'edit_theme_options',
	];

	$role = get_role('editor');

	foreach ($caps as $cap) {
		$value = !$deactivation;
		$role->add_cap($cap, $value);
	}
}
