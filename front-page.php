<?php

/**
 * Template for displaying a page.
 */

?>

<?php get_header(); ?>

    <div class="row">
        <div class="col-md-1">
        </div>
        <div class="col-md-10 pt-2">
            <div class="row">
                <div class="col-md-4 p-3">
                    <div class="frontpage-box p-2">
                        <h4 class="text-center">Yhteystiedot</h4>
                        <p>Praesent in arcu vel lectus varius dictum. Aenean et condimentum massa. Suspendisse dapibus consectetur ipsum vel mollis. Curabitur tincidunt pulvinar tellus iaculis sodales. Aliquam aliquam egestas viverra. Donec sed mi ultricies, viverra orci eu, placerat risus. Sed eget metus eu erat euismod sodales.</p>
                    </div>
                </div>
                <div class="col-md-4 p-3">
                    <div class="frontpage-box p-2">
                        <h4 class="text-center">Vaaliteemat</h4>
                        <p>Curabitur ullamcorper purus mauris, nec facilisis lectus venenatis a. Sed luctus, lorem luctus dapibus tempus, neque justo tincidunt massa, id lacinia tortor enim quis eros. Donec mollis nibh eget lectus lacinia imperdiet. Nulla cursus porta nunc. Sed a consectetur arcu, ac commodo dui.</p>
                    </div>
                </div>
                <div class="col-md-4 p-3">
                    <div class="frontpage-box p-2">
                        <h4 class="text-center">Tapahtumat</h4>
                        <p>Nullam a efficitur ante. Sed molestie iaculis mauris ut pharetra. Suspendisse in varius sem. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Aenean in purus eget ex maximus blandit. Nunc laoreet feugiat arcu, vitae dapibus ex euismod ut.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-1">
        </div>
    </div>

    <div class="row">
        <div class="col-md-3 col-sm-0 spacing-sides">
        </div>
        <div class="col-md-6 col-sm-12 content-main pt-2">
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