<?php
// Добавяме опции страницата в менюто
add_action('admin_menu', 'softuni_add_options_page');

function softuni_add_options_page() {
    add_menu_page(
        __('SoftUni Plugin', 'softuni'), 
        __('SoftUni Plugin', 'softuni'), 
        'manage_options',                
        'softuni-options',               
        'softuni_options_page_content',  
        'dashicons-admin-generic',       
        90                               
    );
}

// Регистрирам
add_action('admin_init', 'softuni_register_settings');

function softuni_register_settings() {
    //  секция1
    add_settings_section(
        'softuni_settings_section',      
        __('SoftUni - Основни настройки', 'softuni'), 
        'softuni_settings_section_callback', 
        'softuni-options'                
    );

	//поле за лого --дали да го изнеса в опциите на темата, ако правя Option page и там?
	register_setting('softuni_options_group', 'softuni_logo', 'esc_url_raw'); // Обработваме URL адреса
    add_settings_field(
        'softuni_logo',
        __('Лого', 'softuni'),
        'softuni_logo_field_callback',
        'softuni-options',
        'softuni_settings_section'
    );

    // телефон
    add_settings_field(
        'softuni_phone',              
        __('Телефон', 'softuni'),       
        'softuni_phone_field_callback',
        'softuni-options', 
        'softuni_settings_section'
    );

    // адрес
    add_settings_field(
        'softuni_address',
        __('Адрес', 'softuni'),
        'softuni_address_field_callback',
        'softuni-options',
        'softuni_settings_section'
    );

    // мейл
    add_settings_field(
        'softuni_email',
        __('Имейл адрес', 'softuni'),
        'softuni_email_field_callback',
        'softuni-options',
        'softuni_settings_section'
    );

    // G Maps локация
    add_settings_field(
        'softuni_google_maps',
        __('Google Maps Локация', 'softuni'),
        'softuni_google_maps_field_callback',
        'softuni-options',
        'softuni_settings_section'
    );

// ABOUT US полета

    // девиз
add_settings_field(
    'softuni_about_motto',
    __('Девиз', 'softuni'),
    'softuni_about_motto_field_callback',
    'softuni-options',
    'softuni_settings_section'
);

// описание на бранда
add_settings_field(
    'softuni_about_description',
    __('Описание на бранда', 'softuni'),
    'softuni_about_description_field_callback',
    'softuni-options',
    'softuni_settings_section'
);

// две изображения
add_settings_field(
    'softuni_about_image_1',
    __('Изображение 1', 'softuni'),
    'softuni_about_image_1_field_callback',
    'softuni-options',
    'softuni_settings_section'
);

add_settings_field(
    'softuni_about_image_2',
    __('Изображение 2', 'softuni'),
    'softuni_about_image_2_field_callback',
    'softuni-options',
    'softuni_settings_section'
);

    register_setting('softuni_options_group', 'softuni_phone');
    register_setting('softuni_options_group', 'softuni_address');
    register_setting('softuni_options_group', 'softuni_email');
    register_setting('softuni_options_group', 'softuni_google_maps');
    register_setting('softuni_options_group', 'softuni_about_motto');
    register_setting('softuni_options_group', 'softuni_about_description');
    register_setting('softuni_options_group', 'softuni_about_image_1');
    register_setting('softuni_options_group', 'softuni_about_image_2');
}

// Callback функции

function softuni_logo_field_callback() {
    $value = get_option('softuni_logo', '');
    echo '<input type="url" id="softuni_logo" name="softuni_logo" value="' . esc_url($value) . '" style="width: 100%;" />';
    echo '<p class="description">' . __('Качете лого чрез медията и копирайте URL тук.', 'softuni') . '</p>';
}

function softuni_settings_section_callback() {
    echo '<p>' . __('Попълнете данните за контакт.', 'softuni') . '</p>';
}

function softuni_phone_field_callback() {
    $value = get_option('softuni_phone', '');
    echo '<input type="text" id="softuni_phone" name="softuni_phone" value="' . esc_attr($value) . '" placeholder="Телефон" />';
}

function softuni_address_field_callback() {
    $value = get_option('softuni_address', '');
    echo '<input type="text" id="softuni_address" name="softuni_address" value="' . esc_attr($value) . '" placeholder="Адрес" />';
}

function softuni_email_field_callback() {
    $value = get_option('softuni_email', '');
    echo '<input type="email" id="softuni_email" name="softuni_email" value="' . esc_attr($value) . '" placeholder="Имейл адрес" />';
}

function softuni_google_maps_field_callback() {
    $value = get_option('softuni_google_maps', '');
    echo '<textarea id="softuni_google_maps" name="softuni_google_maps" rows="6" style="width:100%;" placeholder="Тук подаваме Google Maps iframe ...">' . esc_textarea($value) . '</textarea>';
}

function softuni_about_motto_field_callback() {
    $value = get_option('softuni_about_motto', '');
    echo '<input type="text" id="softuni_about_motto" name="softuni_about_motto" value="' . esc_attr($value) . '" style="width: 100%;" />';
}

function softuni_about_description_field_callback() {
    $value = get_option('softuni_about_description', '');
    echo '<textarea id="softuni_about_description" name="softuni_about_description" rows="5" style="width: 100%;">' . esc_textarea($value) . '</textarea>';
}

function softuni_about_image_1_field_callback() {
    $value = get_option('softuni_about_image_1', '');
    echo '<input type="url" id="softuni_about_image_1" name="softuni_about_image_1" value="' . esc_url($value) . '" style="width: 100%;" />';
    echo '<p class="description">Качете изображение в медия библиотеката и поставете URL тук.</p>';
}

function softuni_about_image_2_field_callback() {
    $value = get_option('softuni_about_image_2', '');
    echo '<input type="url" id="softuni_about_image_2" name="softuni_about_image_2" value="' . esc_url($value) . '" style="width: 100%;" />';
    echo '<p class="description">Качете изображение в медия библиотеката и поставете URL тук.</p>';
}


function softuni_options_page_content() {
    ?>
    <div class="wrap">
        <h1><?php _e('SoftUni Options', 'softuni'); ?></h1>
        <form action="options.php" method="post">
            <?php
            settings_fields('softuni_options_group');
            do_settings_sections('softuni-options');
            submit_button(__('Запази', 'softuni'));
            ?>
        </form>
    </div>
    <?php
}
