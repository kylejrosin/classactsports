<?php
/**
 * @package KCM_Content_Blocks
 * @version 1.0
 */
/*
Plugin Name: KCM Content Blocks
Plugin URI: http://www.kcmcreate.com/
Description: Plugin to easily create and display content in block format. Requires Advanced Custom Fields, Flexible Content Field
Author: KCM Create
Version: 1.0
Author URI: http://www.kcmcreate.com/
*/

function wpcb_register_content_block_fields() {

	if ( function_exists("register_field_group") ) {		
		
		register_field_group(array (
			'id' => 'acf_wp_content_blocks_intro',
			'title' => 'Content Intro',
			'fields' => array (
				array (
					'key' => 'field_57c8a984hr45',
					'label' => 'Subtitle:',
					'name' => 'post_subtitle',
					'type' => 'wysiwyg',
					'default_value' => '',
					'toolbar' => 'basic',
					'media_upload' => 'no',
				),
				array (
					'key' => 'field_5497fe9d9da39',
					'label' => 'Clicky Title',
					'name' => 'clicky_title',
					'type' => 'wysiwyg',
					'instructions' => '',
					'required' => 1,
					'default_value' => '',
					'toolbar' => 'basic',
					'media_upload' => 'no',
				),
				array (
					'key' => 'field_59120772d9a0b',
					'label' => 'Content Format',
					'name' => 'content_type',
					'type' => 'radio',
					'required' => 1,
					'choices' => array (
						'default' => 'Article (with featured image)',
						'video' => 'Article (with featured video)',
						'paginated' => 'Paginated (ideal for slideshows)',
					),
					'other_choice' => 0,
					'save_other_choice' => 0,
					'default_value' => 'default',
					'layout' => 'vertical',
				),
				array (
					'key' => 'field_597a60984b56b',
					'label' => 'Video Code',
					'name' => 'video_html',
					'type' => 'textarea',
					'conditional_logic' => array (
						'status' => 1,
						'rules' => array (
							array (
								'field' => 'field_59120772d9a0b',
								'operator' => '==',
								'value' => 'video',
							),
						),
						'allorany' => 'all',
					),
					'default_value' => '',
					'placeholder' => 'HTML/JS only (no text)',
					'maxlength' => '',
					'rows' => '',
					'formatting' => 'html',
				),
				array (
					'key' => 'field_57c8a5d5b3ac5',
					'label' => 'Content Intro:',
					'name' => 'text_after_slideshow',
					'type' => 'wysiwyg',
					'conditional_logic' => array (
						'status' => 1,
						'rules' => array (
							array (
								'field' => 'field_59120772d9a0b',
								'operator' => '==',
								'value' => 'paginated',
							),
						),
						'allorany' => 'all',
					),
					'default_value' => '',
					'toolbar' => 'basic',
					'media_upload' => 'no',
				),
			),
			'location' => array (
				array (
					array (
						'param' => 'post_type',
						'operator' => '==',
						'value' => 'post',
						'order_no' => 0,
						'group_no' => 0,
					),
				),
			),
			'options' => array (
				'position' => 'acf_after_title',
				'layout' => 'no_box',
				'hide_on_screen' => array (
					0 => 'excerpt',
					1 => 'custom_fields',
					2 => 'discussion',
					3 => 'comments',
					4 => 'format',
					//5 => 'the_content',
				),
			),
			'menu_order' => 0,
		));
		
		register_field_group(array (
			'id' => 'acf_listview',
			'title' => 'Listview',
			'fields' => array (
				array (
					'key' => 'field_54fa4d5ba988d',
					'label' => 'Content Body:',
					'name' => 'listview',
					'type' => 'flexible_content',
					'conditional_logic' => array (
						'status' => 1,
						'rules' => array (
							array (
								'field' => 'field_59120772d9a0b',
								'operator' => '==',
								'value' => 'paginated',
							),
						),
						'allorany' => 'all',
					),
					'layouts' => array (
						array (
							'label' => 'Content Block',
							'name' => 'List Item',
							'display' => 'row',
							'min' => '',
							'max' => '',
							'sub_fields' => array (
								array (
									'key' => 'field_54fa4f49a988f',
									'label' => 'Block Type',
									'name' => 'media_type',
									'type' => 'radio',
									'required' => 1,
									'column_width' => '',
									'choices' => array (
										'WYSIWYG' => 'WYSIWYG',
										'Image' => 'Image',
										'Video' => 'Video/Tweet/Other',
										'Divider' => 'Page Divider',
									),
									'other_choice' => 0,
									'save_other_choice' => 0,
									'default_value' => 'Image',
									'layout' => 'horizontal',
								),
								array (
									'key' => 'field_54fa4d95a988e',
									'label' => 'Title',
									'name' => 'title',
									'type' => 'wysiwyg',
									'default_value' => '',
									'toolbar' => 'basic',
									'media_upload' => 'no',
									'conditional_logic' => array (
										'status' => 1,
										'rules' => array (
											array (
												'field' => 'field_54fa4f49a988f',
												'operator' => '!=',
												'value' => 'WYSIWYG',
											),
											array (
												'field' => 'field_54fa4f49a988f',
												'operator' => '!=',
												'value' => 'Divider',
											),
										),
										'allorany' => 'all',
									),
								),
								array (
									'key' => 'field_598457372h43',
									'label' => 'Image Type',
									'name' => 'image_type',
									'type' => 'radio',
									'required' => 1,
									'column_width' => '',
									'choices' => array (
										'Library' => 'Upload / Select from Library',
										'External' => 'Image URL',
									),
									'conditional_logic' => array (
										'status' => 1,
										'rules' => array (
											array (
												'field' => 'field_54fa4f49a988f',
												'operator' => '==',
												'value' => 'Image',
											),
										),
										'allorany' => 'all',
									),
									'other_choice' => 0,
									'save_other_choice' => 0,
									'default_value' => 'Library',
									'layout' => 'horizontal',
								),
								array (
									'key' => 'field_5837463j6743',
									'label' => 'Image URL',
									'name' => 'image_url',
									'type' => 'text',
									'column_width' => '',
									'default_value' => '',
									'placeholder' => 'Full image URL must include http://',
									'prepend' => '',
									'append' => '',
									'required' => 1,
									'formatting' => 'none',
									'maxlength' => '',
									'conditional_logic' => array (
										'status' => 1,
										'rules' => array (
											array (
												'field' => 'field_54fa4f49a988f',
												'operator' => '==',
												'value' => 'Image',
											),
											array (
												'field' => 'field_598457372h43',
												'operator' => '==',
												'value' => 'External',
											),
										),
										'allorany' => 'all',
									),
								),
								array (
									'key' => 'field_54fa4f85a9890',
									'label' => 'Image',
									'name' => 'image',
									'type' => 'image',
									'required' => 1,
									'conditional_logic' => array (
										'status' => 1,
										'rules' => array (
											array (
												'field' => 'field_54fa4f49a988f',
												'operator' => '==',
												'value' => 'Image',
											),
											array (
												'field' => 'field_598457372h43',
												'operator' => '==',
												'value' => 'Library',
											),
										),
										'allorany' => 'all',
									),
									'column_width' => '',
									'save_format' => 'object',
									'preview_size' => 'medium',
									'library' => 'all',
								),
								array (
									'key' => 'field_54fa4fa6a9891',
									'label' => 'Embed code',
									'name' => 'video',
									'type' => 'textarea',
									'required' => 1,
									'conditional_logic' => array (
										'status' => 1,
										'rules' => array (
											array (
												'field' => 'field_54fa4f49a988f',
												'operator' => '==',
												'value' => 'Video',
											),
										),
										'allorany' => 'all',
									),
									'column_width' => '',
									'default_value' => '',
									'placeholder' => 'Paste embed code',
									'maxlength' => '',
									'rows' => '',
									'formatting' => 'html',
								),
								array (
									'key' => 'field_54fa4fdba9892',
									'label' => 'Media caption / credit',
									'name' => 'media_caption',
									'type' => 'wysiwyg',
									'default_value' => '',
									'toolbar' => 'basic',
									'media_upload' => 'no',
									'conditional_logic' => array (
										'status' => 1,
										'rules' => array (
											array (
												'field' => 'field_54fa4f49a988f',
												'operator' => '!=',
												'value' => 'WYSIWYG',
											),
											array (
												'field' => 'field_54fa4f49a988f',
												'operator' => '!=',
												'value' => 'Divider',
											),
										),
										'allorany' => 'all',
									),
								),
								array (
									'key' => 'field_54fa4ffda9893',
									'label' => 'Main Text',
									'name' => 'content_description',
									'type' => 'wysiwyg',
									'default_value' => '',
									'toolbar' => 'full',
									'media_upload' => 'no',
									'conditional_logic' => array (
										'status' => 1,
										'rules' => array (
											array (
												'field' => 'field_54fa4f49a988f',
												'operator' => '!=',
												'value' => 'Divider',
											),
										),
										'allorany' => 'all',
									),
								),
								/*
								array (
									'key' => 'field_58f255b2cfd4f',
									'label' => 'Votes',
									'name' => 'content_votes',
									'type' => 'number',
									'default_value' => 0,
									'placeholder' => '',
									'prepend' => '',
									'append' => '',
									'conditional_logic' => array (
										'status' => 1,
										'rules' => array (
											array (
												'field' => 'field_54fa4f49a988f',
												'operator' => '!=',
												'value' => 'WYSIWYG',
											),
											array (
												'field' => 'field_54fa4f49a988f',
												'operator' => '!=',
												'value' => 'Divider',
											),
										),
										'allorany' => 'all',
									),
									'min' => '',
									'max' => '',
									'step' => '',
								),
								*/
							),
						),
					),
					'button_label' => 'Add Content Block',
					'min' => '',
					'max' => '',
				),
			),
			'location' => array (
				array (
					array (
						'param' => 'post_type',
						'operator' => '==',
						'value' => 'post',
						'order_no' => 0,
						'group_no' => 0,
					),
				),
			),
			'options' => array (
				'position' => 'acf_after_title',
				'layout' => 'no_box',
				'hide_on_screen' => array (
					0 => 'excerpt',
					1 => 'custom_fields',
					2 => 'discussion',
					3 => 'comments',
					4 => 'format',
					5 => 'the_content',
				),
			),
			'menu_order' => 0,
		));
		
	}

}
add_action( 'init', 'wpcb_register_content_block_fields' );



