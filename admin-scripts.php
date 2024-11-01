<?php

//color picker
function wk_admin_scripts(){
	wp_enqueue_style( 'wp-color-picker');
	//
	wp_enqueue_script( 'custom-script-handle', plugins_url( '/asset/admin/color-picker.js', __FILE__ ), array( 'wp-color-picker' ), false, true );
	
	wp_enqueue_style(
		'wk-admin-style',
		WORKIBLEURL . '/asset/admin/workible-admin.css'
	);
}