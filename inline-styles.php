<?php

function wk_styles_method() {
	$workible_global_custom_css = get_option('workible_global_custom_css');
	$job_listing_page_id = array();
	$job_search_page_id = array();
	
	$job_listing_page_id = ( get_option('workible_job_listing_page') != '' || get_option('workible_job_listing_page')!= NULL ? get_option('workible_job_listing_page') : $job_listing_page_id ); 
	
	$job_search_page_id = ( get_option('workible_job_search_page') != '' || get_option('workible_job_search_page')!= NULL ? get_option('workible_job_search_page') : $job_search_page_id );
	
	$job_search_page_id = array_map('intval', $job_search_page_id);
	$job_listing_page_id = array_map('intval', $job_listing_page_id);
	
	
	if( is_page( $job_listing_page_id ) || is_page( $job_search_page_id ) ){
		wp_enqueue_style(
			'wk-custom-style',
			WORKIBLEURL.'/asset/css/workible-style.css'
		);
		//job search button
        $job_search_bg_color = (get_option('workible_job_search_btn_bgcolor') ? get_option('workible_job_search_btn_bgcolor') : "#286090"); 
		$job_search_color = ( get_option('workible_job_search_btn_color') ? get_option('workible_job_search_btn_color') : "#ffffff"); 
		$job_search_bdr_color = ( get_option('workible_job_search_btn_bdrcolor') ? get_option('workible_job_search_btn_bdrcolor') : "#204d74"); 
		
		$job_search_bg_hover_color = ( get_option('workible_job_search_btn_hover_bgcolor') ? get_option('workible_job_search_btn_bgcolor') : "#eee" ); 
		$job_search_hover_color = ( get_option('workible_job_search_btn_hover_color') ? get_option('workible_job_search_btn_hover_color') : "#ffffff" ); 
		$job_search_bdr_hover_color = ( get_option('workible_job_search_btn_hover_bdrcolor') ? get_option('workible_job_search_btn_hover_bdrcolor') : "#122b40" );
		
		//search box panel
		$job_search_box_bgcolor = ( get_option('workible_job_search_box_bgcolor') ? get_option('workible_job_search_box_bgcolor') : "#fff" );
		$job_search_box_bdrcolor = ( get_option('workible_job_search_box_bdrcolor') ? get_option('workible_job_search_box_bdrcolor') : "#ddd" );
		$job_search_box_fontcolor = ( get_option('workible_job_search_box_fontcolor') ? get_option('workible_job_search_box_fontcolor') : "inherit" );
		
		//pagination button
		$job_pagi_color = ( get_option('workible_job_pagi_btn_color') ? get_option('workible_job_pagi_btn_color') : "#337ab7" ); 
		$job_pagi_bg_color = ( get_option('workible_job_pagi_btn_bgcolor') ? get_option('workible_job_pagi_btn_bgcolor') : "#fff" ); 		
		$job_pagi_bdr_color = ( get_option('workible_job_pagi_btn_bdrcolor') ? get_option('workible_job_pagi_btn_bdrcolor') : "#ddd" );
		
		$job_pagi_hover_color = ( get_option('workible_job_pagi_btn_hover_color') ? get_option('workible_job_pagi_btn_hover_color') : "#23527c" ); 
		$job_pagi_bg_hover_color = ( get_option('workible_job_pagi_btn_hover_bgcolor') ? get_option('workible_job_pagi_btn_hover_bgcolor') : "#eee" ); 		
		$job_pagi_bdr_hover_color = ( get_option('workible_job_pagi_btn_hover_bdrcolor') ? get_option('workible_job_pagi_btn_hover_bdrcolor') : "#ddd" );
		
		//pagination active button
		$job_pagi_active_color = ( get_option('workible_job_pagi_btn_active_color') ? get_option('workible_job_pagi_btn_active_color') : "#fff" ); 
		$job_pagi_bg_active_color = ( get_option('workible_job_pagi_btn_active_bgcolor') ? get_option('workible_job_pagi_btn_active_bgcolor') : "#337ab7" ); 		
		$job_pagi_bdr_active_color = ( get_option('workible_job_pagi_btn_active_bdrcolor') ? get_option('workible_job_pagi_btn_active_bdrcolor') : "#337ab7" );
		
        $custom_css = "
				wk-job-search .col-md-3 > .panel.panel-default:first-child{
					background-color: {$job_search_box_bgcolor} !important;
					border-color: {$job_search_box_bdrcolor} !important;
				}
				wk-job-search .col-md-3 > .panel-default:first-child label, wk-job-search .col-md-3 > .panel-default:first-child h3{
					color: {$job_search_box_fontcolor};
				}
				
				.pagination>.active>a, .pagination>.active>a:focus, .pagination>.active>a:hover, .pagination>.active>span, .pagination>.active>span:focus, .pagination>.active>span:hover{
					color: {$job_pagi_active_color} !important;
					background-color: {$job_pagi_bg_active_color} !important;
    				border-color: {$job_pagi_bdr_active_color} !important;
				}
				.pagination>li>a, .pagination>li>span{
					background-color: {$job_pagi_bg_color} !important;
					border-color: {$job_pagi_bdr_color} !important;
					color: {$job_pagi_color} !important;
				}
				.pagination>li>a:focus, .pagination>li>a:hover, .pagination>li>span:focus, .pagination>li>span:hover {
					background-color: {$job_pagi_bg_hover_color} !important;
					border-color: {$job_pagi_bdr_hover_color} !important;
					color: {$job_pagi_hover_color} !important;
				}
				
				.btn-primary:active, .btn-primary.active, .open > .dropdown-toggle.btn-primary{
						color: {$job_search_color} !important;
						background: {$job_search_bg_color} !important;
						border-color: {$job_pagi_bdr_hover_color} !important;
				}
				
                .btn-primary.active.focus, .btn-primary.active:focus, .btn-primary.active:hover, .btn-primary:active.focus, .btn-primary:active:focus, .btn-primary:active:hover, .open>.dropdown-toggle.btn-primary.focus, .open>.dropdown-toggle.btn-primary:focus, .open>.dropdown-toggle.btn-primary:hover {
						color: {$job_search_hover_color} !important;
						background: {$job_search_bg_hover_color} !important;
						border-color: {$job_search_bdr_hover_color} !important;
				
                }
                /* Startup jobs custom CSS */
				.wkJobList .btn-primary, wk-job-search .btn-primary, wk-registration .btn-primary, wk-session .btn-primary {
				    color: {$job_search_color} !important;
					background: {$job_search_bg_color} !important;
					border-color: {$job_search_bdr_color} !important;
				}

				.wkJobList .btn-link, wk-job-search .btn-link, wk-registration .btn-link, wk-session .btn-link {
				    color: {$job_search_bg_color} !important;
				}
                	
                ";
        wp_add_inline_style( 'wk-custom-style', $custom_css );
		wp_add_inline_style( 'wk-custom-style', $workible_global_custom_css );
	}
}