<?php

//SIMON NOTE: leaving this for now, cause y tf not 
/* not sure why but quick edit can remove the public author from posts. so its disabled until this can be fixed. */
/*
function remove_quick_edit($actions) {
    unset($actions['inline hide-if-no-js']);
    return $actions;
}
add_filter('post_row_actions','remove_quick_edit',10,1);
*/
/*CUSTOM PRISONER SUBMISSIONS POST TYPE*/
function submission_register_post_type() {
	$labels = array(
		'name' => __( 'Prisoner Submissions', ),
		'singular_name' => __( 'Prisoner Submission', ),
		'add_new' => __( 'New Submission', ),
		'add_new_item' => __( 'Add New Submission', ),
		'edit_item' => __( 'Edit Submission', ),
		'new_item' => __( 'New Submission', ),
		'view_item' => __( 'View Submission', ),
		'search_items' => __( 'Search Submissions', ),
		'not_found' =>  __( 'No Submissions Found',  ),
		'not_found_in_trash' => __( 'No Submissions found in Trash',  ),
	   );
	$args = array(
		'labels' => $labels,
		'has_archive' => true,
		'public' => true,
		'hierarchical' => false,
		'supports' => array(
		 'title',
		 'editor',
		 'excerpt',
		 'custom-fields',
		 'thumbnail',
		 'page-attributes'
	    ),
		//'taxonomies' => 'category',
		'rewrite'   => array( 'slug' => 'submission' ),
		'show_in_rest' => true
	   );
	register_post_type( 'prisoner_submission', $args );
}

//https://metabox.io/custom-fields-vs-custom-taxonomies/
add_action( 'init', 'submission_register_post_type' );

function create_author_taxonomy() {
	$labels = array(
	    'name' => 'Authors',
	    'singular_name' => 'Author',
		'add_new_item' => 'Add New Author',
	);
	register_taxonomy(
		'authors',
		'prisoner_submission',
		array(
			'label' => 'Author',
			'labels' => $labels,
			'hierarchical' => false,			
			'public' => true,
			'show_ui' => true,
			'show_admin_column' => true,
			'meta_box_cb' => true,
			'show_in_rest' => true,
		)
	);
}
add_action('init', 'create_author_taxonomy');

add_action('add_meta_boxes', 'add_authors_meta_box');
function add_authors_meta_box(){
	add_meta_box( 'authors', __('Author of Submission'), 'fill_authors_meta_box', 'prisoner_submission' ,'normal');
}

function fill_authors_meta_box(){
	$currentAuthorValue = get_the_terms($post->ID, 'authors')[0];
	?>
	<p class='meta-options hcf_field'>
	<label for="author_from_<?php echo $currentAuthorValue->term_id;?>">Author of Submission</label>
		<input id='author_from_ <?php echo $currentAuthorValue->term_id?>' 
		       type='text' 
			   name='authors'
			   value="<?php echo $currentAuthorValue->name;?>">
	</p>
<?php
}

//save user input
function authors_save_meta_box( $post_id ) {
	if ( isset( $_REQUEST['authors'] ) ) 
		wp_set_object_terms($post_id, $_POST['authors'], 'authors');
}
add_action( 'save_post', 'authors_save_meta_box' );



//https://www.google.com/search?client=firefox-b-1-d&q=create+custom+metabox+for+taxonomy
?>
<?php 
/* SUBMISSION TYPE */
//lol tb added

function create_date_taxonomy() {
	$labels = array(
	    'name' => 'Date Sent',
	    'singular_name' => 'Date',
		'add_new_item' => 'Add New Date',
	);
	register_taxonomy(
		'date_sent',
		'prisoner_submission',
		array(
			'labels' => $labels,
			'hierarchical' => false,			
			'public' => true,
			'show_in_quick_edit' => false, //hides the metabox of the taxonomy we just made
			'meta_box_cb' => false         //hides the metabox of the taxonomy we just made
		), 
	);
}
add_action('init', 'create_date_taxonomy');


https://www.toptal.com/wordpress/wordpress-taxonomy-tutorial
// CREATE CUSTOM TAXONOMY

//called to create new metabox
add_action('add_meta_boxes', 'add_date_meta_box');
function add_date_meta_box(){
	add_meta_box( 'date_box', __('Date Sent'), 'fill_date_meta_box_content', 'prisoner_submission' ,'normal');
}?>

<?php 
function fill_date_meta_box_content($post){
	$terms = get_terms( array(
		'taxonomy' => 'date_sent',
		'hide_empty' => false // Retrieve all terms
	));
	$currentDateValue = get_the_terms($post->ID, 'date_sent')[0];
	?>
	<p class='meta-options hcf_field'>
	<label for="dat_sent_<?php echo $currentDateValue->term_id;?>">Date Sent</label>
		<input id='date_sent_ <?php echo $currentDateValue->term_id?>' 
		       type='date' 
			   name='date_sent'
			   value="<?php echo $currentDateValue->name;?>">
	</p>
<?php
}
//save user input
function date_save_meta_box( $post_id ) {
	if ( isset( $_REQUEST['date_sent'] ) ) 
		wp_set_object_terms($post_id, $_POST['date_sent'], 'date_sent');
}
add_action( 'save_post', 'date_save_meta_box' );


