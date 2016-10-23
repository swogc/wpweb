<?php 
	@ini_set( 'upload_max_size' , '32M' );
	@ini_set( 'post_max_size', '32M');

	//----------------------------------------------------------------------------
	//-----------Viusal Composer
	//----------------------------------------------------------------------------
	if(function_exists('vc_add_param')){
	
	  vc_add_param('vc_row',array(
			  "type" => "textfield",
			  "heading" => esc_html__('Section ID', 'evont'),
			  "param_name" => "el_id",
			  "value" => "",
			  "description" => esc_html__("Set ID section", 'evont'),   
		));  
		

				
		vc_add_param('vc_row',array(
			"type" => "dropdown",
			"heading" => esc_html__('Padding', 'evont'),
			"param_name" => "el_class",
			"value" => array(   
					esc_html__('Select', 'evont') => 'select',
					esc_html__('Default Padding', 'evont') => 'jx-evont-padding',  
					esc_html__('Small Padding', 'evont') => 'jx-evont-padding-small',
					esc_html__('No Padding', 'evont') => 'no-padding',
					esc_html__('Top Padding Only', 'evont') => 'jx-evont-padding no-bottom-padding',
					esc_html__('Bottom Padding Only', 'evont') => 'jx-evont-padding no-top-padding',                                                                                
					),
			"description" => esc_html__("Select Padding", 'evont'),      
		  ) 
		); 
		
		
		vc_add_param('vc_row',array(
			"type" => "dropdown",
			"heading" => esc_html__('Fullwidth', 'evont'),
			"param_name" => "fullwidth",
			"value" => array(   
					esc_html__('Select', 'evont') => 'Select',
					esc_html__('Yes', 'evont') => 'yes',  
					esc_html__('No', 'evont') => 'no',
                                                                   
					),
			"description" => esc_html__("Set container width", 'evont'),      
		  ) 
		); 
		
		
		vc_add_param('vc_row',array(
			"type" => "dropdown",
			"heading" => esc_html__('Overlayer', 'evont'),
			"param_name" => "el_class_2",
			"value" => array(   
					esc_html__('No', 'evont') => 'no',  
					esc_html__('Default', 'evont') => 'jx-evont-tint',
					esc_html__('Black', 'evont') => 'jx-evont-tint-black',
					esc_html__('Black Light', 'evont') => 'jx-evont-tint-black-light',
					esc_html__('Grey', 'evont') => 'jx-evont-tint-grey',                                                                                
					),
			"description" => esc_html__("Select Padding", 'evont'),      
		  ) 
		); 
	
	}
?>