<?php 
	/* Newsletter  ---------------------------------------------*/
	
	add_shortcode('newsletter', 'evont_newsletter');
	
	function evont_newsletter($atts, $content = null) { 
		extract(shortcode_atts(array(
			'type' => '',
			'title' => 'GET UPDATES.',
			'subtitle' => 'Learn More About Evont',		
			'button' => 'SUBSCRIBE'
			), $atts)); 
		 
		
		//initial variables
		$out=''; 
		
		//function code
		
		
			switch($type){ 
			case '1':

			$out  ='
				<!--/get updates start here-->
				
				<div class="jx-evont-get-updates">
				  <div class="col-md-offset-2 col-md-8">
					<div class="row">
					  <div class="col-md-12">
						<h2>'.$title.'</h2>
					  </div>
					</div>
					<div class="row">
					  <div class="col-sm-10 less_right">
						<input type="text" class="form-control" placeholder="'.esc_html__('Type Your Email','evont').'" />
					  </div>
					  <div class="col-sm-2 less_left">
						<button class="btn btn-default btn-block" type="button"> '.$button.' </button>
					  </div>
					</div>
				  </div>
				</div>
				
				<!--/get updates end here-->
			'; 
			
			break;

			case '2':

			$out  ='
				<!--/get updates start here-->
				
				<div class="jx-evont-get-updates-2">
					<div class="title">'.$title.'</div>
					<div class="subtitle">'.$subtitle.'</div>					
					<form method="post" action="" class="jx-evont-newsletter">
						<div class="search-inline-block">
						<input kl_virtual_keyboard_secure_input="on" placeholder="'.esc_html__('Email Address','evont').'" class="jx-rebuild-form-name" name="" type="search">
						</div>
						<div id="message-submit-1">
						<button type="submit"><i class="fa fa-angle-right"></i></button>
						<!-- Submit Button -->	
						</div>
					</form>
					
				</div>
				
				<!--/get updates end here-->
			'; 
			
			break;

		}
		
		//return output
		return $out;
	}
	
	
	
	
	
	//Visual Composer
	
	add_action( 'vc_before_init', 'vc_newsletter' );
	
	
	function vc_newsletter() {	
		vc_map(array(
		  "name" => esc_html__( "Newsletter", "evont" ),
		  "base" => "newsletter",
		  "class" => "",
		  "icon" => get_template_directory_uri().'/images/icon/vc_newsletter.png',
		  "category" => esc_html__( "Evont Shortcodes", "evont"),
		  "description" => __('Add Title','evont'),
		  "params" => array(
					 
			array(
				 "type" => "dropdown",
				 "class" => "",
				 "heading" => __("Select Style",'evont'),
				 "param_name" => "type",
				 "value" => array(   
					__('Select Style', 'evont') => 'none',
					__('Style A', 'evont') => '1',
					__('Style B', 'evont') => '2',
						),
			),
					
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html__( "Title", "evont" ),
				"param_name" => "title",
				"value" => "GET UPDATES",
				"description" => esc_html__( "Type Title here", "evont" )
			 ),
			 
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html__( "Subtitle", "evont" ),
				"param_name" => "subtitle",
				"value" => "Learn More About Evont",
				"description" => esc_html__( "Type SubTitle here", "evont" )
			 ),
			 
			 
			  array(
				"type" => "textarea",
				"class" => "",
				"heading" => esc_html__( "Button Text", "evont" ),
				"param_name" => "button",
				"value" => "SUBSCRIBE",
				"description" => esc_html__( "Type Button Text here", "evont" )
			 )			 
		  )
	   ));
    
	}
?>