<?php

/**
 * Funtcion to enqueue scripts and styles
 **/

function softuni_enqueue_assets()
{

    // main.js
    wp_enqueue_script(
        'ajax-script',
        plugins_url('../assets/scripts/scripts.js', __FILE__),
        array('jquery', 'owl-carousel-js'),
        '1.0.1',
        true
    );

    // AJAX URL
    wp_localize_script('ajax-script', 'my_ajax_object', array(
        'ajax_url' => admin_url('admin-ajax.php'),
    ));
}
add_action('wp_enqueue_scripts', 'softuni_enqueue_assets');


// Функция с ajax за обработка на лайкове 
function service_item_like()
{
    $id = isset($_POST['item_id']) ? intval($_POST['item_id']) : 0;

    if (!$id) {
        wp_send_json_error('няма ID');
        return;
    }

    //get
    $upvote_number = get_post_meta($id, 'votes', true);
    if (empty($upvote_number)) {
        $upvote_number = 0;
    }

    //update
    $new_votes = $upvote_number + 1;
    update_post_meta($id, 'votes', $new_votes);

    // answer-json
    wp_send_json_success(array('new_likes' => $new_votes));
}
add_action('wp_ajax_nopriv_service_item_like', 'service_item_like');
add_action('wp_ajax_service_item_like', 'service_item_like');


// Фукниця за споделяне в соц. мрежи в края на страницата
function softuni_append_text_to_content($content)
{
    if (is_singular('post') || is_singular('cpt_services')) {
        $extra_text = '<h5 class="mb-4 mt-4">Ако статията ти е каресала, сподели я с приятели.</h5>';
        $extra_icons = '<div class="top-link">
           <a href="" class="bg-light nav-fill btn btn-sm-square rounded-circle"><i class="fab fa-facebook-f text-primary"></i></a>
           <a href="" class="bg-light nav-fill btn btn-sm-square rounded-circle"><i class="fab fa-twitter text-primary"></i></a>
           <a href="" class="bg-light nav-fill btn btn-sm-square rounded-circle"><i class="fab fa-instagram text-primary"></i></a>
           <a href="" class="bg-light nav-fill btn btn-sm-square rounded-circle me-0"><i class="fab fa-linkedin-in text-primary"></i></a>
       </div>';
        //to-do: Да добавя бутони за споделяне+
        return $content . $extra_text . $extra_icons;
    }
    return $content;
}
add_filter('the_content', 'softuni_append_text_to_content');


// Функция за шорткод за тестимониали- карусел
function softuni_testimonial_slider_shortcode($atts)
{
    $atts = shortcode_atts(array(
        'posts_per_page' => -1,
    ), $atts, 'softuni_testimonial_slider');

    $testimonial_query = new WP_Query(array(
        'post_type'      => 'testimonial',
        'posts_per_page' => $atts['posts_per_page'],
        'post_status'    => 'publish',
    ));

    if ($testimonial_query->have_posts()) {
        ob_start(); //
?>
        <div class="testimonial-slider owl-carousel">
            <?php while ($testimonial_query->have_posts()) : $testimonial_query->the_post();
                // ACF филдове
                $testimonial_image = get_field('testimonial_image');
                $testimonial_content = get_field('testimonial_content');
            ?>
                <div class="testimonial-slide text-center">
                    <?php if ($testimonial_image) : ?>
                        <img src="<?php echo esc_url($testimonial_image); ?>" alt="<?php echo esc_attr(get_the_title()); ?>" class="rounded-circle mb-3" style="width: 96px; height: 96px; object-fit: cover;">
                    <?php else : ?>
                        <img src="<?php echo plugin_dir_url(__FILE__) . 'assets/default-testimonial.jpg'; ?>" alt="" class="rounded-circle mb-3" style="width: 96px; height: 96px; object-fit: cover;">
                    <?php endif; ?>

                    <?php if ($testimonial_content) : ?>
                        <p class="testimonial-content"><?php echo wp_trim_words(wp_kses_post($testimonial_content), 20, '...'); ?></p>
                    <?php endif; ?>
                </div>
            <?php endwhile; ?>
        </div>
<?php
        wp_reset_postdata();
        return ob_get_clean();
    } else {
        return '<p>' . __('Няма отзиви.', 'softuni') . '</p>';
    }
}
add_shortcode('softuni_testimonial_slider', 'softuni_testimonial_slider_shortcode');


?>