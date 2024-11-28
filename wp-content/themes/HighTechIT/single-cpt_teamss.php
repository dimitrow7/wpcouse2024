<?php 

get_header();
?>

<!DOCTYPE html>
<html lang="en">

<!-- Page Header Start -->
<div class="container-fluid page-header py-5 dynamic-header">
    <div class="container text-center py-5">
        <h1 class="display-2 text-white mb-4 animated slideInDown"><?php echo get_the_title(); ?></h1>
        <div class="col-md-6 col-lg-8 mx-auto wow fadeIn text-white" data-wow-delay=".3s" style="max-width: 90%;">
            <?php if ( function_exists( 'custom_breadcrumbs' ) ) {
                custom_breadcrumbs();
            } ?> 
        </div>
    </div>
</div>
<!-- Page Header End -->

<!-- Team Member Details Start -->
<div class="container-fluid py-5 my-5">
    <div class="row justify-content-center">
        <div class="col-lg-3 col-md-4 text-center">
            <?php 
            $team_member_image = get_field('team_member_image');
            if ($team_member_image): ?>
                <img src="<?php echo esc_url($team_member_image['url']); ?>" alt="<?php echo esc_attr($team_member_image['alt']); ?>" class="img-fluid rounded-circle" style="width: 100%; max-width: 200px;">
            <?php endif; ?>
        </div>
        <div class="col-lg-6 col-md-8">
            <div class="team-member-details">
                <?php 
                $team_member_name = get_field('team_member_name');
                $team_member_position = get_field('team_member_position');
                $team_member_description = get_field('team_member_description');
                ?>
                
                <?php if ($team_member_name): ?>
                    <h2 class="mb-3"><?php echo esc_html($team_member_name); ?></h2>
                <?php endif; ?>
                
                <?php if ($team_member_position): ?>
                    <h4 class="text-primary mb-4"><?php echo esc_html($team_member_position); ?></h4>
                <?php endif; ?>
                
                <?php if ($team_member_description): ?>
                    <p class="text-secondary"><?php echo wp_kses_post($team_member_description); ?></p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<!-- Team Member Details End -->

<!-- Related Team Members Start -->
<div class="container-fluid related-team my-5">
    <div class="container py-5">
        <div class="text-center mx-auto pb-5 wow fadeIn" data-wow-delay=".3s" style="max-width: 600px;">
            <h5 class="text-primary"><?php _e('Екип', 'softuni'); ?></h5>
            <h1><?php _e('Други членове на екипа', 'softuni'); ?></h1>
        </div>
        <div class="row g-5 justify-content-center">
            <?php
            $related_teams = new WP_Query( array(
                'post_type'      => 'cpt_teamss',
                'posts_per_page' => 3,
                'post__not_in'   => array( get_the_ID() ),
            ) );

            if ( $related_teams->have_posts() ) {
                while ( $related_teams->have_posts() ) {
                    $related_teams->the_post();
                    $related_image = get_field('team_member_image');
                    ?>
                    <div class="col-lg-4 col-md-6 wow fadeIn" data-wow-delay=".3s">
                        <div class="team-item position-relative bg-light rounded">
                            <?php if ($related_image): ?>
                                <img src="<?php echo esc_url($related_image['url']); ?>" class="img-fluid rounded-top" alt="<?php the_title(); ?>" style="height: 200px; object-fit: cover;">
                            <?php endif; ?>
                            <div class="team-content text-center px-3 py-4">
                                <h5><?php the_title(); ?></h5>
                                <a href="<?php the_permalink(); ?>" class="btn btn-primary mt-2"><?php _e('Виж профил', 'softuni'); ?></a>
                            </div>
                        </div>
                    </div>
                <?php }
                wp_reset_postdata();
            } else {
                echo '<p class="text-center">' . __('Няма намерени членове на екипа.', 'softuni') . '</p>';
            }
            ?>
        </div>
    </div>
</div>
<!-- Related Team Members End -->

<?php get_footer(); ?>

</html>
