<?php
get_header();
?>

<!-- Page Header Start -->
<div class="container-fluid page-header py-5 dynamic-header">
    <div class="container text-center py-5">
        <h1 class="display-2 text-white mb-4 animated slideInDown">
            <?php echo esc_html(get_the_author_meta('first_name') . ' ' . get_the_author_meta('last_name')); ?>
        </h1>
        <?php if (get_the_author_meta('description')) : ?>
            <p class="text-white mb-4 animated slideInDown"><?php echo esc_html(get_the_author_meta('description')); ?></p>
        <?php endif; ?>
    </div>
</div>
<!-- Page Header End -->

<!-- Blog Start -->
<div class="container-fluid blog py-5 mb-5">
    <div class="container pt-5">
        <?php if (have_posts()) : ?>
            <div class="row g-5 justify-content-center">
                <?php while (have_posts()) : the_post(); ?>
                    <div class="col-lg-6 col-xl-4 wow fadeIn" data-wow-delay=".3s">
                        <div class="blog-item position-relative bg-light rounded">
                            <!-- Feature Image -->
                            <?php if (has_post_thumbnail()) : ?>
                                <a href="<?php echo get_the_permalink(); ?>">
                                    <?php the_post_thumbnail('post-thumbnail', ['class' => 'img-fluid w-100 rounded-top', 'title' => 'Feature image']); ?>
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
                                <a href="<?php echo get_the_permalink(); ?>">
                                    <h4 class="mt-4"><?php the_title(); ?></h4>
                                </a>
                                <span class="text-secondary"><?php echo get_the_date(); ?></span>
                                <p><?php the_excerpt(); ?></p>
                            </div>
                            <div class="blog-coment d-flex justify-content-between px-4 py-2 border bg-primary rounded-bottom">
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php else : ?>
            <h4 class="text-center text-primary">Няма публикации за този автор.</h4>
        <?php endif; ?>

        <!-- Pagination -->
        <div class="text-center py-5">
            <?php
            the_posts_pagination(array(
                'mid_size'  => 2,
                'prev_text' => '<i class="fas fa-chevron-left"></i>',
                'next_text' => '<i class="fas fa-chevron-right"></i>',
                'screen_reader_text' => ' ',
            ));
            ?>
        </div>
    </div>
</div>
<!-- Blog End -->

<?php get_footer(); ?>
