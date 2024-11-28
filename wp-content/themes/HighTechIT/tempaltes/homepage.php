<?php

/**
 * Template Name: Homepage
 */ ?>

<?php
$fields = get_fields(get_the_ID());
?>

<!-- Header section -->
<?php get_header(); ?>

<!-- TEMPLATE PART FOR HERO SLIDER ! -->
<?php get_template_part('paritials/hero', 'section', $fields) ?>

<!-- TEMPLATE PART FOR ABOUT SECTION ! -->
<?php get_template_part('paritials/about', 'section') ?>

<!-- TEMPLATE PART FOR SERVICES ! -->
<?php get_template_part('paritials/services') ?>

<!-- TEMPLATE PART FOR TEAM MEMBERS ! -->
<?php get_template_part('paritials/team', 'section') ?>

<!-- TEMPLATE PART FOR TESTIMONIALS ! -->
<?php get_template_part('paritials/testimonials') ?>

<!-- TEMPLATE PART FOR BLOG POSTS ! -->
<?php softuni_display_latest_posts(); ?>

<!-- TEMPLATE PART FOR CONTACT US SECTION ! -->
<?php get_template_part('paritials/contact', 'section') ?>

<!-- Footer section -->
<?php get_footer(); ?>