<!-- Contact Start -->
<div class="container-fluid py-5 mb-5">
    <div class="container">
        <div class="text-center mx-auto pb-5 wow fadeIn" data-wow-delay=".3s" style="max-width: 600px;">
            <h5 class="text-primary">КОНТАКТИ</h5>
            <h1 class="mb-3">Не се колебайте да се свържете с нас</h1>
            <!-- <p class="mb-2">Не се колебайте да се свържете с нас ...</a>.</p> -->
        </div>
        <div class="contact-detail position-relative p-5">
            <div class="row g-5 mb-5 justify-content-center">
                <!-- Адрес -->
                <div class="col-xl-4 col-lg-6 wow fadeIn" data-wow-delay=".3s">
                    <div class="d-flex bg-light p-3 rounded">
                        <div class="flex-shrink-0 btn-square bg-secondary rounded-circle" style="width: 64px; height: 64px;">
                            <i class="fas fa-map-marker-alt text-white"></i>
                        </div>
                        <div class="ms-3">
                            <h4 class="text-primary">Адрес</h4>
                            <?php
                            $address = get_option('softuni_address', 'Не е зададен адрес');
                            ?>
                            <a href="#" target="_blank" class="h5"><?php echo esc_html($address); ?></a>
                        </div>
                    </div>
                </div>

                <!-- Телефон -->
                <div class="col-xl-4 col-lg-6 wow fadeIn" data-wow-delay=".5s">
                    <div class="d-flex bg-light p-3 rounded">
                        <div class="flex-shrink-0 btn-square bg-secondary rounded-circle" style="width: 64px; height: 64px;">
                            <i class="fa fa-phone text-white"></i>
                        </div>
                        <div class="ms-3">
                            <h4 class="text-primary">Обадете ни се</h4>
                            <?php
                            $phone = get_option('softuni_phone', 'Не е зададен телефон');
                            ?>
                            <a class="h5" href="tel:<?php echo esc_attr($phone); ?>" target="_blank"><?php echo esc_html($phone); ?></a>
                        </div>
                    </div>
                </div>

                <!-- Имейл -->
                <div class="col-xl-4 col-lg-6 wow fadeIn" data-wow-delay=".7s">
                    <div class="d-flex bg-light p-3 rounded">
                        <div class="flex-shrink-0 btn-square bg-secondary rounded-circle" style="width: 64px; height: 64px;">
                            <i class="fa fa-envelope text-white"></i>
                        </div>
                        <div class="ms-3">
                            <h4 class="text-primary">Имейл</h4>
                            <?php
                            $email = get_option('softuni_email', 'Не е зададен имейл');
                            ?>
                            <a class="h5" href="mailto:<?php echo esc_attr($email); ?>" target="_blank"><?php echo esc_html($email); ?></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row g-5">
                <!-- Google Maps -->
                <div class="col-lg-6 wow fadeIn" data-wow-delay=".3s">
                    <div class="p-5 h-100 rounded contact-map">
                        <?php
                        $google_maps_iframe = get_option('softuni_google_maps', '');
                        if (!empty($google_maps_iframe)):
                            echo $google_maps_iframe; // iframe 
                        else:
                        ?>
                            <p class="text-muted"><?php _e('Няма зададена Goole Maps локация.', 'softuni'); ?></p>
                        <?php endif; ?>
                    </div>
                </div>

                <!--  контакт -->
                <div class="col-lg-6 wow fadeIn" data-wow-delay=".5s">
                    <div class="p-5 rounded contact-form">
                        <div class="mb-4">
                            <input type="text" class="form-control border-0 py-3" placeholder="Вашето име">
                        </div>
                        <div class="mb-4">
                            <input type="email" class="form-control border-0 py-3" placeholder="Вашият имейл">
                        </div>
                        <div class="mb-4">
                            <input type="text" class="form-control border-0 py-3" placeholder="Тема">
                        </div>
                        <div class="mb-4">
                            <textarea class="w-100 form-control border-0 py-3" rows="6" cols="10" placeholder="Съобщение"></textarea>
                        </div>
                        <div class="text-start">
                            <button class="btn bg-primary text-white py-3 px-5" type="button">Изпрати съобщение</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Contact End -->