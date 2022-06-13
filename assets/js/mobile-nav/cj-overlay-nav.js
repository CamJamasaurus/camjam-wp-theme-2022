const cjMobileNav = (function () {
  const cjNavOverlay = document.querySelector('.camjam-nav-overlay');
  const camjamMenu = document.querySelector('.camjam-mobile-nav');

  if (!camjamMenu) return null;
  const mobileCloseIcon = cjNavOverlay.querySelector('.overlay-close-icon');

  function visible() {
    return cjNavOverlay.hidden ? false : true;
  }

  function showMenu() {
    cjNavOverlay.hidden = false;
    document.querySelector('html').style.overflow = 'hidden';
  }

  function hideMenu() {
    cjNavOverlay.hidden = true;
    document.querySelector('html').style.overflow = '';
  }

  function createMenu() {
    cjNavOverlay.hidden = true;
    camjamMenu.style.display = 'block';

    let menuLi = document.querySelectorAll('.camjam-mobile-nav > li');
    let expandIcon = document.createElement('fa-icon');

    expandIcon.classList.add('camjam-mobile-nav__expand');
    expandIcon.setAttribute('icon', 'plus');

    menuLi.forEach(function (element) {
      if (element.querySelector('ul')) {
        let insertCloseIcon = element.insertBefore(expandIcon.cloneNode(), element.querySelector('a'));
        let subMenu = element.querySelector('ul');

        insertCloseIcon.addEventListener('click', function () {
          if (!subMenu.style.display || subMenu.style.display === 'none') {
            subMenu.style.display = 'inline';
            subMenu.parentNode.classList.add('submenu-open');
            this.setAttribute('icon', 'minus');
          } else {
            subMenu.style.display = 'none';
            subMenu.parentNode.classList.remove('submenu-open');
            this.setAttribute('icon', 'plus');
          }
        });
      }
    });
  }

  // Ceate the Menu on Toggle Click
  window.requestAnimationFrame(function () {
    createMenu();
  });

  // Close the Menu when the X is clicked
  mobileCloseIcon.addEventListener('click', function () {
    hideMenu();
  });

  return {
    visible: visible,
    show: showMenu,
    hide: hideMenu,
  };
})();