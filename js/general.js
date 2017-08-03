jQuery(document).ready(function($){

	general = {
		headerCarousel: function(){
			$('.hlobras').siema();
		},
		init: function(){

            $('#header__hamb').click(function(){
            	$(this).toggleClass('open');
                $('.header__nav').slideToggle();
            });



		}
	};

	// Initialize the general object
	general.init();

});