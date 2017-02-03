<?php get_header(); ?>
<?php 
$args = array(
	'post_type' => 'bufe-post',
);  
$your_loop = new WP_Query( $args ); 

if ( $your_loop->have_posts() ) : while ( $your_loop->have_posts() ) : $your_loop->the_post(); 
$meta = get_post_meta( $post->ID, 'your_fields', true ); ?>

<?php the_title(); ?>
<?php the_content(); ?>


<h1>Text Input</h1>
<?php echo $meta['text']; ?>
<h1>Textarea</h1>
<?php echo $meta['textarea']; ?>
<h1>Checkbox</h1>
<?php if ( $meta['checkbox'] === 'checkbox') { ?>
Checkbox is checked.
<?php } else { ?> 
Checkbox is not checked. 
<?php } ?>
<h1>Select Menu</h1>
<p>The actual value selected.</p>
<?php echo $meta['select']; ?>
<p>Switch statement for options.</p>
<?php 
	switch ( $meta['select'] ) {
		case 'option-one':
			echo 'Option One';
			break;
		case 'option-two':
			echo 'Option Two';
			break;
		default:
			echo 'No option selected';
			break;
	} 
?>
<img src="<?php echo $meta['image']; ?>">

<!-- contents of Your Post -->
<?php endwhile; endif; wp_reset_postdata(); ?>

	<div class="row">
		<div class="col s12">
			<?php 
				if ( have_posts() ) : while ( have_posts() ) : the_post();
  	
					get_template_part( 'content', get_post_format() );
  
				endwhile; endif; 
			?>

		</div> <!-- /.col -->
	</div> <!-- /.row -->

<?php get_footer(); ?>