<?php get_header();
/* 
Template Name: About Page
*/
the_post();
?>


<!-- s-content
    ================================================== -->
<section class="s-content s-content--narrow">

    <div class="row">

        <div class="s-content__header col-full">
            <h1 class="s-content__header-title">
                <?php the_title(); ?>
            </h1>
        </div> <!-- end s-content__header -->
        <?php if (has_post_thumbnail()) : ?>
        <div class="s-content__media col-full">
            <div class="s-content__post-thumb">
                <?php the_post_thumbnail("large"); ?>
            </div>
        </div> <!-- end s-content__media -->
        <?php endif; ?>
        <div class="col-full s-content__main">

            <?php the_content(); ?>

            <?php if (is_active_sidebar("about_page_features")) : ?>
            <div class="row block-1-2 block-tab-full">
                <?php dynamic_sidebar("about_page_features"); ?>
            </div>
            <?php endif; ?>

        </div> <!-- end s-content__main -->

    </div> <!-- end row -->

</section> <!-- s-content -->



<?php get_footer(); ?>