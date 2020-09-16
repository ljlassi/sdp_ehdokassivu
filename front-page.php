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
            <div class="row">
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
        </div>
        <div class="col-md-3 col-sm-0 spacing-sides">
        </div>
    </div>
<?php get_footer(); ?>