/*TAXONOMY FOR WHETHER OR NOT WANTS PENPAL */
function create_penpal_taxonomy() {
	$labels = array(
	    'name' => 'Wants Penpal',
		'add_new_item' => '',
	);
	register_taxonomy(
		'wants_penpal',
		'prisoner_submission',
		array(
			'labels' => $labels,
			'hierarchical' => false,			
			'public' => true,
			'show_ui' => false,
			'show_admin_column' => true,
			'show_in_quick_edit' => false, //hides the metabox of the taxonomy we just made
			'meta_box_cb' => false         //hides the metabox of the taxonomy we just made
		)
	);
	wp_insert_term(
		'no', // the term 
		'wants_penpal', // the taxonomy
		array(
		  'slug' => 'no',
		)
	);
	wp_insert_term(
		'yes', // the term 
		'wants_penpal', // the taxonomy
		array(
		  'slug' => 'yes',
		)
	);
}
add_action('init', 'create_penpal_taxonomy');

//called to create new metabox
add_action('add_meta_boxes', 'add_penpal_meta_box');
function add_penpal_meta_box(){
	add_meta_box( 'penpal_box', __('Wants Penpal'), 'fill_penpal_meta_box_content', 'prisoner_submission' ,'normal');
}?>

<?php
function fill_penpal_meta_box_content( $post ) {
	$terms = get_terms( array(
		'taxonomy' => 'wants_penpal',
		'hide_empty' => false // Retrieve all terms
	));

	// We assume that there is a single category
	$currentTaxonomyValue = get_the_terms($post->ID, 'wants_penpal')[0];
?>
	<p>
		<?php foreach($terms as $term): ?>
			<input type="radio"
				   name="wants_penpal" 
				   id="wants_penpal<?php echo $term->term_id;?>" 
				   value="<?php echo $term->term_id;?>"
				   <?php if($term->term_id==$currentTaxonomyValue->term_id) echo "checked"; ?>>
			<label for="wants_penpal<?php echo $term->term_id;?>"><?php echo $term->name; ?></label>
			</input><br/>
		<?php endforeach; ?>
	</p>
<?php
}

//save user input
add_action('save_post', 'save_custom_taxonomy');
function save_custom_taxonomy($post_id){
	if ( isset( $_REQUEST['wants_penpal'] ) ) 
		wp_set_object_terms($post_id, (int)sanitize_text_field( $_POST['wants_penpal'] ), 'wants_penpal');
}

/* ADDRESS TAXONOMY */

function create_address_taxonomy() {
	$labels = array(
	    'name' => 'Addresses',
	    'singular_name' => 'Address',
		'add_new_item' => 'Add New Address',
	);
	register_taxonomy(
		'address',
		'prisoner_submission',
		array(
			'labels' => $labels,
			'hierarchical' => false,			
			'public' => true,
			'show_ui' => false,
			'show_in_quick_edit' => false, //hides the metabox of the taxonomy we just made
			'meta_box_cb' => false         //hides the metabox of the taxonomy we just made
		), 
	);
}
add_action('init', 'create_address_taxonomy');




// CREATE CUSTOM TAXONOMY

//called to create new metabox
function parse_address_from_taxonomy($tax_val){
	$tax_str = explode("_",$tax_val->name );
	return $tax_str;
}

add_action('add_meta_boxes', 'add_address_meta_box');
function add_address_meta_box(){
	add_meta_box( 'address_box', __('Address'), 'fill_address_meta_box_content', 'prisoner_submission' ,'normal');
}?>

<?php 
function fill_address_meta_box_content($post){
	$terms = get_terms( array(
		'taxonomy' => 'address',
		'hide_empty' => false // Retrieve all terms
	));
	$currentDateValue = get_the_terms($post->ID, 'address')[0];
	$addr_parts = parse_address_from_taxonomy($currentDateValue);
	?>

	<p class='meta-options'>
	<label for="address_street<?php echo $currentDateValue->term_id;?>">Street</label>
		<input id='address_street <?php echo $currentDateValue->term_id?>' 
		       type='text' 
			   name='address_street'
			   value="<?php echo $addr_parts[0];?>">
	</p> 
	<p> 
	<label for="address_city<?php echo $currentDateValue->term_id;?>">City</label>
		<input id='address_city <?php echo $currentDateValue->term_id?>' 
		       type='text' 
			   name='address_city'
			   value="<?php echo $addr_parts[1];?>">
	</p> <p> 
	<label for="address_state<?php echo $currentDateValue->term_id;?>">State</label>
		<input id='address_state <?php echo $currentDateValue->term_id?>' 
		       type='text' 
			   name='address_state'
			   value="<?php echo $addr_parts[2];?>">
	</p> <p> 
	<label for="address_zip<?php echo $currentDateValue->term_id;?>">Zip</label>
		<input id='address_zip <?php echo $currentDateValue->term_id?>' 
		       type='number' 
			   name='address_zip'
			   value="<?php echo $addr_parts[3];?>">
	</p>
<?php
}

