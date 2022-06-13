(function (d) {

  const fade = d.querySelectorAll('.cj-fade');

  // Create Intersection Observer
  let options = {
    root: null, //viewport
    rootMargin: "0px",
    threshold: .75
  };

  let o = new IntersectionObserver(([fade]) => {

    if (fade.isIntersecting) {

      fade.target.classList.add('active');

    }
  }, options);


  // Test if element is already in viewport
  function isInViewport(elem) {
    const rect = elem.getBoundingClientRect();
    return (
      rect.top >= 0 &&
      rect.left >= 0 &&
      rect.bottom <= (window.innerHeight || d.documentElement.clientHeight) &&
      rect.right <= (window.innerWidth || d.documentElement.clientWidth)
    );
  }


  // Allow data attributes to customize transition duration & delay
  function setDataAttributes(elem) {

    let duration = elem.getAttribute('data-duration');
    let delay = elem.getAttribute('data-delay');

    if (duration !== null) {
      elem.style.transitionDuration = duration + 's';
    }

    if (delay !== null) {
      elem.style.transitionDelay = delay + 's';
    }

  }


  // Set observers
  if (fade.length !== 0) {
  
    fade.forEach(fade => {

      o.observe(fade);

      // make element visible if in viewport
      if (isInViewport(fade)) {
        fade.classList.add('active');
      }

      // set transition duration & delay (if applicable)
      for (let child of fade.children) {
        setDataAttributes(child);
      }

    });
  }  
})(document);