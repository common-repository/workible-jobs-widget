<?php

function workible_app(){
	wp_register_script('workible-app', WORKIBLEURL.'/asset/js/workible-app.js', array(), false, false);
	wp_enqueue_script('workible-app');
}

function workible_javascript_widget(){
	
	$workible_affiliate_guid = get_option('workible_affiliate_guid');
	$job_listing_page_id = array();
	$job_search_page_id = array();
	
	$job_listing_page_id = ( get_option('workible_job_listing_page') != '' || get_option('workible_job_listing_page')!= NULL ? get_option('workible_job_listing_page') : $job_listing_page_id ); 
	
	$job_search_page_id = ( get_option('workible_job_search_page') != '' || get_option('workible_job_search_page')!= NULL ? get_option('workible_job_search_page') : $job_search_page_id );
	
	$workible_global_loader = get_option('workible_global_loader');
	
	//change array string value to int
	$job_search_page_id = array_map('intval', $job_search_page_id);
	$job_listing_page_id = array_map('intval', $job_listing_page_id);
	
	if( (is_page( $job_listing_page_id ) && ($job_listing_page_id != NULL) ) || (is_page( $job_search_page_id ) && ($job_search_page_id != NULL) ) || intval($workible_global_loader) == 1){
		
		wp_register_style('workible-style', WORKIBLEURL.'/asset/css/workible-style.css' );
		wp_enqueue_style('workible-style');
		wp_register_style('open-sans', 'https://fonts.googleapis.com/css?family=Open+Sans' );
		wp_enqueue_style('open-sans');
		wp_register_style('Bootstrap', WORKIBLEURL."/asset/css/custom-bootstrap.css");
		wp_enqueue_style('Bootstrap');
		
	}
	
	if( (is_page( $job_listing_page_id ) && ($job_listing_page_id != NULL) ) || (is_page( $job_search_page_id ) && ($job_search_page_id != NULL) ) || intval($workible_global_loader) == 1){
		
		wp_register_script('wk-loader', "https://www.workible.com.au/widget/loader.js?id=".$workible_affiliate_guid, array(), false, false );
		wp_enqueue_script('wk-loader');
	
	}	
}
