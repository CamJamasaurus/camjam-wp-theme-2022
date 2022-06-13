const cjSlideOutNav = (function () {
  const cjSlideOut = document.querySelector('.cjSlideOutNav');
  const camjamMenu = document.querySelector('#camjam-slide-out-nav');
  const cjSlideOutToggle = document.querySelector('#camjam-toggle fa-icon');
  const afterHookEl = document.querySelector('#cjSlideOuteAfterHook');
  var hasBeenOpened = false;

  if (!camjamMenu) return null;

  function visible() {
    return cjSlideOut.hidden ? false : true;
  }

  function showMenu() {
    if (!hasBeenOpened) {
      hasBeenOpened = true;
      initializeMenu();
    }

    cjSlideOut.hidden = false;
    document.body.style.overflow = 'hidden';
    cjSlideOutToggle.setAttribute('icon', 'times');
  }

  function hideMenu() {
    cjSlideOut.hidden = true;
    document.body.style.overflow = 'unset';
    cjSlideOutToggle.setAttribute('icon', 'bars');
  }

  function pageForward(departure, arrival) {
    if (!departure.classList.contains('page-ancestor')) {
      departure.classList.add('page-ancestor');
    }

    if (departure.classList.contains('page-active')) {
      departure.classlist.remove('page-active');
    }

    if (!arrival.classList.contains('page-active')) {
      arrival.classList.add('page-active');
    }

    document.querySelector('#cjSlideOuteAfterHook').style.top = arrival.offsetHeight + 'px';

    // Compute styles for various height scenarios
    if (parseInt(getComputedStyle(afterHookEl).paddingBottom) === 0) {
      for (const page of cjSlideOut.querySelectorAll('.cjSlideOutNav__page')) {
        page.style.paddingBottom = page.offsetHeight / 4 + 'px';
      }
    }
  }

  function pageBack(departure, arrival) {
    if (arrival.classList.contains('page-ancestor')) {
      arrival.classList.remove('page-ancestor');
    }

    if (departure.classList.contains('page-active')) {
      departure.classList.remove('page-active');
    }

    document.querySelector('#cjSlideOuteAfterHook').style.top = arrival.offsetHeight + 'px';

    // Compute styles for various height scenarios
    if (parseInt(getComputedStyle(afterHookEl).paddingBottom) === 0) {
      for (const page of cjSlideOut.querySelectorAll('.cjSlideOutNav__page')) {
        page.style.paddingBottom = '0';
      }
    }
  }

  function toggleSubMenu(icon, menu) {
    if (!menu.classList.contains('expanded')) {
      icon.setAttribute('icon', 'chevron-up');
      menu.classList.add('expanded');
      afterHookEl.style.top = camjamMenu.querySelector('.page-active').offsetHeight + 'px';
    } else {
      icon.setAttribute('icon', 'chevron-down');
      menu.classList.remove('expanded');
      afterHookEl.style.top = camjamMenu.querySelector('.page-active').offsetHeight + 'px';
    }
  }

  function initializeMenu() {
    // Set AfterHookEl Top and Padding
    afterHookEl.style.top = camjamMenu.offsetHeight + 'px';
    afterHookEl.style.paddingBottom = afterHookEl.offsetHeight + 'px';

    // Add Listeners for Forward Buttons
    const forwardButtons = document.querySelectorAll('.cjSlideOutNav__btn--forward');

    for (const button of forwardButtons) {
      button.addEventListener('click', function (e) {
        btnElement = e.currentTarget;
        liParent = btnElement.parentElement;
        departure = liParent.parentElement;
        arrival = btnElement.nextElementSibling;

        pageForward(departure, arrival);
      });
    }

    // Add Listeners for Back Buttons
    const backButtons = document.querySelectorAll('.cjSlideOutNav__btn--back');

    for (const button of backButtons) {
      button.addEventListener('click', function (e) {
        btnElement = e.currentTarget;
        departure = btnElement.parentElement;
        arrival = departure.parentElement.parentElement;
        pageBack(departure, arrival);
      });
    }

    // Add Listeners for Expand Buttons
    const expandButtons = document.querySelectorAll('.cjSlideOutNav__btn--expand');

    for (const button of expandButtons) {
      button.addEventListener('click', function (e) {
        btnElement = e.currentTarget;
        btnIcon = btnElement.children[0];
        targetMenu = btnElement.nextElementSibling;

        toggleSubMenu(btnIcon, targetMenu);
      });
    }
  }

  return {
    visible: visible,
    show: showMenu,
    hide: hideMenu,
  };
})();