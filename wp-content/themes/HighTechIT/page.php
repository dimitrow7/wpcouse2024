<?php 
get_header( );
global $post;
$postcat = get_the_category( $post->ID );
?>
<!DOCTYPE html>
<html lang="en">
        
        <!-- Page Header Start -->
        <div class="container-fluid page-header py-5 dynamic-header">
            <div class="container text-center py-5">
                <h1 class="display-2 text-white mb-4 animated slideInDown"><?php echo get_the_title(); ?></h1>
                <nav aria-label="breadcrumb animated slideInDown">
                </nav>
            </div>
        </div>
        <!-- Page Header End -->

        <!-- Blog content start  -->
        <div class="container-fluid py-5 my-5">
                <div class="col-md-6 col-lg-8 mx-auto wow fadeIn" data-wow-delay=".3s" style="max-width: 90%;">
                    <?php the_content( ); ?>
                </div>
        </div>
        <!-- Blog content end  -->
    <?php get_footer( ); ?>
</html>