add_action('save_post', 'save_address_taxonomy');
function save_address_taxonomy($post_id){
	$fields = [
		'address_street',
        'address_city',
        'address_state',
        'address_zip',
    ];
	$addr = "";
	foreach($fields as $field){
		if ( isset( $_REQUEST[$field] ) ) 
			$addr .= ( $_POST[$field] . "_");
	}
	wp_set_object_terms($post_id, $addr , 'address');
}


// styling 
// TODO: ADD BOOTSTRAP? 
function load_stylesheets()
{
    wp_register_style('style', get_template_directory_uri() . '/css/style.css', array(), 1, 'all');
    wp_enqueue_style('style');
}
add_action('wp_enqueue_scripts', 'load_stylesheets');

if ( ! isset( $content_width ) ) {
	$content_width = 900;
}

add_theme_support( 'content-width');
add_theme_support('post-thumbnails'); //function in wp library that makes it so wp can use images in blog posts

//add_image_size('left-thumb', 800, 180, array('center', 'top'));
add_image_size('left-thumb', 800, 800, false);
add_image_size('smallest', 300, 300, false);
add_image_size('largest', 800, 800, true);


add_action('do_meta_boxes', 'wpse33063_move_meta_box');

function wpse33063_move_meta_box(){
    remove_meta_box( 'postimagediv', 'post', 'side' );
    add_meta_box('postimagediv', __('Featured Image'), 'post_thumbnail_meta_box', 'post', 'normal', 'high');
}

/*PDF SUBMISSIONS*/
//https://code.tutsplus.com/articles/attaching-files-to-your-posts-using-wordpress-custom-meta-boxes-part-1--wp-22291
function add_custom_meta_boxes() {
 
    // Define the custom attachment for posts
    add_meta_box(
        'wp_custom_attachment',
        'Custom Attachment',
        'build_wp_custom_attachment',
        'prisoner_submission	',
        'normal',
		'high'
    );

} // end add_custom_meta_boxes
add_action('add_meta_boxes', 'add_custom_meta_boxes');

function build_wp_custom_attachment() {
    wp_nonce_field(plugin_basename(__FILE__), 'wp_custom_attachment_nonce');
	$img = get_post_meta(get_the_ID(), 'wp_custom_attachment', true);
    $html = '<p class="description">';
        $html .= 'Upload your PDF here.';
    $html .= '</p>';
    $html .= '<input type="file" id="wp_custom_attachment" name="wp_custom_attachment" value="" size="25" />';
    if($img)
		$html .= '<p><button><a href="'.$img['url'].'">File is submitted. Click here to view</a></button></p> ';
    echo $html;
 
} // end build_wp_custom_attachment


function save_custom_meta_data($id) {
 
    /* --- security verification --- */
    if(!wp_verify_nonce($_POST['wp_custom_attachment_nonce'], plugin_basename(__FILE__))) {
      return $id;
    } // end if
       
    if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
      return $id;
    } // end if
       
    if('page' == $_POST['post_type']) {
      if(!current_user_can('edit_page', $id)) {
        return $id;
      } // end if
    } else {
        if(!current_user_can('edit_page', $id)) {
            return $id;
        } // end if
    } // end if
    /* - end security verification - */
    
	// Make sure the file array isn't empty
	if(!empty($_FILES['wp_custom_attachment']['name'])) {
        
		// Setup the array of supported file types. In this case, it's just PDF.
		$supported_types = array('application/pdf');
		 
		// Get the file type of the upload
		$arr_file_type = wp_check_filetype(basename($_FILES['wp_custom_attachment']['name']));
		$uploaded_type = $arr_file_type['type'];
			 
		// Check if the type is supported. If not, throw an error.
		if(in_array($uploaded_type, $supported_types)) {
	 
			// Use the WordPress API to upload the file
			$upload = wp_upload_bits($_FILES['wp_custom_attachment']['name'], null, file_get_contents($_FILES['wp_custom_attachment']['tmp_name']));
		 
			if(isset($upload['error']) && $upload['error'] != 0) {
				wp_die('There was an error uploading your file. The error is: ' . $upload['error']);
			} else {
				add_post_meta($id, 'wp_custom_attachment', $upload);
				update_post_meta($id, 'wp_custom_attachment', $upload);     
			} // end if/else
	 
		} else {
			wp_die("The file type that you've uploaded is not a PDF.");
		} // end if/else
			 
	} // end if
		 
} // end save_custom_meta_data
add_action('save_post', 'save_custom_meta_data');


//Some succulent get functions 

//get string from tax category 

function post_address($desired_post_id, $taxname){
	$res = ""; 
    $pulled_address_tax = get_the_terms($desired_post_id, $taxname)[0];
    $address_terms = parse_address_from_taxonomy($pulled_address_tax);  
    foreach ($address_terms as $term){
		$res .= $term; 
	}
	return $res; 
}

