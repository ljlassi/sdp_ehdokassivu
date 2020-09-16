<?php

/**
 * Template for displaying a single post.
 */

?>

<div class="blog-post">
    <h2 class="blog-post-title"><?php the_title(); ?></h2>
    <p class="blog-post-meta"><?php the_date(); ?></p>
    <div class="row">
        <div class="col-12">
            <?php
            if ( has_post_thumbnail() ) {
                the_post_thumbnail('full');
            }
            ?>
        </div>
    </div>
    <?php the_content(); ?>
</div>
