<!-- Services Start -->
<div class="container-fluid services py-5 mb-5">
    <div class="container">
        <div class="text-center mx-auto pb-5 wow fadeIn" data-wow-delay=".3s" style="max-width: 600px;">
            <h5 class="text-primary">Услуги</h5>
            <h1>Услуги, създадени специално за вашия бизнес</h1>
        </div>
        <div class="row g-5 services-inner">
            <?php
            $services_query = new WP_Query(array(
                'post_type'      => 'cpt_services',
                'posts_per_page' => -1,
                'post_status'    => 'publish',
            ));

            if ($services_query->have_posts()) :
                while ($services_query->have_posts()) : $services_query->the_post();
                    $service_icon = get_post_meta(get_the_ID(), '_service_icon', true);
                    $start_price = get_post_meta(get_the_ID(), '_start_price', true);
                    ?>
                    <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay=".3s">
                        <div class="services-item bg-light">
                            <div class="p-4 text-center services-content">
                                <div class="services-content-icon">
                                    <i class="<?php echo esc_attr($service_icon); ?> fa-7x mb-4 text-primary"></i>
                                    <h4 class="mb-3"><?php the_title(); ?></h4>
                                    <p class="mb-4"><?php the_excerpt(); ?></p>
                                    <p class="mb-4"><?php echo esc_attr('Стартова цена: ' . $start_price . ' лв.'); ?></p>
                                    <a href="<?php the_permalink(); ?>" class="btn btn-secondary text-white px-5 py-3 rounded-pill">
                                        Подробности
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endwhile;
                wp_reset_postdata();
            else : ?>
                <p><?php _e('No services found.', 'softuni'); ?></p>
            <?php endif; ?>
        </div>
    </div>
</div>
<!-- Services End -->
