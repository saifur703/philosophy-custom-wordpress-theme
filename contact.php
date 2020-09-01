<?php
/* 
Template Name: Contact Page
*/
get_header();
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

        <div class="s-content__media col-full">
            <?php
            if (function_exists("the_field")) {
                $google_map = get_field("google_map");
                echo do_shortcode($google_map);
            }
            ?>
        </div> <!-- end s-content__media -->

        <div class="col-full s-content__main">
            <?php the_content();

            if (function_exists("the_field")) : ?>
            <div class="row">
                <?php
                    $contact_left_information = get_field("contact_left_information");
                    $contact_right_information = get_field("contact_right_information");
                    ?>
                <div class="col-six tab-full">
                    <h3><?php echo esc_html($contact_left_information['contact_left_title']); ?></h3>

                    <p>
                        <?php echo esc_html($contact_left_information['contact_left_description']); ?>
                    </p>

                </div>

                <div class="col-six tab-full">
                    <h3><?php echo esc_html($contact_right_information['contact_right_title']); ?></h3>

                    <p>
                        <?php echo esc_html($contact_right_information['contact_right_description']); ?>
                    </p>

                </div>

            </div> <!-- end row -->
            <?php endif; ?>

            <h3><?php _e("Say Hello.", "philosophy"); ?></h3>

            <?php
            if (function_exists("the_field")) {
                $contact_form_7_shortcode = get_field("contact_form_7_shortcode");
                echo do_shortcode($contact_form_7_shortcode);
            }
            ?>


        </div> <!-- end s-content__main -->

    </div> <!-- end row -->

</section> <!-- s-content -->

<?php get_footer(); ?>