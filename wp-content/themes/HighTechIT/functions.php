<?php

// Зарежда основните функции на WordPress
if (! function_exists('my_theme_setup')) {
    function my_theme_setup()
    {
        // Добавяне на поддръжка за Featured Images
        add_theme_support('post-thumbnails');

        // Регистрация на менюта
        register_nav_menus(array(
            'primary' => __('Primary Menu', 'my_theme'),
        ));
    }
}
add_action('after_setup_theme', 'my_theme_setup');

// Зареждане на CSS и JavaScript файлове
function my_theme_enqueue_scripts()
{
    // CSS
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css', array(), '5.10.0');
    wp_enqueue_style('bootstrap-icons', 'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css', array(), '1.4.1');
    wp_enqueue_style('animate', get_stylesheet_directory_uri() . '/css/animate.min.css', array(), null);
    wp_enqueue_style('owl-carousel', get_stylesheet_directory_uri() . '/js/owlcarousel/assets/owl.carousel.min.css', array(), null);
    wp_enqueue_style('main-style', get_stylesheet_directory_uri() . '/style.css');
    wp_enqueue_style('custom-bootstrap', get_stylesheet_directory_uri() . '/css/bootstrap.min.css', array(), null);


    // JS
    wp_enqueue_script('jquery-cdn', 'https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js', array(), '3.6.4', true);
    wp_enqueue_script('bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js', array('jquery-cdn'), '5.0.0', true);
    wp_enqueue_script('wow-js', get_stylesheet_directory_uri() . '/js/wow/wow.min.js', array(), null, true);
    wp_enqueue_script('easing-js', get_stylesheet_directory_uri() . '/js/easing/easing.min.js', array(), null, true);
    wp_enqueue_script('waypoints-js', get_stylesheet_directory_uri() . '/js/waypoints/waypoints.min.js', array(), null, true);
    wp_enqueue_script('owl-carousel-js', get_stylesheet_directory_uri() . '/js/owlcarousel/owl.carousel.min.js', array(), null, true);
    wp_enqueue_script('main-script', get_template_directory_uri() . '/js/main.js', array('wow-js'), false, true);
}
add_action('wp_enqueue_scripts', 'my_theme_enqueue_scripts');

// Dynamic header
function dynamic_page_header_styles()
{
    if (is_singular() && has_post_thumbnail()) {
        $featured_image_url = esc_url(get_the_post_thumbnail_url(get_the_ID(), 'full'));
?>
        <style>
            .dynamic-header {
                background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('<?php echo $featured_image_url; ?>') center center no-repeat;
                background-size: cover;
            }
        </style>
    <?php
    } else {
        $default_image_url = '/wp-content/uploads/2024/11/3396.jpg';
    ?>
        <style>
            .dynamic-header {
                background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('<?php echo esc_url($default_image_url); ?>') center center no-repeat;
                background-size: cover;
            }
        </style>
<?php
    }
}
add_action('wp_head', 'dynamic_page_header_styles');

// Custom breadcrumbz
function custom_breadcrumbs()
{
    $separator = ' &gt; ';
    $home_title = 'Начало';

    echo '<nav class="breadcrumbs"><a class="text-white" href="' . home_url() . '">' . $home_title . '</a>';
    if (is_category() || is_single()) {
        echo $separator;
        the_category(', ');
        if (is_single()) {
            echo $separator . '<span class="text-white">' . get_the_title() . '</span>';
        }
    } elseif (is_page()) {
        if ($post->post_parent) {
            $parent_id  = $post->post_parent;
            $breadcrumbs = array();
            while ($parent_id) {
                $page = get_page($parent_id);
                $breadcrumbs[] = '<a class="text-white" href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
                $parent_id  = $page->post_parent;
            }
            $breadcrumbs = array_reverse($breadcrumbs);
            foreach ($breadcrumbs as $crumb) {
                echo $separator . $crumb;
            }
        }
        echo $separator . '<span class="text-white">' . get_the_title() . '</span>';
    } elseif (is_archive()) {
        echo $separator . '<span> class="text-white">' . post_type_archive_title() . '</span>';
    }
    echo '</nav>';
}

// Това защо съм го сложил?
function softuni_display_latest_posts($number_of_posts = 3)
{
    include 'latest-posts.php';
}


/**
 *  This is the main menu function
 */
function sfotuni_register_nav_menus()
{
    register_nav_menu('primary', __('Primary Menu', 'theme-slug'));
}
add_action('after_setup_theme', 'sfotuni_register_nav_menus', 0);


/**
 * Register my first sidebar.
 */
function softuni_register_sidebar()
{
    register_sidebar(array(
        'name'          => __('Footer 1 Sidebar', 'textdomain'),
        'id'            => 'footer-1',
        'description'   => __('Footer 1 sidebar', 'textdomain'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<ha class="h3 text-secondary">',
        'after_title'   => '</ha>',
    ));

    register_sidebar(array(
        'name'          => __('Footer 2 Sidebar', 'textdomain'),
        'id'            => 'footer-2',
        'description'   => __('Footer 2 sidebar', 'textdomain'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<ha class="h3 text-secondary">',
        'after_title'   => '</ha>',
    ));

    register_sidebar(array(
        'name'          => __('Footer 3 Sidebar', 'textdomain'),
        'id'            => 'footer-3',
        'description'   => __('Footer 3 sidebar', 'textdomain'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<ha class="h3 text-secondary">',
        'after_title'   => '</ha>',
    ));

    register_sidebar(array(
        'name'          => __('Footer 4 Sidebar', 'textdomain'),
        'id'            => 'footer-4',
        'description'   => __('Footer 4 sidebar', 'textdomain'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<ha class="h3 text-secondary">',
        'after_title'   => '</ha>',
    ));
}

add_action('widgets_init', 'softuni_register_sidebar');
