<?php get_header(); ?>

	<div class="row">

			<?php 
			if ( have_posts() ) : while ( have_posts() ) : the_post();
				get_template_part( 'content', get_post_format() );
			endwhile; endif; ?>

                <ul class="pager">
                    <li><?php next_posts_link( 'Previous' ); ?></li>
                    <li><?php previous_posts_link( 'Next' ); ?></li>
                </ul>

            <h4>Archives</h4>
            <ol class="list-unstyled">
                <?php wp_get_archives( 'type=monthly' ); ?>
            </ol>

            <h4>About</h4>
            <p><?php the_author_meta( 'description' ); ?> </p>

            <li><a href="<?php echo get_option('github'); ?>">GitHub</a></li>
            <li><a href="<?php echo get_option('twitter'); ?>">Twitter</a></li>
	</div> <!-- /.row -->

<?php get_footer(); ?>
