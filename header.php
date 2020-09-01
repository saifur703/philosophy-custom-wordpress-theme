<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo("charset") ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- favicons
    ================================================== -->
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <?php wp_head();
    $s_pageheader__home = "";
    if (is_home()) {
        $s_pageheader__home = "s-pageheader--home";
    }
    ?>
</head>

<body id="top" <?php body_class(); ?>>

    <!-- pageheader
    ================================================== -->
    <section class="s-pageheader <?php echo esc_attr($s_pageheader__home); ?>">

        <header class="header">
            <div class="header__content row">

                <div class="header__logo">
                    <?php if (has_custom_logo()) { ?>
                    <a class="logo" href="<?php echo site_url(); ?>">
                        <?php the_custom_logo(); ?>
                    </a>
                    <?php } else { ?>
                    <h1><a href="<?php echo site_url(); ?>"><?php bloginfo("name"); ?></a></h1>
                    <?php } ?>
                </div> <!-- end header__logo -->
                <ul class="header__social">
                    <?php if (is_active_sidebar("header_left_social")) {
                        dynamic_sidebar("header_left_social");
                    } ?>
                </ul>
                <!-- end header__social -->

                <a class="header__search-trigger" href="#0"></a>

                <div class="header__search">

                    <?php echo get_search_form(); ?>


                    <a href="#0" title="Close Search"
                        class="header__overlay-close"><?php _e("Close", "philosophy"); ?></a>

                </div> <!-- end header__search -->


                <?php get_template_part("template-parts/primary-menu"); ?>

            </div> <!-- header-content -->
        </header> <!-- header -->

        <?php if (is_home()) {
            get_template_part("template-parts/featured-post");
        } ?>

    </section> <!-- end s-pageheader -->