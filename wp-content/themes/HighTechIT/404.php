<?php
get_header();
global $post;
?>
<!DOCTYPE html>
<html lang="en">
    
<!-- 404 Start -->
<div class="container-fluid py-5 my-5 wow fadeIn" data-wow-delay="0.3s">
    <div class="container text-center py-5">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <i class="bi bi-exclamation-triangle display-1 text-primary"></i>
                <h1 class="display-1">404</h1>
                <h1 class="mb-4">Упси! Няма такава страница</h1>
                <p class="mb-4">Това е грешка, опитайте отново, защото тук няма никой!</p>
                <a class="btn btn-primary rounded-pill py-3 px-5" href="/">Начална страница</a>
            </div>
        </div>
    </div>
</div>
<!-- 404 End -->

<?php get_footer(); ?>

</html>