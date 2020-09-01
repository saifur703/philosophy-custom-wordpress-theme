<div class="comments-wrap">

    <div id="comments" class="row">
        <div class="col-full">

            <h3 class="h2">
                <?php
                $philosophy_cn = get_comments_number();
                if ($philosophy_cn <= 1) {
                    echo esc_html($philosophy_cn) . " " . __("Comment", "philosophy");
                } else {
                    echo esc_html($philosophy_cn) . " " . __("Comments", "philosophy");
                }
                ?>
            </h3>

            <!-- commentlist -->
            <ol class="commentlist">
                <?php
                wp_list_comments();

                if (!comments_open()) {
                    _e("Comments are closed", "text-domain");
                }
                ?>
            </ol> <!-- end commentlist -->


            <!-- respond
                    ================================================== -->
            <div class="respond">

                <h3 class="h2"><?php _e("Add Comment", "philosophy"); ?></h3>
                <?php comment_form(
                    array(
                        'title_reply' => '',
                    )
                );
                ?>

            </div> <!-- end respond -->

        </div> <!-- end col-full -->

    </div> <!-- end row comments -->
</div> <!-- end comments-wrap -->