(function() {
  window.requestAnimationFrame(function() {
    lazyImages();
    lazyBgImages();
  });
  function lazyImages() {
    const images = document.querySelectorAll('img.cj-lazyload');
    if ('loading' in HTMLImageElement.prototype) {
      images.forEach(function(image) {
        let imageSrc = image.dataset.lazySrc;
        let imageSrcset = image.dataset.srcset;
        if (window.supportsWebp) {
          if (imageSrc) {
            image.src = image.dataset.lazySrc.replace(/\.jpg|\.png|\.jpeg/, '.webp');
          }
          if (imageSrcset) {
            image.srcset = image.dataset.srcset.replace(/\.jpg|\.png|\.jpeg/g, '.webp');
          }
        } else {
          if (imageSrc) {
            image.src = image.dataset.lazySrc;
          }
          if (imageSrcset) {
            image.srcset = image.dataset.srcset;
          }
        }
        image.classList.remove('cj-lazyload');
      });
      return;
    }
    const observer = new IntersectionObserver(
      function(entries, observer) {
        entries.forEach(entry => {
          if (entry.isIntersecting) {
            let imageSrc = entry.target.dataset.lazySrc;
            let imageSrcset = entry.target.dataset.srcset;
            if (window.supportsWebp) {
              if (imageSrc) {
                imageSrc = entry.target.dataset.lazySrc.replace(/\.jpg|\.png|\.jpeg/, '.webp');
              }
              if (imageSrcset) {
                imageSrcset = entry.target.dataset.srcset.replace(/\.jpg|\.png|\.jpeg/g, '.webp');
              }
            }
            entry.target.srcset = imageSrcset ? imageSrcset : '';
            entry.target.src = imageSrc;
            entry.target.classList.remove('cj-lazyload');
            entry.target.classList.add('cj-lazyloaded');
            observer.unobserve(entry.target);
          }
        });
      },
      { rootMargin: '50% 0%' }
    );

    images.forEach(function(image) {
      observer.observe(image);
    });
  }
  function lazyBgImages() {
    const bgImages = document.querySelectorAll('.cj-lazyload-bg');

    const observer = new IntersectionObserver(
      function(entries) {
        entries.forEach(function(entry) {
          if (entry.isIntersecting) {
            observer.unobserve(entry.target);
            if (!entry.target.dataset.bgImage) {
              return;
            }
            if (window.supportsWebp) {
              entry.target.style.backgroundImage = `url(${entry.target.dataset.bgImage.replace(
                /.jpg|.png|.jpeg/,
                '.webp'
              )})`;
              return;
            }
            entry.target.style.backgroundImage = `url(${entry.target.dataset.bgImage})`;
          }
        });
      },
      { rootMargin: '33%' }
    );

    bgImages.forEach(function(bgImage) {
      observer.observe(bgImage);
    });
  }
})();