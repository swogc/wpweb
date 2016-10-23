<?php
/**
 * File advanced field class which users WordPress media popup to upload and select files.
 */
class RWMB_Image_Upload_Field extends RWMB_Image_Advanced_Field
{
	/**
	 * Enqueue scripts and styles
	 */
	public static function admin_enqueue_scripts()
	{
		parent::admin_enqueue_scripts();
		RWMB_File_Upload_Field::admin_enqueue_scripts();
		wp_enqueue_script( 'rwmb-image-upload', evont_RWMB_JS_URL . 'image-upload.js', array( 'rwmb-file-upload', 'rwmb-image-advanced' ), evont_RWMB_VER, true );
	}

	/**
	 * Template for media item
	 */
	public static function print_templates()
	{
		parent::print_templates();
		RWMB_File_Upload_Field::print_templates();
	}
}
