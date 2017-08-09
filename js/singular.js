jQuery(document).ready(function($){

    singular = {
        owlgallery: function(){

            // Initialzece galleries
            $(".sggallery__wrapper").owlCarousel({
                autoplay: true,
                items: 1,
                dots: false,
                loop: true,
                margin: 20,
                responsive: {
                    768: {
                        items: 2,
                        margin: 20
                    },
                    1440: {
                        items: 3,
                        margin: 40
                    }
                }
            });
        },
        init: function(){

            // Initialize the slider
            singular.owlgallery();

        }
    };

    // Initialize the general object
    singular.init();

});