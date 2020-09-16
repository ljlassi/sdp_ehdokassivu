<?php

/**
 * Template for displaying a single post in blog page, called from inside
 * the posts loop.
 */

?>

<div class="blog-post content-main pb-5">
    <section>
        <a href="<?php echo get_permalink(); ?>"><h2 class="blog-post-title"><?php the_title(); ?></h2></a>
        <p class="blog-post-meta"><?php the_date(); ?></p>
        <div class="row">
            <div class="col-12">
                <?php
                if ( has_post_thumbnail() ) {
                    the_post_thumbnail();
                }
                ?>
            </div>
        </div>
        <?php echo get_the_excerpt(); ?>
        <p><a href="<?php the_permalink(); ?>">Lue lisää</a></p>
    </section>
</div>
