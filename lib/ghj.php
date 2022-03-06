<?php
/*
* Add the Custom Meta Box
*/
 
function add_custom_meta_box() {
    add_meta_box(
        'custom_meta_box', // $id
        'Custom Meta Box', // $title 
        'show_custom_meta_box', // $callback
        'post', // $page
        'normal', // $context
        'high' // $priority
    ); 
}
add_action('add_meta_boxes', 'add_custom_meta_box');
// Custom meta fields array
$prefix = 'custom_';
$custom_meta_fields = array(
    array(
        'label'=> 'Author Name',
        'desc'  => 'Enter post author name to be displayed',
        'id'    => $prefix.'author_name',
        'type'  => 'text',
    ),
 array(
  'label'=> 'Photo',
        'desc'  => 'Enter url author photo',
        'id'    => $prefix.'photo_author',
        'type'  => 'text'
    )
);
 
// The callback function
 
function show_custom_meta_box() {
    global $custom_meta_fields, $post;
     
    // Use nonce for verification
    echo '<input type="hidden" name="custom_meta_box_nonce" value="'.wp_create_nonce(basename(__FILE__)).'" />';
      
    // Begin the field table and loop
    echo '<table class="form-table">';
     
    foreach ($custom_meta_fields as $field) {
        // get value of this field if it exists for this post
        $meta = get_post_meta($post->ID, $field['id'], true);
        // begin a table row with
        echo '<tr>
                <th><label for="'.$field['id'].'">'.$field['label'].'</label></th>
                <td>';
                switch($field['type']) {
                    // text field
                    case 'text':
                        echo '<input type="text" name="'.$field['id'].'" id="'.$field['id'].'" value="'.$meta.'" size="30" />
                            <br /><span class="description">'.$field['desc'].'</span>';
                    break;
nbsp;               }
        echo '</td></tr>';
    }
     
    echo '</table>';
     
}
 
// Save the custom meta data
function save_custom_meta($post_id) {
 
    global $custom_meta_fields;
      
    // verify nonce
    if (!wp_verify_nonce($_POST['custom_meta_box_nonce'], basename(__FILE__))) 
        return $post_id;
         
    // check autosave
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
        return $post_id;
         
    // check permissions
    if ('page' == $_POST['post_type']) {
        if (!current_user_can('edit_page', $post_id))
            return $post_id;
        } elseif (!current_user_can('edit_post', $post_id)) {
            return $post_id;
    }
      
    // loop through fields and save the data
    foreach ($custom_meta_fields as $field) {
        $old = get_post_meta($post_id, $field['id'], true);
        $new = $_POST[$field['id']];
        if ($new && $new != $old) {
            update_post_meta($post_id, $field['id'], $new);
        } elseif ('' == $new && $old) {
            delete_post_meta($post_id, $field['id'], $old);
        }
    }
}
add_action('save_post', 'save_custom_meta');