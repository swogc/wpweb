<?php 
	/* Testimonials  ---------------------------------------------*/
	
	add_shortcode('testimonials', 'evont_testimonials');
	
	function evont_testimonials($atts, $content = null) { 
		extract(shortcode_atts(array(
				'post_count' => '',
				'style' => '',
				), $atts)); 
		 
		
		//initial variables
		$out=''; 
		$border='';
		

		if ($style=='light'):
		$text_style='jx-light';
		elseif($style=='dark'):
		$text_style='jx-dark';
		endif;
		
		if ($border=='yes'):
		$border='border';
		else:
		$border='';
		endif;
		
		//initial variables
		$out=''; 
		
		$out ='<div class="jx-evont-testimonials-1">';
		
		$args = array('post_type' => 'testimonials','orderby' => 'date', 'order' => 'ASC','showposts' => $post_count ); 
	
	
			$loop = new WP_Query( $args ); 		
			while ( $loop->have_posts() ) : $loop->the_post();  
			
			//function code
				
				$testimonial_jobposition = get_post_meta( get_the_ID(), 'jx_evont_testimonial_business_name', true ); 	
				
				
				
				$out .='
				<div class="col-sm-4">
					<div class="item">
						<div class="jx-evont-testimonial-details '.$border.'">
							<div class="icon"><i class="fa fa-quote-left"></i></div>
							<div class="description">'.get_the_content().'</div>
							<div class="name">'. get_the_title() .'</div>
							<div class="position">'.$testimonial_jobposition.'</div>
						</div>	
					</div>
				</div>
				';
				
				
							
				endwhile;
				
				
				$out .='</div>';
			
			
			
			wp_reset_query(); 
		
		//return output
		return $out;
	}
	
	
	
	
	
	//Visual Composer
	
	
	add_action( 'vc_before_init', 'vc_testimonials' );
	
	
	function vc_testimonials() {	
		vc_map(array(
      "name" => esc_html__( "Testimonials", "evont" ),
      "base" => "testimonials",
      "class" => "",
	  "icon" => get_template_directory_uri().'/images/icon/vc_testimonials.png',
      "category" => esc_html__( "Evont Shortcodes", "evont"),
	  "description" => __('Add Testimonials','evont'),
      "params" => array(
		
		 		 
        array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__( "Post Count", "evont" ),
            "param_name" => "post_count",
			"value" => "4",
            "description" => esc_html__( "Set post counts", "evont" )
         )
		 
		
      )
   )); 
	}
	

	
	
?>