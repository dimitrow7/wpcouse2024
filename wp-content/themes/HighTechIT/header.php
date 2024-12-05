<head>
    <meta charset="utf-8">
    <title><?php echo wp_get_document_title(); ?> - <?php echo get_bloginfo('name'); ?></title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <!-- Spinner Start -->
    <div id="spinner" class="show position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" role="status"></div>
    </div>
    <!-- Spinner End -->

    <!-- Topbar Start -->
    <div class="container-fluid bg-dark py-2 d-none d-md-flex">
        <div class="container">
            <div class="d-flex justify-content-between topbar">
                <div class="top-info">
                    <?php
                    $address = get_option('softuni_address', 'Не е зададен адрес');
                    $email = get_option('softuni_email', 'Не е зададен имейл');
                    ?>
                    <small class="me-3 text-white-50"><i class="fas fa-map-marker-alt me-2 text-secondary"></i><?php echo esc_html($address); ?></small>
                    <small class="me-3 text-white-50"><i class="fas fa-envelope me-2 text-secondary"></i><?php echo esc_html($email); ?></small>
                </div>
                <!-- <div id="note" class="text-secondary d-none d-xl-flex"><small>Note : We help you to Grow your Business</small></div> -->
                <div class="top-link">
                    <a href="" class="bg-light nav-fill btn btn-sm-square rounded-circle"><i class="fab fa-facebook-f text-primary"></i></a>
                    <a href="" class="bg-light nav-fill btn btn-sm-square rounded-circle"><i class="fab fa-twitter text-primary"></i></a>
                    <a href="" class="bg-light nav-fill btn btn-sm-square rounded-circle"><i class="fab fa-instagram text-primary"></i></a>
                    <a href="" class="bg-light nav-fill btn btn-sm-square rounded-circle me-0"><i class="fab fa-linkedin-in text-primary"></i></a>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->

    <!-- Navbar Start -->
    <div class="container-fluid bg-primary">
        <div class="container">
            <nav class="navbar navbar-dark navbar-expand-lg py-0">
                <a href="<?php echo get_home_url(); ?>" class="navbar-brand">
                    <?php
                    $logo_url = get_option('softuni_logo', '');
                    if (!empty($logo_url)): ?>
                        <img src="<?php echo esc_url($logo_url); ?>" alt="Logo" class="img-fluid" style="max-height: 50px;">
                    <?php else: ?>
                        <h1 class="text-white fw-bold d-block">😠Няма<span class="text-secondary"> лого</span></h1>
                    <?php endif; ?>
                </a>
                <button type="button" class="navbar-toggler me-0" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse bg-transparent" id="navbarCollapse">
                    <div class="navbar-nav ms-auto mx-xl-auto p-0">
                        <!-- menu  -->
                        <?php
                        $nav_menu_args = array(
                            'menu'                => 'primary-menu', // (int|string|WP_Term) Desired menu. Accepts a menu ID, slug, name, or object.
                            'menu_class'        => 'navbar-nav ms-auto mx-xl-auto p-0', // (string) CSS class to use for the ul element which forms the menu. Default 'menu'.
                            'menu_id'            => '', // (string) The ID that is applied to the ul element which forms the menu. Default is the menu slug, incremented.
                            'container'            => 'div', // (string) Whether to wrap the ul, and what to wrap it with. Default 'div'.
                            'container_class'    => 'nav-item nav-link', // (string) Class that is applied to the container. Default 'menu-{menu slug}-container'.
                            'theme_location'    => 'primary', // (string) Theme location to be used. Must be registered with register_nav_menu() in order to be selectable by the user.
                            'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>', // (string) How the list items should be wrapped. Default is a ul with an id and class. Uses printf() format with numbered placeholders.
                        );

                        wp_nav_menu($nav_menu_args);
                        ?>
                    </div>
                </div>
                <div class="d-none d-xl-flex flex-shirink-0">
                    <div id="phone-tada" class="d-flex align-items-center justify-content-center me-4">
                        <a href="" class="position-relative animated tada infinite">
                            <i class="fa fa-phone-alt text-white fa-2x"></i>
                            <div class="position-absolute" style="top: -7px; left: 20px;">
                                <span><i class="fa fa-comment-dots text-secondary"></i></span>
                            </div>
                        </a>
                    </div>
                    <div class="d-flex flex-column">
                        <span class="text-white-50">Имате въпроси?</span>
                        <?php
                        $phone = get_option('softuni_phone', 'Не е зададен телефон');
                        ?>
                        <span><a class="text-secondary" href="tel:<?php echo esc_attr($phone); ?>" target="_blank"><?php echo esc_html($phone); ?></a></span>
                    </div>

                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar End -->