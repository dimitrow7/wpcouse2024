<!-- Testimonial Start -->
<div class="container-fluid testimonial ">
    <div class="container">
        <div class="text-center mx-auto pb-5 wow fadeIn" data-wow-delay=".3s" style="max-width: 600px;">
            <h5 class="text-primary">Нашите клиенти</h5>
            <h1>Какво казват за нас!</h1>
        </div>
        <div class="owl-carousel testimonial-carousel wow fadeIn" data-wow-delay=".5s">
            <?php
            // WP_Query за testimonials
            $testimonial_query = new WP_Query(array(
                'post_type'      => 'testimonial',
                'posts_per_page' => -1,
                'post_status'    => 'publish',
            ));

            if ($testimonial_query->have_posts()) :
                while ($testimonial_query->have_posts()) : $testimonial_query->the_post();
                    // ACF полета
                    $testimonial_image = get_field('testimonial_image');
                    $testimonial_name = get_field('testimonial_name');
                    $testimonial_position = get_field('testimonial_position');
                    $testimonial_content = get_field('testimonial_content');
                    $testimonial_rating = get_field('testimonial_rating');
            ?>
                    <div class="testimonial-item border p-4">
                        <div class="d-flex align-items-center">
                            <div class="">
                                <!-- Изображение с фиксиран размер -->
                                <?php if ($testimonial_image) : ?>
                                    <img src="<?php echo esc_url($testimonial_image); ?>" alt="<?php echo esc_attr($testimonial_name); ?>" class="rounded-circle" style="width: 96px; height: 96px; object-fit: cover;">
                                <?php else : ?>
                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/default-testimonial.jpg" alt="Default Image" class="rounded-circle" style="width: 96px; height: 96px; object-fit: cover;">
                                <?php endif; ?>
                            </div>
                            <div class="ms-4">
                                <!-- Име на клиента -->
                                <?php if ($testimonial_name) : ?>
                                    <h4 class="text-secondary"><?php echo esc_html($testimonial_name); ?></h4>
                                <?php endif; ?>
                                <!-- Позиция -->
                                <?php if ($testimonial_position) : ?>
                                    <p class="m-0 pb-3"><?php echo esc_html($testimonial_position); ?></p>
                                <?php endif; ?>
                                <!-- Рейтинг -->
                                <div class="d-flex pe-5">
                                    <?php
                                    if ($testimonial_rating && $testimonial_rating > 0) {
                                        for ($i = 1; $i <= $testimonial_rating; $i++) {
                                            echo '<i class="fas fa-star me-1 text-primary"></i>';
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="border-top mt-4 pt-3">
                            <!-- Текст на отзива -->
                            <?php if ($testimonial_content) : ?>
                                <p class="mb-0"><?php echo wp_trim_words(wp_kses_post($testimonial_content), 20, '...'); ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
            <?php
                endwhile;
                wp_reset_postdata();
            else :
                echo '<p>' . __('Няма намерени отзиви.', 'softuni') . '</p>';
            endif;
            ?>
        </div>
    </div>
</div>
<!-- Testimonial End -->
