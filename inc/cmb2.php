<?php


function philosophy_add_metabox()
{

	$post_id = null;
	if (isset($_REQUEST['post']) || isset($_REQUEST['post_ID'])) {
		$post_id = empty($_REQUEST['post_ID']) ? $_REQUEST['post'] : $_REQUEST['post_ID'];
	}

	if (!$post_id || get_post_format($post_id) != "gallery") {
		return;
	}

	$prefix = '_philosophy_';

	$cmb = new_cmb2_box(array(
		'id'           => $prefix . 'gallery',
		'title'        => __('Gallery', 'philosophy'),
		'object_types' => array('post'),
		'context'      => 'normal',
		'priority'     => 'default',
		'show_names'   => true,
	));

	$cmb->add_field(array(
		'name' => __('Gallery Image', 'philosophy'),
		'id' => $prefix . 'gallery_image',
		'type' => 'file_list',
		'query_args' => array('type' => 'image'),
		'text' => array(
			'add_upload_files_text' => 'Upload Gallery Image',
		),
	));
}
add_action('cmb2_init', 'philosophy_add_metabox');