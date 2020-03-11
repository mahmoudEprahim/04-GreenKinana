$(document).ready(function(){


    // SMOOTH SCROLL js code for speed and offset elements
    var scroll = new SmoothScroll('a[href*="#"]',{
        speed: 1000,
        offset: 90
    });

    // change navbar background color and top = 0 when scroll
    $(window).scroll(function(){
        var scroll = $(window).scrollTop();
        if (scroll > 100) {
          $("#header").addClass("sticky_header");
          
        }else{
            $("#header").removeClass('sticky_header'); 	 	 	
        }
    });
    $(window).scroll(function(){
        var scroll = $(window).scrollTop();
        if (scroll > 200) {
          
          $(".back-to-top").addClass("back-to-top_active");
          
        }else{
            	
            $(".back-to-top").removeClass('back-to-top_active'); 	 	
        }
    });
    $(window).scroll(function(){
        var scroll = $(window).scrollTop();
        if (scroll > 100) {
          
          $(".wrapper_logo").addClass("stiky_logo");
        }else{
           	
            $(".wrapper_logo").removeClass('stiky_logo'); 	
        }
    });
  })


//   slider section images and videos slider control
$('.photos .carousel .carousel-item').each(function () {
    var next = $(this).next();
    if (!next.length) {
      next = $(this).siblings(':first');
    }
    next.children(':first-child').clone().appendTo($(this));
  
    for (var i = 0; i < 4; i++) {
      next = next.next();
      if (!next.length) {
        next = $(this).siblings(':first');
      }
  
      next.children(':first-child').clone().appendTo($(this));
    }
  });


  