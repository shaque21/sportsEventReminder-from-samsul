// banner slider 
$(document).ready(function(){
	$(function() {
    $('.full-slider').slick({
        dots: true,
        infinite: true,
        speed: 1000,
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        autoplay: true,
        responsive: [{
                breakpoint: 1024,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    infinite: true,
                    dots: true
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }

        ]
    });

})
// end banner slider



  var typed = new Typed('.animate', {
    strings: [
    	"reminder",
    	"reminder",
    	"reminder"
    ],
    typeSpeed: 20,
    backSpeed : 20,
    loop : true
  });

  new WOW().init();

});



  // $(document).ready(function(){
  // 	
  // });
 //for data table 
$(document).ready(function() {
    $('#example').DataTable();
} );