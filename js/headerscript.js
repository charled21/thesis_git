$(window).scroll(function() {

  //scroll pass 100px
  if ($(this).scrollTop() > 100) {
    $('#header').addClass('header-scrolled');
    $("#header .nav-link").css("color","blue");
    $("#header .navbar-main").css("color","blue");
    $("#header #nav-main").css("color","orangered");
    $("#header .nav-link").hover(function() { 
          $(this).css("color", "blue"); 
          $(this).css("background-color", "transparent"); 
          }, 
          function() { 
          $(this).css("color", "gray"); 
          $(this).css("background-color", "transparent"); 
          }); 

      //ipad device view
      if ($(window).width() < 768){
        $("#header .nav-link").css("color","white");
        $("button.navbar-toggler").css("background-color","rgba(62, 159, 250, 0.9)");
          $("#header .nav-link").hover(function() { 
            $(this).css("color", "white"); 
            $(this).css("background-color", "transparent"); 
            }, 
            function() { 
            $(this).css("color", "gray"); 
            $(this).css("background-color", "transparent"); 
            });
        }
      //mobile device view
      if ($(window).width() < 380){
        $("#header .nav-link").css("color","white");
        $("button.navbar-toggler").css("background-color","rgba(62, 159, 250, 0.9)");
          $("#header .nav-link").hover(function() { 
            $(this).css("color", "white"); 
            $(this).css("background-color", "transparent"); 
            }, 
            function() { 
            $(this).css("color", "gray"); 
            $(this).css("background-color", "transparent"); 
            });
        }      
    } 
   //scroll pass 100px (ELSE)
  else {
    $('#header').removeClass('header-scrolled');
    $("button.navbar-toggler").css("background-color","transparent");
    $("#header .nav-link").css("color","white");
    $("#header .navbar-main").css("color","white");
    $("#header #nav-main").css("color","white");
    $("#header .nav-link").hover(function() { 
        $(this).css("color", "white"); 
        $(this).css("background-color", "transparent");   
        }, 
        function() { 
        $(this).css("color", "gray"); 
        $(this).css("background-color", "transparent");      
        });

    //ipad view pass 100px (ELSE)
    if ($(window).width() < 768){
      $("#header .nav-link").css("color","white");
      $("#header .nav-link").hover(function() { 
        //debugger
        //console.log('na click ko!');
        $(this).css("color","white"); 
        $(this).css("background-color", "transparent"); 
        }, 
        function() { 
        $(this).css("color","gray"); 
        $(this).css("background-color", "transparent"); 
        });
    }
      //mobile view pass 100px (ELSE)
    if ($(window).width() < 380){
      $("#header .nav-link").css("color","white");
      $("#header .nav-link").hover(function() { 
        $(this).css("color","white"); 
        $(this).css("background-color", "transparent"); 
        }, 
        function() { 
        $(this).css("color","gray"); 
        $(this).css("background-color", "transparent"); 
        });
      }    
    }
});

 //scroll pass 100px
if ($(window).scrollTop() > 100) {
  $('#header').addClass('header-scrolled');
  $("#header .nav-link").css("color","blue");
  $("#header .navbar-main").css("color","blue");
  $("#header #nav-main").css("color","orangered");
  $("#header .nav-link").hover(function() { 
    $(this).css("color", "blue"); 
    $(this).css("background-color", "transparent"); 
    }, 
    function() { 
    $(this).css("color", "gray"); 
    $(this).css("background-color", "transparent"); 
    }); 
  //tablet device view
  if ($(window).width() < 768){
    $("#header .nav-link").css("color","white");
    $("button.navbar-toggler").css("background-color","rgba(62, 159, 250, 0.9)");
      $("#header .nav-link").hover(function() { 
        $(this).css("color", "blue"); 
        $(this).css("background-color", "transparent"); 
        }, 
        function() { 
        $(this).css("color", "gray"); 
        $(this).css("background-color", "transparent"); 
        });
      }
  //mobile device view
  if ($(window).width() < 380){
    $("#header .nav-link").css("color","white");
    $("button.navbar-toggler").css("background-color","rgba(62, 159, 250, 0.9)");
      $("#header .nav-link").hover(function() { 
        $(this).css("color", "blue"); 
        $(this).css("background-color", "transparent"); 
        }, 
        function() { 
        $(this).css("color", "gray"); 
        $(this).css("background-color", "transparent"); 
        });
      }
}


