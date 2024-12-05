// Service like button
jQuery(document).ready(function ($) {
    $('.like').on('click', function (e) {
        e.preventDefault();

        let job_id = $(this).data('id'); 
        let $likeCount = $(this).find('.like-count'); 

        $.ajax({
            type: 'post',
            dataType: 'json',
            url: my_ajax_object.ajax_url,
            data: {
                action: 'service_item_like',
                item_id: job_id,
            },
            success: function (response) {
                if (response.success) {
                    $likeCount.text(response.data.new_likes);
                } else {
                    console.log('eeror');
                }
            },
            error: function (xhr, status, error) {
                console.log('ajax error:');
            }
        });
    });
});

// Owl slider for testimonials carousel shortcode
jQuery(document).ready(function ($) {
    $('.testimonial-slider').owlCarousel({
        loop: true,
        margin: 10,
        nav: false,
        dots: true,
        autoplay: true,
        autoplayTimeout: 5000,
        responsive: {
            0: {
                items: 1
            },
            768: {
                items: 2
            },
            1024: {
                items: 3
            }
        }
    });
});
