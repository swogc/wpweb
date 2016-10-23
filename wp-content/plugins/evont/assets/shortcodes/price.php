<?php 
	//Visual Composer
	add_shortcode('price_table_single', 'rebuild_price_table_single');
	
	function rebuild_price_table_single($atts, $content = null) { 
		extract(shortcode_atts(array(
					'title' => 'STARTER',
					'currency_type' => '$',
					'price' => '150',
					'after_dot_price' => '99',
					'text_a' => 'Conference Seats',
					'text_b' => 'Coffee Breaks',
					'text_c' => 'Lunch',
					'text_d' => 'Workshops',
					'text_e' => 'Papers',
					'price_button' => 'Register',
					'price_link' => '',
					'featuerd' => ''
				), $atts)); 
		 
		
		//initial variables
		$out=''; 
		 
		$id= '-'.rand(0,1000);
		
		
		
		$featuerd_active = '';
		
		if ($featuerd =='yes'):
			$featuerd_active ='standard-column';
		else:
			$featuerd_active ='plan-column';
		endif;
		
		//function code
		
			
		$out .='<!--plan section start here-->
				<div class="jx-evont-plan-section">';
		
		
			$out .='	              
				<div class="'.$featuerd_active.'">
					<h3>'.$title.'</h3>
					<hr>
					<div class="jx-evont-plan-price">'.$currency_type.''.$price.'<span>/day</span></div>
					<ul>
					<li>'.$text_a.'</li>
					<li>'.$text_b.'</li>
					<li>'.$text_c.'</li>
					<li>'.$text_d.'</li>
					<li>'.$text_e.'</li>
					</ul>
					<a class="btn btn-default registerBtn" href="'.$price_link.'">'.$price_button.'</a>
				</div>
			';
		
		$out .='</div>
				<!--plan section end here-->'; 
				
		
		
		//return output
		return $out;
	}
	
	
	
	add_action( 'vc_before_init', 'vc_price_table_single' );
	
	
	function vc_price_table_single() {	
		vc_map(array(
		  "name" => esc_html__( "Price Table Single", "evont" ),
		  "base" => "price_table_single",
		  "class" => "",
		  "icon" => get_template_directory_uri().'/images/icon/vc_price.png',
		  "category" => esc_html__( "Evont Shortcodes", "evont"),
		  "description" => __('Add Price Table Single','evont'),
		  "params" => array(
					 
					 
	        array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__( "Title", "evont" ),
            "param_name" => "title",
			"value" => "STARTER",
            "description" => esc_html__( "Type Title Here", "evont" )
         ),
		 
		 
	        array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__( "Currency Type", "evont" ),
            "param_name" => "currency_type",
			"value" => "$",
            "description" => esc_html__( "Type Currency Type", "evont" )
         ),
		 
		array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__( "Price", "evont" ),
            "param_name" => "price",
			"value" => "150",
            "description" => esc_html__( "Add Your Price", "evont" )
         ),
		 
		 
		array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__( "Text A", "evont" ),
            "param_name" => "text_a",
			"value" => "Conference Seats",
            "description" => esc_html__( "Add Text Here", "evont" )
         ),
		 		 
		 array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__( "Text B", "rebuild" ),
            "param_name" => "text_b",
			"value" => "Coffee Breaks",
            "description" => esc_html__( "Add Text Here", "evont" )
         ),
		 
		 array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__( "Text C", "evont" ),
            "param_name" => "text_c",
			"value" => "Lunch",
            "description" => esc_html__( "Add Text Here", "evont" )
         ),
		 
		 array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__( "Text D", "evont" ),
            "param_name" => "text_d",
			"value" => "Workshops",
            "description" => esc_html__( "Add Text Here", "evont" )
         ),
		 
		 array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__( "Text E", "evont" ),
            "param_name" => "text_e",
			"value" => "Papers",
            "description" => esc_html__( "Add Text Here", "evont" )
         ),
		 
		 array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__( "Price Button", "evont" ),
            "param_name" => "price_button",
			"value" => "Sign Now",
            "description" => esc_html__( "Add Button Text Here", "evont" )
         ),
		 
		 
		array(
			 "type" => "dropdown",
			 "class" => "",
			 "heading" => __("Select Featuerd Option",'evont'),
			 "param_name" => "featuerd",
			 "value" => array(   
					__('Select Featuerd Option', 'evont') => 'none',
					__('Yes', 'evont') => 'yes',
					__('No', 'evont') => 'no',
					),
		)
		 
					 
		  )
	   ));
    
	}
?>