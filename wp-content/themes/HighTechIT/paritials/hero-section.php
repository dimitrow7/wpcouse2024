<!-- Carousel Start -->
<div class="container-fluid px-0">
    <div id="carouselId" class="carousel slide" data-bs-ride="carousel">
        <?php
        // Query за публикации от CPT slider
        $slider_query = new WP_Query(array(
            'post_type'      => 'slider',
            'posts_per_page' => -1, // Вземаме всички слайдове
            'post_status'    => 'publish',
        ));
        ?>

        <!-- Carousel Indicators -->
        <ol class="carousel-indicators">
            <?php if ($slider_query->have_posts()): ?>
                <?php $slide_index = 0; ?>
                <?php while ($slider_query->have_posts()): $slider_query->the_post(); ?>
                    <li data-bs-target="#carouselId" data-bs-slide-to="<?php echo $slide_index; ?>" class="<?php echo $slide_index === 0 ? 'active' : ''; ?>" aria-label="Slide <?php echo $slide_index + 1; ?>"></li>
                    <?php $slide_index++; ?>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            <?php endif; ?>
        </ol>

        <!-- Carousel Items -->
        <div class="carousel-inner" role="listbox">
            <?php if ($slider_query->have_posts()): ?>
                <?php $slide_index = 0; ?>
                <?php while ($slider_query->have_posts()): $slider_query->the_post(); ?>
                    <?php
                    // ACF полета
                    $before_headline = get_field('before_headline');
                    $after_headline = get_field('after_headline');
                    $button_1_text = get_field('button_1_text');
                    $button_1_url = get_field('button_1_url');
                    $button_2_text = get_field('button_2_text');
                    $button_2_url = get_field('button_2_url');
                    $feature_image = get_the_post_thumbnail_url(get_the_ID(), 'full'); // Featured Image
                    ?>
                    <div class="carousel-item <?php echo $slide_index === 0 ? 'active' : ''; ?>">
                        <img src="<?php echo esc_url($feature_image); ?>" class="img-fluid" alt="<?php the_title_attribute(); ?>">
                        <div class="carousel-caption">
                            <div class="container carousel-content">
                                <?php if (!empty($before_headline)): ?>
                                    <h6 class="text-secondary h4 animated fadeInUp"><?php echo esc_html($before_headline); ?></h6>
                                <?php endif; ?>
                                <h1 class="text-white display-1 mb-4 animated fadeInRight"><?php the_title(); ?></h1>
                                <?php if (!empty($after_headline)): ?>
                                    <p class="mb-4 text-white fs-5 animated fadeInDown"><?php echo esc_html($after_headline); ?></p>
                                <?php endif; ?>
                                <?php if (!empty($button_1_text) && !empty($button_1_url)): ?>
                                    <a href="<?php echo esc_url($button_1_url); ?>" class="me-2">
                                        <button type="button" class="px-4 py-sm-3 px-sm-5 btn btn-primary rounded-pill carousel-content-btn1 animated fadeInLeft"><?php echo esc_html($button_1_text); ?></button>
                                    </a>
                                <?php endif; ?>
                                <?php if (!empty($button_2_text) && !empty($button_2_url)): ?>
                                    <a href="<?php echo esc_url($button_2_url); ?>" class="ms-2">
                                        <button type="button" class="px-4 py-sm-3 px-sm-5 btn btn-primary rounded-pill carousel-content-btn2 animated fadeInRight"><?php echo esc_html($button_2_text); ?></button>
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <?php $slide_index++; ?>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            <?php else: ?>
                <p><?php _e('No slides found.', 'softuni'); ?></p>
            <?php endif; ?>
        </div>

        <!-- Carousel Controls -->
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselId" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden"><?php _e('Previous', 'softuni'); ?></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselId" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden"><?php _e('Next', 'softuni'); ?></span>
        </button>
    </div>
</div>
<!-- Carousel End -->



        <!-- Fact Start -->
        <div class="container-fluid bg-secondary py-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 wow fadeIn" data-wow-delay=".1s">
                        <div class="d-flex counter">
                        <h1 class="me-3 text-primary"><i class="fas fa-tags"></i></h1>
                            <h5 class="text-white mt-1"><?php echo $args['hero_message_1'] ?></h5>
                        </div>
                    </div>
                    <div class="col-lg-3 wow fadeIn" data-wow-delay=".3s">
                        <div class="d-flex counter">
                        <h1 class="me-3 text-primary"><i class="far fa-star"></i></h1>
                            <h5 class="text-white mt-1"><?php echo $args['hero_message_2'] ?></h5>
                        </div>
                    </div>
                    <div class="col-lg-3 wow fadeIn" data-wow-delay=".5s">
                        <div class="d-flex counter">
                            <h1 class="me-3 text-primary"><i class="far fa-clock"></i></h1>
                            <h5 class="text-white mt-1"><?php echo $args['hero_message_3'] ?></h5>
                        </div>
                    </div>
                    <div class="col-lg-3 wow fadeIn" data-wow-delay=".7s">
                        <div class="d-flex counter">
                        <h1 class="me-3 text-primary"><i class="fas fa-award"></i></h1>
                            <h5 class="text-white mt-1"><?php echo $args['hero_message_4'] ?></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Fact End -->