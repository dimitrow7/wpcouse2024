<?php 
get_header();
global $post;
?>

<!-- Page Header Start -->
<div class="container-fluid page-header py-5 dynamic-header">
    <div class="container text-center py-5">
        <h1 class="display-2 text-white mb-4 animated slideInDown">
            <?php
            if (is_date()) {
                echo __('Публикации по дата: ', 'softuni') . get_the_date('F Y');
                echo get_the_archive_title();
            }
            ?>
        </h1>
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
                            <?php if (has_post_thumbnail()) : ?>
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail('medium', ['class' => 'img-fluid w-100 rounded-top', 'title' => get_the_title()]); ?>
                                </a>
                            <?php endif; ?>
                            <span class="position-absolute px-4 py-3 bg-primary text-white rounded" style="top: -28px; right: 20px;">
                                <?php
                                $categories = get_the_category();
                                if (!empty($categories)) {
                                    $first_category = $categories[0];
                                    echo '<a class="text-white" href="' . esc_url(get_category_link($first_category->term_id)) . '">' . esc_html($first_category->name) . '</a>';
                                }
                                ?>
                            </span>
                            <div class="blog-content text-center position-relative px-3" style="margin-bottom: 25px;">
                                <a href="<?php the_permalink(); ?>"><h4 class="mt-4"><?php the_title(); ?></h4></a>
                                <span class="text-secondary"><?php echo get_the_date(); ?></span>
                                <p class=""><?php the_excerpt(); ?></p>
                            </div>
                            <div class="blog-coment d-flex justify-content-between px-4 py-2 border bg-primary rounded-bottom">
                                <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>" class="text-white">
                                    <small><i class="fa fa-user me-2 text-secondary"></i><?php echo __('Автор: ', 'softuni') . get_the_author_meta('display_name'); ?></small>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php else : ?>
            <h4 class="text-center"><?php _e('Няма публикации за избраната дата.', 'softuni'); ?></h4>
        <?php endif; ?>

        <!-- Pagination -->
        <div class="col-xs-1 text-center py-5 mb-5">
            <?php the_posts_pagination(array(
                'mid_size'  => 2,
                'prev_text' => __('&laquo; Предишна', 'softuni'),
                'next_text' => __('Следваща &raquo;', 'softuni'),
            )); ?>
        </div>
    </div>
</div>
<!-- Blog End -->

<?php get_footer(); ?>
