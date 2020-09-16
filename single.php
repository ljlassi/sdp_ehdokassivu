<?php

/**
 * Template for displaying a single post.
 */

?>


<?php get_header(); ?>

<?php
if ( has_post_thumbnail() ) {
    echo '<div class="row">
            <div class="col-12 spacing-featured-image">
            </div>
            </div>';
}
else {
    echo '<div class="row">
            <div class="col-12 spacing-main">
            </div>
            </div>';
}
?>

    <div class="row">
        <div class="col-md-2 col-sm-0">
        </div>
        <div class="col-md-8 col-sm-12 content-main">
            <div class="row">
                <div class="col-md-7 col-sm-12">
                    <div class="main p-3">
                        <?php

                        /**
                         * The post loop, call get the template for displaying page if there is a page to display.
                         */


                        if ( have_posts() ) {
                            while ( have_posts() ) : the_post();
                                get_template_part( 'template-parts/content/content', 'post' );
                            endwhile;
                        }
                        ?>
                    </div>
                </div>
                <div class="col-md-1 col-sm-0"></div>
                <div class="col-md-4 col-sm-12">
                    <div class="p-3 sidebar-right">
                        <?php if ( is_active_sidebar( 'right-side-bar' ) ) : ?>
                            <?php dynamic_sidebar( 'right-side-bar' ); ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2 col-sm-0">
        </div>

    </div>
<?php get_footer(); ?>