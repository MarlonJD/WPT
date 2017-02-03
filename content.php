<?php /*if ( has_post_thumbnail() ) {?>
the_post_thumbnail('thumbnail'); ?>
	<?php } else { ?>
	<?php the_excerpt(); ?>
	<?php } */ ?>

<!-- /.blog-post -->
        <div class="col s12 m6">
          <div class="card">
            <div class="card-image">
              <?php the_post_thumbnail('thumbnail'); ?>
              <span class="card-title"><?php the_title(); ?></span>
            </div>
            <div class="card-content">
              <p><?php the_excerpt(); ?><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>">Devamı</a></p>
            </div>
            <div class="card-action">
              <a href="<?php the_permalink(); ?>">Ben bir linkim</a>
            </div>
          </div>
        </div>
            