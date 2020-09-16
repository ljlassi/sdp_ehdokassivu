<?php

/**
 * Template for displaying the blog page.
 */

?>

<?php get_header(); ?>

    <div class="row">
        <div class="col-md-2 col-sm-0">
        </div>
        <div class="col-md-8 col-sm-12">
            <div class="row">
                <div class="col-md-7 col-sm-12">
                    <div class="p-3 main">
                        <h3>Hakemaasi sivua ei löytynyt</h3>
                        <p>Valitettavasti hakeemasi sivua ei löytynyt.</p>
                    </div>
                </div>
                <div class="col-md-1 col-sm-0 "></div>
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

