jQuery(document).ready(function($){

    frontpage = {
        headerCarousel: function(){

            var args = {
                selector: '.hlobras',
                duration: 200,
                easing: 'ease-out',
                perPage: 1,
                startIndex: 0,
                draggable: true,
                threshold: 20,
                loop: false
            };

            new Siema(args);
        },
        init: function(){

            // Initialize the slider
            frontpage.headerCarousel();

        }
    };

    // Initialize the general object
    frontpage.init();

});