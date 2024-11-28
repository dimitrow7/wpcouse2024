<?php
get_header();
global $post;
$postcat = get_the_category($post->ID);
?>

<!DOCTYPE html>
<html lang="en">
<!-- Page Header Start -->
<div class="container-fluid page-header py-5 dynamic-header">
    <div class="container text-center py-5">
        <div class="container text-center py-3">
            <?php $categories = get_the_category();
            if (!empty($categories)) {
                foreach ($categories as $category) {
                    echo '<span class="px-3 py-1 mr-4 bg-secondary rounded"><a class="text-white" href="' . esc_url(get_category_link($category->term_id)) . '" class="post-category">' . esc_html($category->name) . '</a></span>';
                }
            } ?>
        </div>
        <h1 class="display-2 text-white mb-4 animated slideInDown"><?php echo get_the_title(); ?></h1>
        <div class="col-md-6 col-lg-8 mx-auto wow fadeIn text-white" data-wow-delay=".3s" style="max-width: 90%;">
            <?php if (function_exists('custom_breadcrumbs')) {
                custom_breadcrumbs();
            } ?>
        </div>
    </div>
</div>
<!-- Page Header End -->

<!-- Blog content start  -->
<div class="container-fluid py-5 my-5">
    <div class="col-md-6 col-lg-8 mx-auto wow fadeIn" data-wow-delay=".3s" style="max-width: 90%;">
        <?php the_content(); ?>
    </div>
</div>
<!-- Blog content end  -->

<!-- Related Posts Start -->
<div class="container-fluid blog py-5">
    <div class="container">
        <div class="text-center mx-auto pb-5 wow fadeIn" data-wow-delay=".3s" style="max-width: 600px;">
            <h5 class="text-primary">Свързани статии</h5>
            <h1>Може би ще ви е интересно</h1>
        </div>
        <div class="row g-5 justify-content-center">
            <?php
            // Query for related posts
            $categories = wp_get_post_categories($post->ID);
            $related_args = array(
                'category__in'   => $categories,
                'post__not_in'   => array($post->ID),
                'posts_per_page' => 3,
                'post_status'    => 'publish',
            );
            $related_query = new WP_Query($related_args);

            if ($related_query->have_posts()) :
                while ($related_query->have_posts()) : $related_query->the_post(); ?>
                    <div class="col-lg-4 wow fadeIn" data-wow-delay=".3s">
                        <div class="blog-item position-relative bg-light rounded">
                            <?php if (has_post_thumbnail()) : ?>
                                <a href="<?php the_permalink(); ?>">
                                    <div class="img-wrapper" style="height: 250px; overflow: hidden;">
                                        <?php the_post_thumbnail('medium', ['class' => 'img-fluid w-100 h-100', 'style' => 'object-fit: cover;', 'title' => 'Feature image']); ?>
                                    </div>
                                </a>
                            <?php endif; ?>
                            <div class="blog-content text-center px-3 mt-3">
                                <a href="<?php the_permalink(); ?>">
                                    <h4 class="mb-3"><?php the_title(); ?></h4>
                                </a>
                                <span class="text-secondary"><?php echo get_the_date(); ?></span>
                                <p class="mt-2"><?php echo wp_trim_words(get_the_excerpt(), 15, '...'); ?></p>
                            </div>
                        </div>
                    </div>
                <?php endwhile;
                wp_reset_postdata();
            else : ?>
                <p class="text-center text-secondary">Няма свързани статии.</p>
            <?php endif; ?>
        </div>
    </div>
</div>
<!-- Related Posts End -->

<?php get_footer(); ?>

</html>