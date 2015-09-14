<?php
   /*
   Plugin Name: Book Post Type
   Description: a simple plugin to create a book post type
   Version: 1.0
   Author: Chris Pifer
   Author URI: http://www.chrispifer.com
   License: GPL2
   */
   
function unlacing_custom_post_book() {
  $labels = array(
    'name'               => _x( 'Books', 'post type general name' ),
    'singular_name'      => _x( 'Book', 'post type singular name' ),
    'add_new'            => _x( 'Add New', 'book' ),
    'add_new_item'       => __( 'Add New Book' ),
    'edit_item'          => __( 'Edit Book' ),
    'new_item'           => __( 'New Book' ),
    'all_items'          => __( 'All Books' ),
    'view_item'          => __( 'View Book' ),
    'search_items'       => __( 'Search Books' ),
    'not_found'          => __( 'No books found' ),
    'not_found_in_trash' => __( 'No books found in the Trash' ), 
    'parent_item_colon'  => '',
    'menu_name'          => 'Books'
  );
  $args = array(
    'labels'        => $labels,
    'description'   => 'Add a book to the book list',
    'public'        => true,
    'menu_position' => 5,
    'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments' ),
    'has_archive'   => true,
	'show_in_menu'  => true,
	'slug'          => 'books',
	'rewrite' 		=> array('slug' => 'books'),
  );
  register_post_type( 'book', $args ); 
}
add_action( 'init', 'unlacing_custom_post_book' );

function unlacing_updated_messages( $messages ) {
  global $post, $post_ID;
  $messages['book'] = array(
    0 => '', 
    1 => sprintf( __('book updated. <a href="%s">View book</a>'), esc_url( get_permalink($post_ID) ) ),
    2 => __('Custom field updated.'),
    3 => __('Custom field deleted.'),
    4 => __('book updated.'),
    5 => isset($_GET['revision']) ? sprintf( __('book restored to revision from %s'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
    6 => sprintf( __('book published. <a href="%s">View book</a>'), esc_url( get_permalink($post_ID) ) ),
    7 => __('book saved.'),
    8 => sprintf( __('book submitted. <a target="_blank" href="%s">Preview book</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
    9 => sprintf( __('book scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview book</a>'), date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( get_permalink($post_ID) ) ),
    10 => sprintf( __('book draft updated. <a target="_blank" href="%s">Preview book</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
  );
  return $messages;
}
add_filter( 'post_updated_messages', 'unlacing_updated_messages' );
/*****
add_action( 'add_meta_boxes', 'book_subtitle_box' );
function book_subtitle_box() {
    add_meta_box( 
        'book_subtitle_box',
        __( 'Book Subtitle', 'book-post-type_textdomain' ),
        'book_subtitle_box_content',
        'book',
        'side',
        'high'
    );
}
function book_subtitle_box_content( $post ) {
  wp_nonce_field( plugin_basename( __FILE__ ), 'book_subtitle_box_content_nonce' );
  echo '<label for="book_subtitle"></label>';
  echo '<input type="text" id="book_subtitle" name="book_subtitle" placeholder="enter a subtitle" />';
}

add_action( 'save_post', 'book_subtitle_box_save' );
function book_subtitle_box_save( $post_id ) {

  if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
  return;

  if ( !wp_verify_nonce( $_POST['book_subtitle_box_content_nonce'], plugin_basename( __FILE__ ) ) )
  return;

  if ( 'page' == $_POST['post_type'] ) {
    if ( !current_user_can( 'edit_page', $post_id ) )
    return;
  } else {
    if ( !current_user_can( 'edit_post', $post_id ) )
    return;
  }
  $book_subtitle = $_POST['book_subtitle'];
  update_post_meta( $post_id, 'book_subtitle', $book_subtitle );
}
**/
?>