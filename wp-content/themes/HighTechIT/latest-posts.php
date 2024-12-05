<?php
$latest_posts_args = array(
    'post_type'      => 'post',
    'post_status'    => 'publish',
    'posts_per_page' => 3,
);

$latest_posts_query = new WP_Query($latest_posts_args);
?>

<?php if ($latest_posts_query->have_posts()) : ?>
    <!-- Blog Start -->
    <div class="container-fluid blog py-5 mb-5">
        <div class="container">
            <div class="text-center mx-auto pb-5 wow fadeIn" data-wow-delay=".3s" style="max-width: 600px;">
                <h5 class="text-primary">НОВИНИ</h5>
                <h1>Най-новото от блога</h1>
            </div>
            <div class="row g-5 justify-content-center">
                <?php while ($latest_posts_query->have_posts()) : $latest_posts_query->the_post(); ?>
                    <div class="col-lg-6 col-xl-4 wow fadeIn" data-wow-delay=".3s">
                        <div class="blog-item position-relative bg-light rounded">
                            <!-- Feature Image -->
                            <?php if (has_post_thumbnail()) : ?>
                                <a href="<?php the_permalink(); ?>">
                                    <div class="img-wrapper" style="height: 250px; overflow: hidden; position: relative;">
                                        <?php the_post_thumbnail('medium', ['class' => 'img-fluid w-100 h-100', 'style' => 'object-fit: cover;', 'title' => 'Feature image']); ?>
                                    </div>
                                </a>
                            <?php endif; ?>

                            <!-- Category -->
                            <span class="position-absolute px-4 py-3 bg-primary text-white rounded" style="top: -28px; right: 20px;">
                                <?php
                                $categories = get_the_category();
                                if (!empty($categories)) {
                                    $first_category = $categories[0];
                                    echo '<a class="text-white" href="' . esc_url(get_category_link($first_category->term_id)) . '">' . esc_html($first_category->name) . '</a>';
                                }
                                ?>
                            </span>

                            <!-- Content -->
                            <div class="blog-content text-center position-relative px-3" style="margin-bottom: 25px;">
                                <a href="<?php the_permalink(); ?>">
                                    <h4 class="mt-4"><?php the_title(); ?></h4>
                                </a>
                                <span class="text-secondary"><?php echo get_the_date(); ?></span>
                                <p class=""><?php the_excerpt(); ?></p>
                            </div>

                            <!-- Author and Comments -->
                            <div class="blog-coment d-flex justify-content-between px-4 py-2 border bg-primary rounded-bottom">
                                <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>" class="text-white">
                                    <small><i class="fa fa-user me-2 text-secondary"></i>
                                        Автор: <?php echo esc_html(get_the_author_meta('first_name') . ' ' . get_the_author_meta('last_name')); ?>
                                    </small>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
            <div class="text-center pt-5">
                <a href="<?php echo get_permalink(get_option('page_for_posts')); ?>" class="btn btn-primary text-white px-5 py-3 rounded-pill">
                    Виж всички новини
                </a>
            </div>
        </div>
    </div>
    <!-- Blog End -->
<?php endif; ?>
<?php wp_reset_postdata(); ?>