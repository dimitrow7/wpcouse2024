<!-- About Start -->
<div class="container-fluid py-5 my-5">
    <div class="container pt-5">
        <div class="row g-5">
            <div class="col-lg-5 col-md-6 col-sm-12 wow fadeIn" data-wow-delay=".3s">
                <div class="h-100 position-relative">
                    <?php 
                    $about_image_1 = get_option('softuni_about_image_1', get_stylesheet_directory_uri() . '');
                    $about_image_2 = get_option('softuni_about_image_2', get_stylesheet_directory_uri() . '');
                    ?>
                    <img src="<?php echo esc_url($about_image_1); ?>" class="img-fluid w-75 rounded" alt="" style="margin-bottom: 25%;">
                    <div class="position-absolute w-75" style="top: 25%; left: 25%;">
                        <img src="<?php echo esc_url($about_image_2); ?>" class="img-fluid w-100 rounded" alt="">
                    </div>
                </div>
            </div>
            <div class="col-lg-7 col-md-6 col-sm-12 wow fadeIn" data-wow-delay=".5s">
                <?php 
                $about_motto = get_option('softuni_about_motto', 'SoftUni WP Course');
                $about_description = get_option('softuni_about_description', 'Default description about the brand.');
                ?>
                <h5 class="text-primary">ЗА НАС</h5>
                <h1 class="mb-4"><?php echo esc_html($about_motto); ?></h1>
                <p><?php echo nl2br(esc_html($about_description)); ?></p>
                <!-- <a href="#" class="btn btn-secondary rounded-pill px-5 py-3 text-white">More Details</a> -->
            </div>
        </div>
    </div>
</div>
<!-- About End -->