function buildBlocks($post) {

	$blocks = array();
	$blocks['blocks'] = array();
	
	$c = 1;
	
	if ( have_rows('listview', $post->ID ) ) :
		while ( have_rows('listview', $post->ID ) ) :
			
			the_row();
		   
			$title = get_sub_field('title');
			$description = get_sub_field('content_description');
			$intro = get_field('text_after_slideshow');
			$caption = get_sub_field('media_caption');
			$media_type = get_sub_field('media_type');
			$votes = get_sub_field('content_votes');
		   
			if ($media_type == 'Image') {
			
				$image_type = get_sub_field('image_type');
				
				if ($image_type == 'Library') {
					$image = get_sub_field('image');
					$image_url = $image['url'];
					$source_type = 'Library';
				}
				else if ($image_type == 'External') {
					$image_url = get_sub_field('image_url');
					$source_type = 'External';
				}
	
				$block = array(
				    'title' => $title,
				    'type' => $media_type,
				    'source_type' => $source_type,
				    'thumbnail' => $image_url,
				    'description' => $description,
				    'credit' => $caption,
				    'index' => $c,
				    'votes' => $votes,
				);
				
			}
			else if ($media_type == 'Video') {
							
				$html = get_sub_field('video');
				$block = array(
				    'title' => $title,
				    'type' => $media_type,
				    'html' => htmlentities($html),
				    'description' => $description,
				    'credit' => $caption,
				    'index' => $c,
				    'votes' => $votes,
				);
						
			}
			else if ($media_type == 'WYSIWYG') {
							
				$block = array(
				    'type' => $media_type,
				    'description' => $description,
				    'index' => $c,
				    'votes' => false,
				);
						
			}
			else if ($media_type == 'Divider') {
							
				$block = array(
				    'type' => $media_type,
				    'index' => $c,
				    'votes' => false,
				);
						
			}
			else {
				
				$block = array(
				    'type' => $media_type,
				    'index' => $c,
				    'votes' => false,
				);
			
			}
			
			$blocks['blocks'][] = $block;
			$c++;
			
		endwhile;
	
	endif;
	
	return $blocks;
	
}


function wpcb_replace_content($content) {
	
	global $post;
	$post = get_post($post->ID);
	$post_format = get_post_meta($post->ID,'content_type');
	
	if ($post_format[0] == 'paginated') {
		$content = '';
		
		if (is_single() && $post->post_type == 'post') {
			ob_start();
			require plugin_dir_path( __FILE__ ) . '/templates/post.php';
			$content = ob_get_clean();
		}
		else {
			ob_start();
			include plugin_dir_path( __FILE__ ) . '/templates/post.php';
			ob_end_clean();
		}
	}

	return $content;
		
}

add_filter( 'the_content', 'wpcb_replace_content' );
add_filter( 'the_editor_content', 'wpcb_replace_content' );


function wp_content_blocks_css() {
	
	$plugin_url = plugin_dir_url( __FILE__ );
	wp_enqueue_style( 'wp_content_blocks_css', $plugin_url . '/assets/css/wp-content-blocks.css' );
	
}

add_action( 'wp_enqueue_scripts', 'wp_content_blocks_css' );

?>