//bootstrap 4 carousel start

$('#carousel-personal').on('slide.bs.carousel', function (e) {
  var id = e.relatedTarget.id;
  switch (id) {
    case "0":
      $('#portfolio-bg').css('background-image','url(img/carousel3.jpg)');
      break;
    case "1":
      $('#portfolio-bg').css('background-image','url(img/carousel2.jpg)');
      break;
    case "2":
      $('#portfolio-bg').css('background-image','url(img/carousel1.jpg)');
      break;
    default:
      // none
  }
})

//boostrap 4 carousel end


//services box on hover start
$("#services .box").hover(function() { 
  $('#services .box:hover h5').css('color','blueviolet');
  $('#services .box:hover h5').css('font-size','18px');
  $('#services .box:hover h5').css('font-weight','700');
  $('#services .box:hover p').css('color','black');
  $(this).css('cursor','pointer');
  //$(this).css("color", "blueviolet"); 
}, function() { 
  $('#services .box h5').css("color", "rgb(70, 63, 63)"); 
  $('#services .box h5').css('font-size','16px');
  $('#services .box h5').css('font-weight','700'); 
  $('#services .box:hover p').css('color','rgb(70, 63, 63)');
}); 
// services box on hover end



//portfolio two carousel start

$('.owl-carousel').owlCarousel({
  loop:true,
  responsiveClass:true,
  singleItem: true,
  autoplay:true,
  smartSpeed:1500,
  autoplayHoverPause:true,
  items:1,
  dots: true,
  responsive:{
      0:{
          items:1
      },
      600:{
          items:1
      },
      1000:{
          items:1
      }
  }
})

$(document).ready(function(){
  
  //owl carousel start
  var owl = $('.owl-carousel');
  owl.on('translated.owl.carousel', function(event) 
  {
  var now_src = $('.owl-carousel').find('.owl-item.active img').attr('src');
        $('#portfolio-bg').css('background-image',  'url('+now_src+')');
        //debugging
        //console.log('url('+now_src+')');
  })

  //owl carousel end

    
});



//function OFF for overlay -- added after inline style 'mobile-overlay div'
function off() {
  //function debugger
  //console.log('clicked ako');
  $('.navbar-toggler-icon').click();
  // if($('.mobile-overlay').css('display') === 'none'){
  //   $('body').toggleClass('mobile-nav-active');
  //   $('.mobile-overlay').toggle();
  // }
  // else{
  //   $('.mobile-overlay').css('display','none');
  //   }
}
//function OFF for overlay

//portfolio two carousel end

//smooth scrolling start
$(document).ready(function (){
  $("#abt-btn").click(function (){
      $('html, body').animate({
          scrollTop: $("#about").offset().top
      }, 2000);
  });
  $("#srv-btn").click(function (){
    $('html, body').animate({
        scrollTop: $("#services").offset().top
    }, 2000);
  });
  $("#prt-btn").click(function (){
    $('html, body').animate({
        scrollTop: $("#porttwo").offset().top
    }, 2000);
  });
  $("#contact-us").click(function (){
    $('html, body').animate({
        scrollTop: $("#footer-personal").offset().top
    }, 2000);
  });
  

  //overlay on click start
  var overlay = jQuery('<div class="mobile-overlay" style="display:none;"> </div>');
  overlay.appendTo(document.body);


  $('body').on('click', '.navbar-toggler', function(e) {
    e.preventDefault();
    $('body').toggleClass('mobile-nav-active');
    $('.mobile-overlay').toggle();
  
      if($('.mobile-overlay').css('display') === 'none'){
        //console.log('off --- mobile overlay');
      }
      else{
        //console.log('### mobile overlay ON');
      }
  });
  //overlay on click end
});


//smooth scrolling end

function navClick(){
  if($('.mobile-overlay').css('display') === 'none'){
    $('body').toggleClass('mobile-nav-active');
    $('.mobile-overlay').toggle();
  }
  else{
    $('.mobile-overlay').css('display','none');
  }
    
}