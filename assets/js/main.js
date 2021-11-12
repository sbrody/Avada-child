// Animation for Aurum Plus page
  // limit the amount of time the function runs - 
  function debounce(func, wait = 20, immediate = true) {
    console.log('scrolling');
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
