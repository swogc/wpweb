<?php 
	/* Media Box  ---------------------------------------------*/
	
	add_shortcode('blog', 'evont_blog');
	
	function evont_blog($atts, $content = null) { 
		extract(shortcode_atts(array(
					'post_count' => ''
					
				), $atts)); 
		 
		
		//initial variables
		$out=''; 
		$image_size ='evont-small-blog';
		global $wp_embed;
		global $data;
		
		

		$out .='<!--blog section start here-->
				<div class="jx-evont-blog-section small">
							<div class="row">
				';
		
		$args = array('post_type' => 'post','orderby' => 'date', 'order' => 'DESC','showposts' => 3 ); 
		$loop = new WP_Query( $args ); 		
		while ( $loop->have_posts() ) : $loop->the_post();  
					
			$categories = get_the_category(); 
			$cat_name = $categories[0]->cat_name;
				
		//function code
		
		switch(get_post_format()) {
		case 'link':
			$format_post_class = 'link';
			break;
		case 'image':
			$format_post_class = 'photo';
			break;
		case 'quote':
			$format_post_class = 'quote-left';
			break;
		case 'video':
			$format_post_class = 'video-camera';
			break;
		case 'audio':
			$format_post_class = 'volume-up';
			break;
		case 'Aside':
			$format_post_class = 'comments';
			break;
		default:
			$format_post_class = 'file-text-o';
			break;
	}
		
			$post_image_id = get_post_thumbnail_id(get_the_id());
		  	$image_url = wp_get_attachment_image_src($post_image_id, 'large');
		  	$image_small = wp_get_attachment_image_src($post_image_id, $image_size);
			
			if($image_small[0]):
			$show_img='';
			endif;
			
			$out .='
			<div class="blog-item">
				<div class="col-sm-4">
				  
					<div class="blog-img">
						<img src="'.$image_small[0].'" alt="">
						<!-- IMAGE -->                    
	
						<div class="overlay">
							<div class="overlay-inner">
								<div class="blog-hover-icon"><a href="'.esc_url( get_permalink()).'"><i class="fa fa-plus"></i></a></div>
							</div>
						</div>
						
						<div class="jx-evont-blog-date">
							<div class="day">'.get_the_time('d').'</div>
							<div class="month">'.get_the_time('M').' '.get_the_time('Y').'</div>
						</div>
						<!-- DATE -->						
					</div>
				
					
					<h3><a href="'.esc_url(get_permalink()).'">'.get_the_title().'</a></h3>
					
					<div class="entry-meta">
						<ul>
							<li><span><i class="fa fa-user"></i>'.get_the_author().'</span></li>
							<li><span><i class="fa fa-folder-open"></i>'.$cat_name.'</span></li>
							<li><span><i class="fa fa-comment"></i>'.get_comments_number(esc_html__('0 Comments', 'evont'), esc_html__('1 Comment', 'evont'), '(%) '.esc_html__('Comments', 'evont')).'</span></li>
						</ul>
					</div>
								 
					<p>'.evont_excerpt(15).'</p>
					<div class="readmore"><a href="'.esc_url( get_permalink()).'">'.esc_html__('Read More','evont').'</a></div>
									
				</div>
			</div>';			
				 
			endwhile;
			
			//wp_reset_query(); 
		$out .='</div></div>
		<!--blog section end here-->';
		
		//return output
		return $out;
	}
	//Visual Composer
	
	
	add_action( 'vc_before_init', 'vc_blog' );
	
	
	function vc_blog() {	
		vc_map(array(
      "name" => esc_html__( "Blog", "evont" ),
      "base" => "blog",
      "class" => "",
	  "icon" => get_template_directory_uri().'/images/icon/vc_news.png',
      "category" => esc_html__( "Evont Shortcodes", "evont"),
	  "description" => __('Add Blog','evont'),
      "params" => array(
		 		 

        

		
		array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__( "Post Count", "evont" ),
            "param_name" => "post_count",
			"value" => "3",
            "description" => esc_html__( "Set post numbers", "evont" )
         )
		 
		
      )
   )); 
	}
?>