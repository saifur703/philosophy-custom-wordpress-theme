<?php

$philosophy_fp = new WP_Query(array(
    'meta_key'      =>  'featured',
    'meta_value'    =>  '1',
    'order'       =>  "ASC"
));

$post_data = array();

while ($philosophy_fp->have_posts()) {
    $philosophy_fp->the_post();
    $categories = get_the_category();
    $category = $categories[mt_rand(0, count($categories) - 1)];
    $post_data[] = array(
        'title'     =>  get_the_title(),
        'permalink' =>  get_permalink(),
        'date'      =>  get_the_date(),
        'thumb'     =>  get_the_post_thumbnail_url(get_the_ID(), 'large'),
        'author'    =>  get_the_author_meta('display_name'),
        'author_url' =>  get_author_posts_url(get_the_author_meta("ID")),
        'author_avatar' =>   get_avatar_url(get_the_author_meta('ID')),
        'cat'           =>  $categories[0]->name,
        "cat_link"      =>  get_category_link($category),
    );
}


// echo "<pre>";
// print_r($post_data);
// echo "</pre>";
if ($philosophy_fp->post_count > 1) :
?>

<div class="pageheader-content row">
    <div class="col-full">

        <div class="featured">

            <div class="featured__column featured__column--big">
                <div class="entry" style="background-image:url('<?php echo esc_url($post_data[0]['thumb']); ?>');">

                    <div class="entry__content">
                        <span class="entry__category"><a
                                href="<?php echo esc_url($post_data[0]['cat_link']); ?>"><?php echo esc_html($post_data[0]['cat']); ?></a></span>

                        <h1><a href="<?php echo esc_url($post_data[0]['permalink']); ?>"
                                title="<?php echo esc_attr($post_data[0]['title']); ?>"><?php echo esc_html($post_data[0]['title']); ?></a>
                        </h1>

                        <div class="entry__info">
                            <a href="<?php echo esc_url($post_data[0]['author_url']); ?>" class="entry__profile-pic">
                                <img class="avatar" src="<?php echo esc_url($post_data[0]['author_avatar']) ?>"
                                    alt="<?php echo esc_html($post_data[0]['title']); ?>">
                            </a>

                            <ul class="entry__meta">
                                <li><a
                                        href="<?php echo esc_url($post_data[0]['author_url']); ?>"><?php echo esc_html($post_data[0]['author']); ?></a>
                                </li>
                                <li><?php echo esc_html($post_data[0]['date']); ?></li>
                            </ul>
                        </div>
                    </div> <!-- end entry__content -->

                </div> <!-- end entry -->
            </div> <!-- end featured__big -->

            <div class="featured__column featured__column--small">
                <?php for ($i = 1; $i < 3; $i++) : ?>
                <div class="entry" style="background-image:url('<?php echo esc_url($post_data[$i]['thumb']); ?>');">


                    <div class="entry__content">
                        <span class="entry__category"><a
                                href="<?php echo esc_url($post_data[$i]['cat_link']); ?>"><?php echo esc_html($post_data[$i]['cat']); ?></a></span>

                        <h1><a href="<?php echo esc_url($post_data[$i]['permalink']); ?>"
                                title="<?php echo esc_attr($post_data[$i]['title']); ?>"><?php echo esc_html($post_data[$i]['title']); ?></a>
                        </h1>

                        <div class="entry__info">
                            <a href="<?php echo esc_url($post_data[$i]['author_url']); ?>" class="entry__profile-pic">
                                <img class="avatar" src="<?php echo esc_url($post_data[$i]['author_avatar']) ?>"
                                    alt="<?php echo esc_attr($post_data[$i]['title']); ?>">
                            </a>

                            <ul class="entry__meta">
                                <li><a
                                        href="<?php echo esc_url($post_data[$i]['author_url']); ?>"><?php echo esc_html($post_data[$i]['author']); ?></a>
                                </li>
                                <li><?php echo esc_html($post_data[$i]['date']); ?></li>
                            </ul>
                        </div>
                    </div> <!-- end entry__content -->
                </div> <!-- end entry -->
                <?php endfor; ?>



            </div> <!-- end featured__small -->
        </div> <!-- end featured -->

    </div> <!-- end col-full -->
</div> <!-- end pageheader-content row -->
<?php endif; ?>

<?php the_title(); ?>