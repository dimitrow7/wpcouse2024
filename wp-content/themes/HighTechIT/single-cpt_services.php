<?php
get_header();
global $post;
?>

<!DOCTYPE html>
<html lang="en">

<!-- Page Header Start -->
<div class="container-fluid page-header py-5 dynamic-header">
    <div class="container text-center py-5">
        <h1 class="display-2 text-white mb-4 animated slideInDown"><?php echo get_the_title(); ?></h1>
        <div class="col-md-6 col-lg-8 mx-auto wow fadeIn text-white" data-wow-delay=".3s" style="max-width: 90%;">
            <?php if (function_exists('custom_breadcrumbs')) {
                custom_breadcrumbs();
            } ?>
        </div>
    </div>
</div>
<!-- Page Header End -->

<!-- Service Details Start -->
<div class="container-fluid py-5 my-5">
    <div class="col-md-6 col-lg-8 mx-auto wow fadeIn" data-wow-delay=".3s" style="max-width: 90%;">
        <?php
        // Display Service Details
        $service_type = get_post_meta(get_the_ID(), '_service_type', true);
        $start_price = get_post_meta(get_the_ID(), '_start_price', true);
        $service_like = get_post_meta(get_the_ID(), 'votes', true) ?? 0;

        if ($service_type || $start_price) {
            echo '<div class="service-details bg-light p-4 rounded mb-4">';
            if ($service_type) {
                echo '<p><strong>' . __('Тип услуга:', 'softuni') . '</strong> ' . esc_html($service_type) . '</p>';
            }
            if ($start_price) {
                echo '<p><strong>' . __('Стартова цена:', 'softuni') . '</strong> ' . esc_html($start_price) . ' лв</p>';
            }
            echo '</div>';
        }
        ?>

        <div class="service-content">
            <?php the_content(); ?>
        </div>


        <div>
            <a href="#" class="like" id="service-<?php echo get_the_ID(); ?>" data-id="<?php echo get_the_ID(); ?>">👍🏻 LIKE (<?php echo $service_like ?>)</a>
        </div>
    </div>
</div>
<!-- Service Details End -->

<!-- Related Services Start -->
<div class="container-fluid related-services my-5">
    <div class="container py-5">
        <div class="text-center mx-auto pb-5 wow fadeIn" data-wow-delay=".3s" style="max-width: 600px;">
            <h5 class="text-primary"><?php _e('Услуги', 'softuni'); ?></h5>
            <h1><?php _e('Още услуги, които може да ви интересуват', 'softuni'); ?></h1>
        </div>
        <div class="row g-5 justify-content-center">
            <?php
            $related_services = new WP_Query(array(
                'post_type'      => 'cpt_services',
                'posts_per_page' => 3,
                'post__not_in'   => array(get_the_ID()),
            ));

            if ($related_services->have_posts()) {
                while ($related_services->have_posts()) {
                    $related_services->the_post(); ?>
                    <div class="col-lg-6 col-xl-4 wow fadeIn" data-wow-delay=".3s">
                        <div class="service-item position-relative bg-light rounded">
                            <?php if (has_post_thumbnail()) { ?>
                                <img src="<?php the_post_thumbnail_url(); ?>" class="img-fluid w-100 rounded-top" alt="<?php the_title(); ?>">
                            <?php } ?>
                            <div class="service-content text-center px-3 py-4">
                                <h5 class=""><?php the_title(); ?></h5>
                                <a href="<?php the_permalink(); ?>" class="btn btn-primary mt-2"><?php _e('Виж повече', 'softuni'); ?></a>
                            </div>
                        </div>
                    </div>
            <?php }
                wp_reset_postdata();
            } else {
                echo '<p class="text-center">' . __('Няма намерени услуги.', 'softuni') . '</p>';
            }
            ?>
        </div>
    </div>
</div>
<!-- Related Services End -->

<?php get_footer(); ?>

</html>