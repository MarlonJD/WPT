<?php
function custom_function() {
	//code
}
add_action( 'action', 'custom_function');


// WordPress Titles
add_theme_support( 'title-tag' );

// Custom settings
function custom_settings_add_menu() {
  add_menu_page( 'Devasa Oda', 'Salihin Devasa Tema Kontrol Odası', 'manage_options', 'custom-settings', 'custom_settings_page', null, 99 );
}
add_action( 'admin_menu', 'custom_settings_add_menu' );
// Create Custom Global Settings
function custom_settings_page() { ?>
  <div class="wrap">
    <h1>Custom Settings</h1>
    <form method="post" action="options.php">
       <?php
           settings_fields( 'section' );
           do_settings_sections( 'theme-options' );      
           submit_button(); 
       ?>          
    </form>
  </div>
<?php }

// Twitter
function setting_twitter() { ?>
  <input type="text" name="twitter" id="twitter" value="<?php echo get_option( 'twitter' ); ?>" />
<?php }

 //Github
function setting_github() { ?>
  <input type="text" name="github" id="github" value="<?php echo get_option('github'); ?>" />
<?php }

function setting_renk() { ?>
  <input type="text" name="renk" id="renk" value="<?php echo get_option('renk'); ?>" />
<?php }

// Custom Post Type
function ozel_sayfa_yaz() {
	register_post_type( 'ozel-sayfa',
			array(
			'labels' => array(
					'name' => __( 'ozel-sayfa' ),
					'singular_name' => __( 'ozel-sayfa' ),
			),
			'public' => true,
			'has_archive' => true,
			'supports' => array(
					'title',
					'editor',
					'thumbnail',
				  'custom-fields'
			)
	));
}

function devasa_bir_bufe_yap() {
	register_post_type( 'bufe-post',
		array(
			'labels'       => array(
				'name'       => __( 'Burakın Devasa Büyüklükte Bir Büfe' ),
			),
			'public'       => true,
			'hierarchical' => true,
			'has_archive'  => true,
			'supports'     => array(
				'title',
				'editor',
				'excerpt',
				'thumbnail',
			), 
			'taxonomies'   => array(
				'post_tag',
				'category',
			)
		)
	);
	register_taxonomy_for_object_type( 'category', 'bufe-post' );
	register_taxonomy_for_object_type( 'post_tag', 'bufe-post' );
}

            function add_your_fields_meta_box() {
                add_meta_box(
                    'your_fields_meta_box', // $id
                    'Kişisel Zevkler Kutusu', // $title
                    'show_your_fields_meta_box', // $callback
                    'bufe-post', // $screen
                    'normal', // $context
                    'high' // $priority
                );
}

                function show_your_fields_meta_box() {
                    global $post;  
                        $meta = get_post_meta( $post->ID, 'your_fields', true ); ?>

                    <input type="hidden" name="your_meta_box_nonce" value="<?php echo wp_create_nonce( basename(__FILE__) ); ?>">

                    <!-- All fields will go here -->

<p>
	<label for="your_fields[text]">porno linki ekle</label>
	<br>
	<input type="text" name="your_fields[text]" id="your_fields[text]" class="regular-text" value="<?php echo $meta['text']; ?>">
</p>

<p>
	<label for="your_fields[checkbox]">KOnusu Var Mı?
		<input type="checkbox" name="your_fields[checkbox]" value="checkbox" <?php if ( $meta['checkbox'] === 'checkbox' ) echo 'checked'; ?>>
	</label>
</p>

<p>
    <label for="your_fields[textarea]">Porno Konusu(Eğer Varsa)</label>
	<br>
	<textarea name="your_fields[textarea]" id="your_fields[textarea]" rows="5" cols="30" style="width:500px;"><?php echo $meta['textarea']; ?></textarea>
</p>


<p>
	<label for="your_fields[select]">Kategorisi</label>
	<br>
	<select name="your_fields[select]" id="your_fields[select]">
			<option value="option-one" <?php selected( $meta['select'], 'option-one' ); ?>>Sarışın</option>
			<option value="option-two" <?php selected( $meta['select'], 'option-two' ); ?>>Götten Sikiş</option>
	</select>
</p>

<p>
	<label for="your_fields[image]">Porno Küçük Resmi</label><br>
	<input type="text" name="your_fields[image]" id="your_fields[image]" class="meta-image regular-text" value="<?php echo $meta['image']; ?>">
	<input type="button" class="button image-upload" value="Browse">
</p>
<div class="image-preview"><img src="<?php echo $meta['image']; ?>" style="max-width: 250px;"></div>

<script>
jQuery(document).ready(function ($) {

	// Instantiates the variable that holds the media library frame.
	var meta_image_frame;
	// Runs when the image button is clicked.
	$('.image-upload').click(function (e) {
		e.preventDefault();
		var meta_image = $(this).parent().children('.meta-image');

		// If the frame already exists, re-open it.
		if (meta_image_frame) {
			meta_image_frame.open();
			return;
		}
		// Sets up the media library frame
		meta_image_frame = wp.media.frames.meta_image_frame = wp.media({
			title: meta_image.title,
			button: {
				text: meta_image.button
			}
		});
		// Runs when an image is selected.
		meta_image_frame.on('select', function () {
			// Grabs the attachment selection and creates a JSON representation of the model.
			var media_attachment = meta_image_frame.state().get('selection').first().toJSON();
			// Sends the attachment URL to our custom image input field.
			meta_image.val(media_attachment.url);
		});
		// Opens the media library frame.
		meta_image_frame.open();
	});
});
</script>

                    <?php }

function save_your_fields_meta( $post_id ) {   
	// verify nonce
	if ( !wp_verify_nonce( $_POST['your_meta_box_nonce'], basename(__FILE__) ) ) {
		return $post_id; 
	}
	// check autosave
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return $post_id;
	}
	// check permissions
	if ( 'page' === $_POST['post_type'] ) {
		if ( !current_user_can( 'edit_page', $post_id ) ) {
			return $post_id;
		} elseif ( !current_user_can( 'edit_post', $post_id ) ) {
			return $post_id;
		}  
	}
	
	$old = get_post_meta( $post_id, 'your_fields', true );
	$new = $_POST['your_fields'];

	if ( $new && $new !== $old ) {
		update_post_meta( $post_id, 'your_fields', $new );
	} elseif ( '' === $new && $old ) {
		delete_post_meta( $post_id, 'your_fields', $old );
	}
}

function custom_settings_page_setup() {
  add_settings_section( 'section', 'All Settings', null, 'theme-options' );
  add_settings_field( 'twitter', 'Twitter URL', 'setting_twitter', 'theme-options', 'section' );
  add_settings_field( 'github', 'GitHub URL', 'setting_github', 'theme-options', 'section' );
add_settings_field( 'renk', 'Renk Kodu', 'setting_renk', 'theme-options', 'section' );
  
    register_setting( 'section', 'twitter' );
    register_setting( 'section', 'github' );
    register_setting( 'section', 'renk' );
}
add_action( 'admin_init', 'custom_settings_page_setup' );
add_theme_support( 'post-thumbnails' );
add_action( 'init', 'ozel_sayfa_yaz' );
add_action( 'init', 'devasa_bir_bufe_yap' );
add_action( 'add_meta_boxes', 'add_your_fields_meta_box' );
add_action( 'save_post', 'save_your_fields_meta' );