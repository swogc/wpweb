<?php
/**
 * Registering meta boxes
 *
 * All the definitions of meta boxes are listed below with comments.
 * Please read them CAREFULLY.
 *
 * You also should read the changelog to know what has been changed before updating.
 *
 * For more information, please visit:
 * @link http://www.deluxeblogtips.com/meta-box/docs/define-meta-boxes
 */
/********************* META BOX DEFINITIONS ***********************/
add_action( 'admin_init', 'rw_register_meta_boxes' );
function rw_register_meta_boxes()
{
	
	global $meta_boxes;
	
	global $wpdb;
	$prefix = 'jx_evont_';
	$meta_boxes = array();		
	
	$evont_data =  evont_globals();
	
	// REVSLIDER ARRAY
	$revolutionslider = array();
	$layersliders_array = array();
	
	if(class_exists('RevSlider')){
		$revolutionslider[0] = 'Select a Slider';
	    $slider = new RevSlider();
		$arrSliders = $slider->getArrSliders();
		
		foreach($arrSliders as $revSlider) { 
			$revolutionslider[$revSlider->getAlias()] = $revSlider->getTitle();
		}
	}
	else{
		$revolutionslider[0] = 'You have to install RevolutionSlider Plugin';
	}
				
	
	/* ----------------------------------------------------- */
	// Post Settings
	/* ----------------------------------------------------- */
	
	$meta_boxes[] = array(
		'id' => 'pagesettings',
		'title' => 'Page Options',
		'pages' => array( 'post' ),
		'context' => 'normal',
		'priority' => 'high',
	
		// List of meta fields
		'fields' => array(
		
		// HEADING of Post Option 
			array(
			'type' => 'heading',
			'name' => '<h2>'.esc_html__( 'Post Options', 'evont' ).'</h2>',
			'id' => 'heading_004', // Not used but needed for plugin
			),
			array(
						'name'		=> 'Video Embed Code',
						'id'   => $prefix."video_code",
						'type' => 'text',
						'desc'	=> 'Paste your video or audio link (<strong>E.g. http://www.youtube.com/watch?v=HUTXbBx765</strong>) to play.',
					
			)
			
			
		)
	);
	
	/* ----------------------------------------------------- */
	// Page Settings
	/* ----------------------------------------------------- */
	
	$meta_boxes[] = array(
		'id' => 'pagesettings',
		'title' => 'Page Options',
		'pages' => array( 'page' ),
		'context' => 'normal',
		'priority' => 'high',
	
		// List of meta fields
		'fields' => array(
		
			// Title Bar Heading
			array(
			'type' => 'heading',
			'name' => '<h2>'.esc_html__( 'Title Bar Options', 'evont' ).'</h2>',
			'id' => 'heading_001', // Not used but needed for plugin
			),

			array(
					'name'		=> 'Title Bar',
					'id'		=> $prefix."title_bar",
					'type'		=> 'select',
					'options'	=> array(
						'no-titlebar'			=> 'Select Title Bar',
						'titlebar'			=> 'Title Bar',
						'revolutionslider'	=> 'Revolution Slider',
						'count-down'		=> 'Count Down',
						'count-down-2'		=> 'Count Days',
						'register-form'		=> 'Registration Form',
					
					),
					'desc'		=> 'Set Title Bar style.',
					'multiple'	=> false,
					'std'		=> array( 'title' )
			),
			
						
			
			array(
				'name'		=> 'Show Breadcrumbs?',
				'id'		=> $prefix."breadcrumbs",
				'type'		=> 'checkbox',
				'desc'		=> 'Show / Hide Breadcrumbs.',
				'std'		=> true
			),
			
			
			array(
				'name'		=> 'Tint Background',
				'id'		=> $prefix."tint",
				'type'		=> 'checkbox',
				'desc'		=> 'Show / Hide Tint Overlay Color.',
				'std'		=> true
			),
			
			array(
			'type' => 'heading',
			'name' => '<h2>'.esc_html__( 'Revolution Slider Title Bar', 'evont' ).'</h2>',
			'id' => 'heading_001', // Not used but needed for plugin
			),
			
			array(
				'name'		=> 'Revolution Slider',
				'id'		=> $prefix . "revolutionslider",
				'type'		=> 'select',
				'options'	=> $revolutionslider,
				'multiple'	=> false
			),
			
						
			array(
			'type' => 'heading',
			'name' => '<h2>'.esc_html__( 'Video', 'evont' ).'</h2>',
			'id' => 'heading_001', // Not used but needed for plugin
			),
			
			array(
				'name'		=> 'Paste Video Link',
				'id'		=> $prefix . 'video_link',
				'clone'		=> false,
				'type'		=> 'text',
				'std'		=>'',
				'desc'		=> 'http://www.youtube.com/?v=ew4342rq21'
			),
			
			
			array(
			'type' => 'heading',
			'name' => '<h2>'.esc_html__( 'Select Sidebar', 'evont' ).'</h2>',
			'id' => 'heading_001', // Not used but needed for plugin
			),
			
			
			array(
					'name'		=> 'Sidebar',
					'id'		=> $prefix."sidebar",
					'type'		=> 'select',
					'options'	=> array(
						'default'			=> 'Default',
						'no-sidebar'		=> 'No Sidebar',
						'left-sidebar'		=> 'Left Sidebar',
						'right-sidebar'		=> 'Right Sidebar'						
					),
					'desc'		=> 'Set sidebar side.',
					'multiple'	=> false,
					'std'		=> array( 'title' )
			),	
			
			array(
			'type' => 'heading',
			'name' => '<h2>'.esc_html__( 'Background Image', 'evont' ).'</h2>',
			'id' => 'heading_001', // Not used but needed for plugin
			),
			
			
			
			array(
				'name'		=> 'Background Image',
				'id'		=> "{$prefix}bg_image",
				'type'      => 'image_advanced',
				'desc'		=> 'Select Background Image.',
				'max_file_uploads' => 1,
					
			),
			
			array(
						'name'		=> 'Background Image Position',
						'id'		=> "{$prefix}bg_image_pos",
						'type'		=> 'select',
						'options'	=> array(
							'top'							=> 'Top',
							'center'							=> 'Center',
							'bottom'						=> 'Bottom'
						),
						'desc'		=> 'Set background image position.',
						'std'		=> true
			),
			
			array(
				'name'		=> 'Full Height',
				'id'		=> $prefix."full_height",
				'type'		=> 'checkbox',
				'desc'		=> 'Set Full Height.',
				'std'		=> true
			),
			
			
					
		)
	);
	
	
	
	
	
	
	/* ----------------------------------------------------- */
	// Testimonial Info Metabox
	/* ----------------------------------------------------- */
	$meta_boxes[] = array(
		'id' => 'testimonial_info',
		'title' => 'Testimonials',
		'pages' => array( 'testimonials' ),
		'context' => 'normal',
		
		
	
		'fields' => array(
			array(
				'type' => 'heading',
				'name' => '<h2>'.esc_html__( 'Testimonials Details', 'evont' ).'</h2>',
				'id' => 'heading_002', // Not used but needed for plugin
			),
					
			array(
				'name'		=> 'Business / Site Name',
				'id'		=> $prefix . 'testimonial_business_name',
				'type'		=> 'text',
				'std'		=> ''
			),
			array(
				'name'		=> 'link',
				'id'		=> $prefix . 'testimonial_link',
				'clone'		=> false,
				'type'		=> 'text',
				'std'		=> ''
			),
			// HEADING of Page Options 
			array(
				'type' => 'heading',
				'name' => '<h2>'.esc_html__( 'Sidebar Options', 'evont' ).'</h2>',
				'id' => 'heading_002', // Not used but needed for plugin
			),
			array(
				'name'		=> 'SideBar',
				'id'		=> $prefix."sidebar",
				'type'		=> 'select',
				'options'	=> array(
					'default'					=> 'Default',
					'nosidebar'					=> 'No Sidebar - Full Width',
					'leftsidebar'				=> 'Left Sidebar',
					'rightsidebar'				=> 'Right Sidebar',
				),
				'multiple'	=> false,
				'desc'		=> 'Select sidebar position Left or Right or Full width page.',
				'std'		=> array( 'title' )
			),
			
			
		)
	);

	/* ----------------------------------------------------- */
	// Participants
	/* ----------------------------------------------------- */
	
	$meta_boxes[] = array(
		'id' => 'pagesettings',
		'title' => 'Page Options',
		'pages' => array( 'participants' ),
		'context' => 'normal',
		'priority' => 'high',
	
		// List of meta fields
		'fields' => array(		
			
			
			array(
				'name'		=> 'Email Address',
				'id'		=> $prefix . 'reg_email',
				'clone'		=> false,
				'type'		=> 'text',
				'std'		=> '',
				'desc'		=> ''
			),
			
			array(
				'name'		=> 'Phone',
				'id'		=> $prefix . 'reg_phone',
				'clone'		=> false,
				'type'		=> 'text',
				'std'		=> '',
				'desc'		=> ''
			),
			
			array(
				'name'		=> 'Ticket Type',
				'id'		=> $prefix . 'reg_ticket',
				'clone'		=> false,
				'type'		=> 'text',
				'std'		=> '',
				'desc'		=> ''
			),
			
			array(
				'name'		=> 'Amount',
				'id'		=> $prefix . 'reg_amount',
				'clone'		=> false,
				'type'		=> 'text',
				'std'		=> '',
				'desc'		=> ''
			),
			
			array(
				'name'		=> 'Payment',
				'id'		=> $prefix . 'reg_payment',
				'clone'		=> false,
				'type'		=> 'text',
				'std'		=> '',
				'desc'		=> ''
			)					
		)
	);	
	
	
	
	/* ----------------------------------------------------- */
	// Partners Logo
	/* ----------------------------------------------------- */
	
	$meta_boxes[] = array(
		'id' => 'pagesettings',
		'title' => 'Page Options',
		'pages' => array( 'partners' ),
		'context' => 'normal',
		'priority' => 'high',
	
		// List of meta fields
		'fields' => array(		
			
			
			array(
				'name'		=> 'Link',
				'id'		=> $prefix . 'partner_link',
				'clone'		=> false,
				'type'		=> 'text',
				'std'		=> '',
				'desc'		=> ''
			),
			
			array(
				'name'		=> 'Partner Logo',
				'id'		=> "{$prefix}partner_logo",
				'type'      => 'image_advanced',
				'desc'		=> 'Upload Partner Logo.',
				'max_file_uploads' => 1,
					
			)	
						
		)
	);
	
	
	/* ----------------------------------------------------- */
	// Speakers Info Metabox
	/* ----------------------------------------------------- */
	$meta_boxes[] = array(
		'id' => 'speaker_info',
		'title' => 'Add Speaker Information',
		'pages' => array( 'speakers' ),
		'context' => 'normal',
		
		
	
		'fields' => array(
			
			array(
				'name'		=> 'Job Position',
				'id'		=> $prefix . 'speaker_position',
				'type'		=> 'text',
				'desc'			=> 'What is you job title?'
			),
			array(
				'name'		=> 'Facebook',
				'id'		=> $prefix . 'speaker_fb',
				'clone'		=> false,
				'type'		=> 'text',
				'desc'			=> 'Type your facebook id'
			),
			array(
				'name'		=> 'Twitter',
				'id'		=> $prefix . 'speaker_twitter',
				'clone'		=> false,
				'type'		=> 'text',
				'desc'			=> 'Type your Twitter id'
			),
			array(
				'name'		=> 'Linkedin',
				'id'		=> $prefix . 'speaker_linkedin',
				'clone'		=> false,
				'type'		=> 'text',
				'desc'			=> 'Type your Linkedin id'
			),
			array(
				'name'		=> 'Google+',
				'id'		=> $prefix . 'speaker_googleplus',
				'clone'		=> false,
				'type'		=> 'text',
				'desc'			=> 'Type your Google+ id'
			),
			
			
			//Skills
			
			array(
				'name'		=> 'Skill#1 Label',
				'id'		=> $prefix . 'speaker_skilllabel_1',
				'clone'		=> false,
				'type'		=> 'text',
				'desc'			=> 'Type first skill label'
			),
			
			array(
				'name'		=> 'Skill#1 Percentage',
				'id'		=> $prefix . 'speaker_skillpercentage_1',
				'clone'		=> false,
				'type'		=> 'text',
				'desc'			=> 'Type first skill value in (%) e.g.:70'
			),
			
			array(
				'name'		=> 'Skill#2 Label',
				'id'		=> $prefix . 'speaker_skilllabel_2',
				'clone'		=> false,
				'type'		=> 'text',
				'desc'			=> 'Type first skill label'
			),
			
			array(
				'name'		=> 'Skill#2 Percentage',
				'id'		=> $prefix . 'speaker_skillpercentage_2',
				'clone'		=> false,
				'type'		=> 'text',
				'desc'			=> 'Type first skill value in (%) e.g.:70'
			),
			
			array(
				'name'		=> 'Skill#3 Label',
				'id'		=> $prefix . 'speaker_skilllabel_3',
				'clone'		=> false,
				'type'		=> 'text',
				'desc'			=> 'Type first skill label'
			),
			
			array(
				'name'		=> 'Skill#3 Percentage',
				'id'		=> $prefix . 'speaker_skillpercentage_3',
				'clone'		=> false,
				'type'		=> 'text',
				'desc'			=> 'Type first skill value in (%) e.g.:70'
			),
			
			array(
				'name'		=> 'Skill#4 Label',
				'id'		=> $prefix . 'speaker_skilllabel_4',
				'clone'		=> false,
				'type'		=> 'text',
				'desc'			=> 'Type first skill label'
			),
			
			array(
				'name'		=> 'Skill#4 Percentage',
				'id'		=> $prefix . 'speaker_skillpercentage_4',
				'clone'		=> false,
				'type'		=> 'text',
				'desc'			=> 'Type first skill value in (%) e.g.:70'
			),
		
		)
	);
	
	
	
	/* ----------------------------------------------------- */
	// Team Info Metabox
	/* ----------------------------------------------------- */
	$meta_boxes[] = array(
		'id' => 'team_info',
		'title' => 'Add Team Information',
		'pages' => array( 'team' ),
		'context' => 'normal',
		
		
	
		'fields' => array(
			
			array(
				'name'		=> 'Job Position',
				'id'		=> $prefix . 'job_position',
				'type'		=> 'text',
				'desc'			=> 'What is you job title?'
			),

			array(
				'name'		=> 'Facebook',
				'id'		=> $prefix . 'team_fb',
				'clone'		=> false,
				'type'		=> 'text',
				'desc'			=> 'Type your facebook id'
			),
			array(
				'name'		=> 'Twitter',
				'id'		=> $prefix . 'team_twitter',
				'clone'		=> false,
				'type'		=> 'text',
				'desc'			=> 'Type your Twitter id'
			),
			array(
				'name'		=> 'Linkedin',
				'id'		=> $prefix . 'team_linkedin',
				'clone'		=> false,
				'type'		=> 'text',
				'desc'			=> 'Type your Linkedin id'
			)
		
		)
	);
	
	
	/* ----------------------------------------------------- */
	// Agenda Info Metabox
	/* ----------------------------------------------------- */
	$meta_boxes[] = array(
		'id' => 'agenda_info',
		'title' => 'Add Agenda Information',
		'pages' => array( 'agenda' ),
		'context' => 'normal',
		
		
	
		'fields' => array(
			
			array(
				'name'		=> 'Session Title',
				'id'		=> $prefix . 'session_title',
				'type'		=> 'text',
				'desc'			=> 'Session Title'
			),
			
			array(
				'name'		=> 'Session Time',
				'id'		=> $prefix . 'session_time',
				'type'		=> 'text',
				'desc'			=> 'Session Time'
			),
			
			array(
				'name'		=> 'Session Icon',
				'id'		=> $prefix . 'session_icon',
				'type'		=> 'text',
				'desc'			=> 'Session Icon eg: fa-desktop'
			)
			
			
			
					
		)
	);
	
	
	
	foreach ( $meta_boxes as $meta_box ) {
		new RW_Meta_Box( $meta_box );
	}
}
	
