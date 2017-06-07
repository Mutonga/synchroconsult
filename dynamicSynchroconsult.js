// smooth scrolling effect code-->


$(document).ready(function(){
  // Add scrollspy to <body> highlights the menu links
  $('body').scrollspy({target: ".navbar", offset: 50});

  // Add smooth scrolling on all links inside the navbar
  $("#menu a, footer a[href='#jumbotron']").on('click', function(event) {
    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {

      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash position
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({

        scrollTop: $(hash).offset().top

      }, 800, function(){

        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    }  // End if
  });
});


// Carouselshow slide

  $("#clientSlide").carousel({ interval: 2500});

  $('.carousel .item').each(function(){
      var next = $(this).next();
        if (!next.length) {
            next = $(this).siblings(':first');
          }
            next.children(':first-child').clone().appendTo($(this));

        if (next.next().length>0) {

            next.next().children(':first-child').clone().appendTo($(this)).addClass('rightest');

          }
            else {
              $(this).siblings(':first').children(':first-child').clone().appendTo($(this));

        }
});



// hide projects2

  $(document).ready(function(){
    $("#projects2").hide();
  });

  //button that displays more projects (projects2)on clicking
      $(document).ready(function(){
          $("#buttonMoreProjects").click(function(){
            $("#projects2").show(600);
            $("#buttonMoreProjects").hide(500);
          });
      });



// decrease opacity on hover action-->

    $(document).ready(function(){
      $(".img-thumbnail").hover(function(){
        $(this).toggleClass("opacity");
      });
    });


//Diplay information on hover

    $(document).ready(function(){
      $(".thumbnail").tooltip({title:"Click for More...",animation:"true",trigger:"hover"});
    });

//slide header on scrolling to its position

//client side form validation
