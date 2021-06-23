<?php 
/* FROM THE FUNCTIONS.PHP PAGE OF OLD THEME */

function shorter_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'shorter_excerpt_more');

// excerpts of various sizes
function standard_length($length) { return 55; }
function the_standard_excerpt() {
	add_filter( 'excerpt_length', 'standard_length' );
	the_excerpt();
}

function add($a, $b){return 10;}

function shortest_length($length) { return 15; }
function the_shortest_excerpt() {
	add_filter( 'excerpt_length', 'shortest_length' );
	the_excerpt();
}

function short_length($length) { return 30; }
function the_short_excerpt() {
	add_filter( 'excerpt_length', 'short_length' );
	the_excerpt();
}

function long_length($length) { return 125; }
function the_long_excerpt() {
	add_filter( 'excerpt_length', 'long_length' );
	the_excerpt();
}

//FOR TAGS & ADDITIONAL OPTIONS FOR POST FEATURE 
function create_author_taxonomy() {
	$labels = array(
	    'name' => 'Public Authors',
	    'singular_name' => 'Public Author',
		'add_new_item' => 'Add New Public Author',
	);
	register_taxonomy(
		'authors',
		'post',
		array(
			'label' => 'Public Author',
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

function create_artist_taxonomy() {
	$labels = array(
	    'name' => 'Artists',
	    'singular_name' => 'Artist',
		'add_new_item' => 'Add New Artist',
	);
	register_taxonomy(
		'artists',
		'post',
		array(
			'label' => 'Artists',
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
add_action('init', 'create_artist_taxonomy');

function create_issue_taxonomy() {
	$labels = array(
	    'name' => 'Issues',
	    'singular_name' => 'Issue',
		'add_new_item' => 'Add New Issue',
	);
	register_taxonomy(
		'issues',
		'post',
		array(
			'label' => 'Issue',
			'labels' => $labels,
			'hierarchical' => true,			
			'public' => true,
			'show_ui' => true,
			'show_admin_column' => true,
			'meta_box_cb' => true,
			'show_in_rest' => true,
		)
	);
}
add_action('init', 'create_issue_taxonomy');


function hcf_register_meta_boxes() {
	//https://developer.wordpress.org/reference/functions/add_meta_box/
	//if need to remove: https://wordpress.stackexchange.com/questions/33063/how-to-change-default-position-of-wp-meta-boxes
    add_meta_box('hcf-1', 
				__( 'Hello Custom Field', 'hcf' ),  // front facing name, back facing name  respectively of metabox
				'hcf_display_callback', //function that renders metabox
				'prisoner_submission',  //post type that metabox belongs too 
				'normal' ); //location to put metabox
}
add_action( 'add_meta_boxes', 'hcf_register_meta_boxes' );
/**
 * Meta box display callback.
 *
 * @param WP_Post $post Current post object.
 */

function hcf_display_callback( $post ) {
echo ("<div class='hcf_box'>
		
			<p class='meta-options hcf_field'>
				<label for='hcf_author'>Author</label>
				<input id='hcf_author' 
					   type='text' 
					   name='hcf_author'
					   value=".esc_attr( get_post_meta( get_the_ID(), 'hcf_author', true ) ).">
			</p>
			<p class='meta-options hcf_field'>
				<label for='hcf_published_date'>Published Date</label>
				<input id='hcf_published_date' 
				       type='date' 
					   name='hcf_published_date'
					   value=".esc_attr( get_post_meta( get_the_ID(), 'hcf_published_date', true ) ).">
			</p>
			<p class='meta-options hcf_field'>
				<label for='hcf_price'>Price</label>
				<input id='hcf_price' 
				       type='number' 
					   name='hcf_price'
					   value=".esc_attr( get_post_meta( get_the_ID(), 'hcf_price', true ) ).">
			</p>
			</div>");
}
/**
 * Save meta box content.
 *
 * @param int $post_id Post ID
 */
function hcf_save_meta_box( $post_id ) {
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
    if ( $parent_id = wp_is_post_revision( $post_id ) ) {
        $post_id = $parent_id;
    }
    $fields = [
        'hcf_author',
        'hcf_published_date',
        'hcf_price',
    ];
    foreach ( $fields as $field ) {
        if ( array_key_exists( $field, $_POST ) ) {
            update_post_meta( $post_id, $field, sanitize_text_field( $_POST[$field] ) );
        }
     }
}
add_action( 'save_post', 'hcf_save_meta_box' );




//creates taxonomy
register_taxonomy( 
	'custom_taxonomy', 
	'post', 
	array(
		'labels' => array(
			'name' => 'Custom Exclusive Taxonomy'
			),
		'show_in_quick_edit' => false, //hides the metabox of the taxonomy we just made
		'meta_box_cb' => false         //hides the metabox of the taxonomy we just made
	)
);
?>

<?php
function fill_date_meta_box_content( $post ) {
	$terms = get_terms( array(
		'taxonomy' => 'custom_taxonomy',
		'hide_empty' => false // Retrieve all terms
	));

	// We assume that there is a single category
	$currentTaxonomyValue = get_the_terms($post->ID, 'custom_taxonomy')[0];
?>
	<p>Choose taxonomy value</p>
	<p>
		<?php foreach($terms as $term): ?>
			<input type="radio" name="custom_taxonomy" id="taxonomy_term_<?php echo $term->term_id;?>" value="<?php echo $term->term_id;?>"<?php if($term->term_id==$currentTaxonomyValue->term_id) echo "checked"; ?>>
			<label for="taxonomy_term_<?php echo $term->term_id;?>"><?php echo $term->name; ?></label>
			</input><br/>
		<?php endforeach; ?>
	</p>
<?php
}

//save user input
add_action('save_post', 'save_custom_taxonomy');
function save_custom_taxonomy($post_id){
	if ( isset( $_REQUEST['custom_taxonomy'] ) ) 
		wp_set_object_terms($post_id, (int)sanitize_text_field( $_POST['custom_taxonomy'] ), 'custom_taxonomy');
}


//JUST GENERIC META BOX TUTORIAL

//SOURCE: https://metabox.io/how-to-create-custom-meta-boxes-custom-fields-in-wordpress/
/**
 * Register meta boxes.
 */

?>