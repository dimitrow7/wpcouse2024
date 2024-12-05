<?php
get_header(); ?>

<div class="container-fluid page-header py-5 dynamic-header">
    <div class="container text-center py-5">
        <h1 class="display-2 text-white mb-4 animated slideInDown">Услуги</h1>
    </div>
</div>

<div class="container-fluid py-5">
    <div class="container">
        <?php if (have_posts()) : ?>
            <div class="row g-5">
                <?php while (have_posts()) : the_post(); ?>
                    <div class="col-md-6 col-lg-4">
                        <div class="service-item bg-light p-4 rounded">
                            <?php if (has_post_thumbnail()) : ?>
                                <a href="<?php the_permalink(); ?>">
                                    <div class="img-wrapper" style="height: 200px; width: 100%; overflow: hidden;">
                                        <?php the_post_thumbnail('medium', ['class' => 'img-fluid w-100 h-100', 'style' => 'object-fit: cover;']); ?>
                                    </div>
                                </a>
                            <?php endif; ?>
                            <h4 class="mt-3">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h4>
                            <p><?php echo wp_trim_words(get_the_excerpt(), 20); ?></p>
                            <a href="<?php the_permalink(); ?>" class="btn btn-primary text-white">Виж повече</a>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
            <div class="text-center mt-4">
                <?php the_posts_pagination(); ?>
            </div>
        <?php else : ?>
            <h4 class="text-center"><?php _e('Няма намерени услуги.', 'softuni'); ?></h4>
        <?php endif; ?>
    </div>
</div>

<?php get_footer(); ?>