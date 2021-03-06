function carouselMarqueur() {
  windowW = $(window).width();
  containerWidth = $('#home-carousel .carousel-indicators + .container').eq(0).width();
  containerLeft = Math.round((windowW - containerWidth) / 2);
  pillWidth = 55;
  liWidth = $('.nav-pills li').eq(0).innerWidth();
  bubleLeftFromBorderContainer = Math.round((liWidth - pillWidth) / 2);

  hrRightStart = containerLeft + bubleLeftFromBorderContainer + pillWidth;
  $(".transition-timer-carousel-progress-bar").css("left", hrRightStart + "px");

  hrRightSlide1End = 2 * bubleLeftFromBorderContainer;

  hrRightSlide2Start = hrRightSlide1End + pillWidth;
  hrRightSlide2End = hrRightSlide2Start + (2 * bubleLeftFromBorderContainer);

  hrRightSlide3Start = hrRightSlide2End + pillWidth;
  hrRightSlide3End = hrRightSlide3Start + (2 * bubleLeftFromBorderContainer) + (2 * containerLeft);

  hrLeftStart = -(bubleLeftFromBorderContainer + containerLeft);
  $(".transition-timer-carousel-left-progress-bar").css("left", hrLeftStart + "px");
  hrLeftEnd = -hrLeftStart + containerLeft + bubleLeftFromBorderContainer;
}

$(document).ready(function () {

  /* call and change coords for the progress bar on resize */
  carouselMarqueur();
  $(window).resize(function () {
      carouselMarqueur();
  });

  //Events that reset and restart the progress bar when the slides change
  $("#transition-timer-carousel").on("slide.bs.carousel", function (event) {
      var currentSlide = $(event.relatedTarget).index();

      //The animate class gets removed so that it jumps straight back to indicated px
      if (currentSlide == 0) {
          $(".transition-timer-carousel-progress-bar", this)
                  .addClass("stopanimation")
                  .removeClass("animate")
                  .css("width", "0");
          $(".transition-timer-carousel-left-progress-bar", this)
                  .addClass("stopanimation")
                  .removeClass("animate")
                  .css("width", hrLeftEnd + "px");
          $('.nav li').removeClass('active');
          $('.third-li').addClass('active');
      }
      else if (currentSlide == 1) {
          $(".transition-timer-carousel-progress-bar", this)
                  .addClass("stopanimation")
                  .removeClass("animate")
                  .css("width", hrRightSlide2Start + "px");

          $(".transition-timer-carousel-left-progress-bar", this)
                  .addClass("stopanimation")
                  .removeClass("animate")
                  .css("width", hrLeftEnd + "px");
          $('.nav li').removeClass('active');
          $('.first-li').addClass('active');
      }
      else if (currentSlide == 2) {
          $(".transition-timer-carousel-progress-bar", this)
                  .addClass("stopanimation")
                  .removeClass("animate")
                  .css("width", hrRightSlide3Start + "px");
          $(".transition-timer-carousel-left-progress-bar", this)
                  .addClass("stopanimation")
                  .removeClass("animate")
                  .css("width", "0");
          $('.nav li').removeClass('active');
          $('.second-li').addClass('active');
      }
  }).on("slid.bs.carousel", function (event) {
      //The slide transition finished, so re-add the animate class so that
      //the timer bar takes time to fill up to indicated px

      var currentSlide = $(event.relatedTarget).index();
      if (currentSlide == 0) {
          $(".transition-timer-carousel-progress-bar", this)
                  .removeClass("stopanimation")
                  .addClass("animate")
                  .css("width", hrRightSlide1End + "px");
          $('.nav li').removeClass('active');
          $('.first-li').addClass('active');
      }
      else if (currentSlide == 1) {
          $(".transition-timer-carousel-progress-bar", this)
                  .removeClass("stopanimation")
                  .addClass("animate")
                  .css("width", hrRightSlide2End + "px");
          $('.nav li').removeClass('active');
          $('.second-li').addClass('active');
      }
      else if (currentSlide == 2) {
          $(".transition-timer-carousel-progress-bar", this)
                  .removeClass("stopanimation")
                  .addClass("animate")
                  .css("width", hrRightSlide3End + "px");
          $(".transition-timer-carousel-left-progress-bar", this)
                  .removeClass("stopanimation")
                  .addClass("animate")
                  .css("width", hrLeftEnd + "px");
          $('.nav li').removeClass('active');
          $('.third-li').addClass('active');
      }
  });

  /* Kick off the initial slide animation when the document is ready */
  $(".transition-timer-carousel-progress-bar", "#transition-timer-carousel")
          .css("width", hrRightSlide1End + "px");
  $(".transition-timer-carousel-left-progress-bar", "#transition-timer-carousel")
          .removeClass("animate").css("width", hrLeftEnd + "px");

  // bootstrap carousel native script modified
var clickEvent = false;
  $('#transition-timer-carousel')
          .on('click', '.nav li', function () {
              clickEvent = true;
              $('.nav li').removeClass('active');
              $(this).addClass('active');
          })
  // modif: "on slide" instead of "on slid". Goal: the buble colors in blue directly at the end of the progress bar, not after the transition.
          .on('slide.bs.carousel', function () {
              if (!clickEvent) {
                  var count = $('.nav').children().length - 1;
                  var current = $('.nav li.active');
                  current.removeClass('active').next().addClass('active');
                  var id = parseInt(current.data('slide-to'));
                  if (count == id) {
                      $('.nav li').first().addClass('active');
                  }
              }
              clickEvent = false;
          });

});