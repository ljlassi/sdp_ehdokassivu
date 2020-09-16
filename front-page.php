<?php

/**
 * Template for displaying a page.
 */

?>

<?php get_header(); ?>

    <div class="row">
        <div class="col-md-3 col-sm-0 spacing-sides">
        </div>
        <div class="col-md-6 col-sm-12 content-main pt-5">
            <div class="main p-3">
                <?php

                /**
                 * The post loop, call get the template for displaying page if there is a page to display.
                 */


                if ( have_posts() ) {
                    while ( have_posts() ) : the_post();
                        get_template_part( 'template-parts/content/content', 'page' );
                    endwhile;
                }
                ?>
            </div>
        </div>
        <div class="col-md-3 col-sm-0 spacing-sides">
        </div>
    </div>
        <div class="row">
            <div class="col-md-2 col-sm-0 spacing-sides">
            </div>
            <div class="col-md-8 col-sm-12 content-main pt-5">
                <div class="row">
        <?php
        $recent_posts = wp_get_recent_posts(array(
        'numberposts' => 2, // Number of recent posts thumbnails to display
        'post_status' => 'publish' // Show only the published posts
        ));
        foreach($recent_posts as $key => $post) : ?>
        <div class="col-md-6 col-sm-12">
            <a href="<?php echo get_permalink($post['ID']) ?>">
                <?php echo get_the_post_thumbnail($post['ID'], 'full'); ?>
                <h3 class="text-center"><?php echo $post['post_title'] ?></h3>
            </a>
            <?php $text = $post['post_content'];
                $text = strip_shortcodes( $text );
                $text = apply_filters( 'the_content', $text );
                $text = str_replace(']]>', ']]&gt;', $text);
                $excerpt_length = apply_filters( 'excerpt_length', 55 );
                $excerpt_more = apply_filters( 'excerpt_more', ' ' . '[&hellip;]' );
                $text = wp_trim_words( $text, $excerpt_length, $excerpt_more );
                echo $text;
            ?>
            <p class="pt-2 text-center"><a href="<?php echo get_permalink($post['ID']) ?>">Lue lisää...</a></p>
        </div>
        <?php endforeach; wp_reset_query(); ?>
        </div>
        </div>
            <div class="col-md-2 col-sm-0 spacing-sides">
            </div>
        </div>
<?php get_footer(); ?>