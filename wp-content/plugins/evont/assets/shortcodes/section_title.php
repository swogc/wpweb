<?php 
	/* Section Title  ---------------------------------------------*/
	
	add_shortcode('section_title', 'evont_section_title');
	
	function evont_section_title($atts, $content = null) { 
		extract(shortcode_atts(array(
			'title' => 'Type Title 1',		
			'sub_title' => '',
			'color_style' => '',
			), $atts)); 
		 
		
		//initial variables
		$out=''; 
		$color_class='';
		
		if ($color_style =='light'):
		$color_class='jx-light';
		else:
		$color_class='jx-dark';
		endif;
		
		//function code
		
		
			$out  ='
				<div class="jx-evont-title-1 '.$color_class.'">				
					<div class="row text-center">
						<div class="col-md-12">
							<h1 class="common-title">[ '.$title.' ]</h1>
							<p>'.$sub_title.'</p>
						</div>
					</div>
				</div>
				<!-- Section Title -->		
			'; 
		
		//return output
		return $out;
	}
	
	
	
	
	
	//Visual Composer
	
	add_action( 'vc_before_init', 'vc_section_title' );
	
	
	function vc_section_title() {	
		vc_map(array(
		  "name" => esc_html__( "Section Title", "evont" ),
		  "base" => "section_title",
		  "class" => "",
		  "icon" => get_template_directory_uri().'/images/icon/vc_section_title.png',
		  "category" => esc_html__( "Evont Shortcodes", "evont"),
		  "description" => __('Add Title','evont'),
		  "params" => array(
					 
			
			array(
				 "type" => "dropdown",
				 "class" => "",
				 "heading" => __("Select Color Style",'evont'),
				 "param_name" => "color_style",
				 "value" => array(   
						__('Select Color', 'evont') => 'none',
						__('Light', 'evont') => 'light',
						__('Dark', 'evont') => 'dark',
						),
			),
			
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html__( "Title", "evont" ),
				"param_name" => "title",
				"value" => "Projects in Progress",
				"description" => esc_html__( "Type title here", "evont" )
			 ),
			 
			 
			  array(
				"type" => "textarea",
				"class" => "",
				"heading" => esc_html__( "Subtitle", "evont" ),
				"param_name" => "sub_title",
				"value" => "",
				"description" => esc_html__( "Type subtitle here", "evont" )
			 )			 
		  )
	   ));
    
	}
?>