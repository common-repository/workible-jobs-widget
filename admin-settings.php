<?php

function workible_settings_page(){
	//create options page
	$page_args = array(
		'sort_order' => 'asc',
		'sort_column' => 'post_title',
		'hierarchical' => 1,
		'exclude' => '',
		'include' => '',
		'meta_key' => '',
		'meta_value' => '',
		'authors' => '',
		'child_of' => 0,
		'parent' => -1,
		'exclude_tree' => '',
		'number' => '',
		'offset' => 0,
		'post_type' => 'page',
		'post_status' => 'publish'
	); 
	$pages = get_pages($page_args); 
	
	$workible_job_search_page = array();
	$workible_job_search_page = ( get_option('workible_job_search_page') != '' || get_option('workible_job_search_page')!= NULL ? get_option('workible_job_search_page') : $workible_job_search_page ); 
	
	$workible_job_listing_page = array();
	$workible_job_listing_page = ( get_option('workible_job_listing_page') != '' || get_option('workible_job_listing_page')!= NULL ? get_option('workible_job_listing_page') : $workible_job_listing_page ); 
	
	$workible_global_loader = get_option('workible_global_loader');
	$workible_global_custom_css = get_option('workible_global_custom_css');
	
	//select box
	//wp_dropdown_pages($dropdown_pages_job_list); 
	$job_listing_page_selected = ( get_option('workible_job_listing_page') ? get_option('workible_job_listing_page') : -1 );
	$dropdown_pages_job_list = array(
		'selected' => $job_listing_page_selected,
		'name' => 'workible_job_listing_page',
		'show_option_none' => "Select",
	);
	$job_search_page_selected = ( get_option('workible_job_search_page') ? get_option('workible_job_search_page') : -1 );
	$dropdown_pages_job_search = array(
		'selected' => $job_search_page_selected,
		'name' => 'workible_job_search_page',
		'show_option_none' => "Select",
	);
	
	?>
    <div class="wrap">
    
    <?php
	
	echo "<h2>" . __( 'Workible Widget', 'workible-widget' ) . "</h2>";
	?>
    <form name="workible-form" method="post" action="options.php">
    
    <?php settings_fields( 'workible-plugin-settings-group' ); ?>
    
    <?php do_settings_sections( 'workible-plugin-settings-group' ); ?>
    
    <h4>Settings</h4>
    <p><em>Contact Workible at support@workible.com.au to obtain your affiliate ID.</em></p>
    
    <table>
    <tr>
    <td><?php _e("Affiliate Site ID:", 'affiliate-guid' ); ?></td>
    <td><input type="text" name="workible_affiliate_guid" value="<?php echo get_option('workible_affiliate_guid'); ?>" size="50"></td>
    </tr>
    
    <tr>
    <td><?php _e("Job Listing Settings ID:", 'job-listing-guid' ); ?> </td>
    <td>
    <input type="text" name="workible_job_listing_guid" value="<?php echo get_option('workible_job_listing_guid'); ?>" size="50">
    </td>
    </tr>
    
    </td></tr>
    
    <tr><td></td>
    <td>
    <span>shortcode <b>[wk-job-list]</b></span>
    </td>
    </tr>
    
    <tr>
    <td><?php _e("Job Search Settings ID:", 'job-search-guid' ); ?> </td>
    <td>
    <input type="text" name="workible_job_search_guid" value="<?php echo get_option('workible_job_search_guid'); ?>" size="50">
    </td>
    </tr>
    
    </td></tr>
    
    <tr><td></td>
    <td>
    <span>shortcode <b>[wk-job-search]</b></span>
    </td>
    </tr>
    
  	<tr><td><h4>Page Setup</h4></td><td><em>Enable workible job listing and job search to specific page.</em></td></tr>
    <tr>
    <td>Select Job Listing page <td>

    <?php foreach($pages as $page) { ?>
    <span class="wk-radio-inputs">
    <label>
    <input <?php checked( true, in_array( $page->ID, $workible_job_listing_page ) ); ?> type="checkbox" name="workible_job_listing_page[]" value="<?php echo $page->ID; ?>">
    <?php echo $page->post_title ?>
    </label>
    </span>
	<?php } ?>
  	
    </tr>
    
    <tr><td><br/></td><td></td></tr>
   
    <tr>
    <td>Select Job Search page <td>
    <?php foreach($pages as $page) { ?>
    <span class="wk-radio-inputs">
    <label>
    <input <?php checked( true, in_array( $page->ID, $workible_job_search_page ) ); ?> type="checkbox" name="workible_job_search_page[]" value="<?php echo $page->ID; ?>">
    <?php echo $page->post_title ?>
    </label>
    </span>
	<?php } ?>
    
    </tr>
    
    <tr><td><h4>Global Settings</h4><td><td></td></tr>
    
    <tr>
    <td>
	Workible Script
    </td>
    <td>
	<input class="" type="checkbox" name="workible_global_loader" value="1" <?php if ( isset($workible_global_loader )) checked('1', $workible_global_loader); ?>/> <label><em>Enable workible script to all pages</em></label> 
	</td>
    </tr>
    
    <tr><td><h4>Job Search Button Styling</h4><td><td></td></tr>
    
    <tr>
    <td>
	Color
    </td>
    <td>
	<input class="color-field" type="text" name="workible_job_search_btn_color" value="<?php echo get_option('workible_job_search_btn_color'); ?>"/><div class="clear"></div> 
	</td>
    </tr>
    
    <tr>
    <td>
	Background
    </td>
    <td>
	<input class="color-field" type="text" name="workible_job_search_btn_bgcolor" value="<?php echo get_option('workible_job_search_btn_bgcolor'); ?>"/><div class="clear"></div> 
	</td>
    </tr>
    
    <tr>
    <td>
	Border
    </td>
    <td>
	<input class="color-field" type="text" name="workible_job_search_btn_bdrcolor" value="<?php echo get_option('workible_job_search_btn_bdrcolor'); ?>"/><div class="clear"></div> 
	</td>
    </tr>
    
    <tr>
    <td>
	Hover Color
    </td>
    <td>
	<input class="color-field" type="text" name="workible_job_search_btn_hover_color" value="<?php echo get_option('workible_job_search_btn_hover_color'); ?>"/><div class="clear"></div> 
	</td>
    </tr>
    
    <tr>
    <td>
	Hover Background
    </td>
    <td>
	<input class="color-field" type="text" name="workible_job_search_btn_hover_bgcolor" value="<?php echo get_option('workible_job_search_btn_hover_bgcolor'); ?>"/><div class="clear"></div> 
	</td>
    </tr>
    
    <tr>
    <td>
	Hover Border
    </td>
    <td>
	<input class="color-field" type="text" name="workible_job_search_btn_hover_bdrcolor" value="<?php echo get_option('workible_job_search_btn_hover_bdrcolor'); ?>"/><div class="clear"></div> 
	</td>
    </tr>

    <tr><td><h4>Panel Search Box Styling</h4><td><td></td></tr>
    <tr>
    <td>
	Search Box Background Color
    </td>
    <td>
	<input class="color-field" type="text" name="workible_job_search_box_bgcolor" value="<?php echo get_option('workible_job_search_box_bgcolor'); ?>"/><div class="clear"></div> 
	</td>
    </tr>
    
    <tr>
    <td>
	Search Box Border Color
    </td>
    <td>
	<input class="color-field" type="text" name="workible_job_search_box_bdrcolor" value="<?php echo get_option('workible_job_search_box_bdrcolor'); ?>"/><div class="clear"></div> 
	</td>
    </tr>
    
    <tr>
    <td>
	Search Box Font Color
    </td>
    <td>
	<input class="color-field" type="text" name="workible_job_search_box_fontcolor" value="<?php echo get_option('workible_job_search_box_fontcolor'); ?>"/><div class="clear"></div> 
	</td>
    </tr>
    
    <tr><td><h4>Pagination Button Styling</h4><td><td></td></tr>
    <tr>
    <td>
	Color
    </td>
    <td>
	<input class="color-field" type="text" name="workible_job_pagi_btn_color" value="<?php echo get_option('workible_job_pagi_btn_color'); ?>"/><div class="clear"></div> 
	</td>
    </tr>
    
     <tr>
    <td>
	Background
    </td>
    <td>
	<input class="color-field" type="text" name="workible_job_pagi_btn_bgcolor" value="<?php echo get_option('workible_job_pagi_btn_bgcolor'); ?>"/><div class="clear"></div> 
	</td>
    </tr>
    
    <tr>
    <td>
	Border
    </td>
    <td>
	<input class="color-field" type="text" name="workible_job_pagi_btn_bdrcolor" value="<?php echo get_option('workible_job_pagi_btn_bdrcolor'); ?>"/><div class="clear"></div> 
	</td>
    </tr>
    
    <tr>
    <td>
	Hover Color
    </td>
    <td>
	<input class="color-field" type="text" name="workible_job_pagi_btn_hover_color" value="<?php echo get_option('workible_job_pagi_btn_hover_color'); ?>"/><div class="clear"></div> 
	</td>
    </tr>
    
     <tr>
    <td>
	Hover Background
    </td>
    <td>
	<input class="color-field" type="text" name="workible_job_pagi_btn_hover_bgcolor" value="<?php echo get_option('workible_job_pagi_btn_hover_bgcolor'); ?>"/><div class="clear"></div> 
	</td>
    </tr>
    
    <tr>
    <td>
	Hover Border
    </td>
    <td>
	<input class="color-field" type="text" name="workible_job_pagi_btn_hover_bdrcolor" value="<?php echo get_option('workible_job_pagi_btn_hover_bdrcolor'); ?>"/><div class="clear"></div> 
	</td>
    </tr>
    
    <tr><td><h4>Pagination Button (Active) Styling</h4><td><td></td></tr>
    
    <tr>
    <td>
	Color
    </td>
    <td>
	<input class="color-field" type="text" name="workible_job_pagi_btn_active_color" value="<?php echo get_option('workible_job_pagi_btn_active_color'); ?>"/><div class="clear"></div> 
	</td>
    </tr>
    
     <tr>
    <td>
	Background
    </td>
    <td>
	<input class="color-field" type="text" name="workible_job_pagi_btn_active_bgcolor" value="<?php echo get_option('workible_job_pagi_btn_active_bgcolor'); ?>"/><div class="clear"></div> 
	</td>
    </tr>
    
    <tr>
    <td>
	Border
    </td>
    <td>
	<input class="color-field" type="text" name="workible_job_pagi_btn_active_bdrcolor" value="<?php echo get_option('workible_job_pagi_btn_active_bdrcolor'); ?>"/><div class="clear"></div> 
	</td>
    </tr>
    
    <tr>
    <td>
	Custom CSS
    </td>
    <td>
	<textarea class="css-editor" type="checkbox" name="workible_global_custom_css" rows="15" cols="50"><?php if ( isset($workible_global_custom_css ) ) echo $workible_global_custom_css; ?></textarea>
	</td>
    </tr>
    
    <tr><td><span class="submit">
    
    <?php submit_button(); ?>
    
    </td>
    </tr>
    	
    </table>
    </form>
    </div>
    <?php
}
