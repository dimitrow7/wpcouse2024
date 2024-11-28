<!-- Team Start -->
<div class="container-fluid py-5 mb-5 team">
    <div class="container">
        <div class="text-center mx-auto pb-5 wow fadeIn" data-wow-delay=".3s" style="max-width: 600px;">
            <h5 class="text-primary"><?php _e('ЕКИП', 'softuni'); ?></h5>
            <h1><?php _e('Да се запознаем', 'softuni'); ?></h1>
        </div>
        <div class="owl-carousel team-carousel wow fadeIn" data-wow-delay=".5s">
            <?php
            // Query for team members
            $team_query = new WP_Query(array(
                'post_type'      => 'cpt_teamss', // Името на CPT
                'posts_per_page' => -1, // Вземи всички членове
                'post_status'    => 'publish',
            ));

            if ($team_query->have_posts()) :
                while ($team_query->have_posts()) : $team_query->the_post();
                    $team_image = get_field('team_member_image');
                    $team_name = get_field('team_member_name');
                    $team_position = get_field('team_member_position');
                    $team_description = get_field('team_member_description');
            ?>
                    <div class="rounded team-item">
                        <div class="team-content">
                            <div class="team-img-icon">
                                <div class="team-img rounded-circle">
                                    <?php if ($team_image): ?>
                                        <img src="<?php echo esc_url($team_image['url']); ?>" alt="<?php echo esc_attr($team_image['alt']); ?>" class="img-fluid w-100 rounded-circle">
                                    <?php else: ?>
                                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/default-team.jpg" alt="<?php _e('Default Image', 'softuni'); ?>" class="img-fluid w-100 rounded-circle">
                                    <?php endif; ?>
                                </div>
                                <div class="team-name text-center py-3">
                                    <?php if ($team_name): ?>
                                        <?php if ($team_name): ?>
                                            <h4><a href="<?php the_permalink(); ?>" class="text-dark text-decoration-none"><?php echo esc_html($team_name); ?></a></h4>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                    <?php if ($team_position): ?>
                                        <p class="m-0"><?php echo esc_html($team_position); ?></p>
                                    <?php endif; ?>
                                </div>
                                <div class="team-icon d-flex justify-content-center pb-4">
                                    <a class="btn btn-square btn-secondary text-white rounded-circle m-1" href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a class="btn btn-square btn-secondary text-white rounded-circle m-1" href="#"><i class="fab fa-twitter"></i></a>
                                    <a class="btn btn-square btn-secondary text-white rounded-circle m-1" href="#"><i class="fab fa-instagram"></i></a>
                                    <a class="btn btn-square btn-secondary text-white rounded-circle m-1" href="#"><i class="fab fa-linkedin-in"></i></a>
                                </div>
                                <?php if ($team_description): ?>
                                    <div class="team-description text-center">
                                        <p><?php echo wp_kses_post($team_description); ?></p>
                                        <br>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
            <?php
                endwhile;
                wp_reset_postdata();
            else:
                echo '<p>' . __('No team members found.', 'softuni') . '</p>';
            endif;
            ?>
        </div>
    </div>
</div>
<!-- Team End -->
