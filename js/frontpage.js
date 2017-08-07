jQuery(document).ready(function($){

    frontpage = {
        headerCarousel: function(){

            $(".hlobras").owlCarousel({
                autoplay: false,
                dots: false,
                items: 1,
                loop: true
            });


            // Initialice Obras en Gira solo si la resolución del
            // Dispositivo es mayor a 768px
            if( $(window).width() >= 768 ){

                /*$(".hpgiras__items").addClass('owl-carousel');
                $(".hpgiras__items").owlCarousel({
                    autoplay: true,
                    dots: false,
                    loop: true,
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
                });*/



                $(".hpactores__list").addClass('owl-carousel');
                $(".hpactores__list").owlCarousel({
                    autoplay: true,
                    dots: false,
                    loop: true,
                    responsive: {
                        768: {
                            items: 2,
                            margin: 20,
                        },
                        1440: {
                            items: 3,
                            margin: 40,
                        }
                    }
                });

            }

        },
        init: function(){

            // Initialize the slider
            frontpage.headerCarousel();

        }
    };

    // Initialize the general object
    frontpage.init();

});