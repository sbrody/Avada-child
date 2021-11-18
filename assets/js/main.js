// Animation for Aurum Plus page
  // limit the amount of time the function runs - 

  document.addEventListener("DOMContentLoaded", function() {
    function debounce(func, wait = 20, immediate = true) {
      var timeout;
      return function () {
        var context = this, args = arguments;
        var later = function () {
          timeout = null;
          if (!immediate) func.apply(context, args);
        };
        var callNow = immediate && !timeout;
        clearTimeout(timeout);
        timeout = setTimeout(later, wait);
        if (callNow) func.apply(context, args);
      };
    };
  
    const animatedImages = document.querySelectorAll('.animated');
  
    function checkSlide(e) {
      animatedImages.forEach(animatedImage => {
        console.log(animatedImage);
        // shows the scroll position minus half the image height for each image
  
        const slideInAt = (window.scrollY + window.innerHeight) - animatedImage.clientHeight / 2;
  
        // bottom of image
        const imageBottom = animatedImage.getBoundingClientRect().top + window.scrollY;
  
        const isHalfShown = slideInAt > imageBottom;
  
        const isNotScrolledPast = window.scrollY < imageBottom;
        if (isHalfShown) {
          animatedImage.classList.add('active');
        }
        // else {
        //   animatedImage.classList.remove('active');
        // }
  
        // console.log(`window.scrollY = ${window.scrollY}`);
      })
    };
  
    window.addEventListener('scroll', debounce(checkSlide));
  });
  
  // Flexslider
// ------------------

var isFlexslider = jQuery('.flexslider');
var sliderAnimation = 'fade';
var loop = '';

jQuery(window).on('load', function () {

  if (jQuery('.flexslider').length) {
    jQuery('.flexslider').flexslider({
      controlNav: true,
      directionNav: true,
      animation: sliderAnimation,
      animationLoop: false,
      slideShow: loop,
      smoothHeight: true,
      video: true,
      minItems: 1,
      maxItems: 1,
      after: function (slider) {
        slider.pause();
        slider.play();
      }
    });
    jQuery(window).trigger('resize');
  }
});

jQuery(window).on('load', function () {

  if (jQuery('.flexslider').length) {
    jQuery('.flexslider-arrows').flexslider({
      controlNav: false,
      directionNav: true,
      animation: "slide"
    });
  }

});
