(function($){
"use strict";

/*------ Related  Movie ------*/
    $('.related-service-active').slick({
      slidesToShow: 3,
      arrows:true,
      dots: false,
      prevArrow: '<div class="btn-prev"><i class="fa fa-angle-left"></i></div>',
      nextArrow: '<div><i class="fa fa-angle-right"></i></div>',
       responsive: [{
          breakpoint: 991,
          settings: {
            slidesToShow: 2
          }
        },
        {
          breakpoint: 768,
          settings: {
            slidesToShow: 2
          }
        },
        {
          breakpoint: 576,
          settings: {
            slidesToShow: 1
          }
        }
      ]
    });

    
  $('.wpinsurance_popup-youtube').magnificPopup({
    type: 'iframe'
  });

})(jQuery);