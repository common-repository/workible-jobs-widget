<?php

function workible_job_list_shortcode(){
	$job_list_id = get_option('workible_job_listing_guid');
	$shortcode = '<wk-job-list settings-id="'.$job_list_id.'"> </wk-job-list>';
	return $shortcode;
}
function workible_job_search_shortcode(){
	$job_search_id = get_option('workible_job_search_guid');
	$shortcode = '<wk-job-search settings-id="'.$job_search_id.'"> </wk-job-search>';
	return $shortcode;
}