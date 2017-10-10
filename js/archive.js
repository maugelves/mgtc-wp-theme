jQuery(document).ready(function($){

    archive = {
        owlgallery: function(){

            if( $(window).width() >= 768 ){
                // Initialzece galleries
                $(".hpobras__items").owlCarousel({
                    autoplay: true,
                    items: 1,
                    dots: false,
                    margin: 20,
                    responsive: {
                        768: {
                            items: 2,
                            margin: 20
                        },
                        1024: {
                            items: 3,
                            margin: 40
                        }
                    }
                });
            }

        },
        init: function(){

            // Initialize the slider
            archive.owlgallery();

        }
    };

    // Initialize the general object
    archive.init();

});