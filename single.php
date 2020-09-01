<?php get_header();
the_post(); ?>

<!-- s-content
    ================================================== -->
<section class="s-content s-content--narrow s-content--no-padding-bottom">

    <article class="row format-standard">

        <div class="s-content__header col-full">
            <h1 class="s-content__header-title"><?php the_title(); ?></h1>
            <ul class="s-content__header-meta">
                <li class="date"><?php echo get_the_date(); ?></li>
                <li class="cat">
                    <?php _e("In", "philosophy"); ?>
                    <?php echo get_the_category_list("", "", ""); ?>
                </li>
            </ul>
        </div> <!-- end s-content__header -->

        <?php if (has_post_thumbnail()) : ?>
        <div class="s-content__media col-full">
            <div class="s-content__post-thumb">
                <?php the_post_thumbnail("large"); ?>
            </div>
        </div> <!-- end s-content__media -->
        <?php endif; ?>

        <div class="col-full s-content__main">

            <?php the_content();

            wp_link_pages();
            ?>

            <?php if (has_tag()) : ?>
            <p class="s-content__tags">
                <span><?php _e("Post Tags", "philosophy"); ?></span>

                <span class="s-content__tag-list">
                    <?php echo get_the_tag_list(); ?>
                </span>
            </p> <!-- end s-content__tags -->
            <?php endif; ?>

            <div class="s-content__author">
                <?php get_avatar(get_the_author_meta("ID")); ?>

                <div class="s-content__author-about">
                    <h4 class="s-content__author-name">
                        <a
                            href="<?php echo esc_url(get_author_posts_url(get_the_author_meta("ID"))); ?>"><?php the_author(); ?></a>
                    </h4>

                    <p><?php the_author_meta("description"); ?>
                    </p>
                    <?php if (function_exists("the_field")) :

                        $philosophy_facebook = get_field("facebook", "user_" . get_the_author_meta("ID"));
                        $philosophy_twitter = get_field("twitter", "user_" . get_the_author_meta("ID"));
                        $philosophy_google_plus = get_field("google_plus", "user_" . get_the_author_meta("ID"));
                        $philosophy_instagram = get_field("instagram", "user_" . get_the_author_meta("ID"));
                    ?>
                    <ul class="s-content__author-social">
                        <?php if ($philosophy_facebook) : ?>
                        <li><a
                                href="<?php echo esc_url($philosophy_facebook); ?>"><?php _e("Facebook", "philosophy"); ?></a>
                        </li>
                        <?php endif; ?>

                        <?php if ($philosophy_twitter) : ?>
                        <li><a
                                href="<?php echo esc_url($philosophy_twitter); ?>"><?php _e("Twitter", "philosophy"); ?></a>
                        </li>
                        <?php endif; ?>

                        <?php if ($philosophy_google_plus) : ?>
                        <li><a
                                href="<?php echo esc_url($philosophy_google_plus); ?>"><?php _e("GooglePlus", "philosophy"); ?></a>
                        </li>
                        <?php endif; ?>

                        <?php if ($philosophy_instagram) : ?>
                        <li><a
                                href="<?php echo esc_url($philosophy_instagram); ?>"><?php _e("Instagram", "philosophy"); ?></a>
                        </li>
                        <?php endif; ?>
                    </ul>
                    <?php endif; ?>
                </div>
            </div>

            <div class="s-content__pagenav">
                <div class="s-content__nav">
                    <?php
                    $philosophy_prev_post = get_previous_post();
                    if ($philosophy_prev_post) :
                    ?>
                    <div class="s-content__prev">
                        <a href="<?php echo get_the_permalink($philosophy_prev_post) ?>" rel="prev">
                            <span><?php _e("Previous Post", "philosophy"); ?></span>
                            <?php echo get_the_title($philosophy_prev_post); ?>
                        </a>
                    </div>

                    <?php endif; ?>

                    <?php
                    $philosophy_next_post = get_next_post();
                    if ($philosophy_next_post) :
                    ?>
                    <div class="s-content__next">
                        <a href="<?php echo get_the_permalink($philosophy_next_post) ?>" rel="next">
                            <span><?php _e("Next Post", "philosophy"); ?></span>
                            <?php echo get_the_title($philosophy_next_post); ?>
                        </a>
                    </div>
                    <?php endif; ?>

                </div>
            </div> <!-- end s-content__pagenav -->

        </div> <!-- end s-content__main -->

    </article>


    <!-- comments
        ================================================== -->
    <?php if (is_single() || is_page()) {
        if (!post_password_required() && (comments_open() || get_comments_number())) {
            comments_template();
        }
    } ?>

</section> <!-- s-content -->

<?php get_footer(); ?>